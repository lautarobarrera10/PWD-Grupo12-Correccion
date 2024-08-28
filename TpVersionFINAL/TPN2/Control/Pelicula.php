

<?php
class Pelicula{
        private $titulo;
        private $actores;
        private $director;
        private $guion;
        private $produccion;
        private $anio;
        private $nacionalidad;        
        private $duracion;
        private $restricciones;
        public function __construct($info){
            $this->titulo =$info["Titulo"];
            $this->actores =$info["Actores"];
            $this->director =$info["Directores"];
            $this->guion =$info["Guion"];
            $this->produccion =$info["Produccion"];
            $this->anio =$info["Anio"];
            $this->nacionalidad =$info["Nacionalidad"];
            $this->duracion =$info["Duracion"];
            $this->restricciones =$info["Restriccion_de_edad"];
        }
        public function getTitulo(){
            return $this->titulo;
        }
        public function getActores(){
            return $this->actores;
        }
        public function getDirector(){
            return $this->director;
        }
        public function getGuion(){
            return $this->guion;
        }
        public function getProduccion(){
            return $this->produccion;
        }
        public function getAnio(){
            return $this->anio;
        }
        public function getNacionalidad(){
            return $this->nacionalidad;
        }
        public function getDuracion(){
            return $this->duracion;
        }
        public function getRestricciones(){
            return $this->restricciones;
        }
        public function setTitulo($itulo){
            $this->titulo=$itulo;
        }
        public function setActores($actores){
            $this->actores=$actores;
        }
        public function setDirector($director){
            $this->director=$director;
        }
        public function setGuion($guion){
            $this->guion=$guion;
        }
        public function setProduccion($produccion){
            $this->produccion=$produccion;
        }
        public function setAnio($anio){
            $this->anio=$anio;
        }
        public function setNacionalidad($nacionalidad){
            $this->nacionalidad=$nacionalidad;
        }
    
}