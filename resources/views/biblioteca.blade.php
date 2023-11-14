<link rel="stylesheet" href="assets/css/biblioteca.css">
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
@endsection
