<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gestion de Personal') }}</title>
    <title>@yield('title','App') - Gestion de Personal</title>

    {{-- <link rel="icon" type="image/png" href="/imagenes/icono_logo_trasporte.png" /> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .py-4 {
          /* The image used */
          background-image: url("/imagenes/fondo_quizas.jpg");
        
          /* Set a specific height */
          height: 100vh;
        
          /* Create the parallax scrolling effect */
          background-attachment: fixed;
          /* background-position: center; */
          background-repeat: no-repeat;
          background-size: cover;
        }
        </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-dark shadow-sm navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Principal
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @can('mod-empleados')                            
                            <li class="nav-item"><a class="nav-link" href="{{ route('empleados.index') }}">Empleados</a></li>
                        @endcan
                        @can('mod-usuarios')                            
                            <li class="nav-item"><a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios</a></li>
                        @endcan
                        @can('mod-roles-permisos')                            
                            <li class="nav-item"><a class="nav-link" href="{{ route('roles-permisos.index') }}">Permisos</a></li>
                        @endcan
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{-- {{ __('Login') }} --}}Iniciar Sesion</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrarse{{-- {{ __('Register') }} --}}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{-- {{ __('Logout') }} --}}Cerrar Sesion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
            @if(session()->has('success'))
                <div id="message" class="alert alert-success" role="alert" style="text-align:center;width:100%;" --}}>
                    {{ session('success') }}
                </div>
            @endif
            @if(session()->has('warning'))
                <div id="message" class="alert alert-warning" role="alert" style="text-align:center;width:100%;" --}}>
                    {{ session('warning') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
    <script>
        setTimeout(function() {
        $('#message').fadeOut('fast');
        }, 3500);
    </script>
    @yield('script')
</body>
</html>
