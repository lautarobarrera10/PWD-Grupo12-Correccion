<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/cinemas.css">
</head>
<body>
    <div id="contenedor">

    <div class="formulario">
    <form action="respuesta.php" method="post" enctype="multipart/form-data">>
        <table>
            <tr>
                <th colspan="2" >Cinem@s</th>
            </tr>
            <tr>
                <td>
                    <label for="titulo" name="titulo">Titulo</label><br>
                    <input type="text" id="titulo" name="Titulo" placeholder="Titulo">
                    <div class="mensaje"></div>

                </td>
                <td>
                    <label for="actores" name="actores">Actores</label><br>
                    <input type="text" id="actores" name="Actores" placeholder="Actores">
                    <div class="mensaje"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="director" name="director">Director</label><br>
                    <input type="text" id="director" name="Director" placeholder="Director">
                    <div class="mensaje"></div>
                </td>
                <td>
                    <label for="guion" name="guion">Guion</label><br>
                    <input type="text" id="guion" name="Guion" placeholder="Guion">
                    <div class="mensaje"></div>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="produccion" name="produccion">Producci&oacute;n</label><br>
                    <input type="text" id="produccion" name="Producci&oacute;n" >
                    <div class="mensaje"></div>
                </td>
                <td>
                    <label for="anio" name="anio">A&ntilde;o</label><br>
                    <input type="text" id="anio" name="A&ntilde;o" >
                    <div class="mensaje"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nacionalidad" name="nacionalidad">Nacionalidad</label><br>
                    <input type="text" id="nacionalidad" name="Nacionalidad">
                    <div class="mensaje"></div>
                </td>
                <td>
                    <label for="genero" name="genero">G&eacute;nero</label><br>
                    <select name="G&eacute;nero" id="genero">
                        <option value="accion">Acci&oacute;n</option>
                        <option value="comedia">Comedia</option>
                        <option value="drama">Drama</option>
                        <option value="terror">Terror</option>
                        <option value="romanticas">Rom&aacute;nticas</option>
                        <option value="suspenso">Suspenso</option>
                        <option value="otra">Otra</option>
                    </select>
                    <div class="mensaje"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="duracion" name="duracion">duraci&oacute;n</label><br>
                    <input type="text" id="duracion" name="duraci&oacute;n">(minutos)
                    <div class="mensaje"></div>
                </td>
                <td>
                    <label for="edad" name="edad">Restricciones de edad</label><br>
                    <input type="radio" id="todos" value="Todos los Publicos" name="Restricciones de edad">Todos los Publicos
                    <input type="radio" id="mayor7" value="Mayores de 7 a&ntilde;os" name="Restricciones de edad">Mayores de 7 a&ntilde;os
                    <input type="radio" id="mayor18" value="Mayores de 18 a&ntilde;os" name="Restricciones de edad">Mayores de 18 a&ntilde;os
                    <div class="mensaje"></div>
                </td>
            </tr>
            <tr>   
                <td colspan="2">
                    <label for="thumbnail">Poster de la pelicula</label><br>
                    <input name="thumbnail" id="thumbnail" type="file" />
                    <div class="mensaje"></div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label for="sinopsis" name="sinopsis">Sinopsis</label><br>
                    <textarea name="Sinopsis" id="sinopsis" cols="60" rows="8"></textarea>
                    <div class="mensaje"></div>
                </td>
            </tr>    
            <tr>
                <td colspan="2">
                    <div class="botones">
                    <button type="submit">Enviar</button>
                    <button type="reset">Borrar</button>
                    </div>
                </td>
            </tr>
        </table>
        </form>
    </div>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../assets/js/verificarCine.js"></script>
</body>
</html>