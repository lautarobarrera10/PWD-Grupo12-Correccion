
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
			} else if(password.length <8){
				passwordField.classList.add('is-invalid');
				passwordField.classList.remove('is-valid'); // Remover la clase de 'correcto'
				passwordField.nextElementSibling.textContent = "La contraseña debe tener como mínimo 8 caracteres.";
				isValid = false;
			}else if(!/\d/.test(password) || !/[a-zA-Z]/.test(password)){
				passwordField.classList.add('is-invalid');
				passwordField.classList.remove('is-valid'); // Remover la clase de 'correcto'
				passwordField.nextElementSibling.textContent = "La contraseña debe tener al menos un número y una letra.";
				isValid = false;
				
			}else{
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

