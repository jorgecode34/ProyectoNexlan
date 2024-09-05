<?php
class estudiante {

    private $IDEstudiante;
    private $documento;
    private $primerNombre;
    private $segundoNombre;
    private $primerApellido;
    private $segundoApellido;
    private $calle;
    private $numeroPuerta;
    private $barrio;
    private $localidad;
    private $tel;
    private $email;
    private $pass;
    private $teorico;

    public function __construct($IDEstudiante, $documento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass, $teorico) {
        $this->IDEstudiante = $IDEstudiante;
        $this->documento = $documento;
        $this->primerNombre = $primerNombre;
        $this->segundoNombre = $segundoNombre;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
        $this->calle = $calle;
        $this->numeroPuerta = $numeroPuerta;
        $this->barrio = $barrio;
        $this->localidad = $localidad;
        $this->tel = $tel;
        $this->email = $email;
        $this->pass = $pass;
        $this->teorico = $teorico;
    }

    public function getIdEstudiante(){
        return $this->IDEstudiante;
    }

    public function getDocumento() {
        return $this->documento;
    }

    public function getPrimerNombre() {
        return $this->primerNombre;
    }

    public function getSegundoNombre() {
        return $this->segundoNombre;
    }

    public function getPrimerApellido() {
        return $this->primerApellido;
    }

    public function getSegundoApellido() {
        return $this->segundoApellido;
    }

    public function getCalle() {
        return $this->calle;
    }

    public function getNumeroPuerta() {
        return $this->numeroPuerta;
    }

    public function getBarrio() {
        return $this->barrio;
    }

    public function getLocalidad() {
        return $this->localidad;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPass(){
        return $this->pass;
    }

    public function getTeorico(){
        return $this->teorico;
    }

    public function __toString() {
        return $this->IDEstudiante . "," . $this->documento .  "," . $this->primerNombre . "," . $this->segundoNombre . "," . $this->primerApellido . "," . $this->segundoApellido . "," . $this->calle . "," . $this->numeroPuerta . "," . $this->barrio . "," . $this->localidad . "," . $this->tel . "," . $this->email . "," . $this->pass . "," . $this->teorico;
    }
}

class instructor {
    private $IDInstructor;
    private $documento;
    private $primerNombre;
    private $segundoNombre;
    private $primerApellido;
    private $segundoApellido;
    private $calle;
    private $numeroPuerta;
    private $barrio;
    private $localidad;
    private $tel;
    private $email;
    private $pass;

    public function __construct($IDInstructor, $documento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $calle, $numeroPuerta, $barrio, $localidad, $tel, $email, $pass) {
        $this->IDInstructor = $IDInstructor;
        $this->documento = $documento;
        $this->primerNombre = $primerNombre;
        $this->segundoNombre = $segundoNombre;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
        $this->calle = $calle;
        $this->numeroPuerta = $numeroPuerta;
        $this->barrio = $barrio;
        $this->localidad = $localidad;
        $this->tel = $tel;
        $this->email = $email;
        $this->pass = $pass;
    }

    public function getIdInstructor(){
        return $this->IDInstructor;
    }

    public function getDocumento() {
        return $this->documento;
    }

    public function getPrimerNombre() {
        return $this->primerNombre;
    }

    public function getSegundoNombre() {
        return $this->segundoNombre;
    }

    public function getPrimerApellido() {
        return $this->primerApellido;
    }

    public function getSegundoApellido() {
        return $this->segundoApellido;
    }

    public function getCalle() {
        return $this->calle;
    }

    public function getNumeroPuerta() {
        return $this->numeroPuerta;
    }

    public function getBarrio() {
        return $this->barrio;
    }

    public function getLocalidad() {
        return $this->localidad;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPass(){
        return $this->pass;
    }

    public function __toString() {
        return $this->IDInstructor . "," . $this->documento . "," . $this->primerNombre . "," . $this->segundoNombre . "," . $this->primerApellido . "," . $this->segundoApellido . "," . $this->calle . "," . $this->numeroPuerta . "," . $this->barrio . "," . $this->localidad . "," . $this->tel . "," . $this->email . "," . $this->pass;
    }

}

class vehiculo {
    private $ID_Vehiculos;
    private $tipoId;
    private $Matricula;
    private $Modelo;
    private $Marca;
    private $AnioFabricacion;
    private $Color;
    private $Precio;


public function __construct($ID_Vehiculos, $Matricula, $tipoId, $Modelo, $Marca, $AnioFabricacion, $Color, $Precio) {
    $this->ID_Vehiculos = $ID_Vehiculos;
    $this->Matricula = $Matricula;
    $this->tipoId = $tipoId;
    $this->Modelo = $Modelo;
    $this->Marca = $Marca;
    $this->AnioFabricacion = $AnioFabricacion;
    $this->Color = $Color;
    $this->Precio = $Precio;
    }

    public function getID_Vehiculos(){
        return $this->ID_Vehiculos;
    }

    public function getMatricula() {
        return $this->Matricula;
    }

    public function getTipoId() {
        return $this->tipoId;
    }

    public function getModelo() {
        return $this->Modelo;
    }

    public function getMarca() {
        return $this->Marca;
    }

    public function getAnioFabricacion() {
        return $this->AnioFabricacion;
    }

    public function getColor() {
        return $this->Color;
    }

    public function getPrecio() {
        return $this->Precio;
    }


    public function __toString() {
        return $this->ID_Vehiculos . ","  . $this->Matricula . "," . $this->tipoId . "," . $this->Modelo . "," . $this->Marca . "," . $this->AnioFabricacion . "," . $this->Color . "," . $this->Precio;
    }
}

?>
