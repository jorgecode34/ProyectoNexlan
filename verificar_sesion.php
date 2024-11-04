<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();  // Inicia sesión solo si no está activa
}

if (!isset($_SESSION['usuario'])) {
    echo "<script>
            alert('Debe iniciar sesión para acceder a esta página.');
            window.location.href='login.html.php';
          </script>";
    exit();
}
?>