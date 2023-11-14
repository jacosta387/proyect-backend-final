<?php

namespace App\Http\Controllers;


use App\Models\Genero;
use App\Models\Calificacion;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

    public function guardarComentario(Request $request){
        $idUsuario = Auth::id();
        $comentario = new Comentario;

        $comentario->id_usuario = $idUsuario;
        $comentario->id_manga = $request->input('id_manga');
        $comentario->comentario = $request->input('comentario');
        $comentario->save();

        return back();
    }

}
