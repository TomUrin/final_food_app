<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pasirinkti restorana') }}</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    @yield('links')
    @stack('styles')
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Prisijungti') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registruotis') }}</a>
                        </li>
                        @endif
                        @else
                        @if (Auth::user()->role < 9) <div>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="d-grid gap-2">
                                        <a class="btn btn-outline-success mt-1 me-5" href="{{route('food-pick')}}">Spauskite čia norėdami užsisakyti</a>
                                    </div>
                                </div>
                            </div>
                </div>
                @endif
                @if (Auth::user()->role < 9) <li class="nav-item dropdown">
                    <a id="navbarDropdown1" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Mano užsakymai
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown1">
                        <a class="dropdown-item" href="{{ route('my-orders') }}">
                            Rodyti
                        </a>
                    </div>
                    </li>
                    @endif
                    @if (Auth::user()->role > 9)
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Užsakymai
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('selectedServices-index') }}">
                                <i class="bi bi-card-list"></i>
                                Užsakymų sąrašas
                            </a>
                        </div>
                    </li>
                    @endif
                    @if (Auth::user()->role > 9)
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Restoranai
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('restaurant-index') }}">
                                <i class="bi bi-card-list"></i>
                                Restoranų sąrašas
                            </a>
                            <a class="dropdown-item" href="{{ route('restaurant-create') }}">
                                <i class="bi bi-plus-square"></i>
                                Pridėti naują restoraną
                            </a>
                        </div>
                    </li>
                    @endif
                    @if (Auth::user()->role > 9)
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Valgiaraščiai
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('menu-index') }}">
                                <i class="bi bi-card-list"></i>
                                Valgiaraščių sąrašas
                            </a>
                            <a class="dropdown-item" href="{{ route('menu-create') }}">
                                <i class="bi bi-plus-square"></i>
                                Pridėti naują valgiaraštį
                            </a>
                        </div>
                    </li>
                    @endif
                    @if (Auth::user()->role > 9)
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Patiekalai
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dish-index') }}">
                                <i class="bi bi-card-list"></i>
                                Patiekalų sąrašas
                            </a>

                            <a class="dropdown-item" href="{{ route('dish-create') }}">
                                <i class="bi bi-person-plus"></i>
                                Pridėti naują patiekalą
                            </a>
                        </div>
                    </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Atsijungti') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
        @include('msg.main')
        @yield('content')
    </main>
    </div>

</body>

</html>
