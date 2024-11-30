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
<<<<<<< Updated upstream
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
        
=======
    .comment-section {
    margin-left: 0;
    margin-right: 0;
    }
    .card {
        margin: 0;
    }
    .row {
        margin-left: 0; 
        margin-right: 0; 
    }
    .col-md-10 {
        padding-left: 15px; 
        padding-right: 15px;
    }
>>>>>>> Stashed changes
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/project-logo-rectangle.png') }}" alt="Logo" width="auto" height="75">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
<<<<<<< Updated upstream
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
=======
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/landing">Home</a></li> 
                    <li class="nav-item"><a class="nav-link active" href="/fleet">Fleet</a></li>
                    <li class="nav-item"><a class="nav-link" href="/services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    @auth
>>>>>>> Stashed changes
                    <li class="nav-item">
                        <a class="nav-link" href="/signin">
                            <i class="bi bi-person" style="margin-right:0.5rem;"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <hr>
<div class="container my-5">
<a href="javascript:history.back()" class="btn btn-danger" style="border:1px solid black;">
    <i class="fas fa-arrow-left"></i> Back
</a>

    <div class="row">
        <div class="col-md-4 mt-4">
            <!-- <img src="{{ asset('assets/images/fleet-image/'.$car->carModel->image_url) }}" class="img-fluid" alt="{{ $car->model_name }} image"> -->

            <!-- Static -->
            <div id="Carousel-Daniel-Slider" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#Carousel-Daniel-Slider" data-slide-to="0" class="active"></li>
        <li data-target="#Carousel-Daniel-Slider" data-slide-to="1"></li>
        <li data-target="#Carousel-Daniel-Slider" data-slide-to="2"></li>
    </ol>

    <!-- Carousel Inner -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('assets/images/slider/Try.jpg') }}" class="d-block w-100 img-fluid" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/images/slider/Try2.jpg') }}" class="d-block w-100 img-fluid" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/images/slider/Try3.jpg') }}" class="d-block w-100 img-fluid" alt="Slide 3">
        </div>
    </div>

    <!-- Controls -->
    <a class="carousel-control-prev" href="#Carousel-Daniel-Slider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#Carousel-Daniel-Slider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>


        </div>
        <div class="col-md-8">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h2><strong>{{ $car->carModel->model_name ?? 'Model not available' }}</strong></h2>  <!-- Display car model name -->
            <a href="{{ route('reservations.create', $car->id) }}" class="btn btn-danger mb-4 w-50" style="border-radius: 25px; padding: 5px 15px;">Rent Now</a>
        </div>
        <p style="text-align:justify;">{{ $car->description }}</p>
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
                            <td>{{ $car->base_price ?? 'Price not available' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Engine:</strong></td>
                            <td>{{ $car->carModel->engine ?? 'Engine not available' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Power:</strong></td>
                            <td>{{ $car->carModel->power ?? 'Power not available' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Torque:</strong></td>
                            <td>{{ $car->carModel->torque ?? 'Torque not available' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Car Type:</strong></td>
                            <td>{{ $car->carModel->car_type ?? 'Car type not available' }}</td>
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
                            <td>{{ $car->carModel->transmission_type ?? 'Transmission not available' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Layout:</strong></td>
                            <td>{{ $car->carModel->layout_type ?? 'Layout not available' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Seating:</strong></td>
                            <td>{{ $car->carModel->seat_capacity ?? 'Seating not available' }}</td>
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
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <h5 class="mb-4 text-center text-danger">What others are saying</h5>

            @foreach ($comments as $comment)
                <div class="card mb-4 border-danger shadow-sm w-100">  <!-- Added w-100 to stretch the card -->
                    <div class="card-body">
                        <!-- User name and rating -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-white mb-0">{{ $comment->user->username }}</h6>
                            <div class="rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa fa-star {{ $i <= $comment->rate ? 'text-warning' : 'text-muted' }}"></i>
                                @endfor
                            </div>
                        </div>

                        <!-- Comment content -->
                        <p class="mt-2 text-white">{{ $comment->content }}</p>

                        <!-- Date and time -->
                        <p class="text-muted mt-2 mb-0">Posted on: {{ $comment->created_at ? $comment->created_at->format('Y-m-d H:i') : 'Date not available' }}</p>
                    </div>
                </div>
            @endforeach
        </div>  
    </div>
</div>

<<<<<<< Updated upstream
<!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Popper.js for Bootstrap's JavaScript plugins -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<!-- Font Awesome for icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<!--Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
=======



<!-- Bootstrap and Font Awesome Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome for icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
>>>>>>> Stashed changes

</body>
</html>
