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