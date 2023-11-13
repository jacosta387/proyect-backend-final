<?php

namespace App\Http\Controllers;


use App\Models\Genero;

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
}
