@extends('layouts.commonMaster')

@section('layoutContent')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Ajouter un Produit</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" novalidate enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label">Nom du Produit</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantité</label>
                <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="number" name="price" class="form-control" value="{{ old('price') }}" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="expiration_date" class="form-label">Date d'Expiration</label>
                <input type="date" name="expiration_date" class="form-control" value="{{ old('expiration_date') }}" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image du Produit</label>
                <input type="file" name="image" class="form-control" accept="image/*"   required>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Catégorie</label>
                <select name="category_id" class="form-select" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="stock_status" class="form-label">Statut du Stock</label>
                <select name="stock_status" class="form-select" required>
                    <option value="Disponible" {{ old('stock_status') == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="Indisponible" {{ old('stock_status') == 'Indisponible' ? 'selected' : '' }}>Indisponible</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</div>
@endsection
