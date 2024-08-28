<?php

include_once '../../../../utils/funciones.php';
include_once '../../Control/Horas.php';

$datos = darDatosSubmitted();


$mensaje = null;
$objHoras = new Horas($datos);
$mensaje = $objHoras->darHoras();

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resultado de Horas</title>
</head>

<body>
    <?php include_once "../Estructura/header.php" ?>
    <?php if ($mensaje != null) {

        echo "<p>La cantidad total de horas de cursada por semana es: $mensaje horas.</p>";
    } else {
        echo '<p>No se ingresaron datos.</p>';
    } ?>
    <a href="../Ej2.php">Volver</a>
    
    <?php include_once "../Estructura/footer.php" ?>

</body>

</html>