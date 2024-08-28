
<?php
    class Deportes extends Persona{
        private $deportes;


    public function __construct($datos){
        parent::__construct($datos);
        $this->deportes = $datos["deportes"];
    }
    public function getDeportes(){
        return $this->deportes;
    }
    public function setDeportes($deportes){
        $this->deportes = $deportes;
    }
    public function mostrarDeportes(){
        $deportes = $this->deportes;
        $deportes = implode(", ",$deportes);
        return $deportes;
    }
    
}
    ?>