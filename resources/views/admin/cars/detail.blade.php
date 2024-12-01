@extends('admin.layouts.layout')

@section('admin_title')
    Car Details | EasyCars Admin
@endsection

@section('main_panel')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <h1 class="h2">Car Details</h1>
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
        <form action="{{ route('update.car', $car->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

           

            <div class="row">
                <div class="col-lg-2 mb-3">
                    <label for="plateNumber">Plate Number</label>
                    <input type="text" class="form-control" id="plate_number" name="plate_number" value="{{ $car->plate_number }}" disabled>
                </div>
                <div class="col-lg-7 mb-3">
                    <label for="modelName">Model Name</label>
                    <input type="text" class="form-control" id="model_name" name="model_name" value="{{ $car->carModel->model_name }}" disabled>
                </div>

                <div class="col-lg-3 mb-3">
                    <label for="rentBasePrice">Rent Price</label>
                    <input type="text" class="form-control" name="base_price" placeholder="Enter rent price per day" value="{{ $car->carModel->base_price }}"disabled>
                </div>

                <div class="col-12 mb-3">
                    <label for="carDescription">Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter description" disabled>{{ $car->carModel->description }}</textarea>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="car_type">Car Type</label>
                    <input type="text" class="form-control" name="car_type" placeholder="Enter car type" value="{{ $car->carModel->car_type }}" disabled>
                </div>

                <div class="col-lg-6 col-6 mb-3">
                    <label for="seatCapacity">Seat Capacity</label>
                    <select class="form-control" id="seat_capacity" name="seat_capacity" disabled>
                        <option value="" disabled selected>Select number of seats</option>
                        <option value="4" {{ $car->carModel->seat_capacity === 4 ? 'selected' : '' }}>Four (4)</option>
                        <option value="5" {{ $car->carModel->seat_capacity === 5 ? 'selected' : '' }}>Five (5)</option>
                        <option value="6" {{ $car->carModel->seat_capacity === 6 ? 'selected' : '' }}>Six (6)</option>
                        <option value="7" {{ $car->carModel->seat_capacity === 7 ? 'selected' : '' }}>Seven (7)</option>
                    </select>
                </div>

                <div class="col-lg-6 col-6 mb-3">
                    <label for="transmissionType">Transmission</label>
                    <select class="form-control" id="transmission_type" name="transmission_type" disabled>
                        <option value="" disabled selected>Select type</option>
                        <option value="Manual" {{ $car->carModel->transmission_type === 'Manual' ? 'selected' : '' }}>Manual</option>
                        <option value="Automatic" {{ $car->carModel->transmission_type === 'Automatic' ? 'selected' : '' }}>Automatic</option>
                        <option value="CVT" {{ $car->carModel->transmission_type === 'CVT' ? 'selected' : '' }}>Manual/Auto</option>
                    </select>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="layoutType">Layout Type</label>
                    <select class="form-control" id="layout_type" name="layout_type" disabled>
                        <option value="" disabled selected>Select layout type</option>
                        <option value="AWD" {{ $car->carModel->layout_type === 'AWD' ? 'selected' : '' }}>All-Wheel Drive (AWD)</option>
                        <option value="4WD" {{ $car->carModel->layout_type === '4WD' ? 'selected' : '' }}>Four-Wheel Drive (4WD)</option>
                        <option value="FWD" {{ $car->carModel->layout_type === 'FWD' ? 'selected' : '' }}>Front-Wheel Drive (FWD)</option>
                        <option value="RWD" {{ $car->carModel->layout_type === 'RWD' ? 'selected' : '' }}>Rear-Wheel Drive (RWD)</option>
                    </select>
                </div>
                
                <div class="col-12 mb-3">
                    <label for="carEngine">Car Engine</label>
                    <input type="text" class="form-control" name="engine" placeholder="Enter engine details" value="{{ $car->carModel->engine }}" disabled>
                </div>

                <div class="col-12 mb-3">
                    <label for="carPower">Car Power</label>
                    <input type="text" class="form-control" name="power" placeholder="Enter power details" value="{{ $car->carModel->power }}" disabled>
                </div>

                <div class="col-12">
                    <label for="carTorque">Car Torque</label>
                    <input type="text" class="form-control" name="torque" placeholder="Enter torque details" value="{{ $car->carModel->torque }}"  disabled>
                </div>
            </div>

            <div class="form-group row create-form-buttons">
                <div class="col">
                    <a href="{{ route('manage.cars') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection