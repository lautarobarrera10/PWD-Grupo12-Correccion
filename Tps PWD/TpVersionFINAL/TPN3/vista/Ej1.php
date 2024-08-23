<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include_once "../vista/Estructura/header.php" ?>
    <p>Crear un formulario HTML que permita subir un archivo. En el servidor se deberá
        controlar, antes de guardar el archivo, que los tipos validos son .doc o pdf y además el tamaño
        máximo permitido es de 2mb. En caso que se cumplan las condiciones mostrar un link al archivo
        cargado, en caso contrario mostrar un mensaje indicando el problema.</p>
    <form method="post" action="accion/Ej1.php" enctype="multipart/form-data">
        Ingresa el archivo: <input name="miArchivo" id="miArchivo" type="file" />
        <input type="submit" value="Enviar" />
    </form>
    <?php include_once "../vista/Estructura/footer.php" ?>
</body>

</html>