<?php

include_once "../../../utils/funciones.php";
include_once "../../Control/Pelicula.php";
include_once "../../Control/Imagen.php";

$datos = darDatosSubmitted();


$pelicula = new Pelicula($datos);
$objImagen = new Imagen();

$respuesta = $objImagen->subirArchivo($datos, "thumbnail");

if ($respuesta > 0) {
	$img = "<img class='card-img-top' src= '../../archivos/" . $datos['thumbnail']['name'] .
		"' alt='" .	$datos['thumbnail']['name'] .
		"'  >";
} else {
	$img = '<p>No se pudo subir la imagen.</p>';
}


/*<div class='card' style='width: 18rem;'>
$img = "<img src= '../../archivos/" .$datos['thumbnail']['name'] .
		"' alt='" .	$datos['thumbnail']['name'] .
		"'  >";*/



/**include_once '../../Control/Pelicula.php';*/
$pelicula = new Pelicula($datos);

$mensaje = "<p><b>Título: </b> " . $pelicula->getTitulo() . "</p>";
$mensaje .= "<p><b>Actores: </b> " . $pelicula->getActores() . "</p>";
$mensaje .= "<p><b>Director: </b> " . $pelicula->getDirector() . "</p>";
$mensaje .= "<p><b>Guión: </b> " . $pelicula->getGuion() . "</p>";
$mensaje .= "<p><b>Producción: </b> " . $pelicula->getProduccion() . "</p>";
$mensaje .= "<p><b>Año: </b> " . $pelicula->getAnio() . "</p>";
$mensaje .= "<p><b>Nacionalidad: </b> " . $pelicula->getNacionalidad() . "</p>";
$mensaje .= "<p><b>Duración: </b> " . $pelicula->getDuracion() . " minutos</p>";
$mensaje .= "<p><b>Restricciones: </b> " . $pelicula->getRestricciones() . "</p>";



?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejer 4 - vol 2</title>
	<link rel="stylesheet" href="../assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/ejer4vol2.css?<?php echo time(); ?>">
</head>

<body>
	<?php include_once "../Estructura/header.php" ?>
	<div class="container">
		<header>
			<label class="titulo">La película introducida es
				<a class="btn btn-link " href=" ../ejer4.php" role="button" id="boton-atras">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
						<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
					</svg>
				</a>
			</label>

		</header>
		<div class="cuerpo-Info">
			<?php echo $mensaje; ?>

			<div class='card' style="width: 12rem; ">
				<?php echo $img; ?>
			</div>
		</div>
	</div>

	<?php include_once "../Estructura/footer.php" ?>
</body>

</html>