@extends('layouts.commonMaster')

@section('title', 'Tables - Partenaires List')

@section('layoutContent')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Liste des Partenaires
</h4>

<!-- Afficher le message de succès -->
@if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

<!-- Afficher le message d'erreur -->
@if (session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
@endif

<!-- Bouton d'ajout de Partenaire -->
<div class="mb-3">
  <a href="{{ route('partenaires.create') }}" class="btn btn-primary">Ajouter un Partenaire</a>
</div>

<!-- Partenaire Table -->
<div class="card">
  <h5 class="card-header">Table des Partenaires</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Type</th>
          <th>Contact</th>
          <th>Secteur d'Activité</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @if($partenaires->count())
          @foreach($partenaires as $partenaire)
          <tr>
            <td>{{ $partenaire->id }}</td>
            <td>{{ $partenaire->nom }}</td>
            <td>{{ $partenaire->type }}</td>
            <td>{{ $partenaire->contact }}</td>
            <td>{{ $partenaire->secteur_activite }}</td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('partenaires.show', $partenaire->id) }}">
                    <i class="bx bx-show me-1"></i> Voir
                  </a>
                  <a class="dropdown-item" href="{{ route('partenaires.edit', $partenaire->id) }}">
                    <i class="bx bx-edit-alt me-1"></i> Modifier
                  </a>
                  <!-- Bouton pour ouvrir le modal de confirmation -->
                  <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmModal" data-id="{{ $partenaire->id }}">
                    <i class="bx bx-trash me-1"></i> Supprimer
                  </button>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        @else
          <tr>
            <td colspan="6" class="text-center">Aucun partenaire trouvé.</td>
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
        Êtes-vous sûr de vouloir supprimer ce partenaire ?
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
      var partenaireId = button.getAttribute('data-id'); // Extraire l'ID du partenaire
      var deleteForm = document.getElementById('deleteForm');
      var actionUrl = "{{ url('partenaires') }}/" + partenaireId; // Construire l'URL de suppression
      deleteForm.setAttribute('action', actionUrl); // Mettre à jour l'action du formulaire
    });
  });
</script>

@endsection
