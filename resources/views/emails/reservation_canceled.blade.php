<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Canceled</title>
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
            background-color: #dc3545;
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
            color: #dc3545;
        }
        .email-footer {
            font-size: 14px;
            text-align: center;
            margin-top: 20px;
            color: #888;
        }
        .email-footer a {
            color: #dc3545;
            text-decoration: none;
        }
        .button {
            background-color: #dc3545;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container" style="max-width: 600px; margin-top: 30px;">
        <div class="email-container">
            <div class="email-header">
                <h2>Reservation Canceled</h2>
                <p>We're sorry to inform you</p>
            </div>
            <div class="email-body">
                <p>Hello <strong>{{ $reservation->user->First_name }}</strong>,</p>

                <p>We regret to inform you that your reservation with ID <strong>{{ $reservation->id }}</strong> has been canceled. Please find the reservation details below:</p>

                <h4>Reservation Details:</h4>
                <ul>
                    <li><strong>Reservation ID:</strong> {{ $reservation->id }}</li>
                    <li><strong>Car Model:</strong> {{ $reservation->carModel->model_name }}</li>
                    <li><strong>Reserved Date:</strong> {{ $reservation->created_at->format('F d, Y') }}</li>
                </ul>

                <p>If you have any questions or concerns, feel free to reach out to us at any time.</p>
                
                <a href="official.easycars@gmail.com" class="button">Contact Support</a>
            </div>
            <div class="email-footer">
                <p>If you believe this cancellation was made in error, please <a href="official.easycars@gmail.com">contact support</a> immediately.</p>
                <p>&copy; 2024 Easy Cars. All Rights Reserved.</p>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
