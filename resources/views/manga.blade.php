@extends('layouts.app')

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

    #El manga de esta pestaña se llamará $manga
    // Obtener el manga por ID
    foreach ($mangas as $m) {
        if ($m->id_manga == $id) {
            $manga = $m;
        }
    }

    // Obtener las calificaciones del manga
    $calificacionesManga = [];
    foreach ($calificaciones as $c) {
        if ($c->id_manga == $id) {
            $calificacionesManga[] = $c;
        }
    }

    // Variable para almacenar el promedio
    $promedioCalificacion = 0;

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
                    <img src="..\public\assets\img\Apotheosis.jpg" class="card-img-top " alt="...">
                </div>

            </div>
            <div class="col desc col-lg-6">
                <div class="titulo row ">
                    <div class="col">
                        <h1>{{ $manga->titulo }}</h1>
                        <p class="tags">Finalizado</p>
                    </div>
                    <div class="col-lg-3 ">

                        {{-- <div class="row cajita">
                            <div class="col-sm border-right border-left cajoncito">
                                <div class="row ">
                                    <h5>Votos:</h5>
                                </div>
                                <div class="row">
                                    <p>{{ $promedioCalificacion }}</p>
                                </div>
                            </div>
                            <div class="col-sm border-right cajoncito">
                                <div class="row">
                                    <h5>Capitulos:</h5>
                                </div>
                                <div class="row">
                                    <p>{{ $promedioCalificacion }}</p>
                                </div>
                            </div>

                        </div> --}}

                    </div>

                </div>
                <div class="descripcion row">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque fugit quis accusamus labore? Ut cumque
                    impedit qui recusandae similique, suscipit fugit minima mollitia voluptas, modi reprehenderit quas ea
                    aliquid saepe.
                </div>
            </div>
            <div class="col mt-5">
                <div class="rating-container">
                    <div class="rating" id="star-rating">
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
                <form action="{{ route('añadirALista') }}" method="POST" id="formAñadirALista">
                    @csrf
                    <input type="hidden" name="id_manga" id="inputIdManga" value="{{ $id }}">
                    <button type="submit" class="btn btn-primary">Agregar a mi lista</button>
                </form>

            </div>
        </div>

        <div class="row mt-5">

            <div class="col-lg-5 tabla-contenido ">
                <table class="table table-rounded bkgTable">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" colspan="2">Capitulos</th>
                            <th scope="col " class="text-left">Visto</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        <?php
                        for ($i = 1; $i <= 20; $i++) {
                            echo '<tr>';
                            echo '<th scope="row">' . $i . '</th>';
                            echo '<td>Capitulo ' . $i . '</td>';
                            echo '<td class=""><input class="form-check-input ml-2" type="checkbox" value="" id="flexCheckDefault"></td>';
                            echo '</tr>';
                        }
                        ?>

                    </tbody>
                </table>
            </div>
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
