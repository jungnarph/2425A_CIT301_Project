@extends('admin.layouts.layout')

@section('admin_title')
    Create Car Type
@endsection

@section('main_panel')
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
        <form action="{{ route('update.cartype', $cartype->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="type_name">Car Type Name</label>
                <input type="text" class="form-control" id="type_name" name="type_name" placeholder="Enter car type name" value="{{ $cartype->type_name }}" required>
            </div>
            
            <div class="form-group">
                <label for="insurance_fee">Insurance Fee</label>
                <input type="text" class="form-control" id="insurance_fee" name="insurance_fee" placeholder="Enter insurance fee" value="{{ $cartype->insurance_fee }}"required>
            </div>

            <div class="form-group row create-form-buttons">
                <div class="col">
                    <a href="{{ route('manage.cartypes') }}" class="btn btn-secondary">Cancel</a>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection