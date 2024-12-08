@extends('layouts.commonMaster')
@section('title', 'Tables - Sponsorship List')

@section('layoutContent')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Sponsorship List
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

<!-- Bouton d'ajout de Sponsorship -->
<div class="mb-3">
  <a href="{{ route('sponsorships.create') }}" class="btn btn-primary">Ajouter un Sponsorship</a>
</div>

<!-- Sponsorship Table -->
<div class="card">
  <h5 class="card-header">Sponsorship Table</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Partenaire</th>
          <th>Type de Soutien</th>
          <th>Montant</th>
          <th>Date Début</th>
          <th>Date Fin</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @if($sponsorships->count())
          @foreach($sponsorships as $sponsorship)
          <tr>
            <td>{{ $sponsorship->id }}</td>
            <td>{{ $sponsorship->partenaire->nom }}</td>
            <td>{{ ucfirst($sponsorship->type_soutien) }}</td>
            <td>{{ $sponsorship->montant ? number_format($sponsorship->montant, 2) : 'N/A' }}</td>
            <td>{{ \Carbon\Carbon::parse($sponsorship->date_debut)->format('d-m-Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($sponsorship->date_fin)->format('d-m-Y') }}</td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('sponsorships.show', $sponsorship->id) }}">
                    <i class="bx bx-show me-1"></i> Voir
                  </a>
                  <a class="dropdown-item" href="{{ route('sponsorships.edit', $sponsorship->id) }}">
                    <i class="bx bx-edit-alt me-1"></i> Modifier
                  </a>
                  <!-- Bouton pour ouvrir le modal de confirmation -->
                  <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmModal" data-id="{{ $sponsorship->id }}">
                    <i class="bx bx-trash me-1"></i> Supprimer
                  </button>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        @else
          <tr>
            <td colspan="7" class="text-center">Aucun sponsorship trouvé.</td>
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
        Êtes-vous sûr de vouloir supprimer ce sponsorship ?
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

<script>
  // Passer l'ID du sponsorship dans le formulaire de suppression
  var confirmModal = document.getElementById('confirmModal');
  confirmModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    var id = button.getAttribute('data-id');
    var form = confirmModal.querySelector('#deleteForm');
    form.action = '/sponsorships/' + id;
  });
</script>

@endsection
