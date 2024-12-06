@extends('admin.layouts.layout')

@section('admin_title')
User Details | EasyCars Admin
@endsection

@section('main_panel')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <h1 class="h2">User Details</h1>
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

    <div class="container-fluid">
        <form>
            @csrf
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" value="{{ $user->username }}" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="usertype">User Type</label>
                    <select class="form-control" id="usertype" name="usertype" disabled>
                        <option value="" disabled selected>Select user type</option>
                        <option value="Admin" {{ $user->usertype === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="User" {{ $user->usertype === 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="First_name">First Name</label>
                    <input type="text" class="form-control" name="First_name" value="{{ $user->First_name }}" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="Middle_name">Middle Name</label>
                    <input type="text" class="form-control" name="Middle_name" value="{{ $user->Middle_name ?? '' }}" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="Last_name">Last Name</label>
                    <input type="text" class="form-control" name="Last_name" value="{{ $user->Last_name }}" disabled>
                </div>
                <div class="col-12 mb-3">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}" disabled>
                </div>
                @if($user->usertype === 'user')
                <div class="col-12 mb-3">
                    <label for="Contact_number">Contact number</label>
                    <input type="text" class="form-control" name="Contact_number" value="{{ $user->Contact_number ?? 'N/A' }}" disabled>
                </div>
                <div class="col-12 mb-3">
                    <label for="Driver_license_ID">Driver License ID</label>
                    <input type="text" class="form-control" name="Driver_license_ID" value="{{ $user->Driver_license_ID ?? 'N/A' }}" disabled>
                </div>
                @endif
            </div>

            <div class="form-group row create-form-buttons">
                <div class="col">
                    <a href="{{ route('manage.users') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection