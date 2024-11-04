<?php
<<<<<<< HEAD
require_once 'Controlador.php';

$controlador = new Controlador();
$eventos = $controlador->listarEventos();
=======
session_start(); // Inicia la sesión si no está iniciada

require_once 'Controlador.php';

$controlador = new Controlador();

$usuarioEmail = $_SESSION['usuario'];
$rol = $_SESSION['rol'];

$eventos = $controlador->listarEventos($usuarioEmail, $rol);
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258

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
<<<<<<< HEAD
        // 'end' => $evento['end']
    ];
}

echo json_encode($evs);
=======
    ];
}

echo json_encode($evs);
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
