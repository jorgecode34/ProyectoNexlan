<?php
function renderizarTablaEstudiantes($estudiantes) {

    if (empty($estudiantes)) {
        echo "<br> No existen estudiantes que coincidan con la búsqueda.";
        return;
    }

    echo "<div id='tabla-estudiantes' class='table-responsive shadow'>";
<<<<<<< HEAD
    echo "<table class='table'>";
=======
    echo "<table class='table table-striped table-hover'>";
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
    echo renderizarEncabezadoTabla();
    echo renderizarCuerpoTabla($estudiantes);
    echo "</table></div>";
}




function renderizarEncabezadoTabla() {
<<<<<<< HEAD
    $encabezados = ['ID', 'Documento', 'Primer Nombre', 'Segundo Nombre', 'Primer Apellido', 'Segundo Apellido', 
                    'Calle', 'Número Puerta', 'Barrio', 'Localidad', 'Teléfono', 'Email', 'Contraseña', 'Teórico', 'Eliminar', 'Modificar'];
   
    $html = "<thead class='table-light'><tr>";
=======
    $encabezados = ['ID Estudiante', 'ID Usuario', 'Documento', 'Primer Nombre', 'Segundo Nombre', 'Primer Apellido', 'Segundo Apellido', 
                    'Calle', 'Número Puerta', 'Barrio', 'Localidad', 'Teléfono', 'Teórico', 'Email', 'Contraseña', 'Eliminar', 'Modificar'];
   
    $html = "<thead><tr>";
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
    foreach ($encabezados as $encabezado) {
        $html .= "<th>$encabezado</th>";
    }
    $html .= "</tr></thead>";
    return $html;
}



<<<<<<< HEAD

function renderizarCuerpoTabla($estudiantes) {

    $html = "<tbody>";
=======
function renderizarCuerpoTabla($estudiantes) {

    $html = "<tbody class='table-group-divider'>";
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258

    foreach ($estudiantes as $estudiante) {
        $html .= "<tr>";

        foreach ($estudiante as $key => $value) {
            if ($key !== 'activo') { // Excluye el atributo activo
                $html .= "<td>$value</td>";
            }
        }

        $html .= renderizarBotones($estudiante['documento']);
        $html .= "</tr>";
    }

    $html .= "</tbody>";
    return $html;
}




function renderizarBotones($documento) {
    
    $botonEliminar = "<td class='text-center'>
<<<<<<< HEAD
        <form action='baja-estudiante.php' method='post'>
            <input type='hidden' name='documento' value='$documento' /> 
            <button type='submit' class='btn btn-danger'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                    <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                </svg>
            </button>
        </form>
    </td>";
=======
            <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#modalBaja$documento'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                    <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                </svg>
            </button>
        </td>";
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258

    $botonModificar = "<td class='text-center'>
        <button type='button' data-bs-toggle='modal' data-bs-target='#modalModificar$documento' class='btn btn-warning'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='white' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
            </svg>
        </button>
    </td>";

    return $botonEliminar . $botonModificar;
}