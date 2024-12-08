@extends('layouts/contentNavbarLayout')

@section('title', 'Modifier un bénéficiaire')

@section('layoutContent')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Modifier un bénéficiaire</h4>

<div class="row">
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Modifier les informations du bénéficiaire</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('benificaires.update', $benificaire->id) }}" method="POST">
          @csrf
          @method('PUT')

          <!-- Champ Nom -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="nom">Nom</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="nom-icon" class="input-group-text"><i class="bx bx-user"></i></span>
                <input type="text" name="nom" class="form-control" id="nom" value="{{ old('nom', $benificaire->nom) }}" required />
              </div>
            </div>
          </div>

          <!-- Champ Adresse -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="adresse">Adresse</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-map"></i></span>
                <input type="text" name="adresse" class="form-control" id="adresse" value="{{ old('adresse', $benificaire->adresse) }}" required />
              </div>
            </div>
          </div>

          <!-- Champ Téléphone -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="tel">Téléphone</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-phone"></i></span>
                <input type="text" name="tel" class="form-control" id="tel" value="{{ old('tel', $benificaire->tel) }}" required />
              </div>
            </div>
          </div>

          <!-- Champ Email -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="email">Email</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $benificaire->email) }}" required />
              </div>
            </div>
          </div>

          <!-- Champ Type -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="type">Type</label>
            <div class="col-sm-10">
              <select name="type" class="form-control" id="type" required>
                <option value="Association" {{ old('type', $benificaire->type) == 'Association' ? 'selected' : '' }}>Association</option>
                <option value="Organisation caritative" {{ old('type', $benificaire->type) == 'Organisation caritative' ? 'selected' : '' }}>Organisation caritative</option>
              </select>
            </div>
          </div>

          <!-- Bouton de soumission -->
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
