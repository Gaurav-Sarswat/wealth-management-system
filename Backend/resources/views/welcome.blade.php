<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('/images/common/team-7.png') }}" type="image/x-icon">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/vendors/bootstrap-4.5.0-dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendors/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendors/fontawesome-free-5.14.0-web/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendors/dropify/dropify.min.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    </head>
    <body>
        <section class="welcome py-5">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('/images/common/team-7.png') }}" height="70" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav ml-auto">
                        @if (Route::has('login'))
                            @auth
                            <li class="nav-item">
                                <a class="nav-link login" href="{{ url('/dashboard') }}" tabindex="-1">Dashboard</a>
                            </li>
                            @else
                            <li class="nav-item mr-2">
                                <a class="nav-link register" href="{{ route('register') }}" tabindex="-1">Sign up</a>
                            </li>
                            <li class="nav-item mr-2">
                                <a class="nav-link login" href="{{ route('login') }}" tabindex="-1">Login</a>
                            </li>
                            @endauth
                        @endif
                      </ul>
                    </div>
                </div>
              </nav>
              <div class="hero-wrapper mt-5">
                  <div class="container">
                      <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h2>The best solution for managing your investments.</h2>
                            <p class="mb-1">We're the best all-in-one, cloud-based software for managing your investment portfolio. </p>
                            <p class="mb-0">Join us today and watch your wealth rise</p>
                        </div>
                        <div class="col-lg-6">
                            <figure>
                                <img src="{{ asset('/images/common/hero-image.png') }}" class="w-100" alt="">
                            </figure>
                        </div>
                      </div>
                  </div>
                </div>
                <img src="{{ asset('/images/common/waves.png') }}" class="waves w-100" alt="">
        </section>
    </body>
</html>
