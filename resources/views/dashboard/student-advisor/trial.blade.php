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
                                                    <li><a class="dropdown-item" href="#">Reschedule</a></li>
                                                    <li><a class="dropdown-item" href="#">Join</a></li>
                                                    <li><a class="dropdown-item" href="#">Enroll</a></li>
                                                    <li><a class="dropdown-item" href="#">Cancel</a></li>
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

@endsection
