let datosUsuarios = [] // Array global para manejo de instructores

/**
 *Función que trae usuarios desde PHP
 *
 *El archivo PHP va contra la base de datos y nos devuelve
 * un listado en formato JSON
 *
 */
async function traerUsuarios () {
  const response = await fetch('traerInstructores.php', {
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
traerUsuarios().then(dato => {
  for (let i = 0; i < dato.length; i++) {
    filaNueva(dato[i], i)
  }
  datosUsuarios = dato
})

/**
 * Agrega fila al listado
 *
 * Recibe los datos de la persona e  fotrmato array y arma una nueva fila para la tabla
 * preexistente en HTML. La tabla en el HTML debe tener el id "tablaPersonas"
 *
 *
 * @param array infoPersona
 * @param integer pos Posicion en el array
 */
function filaNueva (infoPersona, pos) {
  const fila = `<tr id="${pos}">
                  <td id='txtId${pos}' class='pl-4'>${infoPersona.IDInstructor}</td>
                  <td id='txtUsuarioID${pos}'>${infoPersona.usuario_id}</td>
                  <td id='txtDocumento${pos}'>${infoPersona.documento}</td>
                  <td id='txtPrimerNombre${pos}'>${infoPersona.primerNombre}</td>
                  <td id='txtSegundoNombre${pos}'>${infoPersona.segundoNombre}</td>
                  <td id='txtPrimerApellido${pos}'>${infoPersona.primerApellido}</td>
                  <td id='txtSegundoApellido${pos}'>${infoPersona.segundoApellido}</td>
                  <td id='txtCalle${pos}'>${infoPersona.calle}</td>
                  <td id='txtNumeroPuerta${pos}'>${infoPersona.numeroPuerta}</td>
                  <td id='txtBarrio${pos}'>${infoPersona.barrio}</td>
                  <td id='txtLocalidad${pos}'>${infoPersona.localidad}</td>
                  <td id='txtTel${pos}'>${infoPersona.tel}</td>
                  <td id='txtHorasDictadas${pos}'>${infoPersona.horasDictadas}</td>
                  <td id='txtEmail${pos}'>${infoPersona.email}</td>
                  <td id='txtPass${pos}'>${infoPersona.pass}</td>
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
  $('#tablaPersonas').append(fila)
}

/**
 * Guardar modificaciones en usuario
 *
 * Realiza las modificaciones del usuarios tanto graficamente como
 * en presistencia.
 *
 * @param integer pos Posicion en el array e id de fila
 */
function guardarCambios (pos) {
  $.ajax({
    url: 'modificar-instructor.php',
    method: 'POST',
    data: {
      IDInstructor: datosUsuarios[pos].IDInstructor,
      documento: datosUsuarios[pos].documento,
      primerNombre: $('#txtPrimerNombre').val(),
      segundoNombre: $('#txtSegundoNombre').val(),
      primerApellido: $('#txtPrimerApellido').val(),
      segundoApellido: $('#txtSegundoApellido').val(),
      calle: $('#txtCalle').val(),
      numeroPuerta: $('#txtNumeroPuerta').val(),
      barrio: $('#txtBarrio').val(),
      localidad: $('#txtLocalidad').val(),
      tel: $('#txtTel').val(),
      horasDictadas: $('#txtHorasDictadas').val(),
      email: $('#txtEmail').val(),
      pass: $('#txtPass').val()
    },
    success: function (respuesta) {
      console.log(respuesta)
    },
    error: function (respuesta) {
      console.log(respuesta)
    }
  })

  $('#txtPrimerNombre' + pos).html($('#txtPrimerNombre').val())
  $('#txtSegundoNombre' + pos).html($('#txtSegundoNombre').val())
  $('#txtPrimerApellido' + pos).html($('#txtPrimerApellido').val())
  $('#txtSegundoApellido' + pos).html($('#txtSegundoApellido').val())
  $('#txtCalle' + pos).html($('#txtCalle').val())
  $('#txtNumeroPuerta' + pos).html($('#txtNumeroPuerta').val())
  $('#txtBarrio' + pos).html($('#txtBarrio').val())
  $('#txtLocalidad' + pos).html($('#txtLocalidad').val())
  $('#txtTel' + pos).html($('#txtTel').val())
  $('#txtHorasDictadas' + pos).html($('#txtHorasDictadas').val())
  $('#txtEmail' + pos).html($('#txtEmail').val())
  $('#txtPass' + pos).html($('#txtPass').val())

  datosUsuarios[pos].primerNombre = $('#txtPrimerNombre').val()
  datosUsuarios[pos].segundoNombre = $('#txtSegundoNombre').val()
  datosUsuarios[pos].primerApellido = $('#txtPrimerApellido').val()
  datosUsuarios[pos].segundoApellido = $('#txtSegundoApellido').val()
  datosUsuarios[pos].calle = $('#txtCalle').val()
  datosUsuarios[pos].numeroPuerta = $('#txtNumeroPuerta').val()
  datosUsuarios[pos].barrio = $('#txtBarrio').val()
  datosUsuarios[pos].localidad = $('#txtLocalidad').val()
  datosUsuarios[pos].tel = $('#txtTel').val()
  datosUsuarios[pos].horasDictadas = $('#txtHorasDictadas').val()
  datosUsuarios[pos].email = $('#txtEmail').val()
  datosUsuarios[pos].pass = $('#txtPass').val()

  cerrarModal()
}

/*##############   MODAL  ############## */

function mostrarModal (pos) {
  $('#modifModal').modal('show')
  $('#txtPrimerNombre').val(datosUsuarios[pos].primerNombre)
  $('#txtSegundoNombre').val(datosUsuarios[pos].segundoNombre)
  $('#txtPrimerApellido').val(datosUsuarios[pos].primerApellido)
  $('#txtSegundoApellido').val(datosUsuarios[pos].segundoApellido)
  $('#txtCalle').val(datosUsuarios[pos].calle)
  $('#txtNumeroPuerta').val(datosUsuarios[pos].numeroPuerta)
  $('#txtBarrio').val(datosUsuarios[pos].barrio)
  $('#txtLocalidad').val(datosUsuarios[pos].localidad)
  $('#txtTel').val(datosUsuarios[pos].tel)
  $('#txtHorasDictadas').val(datosUsuarios[pos].horasDictadas)
  $('#txtEmail').val(datosUsuarios[pos].email)
  $('#txtPass').val(datosUsuarios[pos].pass)
  $('#btnGuardar')
    .off('click')
    .on('click', function () {
      guardarCambios(pos)
    })
}

function mostrarModalBaja (pos) {
  $('#modalBaja').modal('show')
  $('#bajaDocumento').val(datosUsuarios[pos].documento)
}

function confirmarBaja (event) {
  event.preventDefault()
  const documento = $('#bajaDocumento').val()

  $.ajax({
    url: 'baja-instructor.php',
    method: 'POST',
    data: { documento: documento },
    success: function (respuesta) {
      console.log(respuesta)

      $('#modalBaja').modal('hide')

      const pos = datosUsuarios.findIndex(
        instructor => instructor.documento === documento
      )
      if (pos !== -1) {
        $('#' + pos).remove()
        datosUsuarios.splice(pos, 1)
      }
    },
    error: function (respuesta) {
      console.log(respuesta)
    }
  })
}
/*****************************************************************************************/


/**************************************** REVISAR/ARREGLAR ****************************************/ 
function filtrarInstructores () {
  const limit = parseInt($('#limitSelect').val(), 10)
  const searchTerm = $('#searchInput').val().toLowerCase()
  $('#tablaPersonas tbody').empty()

  let count = 0
  datosUsuarios.forEach((instructor, index) => {
    if (count >= limit) return

    const {
      usuario_id,
      documento,
      primerNombre,
      segundoNombre,
      primerApellido,
      segundoApellido,
      email
    } = instructor

    const nombreCompleto = `${usuario_id} - ${primerNombre.toLowerCase()} ${primerApellido.toLowerCase()}`;


    if (
      documento.toLowerCase().includes(searchTerm) ||
      primerNombre.toLowerCase().includes(searchTerm) ||
      segundoNombre.toLowerCase().includes(searchTerm) ||
      primerApellido.toLowerCase().includes(searchTerm) ||
      segundoApellido.toLowerCase().includes(searchTerm) ||
      email.toLowerCase().includes(searchTerm) ||
      nombreCompleto.includes(searchTerm)
    ) {
      const highlightedInstructor = {
        ...instructor,
        documento: highlightMatch(documento, searchTerm),
        primerNombre: highlightMatch(primerNombre, searchTerm),
        segundoNombre: highlightMatch(segundoNombre, searchTerm),
        primerApellido: highlightMatch(primerApellido, searchTerm),
        segundoApellido: highlightMatch(segundoApellido, searchTerm),
        email: highlightMatch(email, searchTerm),
      }

      filaNueva(highlightedInstructor, index)
      count++
    }
  })
}

function highlightMatch(text, searchTerm) {
  const regex = new RegExp(`(${searchTerm})`, 'gi')
  return text.replace(regex, '<span class="highlight">$1</span>')
}

$('#searchInput').on('input', filtrarInstructores)
$('#limitSelect').on('change', filtrarInstructores)

$(document).ready(filtrarInstructores)


/**************************************** REVISAR/ARREGLAR ****************************************/ 
let currentPage = 1
let rowsPerPage = parseInt($('#limitSelect').val(), 10) || 5
let totalRows = 0
let totalPages = 0

function renderTable (data) {
  $('#tablaPersonas tbody').empty()
  const start = (currentPage - 1) * rowsPerPage
  const end = start + rowsPerPage
  const paginatedData = data.slice(start, end)

  paginatedData.forEach((instructor, index) => {
    filaNueva(instructor, start + index)
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
  renderTable(datosUsuarios)
})

$('.pagination').on('click', 'a', function (e) {
  e.preventDefault()
  const pageText = $(this).text()

  if (pageText === 'Anterior' && currentPage > 1) {
    currentPage--
  } else if (pageText === 'Siguiente' && currentPage < totalPages) {
    currentPage++
  }

  renderTable(datosUsuarios)
})

document.addEventListener('DOMContentLoaded', (event) => {
  traerUsuarios().then(dato => {
    datosUsuarios = dato
    renderTable(datosUsuarios)

    
    const searchInput = document.getElementById('searchInput');
    if (searchInput.value) {
      filtrarInstructores();
    }
  })
})

function refreshPage () {
  document.getElementById('searchInput').value = '';
  document.getElementById('limitSelect').value = '5';

  const url = new URL(window.location);
  url.searchParams.delete('search');
  window.history.replaceState({}, document.title, url);

  filtrarInstructores();
}