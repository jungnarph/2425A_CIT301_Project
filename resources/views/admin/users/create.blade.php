@extends('admin.layouts.layout')

@section('admin_title')
    Create New User
@endsection

@section('main_panel')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <h1 class="h2">Create New User</h1>
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
        <form action="{{ route('store.user') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter username" required>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="First_name">First Name</label>
                        <input type="text" class="form-control" name="First_name" placeholder="First Name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Middle_name">Middle Name</label>
                        <input type="text" class="form-control" name="Middle_name" placeholder="Middle Name (Optional)">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Last_name">Last Name</label>
                        <input type="text" class="form-control" name="Last_name" placeholder="Last Name" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="usertype">User Type</label>
                <select class="form-control" name="usertype" required>
                    <option value="" disabled selected>Select user type</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" class="form-control" name="email" placeholder="Enter email address" required>
            </div>

            <div class="form-group">
                <label for="Contact_number">Contact number</label>
                <input type="text" class="form-control" name="Contact_number" placeholder="Enter contact number (Optional)">
            </div>

            <div class="form-group">
                <label for="Driver_license_ID">Driver License ID</label>
                <input type="text" class="form-control" name="Driver_license_ID" placeholder="Enter driver license ID (Optional)">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Retype Password</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Re-enter password" required>
            </div>

            <div class="form-group row create-form-buttons">
                <div class="col">
                    <a href="/admin/users/manage" class="btn btn-secondary">Cancel</a>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection