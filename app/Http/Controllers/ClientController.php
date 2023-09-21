<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
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
        // fix thisssssssssss
        // https://laravel.com/docs/10.x/validation#working-with-validated-input
        // $request->validate([
        //     'name' => 'required|min:5|max:100',
        //     'first_lastname' => 'required|min:5|max:100',
        //     'second_lastname' => 'required|min:5|max:100',
        //     'phone_number' => 'required|min:5|max:100',
        // ]);

        $validated = $request->validate([
            'name' => 'required|min:2|max:100',
            'first_lastname' => 'required|min:2|max:100',
            'second_lastname' => 'required|min:2|max:100',
            'phone_number' => 'required|min:10|max:100',
        ]);
        try{
            $client = new Client();
            $client->name = strtoupper($request->name);
            $client->first_lastname = strtoupper($request->first_lastname);
            $client->second_lastname = strtoupper($request->second_lastname);
            $client->phone_number = $request->phone_number;
            $client->save();
            return redirect()->route('client.index');  
        }
        catch (\Exception $e) {
            return redirect()->route('client.index'); 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $client)
    {
        return view('client/client_show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
