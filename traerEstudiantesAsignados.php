<?php
session_start(); 
require_once 'Controlador.php';
$controlador = new Controlador();

if (isset($_SESSION['usuario'])) {
    $usuarioEmail = $_SESSION['usuario'];
    $estudiantesAsignados = $controlador->datosEstudiantesAsignados($usuarioEmail);
    echo json_encode($estudiantesAsignados);
} else {
    echo json_encode([]);
}