@extends('layouts.commonMaster')

@section('title', __('Offres'))

@section('layoutContent')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Tables /</span> {{ __('Offres List') }}
</h4>

<!-- Display success message -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Display error message -->
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- Add Offre button -->
<div class="mb-3">
    <a href="{{ route('offres.create') }}" class="btn btn-primary">{{ __('add_offre') }}</a>
</div>

<!-- Offres Table -->
<div class="card">
    <h5 class="card-header">{{ __('Offres Table') }}</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Type') }}</th>
                    <th>{{ __('Available From') }}</th>
                    <th>{{ __('Available Until') }}</th>
                    <th>{{ __('DONATOR Name') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if($offres->count())
                    @foreach ($offres as $offre)
                        <tr>
                            <td>
                                @if ($offre->image)
                                    <img src="{{ asset('storage/' . $offre->image) }}" alt="{{ $offre->name }}" style="width: 50px; height: auto;">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>{{ $offre->title }}</td>
                            <td>{{ $offre->description }}</td>
                            <td>{{ $offre->type }}</td>
                            <td>{{ $offre->available_from }}</td>
                            <td>{{ $offre->available_until }}</td>
                            <td>{{ $offre->donator->name }}</td>
                           
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('offres.show', $offre->id) }}">
                                            <i class="bx bx-show me-1"></i> {{ __('view') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('offres.edit', $offre->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> {{ __('edit') }}
                                        </a>
                                        <!-- Button to open the confirmation modal -->
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmModal" data-id="{{ $offre->id }}">
                                            <i class="bx bx-trash me-1"></i> {{ __('delete') }}
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">{{ __('no_offres_found') }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $offres->links() }}
    </div>
</div>

<!-- Delete confirmation modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">{{ __('Delete Confirmation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ __('delete_confirmation') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('cancel') }}</button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script to dynamically update the delete form action -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var confirmModal = document.getElementById('confirmModal');
    confirmModal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget; // Button that triggered the modal
      var offreId = button.getAttribute('data-id'); // Extract the offre ID
      var deleteForm = document.getElementById('deleteForm');
      var actionUrl = "{{ url('offres') }}/" + offreId; // Construct the delete URL
      deleteForm.setAttribute('action', actionUrl); // Update the form action
    });
  });
</script>

@endsection
