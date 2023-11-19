<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('client/client_index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client/client_create');
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
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('client/client_show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('client/client_edit', compact('client'));
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
            
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('client.index');
    }
}
