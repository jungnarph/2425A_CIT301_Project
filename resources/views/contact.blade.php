<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/services.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" >
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/jpg">
    <link rel="stylesheet" href="footer.css">
    <style>
        .main-button {
            background: linear-gradient(90deg, rgba(0, 0, 0, 1) 24%, rgba(212, 212, 212, 1) 100%);
        }
        .about-us-section {
            background-image: url('about_background.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            padding: 300px;
            padding-bottom: 1px;
        }

        body{
            background-image: none;
            background-repeat: no-repeat;
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
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/fleet">Fleet</a></li>
                    <li class="nav-item"><a class="nav-link" href="/services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/contact">Contact</a></li>
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

    <div class="container mt-4">
        <!-- Hero Section -->
        <section class="text-center py-4 rounded" style="background: #b71c1c; color: #fff;">
            <h1 class="display-5">Get in Touch</h1>
            <p class="lead">We're here to help! Reach out to us for any inquiries, support, or feedback.</p>
        </section>

        <!-- Contact Information -->
        <section class="row text-center my-5">
            <div class="col-md-4">
                <i class="fas fa-phone-alt fa-3x mb-3 text-danger"></i>
                <h5>Call Us</h5>
                <p>+63 123 456 7890</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-envelope fa-3x mb-3 text-danger"></i>
                <h5>Email Us</h5>
                <p>offical.easycars@gmail.com</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-map-marker-alt fa-3x mb-3 text-danger"></i>
                <h5>Visit Us</h5>
                <p>Quadrant 3 sector 562, cluster B, planet C7-0G3</p>
            </div>
        </section>

        <!-- Contact Form -->
        <section class="bg-light p-5 rounded shadow-sm">
            <h2 class="text-center mb-4" style="color: #b71c1c;">Send Us a Message</h2>
                <form action="/contact" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="message" class="form-control" rows="5" placeholder="Your Message" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-danger px-5">Submit</button>
                    </div>
                </form>
        </section>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>