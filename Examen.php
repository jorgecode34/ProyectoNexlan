<?php
require_once 'verificar_sesion.php';
require_once 'Controlador.php';

if ($_SESSION['rol'] !== 'estudiante') {
    echo "<script>alert('No tiene permiso para acceder a esta página.'); window.location.href='index.html';</script>";
    exit();
}


if (session_status() === PHP_SESSION_NONE) {
    session_start();  // Verificar si la sesión está activa
}

$controlador = new Controlador();

if (isset($_GET['nuevo_intento'])) {
    unset($_SESSION['preguntas'], $_SESSION['respuestas']);
    header("Location: examen.php");
    exit();
}

if (!isset($_SESSION['preguntas'])) {
    $_SESSION['preguntas'] = $controlador->obtenerPreguntasAleatorias();
}

$preguntas = $_SESSION['preguntas'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['respuestas'])) {
    $_SESSION['respuestas'] = $_POST['respuestas'];
    header("Location: examen.php");
    exit();
}

$respuestasUsuario = $_SESSION['respuestas'] ?? null;
$profileImage = $controlador->obtenerImagenPerfil($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen de Conducir</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="body">
    <nav class="navbar bg-body-tertiary fixed-nav">
        <div class="container">
            <div class="ms-auto search-icon-container" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="btn-group">
                    <div class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                    <img src="<?php echo htmlspecialchars($profileImage); ?>" alt="Imagen de Perfil" width="40" height="40" class="rounded-circle" style="object-fit:cover !important;">
                    <span class="ms-2" style="user-select: none;">
                            <?php
                            echo isset($_SESSION['usuario']) ? htmlspecialchars($_SESSION['usuario']) : (isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : 'Email no disponible');
                            ?>
                        </span>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="configuracion-estudiante.php" class="dropdown-item" onclick="window.location.href='configuracion-estudiante.php'; return false;">Configuración</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="cerrar_sesion.php" class="dropdown-item" onclick="window.location.href='cerrar_sesion.php'; return false;">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="examen-container">
        <div class="d-flex justify-content-center">
            <a href="inicio-estudiante.php" class="navbar-brand align-items-center" href="#">
                <img src="img/union.png" alt="" width="120" height="120">
            </a>
        </div>

        <h1 class="examen-titulo">Examen de Conducir</h1>

        <?php if ($respuestasUsuario): ?>
            <h2 class="resultado-titulo">Resultados del Examen</h2>
            <?php
            $correctas = 0;
            foreach ($preguntas as $pregunta):
                $id = $pregunta['id'];
                $respuestaCorrecta = $pregunta['respuestaCorrecta'];
                $respuestaUsuario = $respuestasUsuario[$id] ?? 'No respondida';
                $esCorrecta = ($respuestaUsuario === $respuestaCorrecta);

                if ($esCorrecta) $correctas++;

                $opcionUsuario = $pregunta['opcion' . strtoupper($respuestaUsuario)] ?? 'No respondida';
                $opcionCorrecta = $pregunta['opcion' . strtoupper($respuestaCorrecta)];
            ?>
                <div class="resultado-pregunta">
                    <p><strong><?php echo htmlspecialchars($pregunta['texto']); ?></strong></p>
                    <p class="<?php echo $esCorrecta ? 'respuesta-correcta' : 'respuesta-incorrecta'; ?>">
                        Tu respuesta: <?php echo htmlspecialchars($respuestaUsuario); ?>) <?php echo htmlspecialchars($opcionUsuario); ?>
                    </p>
                    <?php if (!$esCorrecta): ?>
                        <p class="respuestaCorrecta">
                            Respuesta correcta: <?php echo htmlspecialchars($respuestaCorrecta); ?>) <?php echo htmlspecialchars($opcionCorrecta); ?>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            <p class="resultado-final">Has respondido correctamente <?php echo $correctas; ?> de <?php echo count($preguntas); ?> preguntas.</p>
            <a href="examen.php?nuevo_intento=1" class="boton-nuevo-intento">Realizar otro examen</a>
        <?php else: ?>
            <form method="POST">
                <?php foreach ($preguntas as $pregunta): ?>
                    <div class="pregunta-container">
                        <p><?php echo htmlspecialchars($pregunta['texto']); ?></p>
                        <?php
                        $opciones = ['a', 'b', 'c', 'd'];
                        foreach ($opciones as $opcion):
                        ?>
                            <label class="opcion-label">
                                <input type="radio" name="respuestas[<?php echo $pregunta['id']; ?>]" value="<?php echo $opcion; ?>" required>
                                <?php echo htmlspecialchars($opcion); ?>) <?php echo htmlspecialchars($pregunta['opcion' . strtoupper($opcion)]); ?>
                            </label><br>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
                <input type="submit" value="Enviar respuestas" class="boton-enviar">
            </form>
        <?php endif; ?>
    </div>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>