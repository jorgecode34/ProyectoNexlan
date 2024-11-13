<?php
session_start(); // Inicia la sesión si no está iniciada

require_once 'Controlador.php';

$controlador = new Controlador();

$usuarioEmail = $_SESSION['usuario'];
$rol = $_SESSION['rol'];

$eventos = $controlador->listarEventos($usuarioEmail, $rol);

$evs = [];
foreach($eventos as $evento) {
    $evs[] = [
        'id' => $evento['id'],
        'title' => $evento['title'],
        'start' => $evento['start'],
        'descripcion' => $evento['descripcion'],
        'time' => $evento['time'],
        'tipo' => $evento['tipo'],
        'color' => $evento['color'],
        'extendedProps' => [
            'instructor' => $evento['instructor'],
            'estudiante' => $evento['estudiante'],
            'vehiculo' => $evento['vehiculo']
        ]
    ];
}

echo json_encode($evs);
