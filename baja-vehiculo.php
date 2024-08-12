<?php

/*************************************************************************************************************************************/

/* Este archivo se encarga de procesar los datos enviados del formulario de baja con post */

/*************************************************************************************************************************************/


require_once 'Controlador.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Matricula'])) {
    $id = $_POST['Matricula'];
    
    $controlador = new Controlador();
    $controlador->eliminarVehiculo($id);
    
    header('Location: vehiculo.php'); 
} else {
    echo "Error al procesar la solicitud de eliminación.";
}
?>
