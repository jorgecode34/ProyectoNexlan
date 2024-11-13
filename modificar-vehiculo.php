<?php

/*************************************************************************************************************************************/

/* Este archivo se encarga de procesar los datos enviados del formulario de alta vehiculo con post */

/*************************************************************************************************************************************/
session_start();
require_once 'Controlador.php';

try {
    $controlador = new Controlador();
    $resultado = $controlador->modificarVehiculo($_POST['ID_Vehiculos'], $_POST['Matricula'], $_POST['tipoId'], $_POST['Modelo'], $_POST['Marca'], $_POST['AnioFabricacion'], $_POST['Color'], $_POST['Precio'], $_POST['Estado'], $_POST['kilometraje']);
    
    if ($resultado) {
        $_SESSION['status'] = 'success';
        $_SESSION['operation'] = 'modificar';
        $_SESSION['matricula_vehiculo'] = $_POST['Matricula'];
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['operation'] = 'modificar';
        $_SESSION['error_message'] = 'Error al modificar el vehículo. Por favor, inténtelo de nuevo.';
    }

} catch (Exception $e) {
    $_SESSION['status'] = 'error';
    $_SESSION['operation'] = 'modificar';
    $_SESSION['error_message'] = 'Error: ' . $e->getMessage();
}
header('Location: vehiculo.php');
exit();