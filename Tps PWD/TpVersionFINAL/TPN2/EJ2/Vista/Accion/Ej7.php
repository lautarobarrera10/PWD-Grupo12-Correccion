<?php

include_once "../../Control/Calculo.php";
include_once "../../../../utils/funciones.php";

$datos = darDatosSubmitted();

$objCalculo = new Calculo($datos);

$resultado = $objCalculo->devolverCalculo();



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include_once "../Estructura/header.php" ?>
    <?php
    echo "<p> El resultado de hacer la operación " . $objCalculo->getOperacion() . " con " . $objCalculo->getNumero1() . " y " . $objCalculo->getNumero2() . "es " . $resultado . "</p>";
    ?>
    <?php include_once "../Estructura/footer.php" ?>

</body>

</html>