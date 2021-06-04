<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/mix-manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/41d3d27b67.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md has-background-dark" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ route('welcome') }}">
                <img src="{{asset('img/Logo.png')}}" width="120" height="30">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
               data-target="navbarMain">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarMain" class="navbar-menu">
            @auth
                <div class="navbar-start">
                    <a class="navbar-item {{ request()->routeIs('home') ? 'is-active' : '' }} has-text-white has-background-dark" href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                    <div class="navbar-item has-dropdown is-hoverable">
                        
                        <a class="navbar-link {{ request()->routeIs('animal.index') || request()->routeIs('animal.create') || request()->routeIs('animal.search') ? 'is-active' : '' }} has-text-white has-background-dark"><i class="fas fa-paw"></i>&nbsp;Animals</a>
                        <div class="navbar-dropdown has-background-dark">
                            <a class="navbar-item {{ request()->routeIs('animal.index') ? 'is-active' : '' }} " href="{{ route('animal.index') }}"><i class="fas fa-list me-1"></i>&nbsp;List</a>
                            <a class="navbar-item {{ request()->routeIs('animal.create') ? 'is-active' : '' }}" href="{{ route('animal.create') }}"> <i class="fas fa-plus me-1"></i>&nbsp;Create</a>
                            <a class="navbar-item {{ request()->routeIs('animal.search') ? 'is-active' : '' }}" href="{{ route('animal.search') }}"> <i class="fas fa-search me-1"></i>&nbsp;Search</a>
                        </div>
                    </div>
                    <div class="navbar-item has-dropdown is-hoverable has-background-dark">
                        <a class="navbar-link {{ request()->routeIs('species.index') || request()->routeIs('species.create') ? 'is-active' : '' }} has-text-white has-background-dark"> <i class="fas fa-microscope me-1"></i>&nbsp;Species</a>

                        <div class="navbar-dropdown has-background-dark">
                            <a class="navbar-item {{ request()->routeIs('species.index') ? 'is-active' : '' }}" href="{{ route('species.index') }}"><i class="fas fa-list me-1"></i>&nbsp;List</a>
                            <a class="navbar-item {{ request()->routeIs('species.create') ? 'is-active' : '' }}" href="{{ route('species.create') }}"> <i class="fas fa-plus me-1"></i>&nbsp;Create</a>
                        </div>
                    </div>
                </div>
            @endauth

            <div class="navbar-end has-background-dark">
                <!--@guest
                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-primary border-success bg-success text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="button is-light border-white bg-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </div>
                    </div>
                @else-->
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link has-text-white has-background-dark"><i class="far fa-user me-1"></i>&nbsp;{{ Auth::user()->name }}</a>

                        <div class="navbar-dropdown is-right has-background-dark">
                            <a class="navbar-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>&nbsp;{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                <!--@endguest-->
            </div>
        </div>
    </nav>

    <div class="main is-fullheight customMainBackgroundColor">
        @yield('content')
    </div>
    <footer class="footer has-background-dark has-text-white has-text-centered">
        <div class="content">
            <p> &copy; 2021 BIC-4 - Project Exotic Animals Group Members: Aleksandar Sasa-Calic - Batuhan Sazak - Nenad Neskovic - Sergio Tallo Torres</p>
        </div>
    </footer>
</div>
</body>
</html>
