<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title', 'Surovi')</title>
    <!-- Bootstrap CSS CDN -->
    <link href="{{ asset('client/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('client/font/bootstrap-icons.css') }}">
    <link rel="icon" href="{{ asset('client/img/logo/suroviLogo.jpg') }}"  type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    @stack('styles')
</head>

<body>

    @include('sweetalert::alert')

    @include('layouts.inc_pub.header')

    @yield('content')

    @include('layouts.inc_pub.footer')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="{{ asset('client/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Your Custom JS -->
    <script src="{{ asset('client/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

    @stack('js')
</body>

</html>
