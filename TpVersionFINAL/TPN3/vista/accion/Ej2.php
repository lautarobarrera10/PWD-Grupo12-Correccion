<?php
include_once '../../../utils/funciones.php';
include_once '../../control/ArchivoTXT.php';

$datos = darDatosSubmitted();

$objArchivo = new ArchivoTXT();
$respuesta = $objArchivo->subirArchivo($datos);

$mensaje = '';
$archivoPath = $objArchivo->getDir() . $datos['miArchivo']['name'];

if ($respuesta == 0) {
    $mensaje = '<p>No se pudo cargar el archivo</p>';
} elseif ($respuesta == 1) {
    $mensaje .=
        '<p>El archivo ' .
        $datos['miArchivo']['name'] .
        " se ha copiado con éxito <br><textarea name='archivo' id='archivo' cols='50' rows='20'>
" . file_get_contents($archivoPath) . "
    </textarea>";
} elseif ($respuesta == -2) {
    $mensaje =
        '<p>Tipo de archivo no permitido. Solo se permiten archivos .txt.</p>';
} elseif ($respuesta == -3) {
    $mensaje = '<p>El archivo excede el tamaño máximo permitido de 2MB.</p>';
} else {
    $mensaje =
        '<p>ERROR: no se pudo cargar el archivo. No se pudo acceder al archivo temporal</p>';
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include_once "../Estructura/header.php" ?>
    <?php
    echo $mensaje;
    ?>

    <a href="../Ej2.php">Volver</a>
    <?php include_once "../Estructura/footer.php" ?>

</body>

</html>