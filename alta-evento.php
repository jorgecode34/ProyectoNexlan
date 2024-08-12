<?php
require_once 'Controlador.php';

$controlador = new Controlador();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $descripcion = $_POST['descripcion'];
    $hora = $_POST['hora'];
    $color = $_POST['color'];
    
    $resultado = $controlador->crearEvento($titulo, $fecha, $descripcion, $hora, $color);
    header('Location: clases.php'); 
    
}