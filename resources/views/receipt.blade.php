<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyCars | Receipt</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="Landing.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/receipt.css') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/jpg">
</head>
<body>
    
        <div class="receipt">
        <header class="receipt__header">
            <p class="receipt__title">
            Codepen Sweet Shop
            </p>
            <p class="receipt__date">13 December 2020</p>
        </header>
        <dl class="receipt__list">
            <div class="receipt__list-row">
            <dt class="receipt__item">CSS Candies</dt>
            <dd class="receipt__cost">£9.99</dd>
            </div>
            <div class="receipt__list-row">
            <dt class="receipt__item">HoTML Chocolate</dt>
            <dd class="receipt__cost">£4.19</dd>
            </div>
            <div class="receipt__list-row">
            <dt class="receipt__item">Jelly Scripts</dt>
            <dd class="receipt__cost">£3.99</dd>
            </div>
            <div class="receipt__list-row">
            <dt class="receipt__item">JamStack Crisps</dt>
            <dd class="receipt__cost">£5.99</dd>
            </div>
            <div class="receipt__list-row">
            <dt class="receipt__item">Sherbet Nodes</dt>
            <dd class="receipt__cost">£2.59</dd>
            </div>
            <div class="receipt__list-row receipt__list-row--total">
            <dt class="receipt__item">Total</dt>
            <dd class="receipt__cost">£26.75</dd>
            </div>
        </dl>
        </div>
</body>
</html>