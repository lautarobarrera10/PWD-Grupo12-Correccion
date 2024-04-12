<?php
class Cliente
{
	//*atributos
	private $nombre;
	private $apellido;
	//! Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja
	private $dadoBaja;
	private $tipoDoc;
	private $numDoc;

	//*Construct
	public function __construct($nombre, $apellido, $dadoBaja, $tipoDoc, $numDoc)
	{
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->dadoBaja = $dadoBaja;
		$this->tipoDoc = $tipoDoc;
		$this->numDoc = $numDoc;
	}

	//*Getters
	public function getNombre()
	{
		return $this->nombre;
	}

	public function getApellido()
	{
		return $this->apellido;
	}
	public function getDadoBaja()
	{
		return $this->dadoBaja;
	}
	public function getTipoDoc()
	{
		return $this->tipoDoc;
	}

	public function getNumDoc()
	{
		return $this->numDoc;
	}

	//*Setters
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function setApellido($apellido)
	{
		$this->apellido = $apellido;
	}
	public function setDadoBaja($dadoBaja)
	{
		$this->dadoBaja = $dadoBaja;
	}
	public function setTipoDoc($tipoDoc)
	{
		$this->tipoDoc = $tipoDoc;
	}

	public function setNumDoc($numDoc)
	{
		$this->numDoc = $numDoc;
	}

	//*Devuelve una cadena de caracteres
	public function __toString()
	{
		return "Nombre: " . $this->getNombre() . "\n" .
			"Apellido: " . $this->getApellido() . "\n" .
			"Esta dado de BAJA?: " . $this->getDadoBaja() . "\n" .
			"Tipo de doc: " . $this->getTipoDoc() . "\n" .
			"NUM de doc: " . $this->getNumDoc() . "\n";
	}

}//!Cierre de clase
