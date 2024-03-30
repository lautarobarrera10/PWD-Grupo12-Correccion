<?php
class Disquera
{
	//*Atributos de la clase
	private $hora_desde = [];
	private $hora_hasta = [];
	private $estado;
	private $dirección;
	private $duenio;

	//*Construct = asigna valores iniciales a los atributos de la clase
	public function __construct($hora_desde, $hora_hasta, $estado, $dirección, $duenio)
	{
		$this->hora_desde = $hora_desde;
		$this->hora_hasta = $hora_hasta;
		$this->estado = $estado;
		$this->dirección = $dirección;
		$this->duenio = $duenio;
	}

	//*Metodos de acceso Set
	public function setHora_desde($hora_desde)
	{
		$this->hora_desde = $hora_desde;
	}
	public function setHora_hasta($hora_hasta)
	{
		$this->hora_hasta = $hora_hasta;
	}
	public function setEstado($estado)
	{
		$this->estado = $estado;
	}
	public function setDirección($dirección)
	{
		$this->dirección = $dirección;
	}
	public function setDuenio($duenio)
	{
		$this->duenio = $duenio;
	}

	//*Metodos de acceso Get
	public function getHora_desde()
	{
		return $this->hora_desde;
	}
	public function getHora_hasta()
	{
		return $this->hora_hasta;
	}
	public function getEstado()
	{
		return $this->estado;
	}
	public function getDirección()
	{
		return $this->dirección;
	}
	public function getDuenio()
	{
		return $this->duenio;
	}

	//*devuelve una cadena de caracteres, con la representación en texto de la instancia.
	public function __toString()
	{
		return "Abre a las: " . $this->getHora_desde()["hora"] . ":" . $this->getHora_desde()["minuto"] . "\n" .
			"Cierra a las: " . $this->getHora_hasta()["hora"] . ":" . $this->getHora_hasta()["minuto"] . "\n" .
			"Estado: " . $this->abiertoCerrado() . "\n" .
			"Direccion: " . $this->getDirección() . "\n" .
			"Informacion del dueño: " . "\n" . $this->getDuenio() . "\n";
	}

	//*Funciones para el toString
	private function abiertoCerrado()
	{
		$abiertoCerrado = "cerrado";
		if ($this->getEstado()) {
			$abiertoCerrado = "abierto";
		}
		return $abiertoCerrado;
	}

	//*Dada una hora y minutos retorna true si la tienda debe encontrarse abierta en ese horario y false en caso contrario.
	public function dentroHorarioAtencion($hora, $minutos)
	{
		$tiendaAbierta = false;
		$getHoraInicio = $this->getHora_desde()["hora"];
		$getMinutoInicio = $this->getHora_desde()["minuto"];
		$getHoraCierre = $this->getHora_hasta()["hora"];
		$getMinutoCierre = $this->getHora_hasta()["minuto"];
		if (
			($hora > $getHoraInicio || ($hora == $getHoraInicio && $minutos >= $getMinutoInicio)) &&
			($hora < $getHoraCierre || ($hora == $getHoraCierre && $minutos <= $getMinutoCierre))
		) {
			$tiendaAbierta = true;
		}
		return $tiendaAbierta;
	}

	//*Dada una hora y minutos corrobora que se encuentra dentro del horario de atención y cambia el estado de la disquera solo si es un horario válido para su apertura
	public function abrirDisquera($hora, $minutos)
	{
		$abrirDisquera = false;
		if ($this->dentroHorarioAtencion($hora, $minutos)) {
			$abrirDisquera = true;
			$this->setEstado($abrirDisquera);
		}
		return $abrirDisquera;
	}

	//*Que dada una hora y minutos corrobora que se encuentra fuera del horario de atención y cambia el estado de la disquera solo si es un horario válido para su cierre.
	public function cerrarDisquera($hora, $minutos)
	{
		$cerrarDisquera = true;
		if (!$this->dentroHorarioAtencion($hora, $minutos)) {
			$cerrarDisquera = false;
			$this->setEstado($cerrarDisquera);
		}
		return $cerrarDisquera;
	}

}//!Cierre Clase
