@extends('admin.layouts.layout')
@section('admin_title')
Car Model Management
@endsection
@section('main_panel')
    <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="btn-toolbar mb-2 mb-md-0">
                <h1 class="h2">Car Model Management</h1>
            </div>
        </div>

        @if(session('success'))
            <div class="alert custom-alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Additional content goes here -->
        <div class="">
            <table class="">
                <thead>
                    <tr>
                        <th>Model ID</th>
                        <th>Model Name</th>
                        <th>Type</th>
                        <th>Seating Capacity</th>
                        <th>Transmission Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carmodels as $carmodel)
                    
                    <tr>
                        <td data-cell="Model ID">{{ $carmodel->id }}</td>
                        <td data-cell="Model Name">{{ $carmodel->model_name }}</td>
                        <td data-cell="Type">{{ $carmodel->car_type }}</td>
                        <td data-cell="Seating Capacity">{{ $carmodel->seat_capacity }}</td>
                        <td data-cell="Transmission Type">{{ $carmodel->transmission_type }}</td>
                        <td>
                            <form action="{{ route('edit.carmodel', $carmodel->id) }}" style="display:inline;">
                                @csrf
                                @method('GET')
                                <button type="submit">Edit</button>
                            </form>

                            <form action="{{ route('delete.carmodel', $carmodel->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection