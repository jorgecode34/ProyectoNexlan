<?php
session_start();
require_once 'Controlador.php';
$controlador = new Controlador();
$usuarios = [
    "administrativo@example.com" => "1234",
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["email"];
    $contrasena = $_POST["password"];
    $recordar = isset($_POST['remember']);
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Verificar reCAPTCHA
    $secretKey = '6LeBn3sqAAAAAKSg1ozMXkwmXZHZlTjSOZ7LrE43';
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        $_SESSION['status'] = 'error';
        $_SESSION['error_message'] = 'Por favor, completa el reCAPTCHA.';
        header('Location: login.html.php');
        exit();
    }

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
            } else if ($usuario['rol'] === 'instructor') {
                header("Location: inicio-instructor.php");    
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
?>