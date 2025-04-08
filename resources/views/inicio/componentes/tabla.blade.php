<link rel="stylesheet" href="{{ asset('css/inicio/tabla.css') }}">

<div class="tablefull">
  <div class="tablebody"> 
    <h1 class="titulotabla">Tabla de Actividades</h1>

    <!-- Formulario de búsqueda -->
    <div class="inputbox">
      <div class="row1">
        <input type="text" id="inputBuscarNombre" class="form-control mb-2" placeholder="Buscar por Nombre">
        <input type="text" id="inputBuscarDestino" class="form-control mb-2" placeholder="Buscar por Destino">
      </div>
    </div>

    <!-- Tabla dinámica -->
    <table class="table table-bordered" id="tabla">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Destino</th>
          <th>Categoría</th>
          <th>Precio</th>
          <th>Duración</th>
          <th>Fecha de Inicio</th>
          <th>Hora de Inicio</th>
        </tr>
      </thead>
      <tbody id="tablaBody">
        @foreach($actividades as $actividad)
          <tr>
            <td>{{ $actividad->nombre }}</td>
            <td>{{ $actividad->destino }}</td>
            <td>{{ $actividad->categoria }}</td>
            <td>{{ $actividad->precio }}</td>
            <td>{{ $actividad->duracion }}</td>
            <td>{{ \Carbon\Carbon::parse($actividad->fecha_inicio)->format('d/m/Y') }}</td>
            <td>{{ $actividad->horario_inicio }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


<script>
     
  document.getElementById('inputBuscarNombre').addEventListener('keyup', function() {
    let valor = this.value.toLowerCase();
    let filas = document.querySelectorAll('#tablaBody tr');
    filas.forEach(function(fila) {
      let nombre = fila.cells[0].textContent.toLowerCase();
      fila.style.display = nombre.includes(valor) ? '' : 'none';
    });
  });

  document.getElementById('inputBuscarDestino').addEventListener('keyup', function() {
    let valor = this.value.toLowerCase();
    let filas = document.querySelectorAll('#tablaBody tr');
    filas.forEach(function(fila) {
      let destino = fila.cells[1].textContent.toLowerCase();
      fila.style.display = destino.includes(valor) ? '' : 'none';
    });
  });
</script>

 <!--
<script src="{{ asset('js/inicio/tabla.js') }}"></script>-->