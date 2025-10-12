<ul class="navbar-nav">
  <!-- Dashboard -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('manager.dashboard') ? 'active' : '' }}" 
       href="{{ route('manager.dashboard') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Dashboard</span>
    </a>
  </li>

  <!-- Teacher Management -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('manager.teachers*') ? 'active' : '' }}" 
       href="{{ route('manager.teachers.index') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-single-copy-04 text-success text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Teacher Management</span>
    </a>
  </li>

  <!-- Class Overview -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('manager.classes*') ? 'active' : '' }}" 
       href="{{ route('manager.classes.index') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-hat-3 text-warning text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Class Overview</span>
    </a>
  </li>

  <!-- Student Management -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('manager.students*') ? 'active' : '' }}" 
       href="{{ route('manager.students.index') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Student Management</span>
    </a>
  </li>

  <!-- Operations -->
  <li class="nav-item mt-3">
    <h6 class="ps-4 text-uppercase text-xs font-weight-bolder opacity-6">Operations</h6>
  </li>

  <!-- Financial Reports -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('manager.financial*') ? 'active' : '' }}" 
       href="{{ route('manager.financial.reports') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-money-coins text-danger text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Financial Reports</span>
    </a>
  </li>

  <!-- Performance Analytics -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('manager.analytics*') ? 'active' : '' }}" 
       href="{{ route('manager.analytics.performance') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-chart-bar-32 text-primary text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Performance Analytics</span>
    </a>
  </li>

  <!-- Attendance Summary -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('manager.attendance*') ? 'active' : '' }}" 
       href="{{ route('manager.attendance.summary') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-check-bold text-success text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Attendance Summary</span>
    </a>
  </li>
</ul>