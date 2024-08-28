<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assests/css/style.css">
</head>

<body>
    <?php include_once "../Vista/Estructura/header.php"; ?>

    <div id="contenedor">
        <p>Modificar el formulario del ejercicio anterior para que usando la edad solicitada, enviar
            esos datos a otra página en donde se muestren mensajes distintos dependiendo si la
            persona es mayor de edad o no; (si la edad es mayor o igual a 18).
            Enviar los datos usando el método GET y luego probar de modificar los datos
            directamente en la url para ver los dos posibles mensajes.
        </p>

        <div id="formulario">
            <form action="accion/Ej4.php" method="POST">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" size="15" required><br>

                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" size="15" required><br>

                <label for="edad">Edad</label>
                <input type="number" id="edad" name="edad" size="15" required><br>

                <label for="direccion">Direccion</label>
                <input type="text" id="direccion" name="direccion" size="15" required><br>

                <button type="submit">Enviar</button>
            </form>
        </div>

    </div>
    <?php include_once "../Vista/Estructura/footer.php"; ?>
</body>

</html>