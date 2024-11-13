<?php
include 'verificar_sesion.php';
include 'controlador.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $controlador = new Controlador();
    $controlador->bajaPregunta($id);

    header('Location: Agregar-examen.php'); 
} else {
    echo "Error al procesar la solicitud de eliminación.";
}