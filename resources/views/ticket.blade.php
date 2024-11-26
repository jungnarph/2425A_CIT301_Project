<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyCars | Home Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="Landing.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/receipt.css') }}">

    <style>
        .main-button {
            background: rgb(0, 0, 0);
            background: linear-gradient(90deg, rgba(0, 0, 0, 1) 24%, rgba(212, 212, 212, 1) 100%);
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
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/fleet">Fleet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <!-- Logout Button -->
                    @auth
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="color: red; text-decoration: none;">Logout</button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
<div>

	<div class="text-center mt-3">
		<div>
			<section class="receipt container-ticket">
				<div class="ticket">
					<div class="head-ticket">
						<p class="x-bold">EasyCars</p>
						<p class="bold">TIP MANILA</p>
						<p class="bold">Tel: +254 700 000000</p>
						<br>
						<p class="bold">P.O BOX. 90420-80100 MSA</p>
						<p>Date :12/11/2023 4:16:34 pm</p>
						<p>Receipt code : IMS045641634</p>
					</div>
					<div class="body-ticket">
						<div class="produits">
							<div class="col2">
								<p>Cup</p>
								<p class="prix"><b>Ksh 100</b></p>
							</div>
							<div class="hr-sm"></div>
							<div class="col2">
								<p>Quantity</p>
								<p class="prix"><b>4</b></p>
							</div>
							<div class="col2">
								<p>Total</p>
								<p class="prix"><b>400<b></p>
									</div>
									<br>
									<div class="col2">
										<p>Payment Method</p>
										<p class="prix"><b>Cash<b></p>
											</div>
											<div class="col2">
												<p>Amount recived</p>
												<p class="prix"><b>Ksh 500</b></p>
											</div>
											<div class="col2">
												<p>Balance</p>
												<p class="prix"><b>100</b></p>
											</div>
										</div>
										<div class="hr-lg"></div>
										<div class="carte">
											<p class="title-carte">Customer: munuhe</p>
											<br>
											<p>Served by: stephen</p>
										</div>
										<div class="hr-lg"></div>
									</div>
									<div class="footer-ticket">
										<p class="title-footer">THANK YOU</p>
									</div>
								</div>
							</section>
						</div>