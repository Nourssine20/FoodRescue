@extends('layouts.commonMaster')

@section('title', 'liste vehicule')

@section('layoutContent')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('vehicules.create') }}"> Create New vehicule</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>capacite</th>
            <th>disponibilite</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($vehicules as $vehicule)
        <tr>
            <td>{{ $vehicule->id }}</td>
            <td>{{ $vehicule->type }}</td>
            <td>{{ $vehicule->capacite }}</td>
            <td>{{ $vehicule->disponibilite }}</td>
            <td>
                <form action="{{ route('vehicules.destroy', $vehicule->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('vehicules.show', $vehicule->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('vehicules.edit', $vehicule->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {{ $vehicules->links() }}
@endsection
