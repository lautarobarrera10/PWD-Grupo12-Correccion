<?php
class Venta
{
	//*atributos
	private $numero;
	private $fecha;
	private $objCliente;
	private $colObjMoto;
	private $precioFinal;

	//*Construct
	public function __construct($numero, $fecha, $objCliente, $colObjMoto, $precioFinal)
	{
		$this->numero = $numero;
		$this->fecha = $fecha;
		$this->objCliente = $objCliente;
		$this->colObjMoto = $colObjMoto;
		$this->precioFinal = $precioFinal;
	}

	//*Getters
	public function getNumero()
	{
		return $this->numero;
	}

	public function getFecha()
	{
		return $this->fecha;
	}
	public function getObjCliente()
	{
		return $this->objCliente;
	}
	public function getColObjMoto()
	{
		return $this->colObjMoto;
	}

	public function getPrecioFinal()
	{
		return $this->precioFinal;
	}


	//*Setters
	public function setNumero($numero)
	{
		$this->numero = $numero;
	}

	public function setFecha($fecha)
	{
		$this->fecha = $fecha;
	}
	public function setObjCliente($objCliente)
	{
		$this->objCliente = $objCliente;
	}
	public function setColObjMoto($colObjMoto)
	{
		$this->colObjMoto = $colObjMoto;
	}

	public function setPrecioFinal($precioFinal)
	{
		$this->precioFinal = $precioFinal;
	}


	//*convertir un array a string
	public function strColObjMoto()
	{
		$str = "";
		foreach ($this->getColObjMoto() as $value) {
			$str .= $value->__toString() . "\n";
		}
		return $str;
	}

	//*Devuelve una cadena de caracteres
	public function __toString()
	{
		return "Numero: " . $this->getNumero() . "\n" .
			"Fecha: " . $this->getFecha() . "\n" .
			"Objeto Cliente: " . $this->getObjCliente() . "\n" .
			"Coleccion de objetos Moto: " . $this->strColObjMoto() . "\n" .
			"Precio Final: " . $this->getPrecioFinal() . "\n";
	}

	//*Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo incorpora a la colección de motos de la venta, 
	//!siempre y cuando sea posible la venta. 
	//*El método cada vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta. Utilizar el método que calcula el precio de venta de la moto donde crea necesario
	public function incorporarMoto($objMoto)
	{
		$ColObjMoto[] = $this->getColObjMoto();
		if ($objMoto->getActiva()) {
			$ColObjMoto[] = $objMoto;
			//*Actualizo la col ya que se agrego un nuevo obj moto
			$this->setColObjMoto($ColObjMoto);
			$this->setPrecioFinal($objMoto->darPrecioVenta());
		}
	}
}//!Cierre clase