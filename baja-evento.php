<?php
require_once 'Controlador.php';

$controlador = new Controlador();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $resultado = $controlador->bajaEvento($id);

    if ($resultado) {
        header("Location: clases.php?eliminado=true");
        exit();
    } else {
        header("Location: clases.php?error=eliminacion");
        exit();
    }
}