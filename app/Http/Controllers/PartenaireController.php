<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Http\Request;

class PartenaireController extends Controller
{
    // Afficher la liste des partenaires
    public function index()
    {
        $partenaires = Partenaire::all();
        return view('partenaires.index', compact('partenaires'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('partenaires.create');
    }

    // Stocker un nouveau partenaire
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|in:entreprise,organisation',
            'contact' => 'required|string|max:255',
            'secteur_activite' => 'required|string|max:255',
        ]);

        Partenaire::create($request->all());

        return redirect()->route('partenaires.index')->with('success', 'Partenaire créé avec succès.');
    }

    // Afficher un partenaire spécifique
    public function show(Partenaire $partenaire)
    {
        return view('partenaires.show', compact('partenaire'));
    }

    // Afficher le formulaire d'édition
    public function edit(Partenaire $partenaire)
    {
        return view('partenaires.edit', compact('partenaire'));
    }

    // Mettre à jour un partenaire spécifique
    public function update(Request $request, Partenaire $partenaire)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|in:entreprise,organisation',
            'contact' => 'required|string|max:255',
            'secteur_activite' => 'required|string|max:255',
        ]);

        $partenaire->update($request->all());

        return redirect()->route('partenaires.index')->with('success', 'Partenaire mis à jour avec succès.');
    }

    // Supprimer un partenaire spécifique
    public function destroy(Partenaire $partenaire)
    {
        $partenaire->delete();
        return redirect()->route('partenaires.index')->with('success', 'Partenaire supprimé avec succès.');
    }
}
