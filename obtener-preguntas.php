<?php
require_once 'Controlador.php';
$controlador = new Controlador();


$preguntas = $controlador-> listarPreguntas();
                           
echo json_encode($preguntas);
