<?php
require_once 'Controlador.php';

$controlador = new Controlador();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $Nota = $_POST['Nota'];
    $notaDescripcion = $_POST['notaDescripcion'];

    error_log("Datos recibidos: id=$id, Nota=$Nota, notaDescripcion=$notaDescripcion");

    $resultado = $controlador->modificarHistorial($id, $Nota, $notaDescripcion);

    header('Content-Type: application/json');
    if ($resultado) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Error al modificar el historial']);
    }
    exit();
}