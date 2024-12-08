@extends('layouts.commonMaster')

@section('title', 'Modifier le Partenaire')

@section('layoutContent')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Modifier /</span> Partenaire
</h4>

<!-- Modifier le Partenaire Form -->
<div class="card">
    <div class="card-header">
        <h5>Modifier le Partenaire : {{ $partenaire->nom }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('partenaires.update', $partenaire->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" value="{{ old('nom', $partenaire->nom) }}" required>
                @error('nom')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="">Sélectionner</option>
                    <option value="entreprise" {{ old('type', $partenaire->type) == 'entreprise' ? 'selected' : '' }}>Entreprise</option>
                    <option value="organisation" {{ old('type', $partenaire->type) == 'organisation' ? 'selected' : '' }}>Organisation</option>
                </select>
                @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" name="contact" class="form-control" id="contact" value="{{ old('contact', $partenaire->contact) }}" required>
                @error('contact')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="secteur_activite" class="form-label">Secteur d'Activité</label>
                <input type="text" name="secteur_activite" class="form-control" id="secteur_activite" value="{{ old('secteur_activite', $partenaire->secteur_activite) }}" required>
                @error('secteur_activite')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Mettre à Jour</button>
        </form>
    </div>
</div>
<!--/ Modifier le Partenaire Form -->
@endsection
