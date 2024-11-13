<?php
require_once 'Controlador.php';
$controlador = new Controlador();

$datosPDF = $controlador->listarPDFs();

echo json_encode($datosPDF);
?>