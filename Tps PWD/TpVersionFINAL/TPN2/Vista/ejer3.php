<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ejer 3 - Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/ejer3Style.css">
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="/tp2/Vista/jquery/jquery-3.7.1.min.js"></script>

</head>

<body>
	<?php include_once "../Vista/Estructura/header.php" ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="login-container">
					<h2 class="text-center">Iniciar Sesión</h2>
					<form class="needs-validation " id="loginForm" novalidate method="post" action="Action/ejer3Vol2.php">
						<div class="mb-3">
							<label for="username" class="form-label"></label>
							<div class="input-group">
								<span class="input-group-text" id="inputGroupPrepend">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
										<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
									</svg>
								</span>
								<input type="text" class="form-control" id="username" name="usuario" placeholder="Usuario" aria-describedby="inputGroupPrepend" minlength="4" required>
								<div class="invalid-feedback">
									Ingrese un nombre de usuario.
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label for="password" class="form-label"></label>
							<div class="input-group">
								<span class="input-group-text" id="inputGroupPrepend">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
										<path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
									</svg>
								</span>
								<input type="password" class="form-control" id="password" name="clave" minlength="8" placeholder="Clave" required>
								<div class="invalid-feedback">
									La contraseña debe tener 8 caracteres como mínimo.
								</div>
							</div>
						</div>
						<button class="btn btn-primary w-100" type="submit">Iniciar Sesión</button>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- Incluyo el js de bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	<script src="assets/js/verificarLogin.js"></script>

	<!-- Validacion de formularios de bootstrap con js -->
	<!-- 	<script>
		(() => {
			'use strict';

			const forms = document.querySelectorAll('.needs-validation');

			Array.from(forms).forEach(form => {
				form.addEventListener('submit', event => {
					let isCustomValid = validateForm(); // Validación personalizada

					if (!form.checkValidity() || !isCustomValid) {
						event.preventDefault();
						event.stopPropagation();
					}

					// Evita que Bootstrap agregue automáticamente 'is-valid' si hay un error personalizado
					if (!isCustomValid) {
						form.classList.remove('was-validated');
					} else {
						form.classList.add('was-validated');
					}
				}, false);
			});
		})();

		function validateForm() {
			const username = document.getElementById('username').value;
			const password = document.getElementById('password').value;
			const passwordField = document.getElementById('password');

			let isValid = true;

			// Validar que la contraseña no sea igual al nombre de usuario
			
			if (username === password) {
				passwordField.classList.add('is-invalid');
				passwordField.classList.remove('is-valid'); // Remover la clase de 'correcto'
				passwordField.nextElementSibling.textContent = "La contraseña no puede ser igual al nombre de usuario.";
				isValid = false;
			} else {
				passwordField.classList.remove('is-invalid');
				passwordField.nextElementSibling.textContent = ""; // Limpiar el mensaje de error
				// No agregamos 'is-valid' aquí para evitar los ticks si el campo está vacío
			}

			return isValid;
		}

		document.getElementById('loginForm').addEventListener('submit', function(event) {
			if (!validateForm() || !this.checkValidity()) {
				event.preventDefault();
				event.stopPropagation();
			} else {
				this.classList.add('was-validated');
			}
		});

	</script> -->

	<?php include_once "../Vista/Estructura/footer.php" ?>

</body>

</html>