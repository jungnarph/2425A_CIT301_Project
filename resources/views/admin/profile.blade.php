@extends('admin.layouts.layout')

@section('admin_title')
    Profile | EasyCars Admin
@endsection

@section('main_panel')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <h1 class="h2">Edit Profile</h1>
        </div>
    </div>

    <!-- Additional content goes here -->
    @if ($errors->any())
        <div class="alert custom-alert-danger" style="padding: 0.5rem;">
            <ul style="margin-bottom: 0; padding: 0.5rem; list-style: none">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert custom-alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container-fluid">
        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" value="{{ $user->username }}" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="usertype">User Type</label>
                    <select class="form-control" id="usertype" name="usertype" disabled>
                        <option value="" disabled selected>Select user type</option>
                        <option value="Admin" {{ $user->usertype === 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                        <option value="Admin" {{ $user->usertype === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="User" {{ $user->usertype === 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="First_name">First Name</label>
                    <input type="text" class="form-control" name="First_name" value="{{ $user->First_name }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="Middle_name">Middle Name</label>
                    <input type="text" class="form-control" name="Middle_name" value="{{ $user->Middle_name ?? '' }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="Last_name">Last Name</label>
                    <input type="text" class="form-control" name="Last_name" value="{{ $user->Last_name }}" required>
                </div>
                <div class="col-12 mb-5">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}" required>
                </div>
            </div>

            <h5>Update Password</h5>
            <hr>
           

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" name="current_password" placeholder="Enter current password">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" name="new_password" placeholder="Enter new password">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="new_password_confirmation ">Retype Password</label>
                    <input type="password" class="form-control" name="new_password_confirmation" placeholder="Retype password">
                </div>
            </div>

            <div class="form-group row create-form-buttons">
                <div class="col">
                    <a href="{{ route('admin') }}" class="btn btn-secondary">Back</a>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection