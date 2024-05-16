<?php
class PasajeroVip extends Pasajero
{
	private $numViajeroFrecuente;
	private $cantMillasPasajero;

	public function __construct($nombre, $numAsiento, $numTicketPasaje, $numViajeroFrecuente, $cantMillasPasajero)
	{
		parent::__construct($nombre, $numAsiento, $numTicketPasaje);
		$this->numViajeroFrecuente = $numViajeroFrecuente;
		$this->cantMillasPasajero = $cantMillasPasajero;
	}

	//*Metodos de acceso
	public function getNumViajeroFrecuente()
	{
		return $this->numViajeroFrecuente;
	}

	public function setNumViajeroFrecuente($numViajeroFrecuente)
	{
		$this->numViajeroFrecuente = $numViajeroFrecuente;
	}

	public function getCantMillasPasajero()
	{
		return $this->cantMillasPasajero;
	}

	public function setCantMillasPasajero($cantMillasPasajero)
	{
		$this->cantMillasPasajero = $cantMillasPasajero;
	}

	public function __toString()
	{
		$cadena = parent::__toString();
		$cadena .= "Numero de viajero frecuente: " . $this->getNumViajeroFrecuente() . "\n" . "Cantidad de millas de pasajero: " . $this->getCantMillasPasajero() . "\n";
		return $cadena;
	}

	//*Metodos Adicionales
	/**
	 * retorna el porcentaje que debe aplicarse como incremento según las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%. Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.
	 *
	 * @return int $porcentaje
	 */
	public function darPorcentajeIncremento()
	{
		$porcentaje = 35;
		if ($this->getCantMillasPasajero()>300) {
			$porcentaje = 30;
		}
		return $porcentaje;
	}
}//!Cierre de clase