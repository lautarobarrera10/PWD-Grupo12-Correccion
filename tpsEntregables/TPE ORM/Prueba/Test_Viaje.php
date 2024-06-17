<?php
include_once 'Persona.php';
include_once 'Pasajero.php';
include_once 'ResponsableV.php';
include_once 'Empresa.php';
include_once 'Viaje.php';
include_once 'BaseDatos.php';

while (true) {
    echo "\nMenú:\n";
    echo "1. Cargar informacion del viaje\n";
    echo "2. Modificar informacion del viaje\n";
    echo "3. Ver datos del viaje\n";
    echo "4. Modificar Pasajero\n";
    echo "5. Agregar Pasajero\n";
    echo "6. Salir\n";
    $opcion = readline("Ingrese la opción deseada: ");

    switch ($opcion) {
        case '1':

            $nombreEmpresa = readline("Ingrese el nombre de la empresa: ");
            $direccionEmpresa = readline("Ingrese la dirección de la empresa: ");
            $empresa = new Empresa();
            $empresa->cargar(null, $nombreEmpresa, $direccionEmpresa);
            $empresa->insertar();


            //*parametros persona
            $nroDocResponsableV = readline("Ingrese el numero de documento empleado del responsable del nuevo viaje: ");
            $nombreResponsableV = readline("Ingrese el Nombre del responsable del nuevo viaje: ");
            $apellidoResponsableV  = readline("Ingrese el apellido del responsable del nuevo viaje: ");
            $telefonoResponsableV = readline("Ingrese el telefono del responsable del nuevo viaje: ");
            $numLicencia = readline("Ingrese el numero de licencia del responsable del nuevo viaje: ");

            //*Se crea obj de la clase ResponsableV
            $nuevoResponsable = new ResponsableV();
            $paramNuevoResponsable = [
                'nrodoc' => $nroDocResponsableV,
                'nombre' => $nombreResponsableV,
                'apellido' => $apellidoResponsableV,
                'telefono' => $telefonoResponsableV,
                'numeroEmpleado' => null,
                'numeroLicenciacle' => $numLicencia
            ];
            $nuevoResponsable->cargar($paramNuevoResponsable);
            $nuevoResponsable->insertar();

            $destino = readline("Ingrese el destino del nuevo viaje: ");
            $maxPasajeros = readline("Ingrese la cantidad maxima de pasajeros del nuevo viaje: ");
            $costoDelViaje = readline("Ingrese el costo del viaje: ");

            $pasajerosArray = [];
            $viaje = new Viaje();
            $viaje->cargar(null, $destino, $maxPasajeros, $empresa, $nuevoResponsable, $costoDelViaje);

            $viaje->insertar();
            break;
        case '2':
            while (true) {
                $viaje = new Viaje();
                echo "\nDesea modificar:\n";
                echo "1. Modificar destino del viaje\n";
                echo "2. Modificar maximo de pasajeros del viaje\n";
                echo "3. Modificar responsable del viaje\n";
                echo "4. Modificar costos del viaje\n";
                echo "5. Modificar Empresa\n";
                echo "6. Volver al menu principal\n";
                $opcion = readline("Ingrese la opción deseada: ");
                if ($opcion == 6) {
                    echo "Regresando al menú principal...\n";
                    break 2;
                }
                $idAModificar = readline("Ingrese el ID del viaje a modificar: ");
                if ($viaje->Buscar($idAModificar)) {
                    echo $viaje;
                    switch ($opcion) {
                        case '1':
                            echo "Este es el Destino actual del viaje: " . $viaje->getDestino() . "\n";
                            $viaje->setDestino(readline("Ingrese el destino del viaje: "));
                            $viaje->modificar();
                            break;
                        case '2':
                            echo "Esta es la cantidad maxima actual del viaje: " . $viaje->getMaxPasajeros() . "\n";
                            $viaje->setMaxPasajeros(readline("Ingrese la cantidad maxima de pasajeros del viaje: "));
                            $viaje->modificar();
                            break;
                        case '3':
                            echo "Qué información desea modificar del responsable del viaje?\n";
                            echo "1- El número de licencia\n";
                            echo "2- El nombre\n";
                            echo "3- El apellido\n";
                            echo "4- Todos los datos\n";
                            $opcion = trim(fgets(STDIN));
                            modificarResponsableViaje($viaje, $opcion);
                            break;
                        case '4':
                            echo "Este es el Costo actual del viaje: " . $viaje->getCosto() . "\n";
                            $viaje->setCosto(readline("Ingrese el nuevo costo del viaje: "));
                            $viaje->modificar();
                            break;
                        case '5':
                            echo "Qué información desea modificar de la empresa?\n";
                            echo "1- El nomnbre\n";
                            echo "2- La dirección\n";
                            echo "3- Todos los datos\n";
                            $eleccion = trim(fgets(STDIN));
                            modificarEmpresa($viaje, $eleccion);
                            break 2;
                        default:
                            echo "Opción inválida. Por favor, seleccione una opción válida.\n";
                            break;
                    }
                } else {
                    echo "El viaje no ha podido ser encontrado\n";
                }
            }
            break;
        case '3':
            echo "Ingrese el Id del viaje:\n";
            $id = trim(fgets(STDIN));
            $viaje = new Viaje();
            if ($viaje->Buscar($id)) {
                echo $viaje;
            } else {
                echo "No se encontró el viaje que se buscaba\n";
            }

            break;

        case '4':
            /* $viaje = new Viaje();
            echo "Ingrese el id del viaje\n";
            $id = trim(fgets(STDIN));*/
            echo "Ingrese el número de documento del pasajero al que desea cambiarle los datos:\n";
            $numDocPasajero = trim(fgets(STDIN));
            $pasajero = new Pasajero();
            $pasajero->Buscar($numDocPasajero);
            //$pasajeroIndice =  $viaje->existePasajero($numDocPasajero);
            // if ($pasajeroIndice != -1) {
            //$unPasajero = $pasajeros[$pasajeroIndice]; 
            echo "Qué dato quiere modificar?\n";
            echo "1- Nombre\n";
            echo "2- Apellido\n";
            echo "3- Número de teléfono\n";
            echo "4- Todos los datos \n";
            $eleccion = trim(fgets(STDIN));
            switch ($eleccion) {
                case 1:
                    echo "El nombre actual es: " . $pasajero->getNombre() . "\n";
                    echo "Se cambiará a: \n";
                    $nuevoNombre = trim(fgets(STDIN));
                    $pasajero->setNombre($nuevoNombre);
                    $pasajero->modificar();
                    echo "Se cambió correctamente a " . $pasajero->getNombre() . "\n";
                    break;
                case 2:
                    echo "El apellido actual es: " . $pasajero->getApellido() . "\n";
                    echo "Se cambiará a: \n";
                    $nuevoApellido = trim(fgets(STDIN));
                    $pasajero->setApellido($nuevoApellido);
                    $pasajero->modificar();
                    echo "Se cambió correctamente a " . $pasajero->getApellido() . "\n";
                    break;
                case 3:
                    echo "El teléfono actual es: " . $pasajero->getTelefono() . "\n";
                    echo "Se cambiará a: \n";
                    $nuevoTelefono = trim(fgets(STDIN));
                    $pasajero->setTelefono($nuevoTelefono);
                    $pasajero->modificar();
                    echo "Se cambió correctamente a " . $pasajero->getTelefono() . "\n";
                    break;
                case 4:
                    echo "El nombre actual es: " . $pasajero->getNombre() . "\n";
                    echo "Se cambiará a: \n";
                    $nuevoNombre = trim(fgets(STDIN));
                    $pasajero->setNombre($nuevoNombre);
                    $pasajero->modificar();
                    echo "Se cambió correctamente a " . $pasajero->getNombre() . "\n";

                    echo "El apellido actual es: " . $pasajero->getApellido() . "\n";
                    echo "Se cambiará a: \n";
                    $nuevoApellido = trim(fgets(STDIN));
                    $pasajero->setApellido($nuevoApellido);
                    $pasajero->modificar();
                    echo "Se cambió correctamente a " . $pasajero->getApellido() . "\n";

                    echo "El teléfono actual es: " . $pasajero->getTelefono() . "\n";
                    echo "Se cambiará a: \n";
                    $nuevoTelefono = trim(fgets(STDIN));
                    $pasajero->setTelefono($nuevoTelefono);
                    $pasajero->modificar();
                    echo "Se cambió correctamente a " . $pasajero->getTelefono() . "\n";
                    break;
                default:
                    echo "Opción incorrecta, por favor ingrese una opción válida\n";
                    break;
            }/*
            } else {
                echo "No se encontró ningún pasajero con ese número de documento. \n";
            }*/
            break;
        case '5':
            $viaje = new Viaje();
            echo "Ingrese el id del viaje\n";
            $id = trim(fgets(STDIN));
            if ($viaje->Buscar($id)) {
                echo $viaje;
                if (!$viaje->hayPasajesDisponibles()) {
                    echo "No hay pasajes disponibles\n";
                } else {
                    while (true) {
                        $nombre = readline("Nombre del pasajero: ");
                        $apellido = readline("Apellido del pasajero: ");
                        $documento = readline("Número de documento del pasajero: ");
                        $telefono = readline("Teléfono del pasajero: ");
                        $asiento = readline("Número de asiento: ");
                        $ticket = readline("Ingrese el número de ticket: ");

                        $arrayParam = [
                            'nrodoc' => $documento,
                            'apellido' => $apellido,
                            'nombre' => $nombre,
                            'telefono' => $telefono,
                            'idPasajero' => null,
                            'numAsiento' => $asiento,
                            'numTicket' => $ticket,
                            'objViaje' => $viaje
                        ];
                        /*  $this->setNumAsiento($param['numAsiento']);
                        $this->setNumTicket($param['numTicket']);
                        $this->setObjViaje($param['objViaje']); */
                        $pasajero = new Pasajero();
                        $pasajero->cargar($arrayParam);
                        if ($pasajero->insertar()) {
                            echo "El pasajero fue ingresado con éxito\n";
                        }
                        if ($viaje->venderPasaje($pasajero)) {
                            echo "El pasajero se ha agregado a la colección\n";
                        } else {
                            echo "El pasajero no ha podido ser agregado a la colección\n";
                        }
                    }
                }
            }
            break;
        case '6':
            echo "Saliendo del programa...\n";
            exit;
        default:
            echo "Opción inválida. Por favor, seleccione una opción válida.\n";
            break;
    }
}




/*function modificarResponsableViaje($viaje, $opcion)
{
    switch ($opcion) {
        case 1:
            echo $viaje->getObjResponsable()->getNumEmpleado() . "es el número de empleado \n";
            echo "Se cambiará a: \n";
            $nuevoNumEmpleado = trim(fgets(STDIN));
            $viaje->getObjResponsable()->setNumEmpleado($nuevoNumEmpleado);
            $viaje->getObjResponsable()->modificar();
            $viaje->modificar();
            echo "Se cambió correctamente a " . $viaje->responsable->getNumEmpleado() . "\n";
            break;
        case 2:
            echo $viaje->getObjResponsable()->getNumLicencia() . "es el número de empleado \n";
            echo "Se cambiará a: \n";
            $nuevoNumLicencia = trim(fgets(STDIN));
            $viaje->getObjResponsable()->setNumLicencia($nuevoNumLicencia);
            $viaje->getObjResponsable()->modificar();
            $viaje->modificar();
            echo "Se cambió correctamente a " . $viaje->responsable->getNumLicencia() . "\n";
            break;
        case 3:
            echo $viaje->getObjResponsable()->getNombre() . "es el número de empleado \n";
            echo "Se cambiará a: \n";
            $nuevoNombre = trim(fgets(STDIN));
            $viaje->getObjResponsable()->setNombre($nuevoNombre);
            $viaje->getObjResponsable()->modificar();
            $viaje->modificar();
            echo "Se cambió correctamente a " . $viaje->getObjResponsable()->getNombre() . "\n";
            break;
        case 4:
            echo $viaje->getObjResponsable()->getApellido() . "es el número de empleado \n";
            echo "Se cambiará a: \n";
            $nuevoApellido = trim(fgets(STDIN));
            $viaje->getObjResponsable()->setNumLicencia($nuevoApellido);
            $viaje->getObjResponsable()->modificar();
            $viaje->modificar();
            echo "Se cambió correctamente a " . $viaje->getObjResponsable()->getApellido() . "\n";
            break;
        case 5:
            echo $viaje->getObjResponsable()->getNumEmpleado() . "es el número de empleado \n";
            echo "Se cambiará a: \n";
            $nuevoNumEmpleado = trim(fgets(STDIN));
            $viaje->getObjResponsable()->setNumEmpleado($nuevoNumEmpleado);
            echo "Se cambió correctamente a " . $viaje->responsable->getNumEmpleado() . "\n";

            echo $viaje->getObjResponsable()->getNumLicencia() . "es el número de empleado \n";
            echo "Se cambiará a: \n";
            $nuevoNumLicencia = trim(fgets(STDIN));
            $viaje->getObjResponsable()->setNumLicencia($nuevoNumLicencia);
            echo "Se cambió correctamente a " . $viaje->responsable->getNumLicencia() . "\n";

            echo $viaje->getObjResponsable()->getNombre() . "es el número de empleado \n";
            echo "Se cambiará a: \n";
            $nuevoNombre = trim(fgets(STDIN));
            $viaje->getObjResponsable()->setNombre($nuevoNombre);
            echo "Se cambió correctamente a " . $viaje->getObjResponsable()->getNombre() . "\n";

            echo $viaje->getObjResponsable()->getApellido() . "es el número de empleado \n";
            echo "Se cambiará a: \n";
            $nuevoApellido = trim(fgets(STDIN));
            $viaje->getObjResponsable()->setNumLicencia($nuevoApellido);
            echo "Se cambió correctamente a " . $viaje->getObjResponsable()->getApellido() . "\n";
            $viaje->getObjResponsable()->modificar();
            $viaje->modificar();
            break;
        default:
            echo "Opción incorrecta, por favor ingrese una opción válida\n";
            break;
    }
}*/
function modificarResponsableViaje($viaje, $opcion)
{
    $responsable = new ResponsableV;
    $responsable->Buscar($viaje->getObjResponsable());
    /* echo $responsable; */
    /* echo $viaje; */
    switch ($opcion) {
        case 1:
            echo "El número de licencia es: {$responsable->getNumeroLicencia()} \n";
            echo "Se cambiará a: \n";
            $nuevoNumLicencia = trim(fgets(STDIN));
            $responsable->setNumeroLicencia($nuevoNumLicencia);
            $responsable->modificar();
            echo "Se cambió correctamente a " . $responsable->getNumeroLicencia() . "\n";
            break;
        case 2:
            echo "El nombre del empleado: {$responsable->getNombre()} \n";
            echo "Se cambiará a: \n";
            $nuevoNombre = trim(fgets(STDIN));
            $responsable->setNombre($nuevoNombre);
            $responsable->modificar();
            echo "Se cambió correctamente a " . $responsable->getNombre() . "\n";
            break;
        case 3:
            echo "El apellido del empleado: {$responsable->getApellido()} \n";
            echo "Se cambiará a: \n";
            $nuevoApellido = trim(fgets(STDIN));
            $responsable->setApellido($nuevoApellido);
            $responsable->modificar();
            echo "Se cambió correctamente a " . $responsable->getApellido() . "\n";
            break;
        case 4:
            echo $responsable->getNumeroLicencia() . "es el número de licencia \n";
            echo "Se cambiará a: \n";
            $nuevoNumLicencia = trim(fgets(STDIN));
            $responsable->setNumeroLicencia($nuevoNumLicencia);
            $responsable->modificar();
            echo "Se cambió correctamente a " . $responsable->getNumeroLicencia() . "\n";

            echo  $responsable->getNombre() . "es el nombre \n";
            echo "Se cambiará a: \n";
            $nuevoNombre = trim(fgets(STDIN));
            $responsable->setNombre($nuevoNombre);
            echo "Se cambió correctamente a " .  $responsable->getNombre() . "\n";

            echo $responsable->getApellido() . "es el apellido \n";
            echo "Se cambiará a: \n";
            $nuevoApellido = trim(fgets(STDIN));
            $responsable->setNumLicencia($nuevoApellido);
            echo "Se cambió correctamente a " .  $responsable->getApellido() . "\n";
            $responsable->modificar();
            $viaje->modificar();
            break;
        default:
            echo "Opción incorrecta, por favor ingrese una opción válida\n";
            break;
    }
}
function modificarEmpresa($viaje, $eleccion)
{
    $empresa = new Empresa();
    $empresa->Buscar($viaje->getObjEmpresa());
    switch ($eleccion) {
        case 1:
            echo "El nombre actual de la empresa es " . $empresa->getNombre() . "\n";
            echo "Se cambiará a :\n";
            $nuevoNombre = trim(fgets(STDIN));
            $empresa->setNombre($nuevoNombre);
            $empresa->modificar();
            echo "El nombre de la empresa se cambió correctamente\n";
            break;
        case 2:
            echo "La dirección actual de la empresa es " . $empresa->getDireccion() . "\n";
            echo "Se cambiará a :\n";
            $nuevaDir = trim(fgets(STDIN));
            $empresa->setDireccion($nuevaDir);
            $empresa->modificar();
            echo "La dirección de la empresa se cambió correctamente\n";
            break;
        case 3:
            echo "El nombre actual de la empresa es " . $empresa->getNombre() . "\n";
            echo "Se cambiará a :\n";
            $nuevoNombre = trim(fgets(STDIN));
            $empresa->setNombre($nuevoNombre);
            $empresa->modificar();
            echo "El nombre de la empresa se cambió correctamente\n";

            echo "La dirección actual de la empresa es " . $empresa->getDireccion() . "\n";
            echo "Se cambiará a :\n";
            $nuevaDir = trim(fgets(STDIN));
            $empresa->setDireccion($nuevaDir);
            $empresa->modificar();
            echo "La dirección de la empresa se cambió correctamente\n";
            break;
    }
}
