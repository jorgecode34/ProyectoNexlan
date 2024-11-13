<?php
session_start(); 
require_once 'Controlador.php';

$controlador = new Controlador();

$usuarioEmail = $_SESSION['usuario'];
$rol = $_SESSION['rol'];

$historial = $controlador->mostrarHistorial($usuarioEmail, $rol);
echo json_encode($historial);
