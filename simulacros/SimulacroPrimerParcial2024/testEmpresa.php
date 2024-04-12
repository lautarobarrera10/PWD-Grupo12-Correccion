<?php
include_once ("Cliente.php");
include_once ("Moto.php");
include_once ("Venta.php");
include_once ("Empresa.php");

//*1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2
$objCliente1 = new Cliente("Pepe", "Pepon", false, "dni", 1234);
$objCliente2 = new Cliente("Mar", "Marina", false, "dni", 5678);

//*2. Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación, descripción, porcentaje incremento anual, activo.
$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);

//*4. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes = [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
$objEmpresa = new Empresa("Alta Gama", "Av
Argenetina 123", [$objCliente1, $objCliente2], [$objMoto1, $objMoto2, $objMoto3], []);

//*5. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
$registrarVenta = $objEmpresa->registrarVenta([11, 12, 13], $objCliente2);
/* echo $registrarVenta; */ //*Res= 381.330.000

//*6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.
$registrarVenta2 = $objEmpresa->registrarVenta([0], $objCliente2);
/* echo $registrarVenta2; */ //*No encontro el codigo

//*7. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
$registrarVenta3 = $objEmpresa->registrarVenta([2], $objCliente2);
/* echo $registrarVenta3; */ //*No encontro el codigo

//*Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se corresponden con el tipo y número de documento del $objCliente1.
$ventasXCliente = $objEmpresa->retornarVentasXCliente("dni", 1234);
print_r($ventasXCliente);


//*9. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se corresponden con el tipo y número de documento del $objCliente2
$ventasXCliente2 = $objEmpresa->retornarVentasXCliente("dni", 1234);
print_r($ventasXCliente2);

//*Realizar un echo de la variable Empresa creada en 2
/* echo $objEmpresa; */