<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo "<script>alert('Debe iniciar sesión para acceder a esta página.'); window.location.href='login.html.php';</script>";
    exit();
}
?>