<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyCars-Transaction-Page</title>
    <!-- Jqery link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <!-- Include Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <!-- Include Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXJEWGHWLIAHMrG5u8foaJ3psh05KTCOM&callback=initMap" async defer></script>
    
    <style>
        #map {
            width: 100%;
            height: 400px;
        }
        body {
            background-image: url("{{ asset('assets/images/arrangement-images/Arrangement-bg.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<!-- Navbar -->
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
                <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="/fleet">Fleet</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="/signin"><i class="bi bi-person" style="margin-right:0.5rem;"></i></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Success and Car Information Messages -->
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session('car'))
    <div class="alert alert-info">You have reserved: {{ session('car')->carModel->model_name ?? 'Unknown Model' }}</div>
@endif
<!-- Reservation Form -->
<form id="reservation-form" action="{{ route('reservations.store') }}" method="POST" class="container mt-5 p-4 bg-dark text-white rounded">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <h1>Easy Car</h1>
            <p>You are renting: {{ $car->carModel->model_name }}</p>
            <!-- Pick-up Date and Time -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="pickup-date">Pick-up Date</label>
                    <input type="date" class="form-control" id="pickup-date" name="pickup-date" required onchange="setMinReturnDate()">
                </div>
                <div class="form-group col-md-6">
                    <label for="pickup-time">Pick-up Time</label>
                    <input type="time" class="form-control" id="pickup-time" name="pickup-time" required onchange="setMinReturnTime()">
                </div>
            </div>
            <!-- Pick-up Location -->
            <div class="form-group">
                <label for="pickup-location">Pick-up Location</label>
                <select class="form-control" id="pickup-location" name="pickup-location" required onchange="loadMap(this.value)">
                    <option selected>Makati Central Business District, Makati City</option>
                    <option>Ninoy Aquino International Airport (NAIA), Manila</option>
                    <option>SM City Marilao, Bulacan</option>
                    <option>Trinoma Mall, Quezon City, Metro Manila</option>
                    <option>Alabang Town Center, Muntinlupa City</option>
                    <option>Tagaytay Rotonda, Tagaytay City</option>
                </select>
            </div>
            <!-- Same as Pickup Location Checkbox -->
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="sameLocationCheckbox" onclick="copyPickupToReturn()">
                <label class="form-check-label" for="sameLocationCheckbox">Same as Pick-up Location</label>
            </div>
            <!-- Return Date and Time -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="return-date">Return Date</label>
                    <input type="date" class="form-control" id="return-date" name="return-date" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="return-time">Return Time</label>
                    <input type="time" class="form-control" id="return-time" name="return-time" required>
                </div>
            </div>
            <!-- Return Location -->
            <div class="form-group">
                <label for="return-location">Return Location</label>
                <select class="form-control" id="return-location" name="return-location" required>
                    <option selected>Makati Central Business District, Makati City</option>
                    <option>Ninoy Aquino International Airport (NAIA), Manila</option>
                    <option>SM City Marilao, Bulacan</option>
                    <option>Trinoma Mall, Quezon City, Metro Manila</option>
                    <option>Alabang Town Center, Muntinlupa City</option>
                    <option>Tagaytay Rotonda, Tagaytay City</option>
                </select>
            </div>
            <!-- Submit Button -->
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
        </div>
        <!-- Map Section -->
        <div class="col-md-4">
            <h3 class="text-center mb-4">Pick-up Locations</h3>
            <div id="map" style="width: 100%; height: 400px; background-color: lightgray;"></div>
        </div>
    </div>
</form>
<!-- jQuery, Popper.js, and Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    let map;
    const locations = {
        "Makati Central Business District, Makati City": { lat: 14.5547, lng: 121.0244 },
        "Ninoy Aquino International Airport (NAIA), Manila": { lat: 14.5085, lng: 121.0194 },
        "SM City Marilao, Bulacan": { lat: 14.6985, lng: 120.9421 },
        "Trinoma Mall, Quezon City, Metro Manila": { lat: 14.6455, lng: 121.0531 },
        "Alabang Town Center, Muntinlupa City": { lat: 14.4148, lng: 121.0463 },
        "Tagaytay Rotonda, Tagaytay City": { lat: 14.0972, lng: 120.9498 }
    };
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: { lat: 14.5995, lng: 120.9842 } // Centered on Metro Manila
        });
    }
    function loadMap(location) {
        const coords = locations[location];
        if (coords) {
            map.setCenter(coords);
            map.setZoom(14);
            new google.maps.Marker({
                position: coords,
                map: map,
                title: location
            });
        }
    }
    function copyPickupToReturn() {
        const pickupLocation = document.getElementById('pickup-location').value;
        if (document.getElementById('sameLocationCheckbox').checked) {
            document.getElementById('return-location').value = pickupLocation;
        }
    }
    function setMinReturnDate() {
        const pickupDate = document.getElementById('pickup-date').value;
        document.getElementById('return-date').setAttribute('min', pickupDate);
    }
    function setMinReturnTime() {
        const pickupTime = document.getElementById('pickup-time').value;
        document.getElementById('return-time').setAttribute('min', pickupTime);
    }
    // Initialize the map
    window.onload = initMap;
</script>
</body>
</html>