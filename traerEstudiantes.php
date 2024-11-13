<?php
require_once 'Controlador.php';
$controlador = new Controlador();


$estudiantes = $controlador->listarEstudiantes();
echo json_encode($estudiantes);
