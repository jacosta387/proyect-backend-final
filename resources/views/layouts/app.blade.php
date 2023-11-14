@inject('dbController', 'App\Http\Controllers\DBController')
<?php

$generos = $dbController->obtenerGeneros();
$listNames = [];
foreach ($generos as $gg) {
    $listNames[] = $gg->nombre_genero;
    # code...
}

?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">




    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Bootstrap-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/app.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>



    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="icon" href="../logo.png" type="image/x-icon">
    <!-- Scripts -->


    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/general.css">
    <link rel="icon" href="assets/img/logo.png">
</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm margin-bot">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="assets/img/logo.png" alt="Logo" srcset="" class="logo float-right">

            </a>
            <div class="container">


                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'HOME') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @for ($i = 0; $i < 7; $i++)
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('genero', ['genero' => $i + 1]) }}"><?php echo $listNames[$i]; ?>
                                </a>
                            </li>
                        @endfor

                        @if (count($listNames) > 20)
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownMas" class="nav-link dropdown-toggle" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Mas
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    @for ($i = 5; $i < count($listNames); $i++)
                                        <a class="dropdown-item" href="{{ route('genero', ['genero' => $i + 1]) }}"
                                            name="g">
                                            <?php echo $listNames[$i]; ?>
                                        </a>
                                    @endfor
                                </div>
                            </li>
                        @endif


                        <li class="nav-item">
                            {{-- <div class="ctn-search">
                                <form action="{{ route('busqueda') }}" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Buscar..."
                                            name="query">
                                        <div id=bt-search class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit"><i
                                                    class="material-icons">search</i></button>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <div class="ctn-search">
                                <form action="{{ route('busqueda') }}" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Buscar..."
                                            name="query">
                                        <div id=bt-search class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit"><i
                                                    class="material-icons">search</i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('anadir') }}">Agregar manga</a>
                                    <a class="dropdown-item" href="{{ route('biblioteca') }}">Mi biblioteca</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>

        <footer class="bd-footer ">


            <div class="container text-center">
                <div class="row">
                    <div class="col-5" style="align-text: center">
                        <br><br>
                        <ul style="list-style: none">
                            <li><img src="assets/img/logo.png" width="80" style="text-align: center "></li>
                            <li><span class="nombreApp ml-2" style="font-size: 60px">MangaDexy</span>
                        </ul>
                        </li>
                    </div>
                    <div class="col">
                    </div>
                    <div class="col-4">
                        <br>
                        <ul style="list-style: none" >
                            <br>

                            <li>Robinson Leon Moreno</li>
                            <li>Emilton Hernandez Mejía</li>
                            <li>Anghel Guiterrez</li>
                            <li>José Acosta</li>
                            <br>
                            <li><a style="font-size: 25px"href="https://github.com/jacosta387/proyect-backend-final.git">Repositorio</a></li>
                        </ul>
                    </div>

                </div>
            </div>
    </div>




    {{-- <div class="container c-footer py-4 py-md-5 px-4 px-md-3 text-body-secondary">
                <div class="row">
                    <div class="col-lg-3 mb-3">
                        <img src="assets/img/logo.png" width="40" alt="">
                        <span class="fs-5 nombreApp">MangaDexy</span>
                        <ul class="list-unstyled small">
                            <li class="mb-2">Universidad Autonoma de Bucarmanga
                                <a href="https://github.com/jacosta387/proyect-backend-final.git">Repositorio</a>.
                            </li>
                        </ul>
                    </div> --}}

    {{-- <div class="col-6 col-lg-6 offset-lg-1 mb-3 text-center">
                        <ul class="list-inline">
                            <!-- Usar list-inline para que los elementos de la lista estén en línea -->
                            <li class="mb-2 list-inline-item"><a
                                    href="http://localhost/proyect-backend-final/public/genero?genero=1">Shonen</a>
                            </li>
                            <li class="mb-2 list-inline-item"><a
                                    href="http://localhost/proyect-backend-final/public/genero?genero=2">Isekai</a>
                            </li>
                            <li class="mb-2 list-inline-item"><a
                                    href="http://localhost/proyect-backend-final/public/genero?genero=3">Seinei</a>
                            </li>
                            <li class="mb-2 list-inline-item"><a
                                    href="http://localhost/proyect-backend-final/public/genero?genero=4">Harem</a>
                                </li>
                            <li class="mb-2 list-inline-item"><a
                                    href="http://localhost/proyect-backend-final/public/genero?genero=5">CyberPunk</a>
                            </li>
                            <li class="mb-2 list-inline-item"><a
                                    href="http://localhost/proyect-backend-final/public/genero?genero=6">Kodomo</a>
                            </li>
                        </ul>
                    </div> --}}


    </div>
    </div>
    </footer>

    </div>


</body>

</html>
