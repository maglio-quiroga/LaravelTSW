async function cargar() {
   
    const resp = await fetch("http://localhost/LaravelTSW/public/reservas"); 
    const datos = await resp.json(); // Conversión a JSON
    console.log(datos); // Verifica la respuesta
    return datos;
}


// Función para llenar la tabla con los datos obtenidos
async function llenarTabla() {
    const datos = await cargar(); // Llamamos a la función cargar para obtener los datos
    const tablaBody = document.getElementById("tablaBody"); // Seleccionamos el cuerpo de la tabla

    // Limpiamos el contenido previo por si se vuelve a ejecutar
    tablaBody.innerHTML = "";

    // Iteramos sobre los datos y creamos filas en la tabla
    datos.forEach((item) => {
        let fila = document.createElement("tr");
        // Llenamos las celdas con los datos de la reserva
        fila.innerHTML = `

            <td>${item.nombre}</td>
            <td>${item.correo}</td>
            <td>${item.telefono}</td>
            <td>${item.fecha}</td>
            <td>${item.hora}</td>
            <td>${item.motivo}</td>
     
        `;
        // Agregamos la fila al cuerpo de la tabla
        tablaBody.appendChild(fila);
    });
}

function buscarTabla() {
    var inputNombre, tabla, tr, iterador;
    inputNombre = document.getElementById("inputBuscarNombre").value.toUpperCase();
    tabla = document.getElementById("tabla");
    tr = tabla.getElementsByTagName("tr");

    for (iterador = 1; iterador < tr.length; iterador++) { // Empieza en 1 para saltar el encabezado
        var tdNombre = tr[iterador].getElementsByTagName("td")[0]; // Ahora buscamos solo en la columna "nombre"

        if (tdNombre) {
            // Filtramos solo por nombre
            if (tdNombre.textContent.toUpperCase().indexOf(inputNombre) > -1) {
                tr[iterador].style.display = "";
            } else {
                tr[iterador].style.display = "none";
            }
        }
    }
}

// Llamamos a la función para llenar la tabla al cargar la página
document.addEventListener("DOMContentLoaded", llenarTabla);
// Agregar eventos de búsqueda en tiempo real
document.getElementById("inputBuscarNombre").addEventListener("input", buscarTabla);