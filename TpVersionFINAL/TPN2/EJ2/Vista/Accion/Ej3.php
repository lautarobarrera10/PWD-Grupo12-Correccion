<?php

include_once '../../../../utils/funciones.php';
include_once '../../control/Persona.php';
$datos = darDatosSubmitted();
$persona = new Persona($datos);
$mensaje = "Hola, yo soy " . $persona->getNombre() . " " . $persona->getApellido() . ".Tengo " . $persona->getEdad() . " y vivo en " . $persona->getDireccion() . "\n";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mostrar Datos</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlazar tu archivo CSS -->
</head>

<body>
    <?php include_once "../Estructura/header.php" ?>
    <?php
    echo $mensaje;
    ?>
    <a href="../Ej3.php">Volver</a>
    <?php include_once "../Estructura/footer.php" ?>

</body>

</html>