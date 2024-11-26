@extends('admin.layouts.layout')

@section('admin_title')
    Edit Car
@endsection

@section('main_panel')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <h1 class="h2">Edit Car</h1>
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
            <div class="form-group">
                <label for="plateNumber">Plate Number</label>
                <input type="text" class="form-control" id="plate_number" name="plate_number" value="{{ $car->plate_number }}" disabled>
            </div>
            
            <div class="form-group">
                <label for="carModel">Car Model</label>
                <select class="form-control" id="car_model_id" name="model_id" required>
                    <option value="" disabled selected>Select car model</option>
                    @foreach($carmodels as $carmodel)
                        <option value="{{ $carmodel->id }}" {{ $car->carModel->id === $carmodel->id ? 'selected' : ''}} >{{ $carmodel->model_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="carDescription">Description</label>
                <textarea class="form-control" name="description" placeholder="Enter description" required>{{ $car->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="rentBasePrice">Rent Price</label>
                <input type="text" class="form-control" name="base_price" placeholder="Enter rent price per day" value="{{ $car->base_price }}" required>
            </div>

            

            <div class="form-group row create-form-buttons">
                <div class="col">
                    <a href="{{ route('manage.cars') }}" class="btn btn-secondary">Cancel</a>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection