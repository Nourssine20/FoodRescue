@extends('layouts.commonMaster')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Détails de l'Offre</h4>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Offre N°{{ $offer->id }}</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Image du Offre:</strong>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $offre->image) }}" alt="Image de {{ $offre->name }}" class="img-fluid" style="max-width: 100%; height: auto;">
                    @else
                        <p>Aucune image disponible.</p>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>Nom de l'Offre:</strong>
                    <p>{{ $offer->title }}</p>
                </div>
                <div class="mb-3">
                    <strong>Description:</strong>
                    <p>{{ $offer->description }}</p>
                </div>
                <div class="mb-3">
                    <strong>Type:</strong>
                    <p>{{ $offer->type }}</p>
                </div>
                <div class="mb-3">
                    <strong>Date de Création:</strong>
                    <p>{{ $offer->created_at->format('d-m-Y') }}</p>
                </div>
                <div class="mb-3">
                    <strong>Date de Mise à Jour:</strong>
                    <p>{{ $offer->updated_at->format('d-m-Y') }}</p>
                </div>
                <div class="mb-3">
                    <strong>Date de Création:</strong>
                    <p>{{ $offer->available_from}}</p>
                </div>
                <div class="mb-3">
                    <strong>Date de Mise à Jour:</strong>
                    <p>{{ $offer->available_until }}</p>
                </div>
                <div class="mb-3">
                    <strong>Nom Donator:</strong>
                    <p>{{ $offer->donator->name }}</p>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('offres.index') }}" class="btn btn-secondary">Retour à la liste des Offres</a>
            </div>
        </div>
    </div>
</div>
@endsection
