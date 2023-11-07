@extends('layouts.app')

<link rel="stylesheet" href="assets/css/manga.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
@section('content')
    <div class="content ">

        <div class="container ">
            <div class="row">
                <div class="col">
                    <div class="row text-left">
                        <div class="titulo">
                            <h1>Aphoteosis</h1>
                            <p class="tags">Finalizado</p>
                        </div>
                        <div class="descripcion">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non quas omnis fugit dolores,
                            distinctio maiores iste vero eius iure sint aspernatur temporibus aperiam incidunt cupiditate
                            deleniti minima? Odio, rem suscipit?

                        </div>
                    </div>
                    <div class="row text-left">
                        <div class="col tabla-contenido">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ratón</td>
                                        <td>15</td>
                                        <td>100</td>
                                    </tr>
                                    <tr>
                                        <td>Teclado</td>
                                        <td>34</td>
                                        <td>340</td>
                                    </tr>
                                    <tr>
                                        <td>Pantalla</td>
                                        <td>10</td>
                                        <td>400</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>

                <div class="col col-lg-2">
                    <div class="card" style="width: 18rem;">
                        <img src="..\public\assets\img\Apotheosis.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="rating-container">
                                <div class="rating">
                                    <span class="star" data-rating="1">&#9733;</span>
                                    <span class="star" data-rating="2">&#9733;</span>
                                    <span class="star" data-rating="3">&#9733;</span>
                                    <span class="star" data-rating="4">&#9733;</span>
                                    <span class="star" data-rating="5">&#9733;</span>
                                </div>
                                <button type="button" id="submit-rating" class="btn btn-primary">Calificar</button>
                            </div>
                            <p class="result"><span id="rating"></span></p>
                        </div>
                        <a href="#" class="btn btn-primary">Agregar</a>
                    </div>
                </div>
            </div>
        </div>




    </div>
    <script src="assets/js/manga.js"></script>
@endsection
