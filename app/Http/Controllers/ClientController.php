<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::latest()->get(); // Retrieve all client
        return view('clients', ['client' => $client]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // Method to handle form submission
   public function store(Request $request)
   {
       // Validate form data
       $validatedData = $request->validate([
           'company' => 'required|string',
           'vat' => 'required|string',
           'address' => 'required|string',
       ]);

       // Create a new client model instance
    //    $client = new client;
       $user = auth()->user();
       $client = $user->client()->create([
            'company' => $request->input('company'),
            'vat' => $request->input('vat'),
            'address' => $request->input('address'),
       ]);
       // Save the model instance to the database
       $client->save();
       // Redirect or return a response as needed
       return redirect('clients');
   }

    /**
     * Display the specified resource.
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(client $client, $id)
    {
        $client = Client::findorfail($id);
        $this->authorize('update-client', $client);

        return view('edit-client',compact('client'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, client $client, $id)
    {
        $client = Client::find($id);
        $validatedData = $request->validate([
            'company' => 'required|string',
            'vat' => 'required|string',
            'address' => 'required|string',
        ]);
        $client->update($validatedData);

        return redirect('clients');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(client $client, $id)
    {
        $client = client::find($id);
        $this->authorize('delete-client', $client);

        $client->delete();
        return redirect()->to('/clients');
    }
}
