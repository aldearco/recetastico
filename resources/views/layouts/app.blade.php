<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('img/branding/favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body class="d-flex flex-column h-100">
    <div id="app">
        <nav class="navbar navbar-expand-md sticky-top navbar-light bg-glass shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="logoicon" src="{{ asset('img/branding/icon-recetastico.svg') }}"
                        alt="{{ config('app.name') }}" type="svg">
                    <img class="logotype" src="{{ asset('img/branding/logotype.svg') }}"
                        alt="{{ config('app.name') }}" type="svg">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            @if(Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ '@'.Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('perfiles.show', ['username'=>Auth::user()->username]) }}">
                                        {{ __('Mi perfil') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('recetas.index') }}">
                                        {{ __('Mis recetas') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}"
                                        method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="nav-scroller bg-light-accent shadow-sm">
            <nav class="nav nav-underline">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            @yield('buttons')
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container">
            <main class="py-4 mt-5 col-12 flex-shrink-0">
                @yield('content')
            </main>
        </div>
    </div>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="px-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="btn-group btn-footer">
                                    <a href="" class="btn btn-sm btn-instagram"><i
                                            class="fa-brands fa-instagram"></i></a>
                                    <a href="" class="btn btn-sm btn-facebook"><i
                                            class="fa-brands fa-facebook-square"></i></a>
                                    <a href="" class="btn btn-sm btn-twitter"><i class="fa-brands fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                        <img class="logo-footer pt-3 pb-1"
                            src="{{ asset('img/branding/logotype.svg') }}"
                            alt="{{ config('app.name') }}" type="svg">
                        <span class="d-block small">
                            @php
                                echo date("Y");
                            @endphp © Todos los derechos reservados
                        </span>
                    </div>
                </div>
                <div class="col-lg-2 d-lg-flex d-none justify-content-center align-items-center">
                    <a href="{{ url('/') }}">
                        <img class="icon-footer"
                            src="{{ asset('img/branding/icon-recetastico.svg') }}"
                            alt="{{ config('app.name') }}" type="svg">
                    </a>
                </div>
                <div class="col-lg-5 col-md-6 col-12 d-md-flex align-items-end justify-content-end">
                    <ul class="nav">
                        <li class="nav-item small"><a href="#" class="nav-link px-2 text-muted">Aviso Legal</a></li>
                        <li class="nav-item small"><a href="#" class="nav-link px-2 text-muted">Términos</a></li>
                        <li class="nav-item small"><a href="#" class="nav-link px-2 text-muted">Cookies</a></li>
                        <li class="nav-item small"><a href="#" class="nav-link px-2 text-muted">Privacidad</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    @yield('scripts')

</body>

</html>
