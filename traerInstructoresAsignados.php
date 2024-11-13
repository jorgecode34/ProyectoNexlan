<?php
session_start(); 
require_once 'Controlador.php';
$controlador = new Controlador();

if (isset($_SESSION['usuario'])) {
    $usuarioEmail = $_SESSION['usuario'];
    $instructoresAsignados = $controlador->datosInstructoresAsignados($usuarioEmail);
    echo json_encode($instructoresAsignados);
} else {
    echo json_encode([]);
}