
@extends('layouts/blankLayout')

@section('title', 'Reset Password - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <!-- Reset Password -->
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
          <h4 class="mb-2">Reset Password 🔒</h4>
          <p class="mb-4">Enter your new password to reset your account password.</p>

          <!-- Session Status -->
          <x-auth-session-status class="mb-4" :status="session('status')" />

          <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{ old('email', $request->email) }}" required autofocus>
              @if ($errors->has('email'))
                <div class="mt-2 text-danger">
                  {{ $errors->first('email') }}
                </div>
              @endif
            </div>

            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" required>
              @if ($errors->has('password'))
                <div class="mt-2 text-danger">
                  {{ $errors->first('password') }}
                </div>
              @endif
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password" required>
              @if ($errors->has('password_confirmation'))
                <div class="mt-2 text-danger">
                  {{ $errors->first('password_confirmation') }}
                </div>
              @endif
            </div>

            <button class="btn btn-primary d-grid w-100">Reset Password</button>
          </form>

          <div class="text-center mt-3">
            <a href="{{ url('login') }}" class="d-flex align-items-center justify-content-center">
              <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
              Back to login
            </a>
          </div>
        </div>
      </div>
      <!-- /Reset Password -->

    </div>
  </div>
</div>
@endsection
