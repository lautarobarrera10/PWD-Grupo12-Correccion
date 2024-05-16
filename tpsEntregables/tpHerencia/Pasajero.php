<?php

/**
 * Cada pasajero guarda  su “nombre”, numAsiento y “numTicketPasaje”.
 */
class Pasajero
{
	//*Atributos
	private $nombre;
	private $numAsiento;
	private $numTicketPasaje;

	//*Construct = asigna valores iniciales a los atributos de la clase
	public function __construct($nombre, $numAsiento, $numTicketPasaje)
	{
		$this->nombre = $nombre;
		$this->numAsiento = $numAsiento;
		$this->numTicketPasaje = $numTicketPasaje;
	}
	//*Metodo de Acceso Get
	public function getNombre()
	{
		return $this->nombre;
	}

	public function getNumAsiento()
	{
		return $this->numAsiento;
	}

	public function getNumTicketPasaje()
	{
		return $this->numTicketPasaje;
	}

	//*Metodo de Acceso Set
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	public function setNumAsiento($numAsiento)
	{
		$this->numAsiento = $numAsiento;
	}
	public function setNumTicketPasaje($numTicketPasaje)
	{
		$this->numTicketPasaje = $numTicketPasaje;
	}

	//* devuelve una cadena de caracteres, con la representación en texto de la instancia.

	public function __toString()
	{
		return "Nombre: " . $this->getNombre() . "\n" .
			"Numero de Asiento: " . $this->getNumAsiento() . "\n" .
			"Numero de de ticket del pasaje del viaje.: " . $this->getNumTicketPasaje() . "\n";
	}

	/**
	 * retorna el porcentaje que debe aplicarse como incremento según las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%. Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.
	 *
	 * @return int $porcentaje
	 */
	public function darPorcentajeIncremento()
	{
		$porcentaje = 10;
		return $porcentaje;
	}
}//!Cierre de clase
