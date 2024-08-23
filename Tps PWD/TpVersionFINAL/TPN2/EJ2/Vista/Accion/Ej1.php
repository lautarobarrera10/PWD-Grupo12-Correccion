<?php

include_once '../../../../utils/funciones.php';
include_once '../../Control/signo.php';

$datos = darDatosSubmitted();

$objNumero = new Numero($datos);

$mensaje = $objNumero->devolverSigno();
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>

<body>
    <?php include_once "../Estructura/header.php" ?>
    <p><?php echo 'El número ' .
            $objNumero->getNumero() .
            ' es ' .
            $mensaje .
            '.'; ?></p>
    <a href="../Ej1.php">Volver</a>
    <?php include_once "../Estructura/footer.php" ?>

</body>

</html>