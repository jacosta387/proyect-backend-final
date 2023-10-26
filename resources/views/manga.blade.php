<link rel="stylesheet" href="assets/css/manga.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

@extends('layouts.app')

@section('content')
    <div class="content">
        <h1>Aphoteosis</h1>

            <div class="lectura">
                <h2>Lectura</h2>
                <input type="number" id="capitulos" min="1" max="10" placeholder="Capítulos leídos">
                <button type="button" id="registrar">Registrar</button>
            </div>
            <div class="contenedor-capitulos ">
                <table class="tabla-capitulos" id="scrollspy-content">
                    <tbody>
                        <tr id="capitulo1">
                            <td>Capítulo 1</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo2">
                            <td>Capítulo 2</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo3">
                            <td>Capítulo 3</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo4">
                            <td>Capítulo 4</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo5">
                            <td>Capítulo 5</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo6">
                            <td>Capítulo 6</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo7">
                            <td>Capítulo 7</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo8">
                            <td>Capítulo 8</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo9">
                            <td>Capítulo 9</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo10">
                            <td>Capítulo 10</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo11">
                            <td>Capítulo 11</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo12">
                            <td>Capítulo 12</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo13">
                            <td>Capítulo 13</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo14">
                            <td>Capítulo 14</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo15">
                            <td>Capítulo 15</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo16">
                            <td>Capítulo 16</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo17">
                            <td>Capítulo 17</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo18">
                            <td>Capítulo 18</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo19">
                            <td>Capítulo 19</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                        <tr id="capitulo20">
                            <td>Capítulo 20</td>
                            <td><input type="checkbox" class="casilla-verificacion"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="press">
                <div class="card" style="width: 18rem;">
                    <img src="..\public\assets\img\Apotheosis.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Emilton lo mama</p>

                        <div class="rating-container">
                            <div class="rating">
                                <span class="star" data-rating="1">&#9733;</span>
                                <span class="star" data-rating="2">&#9733;</span>
                                <span class="star" data-rating="3">&#9733;</span>
                                <span class="star" data-rating="4">&#9733;</span>
                                <span class="star" data-rating="5">&#9733;</span>
                            </div>
                            <button type="button" id="submit-rating" class="btn btn-primary">Guardar</button>
                        </div>
                        <p class="result"><span id="rating"></span></p>
                    </div>
                    <a href="#" class="btn btn-primary">Agregar</a>
                </div>
            </div>



    </div>
    <script src="assets/js/manga.js"></script>
@endsection
