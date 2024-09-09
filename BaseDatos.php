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



                                                            /* FUNCIONES ESTUDIANTES */
/************************************************************************************************************************************************/


// Alta Estudiante
    public function altaEstudiante($estudiante)
    {
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
    }




// Listar Estudiantes
    public function listarEstudiantes()
    {
        $resultado = mysqli_query($this->conexion, "select * from estudiante where activo = TRUE"); 
        $arreglo = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $arreglo;
    }




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

        $resultado = mysqli_query($this->conexion, $consulta);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $estudiantes = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            return $estudiantes;
        } else {
            return [];
        }
    }




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




// Mostrar Vehiculos    
public function listarVehiculos()
{
    $resultado = mysqli_query($this->conexion, "select * from vehiculos where activo = TRUE"); 
    $arreglo = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $arreglo;
}




// Baja Vehiculo
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
             WHERE 
             (Matricula LIKE '%$termino%' 
             OR 
             Modelo LIKE '%$termino%' 
             OR 
             Marca LIKE '%$termino%') 
             AND activo = TRUE";

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

    return mysqli_query($this->conexion, $modificar);
}


/************************************************************************************************************************************************/




                                                            /* FUNCIONES EVENTOS */
/************************************************************************************************************************************************/


// Mostrar Eventos
    public function listarEventos()
    {
        $consulta = "SELECT id, title, start, descripcion, time, color, tipo, IDInstructor, ID_Vehiculos, IDEstudiante FROM clases WHERE activo = TRUE";
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

    if ($resultadoInsertar) {
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
        $resultadoCursan = mysqli_query($this->conexion, $insertarCursan);

        if ($resultadoUsan && $resultadoDictan && $resultadoCursan) {
            return true;
        }
    }

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




// Baja Evento
    public function bajaEvento($id)
    {
        $consulta = "UPDATE clases SET activo = 0 WHERE id = ?";
        

        $stmt = mysqli_prepare($this->conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "i", $id);

        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $resultado;
    }


/************************************************************************************************************************************************/






                                                            /* FUNCIONES INSTRUCTORES */
/************************************************************************************************************************************************/


// Alta Instructor
    public function altaInstructor($instructor)
    {
        $IDInstructor = $instructor->getIdInstructor();
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

        $insertar = "INSERT INTO instructor (IDInstructor, documento, primerNombre, segundoNombre, primerApellido, segundoApellido, calle, numeroPuerta, barrio, localidad, tel, email, pass) 
                 VALUES ('$IDInstructor' , '$documento', '$primerNombre', '$segundoNombre', '$primerApellido', '$segundoApellido', '$calle', '$numeroPuerta', '$barrio', '$localidad', '$tel', '$email', '$pass')";

        return mysqli_query($this->conexion, $insertar);
    }




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
        return $resultado;
    }




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






                                                            /* FUNCIONES ADICIONALES */
/************************************************************************************************************************************************/


// Listar total de estudiantes en inicio.php
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




// Listar total de instructores en inicio.php
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


    public function cerrarConexion()
    {
        mysqli_close($this->conexion);
    }




     // ... Código existente ...

    // Verificar credenciales de estudiante
    public function verificarCredencialesEstudiante($email, $password)
    {
        $consulta = "SELECT * FROM estudiante WHERE email = ? AND pass = ?";
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






    
}
/************************************************************************************************************************************************/