<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Manga;

class MangaController extends Controller
{
    public function guardar(Request $request)
{
    // Validación de datos
    $request->validate([
        'titulo' => 'required|string|max:255', 
        'id_genero' => 'required|exists:generos,id_genero', // Asegura que el género exista en la tabla 'generos'
        'descripcion' => 'required|string',
        'portada' => 'required|string|max:255',
        'fechaLanzamiento' => 'required|date',
        'publicado' => 'boolean', // Asegura que el valor de 'publicado' sea un booleano
        'link' => 'required|string|max:255',
    ], [
        'titulo.required' => 'El campo título es obligatorio.',
        'id_genero.required' => 'El campo género es obligatorio.',
        'descripcion.required' => 'El campo descripción es obligatorio.',
        'portada.required' => 'El link de la portada es demasiado largo',
        'link.required' => 'El link del manga es demasiado largo'
    ]);

    $manga = new Manga;

    $manga->titulo = $request->input('titulo');
    $manga->id_genero = $request->input('id_genero');
    $manga->descripcion = $request->input('descripcion');
    $manga->portada = $request->input('portada');
    $manga->fecha_lanzamiento = $request->input('fechaLanzamiento');
    $manga->publicado = $request->boolean('publicado');
    $manga->link = $request->input('link');

    $manga->save();

    return redirect('/home')->with('success', 'Manga guardado exitosamente.'); 
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
