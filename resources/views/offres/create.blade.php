@extends('layouts.commonMaster')

@section('layoutContent')

<h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Adding a new offer</h4>

<!-- Basic Layout -->
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Fill this form with the offer details</h5>
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
                <form action="{{ route('offres.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf  
                    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-title">Title</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-tag"></i></span>
                                <input type="text" name="title" class="form-control" id="basic-icon-default-title" placeholder="Title of the offer" aria-label="Offer Title" required />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-description">Description</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-pencil"></i></span>
                                <textarea name="description" class="form-control" id="basic-icon-default-description" placeholder="Description of the offer" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-type">Type</label>
                        <div class="col-sm-10">
                            <select name="type" class="form-select" id="basic-icon-default-type" required>
                                <option value="" disabled selected>Select Type</option>
                                <option value="Fresh Produce ">Fresh Produce</option>
                                <option value="Meat and Seafood">Meat and Seafood</option>
                                
                         <option value="Dairy Products">Dairy Products</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="image">Upload Image:</label>
                        <div class="input-group input-group-merge">
                        <input type="file" name="image" class="form-control" id="image">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-available_from">Available From</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                <input type="date" name="available_from" class="form-control" id="basic-icon-default-available_from" required />
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-available_until">Available Until</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                <input type="date" name="available_until" class="form-control" id="basic-icon-default-available_until" required />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="donator_id">Donator</label>
                        <div class="col-sm-10">
                            <select name="donator_id" class="form-select" id="donator_id" required>
                                <option value="" disabled selected>Select a Donator</option>
                                @foreach($donators as $donator)
                                    <option value="{{ $donator->id }}">{{ $donator->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10 m-2">
                            <button type="submit" class="btn btn-primary">Create Offer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
