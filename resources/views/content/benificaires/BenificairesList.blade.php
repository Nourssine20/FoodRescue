@extends('layouts.commonMaster')

@section('title', 'Tables - Benificaires List')

@section('layoutContent')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Benificaires List
</h4>

<div class="mb-3">
  <a href="{{ route('benificaires.create') }}" class="btn btn-primary">Ajouter un benificaire</a>
</div>

<!-- Benificaire Table -->
<div class="card">
  <h5 class="card-header">Benificaire Table</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Address</th>
          <th>Phone Number</th>
          <th>Email</th>
          <th>Type</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($benificaires as $benif)
        <tr>
          <td>{{ $benif->nom }}</td>
          <td>{{ $benif->addresse }}</td>
          <td>{{ $benif->tel }}</td>
          <td>{{ $benif->email }}</td>
          <td>{{ $benif->type }}</td>
          <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('benificaires.show', $benif->id) }}">
                    <i class="bx bx-show me-1"></i> Voir
                  </a>
                  <a class="dropdown-item" href="{{ route('benificaires.edit', $benif->id) }}">
                    <i class="bx bx-edit-alt me-1"></i> Modifier
                  </a>
                  <!-- Button for deleting benificaire -->
                  <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmModal" data-id="{{ $benif->id }}">
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
<!--/ Benificaire Table -->
<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Confirmation de suppression</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Êtes-vous sûr de vouloir supprimer ce bénéficiaire ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <form id="deleteForm" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  // Script pour gérer l'ouverture du modal et définir l'action de suppression
  var confirmModal = document.getElementById('confirmModal');
  confirmModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget; // Bouton qui déclenche le modal
    var benificaireId = button.getAttribute('data-id'); // ID du bénéficiaire

    // Mettre à jour l'action du formulaire avec l'ID correct
    var deleteForm = document.getElementById('deleteForm');
    deleteForm.action = '/benificaires/' + benificaireId;
  });
</script>

@endsection
