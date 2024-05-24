<?php

class Torneo
{
	private $colPartidos = [];
	private $importe;

	public function __construct($colPartidos, $importe)
	{
		$this->colPartidos = $colPartidos;
		$this->importe = $importe;
	}

	public function getColPartidos()
	{
		return $this->colPartidos;
	}

	public function setColPartidos($colPartidos)
	{
		$this->colPartidos = $colPartidos;
	}

	public function getImporte()
	{
		return $this->importe;
	}

	public function setImporte($importe)
	{
		$this->importe = $importe;
	}

	private function colAString($col)
	{
		$str = "";
		foreach ($col as $value) {
			$str .= $value . "\n";
		}
		return $str;
	}

	public function __toString()
	{
		return "Coleccion de Partidos: " . $this->colAString($this->getColPartidos()) . "\n" .
			"Importe: " . $this->getImporte() . "\n";
	}


	/**
	 * Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) en la clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y si se trata de un partido de futbol o basquetbol . El método debe crear y retornar la instancia de la clase Partido que corresponda y almacenarla en la colección de partidos del Torneo. Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de jugadores, caso contrario no podrá ser registrado ese partido en el torneo
	 *
	 */
	public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido)
	{
		$colPartidos = $this->getColPartidos();
		$colPartidoFutbol = [];
		$colPartidoBasquet = [];
		$objPartidoFutbol = null; 
		$objPartidoBasquet = null;
		//*Futbol
		foreach ($this->getColPartidos() as $partido) {
			if ($partido instanceof PartidoFutbol) {
				array_push($colPartidoFutbol, $partido);
			}
		}

		$idPartiFutbol = count($colPartidoFutbol) + 1;
		if ($OBJEquipo1->getObjCategoria()->getidcategoria() == $OBJEquipo2->getObjCategoria()->getidcategoria() && $tipoPartido	== "Futbol") {
			if ($OBJEquipo1->getCantJugadores() == $OBJEquipo2->getCantJugadores()) {
				$objPartidoFutbol = new PartidoFutbol($idPartiFutbol, $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0);
				array_push($colPartidos, $objPartidoFutbol);
				$this->setColPartidos($colPartidos);
			}
		}

		//*Basquet
		foreach ($this->getColPartidos() as $partido) {
			if ($partido instanceof PartidoBasquet) {
				array_push($colPartidoBasquet, $partido);
			}
		}
		$idPartiBasquet = count($colPartidoBasquet) + 1;
		if ($OBJEquipo1->getObjCategoria()->getidcategoria() == $OBJEquipo2->getObjCategoria()->getidcategoria() && $tipoPartido	== "basquetbol") {
			if ($OBJEquipo1->getCantJugadores() == $OBJEquipo2->getCantJugadores()) {
				$objPartidoBasquet = new PartidoBasquet($idPartiBasquet, $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0, 0);
				array_push($colPartidos, $objPartidoBasquet);
				$this->setColPartidos($colPartidos);
			}
		}
		if ($tipoPartido == "Futbol") {
			$objPartido = $objPartidoFutbol;
		} elseif ($tipoPartido == "basquetbol") {
			$objPartido = $objPartidoBasquet;
		} {
		}
		return $objPartido;
	}

	/**
	 * recibe por parámetro si se trata de un partido de fútbol o de básquetbol y en base al parámetro busca entre esos partidos los equipos ganadores ( equipo con mayor cantidad de goles). El método retorna una colección con los objetos de los equipos encontrados.
	 *
	 */
	public function darGanadores($deporte)
	{
		$colObjEquipos = [];
		foreach ($this->getColPartidos() as  $partido) {
			if ($deporte == "Futbol") {
				array_push($colObjEquipos, $partido->darEquipoGanador());
			} elseif ($deporte == "basquetbol") {
				array_push($colObjEquipos, $partido->darEquipoGanador());
			}
		}
		return $colObjEquipos;
	}

	/**
	 * retornar un arreglo asociativo donde una de sus claves es ‘equipoGanador’ y contiene la referencia al equipo ganador; y la otra clave es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configurado para el torneo.
	 *
	 */
	public function calcularPremioPartido($OBJPartido)
	{
		$premioPartido = $OBJPartido->getCoefBase() * $this->getImporte();
		$colTeamWin = ["equipoGanador" => $OBJPartido->darEquipoGanador(), "premioPartido" => $premioPartido];
		return $colTeamWin;
	}
}//!Cierre de clase
