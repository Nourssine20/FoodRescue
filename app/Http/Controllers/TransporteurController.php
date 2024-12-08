<?php

namespace App\Http\Controllers;

use App\Models\Transporteur;
use Illuminate\Http\Request;

class TransporteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transporteurs = Transporteur::latest()->paginate(5);

        return view('transporteurs.index',compact('transporteurs'))
            ->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transporteurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'telephone' => 'required',
            'email' => 'required',
        ]);

        Transporteur::create($request->all());

        return redirect()->route('transporteurs.index')
                        ->with('success','transporteur created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transporteur  $transporteur
     * @return \Illuminate\Http\Response
     */
    public function show(Transporteur $transporteur)
    {
        return view('transporteurs.show',compact('transporteur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transporteur  $transporteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Transporteur $transporteur)
    {
        return view('transporteurs.edit',compact('transporteur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transporteur  $transporteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transporteur $transporteur)
    {
        $request->validate([
            'nom' => 'required',
            'telephone' => 'required',
            'email' => 'required',
        ]);

        $transporteur->update($request->all());

        return redirect()->route('transporteurs.index')
                        ->with('success','Transporteur updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transporteur  $transporteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transporteur $transporteur)
    {
        $transporteur->delete();

        return redirect()->route('transporteurs.index')
                        ->with('success','Transporteur deleted successfully');
    }
}
