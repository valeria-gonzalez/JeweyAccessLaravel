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
        return view('client/client_index');
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
        $request->validate([
            'name' => 'required|email',
            'comment' => ['required', 'min:5', 'max:50'],
        ]);

        $contact = new Contact();
        $contact->email = $request->email;
        $contact->comment = $request->comment;
        $contact->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
