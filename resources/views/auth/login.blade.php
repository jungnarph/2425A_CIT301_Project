<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="Landing.css" rel="stylesheet">
    <style>
        .login-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            padding: 6%;
            margin-top: 40px;
            border: none;
        }

        h3 {
            font-weight: bold;
            margin-bottom: 20px;
            color: #fff;
        }

        label {
            font-weight: bold;
            color: #fff;
        }

        input::placeholder {
            color: black;
            opacity: 0.7;
        }

        .form-control {
            background-color: white; /* Background is white */
            color: black; /* Text is black initially */
            border: 1px solid #ccc;
        }

        .form-control:focus {
            background-color: white; /* Retains white background on focus */
            color: black; /* Ensures text stays black on focus */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(0, 0, 0, 0.5);
        }

        .login-button {
            background-color: rgba(255, 255, 255, 0.2); 
            color: white; 
            border: 1px solid rgba(255, 255, 255, 0.4);
            width: 100%;
        }

        .login-button:hover {
            background-color: rgba(255, 255, 255, 0.3); 
        }

        .forgot-password {
            color: #ddd;
        }

        .forgot-password:hover {
            color: white;
            text-decoration: underline;
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{asset('assets/images/project-logo-rectangle.jfif') }}" alt="Logo" width="auto" height="75">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"> <!-- All items on the right -->
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="login-container col-12 col-sm-10 col-md-8 col-lg-6">
                <h3 class="text-center">Sign-in</h3>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input id="username" type="text" name="username" class="form-control" required autofocus autocomplete="username">
                        @error('email')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" name="password" class="form-control" required autocomplete="current-password">
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check mb-3">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label">Remember me</label>
                    </div>

                    <div class="mb-3 text-end">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-password">Forgot your password?</a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="btn login-button">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
