<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Completed</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
            font-size: 16px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #555;
            font-size: 12px;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Rental Completed</h1>
        </div>
        <div class="content">
            <p>Dear {{ $rental->user->First_name }},</p>
            <p>We are pleased to inform you that your rental with the following details has been completed:</p>
            <ul>
                <li><strong>Rental ID:</strong> {{ $rental->id }}</li>
                <li><strong>Car Model:</strong> 
                    @if($rental->car && $rental->car->carModel)
                        {{ $rental->car->carModel->model_name }}
                    @else
                        Not Available
                    @endif
                </li>
                <li><strong>Return Date:</strong> {{ \Carbon\Carbon::parse($rental->return_dt)->format('F d, Y') }}</li>
                <li><strong>Return Location:</strong> {{ $rental->return_location }}</li>
            </ul> 
            <p>If you have any questions or need further assistance, please feel free to reach out.</p>
            <p>Thank you for choosing our service!</p>
        </div>
        <div class="footer">
            <p>Best regards,</p>
            <p>The Easy Cars Team</p>
            <a href="{{ $commentLink }}" class="button">Leave a Comment</a>
        </div>
    </div>
</body>
</html>
