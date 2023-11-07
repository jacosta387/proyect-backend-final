@extends('layouts.app')

<link rel="stylesheet" href="assets/css/manga.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
@section('content')



    <div class="content ">
        <div class="titulo">
            <h1>Aphoteosis</h1>
        </div>

        <div class="container text-center">
            <div class="row">
                <div class="col">
                    

                </div>

                <div class="col col-lg-2">
                    <div class="card" style="width: 18rem;">
                        <img src="..\public\assets\img\Apotheosis.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">hola mundo</p>

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
        </div>




    </div>
    <script src="assets/js/manga.js"></script>
@endsection

