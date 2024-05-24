<?php
class PartidoBasquet extends Partido
{
	private $infracciones;
	public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $infracciones)
	{
		parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
		$this->infracciones = $infracciones;
	}

	public function getInfracciones()
	{
		return $this->infracciones;
	}

	public function setInfracciones($infracciones)
	{
		$this->infracciones = $infracciones;
	}


	public function coeficientePartido()
	{
		$coef = parent::getCoefBase() - (0.75 *$this->getInfracciones());
		parent::setCoefBase($coef);
		$coefFinal = parent::coeficientePartido();
		return $coefFinal;
	}

	public function __toString()
	{
		$cadena = parent::__toString();
		$cadena = "Cantidad de infracciones: " . $this->getInfracciones() . "\n";
		return $cadena;
	}
}//!Cierre de clase