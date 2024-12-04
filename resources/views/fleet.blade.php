<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleet</title>
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <!-- Include Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" rel="stylesheet">
     <!--Jared CSS -->
     <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" >
     <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/jpg">
     <link rel="stylesheet" href="footer.css">

     <style>
        .card-image {
            height: 250px; /* Set a fixed height */
            object-fit: cover; /* Ensures the image covers the area without distortion */
            width: 100%; /* Makes the image responsive */
            border-radius: 10px; /* Optional: For rounded corners */
        }
        .navbar-toggler {
            width: 60px; /* Adjust this value to increase or decrease the width */
            height: 40px; /* Adjust this value to increase or decrease the height */
            background-size: contain; /* Ensures the icon scales correctly */
        }

        .navbar-collapse{
            padding: 10px;
        }
        /* Ensure proper alignment of navbar items */
        .navbar {
            padding: 10px 20px; /* Adjust padding to ensure the navbar is properly spaced */
        }

        .navbar-nav {
            align-items: center; /* Align navbar items vertically */
        }

        /* Logo */
        .navbar-brand img {
            height: 75px; /* Match logo height */
            vertical-align: middle; /* Ensure logo is vertically aligned */
        }

        /* Navbar items */
        .nav-item {
            display: flex;
            align-items: center; /* Center align items vertically */
            padding: 0; /* Remove any unnecessary padding */
        }

        .nav-link {
            font-family: 'Poppins', sans-serif; 
            font-size: 16px; 
            font-weight: 500; 
            color: #333;
            padding: 8px 10px; /* Adjust inner padding */
            margin: 0 10px; /* Adjust outer margin for spacing */
        }

        /* Active Link Styling */
        .nav-link.active {
            font-weight: bold;
            border-bottom: 2px solid #007bff; /* Active link style */
        }

        /* Adjust navbar toggler */
        .navbar-toggler {
            margin-top: 2px; /* Fix slight misalignment of the toggler button */
        }
        </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/images/project-logo-transparent.png') }}" alt="Logo" width="auto" height="75">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-start">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/fleet">Fleet</a></li>
                    <li class="nav-item"><a class="nav-link" href="/services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    @auth
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-start" style="color: red; text-decoration: none;">Logout</button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="search-bar">
            <form class="d-flex searchbar ms-auto" action="{{ route('user.fleet') }}" method="POST">
                @csrf
                @method('GET')
                <input class="input-searchbar form-control me-2" name="search_data" type="search" placeholder="Search car model..." aria-label="Search" required>
                <button class="btn btn-outline-success" id="search-2" name="search_submit" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <div class="container filter-sort mt-3">
        <div class="row">
            <form id="sort-form" action="{{ route('user.fleet') }}" method="POST">
                @csrf
                @method('GET')
                <div class="col-auto">
                    <span style="margin-right: 0.5rem;"><i class="bi bi-funnel" style="margin-right: 0.5rem"></i><strong>Sort by:</strong></span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sort-option" id="inlineRadio1" value="name_asc">
                        <label class="form-check-label" for="inlineRadio1">Name (&#8593;)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sort-option" id="inlineRadio2" value="name_desc">
                        <label class="form-check-label" for="inlineRadio2">Name (&#8595;)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sort-option" id="inlineRadio3" value="price_asc">
                        <label class="form-check-label" for="inlineRadio3">Price (&#8593;)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sort-option" id="inlineRadio4" value="price_desc">
                        <label class="form-check-label" for="inlineRadio4">Price (&#8595;)</label>
                    </div>
                </div>
            </form>
        </div>     
    </div>
    
    <div class="container mt-2">

        <div class="row">
            <!-- Card 1 -->
            @foreach ($carmodels as $carmodel) 
                <div class="col-md-4 mb-4">
                    
                    <div class="choice-card border border-dark" style="border-radius: 20px;">
                        <img src="{{asset('assets/images/fleet-image/'.$carmodel->image_url) }}" class="img-fluid card-image" alt="GTR 2018 image">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $carmodel->model_name ?? 'N/A' }}</h5>
                            <p class="card-text">20xx Version</p>
                            <p>
                                <i class="bi bi-gear"></i>{{ $carmodel->transmission_type ?? 'N/A' }}&nbsp;
                                <i class="bi bi-people"></i>{{ $carmodel->seat_capacity ?? 'N/A' }} people&nbsp;
                                <i class="fa-regular fa-star"></i> Ratings
                            </p>
                            <!-- Button with dynamic route -->
                            <a href="{{ route('user.fleet.show', $carmodel->id) }}" class="btn btn-danger mb-4 w-50" style="border-radius: 25px; padding: 5px 15px;">View Details</a>
                        </div>
                    </div>
                   
                </div>
                @endforeach
            </div>
        </div>
    </div>
    

    <!-- Footer -->
    <footer class="text-center text-white" style="background-color: #4d0000;">
            <!-- Container -->
            <div class="container">
            <!-- Section: Links -->
            <section class="mt-5">
                <div class="row text-center d-flex justify-content-center pt-5">
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                        <a href="/about" class="button about-us">About Us</a>
                        </h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                        <a href="/fleet" class="button products">Products</a>
                        </h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                        <a href="/about" class="button awards">Awards</a>
                        </h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                        <a href="/services" class="button help">Help</a>
                        </h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                        <a href="/contact" class="button contact">Contact</a>
                        </h6>
                    </div>
                </div>
            </section>

            <hr class="my-5" />

            <!-- Section: Text -->
            <section class="mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <p>© 2023 EasyCars. All Rights Reserved. Your trusted partner in car rentals, 
                        providing convenience, comfort, and quality every step of the way. Drive your dreams with us!</p>
                    </div>
                </div>
            </section>

            <!-- Section: Social -->
            <section class="text-center mb-5">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-google"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
            </section>

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                    © 2024 Copyright: EasyCars 
                    <a class="text-white" href="#"></a>
                </div>
        </div> <!-- End of .container -->
    </footer>

    <!-- Bootstrap and Font Awesome Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome for icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
