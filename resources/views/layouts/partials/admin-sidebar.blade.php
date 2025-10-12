<ul class="navbar-nav">
  <!-- Dashboard -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
       href="{{ route('admin.dashboard') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Dashboard</span>
    </a>
  </li>

  <!-- User Management -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}" 
       href="{{ route('admin.users.index') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-circle-08 text-success text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">User Management</span>
    </a>
  </li>

  <!-- System Management -->
  <li class="nav-item mt-3">
    <h6 class="ps-4 text-uppercase text-xs font-weight-bolder opacity-6">System Management</h6>
  </li>

  <!-- Master Data -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.master*') ? 'active' : '' }}" 
       href="{{ route('admin.master.modules') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-books text-warning text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Master Modules</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.categories*') ? 'active' : '' }}" 
       href="{{ route('admin.categories.index') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-tag text-info text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Categories</span>
    </a>
  </li>

  <!-- System Settings -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}" 
       href="{{ route('admin.settings.general') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-settings text-danger text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">System Settings</span>
    </a>
  </li>

  <!-- System Tools -->
  <li class="nav-item mt-3">
    <h6 class="ps-4 text-uppercase text-xs font-weight-bolder opacity-6">System Tools</h6>
  </li>

  <!-- Backup & Restore -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.backup*') ? 'active' : '' }}" 
       href="{{ route('admin.backup.index') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-archive-2 text-secondary text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Backup & Restore</span>
    </a>
  </li>

  <!-- System Logs -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.logs*') ? 'active' : '' }}" 
       href="{{ route('admin.logs.system') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-collection text-primary text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">System Logs</span>
    </a>
  </li>

  <!-- System Reports -->
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.reports*') ? 'active' : '' }}" 
       href="{{ route('admin.reports.system') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-chart-bar-32 text-success text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">System Reports</span>
    </a>
  </li>
</ul>