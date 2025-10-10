<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="{{ url('/') }}">
      <img src="{{ asset('assets/argon/img/codeschool-logo.png') }}" class="navbar-brand-img h-100" alt="CodeSchool">
      <span class="ms-1 font-weight-bold">CodeSchool</span>
    </a>
  </div>
  
  <hr class="horizontal dark mt-0">
  
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <!-- Dashboard - All Roles -->
      <li class="nav-item">
        <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>

      <!-- Students - All except TEACHER -->
      @if(in_array(auth()->user()->role, ['SA', 'ADMIN', 'MANAGER']))
      <li class="nav-item">
        <a class="nav-link {{ request()->is('students*') ? 'active' : '' }}" href="{{ route('students.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-success text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Students</span>
        </a>
      </li>
      @endif

      <!-- Teachers - SA, ADMIN, MANAGER -->
      @if(in_array(auth()->user()->role, ['SA', 'ADMIN', 'MANAGER']))
      <li class="nav-item">
        <a class="nav-link {{ request()->is('teachers*') ? 'active' : '' }}" href="{{ route('teachers.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-copy-04 text-info text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Teachers</span>
        </a>
      </li>
      @endif

      <!-- Classrooms - All Roles -->
      <li class="nav-item">
        <a class="nav-link {{ request()->is('classrooms*') ? 'active' : '' }}" href="{{ route('classrooms.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-hat-3 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Classrooms</span>
        </a>
      </li>

      <!-- Modules - All Roles -->
      <li class="nav-item">
        <a class="nav-link {{ request()->is('modules*') ? 'active' : '' }}" href="{{ route('modules.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-books text-danger text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Modules</span>
        </a>
      </li>

      <!-- Attendance - TEACHER & Above -->
      @if(in_array(auth()->user()->role, ['TEACHER', 'ADMIN', 'SA', 'MANAGER']))
      <li class="nav-item">
        <a class="nav-link {{ request()->is('attendances*') ? 'active' : '' }}" href="{{ route('attendances.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-check-bold text-success text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Attendance</span>
        </a>
      </li>
      @endif

      <!-- Reports - MANAGER & Above -->
      @if(in_array(auth()->user()->role, ['MANAGER', 'ADMIN', 'SA']))
      <li class="nav-item">
        <a class="nav-link {{ request()->is('reports*') ? 'active' : '' }}" href="{{ route('reports.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-chart-bar-32 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Reports</span>
        </a>
      </li>
      @endif

      <!-- User Management - ADMIN & SA Only -->
      @if(in_array(auth()->user()->role, ['ADMIN', 'SA']))
      <li class="nav-item mt-3">
        <h6 class="ps-4 text-xs font-weight-bolder text-uppercase">Administration</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-circle-08 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">User Management</span>
        </a>
      </li>
      @endif

      <!-- System Settings - SA Only -->
      @if(auth()->user()->role === 'SA')
      <li class="nav-item">
        <a class="nav-link {{ request()->is('settings*') ? 'active' : '' }}" href="{{ route('settings.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-settings text-secondary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">System Settings</span>
        </a>
      </li>
      @endif
    </ul>
  </div>
</aside>