<?php
require_once 'Controlador.php';

$controlador = new Controlador();
<<<<<<< HEAD
$resultado = $controlador->altaEvento($_POST['titulo'], $_POST['fecha'], $_POST['descripcion'], $_POST['hora'], $_POST['color'], $_POST['tipo'], $_POST['instructor'], $_POST['vehiculo'], $_POST['estudiante'], $_POST['categoria'], $_POST['monto']);
header('Location: clases.php');
=======
$resultado = $controlador->altaEvento($_POST['titulo'], $_POST['fecha'], $_POST['descripcion'], $_POST['hora'], $_POST['color'], $_POST['tipo'], $_POST['instructor'], $_POST['vehiculo'], $_POST['estudiante']);
header('Location: clases.php'); 
    
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
