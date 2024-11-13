let datosHistorial = [] // Array global para manejo del historial

/**
 *Función que trae el historial desde PHP
 *
 *El archivo PHP va contra la base de datos y nos devuelve
 * un listado en formato JSON
 *
 */
async function traerHistorial () {
  const response = await fetch('mostrar-historial.php', {
    method: 'GET'
  })
  const res = await response.json()
  return res
}

/**
 * Llama a la función de traer datos de forma asincrona
 *
 * Esta funcióm nos permite llamar a traer datos, y cuando
 * los datos llegan, operamos con los mismos
 *
 */
traerHistorial().then(dato => {
  for (let i = 0; i < dato.length; i++) {
    filaHistorialNueva(dato[i], i)
  }
  datosHistorial = dato
})

/**
 * Agrega fila al listado
 *
 * Recibe los datos del historial en formato array y arma una nueva fila para la tabla
 * preexistente en HTML. La tabla en el HTML debe tener el id "tablaHistorialClases"
 *
 *
 * @param array infoHistorial
 * @param integer pos Posicion en el array
 */
function filaHistorialNueva (infoHistorial, pos) {
  const fila = `<tr id="${pos}">
                  <td id='txtFecha${pos}'>${infoHistorial.start}</td>
                  <td id='txtHora${pos}'>${infoHistorial.time}</td>
                  <td id='txtTipo${pos}'>${infoHistorial.tipo}</td>
                  <td id='txtNombreInstructor${pos}'>${infoHistorial.primerNombre}</td>
                  <td id='txtApellidoInstructor${pos}'>${infoHistorial.primerApellido}</td>
                  <td id='txtTelInstructor${pos}'>${infoHistorial.tel}</td>
                  <td id='txtNombre${pos}'>${infoHistorial.title}</td>
                  <td id='txtNota${pos}'>${infoHistorial.Nota}</td>
                  <td id='txtNotaDescripcion${pos}'>${infoHistorial.notaDescripcion}</td>
                </tr>`
  $('#tablaHistorialClases').append(fila)
}

/**
 * Filtra y renderiza la tabla según la selección del filtro
 */
function filtrarHistorial() {
  const filtro = $('#filtroClases').val()
  const currentDate = new Date().toISOString().split('T')[0]

  let datosFiltrados = datosHistorial

  if (filtro === 'pasadas') {
    datosFiltrados = datosHistorial.filter(clase => clase.start < currentDate)
  } else if (filtro === 'proximas') {
    datosFiltrados = datosHistorial.filter(clase => clase.start >= currentDate)
  }

  $('#tablaHistorialClases tbody').empty()
  datosFiltrados.forEach((clase, index) => {
    filaHistorialNueva(clase, index)
  })
}

$('#filtroClases').on('change', filtrarHistorial)