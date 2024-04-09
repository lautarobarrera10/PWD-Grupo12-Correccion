<?php
//*atributos: nombre, apellido, numero de documento y teléfono.
class Pasajero
{
	//*Atributos
	private $nombre;
	private $apellido;
	private $numDocumento;
	private $numTelefono;
	//*Construct = asigna valores iniciales a los atributos de la clase
	public function __construct($nombre, $apellido, $numDocumento, $numTelefono)
	{
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->numDocumento = $numDocumento;
		$this->numTelefono = $numTelefono;
	}
	//*Metodo de Acceso Get
	public function getNombre()
	{
		return $this->nombre;
	}
	public function getApellido()
	{
		return $this->apellido;
	}
	public function getNumDocumento()
	{
		return $this->numDocumento;
	}
	public function getNumTelefono()
	{
		return $this->numTelefono;
	}

	//*Metodo de Acceso Set
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	public function setApellido($apellido)
	{
		$this->apellido = $apellido;
	}
	public function setNumDocumento($numDocumento)
	{
		$this->numDocumento = $numDocumento;
	}
	public function setNumTelefono($numTelefono)
	{
		$this->numTelefono = $numTelefono;
	}

	//* devuelve una cadena de caracteres, con la representación en texto de la instancia.

	public function __toString()
	{
		return "Nombre: " . $this->getNombre() . "\n" .
			"Apellido: " . $this->getApellido() . "\n" .
			"Numero de Documento: " . $this->getNumDocumento() . "\n" .
			"Numero de telefono: " . $this->getNumTelefono() . "\n";
	}
}//!Cierre de clase
