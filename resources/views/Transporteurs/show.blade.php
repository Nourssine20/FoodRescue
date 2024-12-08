@extends('layouts.commonMaster')

@section('title', 'transporteur')

@section('layoutContent')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Contact</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('transporteurs.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $transporteur->nom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Téléphone:</strong>
                {{ $transporteur->telephone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $transporteur->email }}
            </div>
        </div>
    </div>
@endsection
