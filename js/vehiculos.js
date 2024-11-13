let datosVehiculos = [] // Array global para manejo de vehículos

/**
 *Función que trae vehículos desde PHP
 *
 *El archivo PHP va contra la base de datos y nos devuelve
 * un listado en formato JSON
 *
 */
async function traerVehiculos () {
  const response = await fetch('traerVehiculos.php', {
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
traerVehiculos().then(dato => {
  for (let i = 0; i < dato.length; i++) {
    filaNueva(dato[i], i)
  }
  datosVehiculos = dato
})

/**
 * Agrega fila al listado
 *
 * Recibe los datos del vehículo en formato array y arma una nueva fila para la tabla
 * preexistente en HTML. La tabla en el HTML debe tener el id "tablaVehiculos"
 *
 *
 * @param array infoVehiculo
 * @param integer pos Posicion en el array
 */
function filaNueva (infoVehiculo, pos) {
  const fila = `<tr id="${pos}">
                  <td id='txtId${pos}' class='pl-4'>${infoVehiculo.ID_Vehiculos}</td>
                  <td id='txtMatricula${pos}'>${infoVehiculo.Matricula}</td>
                  <td id='txtTipoId${pos}'>${infoVehiculo.tipoId}</td>
                  <td id='txtModelo${pos}'>${infoVehiculo.Modelo}</td>
                  <td id='txtMarca${pos}'>${infoVehiculo.Marca}</td>
                  <td id='txtAnioFabricacion${pos}'>${infoVehiculo.AnioFabricacion}</td>
                  <td id='txtColor${pos}'>${infoVehiculo.Color}</td>
                  <td id='txtPrecio${pos}'>${infoVehiculo.Precio}</td>
                  <td id='txtEstado${pos}'>${infoVehiculo.Estado}</td>
                  <td id='txtKilometraje${pos}'>${infoVehiculo.kilometraje}</td>
                  <td class='text-center'>
                      <button type='button' onclick='mostrarModal(${pos})' class='btn btn-warning'>
                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='white' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                              <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                              <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                          </svg>
                      </button>
                  </td>
                  <td class='text-center'>
                        <button type='button' class='btn btn-danger' onclick='mostrarModalBaja(${pos})'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                                <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                            </svg>
                        </button>
                    </td>
                </tr>`
  $('#tablaVehiculos').append(fila)
}

/**
 * Guardar modificaciones en vehículo
 *
 * Realiza las modificaciones del vehículo tanto graficamente como
 * en presistencia.
 *
 * @param integer pos Posicion en el array e id de fila
 */
function guardarCambios (pos) {
  $.ajax({
    url: 'modificar-vehiculo.php',
    method: 'POST',
    data: {
      ID_Vehiculos: datosVehiculos[pos].ID_Vehiculos,
      Matricula: $('#txtMatricula').val(),
      tipoId: $('#txtTipoId').val(),
      Modelo: $('#txtModelo').val(),
      Marca: $('#txtMarca').val(),
      AnioFabricacion: $('#txtAnioFabricacion').val(),
      Color: $('#txtColor').val(),
      Precio: $('#txtPrecio').val(),
      Estado: $('#txtEstado').val(),
      kilometraje: $('#txtKilometraje').val()
    },
    success: function (respuesta) {
      console.log(respuesta)
    },
    error: function (respuesta) {
      console.log(respuesta)
    }
  })

  $('#txtMatricula' + pos).html($('#txtMatricula').val())
  $('#txtTipoId' + pos).html($('#txtTipoId').val())
  $('#txtModelo' + pos).html($('#txtModelo').val())
  $('#txtMarca' + pos).html($('#txtMarca').val())
  $('#txtAnioFabricacion' + pos).html($('#txtAnioFabricacion').val())
  $('#txtColor' + pos).html($('#txtColor').val())
  $('#txtPrecio' + pos).html($('#txtPrecio').val())
  $('#txtEstado' + pos).html($('#txtEstado').val())
  $('#txtKilometraje' + pos).html($('#txtKilometraje').val())

  datosVehiculos[pos].Matricula = $('#txtMatricula').val()
  datosVehiculos[pos].tipoId = $('#txtTipoId').val()
  datosVehiculos[pos].Modelo = $('#txtModelo').val()
  datosVehiculos[pos].Marca = $('#txtMarca').val()
  datosVehiculos[pos].AnioFabricacion = $('#txtAnioFabricacion').val()
  datosVehiculos[pos].Color = $('#txtColor').val()
  datosVehiculos[pos].Precio = $('#txtPrecio').val()
  datosVehiculos[pos].Estado = $('#txtEstado').val()
  datosVehiculos[pos].kilometraje = $('#txtKilometraje').val()

  cerrarModal()
}

/*##############   MODAL  ############## */

function mostrarModal (pos) {
  $('#modifModal').modal('show')
  $('#txtMatricula').val(datosVehiculos[pos].Matricula)
  $('#txtTipoId').val(datosVehiculos[pos].tipoId)
  $('#txtModelo').val(datosVehiculos[pos].Modelo)
  $('#txtMarca').val(datosVehiculos[pos].Marca)
  $('#txtAnioFabricacion').val(datosVehiculos[pos].AnioFabricacion)
  $('#txtColor').val(datosVehiculos[pos].Color)
  $('#txtPrecio').val(datosVehiculos[pos].Precio)
  $('#txtEstado').val(datosVehiculos[pos].Estado)
  $('#txtKilometraje').val(datosVehiculos[pos].kilometraje)
  $('#btnGuardar')
    .off('click')
    .on('click', function () {
      guardarCambios(pos)
    })
}

function mostrarModalBaja (pos) {
  $('#modalBaja').modal('show')
  $('#bajaMatricula').val(datosVehiculos[pos].Matricula)
}

function confirmarBaja (event) {
  event.preventDefault()
  const Matricula = $('#bajaMatricula').val()

  $.ajax({
    url: 'baja-vehiculo.php',
    method: 'POST',
    data: { Matricula: Matricula },
    success: function (respuesta) {
      console.log(respuesta)

      $('#modalBaja').modal('hide')

      const pos = datosVehiculos.findIndex(
        vehiculo => vehiculo.Matricula === Matricula
      )
      if (pos !== -1) {
        $('#' + pos).remove()
        datosVehiculos.splice(pos, 1)
      }
    },
    error: function (respuesta) {
      console.log(respuesta)
    }
  })
}
/*****************************************************************************************/


/**************************************** REVISAR/ARREGLAR ****************************************/ 
function filtrarVehiculos () {
  const limit = parseInt($('#limitSelect').val(), 10)
  const searchTerm = $('#searchInput').val().toLowerCase()
  $('#tablaVehiculos tbody').empty()

  let count = 0
  datosVehiculos.forEach((vehiculo, index) => {
    if (count >= limit) return

    const {
      ID_Vehiculos,
      Matricula,
      Modelo,
      Marca,
      Color,
      Estado
    } = vehiculo

    const nombreCompleto = `${ID_Vehiculos} - ${Marca.toLowerCase()} ${Modelo.toLowerCase()}`

    if (
      Matricula.toLowerCase().includes(searchTerm) ||
      Modelo.toLowerCase().includes(searchTerm) ||
      Marca.toLowerCase().includes(searchTerm) ||
      Color.toLowerCase().includes(searchTerm) ||
      Estado.toLowerCase().includes(searchTerm) ||
      nombreCompleto.includes(searchTerm)
    ) {
        const highlightedVehiculo = {
            ...vehiculo,
            Matricula: highlightMatch(Matricula, searchTerm),
            Modelo: highlightMatch(Modelo, searchTerm),
            Marca: highlightMatch(Marca, searchTerm),
            Estado: highlightMatch(Estado, searchTerm),
            }  
      filaNueva(highlightedVehiculo, index)
      count++
    }
  })
}

function highlightMatch(text, searchTerm) {
    const regex = new RegExp(`(${searchTerm})`, 'gi')
    return text.replace(regex, '<span class="highlight">$1</span>')
}
$('#searchInput').on('input', filtrarVehiculos)
$('#limitSelect').on('change', filtrarVehiculos)


$(document).ready(filtrarVehiculos)






/**************************************** REVISAR/ARREGLAR ****************************************/ 
let currentPage = 1
let rowsPerPage = parseInt($('#limitSelect').val(), 10) || 5
let totalRows = 0
let totalPages = 0

function renderTable (data) {
  $('#tablaVehiculos tbody').empty()
  const start = (currentPage - 1) * rowsPerPage
  const end = start + rowsPerPage
  const paginatedData = data.slice(start, end)

  paginatedData.forEach((vehiculo, index) => {
    filaNueva(vehiculo, start + index)
  })

  totalRows = data.length
  totalPages = Math.ceil(totalRows / rowsPerPage)
  updatePagination()
}

function updatePagination () {
  $('#prevPage')
    .parent()
    .toggleClass('disabled', currentPage === 1)
  $('#nextPage')
    .parent()
    .toggleClass('disabled', currentPage === totalPages)
}

$('#limitSelect').on('change', function () {
  rowsPerPage = parseInt($(this).val(), 10)
  currentPage = 1
  renderTable(datosVehiculos)
})

$('.pagination').on('click', 'a', function (e) {
  e.preventDefault()
  const pageText = $(this).text()

  if (pageText === 'Anterior' && currentPage > 1) {
    currentPage--
  } else if (pageText === 'Siguiente' && currentPage < totalPages) {
    currentPage++
  }

  renderTable(datosVehiculos)
})

$(document).ready(function () {
  traerVehiculos().then(dato => {
    datosVehiculos = dato
    renderTable(datosVehiculos)

    const searchInput = document.getElementById('searchInput');
    if (searchInput.value) {
      filtrarVehiculos();
    }
  })
})

function refreshPage () {
  document.getElementById('searchInput').value = '';
  document.getElementById('limitSelect').value = '5';

  const url = new URL(window.location);
  url.searchParams.delete('search');
  window.history.replaceState({}, document.title, url);


  filtrarVehiculos();
}
