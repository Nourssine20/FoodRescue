@extends('layouts.commonMaster')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Ajouter une Livraison</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('livraisons.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="date_livraison" class="form-label">Date de Livraison</label>
                <input type="date" name="date_livraison" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="statut" class="form-label">Statut</label>
                <select name="statut" class="form-control" required>
                    <option value="en cours">En cours</option>
                    <option value="livré">Livré</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="collecte_id" class="form-label">Collecte Associée</label>
                <select name="collecte_id" class="form-control" required>
                    @foreach($collectes as $collecte)
                        <option value="{{ $collecte->id }}">{{ $collecte->date_collecte }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</div>
@endsection
