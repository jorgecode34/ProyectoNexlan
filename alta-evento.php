<?php
require_once 'Controlador.php';

$controlador = new Controlador();
$resultado = $controlador->crearEvento($_POST['titulo'], $_POST['fecha'], $_POST['descripcion'], $_POST['hora'], $_POST['color']);
header('Location: clases.php'); 
    
