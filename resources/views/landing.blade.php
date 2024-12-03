<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyCars | Home Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="footer.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/jpg">

    <style>
        .main-button {
            background: rgb(0, 0, 0);
            background: linear-gradient(90deg, rgba(0, 0, 0, 1) 24%, rgba(212, 212, 212, 1) 100%);
        }
        /* Ensure no horizontal overflow */
    * {
        box-sizing: border-box;
        }

        body, html {
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        /* Avoid horizontal scroll on small screens */
        @media (max-width: 767px) {
            .container, .container3, .navbar, .card-container, .welcome-container {
                padding-left: 0;
                padding-right: 0;
                margin-left: 0;
                margin-right: 0;
            }

            .navbar-nav {
                text-align: center;
            }

            /* Additional adjustments */
            .card {
                width: 100%;
            }
        }

        /* Style the Rent cars now button */
        .rent-button {
            background: #661b1c;
            border: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 100%;
        }

        /* Style the link inside the button */
        .rent-button a {
            color: white;
            text-decoration: none;
            display: block;
        }

        /* Button hover effect */
        .rent-button:hover {
            background-color: rgba(0, 0, 0, 0.8);
            transform: scale(1.05);
        }

        /* Button focus effect */
        .rent-button:focus {
            outline: none;
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-start">
                    <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/fleet">Fleet</a></li>
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


    <div class="service-head">
        <div class="row">
            <div class="col-sm service-card">
                Welcome 
                <p style="font-size: 20px;">{{ Auth::user()->username ?? 'Guest' }}!</p>
                <p style="font-size: 17px; margin-top:10px">
                    Your journey begins here. Whether you’re planning a weekend getaway or need a car 
                    for a business trip, we’ve got you covered with a wide selection of vehicles tailored to 
                    your needs. Rent with confidence and enjoy the road ahead with EasyCars – where your adventure starts with us.
                </p>
                <button class="rent-button"><a href="/fleet">Rent cars now</a></button>
            </div>
            <div class="col-sm">
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>

    <!-- Cards -->
    <div class="card-container">
        <div class="card">
            <img src="{{ asset('assets/images/home-images/jdm-jdm-cars.gif') }}">
            <div class="card-content">
                <h3>Creator</h3>
                <p>DAWDIWAD</p>
                <a href="" class="btn">Read More</a>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('assets/images/home-images/NFS Toyota.gif') }}">
            <div class="card-content">
                <h3>What is Toyota</h3>
                <p>DAWDIWAD</p>
                <a href="" class="btn">Read More</a>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('assets/images/home-images/drive-car.gif') }}">
            <div class="card-content">
                <h3>Toyota PH Branch</h3>
                <p>DAWDIWAD</p>
                <a href="" class="btn">Read More</a>
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
<!-- End of .container -->

    <!-- Bootstrap and Font Awesome Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome for icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
