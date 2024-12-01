@extends('admin.layouts.layout')
@section('admin_title')
Rental Management | EasyCars Admin
@endsection
@section('main_panel')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-md-0">
            <h1 class="h2">Rental Management</h1>
        </div>
    </div>

    @if(session('error'))
        <div class="alert custom-alert-danger">
            {{ session('error') }}
        </div>
    @endif

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
                    <th>Car Model</th>
                    <th>Plate Number</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rentals as $rental)
                <tr>
                    <td data-cell="ID">{{ $rental->id }}</td>
                    <td data-cell="Username">{{ $rental->user->username }}</td>
                    <td data-cell="Car Model">{{ $rental->car->carModel->model_name }}</td>
                    <td data-cell="Plate Number">{{ $rental->car->plate_number }}</td>
                    <td data-cell="Status">
                    @if ($rental->status === 'Pending')
                    <select class="form-control status" name="status" style="background-color: orange; display:inline; width: fit-content !important" required>
                        <option value="" selected>Pending</option>
                        <option value="{{ route('edit.rental', $rental->id) }}?status=Active">Active</option>
                        <option value="">Canceled</option>
                    </select>
                    @elseif ($rental->status === 'Active')
                    <select class="form-control status" name="status" style="background-color: blue; display:inline; width: fit-content !important" required>
                        <option value="" selected>Active</option>
                        <option value="{{ route('edit.rental', $rental->id) }}?status=Completed">Completed</option>
                        <option value="Canceled">Missing</option>
                    </select>
                    @elseif ($rental->status === 'Completed')
                    <select class="form-control status" name="status" style="background-color: green; display:inline; width: fit-content !important;" required>
                        <option value="" selected>Completed</option>
                    </select>
                    @else
                    <select class="form-control status" name="status" style="background-color: red; max-width: 40%;" required>
                        <option value="" selected>Missing</option>
                    </select>
                    @endif
                    
                    </td>
                    <td>
                        <div class="button-container">
                            <form action="{{ route('view.rental', $rental->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('GET')
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                    <span style="display:contents;">View</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('admin_scripts')
<script>
    document.querySelectorAll('.status').forEach(function(element) {
        element.addEventListener('change', function() {
            const selectedRoute = this.value;

            if (selectedRoute !== '') {
                window.location.href = selectedRoute;
            }
        });
    });
</script>
@endsection