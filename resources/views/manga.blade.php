@extends('layouts.app')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
@inject('dbController', 'App\Http\Controllers\DBController')
@inject('mangaController', 'App\Http\Controllers\MangaController')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@php
    $id = $_GET['manga'];
    $mangas = $mangaController->obtenerMangas();
    $calificaciones = $dbController->obtenerCalificaciones();
    $comentarios = $dbController->obtenerComentarios();
    $usuarios = $dbController->obtenerUsuarios();
    $generos = $dbController->obtenerGeneros();

    #El manga de esta pestaña se llamará $manga
    // Obtener el manga por ID
    foreach ($mangas as $m) {
        if ($m->id_manga == $id) {
            $manga = $m;
        }
    }
    $promedioCalificacion = 0;
    // Obtener las calificaciones del manga
    $calificacionesManga = [];
    foreach ($calificaciones as $c) {
        if ($c->id_manga == $id) {
            $calificacionesManga[] = $c;
        }
    }

    #Variable para almacenar el promedio
    $promedioCalificacion = 0;
    $sumaCalificaciones = 0;

    # Bucle foreach para sumar las calificaciones
    foreach ($calificacionesManga as $calificacion) {
        $sumaCalificaciones += $calificacion->calificacion;
    }
    if (count($calificacionesManga) != 0) {
        $promedioCalificacion = $sumaCalificaciones / count($calificacionesManga);
    }

    // Obtener los comentarios del manga
    $comentariosManga = [];
    foreach ($comentarios as $c) {
        if ($c->id_manga == $id) {
            $comentariosManga[] = $c;
        }
    }

    $arrayUsers = [];
    foreach ($usuarios as $u) {
        # code...
        $arrayUsers[$u->id] = $u->name;
    }

    $nombresGeneros = [];
    foreach ($generos as $g) {
        $nombresGeneros[$g->id_genero] = $g->nombre_genero;
    }

@endphp
<link rel="stylesheet" href="assets/css/manga.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
@section('content')
    <div class="content ">
        <div class="row mt-5">
            <div class="col col-lg-2 ml-2 ">
                <div class="card img float-right" style="width: 10rem;">
                    <img src="{{ $manga->portada }}" class="c" alt="...">
                </div>

            </div>
            <div class="col desc col-lg-6 ml-2">

                <div class="titulo row ">
                    <div class="col-lg-6 mr-4">
                        <h1>{{ $manga->titulo }}</h1>
                        <p class="tags">{{ $nombresGeneros[$manga->id_genero] }}</p>
                    </div>
                    <div class="container-sm col cajon align-items-center caja">

                        <div class="ml-5 nav flex-row row">
                            <div class="nav-item col-lg-4 col  border-right mr-0 cajita">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <br>
                                {{ $promedioCalificacion }}
                            </div>
                            <div class="nav-item col-lg-4 col  border-right mr-0 cajita">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path
                                        d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                    <path
                                        d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                </svg>
                                <br>
                                {{ $manga->capitulos }}
                            </div>
                            <div class="nav-item col-lg-4 col  mr-0 cajita">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-chat-heart-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15Zm0-9.007c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z" />
                                </svg>
                                <br>
                                {{ count($comentariosManga) }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <center><a href={{ $manga->link }} target="_blank">Ir al manga</a></center>
                        </div>
                    </div>


                </div>
                <div class="descripcion row ml-3">
                    {{ $manga->descripcion }}
                </div>
            </div>
            <div class="col mt-5">
                <div class="rating-container">
                    <div class="rating ">
                        <span class="star" data-rating="1">&#9733;</span>
                        <span class="star" data-rating="2">&#9733;</span>
                        <span class="star" data-rating="3">&#9733;</span>
                        <span class="star" data-rating="4">&#9733;</span>
                        <span class="star" data-rating="5">&#9733;</span>
                    </div>
                    @guest
                        <button type="button" id="submit-rating" class="btn btn-primary"
                            onclick="event.preventDefault();
                    document.getElementById('login-form').submit();">Calificar</button>
                    @else
                        <button type="button" id="submit-rating" class="btn btn-primary"
                            onclick="event.preventDefault();
                    document.getElementById('calificacion-form').submit();">Calificar</button>
                    @endguest

                </div>
                <form action="{{ route('login') }}" method="get" id="login-form"></form>


                <form action="{{ route('guardarCalificacion') }}" method="POST" id="calificacion-form">
                    @csrf
                    <input type="hidden" name="id_manga" value="{{ $id }}">
                    <input type="hidden" name="calificacion" id="calificacion-input" value="1">
                    <!-- Valor predeterminado -->
                </form>
                <script>
                    // JavaScript para manejar la calificación
                    const ratingContainer = document.getElementById('star-rating');
                    const calificacionInput = document.getElementById('calificacion-input');

                    ratingContainer.addEventListener('click', (event) => {
                        if (event.target.classList.contains('star')) {
                            const selectedRating = event.target.getAttribute('data-rating');
                            calificacionInput.value = selectedRating;

                            // Puedes agregar lógica adicional para resaltar las estrellas seleccionadas visualmente si es necesario
                            // ...

                            console.log('Calificación seleccionada:', selectedRating);
                        }
                    });

                    // JavaScript para enviar el formulario al hacer clic en el botón
                    const submitButton = document.getElementById('submit-rating');
                    const calificacionForm = document.getElementById('calificacion-form');

                    submitButton.addEventListener('click', () => {
                        calificacionForm.submit();
                    });
                </script>
                <p class="result"><span id="rating"></span></p>
                <a href="#" class="btn btn-primary">Agregar a mi lista</a>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-1"></div>
            <div class="col-lg-3 tabla-contenido ">
                <table class="table table-rounded bkgTable">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" colspan="2">Capitulos</th>
                            <th scope="col " class="text-left">Visto</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        @for ($i = 1; $i <= $manga->capitulos; $i++)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>Capitulo {{ $i }} </td>
                                <td><input class="form-check-input ml-2" type="checkbox" value=""
                                        id="flexCheckDefault"></td>
                            </tr>
                        @endfor


                    </tbody>
                </table>
            </div>
            <div class="col-lg-1"></div>
            <div class="col">
                <h3>Comentarios</h3>

                <form action="{{ route('guardarComentario') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_manga" value="{{ $id }}">
                    <div class="form-group comment">
                        <textarea class="form-control" name="comentario" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar comentario</button>
                </form>
                <hr class="mi-linea">
                <!-- Comentarios -->
                <div class="comment-section">
                    <!-- Comentarios -->
                    @if (count($comentariosManga) > 0)
                        @foreach (array_reverse($comentariosManga) as $comentario)
                            <div class="comment-container mr-4 ml-4 mt-1">
                                <div class="row comment-head">
                                    <div class="gp-comment-meta">
                                        <span class="gp-comment-author"
                                            itemprop="author">{{ $arrayUsers[$comentario->id_usuario] }}</span>
                                        <br>
                                        <time class="gp-comment-date-time" itemprop="datePublished"
                                            datetime="{{ $comentario->created_at }}">{{ $comentario->created_at }}</time>
                                    </div>
                                </div>
                                <div class="row comment-body">
                                    <p>{{ $comentario->comentario }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No se encontron comentarios</p>
                    @endif
                </div>
            </div>

        </div>
        <script src="assets/js/manga.js"></script>
    @endsection
