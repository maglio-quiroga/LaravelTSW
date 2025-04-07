<link rel="stylesheet" href="{{ asset('css/inicio/tabla.css') }}">
<div class="tablefull">
<div class="tablebody"> 
<h1 class="titulotabla">TABLA</h1>



    <!--formulario para datitos-->
    <div class="inputbox">
        <div class="row1">
            <input type="text" id="inputBuscarNombre" class="form-control mb-2" placeholder="Buscar por Nombre">
        </div>
    </div>
    <!-- Busqueda dinamica -->

    <table class="table table-bordered" id="tabla">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Motivo</th>
              
    
            </tr>
        </thead>
        <tbody id="tablaBody">
        </tbody>
    </table>
</div>
</div>
<script src="{{ asset('js/inicio/tabla.js') }}"></script>