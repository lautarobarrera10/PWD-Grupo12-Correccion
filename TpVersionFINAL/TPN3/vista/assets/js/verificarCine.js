/* $(document).ready(function() {

    $('form').on('submit', function(e) {
        let anio = $('#anio').val();
        let duracion = $('#duracion').val();
        let error = 0;

        // Limpiar mensajes anteriores
        $('.mensaje').html('');

        // Validar que el campo Año solo contenga 4 dígitos y que sea numérico
        if (anio.length !== 4 || isNaN(anio)) {
            $('#anio').next('.mensaje').html('El año debe tener exactamente 4 números.');
            error++;
        }

        // Validar que el campo Duración solo contenga un máximo de 3 dígitos y que sea numérico
        if (duracion.length > 3 || isNaN(duracion)) {
            $('#duracion').next('.mensaje').html('La duración debe tener un máximo de 3 números.');
            error++;
        }

        // Validación de campos obligatorios
        $('input[type="text"], textarea, select').each(function() {
            if ($(this).val().trim() === '') {
                $(this).next('.mensaje').html('El campo ' + $(this).attr('name') + ' es obligatorio.');
                error++;
            }
        });

        // Mostrar errores si los hay
        if (error > 0) {
            e.preventDefault();
        }
    });

    // Limpiar mensajes de error al resetear el formulario
    $('button[type="reset"]').on('click', function() {
        $('.mensaje').html('');
    });
});
 */

// Validacion con Bootstrap
	