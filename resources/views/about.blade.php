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
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
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
                    <li class="nav-item"><a class="nav-link active" href="/about">About</a></li>
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

    <!-- ABOUT US -->

    <div class="service-head">
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm service-card">
                About Us
                <p style="font-size: 17px; margin-top:10px">
                We are committed to delivering reliable, innovative solutions that prioritize quality, 
                sustainability, and customer satisfaction. Together, we drive progress and make a difference in every community we serve.
                </p>
            </div>
            <div class="col-sm ">
            </div>
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