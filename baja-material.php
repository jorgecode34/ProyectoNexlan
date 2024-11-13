<?php
session_start();
require_once 'Controlador.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $controlador = new Controlador();
    $resultado = $controlador->bajaMaterial($id);

    if ($resultado) {
        echo json_encode(['success' => true, 'message' => 'Material didáctico eliminado exitosamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al eliminar el material didáctico.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
?>