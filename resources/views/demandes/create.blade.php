@extends('layouts.commonMaster')

@section('title', 'Créer une demande')

@section('layoutContent')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Demandes/</span> Créer une demande</h4>

<div class="card">
    <div class="card-header">
        <h5>Créer une demande</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('demandes.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="type_produit">Type de produit</label>
                <div class="col-sm-10">
                    <input type="text" name="type_produit" class="form-control" id="type_produit" required />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="quantite">Quantité</label>
                <div class="col-sm-10">
                    <input type="number" name="quantite" class="form-control" id="quantite" required />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="frequence_besoin">Fréquence de besoin</label>
                <div class="col-sm-10">
                    <select name="frequence_besoin" class="form-control" id="frequence_besoin" required>
                        <option value="quotidien">Quotidien</option>
                        <option value="hebdomadaire">Hebdomadaire</option>
                        <option value="mensuel">Mensuel</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="benificaire_id">Bénéficiaire</label>
                <div class="col-sm-10">
                    <select name="benificaire_id" class="form-control" id="benificaire_id" required>
                        @foreach($benificaires as $benificaire)
                            <option value="{{ $benificaire->id }}">{{ $benificaire->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="statut">Statut</label>
                <div class="col-sm-10">
                    <select name="statut" class="form-control" id="statut" required>
                        <option value="en attente">En attente</option>
                        <option value="satisfait">Satisfait</option>
                    </select>
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Créer</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
