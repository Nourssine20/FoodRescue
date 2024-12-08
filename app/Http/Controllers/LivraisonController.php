<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use App\Models\Collecte;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    // Afficher toutes les livraisons
    public function index()
    {
        $livraisons = Livraison::with('collecte')->get();
        return view('livraisons.index', compact('livraisons'));
    }

    // Formulaire de création d'une livraison
    public function create()
    {
        $collectes = Collecte::all(); // Récupérer toutes les collectes
        return view('livraisons.create', compact('collectes'));
    }

    // Sauvegarder une nouvelle livraison
    public function store(Request $request)
    {
        $request->validate([
            'collecte_id' => 'required|exists:collectes,id',
            'date_livraison' => 'required|date|after_or_equal:today',
            'statut' => 'required|string|in:en cours,livré',
        ], [
            'collecte_id.required' => 'La collecte associée est requise.',
            'collecte_id.exists' => 'La collecte associée doit exister.',
            'date_livraison.required' => 'La date de livraison est requise.',
            'date_livraison.date' => 'La date de livraison doit être une date valide.',
            'date_livraison.after_or_equal' => 'La date de livraison doit être aujourd\'hui ou dans le futur.',
            'statut.required' => 'Le statut est requis.',
            'statut.in' => 'Le statut doit être "en cours" ou "livré".',
        ]);

        Livraison::create($request->all());
        return redirect()->route('livraisons.index')->with('success', 'Livraison créée avec succès.');
    }

    // Afficher les détails d'une livraison spécifique
    public function show(Livraison $livraison)
    {
        return view('livraisons.show', compact('livraison'));
    }

    // Editer une livraison
    public function edit(Livraison $livraison)
    {
        $collectes = Collecte::all();
        return view('livraisons.edit', compact('livraison', 'collectes'));
    }

    // Mettre à jour une livraison
    public function update(Request $request, Livraison $livraison)
    {
        $request->validate([
            'collecte_id' => 'required|exists:collectes,id',
            'date_livraison' => 'required|date|after_or_equal:today',
            'statut' => 'required|string|in:en cours,livré',
        ], [
            'collecte_id.required' => 'La collecte associée est requise.',
            'collecte_id.exists' => 'La collecte associée doit exister.',
            'date_livraison.required' => 'La date de livraison est requise.',
            'date_livraison.date' => 'La date de livraison doit être une date valide.',
            'date_livraison.after_or_equal' => 'La date de livraison doit être aujourd\'hui ou dans le futur.',
            'statut.required' => 'Le statut est requis.',
            'statut.in' => 'Le statut doit être "en cours" ou "livré".',
        ]);

        $livraison->update($request->all());
        return redirect()->route('livraisons.index')->with('success', 'Livraison mise à jour.');
    }

    // Supprimer une livraison
    public function destroy(Livraison $livraison)
    {
        $livraison->delete();
        return redirect()->route('livraisons.index')->with('success', 'Livraison supprimée.');
    }
}
