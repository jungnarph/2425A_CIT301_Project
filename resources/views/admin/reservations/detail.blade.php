@extends('admin.layouts.layout')

@section('admin_title')
    Reservation Details
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
            <div class="form-group">
                <label for="reservation_id">Reservation ID</label>
                <input type="text" class="form-control" id="reservation_id" name="reservation_id" value="{{ $reservation->id }}" disabled>
            </div>

            <div class="form-group">
                <label for="status">Reservation Status</label>
                <input type="text" class="form-control" id="reservation_status" name="status" value="{{ $reservation->status }}" disabled>
            </div>

            <div class="form-group">
                <label for="user_id">UserID / Username / Name</label>
                <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $reservation->user_id . ' / ' . $reservation->user->username . ' / ' . $reservation->user->First_name . ' ' . $reservation->user->Last_name }}" disabled>
            </div>

            <div class="form-group">
                <label for="car_model_id">Car Model</label>
                <input type="text" class="form-control" id="car_model_id" name="car_model_id" value="{{ $reservation->carModel->model_name }}" disabled>
            </div>

            <div class="form-group row create-form-buttons">
                <div class="col">
                    <a href="{{ route('manage.reservations') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection