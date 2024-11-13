let datosPDF = []; // Array global para manejo de PDFs

/**
 * Función que trae PDFs desde PHP
 *
 * El archivo PHP va contra la base de datos y nos devuelve
 * un listado en formato JSON
 *
 */
async function traerPDF() {
    const response = await fetch('listar-pdfs.php', {
        method: 'GET'
    });
    const res = await response.json();
    return res;
}

/**
 * Llama a la función de traer datos de forma asincrona
 *
 * Esta función nos permite llamar a traer datos, y cuando
 * los datos llegan, operamos con los mismos
 *
 */
traerPDF().then(dato => {
    for (let i = 0; i < dato.length; i++) {
        filaNueva(dato[i], i);
    }
    datosPDF = dato;
    renderTable(datosPDF);
});

/**
 * Agrega fila al listado
 *
 * Recibe los datos del PDF en formato array y arma una nueva fila para la tabla
 * preexistente en HTML. La tabla en el HTML debe tener el id "tablaPDF"
 *
 * @param array infoPDF
 * @param integer pos Posicion en el array
 */
function filaNueva(infoPDF, pos) {
    let fileName = infoPDF.rutaPDF.split('/').pop(); // Extraer solo el nombre del archivo
    
    // Si estamos en modo búsqueda y hay un término de búsqueda
    if ($('#searchInput').val()) {
        // Aplicar el resaltado solo al nombre del archivo mostrado, no a la ruta completa
        fileName = highlightMatch(fileName, $('#searchInput').val().toLowerCase());
    }
    
    const fila = `<tr id="${pos}">
                    <td id='txtId${pos}' class='pl-4'>${infoPDF.id}</td>
                    <td id='txtRuta${pos}'><a href='${infoPDF.rutaPDF}' target='_blank'>${fileName}</a></td>
                    <td class='text-center'>
                        <button type='button' class='btn btn-danger' onclick='mostrarModalBaja(${pos})'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                                <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                            </svg>
                        </button>
                    </td>
                </tr>`;
    $('#tablaPDF tbody').append(fila);
}

function filtrarPDFs() {
    const limit = parseInt($('#limitSelect').val(), 10);
    const searchTerm = $('#searchInput').val().toLowerCase();
    const searchTermNoAccents = removeAccents(searchTerm);
    $('#tablaPDF tbody').empty();
  
    let count = 0;
    datosPDF.forEach((pdf, index) => {
        if (count >= limit) return;
        
        const fileName = pdf.rutaPDF.split('/').pop().toLowerCase();
        const fileNameNoAccents = removeAccents(fileName);

        if (fileName.includes(searchTerm) || fileNameNoAccents.includes(searchTermNoAccents)) {
            filaNueva(pdf, index);
            count++;
        }
    });
}

function mostrarModalBaja(pos) {
  $('#modalBaja').modal('show');
  $('#bajaId').val(datosPDF[pos].id);
}

function confirmarBaja(event) {
  event.preventDefault();
  const id = $('#bajaId').val();

  $.ajax({
      url: 'baja-material.php',
      method: 'POST',
      data: { id: id },
      success: function (respuesta) {
          console.log(respuesta);

          $('#modalBaja').modal('hide');

          const pos = datosPDF.findIndex(
              pdf => pdf.id === parseInt(id)
          );
          if (pos !== -1) {
              $('#' + pos).remove();
              datosPDF.splice(pos, 1);
          }
          location.reload();
      },
      error: function (respuesta) {
          console.log(respuesta);
          alert('Error al eliminar el PDF');
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

$('#searchInput').on('input', filtrarPDFs);
$('#limitSelect').on('change', filtrarPDFs);

$(document).ready(filtrarPDFs)

/**************************************** REVISAR/ARREGLAR ****************************************/ 
let currentPage = 1
let rowsPerPage = parseInt($('#limitSelect').val(), 10) || 5
let totalRows = 0
let totalPages = 0

function renderTable (data) {
  $('#tablaPDF tbody').empty()
  const start = (currentPage - 1) * rowsPerPage
  const end = start + rowsPerPage
  const paginatedData = data.slice(start, end)

  paginatedData.forEach((pdf, index) => {
    filaNueva(pdf, start + index)
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
  renderTable(datosPDF)
})

$('.pagination').on('click', 'a', function (e) {
  e.preventDefault()
  const pageText = $(this).text()

  if (pageText === 'Anterior' && currentPage > 1) {
    currentPage--
  } else if (pageText === 'Siguiente' && currentPage < totalPages) {
    currentPage++
  }

  renderTable(datosPDF)
})

$(document).ready(function () {
  traerPDF().then(dato => {
    datosPDF = dato
    renderTable(datosPDF)
  })
})

function refreshPage () {
  document.getElementById('searchInput').value = '';
  document.getElementById('limitSelect').value = '5';

  const url = new URL(window.location);
  url.searchParams.delete('search');
  window.history.replaceState({}, document.title, url);

  filtrarPDFs();
}
// Añadir el evento de envío del formulario
document.getElementById('formAltaMaterial').addEventListener('submit', function(event) {
  event.preventDefault();
  const formData = new FormData(this);

  fetch('subirMaterial.php', {
      method: 'POST',
      body: formData
  })
  .then(response => response.json())
  .then(data => {
      if (data.success) {
          location.reload(); // Refrescar la página
      }
  })
  .catch(error => console.error('Error:', error));
});