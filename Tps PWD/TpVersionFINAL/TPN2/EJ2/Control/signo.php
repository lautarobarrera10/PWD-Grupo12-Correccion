<?php
// TP1/control/vernumero.php

class Numero
{
    private $numero;
    public function __construct($info)
    {
        $this->numero= $info['numero'];
    }
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function devolverSigno()
    {
        $numero=$this->getNumero();
        if ($numero == 0) {
            $mensaje = 'cero';
        } elseif ($numero > 0) {
            $mensaje = 'positivo';
        } elseif ($numero < 0) {
            $mensaje = 'negativo';
        }
        return $mensaje;
    }
}

?>
