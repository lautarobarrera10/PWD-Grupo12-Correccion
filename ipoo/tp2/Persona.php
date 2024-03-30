<?php
class Persona
{
	//*Atributos de la clase
	private $nombre;
	private $apellido;
	private $tipoDoc;
	private $numDoc;

	//*Construct = asigna valores iniciales a los atributos de la clase
	public function __construct($nombre, $apellido, $numDoc, $tipoDoc)
	{
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->numDoc = $numDoc;
		$this->tipoDoc = $tipoDoc;
	}

	//*Metodos de acceso Get
	public function getNombre()
	{
		return $this->nombre;
	}
	public function getApellido()
	{
		return $this->apellido;
	}
	public function getNumDoc()
	{
		return $this->numDoc;
	}
	public function getTipoDoc()
	{
		return $this->tipoDoc;
	}
	//*Metodos de acceso Set
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	public function setApellido($apellido)
	{
		$this->apellido = $apellido;
	}
	public function setNumDoc($numDoc)
	{
		$this->numDoc = $numDoc;
	}
	public function setTipoDoc($tipoDoc)
	{
		$this->tipoDoc = $tipoDoc;
	}

	//*devuelve una cadena de caracteres, con la representación en texto de la instancia.
	public function __toString()
	{
		return "Nombre: " . $this->getNombre() . "\n" .
			"Apellido: " . $this->getApellido() . "\n" .
			"Num de Documento: " . $this->getNumDoc() . "\n" .
			"Tipo de Documento: " . $this->getTipoDoc() . "\n";
	}
}
