<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/services.css') }}">
    <style>
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
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/landing">Home</a></li> 
                    <li class="nav-item"><a class="nav-link" href="/fleet">Fleet</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
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

    <!-- ABOUT US -->

    <div class="service-head">
        <div class="row">
            <div class="col-sm service-card">
                Our Services
                <p style="font-size: 17px; margin-top:10px">
                    Our team is dedicated to providing quality services with affordable pricing, minimal
                    availing time consumption, reliable and travel ready cars to meet all your travel 
                    needs.
                </p>
            </div>
            <div class="col-sm">
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>

    <div class="service-body">
        <h1 style="color: black; margin-top: 50px;"><center>Why Choose us?</center></h1>
        <div class="row">
            <div class="col-sm service-item-scaffold">
                <div class="service-item">
                    <img src="{{ asset('assets/images/Services-images/reservations.png') }}">
                    <div class="service-item-content">
                        <h3>Reservations</h3>
                        <p>Book your ride in advance with ease. 
                            Our user-friendly reservation system ensures you secure the car you need, 
                            when you need it, with just a few clicks.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm service-item-scaffold">
                <div class="service-item">
                    <img src="{{ asset('assets/images/Services-images/selection.jpg') }}">
                    <div class="service-item-content">
                        <h3>Wide range of Vehicles</h3>
                        <p>Choose from a wide range of vehicles to match your needs—whether it’s a 
                            compact car for city driving, a luxury sedan for business, 
                            or an SUV for your family trip. <a href="/fleet" style="text-decoration: none;">check our fleet</a>
                        </p>
                    
                    </div>
                </div>
            </div>
            <div class="col-sm service-item-scaffold">
                <div class="service-item">
                    <img src="{{ asset('assets/images/Services-images/affordable.png') }}">
                    <div class="service-item-content">
                        <h3>Affordable Pricing</h3>
                        <p>Get the best value with our competitive rates and flexible plans. 
                            Enjoy premium car rentals at prices that fit your budget, with no hidden fees or surprises.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm service-item-scaffold">
                <div class="service-item">
                    <img src="{{ asset('assets/images/Services-images/insurance.jpg') }}">
                    <div class="service-item-content">
                        <h3>Insurance inclusions</h3>
                        <p> Drive with confidence! We offer comprehensive insurance plans to protect you and your rental,
                         giving you peace of mind on every journey.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="service-body2">
        <h1 style="color: white;"><center>How it Works</center></h1>
        <div class="row text-center" style="color: white; margin-top: 30px;">
            <div class="col-md-6 mb-4">
                <div class="how-it-works-step">
                    <i class="fas fa-calendar-alt" style="color: #ffc107; font-size: 5rem;"></i>
                    <h4 style="margin-top: 10px;">Step 1: Make a Reservation</h4>
                    <p>Choose your desired car and schedule through our easy-to-use booking system.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="how-it-works-step">
                    <i class="fas fa-car" style="color: #28a745; font-size: 5rem;"></i>
                    <h4 style="margin-top: 10px;">Step 2: Pick Up Your Car</h4>
                    <p>Visit your selected location to pick up your car at the scheduled time.</p>
                </div>
            </div>
        </div>
        <div class="row text-center" style="color: white; margin-top: 30px;">
            <div class="col-md-6 mb-4">
                <div class="how-it-works-step">
                    <i class="fas fa-road" style="color: #17a2b8; font-size: 5rem;"></i>
                    <h4 style="margin-top: 10px;">Step 3: Enjoy the Ride</h4>
                    <p>Drive safely and enjoy the convenience of our reliable vehicles.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="how-it-works-step">
                    <i class="fas fa-undo" style="color: #dc3545; font-size: 5rem;"></i>
                    <h4 style="margin-top: 10px;">Step 4: Return the Car</h4>
                    <p>Drop off the car at the agreed location when your rental period ends.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container3">
            <div class="sec tip">
                <h2>Technological Institute of the Philippine</h2>
                <p>363 P. Casal St., Quiapo, Manila</p>
                <p>1338 Arlegui St., Quiapo, Manila</p>
                <p>938 Aurora Blvd, Cubao, Quezon City, 1109 Metro Manila</p>
                <ul class="sci">
                    <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-square-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-square-instagram"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
            </div>
            <div class="sec quicklinks">
                <h2>Student Services</h2>
                <ul>
                    <li><a href="https://canvas.tip.edu.ph">Canvas</a></li>
                    <li><a href="https://library.tip.edu.ph/">Library</a></li>
                    <li><a href="https://tip-careercenter.prosple.com/">Career Center</a></li>
                    <li><a href="https://canvas.tip.edu.ph/mail.html">T.I.P Email</a></li>
                    <li><a href="https://webqc2.tip.edu.ph/portal/aris/index.php">ARIS</a></li>
                </ul>
            </div>
            <div class="sec quicklinks">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="mainpage.html">Main Page</a></li>
                    <li><a href="achievements.html">Achievements</a></li>
                    <li><a href="partnership.html">Partner Community</a></li>
                    <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSfueoB3lU5a78hU7-z9SdTzfNuqr1JT1jJ_xTHO-Tpitb2EAA/viewform">Google Form</a></li>
                    <li><a href="http://localhost/CESO2/feedback.php">Feedback</a></li>

                </ul>
            </div>
            <div class="sec contactus">
                <h2>Contact Us</h2>
                <ul class="info">
                <label for="pnum">Phone Number</label>
                <input type="text" id="pnum" name="pnum"><br><br>
                </ul>
            </div>
        </div>
    </footer>
    <div class="copyrightText">
        <p>© 2023 Technological Institute of the Philippines. All Rights Reserved.</p>
    </div>

    <!-- Bootstrap and Font Awesome Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome for icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    
</body>
</html>