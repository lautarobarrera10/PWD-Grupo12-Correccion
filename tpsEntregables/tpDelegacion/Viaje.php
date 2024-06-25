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

	//*Construct = asigna valores iniciales a los atributos de la clase
	public function __construct($codigo, $destino, $cantMaxPasajeros, $colObjPasajeros, $objResponsableV)
	{
		$this->codigo = $codigo;
		$this->destino = $destino;
		$this->cantMaxPasajeros = $cantMaxPasajeros;
		$this->colObjPasajeros = $colObjPasajeros;
		$this->objResponsableV = $objResponsableV;
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

	//* devuelve una cadena de caracteres, con la representación en texto de la instancia.
	public function __toString()
	{
		return "Codigo del Viaje: " . $this->getCodigo() . "\n" .
			"Destino: " . $this->getDestino() . "\n" .
			"Cantidad Maxima de Pasajeros: " . $this->getCantMaxPasajeros() . "\n" .
			"\nResponsable del Viaje: " . $this->getObjResponsableV() . "\n" .
			"Pasajeros: \n" . $this->strColPasajero();
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
		echo "2. Modificar información del viaje/Pasajero/Responsable del Viaje.\n";
		echo "3. Cargar información del viaje.\n";
		echo "Seleccione una opción (0-3): ";
	}

	public function menuModificar()
	{
		echo "0. Para volver al menu.\n";
		echo "¿Qué dato desea cambiar? \n";
		echo "1. Viaje.\n";
		echo "2. Pasajero.\n";
		echo "3. Responsable del viaje.\n";
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

	public function menuModificarResponsable()
	{
		echo "------- Modificar Responsable del viaje -------\n";
		echo "0. Salir.\n";
		echo "1. Modificar numero de Empleado.\n";
		echo "2. Modificar numero de Licencia.\n";
		echo "3. Modificar nombre.\n";
		echo "4. Modificar apellido.\n";
		echo "Seleccione una opción (0-4): ";
	}

	public function menuModificarPasajero()
	{
		echo "------- Modificar Pasajero -------\n";
		echo "0. Salir.\n";
		echo "1. Modificar nombre.\n";
		echo "2. Modificar apellido.\n";
		echo "3. Modificar numero de Documento.\n";
		echo "4. Modificar numero de Telefono.\n";
		echo "Seleccione una opción (0-4): ";
	}

	public function cargarInfoViaje()
	{
		$colObjPasajero = $this->getColObjPasajeros();
		if ($this->getCantMaxPasajeros() > count($colObjPasajero)) {
			echo "\nNombre: ";
			$nombre = trim(fgets(STDIN));
			echo "\nApellido: ";
			$apellido = trim(fgets(STDIN));
			echo "\nNumero de Documento: ";
			$numDocumento = trim(fgets(STDIN));
			echo "\nNumero de Telefono: ";
			$numTelefono = trim(fgets(STDIN));
			if ($nombre != null && $apellido != null && $numDocumento != null && $numTelefono != null && !$this->verificarDni($numDocumento, $colObjPasajero)) {
				$objPasajero4 = new Pasajero($nombre, $apellido, $numDocumento, $numTelefono);
				array_push($colObjPasajero, $objPasajero4);
				$this->setColObjPasajeros($colObjPasajero);
				echo "------- Cargando Pasajero -------\n";
			} else {
				echo "\nNo se pudo agregar ya que algun dato fue nulo.\n";
			}
		} else {
			echo "\nSe alcanzo la capacidad maxima.\n\n";
		}
	}
}//!Cierre de clase
