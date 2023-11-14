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
    $promedioCalificacion =0;
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
        $sumaCalificaciones += $calificacion ->calificacion;
    }
    if (count($calificacionesManga)!=0) {
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
                                Votos
                                <br>
                                {{ $promedioCalificacion }}


                            </div>
                            <div class="col-sm border-right cajoncito">
                                <div class="row">
                                    <h5>Capitulos:</h5>
                                </div>
                                <div class="row">
                                    <p>{{ $promedioCalificacion }}</p>
                                </div>
                            </div>
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
                    <button type="button" id="submit-rating" class="btn btn-primary">Calificar</button>
                </div>

                <form action="{{ route('guardarCalificacion') }}" method="POST" id="calificacion-form">
                    @csrf
                    <input type="hidden" name="id_manga" value="{{ $id }}">
                    <input type="hidden" name="calificacion" id="calificacion-input" value="1"> <!-- Valor predeterminado -->
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
