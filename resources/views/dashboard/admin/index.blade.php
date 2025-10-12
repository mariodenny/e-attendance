@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('welcome-title', 'System Administration')
@section('welcome-subtitle', 'Manage users, system settings, and overall operations')

@section('content')
<div class="row">
  <!-- System Overview -->
  <div class="col-xl-3 col-sm-6 mb-4">
    <div class="card stat-card border-0 shadow">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Users</p>
              <h5 class="font-weight-bolder mb-0">24</h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
              <i class="ni ni-circle-08 text-lg opacity-10"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-sm-6 mb-4">
    <div class="card stat-card border-0 shadow">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Active Classes</p>
              <h5 class="font-weight-bolder mb-0">18</h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
              <i class="ni ni-hat-3 text-lg opacity-10"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-sm-6 mb-4">
    <div class="card stat-card border-0 shadow">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">System Health</p>
              <h5 class="font-weight-bolder mb-0">100%</h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
              <i class="ni ni-laptop text-lg opacity-10"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-sm-6 mb-4">
    <div class="card stat-card border-0 shadow">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Pending Tasks</p>
              <h5 class="font-weight-bolder mb-0">7</h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
              <i class="ni ni-bullet-list-67 text-lg opacity-10"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <!-- Recent System Activity -->
  <div class="col-lg-7 mb-4">
    <div class="card shadow-lg border-0 h-100">
      <div class="card-header pb-0">
        <h6>Recent System Activity</h6>
        <p class="text-sm mb-0">Latest actions across the system</p>
      </div>
      <div class="card-body p-3">
        <div class="timeline timeline-one-side">
          <div class="timeline-block mb-3">
            <span class="timeline-step bg-gradient-success">
              <i class="ni ni-single-02 text-white"></i>
            </span>
            <div class="timeline-content">
              <h6 class="text-dark text-sm font-weight-bold mb-0">New student registered</h6>
              <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                Sarah Johnson - 2 minutes ago
              </p>
            </div>
          </div>
          <div class="timeline-block mb-3">
            <span class="timeline-step bg-gradient-info">
              <i class="ni ni-hat-3 text-white"></i>
            </span>
            <div class="timeline-content">
              <h6 class="text-dark text-sm font-weight-bold mb-0">New class created</h6>
              <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                LK 6-8 by Teacher Budi - 1 hour ago
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Admin Quick Actions -->
  <div class="col-lg-5 mb-4">
    <div class="card shadow-lg border-0 h-100">
      <div class="card-header pb-0">
        <h6>Administration</h6>
      </div>
      <div class="card-body p-3">
        <div class="d-grid gap-2">
          <a href="{{ route('users.index') }}" class="btn btn-sm bg-gradient-info mb-2">
            <i class="ni ni-circle-08 me-1"></i> User Management
          </a>
          <a href="{{ route('system.settings') }}" class="btn btn-sm bg-gradient-warning mb-2">
            <i class="ni ni-settings me-1"></i> System Settings
          </a>
          <a href="{{ route('reports.system') }}" class="btn btn-sm bg-gradient-success mb-2">
            <i class="ni ni-chart-bar-32 me-1"></i> System Reports
          </a>
          <a href="{{ route('backup.index') }}" class="btn btn-sm bg-gradient-primary">
            <i class="ni ni-archive-2 me-1"></i> Backup & Restore
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection