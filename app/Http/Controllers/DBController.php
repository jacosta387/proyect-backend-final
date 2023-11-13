<?php

namespace App\Http\Controllers;


use App\Models\Genero;
use App\Models\Calificacion;
use App\Models\Comentario;

class DBController extends Controller
{

    public function obtenerGeneros(){
        return Genero::all();
    }
    public function listarGeneros()
    {
        $generos = Genero::all();
        return view('tu-vista')->with('mangas', $generos);
    }

    public function obtenerCalificaciones(){
        return Calificacion::all();
    }
    public function obtenerComentarios(){
        return Comentario::all();
    }

}
