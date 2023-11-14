<?php

namespace App\Http\Controllers;


use App\Models\Genero;
use App\Models\Calificacion;
use App\Models\Comentario;
use App\Models\Guardado;
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
    public function obtenerGuardados(){
        return Guardado::all();
    }

    public function guardarComentario(Request $request){
        if (Auth::check()) {
            $idUsuario = Auth::id();
            $comentario = new Comentario;

            $comentario->id_usuario = $idUsuario;
            $comentario->id_manga = $request->input('id_manga');
            $comentario->comentario = $request->input('comentario');
            $comentario->save();

            return back();
        } else {
            return redirect()->route('login');
        }
    }
    public function guardarCalificacion(Request $request){
        if (Auth::check()) {
            $idUsuario = Auth::id();
            $calificacion = new Calificacion;

            $calificacion->id_usuario = $idUsuario;
            $calificacion->id_manga = $request->input('id_manga');
            $calificacion->calificacion = $request->input('calificacion');
            $calificacion->save();

            return back();
        } else {
            return redirect()->route('login');
        }
    }

}
