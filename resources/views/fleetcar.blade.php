<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleet Car Option</title>
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <!-- Include Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
     <!--Jared CSS -->
     <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" >

     <style>
        .comment-section {
            margin-top: 40px;
        }
        .comment-box {
            border: 2px solid #ccc;
            padding: 20px;
            margin-bottom: 10px;
        }
        .comment-area {
            border: 2px solid #ccc;
            padding: 20px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/images/project-logo-rectangle.jfif') }}" alt="Logo" width="auto" height="75">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"> <!-- All items on the right -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Fleet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="color: red; text-decoration: none;">Logout</button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

<div class="container my-5">
<a href="javascript:history.back()" class="btn btn-danger" style="border:1px solid black;">
    <i class="fas fa-arrow-left"></i> Back
</a>
@if(session('success'))
        <div class="alert custom-alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-4 mt-4">
            <img src="{{ asset('assets/images/fleet-image/'.$carmodel->image_url) }}" class="img-fluid" alt="{{ $carmodel->model_name }} image">
        </div>
        <div class="col-md-8">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h2><strong>{{ $carmodel->model_name ?? 'Model not available' }}</strong></h2>  <!-- Display car model name -->
            <a href="{{ route('reservation.create', $carmodel->id) }}" class="btn btn-danger mb-4 w-50" style="border-radius: 25px; padding: 5px 15px;">Rent Now</a>
        </div>
        <p style="text-align:justify;">{{ $carmodel->description }}</p>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2"><strong>Car Specifications</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Price:</strong></td>
                            <td>{{ $carmodel->base_price ?? 'Price not available' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Engine:</strong></td>
                            <td>{{ $carmodel->engine ?? 'Engine not available' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Power:</strong></td>
                            <td>{{ $carmodel->power ?? 'Power not available' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Torque:</strong></td>
                            <td>{{ $carmodel->torque ?? 'Torque not available' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Car Type:</strong></td>
                            <td>{{ $carmodel->car_type ?? 'Car type not available' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2"><strong>Additional Features</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Transmission:</strong></td>
                            <td>{{ $carmodel->transmission_type ?? 'Transmission not available' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Layout:</strong></td>
                            <td>{{ $carmodel->layout_type ?? 'Layout not available' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Seating:</strong></td>
                            <td>{{ $carmodel->seat_capacity ?? 'Seating not available' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Rating:</strong></td>
                            <td>5/5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<hr>

<!-- Comment Section -->
<div class="container comment-section">
    <div class="row">
        <div class="col-md-12">
            <div class="comment-area">
                <h5>Comment from the users</h5>
                <div>
                    <p><strong>User 1:</strong> I love BBC, big black Co</p>
                </div>
                <div>
                    <p><strong>User 2:</strong> The tree of life sprouts everywhere</p>
                </div>
                <div>
                    <p><strong>User 3:</strong> Cavite no. 1</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Popper.js for Bootstrap's JavaScript plugins -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<!-- Font Awesome for icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

</body>
</html>
