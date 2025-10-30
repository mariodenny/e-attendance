@extends('layouts.dashboard')
@section('title','Form Trial Students ')
@section('welcome-title','Student Advisor')
@section('welcome-subtitle','Trial student and student enrollment')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-frame">
            <div class="card-body">
                <h3>Add Trial Student Class</h3>
                <form action="{{ route('student-advisor.trial.save') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Module</label>
                            <select class="form-control" name="m_module_id">
                                @foreach ($modules as $module)
                                <option value="{{ $module->id }}">{{ $module->category->name }} - {{ $module->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Teacher</label>
                            <select class="form-control" name="teacher_id">
                                @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }} - {{ $teacher->level }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6"><input type="text" class="form-control" placeholder="Student Name"
                                name="name"></div>
                        <div class="col-md-6"><input type="text" class="form-control" placeholder="Contact Person"
                                name="contact_person"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6"><input type="text" class="form-control" placeholder="Phone Number"
                                name="phone_no"></div>
                        <div class="col-md-6"><input type="datetime-local" class="form-control" name="date"></div>
                    </div>

                    <button type="submit" class="btn bg-gradient-info mt-3">Submit</button>
                </form>

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-3">{{ session('error') }}</div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-frame">
            <div class="card-body">
                <h3>Remind Upcoming Trial</h3>
                @forelse ($upcomingTrials as $trial)
                <div class="m-2 p-2 rounded-3 bg-gradient-info d-flex justify-content-between align-items-center">
                    <div>
                        <span class="fw-semibold text-white">{{ $trial->name ?? 'Unknown Student' }}</span><br>
                        <small class="text-white-50">{{ $trial?->date ?? '-' }}</small>
                        <span class="badge bg-light text-dark mt-2">
                            {{ $trial->module?->name ?? '-' }} :
                            {{ $trial->teacher?->gender == 'Men' ? 'Sir' : 'Miss' }} {{ $trial->teacher?->name ?? '-' }}
                        </span>
                    </div>
                </div>
                @empty
                <div class="m-3 p-3 rounded-3 bg-gradient-secondary text-center text-white">
                    No upcoming trials.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col mt-2 p-2">
        <div class="card card-frame text-center">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Module</th>
                                <th>Teacher</th>
                                <th>Datetime</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($trials as $trial)
                            <tr>
                                <td>{{ $trial->name ?? '-' }}</td>
                                <td>{{ $trial->module?->name ?? '-' }}</td>
                                <td>{{ $trial->teacher?->name ?? '-' }}</td>
                                <td>{{ $trial->date }}</td>
                                <td>{{ $trial->contact_person ?? '-' }} - {{ $trial->phone_no ?? '-' }}</td>
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
                                    <span
                                        class="badge {{ $badgeClass }}">{{ ucfirst(strtolower($trial->status ?? 'Unknown')) }}</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm bg-gradient-primary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            @foreach(['join', 'cancel'] as $action)
                                            <li>
                                                <form method="POST"
                                                    action="{{ route('student-advisor.trial.update', $trial->id) }}"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status"
                                                        value="{{ strtoupper($action) }}">
                                                    <button type="submit"
                                                        class="dropdown-item fw-bold">{{ ucfirst($action) }}</button>
                                                </form>
                                            </li>
                                            @endforeach
                                            <li>
                                                <a href="#" class="dropdown-item fw-bold btn-enroll"
                                                    data-trial-id="{{ $trial->id }}">
                                                    Enroll
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown-item fw-bold btn-reschedule"
                                                    data-trial-id="{{ $trial->id }}"
                                                    data-trial-date="{{ $trial->date }}">
                                                    Reschedule
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No trial data available.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Enroll -->
<div class="modal fade" id="modal-enroll" tabindex="-1" aria-labelledby="modal-enroll" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                        <h3 class="font-weight-bolder text-info text-gradient">Complete Student Information</h3>
                        <p class="mb-0">Please fill in all required details before confirming enrollment</p>
                    </div>
                    <div class="card-body">
                        <form id="enrollForm" method="POST">
                            @csrf
                            <label>Module</label>
                            <select name="m_module_id" class="form-control mb-3" required>
                                @foreach ($modules as $module)
                                <option value="{{ $module->id }}">{{ $module->category->name }} - {{ $module->name }}
                                </option>
                                @endforeach
                            </select>

                            <input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>
                            <input type="date" name="date_of_birth" class="form-control mb-3">
                            <input type="text" name="address" class="form-control mb-3" placeholder="Address">
                            <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
                            <input type="text" name="school" class="form-control mb-3" placeholder="School">
                            <input type="text" name="contact_person" class="form-control mb-3"
                                placeholder="Parent/Guardian">
                            <input type="text" name="phone_no" class="form-control mb-3" placeholder="Phone Number">

                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100">Save Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Reschedule -->
<div class="modal fade" id="modal-reschedule" tabindex="-1" aria-labelledby="modal-reschedule" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                        <h3 class="font-weight-bolder text-info text-gradient">Reschedule Class</h3>
                    </div>
                    <div class="card-body">
                        <form id="rescheduleForm" method="POST">
                            @csrf
                            <label>Current Schedule</label>
                            <input type="datetime-local" id="old-date" class="form-control mb-3" disabled>
                            <label>New Schedule</label>
                            <input type="datetime-local" name="new_date" class="form-control mb-3" required>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const enrollModal = new bootstrap.Modal(document.getElementById('modal-enroll'));
        const rescheduleModal = new bootstrap.Modal(document.getElementById('modal-reschedule'));

        // ENROLL button
        document.querySelectorAll('.btn-enroll').forEach(btn => {
            btn.addEventListener('click', e => {
                e.preventDefault();
                const trialId = btn.dataset.trialId;
                const form = document.getElementById('enrollForm');
                form.action = `/student-advisor/trial/${trialId}/enroll`;
                enrollModal.show();
            });
        });

        // RESCHEDULE button
        document.querySelectorAll('.btn-reschedule').forEach(btn => {
            btn.addEventListener('click', e => {
                e.preventDefault();
                const trialId = btn.dataset.trialId;
                const trialDate = btn.dataset.trialDate;
                document.getElementById('old-date').value = trialDate;
                const form = document.getElementById('rescheduleForm');
                form.action = `/student-advisor/trial/${trialId}/reschedule`;
                rescheduleModal.show();
            });
        });
    });

</script>
@endpush
