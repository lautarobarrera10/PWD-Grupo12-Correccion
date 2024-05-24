<?php
class PartidoFutbol extends Partido
{

	public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2)
	{
		parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
		parent::getCoefBase();
	}

	public function coeficientePartido()
	{
		$coef = null;
		if (parent::getObjEquipo1()->getObjCategoria()->getDescripcion() == "Mayores" && parent::getObjEquipo2()->getObjCategoria()->getDescripcion() == "Mayores") {
			parent::setCoefBase(0.27);
		} elseif (parent::getObjEquipo1()->getObjCategoria()->getDescripcion() == "juveniles" && parent::getObjEquipo2()->getObjCategoria()->getDescripcion() == "juveniles") {
			parent::setCoefBase(0.19);
		} elseif (parent::getObjEquipo1()->getObjCategoria()->getDescripcion() == "Menores" && parent::getObjEquipo2()->getObjCategoria()->getDescripcion() == "Menores") {
			parent::setCoefBase(0.13);
		}
		$coef = parent::coeficientePartido();
		return $coef;
	}

	public function __toString()
	{
		$cadena = parent::__toString();
		return $cadena;
	}
}//!Cierre de clase