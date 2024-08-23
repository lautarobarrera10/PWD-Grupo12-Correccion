<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include_once "../Vista/Estructura/header.php"; ?>
    <form action="accion/Ej1.php" method="get">
        <label for="numero">Ingrese un numero:</label>
        <input type="number" step="0.01" id="numero" name="numero" required>
        <button type="submit">Enviar</button>
    </form>
    <?php include_once "../Vista/Estructura/footer.php"; ?>
</body>

</html>