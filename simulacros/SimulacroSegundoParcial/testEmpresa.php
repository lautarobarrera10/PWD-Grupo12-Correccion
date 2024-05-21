<?php
include_once("Cliente.php");
include_once("Moto.php");
include_once("MotoNacional.php");
include_once("MotoImportada.php");
include_once("Venta.php");
include_once("Empresa.php");

//*1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2
$objCliente1 = new Cliente("Pepe", "Pepon", false, "dni", 1234);
$objCliente2 = new Cliente("Mar", "Marina", false, "dni", 5678);

//*2. Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación, descripción, porcentaje incremento anual, activo.
$objMoto1 = new MotoNacional(11, 2230000, 2022, "Benelli Imperiale 400", 85, true, true);
$objMoto1->setDescuento(10);

$objMoto2 = new MotoNacional(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true, true);
$objMoto2->setDescuento(10);

$objMoto3 = new MotoNacional(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false, true);
$objMoto4 = new MotoImporatada(14, 12499900, 2020, "Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 100, true, false, "Francia", 6244400);

//*3. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes = [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
$objEmpresa = new Empresa("Alta Gama", "Av Argenetina 123", [$objCliente1, $objCliente2], [$objMoto1, $objMoto2, $objMoto3, $objMoto4], []);

//*4. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
$registrarVenta = $objEmpresa->registrarVenta([11, 12, 13,14], $objCliente2);
echo $registrarVenta; //*Res= 501.870.430.0

//*5. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.
$registrarVenta2 = $objEmpresa->registrarVenta([13, 14], $objCliente2);
echo "\n". $registrarVenta2; //*Res= 501.870.430.0

//*6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
$registrarVenta3 = $objEmpresa->registrarVenta([14,2], $objCliente2);
echo "\n" . $registrarVenta3; //*Res= 501.870.430.0

//*7. Invocar al método informarVentasImportadas(). Visualizar el resultado obtenido.
$arrayVentasImportadas = $objEmpresa->informarVentasImportadas();
print_r($arrayVentasImportadas);

//*8. Invocar al método informarVentasImportadas(). Visualizar el resultado obtenido.
$objEmpresa->informarSumaVentasNacionales();


//*Realizar un echo de la variable Empresa creada en 2
echo $objEmpresa;
