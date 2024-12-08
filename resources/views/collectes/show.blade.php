@extends('layouts.commonMaster')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Détails de la Collecte</h4>

        <div class="card">
            <div class="card-body">
                <h5>Date de Collecte: <strong>{{ $collecte->date_collecte }}</strong></h5>
                <h5>Statut: <strong>{{ $collecte->statut }}</strong></h5>
            </div>
        </div>

        <a href="{{ route('collectes.index') }}" class="btn btn-secondary mt-3">Retour à la Liste</a>
    </div>
</div>
@endsection