<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;

class MangaController extends Controller
{
    public function guardar(Request $request)
    {
       $manga = new Manga;

       $manga->titulo = $request->input('titulo');
       $manga->id_genero = $request->input('id_genero');
       $manga->descripcion = $request->input('descripcion');
       $manga->portada = $request->input('portada');
       $manga->fecha_lanzamiento = $request->input('fechaLanzamiento');
       $manga->publicado = true; // Si fue publicado siempre sera true
       $manga->link = $request->input('link');

       $manga->save();


       return redirect('/manga'); // Puedes redirigir a donde desees después de guardar
    }

    public function obtenerMangas(){
        return Manga::all();
    }
    public function listarMangas()
    {
        $mangas = Manga::all();
        return view('tu-vista')->with('mangas', $mangas);
    }
}
