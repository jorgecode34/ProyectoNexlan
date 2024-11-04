<?php
require_once 'Controlador.php';

$controlador = new Controlador();
$eventos = $controlador->listarEventos();

$evs = [];
foreach($eventos as $evento) {
    $evs[] = [
        'id' => $evento['id'],
        'title' => $evento['title'],
        'start' => $evento['start'],
        'descripcion' => $evento['descripcion'],
        'time' => $evento['time'],
        'color' => $evento['color'],
        'extendedProps' => [
            'instructor' => $evento['instructor'],
            'estudiante' => $evento['estudiante'],
            'vehiculo' => $evento['vehiculo']
        ]
        // 'end' => $evento['end']
    ];
}

echo json_encode($evs);