<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Message</title>
</head>
<body>
    <h2>You have received a new message from {{ $name }}</h2>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $messageBody }}</p>
</body>
</html>
