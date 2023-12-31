<link rel="stylesheet" href="assets/css/anadir.css">
@extends('layouts.app')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('content')
    <div class="content">
        
        <br>

        <div class="container1">
            <form action="/proyect-backend-final/public/save-manga" method="POST">
                @csrf <!-- Agrega el token CSRF para protección contra CSRF -->

                <table>
                    <tr>
                        <td class="a">
                            <label for="titulo">Título del Manga</label>
                        </td>
                        <td>
                            <input class="input-txt" type="text" name="titulo" id="titulo" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="a">
                            <label for="id_genero">Género</label>
                        </td>
                        <td class="a">
                            <select name="id_genero" id="id_genero" required>
                                <option value="">Seleccionar género</option>
                                <option value="01">Shonen</option>
                                <option value="02">Isekai</option>
                                <option value="03">Seinen</option>
                                <option value="04">Harem</option>
                                <option value="05">CiberPunk</option>
                                <!-- Agrega más opciones de género según sea necesario -->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="a">
                            <label for="descripcion">Descripción</label>
                        </td>
                        <td class="a">
                            <textarea name="descripcion" id="descripcion" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="a">
                            <label for="portada">Link de la Portada</label>
                        </td>
                        <td class="a">
                            <input class="input-txt" type="text" name="portada" id="portada" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="a">
                            <label for="fechaLanzamiento">Fecha de Lanzamiento</label>
                        </td>
                        <td class="a">
                            <div class="date-picker">
                                <input type="date" name="fechaLanzamiento" id="fechaLanzamiento" required>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="a">
                            <label for="link">Link del Manga</label>
                        </td>
                        <td>
                            <input type="url" name="link" id="link" class="input-txt" required>
                        </td>

                    </tr>
                    <tr>
                        <td class="a">
                            <label for="link">Numero de Capitulo</label>
                        </td>
                        <td>
                            <input class="input-txt" type="number" name="capitulos" id="capitulo" required>
                        </td>

                    </tr>
                </table>
                <button class="buttonS" type="submit">Guardar</button>
            </form>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
