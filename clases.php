<?php include 'verificar_sesion.php';

if ($_SESSION['rol'] !== 'admin') {
    echo "<script>alert('No tiene permiso para acceder a esta página.'); window.location.href='index.html';</script>";
    exit();
}

require_once 'Controlador.php';
$controlador = new Controlador();
$instructores = $controlador->obtenerInstructores();
$estudiantes = $controlador->obtenerEstudiantes();
$vehiculos = $controlador->obtenerVehiculos();



?>

<!DOCTYPE html>
<html data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <!-- Símbolos para el toggler de los temas -->
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
    </svg>
</head>

<body class="dashboard-page">
    <div class="wrapper">

        <!-- Sidebar -->
        <aside id="sidebar">

            <div class="sidebar-fixed">

                <a class="navbar-brand d-flex flex-column align-items-center" href="#">
                    <img src="img/union.png" alt="" width="80" height="80">
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-item" style="margin-top:30px;">

                        <a href="#" class="sidebar-link-dashboard">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.39.39 0 0 0-.029-.518z" />
                                <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A8 8 0 0 1 0 10m8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3" />
                            </svg>
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>

                    </li>
                </ul>
            </div>

            <hr class="hr-color">

            <div class="sidebar-scroll">
                <ul class="sidebar-nav">

                    <!-- Header General -->
                    <li class="sidebar-header">
                        General
                    </li>


                    <!-- Inicio -->
                    <li class="sidebar-item separar-items active-link">

                        <a href="inicio.php" class="sidebar-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                            </svg>
                            <i class="fa-solid fa-list pe-2"></i>
                            Inicio
                        </a>

                    </li>

                    <!-- Configuracion -->
                    <li class="sidebar-item">

                        <a href="configuracion.php" class="sidebar-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
                                <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5m0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78zM5.048 3.967l-.087.065zm-.431.355A4.98 4.98 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8zm.344 7.646.087.065z" />
                            </svg>
                            <i class="fa-solid fa-list pe-2"></i>
                            Configuración

                        </a>
                    </li>



                    <!-- Header Menu de Gestion -->
                    <li class="sidebar-header separar-headers">
                        Menú de Gestión
                    </li>


                    <!-- Usuarios -->
                    <li class="sidebar-item separar-items">

                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#usuarios" aria-expanded="false" aria-controls="usuarios">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                            </svg>
                            <i class="fa-regular fa-file-lines pe-2"></i>
                            Usuarios
                        </a>

                        <ul id="usuarios" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

                            <li class="sidebar-item separar-hijos">
                                <a href="estudiante.php" class="sidebar-link">Estudiantes</a>
                            </li>

                            <li class="sidebar-item separar-hijos">
                                <a href="Instructor.php" class="sidebar-link">Instructores</a>
                            </li>

                        </ul>

                    </li>
                    <!-- Vehículos -->
                    <li class="sidebar-item separar-items">

                        <a href="vehiculo.php" class="sidebar-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front" viewBox="0 0 16 16">
                                <path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0m10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17s2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276" />
                                <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.8.8 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155s4.037-.084 5.592-.155A1.48 1.48 0 0 0 15 9.611v-.413q0-.148-.03-.294l-.335-1.68a.8.8 0 0 0-.43-.563 1.8 1.8 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3z" />
                            </svg>
                            <i class="fa-solid fa-sliders pe-2"></i>
                            Vehículos
                        </a>

                    </li>




                    <!-- Clases y Horarios -->
                    <li class="sidebar-item">

                        <a href="#" class="sidebar-link selected">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                            </svg>
                            <i class="fa-regular fa-user pe-2"></i>
                            Clases y Horarios
                        </a>

                    </li>

                    <hr class="hr-color">


                    <!-- Cerrar sesíón -->
                    <li class="sidebar-item active-link">

                        <a href="cerrar_sesion.php" class="sidebar-cerrar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                            </svg>
                            <i class="fa-solid fa-list pe-2"></i>
                            Cerrar Sesión
                        </a>

                    </li>



                    <div style="height: 200px; visibility: hidden;"></div>


                </ul>
            </div>
        </aside>


        <!-- Main Component -->
        <div class="main">



            <!-- Nav Bar -->
            <nav class="navbar navbar-expand shadow-sm px-3 border-bottom fixed-nav bg-body-tertiary">

                <!-- Boton para abir y cerrar sidebar -->
                <button class="btn" type="button" data-bs-theme="collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="ms-auto search-icon-container" data-bs-toggle="dropdown" aria-expanded="false">

                    <div class="btn-group">
                        <div class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" id="userDropdown" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                            </svg>
                            <span class="ms-2" style="user-select: none;">
                                <?php
                                echo isset($_SESSION['usuario']) ? htmlspecialchars($_SESSION['usuario']) : (isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : 'Email no disponible');
                                ?>
                            </span>
                        </div>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="configuracion.php" class="dropdown-item" onclick="window.location.href='configuracion.php'; return false;">Configuración</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a href="cerrar_sesion.php" class="dropdown-item" onclick="window.location.href='cerrar_sesion.php'; return false;">Cerrar sesión</a></li>
                        </ul>
                    </div>

                </div>

            </nav>


            <!-- Cuerpo -->
            <main class="content px-3 py-2">
                <div class="container-fluid">

                    <div class="mb-3">
                        <h5 id="fecha-actual" class="text-center mb-5"></h5>

                        <div class="d-flex justify-content-center justify-content-lg-start">
                            <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-calendar-week me-2" viewBox="0 0 16 16">
                                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                            </svg>
                            <h3 class="mb-0">Clases</h3>
                        </div>
                        <p class="text-center text-lg-start">Administra a las distintas clases del sistema aquí.</p>


                    </div>

                    <div id='calendar' class="shadow"></div>

                </div>
            </main>

            <!-- Modal de Evento-->
            <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="eventModalLabel">Ver evento</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form id="eventForm" action="modificar-evento.php" method="POST">
                                <div class="modal-body">

                                    <!-- <label for="visualizar_id" class="form-label">ID</label> -->
                                    <input type="hidden" class="form-control" id="visualizar_id" name="id" readonly>

                                    <div class="mb-3">
                                        <label for="visualizar_estudiante" class="form-label">Estudiante</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="visualizar_estudiante" name="estudiante" readonly>
                                            <button type="button" class="btn btn-primary" id="verEstudianteBtn" onclick="verEstudiante()">Ver</button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="visualizar_instructor" class="form-label">Instructor</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="visualizar_instructor" name="instructor" readonly>
                                            <button type="button" class="btn btn-primary" id="verInstructorBtn" onclick="verInstructor()">Ver</button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="visualizar_vehiculo" class="form-label">Vehículo</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="visualizar_vehiculo" name="vehiculo" readonly>
                                            <button type="button" class="btn btn-primary" id="verVehiculoBtn" onclick="verVehiculo()">Ver</button>
                                        </div>
                                    </div>

                                    <hr class="">

                                    <div class="mb-3">
                                        <label for="visualizar_titulo" class="form-label">Título del evento</label>
                                        <input type="text" class="form-control" id="visualizar_titulo" name="titulo" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="visualizar_inicio" class="form-label">Día</label>
                                        <input type="date" class="form-control" id="visualizar_inicio" name="inicio" required>
                                    </div>

                                    <div class="mb-3">
                                        <!-- <label for="visualizar_fin" class="form-label">Fin</label> -->
                                        <input type="hidden" class="form-control" id="visualizar_fin" name="fin" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="visualizar_descripcion" class="form-label">Descripcion </label>
                                        <textarea class="form-control" id="visualizar_descripcion" name="descripcion" rows="3"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="visualizar_time" class="form-label">Hora</label>
                                        <input type="time" class="form-control" id="visualizar_time" name="hora" required>
                                    </div>



                                </div>
                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </form>


                            <form id="deleteForm" action="baja-evento.php" method="POST">
                                <input type="hidden" id="delete_id" name="id">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>


                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>


                        </div>





                    </div>
                </div>
            </div>



            <!-- Modal de Día -->
            <div class="modal fade" id="dayModal" tabindex="-1" aria-labelledby="dayModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="dayModalLabel">Crear nuevo evento</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form id="newEventForm" action="alta-evento.php" method="POST" onsubmit="disableSubmitButton()">
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="nuevo_titulo" class="form-label">Título del evento</label>
                                        <input type="text" class="form-control" id="nuevo_titulo" name="titulo" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nueva_descripcion" class="form-label">Descripcion</label>
                                        <textarea class="form-control" id="nueva_descripcion" name="descripcion" rows="3"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nuevo_time" class="form-label">Hora</label>
                                        <input type="time" class="form-control" id="nuevo_time" name="hora" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="asignar_tipo" class="form-label">Tipo de Clase</label>
                                        <select class="form-select" id="asignar_tipo" name="tipo" required>
                                            <option value="">Selecciona un Tipo</option>
                                            <option value="Teórico" id='Teórico'>Teórico</option>
                                            <option value="Práctico" id='Práctico'>Práctico</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="asignar_categoria" class="form-label">Categoría de Licencia</label>
                                        <select class="form-select" id="asignar_categoria" name="categoria" required>
                                            <option value="">Seleccione una categoría</option>
                                            <optgroup label="Motos">
                                                <option value="G1">G1</option>
                                                <option value="G2">G2</option>
                                                <option value="G3">G3</option>
                                            </optgroup>
                                            <optgroup label="Autos">
                                                <option value="A1">A1</option>
                                                <option value="A2">A2</option>
                                                <option value="A3">A3</option>
                                                <option value="A4">A4</option>
                                                <option value="A5">A5</option>
                                            </optgroup>
                                            <optgroup label="Especial">
                                                <option value="F">F</option>
                                            </optgroup>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nuevo_instructor" class="form-label">Instructor</label>
                                        <select class="form-select js-example-basic-single" id="nuevo_instructor" name="instructor" required>
                                            <option value="">Selecciona un instructor</option>
                                            <?php foreach ($instructores as $instructor): ?>
                                                <option value="<?php echo $instructor['IDInstructor']; ?>">
                                                    <?php echo htmlspecialchars($instructor['documento'] . ' - ' . $instructor['primerNombre'] . ' ' . $instructor['primerApellido']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nuevo_estudiante" class="form-label">Estudiante</label>
                                        <select class="form-select js-example-basic-single" id="nuevo_estudiante" name="estudiante" required>
                                            <option value="">Selecciona un estudiante</option>
                                            <?php foreach ($estudiantes as $estudiante): ?>
                                                <option value="<?php echo $estudiante['IDEstudiante']; ?>">
                                                    <?php echo htmlspecialchars($estudiante['documento'] . ' - ' . $estudiante['primerNombre'] . ' ' . $estudiante['primerApellido']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nuevo_vehiculo" class="form-label">Vehiculo</label>
                                        <select class="form-select js-example-basic-single" id="nuevo_vehiculo" name="vehiculo" required>
                                            <option value="">Selecciona un vehiculo</option>
                                            <?php foreach ($vehiculos as $vehiculo): ?>
                                                <option value="<?php echo $vehiculo['ID_Vehiculos']; ?>">
                                                    <?php echo htmlspecialchars($vehiculo['Matricula'] . ' ' . $vehiculo['Modelo'] . ' ' . $vehiculo['Marca']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <input type="hidden" id="nuevo_fecha" name="fecha">

                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="submitButton" class="btn btn-primary">Guardar evento</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div>





    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
            id="bd-theme"
            type="button"
            aria-expanded="false"
            data-bs-toggle="dropdown"
            aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" fill="white" width="1em" height="1em">
                <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>








    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
   <script>
        function verEstudiante() {
            const estudiante = document.getElementById('visualizar_estudiante').value;
            window.location.href = `estudiante.php?search=${encodeURIComponent(estudiante)}`;
        }

        function verInstructor() {
            const instructor = document.getElementById('visualizar_instructor').value;
            window.location.href = `instructor.php?search=${encodeURIComponent(instructor)}`;
        }

        function verVehiculo() {
            const vehiculo = document.getElementById('visualizar_vehiculo').value;
            window.location.href = `vehiculo.php?search=${encodeURIComponent(vehiculo)}`;
        }

        $(document).ready(function() {
        $('.js-example-basic-single').select2({
            theme: 'bootstrap-5',
            width: '100%',
            dropdownParent: $('#dayModal') 
        });
    });
    </script>

    <script src="js/calendar.js"></script>
    <script src="js/script.js"></script>

    <script src="dist/index.global.min.js"></script>
    <script src="core/locales/es-us.global.min.js"></script>
</body>

</html>