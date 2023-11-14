<link rel="stylesheet" href="assets/busqueda.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
@extends('layouts.app')

@section('content')
<div class="titulo">
    <h1>Resultados de la busqueda para "{{$query }}"</h1>

        @foreach ($resultados as $manga)
        <p>{{$mangas->titulo}}</p>
        <p>{{$mangas->descripcion}}</p>
        <p>{{$mangas->portada}}</p>
        
        @endforeach
           
            
    @endsection
