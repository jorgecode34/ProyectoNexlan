<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['rutaPDF'])) {
    $targetDir = "MaterialDidactico/";
    $fileName = basename($_FILES["rutaPDF"]["name"]);
    $targetFile = $targetDir . $fileName;
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Verificar si el archivo es un PDF
    if ($fileType != "pdf") {
        $_SESSION['status'] = 'error';
        $_SESSION['operation'] = 'alta';
        $_SESSION['error_message'] = "Lo siento, solo se permiten archivos PDF.";
        $uploadOk = 0;
    }

    // Verificar si ya existe un archivo con el mismo nombre en la base de datos
    include 'Controlador.php';
    $controlador = new Controlador();
    if ($controlador->existePDF($fileName)) {
        $_SESSION['status'] = 'error';
        $_SESSION['operation'] = 'alta';
        $_SESSION['error_message'] = "Lo siento, ya existe un archivo con el mismo nombre.";
        $uploadOk = 0;
    }

    // Verificar el tamaño del archivo
    if ($_FILES["rutaPDF"]["size"] > 10000000) { // Limitar el tamaño a 10MB
        $_SESSION['status'] = 'error';
        $_SESSION['operation'] = 'alta';
        $_SESSION['error_message'] = "Lo siento, tu archivo es demasiado grande.";
        $uploadOk = 0;
    }

    // Verificar si $uploadOk es 0 por un error
    if ($uploadOk == 0) {
        echo json_encode(['success' => false, 'message' => $_SESSION['error_message']]);
        exit();
    // Si todo está bien, intenta subir el archivo
    } else {
        if (move_uploaded_file($_FILES["rutaPDF"]["tmp_name"], $targetFile)) {
            $_SESSION['ruta_pdf'] = $targetFile;

            // Actualizar la ruta del PDF en la base de datos
            $resultado = $controlador->altaMaterial($targetFile);

            if ($resultado) {
                $_SESSION['status'] = 'success';
                $_SESSION['operation'] = 'alta';
                $_SESSION['texto'] = htmlspecialchars($fileName);
                echo json_encode(['success' => true, 'message' => 'Material didáctico agregado exitosamente.']);
            } else {
                $_SESSION['status'] = 'error';
                $_SESSION['operation'] = 'alta';
                $_SESSION['error_message'] = "Error al agregar el material didáctico en la base de datos.";
                echo json_encode(['success' => false, 'message' => $_SESSION['error_message']]);
            }
        } else {
            $_SESSION['status'] = 'error';
            $_SESSION['operation'] = 'alta';
            $_SESSION['error_message'] = "Lo siento, hubo un error al subir tu archivo.";
            echo json_encode(['success' => false, 'message' => $_SESSION['error_message']]);
        }
    }
}
?>