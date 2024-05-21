<?php
class MotoNacional extends Moto
{
	private $descuento;
	public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeAnual,$activa, $esNacional)
	{
		parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeAnual, $activa, $esNacional);
		parent::setEsNacional(true);
		$this->descuento = 15;
	}

	//*Metodos de accesos
	public function getDescuento()
	{
		return $this->descuento;
	}

	public function setDescuento($descuento)
	{
		$this->descuento = $descuento;
	}

	public function __toString()
	{
		$cadena = parent::__toString();
		$cadena .= "Descuento en las motos: " . $this->getDescuento() . "\n";
		return $cadena;
	}

	/**
	 * Redefinir el método darPrecioVenta para que en el caso de las motos nacionales aplique el porcentaje de descuento sobre el valor calculado inicialmente. 
	 *
	 * @return float $precioMoto
	 */
	public function darPrecioVenta()
	{
		$precioFinal = parent::darPrecioVenta();
		$porcentaje = $precioFinal * ($this->getDescuento()/100);
		$precioFinal = $precioFinal - $porcentaje;
		return $precioFinal;
	}
}//!Cierre de clase