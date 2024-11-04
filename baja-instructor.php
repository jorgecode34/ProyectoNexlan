<?php

/*************************************************************************************************************************************/

/* Este archivo se encarga de procesar los datos enviados del formulario de baja con post */

/*************************************************************************************************************************************/


require_once 'Controlador.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['documento'])) {
    $id = $_POST['documento'];
    
    $controlador = new Controlador();
    $controlador->bajaInstructor($id);
    
    header('Location: Instructor.php'); 
} else {
    echo "Error al procesar la solicitud de eliminación.";
}
<<<<<<< HEAD
?>
=======


>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
