@extends('admin.layouts.layout')

@section('admin_title')
    Edit Rental Details | EasyCars Admin
@endsection

@section('main_panel')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <h1 class="h2">Edit Rental Details</h1>
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
        <form action="{{ route('update.rental', $rental->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="reservation_id">Rental ID / Reservation ID</label>
                <input type="text" class="form-control" id="reservation_id" name="reservation_id" value="{{ $rental->id . ' / ' . $rental->reservation_id ?? 'No reservation placed' }}" disabled>
            </div>
            
            <div class="form-group">
                <label for="status">Rental Status</label>
                @if ($rental->status === 'Pending' && $status === 'Active')
                <input type="hidden" class="form-control" id="hidden_status" name="status" value="Active">
                <input type="text" class="form-control" id="status" name="status" value="Active" disabled>
                @elseif ($rental->status === 'Active' && $status === 'Completed')
                <input type="hidden" class="form-control" id="hidden_status" name="status" value="Completed">
                <input type="text" class="form-control" id="status" name="status" value="Completed" disabled>
                @else
                <input type="hidden" class="form-control" id="hidden_status" name="status" value="{{ $rental->status }}">
                <input type="text" class="form-control" id="status" name="status" value="{{ $rental->status }}" disabled>
                @endif
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
                @if ($rental->pickup_dt === null && $status !== 'null')
                <input type="datetime-local" class="form-control" id="pickup_dt" name="pickup_dt" value="" required>
                @else
                <input type="text" class="form-control" id="pickup_dt" name="pickup_dt" value="{{ $rental->pickup_dt ?? 'Not picked up yet' }}" disabled>
                @endif
            </div>
            
            <div class="form-group">
                <label for="pickup_location">Pickup Location</label>
                @if ($rental->pickup_location === null && $status !== 'null')
                <select class="form-control" id="pickup-location" name="pickup_location" required>
                    <option value="" disabled selected>Select pickup location</option>
                    <option value="Makati Central Business District, Makati City">Makati Central Business District, Makati City</option>
                    <option value="Ninoy Aquino International Airport (NAIA), Manila" >Ninoy Aquino International Airport (NAIA), Manila</option>
                    <option value="SM City Marilao, Bulacan" >SM City Marilao, Bulacan</option>
                    <option value="Trinoma Mall, Quezon City, Metro Manila" >Trinoma Mall, Quezon City, Metro Manila</option>
                    <option value="Alabang Town Center, Muntinlupa City" >Alabang Town Center, Muntinlupa City</option>
                    <option value="Tagaytay Rotonda, Tagaytay City" >Tagaytay Rotonda, Tagaytay City</option>
                </select>
                @else
                <input type="text" class="form-control" id="pickup_location" name="pickup_location" value="{{ $rental->pickup_location ?? 'Not picked up yet' }}" disabled>
                @endif
            </div>

            @if($status === 'Completed' && $rental->status === 'Active' || $rental->status === 'Completed')
            <div class="form-group">
                <label for="return_dt">Return Date and Time</label>
                @if ($rental->return_dt === null && $status !== 'null')
                <input type="datetime-local" class="form-control" id="return_dt" name="return_dt" value="">
                @else
                <input type="text" class="form-control" id="return_dt" name="return_dt" value="{{ $rental->return_dt }}" disabled>
                @endif
            </div>

            <div class="form-group">
                <label for="return_location">Return Location</label>
                @if ($rental->return_location === null  && $status !== 'null')
                <select class="form-control" id="return_location" name="return_location" onchange="loadMap(this.value)">
                    <option value="" disabled selected>Select pickup location</option>
                    <option value="Makati Central Business District, Makati City">Makati Central Business District, Makati City</option>
                    <option value="Ninoy Aquino International Airport (NAIA), Manila" >Ninoy Aquino International Airport (NAIA), Manila</option>
                    <option value="SM City Marilao, Bulacan" >SM City Marilao, Bulacan</option>
                    <option value="Trinoma Mall, Quezon City, Metro Manila" >Trinoma Mall, Quezon City, Metro Manila</option>
                    <option value="Alabang Town Center, Muntinlupa City" >Alabang Town Center, Muntinlupa City</option>
                    <option value="Tagaytay Rotonda, Tagaytay City" >Tagaytay Rotonda, Tagaytay City</option>
                </select>
                @else
                <input type="text" class="form-control" id="return_location" name="return_location" value="{{ $rental->return_location }}" disabled>
                @endif
            </div>
            @endif

            <div class="form-group row create-form-buttons">
                <div class="col">
                    <a href="{{ route('manage.rentals') }}" class="btn btn-secondary">Back</a>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection