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
                <img src="{{asset('assets/images/project-logo-transparent.png') }}" alt="Logo" width="auto" height="75">
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
                                <div class="input-group">
                                    <input type="password" 
                                        id="password" 
                                        name="password" 
                                        class="form-control" 
                                        required
                                        pattern="(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,}"
                                        title="Password must be at least 8 characters, include one uppercase letter, one number, and one special character.">
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
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

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" 
                                    id="agree" 
                                    name="agree" 
                                    class="form-check-input" 
                                    disabled required>
                                <label for="agree" class="form-check-label">I agree to the <a href="#" id="termsLink">Terms and Conditions</a></label>
                            </div>
                            @error('agree')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const passwordFieldType = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', passwordFieldType);

            // Toggle eye icon
            this.innerHTML = passwordFieldType === 'password' 
                ? '<i class="bi bi-eye"></i>' 
                : '<i class="bi bi-eye-slash"></i>';
        });

        document.getElementById('termsLink').addEventListener('click', function (event) {
            event.preventDefault(); // Prevent link navigation

            // Create the popup content
            const termsPopup = document.createElement('div');
            termsPopup.style.position = 'fixed';
            termsPopup.style.top = '50%';
            termsPopup.style.left = '50%';
            termsPopup.style.transform = 'translate(-50%, -50%)';
            termsPopup.style.backgroundColor = '#fff';
            termsPopup.style.padding = '20px';
            termsPopup.style.borderRadius = '10px';
            termsPopup.style.boxShadow = '0 5px 15px rgba(0,0,0,0.3)';
            termsPopup.style.maxHeight = '80vh';
            termsPopup.style.width = '400px';
            termsPopup.style.overflow = 'hidden';
            termsPopup.style.zIndex = '1000';
            termsPopup.innerHTML = `
            <h5>Terms and Conditions</h5>
            <div style="overflow-y: auto; height: 60vh; border: 1px solid #ccc; padding: 10px;">
                <p>
                    <strong>1. Agreement to Terms</strong><br>
                    By renting a vehicle from [Company Name], you agree to the following Terms and Conditions. Please read them carefully. If you do not agree with these terms, you must not rent or use our vehicles.<br><br>

                    <strong>2. Eligibility</strong><br>
                    To rent a vehicle, you must:<br>
                    - Be at least 21 years of age (or as required by local laws).<br>
                    - Hold a valid driver’s license for a minimum of one year.<br>
                    - Have a valid credit card in your name.<br>
                    - Meet any other eligibility requirements as per local laws.<br><br>

                    <strong>3. Rental Period</strong><br>
                    The rental period begins when you take possession of the vehicle and ends when the vehicle is returned. Rental rates are charged based on the duration of the rental. Late returns will incur additional charges.<br><br>

                    <strong>4. Vehicle Use</strong><br>
                    The rented vehicle is to be used only for lawful purposes. You are prohibited from:<br>
                    - Using the vehicle for illegal activities or any unauthorized use, including but not limited to racing or driving under the influence.<br>
                    - Subletting or transferring the vehicle to another person.<br>
                    - Taking the vehicle outside the country or state (unless specifically agreed upon).<br>
                    - Allowing anyone other than the authorized driver(s) to operate the vehicle.<br><br>

                    <strong>5. Insurance and Liability</strong><br>
                    - [Company Name] provides basic insurance coverage, which includes third-party liability and limited collision damage waiver (CDW).<br>
                    - You may purchase additional insurance for extended coverage.<br>
                    - You are responsible for any damage to the vehicle during the rental period, including accidents or theft, unless you have purchased the optional insurance or if the damage is caused by a third-party.<br><br>

                    <strong>6. Fuel Policy</strong><br>
                    The vehicle will be provided with a full tank of fuel. You are required to return the vehicle with a full tank of fuel. If the vehicle is returned with less than a full tank, a refueling fee will apply.<br><br>

                    <strong>7. Age Restrictions</strong><br>
                    Drivers under the age of 25 may be subject to an additional young driver fee. The minimum age for renting a vehicle may vary depending on the location.<br><br>

                    <strong>8. Payment</strong><br>
                    The total rental fee is calculated based on the rental duration, vehicle type, and any additional services (e.g., GPS, child seats). Payment is due at the time of booking or pickup. A security deposit may be required at the time of pickup, which will be refunded upon safe return of the vehicle.<br><br>

                    <strong>9. Damage and Accidents</strong><br>
                    In the event of an accident, you must:<br>
                    - Report the incident to [Company Name] immediately.<br>
                    - Obtain a police report if required by law.<br>
                    - Not admit liability or sign any document that could waive your right to claim.<br><br>

                    You are responsible for any damage, loss, or injury resulting from an accident, whether or not you were at fault.<br><br>

                    <strong>10. Vehicle Maintenance</strong><br>
                    You must ensure the vehicle is maintained in good condition throughout the rental period. In the case of mechanical failure, you must notify [Company Name] immediately. You are not permitted to repair the vehicle or use unauthorized service providers without prior consent from us.<br><br>

                    <strong>11. Cancellation and Refunds</strong><br>
                    You may cancel your reservation up to [X] hours before the rental period without penalty. Cancellations made within [X] hours of the rental will incur a cancellation fee. Refunds are subject to our refund policy.<br><br>

                    <strong>12. Return of Vehicle</strong><br>
                    The vehicle must be returned to the agreed location by the end of the rental period. If the vehicle is not returned on time, additional charges will apply.<br><br>

                    <strong>13. Indemnity</strong><br>
                    You agree to indemnify and hold [Company Name], its agents, employees, and affiliates harmless from any claims, damages, or losses arising out of your use of the rented vehicle.<br><br>

                    <strong>14. Privacy</strong><br>
                    We collect and process personal data in accordance with our Privacy Policy. Your information will be used for rental processing and communication purposes. For more details, please refer to our Privacy Policy.<br><br>

                    <strong>15. Modification of Terms</strong><br>
                    [Company Name] reserves the right to update or modify these Terms and Conditions at any time. You will be notified of any changes and will be required to agree to the updated terms before continuing to rent a vehicle.<br><br>

                    <strong>16. Governing Law</strong><br>
                    These Terms and Conditions shall be governed by and construed in accordance with the laws of [Location/Country]. Any disputes arising from these terms will be subject to the exclusive jurisdiction of the courts in [Location/Country].<br><br>

                    <strong>17. Contact Information</strong><br>
                    If you have any questions or concerns regarding these Terms and Conditions, please contact us at:<br>
                    - Email: [email@example.com]<br>
                    - Phone: [phone number]<br>
                    - Address: [Company Address]
                </p>
            </div>
            <button id="acceptButton" disabled class="btn btn-primary w-100">Accept</button>
            <button id="closePopup" class="btn btn-secondary w-100 mt-2">Close</button>
        `;

            // Append popup to the body
            document.body.appendChild(termsPopup);

            // Get the scrolling container
            const termsContent = termsPopup.querySelector('div');
            const acceptButton = termsPopup.querySelector('#acceptButton');

            // Handle scrolling
            termsContent.addEventListener('scroll', function () {
                if (termsContent.scrollTop + termsContent.clientHeight >= termsContent.scrollHeight) {
                    acceptButton.disabled = false;
                }
            });

            // Close the popup
            termsPopup.querySelector('#closePopup').addEventListener('click', function () {
                document.body.removeChild(termsPopup);
            });

            // Enable the checkbox on acceptance
            acceptButton.addEventListener('click', function () {
                document.getElementById('agree').disabled = false;
                document.body.removeChild(termsPopup);
            });
        });

        // Disable the register button initially
        document.querySelector('button[type="submit"]').disabled = true;

        // Listen for checkbox change to enable the register button
        document.getElementById('agree').addEventListener('change', function () {
            const submitButton = document.querySelector('button[type="submit"]');
            submitButton.disabled = !this.checked;  // Enable or disable based on checkbox state
        });
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
