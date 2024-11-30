<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Confirmation</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f4f7f9;
        }
        .email-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #007bff;
            color: #fff;
            padding: 30px 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .email-body {
            padding: 20px;
            font-size: 16px;
            line-height: 1.6;
        }
        .email-body h4 {
            color: #007bff;
        }
        .email-footer {
            font-size: 14px;
            text-align: center;
            margin-top: 20px;
            color: #888;
        }
        .email-footer a {
            color: #007bff;
            text-decoration: none;
        }
        .button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container" style="max-width: 600px; margin-top: 30px;">
        <div class="email-container">
            <div class="email-header">
                <h2>Reservation Confirmed</h2>
                <p>Thank you for choosing us!</p>
            </div>
            <div class="email-body">
                <p>Hello <strong>{{ $reservation->user->First_name }} {{ $reservation->user->Last_name }}</strong>,</p>

                <p>Your reservation with ID <strong>{{ $reservation->id }}</strong> has been successfully confirmed! We're excited to serve you.</p>

                <h4>Reservation Details:</h4>
                <ul>
                    <li><strong>Car Model:</strong> {{ $reservation->carModel->model_name }}</li>
                    <li><strong>Assigned Car Plate Number:</strong> {{ $car->plate_number }}</li>
                </ul>

                <p>We look forward to your visit. If you have any questions, feel free to contact us anytime.</p>
                
                <a href="official.easycars@gmail.com" class="button">Contact Support</a>
            </div>
            <div class="email-footer">
                <p>If you did not make this reservation, please <a href="official.easycars@gmail.com">contact support</a> immediately.</p>
                <p>&copy; 2024 Your Company. All Rights Reserved.</p>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
