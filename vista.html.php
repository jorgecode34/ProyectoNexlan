<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    /*************************************************************************************************************************************/

    /* Este archivo muestra una vista HTML donde se pueden ver todos los datos de todos los estudiantes con el pre de controlador.php*/

    /*************************************************************************************************************************************/
    
    require_once 'Controlador.php';
    $controla = new Controlador();
    $controla->traerTabla();
?>    
</body>
</html>


