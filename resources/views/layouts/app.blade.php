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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



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
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <img src="assets/img/logo.png" alt="Logo" srcset="" class="logo float-right">
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
                        @for ($i = 0; $i < 5; $i++)
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('genero', ['genero' => $i + 1]) }}"><?php echo $listNames[$i]; ?>
                                </a>
                            </li>
                        @endfor

                        @if (count($listNames) > 5)
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


                        <li>
                            <div class="ctn-search">
                                <form action="{{ route('busqueda')}}" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Buscar..." name="query">
                                        <div id= bt-search class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit"><i class="material-icons">search</i></button>
                                        </div>
                                    </div>
                                </form>
                        </li>
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

        <main class="">
            @yield('content')
        </main>





        <footer class="bd-footer ">
            <div class="container c-footer py-4 py-md-5 px-4 px-md-3 text-body-secondary">
                <div class="row">
                    <div class="col-lg-3 mb-3">
                        <img src="assets/img/logo.png" width="40" alt="">
                        <span class="fs-5 nombreApp">MangaDex3</span>
                        <ul class="list-unstyled small">
                            <li class="mb-2">Designed and built with all the love in the world by the <a
                                    href="/docs/5.3/about/team/">Bootstrap team</a> with the help of <a
                                    href="https://github.com/twbs/bootstrap/graphs/contributors">our contributors</a>.
                            </li>
                            <li class="mb-2">Code licensed <a
                                    href="https://github.com/twbs/bootstrap/blob/main/LICENSE" target="_blank"
                                    rel="license noopener">MIT</a>, docs <a
                                    href="https://creativecommons.org/licenses/by/3.0/" target="_blank"
                                    rel="license noopener">CC BY 3.0</a>.</li>
                            <li class="mb-2">Currently v5.3.2.</li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2 offset-lg-1 mb-3">
                        <h5>Links</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="/">Home</a></li>
                            <li class="mb-2"><a href="/docs/5.3/">Docs</a></li>
                            <li class="mb-2"><a href="/docs/5.3/examples/">Examples</a></li>
                            <li class="mb-2"><a href="https://icons.getbootstrap.com/">Icons</a></li>
                            <li class="mb-2"><a href="https://themes.getbootstrap.com/">Themes</a></li>
                            <li class="mb-2"><a href="https://blog.getbootstrap.com/">Blog</a></li>
                            <li class="mb-2"><a href="https://cottonbureau.com/people/bootstrap" target="_blank"
                                    rel="noopener">Swag Store</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2 mb-3">
                        <h5>Guides</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="/docs/5.3/getting-started/">Getting started</a></li>
                            <li class="mb-2"><a href="/docs/5.3/examples/starter-template/">Starter template</a>
                            </li>
                            <li class="mb-2"><a href="/docs/5.3/getting-started/webpack/">Webpack</a></li>
                            <li class="mb-2"><a href="/docs/5.3/getting-started/parcel/">Parcel</a></li>
                            <li class="mb-2"><a href="/docs/5.3/getting-started/vite/">Vite</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2 mb-3">
                        <h5>Projects</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="https://github.com/twbs/bootstrap" target="_blank"
                                    rel="noopener">Bootstrap 5</a></li>
                            <li class="mb-2"><a href="https://github.com/twbs/bootstrap/tree/v4-dev"
                                    target="_blank" rel="noopener">Bootstrap 4</a></li>
                            <li class="mb-2"><a href="https://github.com/twbs/icons" target="_blank"
                                    rel="noopener">Icons</a></li>
                            <li class="mb-2"><a href="https://github.com/twbs/rfs" target="_blank"
                                    rel="noopener">RFS</a></li>
                            <li class="mb-2"><a href="https://github.com/twbs/examples/" target="_blank"
                                    rel="noopener">Examples repo</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2 mb-3">
                        <h5>Community</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="https://github.com/twbs/bootstrap/issues" target="_blank"
                                    rel="noopener">Issues</a></li>
                            <li class="mb-2"><a href="https://github.com/twbs/bootstrap/discussions"
                                    target="_blank" rel="noopener">Discussions</a></li>
                            <li class="mb-2"><a href="https://github.com/sponsors/twbs" target="_blank"
                                    rel="noopener">Corporate sponsors</a></li>
                            <li class="mb-2"><a href="https://opencollective.com/bootstrap" target="_blank"
                                    rel="noopener">Open Collective</a></li>
                            <li class="mb-2"><a href="https://stackoverflow.com/questions/tagged/bootstrap-5"
                                    target="_blank" rel="noopener">Stack Overflow</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

    </div>


</body>

</html>
