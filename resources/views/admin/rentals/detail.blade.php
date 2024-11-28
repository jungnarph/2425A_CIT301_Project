@extends('admin.layouts.layout')

@section('admin_title')
    Rental Details | EasyCars Admin
@endsection

@section('main_panel')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <h1 class="h2">Rental Details</h1>
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
            <div class="form-group">
                <label for="rental_id">Rental ID / Reservation ID</label>
                <input type="text" class="form-control" id="rental_id" name="rental_id" value="{{ $rental->id . ' / ' . $rental->reservation_id ?? 'No reservation placed' }}" disabled>
            </div>

            <div class="form-group">
                <label for="status">Rental Status</label>
                <input type="text" class="form-control" id="reservation_status" name="status" value="{{ $rental->status }}" disabled>
            </div>

            <hr>

            <div class="form-group">
                <label for="username">User ID / Username / Name</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $rental->user_id . ' / ' . $rental->user->username . ' / ' . $rental->user->First_name . ' ' . $rental->user->Last_name }}" disabled>
            </div>

            <div class="form-group">
                <label for="car_model_name_plate_number">Car / Plate Number</label>
                <input type="text" class="form-control" id="car_model_name_plate_number" name="car_model_name_plate_number" value="{{ $rental->car->carModel->model_name . ' / ' . $rental->car->plate_number }}" disabled>
            </div>

            <div class="form-group">
                <label for="pickup_dt">Pickup Date and Time</label>
                <input type="text" class="form-control" id="pickup_dt" name="pickup_dt" value="{{ $rental->pickup_dt ?? 'Not picked up yet'}}" disabled>
            </div>

            <div class="form-group">
                <label for="pickup_location">Pickup Location</label>
                <input type="text" class="form-control" id="pickup_location" name="pickup_location" value="{{ $rental->pickup_location ?? 'Not picked up yet'}}" disabled>
            </div>

            <div class="form-group">
                <label for="return_dt">Return Date and Time</label>
                <input type="text" class="form-control" id="return_dt" name="return_dt" value="{{ $rental->return_dt ?? 'Not returned yet'}}" disabled>
            </div>

            <div class="form-group">
                <label for="return_location">Return Location</label>
                <input type="text" class="form-control" id="return_location" name="return_location" value="{{ $rental->return_location ?? 'Not returned yet'}}" disabled>
            </div>

            <div class="form-group row create-form-buttons">
                <div class="col">
                    <a href="{{ route('manage.rentals') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection