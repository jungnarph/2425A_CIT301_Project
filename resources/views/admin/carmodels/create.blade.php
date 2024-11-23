@extends('admin.layouts.layout')

@section('admin_title')
    Create Car Model
@endsection

@section('main_panel')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <h1 class="h2">Create Car Model</h1>
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
        <form action="{{ route('store.carmodel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="modelName">Model Name</label>
                <input type="text" class="form-control" id="model_name" name="model_name" placeholder="Enter model name" required>
            </div>
            
            <div class="form-group">
                <label for="carType">Car Type</label>
                <select class="form-control" id="car_type" name="car_type" required>
                    <option value="" disabled selected>Select car type</option>
                    <option value="Hatchback">Hatchback</option>
                    <option value="MPV">Multi-Purpose Vehicle (MPV)</option>
                    <option value="Sedan">Sedan</option>
                    <option value="Sports Car">Sports Car</option>
                    <option value="SUV">Sports Utility Vehicle (SUV)</option>
                    <option value="Pickup Truck">Pickup Truck</option>
                </select>
            </div>

            <div class="form-group">
                <label for="seatCapacity">Seat Capacity</label>
                <select class="form-control" id="seat_capacity" name="seat_capacity" required>
                    <option value="" disabled selected>Select number of seats</option>
                    <option value="4">Four (4)</option>
                    <option value="5">Five (5)</option>
                    <option value="6">Six (6)</option>
                    <option value="7">Seven (7)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="transmissionType">Transmission Type</label>
                <select class="form-control" id="transmission_type" name="transmission_type" required>
                    <option value="" disabled selected>Select transmission type</option>
                    <option value="Manual">Manual</option>
                    <option value="Automatic">Automatic</option>
                    <option value="CVT">Continuous Variable Transmission (CVT)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="layoutType">Layout Type</label>
                <select class="form-control" id="layout_type" name="layout_type" required>
                    <option value="" disabled selected>Select layout type</option>
                    <option value="AWD">All-Wheel Drive (AWD)</option>
                    <option value="4WD">Four-Wheel Drive (4WD)</option>
                    <option value="FWD">Front-Wheel Drive (FWD)</option>
                    <option value="RWD">Rear-Wheel Drive (RWD)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="carEngine">Car Engine</label>
                <input type="text" class="form-control" name="engine" placeholder="Enter engine details" required>
            </div>

            <div class="form-group">
                <label for="carPower">Car Power</label>
                <input type="text" class="form-control" name="power" placeholder="Enter power details" required>
            </div>

            <div class="form-group">
                <label for="carTorque">Car Torque</label>
                <input type="text" class="form-control" name="torque" placeholder="Enter torque details" required>
            </div>

            <div class="form-group">
                <label for="carImage">Upload Image</label>
                <input type="file" class="form-control file-upload" name="image_url" required>
            </div>

            <div class="form-group row create-form-buttons">
                <div class="col">
                    <button type="button" class="btn btn-secondary">Cancel</button>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection