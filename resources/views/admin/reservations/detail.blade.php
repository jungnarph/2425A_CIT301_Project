@extends('admin.layouts.layout')

@section('admin_title')
    Reservation Details | EasyCars Admin
@endsection

@section('main_panel')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <h1 class="h2">Reservation Details</h1>
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
            <div class="row">
                <div class="col-lg-3 mt-2 mb-2">
                    <label for="reservation_id">Reservation ID</label>
                    <input type="text" class="form-control" id="reservation_id" name="reservation_id" value="{{ $reservation->id }}" disabled>
                </div>
                <div class="col-lg-5 mt-2 mb-2">
                    <label for="user_id">UserID / Username / Name</label>
                    <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $reservation->user_id . ' / ' . $reservation->user->username . ' / ' . $reservation->user->First_name . ' ' . $reservation->user->Last_name }}" disabled>
                </div>
                <div class="col-lg-4 mt-2 mb-2">
                    <label for="car_model_id">Car Model</label>
                    <input type="text" class="form-control" id="car_model_id" name="car_model_id" value="{{ $reservation->carModel->model_name }}" disabled>
                </div>
                <div class="col-lg-3 col-6 mt-2">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="reservation_status" name="status" value="{{ $reservation->status }}" disabled>
                </div>   
                <div class="col-lg-3 col-6 mt-2 mb-2 ">
                    <label for="has_insurance">Has Insurance</label>
                    <input type="text" class="form-control" id="has_insurance" name="has_insurance" value="{{ $reservation->has_insurance === '1' ? 'Yes' : 'No' }}" disabled>
                </div>
                <div class="col-lg-4 col-8 mt-2 ">
                    <label for="total_amount">Total Amount</label>
                    <input type="text" class="form-control" id="total_amount" name="total_amount" value="₱{{ number_format($reservation->total_amount, 2) }}" disabled>
                </div>
                <div class="col-lg-2 col-4 mt-2 mb-4">
                    <label for="is_paid">Paid</label>
                    <input type="text" class="form-control" id="is_paid" name="is_paid" value="{{ $reservation->is_paid === '1' ? 'Yes' : 'No' }}" disabled>
                </div>

                <hr>

                <div class="col-lg-4 mt-2 mb-2">
                    <label for="reserved_pickup_dt">Reserved Pickup Date</label>
                    <input type="text" class="form-control" id="reserved_pickup_dt" name="reserved_pickup_dt" value="{{ $reservation->pickup_dt }}" disabled>
                </div>
                <div class="col-lg-8 mt-2 mb-2">
                    <label for="reserved_pickup_location">Reserved Pickup Location</label>
                    <input type="text" class="form-control" id="reserved_pickup_location" name="reserved_pickup_location" value="{{ $reservation->pickup_location }}" disabled>
                </div>
                <div class="col-lg-4 mt-2 mb-2">
                    <label for="reserved_return_dt">Reserved Return Date</label>
                    <input type="text" class="form-control" id="reserved_return_dt" name="reserved_return_dt" value="{{ $reservation->return_dt }}" disabled>
                </div>
                <div class="col-lg-8 mt-2 mb-4">
                    <label for="reserved_return_dt">Reserved Return Location</label>
                    <input type="text" class="form-control" id="reserved_return_dt" name="reserved_return_dt" value="{{ $reservation->return_location }}" disabled>
                </div>
            </div>
            

           

            

            

            <div class="form-group row create-form-buttons">
                <div class="col">
                    <a href="{{ route('manage.reservations') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection