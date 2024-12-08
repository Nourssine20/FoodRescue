@extends('layouts.commonMaster')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Détails de la Catégorie</h4>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Catégorie N°{{ $category->id }}</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Nom de la Catégorie:</strong>
                    <p>{{ $category->name }}</p>
                </div>
                <div class="mb-3">
                    <strong>Description:</strong>
                    <p>{{ $category->description }}</p>
                </div>
                <div class="mb-3">
                    <strong>Date de Création:</strong>
                    <p>{{ $category->created_at->format('d-m-Y') }}</p>
                </div>
                <div class="mb-3">
                    <strong>Date de Mise à Jour:</strong>
                    <p>{{ $category->updated_at->format('d-m-Y') }}</p>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour à la liste des Catégories</a>
            </div>
        </div>
    </div>
</div>
@endsection
