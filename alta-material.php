<?php
session_start();
require_once 'Controlador.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rutaPDF = $_POST['rutaPDF'];

    $controlador = new Controlador();
    $resultado = $controlador->altaMaterial($rutaPDF);

    if ($resultado) {
        echo json_encode(['success' => true, 'message' => 'Material didáctico agregado exitosamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al agregar el material didáctico.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
?>