<?php

/*************************************************************************************************************************************/

/* Este archivo se encarga de procesar los datos enviados del formulario de alta usuario con post */

/*************************************************************************************************************************************/

    require_once 'Controlador.php';
    $controlador = new Controlador();
    $tipoId = $_POST['tipoId'];

    if ($tipoId === "cedula") {
        $controlador->altaEstudiante("CI:" . $_POST['documento'], $_POST['primerNombre'], $_POST['segundoNombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['calle'], $_POST['numeroPuerta'], $_POST['barrio'], $_POST['localidad'], $_POST['tel'], $_POST['email'], $_POST['pass'], null);
    } else if($tipoId === "pasaporte") {
        $controlador->altaEstudiante("PP:" . $_POST['documento'], $_POST['primerNombre'], $_POST['segundoNombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['calle'], $_POST['numeroPuerta'], $_POST['barrio'], $_POST['localidad'], $_POST['tel'], $_POST['email'], $_POST['pass'], null);
    }
    header('Location: estudiante.php');
?>