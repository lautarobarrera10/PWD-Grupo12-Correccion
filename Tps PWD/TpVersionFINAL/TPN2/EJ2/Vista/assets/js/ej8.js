function Validar() {
     let isValid = true;
     let edad = $("#edad").val();
     
     if (edad === "" || isNaN(edad) || edad < 0) {
          isValid = false;
          alert('Por favor, ingrese una edad válida.');
        
     }
     
     if (!$('input[name="estudiante"]:checked').val()) {
          isValid = false;
          alert('Por favor, seleccione si es o no estudiante.');
         
     }

     return isValid;
}