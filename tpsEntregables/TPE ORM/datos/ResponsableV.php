<?php
class ResponsableV extends Persona
{
	private $numeroEmpleado;
	private $numeroLicencia;


	public function __construct()
	{
		parent::__construct();
		$this->numeroEmpleado = "";
		$this->numeroLicencia = "";
	}

	public function cargar($param)
	{
		parent::cargar($param);
		$this->setNumeroEmpleado($param['numeroEmpleado']);
		$this->setNumeroLicencia($param['numeroLicenciacle']);
	}

	public function getNumeroEmpleado()
	{
		return $this->numeroEmpleado;
	}

	public function setNumeroEmpleado($numeroE)
	{
		$this->numeroEmpleado = $numeroE;
	}

	public function getNumeroLicencia()
	{
		return $this->numeroLicencia;
	}

	public function setNumeroLicencia($numeroL)
	{
		$this->numeroLicencia = $numeroL;
	}
	/*public function Buscar($dni){
		$base=new BaseDatos();
		$consulta="Select * from responsable where rnumdoc=".$dni; 
		$resp= false;
		if($base->Iniciar()){
		    if($base->Ejecutar($consulta)){
				if($row2=$base->Registro()){	
				    parent::Buscar($dni);
				    $this->setNumeroEmpleado($row2['rnumeroempleado']);
                    $this->setNumeroLicencia($row2['rnumerolicencia']);
					$resp= true;
				}				
			
		 	}	else {
		 			$this->setmensajeoperacion($base->getError());
		 		
			}
		 }	else {
		 		$this->setmensajeoperacion($base->getError());
		 	
		 }		
		 return $resp;
	}	
    */
	public function Buscar($numeroEmpleado)
	{
		$base = new BaseDatos();
		$consulta = "SELECT * FROM responsable WHERE rnumeroempleado=" . $numeroEmpleado;
		$resp = false;
		if ($base->Iniciar()) {
			if ($base->Ejecutar($consulta)) {
				if ($row2 = $base->Registro()) {
					parent::Buscar($row2['rnumdoc']);
					$this->setNumeroEmpleado($row2['rnumeroempleado']);
					$this->setNumeroLicencia($row2['rnumerolicencia']);
					$resp = true;
				}
			} else {
				$this->setmensajeoperacion($base->getError());
			}
		} else {
			$this->setmensajeoperacion($base->getError());
		}
		return $resp;
	}


	public function listar($condicion = "")
	{
		$arreglo = null;
		$base = new BaseDatos();
		$consulta = "Select * from responsable ";
		if ($condicion != "") {
			$consulta = $consulta . ' where ' . $condicion;
		}
		$consulta .= " order by rnumeroempleado ";
		/**CONSULTAR */
		//echo $consultaPersonas;
		if ($base->Iniciar()) {
			if ($base->Ejecutar($consulta)) {
				$arreglo = array();
				while ($row2 = $base->Registro()) {
					$obj = new ResponsableV();
					$obj->Buscar($row2['rnumdoc']);
					/**rnumdoc o rnumeroempleado */
					array_push($arreglo, $obj);
				}
			} else {
				$this->setmensajeoperacion($base->getError());
			}
		} else {
			$this->setmensajeoperacion($base->getError());
		}
		return $arreglo;
	}
	/* 	public function insertar(){
		$base=new BaseDatos();
		$resp= false;
		// CONSULTAR $objViaje= new Viaje();
		if(parent::insertar()){
		    $consultaInsertar="INSERT INTO responsable(rnumdoc, rnumerolicencia)
				VALUES (".parent::getNrodoc().",'".$this->getNumeroLicencia()."')";
		    if($base->Iniciar()){
		        if($base->Ejecutar($consultaInsertar)){
		            $resp=  true;
		        }	else {
		            $this->setmensajeoperacion($base->getError());
		        }
		    } else {
		        $this->setmensajeoperacion($base->getError());
		    }
		 }
		return $resp;
	} */
	//*V2
	public function insertar()
	{
		$base = new BaseDatos();
		$resp = false;
		$numLicencia = $this->getNumeroLicencia();
		$numDocPersona = parent::getNrodoc();
		if (parent::insertar()) {

			$consultaInsertar = "INSERT INTO responsable(rnumerolicencia, rnumdoc)
														VALUES ('{$numLicencia}','{$numDocPersona}')";

			/* $consultaInsertar = "INSERT INTO responsable (rnumeroempleado, rnumerolicencia, rnumdoc) 
                     VALUES (NULL, " . $this->getNumeroLicencia() . ", " . parent::getNrodoc() . ")"; */


			if ($base->Iniciar()) {
				if ($numeroEmpleado = $base->devuelveIDInsercion($consultaInsertar)) {
					$resp =  true;
					$this->setNumeroEmpleado($numeroEmpleado);
				} else {
					$this->setmensajeoperacion($base->getError());
				}
			} else {
				$this->setmensajeoperacion($base->getError());
			}
		}

		/* $consulta = "SELECT rnumeroempleado FROM responsable WHERE rnumdoc = " . parent::getNrodoc() . "";
		 $numeroEmpleado = $base->devuelveIDInsercion($consulta);
		 $this->setNumeroEmpleado($numeroEmpleado); */

		return $resp;
	}


	public function modificar()
	{
		$resp = false;
		$base = new BaseDatos();
		if (parent::modificar()) {
			/* $consultaModifica="UPDATE responsable SET rnumerolicencia='".$this->getNumeroLicencia()."' WHERE rnumdoc=". $this->getNrodoc(); */

			$consultaModifica = "UPDATE responsable SET rnumerolicencia='{$this->getNumeroLicencia()}'WHERE  rnumdoc='{$this->getNrodoc()}'";
			if ($base->Iniciar()) {
				if ($base->Ejecutar($consultaModifica)) {
					$resp =  true;
				} else {
					$this->setmensajeoperacion($base->getError());
				}
			} else {
				$this->setmensajeoperacion($base->getError());
			}
		}

		return $resp;
	}

	public function eliminar()
	{
		$base = new BaseDatos();
		$resp = false;
		if ($base->Iniciar()) {
			$consultaBorra = "DELETE FROM responsable WHERE rnumdoc=" . $this->getNrodoc();
			if ($base->Ejecutar($consultaBorra)) {
				if (parent::eliminar()) {
					$resp =  true;
				}
			} else {
				$this->setmensajeoperacion($base->getError());
			}
		} else {
			$this->setmensajeoperacion($base->getError());
		}
		return $resp;
	}

	public function __toString()
	{
		$info = parent::__toString();
		$info .= "Empleado: {$this->getNumeroEmpleado()} \nLicencia: {$this->getNumeroLicencia()}\n";
		return $info;
	}
}
