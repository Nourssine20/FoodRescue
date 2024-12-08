@extends('layouts.commonMaster')

@section('title', 'Tables - Transporteur List')

@section('layoutContent')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('transporteurs.create') }}"> Create New Contact</a>
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
            <th>Nom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($transporteurs as $transporteur)
        <tr>
            <td>{{ $transporteur->id }}</td>
            <td>{{ $transporteur->nom }}</td>
            <td>{{ $transporteur->telephone }}</td>
            <td>{{ $transporteur->email }}</td>
            <td>
                <form action="{{ route('transporteurs.destroy', $transporteur->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('transporteurs.show', $transporteur->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('transporteurs.edit', $transporteur->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {{ $transporteurs->links() }}
@endsection

