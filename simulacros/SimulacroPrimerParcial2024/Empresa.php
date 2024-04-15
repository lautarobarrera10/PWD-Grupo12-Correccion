<?php
class Empresa
{
	//*atributos
	private $denominacion;
	private $direccion;
	private $colObjCliente;
	private $colObjMoto;
	private $colObjVenta;

	//*Construct
	public function __construct($denominacion, $direccion, $colObjCliente, $colObjMoto, $colObjVenta)
	{
		$this->denominacion = $denominacion;
		$this->direccion = $direccion;
		$this->colObjCliente = $colObjCliente;
		$this->colObjMoto = $colObjMoto;
		$this->colObjVenta = $colObjVenta;
	}

	//*Getters
	public function getDenominacion()
	{
		return $this->denominacion;
	}

	public function getDireccion()
	{
		return $this->direccion;
	}
	public function getColObjCliente()
	{
		return $this->colObjCliente;
	}
	public function getColObjMoto()
	{
		return $this->colObjMoto;
	}

	public function getColObjVenta()
	{
		return $this->colObjVenta;
	}


	//*Setters
	public function setDenominacion($denominacion)
	{
		$this->denominacion = $denominacion;
	}

	public function setDireccion($direccion)
	{
		$this->direccion = $direccion;
	}
	public function setColObjCliente($colObjCliente)
	{
		$this->colObjCliente = $colObjCliente;
	}
	public function setColObjMoto($colObjMoto)
	{
		$this->colObjMoto = $colObjMoto;
	}

	public function setColObjVenta($colObjVenta)
	{
		$this->colObjVenta = $colObjVenta;
	}

	//*Metodos de str para colecciones
	public function strColObjCliente()
	{
		$str = "";
		foreach ($this->getColObjCliente() as $objCliente) {
			$str .= $objCliente . "\n";
		}
		return $str;
	}
	public function strColObjMoto()
	{
		$str = "";
		foreach ($this->getColObjMoto() as $objMoto) {
			$str .= $objMoto . "\n";
		}
		return $str;
	}
	public function strColObjVenta()
	{
		$str = "";
		foreach ($this->getColObjVenta() as $objVenta) {
			$str .= $objVenta . "\n";
		}
		return $str;
	}

	//*Devuelve una cadena de caracteres
	public function __toString()
	{
		return "Denominacion: " . $this->getDenominacion() . "\n" .
			"Direccion: " . $this->getDireccion() . "\n" .
			"Coleccion de Objetos Cliente: " . "\n" . $this->strColObjCliente() . "\n" .
			"Coleccion de objetos Moto: " . "\n" . $this->strColObjMoto() . "\n" .
			"Coleccion Objetos Venta: " . "\n" . $this->strColObjVenta() . "\n";
	}

	//*recorre la colección de motos de la Empresa y retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro
	public function retornarMoto($codigoMoto)
	{
		$i = 0;
		$seEncontro = false;
		$motoEncontrada = null;
		while (!$seEncontro && $i < count($this->getColObjMoto())) {
			if ($this->getColObjMoto()[$i]->getCodigo() == $codigoMoto) {
				$seEncontro = true;
				$motoEncontrada = $this->getColObjMoto()[$i];
			}
			$i++;
		}
		return $motoEncontrada;
	}

	//*método que recibe por parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia Venta que debe ser creada. 

	//!Recordar que no todos los clientes ni todas las motos, están disponibles para registrar una venta en un momento determinado. 

	//*El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la venta

	//*retornarMoto($codigoMoto):recorre la colección de motos de la Empresa y retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro
	public function registrarVenta($colCodigosMoto, $objCliente)
	{
		$precioFinal = null;
		$objVenta = new Venta(null, null, $objCliente, null, null);
		$colObjVenta = $this->getColObjVenta();

		foreach ($colCodigosMoto as $codigoMoto) {
			if ($codigoMoto != null && $objCliente->getDadoBaja() == false) {
				$motoRetornada = $this->retornarMoto($codigoMoto);
				if ($motoRetornada != null && $motoRetornada->getActiva() == true) {
					$objVenta->incorporarMoto($motoRetornada);
					$precioFinal = $objVenta->getPrecioFinal();
				}
			}
		}
		if ($objVenta->getPrecioFinal() != null && $precioFinal != null) {
			$colObjVenta[] = $objVenta;
			$this->setColObjVenta($colObjVenta);
			return $precioFinal;
		}
	} //!Cierre de registrarVenta

	//*Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente
	public function retornarVentasXCliente($tipo, $numDoc)
	{
		$i = 0;
		$bandera = false;
		$colVentaCliente = [];
		if ($this->getColObjVenta() != null) {
			while (!$bandera && $i < count($this->getColObjVenta())) {
				$venta = $this->getColObjVenta()[$i];
				$tipoDocCliente = $venta->getObjCliente()->getTipoDoc();
				$numDocCliente = $venta->getObjCliente()->getNumDoc();
				if ($tipoDocCliente == $tipo && $numDocCliente == $numDoc) {
					$colVentaCliente[] = $venta;
					$bandera = true;
				}
				$i++;
			}
		}
		return $colVentaCliente;
	} //!Cierre retornarVentasXCliente
}//!Cierre clase
