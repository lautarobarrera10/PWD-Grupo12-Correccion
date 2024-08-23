<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <?php include_once "../Vista/Estructura/header.php" ?>
    <div id="contenedor">
        <div id="consigna">
            <p>Modificar el formulario del ejercicio anterior solicitando, tal que usando componentes
                “radios buttons” se ingrese el nivel de estudio de la persona: 1-no tiene estudios, 2-
                estudios primarios, 3-estudios secundarios. Agregar el componente que crea más
                apropiado para solicitar el sexo. En la página que procesa el formulario mostrar además
                un mensaje que indique el tipo de estudios que posee y su sexo.</p>
        </div>
        <div id="formulario">
            <form id="datosForm" action="accion/Form5.php" method="post" onSubmit="return Validar();">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" size="15"><br>

                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" size="15"><br>

                <label for="edad">Edad</label>
                <input type="text" id="edad" name="edad" size="15"><br>

                <label for="direccion">Direccion</label>
                <input type="text" id="direccion" name="direccion" size="15"><br>

                <label for="estudios">Estudios</label><br>
                No tiene estudios
                <input type="radio" id="estudios" name="estudios" value="sinEstudios"><br>
                Estudios Primarios
                <input type="radio" id="estudios" name="estudios" value="primarios"><br>
                Estudios Secundarios
                <input type="radio" id="estudios" name="estudios" value="secundarios"><br>

                <label for="genero">Genero</label>
                <select name="genero" id="genero">
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="x">X</option>
                </select> <br><br>

                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
    <script src="assets/js/ej5.js"></script>
    <?php include_once "../Vista/Estructura/footer.php" ?>

</body>

</html>