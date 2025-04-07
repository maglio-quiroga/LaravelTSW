<div class="container">
    <h1 class="mb-4">Lista de Actividades</h1>

    @if(session('exito'))
        <div class="alert alert-success">
            {{ session('exito') }}
        </div>
    @endif

    <a href="{{ route('actividades.crear') }}" class="btn btn-primary mb-3">Crear nueva actividad</a>

    <!-- Tabla de actividades -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Destino</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Duración</th>
                <th>Fecha de Inicio</th>
                <th>Horario de Inicio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($actividades as $actividad)
                <tr>
                    <td>{{ $actividad->nombre }}</td>
                    <td>{{ $actividad->destino }}</td>
                    <td>{{ $actividad->categoria }}</td>
                    <td>${{ number_format($actividad->precio, 2) }}</td>
                    <td>{{ $actividad->duracion }} horas</td>
                    <td>{{ $actividad->fecha_inicio }}</td>
                    <td>{{ $actividad->horario_inicio }}</td>
                    <td>
                        <a href="{{ route('actividades.editar', $actividad->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('actividades.eliminar', $actividad->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta actividad?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {{ $actividades->links() }}
    </div>

    <!-- Formulario de creación de actividad -->
    <h2 class="mt-4">Crear nueva actividad</h2>
    <form action="{{ route('actividades.guardar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la actividad</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la actividad" required>
        </div>
        
        <div class="mb-3">
            <label for="destino" class="form-label">Destino</label>
            <input type="text" class="form-control" name="destino" id="destino" placeholder="Destino" required>
        </div>
        
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Categoría" required>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" name="precio" id="precio" placeholder="Precio" required>
        </div>

        <div class="mb-3">
            <label for="duracion" class="form-label">Duración (en horas)</label>
            <input type="number" class="form-control" name="duracion" id="duracion" placeholder="Duración" required>
        </div>

        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha de inicio" required>
        </div>

        <div class="mb-3">
            <label for="horario_inicio" class="form-label">Horario de inicio</label>
            <input type="time" class="form-control" name="horario_inicio" id="horario_inicio" placeholder="Horario de inicio" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
