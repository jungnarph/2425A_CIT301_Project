<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>
    @auth
    <div class="container-fluid">
        <div class="row mobile-nav logo-container align-items-center position-relative">
        <div class="col-12 text-center text-md-left py-3">
            <button class="hamburger-button btn" aria-label="Menu" id="toggleSidebar">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
            <img src="{{ asset('assets/images/project-logo-white-transparent.png') }}" alt="Logo" class="img-fluid logo-main" style="max-width: 10rem;">
        </div>
    </div>
    </div>
    

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar (left) -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="col-12 text-center text-md-left pt-3 sidebar-logo-img">
                    <button class="hamburger-button-sidebar btn" aria-label="Menu" id="closeSidebar">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>
                    <img src="{{ asset('assets/images/project-logo-white-transparent.png') }}" alt="Logo" class="img-fluid logo-main" style="max-width: 10rem;">
                </div>
                <h4 class="text-center mt-4">Admin Panel</h4>
                <ul class="nav flex-column mt-3">
                    <li class="nav-item">
                        <a href="/admin/dashboard" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Users Management</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/fleets" class="nav-link">Fleet Management</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Help & Support</a>
                    </li>
                    <li class="nav-item mt-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="#" class="nav-link text-danger" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                        </form>
                    </li>
                </ul>
            </div>
    
            @yield('main_panel')

        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
    @endauth
</body>
</html>