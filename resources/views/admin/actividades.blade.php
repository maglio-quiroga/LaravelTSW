<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('admin.componentes.navbar')

<div class="container mt-5 pt-4">
    <h1>Gestión de Actividades</h1>

    {{-- Mensaje de éxito --}}
    @if(session('exito'))
        <div class="alert alert-success">
            {{ session('exito') }}
        </div>
    @endif

    {{-- Botón para añadir nueva actividad --}}
    <div class="mb-4">
        <button class="btn btn-success" onclick="abrirModalCrear()">Añadir Nueva Actividad</button>
    </div>

    {{-- Tabla de actividades --}}
    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Destino</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Duración</th>
                <th>Fecha Inicio</th>
                <th>Horario Inicio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actividades as $actividad)
                <tr>
                    <td>{{ $actividad->id }}</td>
                    <td>{{ $actividad->nombre }}</td>
                    <td>{{ $actividad->destino }}</td>
                    <td>{{ $actividad->categoria }}</td>
                    <td>${{ number_format($actividad->precio, 2) }}</td>
                    <td>{{ $actividad->duracion }} hrs</td>
                    <td>{{ \Carbon\Carbon::parse($actividad->fecha_inicio)->format('Y-m-d') }}</td>
                    <td>{{ \Carbon\Carbon::parse($actividad->horario_inicio)->format('H:i') }}</td>
                    <td>
                        <button 
                            class="btn btn-primary btn-sm"
                            onclick="abrirModalEditar(
                                {{ $actividad->id }},
                                '{{ $actividad->nombre }}',
                                '{{ $actividad->destino }}',
                                '{{ $actividad->categoria }}',
                                '{{ $actividad->precio }}',
                                '{{ $actividad->duracion }}',
                                '{{ \Carbon\Carbon::parse($actividad->fecha_inicio)->format('Y-m-d') }}',
                                '{{ \Carbon\Carbon::parse($actividad->horario_inicio)->format('H:i') }}'
                            )">
                            Modificar
                        </button>
                        <form action="{{ route('actividades.eliminar', ['id' => $actividad->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro que quieres eliminar esta actividad?')">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Paginación --}}
    <div class="d-flex justify-content-center">
        {{ $actividades->links() }}
    </div>
</div>

<!--modalsito para crear y editar-->
<div class="modal fade" id="modalActividad" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formActividad" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalActividadTitulo">Nueva Actividad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                </div>
                <div class="mb-2">
                    <label for="destino" class="form-label">Destino</label>
                    <input type="text" class="form-control" name="destino" id="destino" required>
                </div>
                <div class="mb-2">
                    <label for="categoria" class="form-label">Categoría</label>
                    <input type="text" class="form-control" name="categoria" id="categoria" required>
                </div>
                <div class="mb-2">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" name="precio" id="precio" step="0.01" required>
                </div>
                <div class="mb-2">
                    <label for="duracion" class="form-label">Duración (hrs)</label>
                    <input type="number" class="form-control" name="duracion" id="duracion" required>
                </div>
                <div class="mb-2">
                    <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required>
                </div>
                <div class="mb-2">
                    <label for="horario_inicio" class="form-label">Horario de Inicio</label>
                    <input type="time" class="form-control" name="horario_inicio" id="horario_inicio" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const modal = new bootstrap.Modal(document.getElementById('modalActividad'));
    const form = document.getElementById('formActividad');

    function abrirModalCrear() {
        document.getElementById('modalActividadTitulo').innerText = 'Crear Nueva Actividad';
        form.action = "{{ route('actividades.guardar') }}";
        form.reset();
        modal.show();
    }

    function abrirModalEditar(id, nombre, destino, categoria, precio, duracion, fecha_inicio, horario_inicio) {
        document.getElementById('modalActividadTitulo').innerText = 'Editar Actividad';
        form.action = "{{ url('actividades/actualizar') }}/" + id;
        form.querySelector('[name=nombre]').value = nombre;
        form.querySelector('[name=destino]').value = destino;
        form.querySelector('[name=categoria]').value = categoria;
        form.querySelector('[name=precio]').value = precio;
        form.querySelector('[name=duracion]').value = duracion;
        form.querySelector('[name=fecha_inicio]').value = fecha_inicio;
        form.querySelector('[name=horario_inicio]').value = horario_inicio;
        modal.show();
    }
</script>

</body>
</html>
