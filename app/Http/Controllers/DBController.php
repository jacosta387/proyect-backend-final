<?php

namespace App\Http\Controllers;


use App\Models\Genero;
use App\Models\Calificacion;
use App\Models\Comentario;
use App\Models\Guardado;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Registro_lectura;


class DBController extends Controller
{

    public function obtenerGeneros(){
        return Genero::all();
    }
    public function obtenerUsuarios(){
        return User::all();
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
    public function obtenerRegistro(){
        return Registro_lectura::all();
    }

    public function guardarComentario(Request $request){
        if (Auth::check()) {
            $idUsuario = Auth::id();

            // Verificar si el comentario está presente
            $comentarioTexto = $request->input('comentario');
            if (empty($comentarioTexto)) {
                return back()->withErrors(['error' => 'El comentario no puede estar vacío.']);
            }

            $comentario = new Comentario;
            $comentario->id_usuario = $idUsuario;
            $comentario->id_manga = $request->input('id_manga');
            $comentario->comentario = $comentarioTexto;
            $comentario->save();

            return back()->with('success', 'Comentario guardado exitosamente.');
        } else {
            return redirect()->route('login');
        }
    }
    public function guardarCalificacion(Request $request){
        if (Auth::check()) {
            $idUsuario = Auth::id();
            $idManga = $request->input('id_manga');
            $calificacionExistente = Calificacion::where('id_usuario', $idUsuario)
                ->where('id_manga', $idManga)
                ->first();

            if ($calificacionExistente) {
                // Si ya existe una calificación del usuario para este manga, actualiza la calificación
                $calificacionExistente->calificacion = $request->input('calificacion');
                $calificacionExistente->save();
            } else {
                // Si no existe, crea una nueva calificación
                $calificacion = new Calificacion;
                $calificacion->id_usuario = $idUsuario;
                $calificacion->id_manga = $idManga;
                $calificacion->calificacion = $request->input('calificacion');
                $calificacion->save();
            }

            return back();
        } else {
            return redirect()->route('login');
        }
    }
    public function añadirALista(Request $request){
        if (Auth::check()) {
            $idUsuario = Auth::id();
            $idManga = $request->input('id_manga');

            // Verifica si el manga ya está en la lista del usuario
            if (Guardado::where('id_usuario', $idUsuario)->where('id_manga', $idManga)->exists()) {
                return back()->with('error', 'El manga ya está en tu lista.');
            }


            // Si no está en la lista, guárdalo
            $guardado = new Guardado;
            $guardado->id_usuario = $idUsuario;
            $guardado->id_manga = $idManga;
            $guardado->fecha_guardado=date('2023-11-14');
            $guardado->save();

            return back()->with('success', 'Manga agregado a tu lista.');
        } else {
            return redirect()->route('login');
        }
    }
    public function registroLectura(Request $request){
        if (Auth::check()) {
            $idUsuario = Auth::id();
            $idManga = $request->input('id_manga');
            $idCapitulo = $request->input('id_capitulo');

            // Busca un registro existente para el usuario y el manga
            $registro = Registro_lectura::where('id_usuario', $idUsuario)
                                ->where('id_manga', $idManga)
                                ->first();

            // Si no existe, crea un nuevo registro
            if (!$registro) {
                $registro = new Registro_lectura;
                $registro->id_usuario = $idUsuario;
                $registro->id_manga = $idManga;
            }

            // Actualiza el campo id_capitulo
            $registro->id_capitulo = $idCapitulo;
            $registro->save();

            return back()->with('success', 'Registro Guardado.');
        } else {
            return redirect()->route('login');
        }
}

}
