<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Benificaire;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    public function index()
    {
        $demandes = Demande::with('benificaire')->get();
        return view('demandes.index', compact('demandes'));
    }

    public function create()
    {
        $benificaires = Benificaire::all();
        return view('demandes.create', compact('benificaires'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_produit' => 'required|string',
            'quantite' => 'required|integer',
            'frequence_besoin' => 'required|in:quotidien,hebdomadaire,mensuel',
            'statut' => 'required|in:en attente,satisfait',
            'benificaire_id' => 'required|exists:benificaires,id',
        ]);

        Demande::create($request->all());

        return redirect()->route('demandes.index')->with('success', 'Demande créée avec succès.');
    }

    public function show(Demande $demande)
    {
        return view('demandes.show', compact('demande'));
    }

    public function edit(Demande $demande)
    {
        $benificaires = Benificaire::all();
        return view('demandes.edit', compact('demande', 'benificaires'));
    }

    public function update(Request $request, Demande $demande)
    {
        $request->validate([
            'type_produit' => 'required|string',
            'quantite' => 'required|integer',
            'frequence_besoin' => 'required|in:quotidien,hebdomadaire,mensuel',
            'statut' => 'required|in:en attente,satisfait',
            'benificaire_id' => 'required|exists:benificaires,id',
        ]);

        $demande->update($request->all());

        return redirect()->route('demandes.index')->with('success', 'Demande mise à jour avec succès.');
    }

    public function destroy(Demande $demande)
    {
        $demande->delete();
        return redirect()->route('demandes.index')->with('success', 'Demande supprimée avec succès.');
    }
}
