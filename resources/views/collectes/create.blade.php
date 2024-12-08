@extends('layouts.commonMaster')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Créer une Collecte</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('collectes.store') }}">
            @csrf
            <div class="mb-3">
                <label for="date_collecte" class="form-label">Date de Collecte</label>
                <input type="date" class="form-control" id="date_collecte" name="date_collecte" required>
            </div>
            <div class="mb-3">
                <label for="statut" class="form-label">Statut</label>
                <select class="form-select" id="statut" name="statut" required>
                    <option value="planifié">Planifié</option>
                    <option value="en cours">En Cours</option>
                    <option value="terminé">Terminé</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('collectes.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
