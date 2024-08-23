function Validar() {
    var isValid = true;
    $('input[type="number"]').each(function() {
        var value = $(this).val();
        if (value === '' || isNaN(value) || value < 0) {
            alert('Por favor, ingrese un número válido para todos los días.');
            isValid = false;
        }
    });
    return isValid;
}