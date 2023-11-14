<link rel="stylesheet" href="assets/css/biblioteca.css">
@extends('layouts.app')
@inject('mangaController', 'App\Http\Controllers\MangaController')

@inject('dbController', 'App\Http\Controllers\DBController')

@php
    $guardados = $dbController->obtenerguardados();
    $mangas = $mangaController->obtenerMangas();
    $mangasusuarios=array();

    $guardadosUser=array();
    foreach ($guardados as $g) {
        if ($g->id_usuario=Auth::id()) {
            $guardadosUser[]=$g;
        }
    }

    $arrayId = array();
    foreach ($guardadosUser as $gU ) {
        #TODO recorrer  y añadir solo los id_manga
    }


    $arrayMangas = array();

    foreach ($mangas as $m ) {
        $idManga=$m->id_manga
        if () {
            #TODO Si idManga esta en el arrayId entonces que se agregue al arrayMangas
        }
    }
@endphp
@section('content')
    <div class="titulo">
        <h2>Leidos Recientemente</h2>
        <hr class="hr" />

        <div class="press-container">
            <div class="press">
                <div class="card" style="width: 18rem;">
                    <img src="..\public\assets\img\Apotheosis.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">hola mundo</p>
                    </div>
                </div>
            </div>
            <div class="press">
                <div class="card" style="width: 18rem;">
                    <img src="..\public\assets\img\Apotheosis.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">hola mundo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="titulo">
        <h2>Lista de Lectura</h2>hola mundo
        <hr class="hr" />

        <div class="press-container">
            <div class="press">
                <div class="card" style="width: 18rem;">
                    <img src="..\public\assets\img\Apotheosis.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">hola mundo</p>
                    </div>
                </div>
            </div>
            <div class="press">
                <div class="card" style="width: 18rem;">
                    <img src="..\public\assets\img\Apotheosis.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">hola mundo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
