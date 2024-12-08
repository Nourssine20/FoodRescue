@extends('layouts.commonMaster')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Détails du Produit</h4>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Produit N°{{ $product->id }}</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Nom du Produit:</strong>
                    <p>{{ $product->name }}</p>
                </div>
                <div class="mb-3">
                    <strong>Image du Produit:</strong>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Image de {{ $product->name }}" class="img-fluid" style="max-width: 100%; height: auto;">
                    @else
                        <p>Aucune image disponible.</p>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>Description:</strong>
                    <p>{{ $product->description }}</p>
                </div>
                <div class="mb-3">
                    <strong>Quantité:</strong>
                    <p>{{ $product->quantity }}</p>
                </div>
                <div class="mb-3">
                    <strong>Prix:</strong>
                    <p>{{ number_format($product->price, 2) }} €</p>
                </div>
                <div class="mb-3">
                    <strong>Date d'Expiration:</strong>
                    <p>{{ $product->expiration_date }}</p>
                </div>
                <div class="mb-3">
                    <strong>Catégorie:</strong>
                    <p>{{ $product->category->name }}</p>
                </div>
                <div class="mb-3">
                    <strong>Statut du Stock:</strong>
                    <p>{{ ucfirst($product->stock_status) }}</p>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Retour à la liste des Produits</a>
            </div>
        </div>
    </div>
</div>
@endsection
