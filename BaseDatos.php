<?php

/*************************************************************************************************************************************/

// En este archivo define la clase BaseDatos, que se encarga de interactuar con la base de datos MySQL utilizando la extensión MySQLi. 

/*************************************************************************************************************************************/

class BaseDatos
{
    /********************************************************************************/
    private $servidor;      // En Xampp es "localhost"
    private $usuario;       // En Xampp es "root"
    private $password;      // En Xampp es ""
    private $base_datos;    // base datos en phpmyadmin
    private $conexion;      // Para las operaciones con MySQL
    /********************************************************************************/
    public function __construct()
    {
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->password = "";
        $this->base_datos = "proyectoNexlanpruebas";            // --------------------------------------> Cambiar el nombre de la base de datos
        $this->conexion = $this->nueva("localhost", "root", "", "proyectoNexlanpruebas"); // ---------------> Cambiar el nombre de la base de datos
    }
    /*******************************************************************************/
    private function nueva($server, $user, $pass, $base)
    {
        try {
            $conectar = mysqli_connect($server, $user, $pass, $base);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        return $conectar;
    }
    /********************************************************************************/



<<<<<<< HEAD
                                                            /* FUNCIONES ESTUDIANTES */
/************************************************************************************************************************************************/
=======
    /* FUNCIONES ESTUDIANTES */
    /************************************************************************************************************************************************/
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258


// Alta Estudiante
    public function altaEstudiante($estudiante)
    {
<<<<<<< HEAD
=======
        session_start();
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
        $documento = $estudiante->getDocumento();
        $primerNombre = $estudiante->getPrimerNombre();
        $segundoNombre = $estudiante->getSegundoNombre();
        $primerApellido = $estudiante->getPrimerApellido();
        $segundoApellido = $estudiante->getSegundoApellido();
        $calle = $estudiante->getCalle();
        $numeroPuerta = $estudiante->getNumeroPuerta();
        $barrio = $estudiante->getBarrio();
        $localidad = $estudiante->getLocalidad();
        $tel = $estudiante->getTel();
        $email = $estudiante->getEmail();
        $pass = $estudiante->getPass();
        $teorico = 'pendiente';
<<<<<<< HEAD

        $insertar = "INSERT INTO estudiante (documento, primerNombre, segundoNombre, primerApellido, segundoApellido, calle, numeroPuerta, barrio, localidad, tel, email, pass, teorico) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($this->conexion, $insertar);
        if ($stmt === false) {
            die("Error al preparar la sentencia: " . mysqli_error($this->conexion));
        }
        mysqli_stmt_bind_param($stmt, "sssssssssssss", $documento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass, $teorico);

        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $resultado;
=======
        $rol = 'estudiante';

        try {
            // Primero quiero verificar si el documento a asignar ya existe en la tabla usuarios
            $verificarDocumento = "SELECT id FROM usuarios WHERE documento = '$documento'";
            $resultadoDocumento = mysqli_query($this->conexion, $verificarDocumento);

            // Si el documento ya existe en la tabla usuarios, lanzar una excepción
            if (mysqli_num_rows($resultadoDocumento) > 0) {
                throw new Exception("Ya existe un usuario con el documento asignado.");
            }

            // Segundo quiero verificar si el email ya existe en la tabla usuarios
            $verificarEmail = "SELECT id FROM usuarios WHERE email = '$email'";
            $resultadoEmail = mysqli_query($this->conexion, $verificarEmail);

            // Si el email ya existe en la tabla usuarios, lanzar una excepción
            if (mysqli_num_rows($resultadoEmail) > 0) {
                throw new Exception("El email asignado ya existe.");
            }

            // Ni el documento ni el email existen en la tabla usuarios, entonces puedo insertar
            $insertarUsuario = "INSERT INTO usuarios (documento, email, pass, rol) VALUES ('$documento', '$email', '$pass', '$rol')";
            $resultadoUsuario = mysqli_query($this->conexion, $insertarUsuario);

            // Si no se pudo insertar en la tabla usuarios, debido a errores externos, lanzar una excepción
            if (!$resultadoUsuario) {
                throw new Exception("Error al insertar en la tabla usuarios: " . mysqli_error($this->conexion));
            }

            // Insertar en la tabla estudiante
            $insertarEstudiante = "INSERT INTO estudiante (usuario_id, documento, primerNombre, segundoNombre, primerApellido, segundoApellido, calle, numeroPuerta, barrio, localidad, tel, teorico) 
                     VALUES ((SELECT MAX(id) AS usuario_id FROM usuarios), '$documento', '$primerNombre', '$segundoNombre', '$primerApellido', '$segundoApellido', '$calle', '$numeroPuerta', '$barrio', '$localidad', '$tel', '$teorico')";
            $resultadoEstudiante = mysqli_query($this->conexion, $insertarEstudiante);

            // Si no se pudo insertar en la tabla estudiante, debido a errores externos, lanzar una excepción
            if (!$resultadoEstudiante) {
                throw new Exception("Error al insertar en la tabla estudiante: " . mysqli_error($this->conexion));
            }

            // Si todo salió bien, se muestra un mensaje de éxito con el nombre del estudiante
            $_SESSION['status'] = 'success';
            $_SESSION['operation'] = 'alta';
            $_SESSION['nombre_estudiante'] = $primerNombre . ' ' . $primerApellido;
        } catch (Exception $e) {
            // Si hubo algún error, se muestra un mensaje de error con el detalle del error
            error_log($e->getMessage());
            $_SESSION['status'] = 'error';
            $_SESSION['operation'] = 'alta';
            $_SESSION['error_message'] = 'Error: ' . $e->getMessage();
        }
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
    }




// Listar Estudiantes
    public function listarEstudiantes()
    {
<<<<<<< HEAD
        $resultado = mysqli_query($this->conexion, "select * from estudiante where activo = TRUE"); 
=======
        $resultado = mysqli_query($this->conexion, "select * from estudiante where activo = TRUE");
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
        $arreglo = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $arreglo;
    }



<<<<<<< HEAD

=======
    /**************************************** REVISAR/ARREGLAR ****************************************/ 
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
// Baja Estudiante
    public function bajaEstudiante($documento)
    {
        $query = "UPDATE estudiante SET activo = 0 WHERE documento = ?";
        $stmt = mysqli_prepare($this->conexion, $query);
        if ($stmt === false) {
            die("Error al preparar la sentencia: " . mysqli_error($this->conexion));
        }
        mysqli_stmt_bind_param($stmt, "s", $documento);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $resultado;
    }




// Buscar Estudiantes
    public function buscarEstudiantes($termino)
    {
<<<<<<< HEAD
        $consulta = "SELECT * FROM estudiante 
            WHERE 
            (documento LIKE '%$termino%' 
            OR 
            primerNombre LIKE '%$termino%' 
            OR 
            primerApellido LIKE '%$termino%'
            OR
            segundoNombre LIKE '%$termino%'
            OR
            segundoApellido LIKE '%$termino%')
            AND activo = TRUE"; 
=======
        $consulta = "SELECT estudiante.*, usuarios.email ,usuarios.pass FROM estudiante, usuarios 
            WHERE 
            (estudiante.documento LIKE '%$termino%' 
            OR 
            estudiante.primerNombre LIKE '%$termino%' 
            OR 
            estudiante.primerApellido LIKE '%$termino%'
            OR
            estudiante.segundoNombre LIKE '%$termino%'
            OR
            estudiante.segundoApellido LIKE '%$termino%') 
            AND estudiante.usuario_id = usuarios.id
            AND estudiante.activo = TRUE 
            ORDER BY estudiante.IDEstudiante ASC";
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258

        $resultado = mysqli_query($this->conexion, $consulta);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
<<<<<<< HEAD
            $estudiantes = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            return $estudiantes;
=======
            $estudiante = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            return $estudiante;
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
        } else {
            return [];
        }
    }




<<<<<<< HEAD
// Modificar Estudiante
    public function modificarEstudiante($IDEstudiante, $documento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass, $teorico)
    {
        $modificar = "UPDATE estudiante SET 
                primerNombre = '$primerNombre',
                segundoNombre = '$segundoNombre',
                primerApellido = '$primerApellido',
                segundoApellido = '$segundoApellido',
                calle = '$calle',
                numeroPuerta = '$numeroPuerta',
                barrio = '$barrio',
                localidad = '$localidad',
                tel = '$tel',
                email = '$email',
                pass = '$pass',
                teorico = '$teorico'
             WHERE documento = '$documento'";

        return mysqli_query($this->conexion, $modificar);
    }


/************************************************************************************************************************************************/

                                                           /* FUNCIONES VEHICULOS */
/************************************************************************************************************************************************/


// Alta Vehiculo
public function altaVehiculo($vehiculo)
{
    $ID_Vehiculos = $vehiculo->getID_Vehiculos();
    $Matricula = $vehiculo->getMatricula();
    $tipoId = $vehiculo->getTipoId();
    $Modelo = $vehiculo->getModelo();
    $Marca = $vehiculo->getMarca();
    $AnioFabricacion = $vehiculo->getAnioFabricacion();
    $Color = $vehiculo->getColor();
    $Precio = $vehiculo->getPrecio();
    $Estado = $vehiculo->getEstado();
    $kilometraje = $vehiculo->getKilometraje();
    

    $insertar = "INSERT INTO vehiculos (ID_Vehiculos, Matricula, tipoId, Modelo, Marca, AnioFabricacion, Color, Precio, Estado, kilometraje) 
             VALUES ('$ID_Vehiculos' , '$Matricula', '$tipoId', '$Modelo', '$Marca', '$AnioFabricacion', '$Color', '$Precio', '$Estado', '$kilometraje')";

    return mysqli_query($this->conexion, $insertar);
}
=======
    /**************************************** REVISAR/ARREGLAR ****************************************/ 
// Modificar Estudiante
    public function modificarEstudiante($IDEstudiante, $documento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass, $teorico)
    {
        // Obtener el usuario_id del estudiante
        $consultaUsuarioId = "SELECT usuario_id FROM estudiante WHERE documento = '$documento'";
        $resultadoUsuarioId = mysqli_query($this->conexion, $consultaUsuarioId);
        if ($resultadoUsuarioId && mysqli_num_rows($resultadoUsuarioId) > 0) {
            $fila = mysqli_fetch_assoc($resultadoUsuarioId);
            $usuarioId = $fila['usuario_id'];
        } else {
            die("Error al obtener el usuario_id del estudiante: " . mysqli_error($this->conexion));
        }

        // Modificar el email y pass en la tabla usuarios
        $modificarUsuario = "UPDATE usuarios SET 
                        email = '$email',
                        pass = '$pass'
                     WHERE id = '$usuarioId'";
        $resultadoModificarUsuario = mysqli_query($this->conexion, $modificarUsuario);
        if (!$resultadoModificarUsuario) {
            die("Error al modificar la tabla usuarios: " . mysqli_error($this->conexion));
        }

        // Modificar los demás campos en la tabla estudiante
        $modificarEstudiante = "UPDATE estudiante SET 
                        primerNombre = '$primerNombre',
                        segundoNombre = '$segundoNombre',
                        primerApellido = '$primerApellido',
                        segundoApellido = '$segundoApellido',
                        calle = '$calle',
                        numeroPuerta = '$numeroPuerta',
                        barrio = '$barrio',
                        localidad = '$localidad',
                        tel = '$tel',
                        teorico = '$teorico'
                     WHERE documento = '$documento'";
        $resultadoModificarEstudiante = mysqli_query($this->conexion, $modificarEstudiante);
        if (!$resultadoModificarEstudiante) {
            die("Error al modificar la tabla estudiante: " . mysqli_error($this->conexion));
        }

        return $resultadoModificarEstudiante;
    }


    /************************************************************************************************************************************************/

    /* FUNCIONES VEHICULOS */
    /************************************************************************************************************************************************/


// Alta Vehiculo
    public function altaVehiculo($vehiculo)
    {
        session_start();
        $ID_Vehiculos = $vehiculo->getID_Vehiculos();
        $Matricula = $vehiculo->getMatricula();
        $tipoId = $vehiculo->getTipoId();
        $Modelo = $vehiculo->getModelo();
        $Marca = $vehiculo->getMarca();
        $AnioFabricacion = $vehiculo->getAnioFabricacion();
        $Color = $vehiculo->getColor();
        $Precio = $vehiculo->getPrecio();
        $Estado = $vehiculo->getEstado();
        $kilometraje = $vehiculo->getKilometraje();

        try {
            // Verificar si la matrícula ya existe en la tabla vehiculos
            $verificarMatricula = "SELECT ID_Vehiculos FROM vehiculos WHERE Matricula = '$Matricula'";
            $resultadoMatricula = mysqli_query($this->conexion, $verificarMatricula);

            // Si la matrícula ya existe en la tabla vehiculos, lanzar una excepción
            if (mysqli_num_rows($resultadoMatricula) > 0) {
                throw new Exception("Ya existe un vehículo con la matrícula asignada.");
            }

            // Insertar en la tabla vehiculos
            $insertarVehiculo = "INSERT INTO vehiculos (ID_Vehiculos, Matricula, tipoId, Modelo, Marca, AnioFabricacion, Color, Precio, Estado, kilometraje) 
                             VALUES ('$ID_Vehiculos', '$Matricula', '$tipoId', '$Modelo', '$Marca', '$AnioFabricacion', '$Color', '$Precio', '$Estado', '$kilometraje')";
            $resultadoVehiculo = mysqli_query($this->conexion, $insertarVehiculo);

            // Si no se pudo insertar en la tabla vehiculos, debido a errores externos, lanzar una excepción
            if (!$resultadoVehiculo) {
                throw new Exception("Error al insertar en la tabla vehiculos: " . mysqli_error($this->conexion));
            }

            // Si todo salió bien, se muestra un mensaje de éxito con la matrícula del vehículo
            $_SESSION['status'] = 'success';
            $_SESSION['operation'] = 'alta';
            $_SESSION['matricula_vehiculo'] = $Matricula;
        } catch (Exception $e) {
            // Si hubo algún error, se muestra un mensaje de error con el detalle del error
            error_log($e->getMessage());
            $_SESSION['status'] = 'error';
            $_SESSION['operation'] = 'alta';
            $_SESSION['error_message'] = 'Error: ' . $e->getMessage();
        }
    }
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258




// Mostrar Vehiculos    
<<<<<<< HEAD
public function listarVehiculos()
{
    $resultado = mysqli_query($this->conexion, "select * from vehiculos where activo = TRUE"); 
    $arreglo = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $arreglo;
}
=======
    public function listarVehiculos()
    {
        $resultado = mysqli_query($this->conexion, "select * from vehiculos where activo = TRUE");
        $arreglo = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $arreglo;
    }
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258




// Baja Vehiculo
<<<<<<< HEAD
public function bajaVehiculo($Matricula)
{
    $query = "UPDATE vehiculos SET activo = 0 WHERE Matricula = ?";
    $stmt = mysqli_prepare($this->conexion, $query);
    if ($stmt === false) {
        die("Error al preparar la sentencia: " . mysqli_error($this->conexion));
    }
    mysqli_stmt_bind_param($stmt, "s", $Matricula);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $resultado;
}


// Buscar Vehiculo
public function buscarVehiculo($termino)
{
    $consulta = "SELECT * FROM vehiculos 
=======
    public function bajaVehiculo($Matricula)
    {
        $query = "UPDATE vehiculos SET activo = 0 WHERE Matricula = ?";
        $stmt = mysqli_prepare($this->conexion, $query);
        if ($stmt === false) {
            die("Error al preparar la sentencia: " . mysqli_error($this->conexion));
        }
        mysqli_stmt_bind_param($stmt, "s", $Matricula);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $resultado;
    }

    public function traerVehiculos()
    {
        $consulta = "SELECT * FROM vehiculos";
        $resultado = mysqli_query($this->conexion, $consulta);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $vehiculos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            return $vehiculos;
        } else {
            return [];
        }
    }


    // Buscar Vehiculo
    public function buscarVehiculo($termino)
    {
        $consulta = "SELECT * FROM vehiculos 
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
             WHERE 
             (Matricula LIKE '%$termino%' 
             OR 
             Modelo LIKE '%$termino%' 
             OR 
             Marca LIKE '%$termino%') 
             AND activo = TRUE";

<<<<<<< HEAD
    $resultado = mysqli_query($this->conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $vehiculo = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $vehiculo;
    } else {
        return [];
    }
}


// Modificar Vehiculo
public function modificarVehiculo($ID_Vehiculos, $Matricula, $tipoId, $Modelo, $Marca, $AnioFabricacion, $Color, $Precio, $Estado, $kilometraje)
{
    $modificar = "UPDATE vehiculos SET 
=======
        $resultado = mysqli_query($this->conexion, $consulta);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $vehiculo = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            return $vehiculo;
        } else {
            return [];
        }
    }


    // Modificar Vehiculo
    public function modificarVehiculo($ID_Vehiculos, $Matricula, $tipoId, $Modelo, $Marca, $AnioFabricacion, $Color, $Precio, $Estado, $kilometraje)
    {
        $modificar = "UPDATE vehiculos SET 
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
                ID_Vehiculos = '$ID_Vehiculos',
                Matricula = '$Matricula',
                tipoId = '$tipoId',
                Modelo = '$Modelo',
                Marca = '$Marca',
                AnioFabricacion = '$AnioFabricacion',
                Color = '$Color',
                Precio = '$Precio',
                Estado = '$Estado',
                kilometraje = '$kilometraje'
                
             WHERE ID_Vehiculos = '$ID_Vehiculos'";

<<<<<<< HEAD
    return mysqli_query($this->conexion, $modificar);
}


/************************************************************************************************************************************************/




                                                            /* FUNCIONES EVENTOS */
/************************************************************************************************************************************************/


// Mostrar Eventos
public function listarEventos()
{
    $consulta = "SELECT 
                    clases.id, 
                    clases.title, 
                    clases.start, 
                    clases.descripcion, 
                    clases.time, 
                    clases.color,
                    clases.monto,
                    clases.categoria,
                    CONCAT(instructor.primerNombre, ' ', instructor.primerApellido) AS instructor,
                    CONCAT(estudiante.primerNombre, ' ', estudiante.primerApellido) AS estudiante,
                    CONCAT(vehiculos.Marca, ' ', vehiculos.Modelo) AS vehiculo
                FROM 
                    clases, instructor, estudiante, vehiculos
                WHERE 
                    clases.activo = TRUE
                    AND clases.IDInstructor = instructor.IDInstructor
                    AND clases.IDEstudiante = estudiante.IDEstudiante
                    AND clases.ID_Vehiculos = vehiculos.ID_Vehiculos;";

    $resultado = mysqli_query($this->conexion, $consulta);

    if ($resultado) {
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    } else {
        return [];
    }
}





// Alta Evento
public function altaEvento($titulo, $fecha, $descripcion, $hora, $color, $tipo, $IDInstructor, $ID_Vehiculos, $IDEstudiante, $categoria)
{
    if ($tipo == 'Teórico') {
        $color = '#800020';
    } else {
        $color = '#3355ff';
    }

    $insertarClases = "INSERT INTO clases (title, start, time, descripcion, color, tipo, IDInstructor, ID_Vehiculos, IDEstudiante, categoria) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($this->conexion, $insertarClases);
    mysqli_stmt_bind_param($stmt, "ssssssiiis", $titulo, $fecha, $hora, $descripcion, $color, $tipo, $IDInstructor, $ID_Vehiculos, $IDEstudiante, $categoria);
    
    if (mysqli_stmt_execute($stmt)) {
        $idCurso = mysqli_insert_id($this->conexion);

        // Verificar si la combinación ya existe
        $verificarUsan = "SELECT * FROM usan WHERE ID_Vehiculos = '$ID_Vehiculos' AND IDEstudiante = '$IDEstudiante'";
        $resultadoVerificar = mysqli_query($this->conexion, $verificarUsan);

        if (mysqli_num_rows($resultadoVerificar) == 0) {
            $insertarUsan = "INSERT INTO usan (ID_Vehiculos, IDEstudiante) VALUES ('$ID_Vehiculos', '$IDEstudiante')";
            $resultadoUsan = mysqli_query($this->conexion, $insertarUsan);
        } else {
            $resultadoUsan = true; // Ya existe, no es necesario insertar
        }

        $insertarDictan = "INSERT INTO dictan (IDInstructor, idCurso, fechaHoraDicta) VALUES ('$IDInstructor', '$idCurso', '$fecha $hora')";
        $resultadoDictan = mysqli_query($this->conexion, $insertarDictan);

        $insertarCursan = "INSERT INTO cursan (IDEstudiante, idCurso, fechaHoraCursan) VALUES ('$IDEstudiante', '$idCurso', '$fecha $hora')";
=======
        return mysqli_query($this->conexion, $modificar);
    }


    /************************************************************************************************************************************************/




    /* FUNCIONES EVENTOS */
    /************************************************************************************************************************************************/


    // Mostrar Eventos
    public function listarEventos($usuarioEmail, $rol)
    {
        if ($rol === 'admin') {
            $consulta = "SELECT 
                        clases.id, 
                        clases.title, 
                        clases.start, 
                        clases.descripcion, 
                        clases.time, 
                        clases.color,
                        CONCAT(instructor.primerNombre, ' ', instructor.primerApellido) AS instructor,
                        CONCAT(estudiante.primerNombre, ' ', estudiante.primerApellido) AS estudiante,
                        CONCAT(vehiculos.Marca, ' ', vehiculos.Modelo) AS vehiculo
                        FROM clases, instructor, estudiante, vehiculos
                        WHERE clases.IDInstructor = instructor.IDInstructor
                        AND clases.IDEstudiante = estudiante.IDEstudiante
                        AND clases.ID_Vehiculos = vehiculos.ID_Vehiculos
                        AND clases.activo = TRUE";
        } else {
            $consulta = "SELECT 
                        clases.id, 
                        clases.title, 
                        clases.start, 
                        clases.descripcion, 
                        clases.time, 
                        clases.color,
                        CONCAT(instructor.primerNombre, ' ', instructor.primerApellido) AS instructor,
                        CONCAT(estudiante.primerNombre, ' ', estudiante.primerApellido) AS estudiante,
                        CONCAT(vehiculos.Marca, ' ', vehiculos.Modelo) AS vehiculo
                        FROM clases, estudiante, usuarios, instructor, vehiculos
                        WHERE clases.IDEstudiante = estudiante.IDEstudiante
                        AND clases.IDInstructor = instructor.IDInstructor
                        AND clases.ID_Vehiculos = vehiculos.ID_Vehiculos
                        AND estudiante.usuario_id = usuarios.id
                        AND usuarios.email = '$usuarioEmail'
                        AND clases.activo = TRUE";
        }

        $resultado = mysqli_query($this->conexion, $consulta);

        if ($resultado) {
            return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        } else {
            return [];
        }
    }




    // Alta Evento
    public function altaEvento($titulo, $fecha, $descripcion, $hora, $color, $tipo, $IDInstructor, $ID_Vehiculos, $IDEstudiante)
    {
        if ($tipo == 'Teórico') {
            $color = '#800020';
        } else {
            $color = '#3355ff';
        }

        $insertarClases = "INSERT INTO clases (title, start, time, descripcion, color, tipo, IDInstructor, ID_Vehiculos, IDEstudiante) VALUES ('$titulo', '$fecha', '$hora', '$descripcion', '$color', '$tipo', '$IDInstructor', '$ID_Vehiculos', '$IDEstudiante')";
        $resultadoInsertar = mysqli_query($this->conexion, $insertarClases);

        $insertarUsan = "INSERT INTO usan (ID_Vehiculos, IDEstudiante) VALUES ('$ID_Vehiculos', '$IDEstudiante')";
        $resultadoUsan = mysqli_query($this->conexion, $insertarUsan);


        $insertarDictan = "INSERT INTO dictan (IDInstructor, idCurso, fechaHoraDicta) VALUES ('$IDInstructor', (SELECT MAX(id) AS idCurso FROM clases), '$fecha $hora')";
        $resultadoDictan = mysqli_query($this->conexion, $insertarDictan);

        $insertarCursan = "INSERT INTO cursan (IDEstudiante, idCurso, fechaHoraCursan) VALUES ('$IDEstudiante', (SELECT MAX(id) AS idCurso FROM clases), '$fecha $hora')";
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
        $resultadoCursan = mysqli_query($this->conexion, $insertarCursan);

        if ($resultadoUsan && $resultadoDictan && $resultadoCursan) {
            return true;
        }
    }

<<<<<<< HEAD
    return false;
}

/*
public function altaEvento($titulo, $fecha, $descripcion, $hora, $color, $tipo, $IDInstructor, $ID_Vehiculos, $IDEstudiante)
{
    if ($tipo == 'Teórico') {
        $color = '#800020';
    } else {
        $color = '#3355ff';
    }

    // Iniciar transacción
    mysqli_begin_transaction($this->conexion);

    try {
        $insertarClase = "INSERT INTO clases (title, start, time, descripcion, color, tipo, IDInstructor, ID_Vehiculos, IDEstudiante) VALUES ('$titulo', '$fecha', '$hora', '$descripcion', '$color', '$tipo', '$IDInstructor', '$ID_Vehiculos', '$IDEstudiante')";
        $resultadoClase = mysqli_query($this->conexion, $insertarClase);

        if (!$resultadoClase) {
            throw new Exception("Error al insertar en la tabla clases");
        }

        $insertarUsan = "INSERT INTO usan (ID_Vehiculos, IDEstudiante) VALUES ('$ID_Vehiculos', '$IDEstudiante')";
        $resultadoUsan = mysqli_query($this->conexion, $insertarUsan);

        if (!$resultadoUsan) {
            throw new Exception("Error al insertar en la tabla usan");
        }

        // Confirmar transacción
        mysqli_commit($this->conexion);
        return true;
    } catch (Exception $e) {
        // Revertir transacción en caso de error
        mysqli_rollback($this->conexion);
        return false;
    }
} */




// Modificar Evento
=======


    // Modificar Evento
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
    public function modificarEvento($id, $titulo, $inicio, $descripcion, $hora)
    {
        $consulta = "UPDATE clases SET 
                 title = ?, 
                 start = ?, 
                 descripcion = ?,
                 time = ?
                 WHERE id = ?";

        $stmt = mysqli_prepare($this->conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "ssssi", $titulo, $inicio, $descripcion, $hora, $id);

        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $resultado;
    }




<<<<<<< HEAD
// Baja Evento
    public function bajaEvento($id)
    {
        $consulta = "UPDATE clases SET activo = 0 WHERE id = ?";
        
=======
    // Baja Evento
    public function bajaEvento($id)
    {
        $consulta = "UPDATE clases SET activo = 0 WHERE id = ?";
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258

        $stmt = mysqli_prepare($this->conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "i", $id);

        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $resultado;
    }


<<<<<<< HEAD
/************************************************************************************************************************************************/
=======
    /************************************************************************************************************************************************/
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258






<<<<<<< HEAD
                                                            /* FUNCIONES INSTRUCTORES */
/************************************************************************************************************************************************/


// Alta Instructor
    public function altaInstructor($instructor)
    {
        $IDInstructor = $instructor->getIdInstructor();
=======
    /* FUNCIONES INSTRUCTORES */
    /************************************************************************************************************************************************/


    // Alta Instructor
    public function altaInstructor($instructor)
    {
        session_start();
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
        $documento = $instructor->getDocumento();
        $primerNombre = $instructor->getPrimerNombre();
        $segundoNombre = $instructor->getSegundoNombre();
        $primerApellido = $instructor->getPrimerApellido();
        $segundoApellido = $instructor->getSegundoApellido();
        $calle = $instructor->getCalle();
        $numeroPuerta = $instructor->getNumeroPuerta();
        $barrio = $instructor->getBarrio();
        $localidad = $instructor->getLocalidad();
        $tel = $instructor->getTel();
        $email = $instructor->getEmail();
        $pass = $instructor->getPass();
<<<<<<< HEAD

        $insertar = "INSERT INTO instructor (IDInstructor, documento, primerNombre, segundoNombre, primerApellido, segundoApellido, calle, numeroPuerta, barrio, localidad, tel, email, pass) 
                 VALUES ('$IDInstructor' , '$documento', '$primerNombre', '$segundoNombre', '$primerApellido', '$segundoApellido', '$calle', '$numeroPuerta', '$barrio', '$localidad', '$tel', '$email', '$pass')";

        return mysqli_query($this->conexion, $insertar);
=======
        $rol = 'instructor';

        try {
            // Verificar si el documento ya existe en la tabla usuarios
            $verificarDocumento = "SELECT id FROM usuarios WHERE documento = '$documento'";
            $resultadoDocumento = mysqli_query($this->conexion, $verificarDocumento);

            if (mysqli_num_rows($resultadoDocumento) > 0) {
                throw new Exception("Ya existe un usuario con el documento asignado.");
            }

            // Verificar si el email ya existe en la tabla usuarios
            $verificarEmail = "SELECT id FROM usuarios WHERE email = '$email'";
            $resultadoEmail = mysqli_query($this->conexion, $verificarEmail);

            if (mysqli_num_rows($resultadoEmail) > 0) {
                throw new Exception("El email asignado ya existe.");
            }

            // Insertar en la tabla usuarios
            $insertarUsuario = "INSERT INTO usuarios (documento, email, pass, rol) VALUES ('$documento', '$email', '$pass', '$rol')";
            $resultadoUsuario = mysqli_query($this->conexion, $insertarUsuario);

            if (!$resultadoUsuario) {
                throw new Exception("Error al insertar en la tabla usuarios: " . mysqli_error($this->conexion));
            }

            // Insertar en la tabla instructor
            $insertarInstructor = "INSERT INTO instructor (usuario_id, documento, primerNombre, segundoNombre, primerApellido, segundoApellido, calle, numeroPuerta, barrio, localidad, tel) 
                     VALUES ((SELECT MAX(id) AS usuario_id FROM usuarios), '$documento', '$primerNombre', '$segundoNombre', '$primerApellido', '$segundoApellido', '$calle', '$numeroPuerta', '$barrio', '$localidad', '$tel')";
            $resultadoInstructor = mysqli_query($this->conexion, $insertarInstructor);

            if (!$resultadoInstructor) {
                throw new Exception("Error al insertar en la tabla instructor: " . mysqli_error($this->conexion));
            }

            // Si todo salió bien, se muestra un mensaje de éxito con el nombre del instructor
            $_SESSION['status'] = 'success';
            $_SESSION['operation'] = 'alta';
            $_SESSION['nombre_instructor'] = $primerNombre . ' ' . $primerApellido;
        } catch (Exception $e) {
            // Si hubo algún error, se muestra un mensaje de error con el detalle del error
            error_log($e->getMessage());
            $_SESSION['status'] = 'error';
            $_SESSION['operation'] = 'alta';
            $_SESSION['error_message'] = 'Error: ' . $e->getMessage();
        }
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
    }




<<<<<<< HEAD
// Mostrar Instructores    
    public function listarInstructores()
    {
        $resultado = mysqli_query($this->conexion, "select * from instructor where activo = TRUE"); 
        $arreglo = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $arreglo;
    }

    


// Baja Instructor
    public function bajaInstructor($documento)
    {
        $query = "UPDATE instructor SET activo = 0 WHERE documento = ?";
        $stmt = mysqli_prepare($this->conexion, $query);
        if ($stmt === false) {
            die("Error al preparar la sentencia: " . mysqli_error($this->conexion));
        }
        mysqli_stmt_bind_param($stmt, "s", $documento);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
=======
    public function listarInstructores()
    {
        $query = "SELECT instructor.*, usuarios.email, usuarios.pass FROM instructor, usuarios 
            WHERE 
            instructor.usuario_id = usuarios.id
            AND instructor.activo = TRUE 
            ORDER BY instructor.IDInstructor ASC";
        $resultado = mysqli_query($this->conexion, $query);
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }



    /**************************************** REVISAR/ARREGLAR ****************************************/ 
    // Baja Instructor
    public function bajaInstructor($documento)
    {
        $query = "UPDATE instructor SET activo = 0 WHERE documento = '$documento'";
        $resultado = mysqli_query($this->conexion, $query);
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
        return $resultado;
    }


<<<<<<< HEAD


// Buscar Instructor
public function buscarInstructor($termino)
{
    $consulta = "SELECT * FROM instructor 
            WHERE 
            (documento LIKE '%$termino%' 
            OR 
            primerNombre LIKE '%$termino%' 
            OR 
            primerApellido LIKE '%$termino%'
            OR
            segundoNombre LIKE '%$termino%'
            OR
            segundoApellido LIKE '%$termino%')
            AND activo = TRUE"; 

    $resultado = mysqli_query($this->conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $instructor = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $instructor;
    } else {
        return [];
    }
}




// Modificar Instructor
    public function modificarInstructor($IDInstructor, $documento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass, $horasDictadas)
    {
        $modificar = "UPDATE instructor SET 
                    primerNombre = '$primerNombre',
                    segundoNombre = '$segundoNombre',
                    primerApellido = '$primerApellido',
                    segundoApellido = '$segundoApellido',
                    calle = '$calle',
                    numeroPuerta = '$numeroPuerta',
                    barrio = '$barrio',
                    localidad = '$localidad',
                    tel = '$tel',
                    email = '$email',
                    pass = '$pass',
                    horasDictadas = '$horasDictadas'
                 WHERE documento = '$documento'";

        return mysqli_query($this->conexion, $modificar);
    }


/************************************************************************************************************************************************/
=======
    /**************************************** REVISAR/ARREGLAR ****************************************/ 
    // Modificar Instructor
    public function modificarInstructor($IDInstructor, $documento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass, $horasDictadas)
    {
        // Obtener el usuario_id del instructor
        $consultaUsuarioId = "SELECT usuario_id FROM instructor WHERE documento = '$documento'";
        $resultadoUsuarioId = mysqli_query($this->conexion, $consultaUsuarioId);
        if ($resultadoUsuarioId && mysqli_num_rows($resultadoUsuarioId) > 0) {
            $fila = mysqli_fetch_assoc($resultadoUsuarioId);
            $usuarioId = $fila['usuario_id'];
        } else {
            die("Error al obtener el usuario_id del instructor: " . mysqli_error($this->conexion));
        }

        // Modificar el email y pass en la tabla usuarios
        $modificarUsuario = "UPDATE usuarios SET 
                        email = '$email',
                        pass = '$pass'
                     WHERE id = '$usuarioId'";
        $resultadoModificarUsuario = mysqli_query($this->conexion, $modificarUsuario);
        if (!$resultadoModificarUsuario) {
            die("Error al modificar la tabla usuarios: " . mysqli_error($this->conexion));
        }

        // Modificar los demás campos en la tabla instructor
        $modificarInstructor = "UPDATE instructor SET 
                        primerNombre = '$primerNombre',
                        segundoNombre = '$segundoNombre',
                        primerApellido = '$primerApellido',
                        segundoApellido = '$segundoApellido',
                        calle = '$calle',
                        numeroPuerta = '$numeroPuerta',
                        barrio = '$barrio',
                        localidad = '$localidad',
                        tel = '$tel',
                        horasDictadas = '$horasDictadas'
                     WHERE documento = '$documento'";
        $resultadoModificarInstructor = mysqli_query($this->conexion, $modificarInstructor);
        if (!$resultadoModificarInstructor) {
            die("Error al modificar la tabla instructor: " . mysqli_error($this->conexion));
        }

        return $resultadoModificarInstructor;
    }


    /************************************************************************************************************************************************/
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258






<<<<<<< HEAD
                                                            /* FUNCIONES ADICIONALES */
/************************************************************************************************************************************************/


// Listar total de estudiantes en inicio.php
=======
    /* FUNCIONES ADICIONALES */
    /************************************************************************************************************************************************/


    // Listar total de estudiantes en inicio.php
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
    public function listarTotalEstudiantes()
    {
        $enumerar = "SELECT COUNT(*) AS total_estudiantes FROM estudiante WHERE activo = TRUE;";

        $resultado = mysqli_query($this->conexion, $enumerar);
        if ($resultado) {
            return mysqli_fetch_assoc($resultado);
        } else {
            return null;
        }
    }




<<<<<<< HEAD
// Listar total de instructores en inicio.php
=======
    // Listar total de instructores en inicio.php
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
    public function listarTotalInstructores()
    {
        $enumerar = "SELECT COUNT(*) AS total_instructores FROM instructor WHERE activo = TRUE;";

        $resultado = mysqli_query($this->conexion, $enumerar);
        if ($resultado) {
            return mysqli_fetch_assoc($resultado);
        } else {
            return null;
        }
    }


    // Listar total de estudiantes con el exámen teórico aprobado en inicio.php
    public function listarTotalEstudiantesAprobados()
<<<<<<< HEAD
{
    $consulta = "SELECT COUNT(*) AS total_estudiantes_aprobados FROM estudiante WHERE teorico = 'aprobado' AND activo = TRUE;";
    
    $resultado = mysqli_query($this->conexion, $consulta);
    if ($resultado) {
        return mysqli_fetch_assoc($resultado);
    } else {
        return null;
    }
}

//Listar total de vehiculos que se encuentran "En mantenimiento" en inicio.php
public function listarTotalVehiculosMantenimiento()
{
    $consulta = "SELECT COUNT(*) AS total_vehiculos_mantenimiento FROM vehiculos WHERE Estado = 'En mantenimiento' AND activo = TRUE;";
    
    $resultado = mysqli_query($this->conexion, $consulta);
    if ($resultado) {
        return mysqli_fetch_assoc($resultado);
    } else {
        return null;
    }
}

//Al momento de crear un evento (clase), se debe seleccionar un instructor qué esté activo (es decir, que exista en la base de datos)
public function obtenerInstructores()
{
    $consulta = "SELECT IDInstructor, primerNombre, primerApellido FROM instructor WHERE activo = TRUE";
    $resultado = mysqli_query($this->conexion, $consulta);

    if ($resultado) {
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

//Al momento de crear un evento (clase), se debe seleccionar un estudiante qué esté activo (es decir, que exista en la base de datos)
public function obtenerEstudiantes()
{
    $consulta = "SELECT IDEstudiante, primerNombre, primerApellido FROM estudiante WHERE activo = TRUE";
    $resultado = mysqli_query($this->conexion, $consulta);

    if ($resultado) {
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    } else {
        return [];
    }
}


//Al momento de crear un evento (clase), se debe seleccionar un vehículo qué esté activo (es decir, que exista en la base de datos)
public function obtenerVehiculos()
{
    $consulta = "SELECT ID_Vehiculos, Matricula, Modelo, Marca FROM vehiculos WHERE activo = TRUE";
    $resultado = mysqli_query($this->conexion, $consulta);

    if ($resultado) {
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

//Listar monto total que se encuentra en inicio.php
public function obtenerMontoTotal() {
    $consulta = "SELECT SUM(monto) AS total_monto FROM clases";
    $resultado = mysqli_query($this->conexion, $consulta);

    // Verificar si la consulta fue exitosa y obtener una sola fila
    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        return $fila ? $fila : ['total_monto' => 0];  // Retornar total_monto o 0
    } else {
        return ['total_monto' => 0];
    }
}
=======
    {
        $consulta = "SELECT COUNT(*) AS total_estudiantes_aprobados FROM estudiante WHERE teorico = 'aprobado' AND activo = TRUE;";

        $resultado = mysqli_query($this->conexion, $consulta);
        if ($resultado) {
            return mysqli_fetch_assoc($resultado);
        } else {
            return null;
        }
    }

    //Listar total de vehiculos que se encuentran "En mantenimiento" en inicio.php
    public function listarTotalVehiculosMantenimiento()
    {
        $consulta = "SELECT COUNT(*) AS total_vehiculos_mantenimiento FROM vehiculos WHERE Estado = 'En mantenimiento' AND activo = TRUE;";

        $resultado = mysqli_query($this->conexion, $consulta);
        if ($resultado) {
            return mysqli_fetch_assoc($resultado);
        } else {
            return null;
        }
    }

    //Al momento de crear un evento (clase), se debe seleccionar un instructor qué esté activo (es decir, que exista en la base de datos)
    public function obtenerInstructores()
    {
        $consulta = "SELECT IDInstructor, primerNombre, primerApellido FROM instructor WHERE activo = TRUE";
        $resultado = mysqli_query($this->conexion, $consulta);

        if ($resultado) {
            return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    //Al momento de crear un evento (clase), se debe seleccionar un estudiante qué esté activo (es decir, que exista en la base de datos)
    public function obtenerEstudiantes()
    {
        $consulta = "SELECT IDEstudiante, primerNombre, primerApellido FROM estudiante WHERE activo = TRUE";
        $resultado = mysqli_query($this->conexion, $consulta);

        if ($resultado) {
            return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        } else {
            return [];
        }
    }


    //Al momento de crear un evento (clase), se debe seleccionar un vehículo qué esté activo (es decir, que exista en la base de datos)
    public function obtenerVehiculos()
    {
        $consulta = "SELECT ID_Vehiculos, Matricula, Modelo, Marca FROM vehiculos WHERE activo = TRUE";
        $resultado = mysqli_query($this->conexion, $consulta);

        if ($resultado) {
            return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258


    public function cerrarConexion()
    {
        mysqli_close($this->conexion);
    }



<<<<<<< HEAD
    // Verificar credenciales de estudiante
    public function verificarCredencialesEstudiante($email, $password)
    {
        $consulta = "SELECT * FROM estudiante WHERE email = ? AND pass = ?";
=======

    /**************************************** REVISAR/ARREGLAR ****************************************/ 
    public function verificarCredenciales($email, $password)
    {
        $consulta = "SELECT * FROM usuarios 
                 WHERE email = ? AND pass = ? 
                 AND (
                    (rol = 'estudiante' AND EXISTS (
                        SELECT 1 FROM estudiante 
                        WHERE usuario_id = usuarios.id AND activo = TRUE
                    ))
                    OR 
                    (rol = 'instructor' AND EXISTS (
                        SELECT 1 FROM instructor 
                        WHERE usuario_id = usuarios.id AND activo = TRUE
                    ))
                 )";

        // $consulta = "SELECT * FROM usuarios WHERE email = ? AND pass = ?";

>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
        $stmt = mysqli_prepare($this->conexion, $consulta);
        if ($stmt === false) {
            die("Error al preparar la sentencia: " . mysqli_error($this->conexion));
        }
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $estudiante = mysqli_fetch_assoc($resultado);
        mysqli_stmt_close($stmt);
        return $estudiante;
    }


<<<<<<< HEAD

    //Preguntas del Examen 
    public function obtenerPreguntasAleatorias($cantidad = 5) {
=======
    public function graficaRolesUsuarios()
    {
        $query = "SELECT rol, COUNT(*) as count FROM usuarios WHERE rol IN ('estudiante', 'instructor') GROUP BY rol";
        $result = mysqli_query($this->conexion, $query);

        $counts = array(
            'estudiante' => 0,
            'instructor' => 0
        );

        while ($row = mysqli_fetch_assoc($result)) {
            $counts[$row['rol']] = $row['count'];
        }

        return $counts;
    }

    public function graficaTiposClases()
    {
        $query = "SELECT tipo, COUNT(*) as count FROM clases WHERE tipo IN ('Práctico', 'Teórico') AND activo = 1 GROUP BY tipo";
        $result = mysqli_query($this->conexion, $query);

        $counts = array(
            'Práctico' => 0,
            'Teórico' => 0
        );

        while ($row = mysqli_fetch_assoc($result)) {
            $counts[$row['tipo']] = $row['count'];
        }

        return $counts;
    }






    public function obtenerPreguntasAleatorias($cantidad = 5)
    {
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
        $query = "SELECT * FROM preguntas ORDER BY RAND() LIMIT ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('i', $cantidad);  // Usar bind_param para evitar inyecciones SQL
        $stmt->execute();
        $resultado = $stmt->get_result();   // Obtener el resultado
<<<<<<< HEAD
    
=======

>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
        $preguntas = [];
        while ($fila = $resultado->fetch_assoc()) {
            $preguntas[] = $fila;
        }
<<<<<<< HEAD
    
        return $preguntas;
    }

    public function verificarRespuestas($respuestas) {
        $correctas = 0;
    
        foreach ($respuestas as $id => $respuesta) {
            $query = "SELECT respuesta_correcta FROM preguntas WHERE id = ?";
            $stmt = $this->conexion->prepare($query);
            
            // Asignar el parámetro con bind_param (usa 'i' para enteros)
            $stmt->bind_param('i', $id);
            $stmt->execute();
    
            $resultado = $stmt->get_result(); // Obtener el resultado
            $fila = $resultado->fetch_assoc();
    
=======

        return $preguntas;
    }

    public function verificarRespuestas($respuestas)
    {
        $correctas = 0;

        foreach ($respuestas as $id => $respuesta) {
            $query = "SELECT respuesta_correcta FROM preguntas WHERE id = ?";
            $stmt = $this->conexion->prepare($query);

            // Asignar el parámetro con bind_param (usa 'i' para enteros)
            $stmt->bind_param('i', $id);
            $stmt->execute();

            $resultado = $stmt->get_result(); // Obtener el resultado
            $fila = $resultado->fetch_assoc();

>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
            if ($fila && $fila['respuesta_correcta'] == $respuesta) {
                $correctas++;
            }
        }
<<<<<<< HEAD
    
=======

>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
        return $correctas;
    }


<<<<<<< HEAD
    






    
}
/************************************************************************************************************************************************/
=======
    public function obtenerClasesProximas()
    {

        /*SELECT instructor.primerNombre, instructor.primerApellido, instructor.tel, clases.start, clases.time, clases.tipo, clases.title 
FROM instructor,estudiante, clases 
WHERE estudiante.IDEstudiante = clases.IDEstudiante 
AND instructor.IDInstructor = clases.IDInstructor 
AND clases.activo = 1 
AND estudiante.primerNombre = "Julian"
ORDER BY clases.start, clases.time; */
    }

    public function mostrarHistorial($usuarioEmail)
    {
        $consulta = "SELECT instructor.primerNombre, instructor.primerApellido, instructor.tel, clases.start, clases.time, clases.tipo, clases.title 
             FROM clases,instructor,estudiante, usuarios
                WHERE estudiante.IDEstudiante = clases.IDEstudiante
                AND instructor.IDInstructor = clases.IDInstructor
                AND usuarios.id = estudiante.usuario_id
                AND usuarios.email = '$usuarioEmail'
                AND clases.activo = 1
                ORDER BY clases.start, clases.time";

        $resultado = mysqli_query($this->conexion, $consulta);
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }

    public function diasParaSiguienteClase($usuarioEmail)
    {
        $consulta = "SELECT DATEDIFF(clases.start, CURDATE()) AS dias_para_siguiente_clase
             FROM clases,instructor,estudiante, usuarios
                WHERE estudiante.IDEstudiante = clases.IDEstudiante
                AND instructor.IDInstructor = clases.IDInstructor
                AND usuarios.id = estudiante.usuario_id
                AND usuarios.email = '$usuarioEmail'
                AND clases.activo = 1
                ORDER BY clases.start, clases.time";

        $resultado = mysqli_query($this->conexion, $consulta);
        return mysqli_fetch_assoc($resultado);
    }
}
/************************************************************************************************************************************************/
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
