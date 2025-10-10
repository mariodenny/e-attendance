<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login - KN Reporter</title>
  
  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/argon/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/argon/img/favicon.png') }}">
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  
  <!-- CSS Files -->
  <link href="{{ asset('assets/argon/css/argon-dashboard.css') }}" rel="stylesheet" />
  
  <style>
    .bg-gradient-primary {
      background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
    }
  </style>
</head>

<body class="bg-gradient-primary">
  <div class="container pt-5">
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-6 col-md-8">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="p-5">
              <div class="text-center">
                {{-- <img src="{{ asset('assets/argon/img/codeschool-logo.png') }}" alt="CodeSchool" class="mb-4" width="120"> --}}
                <h1 class="h4 text-gray-900 mb-4">KodingNext Reporter</h1>
              </div>

              @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <span class="alert-text">{{ $errors->first() }}</span>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif

              <form class="user" method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="mb-3">
                  <label class="form-label">Email or Username</label>
                  <input type="text" class="form-control form-control-user" name="login" 
                         value="{{ old('login') }}" required autofocus
                         placeholder="Enter your email or username">
                </div>
                
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control form-control-user" 
                         name="password" required placeholder="Password">
                </div>
                
                <div class="mb-3">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Login
                </button>
              </form>
              
              <hr>
              <div class="text-center">
                {{-- <a class="small" href="{{ route('password.request') }}">Forgot Password?</a> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('assets/argon/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/argon/js/core/bootstrap.min.js') }}"></script>
</body>
</html>