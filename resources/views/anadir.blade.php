<link rel="stylesheet" href="assets/css/anadir.css">
@extends('layouts.app')

@section('content')

<div class="center-title">
    <h1>Añadir Manga</h1>
</div>
<div class="container1">
    <form action="/proyect-backend-final/public/save-manga" method="POST">
        @csrf <!-- Agrega el token CSRF para protección contra CSRF -->

        <table>
            <tr>
                <td>
                    <label for="titulo">Título del Manga</label>
                </td>
                <td>
                    <input type="text" name="titulo" id="titulo" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="id_genero">Género</label>
                </td>
                <td>
                    <select name="id_genero" id="id_genero" required>
                        <option value="">Seleccionar género</option>
                        <option value="1">Aventura</option>
                        <option value="2">Fantasía</option>
                        <option value="3">Ciencia Ficción</option>
                        <option value="4">Drama</option>
                        <!-- Agrega más opciones de género según sea necesario -->
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="descripcion">Descripción</label>
                </td>
                <td>
                    <textarea name="descripcion" id="descripcion" required></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="portada">Link de la Portada</label>
                </td>
                <td>
                    <input type="text" name="portada" id="portada" required>
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
                    <label for="publicado">¿Publicado?</label>
                </td>
                <td>
                    <input type="checkbox" name="publicado" id="publicado">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="link">Link del Manga</label>
                </td>
                <td>
                    <input type="text" name="link" id="link" required>
                </td>
            </tr>
        </table>
        <button type="submit">Guardar</button>
    </form>
</div>

@endsection
