<?php

include_once "../../../../utils/funciones.php";
include_once "../../Control/Boleto.php";

$datos = darDatosSubmitted();

$boleto = new Boleto($datos);
$valorBoleto = $boleto->calcularBoleto();
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
    echo "<p> El valor del boleto es: " . $valorBoleto . "</p>";
    ?>
    <?php include_once "../Estructura/footer.php" ?>

</body>

</html>