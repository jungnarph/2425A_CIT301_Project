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
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
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

<form id="reservation-form" action="{{ route('reservation.store', $carmodel->id) }}" method="POST" class="container mt-5 p-4 bg-dark text-white rounded">
    @csrf
    <!--input type="hidden" name="user_id" value="{{ auth()->user()->id ?? '' }}">
    <input type="hidden" name="car_model_id" value="{{ $carmodel->id }}">
    <input type="hidden" name="status" value="Pending"-->
    <div class="row">
        <div class="col-md-8">
            <h1>Easy Car</h1>
            <p>You are renting: {{ $carmodel->model_name }}</p>
            <!-- Pick-up Date and Time -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="pickup_date">Pick-up Date</label>
                    <input type="date" class="form-control" id="pickup-date" name="pickup_date" required onchange="setMinReturnDate()">
                </div>
                <div class="form-group col-md-6">
                    <label for="pickup_time">Pick-up Time</label>
                    <input type="time" class="form-control" id="pickup-time" name="pickup_time" required onchange="setMinReturnTime()">
                </div>
            </div>
            <!-- Pick-up Location -->
            <div class="form-group">
                <label for="pickup_location">Pick-up Location</label>
                <select class="form-control" id="pickup-location" name="pickup_location" required onchange="loadMap(this.value)">
                    <option value="" disabled selected>Select pickup location</option>
                    <option value="Makati Central Business District, Makati City">Makati Central Business District, Makati City</option>
                    <option value="Ninoy Aquino International Airport (NAIA), Manila" >Ninoy Aquino International Airport (NAIA), Manila</option>
                    <option value="SM City Marilao, Bulacan" >SM City Marilao, Bulacan</option>
                    <option value="Trinoma Mall, Quezon City, Metro Manila" >Trinoma Mall, Quezon City, Metro Manila</option>
                    <option value="Alabang Town Center, Muntinlupa City" >Alabang Town Center, Muntinlupa City</option>
                    <option value="Tagaytay Rotonda, Tagaytay City" >Tagaytay Rotonda, Tagaytay City</option>
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
                    <label for="return_date">Return Date</label>
                    <input type="date" class="form-control" id="return-date" name="return_date" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="return_time">Return Time</label>
                    <input type="time" class="form-control" id="return-time" name="return_time" required>
                </div>
            </div>
            <input type="hidden" id="return-location-hidden" name="return_location">
            <!-- Return Location -->
            <div class="form-group">
                <label for="return_location">Return Location</label>
                <select class="form-control" id="return-location" name="return_location" required>
                    <option value="" disabled selected>Select return location</option>
                    <option value="Makati Central Business District, Makati City">Makati Central Business District, Makati City</option>
                    <option value="Ninoy Aquino International Airport (NAIA), Manila" >Ninoy Aquino International Airport (NAIA), Manila</option>
                    <option value="SM City Marilao, Bulacan" >SM City Marilao, Bulacan</option>
                    <option value="Trinoma Mall, Quezon City, Metro Manila" >Trinoma Mall, Quezon City, Metro Manila</option>
                    <option value="Alabang Town Center, Muntinlupa City" >Alabang Town Center, Muntinlupa City</option>
                    <option value="Tagaytay Rotonda, Tagaytay City" >Tagaytay Rotonda, Tagaytay City</option>
                </select>
            </div>
            <!-- Submit Button -->
            <div class="d-flex justify-content-center mt-3">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmationModal">Submit</button>
            </div>
        </div>
        <!-- Map Section -->
        <div class="col-md-4">
            <h3 class="text-center mb-4">Pick-up Locations</h3>
            <div id="map" style="width: 100%; height: 400px; background-color: lightgray;"></div>
        </div>
    </div>
    </form>



    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Your Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Car Model:</strong> {{ $carmodel->model_name }}</p>
                    <p><strong>Pick-up Date:</strong> <span id="modal-pickup-date"></span></p>
                    <p><strong>Pick-up Time:</strong> <span id="modal-pickup-time"></span></p>
                    <p><strong>Pick-up Location:</strong> <span id="modal-pickup-location"></span></p>
                    <p><strong>Return Date:</strong> <span id="modal-return-date"></span></p>
                    <p><strong>Return Time:</strong> <span id="modal-return-time"></span></p>
                    <p><strong>Return Location:</strong> <span id="modal-return-location"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button id="confirm-button" type="submit" class="btn btn-danger" data-toggle="modal" data-target="#confirmationModal">Submit</button>
                </div>
            </div>
        </div>
    </div>
<!--/form-->


<!-- jQuery, Popper.js, and Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>

    function formatTimeTo12Hour(time) {
        const [hour, minute] = time.split(':');
        const period = +hour >= 12 ? 'PM' : 'AM';
        const formattedHour = +hour % 12 || 12; // Convert to 12-hour format
        return `${formattedHour}:${minute} ${period}`;
    }

    // Populate modal with input values
    $('[data-toggle="modal"]').on('click', function() {
        const pickupTime = $('#pickup-time').val();
        const returnTime = $('#return-time').val();

        $('#modal-pickup-date').text($('#pickup-date').val());
        $('#modal-pickup-time').text(pickupTime ? formatTimeTo12Hour(pickupTime) : '');
        $('#modal-pickup-location').text($('#pickup-location').val());
        $('#modal-return-date').text($('#return-date').val());
        $('#modal-return-time').text(returnTime ? formatTimeTo12Hour(returnTime) : '');
        $('#modal-return-location').text($('#return-location').val());
    });

    // Submit form when "Confirm" is clicked
    $('#confirm-button').on('click', function() {
        $('#reservation-form').submit();
    });

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
        const returnLocationDropdown = document.getElementById('return-location');
        const returnLocationHidden = document.getElementById('return-location-hidden');
        const checkbox = document.getElementById('sameLocationCheckbox');

        if (checkbox.checked) {
            returnLocationDropdown.value = pickupLocation;
            returnLocationHidden.value = pickupLocation;
            returnLocationDropdown.disabled = true;
        } 
        else {
            returnLocationDropdown.disabled = false;
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