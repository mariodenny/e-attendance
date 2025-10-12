@extends('layouts.dashboard')

@section('title', 'Manager Dashboard')

@section('welcome-title', 'Management Overview')
@section('welcome-subtitle', 'Monitor team performance and operational metrics')

@section('content')
<div class="row">
  <!-- Center Performance -->
  <div class="col-xl-3 col-sm-6 mb-4">
    <div class="card stat-card border-0 shadow">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Students</p>
              <h5 class="font-weight-bolder mb-0">156</h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
              <i class="ni ni-single-02 text-lg opacity-10"></i>
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
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Active Teachers</p>
              <h5 class="font-weight-bolder mb-0">8</h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
              <i class="ni ni-single-copy-04 text-lg opacity-10"></i>
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
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Monthly Revenue</p>
              <h5 class="font-weight-bolder mb-0">Rp 42.5M</h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
              <i class="ni ni-money-coins text-lg opacity-10"></i>
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
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Class Occupancy</p>
              <h5 class="font-weight-bolder mb-0">78%</h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
              <i class="ni ni-chart-pie-35 text-lg opacity-10"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <!-- Teacher Performance -->
  <div class="col-lg-7 mb-4">
    <div class="card shadow-lg border-0 h-100">
      <div class="card-header pb-0">
        <h6>Teacher Performance</h6>
        <p class="text-sm mb-0">Current month student satisfaction ratings</p>
      </div>
      <div class="card-body p-3">
        <div class="table-responsive">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Teacher</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Classes</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Rating</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Attendance</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Budi Santoso</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-sm font-weight-bold mb-0">4</p>
                </td>
                <td>
                  <span class="badge badge-sm bg-gradient-success">4.8/5</span>
                </td>
                <td>
                  <span class="text-sm font-weight-bold">96%</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Reports -->
  <div class="col-lg-5 mb-4">
    <div class="card shadow-lg border-0 h-100">
      <div class="card-header pb-0">
        <h6>Quick Reports</h6>
      </div>
      <div class="card-body p-3">
        <div class="d-grid gap-2">
          <a href="{{ route('reports.financial') }}" class="btn btn-sm bg-gradient-warning mb-2">
            <i class="ni ni-money-coins me-1"></i> Financial Report
          </a>
          <a href="{{ route('reports.attendance') }}" class="btn btn-sm bg-gradient-info mb-2">
            <i class="ni ni-check-bold me-1"></i> Attendance Summary
          </a>
          <a href="{{ route('reports.performance') }}" class="btn btn-sm bg-gradient-success mb-2">
            <i class="ni ni-chart-bar-32 me-1"></i> Performance Analytics
          </a>
          <a href="{{ route('teachers.index') }}" class="btn btn-sm bg-gradient-primary">
            <i class="ni ni-single-copy-04 me-1"></i> Teacher Management
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection