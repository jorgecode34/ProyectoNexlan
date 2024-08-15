<?php

/*************************************************************************************************************************************/

/* Este archivo se encarga de procesar los datos enviados del formulario de alta vehiculo con post */

/*************************************************************************************************************************************/

    require_once 'Controlador.php';
    $controlador = new Controlador();
    $resultado = $controlador->modificarVehiculo($_POST['ID_Vehiculos'], $_POST['Matricula'], $_POST['tipoId'], $_POST['Modelo'], $_POST['Marca'], $_POST['AnioFabricacion'], $_POST['Color'], $_POST['Precio']);

    header('Location: vehiculo.php');
?>
