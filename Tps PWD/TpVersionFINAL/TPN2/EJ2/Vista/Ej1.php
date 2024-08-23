<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php include_once "../Vista/Estructura/header.php" ?>

    <form action="accion/Ej1.php" method="get" onSubmit="return Validar();">
        <label for="numero">Ingrese un numero:</label>
        <input type="text" id="numero" name="numero">
        <button type="submit">Enviar</button>
    </form>
    <script src="assets/js/ej1.js"></script>
    <?php include_once "../Vista/Estructura/footer.php" ?>
</body>

</html>