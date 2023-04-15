<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('/images/common/team-7.png') }}" type="image/x-icon">

        <title>{{ config('app.name', 'Wealth Management System') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/vendors/bootstrap-4.5.0-dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendors/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendors/fontawesome-free-5.14.0-web/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <!-- <link rel="stylesheet" href="css/style.css"> -->

        <!-- Scripts -->
        <script src="{{ asset('/vendors/jQuery-3.5.1/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('/vendors/bootstrap-4.5.0-dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/vendors/OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- <script src="/js/script.js"></script> -->
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
