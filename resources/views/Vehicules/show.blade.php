@extends('layouts.commonMaster')

@section('title', 'vehicule')

@section('layoutContent')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show vehicule</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vehicules.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>type:</strong>
                {{ $vehicule->type }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>capacite:</strong>
                {{ $vehicule->capacite }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>disponibilite:</strong>
                {{ $vehicule->disponibilite }}
            </div>
        </div>
    </div>
@endsection
