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
    <link href="Landing.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/project-logo-rectangle.jfif') }}" alt="Logo" width="auto" height="75">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/landing">Home</a></l> 
                    <li class="nav-item"><a class="nav-link" href="/fleet">Fleet</a></li>
                    <li class="nav-item"><a class="nav-link" href="/services">Services</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="/Profile">Profile</a></li>
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

    <div class="about-us-section">
        <div class="container text-center">
            <h3 style="color:black; margin-top:200px; font-size: 70px">About Us</h3>
        </div>
    </div>

    <!--"OUR MISSION" -->
    <div class ="card-container">
        <div class="about-card">
            <div class ="card-content">
                <h3>Our Mission</h3>
                <p style="margin-top: 50px">
                    Car rentals has always been a pain to manage because of it's tedious manual process and
                    excessive paperworks. Easy cars is a web-based platform designed to cater users that require
                    car rental services that is hassle-free and easy to use. Providing a readable interface, minimal
                    processing requirements, and a paper-less transaction, Easy cars will surely provide a quality
                    experience to our clients.
                </p>
            </div>
        </div>
        <div class="about-card">
            <img src="{{ asset('assets/images/about-images/Misson.webp') }}">
        </div>
    </div>

    <!--"SERVICES" -->
    <div class ="card-container" style="margin-top:auto;">
        <div class="about-card">
            <div class ="card-content">
                <h3>Our Services</h3>
                <p style="margin-top:50px">
                    Easy cars provides not only just the essence of a linear car renting process, we also provide
                    a wide range of services in the context of rental cars. This includes renting cars with driver services, multi-day
                    rent packages, quick or emergency rentals, and even solely renting the car for personal use, Easy cars
                    has it all!
                </p>
            </div>
        </div>
        <div class="about-card">
            <img src="{{ asset('assets/images/about-images/Services.jpg') }}">
        </div>
    </div>

    <!--"FLEET" -->
    <div class ="card-container" style="margin-top:auto;">
        <div class="about-card">
            <div class ="card-content">
                <h3>FLEET</h3>
                <p style="margin-top: 50px">
                    In line with our services, Easy cars also provides a wide range of rent-ready cars 
                    through our Fleet. Sedans, UVs, sports cars, or even buses, we have it all! Personalize
                    your search by filtering and specifying the car you want to rent in our Flee.
                </p>
            </div>
        </div>
        <div class="about-card">
                <img src="{{ asset('assets/images/about-images/Fleet.jpg') }}">
        </div>
    </div>

    <!-- THE TEAM -->
    <h3 class="team"><center>The Team</center></h3>
    <div class ="team-card-container">
        <div class="team-card">
            <img src="{{ asset('assets/images/about-images/miguel-about.jpg') }}">
            <div class ="team-card-content">
                <h3>Miguel Perlado</h3>
                <p>Currently a 3rd year IT student at Technological Institute of the Philippines Manila,
                    an aspiring IT professional specializing in Database management, Networking and front-end
                    Development. Capable of cooperating and communicating with any team member and willing to improve and learn 
                    in his chosen field.
                </P>
            </div>
        </div>
        <div class="team-card">
            <img src="{{ asset('assets/images/about-images/daniel-about-2.jpg') }}">
            <div class ="team-card-content">
                <h3>Daniel Bucad</h3>
                <p> 
                    Ladies and gentlemen
                    It was a cold-blooded premeditated murder
                    Brain pain again, can't remember my name (ah)
                    This distance is sickness, I'm super nihilistic (ah)
                    Do we exist inside an acid trip?
                    Or is this flux born from a fantasist?
                    My make-believe idiosyncrasy
                    Help me (ah)
                    Just wanna party on my deathbed
                    I'm here to live my life electric
                    Just wanna party on my deathbed
                    Yeah, maybe I am just a wreckhead
                    But I know I don't wanna waste it
                    Just wanna party on my deathbed
                    Ah, ah
                </p>
            </div>
        </div>
        <div class="team-card">
            <img src="{{ asset('assets/images/about-images/jared-about.jpg') }}">
            <div class ="team-card-content">
                <h3>Jared Mandap</h3>
                <p>- An aspiring programmer specializing in front-end & back-end design with the goal 
                    of honing his skills to meet industry standards. Flexible & Adaptative, 
                    a student willing to give his outmost effort to learn and improvise to different challenges. </P>
            </div>
        </div>
        <div class="team-card">
            <img src="{{ asset('assets/images/about-images/rick-about.jpg') }}">
            <div class ="team-card-content">
                <h3>Ericka Penafiel</h3>
                <p>Ericka Franchesca N. Penafiel, aka Rick/Rickey , an aspiring 
                    3rd Year BSIT student of TIP Manila, living in Mandaluyong City.</P>
            </div>
        </div>
        <div class="team-card">
            <img src="{{ asset('assets/images/about-images/eco-about.jpg') }}">
            <div class ="team-card-content">
                <h3>Edge Eco</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit, dolores.</P>
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