let datosHistorial = [] // Array global para manejo del historial
let currentPage = 1
let rowsPerPage = parseInt($('#limitSelect').val(), 10) || 5
let totalRows = 0
let totalPages = 0

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
  console.log('Datos recibidos del servidor:', dato); // Para debugging
  datosHistorial = dato
  renderTable(datosHistorial)
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
function filaHistorialNueva(infoHistorial, pos) {
  console.log('Creando fila con datos:', infoHistorial); // Para debugging
  const fila = `<tr id="${pos}">
                  <td id='txtFecha${pos}'>${infoHistorial.start}</td>
                  <td id='txtHora${pos}'>${infoHistorial.time}</td>
                  <td id='txtTipo${pos}'>${infoHistorial.tipo}</td>
                  <td id='txtNombreEstudiante${pos}'>${infoHistorial.primerNombre}</td>
                  <td id='txtApellidoEstudiante${pos}'>${infoHistorial.primerApellido}</td>
                  <td id='txtTelEstudiante${pos}'>${infoHistorial.tel}</td>
                  <td id='txtNombre${pos}'>${infoHistorial.title}</td>
                  <td id='txtNota${pos}'>${infoHistorial.Nota}</td>
                  <td id='txtNotaDescripcion${pos}'>${infoHistorial.notaDescripcion}</td>
                  <td class='text-center'>
                      <button type='button' onclick='mostrarModal(${infoHistorial.id})' class='btn btn-warning'>
                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='white' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                              <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                              <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                          </svg>
                      </button>
                  </td>
              </tr>`;
  $('#tablaHistorialClases').append(fila);
}

/**
 * Filtra y renderiza la tabla según la selección del filtro
 */
function filtrarHistorial() {
  const filtro = $('#filtroClases').val();
  const searchDate = $('#searchDate').val(); 
  const currentDate = new Date().toISOString().split('T')[0];

  let datosFiltrados = datosHistorial;

  if (filtro === 'pasadas') {
    datosFiltrados = datosHistorial.filter(clase => clase.start < currentDate);
  } else if (filtro === 'proximas') {
    datosFiltrados = datosHistorial.filter(clase => clase.start >= currentDate);
  }

  if (searchDate) {
    datosFiltrados = datosFiltrados.filter(clase => clase.start === searchDate);
  }

  renderTable(datosFiltrados);
}





function renderTable (data) {
  $('#tablaHistorialClases tbody').empty()
  const start = (currentPage - 1) * rowsPerPage
  const end = start + rowsPerPage
  const paginatedData = data.slice(start, end)

  paginatedData.forEach((clase, index) => {
    filaHistorialNueva(clase, start + index)
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

$('#searchDate').on('change', filtrarHistorial); 
$('#filtroClases').on('change', filtrarHistorial);
$('#limitSelect').on('change', function () {
  rowsPerPage = parseInt($(this).val(), 10);
  currentPage = 1;
  filtrarHistorial();
});

$('.pagination').on('click', 'a', function (e) {
  const pageText = $(this).text();

  if (pageText === 'Anterior' && currentPage > 1) {
    currentPage--;
  } else if (pageText === 'Siguiente' && currentPage < totalPages) {
    currentPage++;
  }

  filtrarHistorial();
});




$('#searchInput').on('input', filtrarHistorial)
$('#filtroClases').on('change', filtrarHistorial)







/*##############   MODAL  ############## */

function mostrarModal(id) {
  console.log('Abriendo modal para ID:', id);
  const clase = datosHistorial.find(clase => clase.id == id);
  if (!clase) {
      return;
  }
  
  console.log('Datos de la clase:', clase);
  
  $('#modifModal').modal('show');
  $('#txtId').val(clase.id);
  $('#txtNota').val(clase.Nota);
  $('#txtNotaDescripcion').val(clase.notaDescripcion);
  
  $('#btnGuardar').off('click').on('click', function(e) {
      guardarCambios(id);
  });
}


function guardarCambios(id) {
  const datos = {
      id: $('#txtId').val(),
      Nota: $('#txtNota').val(),
      notaDescripcion: $('#txtNotaDescripcion').val()
  };
  
  console.log('Enviando datos:', datos);
  
  if (!datos.id) {
      return;
  }
  
  $.ajax({
      url: 'modificar-historial.php',
      method: 'POST',
      data: datos,
      dataType: 'json',
      success: function(respuesta) {
          console.log('Respuesta del servidor:', respuesta);
          
          if (respuesta.success) {
              // Actualizar la tabla
              const pos = datosHistorial.findIndex(clase => clase.id === id);
              if (pos !== -1) {
                  $(`#txtNota${pos}`).text(datos.Nota);
                  $(`#txtNotaDescripcion${pos}`).text(datos.notaDescripcion);
                  
                  datosHistorial[pos].Nota = datos.Nota;
                  datosHistorial[pos].notaDescripcion = datos.notaDescripcion;
              }
              
              $('#modifModal').modal('hide');
          } else {
              console.error('Error en la respuesta:', respuesta.error);
          }
      },
      error: function(xhr, status, error) {
          console.error('Error en la petición AJAX:', {
              status: status,
              error: error,
              response: xhr.responseText
          });
      }
  });
}


function refreshPage () {
  document.getElementById('searchDate').value = '';
  document.getElementById('limitSelect').value = '5';
  document.getElementById('filtroClases').value = 'todas';

  rowsPerPage = 5;
  currentPage = 1;
  filtrarHistorial();
}