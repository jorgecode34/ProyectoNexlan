<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profileImage'])) {
    $targetDir = "fotos-perfiles/";
    $usuarioId = $_SESSION['usuario']; // Asegúrate de que el ID del usuario esté almacenado en la sesión
    $targetFile = $targetDir . $usuarioId . ".jpg";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Verificar si el archivo es una imagen real
    $check = getimagesize($_FILES["profileImage"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }

    // Verificar si el archivo ya existe y eliminarlo si es necesario
    if (file_exists($targetFile)) {
        unlink($targetFile); // Eliminar el archivo existente
    }

    // Verificar el tamaño del archivo
    if ($_FILES["profileImage"]["size"] > 5000000) {
        echo "Lo siento, tu archivo es demasiado grande.";
        $uploadOk = 0;
    }

    // Permitir solo archivos PNG
    if ($imageFileType != "jpg") {
        echo "Lo siento, solo se permiten archivos JPG.";
        $uploadOk = 0;
    }

    // Verificar si $uploadOk es 0 por un error
    if ($uploadOk == 0) {
        echo "Lo siento, tu archivo no fue subido.";
    // Si todo está bien, intenta subir el archivo
    } else {
        if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFile)) {
            echo "El archivo ". htmlspecialchars(basename($_FILES["profileImage"]["name"])). " ha sido subido.";
            $_SESSION['profile_image'] = $targetFile;

            // Actualizar la ruta de la imagen de perfil en la base de datos
            include 'Controlador.php';
            $controlador = new Controlador();
            $controlador->actualizarImagenPerfil($_SESSION['usuario'], $targetFile);

            if ($_SESSION['rol'] === 'instructor') {
                header("Location: configuracion-instructor.php"); // Redirigir a la página de configuración del instructor
            } else if ($_SESSION['rol'] === 'estudiante') {
                header("Location: configuracion-estudiante.php"); // Redirigir a la página de configuración del estudiante
            } else {
                header("Location: configuracion.php"); // Redirigir a la página de configuración general
            }
        } else {
            echo "Lo siento, hubo un error al subir tu archivo.";
        }
    }
}
?>