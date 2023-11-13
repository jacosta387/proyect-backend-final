@extends('layouts.app')
@inject('mangaController', 'App\Http\Controllers\MangaController')
@php
    $mangas = $mangaController->obtenerMangas();
@endphp
@section('content')
    <link rel="stylesheet" href="assets/css/home.css">
    <div class="content">

        <div class="titulo">
            <h2>Favoritos del mes</h2>
        </div>


        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" ></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" ></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">

                        <?php
                        for ($i=1; $i < 5; $i++) {
                            # code...
                            echo '<div class="col-md-3">';
                                ?><a href="{{ route('manga') }}"><?php
                        echo '<img src="..\public\assets\img\MartialPeak.jpg" class="d-block w-100 img-carousel"';
                        echo '    alt="Imagen ' . $i . '">';
                        ?></a><?php
                            echo '</div>';
                        }
                            ?>

                    </div>
                </div>


                <div class="carousel-item active">
                    <div class="row">
                        <?php

                        for ($i=1; $i < 5; $i++) {
                            # code...
                            echo '<div class="col-md-3">';
                                ?><a href="{{ route('manga') }}"><?php
                        echo '<img src="..\public\assets\img\Apotheosis.jpg" class="d-block w-100 img-carousel"';
                        echo '    alt="Imagen ' . $i . '">';
                        ?></a><?php
                            echo '</div>';
                        }
                            ?>

                    </div>
                </div>
                <div class="carousel-item active">
                    <div class="row">

                        <?php
                        for ($i=1; $i < 5; $i++) {
                            # code...
                            echo '<div class="col-md-3">';
                                ?><a href="{{ route('manga') }}"><?php
                        echo '<img src="..\public\assets\img\Yuan Zun.jpg" class="d-block w-100 img-carousel"';
                        echo '    alt="Imagen ' . $i . '">';
                        ?></a><?php
                            echo '</div>';
                        }
                            ?>

                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>


        <div class="interesar    mt-3">
            <div class="titulo">
                <h2>Te puede interesar</h2>
            </div>
            <div class="press-container mr-3">

                <?php
                    for ($i=1; $i < 6; $i++) {
                        # code...
                        echo '<div class="press">';
                            echo'<div class="card" style="width: 18rem;">';
                                    ?><a href="{{ route('manga') }}"><?php
                                        echo '<img src="..\public\assets\img\Apotheosis.jpg" class="card-img-top" alt="...">';
                                    ?></a><?php
                                echo '<div class="card-body">';
                                    echo '<p class="card-text">Descripcion de Manga</p>';
                                echo '</div>';
                            echo '</div>';
                        echo'</div>';
                        }
                        ?>
            </div>
        </div>
        <div class="mas mt-3">
            <div class="titulo">
                <h2>Mas Mangas</h2>
            </div>
            <div class="press-container mr-3 ">

                <?php
                    for ($i=1; $i < 6; $i++) {
                        # code...
                        echo '<div class="press">';
                            echo'<div class="card" style="width: 18rem;">';
                                    ?><a href="{{ route('manga') }}"><?php
                                        echo '<img src="..\public\assets\img\Apotheosis.jpg" class="card-img-top" alt="...">';
                                    ?></a><?php
                                echo '<div class="card-body">';
                                    echo '<p class="card-text">Descripcion de Manga</p>';
                                echo '</div>';
                            echo '</div>';
                        echo'</div>';
                        }
                        ?>
            </div>
            <div>
                @foreach ($mangas as $manga)
                    {{-- <div>
                        <h2>{{ $manga->titulo }}</h2>
                        <p> <img src={{ $manga->portada }} class="card-img-top" alt="...">';{{ $manga->descripcion }}</p>

                        <!-- Agrega más campos según sea necesario -->
                    </div> --}}
                    
                            <div class="press">
                                <div class="card" style="width: 18rem;">
                                    <a href="{{ route('manga') }}">
                                        <img src="{{ $manga->portada }}" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text">{{ $manga->titulo }}</p>
                                    </div>
                                </div>
                            </div>

                    
                        
                @endforeach
            </div>
        </div>


    </div>

    </div>



    </div>

    </div>
@endsection
