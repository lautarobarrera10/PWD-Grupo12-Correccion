function Validar() {
    let isValid = true
    var numero = $("#numero").val();
     if (numero === '') {
        alert('Por favor, ingrese un número.');
        isValid= false;
    }

    if (isNaN(numero)) {
        alert('Por favor, ingrese un valor numérico válido.');
        isValid= false;
    }
    return isValid;
}