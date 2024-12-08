@extends('layouts.commonMaster')

@section('title', 'Adding a new partner')

@section('layoutContent')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Forms/</span> Adding a new partner
</h4>

<!-- Partner Form -->
<div class="card mb-4">
  <h5 class="card-header">Fill this form with partner details</h5>
  <div class="card-body">
    <form action="{{ route('partenaires.store') }}" method="POST">
      @csrf
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-icon-default-name">Nom</label>
        <div class="col-sm-10">
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-user"></i></span>
            <input type="text" name="nom" class="form-control" id="basic-icon-default-name" placeholder="Nom du partenaire" value="{{ old('nom') }}" required />
            @error('nom')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-icon-default-type">Type</label>
        <div class="col-sm-10">
          <select name="type" id="basic-icon-default-type" class="form-control" required>
            <option value="">Sélectionner</option>
            <option value="entreprise" {{ old('type') == 'entreprise' ? 'selected' : '' }}>Entreprise</option>
            <option value="organisation" {{ old('type') == 'organisation' ? 'selected' : '' }}>Organisation</option>
          </select>
          @error('type')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-icon-default-contact">Contact</label>
        <div class="col-sm-10">
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-phone"></i></span>
            <input type="text" name="contact" class="form-control" id="basic-icon-default-contact" placeholder="Contact du partenaire" value="{{ old('contact') }}" required />
            @error('contact')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-icon-default-secteur">Secteur d'Activité</label>
        <div class="col-sm-10">
          <div class="input-group input-group-merge">
            <span class="input-group-text"><i class="bx bx-briefcase"></i></span>
            <input type="text" name="secteur_activite" class="form-control" id="basic-icon-default-secteur" placeholder="Secteur d'activité" value="{{ old('secteur_activite') }}" required />
            @error('secteur_activite')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>
      <div class="row justify-content-end">
        <div class="col-sm-10 m-2">
          <button type="submit" class="btn btn-primary">Créer</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!--/ Partner Form -->
@endsection
