<?php
class Moto
{
	//*atributos
	private $codigo;
	private $costo;
	private $anioFabricacion;
	private $descripcion;
	private $porcentajeAnual;
	private $esNacional;

	//! activa (atributo que va a contener un valor true, si la moto está disponible para la venta y false en caso contrario)
	private $activa;

	//*Construct
	public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeAnual, $activa, $esNacional)
	{
		$this->codigo = $codigo;
		$this->costo = $costo;
		$this->anioFabricacion = $anioFabricacion;
		$this->descripcion = $descripcion;
		$this->porcentajeAnual = $porcentajeAnual;
		$this->activa = $activa;
		$this->esNacional = $esNacional;
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

	public function getEsNacional()
	{
		return $this->esNacional;
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

	public function setEsNacional($esNacional)
	{
		$this->esNacional = $esNacional;
	}

	//*Devuelve una cadena de caracteres
	public function __toString()
	{
		return "Codigo: " . $this->getCodigo() . "\n" .
			"Costo: " . $this->getCosto() . "\n" .
			"Anio de Fabricacion: " . $this->getAnioFabricacion() . "\n" .
			"Descripcion: " . $this->getDescripcion() . "\n" .
			"Porcentaje Anual: " . $this->getPorcentajeAnual() . "\n" .
			"Esta Activa?: " . $this->getActiva() . "\n" .
			"Es Nacional?: " . $this->getEsNacional() . "\n";
	}


	//*Calcula el valor por el cual puede ser vendida una moto. Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para la venta, el método realiza el siguiente cálculo: $_venta = $_compra + $_compra * (anio * por_inc_anual) donde $_compra: es el costo de la moto. anio: cantidad de años transcurridos desde que se fabricó la moto. por_inc_anual: porcentaje de incremento anual de la moto
	/**
	 * Redefinir el método darPrecioVenta para que en el caso de las motos nacionales aplique el porcentaje de descuento sobre el valor calculado inicialmente. Para el caso de las motos importadas, al valor calculado se debe sumar el impuesto que pagó la empresa por su importación. A continuación se describe el método darPrecioVenta con el objetivo de tener presente su implementación y realizar las modificaciones que crea necesarias para dar soporte al nuevo requerimiento.
	 *
	 * @return float $precioMoto
	 */
	public function darPrecioVenta()
	{
		$precioMoto = -1;
		$anioMoto = 2024 - $this->getAnioFabricacion();

		if ($this->getActiva()) {
			$_venta = $this->getCosto() + ($this->getCosto() * ($anioMoto * $this->getPorcentajeAnual()));
			$precioMoto = $_venta;
		}
		return $precioMoto;
	}
}//!Cierre clase