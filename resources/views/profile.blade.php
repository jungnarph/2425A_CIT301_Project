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
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">    
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
                    <li class="nav-item"><a class="nav-link" href="/landing">Home</a></li> 
                    <li class="nav-item"><a class="nav-link" href="#">Fleet</a></li>
                    <li class="nav-item"><a class="nav-link" href="/services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/Profile">Profile</a></li>
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

    <!--BODY-->
    <!--profile-->
    <div class="container body-container">
        <div class="row items">
            <div class="col-sm-4">
            <h3 class="text-center">Profile</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <ul>
                            <li>username</li>
                            <li>email</li>
                            <li>First name</li>
                            <li>Middle Name</li>
                            <li>Surname</li>
                            <li>Contact Number</li>
                            <li>Driver's License ID</li>
                        </ul>
                    </div>
                    <div class="col-sm-6 text-end">
                        <ul>
                            <li>STATIC <a href="#">edit</a></li>
                            <li>STATIC <a href="#">edit</a></li>
                            <li>STATIC <a href="#">edit</a></li>
                            <li>STATIC <a href="#">edit</a></li>
                            <li>STATIC <a href="#">edit</a></li>
                            <li>STATIC <a href="#">edit</a></li>
                            <li>STATIC <a href="#">edit</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <!--history-->
        <div class="col-sm-8" style="border: solid black 0.5px;">
        <h3 class="text-center">History</h3>
            <div class="container my-4">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Car ID</th>
                                <th>Pickup Date</th>
                                <th>Pickup Time</th>
                                <th>Return Date</th>
                                <th>Return Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>STATIC</td>
                                <td>STATIC</td>
                                <td>STATIC</td>
                                <td>STATIC</td>
                                <td>STATIC</td>
                            </tr>
                            <tr>
                                <td>STATIC</td>
                                <td>STATIC</td>
                                <td>STATIC</td>
                                <td>STATIC</td>
                                <td>STATIC</td>
                            </tr>
                        </tbody>
                    </table>
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