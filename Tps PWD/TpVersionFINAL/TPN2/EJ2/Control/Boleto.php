
<?php

class Boleto{
private $estudia;
private $edad;

    public function __construct($datos){
        $this->estudia = $datos['estudiante'] == "si" ? true : false;
        $this->edad = $datos["edad"];
    }
    public function getValorEstudia(){
        return $this->estudia;
    }

    public function setValorEstudia($estudia){
        $this->estudia = $estudia;
    }

    public function getEdad(){
        return $this->edad;
    }
    public function setEdad($edad){
        $this->edad = $edad;
    }

    public function calcularBoleto(){
        $costoEntrada = 0;
        $estudiante = $this->getValorEstudia();
        $edad = $this->getEdad();


        if($estudiante && $edad >= 12){
            $costoEntrada = 180;
        }else if($estudiante || $edad < 12 ){
            $costoEntrada = 160;
        }else{
            $costoEntrada = 300;
        }
        return $costoEntrada;
    }


    

}
