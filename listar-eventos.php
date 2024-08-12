<?php
require_once 'Controlador.php';

$controlador = new Controlador();
$eventos = $controlador->obtenerEventos();

$evs = [];
foreach($eventos as $evento) {
    $evs[] = [
        'id' => $evento['id'],
        'title' => $evento['title'],
        'start' => $evento['start'],
        'descripcion' => $evento['descripcion'],
        'time' => $evento['time'],
        'color' => $evento['color']
        // 'end' => $evento['end']
    ];
}

echo json_encode($evs);