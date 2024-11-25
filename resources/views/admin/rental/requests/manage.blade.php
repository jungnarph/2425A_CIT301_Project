@extends('admin.layouts.layout')
@section('admin_title')
Rental Requests Management
@endsection
@section('main_panel')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-md-0">
            <h1 class="h2">Rental Request Management</h1>
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
                    <th>ID</th>
                    <th>Username</th>
                    <th>Model Name</th>
                    <th>Plate No.</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rental_requests as $rental_request)
                <tr>
                    <td data-cell="ID">{{ $rental_request->id }}</td>
                    <td data-cell="Username">{{ $rental_request->user->username }}</td>
                    <td data-cell="Car Model">{{ $rental_request->car->carModel->model_name }}</td>
                    <td data-cell="Plate No.">{{ $rental_request->car->plate_number }}</td>
                    <td data-cell="Status">
                        @if($rental_request->status === 'Pending')
                            <span style="padding: 5px 10px; border-radius: 5px; background-color: orange;">Pending</span>
                        @elseif($rental_request->status === 'Approved')
                            <span style="padding: 5px 10px; border-radius: 5px; background-color: green;">Approved</span>
                        @else
                            <span style="padding: 5px 10px; border-radius: 5px; background-color: red;">Rejected</span>
                        @endif
                    </td>
                    <td>
                        @if ($rental_request->status === 'Pending')
                        <div class="button-container">
                            <form action="{{ route('accept.rental.request', $rental_request->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button class="success" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                                    </svg>
                                    <span style="display:contents;">Approve</span>
                                </button>
                            </form>

                            <form action="{{ route('reject.rental.request', $rental_request->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button class="danger" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                                    </svg>
                                    <span style="display:contents;">Reject</span>
                                </button>
                            </form>
                        </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection