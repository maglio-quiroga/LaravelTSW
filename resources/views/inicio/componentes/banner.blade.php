<link rel="stylesheet" href="{{ asset('css/banner.css') }}">
<div class="banner">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      @foreach ($noticias as $index => $noticia)
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
      @endforeach
    </div>

    <div class="carousel-inner">
      @foreach ($noticias as $index => $noticia)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
          <img src="{{ $noticia->imagen }}" class="d-block w-100" alt="{{ $noticia->titulo }}">
          <div class="carousel-caption d-none d-md-block">
            <h5>{{ $noticia->titulo }}</h5>
            <p>{{ $noticia->descripcion }}</p>
          </div>
        </div>
      @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
</div>

