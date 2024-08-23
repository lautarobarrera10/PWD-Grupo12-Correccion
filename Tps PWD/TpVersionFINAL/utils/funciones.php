<?php

function darDatosSubmitted()
{
    $datos = [];
    //piso el array de datos con los datos que vienen por POST para darles prioridad
    foreach ($_GET as $key => $value) {
        $datos[$key] = $value;
    }
    foreach ($_POST as $key => $value) {
        $datos[$key] = $value;
    }
    if (!empty($_FILES)) {
        $datos = array_merge($datos, $_FILES);
    }   
    return $datos;
}
?>
