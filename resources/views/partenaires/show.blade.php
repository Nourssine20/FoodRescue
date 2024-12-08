@extends('layouts.commonMaster')

@section('title', 'Détails du Partenaire')

@section('layoutContent')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Détails /</span> Partenaire: {{ $partenaire->nom }}
</h4>

<!-- Partenaire Details Card -->
<div class="card">
    <div class="card-header">
        <h5>{{ $partenaire->nom }}</h5>
    </div>
    <div class="card-body">
        <p><strong>Type :</strong> {{ $partenaire->type }}</p>
        <p><strong>Contact :</strong> {{ $partenaire->contact }}</p>
        <p><strong>Secteur d'Activité :</strong> {{ $partenaire->secteur_activite }}</p>
        
        <h5 class="mt-4">Sponsoring Associés</h5>
        @if($partenaire->sponsorships->count())
            <ul class="list-group">
                @foreach($partenaire->sponsorships as $sponsorship)
                    <li class="list-group-item">
                        {{ $sponsorship->type_soutien }} - {{ $sponsorship->montant ?? 'N/A' }} - Du {{ $sponsorship->date_debut }} au {{ $sponsorship->date_fin }}
                    </li>
                @endforeach
            </ul>
        @else
            <p>Aucun sponsoring associé.</p>
        @endif
    </div>
</div>
<!--/ Partenaire Details Card -->
@endsection
