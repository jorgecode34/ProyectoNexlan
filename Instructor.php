<?php include 'verificar_sesion.php'; 



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

            <div class="sidebar-fixed ">

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

                        <a href="#" class="sidebar-link collapsed selected" data-bs-toggle="collapse" data-bs-target="#usuarios" aria-expanded="false" aria-controls="usuarios">
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

                        <a href="clases.php" class="sidebar-link">
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

                        <a href="index.html" class="sidebar-cerrar">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-people me-2" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                            </svg>
                            <h3 class="mb-0">Instructores</h3>
                        </div>
                        <p class="text-center text-lg-start">Administra a los distintos Instructores del sistema aquí.</p>

                        <?php
                        if (isset($_SESSION['status'])) {
                            if ($_SESSION['status'] == 'success') {
                                if ($_SESSION['operation'] == 'alta') {
                                    $nombreInstructor = isset($_SESSION['nombre_instructor']) ? $_SESSION['nombre_instructor'] : 'el instructor';
                                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                <strong>¡Excelente!</strong> El instructor $nombreInstructor ha sido registrado correctamente.
                                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                            </div>";
                                } else if ($_SESSION['operation'] == 'modificar') {
                                    $nombreInstructor = isset($_SESSION['nombre_instructor']) ? $_SESSION['nombre_instructor'] : 'el instructor';
                                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                <strong>¡Excelente!</strong> Los cambios para el instructor $nombreInstructor se han realizado correctamente.
                                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                            </div>";
                                }
                            } else if ($_SESSION['status'] == 'error') {
                                if ($_SESSION['operation'] == 'alta') {
                                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                                <strong>¡Oh no!</strong> Ha ocurrido un error al intentar registrar al instructor. {$_SESSION['error_message']}
                                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                            </div>";
                                } else if ($_SESSION['operation'] == 'modificar') {
                                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                                <strong>¡Oh no!</strong> Ha ocurrido un error al intentar modificar la información del instructor. {$_SESSION['error_message']}
                                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                            </div>";
                                }
                            }

                            unset($_SESSION['status']);
                            unset($_SESSION['operation']);
                            unset($_SESSION['nombre_instructor']);
                            unset($_SESSION['error_message']);
                        }
                        ?>


                        <div id="header-tabla" class="d-flex flex-wrap flex-lg-nowrap justify-content-between align-items-center shadow bg-body-tertiary">
                            <!-- Boton agregar instructor -->
                            <div class="me-auto p-2 w-100 w-lg-auto">
                                <button class="btn btn-primary w-100 w-lg-auto" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar instructor</button>
                            </div>
                            <!-- Barra de busqueda -->
                            <div class="p-2 w-100 w-lg-auto">
                                <input type="search" id="searchInput" class="form-control w-100 w-lg-auto" placeholder="Buscar instructores...">
                            </div>
                            <!-- Boton limitar -->
                            <div class="p-2 d-flex w-100">
                                <div class="p-2 d-flex align-items-center w-100 w-lg-auto">
                                    <span class="me-2">Mostrar</span>
                                    <select id="limitSelect" class="form-select me-2">
                                        <!-- seleccione una opcion -->
                                        <option value="5" selected>5</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                    </select>
                                    <span>Filas</span>
                                </div>
                                <!-- Boton refrescar/recargar -->
                                <div class="p-2 w-25 w-lg-auto mx-auto">
                                    <button type="submit" class="btn w-100 w-lg-auto" onClick="refreshPage()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>





                        
                        
                        
                        <div class="table-responsive shadow">
                            <table id="tablaPersonas" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0">ID Instructor</th>
                                        <th scope="col" class="border-0">ID Usuario</th>
                                        <th scope="col" class="border-0">Documento</th>
                                        <th scope="col" class="border-0">Primer Nombre</th>
                                        <th scope="col" class="border-0">Segundo Nombre</th>
                                        <th scope="col" class="border-0">Primer Apellido</th>
                                        <th scope="col" class="border-0">Segundo Apellido</th>
                                        <th scope="col" class="border-0">Calle</th>
                                        <th scope="col" class="border-0">Número Puerta</th>
                                        <th scope="col" class="border-0">Barrio</th>
                                        <th scope="col" class="border-0">Localidad</th>
                                        <th scope="col" class="border-0">Teléfono</th>
                                        <th scope="col" class="border-0">Horas Dictadas</th>
                                        <th scope="col" class="border-0">Email</th>
                                        <th scope="col" class="border-0">Contraseña</th>
                                        <th scope="col" class="border-0">Modificar</th>
                                        <th scope="col" class="border-0">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="..." class="d-flex justify-content-lg-start justify-content-md-center justify-content-center">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" id="prevPage">Anterior</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" id="nextPage">Siguiente</a>
                                </li>
                            </ul>
                        </nav>
                        
                    </div>
                </div>
            </main>
        </div>
    </div>


    
    <!-- Modal agregar instructor -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Instructor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form action="alta-instructor.php" method="post" onsubmit="disableSubmitButton()">
                        <div class="row">
                            <!-- Elección de Identificación -->

                            <!-- Columna izquierda -->
                            <div class="col-lg-6">

                                <div class="accordion shadow mb-3" id="accordionIdentification">
                                    <!-- Identificación -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button custom-header" type="button" data-bs-toggle="collapse" data-bs-target="#collapseIdentification" aria-expanded="true" aria-controls="collapseIdentification">
                                                Identificación
                                            </button>
                                        </h2>
                                        <div id="collapseIdentification" class="accordion-collapse collapse show">
                                            <div class="accordion-body">


                                                <div class="mb-3">
                                                    <label for="documento" class="form-label">Documento</label>
                                                    <input type="text" placeholder="Ingrese Documento" class="form-control" id="documento" name="documento" minlength="8" maxlength="9" disabled required>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="tipoId" class="form-label">Tipo de Identificación</label>

                                                            <select class="form-select" id="tipoId" name="tipoId" required onchange="mostrarCampos()">

                                                                <option value="" selected>Seleccione una opción</option>
                                                                <option value="cedula">Cédula de Identidad</option>
                                                                <option value="pasaporte">Pasaporte</option>

                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- <div class="mb-3">
                                                    <label for="pasaporte" class="form-label">Pasaporte</label>
                                                    <input type="text" placeholder="Ingrese Pasaporte" class="form-control" id="pasaporte" name="pasaporte" required disabled>
                                                </div> -->


                                            </div>
                                        </div>
                                    </div>
                                    <!-- Nombre Completo -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseName" aria-expanded="true" aria-controls="collapseName">
                                                Nombre Completo
                                            </button>
                                        </h2>
                                        <div id="collapseName" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <div class="mb-3">
                                                    <label for="primerNombre" class="form-label">Primer Nombre</label>
                                                    <input type="text" placeholder="Ingrese Primer Nombre" class="form-control" id="primerNombre" name="primerNombre" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="segundoNombre" class="form-label">Segundo Nombre</label>
                                                    <input type="text" placeholder="Ingrese Segundo Nombre" class="form-control" id="segundoNombre" name="segundoNombre">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="primerApellido" class="form-label">Primer Apellido</label>
                                                    <input type="text" placeholder="Ingrese Primer Apellido" class="form-control" id="primerApellido" name="primerApellido" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="segundoApellido" class="form-label">Segundo Apellido</label>
                                                    <input type="text" placeholder="Ingrese Segundo Apellido" class="form-control" id="segundoApellido" name="segundoApellido">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePass" aria-expanded="true" aria-controls="collapsePass">
                                                Credenciales de Acceso
                                            </button>
                                        </h2>
                                        <div id="collapsePass" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <div class="mb-3">
                                                    <label for="primerNombre" class="form-label">Contraseña</label>
                                                    <input type="text" placeholder="Ingrese Contraseña" class="form-control" id="pass" name="pass" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Columna derecha: Dirección y Contacto -->
                            <div class="col-lg-6">
                                <div class="accordion shadow mb-3" id="accordionAddress">
                                    <!-- Dirección -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAddress" aria-expanded="true" aria-controls="collapseAddress">
                                                Dirección
                                            </button>
                                        </h2>
                                        <div id="collapseAddress" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <div class="mb-3">
                                                    <label for="calle" class="form-label">Calle</label>
                                                    <input type="text" placeholder="Ingrese Calle" class="form-control" id="calle" name="calle" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="numeroPuerta" class="form-label">Número de Puerta</label>
                                                    <input type="text" placeholder="Ingrese Número de Puerta" class="form-control" id="numeroPuerta" name="numeroPuerta" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="barrio" class="form-label">Barrio</label>
                                                    <input type="text" placeholder="Ingrese Barrio" class="form-control" id="barrio" name="barrio" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="localidad" class="form-label">Localidad</label>
                                                    <input type="text" placeholder="Ingrese Localidad" class="form-control" id="localidad" name="localidad" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Contacto -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseContact" aria-expanded="true" aria-controls="collapseContact">
                                                Contacto
                                            </button>
                                        </h2>
                                        <div id="collapseContact" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <div class="mb-3">
                                                    <label for="tel" class="form-label">Teléfono</label>
                                                    <input type="text" placeholder="Ingrese Teléfono" class="form-control" id="tel" name="tel" required minlength="8" maxlength="9">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" placeholder="Ingrese Email" class="form-control" id="email" name="email" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- Cerrar y guardar cambios -->
                <div class="modal-footer">
                    <button type="submit" id="submitButton" value="Registrar" class="btn btn-primary">Guardar Cambios</button>
                    <button type="button" class="btn btn-info" onclick="rellenarCampos()">Rellenar con datos aleatorios</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="modifModal" tabindex="-1" aria-labelledby="modalModificarLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalModificarLabel">Modificar Instructor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="formModificarInstructor" method="post" onsubmit="guardarCambios(event)">

                        <input type="hidden" id="txtDocumento" name="documento">

                        <div class="form-floating mb-3">
                            <input type="text" id="txtPrimerNombre" class="form-control" required>
                            <label for="txtPrimerNombre">Primer Nombre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="txtSegundoNombre" name="segundoNombre">
                            <label for="txtSegundoNombre">Segundo Nombre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="txtPrimerApellido" name="primerApellido" required>
                            <label for="txtPrimerApellido">Primer Apellido</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="txtSegundoApellido" name="segundoApellido">
                            <label for="txtSegundoApellido">Segundo Apellido</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="txtCalle" name="calle" required>
                            <label for="txtCalle">Calle</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="txtNumeroPuerta" name="numeroPuerta" required>
                            <label for="txtNumeroPuerta">Número de Puerta</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="txtBarrio" name="barrio" required>
                            <label for="txtBarrio">Barrio</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="txtLocalidad" name="localidad" required>
                            <label for="txtLocalidad">Localidad</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="txtTel" name="tel" required>
                            <label for="txtTel">Teléfono</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="txtEmail" name="email" required>
                            <label for="txtEmail">Email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="txtPass" name="pass" required>
                            <label for="txtPass">Pass</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="txtHorasDictadas" name="horasDictadas" required>
                            <label for="txtHorasDictadas">Horas Dictadas</label>
                        </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnGuardar">Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalBaja" tabindex="-1" aria-labelledby="modalBajaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBajaLabel">Confirmar Baja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas dar de baja a este instructor? Esta acción es irreversible, pero quedará un registro en la base de datos.</p>
                </div>
                <div class="modal-footer">
                    <form id="formBajaInstructor" method="post" onsubmit="confirmarBaja(event)">
                        <input type="hidden" id="bajaDocumento" name="documento">
                        <button type="submit" class="btn btn-danger">Confirmar Baja</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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





    
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
        const urlParams = new URLSearchParams(window.location.search);
        const searchParam = urlParams.get('search');
        if (searchParam) {
            document.getElementById('searchInput').value = searchParam;
            filtrarInstructores();
        }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/instructores.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>