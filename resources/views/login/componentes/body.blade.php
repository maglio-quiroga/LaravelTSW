<div class="container" style="padding-top: 100px">
    <h1>Iniciar sesión</h1>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('autenticacion') }}" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" onsubmit="return validar_inicio_sesion()" novalidate>
        @csrf
        <div>
            <label for="login_usuario">Correo electrónico:</label>
            <input type="text" class="form-control" name="email" id="login_usuario">
            <div id="error-usuario" class="text-danger"></div>
        </div>
        <div>
            <label for="login_contrasena">Contraseña:</label>
            <input type="password" class="form-control" name="password" id="login_contrasena">
            <div id="error-contrasena" class="text-danger"></div>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </form>
</div>
<script src="{{ asset('js/login/validacion_login.js') }}"></script>