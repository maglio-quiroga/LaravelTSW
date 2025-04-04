function validar_registro() {
    // Obtener el valor del input
    var registro_nombre = document.getElementById('I_nombre').value;
    var registro_correo = document.getElementById('I_correo').value;
    var registro_telefono = document.getElementById('I_telefono').value;
    var registro_fecha = document.getElementById('fecha').value;
    var registro_hora = document.getElementById('hora').value;
    var registro_motivo = document.getElementById('motivo').value;

    // Variables que guardan el mensaje de error
    var mensajeErrorNombre = '';
    var mensajeErrorCorreo = '';
    var mensajeErrorTelefono = '';
    var mensajeErrorFecha = '';
    var mensajeErrorHora = '';
    var mensajeErrorMotivo = '';

    // Validar si el campo está vacío
    if (registro_nombre === '') {
        mensajeErrorNombre = 'Por favor, ingrese su nombre';
    }

    if (registro_correo === '') {
        mensajeErrorCorreo = 'Por favor, ingrese su correo';
    } else if (!/^\S+@\S+\.\S+$/.test(registro_correo)) {
        mensajeErrorCorreo = 'Ingrese una dirección de correo electrónico válida';
    }

    // Validar el número de teléfono
    if (registro_telefono === '') {
        mensajeErrorTelefono = 'Por favor, ingrese su número de teléfono';
    } else if (!/^\+?[0-9]{10,15}$/.test(registro_telefono)) {
        mensajeErrorTelefono = 'Ingrese un número de teléfono válido (10-15 dígitos)';
    }

    // Validar fecha de la cita
    if (registro_fecha === '') {
        mensajeErrorFecha = 'Por favor, ingrese la fecha de la cita';
    } else {
        var fechaActual = new Date();
        var fechaSeleccionada = new Date(registro_fecha);
        if (fechaSeleccionada < fechaActual) {
            mensajeErrorFecha = 'La fecha no puede ser anterior al día actual';
        }
    }

    // Validar hora de la cita
    if (registro_hora === '') {
        mensajeErrorHora = 'Por favor, ingrese la hora de la cita';
    } else {
        var horaSeleccionada = parseInt(registro_hora.split(":")[0], 10); // Obtener solo la hora (sin los minutos)
        if (horaSeleccionada < 7 || horaSeleccionada > 17) { // 7 AM (07:00) a 5 PM (17:00)
            mensajeErrorHora = 'La hora debe estar entre las 7 AM y las 5 PM';
        }
    }

    // Validar motivo de la cita
    if (registro_motivo === '') {
        mensajeErrorMotivo = 'Por favor, ingrese el motivo de la cita';
    }

    // Funciones para mostrar el mensaje de error en la página
    document.getElementById('error-nombre').innerHTML = mensajeErrorNombre;
    document.getElementById('error-correo').innerHTML = mensajeErrorCorreo;
    document.getElementById('error-telefono').innerHTML = mensajeErrorTelefono;
    document.getElementById('error-fecha').innerHTML = mensajeErrorFecha;
    document.getElementById('error-hora').innerHTML = mensajeErrorHora;
    document.getElementById('error-motivo').innerHTML = mensajeErrorMotivo;

    // Si hay algún error, evitar el envío del formulario
    if (mensajeErrorNombre !== '' || mensajeErrorCorreo !== '' || mensajeErrorTelefono !== '' || mensajeErrorFecha !== '' || mensajeErrorHora !== '' || mensajeErrorMotivo !== '') {
        return false;
    } else {
        return true;
    }
}