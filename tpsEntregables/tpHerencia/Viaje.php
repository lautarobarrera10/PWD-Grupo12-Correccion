<?php
//*referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el viaje, La clase Viaje debe hacer referencia al responsable de realizar el viaje.
class Viaje
{
	//*Atributos
	private $codigo;
	private $destino;
	private $cantMaxPasajeros;
	private $colObjPasajeros = [];
	private $objResponsableV;
	private $costoViaje;
	private $sumaCostosAbonados;


	//*Construct = asigna valores iniciales a los atributos de la clase
	public function __construct($codigo, $destino, $cantMaxPasajeros, $colObjPasajeros, $objResponsableV, $costoViaje, $sumaCostosAbonados)
	{
		$this->codigo = $codigo;
		$this->destino = $destino;
		$this->cantMaxPasajeros = $cantMaxPasajeros;
		$this->colObjPasajeros = $colObjPasajeros;
		$this->objResponsableV = $objResponsableV;
		$this->costoViaje = $costoViaje;
		$this->sumaCostosAbonados = $sumaCostosAbonados;
	}

	//*Metodo de Acceso Get
	public function getCodigo()
	{
		return $this->codigo;
	}

	public function getDestino()
	{
		return $this->destino;
	}
	public function getCantMaxPasajeros()
	{
		return $this->cantMaxPasajeros;
	}
	public function getColObjPasajeros()
	{
		return $this->colObjPasajeros;
	}

	public function getObjResponsableV()
	{
		return $this->objResponsableV;
	}

	public function getCostoViaje()
	{
		return $this->costoViaje;
	}


	public function getSumaCostosAbonados()
	{
		return $this->sumaCostosAbonados;
	}

	//*Metodo de Acceso Set

	public function setCodigo($codigo)
	{
		$this->codigo = $codigo;
	}

	public function setDestino($destino)
	{
		$this->destino = $destino;
	}
	public function setCantMaxPasajeros($cantMaxPasajeros)
	{
		$this->cantMaxPasajeros = $cantMaxPasajeros;
	}
	public function setColObjPasajeros($colObjPasajeros)
	{
		$this->colObjPasajeros = $colObjPasajeros;
	}

	public function setObjResponsableV($objResponsableV)
	{
		$this->objResponsableV = $objResponsableV;
	}

	public function setCostoViaje($costoViaje)
	{
		$this->costoViaje = $costoViaje;
	}
	public function setSumaCostosAbonados($sumaCostosAbonados)
	{
		$this->sumaCostosAbonados = $sumaCostosAbonados;
	}

	//* devuelve una cadena de caracteres, con la representación en texto de la instancia.
	public function __toString()
	{
		return "Codigo del Viaje: " . $this->getCodigo() . "\n" .
			"Destino: " . $this->getDestino() . "\n" .
			"Cantidad Maxima de Pasajeros: " . $this->getCantMaxPasajeros() . "\n" .
			"\nResponsable del Viaje: " . $this->getObjResponsableV() . "\n" .
			"Pasajeros: \n" . $this->strColPasajero() .
			"Costo del viaje: " . $this->getCostoViaje() . "\n" .
			"Suma de los costos abonados por los pasajeros: " . $this->getSumaCostosAbonados() . "\n";
	}

	//*Funciones Adicionales
	//*Recorre la coleccion de pasajeros y da su info para el toString
	private function strColPasajero()
	{
		$str = "";
		foreach ($this->getColObjPasajeros() as $value) {
			$str .= $value . "\n";
		}
		return $str;
	}

	//*Verefica si hay una persona con el mismo dni y si lo hay retorna true.
	public function verificarDni($dni, $colObjPasajero)
	{
		$seEncuentra = false;
		$i = 0;
		while ($i < count($colObjPasajero)) {
			if ($colObjPasajero[$i]->getNumDocumento() == $dni) {
				$seEncuentra = true;
			}
			$i++;
		}
		return $seEncuentra;
	}

	public function menuGeneral()
	{
		echo "Menú:\n";
		echo "0. Salir\n";
		echo "1. Ver información del viaje.\n";
		echo "2. Modificar información del viaje.\n";
		echo "3. Comprar Pasaje.\n";
		echo "Seleccione una opción (0-3): ";
	}

	public function menuModificar()
	{
		echo "0. Para volver al menu.\n";
		echo "¿Qué dato desea cambiar? \n";
		echo "1. Viaje.\n";
	}


	public function menuModificarViaje()
	{
		echo "------- Modificar Viaje -------\n";
		echo "0. Para volver al menu.\n";
		echo "1. Modificar codigo.\n";
		echo "2. Modificar destino.\n";
		echo "3. Modificar la cantidad de pasajeros.\n";
		echo "Seleccione una opción (0-3): ";
	}

	/**
	 * Retorna true si se encontro el mismo num de ticket
	 *
	 * @param int $numTicket
	 * @return boolean $seEncontro
	 */
	private function VerificarNumTicket($numTicket)
	{
		$i = 0;
		$seEncontro = false;
		while ($i < count($this->getColObjPasajeros()) && !$seEncontro) {
			if ($this->getColObjPasajeros()[$i]->getNumTicketPasaje() == $numTicket) {
				$seEncontro = true;
			}
			$i++;
		}
		return $seEncontro;
	}

	private function pasarStrABool($varStr)
	{
		$varStr = trim($varStr);
		$varStr = strtolower($varStr);
		$varBoolean = null;
		if ($varStr == "si") {
			$varBoolean = true;
		} elseif($varStr == "no") {
			$varBoolean = false;
		}
		return $varBoolean;
	}

	public function ComprarPasaje($colObjPasajero)
	{
		echo "¿Que Pasaje desea comprar: Esp,Vip,Comun?\n";
		$rtaTipo = trim(fgets(STDIN));
		$rtaTipo = strtolower($rtaTipo);
		if ($rtaTipo == "esp") {
			if ($this->getCantMaxPasajeros() > count($colObjPasajero)) {
				echo "\nNombre: ";
				$nombre = trim(fgets(STDIN));
				echo "\nNumero de asiento: ";
				$numAsiento = trim(fgets(STDIN));
				echo "\nNumero de ticket del pasaje del viaje: ";
				$numTicket = trim(fgets(STDIN));
				echo "\nRequiere servicios especiales: ";
				$servEsp = fgets(STDIN);
				$servEsp = $this->pasarStrABool($servEsp);
				echo "\nRequiere asistencia para el embarque o desembarque: ";
				$asistencia = fgets(STDIN);
				$asistencia =$this->pasarStrABool($asistencia);
				echo "\nRequiere comidas especiales: ";
				$comidasEsp = fgets(STDIN);
				$comidasEsp =$this->pasarStrABool($comidasEsp);
				if ($nombre != null && $numAsiento != null && $numTicket != null && !$this->VerificarNumTicket($numTicket) /*  && !$this->verificarDni($numDocumento, $colObjPasajero) */) {
					$objPasajero4 = new PasajerosEspeciales($nombre, $numAsiento, $numTicket, $servEsp, $asistencia, $comidasEsp);
					$this->venderPasaje($objPasajero4);
					echo "------- Cargando Pasajero -------\n";
				} else {
					echo "\nNo se pudo agregar ya que algun dato fue nulo.\n";
				}
			} else {
				echo "\nSe alcanzo la capacidad maxima.\n\n";
			}
		} elseif ($rtaTipo == "vip") {
			if ($this->getCantMaxPasajeros() > count($colObjPasajero)) {
				echo "\nNombre: ";
				$nombre = trim(fgets(STDIN));
				echo "\nNumero de asiento: ";
				$numAsiento = trim(fgets(STDIN));
				echo "\nNumero de ticket del pasaje del viaje: ";
				$numTicket = trim(fgets(STDIN));
				echo "\nNumero de viajero frecuente: ";
				$numViajFrec = trim(fgets(STDIN));
				echo "\nCantidad de millas de pasajero: ";
				$cantMillasPasajero = trim(fgets(STDIN));
				if ($nombre != null && $numAsiento != null && $numTicket != null && !$this->VerificarNumTicket($numTicket) /*  && !$this->verificarDni($numDocumento, $colObjPasajero) */) {
					$objPasajero4 = new PasajeroVip($nombre, $numAsiento, $numTicket, $numViajFrec, $cantMillasPasajero);
					$this->venderPasaje($objPasajero4);
					echo "------- Cargando Pasajero -------\n";
				} else {
					echo "\nNo se pudo agregar ya que algun dato fue nulo.\n";
				}
			} else {
				echo "\nSe alcanzo la capacidad maxima.\n\n";
			}
		} elseif ($rtaTipo == "comun") {
			if ($this->getCantMaxPasajeros() > count($colObjPasajero)) {
				echo "\nNombre: ";
				$nombre = trim(fgets(STDIN));
				echo "\nNumero de asiento: ";
				$numAsiento = trim(fgets(STDIN));
				echo "\nNumero de ticket del pasaje del viaje: ";
				$numTicket = trim(fgets(STDIN));
				if ($nombre != null && $numAsiento != null && $numTicket != null && $this->VerificarNumTicket($numTicket) == false /*  && !$this->verificarDni($numDocumento, $colObjPasajero) */) {
					$objPasajero4 = new Pasajero($nombre, $numAsiento, $numTicket);
					$this->venderPasaje($objPasajero4);
					echo "------- Cargando Pasajero -------\n";
				} else {
					echo "\nNo se pudo agregar ya que algun dato fue nulo.\n";
				}
			} else {
				echo "\nSe alcanzo la capacidad maxima.\n\n";
			}
		}
	}

	/**
	 *  retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso contrario
	 *
	 * @return boolean
	 */
	public function hayPasajesDisponibles()
	{
		$hayEspacio = false;
		$colObjPasajero = $this->getColObjPasajeros();
		if ($this->getCantMaxPasajeros() > count($colObjPasajero)) {
			$hayEspacio = true;
		}
		return $hayEspacio;
	}

	/**
	 * incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.
	 *
	 * @param object $objPasajero
	 * @return float
	 */
	public function venderPasaje($objPasajero)
	{
		$colObjPasajero = $this->getColObjPasajeros();
		$costoFinal = null;
		$costosAbonados = $this->getSumaCostosAbonados();
		if ($this->hayPasajesDisponibles()) {
			array_push($colObjPasajero, $objPasajero);
			$this->setColObjPasajeros($colObjPasajero);
			$porcentaje = $this->getCostoViaje() * ($objPasajero->darPorcentajeIncremento() / 100);
			$costoFinal += $this->getCostoViaje() + $porcentaje;
			$costoFinal += $costosAbonados;
			$this->setSumaCostosAbonados($costoFinal);
		}
		return round($costoFinal, 2);
	}

	/**
	 * Setea la suma de los costos abonados por los pasajeros
	 *
	 * @return void
	 */
	public function sumaCostos()
	{
		$sumaDinero = 0;
		foreach ($this->getColObjPasajeros() as  $pasajero) {
			$porcentaje = $this->getCostoViaje() * ($pasajero->darPorcentajeIncremento() / 100);
			$sumaDinero += $this->getCostoViaje() + $porcentaje;
		}
		$this->setSumaCostosAbonados($sumaDinero);
	}
}//!Cierre de clase