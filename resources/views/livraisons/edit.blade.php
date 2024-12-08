@extends('layouts.commonMaster')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Modifier la Livraison</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Livraison N°{{ $livraison->id }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('livraisons.update', $livraison->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="date_livraison" class="form-label">Date de Livraison</label>
                        <input type="date" name="date_livraison" id="date_livraison" class="form-control" value="{{ old('date_livraison', $livraison->date_livraison) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="statut" class="form-label">Statut</label>
                        <select name="statut" id="statut" class="form-select" required>
                            <option value="en cours" {{ $livraison->statut == 'en cours' ? 'selected' : '' }}>En cours</option>
                            <option value="livré" {{ $livraison->statut == 'livré' ? 'selected' : '' }}>Livré</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="collecte_id" class="form-label">Collecte Associée</label>
                        <select name="collecte_id" id="collecte_id" class="form-select" required>
                            @foreach ($collectes as $collecte)
                                <option value="{{ $collecte->id }}" {{ $livraison->collecte_id == $collecte->id ? 'selected' : '' }}>
                                    Collecte du {{ $collecte->date_collecte }} - {{ ucfirst($collecte->statut) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="{{ route('livraisons.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
