@extends('admin.layouts.layout')

@section('admin_title')
    Create Car
@endsection

@section('main_panel')
    <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="btn-toolbar mb-2 mb-md-0">
                <h1 class="h2">Create Car</h1>
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
            <form action="{{ route('store.car') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="plateNumber">Plate Number</label>
                    <input type="text" class="form-control" id="plate_number" name="plate_number" placeholder="Enter plate number" required>
                </div>
                
                <div class="form-group">
                    <label for="carModel">Car Model</label>
                    <select class="form-control" id="car_model_id" name="model_id" required>
                        <option value="" disabled selected>Select car model</option>
                        @foreach($carModels as $carModel)
                            <option value="{{ $carModel->id }}">{{ $carModel->model_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="carDescription">Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter description" required></textarea>
                </div>

                <div class="form-group">
                    <label for="rentBasePrice">Rent Price</label>
                    <input type="text" class="form-control" name="base_price" placeholder="Enter rent price per day" required>
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
        
    </main>
@endsection