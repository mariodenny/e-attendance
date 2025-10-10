<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>KodingNext Medan - Internal Portal</title>
  
  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/argon/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/argon/img/favicon.png') }}">
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  
  <!-- Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  
  <!-- CSS Files -->
  <link href="{{ asset('assets/argon/css/argon-dashboard.css') }}" rel="stylesheet" />
  
  <style>
    .hero-section {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
    }
    
    .internal-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: none;
      border-radius: 12px;
    }
    
    .internal-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 25px rgba(0,0,0,0.15) !important;
    }
    
    .quick-stats {
      background: rgba(255,255,255,0.1);
      backdrop-filter: blur(10px);
      border-radius: 12px;
      padding: 1.5rem;
    }
  </style>
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
    <div class="container">
      <a class="navbar-brand font-weight-bold" href="#">
        <img src="https://static.wixstatic.com/media/5cdcb6_27068c396c004557843309312de91a83~mv2.png/v1/crop/x_0,y_0,w_934,h_423/fill/w_934,h_423,al_c,q_90,enc_avif,quality_auto/5cdcb6_27068c396c004557843309312de91a83~mv2.png" 
             alt="KodingNext Medan" height="40" class="me-2">
        <span class="text-white">Internal Portal</span>
      </a>
      
      <div class="navbar-nav ms-auto">
        <a href="{{ route('login') }}" class="btn btn-warning btn-sm">
          <i class="ni ni-key-25 me-1"></i> Team Login
        </a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section" id="home">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="text-white">
            <h1 class="display-4 font-weight-bold mb-4">
              KodingNext Medan
              <span class="text-warning d-block">Internal Portal</span>
            </h1>
            <p class="lead mb-4 opacity-8">
              Streamlined management system for attendance tracking, 
              student reports, and lesson management. Built for our internal team.
            </p>
            
            <!-- Quick Stats -->
            <div class="quick-stats mb-5">
              <div class="row text-center">
                <div class="col-4">
                  <h4 class="text-warning font-weight-bold">24</h4>
                  <small class="text-light opacity-8">Active Classes</small>
                </div>
                <div class="col-4">
                  <h4 class="text-warning font-weight-bold">156</h4>
                  <small class="text-light opacity-8">Students</small>
                </div>
                <div class="col-4">
                  <h4 class="text-warning font-weight-bold">15</h4>
                  <small class="text-light opacity-8">Teachers</small>
                </div>
              </div>
            </div>
            
            <a href="{{ route('login') }}" class="btn btn-warning btn-lg">
              <i class="ni ni-key-25 me-2"></i> Access Portal
            </a>
          </div>
        </div>
        
        <div class="col-lg-6">
          <div class="position-relative">
            <img src="{{ asset('assets/argon/img/dashboard-preview.png') }}" 
                 alt="Dashboard Preview" class="img-fluid rounded-lg shadow-lg">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="py-7 bg-gray-100">
    <div class="container">
      <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto">
          <h2 class="display-4 font-weight-bold">Portal Features</h2>
          <p class="lead">Everything you need to manage coding classes efficiently</p>
        </div>
      </div>
      
      <div class="row">
        <!-- Attendance Management -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card internal-card shadow-lg border-0 rounded-lg h-100">
            <div class="card-body p-4 text-center">
              <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg mx-auto mb-3">
                <i class="ni ni-check-bold text-white opacity-10"></i>
              </div>
              <h5 class="font-weight-bold">Attendance Tracking</h5>
              <p class="text-muted mb-3">
                Real-time attendance management for all classes with instant reporting
              </p>
              <ul class="list-unstyled text-sm text-muted text-start">
                <li class="mb-1"><i class="ni ni-check-bold text-success me-2"></i> Daily attendance records</li>
                <li class="mb-1"><i class="ni ni-check-bold text-success me-2"></i> Absence notifications</li>
                <li class="mb-1"><i class="ni ni-check-bold text-success me-2"></i> Monthly reports</li>
              </ul>
            </div>
          </div>
        </div>
        
        <!-- Student Reports -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card internal-card shadow-lg border-0 rounded-lg h-100">
            <div class="card-body p-4 text-center">
              <div class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg mx-auto mb-3">
                <i class="ni ni-single-02 text-white opacity-10"></i>
              </div>
              <h5 class="font-weight-bold">Student Reports</h5>
              <p class="text-muted mb-3">
                Comprehensive student progress tracking and performance analytics
              </p>
              <ul class="list-unstyled text-sm text-muted text-start">
                <li class="mb-1"><i class="ni ni-check-bold text-success me-2"></i> Progress tracking</li>
                <li class="mb-1"><i class="ni ni-check-bold text-success me-2"></i> Trial student reports</li>
                <li class="mb-1"><i class="ni ni-check-bold text-success me-2"></i> Performance analytics</li>
              </ul>
            </div>
          </div>
        </div>
        
        <!-- Lesson Management -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card internal-card shadow-lg border-0 rounded-lg h-100">
            <div class="card-body p-4 text-center">
              <div class="icon icon-shape icon-lg bg-gradient-warning shadow text-center border-radius-lg mx-auto mb-3">
                <i class="ni ni-books text-white opacity-10"></i>
              </div>
              <h5 class="font-weight-bold">Lesson Management</h5>
              <p class="text-muted mb-3">
                Complete lesson planning, module tracking, and curriculum management
              </p>
              <ul class="list-unstyled text-sm text-muted text-start">
                <li class="mb-1"><i class="ni ni-check-bold text-success me-2"></i> Lesson planning</li>
                <li class="mb-1"><i class="ni ni-check-bold text-success me-2"></i> Module progress</li>
                <li class="mb-1"><i class="ni ni-check-bold text-success me-2"></i> Curriculum tracking</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Role-based Access -->
  <section class="py-7">
    <div class="container">
      <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto">
          <h2 class="display-4 font-weight-bold">Role-based Access</h2>
          <p class="lead">Different access levels for different team roles</p>
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card internal-card shadow border-0 rounded-lg h-100">
            <div class="card-body p-4 text-center">
              <div class="icon icon-shape icon-lg bg-gradient-danger shadow text-center border-radius-lg mx-auto mb-3">
                <i class="ni ni-settings text-white opacity-10"></i>
              </div>
              <h6 class="font-weight-bold text-danger">ADMIN</h6>
              <p class="text-sm text-muted mb-0">
                Full system access, user management, and system configuration
              </p>
            </div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card internal-card shadow border-0 rounded-lg h-100">
            <div class="card-body p-4 text-center">
              <div class="icon icon-shape icon-lg bg-gradient-warning shadow text-center border-radius-lg mx-auto mb-3">
                <i class="ni ni-single-copy-04 text-white opacity-10"></i>
              </div>
              <h6 class="font-weight-bold text-warning">STUDENT ADVISOR</h6>
              <p class="text-sm text-muted mb-0">
                Student management, teacher coordination, and reporting
              </p>
            </div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card internal-card shadow border-0 rounded-lg h-100">
            <div class="card-body p-4 text-center">
              <div class="icon icon-shape icon-lg bg-gradient-info shadow text-center border-radius-lg mx-auto mb-3">
                <i class="ni ni-badge text-white opacity-10"></i>
              </div>
              <h6 class="font-weight-bold text-info">MANAGER</h6>
              <p class="text-sm text-muted mb-0">
                Team oversight, performance monitoring, and operational reports
              </p>
            </div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card internal-card shadow border-0 rounded-lg h-100">
            <div class="card-body p-4 text-center">
              <div class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg mx-auto mb-3">
                <i class="ni ni-hat-3 text-white opacity-10"></i>
              </div>
              <h6 class="font-weight-bold text-success">TEACHER</h6>
              <p class="text-sm text-muted mb-0">
                Class management, attendance tracking, and student progress
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Quick Actions -->
  <section class="py-7 bg-gradient-primary text-white">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h3 class="display-5 font-weight-bold mb-3">Ready to Manage Your Classes?</h3>
          <p class="lead mb-0 opacity-8">
            Access the internal portal to track attendance, generate reports, and manage lessons.
          </p>
        </div>
        <div class="col-lg-4 text-lg-end">
          <a href="{{ route('login') }}" class="btn btn-warning btn-lg shadow">
            <i class="ni ni-key-25 me-2"></i> Login to Portal
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer pt-5 bg-dark text-white">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <div class="d-flex align-items-center">
            <img src="https://static.wixstatic.com/media/5cdcb6_27068c396c004557843309312de91a83~mv2.png/v1/crop/x_0,y_0,w_934,h_423/fill/w_934,h_423,al_c,q_90,enc_avif,quality_auto/5cdcb6_27068c396c004557843309312de91a83~mv2.png" 
                 alt="KodingNext Medan" height="30" class="me-3">
            <div>
              <h6 class="mb-0">KodingNext Medan - Internal Portal</h6>
              <p class="text-sm text-white opacity-8 mb-0">
                For authorized team members only
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 text-md-end">
          <p class="text-sm text-white opacity-8 mb-0">
            © {{ date('Y') }} KodingNext Medan • v1.0
          </p>
        </div>
      </div>
      
      <hr class="horizontal dark my-4">
      
      <div class="row">
        <div class="col-12 text-center">
          <p class="text-sm text-white opacity-8">
            <i class="ni ni-lock-circle-open text-warning me-1"></i>
            Secure internal system • Confidential information
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="{{ asset('assets/argon/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/argon/js/core/bootstrap.min.js') }}"></script>
  
  <script>
    // Smooth scroll for navigation
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth'
          });
        }
      });
    });

    // Navbar background on scroll
    window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('bg-dark');
        navbar.classList.remove('bg-transparent');
      } else {
        navbar.classList.remove('bg-dark');
        navbar.classList.add('bg-transparent');
      }
    });
  </script>
</body>
</html>