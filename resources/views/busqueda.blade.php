<link rel="stylesheet" href="assets/css/busqueda.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

@extends('layouts.app')
@inject('mangaController', 'App\Http\Controllers\MangaController')
@php
    $mangas = $mangaController->obtenerMangas();
    $busqueda = $_GET['query'];

    $arrayMangas = [];

    foreach ($mangas as $m) {
        $nombre = $m->titulo;

        if (stripos($nombre, $busqueda) !== false) {
            $arrayMangas[] = $m;
        }
    }

@endphp
@section('content')
    <div class="titulo ml-2">
        <h2 class="ml-2">Resultados para: "{{ $busqueda }}"</h2>
        <hr class="mi-linea">
    </div>
    <div class="press-container">
        @foreach ($arrayMangas as $manga)
            <div class="press">
                <div class="card" style="width: 18rem;">
                    <a href="{{ route('manga', ['manga' => $manga->id_manga]) }}">
                        <img src="{{ $manga->portada }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <p class="card-text">{{ $manga->titulo }}</p>
                    </div>
                </div>
            </div>
        @endforeach

        @if (count($arrayMangas)==0)
            <h3>No se encontraron resultados</h3>
        @endif
    </div>
@endsection
