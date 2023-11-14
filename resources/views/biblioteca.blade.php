<link rel="stylesheet" href="assets/css/biblioteca.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
@extends('layouts.app')
@inject('mangaController', 'App\Http\Controllers\MangaController')

@inject('dbController', 'App\Http\Controllers\DBController')

@php
    $guardados = $dbController->obtenerguardados();
    $mangas = $mangaController->obtenerMangas();
    $mangasusuarios = [];
    $guardadosUser = [];

    foreach ($guardados as $g) {
        if ($g->id_usuario == Auth::id()) {
            $guardadosUser[] = $g;
        }
    }

    $arrayId = [];

    foreach ($guardadosUser as $gU) {
        $arrayId[] = $gU->id_manga;
    }

    $arrayMangas = [];

    foreach ($mangas as $m) {
        $idManga = $m->id_manga;

        if (in_array($idManga, $arrayId)) {
            $arrayMangas[] = $m;
        }
    }
@endphp

@section('content')
    <div class="titulo">
        <h2>Lista de Lectura</h2>
        <hr class="hr" />
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
        </div>
    </div>
@endsection
