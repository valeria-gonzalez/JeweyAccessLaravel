<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::with('user')->get();
        return view('client.client_index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.client_create');
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

        $request->merge(['user_id' => Auth::id()]);
        Client::create($request->all());
        Alert::success('Client Created Successfully', 'We have created the client successfully');
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('client.client_show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('client.client_edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $response = Gate::inspect('update', $client);
        if($response->denied()){
            Alert::warning('Access Denied', $response->message());
            return redirect()->route('client.index');
        }

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
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $response = Gate::inspect('delete', $client);
        if($response->denied()){
            Alert::warning('Access Denied', $response->message());
            return redirect()->route('client.index');
        }
        $client->delete();
        Alert::warning('Client Deleted', 'The client has been deleted');
        return redirect()->route('client.index');
    }
}
