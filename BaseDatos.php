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




// Mostrar Estudiantes
    public function seleccionarTodos()
    {
        $resultado = mysqli_query($this->conexion, "select * from estudiante"); //------------------> Cambiar tabla
        $arreglo = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $arreglo;
    }




// Baja Estudiante
    public function bajaEstudiante($documento)
    {
        $query = "DELETE FROM estudiante WHERE documento = ?";
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
                documento LIKE '%$termino%' 
                OR 
                primerNombre LIKE '%$termino%' 
                OR 
                primerApellido LIKE '%$termino%'
                OR
                segundoNombre LIKE '%$termino%'
                OR
                segundoApellido LIKE '%$termino%'";

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
public function ingresarvehiculo($vehiculo)
{
    $ID_Vehiculos = $vehiculo->getID_Vehiculos();
    $Matricula = $vehiculo->getMatricula();
    $tipoId = $vehiculo->getTipoId();
    $Modelo = $vehiculo->getModelo();
    $Marca = $vehiculo->getMarca();
    $AnioFabricacion = $vehiculo->getAnioFabricacion();
    $Color = $vehiculo->getColor();
    $Precio = $vehiculo->getPrecio();
    

    $insertar = "INSERT INTO vehiculos (ID_Vehiculos, Matricula, tipoId, Modelo, Marca, AnioFabricacion, Color, Precio) 
             VALUES ('$ID_Vehiculos' , '$Matricula', '$tipoId', '$Modelo', '$Marca', '$AnioFabricacion', '$Color', '$Precio')";

    return mysqli_query($this->conexion, $insertar);
}




// Mostrar Vehiculos    
public function seleccionarTodosVehiculos()
{
    $resultado = mysqli_query($this->conexion, "select * from vehiculos"); 
    $arreglo = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    return $arreglo;
}




// Baja Vehiculo
public function eliminarVehiculo($Matricula)
{
    $query = "DELETE FROM vehiculos WHERE Matricula = ?";
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
    $consulta = "SELECT * FROM instructor 
             WHERE 
             Matricula LIKE '%$termino%' 
             OR 
             Modelo LIKE '%$termino%' 
             OR 
             Marca LIKE '%$termino%'";

    $resultado = mysqli_query($this->conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $vehiculo = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $vehiculo;
    } else {
        return [];
    }
}




// Modificar Vehiculo
public function modificarVehiculo($ID_Vehiculos, $Matricula, $tipoId, $Modelo, $Marca, $AnioFabricacion, $Color, $Precio)
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
                
             WHERE vehiculos = '$vehiculos'";

    return mysqli_query($this->conexion, $modificar);
}


/************************************************************************************************************************************************/




                                                            /* FUNCIONES EVENTOS */
/************************************************************************************************************************************************/


// Mostrar Eventos
    public function obtenerEventos()
    {
        $consulta = "SELECT id, title, start, descripcion, time, color/*, end*/ FROM events";
        $resultado = mysqli_query($this->conexion, $consulta);

        if ($resultado) {
            return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        } else {
            return [];
        }
    }




// Alta Evento
    public function crearEvento($titulo, $fecha, $descripcion, $hora, $color)
    {
        $color = '#3355ff';
        $insertar = "INSERT INTO events (title, start, time, descripcion, color) VALUES ('$titulo', '$fecha', '$hora', '$descripcion', '$color')";
        return mysqli_query($this->conexion, $insertar);
    }




// Modificar Evento
    public function modificarEvento($id, $titulo, $inicio, $descripcion, $hora)
    {
        $consulta = "UPDATE events SET 
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
    public function eliminarEvento($id)
    {
        $consulta = "DELETE FROM events WHERE id = ?";

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
    public function ingresarInstructor($instructor)
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
    public function seleccionarTodosinstructores()
    {
        $resultado = mysqli_query($this->conexion, "select * from instructor"); 
        $arreglo = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        return $arreglo;
    }

    


// Baja Instructor
    public function eliminarInstructor($documento)
    {
        $query = "DELETE FROM instructor WHERE documento = ?";
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
                documento LIKE '%$termino%' 
                OR 
                primerNombre LIKE '%$termino%' 
                OR 
                primerApellido LIKE '%$termino%'
                OR
                segundoNombre LIKE '%$termino%'
                OR
                segundoApellido LIKE '%$termino%'";

        $resultado = mysqli_query($this->conexion, $consulta);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $instructor = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            return $instructor;
        } else {
            return [];
        }
    }




// Modificar Instructor
    public function modificarInstructor($IDInstructor, $documento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass)
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
                    pass = '$pass'
                 WHERE documento = '$documento'";

        return mysqli_query($this->conexion, $modificar);
    }


/************************************************************************************************************************************************/






                                                            /* FUNCIONES ADICIONALES */
/************************************************************************************************************************************************/


// Listar total de estudiantes en inicio.php
    public function listarTotalEstudiantes()
    {
        $enumerar = "SELECT COUNT(*) AS total_estudiantes FROM estudiante;";

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
        $enumerar = "SELECT COUNT(*) AS total_instructores FROM instructor;";

        $resultado = mysqli_query($this->conexion, $enumerar);
        if ($resultado) {
            return mysqli_fetch_assoc($resultado);
        } else {
            return null;
        }
    }


    public function listarTotalEstudiantesAprobados()
{
    $consulta = "SELECT COUNT(*) AS total_estudiantes_aprobados FROM estudiante WHERE teorico = 'aprobado';";
    
    $resultado = mysqli_query($this->conexion, $consulta);
    if ($resultado) {
        return mysqli_fetch_assoc($resultado);
    } else {
        return null;
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