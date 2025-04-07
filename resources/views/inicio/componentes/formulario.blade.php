<link rel="stylesheet" href="{{ asset('css/inicio/formulario.css') }}">
<div class="formulario">
    <div><img src="{{ asset('img/form.jpg') }}" class="imgdesaparece"></div>
    
    <div>
        <form action="{{ route('reserform') }}" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" onsubmit="return validar_registro()" novalidate>
        @csrf
        <h1>Agenda un cita</h1>
            <div class="inner">
                <div><label for="I_nombre">Nombre:</label></div>
                <div class="inner2">
                    <input type="text" class="form-control" id="I_nombre" name="nombre">
                    <div id="error-nombre" class="text-danger"></div>
                </div>
            </div>
            <div class="inner">
                <div><label for="I_correo">Correo:</label></div>
                <div class="inner2">
                    <input type="email" class="form-control" id="I_correo" name="correo">
                    <div id="error-correo" class="text-danger"></div>
                </div>   
            </div>
            <div class="inner">
                <div><label for="I_telefono">Telefono:</label></div> 
                <div class="inner2">
                    <input type="tel" class="form-control" id="I_telefono" name="telefono">
                    <div id="error-telefono" class="text-danger"></div>
                </div> 
            </div>
            <div class="inner">
                <div><label for="fecha">Fecha de la cita:</label></div> 
                <div class="inner2">
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                    <div id="error-fecha" class="text-danger"></div>
                </div> 
            </div>
            <div class="inner">
                <div><label for="hora">Hora de la cita:</label></div> 
                <div class="inner2">
                    <input type="time" class="form-control" id="hora" name="hora" required>
                    <div id="error-hora" class="text-danger"></div>
                </div> 
            </div>
            <div class="inner">
                <div><label for="motivo">Motivo de la cita:</label></div> 
                <div class="inner2" 0-9>
                    <textarea class="form-control" id="motivo" name="motivo" rows="4" required></textarea>
                    <div id="error-motivo" class="text-danger"></div>
                </div> 
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>

<script src="{{ asset('js/inicio/formulario.js') }}"></script>