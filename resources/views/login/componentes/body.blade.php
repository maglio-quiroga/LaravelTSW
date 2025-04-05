<div class="container" style="padding-top: 100px">
    <h1>Iniciar sesión</h1>
    <form action="{{ route('autenticacion') }}" method="POST" class="row g-3 needs-validation" novalidate>
        @csrf
        <div>
            <label for="inombre">Correo Electronico:</label>
            <input type="email" class="form-control" name="email" required>
            <div class="invalid-feedback">
                Por favor ingrese el correo electronico.
            </div>
        </div>
        <div>
            <label for="contrasena_user">Contraseña:</label>
            <input type="password" class="form-control" name="password" required>
            <div class="invalid-feedback">
                Por favor ingrese la contraseña.
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </form>
</div>