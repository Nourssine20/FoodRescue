
@extends('layouts/blankLayout')

@section('title', 'Confirm Password - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <!-- Confirm Password -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{ url('/') }}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">@include('_partials.macros', ["width"=>25, "withbg"=>'var(--bs-primary)'])</span>
              <span class="app-brand-text demo text-body fw-bold">{{ config('variables.templateName') }}</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Confirm Password 🔒</h4>
          <p class="mb-4">This is a secure area of the application. Please confirm your password before continuing.</p>

          <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required autocomplete="current-password">
              @if ($errors->has('password'))
                <div class="mt-2 text-danger">
                  {{ $errors->first('password') }}
                </div>
              @endif
            </div>

            <button class="btn btn-primary d-grid w-100">Confirm</button>
          </form>
        </div>
      </div>
      <!-- /Confirm Password -->

    </div>
  </div>
</div>
@endsection

