<?php

/*************************************************************************************************************************************/

// En este archivo se define la clase Controlador que maneja la lógica de la aplicación y utiliza la clase BaseDatos para realizar los ABML DENTRO de la base de datos

/*************************************************************************************************************************************/

require_once 'Articulo.php';
require_once 'BaseDatos.php';
class Controlador
{

    private $base;

    public function __construct()
    {
        $this->base = new BaseDatos();
    }


    /* FUNCIONES ESTUDIANTE */
    /********************************************************************************************/

    public function listarEstudiantes()
    {
        return $this->base->listarEstudiantes();
    }

    public function buscarEstudiantes($termino)
    {
        return $this->base->buscarEstudiantes($termino);
    }

    /* Agarra los datos para crear estudiante, crea el OBJETO estudiante para posteriorme ingresarlo en la BD  */
    public function altaEstudiante($documento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass, $teorico)
    {
        $estudiante = new Estudiante(null, $documento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass, $teorico);
        $this->base->altaEstudiante($estudiante);
    }

    /* Elimina un estudiante de la base de datos usando su documento como identificador único */
    public function bajaEstudiante($documento)
    {
        $this->base->bajaEstudiante($documento);
    }

    public function modificarEstudiante($IDEstudiante, $documento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass, $teorico)
    {
        return $this->base->modificarEstudiante($IDEstudiante, $documento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass, $teorico);
    }


    /********************************************************************************************/

    /* FUNCIONES INSTRUCTORES */
    /********************************************************************************************/

    public function listarInstructores()
    {
        return $this->base->listarInstructores();
    }

<<<<<<< HEAD
    public function buscarInstructores($termino)
    {
        return $this->base->buscarInstructor($termino);
    }
=======
    // public function buscarInstructores($termino)
    // {
    //     return $this->base->buscarInstructor($termino);
    // }
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258

    /* Agarra los datos para crear estudiante, crea el OBJETO estudiante para posteriorme ingresarlo en la BD  */
    public function altaInstructor($documento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass)
    {
        $instructor = new instructor(null, $documento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass);
        $this->base->altaInstructor($instructor);
    }

    /* Elimina un estudiante de la base de datos usando su documento como identificador único */
    public function bajaInstructor($documento)
    {
        return $this->base->bajaInstructor($documento);
    }

    public function modificarInstructor($IDInstructor, $documento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass, $horasDictadas)
{
    return $this->base->modificarInstructor($IDInstructor, $documento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass, $horasDictadas);
}


    /********************************************************************************************/

/* FUNCIONES VEHICULOS*/
    /********************************************************************************************/

    public function listarVehiculos()
    {
        return $this->base->listarVehiculos();
    }

    public function buscarVehiculo($termino)
    {
        return $this->base->buscarVehiculo($termino);
    }

    /* Agarra los datos para crear vehiculo, crea el OBJETO estudiante para posteriorme ingresarlo en la BD  */
    public function altaVehiculo($ID_Vehiculos, $Matricula, $tipoId, $Modelo, $Marca, $AnioFabricacion, $Color, $Precio, $Estado, $kilometraje)
    {
        $vehiculo = new vehiculo(null, $Matricula, $tipoId, $Modelo, $Marca, $AnioFabricacion, $Color, $Precio, $Estado, $kilometraje);
        $this->base->altaVehiculo($vehiculo);
    }

    /* Elimina un vehiculo de la base de datos usando su cédula como identificador único */
    public function bajaVehiculo($vehiculo)
    {
        return $this->base->bajaVehiculo($vehiculo);
    }

    public function modificarVehiculo($ID_Vehiculos, $Matricula, $tipoId, $Modelo, $Marca, $AnioFabricacion, $Color, $Precio, $Estado, $kilometraje)
    {
        return $this->base->modificarVehiculo($ID_Vehiculos, $Matricula, $tipoId, $Modelo, $Marca, $AnioFabricacion, $Color, $Precio, $Estado, $kilometraje);
    }


    /********************************************************************************************/




    /* FUNCIONES EVENTOS */
    /********************************************************************************************/

<<<<<<< HEAD
    public function listarEventos()
    {
        return $this->base->listarEventos();
    }

    public function altaEvento($titulo, $fecha, $descripcion, $hora, $color, $tipo, $IDInstructor, $ID_Vehiculos, $IDEstudiante, $categoria)
    {
        return $this->base->altaEvento($titulo, $fecha, $descripcion, $hora, $color, $tipo, $IDInstructor, $ID_Vehiculos, $IDEstudiante, $categoria);
=======
    public function listarEventos($usuarioEmail, $rol)
{
    return $this->base->listarEventos($usuarioEmail, $rol);
}

    public function altaEvento($titulo, $fecha, $descripcion, $hora, $color, $tipo, $IDInstructor, $ID_Vehiculos, $IDEstudiante)
    {
        return $this->base->altaEvento($titulo, $fecha, $descripcion, $hora, $color, $tipo, $IDInstructor, $ID_Vehiculos, $IDEstudiante);
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
    }


    public function modificarEvento($id, $titulo, $inicio, $descripcion, $hora)
    {
        return $this->base->modificarEvento($id, $titulo, $inicio, $descripcion, $hora);
    }

    public function bajaEvento($id)
    {
        return $this->base->bajaEvento($id);
    }

<<<<<<< HEAD
    

=======
>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
    /********************************************************************************************/

    public function listarTotalEstudiantes()
    {
        return $this->base->listarTotalEstudiantes();
    }

    public function listarTotalInstructores()
    {
        return $this->base->listarTotalInstructores();
    }


    public function listarTotalEstudiantesAprobados()
    {
        return $this->base->listarTotalEstudiantesAprobados();
    }

    public function listarTotalVehiculosMantenimiento()
    {
        return $this->base->listarTotalVehiculosMantenimiento();
    }

    public function obtenerInstructores()
    {
        return $this->base->obtenerInstructores();
    }
    
    public function obtenerEstudiantes()
    {
        return $this->base->obtenerEstudiantes();
    }
    public function obtenerVehiculos()
    {
        return $this->base->obtenerVehiculos();
    }


    public function traerTabla()
    {
        echo ('<pre>');
        print_r($this->base->listarEstudiantes());
        echo ('</pre>');
    }

    public function cerrarConexion()
    {
        $this->base->cerrarConexion();
    }


<<<<<<< HEAD
    public function verificarLoginEstudiante($email, $password)
    {
        return $this->base->verificarCredencialesEstudiante($email, $password);
    }

=======
    public function verificarLogin($email, $password)
    {
        return $this->base->verificarCredenciales($email, $password);
    }

    public function graficaRolesUsuarios()
    {
        return $this->base->graficaRolesUsuarios();
    }

    public function graficaTiposClases()
    {
        return $this->base->graficaTiposClases();  
    }


>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
    public function obtenerPreguntasAleatorias($cantidad = 5) {
        return $this->base->obtenerPreguntasAleatorias($cantidad);
    }

    public function verificarRespuestas($respuestas) {
        return $this->base->verificarRespuestas($respuestas);
    }

<<<<<<< HEAD
    public function obtenerMontoTotal() {
        return $this->base->obtenerMontoTotal();
    }


=======
    public function mostrarHistorial($usuarioEmail)
    {
        return $this->base->mostrarHistorial($usuarioEmail);
    }

>>>>>>> bd544add25e6f75591fc182d9a5a54c18050f258
}
