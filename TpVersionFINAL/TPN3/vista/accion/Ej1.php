<?php
include_once '../../../utils/funciones.php';
include_once '../../control/Archivo.php';

$datos = darDatosSubmitted();

$objArchivo = new Archivo();
$respuesta = $objArchivo->subirArchivo($datos);

if ($respuesta == 0) {
    $mensaje = '<p>No se pudo cargar el archivo</p>';
} elseif ($respuesta == 1) {
    $mensaje =
        '<p>El archivo ' .
        $datos['miArchivo']['name'] .
        ' se ha copiado con éxito <br>';
    $mensaje .=
        '<a href="' .
        $objArchivo->getDir() .
        $datos['miArchivo']['name'] .
        '">Descargar archivo</a></p>';
} elseif ($respuesta == -2) {
    $mensaje =
        '<p>Tipo de archivo no permitido. Solo se permiten archivos .doc y .pdf.</p>';
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
    <?php include_once "../Estructura/header.php" ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tp3-Ejer1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="/cssMenu/menu.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <header class="display-1 text-center">
        <h1>MENU PRINCIPAL DE TRABAJOS PRACTICOS - PWD</h1>
        <h2 class="display-2">GRUPO N° 12
        </h2>
    </header>
    <?php echo "<p>" . $mensaje . "</p>"; ?>

    <a href="../Ej1.php">Volver</a>

    <footer class="text-center footer-style">
        <div class="col-md-12 footer-col">
            <h3>Integrantes: Russo Florencia, Molina Enzo, Gallardo Gabriel, Fernandez Rocio.</h3>
        </div>
    </footer>
    <?php include_once "../Estructura/footer.php" ?>

</body>

</html>