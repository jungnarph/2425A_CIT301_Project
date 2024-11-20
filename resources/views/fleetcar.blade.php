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
                    <li class="nav-item">
                        <a class="nav-link" href="/signin">
                            <i class="bi bi-person" style="margin-right:0.5rem;"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container my-5">
<a href="javascript:history.back()" class="btn btn-danger" style="border:1px solid black;">
    <i class="fas fa-arrow-left"></i> Back
</a>

    <div class="row">
        <div class="col-md-4 mt-4">
            <img src="{{ asset('assets/images/fleet-image/'.$car->image) }}" class="img-fluid" alt="{{ $car->name }} image">
        </div>
        <div class="col-md-8">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h2><strong>{{ $car->carModel->model_name ?? 'Model not available' }}</strong></h2>  <!-- Display car model name -->
            <form action="{{ url('/arrangement') }}" method="GET">
                <button type="submit" class="btn btn-danger mb-3" style="font-size: 14px; padding: 16px 8px;">Rent Now</button>
            </form>


        </div>
            <p style="text-align:justify;">{{ $car->description }}</p>

            <div class="row">
                <div class="col-md-2">
                    <ul class="list-unstyled">
                        <strong>
                        <li>Price: </li>    
                        <li>Engine:</li>
                        <li>Power:</li>
                        <li>Torque:</li>
                        <li>Car Type:</li>
                        </strong>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-unstyled">
                        <li>{{ $car->price }}</li>
                        <li>{{ $car->engine }}</li>
                        <li>{{ $car->power }}</li>
                        <li>{{ $car->torque }}</li>
                        <li>{{ $car->carModel->car_type }}</li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="list-unstyled">
                        <strong>
                        <li>Transmission:</li>
                        <li>Layout:</li>
                        <li>Seating:</li>
                        <li>Rating:</li>
                        </strong>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-unstyled">
                        <li>{{ $car->transmission }}</li>
                        <li>{{ $car->layout }}</li>
                        <li>{{ $car->seating }}</li>
                        <li>{{ $car->rating }}</li>
                    </ul>
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
