<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;

class SearchController extends Controller
{
    public function buscar(Request $request)
    {
        $query = $request->input('q');
        $resultados = manga::where('nombre', 'like', "%$query%")->get();

        return view('resultados_busqueda', compact('resultados'));
    }
}
