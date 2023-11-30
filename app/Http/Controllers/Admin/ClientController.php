<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.client.client_index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.client.client_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:100',
            'first_lastname' => 'required|min:2|max:100',
            'second_lastname' => 'required|min:2|max:100',
            'phone_number' => 'required|min:10|max:100',
        ]);

        Client::create($request->all());
        Alert::success('Client Created Successfully', 'We have created the client successfully');
        return redirect()->route('admin.client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('admin.client.client_show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('admin.client.client_edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:100',
            'first_lastname' => 'required|min:2|max:100',
            'second_lastname' => 'required|min:2|max:100',
            'phone_number' => 'required|min:10|max:100',
        ]);

        $request->merge([
            'name' => strtoupper($request->name),
            'first_lastname' => strtoupper($request->first_lastname),
            'second_lastname' => strtoupper($request->second_lastname),
        ]);

        Client::where('id', $client->id)
            ->update($request->except('_token', '_method'));

        Alert::success('Client Updated Successfully', 'We have updated the client successfully');
        return redirect()->route('admin.client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        Alert::warning('Client Deleted', 'The client has been deleted');
        return redirect()->route('admin.client.index');
    }
}
