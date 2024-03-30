<?php
include_once ("Persona.php");
include_once ("Disquera.php");
menu();

function menu()
{
	$horaDeApertura = ["hora" => 8, "minuto" => 30];
	$horaDeCierre = ["hora" => 14, "minuto" => 30];
	$objPersona = new Persona("Enzo", "Molina", 12345678, "DNI");
	$objDisquera = new Disquera($horaDeApertura, $horaDeCierre, false, "Av. Argentina 24", $objPersona);//* $objDisquera CONTIENE A $objPersona

	echo $objDisquera;

	if ($objDisquera->getEstado() === false) { //*Depende del dato booleano muestra una funcion o la otra
		do {
			$bandera = false;//*booleano para el do while

			echo "Que funcion va a probar: dentroHorarioAtencion(1), abrirDisquera(2)?\n";
			$rta = trim(fgets(STDIN));//*var para el switch
			if ($rta > 0 && $rta < 3) {
				echo "Ingrese la hora: \n";
				$hora = trim(fgets(STDIN));
				echo "Ingrese los minutos: \n";
				$minutos = trim(fgets(STDIN));

				if (($hora >= 0) && ($hora <= 23) && ($minutos >= 0) && ($minutos <= 59)) {
					$bandera = true;
					switch ($rta) {
						case 1:
							if ($objDisquera->dentroHorarioAtencion($hora, $minutos)) {
								echo "Esta dentro del horario\n";
							} else {
								echo "NO ESTA dentro del horario\n";
							}
							break;
						case 2:
							if ($objDisquera->abrirDisquera($hora, $minutos)) {
								echo "Se cambio el estado de la disquera a ABIERTO.\n";
								echo $objDisquera;
							} else {
								echo "NO se cambio el estado de la disquera por que no es un horario valido\n";
								echo $objDisquera;
							}
							break;
					}
				} else {
					echo "Ingreso la hora incorecta, solo formato 24hs \n";
				}
			}
		} while (!$bandera);//*Se repite hasta que entre al if que evalua si es formato 24hs ya que se le asigna true a la bandera
	} else {
		do {
			$bandera = false;//*booleano para el do while

			echo "Que funcion va a probar: dentroHorarioAtencion(1),cerrarDisquera(2)?\n";
			$rta = trim(fgets(STDIN));//*var para el switch
			if ($rta > 0 && $rta < 3) {
				echo "Ingrese la hora: \n";
				$hora = trim(fgets(STDIN));
				echo "Ingrese los minutos: \n";
				$minutos = trim(fgets(STDIN));

				if (($hora >= 0) && ($hora <= 23) && ($minutos >= 0) && ($minutos <= 59)) {
					$bandera = true;
					switch ($rta) {
						case 1:
							if ($objDisquera->dentroHorarioAtencion($hora, $minutos)) {
								echo "Esta dentro del horario\n";
							} else {
								echo "NO ESTA dentro del horario\n";
							}
							break;
						case 2:
							if (!$objDisquera->cerrarDisquera($hora, $minutos)) {
								echo "Se cambio el estado de la disquera a CERRADO.\n";
								echo $objDisquera;
							} else {
								echo "NO Se cambio el estado de la disquera.\n";
								echo $objDisquera;
							}
							break;
					}
				} else {
					echo "Ingreso la hora incorecta, solo formato 24hs \n";
				}
			}
		} while (!$bandera);//*Se repite hasta que entre al if que evalua si es formato 24hs ya que se le asigna true a la bandera
	}
}
