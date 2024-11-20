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

     <style>
        .card-image {
            height: 250px; /* Set a fixed height */
            object-fit: cover; /* Ensures the image covers the area without distortion */
            width: 100%; /* Makes the image responsive */
            border-radius: 10px; /* Optional: For rounded corners */
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
                        <a class="nav-link active" aria-current="page" href="/fleet">Fleet</a>
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
            <div class="choices-button mb-3" style="display: flex; align-items: center;">
            <h4 style="margin-right: 10px; margin-top: 7px;">Select Type of Vehicle:</h4>
            <a href="/fleet" class="btn btn-danger" style="border:1px solid black;">Cars</a>
            <a href="" class="btn btn-light ml-2" style="border:1px solid black;">Vans</a>
        </div>
    <div class="row">
            <!-- Card 1 -->
                <div class="col-md-4 mb-4">
                    <div class="choice-card border border-dark" style="border-radius: 20px;">
                        <img src="{{asset('assets/images/fleet-image/GTR-2017.png') }}" class="img-fluid card-image" alt="GTR 2018 image">
                        <div class="card-body text-center">
                            <h5 class="card-title">NISSAN GT-R</h5>
                            <p class="card-text">2017 VERSION</p>
                            <p>
                                <i class="bi bi-gear"></i> Dual-Clutch Automatic &nbsp;
                                <i class="bi bi-people"></i> 4 People &nbsp;
                                <i class="fa-regular fa-star"></i> Ratings
                            </p>
                            <!-- Button with dynamic route -->
                            <a href="{{ route('fleet.show', 1) }}" class="btn btn-danger mb-4 w-50" style="border-radius: 25px; padding: 5px 15px;">View Details</a>
                        </div>
                    </div>
                </div>



        <!-- Card 2 -->
            <div class="col-md-4 mb-4">
                <div class="choice-card border border-dark" style="border-radius: 20px;">
                <img src="{{asset('assets/images/fleet-image/Toyota-vios.png') }}" class="img-fluid card-image" alt="Toyota-vios image">
                <div class="card-body text-center">
                        <h5 class="card-title">Toyota Vios</h5>
                        <p class="card-text">2018 Version</p>
                        <p>
                            <i class="bi bi-gear"></i> CVT &nbsp;
                            <i class="bi bi-people"></i> 5 People &nbsp;
                            <i class="fa-regular fa-star"></i> Ratings
                        </p>
                        <a href="{{ route('fleet.show', 2) }}" class="btn btn-danger mb-4 w-50" style="border-radius: 25px; padding: 5px 15px;">View Details</a>
                        </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4 mb-4">
                <div class="choice-card border border-dark" style="border-radius: 20px;">
                <img src="{{asset('assets/images/fleet-image/Honda-city.png') }}" class="img-fluid card-image" alt="Honda City image">
                <div class="card-body text-center">
                        <h5 class="card-title">Honda City</h5>
                        <p class="card-text">2020 Version</p>
                        <p>
                            <i class="bi bi-gear"></i> CVT &nbsp;
                            <i class="bi bi-people"></i> 5 People &nbsp;
                            <i class="fa-regular fa-star"></i> Ratings
                        </p>
                        <a href="{{ route('fleet.show', 3) }}" class="btn btn-danger mb-4 w-50" style="border-radius: 25px; padding: 5px 15px;">View Details</a>
                        </div>
                </div>
            </div>
            <hr>
            <!-- Card 4 -->
                <div class="col-md-4 mb-4">
                    <div class="choice-card border border-dark" style="border-radius: 20px;">
                    <img src="{{asset('assets/images/fleet-image/Mitsubishi-mirage.png') }}" class="img-fluid card-image" alt="Mitsubishi Mirage image">
                    <div class="card-body text-center">
                            <h5 class="card-title">Mitsubishi Mirage</h5>
                            <p class="card-text">2012 Version</p>
                            <p>
                                <i class="bi bi-gear"></i> CVT &nbsp;
                                <i class="bi bi-people"></i> 5 People &nbsp;
                                <i class="fa-regular fa-star"></i> Ratings
                            </p>
                            <a href="{{ route('fleet.show', 4) }}" class="btn btn-danger mb-4 w-50" style="border-radius: 25px; padding: 5px 15px;">View Details</a>
                        </div>
                    </div>
                </div>
            <!-- Card 5 -->
                <div class="col-md-4 mb-4">
                    <div class="choice-card border border-dark" style="border-radius: 20px;">
                    <img src="{{asset('assets/images/fleet-image/Nissan-Almera.png') }}" class="img-fluid card-image" alt="Nissan Almera">
                    <div class="card-body text-center">
                            <h5 class="card-title">Nissan Almera</h5>
                            <p class="card-text">2020 Version</p>
                            <p>
                                <i class="bi bi-gear"></i> CVT &nbsp;
                                <i class="bi bi-people"></i> 5 People &nbsp;
                                <i class="fa-regular fa-star"></i> Ratings
                            </p>
                            <a href="{{ route('fleet.show', 5) }}" class="btn btn-danger mb-4 w-50" style="border-radius: 25px; padding: 5px 15px;">View Details</a>
                        </div>
                    </div>
                </div>
                <!-- Card 6 -->
                <div class="col-md-4 mb-4">
                    <div class="choice-card border border-dark" style="border-radius: 20px;">
                    <img src="{{asset('assets/images/fleet-image/Suzuki-swift.png') }}" class="img-fluid card-image" alt="Suzuki Swift image">
                    <div class="card-body text-center">
                            <h5 class="card-title">Suzuki Swift</h5>
                            <p class="card-text">2017 Version</p>
                            <p>
                                <i class="bi bi-gear"></i> Automatic &nbsp;
                                <i class="bi bi-people"></i> 5 People &nbsp;
                                <i class="fa-regular fa-star"></i> Ratings
                            </p>
                            <a href="{{ route('fleet.show', 6) }}" class="btn btn-danger mb-4 w-50" style="border-radius: 25px; padding: 5px 15px;">View Details</a>
                        </div>
                    </div>
                </div>
                <hr>
            <!-- Card 7 -->
                <div class="col-md-4 mb-4">
            <div class="choice-card border border-dark" style="border-radius: 20px;">
            <img src="{{asset('assets/images/fleet-image/Hyundai-accent.png') }}" class="img-fluid card-image" alt="Hyundai Accent image">
            <div class="card-body text-center">
                    <h5 class="card-title">Hyundai Accent</h5>
                    <p class="card-text">2017 Version</p>
                    <p>
                        <i class="bi bi-gear"></i> Automatic &nbsp;
                        <i class="bi bi-people"></i> 5 People &nbsp;
                        <i class="fa-regular fa-star"></i> Ratings
                    </p>
                    <a href="{{ route('fleet.show', 7) }}" class="btn btn-danger mb-4 w-50" style="border-radius: 25px; padding: 5px 15px;">View Details</a>
                    </div>
            </div>
        </div>
        <!-- Card 8 -->
        <div class="col-md-4 mb-4">
            <div class="choice-card border border-dark" style="border-radius: 20px;">
            <img src="{{asset('assets/images/fleet-image/Toyota-innova.png') }}" class="img-fluid card-image" alt="Toyota Innova image">
            <div class="card-body text-center">
                    <h5 class="card-title">Toyota Innova</h5>
                    <p class="card-text">2021 Version</p>
                    <p>
                        <i class="bi bi-gear"></i> Manual &nbsp;
                        <i class="bi bi-people"></i> 7 People &nbsp;
                        <i class="fa-regular fa-star"></i> Ratings
                    </p>
                    <a href="{{ route('fleet.show', 8) }}" class="btn btn-danger mb-4 w-50" style="border-radius: 25px; padding: 5px 15px;">View Details</a>
                    </div>
            </div>
        </div>
        <!-- Card 9 -->
        <div class="col-md-4 mb-4">
            <div class="choice-card border border-dark" style="border-radius: 20px;">
            <img src="{{asset('assets/images/fleet-image/Honda-CRV-2017.png') }}" class="img-fluid card-image" alt="Honda CRV image">
            <div class="card-body text-center">
                    <h5 class="card-title">Honda CR-V</h5>
                    <p class="card-text">2017 Version</p>
                    <p>
                        <i class="bi bi-gear"></i> CVT &nbsp;
                        <i class="bi bi-people"></i> 5 People &nbsp;
                        <i class="fa-regular fa-star"></i> Ratings
                    </p>
                    <a href="{{ route('fleet.show', 9) }}" class="btn btn-danger mb-4 w-50" style="border-radius: 25px; padding: 5px 15px;">View Details</a>
                    </div>
            </div>
        </div>
        <hr>
        <!-- Card 10 -->
        <div class="col-md-4 mb-4">
            <div class="choice-card border border-dark" style="border-radius: 20px;">
            <img src="{{asset('assets/images/fleet-image/Ford-ecosport.png') }}" class="img-fluid card-image" alt="Ford Ecosport image">
            <div class="card-body text-center">
                    <h5 class="card-title">Ford Ecosport</h5>
                    <p class="card-text">2017 Version</p>
                    <p>
                        <i class="bi bi-gear"></i> Automatic &nbsp;
                        <i class="bi bi-people"></i> 5 People &nbsp;
                        <i class="fa-regular fa-star"></i> Ratings
                    </p>
                    <a href="{{ route('fleet.show', 10) }}" class="btn btn-danger mb-4 w-50" style="border-radius: 25px; padding: 5px 15px;">View Details</a>
                    </div>
            </div>
        </div>
        <!-- Card 11 -->
        <div class="col-md-4 mb-4">
            <div class="choice-card border border-dark" style="border-radius: 20px;">
            <img src="{{asset('assets/images/fleet-image/Chevrolet-spark.png') }}" class="img-fluid card-image" alt="Chevrolet Spark image">
            <div class="card-body text-center">
                    <h5 class="card-title">Chevrolet Spark</h5>
                    <p class="card-text">2016 Version</p>
                    <p>
                        <i class="bi bi-gear"></i> Automatic &nbsp;
                        <i class="bi bi-people"></i> 5 People &nbsp;
                        <i class="fa-regular fa-star"></i> Ratings
                    </p>
                    <a href="{{ route('fleet.show', 11) }}" class="btn btn-danger mb-4 w-50" style="border-radius: 25px; padding: 5px 15px;">View Details</a>
                    </div>
            </div>
        </div>
        <!-- Card 12 -->
        <div class="col-md-4 mb-4">
            <div class="choice-card border border-dark" style="border-radius: 20px;">
            <img src="{{asset('assets/images/fleet-image/Kia-picanto.png') }}" class="img-fluid card-image" alt="Kia Picanto image">
            <div class="card-body text-center">
                    <h5 class="card-title">Kia Picanto</h5>
                    <p class="card-text">2017 Version</p>
                    <p>
                        <i class="bi bi-gear"></i> Manual &nbsp;
                        <i class="bi bi-people"></i> 5 People &nbsp;
                        <i class="fa-regular fa-star"></i> Ratings
                    </p>
                    <a href="{{ route('fleet.show', 12) }}" class="btn btn-danger mb-4 w-50" style="border-radius: 25px; padding: 5px 15px;">View Details</a>
                    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
