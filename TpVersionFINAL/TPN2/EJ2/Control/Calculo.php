<?php


class Calculo{
    private $numero1;
    private $numero2;
    private $operacion;
    public function __construct($datos){
        $this->numero1 = $datos['op1'];
        $this->numero2= $datos['op2'];
        $this->operacion = $datos['tipo'];
    }
    public function setNumero1($numero1){
        $this->$numero1 = $numero1;
   }
   public function getNumero1(){
       return $this->numero1;
   }
   public function setNumero2($numero2){
        $this->$numero2 = $numero2;
   }
   public function getNumero2(){
       return $this->numero2;
   }
   public function setOperacion($operacion){
        $this->$operacion = $operacion;
   }
   public function getOperacion(){
       return $this->operacion;
   }
    function devolverCalculo(){
        $op1= $this->getNumero1();
        $op2= $this->getNumero2();
       $operacion = $this->getOperacion();
        $resultado = 0;
        if(is_numeric($op1) && is_numeric($op2)){
            switch ($operacion) {
                case 'suma':
                    $resultado = $op1 + $op2;
                    break;
                case 'resta':
                    $resultado = $op1 - $op2;
                    break;
                case 'multiplicacion':
                    $resultado = $op1 * $op2;
                    break;
                case 'division':
                    if($op2 == 0){
                        $resultado ="error";
    
                    }else{
                        $resultado = $op1 / $op2; 
                    }
                    break;
                default:
                    $resultado = "error";
                    break;
            }  
        }else{
            $resultado = -1;
        }
        
        return $resultado;
    }

}

   
   

?>
