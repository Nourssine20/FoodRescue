@extends('layouts.commonMaster')

@section('title', 'Modifier le Sponsoring')

@section('layoutContent')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Modifier /</span> Sponsoring
</h4>

<!-- Modifier le Sponsoring Form -->
<div class="card">
    <div class="card-header">
        <h5>Modifier le Sponsoring</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('sponsorships.update', $sponsorship->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="partenaire_id" class="form-label">Partenaire</label>
                <select name="partenaire_id" id="partenaire_id" class="form-control" required>
                    <option value="">Sélectionner</option>
                    @foreach($partenaires as $partenaire)
                        <option value="{{ $partenaire->id }}" {{ old('partenaire_id', $sponsorship->partenaire_id) == $partenaire->id ? 'selected' : '' }}>{{ $partenaire->nom }}</option>
                    @endforeach
                </select>
                @error('partenaire_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type_soutien" class="form-label">Type de Soutien</label>
                <select name="type_soutien" id="type_soutien" class="form-control" required>
                    <option value="">Sélectionner</option>
                    <option value="financier" {{ old('type_soutien', $sponsorship->type_soutien) == 'financier' ? 'selected' : '' }}>Financier</option>
                    <option value="matériel" {{ old('type_soutien', $sponsorship->type_soutien) == 'matériel' ? 'selected' : '' }}>Matériel</option>
                    <option value="service" {{ old('type_soutien', $sponsorship->type_soutien) == 'service' ? 'selected' : '' }}>Service</option>
                </select>
                @error('type_soutien')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="montant" class="form-label">Montant</label>
                <input type="number" step="0.01" name="montant" class="form-control" id="montant" value="{{ old('montant', $sponsorship->montant) }}">
                @error('montant')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date_debut" class="form-label">Date de Début</label>
                <input type="date" name="date_debut" class="form-control" id="date_debut" value="{{ old('date_debut', $sponsorship->date_debut) }}" required>
                @error('date_debut')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date_fin" class="form-label">Date de Fin</label>
                <input type="date" name="date_fin" class="form-control" id="date_fin" value="{{ old('date_fin', $sponsorship->date_fin) }}" required>
                @error('date_fin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Mettre à Jour</button>
        </form>
    </div>
</div>
<!--/ Modifier le Sponsoring Form -->
@endsection
