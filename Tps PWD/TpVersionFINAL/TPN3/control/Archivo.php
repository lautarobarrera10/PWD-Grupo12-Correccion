<?php

class Archivo
{
    private $dir;

    public function __construct()
    {
        $this->dir = '../../archivos/';
    }

    public function getDir()
    {
        return $this->dir;
    }

    public function setDir($dir)
    {
        $this->dir = $dir;
    }

    public function subirArchivo($array)
    {
        $respuesta = '';
        // $dir = realpath($this->getDir());
        // echo 'Ruta completa: ' . $dir . '<br>';

        $archivo = $array['miArchivo'];
        $tipoPermitido = ['application/msword', 'application/pdf'];
        $tamanoMaximo = 2 * 1024 * 1024; // 2MB en bytes

        // Verificar si el archivo tiene un tipo permitido
        if (!in_array($archivo['type'], $tipoPermitido)) {
            $respuesta = -2; // Tipo de archivo no permitido
        }
        // Verificar si el archivo excede el tamaño máximo
        elseif ($archivo['size'] > $tamanoMaximo) {
            $respuesta = -3; // Tamaño del archivo excedido
        }
        // Intentar copiar el archivo al servidor si no hay errores previos
        elseif ($archivo['error'] <= 0) {
            if (
                !copy($archivo['tmp_name'], $this->getDir() . $archivo['name'])
            ) {
                $respuesta = 0; // Error al copiar el archivo
            } else {
                $respuesta = 1; // Archivo copiado con éxito
            }
        } else {
            $respuesta = -1; // Error de acceso al archivo temporal
        }

        return $respuesta;
    }
}
?>
