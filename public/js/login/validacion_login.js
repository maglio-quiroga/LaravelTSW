function validar_inicio_sesion() {
    // Obtener el valor del input
    var login_usuario = document.getElementById('login_usuario').value;
    var login_contrasena = document.getElementById('login_contrasena').value;


    // Variables que guardan el mensaje de error
    var mensajeErrorUsuario = '';
    var mensajeErrorContrasena = '';


    // Validar si el campo está vacío
    if (login_usuario === '') {
        mensajeErrorUsuario = 'Por favor, ingrese su correo.';
    }

    if (login_contrasena === '') {
        mensajeErrorContrasena = 'Por favor, ingrese su contraseña.';
    }
    // Funciones para mostrar el mensaje de error en la página
    document.getElementById('error-usuario').innerHTML = mensajeErrorUsuario;
    document.getElementById('error-contrasena').innerHTML = mensajeErrorContrasena;

    // Si hay algún error, evitar el envío del formulario
    if (mensajeErrorUsuario !== '' || mensajeErrorContrasena !== '') {
        return false;
    } else {
        return true;
    }
}