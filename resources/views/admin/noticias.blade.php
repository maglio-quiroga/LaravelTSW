<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('admin.componentes.navbar')

<div class="container mt-5 pt-4">
    <h1>Gestión de Noticias</h1>

    <div class="card mb-4">
        <div class="card-header">
            Añadir Nueva Noticia
        </div>
        <div class="card-body">
            <form action="{{ route('crearnoticia') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="row align-items-end">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingrese el título">
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
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-success w-100">Añadir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Ruta Imagen</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($noticias as $noticia)
                <tr>
                    <td>{{ $noticia->id }}</td>
                    <td>{{ $noticia->titulo }}</td>
                    <td>{{ $noticia->imagen }}</td>
                    <td>{{ $noticia->descripcion }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('modificarnoticia', ['id' => $noticia->id]) }}" class="btn btn-primary btn-sm">
                            Modificar
                        </a>
                        <form action="{{ route('delnoticia') }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta noticia?');">
                            @csrf
                            <input type="hidden" name="id_noticia" value="{{ $noticia->id }}">
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
