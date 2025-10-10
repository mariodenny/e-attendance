@extends('layouts.argon')

@section('title', 'My Profile')

@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Profile Information</h5>
      </div>
      <div class="card-body">
        <div class="text-center">
          <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
            <i class="ni ni-single-02 text-white opacity-10"></i>
          </div>
          <h5 class="mt-3">{{ auth()->user()->username }}</h5>
          <span class="badge bg-gradient-{{ 
            auth()->user()->role == 'SA' ? 'danger' : 
            (auth()->user()->role == 'ADMIN' ? 'warning' : 
            (auth()->user()->role == 'MANAGER' ? 'info' : 'success')) 
          }}">
            {{ auth()->user()->role }}
          </span>
        </div>
        
        <hr class="horizontal dark">
        
        <div class="mt-3">
          <div class="d-flex justify-content-between">
            <span class="text-sm">Email:</span>
            <span class="text-sm font-weight-bold">{{ auth()->user()->email }}</span>
          </div>
          <div class="d-flex justify-content-between mt-2">
            <span class="text-sm">Member since:</span>
            <span class="text-sm font-weight-bold">{{ auth()->user()->created_at->format('M Y') }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Edit Profile</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('profile.update') }}" method="POST">
          @csrf
          @method('PUT')
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Username</label>
                <input class="form-control" type="text" name="username" 
                       value="{{ old('username', auth()->user()->username) }}" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Email address</label>
                <input class="form-control" type="email" name="email" 
                       value="{{ old('email', auth()->user()->email) }}" required>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Current Password</label>
                <input class="form-control" type="password" name="current_password" 
                       placeholder="Enter current password">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">New Password</label>
                <input class="form-control" type="password" name="new_password" 
                       placeholder="Enter new password">
              </div>
            </div>
          </div>
          
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Update Profile</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection