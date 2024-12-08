<?php

namespace App\Http\Controllers;
use App\Models\Donator; // Import the Donator model

use Illuminate\Http\Request;

class DonatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donators = Donator::all();  // Retrieve all donators
    return view('content.donator.AdminList', compact('donators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content\donator\form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'type' => 'nullable|string|max:255', 
        ]);

        
        $donator = new Donator($validatedData);

       
        $donator->save();

        
        return redirect()->route('donators.index')->with('success', 'Donor added successfully!');
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
        $donator = Donator::findOrFail($id); // Find the Donator by ID
        $donator->delete(); // Delete the Donator
    
        return redirect()->route('donators.index')->with('success', 'Donor successfully erased.');
    }
}
