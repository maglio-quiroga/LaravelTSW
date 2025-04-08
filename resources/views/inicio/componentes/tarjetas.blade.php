<link rel="stylesheet" href="{{ asset('css/inicio/tarjetas.css') }}">

<div class="fade-in" style=" margin-top: 40px;">
    <h1 class="title">Experimenta un Paseo Inolvidable</h1>
	<div class="container my-4">
    <div class="row">
        @foreach ($publicaciones as $publicacion)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $publicacion->imagen }}" class="card-img-top" alt="imagen publicación">
                    <div class="card-body">
                        <h5 class="card-title">{{ $publicacion->titulo }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $publicacion->noticia->titulo }}</h6>
                        <p class="card-text">{{ $publicacion->descripcion }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
    
</div>
<script src="{{ asset('js/inicio/tarjetas.js') }}"></script>