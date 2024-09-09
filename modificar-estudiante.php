<?php

/*************************************************************************************************************************************/

/* Este archivo se encarga de procesar los datos enviados del formulario de alta usuario con post */

/*************************************************************************************************************************************/
session_start();
    require_once 'Controlador.php';
    $controlador = new Controlador();
    $resultado = $controlador->modificarEstudiante($_POST['IDEstudiante'], $_POST['documento'], $_POST['primerNombre'], $_POST['segundoNombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['calle'], $_POST['numeroPuerta'], $_POST['barrio'], $_POST['localidad'], $_POST['tel'], $_POST['email'], $_POST['pass'], $_POST['teorico']);

    if ($resultado) {
        $_SESSION['status'] = 'success';
    } else {
        $_SESSION['status'] = 'error';
    }
    header('Location: estudiante.php');
    exit();
