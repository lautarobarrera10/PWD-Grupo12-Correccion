<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("PartidoFutbol.php");
include_once("PartidoBasquet.php");

$catMayores = new Categoria(1, 'Mayores');
$catJuveniles = new Categoria(2, 'juveniles');
$catMenores = new Categoria(1, 'Menores');

$objE1 = new Equipo("Equipo Uno", "Cap.Uno", 1, $catMayores);
$objE2 = new Equipo("Equipo Dos", "Cap.Dos", 2, $catMayores);

$objE3 = new Equipo("Equipo Tres", "Cap.Tres", 3, $catJuveniles);
$objE4 = new Equipo("Equipo Cuatro", "Cap.Cuatro", 4, $catJuveniles);

$objE5 = new Equipo("Equipo Cinco", "Cap.Cinco", 5, $catMayores);
$objE6 = new Equipo("Equipo Seis", "Cap.Seis", 6, $catMayores);

$objE7 = new Equipo("Equipo Siete", "Cap.Siete", 7, $catJuveniles);
$objE8 = new Equipo("Equipo Ocho", "Cap.Ocho", 8, $catJuveniles);

$objE9 = new Equipo("Equipo Nueve", "Cap.Nueve", 9, $catMenores);
$objE10 = new Equipo("Equipo Diez", "Cap.Diez", 9, $catMenores);

$objE11 = new Equipo("Equipo Once", "Cap.Once", 11, $catMayores);
$objE12 = new Equipo("Equipo Doce", "Cap.Doce", 11, $catMayores);

//*2 - a
$objPartidoBasquet1 = new PartidoBasquet(11, "2024 - 05 - 05", $objE7, 80, $objE8, 120, 7);
$objPartidoBasquet2 = new PartidoBasquet(12, "2024 - 05 - 06", $objE9, 81, $objE10, 110, 8);
$objPartidoBasquet3 = new PartidoBasquet(13, "2024 - 05 - 07", $objE11, 115, $objE12, 85, 9);

//*2 - b
$objPartidoFutbol1 = new PartidoFutbol(14, "2024 - 05 - 07", $objE1, 3, $objE2, 2);
$objPartidoFutbol2 = new PartidoFutbol(15, "2024 - 05 - 08", $objE3, 0, $objE4, 1);
$objPartidoFutbol3 = new PartidoFutbol(16, "2024 - 05 - 09", $objE5, 2, $objE6, 3);

//*1
$objTorneo = new Torneo([$objPartidoBasquet1, $objPartidoBasquet2, $objPartidoBasquet3, $objPartidoFutbol1, $objPartidoFutbol2, $objPartidoFutbol3], 100000);

//*3 - a
$partido1 = $objTorneo->ingresarPartido($objE5, $objE11, "2024-05-23", "Futbol"); //null
/* print_r($partido1); */

//*3 - b
$partido2 = $objTorneo->ingresarPartido($objE11, $objE11, "2024-05-23", "basquetbol");
/* print_r($partido2); */

//*3 - c
$partido3 = $objTorneo->ingresarPartido($objE9, $objE10, "2024-05-25", "basquetbol");
/* print_r($partido3); */

//*3 - d
$ganadorBasquetbolUno = $objTorneo->darGanadores("basquet"); 
foreach ($ganadorBasquetbolUno as  $value) {
	if (!is_array($value)) {
		echo $value . "\n";
	}
}

$ganadorBasquetbolDos = $objTorneo->darGanadores("basquetbol");
foreach ($ganadorBasquetbolDos as  $value) {
	if (!is_array($value)) {
		echo $value . "\n";
	}
}

//*3 - e
$objTorneo->darGanadores("futbol");

$ganadorFutUno = $objTorneo->darGanadores("Futbol");
foreach ($ganadorFutUno as  $value) {
	if (!is_array($value)) {
		echo $value . "\n";
	}
}

//"basquet y futbol no me devuelven nada porque estan escritos de otra forma, por eso tambien lo hice de la forma que si funciona

//*3 - f : no me dieron los resultado


//*4
echo $objTorneo;