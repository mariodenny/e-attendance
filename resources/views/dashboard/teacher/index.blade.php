@extends('layouts.dashboard')

@section('title', 'Teacher Dashboard')

@section('welcome-title')
    Welcome, {{ $teacherData->name }}
@endsection

@section('welcome-subtitle', 'Manage your classes and track student progress')

@section('content')
<div class="row">
  <!-- Quick Stats -->
  <div class="col-xl-3 col-sm-6 mb-4">
    <div class="card stat-card border-0 shadow">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Classes</p>
              <h5 class="font-weight-bolder mb-0">{{ $totalClasses }}</h5>
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
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Students</p>
              <h5 class="font-weight-bolder mb-0">{{ $totalStudents }}</h5>
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
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Pending Attendance</p>
              <h5 class="font-weight-bolder mb-0">3</h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
              <i class="ni ni-check-bold text-lg opacity-10"></i>
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
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Lessons This Week</p> <!--TODO : Nanti add count by week perkelas -->
              <h5 class="font-weight-bolder mb-0">12</h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
              <i class="ni ni-books text-lg opacity-10"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <!-- Today's Classes -->
  <div class="col-lg-8 mb-4">
    <div class="card shadow-lg border-0 h-100">
      <div class="card-header pb-0">
        <h6>Today's Classes</h6>
        <p class="text-sm mb-0">
          <i class="ni ni-watch-time text-info me-1"></i>
          Your schedule for today
        </p>
      </div>
      <div class="card-body p-3">
        <div class="timeline timeline-one-side">
          <div class="timeline-block mb-3">
            <span class="timeline-step bg-gradient-success">
              <i class="ni ni-hat-3 text-white"></i>
            </span>
            <div class="timeline-content">
              <h6 class="text-dark text-sm font-weight-bold mb-0">LK 4-6 - Basic Scratch</h6>
              <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                09:00 - 10:30 • Room A
              </p>
            </div>
          </div>
          <div class="timeline-block mb-3">
            <span class="timeline-step bg-gradient-info">
              <i class="ni ni-hat-3 text-white"></i>
            </span>
            <div class="timeline-content">
              <h6 class="text-dark text-sm font-weight-bold mb-0">JK 8-12 - Web Development</h6>
              <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                11:00 - 12:30 • Room B
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Actions -->
  <div class="col-lg-4 mb-4">
    <div class="card shadow-lg border-0 h-100">
      <div class="card-header pb-0">
        <h6>Quick Actions</h6>
      </div>
      <div class="card-body p-3">
        <div class="d-grid gap-2">
          <a href="" class="btn btn-sm btn-success mb-2">
            <i class="ni ni-check-bold me-1"></i> Take Attendance
          </a>
          <a href="" class="btn btn-sm btn-info mb-2">
            <i class="ni ni-hat-3 me-1"></i> My Classes
          </a>
          <a href="" class="btn btn-sm btn-warning mb-2">
            <i class="ni ni-single-02 me-1"></i> Student Progress
          </a>
          <a href="" class="btn btn-sm btn-primary">
            <i class="ni ni-books me-1"></i> Lesson Materials
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection