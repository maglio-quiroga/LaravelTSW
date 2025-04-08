<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Noticia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('admin.componentes.navbar')

<div class="container mt-5 pt-4">
    <h1>Gestión de Noticias</h1>
    <h2>Modificar Noticia: {{ $noticia->titulo }}</h2>

    <div class="card mb-4">
        <div class="card-header">
            Ajuste los campos
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="row align-items-end">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingrese el título" value="{{ $noticia->titulo }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción" value="{{ $noticia->descripcion }}">
                        </div>
                    </div>

                    <input type="hidden" name="id_noticia" value="{{ $noticia->id }}">

                    <div class="col-md-1 d-grid">
                        <button type="submit" formaction="{{ route('actnoticia') }}" class="btn btn-success">
                            Actualizar
                        </button>
                        <button type="submit" formaction="{{ route('delnoticia') }}" class="btn btn-danger mt-2" onclick="return confirm('¿Estás seguro de que deseas eliminar esta noticia?')">
                            Eliminar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <p class="text-muted">Si no desea cambiar la imagen, deje el campo vacío.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
