<?php
class PasajerosEspeciales extends Pasajero
{
	private $serviciosEspeciales;
	private $asistencia;
	private $comidasEspeciales;

	public function __construct($nombre, $numAsiento, $numTicketPasaje, $serviciosEspeciales, $asistencia, $comidasEspeciales)
	{
		parent::__construct($nombre, $numAsiento, $numTicketPasaje);
		$this->serviciosEspeciales = $serviciosEspeciales;
		$this->asistencia = $asistencia;
		$this->comidasEspeciales = $comidasEspeciales;
	}

	//*Metodos de Acceso
	public function getServiciosEspeciales()
	{
		return $this->serviciosEspeciales;
	}

	public function setServiciosEspeciales($serviciosEspeciales)
	{
		$this->serviciosEspeciales = $serviciosEspeciales;
	}

	public function getAsistencia()
	{
		return $this->asistencia;
	}

	public function setAsistencia($asistencia)
	{
		$this->asistencia = $asistencia;
	}

	public function getComidasEspeciales()
	{
		return $this->comidasEspeciales;
	}

	public function setComidasEspeciales($comidasEspeciales)
	{
		$this->comidasEspeciales = $comidasEspeciales;
	}

	public function __toString()
	{
		$cadena = parent::__toString();
		$cadena .= "Requiere servicios especiales: " . $this->pasarBooleanAStr($this->getServiciosEspeciales()) . "\n" .
			"Requiere asistencia para el embarque o desembarque: " . $this->pasarBooleanAStr($this->getAsistencia()) . "\n" .
			"Requiere comidas especiales: " . $this->pasarBooleanAStr($this->getComidasEspeciales()) . "\n";
		return $cadena;
	}

	//*Metodos Adicionales
	private function pasarBooleanAStr($varBooleana)
	{
		$str = null;
		if ($varBooleana == true) {
			$str = "Si";
		}elseif ($varBooleana == false) {
			$str = "No";
		} 
		return $str;
	}


	/**
	 * retorna el porcentaje que debe aplicarse como incremento según las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%. Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.
	 *
	 * @return int $porcentaje
	 */
	public function darPorcentajeIncremento()
	{
		$porcentaje = null;
		if ($this->getServiciosEspeciales() && $this->getAsistencia() && $this->getComidasEspeciales()) {
			$porcentaje = 30;
		}elseif ($this->getServiciosEspeciales() || $this->getAsistencia() || $this->getComidasEspeciales()) {
			$porcentaje = 15;
		}
		return $porcentaje;
	}
}//!Cierre de clase