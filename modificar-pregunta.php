<?php
/*************************************************************************************************************************************/
/* Este archivo se encarga de procesar los datos enviados del formulario de alta pregunta con post */
/*************************************************************************************************************************************/
session_start();
require_once 'Controlador.php';
try {   
    $controlador = new Controlador();
    $resultado = $controlador->modificarPregunta(
        $_POST['id'], 
        $_POST['texto'], 
        $_POST['opcionA'], 
        $_POST['opcionB'], 
        $_POST['opcionC'], 
        $_POST['opcionD'],
        $_POST['respuestaCorrecta']
    );

    if ($resultado) {
        $_SESSION['status'] = 'success';
        $_SESSION['operation'] = 'modificar';
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['operation'] = 'modificar';
        $_SESSION['error_message'] = 'Error al modificar la pregunta. Por favor, inténtelo de nuevo.';
    }
} catch (Exception $e) {
    $_SESSION['status'] = 'error';
    $_SESSION['operation'] = 'modificar';
    $_SESSION['error_message'] = 'Error: ' . $e->getMessage();
}

header('Location: Agregar-examen.php');
exit();
