<?php
require_once 'Controlador.php';

$controlador = new Controlador();
$resultado = $controlador->altaEvento($_POST['titulo'], $_POST['fecha'], $_POST['descripcion'], $_POST['hora'], $_POST['color'], $_POST['tipo'], $_POST['instructor'], $_POST['vehiculo'], $_POST['estudiante'], $_POST['categoria']);
header('Location: clases.php'); 
    
