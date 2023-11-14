@extends('layouts.app')
@inject('mangaController', 'App\Http\Controllers\MangaController')
@php
    $mangas = $mangaController->obtenerMangas();
@endphp
@section('content')
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/general.css">
    <div class="content">
        <div class="titulo">
            <h2>Favoritos del mes</h2>
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <?php
                  $mangasArray = $mangas->toArray();
                  shuffle($mangasArray);
                  
                  $numMangas = min(12, count($mangasArray));
                  
                  for ($i = 0; $i < $numMangas; $i++) {
                      $mangaAleatorio = $mangasArray[$i];
                  ?>
                  <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
                    <div class="press">
                      <div class="card" style="width: 18rem;">
                        <a href="{{ route('manga', ['manga' => $mangaAleatorio['id_manga']]) }}">
                          <img src="{{ $mangaAleatorio['portada'] }}" class="card-img-top" alt="...">
                        </a>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>


        <div class="interesar   mt-3">
            <div class="titulo">
                <h2>Te puede interesar</h2>
            </div>
            <div class="press-container">
                <?php
                // Convierte la colección a un array y luego reorganiza aleatoriamente
                $mangasArray = $mangas->toArray();
                shuffle($mangasArray);

                // Muestra solo los primeros N mangas aleatorios (ajusta N según sea necesario)
                $numMangas = min(5, count($mangasArray));

                for ($i = 0; $i < $numMangas; $i++) {
                    $mangaAleatorio = $mangasArray[$i];
                ?>
                <div class="press">
                    <div class="card" style="width: 18rem;">
                        <a href="{{ route('manga', ['manga' => $mangaAleatorio['id_manga']]) }}">
                            <img src="{{ $mangaAleatorio['portada'] }}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <p class="card-text">{{ $mangaAleatorio['titulo'] }}</p>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="mas mt-3">
            <div class="titulo">
                <h2>Mas Mangas</h2>
            </div>
            <div class="press-container">
                @foreach ($mangas as $manga)
                    {{-- <div>
                        <h2>{{ $manga->titulo }}</h2>
                        <p> <img src={{ $manga->portada }} class="card-img-top" alt="...">';{{ $manga->descripcion }}</p>

                        <!-- Agrega más campos según sea necesario -->
                    </div> --}}

                    <div class="press">
                        <div class="card" style="width: 18rem;">
                            <a href="{{ route('manga', ['manga' => $manga->id_manga]) }}">
                                <img src="{{ $manga->portada }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <p class="card-text">{{ $manga->titulo }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
