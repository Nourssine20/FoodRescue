@extends('layouts.commonMaster')

@section('layoutContent')

<h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Editing Offer</h4>

<!-- Basic Layout -->
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update the offer details</h5>
                <small class="text-muted float-end">All fields are required</small>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card-body">
                <form action="{{ route('offres.update', $offre->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf  
                    @method('PUT') <!-- Include the PUT method for updating -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-title">Title</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-tag"></i></span>
                                <input type="text" name="title" class="form-control" id="basic-icon-default-title" placeholder="Title of the offer" aria-label="Offer Title" value="{{ old('title', $offre->title) }}" required />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-description">Description</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-pencil"></i></span>
                                <textarea name="description" class="form-control" id="basic-icon-default-description" placeholder="Description of the offer" required>{{ old('description', $offre->description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-type">Type</label>
                        <div class="col-sm-10">
                            <select name="type" class="form-select" id="basic-icon-default-type" required>
                                <option value="" disabled>Select Type</option>
                                <option value="Fresh Produce" {{ (old('type', $offre->type) == 'Fresh Produce') ? 'selected' : '' }}>Fresh Produce</option>
                                <option value="Meat and Seafood" {{ (old('type', $offre->type) == 'Meat and Seafood') ? 'selected' : '' }}>Meat and Seafood</option>
                                <option value="Dairy Products" {{ (old('type', $offre->type) == 'Dairy Products') ? 'selected' : '' }}>Dairy Products</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="image">Upload Image:</label>
                        <div class="input-group input-group-merge">
                        <input type="file" name="image" class="form-control" id="image">
                        </div>
                    </div>
                    @if($offre->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $offre->image) }}" alt="Offre Image" style="width: 100px; height: 100px; object-fit: cover;">
                    </div>
                @endif

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-available_from">Available From</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                <input type="date" name="available_from" class="form-control" id="basic-icon-default-available_from" value="{{ old('available_from', $offre->available_from ? $offre->available_from : '') }}" required />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-available_until">Available Until</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                <input type="date" name="available_until" class="form-control" id="basic-icon-default-available_until" value="{{ old('available_until', $offre->available_until ? $offre->available_until : '') }}" />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="donator_id">Donator</label>
                        <div class="col-sm-10">
                            <select name="donator_id" class="form-select" id="donator_id" required>
                                <option value="" disabled>Select a Donator</option>
                                @foreach($donators as $donator)
                                    <option value="{{ $donator->id }}" {{ (old('donator_id', $offre->donator_id) == $donator->id) ? 'selected' : '' }}>{{ $donator->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10 m-2">
                            <button type="submit" class="btn btn-primary">Update Offer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
