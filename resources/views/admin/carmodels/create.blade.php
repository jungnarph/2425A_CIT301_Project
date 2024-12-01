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
            <div class="row">
                <div class="col-lg-8 mb-3">
                    <label for="modelName">Model Name</label>
                    <input type="text" class="form-control" id="model_name" name="model_name" placeholder="Enter model name" required>
                </div>

                <div class="col-lg-4 mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter description" required></textarea>
                </div>

                <div class="col-12 mb-3">
                    <label for="base_price">Rent Price</label>
                    <input type="text" class="form-control" name="base_price" placeholder="Enter rent price per day" required>
                </div>
                
                <div class="col-lg-6 mb-3">
                    <label for="car_type">Car Type</label>
                    <input type="text" class="form-control" name="car_type" placeholder="Enter car type" required>
                </div>

                <div class="col-lg-6 col-6 mb-3">
                    <label for="seatCapacity">Seat Capacity</label>
                    <select class="form-control" id="seat_capacity" name="seat_capacity" required>
                        <option value="" disabled selected>Select number of seats</option>
                        <option value="4">Four (4)</option>
                        <option value="5">Five (5)</option>
                        <option value="6">Six (6)</option>
                        <option value="7">Seven (7)</option>
                    </select>
                </div>

                <div class="col-lg-6 col-6 mb-3">
                    <label for="transmissionType">Transmission</label>
                    <select class="form-control" id="transmission_type" name="transmission_type" required>
                        <option value="" disabled selected>Select type</option>
                        <option value="Manual">Manual</option>
                        <option value="Automatic">Automatic</option>
                        <option value="CVT">Manual/Auto</option>
                    </select>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="layoutType">Layout Type</label>
                    <select class="form-control" id="layout_type" name="layout_type" required>
                        <option value="" disabled selected>Select layout type</option>
                        <option value="AWD">All-Wheel Drive (AWD)</option>
                        <option value="4WD">Four-Wheel Drive (4WD)</option>
                        <option value="FWD">Front-Wheel Drive (FWD)</option>
                        <option value="RWD">Rear-Wheel Drive (RWD)</option>
                    </select>
                </div>

                <div class="col-12 mb-3">
                    <label for="carEngine">Car Engine</label>
                    <input type="text" class="form-control" name="engine" placeholder="Enter engine details" required>
                </div>

                <div class="col-12 mb-3">
                    <label for="carPower">Car Power</label>
                    <input type="text" class="form-control" name="power" placeholder="Enter power details" required>
                </div>

                <div class="col-12 mb-3">
                    <label for="carTorque">Car Torque</label>
                    <input type="text" class="form-control" name="torque" placeholder="Enter torque details" required>
                </div>

                <div class="col-12">
                    <label for="carImage">Upload Image</label>
                    <input type="file" class="form-control file-upload" name="image_url" required>
                </div>
            </div>
            
            <div class="form-group row create-form-buttons">
                <div class="col">
                    <a href="{{ route('manage.carmodels')}}" type="button" class="btn btn-secondary">Cancel</a>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection