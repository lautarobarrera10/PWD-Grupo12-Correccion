<?php
include_once 'Persona.php';
include_once 'Pasajero.php';
include_once 'ResponsableV.php';
include_once 'Empresa.php';
include_once 'Viaje.php';
include_once 'BaseDatos.php';

$bandera = false;
while (!$bandera) {
    echo "\nMenu:\n";
    echo "0. Salir\n";
    echo "1. Cargar informacion del viaje\n";
    echo "2. Modificar informacion del viaje\n";
    echo "3. Eliminar informacion del viaje\n";
    echo "4. Ver datos del viaje\n";
    echo "5. Cargar informacion de la empresa\n";
    echo "6. Modificar informacion de la empresa\n";
    echo "7. Eliminar informacion de la empresa\n";
    echo "8. Agregar Pasajero\n";
    echo "9. Modificar Pasajero\n";

    $opcion = readline("Ingrese la opcion deseada: ");
    if ($opcion >= 0 && $opcion <= 9) {
        switch ($opcion) {
            case '0':
                echo "Saliendo del programa...\n";
                $bandera = true;
                break;
            case '1':
                cargarViaje();
                break;
            case '2':
                modificarViaje();
                break;
            case '3':
                eliminarViaje();
                break;
            case '4':
                verDatosViaje();
                break;
            case '5':
                cargarEmpresa();
                break;
            case '6':
                $empresa = new Empresa();
                $empresas = $empresa->listar();
                $empresaAModificar = $empresas[0];
                echo $empresaAModificar;
                menuModificarEmpresa($empresaAModificar);
                break;
            case '7':
                eliminarEmpresa();
                break;
            case '8':
                agregarPasajero();
                break;
            case '9':
                modificarPasajero();
                break;
            default:
                echo "Opcion invalida. Por favor, seleccione una opcion valida.\n";
                break;
        }
    } else {
        echo "Ingrese un numero del 0 al 9";
    }
}

function cargarViaje()
{
    /* $nombreEmpresa = readline("Ingrese el nombre de la empresa: ");
    $direccionEmpresa = readline("Ingrese la direccion de la empresa: ");
    $empresa = new Empresa();
    $empresa->cargar(null, $nombreEmpresa, $direccionEmpresa);
    $empresa->insertar();

    $nroDocResponsableV = readline("Ingrese el numero de documento del responsable del nuevo viaje: ");
    $nombreResponsableV = readline("Ingrese el nombre del responsable del nuevo viaje: ");
    $apellidoResponsableV = readline("Ingrese el apellido del responsable del nuevo viaje: ");
    $telefonoResponsableV = readline("Ingrese el telefono del responsable del nuevo viaje: ");
    $numLicencia = readline("Ingrese el numero de licencia del responsable del nuevo viaje: ");

    $nuevoResponsable = new ResponsableV();
    $paramNuevoResponsable = [
        'nrodoc' => $nroDocResponsableV,
        'nombre' => $nombreResponsableV,
        'apellido' => $apellidoResponsableV,
        'telefono' => $telefonoResponsableV,
        'numeroEmpleado' => null,
        'rnumerolicencia' => $numLicencia
    ];
    $nuevoResponsable->cargar($paramNuevoResponsable);
    $nuevoResponsable->insertar();

    $destino = readline("Ingrese el destino del nuevo viaje: ");
    $maxPasajeros = readline("Ingrese la cantidad maxima de pasajeros del nuevo viaje: ");
    $costoDelViaje = readline("Ingrese el costo del viaje: ");

    $viaje = new Viaje();
    $viaje->cargar(null, $destino, $maxPasajeros, $empresa, $nuevoResponsable, $costoDelViaje);
    $viaje->insertar(); */


    $idEmpresa = readline("Ingrese el id de la empresa: ");
    $empresa = new Empresa;
    $empresa->Buscar($idEmpresa);



    //*parametros persona
    //*Se crea obj de la clase ResponsableV
    $nuevoResponsable = new ResponsableV();
    $persona = new Persona();
    $nroDocResponsableV = readline("Ingrese el numero de documento empleado del responsable del nuevo viaje: ");
    $encontrado = $persona->Buscar($nroDocResponsableV);
    while ($encontrado == true) {
        $nroDocResponsableV = readline("Esta persona ya ha sido cargada, por favor ingrese otro dni\n");
        $encontrado = $persona->Buscar($nroDocResponsableV);
    }
    $nombreResponsableV = readline("Ingrese el Nombre del responsable del nuevo viaje: ");
    $apellidoResponsableV  = readline("Ingrese el apellido del responsable del nuevo viaje: ");
    $telefonoResponsableV = readline("Ingrese el telefono del responsable del nuevo viaje: ");
    $numLicencia = readline("Ingrese el numero de licencia del responsable del nuevo viaje: ");
    $paramNuevoResponsable = [
        'nrodoc' => $nroDocResponsableV,
        'nombre' => $nombreResponsableV,
        'apellido' => $apellidoResponsableV,
        'telefono' => $telefonoResponsableV,
        'numeroEmpleado' => null,
        'rnumerolicencia' => $numLicencia

    ];

    $nuevoResponsable->cargar($paramNuevoResponsable);
    $nuevoResponsable->insertar();

    $destino = readline("Ingrese el destino del nuevo viaje: ");
    $maxPasajeros = readline("Ingrese la cantidad maxima de pasajeros del nuevo viaje: ");
    $costoDelViaje = readline("Ingrese el costo del viaje: ");

    $viaje = new Viaje();
    $viaje->cargar(null, $destino, $maxPasajeros, $empresa, $nuevoResponsable, $costoDelViaje);
    $viaje->insertar();
}

function modificarViaje()
{
    $bandera = false;
    $viaje = new Viaje();
    $infoViaje = $viaje->listar();
    foreach ($infoViaje as $viaje) {
        echo "\n{$viaje}\n";
        echo "-------\n";
    }
    while (!$bandera) {
        echo "\nDesea modificar:\n";
        echo "1. Modificar destino del viaje\n";
        echo "2. Modificar maximo de pasajeros del viaje\n";
        echo "3. Modificar responsable del viaje\n";
        echo "4. Modificar costos del viaje\n";
        echo "5. Volver al menu principal\n";
        $opcion = readline("Ingrese la opcion deseada: ");
        if ($opcion == 5) {
            echo "Regresando al menu principal...\n";
            $bandera = true;
        } elseif ($opcion <= 4 && $opcion >= 1) {
            $idAModificar = readline("Ingrese el ID del viaje a modificar: ");
            if ($idAModificar <= 4 && $idAModificar >= 1 && $viaje->Buscar($idAModificar)) {
                /* echo $viaje; */
                switch ($opcion) {
                    case '1':
                        modificarDestino($viaje);
                        break;
                    case '2':
                        modificarMaxPasajeros($viaje);
                        break;
                    case '3':
                        modificarResponsable($viaje);
                        break;
                    case '4':
                        modificarCosto($viaje);
                        break;
                    default:
                        break;
                }
            } else {
                echo "El viaje no ha podido ser encontrado o no se ingreso un numero.\n";
            }
        } else {
            echo "Opcion invalida. Por favor, seleccione una opcion del 1 al 6.\n";
        }
    }
}

function eliminarViaje()
{
    $viaje = new Viaje();
    $infoViaje = $viaje->listar();
    foreach ($infoViaje as $viaje) {
        echo "\n{$viaje}\n";
        echo "-------\n";
    }
    echo "\nIngrese el codigo del viaje a eliminar? ";
    $rta = trim(fgets(STDIN));
    if ($viaje->Buscar($rta)) {
        $viaje->Eliminar();
    } else {
        echo "\nEl viaje que quiere eliminar no existe.\n";
    }
}

function modificarDestino($viaje)
{
    echo "Este es el Destino actual del viaje: " . $viaje->getDestino() . "\n";
    $viaje->setDestino(readline("Ingrese el destino del viaje: "));
    $viaje->modificar();
}

function modificarMaxPasajeros($viaje)
{
    echo "Esta es la cantidad maxima actual del viaje: " . $viaje->getMaxPasajeros() . "\n";
    $viaje->setMaxPasajeros(readline("Ingrese la cantidad maxima de pasajeros del viaje: "));
    $viaje->modificar();
}

function modificarResponsable($viaje)
{
    echo "Que informacion desea modificar del responsable del viaje?\n";
    echo "1- El numero de licencia\n";
    echo "2- El nombre\n";
    echo "3- El apellido\n";
    echo "4- Todos los datos\n";
    echo "5- Volver\n";
    $opcion = trim(fgets(STDIN));
    modificarResponsableViaje($viaje, $opcion);
}

function modificarCosto($viaje)
{
    echo "Este es el Costo actual del viaje: " . $viaje->getCosto() . "\n";
    $viaje->setCosto(readline("Ingrese el nuevo costo del viaje: "));
    $viaje->modificar();
}

function menuModificarEmpresa($empresaAModificar)
{
    echo "Que informacion desea modificar de la empresa?\n";
    echo "1- El nombre\n";
    echo "2- La direccion\n";
    echo "3- Todos los datos\n";
    $eleccion = trim(fgets(STDIN));
    modificarEmpresaDatos($empresaAModificar, $eleccion);
    //modificarEmpresaDatos($viaje, $eleccion);
}

function verDatosViaje()
{


    $viaje = new Viaje();
    $cantViajes = count($viaje->listar());
    if ($cantViajes > 0) {
        echo "Ingrese el Id del viaje:";
        $id = trim(fgets(STDIN));
        if ($id > 0 /* && $id <= $cantViajes */ && $viaje->Buscar($id)) {
            echo "\n" . $viaje;
            $pasajero = new Pasajero;
            $pasajeros = $pasajero->listar("idviaje = " . $id);
            foreach ($pasajeros as $pasajero) {
                echo $pasajero;
            }
        } else {
            echo "\nNo se encontro el viaje que se buscaba\n";
        }
    } else {
        echo "\nNo hay viajes cargados.\n";
    }
}

function modificarPasajero()
{
    $bandera = false;
    while (!$bandera) {
        $pasajero = new Pasajero();
        $infoPasajeros = $pasajero->listar();
        foreach ($infoPasajeros as $pasajero) {
            echo "{$pasajero}\n";
            echo "-------\n";
        }
        echo "Ingrese el numero de documento del pasajero al que desea cambiarle los datos:\n";
        $numDocPasajero = trim(fgets(STDIN));
        if ($pasajero->Buscar($numDocPasajero)) {
            $pasajeroEncontrado = $pasajero;
            while (true) {
                echo "Que dato quiere modificar?\n";
                echo "1- Nombre\n";
                echo "2- Apellido\n";
                echo "3- Numero de telefono\n";
                echo "4- Todos los datos\n";
                echo "5- Volver al menu principal\n";
                $eleccion = trim(fgets(STDIN));
                if ($eleccion == 5) {
                    echo "Regresando al menu principal...\n";
                    $bandera = true;
                    break;
                } elseif ($eleccion >= 1 && $eleccion <= 4) {
                    switch ($eleccion) {
                        case 1:
                            modificarNombrePasajero($pasajeroEncontrado);
                            break;
                        case 2:
                            modificarApellidoPasajero($pasajeroEncontrado);
                            break;
                        case 3:
                            modificarTelefonoPasajero($pasajeroEncontrado);
                            break;
                        case 4:
                            modificarTodosDatosPasajero($pasajeroEncontrado);
                            break;
                        default:
                            break;
                    }
                } else {
                    echo "Opcion incorrecta, por favor ingrese una opcion valida\n";
                }
            }
        } else {
            echo "No se encontro ningun pasajero con ese numero de documento.\n";
        }
    }
}


function modificarNombrePasajero($pasajero)
{
    echo "El nombre actual es: " . $pasajero->getNombre() . "\n";
    $nuevoNombre = trim(fgets(STDIN));
    $pasajero->setNombre($nuevoNombre);
    $pasajero->modificar();
    echo "Se cambio correctamente a " . $pasajero->getNombre() . "\n";
    echo "-------\n";
}

function modificarApellidoPasajero($pasajero)
{
    echo "El apellido actual es: " . $pasajero->getApellido() . "\n";
    $nuevoApellido = trim(fgets(STDIN));
    $pasajero->setApellido($nuevoApellido);
    $pasajero->modificar();
    echo "Se cambio correctamente a " . $pasajero->getApellido() . "\n";
    echo "-------\n";
}

function modificarTelefonoPasajero($pasajero)
{
    echo "El telefono actual es: " . $pasajero->getTelefono() . "\n";
    $nuevoTelefono = trim(fgets(STDIN));
    $pasajero->setTelefono($nuevoTelefono);
    $pasajero->modificar();
    echo "Se cambio correctamente a " . $pasajero->getTelefono() . "\n";
    echo "-------\n";
}

function modificarTodosDatosPasajero($pasajero)
{
    modificarNombrePasajero($pasajero);
    modificarApellidoPasajero($pasajero);
    modificarTelefonoPasajero($pasajero);
}

function agregarPasajero()
{
    $bandera = false;
    $viaje = new Viaje();
    echo "Ingrese el id del viaje\n";
    $id = trim(fgets(STDIN));
    if ($viaje->Buscar($id)) {
        echo $viaje;
        $pasajero = new Pasajero;
        $pasajeros = $pasajero->listar("idviaje = " . $id);
        $cantPasajeros = $viaje->getMaxPasajeros();
        if (count($pasajeros) < $cantPasajeros) {
            while (!$bandera) {
                $documento = readline("Numero de documento del pasajero: ");
                $persona = new Persona();
                $encontrado = $persona->Buscar($documento);
                while ($encontrado) {
                    $documento = readline("No se puede repetir el DNI Ingrese otro: ");
                    $encontrado = $persona->Buscar($documento);
                }
                $nombre = readline("Nombre del pasajero: ");
                $apellido = readline("Apellido del pasajero: ");
                $telefono = readline("Telefono del pasajero: ");
                $asiento = readline("Numero de asiento: ");
                $ticket = readline("Ingrese el numero de ticket: ");

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

                $pasajero = new Pasajero();
                $pasajero->cargar($arrayParam);
                if ($pasajero->insertar()) {
                    echo "El pasajero fue ingresado con exito\n";
                    $bandera = true;
                }
            }
        } else {
            echo "Se completó el cupo de la cantidad de pasajeros\n";
        }
        /* if (!$viaje->hayPasajesDisponibles()) {
            echo "No hay pasajes disponibles\n";
        } else {
             while (!$bandera) {
                $nombre = readline("Nombre del pasajero: ");
                $apellido = readline("Apellido del pasajero: ");
                $documento = readline("Numero de documento del pasajero: ");
                $telefono = readline("Telefono del pasajero: ");
                $asiento = readline("Numero de asiento: ");
                $ticket = readline("Ingrese el numero de ticket: ");

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

                $pasajero = new Pasajero();
                $pasajero->cargar($arrayParam);
                if ($pasajero->insertar()) {
                    echo "El pasajero fue ingresado con exito\n";
                    $bandera = true;
                }
                if ($viaje->venderPasaje($pasajero)) {
                    echo "El pasajero se ha agregado a la coleccion\n";
                } else {
                    echo "El pasajero no ha podido ser agregado a la coleccion\n";
                }
            } 
        } */
    }
}

function modificarResponsableViaje($viaje, $opcion)
{
    $responsable = new ResponsableV();
    $responsable->Buscar($viaje->getObjResponsable());
    switch ($opcion) {
        case 1:
            echo "El numero de licencia es: {$responsable->getNumeroLicencia()} \n";
            echo "Ingrese el NUEVO numero de licencia: ";
            $nuevoNumLicencia = trim(fgets(STDIN));
            if ($nuevoNumLicencia != null && is_int($nuevoNumLicencia)) {
                $responsable->setNumeroLicencia($nuevoNumLicencia);
                $responsable->modificar();
                echo "\nSe cambio correctamente a " . $responsable->getNumeroLicencia() . "\n";
            } else {
                echo "\nSOLO NUMEROS.\n";
            }
            break;
        case 2:
            echo "El nombre del empleado: {$responsable->getNombre()} \n";
            echo "Ingrese el NUEVO nombre del empleado: ";
            $nuevoNombre = trim(fgets(STDIN));
            $responsable->setNombre($nuevoNombre);
            $responsable->modificar();
            echo "\nSe cambio correctamente a " . $responsable->getNombre() . "\n";
            break;
        case 3:
            echo "El apellido del empleado: {$responsable->getApellido()} \n";
            echo "Ingrese el NUEVO apellido del empleado: ";
            $nuevoApellido = trim(fgets(STDIN));
            $responsable->setApellido($nuevoApellido);
            $responsable->modificar();
            echo "\nSe cambio correctamente a " . $responsable->getApellido() . "\n";
            break;
        case 4:
            echo "El numero de licencia es: {$responsable->getNumeroLicencia()} \n";
            echo "Ingrese el NUEVO numero de licencia: ";
            $nuevoNumLicencia = trim(fgets(STDIN));
            if ($nuevoNumLicencia != null || is_int($nuevoNumLicencia)) {
                $responsable->setNumeroLicencia($nuevoNumLicencia);
                $responsable->modificar();
                echo "\nSe cambio correctamente a " . $responsable->getNumeroLicencia() . "\n";
            } else {
                echo "\nSOLO NUMEROS.\n";
            }

            echo "\nIngrese el NUEVO nombre del empleado: ";
            $nuevoNombre = trim(fgets(STDIN));
            $responsable->setNombre($nuevoNombre);
            $responsable->modificar();

            echo "\nIngrese el NUEVO apellido del empleado: ";
            $nuevoApellido = trim(fgets(STDIN));
            $responsable->setApellido($nuevoApellido);
            $responsable->modificar();

            echo "Datos del responsable modificados correctamente\n";
            break;
        case 5:
            break;
        default:
            echo "Opcion incorrecta, por favor ingrese una opcion valida\n";
            break;
    }
}

function cargarEmpresa()
{
    $empresa = new Empresa();
    if (count($empresa->listar()) > 1) {
        echo "\nNo pueden existir mas empresas.\n";
    } else {
        $nombreEmpresa = readline("Ingrese el nombre de la empresa: ");
        $direccionEmpresa = readline("Ingrese la dirección de la empresa: ");

        $empresa->cargar(null, $nombreEmpresa, $direccionEmpresa);
        if ($empresa->insertar()) {
            echo "La empresa fue agregada exitosamente\n";
        } else {
            echo "La empresa no ha podido ser cargada " . $empresa->getmensajeoperacion() . "\n";
        }
    }
}

function modificarEmpresaDatos($empresaAModificar, $eleccion)
{

    switch ($eleccion) {
        case 1:
            echo "El nombre actual de la empresa es " . $empresaAModificar->getNombre() . "\n";
            $nuevoNombre = trim(fgets(STDIN));
            $empresaAModificar->setNombre($nuevoNombre);
            $empresaAModificar->modificar();
            echo "El nombre de la empresa se cambio correctamente\n";
            break;
        case 2:
            echo "La direccion actual de la empresa es " . $empresaAModificar->getDireccion() . "\n";
            $nuevaDir = trim(fgets(STDIN));
            $empresaAModificar->setDireccion($nuevaDir);
            $empresaAModificar->modificar();
            echo "La direccion de la empresa se cambio correctamente\n";
            break;
        case 3:
            echo "El nombre actual de la empresa es " . $empresaAModificar->getNombre() . "\n";
            $nuevoNombre = trim(fgets(STDIN));
            $empresaAModificar->setNombre($nuevoNombre);
            $empresaAModificar->modificar();
            echo "El nombre de la empresa se cambio correctamente\n";

            echo "La direccion actual de la empresa es " . $empresaAModificar->getDireccion() . "\n";
            $nuevaDir = trim(fgets(STDIN));
            $empresaAModificar->setDireccion($nuevaDir);
            $empresaAModificar->modificar();
            echo "La direccion de la empresa se cambio correctamente\n";
            break;
        default:
            echo "Opcion incorrecta, por favor ingrese una opcion valida\n";
            break;
    }
}

function eliminarEmpresa()
{
    $empresa = new Empresa();
    $infoempresa = $empresa->listar();
    foreach ($infoempresa as $empresa) {
        echo "\n{$empresa}\n";
        echo "-------\n";
    }
    echo "\nIngrese el codigo del empresa a eliminar? ";
    $rta = trim(fgets(STDIN));
    if ($empresa->Buscar($rta)) {
        if ($empresa->Eliminar()) {
            echo "\nSe elimino con exito.\n";
        }
    } else {
        echo "\nEl empresa que quiere eliminar no existe.\n";
    }
}


/*function modificarEmpresaDatos($viaje, $eleccion)
{
    $empresa = new Empresa();
    $empresa->Buscar($viaje->getObjEmpresa());
    switch ($eleccion) {
        case 1:
            echo "El nombre actual de la empresa es " . $empresa->getNombre() . "\n";
            $nuevoNombre = trim(fgets(STDIN));
            $empresa->setNombre($nuevoNombre);
            $empresa->modificar();
            echo "El nombre de la empresa se cambio correctamente\n";
            break;
        case 2:
            echo "La direccion actual de la empresa es " . $empresa->getDireccion() . "\n";
            $nuevaDir = trim(fgets(STDIN));
            $empresa->setDireccion($nuevaDir);
            $empresa->modificar();
            echo "La direccion de la empresa se cambio correctamente\n";
            break;
        case 3:
            echo "El nombre actual de la empresa es " . $empresa->getNombre() . "\n";
            $nuevoNombre = trim(fgets(STDIN));
            $empresa->setNombre($nuevoNombre);
            $empresa->modificar();
            echo "El nombre de la empresa se cambio correctamente\n";

            echo "La direccion actual de la empresa es " . $empresa->getDireccion() . "\n";
            $nuevaDir = trim(fgets(STDIN));
            $empresa->setDireccion($nuevaDir);
            $empresa->modificar();
            echo "La direccion de la empresa se cambio correctamente\n";
            break;
        default:
            echo "Opcion incorrecta, por favor ingrese una opcion valida\n";
            break;
    }
}




/*function modificarResponsableViaje($viaje, $opcion)
{
    switch ($opcion) {
        case 1:
            echo $viaje->getObjResponsable()->getNumEmpleado() . "es el numero de empleado \n";
            echo "Se cambiara a: \n";
            $nuevoNumEmpleado = trim(fgets(STDIN));
            $viaje->getObjResponsable()->setNumEmpleado($nuevoNumEmpleado);
            $viaje->getObjResponsable()->modificar();
            $viaje->modificar();
            echo "Se cambio correctamente a " . $viaje->responsable->getNumEmpleado() . "\n";
            break;
        case 2:
            echo $viaje->getObjResponsable()->getNumLicencia() . "es el numero de empleado \n";
            echo "Se cambiara a: \n";
            $nuevoNumLicencia = trim(fgets(STDIN));
            $viaje->getObjResponsable()->setNumLicencia($nuevoNumLicencia);
            $viaje->getObjResponsable()->modificar();
            $viaje->modificar();
            echo "Se cambio correctamente a " . $viaje->responsable->getNumLicencia() . "\n";
            break;
        case 3:
            echo $viaje->getObjResponsable()->getNombre() . "es el numero de empleado \n";
            echo "Se cambiara a: \n";
            $nuevoNombre = trim(fgets(STDIN));
            $viaje->getObjResponsable()->setNombre($nuevoNombre);
            $viaje->getObjResponsable()->modificar();
            $viaje->modificar();
            echo "Se cambio correctamente a " . $viaje->getObjResponsable()->getNombre() . "\n";
            break;
        case 4:
            echo $viaje->getObjResponsable()->getApellido() . "es el numero de empleado \n";
            echo "Se cambiara a: \n";
            $nuevoApellido = trim(fgets(STDIN));
            $viaje->getObjResponsable()->setNumLicencia($nuevoApellido);
            $viaje->getObjResponsable()->modificar();
            $viaje->modificar();
            echo "Se cambio correctamente a " . $viaje->getObjResponsable()->getApellido() . "\n";
            break;
        case 5:
            echo $viaje->getObjResponsable()->getNumEmpleado() . "es el numero de empleado \n";
            echo "Se cambiara a: \n";
            $nuevoNumEmpleado = trim(fgets(STDIN));
            $viaje->getObjResponsable()->setNumEmpleado($nuevoNumEmpleado);
            echo "Se cambio correctamente a " . $viaje->responsable->getNumEmpleado() . "\n";

            echo $viaje->getObjResponsable()->getNumLicencia() . "es el numero de empleado \n";
            echo "Se cambiara a: \n";
            $nuevoNumLicencia = trim(fgets(STDIN));
            $viaje->getObjResponsable()->setNumLicencia($nuevoNumLicencia);
            echo "Se cambio correctamente a " . $viaje->responsable->getNumLicencia() . "\n";

            echo $viaje->getObjResponsable()->getNombre() . "es el numero de empleado \n";
            echo "Se cambiara a: \n";
            $nuevoNombre = trim(fgets(STDIN));
            $viaje->getObjResponsable()->setNombre($nuevoNombre);
            echo "Se cambio correctamente a " . $viaje->getObjResponsable()->getNombre() . "\n";

            echo $viaje->getObjResponsable()->getApellido() . "es el numero de empleado \n";
            echo "Se cambiara a: \n";
            $nuevoApellido = trim(fgets(STDIN));
            $viaje->getObjResponsable()->setNumLicencia($nuevoApellido);
            echo "Se cambio correctamente a " . $viaje->getObjResponsable()->getApellido() . "\n";
            $viaje->getObjResponsable()->modificar();
            $viaje->modificar();
            break;
        default:
            echo "Opcion incorrecta, por favor ingrese una opcion valida\n";
            break;
    }
}*/
