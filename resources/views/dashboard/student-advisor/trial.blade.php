@extends('layouts.dashboard')
@section('title','Form Trial Students ')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card card-frame">
            <div class="card-body">
                <h3>Add Trial Student Class</h3>
                <div class="form-group">
                    <form action="{{ route('student-advisor.trial.save') }}" method="POST">
                        <!--TODO :: Design form insert-->
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Module">Module</label>
                                    <select class="form-control" id="" name="m_module_id">
                                        @foreach ($modules as $module)
                                        <option value="{{ $module->id }}">{{ $module->category->name }} -
                                            {{ $module->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="Module">Teacher</label>
                                <select class="form-control" id="" name="teacher_id">
                                    @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }} - {{ $teacher->level }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" placeholder="Student Name"
                                        name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Contact Person" class="form-control"
                                        name="contact_person" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id=""
                                        placeholder="Phone Number e.g 0813xxxxxx" name="phone_no">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="datetime-local" placeholder="date" class="form-control" name="date" />
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn bg-gradient-info">Submit</button>
                    </form>
                </div>
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-frame">
            <div class="card-body">
                <h3>Remind Upcoming Trial</h3>

                @forelse ($upcomingTrials as $trial)
                <div
                    class="m-3 p-3 border-0 rounded-3 bg-gradient-info d-flex justify-content-between align-items-center">
                    <div>
                        <span class="fw-semibold text-white">
                            {{ $trial->student_name ?? 'Unknown Student' }}
                        </span>
                        <br>
                        <small class="text-white-50">
                            {{ $trial->trial_date->format('d M Y, H:i') }}
                        </small>
                    </div>
                    <span class="badge bg-light text-dark">{{ $trial->module?->name ?? '-' }}</span>
                </div>
                @empty
                <div class="m-3 p-3 border-0 rounded-3 bg-gradient-secondary text-center text-white">
                    No upcoming trials in the next 2 days.
                </div>
                @endforelse
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col mt-2 p2">
        <div class="card card-frame">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Module</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Teacher</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Datetime</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Phone</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Status</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"
                                            colspan="3">Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($trials as $trial)
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">{{ $trial->name ?? '-' }}</h6>
                                        </td>

                                        <td>
                                            <span class="mb-0">
                                                {{ $trial->module?->name ?? '-' }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="mb-0">
                                                {{ $trial->teacher?->name ?? '-' }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="mb-0">
                                                {{ $trial->date  }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="mb-0">
                                                {{ $trial->contact_person ?? '-' }} -
                                                {{ $trial->phone_no ?? '-' }}
                                            </span>
                                        </td>

                                        <td>
                                            @php
                                            $badgeClass = match($trial->status) {
                                            'ENROLL' => 'bg-gradient-success',
                                            'JOIN' => 'bg-gradient-info',
                                            'PENDING' => 'bg-gradient-warning',
                                            'CANCEL' => 'bg-gradient-danger',
                                            default => 'bg-secondary'
                                            };
                                            @endphp
                                            <span class="mb-0 badge {{ $badgeClass }}">
                                                {{ ucfirst(strtolower($trial->status ?? 'Unknown')) }}
                                            </span>
                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm bg-gradient-primary dropdown-toggle"
                                                    type="button" id="dropdownMenuButton{{ $trial->id }}"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu"
                                                    aria-labelledby="dropdownMenuButton{{ $trial->id }}">
                                                    @foreach(['join', 'cancel'] as $action)
                                                    <li>
                                                        <form method="POST"
                                                            action="{{ route('student-advisor.trial.update', $trial->id) }}"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status"
                                                                value="{{ strtoupper($action) }}">
                                                            <button type="submit" class="dropdown-item fw-bold">
                                                                {{ ucfirst($action) }}
                                                            </button>
                                                        </form>
                                                    </li>
                                                    @endforeach
                                                    <li>
                                                       <a href="#" class="dropdown-item fw-bold"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modal-update-student">
                                                            Enroll
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="dropdown-item fw-bold"
                                                            data-bs-toggle="modal" data-bs-target="#modal-reschedule">
                                                            Reschedule
                                                        </a>

                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-muted">
                                            No trial data available.
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal: Update Student Data -->
<div class="modal fade" id="modal-update-student" tabindex="-1" role="dialog" aria-labelledby="modal-update-student"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                        <h3 class="font-weight-bolder text-info text-gradient">Complete Student Information</h3>
                        <p class="mb-0">Please fill in all required details before confirming enrollment</p>
                    </div>

                    <div class="card-body">
                        <form role="form text-left" id="updateStudentForm">

                            <!-- Module Selection -->
                            <label>Module</label>
                            <div class="input-group mb-3">
                                <select name="m_module_id" class="form-control" required>
                                    <option value="">-- Select Module --</option>
                                    <option value="1">Python Programming</option>
                                    <option value="2">Web Development</option>
                                    <option value="3">Roblox Game Development</option>
                                    <option value="4">Minecraft Coding</option>
                                    <option value="5">Mobile App Design</option>
                                   
                                </select>
                            </div>

                            <label>Full Name</label>
                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Enter full name"
                                    required>
                            </div>

                            <label>Date of Birth</label>
                            <div class="input-group mb-3">
                                <input type="date" name="date_of_birth" class="form-control">
                            </div>

                            <label>Address</label>
                            <div class="input-group mb-3">
                                <input type="text" name="address" class="form-control" placeholder="Enter address">
                            </div>

                            <label>Email</label>
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Enter email"
                                    required>
                            </div>

                            <label>School</label>
                            <div class="input-group mb-3">
                                <input type="text" name="school" class="form-control" placeholder="Enter school name">
                            </div>

                            <label>Parent / Guardian Name</label>
                            <div class="input-group mb-3">
                                <input type="text" name="contact_person" class="form-control"
                                    placeholder="Enter parent or guardian name">
                            </div>

                            <label>Parent Phone Number</label>
                            <div class="input-group mb-3">
                                <input type="text" name="phone_no" class="form-control"
                                    placeholder="Enter parent phone number">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">
                                    Save Data
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                        <p class="mb-4 text-sm mx-auto">
                            Please make sure all details are correct before saving.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal: Reschedule Trial Class -->
<div class="modal fade" id="modal-reschedule" tabindex="-1" role="dialog" aria-labelledby="modal-reschedule" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 text-left">
            <h3 class="font-weight-bolder text-info text-gradient">Reschedule Class</h3>
            <p class="mb-0">Review the current schedule and set a new one below</p>
          </div>

          <div class="card-body">
            <form role="form text-left" id="rescheduleForm">

              <!-- Previous Schedule -->
              <label>Current Schedule</label>
              <div class="input-group mb-3">
                <input type="datetime-local" name="old_date" class="form-control" disabled
                       value="2025-10-30T14:00">
              </div>

              <!-- New Schedule -->
              <label>New Schedule</label>
              <div class="input-group mb-3">
                <input type="datetime-local" name="new_date" class="form-control" required>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">
                  Save Changes
                </button>
              </div>
            </form>
          </div>

          <div class="card-footer text-center pt-0 px-lg-2 px-1">
            <p class="mb-4 text-sm mx-auto">
              Make sure to notify the student after rescheduling.
            </p>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
