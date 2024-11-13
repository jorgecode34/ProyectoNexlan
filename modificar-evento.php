<?php
require_once 'Controlador.php';

$controlador = new Controlador();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $inicio = $_POST['inicio'];
    $descripcion = $_POST['descripcion'];
    $hora = $_POST['hora'];

    $resultado = $controlador->modificarEvento($id, $titulo, $inicio, $descripcion, $hora);

    if ($resultado) {
        header("Location: clases.php?modificado=true");
        exit();
    } else {
        header("Location: clases.php?error=modificacion");
        exit();
    }
}