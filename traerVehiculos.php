<?php
require_once 'Controlador.php';
$controlador = new Controlador();


$vehiculos = $controlador->listarVehiculos();
echo json_encode($vehiculos);

