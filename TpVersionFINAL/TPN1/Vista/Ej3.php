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
        <h1>Ingrese sus datos</h1>
        <div id="formulario">
            <form action="accion/Ej3.php" method="post">

                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" size="15" required><br>

                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" size="15" required><br>

                <label for="edad">Edad</label>
                <input type="text" id="edad" name="edad" size="15" required><br>

                <label for="direccion">Direccion</label>
                <input type="text" id="direccion" name="direccion" size="15" required><br>

                <button type="submit">Enviar</button>
            </form>
        </div>

    </div>
    <?php include_once "../Vista/Estructura/footer.php"; ?>
</body>

</html>