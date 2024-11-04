<?php

/*************************************************************************************************************************************/

/* Este archivo se encarga de procesar los datos enviados del formulario de alta usuario con post */

/*************************************************************************************************************************************/
session_start();
<<<<<<< HEAD
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
=======
require_once 'Controlador.php';

try {
    $controlador = new Controlador();
    $resultado = $controlador->modificarEstudiante($_POST['IDEstudiante'], $_POST['documento'], $_POST['primerNombre'], $_POST['segundoNombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['calle'], $_POST['numeroPuerta'], $_POST['barrio'], $_POST['localidad'], $_POST['tel'], $_POST['email'], $_POST['pass'], $_POST['teorico']);
    
    if ($resultado) {
        $_SESSION['status'] = 'success';
        $_SESSION['operation'] = 'modificar';
        $_SESSION['nombre_estudiante'] = $_POST['primerNombre'] . ' ' . $_POST['primerApellido'];
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['operation'] = 'modificar';
        $_SESSION['error_message'] = 'Error al modificar el estudiante. Por favor, inténtelo de nuevo.';
    }

} catch (Exception $e) {
    $_SESSION['status'] = 'error';
    $_SESSION['operation'] = 'modificar';
    $_SESSION['error_message'] = 'Error: ' . $e->getMessage();
}
header('Location: estudiante.php');
exit();
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
