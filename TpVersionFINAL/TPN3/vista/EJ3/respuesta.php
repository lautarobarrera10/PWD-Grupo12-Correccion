<?php
include_once '../../../utils/funciones.php';
include_once '../../control/Imagen.php';

$datos = darDatosSubmitted();

print_r($datos);

$objImagen = new Imagen();
$respuesta = $objImagen->subirArchivo($datos, 'thumbnail');

$texto = '';

foreach ($datos as $categoria => $valor) {
    if (!is_array($valor)) {
        $texto .= '<p><strong>' . $categoria . '</strong>: ' . $valor . '</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/respuesta.css?<?php echo time(); ?>" />

</head>
<body>
    <div id="contenedor">

    <div class="respuesta">
        <h1>La pelicula introducida es </h1>
        <table>
            <tr>
                <td>
                    <div class="poster">
                    <?php if ($respuesta > 0) {
                        echo "<img src= '../../archivos/" .
                            $datos['thumbnail']['name'] .
                            "' alt='" .
                            $datos['thumbnail']['name'] .
                            "'  >";
                    } else {
                        echo '<p>No se pudo subir la imagen.</p>';
                    } ?>                
                    </div>
                </td>
                <td>
                    <?php echo $texto; ?>
                </td>
            </tr>
        </table>
        
    </div>
        
    </div>
    
</body>
</html>