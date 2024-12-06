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
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter username" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="usertype">User Type</label>
                    <select class="form-control" id="usertype" name="usertype" required>
                        <option value="" disabled selected>Select user type</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="First_name">First Name</label>
                    <input type="text" class="form-control" name="First_name" placeholder="First Name" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="Middle_name">Middle Name</label>
                    <input type="text" class="form-control" name="Middle_name" placeholder="Middle Name (Optional)">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="Last_name">Last Name</label>
                    <input type="text" class="form-control" name="Last_name" placeholder="Last Name" required>
                </div>
                <div class="col-12 mb-3">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email address" required>
                </div>
                <div class="col-12 mb-3">
                    <label for="Contact_number">Contact number</label>
                    <input type="text" class="form-control" id="Contact_number" name="Contact_number" placeholder="Enter contact number (for Users)" disabled>
                </div>

                <div class="col-12 mb-3">
                    <label for="Driver_license_ID">Driver License ID</label>
                    <input type="text" class="form-control" id="Driver_license_ID" name="Driver_license_ID" placeholder="Enter driver license ID (for Users)" disabled>
                </div>

                <div class="col-12 mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                </div>

                <div class="col-12">
                    <label for="password_confirmation">Retype Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Re-enter password" required>
                </div>
            </div>

            <div class="form-group row create-form-buttons">
                <div class="col">
                    <a href="{{ route('manage.users') }}" class="btn btn-secondary">Cancel</a>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('admin_scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const usertypeSelect = document.getElementById('usertype');
            const driverLicenseField = document.getElementById('Driver_license_ID');
            const contactNumberField = document.getElementById('Contact_number');

            usertypeSelect.addEventListener('change', function () {
                if (usertypeSelect.value === 'user') {
                    driverLicenseField.disabled = false;
                    driverLicenseField.required = true;

                    contactNumberField.disabled = false;
                    contactNumberField.required = true;
                } else {
                    driverLicenseField.disabled = true;
                    driverLicenseField.required = false;
                    driverLicenseField.value = '';

                    contactNumberField.disabled = true;
                    contactNumberField.required = false;
                    contactNumberField.value = '';
                }
            });
        });
    </script>
@endsection