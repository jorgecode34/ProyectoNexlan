<?php
require_once 'verificar_sesion.php';
require_once 'controlador.php';

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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen de Conducir</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="body">
    <div class="examen-container">
        <h1 class="examen-titulo">Examen de Conducir</h1>

        <?php if ($respuestasUsuario): ?>
            <h2 class="resultado-titulo">Resultados del Examen</h2>
            <?php 
            $correctas = 0;
            foreach ($preguntas as $pregunta): 
                $id = $pregunta['id'];
                $respuestaCorrecta = $pregunta['respuesta_correcta'];
                $respuestaUsuario = $respuestasUsuario[$id] ?? 'No respondida';
                $esCorrecta = ($respuestaUsuario === $respuestaCorrecta);

                if ($esCorrecta) $correctas++;

                $opcionUsuario = $pregunta['opcion_' . $respuestaUsuario] ?? 'No respondida';
                $opcionCorrecta = $pregunta['opcion_' . $respuestaCorrecta];
            ?>
                <div class="resultado-pregunta">
                    <p><strong><?php echo htmlspecialchars($pregunta['texto']); ?></strong></p>
                    <p class="<?php echo $esCorrecta ? 'respuesta-correcta' : 'respuesta-incorrecta'; ?>">
                        Tu respuesta: <?php echo htmlspecialchars($respuestaUsuario); ?>) <?php echo htmlspecialchars($opcionUsuario); ?>
                    </p>
                    <?php if (!$esCorrecta): ?>
                        <p class="respuesta-correcta">
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
                                <?php echo htmlspecialchars($opcion); ?>) <?php echo htmlspecialchars($pregunta['opcion_' . $opcion]); ?>
                            </label><br>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
                <input type="submit" value="Enviar respuestas" class="boton-enviar">
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
