<?php
session_start(); 
require_once 'Controlador.php';

$controlador = new Controlador();

$usuarioEmail = $_SESSION['usuario'];

$historial = $controlador->mostrarHistorial($usuarioEmail);
echo json_encode($historial);
