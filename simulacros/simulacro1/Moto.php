<?php
class Moto
{
	//*atributos
	private $codigo;
	private $costo;
	private $anioFabricacion;
	private $descripcion;
	private $porcentajeAnual;

	//! activa (atributo que va a contener un valor true, si la moto está disponible para la venta y false en caso contrario)
	private $activa;

	//*Construct
	public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeAnual, $activa)
	{
		$this->codigo = $codigo;
		$this->costo = $costo;
		$this->anioFabricacion = $anioFabricacion;
		$this->descripcion = $descripcion;
		$this->porcentajeAnual = $porcentajeAnual;
		$this->activa = $activa;
	}

	//*Getters
	public function getCodigo()
	{
		return $this->codigo;
	}

	public function getCosto()
	{
		return $this->costo;
	}
	public function getAnioFabricacion()
	{
		return $this->anioFabricacion;
	}
	public function getDescripcion()
	{
		return $this->descripcion;
	}

	public function getPorcentajeAnual()
	{
		return $this->porcentajeAnual;
	}
	public function getActiva()
	{
		return $this->activa;
	}

	//*Setters
	public function setCodigo($codigo)
	{
		$this->codigo = $codigo;
	}

	public function setCosto($costo)
	{
		$this->costo = $costo;
	}
	public function setAnioFabricacion($anioFabricacion)
	{
		$this->anioFabricacion = $anioFabricacion;
	}
	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	public function setPorcentajeAnual($porcentajeAnual)
	{
		$this->porcentajeAnual = $porcentajeAnual;
	}
	public function setActiva($activa)
	{
		$this->activa = $activa;
	}

	//*Devuelve una cadena de caracteres
	public function __toString()
	{
		return "Codigo: " . $this->getCodigo() . "\n" .
			"Costo: " . $this->getCosto() . "\n" .
			"Anio de Fabricacion: " . $this->getAnioFabricacion() . "\n" .
			"Descripcion: " . $this->getDescripcion() . "\n" .
			"Porcentaje Anual: " . $this->getPorcentajeAnual() . "\n" .
			"Esta Activa?: " . $this->getActiva() . "\n";
	}


	//*Calcula el valor por el cual puede ser vendida una moto. Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para la venta, el método realiza el siguiente cálculo: $_venta = $_compra + $_compra * (anio * por_inc_anual) donde $_compra: es el costo de la moto. anio: cantidad de años transcurridos desde que se fabricó la moto. por_inc_anual: porcentaje de incremento anual de la moto
	public function darPrecioVenta()
	{
		$precioMoto = -1;
		$anioMoto = 2024 - $this->getAnioFabricacion();

		if ($this->getActiva()) {
			$_venta = $this->getCosto() +( $this->getCosto() * ($anioMoto * $this->getPorcentajeAnual()));
			$precioMoto = $_venta;
		}
		return $precioMoto;
	}

}//!Cierre clase
