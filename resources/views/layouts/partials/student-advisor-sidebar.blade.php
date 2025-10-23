<ul class="navbar-nav">
  <!-- Dashboard -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('student-advisor.dashboard') ? 'active' : '' }}" 
       href="{{ route('student-advisor.dashboard') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Dashboard</span>
    </a>
  </li>

  <!-- My Students -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('sa.students*') ? 'active' : '' }}" 
       href="">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-single-02 text-success text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">My Students</span>
    </a>
  </li>

  <!-- Trial Students -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('sa.trials*') ? 'active' : '' }}" 
       href="">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-spaceship text-warning text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Trial Students</span>
    </a>
  </li>

  <!-- Progress Tracking -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('sa.progress*') ? 'active' : '' }}" 
       href=""">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-chart-bar-32 text-info text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Progress Tracking</span>
    </a>
  </li>

  <!-- Student Support -->
  <li class="nav-item mt-3">
    <h6 class="ps-4 text-uppercase text-xs font-weight-bolder opacity-6">Student Support</h6>
  </li>

  <!-- At-Risk Students -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('sa.at-risk*') ? 'active' : '' }}" 
       href="">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-notification-70 text-danger text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">At-Risk Students</span>
    </a>
  </li>

  <!-- Parent Communications -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('sa.communications*') ? 'active' : '' }}" 
       href="">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-send text-primary text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Parent Communications</span>
    </a>
  </li>

  <!-- Conversion Reports -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('sa.conversion*') ? 'active' : '' }}" 
       href="">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-chart-pie-35 text-success text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Conversion Reports</span>
    </a>
  </li>
</ul>