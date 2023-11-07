@extends('layouts.app')

<link rel="stylesheet" href="assets/css/manga.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
@section('content')
    <div class="content ">
        <div class="row mt-5">
            <div class="col col-lg-2 ml-2 ">
                <div class="card img float-right" style="width: 10rem;">
                    <img src="..\public\assets\img\Apotheosis.jpg" class="card-img-top " alt="...">
                </div>

            </div>
            <div class="col desc col-lg-6">
                <div class="titulo">
                    <h1>Aphoteosis</h1>
                    <p class="tags">Finalizado</p>
                </div>
                <div class="descripcion">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque fugit quis accusamus labore? Ut cumque
                    impedit qui recusandae similique, suscipit fugit minima mollitia voluptas, modi reprehenderit quas ea
                    aliquid saepe.
                </div>
            </div>
            <div class="col mt-5">

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
                <a href="#" class="btn btn-primary">Agregar a mi lista</a>

            </div>
        </div>

        <div class="row mt-5">

            <div class="col-lg-5 tabla-contenido ">
                <table class="table table-rounded bkgTable">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" colspan="2">Capitulos</th>
                            <th scope="col " class="text-left">Visto</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        <?php
                        for ($i = 1; $i <= 20; $i++) {
                            echo '<tr>';
                            echo '<th scope="row">' . $i . '</th>';
                            echo '<td>Capitulo ' . $i . '</td>';
                            echo '<td class=""><input class="form-check-input ml-2" type="checkbox" value="" id="flexCheckDefault"></td>';
                            echo '</tr>';
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <div class="col">
                <h3>Comments:</h3>
                <form>
                    <div class="form-group comment">
                        <textarea class="form-control" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar comentario</button>
                </form>

                <div id="comment-section">

                    <div class="comment-container mr-4 ml-4">
                        <div class=" row comment-head">
                            <div class="gp-comment-meta">
                                <span class="gp-comment-author" itemprop="author">Felipe</span>
                                <br>
                                <time class="gp-comment-date-time" itemprop="datePublished" datetime="2023-02-06T08:25:57-05:00">06/02/2023, 8:25 am</time>
                            </div>
                        </div>
                        <div class="row comment-body">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe esse neque nemo veritatis! Tempore corporis doloribus molestiae, voluptate consequatur velit ea possimus soluta? Vitae autem fugit quisquam culpa aspernatur possimus.</p>
                        </div>

                    </div>
                  </div>
            </div>

        </div>




    </div>
    <script src="assets/js/manga.js"></script>
@endsection
