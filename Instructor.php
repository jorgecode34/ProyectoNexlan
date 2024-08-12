<?php include 'verificar_sesion.php'; ?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>



    <div class="wrapper">

<!-- Sidebar -->
        <aside id="sidebar">
            <div class="h-100 ">

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


                    <hr class="hr-color">


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

                        <a href="#" class="sidebar-link">
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

                        <a href="#" class="sidebar-link">
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

                        <a href="cerrar_sesion.php" class="sidebar-link">
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

                        <a href="index.html" class="sidebar-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                            </svg>
                            <i class="fa-solid fa-list pe-2"></i>
                            Cerrar Sesión
                        </a>

                    </li>






                </ul>
            </div>
        </aside>


<!-- Main Component -->
        <div class="main">



<!-- Nav Bar -->
            <nav class="navbar navbar-expand navbar-light bg-white shadow-sm px-3 border-bottom">

<!-- Boton para abir y cerrar sidebar -->
                <button class="btn" type="button" data-bs-theme="collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="ms-auto search-icon-container">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </form>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                </div>

            </nav>


<!-- Cuerpo -->
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">

                        <h5 id="fecha-actual" class="text-center"></h5>
                        
                        <h3>Instructores</h3>
                        <p>Administra a los distintos Instructores del sistema aquí.</p>


                        <div id="header-tabla" class="d-flex justify-content-between align-items-center shadow color-gris">
<!-- Boton refrescar -->
                            <div class="me-auto p-2">
                                <button type="submit" class="btn btn-outline-dark" onClick="refreshPage()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                                    </svg>
                                </button>
                            </div>
<!-- Barra de busqueda -->
                            <div class="p-2">
                                <form action="" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar por CI o Nombre" name="buscar" value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : ''; ?>">
                                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                                    </div>
                                </form>
                            </div>
<!-- Boton agregar estudiante -->
                            <div class="p-2">
                                <button type="button" class="btn btn-azul shadow" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                    </svg>
                                    Agregar Instructor 
                                </button>
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


                                        <form action="alta-instructor.php" method="post">
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
                                                <button type="submit" value="Registrar" class="btn btn-primary">Guardar Cambios</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </form>
                                    
                                </div>
                            </div>
                        </div>








<!-- Table -->
                        <?php
                        include("Controlador.php");
                        $controlador = new Controlador();
                       

                        // Verificar si se envió un término de búsqueda a través de $_GET arriba en el search bar, que funciona como URL
                        if (isset($_GET['buscar'])) {
                            $buscar = $_GET['buscar'];
                        } else {
                            $buscar = '';
                        }

                        // Metodo para mostrar todos los instructores en la tabla
                        $instructores = $controlador->listarInstructores();

                        // Metodo para buscar instructores en la tabla
                        $instructores = $controlador->buscarInstructores($buscar);

                        //si el array de instructores NO está vacio, osea que hay instructores en la bd, los muestra de la siguiente manera:
                        if (empty($instructores) == false) {
                            echo "<div id='tabla-instructores' class='table-responsive shadow'>";
                            echo "<table class='table'>";
                            echo "
                                <thead class='table-light'>
                                    <tr>
                                        <th>ID</th>
                                        <th>Documento</th>
                                        <th>Primer Nombre</th>
                                        <th>Segundo Nombre</th>
                                        <th>Primer Apellido</th>
                                        <th>Segundo Apellido</th>
                                        <th>Calle</th>
                                        <th>Número Puerta</th>
                                        <th>Barrio</th>
                                        <th>Localidad</th>
                                        <th>Teléfono</th>
                                        <th>Email</th>
                                        <th>Contraseña</th>
                                        <th>Eliminar</th>
                                        <th>Modificar</th>
                                    </tr>
                                </thead>";

                            echo "<tbody>";
                            foreach ($instructores as $instructor) {
                                echo "<tr>";
                                echo "<td>{$instructor['IDInstructor']}</td>";
                                echo "<td>{$instructor['documento']}</td>";
                                echo "<td>{$instructor['primerNombre']}</td>";
                                echo "<td>{$instructor['segundoNombre']}</td>";
                                echo "<td>{$instructor['primerApellido']}</td>";
                                echo "<td>{$instructor['segundoApellido']}</td>";
                                echo "<td>{$instructor['calle']}</td>";
                                echo "<td>{$instructor['numeroPuerta']}</td>";
                                echo "<td>{$instructor['barrio']}</td>";
                                echo "<td>{$instructor['localidad']}</td>";
                                echo "<td>{$instructor['tel']}</td>";
                                echo "<td>{$instructor['email']}</td>";
                                echo "<td>{$instructor['pass']}</td>";
                                echo "<td class='text-center'>
                                                <form action='baja-instructor.php' method='post'>
                                                    <input type='hidden' name='documento' value='{$instructor['documento']}' /> 
                                                    <button type='submit' class='btn btn-danger'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                                                        <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                                                        </svg>
                                                    </button>
                                                </form>
                                        </td>";
                                echo "<td class='text-center'>
                                        <button type='button' data-bs-toggle='modal' data-bs-target='#modalModificar{$instructor['documento']}' class='btn btn-warning'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='white' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                                            </svg>
                                        </button>
                                    </td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                        } else {
                            echo "<br> No existen instructores que coincidan con la búsqueda.";
                        }


// Modal para modificar estudiante
                        foreach ($instructores as $instructor) {
                            echo "
                            <div class='modal fade' id='modalModificar{$instructor['documento']}' tabindex='-1' aria-labelledby='modalModificarLabel{$instructor['documento']}' aria-hidden='true'>
                                <div class='modal-dialog modal-dialog-scrollable'>
                                    <div class='modal-content'>

                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='modalModificarLabel{$instructor['documento']}'>Modificar Instructor</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>

                                        <div class='modal-body'>
                                            <form action='modificar-instructor.php' method='post'>

                                                <input type='hidden' name='documento' value='{$instructor['documento']}'>
                                                <div class='mb-3'>
                                                    <label for='primerNombre{$instructor['documento']}' class='form-label'>Primer Nombre</label>
                                                    <input type='text' class='form-control' id='primerNombre{$instructor['documento']}' name='primerNombre' value='{$instructor['primerNombre']}' required>
                                                </div>
                                                <div class='mb-3'>
                                                    <label for='segundoNombre{$instructor['documento']}' class='form-label'>Segundo Nombre</label>
                                                    <input type='text' class='form-control' id='segundoNombre{$instructor['documento']}' name='segundoNombre' value='{$instructor['segundoNombre']}'>
                                                </div>
                                                <div class='mb-3'>
                                                    <label for='primerApellido{$instructor['documento']}' class='form-label'>Primer Apellido</label>
                                                    <input type='text' class='form-control' id='primerApellido{$instructor['documento']}' name='primerApellido' value='{$instructor['primerApellido']}' required>
                                                </div>
                                                <div class='mb-3'>
                                                    <label for='segundoApellido{$instructor['documento']}' class='form-label'>Segundo Apellido</label>
                                                    <input type='text' class='form-control' id='segundoApellido{$instructor['documento']}' name='segundoApellido' value='{$instructor['segundoApellido']}'>
                                                </div>
                                                <div class='mb-3'>
                                                    <label for='calle{$instructor['documento']}' class='form-label'>Calle</label>
                                                    <input type='text' class='form-control' id='calle{$instructor['documento']}' name='calle' value='{$instructor['calle']}' required>
                                                </div>
                                                <div class='mb-3'>
                                                    <label for='numeroPuerta{$instructor['documento']}' class='form-label'>Número de Puerta</label>
                                                    <input type='text' class='form-control' id='numeroPuerta{$instructor['documento']}' name='numeroPuerta' value='{$instructor['numeroPuerta']}' required>
                                                </div>
                                                <div class='mb-3'>
                                                    <label for='barrio{$instructor['documento']}' class='form-label'>Barrio</label>
                                                    <input type='text' class='form-control' id='barrio{$instructor['documento']}' name='barrio' value='{$instructor['barrio']}' required>
                                                </div>
                                                <div class='mb-3'>
                                                    <label for='localidad{$instructor['documento']}' class='form-label'>Localidad</label>
                                                    <input type='text' class='form-control' id='localidad{$instructor['documento']}' name='localidad' value='{$instructor['localidad']}' required>
                                                </div>
                                                <div class='mb-3'>
                                                    <label for='tel{$instructor['documento']}' class='form-label'>Teléfono</label>
                                                    <input type='text' class='form-control' id='tel{$instructor['documento']}' name='tel' value='{$instructor['tel']}' required>
                                                </div>
                                                <div class='mb-3'>
                                                    <label for='email{$instructor['documento']}' class='form-label'>Email</label>
                                                    <input type='email' class='form-control' id='email{$instructor['documento']}' name='email' value='{$instructor['email']}' required>
                                                </div>
                                                <div class='mb-3'>
                                                    <label for='pass{$instructor['documento']}' class='form-label'>Pass</label>
                                                    <input type='text' class='form-control' id='pass{$instructor['documento']}' name='pass' value='{$instructor['pass']}' required>
                                                </div>
                                        </div>

                                        <div class='modal-footer'>
                                            <button type='submit' class='btn btn-primary'>Actualizar</button>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                                        </div>
                                                
                                            </form>
                                        
                                    </div>
                                </div>
                            </div>";
                        }

                        $controlador->cerrarConexion();
                        ?>
                    </div>
                </div>
            </main>
        </div>
    </div>








    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>