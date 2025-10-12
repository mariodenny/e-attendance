<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title', 'Dashboard') - KodingNext Medan</title>
  
  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/argon/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/argon/img/favicon.png') }}">
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/argon/css/argon-dashboard.css') }}" rel="stylesheet" />
  
  <style>
    .role-badge {
      font-size: 0.7rem;
      padding: 0.25rem 0.5rem;
    }
    
    .stat-card {
      transition: transform 0.2s ease;
    }
    
    .stat-card:hover {
      transform: translateY(-2px);
    }
  </style>
  
  @stack('styles')
</head>

<body class="g-sidenav-show bg-gray-100">
  <!-- Sidebar -->
  @include('layouts.partials.dashboard-sidebar')

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <!-- Navbar -->
    @include('layouts.partials.dashboard-navbar')
    
    <!-- Content -->
    <div class="container-fluid py-4">
      <!-- Page Header -->
      <div class="row mb-4">
        <div class="col-12">
          <div class="card bg-gradient-{{ 
            auth()->user()->role == 'SA' ? 'danger' : 
            (auth()->user()->role == 'ADMIN' ? 'warning' : 
            (auth()->user()->role == 'MANAGER' ? 'info' : 'success')) 
          }} shadow-lg">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <h4 class="text-white mb-0">
                    @yield('welcome-title', 'Welcome Back')
                  </h4>
                  <p class="text-white opacity-8 mb-0">
                    @yield('welcome-subtitle', 'Here what is happening today')
                  </p>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-white shadow text-center border-radius-lg">
                    <i class="ni ni-single-02 text-{{ 
                      auth()->user()->role == 'SA' ? 'danger' : 
                      (auth()->user()->role == 'ADMIN' ? 'warning' : 
                      (auth()->user()->role == 'MANAGER' ? 'info' : 'success')) 
                    }} opacity-10"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Flash Messages -->
      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text">{{ session('success') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

      @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-support-16"></i></span>
        <span class="alert-text">{{ session('error') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

      <!-- Main Content -->
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