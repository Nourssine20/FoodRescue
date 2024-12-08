@extends('layouts.commonMaster')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Détails de la Livraison</h4>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Livraison N°{{ $livraison->id }}</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Date de Livraison:</strong>
                    <p>{{ $livraison->date_livraison }}</p>
                </div>
                <div class="mb-3">
                    <strong>Statut:</strong>
                    <p>{{ ucfirst($livraison->statut) }}</p>
                </div>
                <div class="mb-3">
                    <strong>Collecte Associée:</strong>
                    <p>Date de Collecte: {{ $livraison->collecte->date_collecte }}</p>
                    <p>Statut de la Collecte: {{ $livraison->collecte->statut }}</p>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('livraisons.index') }}" class="btn btn-secondary">Retour à la liste des Livraisons</a>
            </div>
        </div>
    </div>
</div>
@endsection