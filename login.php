<?php
session_start();
require_once 'Controlador.php';

$controlador = new Controlador();
$usuarios = [
    "aguslopoli@gmail.com" => "1234",
    "roberto34xd@gmail.com" => "1234",
    "ninajuli87@gmail.com" => "1234",
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["email"];
    $contrasena = $_POST["password"];
    $recordar = isset($_POST['remember']);

    // Verificar usuarios predefinidos
    if (isset($usuarios[$usuario]) && $usuarios[$usuario] === $contrasena) {
        // Login exitoso, iniciar sesión y redirigir a inicio.php
        $_SESSION['usuario'] = $usuario;
        $_SESSION['password'] = $contrasena;
        if ($recordar) {
            setcookie('email', $usuario, time() + (86400 * 30), "/"); // 30 días
            setcookie('password', $contrasena, time() + (86400 * 30), "/"); // 30 días
        } else {
            setcookie('email', '', time() - 3600, "/"); // Eliminar cookie
            setcookie('password', '', time() - 3600, "/"); // Eliminar cookie
        }
        header("Location: inicio.php");
        exit();
    }

    // Verificar usuarios en la base de datos
    $estudiante = $controlador->verificarLoginEstudiante($usuario, $contrasena);
    if ($estudiante) {
        // Login exitoso, iniciar sesión y redirigir a inicio.php
        $_SESSION['usuario'] = $usuario;
        $_SESSION['password'] = $contrasena;
        if ($recordar) {
            setcookie('email', $usuario, time() + (86400 * 30), "/"); // 30 días
            setcookie('password', $contrasena, time() + (86400 * 30), "/"); // 30 días
        } else {
            setcookie('email', '', time() - 3600, "/"); // Eliminar cookie
            setcookie('password', '', time() - 3600, "/"); // Eliminar cookie
        }
        header("Location: inicio.php");
        exit();
    } else {
        echo "<script>alert('Usuario o contraseña incorrectos.'); window.location.href='login.html.php';</script>";
    }
}