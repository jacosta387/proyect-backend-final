<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class MyController extends Controller{

    public function anadir()
    {
        return view('anadir');
    }
    public function biblioteca()
    {
        return view('biblioteca');
    }
    public function busqueda()
    {
        return view('busqueda');
    }
    public function genero()
    {
        return view('genero');
    }
    public function manga()
    {
        return view('manga');
    }
    public function home()
    {
        return view('home');
    }


}
