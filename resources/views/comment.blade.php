<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyCars | Comment</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/jpg">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/images/project-logo-transparent.png') }}" alt="Logo" width="auto" height="75">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/fleet">Fleet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <!-- Logout Button -->
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

    <div class="container my-3">
        <div class="row">
        <h3 class="mt-3 text-center"><strong>What is your experience with the {{ $carmodel->model_name }}?</strong></h3>
            <div class="col-lg-4">
                <img src="{{ asset('assets/images/fleet-image/'.$carmodel->image_url) }}" class="img-fluid" alt="{{ $carmodel->model_name }} image">
            </div>
            <div class="col-lg-8">
                <div class="col-lg-12 d-flex justify-content-between align-items-center my-3">
                    <h2><strong></strong></h2>  <!-- Display car model name -->
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2"><strong>Car Details</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 40%"><strong>Car Type:</strong></td>
                                    <td style="width: 60%">{{ $carmodel->carType->type_name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Transmission:</strong></td>
                                    <td>{{ $carmodel->transmission_type }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Layout:</strong></td>
                                    <td>{{ $carmodel->layout_type }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Seating:</strong></td>
                                    <td>{{ $carmodel->seat_capacity }}</td>
                                </tr>                         
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2"><strong>Rental Details</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 40%"><strong>Rental ID:</strong></td>
                                    <td style="width: 60%">{{ $rental->id }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Plate Number:</strong></td>
                                    <td>{{ $rental->car->plate_number }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Pickup Date:</strong></td>
                                    <td>{{ \Carbon\Carbon::parse($rental->pickup_dt)->format('F d, Y') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Return Date:</strong></td>
                                    <td>{{ \Carbon\Carbon::parse($rental->return_dt)->format('F d, Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container comment-section py-4">
        <div class="row justify-content-center">
            <div class="col-md-10"> 
                <!-- Comment Form -->
                
                <form action="{{ route('comment.store', ['rental_id' => $rental->id, 'token' => $rental->token]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="rental_id" value="{{ $rental->id }}">
                    <div class="row">
                        <div class="col-lg-3 mb-2 rating-div">
                            <label for="rate_star" class="form-label"><strong>Rate your experience:</strong></label>
                            <div id="rate" class="stars">
                                <input type="radio" name="rate_star" value="1" id="star1" class="rating-star">
                                <label for="star1" class="star-label">&#9733;</label>
                                <input type="radio" name="rate_star" value="2" id="star2" class="rating-star">
                                <label for="star2" class="star-label">&#9733;</label>
                                <input type="radio" name="rate_star" value="3" id="star3" class="rating-star">
                                <label for="star3" class="star-label">&#9733;</label>
                                <input type="radio" name="rate_star" value="4" id="star4" class="rating-star">
                                <label for="star4" class="star-label">&#9733;</label>
                                <input type="radio" name="rate_star" value="5" id="star5" class="rating-star">
                                <label for="star5" class="star-label">&#9733;</label>
                            </div>
                            <input type="hidden" name="rate" id="rate-input" value="5">
                        </div>
                        <div class="col-lg-9 mb-2">
                            <textarea name="content" class="form-control" rows="4" placeholder="Type your comment (Commenting as {{ $rental->user->username }}...)" required></textarea>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-danger" id="post-comment" >Post Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    // Listen for changes on radio buttons
        document.querySelectorAll('.rating-star').forEach(star => {
            star.addEventListener('change', function() {
                const ratingValue = this.value; // Get the value of the clicked star
                // Update the hidden input field with the selected rating
                document.getElementById('rate-input').value = ratingValue;
            });
        });
    </script>
    <!-- Bootstrap and Font Awesome Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>