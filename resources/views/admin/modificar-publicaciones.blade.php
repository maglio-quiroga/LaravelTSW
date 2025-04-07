<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
</head>
<body>

@include('admin.componentes.navbar')
<div class="container mt-5 pt-4">
<h1>Gestion de Publicaciones</h1>
<h2>Modificar Publicación: {{ $publicacion->titulo }}</h2>
    <div class="card mb-4">
        <div class="card-header">
            Ajuste los campos
        </div>
        <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="row align-items-end">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingrese el título" value="{{ $publicacion->titulo }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción" value="{{ $publicacion->descripcion }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label for="id_noticias" class="form-label">Noticia</label>
                            <select class="form-select" id="id_noticias" name="id_noticias">
                                <option value="">Seleccione una noticia</option>
                                @foreach($noticias as $noticia)
                                    <option value="{{ $noticia->id }}" 
                                        {{ $publicacion->id_noticias == $noticia->id ? 'selected' : '' }}>
                                        {{ $noticia->titulo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="id_publicacion" value="{{ $publicacion->id }}">
                    <div class="col-md-2">
                        <button type="submit" formaction="{{ route('actpublicacion') }}" class="btn btn-success w-100">
                            Actualizar
                        </button>
                        <button type="submit" formaction="{{ route('delpublicacion') }}" class="btn btn-danger w-100 mt-2" onclick="alert('Estas a punto de eliminar este registro!')">
                            Eliminar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <p>Si no quiere cambiar la imagen deje vacio el campo.</p>
</div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>
</html>