<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <style>
        .blur-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            padding: 6%;
        }

        .blur-container label,
        .blur-container button,
        .blur-container a {
            color: white !important;
        }

        .blur-container button {
            background-color: rgba(255, 255, 255, 0.2); 
            color: white; 
            border: 1px solid rgba(255, 255, 255, 0.4); 
        }

        .blur-container button:hover {
            background-color: rgba(255, 255, 255, 0.3); 
        }
        body {
            background-image: url("image.jpg");
            background-repeat: no-repeat;
            background-size: auto;
            margin: 0;
            padding: 0;
        }
        .error-message {
            color: red;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/images/project-logo-rectangle.jfif') }}" alt="Logo" height="75">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/login">login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="blur-container">
                    <h4 class="text-center mb-4" style="color: white;">Register</h4>

                    <!-- Display validation errors if any -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="/register">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" name="username" class="form-control" required>
                                <!-- Display error for username -->
                                @error('username')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                                <!-- Display error for email -->
                                @error('email')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="First_name" class="form-label">First Name</label>
                                <input type="text" id="First_name" name="First_name" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="Middle_name" class="form-label">Middle Name</label>
                                <input type="text" id="Middle_name" name="Middle_name" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="Last_name" class="form-label">Last Name</label>
                                <input type="text" id="Last_name" name="Last_name" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="Contact_number" class="form-label">Contact Number</label>
                                <input type="text" id="Contact_number" name="Contact_number" class="form-control">
                                @error('Contact_number')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="Driver_license_ID" class="form-label">Driver License ID</label>
                                <input type="text" id="Driver_license_ID" name="Driver_license_ID" class="form-control">
                                @error('Driver_license_ID')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                                @error('password')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                                @error('password_confirmation')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="d-flex justify-content-end">
                            <a href="/login" class="text-muted me-3">Already registered?</a>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
