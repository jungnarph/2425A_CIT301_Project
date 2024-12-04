@extends('admin.layouts.layout') <!-- This extends the admin layout file -->

@section('admin_title', 'Dashboard | EasyCars Admin') <!-- Set the title for the page -->

@section('admin_styles')
    <style>
        .card, .list-group a{
            background-color:#851558;
            color: var(--text-clr);
        }
    </style>
@endsection

@section('main_panel')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="btn-toolbar mb-md-0">
                <h1 class="h2">Dashboard</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pending Reservations</h5>
                        <p class="card-text">{{ $metrics['pending_reservations'] }}</p> <!-- This would be dynamic, e.g., from a database -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Active Rentals</h5>
                        <p class="card-text">{{ $metrics['active_rentals'] }}</p> <!-- This would be dynamic, e.g., from a database -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daily Revenue</h5>
                        <p class="card-text">{{ $metrics['daily_revenue'] }}</p> <!-- This would be dynamic, e.g., from a database -->
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Total Rentals</h5>
                        <h1 class="card-text text-center mt-4">{{ $metrics['total_rentals'] }}</h1> <!-- This would be dynamic, e.g., from a database -->
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Total Revenue</h5>
                        <h1 class="card-text text-center mt-4">{{ $metrics['total_revenue'] }}</h1> <!-- This would be dynamic, e.g., from a database -->
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Total Reservations</h5>
                        <h1 class="card-text text-center mt-4">{{ $metrics['total_reservations'] }}</h1> <!-- This would be dynamic, e.g., from a database -->
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Best Car</h5>
                        <h1 class="card-text text-center mt-4">{{ $metrics['most_rented_car']->model_name ?? 'N/A'}}</h1> <!-- This would be dynamic, e.g., from a database -->
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection