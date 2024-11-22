<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyCars-Arrangment-Page</title>
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
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    

    <style>
        /* Make sure the map div has a height */
        #map {
            width: 100%;
            height: 400px;
        }

        body {
            background-image: url("{{ asset('assets/images/arrangement-images/Arrangement-bg.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover; /* or 'contain' depending on your preference */
            margin: 0;
            padding: 0;
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
    
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('car'))
    <div class="alert alert-info">
        You have reserved: {{ session('car')->carModel->model_name ?? 'Unknown Model' }}
    </div>
@endif


<form id="reservation-form" action="{{ route('reserve.store') }}" method="POST" style="margin-bottom: 25px" name="reserve.store">
    @csrf
    <div class="container mt-5 p-4 bg-dark text-white rounded">
        <div class="row">
            <div class="col-md-8">
                <h1>Easy Car</h1>
                <p>You are renting: {{ $car->carModel->model_name ?? 'Unknown Model' }}</p>
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
                <div class="form-group">
                    <label for="pickup-location">Pick-up Location</label>
                    <select class="form-control" id="pickup-location" name="pickup-location" required>
                        <option selected>Makati Central Business District, Makati City</option>
                        <option>Ninoy Aquino International Airport (NAIA), Manila</option>
                        <option>SM City Marilao, Bulacan</option>
                        <option>Trinoma Mall, Quezon City, Metro Manila</option>
                        <option>Alabang Town Center, Muntinlupa City</option>
                        <option>Tagaytay Rotonda, Tagaytay City</option>
                    </select>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="sameLocationCheckbox" onclick="copyPickupToReturn()">
                    <label class="form-check-label" for="sameLocationCheckbox">Same as Pick-up Location</label>
                </div>
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
                <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-danger" onclick="showConfirmationModal()">Submit</button>
                </div>
            </div>
            <div class="col-md-4">
                <h3 class="text-center mb-4">Pick-up Locations</h3>
                <div id="map" style="width: 100%; height: 400px; background-color: lightgray;">
                    <p class="text-center">Map will go here</p>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirm Your Reservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Please confirm your details:</p>
                <ul id="reservation-details"></ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitForm(event)">Confirm</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Font Awesome for icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>


<script>
    function showConfirmationModal() {
        // Get form values
        const pickupDate = document.getElementById('pickup-date').value;
        const pickupTime = document.getElementById('pickup-time').value;
        const pickupLocation = document.getElementById('pickup-location').value;
        const returnDate = document.getElementById('return-date').value;
        const returnTime = document.getElementById('return-time').value;
        const returnLocation = document.getElementById('return-location').value;
        

        // Show the modal
        $('#confirmationModal').modal('show');

        // Populate modal with form values
        const reservationDetails = `
            <li>Pick-up Date: ${pickupDate}</li>
            <li>Pick-up Time: ${pickupTime}</li>
            <li>Pick-up Location: ${pickupLocation}</li>
            <li>Return Date: ${returnDate}</li>
            <li>Return Time: ${returnTime}</li>
            <li>Return Location: ${returnLocation}</li>

        `;
        document.getElementById('reservation-details').innerHTML = reservationDetails;
        
    }

    function initMap() {
            // Initialize the map centered at a default location
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: { lat: 14.5995, lng: 120.9842 } // Center the map on Metro Manila
            });
        }

    let map;
        const locations = {
            "Makati Central Business District, Makati City": { lat: 14.5547, lng: 121.0244 },
            "Ninoy Aquino International Airport (NAIA), Manila": { lat: 14.5085, lng: 121.0194 },
            "SM City Marilao, Bulacan": { lat: 14.6985, lng: 120.9421 },
            "Trinoma Mall, Quezon City, Metro Manila": { lat: 14.6455, lng: 121.0531 },
            "Alabang Town Center, Muntinlupa City": { lat: 14.4148, lng: 121.0463 },
            "Tagaytay Rotonda, Tagaytay City": { lat: 14.0972, lng: 120.9498 }
        };

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

        function submitForm(event) {
            event.preventDefault();
        // Submit the form
        document.getElementById('reservation-form').submit();
    }

    function copyPickupToReturn() {
    const pickupLocation = document.getElementById('pickup-location').value;
    const returnLocation = document.getElementById('return-location');
    const checkbox = document.getElementById('sameLocationCheckbox');

    if (checkbox.checked) {
        returnLocation.value = pickupLocation;
        returnLocation.disabled = true; // Lock the return location
    } else {
        returnLocation.disabled = false; // Unlock the return location
    }
}

function setMinReturnDate() {
    const pickupDate = document.getElementById('pickup-date').value;
    const returnDateInput = document.getElementById('return-date');

    // Set the minimum return date to the selected pickup date
    if (pickupDate) {
        returnDateInput.min = pickupDate; // Sets the min attribute to pickup date
    } else {
        returnDateInput.min = ''; // Reset min if no pickup date selected
    }
}

function setMinReturnTime() {
        const pickupDate = document.getElementById('pickup-date').value;
        const pickupTime = document.getElementById('pickup-time').value;
        const returnTimeInput = document.getElementById('return-time');

        // Check if both pickup date and time are selected
        if (pickupDate && pickupTime) {
            // Combine the date and time into a Date object
            const pickupDateTime = new Date(`${pickupDate}T${pickupTime}`);

            // Set the minimum return time to the pickup date and time
            returnTimeInput.min = pickupDateTime.toISOString().substring(11, 16); // Format time to HH:MM
        } else {
            returnTimeInput.min = ''; // Reset min if no pickup date or time selected
        }
    }

    
        // Call this function when the pickup location is changed
        document.getElementById('pickup-location').addEventListener('change', function() {
            loadMap(this.value);
        });

    $(document).ready(function() {
    });
</script>

</body>
</html>
