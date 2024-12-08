@extends('layouts.commonMaster')
@section('layoutContent')
    <h1>Détails du Sponsoring</h1>
    <div class="card">
        <div class="card-header">
            Sponsoring #{{ $sponsorship->id }}
        </div>
        <div class="card-body">
            <p><strong>Partenaire :</strong> {{ $sponsorship->partenaire->nom }}</p>
            <p><strong>Type de Soutien :</strong> {{ ucfirst($sponsorship->type_soutien) }}</p>
            <p><strong>Montant :</strong> {{ $sponsorship->montant ? number_format($sponsorship->montant, 2) : 'N/A' }}</p>
            <p><strong>Date de Début :</strong> {{ \Carbon\Carbon::parse($sponsorship->date_debut)->format('d-m-Y') }}</p>
            <p><strong>Date de Fin :</strong> {{ \Carbon\Carbon::parse($sponsorship->date_fin)->format('d-m-Y') }}</p>
        </div>
    </div>
@endsection
