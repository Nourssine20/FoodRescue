@extends('layouts.commonMaster')

@section('title', 'Tables - Demandes List')

@section('layoutContent')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Demandes List
</h4>

<div class="mb-3">
  <a href="{{ route('demandes.create') }}" class="btn btn-primary">Ajouter une demande</a>
</div>

<!-- Demandes Table -->
<div class="card">
  <h5 class="card-header">Demandes Table</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Type de produit</th>
          <th>Quantité</th>
          <th>Fréquence de besoin</th>
          <th>Bénéficiaire</th>
          <th>Statut</th>
          <th>Date de création</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($demandes as $demande)
        <tr>
          <td>{{ $demande->type_produit }}</td>
          <td>{{ $demande->quantite }}</td>
          <td>{{ $demande->frequence_besoin }}</td>
          <td>{{ $demande->benificaire->nom }}</td>
          <td>{{ $demande->statut }}</td>
          <td>{{ $demande->created_at }}</td>
          <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('demandes.show', $demande->id) }}">
                    <i class="bx bx-show me-1"></i> Voir
                  </a>
                  <a class="dropdown-item" href="{{ route('demandes.edit', $demande->id) }}">
                    <i class="bx bx-edit-alt me-1"></i> Modifier
                  </a>
                  <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmModal" data-id="{{ $demande->id }}">
                    <i class="bx bx-trash me-1"></i> Supprimer
                  </button>
                </div>
              </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!-- Confirm Deletion Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Confirmer la suppression</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Êtes-vous sûr de vouloir supprimer cette demande ?
      </div>
      <div class="modal-footer">
        <form id="deleteForm" method="POST">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  // JavaScript to handle the delete action
  const deleteButtons = document.querySelectorAll('[data-bs-target="#confirmModal"]');
  deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
      const demandeId = this.getAttribute('data-id');
      const deleteForm = document.getElementById('deleteForm');
      deleteForm.action = `/demandes/${demandeId}`;
    });
  });
</script>

@endsection
