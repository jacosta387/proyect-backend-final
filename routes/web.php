<?php

use App\Http\Controllers\DBController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\MangaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [MyController::class, 'home'])->name('home');

Route::get('/anadir', [MyController::class, 'anadir'])->name('anadir');
Route::get('/biblioteca', [MyController::class, 'biblioteca'])->name('biblioteca');
Route::get('/genero', [MyController::class, 'genero'])->name('genero');
Route::get('/busqueda', [MyController::class, 'busqueda'])->name('busqueda');
Route::get('/manga', [MyController::class, 'manga'])->name('manga');
Route::get('/welcome', [MyController::class, 'welcome'])->name('welcome');
Route::get('/save-manga',function(){
    return "Manga Guardado";
});



Route::post('/save-manga', [MangaController::class, 'guardar']);

Route::get('/home',function () {
    return view('home');
});

Route::post('/guardarComentario', [DBController::class, 'guardarComentario'])->name('guardarComentario');
Route::post('/guardarCalificacion', [DBController::class, 'guardarCalificacion'])->name('guardarCalificacion');
Route::post('/añadirALista', [DBController::class, 'añadirALista'])->name('añadirALista');
Route::post('/registroLectura', [DBController::class, 'registroLectura'])->name('registroLectura');
