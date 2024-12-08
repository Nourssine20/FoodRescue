@extends('layouts.commonMaster')

@section('title', 'Tables - Liste des Collectes')

@section('layoutContent')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Liste des Collectes
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

<!-- Bouton d'ajout de Collecte -->
<div class="mb-3">
    <a href="{{ route('collectes.create') }}" class="btn btn-primary">Ajouter une Collecte</a>
</div>

<!-- Table des Collectes -->
<div class="card">
    <h5 class="card-header">Table des Collectes</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Date de Collecte</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if($collectes->count())
                    @foreach ($collectes as $collecte)
                        <tr>
                            <td>{{ $collecte->date_collecte }}</td>
                            <td>{{ $collecte->statut }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('collectes.show', $collecte->id) }}">
                                            <i class="bx bx-show me-1"></i> Voir
                                        </a>
                                        <a class="dropdown-item" href="{{ route('collectes.edit', $collecte->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Modifier
                                        </a>
                                        <!-- Bouton pour ouvrir le modal de confirmation -->
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmModal" data-id="{{ $collecte->id }}">
                                            <i class="bx bx-trash me-1"></i> Supprimer
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="text-center">Aucune collecte trouvée.</td>
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
                Êtes-vous sûr de vouloir supprimer cette collecte ?
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
      var collecteId = button.getAttribute('data-id'); // Extraire l'ID de la collecte
      var deleteForm = document.getElementById('deleteForm');
      var actionUrl = "{{ url('collectes') }}/" + collecteId; // Construire l'URL de suppression
      deleteForm.setAttribute('action', actionUrl); // Mettre à jour l'action du formulaire
    });
  });
</script>

@endsection