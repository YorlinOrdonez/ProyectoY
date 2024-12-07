<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Marketplace para Intercambio de Libros Usados') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        #sidebar {
            position: fixed;
            top: 56px;
            left: 0;
            width: 250px;
            height: 100vh;
            background: #f8f9fa;
            padding-top: 20px;
            transition: transform 0.3s ease;
        }

        #sidebar.collapsed {
            transform: translateX(-100%);
        }

        #sidebar .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
            font-weight: bold;
            color: #343a40;
        }

        .list-group-item-action {
            padding: 1rem 1.5rem;
        }

        .list-group-item-action:hover {
            background: #e9ecef;
        }

        .list-group-item-action:active, .list-group-item-action:focus {
            background: #e2e6ea;
        }

        #content {
            margin-left: 250px;
            transition: margin-left 0.3s ease;
        }

        #content.collapsed {
            margin-left: 0;
        }

        #sidebarToggleBtn {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1000;
            background: #f8f9fa;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm w-100">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Marketplace para Intercambio de Libros Usados') }}
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
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <button id="sidebarToggleBtn">☰</button>

        <div class="d-flex">
            <div id="sidebar" class="bg-light border-right">
                <div class="sidebar-heading">Opciones</div>
                <div class="list-group list-group-flush">
                    <a href="{{ url('/') }}" class="list-group-item list-group-item-action bg-light">Inicio</a>
                    <a href="{{ route('books.index') }}" class="list-group-item list-group-item-action bg-light">Libros</a>
                    <a href="{{ route('messages.index') }}" class="list-group-item list-group-item-action bg-light">Mensajes</a>
                    <!-- Agrega más enlaces según sea necesario -->
                </div>
            </div>

            <main id="content" class="py-4 flex-grow-1">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- JavaScript para el botón de mostrar/ocultar el panel lateral -->
    <script>
        document.getElementById('sidebarToggleBtn').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('content').classList.toggle('collapsed');
        });
    </script>
</body>
</html>
