
<?php
    class GeneroYEstudios extends Persona{
   
    private $genero;
    private $estudios;


    public function __construct($datos){
        parent::__construct($datos);
        $this->genero = $datos["genero"];
        $this->estudios = $datos["estudios"];
    }


    public function getGenero(){
        return $this->genero;
    }

    public function getEstudios(){
        return $this->estudios;
    }


    public function setGenero($genero){
        $this->genero = $genero;
    }

    public function setEstudios($estudios){
        $this->estudios = $estudios;
    }

   
}
    ?>