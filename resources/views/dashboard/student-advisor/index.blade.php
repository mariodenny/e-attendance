@extends('layouts.dashboard')

@section('title', 'Student Advisor Dashboard')

@section('welcome-title', 'Student Success Center')
@section('welcome-subtitle', 'Monitor student progress and provide academic guidance')

@section('content')
<div class="row">
  <!-- Student Metrics -->
  <div class="col-xl-3 col-sm-6 mb-4">
    <div class="card stat-card border-0 shadow">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Assigned Students</p>
              <h5 class="font-weight-bolder mb-0">45</h5>
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
              <p class="text-sm mb-0 text-uppercase font-weight-bold">At Risk</p>
              <h5 class="font-weight-bolder mb-0">3</h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
              <i class="ni ni-notification-70 text-lg opacity-10"></i>
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
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Trial Students</p>
              <h5 class="font-weight-bolder mb-0">12</h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
              <i class="ni ni-spaceship text-lg opacity-10"></i>
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
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Conversion Rate</p>
              <h5 class="font-weight-bolder mb-0">68%</h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
              <i class="ni ni-chart-bar-32 text-lg opacity-10"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <!-- Students Needing Attention -->
  <div class="col-lg-8 mb-4">
    <div class="card shadow-lg border-0 h-100">
      <div class="card-header pb-0 bg-gradient-danger">
        <h6 class="text-white">Students Needing Attention</h6>
        <p class="text-white opacity-8 mb-0">Follow up required for these students</p>
      </div>
      <div class="card-body p-3">
        <div class="table-responsive">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Class</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Issue</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Days</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Ahmad Rizki</h6>
                      <p class="text-xs text-secondary mb-0">Low attendance</p>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-sm font-weight-bold mb-0">JK 8-12</p>
                </td>
                <td>
                  <span class="badge badge-sm bg-gradient-warning">Attendance</span>
                </td>
                <td>
                  <span class="text-sm font-weight-bold">5 days</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Advisor Actions -->
  <div class="col-lg-4 mb-4">
    <div class="card shadow-lg border-0 h-100">
      <div class="card-header pb-0">
        <h6>Advisor Actions</h6>
      </div>
      <div class="card-body p-3">
        <div class="d-grid gap-2">
          <a href="{{ route('students.advisor') }}" class="btn btn-sm bg-gradient-info mb-2">
            <i class="ni ni-single-02 me-1"></i> My Students
          </a>
          <a href="{{ route('reports.progress') }}" class="btn btn-sm bg-gradient-success mb-2">
            <i class="ni ni-chart-bar-32 me-1"></i> Progress Reports
          </a>
          <a href="{{ route('trial.students') }}" class="btn btn-sm bg-gradient-warning mb-2">
            <i class="ni ni-spaceship me-1"></i> Trial Students
          </a>
          <a href="{{ route('communications.index') }}" class="btn btn-sm bg-gradient-primary">
            <i class="ni ni-send me-1"></i> Parent Communications
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection