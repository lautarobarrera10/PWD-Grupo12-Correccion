function Validar(){ 

    let isValid = true;
    const nombre = $("#nombre").val();
    const apellido = $("#apellido").val();
    const edad = $("#edad").val();
    const direccion = $("#direccion").val();
    if(nombre === "" || apellido === "" || edad === "" || direccion === "" || isNaN(edad)){
        alert("Por favor, ingrese un valor válido");
        
        isValid=false
    }
    $('#datosForm input[type="text"]').each(function() {
        if ($(this).val().trim() === '') {
            isValid = false;
            alert('Por favor, complete todos los campos de texto.');
        } 
    });

    if (!$('input[name="estudios"]:checked').val()) {
        isValid = false;
        alert('Por favor, seleccione su nivel de estudios.');
    }

    if ($('#sexo').val() === '') {
        isValid = false;
        alert('Por favor, seleccione su sexo.');
    }

   
    return isValid;
}
