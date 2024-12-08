@extends('layouts.commonMaster')

@section('title', 'Gestion des Produits')

@section('layoutContent')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Tables /</span> Liste des Produits
</h4>

<!-- Afficher le message de succès -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Afficher le message d'erreur -->
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- Bouton d'ajout de Produit -->
<div class="mb-3">
    <a href="{{ route('products.create') }}" class="btn btn-primary">Ajouter un Produit</a>
</div>

<!-- Table des Produits -->
<div class="card">
    <h5 class="card-header">Table des Produits</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Date d'Expiration</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if($products->count())
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 50px; height: auto;">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->price !== null ? number_format($product->price, 2) : 'N/A' }}</td>
                            <td>{{ $product->expiration_date !== null ? \Carbon\Carbon::parse($product->expiration_date)->format('d/m/Y') : 'N/A' }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('products.show', $product->id) }}">
                                            <i class="bx bx-show me-1"></i> Voir
                                        </a>
                                        <a class="dropdown-item" href="{{ route('products.edit', $product->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Modifier
                                        </a>
                                        <!-- Bouton pour ouvrir le modal de confirmation -->
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmModal" data-id="{{ $product->id }}">
                                            <i class="bx bx-trash me-1"></i> Supprimer
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center">Aucun produit trouvé.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer ce produit ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script pour mettre à jour dynamiquement l'action du formulaire de suppression -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var confirmModal = document.getElementById('confirmModal');
    confirmModal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget; // Bouton qui a déclenché le modal
      var productId = button.getAttribute('data-id'); // Extraire l'ID du produit
      var deleteForm = document.getElementById('deleteForm');
      var actionUrl = "{{ url('products') }}/" + productId; // Construire l'URL de suppression
      deleteForm.setAttribute('action', actionUrl); // Mettre à jour l'action du formulaire
    });
  });
</script>

@endsection
