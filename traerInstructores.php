<?php
require_once 'Controlador.php';
$controlador = new Controlador();


$instructores = $controlador->listarInstructores();
echo json_encode($instructores);
