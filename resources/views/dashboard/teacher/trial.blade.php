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
              <h4 class="mb-2 ">Trial Classes in October 2025</h4>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Module</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Time</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Trial Class in a month (eg. start 26 October - 25 November ) -->
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
                <!-- LIST PENDING FEEDBACK -->
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Oliver Liam</h6>
                    <span class="mb-2 text-xs">Module: <span class="text-dark font-weight-bold ms-sm-2">Roblox II</span></span>
                    <span class="mb-2 text-xs">Datetime: <span class="text-dark ms-sm-2 font-weight-bold">Sunday, 8 Aug 2025 : 14.30</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <!-- button feedback -->
                     <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">Feedback
                    </button>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>    
</div>
<div class="row mt-3">
    
</div>


  <div class="col-md-4">
    <!-- Modal -->
    <div class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Feedback Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Student's Name </label>
                <input type="text" class="form-control" value="Oliver" id="recipient-name" disabled>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text" rows="10"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn bg-gradient-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection