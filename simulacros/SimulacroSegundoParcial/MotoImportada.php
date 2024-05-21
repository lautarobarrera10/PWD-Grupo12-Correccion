<?php
class MotoImporatada extends Moto
{
	private $paisProcedencia;
	private $importeImpuestos;
	public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeAnual, $activa, $esNacional, $paisProcedencia, $importeImpuestos)
	{
		parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeAnual, $activa, $esNacional);
		parent::setEsNacional(false);
		$this->paisProcedencia = $paisProcedencia;
		$this->importeImpuestos = $importeImpuestos;
	}

	//*Metodos de accesos
	public function getPaisProcedencia()
	{
		return $this->paisProcedencia;
	}

	public function setPaisProcedencia($paisProcedencia)
	{
		$this->paisProcedencia = $paisProcedencia;
	}

	public function getImporteImpuestos()
	{
		return $this->importeImpuestos;
	}

	public function setImporteImpuestos($importeImpuestos)
	{
		$this->importeImpuestos = $importeImpuestos;
	}

	public function __toString()
	{
		$cadena = parent::__toString();
		$cadena .= "Pais desde el que se importa: " . $this->getPaisProcedencia(). "\n".
		"Importe correspondiente a los impuestos de importación: " . $this->getImporteImpuestos() . "\n";
		return $cadena;
	}

	/**
	 * Redefinir el método darPrecioVenta de las motos importadas, al valor calculado se debe sumar el impuesto que pagó la empresa por su importación.
	 *
	 * @return float $precioMoto
	 */
	public function darPrecioVenta()
	{
		$precioFinal = parent::darPrecioVenta();
		$precioFinal = $precioFinal + $this->getImporteImpuestos();
		return $precioFinal;
	}
}//!Cierre de clase