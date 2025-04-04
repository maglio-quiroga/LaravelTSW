<div class="container" style="padding_top: 100px">
    <h1>Iniciar sesión</h1>
    <form action="" method="GET" class="row g-3 needs-validation" novalidate>
        <div>
            <label for="inombre">Usuario:</label>
            <input type="text" class="form-control" name="Usuario_sesion" required>
            <div class="invalid-feedback">
                Por favor ingrese el usuario.
            </div>
        </div>
        <div>
            <label for="contrasena_user">Contraseña:</label>
            <input type="password" class="form-control" name="Contrasena_sesion" required>
            <div class="invalid-feedback">
                Por favor ingrese la contraseña.
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="btnIngresar_sesion">Iniciar sesión</button>
        <p class="texto_centrado">¿No estás registrado? Regístrate <a href="registro.php">Aquí</a></p>
    </form>
</div>