<?php

namespace App\Http\Controllers;

use App\Models\Sponsorship;
use App\Models\Partenaire;
use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    // Afficher la liste des sponsorships
    public function index()
    {
        $sponsorships = Sponsorship::with('partenaire')->get();
        return view('sponsorships.index', compact('sponsorships'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $partenaires = Partenaire::all();
        return view('sponsorships.create', compact('partenaires'));
    }

    // Stocker un nouveau sponsorship
    public function store(Request $request)
    {
        $request->validate([
            'partenaire_id' => 'required|exists:partenaires,id',
            'type_soutien' => 'required|string|in:financier,matériel,service',
            'montant' => 'nullable|numeric',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);

        Sponsorship::create($request->all());

        return redirect()->route('sponsorships.index')->with('success', 'Sponsoring créé avec succès.');
    }

    // Afficher un sponsorship spécifique
    public function show(Sponsorship $sponsorship)
    {
        return view('sponsorships.show', compact('sponsorship'));
    }

    // Afficher le formulaire d'édition
    public function edit(Sponsorship $sponsorship)
    {
        $partenaires = Partenaire::all();
        return view('sponsorships.edit', compact('sponsorship', 'partenaires'));
    }

    // Mettre à jour un sponsorship spécifique
    public function update(Request $request, Sponsorship $sponsorship)
    {
        $request->validate([
            'partenaire_id' => 'required|exists:partenaires,id',
            'type_soutien' => 'required|string|in:financier,matériel,service',
            'montant' => 'nullable|numeric',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);

        $sponsorship->update($request->all());

        return redirect()->route('sponsorships.index')->with('success', 'Sponsoring mis à jour avec succès.');
    }

    // Supprimer un sponsorship spécifique
    public function destroy(Sponsorship $sponsorship)
    {
        $sponsorship->delete();
        return redirect()->route('sponsorships.index')->with('success', 'Sponsoring supprimé avec succès.');
    }
}
