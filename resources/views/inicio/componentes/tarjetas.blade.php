<link rel="stylesheet" href="{{ asset('css/inicio/tarjetas.css') }}">

<div style="padding-top:10px; padding-bottom:40px;">
  <h1>Experimenta un Paseo Inolvidable</h1>
    @foreach ($publicaciones as $publicacion)
  <div class="targeta">
    <h2>{{ $publicacion->titulo }}</h2>
    <img src="{{  $publicacion->imagen }}" alt="Bahía Inglesa">
    <h3>{{  $publicacion->noticia->titulo }}</h3>
    <p> {{ $publicacion->descripcion }}</p>
  </div>
  @endforeach
</div>

<script src="{{ asset('js/inicio/tarjetas.js') }}"></script>