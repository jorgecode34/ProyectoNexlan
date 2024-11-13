let datosPreguntas = [] // Array global para manejo de preguntas

/**
 *Función que trae preguntas desde PHP
 *
 *El archivo PHP va contra la base de datos y nos devuelve
 * un listado en formato JSON
 *
 */
async function traerPreguntas () {
  const response = await fetch('obtener-preguntas.php', {
    method: 'GET'
  })
  const res = await response.json()
  return res
}

/**
 * Llama a la función de traer datos de forma asincrona
*
* Esta función nos permite llamar a traer datos, y cuando
* los datos llegan, operamos con los mismos
*
*/
traerPreguntas().then(dato => {
  for (let i = 0; i < dato.length; i++) {
    filaNueva(dato[i], i)
  }
  datosPreguntas = dato
  renderTable(datosPreguntas)
})

/**
 * Agrega fila al listado
 *
 * Recibe los datos de la pregunta en formato array y arma una nueva fila para la tabla
 * preexistente en HTML. La tabla en el HTML debe tener el id "tablaPersonas"
 *
 *
 * @param array infoPregunta
 * @param integer pos Posicion en el array
 */
function filaNueva (infoPregunta, pos) {
  const fila = `<tr id="${pos}">
                  <td id='txtId${pos}' class='pl-4'>${infoPregunta.id}</td>
                  <td id='txtPregunta${pos}'>${infoPregunta.texto}</td>
                  <td id='txtopcionA${pos}'>${infoPregunta.opcionA}</td>
                  <td id='txtopcionB${pos}'>${infoPregunta.opcionB}</td>
                  <td id='txtopcionC${pos}'>${infoPregunta.opcionC}</td>
                  <td id='txtopcionD${pos}'>${infoPregunta.opcionD}</td>
                  <td id='txtrespuestaCorrecta${pos}'>${infoPregunta.respuestaCorrecta}</td>
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
  $('#tablaPersonas tbody').append(fila)
}

/**
 * Guardar modificaciones en pregunta
 *
 * Realiza las modificaciones de la pregunta tanto graficamente como
 * en persistencia.
 *
 * @param integer pos Posicion en el array e id de fila
 */
function guardarCambios(pos) {
  $.ajax({
    url: 'modificar-pregunta.php',
    method: 'POST',
    data: {
      id: datosPreguntas[pos].id,
      texto: $('#txtPregunta').val(),
      opcionA: $('#txtOpcionA').val(),
      opcionB: $('#txtOpcionB').val(),
      opcionC: $('#txtOpcionC').val(),
      opcionD: $('#txtOpcionD').val(),
      respuestaCorrecta: $('#txtRespuestaCorrecta').val()
    },
    success: function(respuesta) {
      console.log(respuesta);
      
      // Actualizar los datos en el array
      datosPreguntas[pos].texto = $('#txtPregunta').val();
      datosPreguntas[pos].opcionA = $('#txtOpcionA').val();
      datosPreguntas[pos].opcionB = $('#txtOpcionB').val();
      datosPreguntas[pos].opcionC = $('#txtOpcionC').val();
      datosPreguntas[pos].opcionD = $('#txtOpcionD').val();
      datosPreguntas[pos].respuestaCorrecta = $('#txtRespuestaCorrecta').val();

      // Cerrar el modal
      $('#modifModal').modal('hide');
      
      // Volver a renderizar la tabla para mostrar los cambios
      renderTable(datosPreguntas);
    },
    error: function(respuesta) {
      console.log(respuesta);
      alert('Error al guardar los cambios');
    }
  });
}

// Función para mostrar el modal de edición
function mostrarModal(pos) {
    $('#modifModal').modal('show');
    $('#txtId').val(pos);
    $('#txtPregunta').val(datosPreguntas[pos].texto);
    $('#txtOpcionA').val(datosPreguntas[pos].opcionA);
    $('#txtOpcionB').val(datosPreguntas[pos].opcionB);
    $('#txtOpcionC').val(datosPreguntas[pos].opcionC);
    $('#txtOpcionD').val(datosPreguntas[pos].opcionD);
    $('#txtRespuestaCorrecta').val(datosPreguntas[pos].respuestaCorrecta);
    
    $('#btnGuardar')
        .off('click')
        .on('click', function() {
            guardarCambios(pos);
        });
}

function mostrarModalBaja(pos) {
  $('#modalBaja').modal('show');
  $('#bajaId').val(datosPreguntas[pos].id);
}

function mostrarModalBaja(pos) {
  $('#modalBaja').modal('show');
  $('#bajaId').val(datosPreguntas[pos].id);
}

function confirmarBaja(event) {
  event.preventDefault();
  const id = $('#bajaId').val();

  $.ajax({
    url: 'baja-pregunta.php',
    method: 'POST',
    data: { id: id },
    success: function (respuesta) {
      console.log(respuesta);

      $('#modalBaja').modal('hide');

      const pos = datosPreguntas.findIndex(
        pregunta => pregunta.id === parseInt(id)
      );
      if (pos !== -1) {
        $('#' + pos).remove();
        datosPreguntas.splice(pos, 1);
      }
      location.reload();
    },
    error: function (respuesta) {
      console.log(respuesta);
      alert('Error al eliminar la pregunta');
    }
  });
}
/*****************************************************************************************/


/**************************************** REVISAR/ARREGLAR ****************************************/ 
function filtrarPreguntas() {
    const limit = parseInt($('#limitSelect').val(), 10);
    const searchTerm = $('#searchInput').val().toLowerCase();
    const searchTermNoAccents = removeAccents(searchTerm);
    $('#tablaPersonas tbody').empty();
  
    let count = 0;
    datosPreguntas.forEach((pregunta, index) => {
      if (count >= limit) return;
  
      const { texto, opcionA, opcionB, opcionC, opcionD, respuestaCorrecta } = pregunta;
      const textoNoAccents = removeAccents(texto.toLowerCase());
      const opcionANoAccents = removeAccents(opcionA.toLowerCase());
      const opcionBNoAccents = removeAccents(opcionB.toLowerCase());
      const opcionCNoAccents = removeAccents(opcionC.toLowerCase());
      const opcionDNoAccents = removeAccents(opcionD.toLowerCase());
      const respuestaCorrectaNoAccents = removeAccents(respuestaCorrecta.toLowerCase());

      if (
        texto.toLowerCase().includes(searchTerm) || textoNoAccents.includes(searchTermNoAccents) ||
        opcionA.toLowerCase().includes(searchTerm) || opcionANoAccents.includes(searchTermNoAccents) ||
        opcionB.toLowerCase().includes(searchTerm) || opcionBNoAccents.includes(searchTermNoAccents) ||
        opcionC.toLowerCase().includes(searchTerm) || opcionCNoAccents.includes(searchTermNoAccents) ||
        opcionD.toLowerCase().includes(searchTerm) || opcionDNoAccents.includes(searchTermNoAccents) ||
        respuestaCorrecta.toLowerCase().includes(searchTerm) || respuestaCorrectaNoAccents.includes(searchTermNoAccents)
      ) {
        
        const highlightedPregunta = {
          ...pregunta,
          texto: highlightMatch(texto, searchTerm),
          opcionA: highlightMatch(opcionA, searchTerm),
          opcionB: highlightMatch(opcionB, searchTerm),
          opcionC: highlightMatch(opcionC, searchTerm),
          opcionD: highlightMatch(opcionD, searchTerm),
          respuestaCorrecta: highlightMatch(respuestaCorrecta, searchTerm)
        }
    
        filaNueva(highlightedPregunta, index);
        count++;
      }
    });
}

function highlightMatch(text, searchTerm) {
  const searchTermNoAccents = removeAccents(searchTerm);
  const regex = new RegExp(`(${searchTerm}|${searchTermNoAccents})`, 'gi');
  return text.replace(regex, '<span class="highlight">$1</span>');
}

function removeAccents(str) {
  return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
}



$('#searchInput').on('input', filtrarPreguntas);
$('#limitSelect').on('change', filtrarPreguntas);

$(document).ready(filtrarPreguntas)


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

  paginatedData.forEach((pregunta, index) => {
    filaNueva(pregunta, start + index)
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
  renderTable(datosPreguntas)
})

$('.pagination').on('click', 'a', function (e) {
  e.preventDefault()
  const pageText = $(this).text()

  if (pageText === 'Anterior' && currentPage > 1) {
    currentPage--
  } else if (pageText === 'Siguiente' && currentPage < totalPages) {
    currentPage++
  }

  renderTable(datosPreguntas)
})

$(document).ready(function () {
  traerPreguntas().then(dato => {
    datosPreguntas = dato
    renderTable(datosPreguntas)
  })
})

function refreshPage () {
  document.getElementById('searchInput').value = '';
  document.getElementById('limitSelect').value = '5';

  const url = new URL(window.location);
  url.searchParams.delete('search');
  window.history.replaceState({}, document.title, url);

  filtrarPreguntas();
}