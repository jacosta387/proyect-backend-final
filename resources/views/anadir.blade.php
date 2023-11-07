<link rel="stylesheet" href="assets/css/anadir.css">
@extends('layouts.app')

@section('content')

<h1>anadir</h1>

<div class="container">
    <form>
        <table>
            <tr>
                <td>
                    <label for="nombre">Nombre del Manga</label>
                </td>
                <td>
                    <input type="text" name="nombre" id="nombre" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="categoria">Categoría</label>
                </td>
                <td>
                    <select name="categoria" id="categoria" required>
                        <option value="">Seleccionar categoría</option>
                        <option value="Aventura">Aventura</option>
                        <option value="Fantasía">Fantasía</option>
                        <option value="Ciencia Ficción">Ciencia Ficción</option>
                        <option value="Drama">Drama</option>
                        <!-- Agrega más opciones de categoría según sea necesario -->
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="autor">Autor</label>
                </td>
                <td>
                    <input type="text" name="autor" id="autor" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="fechaLanzamiento">Fecha de Lanzamiento</label>
                </td>
                <td>
                    <div class="date-picker">
                        <input type="date" name="fechaLanzamiento" id="fechaLanzamiento" required>
                    
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="imagen">Imagen</label>
                </td>
                <td>
                    <input type="file" name="imagen" id="imagen" required>
                </td>
            </tr>
        </table>
        <button type="submit">Guardar</button>
    </form>
</div>
@endsection
