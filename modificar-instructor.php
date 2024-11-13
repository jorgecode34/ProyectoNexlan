<?php
/*************************************************************************************************************************************/
/* Este archivo se encarga de procesar los datos enviados del formulario de alta usuario con post */
/*************************************************************************************************************************************/
session_start();
require_once 'Controlador.php';
try {
    $controlador = new Controlador();
    $resultado = $controlador->modificarInstructor(
        $_POST['IDInstructor'], 
        $_POST['documento'], 
        $_POST['primerNombre'], 
        $_POST['segundoNombre'], 
        $_POST['primerApellido'], 
        $_POST['segundoApellido'], 
        $_POST['calle'], 
        $_POST['numeroPuerta'], 
        $_POST['barrio'], 
        $_POST['localidad'], 
        $_POST['tel'], 
        $_POST['email'], 
        $_POST['pass'], 
        $_POST['horasDictadas']
    );

    if ($resultado) {
        $_SESSION['status'] = 'success';
        $_SESSION['operation'] = 'modificar';
        $_SESSION['nombre_instructor'] = $_POST['primerNombre'] . ' ' . $_POST['primerApellido'];
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['operation'] = 'modificar';
        $_SESSION['error_message'] = 'Error al modificar el instructor. Por favor, inténtelo de nuevo.';
    }
} catch (Exception $e) {
    $_SESSION['status'] = 'error';
    $_SESSION['operation'] = 'modificar';
    $_SESSION['error_message'] = 'Error: ' . $e->getMessage();
}

header('Location: Instructor.php');
exit();

    /*<?php

include 'database.php';
try {
    $conn = mysqli_connect($servidor,$usuario,$password,$base_datos);
} catch (Exception $ex) {
    die($ex->getMessage());
}

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$correo = $_POST['email'];

$consulta = "UPDATE usuariosPlataforma SET nombre = '$nombre', email = '$correo' WHERE id =$id";
$resultado = mysqli_query($conn , $consulta);

echo $consulta;

?>*/