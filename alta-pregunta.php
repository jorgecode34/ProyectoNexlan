<?php
require_once 'Controlador.php';
$controlador = new Controlador();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $texto = $_POST['texto'];
    $opcionA = $_POST['opcionA'];
    $opcionB = $_POST['opcionB'];
    $opcionC = $_POST['opcionC'];
    $opcionD = $_POST['opcionD'];
    $respuestaCorrecta = $_POST['respuestaCorrecta'];


    $controlador->altaPregunta($texto, $opcionA, $opcionB, $opcionC, $opcionD, $respuestaCorrecta);

    if ($result) {
        $_SESSION['status'] = 'success';
        $_SESSION['operation'] = 'alta';
        $_SESSION['texto_pregunta'] = $texto;
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['operation'] = 'alta';
        $_SESSION['error_message'] = 'Error al registrar la pregunta.';
    }

    header('Location: Agregar-examen.php');
    exit();
}







