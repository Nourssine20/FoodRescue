@extends('layouts.commonMaster')

@section('title', 'Gestion des Livraisons')

@section('layoutContent')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Tables /</span> Liste des Livraisons
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

<!-- Bouton d'ajout de Livraison -->
<div class="mb-3">
    <a href="{{ route('livraisons.create') }}" class="btn btn-primary">Ajouter une Livraison</a>
</div>

<!-- Table des Livraisons -->
<div class="card">
    <h5 class="card-header">Table des Livraisons</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Date de Livraison</th>
                    <th>Statut</th>
                    <th>Collecte</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if($livraisons->count())
                    @foreach ($livraisons as $livraison)
                        <tr>
                            <td>{{ $livraison->date_livraison }}</td>
                            <td>{{ $livraison->statut }}</td>
                            <td>{{ $livraison->collecte->date_collecte }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('livraisons.show', $livraison->id) }}">
                                            <i class="bx bx-show me-1"></i> Voir
                                        </a>
                                        <a class="dropdown-item" href="{{ route('livraisons.edit', $livraison->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Modifier
                                        </a>
                                        <!-- Bouton pour ouvrir le modal de confirmation -->
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmModal" data-id="{{ $livraison->id }}">
                                            <i class="bx bx-trash me-1"></i> Supprimer
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">Aucune livraison trouvée.</td>
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
                Êtes-vous sûr de vouloir supprimer cette livraison ?
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
      var livraisonId = button.getAttribute('data-id'); // Extraire l'ID de la livraison
      var deleteForm = document.getElementById('deleteForm');
      var actionUrl = "{{ url('livraisons') }}/" + livraisonId; // Construire l'URL de suppression
      deleteForm.setAttribute('action', actionUrl); // Mettre à jour l'action du formulaire
    });
  });
</script>

@endsection