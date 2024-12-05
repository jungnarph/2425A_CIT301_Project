<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'EasyCars') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
        <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/jpg">
        <style>
            body {
                background-image: url('{{ asset('image.jpg')}}');
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
            }
            .blur-container {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border-radius: 15px;
                padding: 30px;
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            }
        </style>
    </head>
    <body class="font-sans text-white antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
            <div>
            <img class="receipt__logo" src="{{ asset('assets/images/project-logo-white-transparent.png') }}" alt="EasyCars Logo" style="max-width: 14rem">
                <a href="/" style="color:white; font-size:1.5rem;">
                    Reset your password
                </a>
            </div>

            <div class="sm:max-w-md mt-6 mx-5 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg blur-container">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
