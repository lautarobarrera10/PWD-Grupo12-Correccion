<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ejer 4 - Tp2</title>
	<link rel="stylesheet" href="assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
	<script src="assets/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="assets/css/ejer4.css">
	<link rel="stylesheet" href="assets/js/verificarLogin.js">

</head>

<body>
	<?php include_once "../Vista/Estructura/header.php" ?>
	<div class="container" id="contenedor">
		<header>
			<div class="col-12">
				<h1 for="titulo">Cinem@s</h1>
			</div>
		</header>
		<div class="contenedorDos">
			<form class="row g-3 needs-validation" novalidate action="Action/ejercicio4.php" method="post">
				<div class="col-6">
					<label class="form-label" for="validationCustom01">Titulo</label>
					<input type="text" class="form-control" id="validationCustom01" name="Titulo" required>
					<div class="invalid-feedback">
						Este campo es obligatorio.
					</div>
				</div>
				<div class="col-6">
					<label class="form-label" for="form-label">Actores</label>
					<input type="text" class="form-control" id="actoresInput" name="Actores" required>
					<div class="invalid-feedback">
						Este campo es obligatorio.
					</div>
				</div>
				<div class="col-6">
					<label class="form-label" for="form-label">Director</label>
					<input type="text" class="form-control" id="DirectorInput" name="Directores" required>
					<div class="invalid-feedback">
						Este campo es obligatorio.
					</div>
				</div>
				<div class="col-6">
					<label class="form-label" for="form-label">Guión</label>
					<input type="text" class="form-control" id="GuiónInput" name="Guion" required>
					<div class="invalid-feedback">
						Este campo es obligatorio.
					</div>
				</div>
				<div class="col-6">
					<label class="form-label" for="form-label">Producción</label>
					<input type="text" class="form-control" id="ProducciónInput" name="Produccion" required>
					<div class="invalid-feedback">
						Este campo es obligatorio.
					</div>
				</div>
				<div class="col-2">
					<label class="form-label" for="form-label">Año</label>
					<input type="number" min="1888" max="9999" class="form-control" id="añoInput" name="Anio" required>
					<div class="invalid-feedback">
						Ingrese un valor del 1888 al 9999.
					</div>
				</div>
				<div class="col-6">
					<label class="form-label" for="form-label">Nacionalidad</label>
					<input type="text" class="form-control" id="NacionalidadInput" name="Nacionalidad" required>
					<div class="invalid-feedback">
						Este campo es obligatorio.
					</div>
				</div>
				<div class="col-3">
					<label class="form-label" for="form-label">Genero</label>
					<select class="form-select" name="Genero" id="selec-Input" required>
						<div class="invalid-feedback">
							Este campo es obligatorio.
						</div>
						<option value="accion">Accion</option>
						<option value="aventura">Aventura</option>
						<option value="comedia">Comedia</option>
					</select>
				</div>
				<div class="col-6">
					<label class="form-label" for="form-label">Duracion</label>
					<input type="number" min="1" max="300" minlength="1" maxlength="3" class="form-control" id="DuracionInput" placeholder="(Minutos)" name="Duracion" required>
					<div class="invalid-feedback">
						Ingrese un valor del 1 al 999.
					</div>
				</div>
				<div class="col-6">
					<div>
						<label class="form-label" for="form-label">Restricciones de edad</label>

					</div>

					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="Restriccion de edad" value="ATP" id="inlineRadioAtp" required>

						<label class="form-check-label" for="inlineRadioAtp" id="label-opciones">
							Todos los públicos
						</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="Restriccion de edad" value="Mayor a Siete" id="inlineRadioSiete" required>
						<label class="form-check-label" for="inlineRadioSiete" id="label-opciones">
							Mayores de 7 años
						</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="Restriccion de edad" value="Mayor de edad" id="inlineRadioMayorEdad" required>
						<label class="form-check-label" for="inlineRadioMayorEdad" id="label-opciones">
							Mayores de 18 años
						</label>
					</div>
				</div>
				<div class="col-12">
					<label for="form-label" id="label-titulos">Sinopsis</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Sinopsis" required></textarea>
					<div class="invalid-feedback">
						Este campo es obligatorio.
					</div>
				</div>
				<div class="col-11" id="boton-Submit-Enviar">
					<input type="submit" class="btn btn-primary" value=" Enviar">
				</div>
				<div class="col-1" id="boton-Submit-Borrar">
					<input type="reset" class="btn btn-secondary" value="Borrar" id="borrar-Form">
				</div>
			</form>
		</div>
	</div>

	<script>
		(() => {
			'use strict'

			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			const forms = document.querySelectorAll('.needs-validation')

			// Loop over them and prevent submission
			Array.from(forms).forEach(form => {
				form.addEventListener('submit', event => {
					if (!form.checkValidity()) {
						event.preventDefault()
						event.stopPropagation()
					}

					form.classList.add('was-validated')
				}, false)
			})
		})()
	</script>
	<?php include_once "../Vista/Estructura/footer.php" ?>
</body>

</html>