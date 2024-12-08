@extends('layouts.commonMaster')

@section('title', 'Tables - Donator List')

@section('layoutContent')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Donator List
</h4>
<div class="mb-3">
  <a href="{{ route('donators.create') }}" class="btn btn-primary">{{ __('add_donator') }}</a>
</div>

<!-- Donator Table -->
<div class="card">
  <h5 class="card-header">Donator Table</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Address</th>
          <th>Phone Number</th>
          <th>Email</th>
          <th>Type</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($donators as $donator)
        <tr>
          <td>{{ $donator->id }}</td>
          <td>{{ $donator->name }}</td>
          <td>{{ $donator->address }}</td>
          <td>{{ $donator->phone_number }}</td>
          <td>{{ $donator->email }}</td>
          <td>{{ $donator->type }}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('donators.edit', $donator->id) }}">
                  <i class="bx bx-edit-alt me-1"></i> Edit
                </a>
                <form action="{{ route('donators.destroy', $donator->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="dropdown-item">
                    <i class="bx bx-trash me-1"></i> Delete
                  </button>
                </form>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Donator Table -->
@endsection
