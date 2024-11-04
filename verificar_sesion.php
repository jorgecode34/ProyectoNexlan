<?php
<<<<<<< HEAD
if (session_status() === PHP_SESSION_NONE) {
    session_start();  // Inicia sesión solo si no está activa
}

if (!isset($_SESSION['usuario'])) {
    echo "<script>
            alert('Debe iniciar sesión para acceder a esta página.');
            window.location.href='login.html.php';
          </script>";
=======
session_start();

if (!isset($_SESSION['usuario'])) {
    echo "<script>alert('Debe iniciar sesión para acceder a esta página.'); window.location.href='login.html.php';</script>";
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
    exit();
}
?>