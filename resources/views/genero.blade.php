@extends('layouts.app')

@inject('mangaController', 'App\Http\Controllers\MangaController')
@inject('dbController', 'App\Http\Controllers\DBController')
@php
    $genero = $_GET['genero'];
    $generos = $dbController->obtenerGeneros();
    $mangas = $mangaController->obtenerMangas();
    $x=0;
@endphp


@section('content')
    <link rel="stylesheet" href="assets/css/genero.css">

    <div class="content">
     
        <div class="titulo">
            <h2><?php
            foreach ($generos as $g) {
                if ($g->id_genero == $genero) {
                    echo $g->nombre_genero;
                }
            }

            ?></h2>
        </div>
        <hr class="mi-linea"> </hr>
    </div>

        <div class="press-container ">

            @foreach ($mangas as $manga)

                {{-- <div>
                        <h2>{{ $manga->titulo }}</h2>
                        <p> <img src={{ $manga->portada }} class="card-img-top" alt="...">';{{ $manga->descripcion }}</p>

                        <!-- Agrega más campos según sea necesario -->
                    </div> --}}
                @if ($manga->id_genero==$genero)
                <?php
                $x+=1;
                ?>

                    <div class="press">
                        <div class="card" style="width: 18rem;">
                            <a href="{{ route('manga',['manga' => $manga->id_manga]) }}">
                                <img src="{{ $manga->portada }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <p class="card-text">{{ $manga->titulo }}</p>
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach

            @if ($x==0)
                <h3>No Hay mangas en este Genero</h3>

            @endif




        </div>
    @endsection
