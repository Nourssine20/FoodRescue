@extends('layouts/contentNavbarLayout')

@section('title', 'Ajouter un nouveau bénéficiaire')

@section('layoutContent')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Ajouter un nouveau bénéficiaire</h4>

<div class="row">
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Remplissez ce formulaire</h5>
        <small class="text-muted float-end">Tous les champs sont obligatoires</small>
      </div>
      <div class="card-body">
        <form action="{{ route('benificaires.store') }}" method="POST">
          @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="nom">Nom</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="nom-icon" class="input-group-text"><i class="bx bx-user"></i></span>
                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" placeholder="Nom du bénéficiaire" required />
              </div>
              @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="adresse">Adresse</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-map"></i></span>
                <input type="text" name="adresse" class="form-control @error('adresse') is-invalid @enderror" id="adresse" placeholder="Adresse" required />
              </div>
              @error('adresse')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="tel">Téléphone</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-phone"></i></span>
                <input type="text" name="tel" class="form-control @error('tel') is-invalid @enderror" id="tel" placeholder="Téléphone" required />
              </div>
              @error('tel')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="email">Email</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" required />
              </div>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="type">Type</label>
            <div class="col-sm-10">
              <select name="type" class="form-control @error('type') is-invalid @enderror" id="type" required>
                <option value="Association">Association</option>
                <option value="Organisation caritative">Organisation caritative</option>
              </select>
              @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
