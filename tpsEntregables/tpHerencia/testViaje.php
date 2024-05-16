<?php
include_once("Viaje.php");
include_once("Pasajero.php");
include_once("PasajeroVIP.php");
include_once("PasajerosEspeciales.php");
include_once("ResponsableV.php");

//*Creo instancias de clase Pasajero
$objPasajero1 = new Pasajero("Juan", 1, 001);
$objPasajero2 = new Pasajero("Maria", 2, 002);
$objPasajero3 = new Pasajero("Carlos", 3, 003);

$objPasajeroEsp = new PasajerosEspeciales("Pepe", 4, 004,true,true,true);
$objPasajeroEsp1 = new PasajerosEspeciales("Toto", 5, 005, false, true, true);

$objPasajeroVip = new PasajeroVip("Pedro",6,006,1,400);
$objPasajeroVip1 = new PasajeroVip("Wally", 7, 007, 2, 100);


$colObjPasajero = [$objPasajero1, $objPasajero2, $objPasajero3, $objPasajeroEsp,$objPasajeroEsp1,$objPasajeroVip,$objPasajeroVip1];

//*Creo instancia de clase ResponsableV
$objResponsableViaje = new ResponsableV(4321, 1234567, "Raul", "Chofer");

//*Creo instancia de clase Viaje
$objViaje = new Viaje(123, "Neuquen", 20, $colObjPasajero, $objResponsableViaje,100,null);
/**
 * 330+135+130+130+115 = 840
 */
$objViaje->sumaCostos();

//*Variable para la condicion
$repetir = false;
while ($repetir !== true) {
	$objViaje->menuGeneral();
	$opcion = trim(fgets(STDIN));
	switch ($opcion) {
		case 0:
			echo "------- Saliendo -------\n";
			$repetir = true;
			break;
		case 1: //*Ver información del viaje.
			echo "------- Mostrando información -------\n";
			echo $objViaje;
			break;
		case 2: //*Modificar información del viaje/.
			echo "------- Modificando información -------\n";
			do {
				$objViaje->menuModificar();
				$rta = trim(fgets(STDIN));
				switch ($rta) {
					case 0:
						break;
					case 1: //*1.Viaje
						do {
							$objViaje->menuModificarViaje();
							$rtaViaje = trim(fgets(STDIN));
							switch ($rtaViaje) {
								case 0:
									echo "Saliendo de la opcion modificar Viaje...\n";
									break;
								case 1:
									echo "Ingrese el nuevo codigo: ";
									$nuevoCodigo = trim(fgets(STDIN));
									if ($nuevoCodigo != null) {
										$objViaje->setCodigo($nuevoCodigo);
									} else {
										echo "\nNo puede estar vacio.\n\n";
									}
									break;
								case 2:
									echo "Ingrese el nuevo destino: ";
									$nuevoDestino = trim(fgets(STDIN));
									if ($nuevoDestino != null) {
										$objViaje->setDestino($nuevoDestino);
									} else {
										echo "\nNo puede estar vacio.\n\n";
									}
									break;
								case 3:
									echo "Ingrese la nueva cantidad de pasajeros: ";
									$nuevaCant = trim(fgets(STDIN));
									if ($nuevaCant > count($colObjPasajero) && $nuevaCant > 0 && $nuevaCant != null) {
										$objViaje->setCantMaxPasajeros($nuevaCant);
									} else {
										echo "La cantidad de pasajeros no puede ser inferior a 0 o menor que la cantidad de pasajeros ya cargados\n";
									}
									break;
								default:
									echo "\nOpción incorrecta. Por favor, seleccione una opción válida.\n\n";
									break;
							}
						} while ($rtaViaje != 0); //!Cierre dowhile
						break;
				}
			} while ($rta != 0);
			break;
		case 3: //*Compra de pasaje.
			$objViaje->ComprarPasaje($colObjPasajero);
			break;
		case 4:
			echo "------- Comprando Pasaje -------\n";
			
			break;
		default:
			echo "\nOpción incorrecta. Por favor, seleccione una opcion valida.\n\n";
			break;
	}
}//!Cierre de Script