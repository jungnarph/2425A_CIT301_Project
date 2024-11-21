@extends('admin.layouts.layout')

@section('admin_title')
    Edit Car Model
@endsection

@section('main_panel')
    <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="btn-toolbar mb-2 mb-md-0">
                <h1 class="h2">Edit Car Model</h1>
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
            <form action="{{ route('update.carmodel', $carmodel->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="modelName">Model Name</label>
                    <input type="text" class="form-control" id="model_name" name="model_name" value="{{ $carmodel->model_name }}" required>
                </div>
                
                <div class="form-group">
                    <label for="carType">Car Type</label>
                    <select class="form-control" id="car_type" name="car_type" required>
                        <option value="" disabled selected>Select car type</option>
                        <option value="Hatchback" {{ $carmodel->car_type === 'Hatchback' ? 'selected' : '' }}>Hatchback</option>
                        <option value="MPV" {{ $carmodel->car_type === 'MPV' ? 'selected' : '' }}>Multi-Purpose Vehicle (MPV)</option>
                        <option value="Sedan" {{ $carmodel->car_type === 'Sedan' ? 'selected' : '' }}>Sedan</option>
                        <option value="Sports Car" {{ $carmodel->car_type === 'Sports Car' ? 'selected' : '' }}>Sports Car</option>
                        <option value="SUV" {{ $carmodel->car_type === 'SUV' ? 'selected' : '' }}>Sports Utility Vehicle (SUV)</option>
                        <option value="Pickup Truck" {{ $carmodel->car_type === 'Pickup Truck' ? 'selected' : '' }}>Pickup Truck</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="seatCapacity">Seat Capacity</label>
                    <select class="form-control" id="seat_capacity" name="seat_capacity" required>
                        <option value="" disabled selected>Select number of seats</option>
                        <option value="4" {{ $carmodel->seat_capacity === 4 ? 'selected' : '' }}>Four (4)</option>
                        <option value="5" {{ $carmodel->seat_capacity === 5 ? 'selected' : '' }}>Five (5)</option>
                        <option value="6" {{ $carmodel->seat_capacity === 6 ? 'selected' : '' }}>Six (6)</option>
                        <option value="7" {{ $carmodel->seat_capacity === 7 ? 'selected' : '' }}>Seven (7)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="transmissionType">Transmission Type</label>
                    <select class="form-control" id="transmission_type" name="transmission_type" required>
                        <option value="" disabled selected>Select transmission type</option>
                        <option value="Manual" {{ $carmodel->transmission_type === 'Manual' ? 'selected' : '' }}>Manual</option>
                        <option value="Automatic" {{ $carmodel->transmission_type === 'Automatic' ? 'selected' : '' }}>Automatic</option>
                        <option value="CVT" {{ $carmodel->transmission_type === 'CVT' ? 'selected' : '' }}>Continuous Variable Transmission (CVT)</option>
                    </select>
                </div>

                <div class="form-group row create-form-buttons">
                    <div class="col">
                        <a href="/admin/carmodels/manage" class="btn btn-secondary">Cancel</a>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
        
    </main>
@endsection