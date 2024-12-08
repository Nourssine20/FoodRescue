@extends('layouts.commonMaster')

@section('title', 'Détails de la demande')

@section('layoutContent')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Demandes/</span> Détails de la demande</h4>

<div class="card">
    <div class="card-header">
        <h5>Détails de la demande</h5>
    </div>
    <div class="card-body">
        <p><strong>Type de produit:</strong> {{ $demande->type_produit }}</p>
        <p><strong>Quantité:</strong> {{ $demande->quantite }}</p>
        <p><strong>Fréquence de besoin:</strong> {{ $demande->frequence_besoin }}</p>
        <p><strong>Bénéficiaire:</strong> {{ $demande->benificaire->nom }}</p>
        <p><strong>Statut:</strong> {{ $demande->statut }}</p>
        <p><strong>Date de création:</strong> {{ $demande->created_at }}</p>

        <div class="d-flex justify-content-end">
            <a href="{{ route('demandes.edit', $demande->id) }}" class="btn btn-warning me-2">Modifier</a>
            <form action="{{ route('demandes.destroy', $demande->id) }}" method="POST" class="me-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            <a href="{{ route('demandes.index') }}" class="btn btn-secondary">Retour</a>
        </div>
    </div>
</div>
@endsection
