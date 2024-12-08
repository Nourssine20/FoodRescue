<!DOCTYPE html>
<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="{{ asset('/assets') . '/' }}" data-base-url="{{ url('/') }}" data-framework="laravel" data-template="vertical-menu-laravel-template-free">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>@yield('title') | Sneat - HTML Laravel Free Admin Template </title>
  <meta name="description" content="{{ config('variables.templateDescription') ?? '' }}" />
  <meta name="keywords" content="{{ config('variables.templateKeyword') ?? '' }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="canonical" href="{{ config('variables.productPage') ?? '' }}">
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
  <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

  <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('07734e34727ec8afcee8', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('popup-channel');
    channel.bind('user-register', function(data) {
      
     
      alert(JSON.stringify(data.message) + ' has been created');
    });
  </script>
  
  
  <!-- Include Styles -->
  @include('layouts/sections/styles')
  @include('layouts/sections/scriptsIncludes')
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      
      @include('layouts/sections/menu/verticalMenu')

      <!-- Layout page -->
      <div class="layout-page">
        
        @include('layouts/sections/navbar/navbar')

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <div class="{{ $container ?? 'container-xxl' }} flex-grow-1 container-p-y">
            @yield('layoutContent')
          </div>

          @include('layouts/sections/footer/footer')
          <div class="content-backdrop fade"></div>
        </div>
      </div>

      <div class="layout-overlay layout-menu-toggle"></div>
      <div class="drag-target"></div>
    </div>
  </div>

  @include('layouts/sections/scripts')
</body>
</html>
