<?php

class Horas{
    private $horas;
        public function __construct($datos)
        {
            $this->horas=$datos['horas'];
        }
        public function getHoras(){
            return $this->horas;
        }
        public function setHoras($horas){
            $this->horas =$horas;
        }
    public function darHoras(){
        $horas = $this->getHoras();
        $totalHoras = array_sum($horas);

        return $totalHoras;
    }

}
?>
