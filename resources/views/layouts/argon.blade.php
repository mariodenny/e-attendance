<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Favicon -->
  {{-- <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/argon/img/apple-icon.png') }}"> --}}
  {{-- <link rel="icon" type="image/png" href="{{ asset('assets/argon/img/favicon.png') }}"> --}}
  
  <title>@yield('title', 'Dashboard') - Your App</title>
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/argon/css/argon-dashboard.css') }}" rel="stylesheet" />
  
  @stack('styles')
</head>

<body class="g-sidenav-show bg-gray-100">
  <!-- Sidebar -->
  @include('layouts.partials.argon-sidebar')

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <!-- Navbar -->
    @include('layouts.partials.argon-navbar')
    
    <!-- Content -->
    <div class="container-fluid py-4">
      @yield('content')
    </div>
  </main>

  <!-- Scripts -->
  <script src="{{ asset('assets/argon/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/argon/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/argon/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/argon/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/argon/js/plugins/chartjs.min.js') }}"></script>
  
  <!-- Argon JS -->
  <script src="{{ asset('assets/argon/js/argon-dashboard.min.js') }}"></script>
  
  @stack('scripts')
</body>
</html>