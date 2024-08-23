<?php

include_once "../../../utils/funciones.php";
include_once "../../Control/EJ3/VerificarPass.php";


$datos = darDatosSubmitted();
$objVerificarPass = new VerificaPass($datos);
$boolVerificador = $objVerificarPass->existeUsuario($datos["usuario"], $datos["clave"]);
$msj = $objVerificarPass->verificarUsuario($datos["usuario"], $datos["clave"]);
$claseBootAlerta = $boolVerificador ? "alert-success" : "alert-danger";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ejer3Vol2</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-light">

	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body text-center">
						<div class="alert <?php echo $claseBootAlerta ?> "><?php echo $msj ?></div>
						<a href="../ejer3.php" class="btn btn-primary mt-4">Volver atrás</a>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>