<div class="container mt-5">
    <h1 class="mb-4">Resumen de Modelos</h1>

    <!-- Noticias -->
    <section class="mb-5">
        <h2>Noticias</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Creado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($noticias as $noticia)
                <tr>
                    <td>{{ $noticia->id }}</td>
                    <td>{{ $noticia->titulo }}</td>
                    <td><img src="{{ $noticia->imagen }}" alt="Imagen" style="width:50px;"></td>
                    <td>{{ Str::limit($noticia->descripcion, 50) }}</td>
                    <td>{{ $noticia->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $noticias->links() }}
        </div>
    </section>

    <!-- Publicaciones -->
    <section class="mb-5">
        <h2>Publicaciones</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>ID Noticia</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Creado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publicaciones as $publicacion)
                <tr>
                    <td>{{ $publicacion->id }}</td>
                    <td>{{ $publicacion->id_noticias }}</td>
                    <td>{{ $publicacion->titulo }}</td>
                    <td><img src="{{ $publicacion->imagen }}" alt="Imagen" style="width:50px;"></td>
                    <td>{{ Str::limit($publicacion->descripcion, 50) }}</td>
                    <td>{{ $publicacion->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $publicaciones->links() }}
        </div>
    </section>

    <!-- Actividades -->
    <section class="mb-5">
        <h2>Actividades</h2>
        <table class="table table-bordered table-striped">
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
                </tr>
            </thead>
            <tbody>
                @foreach ($actividades as $actividad)
                <tr>
                    <td>{{ $actividad->id }}</td>
                    <td>{{ $actividad->nombre }}</td>
                    <td>{{ $actividad->destino }}</td>
                    <td>{{ $actividad->categoria }}</td>
                    <td>{{ number_format($actividad->precio, 2) }}</td>
                    <td>{{ $actividad->duracion }}</td>
                    <td>{{ \Carbon\Carbon::parse($actividad->fecha_inicio)->format('d/m/Y') }}</td>
                    <td>{{ $actividad->horario_inicio }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $actividades->links() }}
        </div>
    </section>

    <!-- Preguntas Frecuentes -->
    <section class="mb-5">
        <h2>Preguntas Frecuentes</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Texto</th>
                    <th>Creado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($preguntasFrecuentes as $pregunta)
                <tr>
                    <td>{{ $pregunta->id }}</td>
                    <td>{{ $pregunta->titulo }}</td>
                    <td>{{ Str::limit($pregunta->texto, 50) }}</td>
                    <td>{{ $pregunta->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $preguntasFrecuentes->links() }}
        </div>
    </section>

    <!-- Reservas -->
    <section class="mb-5">
        <h2>Reservas</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Motivo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->nombre }}</td>
                    <td>{{ $reserva->correo }}</td>
                    <td>{{ $reserva->telefono }}</td>
                    <td>{{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}</td>
                    <td>{{ $reserva->hora }}</td>
                    <td>{{ Str::limit($reserva->motivo, 50) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $reservas->links() }}
        </div>
    </section>
</div>