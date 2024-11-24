@extends('admin.layouts.layout')
@section('admin_title')
Car Management
@endsection
@section('main_panel')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <h1 class="h2">Car Management</h1>
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
                    <th>Plate Number</th>
                    <th>Model Name</th>
                    <th>Rent Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                <tr>
                    <td data-cell="Plate Number">{{ $car->plate_number }}</td>
                    <td data-cell="Model Name">{{ $car->carModel->model_name ?? 'N/A' }}</td>
                    <td data-cell="Rent Price">Php {{ $car->base_price }}.00</td>
                    <td data-cell="Status">{{ $car->isAvailable ? 'On Rent' : 'Available'}}</td>
                    <td>
                        <form style="display:inline;">
                            <!--
                            @csrf
                            @method('GET')
                            -->
                            <button type="submit">View Details</button>
                        </form>

                        <form action="{{ route('edit.car', $car->id) }}" style="display:inline;">
                            @csrf
                            @method('GET')
                            <button type="submit">Edit</button>
                        </form>

                        <form action="{{ route('delete.car', $car->id) }}" method="POST" style="display:inline;">
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
@endsection