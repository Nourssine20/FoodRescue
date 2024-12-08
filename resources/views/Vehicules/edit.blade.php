@extends('layouts.commonMaster')

@section('title', 'modifier une vehicule')

@section('layoutContent')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit vehicule</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vehicules.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vehicules.update', $vehicule->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>type:</strong>
                    <input type="text" name="type" value="{{ $vehicule->type}}" class="form-control" placeholder="type" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>capacite:</strong>
                    <input type="text" name="capacite" value="{{ $vehicule->capacite }}" class="form-control" placeholder="capacite" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>disponibilite:</strong>
                    <input type="text" name="disponibilite" value="{{ $vehicule->disponibilite }}" class="form-control" placeholder="disponibilite" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
