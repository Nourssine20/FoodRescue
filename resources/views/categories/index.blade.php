@extends('layouts.commonMaster')

@section('title', __('Categories'))

@section('layoutContent')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Tables /</span> {{ __('Categories List') }}
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

<!-- Add Category button -->
<div class="mb-3">
    <a href="{{ route('categories.create') }}" class="btn btn-primary">{{ __('add_category') }}</a>
</div>

<!-- Categories Table -->
<div class="card">
    <h5 class="card-header">{{ __('Categories Table') }}</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if($categories->count())
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('categories.show', $category->id) }}">
                                            <i class="bx bx-show me-1"></i> {{ __('view') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('categories.edit', $category->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> {{ __('edit') }}
                                        </a>
                                        <!-- Button to open the confirmation modal -->
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmModal" data-id="{{ $category->id }}">
                                            <i class="bx bx-trash me-1"></i> {{ __('delete') }}
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="text-center">{{ __('no_categories_found') }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $categories->links() }}
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
      var categoryId = button.getAttribute('data-id'); // Extract the category ID
      var deleteForm = document.getElementById('deleteForm');
      var actionUrl = "{{ url('categories') }}/" + categoryId; // Construct the delete URL
      deleteForm.setAttribute('action', actionUrl); // Update the form action
    });
  });
</script>

@endsection
