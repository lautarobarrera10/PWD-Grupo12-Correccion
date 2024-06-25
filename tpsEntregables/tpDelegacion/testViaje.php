<?php
include_once("Viaje.php");
include_once("Pasajero.php");
include_once("ResponsableV.php");

//*Creo instancias de clase Pasajero
$objPasajero1 = new Pasajero("Juan", "Perez", 12345678, 9876543210);
$objPasajero2 = new Pasajero("Maria", "Rodriguez", 87654321, 1234567890);
$objPasajero3 = new Pasajero("Carlos", "Gomez", 23456789, 5551234567);
$colObjPasajero = [$objPasajero1, $objPasajero2, $objPasajero3];

//*Creo instancia de clase ResponsableV
$objResponsableViaje = new ResponsableV(4321, 1234567, "Raul", "Chofer");

//*Creo instancia de clase Viaje
$objViaje = new Viaje(123, "Neuquen", 20, $colObjPasajero, $objResponsableViaje);

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
									if ($nuevaCant > count($objViaje->getCantMaxPasajeros()) && $nuevaCant > 0 && $nuevaCant != null) {
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
					case 2: //*2.Pasajero
						echo "Ingrese el numero de documento del pasajero a modificar: ";
						$numDoc = trim(fgets(STDIN));
						$seEncontro = false;
						$i = 0;
						print_r($objViaje->getColObjPasajeros());
						while ($i < count($objViaje->getColObjPasajeros())) {
							if ($objViaje->getColObjPasajeros()[$i]->getNumDocumento() == $numDoc) {
								$seEncontro = true;
								do {
									$objViaje->menuModificarPasajero();
									$rtaPasajero = trim(fgets(STDIN));
									switch ($rtaPasajero) {
										case 0:
											echo "Saliendo de la opcion modificar Pasajero...\n";
											break;
										case 1:
											echo "Ingrese el nuevo nombre: ";
											$nuevoNombre = trim(fgets(STDIN));
											if ($nuevoNombre != null) {
												$objViaje->getColObjPasajeros()[$i]->setNombre($nuevoNombre);
											} else {
												echo "\nNo puede estar vacio.\n\n";
											}
											break;
										case 2:
											echo "Ingrese el nuevo apellido: ";
											$nuevoApellido = trim(fgets(STDIN));
											if ($nuevoApellido != null) {
												$objViaje->getColObjPasajeros()[$i]->setApellido($nuevoApellido);
											} else {
												echo "\nNo puede estar vacio.\n\n";
											}
											break;
										case 3:
											echo "Ingrese el nuevo numero de Documento: ";
											$nuevoNumDocumento = trim(fgets(STDIN));
											if ($nuevoNumDocumento != null) {
												$objViaje->getColObjPasajeros()[$i]->setNumDocumento($nuevoNumDocumento);
											} else {
												echo "\nNo puede estar vacio.\n\n";
											}
											break;
										case 4:
											echo "Ingrese el nuevo numero de Telefono: ";
											$nuevonumTelefono = trim(fgets(STDIN));
											if ($nuevonumTelefono != null) {
												$objViaje->getColObjPasajeros()[$i]->setNumTelefono($nuevonumTelefono);
											} else {
												echo "\nNo puede estar vacio.\n\n";
											}
											break;
										default:
											echo "\nOpción incorrecta. Por favor, seleccione una opcion valida.\n\n";
											break;
									}
								} while ($rtaPasajero != 0); //!Cierre dowhile
							}
							$i++;
						} //*while
						if ($seEncontro == false) {
							echo "\nNo existe Pasajero con ese dni.\n\n";
						}
						break;
					case 3: //*3.Responsable del viaje
						do {
							$objViaje->menuModificarResponsable();
							$rtaResponsable = trim(fgets(STDIN));
							switch ($rtaResponsable) {
								case 0:
									echo "Saliendo de la opcion modificar Responsable del viaje...\n";
									break;
								case 1:
									echo "Ingrese el nuevo numero de Empleado: ";
									$nuevoNumEmpleado = trim(fgets(STDIN));
									if ($nuevoNumEmpleado != null) {
										$objResponsableViaje->setNumEmpleado($nuevoNumEmpleado);
									}
									break;
								case 2:
									echo "Ingrese el nuevo numero de Licencia: ";
									$nuevoNumLicencia = trim(fgets(STDIN));
									if ($nuevoNumLicencia != null) {
										$objResponsableViaje->setNumLicencia($nuevoNumLicencia);
									}
									break;
								case 3:
									echo "Ingrese el nuevo nombre: ";
									$nuevoNombre = trim(fgets(STDIN));
									if ($nuevoNombre != null) {
										$objResponsableViaje->setNombre($nuevoNombre);
									}
									break;
								case 4:
									echo "Ingrese el nuevo apellido: ";
									$nuevoApellido = trim(fgets(STDIN));
									if ($nuevoApellido != null) {
										$objResponsableViaje->setApellido($nuevoApellido);
									}
									break;
								default:
									echo "\nOpción incorrecta. Por favor, seleccione una opcion valida.\n\n";
									break;
							}
						} while ($rtaResponsable != 0); //!Cierre dowhile
						break;
					default:
						echo "\nOpción incorrecta. Por favor, seleccione una opcion valida.\n\n";
						break;
				}
			} while ($rta != 0);
			break;
		case 3: //*Cargar información del viaje.
			$objViaje->cargarInfoViaje();
			break;
		default:
			echo "\nOpción incorrecta. Por favor, seleccione una opcion valida.\n\n";
			break;
	}
}
