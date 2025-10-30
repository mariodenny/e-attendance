@extends('layouts.dashboard')

@section('title', 'Teacher Dashboard')

@section('welcome-title')
Welcome, {{ $teacherData->name }}
@endsection

@section('welcome-subtitle', 'Guide your students through their first coding experience')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h4 class="mb-2 ">Trial Classes in {{ $todayMonth }} - {{ $todayYear }}</h4>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Module
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Time
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trials as $trial)
                        <tr>
                            <td>
                                <div class="my-auto">
                                    <h6 class="mb-0 text-xs">{{ $trial->name ?? '-' }}</h6>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $trial->module?->name ?? '-' }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $trial->date }}</p>
                            </td>
                            <td>
                                <span class="badge badge-dot me-4">
                                    <i class="bg-info"></i>
                                    <span class="text-dark text-xs">{{ $trial->status }}</span>
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-3">
                                No trial classes found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h5 class="mb-0">Pending Feedback</h5>
            </div>
            <div class="card-body pt-4 p-3">
                <ul class="list-group">
                    @if($pendingFeedback)
                        @forelse ($pendingFeedback as $feedback)
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm">{{ $feedback->name }}</h6>
                                <span class="mb-2 text-xs">Module: 
                                    <span class="text-dark font-weight-bold ms-sm-2">
                                        {{ $feedback?->module?->name ?? 'Unknown Module' }}
                                    </span>
                                </span>
                                <span class="mb-2 text-xs">Datetime: 
                                    <span class="text-dark ms-sm-2 font-weight-bold">
                                        {{ \Carbon\Carbon::parse($feedback->date)->format('l, j M Y : H.i') }}
                                    </span>
                                </span>
                            </div>
                            <div class="ms-auto text-end">
                                <!-- Button trigger modal dengan ID unique -->
                                <button type="button" class="btn bg-gradient-success btn-block mb-3" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#feedbackModal{{ $feedback->id }}">
                                    Feedback
                                </button>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-lg text-muted">No Pending feedback! Nice job!</h6>
                            </div>
                        </li>
                        @endforelse
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk setiap feedback -->
@if($pendingFeedback)
    @foreach ($pendingFeedback as $feedback)
    <div class="modal fade" id="feedbackModal{{ $feedback->id }}" tabindex="-1" role="dialog"
        aria-labelledby="feedbackModalLabel{{ $feedback->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feedbackModalLabel{{ $feedback->id }}">Feedback Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('teacher.trial.feedback', $feedback->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="student-name-{{ $feedback->id }}" class="col-form-label">Student's Name</label>
                            <input type="text" class="form-control" 
                                value="{{ $feedback->name }}" 
                                id="student-name-{{ $feedback->id }}" 
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="module-{{ $feedback->id }}" class="col-form-label">Module</label>
                            <input type="text" class="form-control" 
                                value="{{ $feedback?->module?->name ?? 'Unknown Module' }}" 
                                id="module-{{ $feedback->id }}" 
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="message-text-{{ $feedback->id }}" class="col-form-label">Feedback Message:</label>
                            <textarea class="form-control" 
                                id="message-text-{{ $feedback->id }}" 
                                name="feedback"
                                rows="8" 
                                placeholder="Enter your feedback here..."></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn bg-gradient-primary">Submit Feedback</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif

@endsection