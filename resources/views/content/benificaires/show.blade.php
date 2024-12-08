@extends('layouts/contentNavbarLayout')

@section('title', 'Détails du bénéficiaire')

@section('layoutContent')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Details/</span> Bénéficiaire</h4>

<div class="card">
  <div class="card-header">
    <h5 class="mb-0">Détails du bénéficiaire : {{ $benificaire->nom }}</h5>
  </div>
  <div class="card-body">
    <p><strong>Adresse :</strong> {{ $benificaire->adresse }}</p>
    <p><strong>Téléphone :</strong> {{ $benificaire->tel }}</p>
    <p><strong>Email :</strong> {{ $benificaire->email }}</p>
    <p><strong>Type :</strong> {{ $benificaire->type }}</p>
    <a href="{{ route('benificaires.index') }}" class="btn btn-secondary">Retour à la liste</a>
  </div>
</div>
@endsection
