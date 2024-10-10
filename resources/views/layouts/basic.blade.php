<!-- resources/views/layouts/basic.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Properties-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="follow, index" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#000000" />
    <meta name="description" content="E-Commerce PBKK Project Made by Kelompok 21" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="E-Commerce PBKK" />
    <meta property="og:description" content="E-Commerce PBKK Project Made by Kelompok 21"/>
    <meta property="og:title" content="E-Commerce PBKK" />

    <!-- Title -->
    <title> @yield('title') </title>

    <!-- Icon -->
    <link rel="icon" sizes="16x16" href="{{ asset('favicon/logo-16x16.png') }}" type="image/png" />
    <link rel="icon" sizes="24x24" href="{{ asset('favicon/logo-24x24.png') }}" type="image/png" />
    <link rel="icon" sizes="32x32" href="{{ asset('favicon/logo-32x32.png') }}" type="image/png" />
    <link rel="icon" sizes="48x48" href="{{ asset('favicon/logo-48x48.png') }}" type="image/png" />
    <link rel="icon" sizes="64x64" href="{{ asset('favicon/logo-64x64.png') }}" type="image/png" />
    <link rel="icon" sizes="128x128" href="{{ asset('favicon/logo-128x128.png') }}" type="image/png" />
    <link rel="icon" sizes="256x256" href="{{ asset('favicon/logo-256x256.png') }}" type="image/png" />
    
    <!-- JS/CSS -->
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <noscript>You need to enable JavaScript to run this app.</noscript>

    <!-- Views Content -->
    <div>
        @yield('content')
    </div>
</body>
</html>
