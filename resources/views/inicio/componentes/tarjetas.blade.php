<link rel="stylesheet" href="{{ asset('css/inicio/tarjetas.css') }}">

<div class="fade-in" style=" margin-top: 40px;">
    <h1 class="title">Experimenta un Paseo Inolvidable</h1>
	<div class="tarjetas">
		@foreach ($publicaciones as $publicacion)
		<div class="tarjeta">
			<h2>{{ $publicacion->titulo }}</h2>
			<img src="{{  $publicacion->imagen }}" alt="imagen publicación">
			<h3>{{  $publicacion->noticia->titulo }}</h3>
			<p> {{ $publicacion->descripcion }}</p>
		</div>
		@endforeach
	</div>
    
</div>
<script src="{{ asset('js/inicio/tarjetas.js') }}"></script>