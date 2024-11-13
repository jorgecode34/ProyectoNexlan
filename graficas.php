<?php
require_once 'BaseDatos.php';
require_once 'Controlador.php';

$controlador = new Controlador();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'rolesUsuarios':
        $counts = $controlador->graficaRolesUsuarios();
        break;
    case 'tiposDeClases':
        $counts = $controlador->graficaTiposClases();
        break;
    case 'montoPorMes':
        $counts = $controlador->graficaMontoPorMes();
        break;
    default:
        $counts = array('error' => 'Acción no válida');
        break;
}

header('Content-Type: application/json');
echo json_encode($counts);