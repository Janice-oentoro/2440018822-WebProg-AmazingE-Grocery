<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Amazing E-Grocery') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <?php use Illuminate\Support\Facades\Auth; ?>
    <div class="sitename">
        <a class="navbar-brand" href="{{ url('/') }}"> Amazing E-Grocery </a>
    </div>
    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="d-block py-2">

            <div class="position-absolute top-50 start-50 translate-middle d-inline">
                
            </div>
                        
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                 <!-- Middle Of Navbar --> <!-- ADD THE LINKS HERE-->
                 <ul class="navbar-nav position-absolute top-50 start-50 translate-middle">
                        <!-- Authentication Links -->
                        @auth
                            @if (Route::has('home'))
                                <li class="nav-item d-inline text-dark">
                                    <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                                </li>
                            @endif

                            @if (Route::has('cart'))
                                <li class="nav-item d-inline">
                                    <a class="nav-link" href="{{ route('cart') }}">{{ __('Cart') }}</a>
                                </li>
                            @endif

                            @if (Route::has('profile'))
                            <?php $userid = Auth::user()->id; ?>
                                <li class="nav-item d-inline">
                                    <a class="nav-link" href="/profile/{{$userid}}">{{ __('Profile') }}</a>
                                </li>
                            @endif

                            @if (Route::has('adminmain'))
                            @if (Auth::user()->role == 2)
                                <li class="nav-item d-inline">
                                    <a class="nav-link" href="{{ route('adminmain') }}">{{ __('Account Maintenance') }}</a>
                                </li>
                            @endif
                            @endif

                        @else
                            <p> </p>
                        @endif
                    </ul>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav position-absolute top-50 end-0 translate-middle-y">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('register'))
                                <li class="nav-item d-inline">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                            @if (Route::has('login'))
                                <li class="nav-item d-inline">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                        @else
                                <div class="navbar-nav position-absolute top-50 end-0 translate-middle-y">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="/exit" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
