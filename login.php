<?php
session_start();
require_once 'Controlador.php';

$controlador = new Controlador();
<<<<<<< HEAD
=======

>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
$usuarios = [
    "aguslopoli@gmail.com" => "1234",
    "roberto34xd@gmail.com" => "1234",
    "ninajuli87@gmail.com" => "1234",
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["email"];
    $contrasena = $_POST["password"];
    $recordar = isset($_POST['remember']);

<<<<<<< HEAD
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
=======
    try {
// Verificar usuarios predefinidos
        if (isset($usuarios[$usuario]) && $usuarios[$usuario] === $contrasena) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['password'] = $contrasena;
            $_SESSION['rol'] = 'admin';
             
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
        $usuario = $controlador->verificarLogin($usuario, $contrasena);
        if ($usuario) {
            $_SESSION['usuario'] = $usuario['email'];
            $_SESSION['password'] = $contrasena;
            $_SESSION['rol'] = $usuario['rol'];

            if ($recordar) {
                setcookie('email', $usuario['email'], time() + (86400 * 30), "/"); // 30 días
                setcookie('password', $contrasena, time() + (86400 * 30), "/"); // 30 días
            } else {
                setcookie('email', '', time() - 3600, "/"); // Eliminar cookie
                setcookie('password', '', time() - 3600, "/"); // Eliminar cookie
            }

            if ($usuario['rol'] === 'estudiante') {
                header("Location: inicio-estudiante.php");
            } else {
                header("Location: inicio.php");
            }

            exit();

        } else {
            throw new Exception('Email o contraseña incorrectos.');
        }

    } catch (Exception $e) {
        $_SESSION['status'] = 'error';
        $_SESSION['error_message'] = $e->getMessage();
        header('Location: login.html.php');
        exit();
    }
}
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
