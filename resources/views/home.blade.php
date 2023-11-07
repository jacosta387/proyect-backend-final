@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="assets/css/home.css">
    <div class="content2">
        <div class="titulo">
            <h2>Favoritos del mes</h2>
        </div>
    </div>
    <div class="content">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="..\public\assets\img\MartialPeak.jpg" class="d-block w-100 img-carousel"
                                alt="Imagen 1">
                        </div>
                        <div class="col-md-3">
                            <img src="..\public\assets\img\Apotheosis.jpg" class="d-block w-100 img-carousel"
                                alt="Imagen 2">
                        </div>
                        <div class="col-md-3">
                            <img src="..\public\assets\img\Yuan Zun.jpg" class="d-block w-100 img-carousel" alt="Imagen 3">
                        </div>
                        <div class="col-md-3">
                            <img src="..\public\assets\img\MartialPeak.jpg" class="d-block w-100 img-carousel"
                                alt="Imagen 4">
                        </div>
                    </div>
                </div>

                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="..\public\assets\img\MartialPeak.jpg" class="d-block w-100 img-carousel"
                                alt="Imagen 1">
                        </div>
                        <div class="col-md-3">
                            <img src="..\public\assets\img\Apotheosis.jpg" class="d-block w-100 img-carousel"
                                alt="Imagen 2">
                        </div>
                        <div class="col-md-3">
                            <img src="..\public\assets\img\Yuan Zun.jpg" class="d-block w-100 img-carousel" alt="Imagen 3">
                        </div>
                        <div class="col-md-3">
                            <img src="..\public\assets\img\MartialPeak.jpg" class="d-block w-100 img-carousel"
                                alt="Imagen 4">
                        </div>
                    </div>
                </div>
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="..\public\assets\img\MartialPeak.jpg" class="d-block w-100 img-carousel"
                                alt="Imagen 1">
                        </div>
                        <div class="col-md-3">
                            <img src="..\public\assets\img\Apotheosis.jpg" class="d-block w-100 img-carousel"
                                alt="Imagen 2">
                        </div>
                        <div class="col-md-3">
                            <img src="..\public\assets\img\Yuan Zun.jpg" class="d-block w-100 img-carousel" alt="Imagen 3">
                        </div>
                        <div class="col-md-3">
                            <img src="..\public\assets\img\MartialPeak.jpg" class="d-block w-100 img-carousel"
                                alt="Imagen 4">
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>


        <div class="content3">
            <div class="titulo1">
                <h2>Te pueden interesar...</h2>
            </div>
        </div>

        <div class="press-container">
            <div class="press">
                <div class="card" style="width: 18rem;">
                    <img src="..\public\assets\img\Apotheosis.jpg" class="card-img-top img-press" alt="...">
                    <div class="card-body special-background">
                        <p class="card-text">MartialPeak</p>
                    </div>
                </div>
            </div>
            <div class="press">
                <div class="card" style="width: 18rem;">
                    <img src="..\public\assets\img\Yuan Zun.jpg" class="card-img-top img-press" alt="...">
                    <div class="card-body special-background">
                        <p class="card-text">Yuan Zun</p>
                    </div>
                </div>
            </div>
            <div class="press">
                <div class="card" style="width: 18rem;">
                    <img src="..\public\assets\img\MartialPeak.jpg" class="card-img-top img-press" alt="...">
                    <div class="card-body special-background">
                        <p class="card-text">MartialPeak</p>
                    </div>
                </div>
            </div>
            <div class="press">
                <div class="card" style="width: 18rem;">
                    <img src="..\public\assets\img\Apotheosis.jpg" class="card-img-top img-press" alt="...">
                    <div class="card-body special-background">
                        <p class="card-text">Apotheosis</p>
                    </div>
                </div>
            </div>
            <div class="press">
                <div class="card" style="width: 18rem;">
                    <img src="..\public\assets\img\MartialPeak.jpg" class="card-img-top img-press" alt="...">
                    <div class="card-body special-background">
                        <p class="card-text">MartialPeak</p>
                    </div>
                </div>
            </div>
        </div>
            <div class="titulo1">
                <h2>Agregados Recientemente</h2>
            </div>
        </div>
        <div class="press-container">
            <div class="press">
                <div class="card" style="width: 18rem;">
                    <img src="..\public\assets\img\Apotheosis.jpg" class="card-img-top img-press" alt="...">
                    <div class="card-body special-background">
                        <p class="card-text">MartialPeak</p>
                    </div>
                </div>
            </div>
            <div class="press">
                <div class="card" style="width: 18rem;">
                    <img src="..\public\assets\img\Yuan Zun.jpg" class="card-img-top img-press" alt="...">
                    <div class="card-body special-background">
                        <p class="card-text">Yuan Zun</p>
                    </div>
                </div>
            </div>
            <div class="press">
                <div class="card" style="width: 18rem;">
                    <img src="..\public\assets\img\MartialPeak.jpg" class="card-img-top img-press" alt="...">
                    <div class="card-body special-background">
                        <p class="card-text">MartialPeak</p>
                    </div>
                </div>
            </div>
            <div class="press">
                <div class="card" style="width: 18rem;">
                    <img src="..\public\assets\img\Apotheosis.jpg" class="card-img-top img-press" alt="...">
                    <div class="card-body special-background">
                        <p class="card-text">Apotheosis</p>
                    </div>
                </div>
            </div>
            <div class="press">
                <div class="card" style="width: 18rem;">
                    <img src="..\public\assets\img\MartialPeak.jpg" class="card-img-top img-press" alt="...">
                    <div class="card-body special-background">
                        <p class="card-text">MartialPeak</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
