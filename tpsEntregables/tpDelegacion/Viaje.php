<?php
//*referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el viaje, La clase Viaje debe hacer referencia al responsable de realizar el viaje.
class Viaje
{
	//*Atributos
	private $codigo;
	private $destino;
	private $cantMaxPasajeros;
	private $colObjPasajeros = [];
	private $objResponsableV;

	//*Construct = asigna valores iniciales a los atributos de la clase
	public function __construct($codigo, $destino, $cantMaxPasajeros, $colObjPasajeros, $objResponsableV)
	{
		$this->codigo = $codigo;
		$this->destino = $destino;
		$this->cantMaxPasajeros = $cantMaxPasajeros;
		$this->colObjPasajeros = $colObjPasajeros;
		$this->objResponsableV = $objResponsableV;
	}

	//*Metodo de Acceso Get
	public function getCodigo()
	{
		return $this->codigo;
	}

	public function getDestino()
	{
		return $this->destino;
	}
	public function getCantMaxPasajeros()
	{
		return $this->cantMaxPasajeros;
	}
	public function getColObjPasajeros()
	{
		return $this->colObjPasajeros;
	}

	public function getObjResponsableV()
	{
		return $this->objResponsableV;
	}

	//*Metodo de Acceso Set

	public function setCodigo($codigo)
	{
		$this->codigo = $codigo;
	}

	public function setDestino($destino)
	{
		$this->destino = $destino;
	}
	public function setCantMaxPasajeros($cantMaxPasajeros)
	{
		$this->cantMaxPasajeros = $cantMaxPasajeros;
	}
	public function setColObjPasajeros($colObjPasajeros)
	{
		$this->colObjPasajeros = $colObjPasajeros;
	}

	public function setObjResponsableV($objResponsableV)
	{
		$this->objResponsableV = $objResponsableV;
	}

	//* devuelve una cadena de caracteres, con la representación en texto de la instancia.
	public function __toString()
	{
		return "Codigo del Viaje: " . $this->getCodigo() . "\n" .
			"Destino: " . $this->getDestino() . "\n" .
			"Cantidad Maxima de Pasajeros: " . $this->getCantMaxPasajeros() . "\n" .
			"\nResponsable del Viaje: " . $this->getObjResponsableV() . "\n" .
			"Pasajeros: \n" . $this->strColPasajero();
	}

	//*Funciones Adicionales
	//*Recorre la coleccion de pasajeros y da su info para el toString
	private function strColPasajero()
	{
		$str = "";
		foreach ($this->getColObjPasajeros() as $value) {
			$str .= $value . "\n";
		}
		return $str;
	}
}//!Cierre de clase
