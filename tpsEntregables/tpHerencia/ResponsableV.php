<?php
/**
 * registre el número de empleado, número de licencia, nombre y apellido.
 */
class ResponsableV
{
	//*Atributos
	private $numEmpleado;
	private $numLicencia;
	private $nombre;
	private $apellido;

	//*Construct = asigna valores iniciales a los atributos de la clase
	public function __construct($numEmpleado, $numLicencia, $nombre, $apellido)
	{
		$this->numEmpleado = $numEmpleado;
		$this->numLicencia = $numLicencia;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
	}
	//*Metodo de Acceso Get
	public function getNumEmpleado()
	{
		return $this->numEmpleado;
	}
	public function getNumLicencia()
	{
		return $this->numLicencia;
	}
	public function getNombre()
	{
		return $this->nombre;
	}
	public function getApellido()
	{
		return $this->apellido;
	}
	//*Metodo de Acceso Set
	public function setNumEmpleado($numEmpleado)
	{
		$this->numEmpleado = $numEmpleado;
	}
	public function setNumLicencia($numLicencia)
	{
		$this->numLicencia = $numLicencia;
	}
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	public function setApellido($apellido)
	{
		$this->apellido = $apellido;
	}
	//* devuelve una cadena de caracteres, con la representación en texto de la instancia.}
	public function __toString()
	{
		return "\n" . "Numero de empleado: " . $this->getNumEmpleado() . "\n" .
			"Numero de licencia: " . $this->getNumLicencia() . "\n" .
			"Nombre: " . $this->getNombre() . "\n" .
			"Apellido: " . $this->getApellido() . "\n";
	}
}//!Cierre de clase