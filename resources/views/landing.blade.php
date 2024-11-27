<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyCars | Home Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="Landing.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <style>
        .main-button {
            background: rgb(0, 0, 0);
            background: linear-gradient(90deg, rgba(0, 0, 0, 1) 24%, rgba(212, 212, 212, 1) 100%);
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
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="/landing">Home</a></li> 
                    <li class="nav-item"><a class="nav-link" href="/fleet">Fleet</a></li>
                    <li class="nav-item"><a class="nav-link" href="/services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="/Profile">Profile</a></li>
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

    <div class="welcome-container">
        <h3 style="color: white; font-size: 100px;">WELCOME</h3>

        <h2 style="color: white; font-size: 40px;">
            {{ Auth::user()->username ?? 'Guest' }}
        </h2>
        <br>
        <p style="color: #c7c7c7;">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo quam quos ex eum culpa voluptatum cupiditate necessitatibus, 
            corrupti excepturi consequatur? Minima perspiciatis tempora, et autem velit nesciunt nisi est quisquam facilis delectus nobis
            odit pariatur odio fuga ullam perferendis, eaque sequi ipsa doloribus in deleniti cupiditate. Inventore qui harum consequatur?
        </p>

        <button type="button" style="width: 40%; border-radius: 10px; border: solid white 0.5px; color: white; padding: 10px" class="main-button"><a href="/fleet" style="text-decoration: none; color: white;">Rent cars now</a></button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
