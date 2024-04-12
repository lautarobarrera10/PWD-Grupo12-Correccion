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
		foreach ($this->getColObjCliente() as $value) {
			$str .= $value . "\n";
		}
		return $str;
	}
	public function strColObjMoto()
	{
		$str = "";
		foreach ($this->getColObjMoto() as $value) {
			$str .= $value . "\n";
		}
		return $str;
	}
	public function strColObjVenta()
	{
		$str = "";
		foreach ($this->getColObjVenta() as $value) {
			$str .= $value . "\n";
		}
		return $str;
	}

	//*Devuelve una cadena de caracteres
	public function __toString()
	{
		return "Denominacion: " . $this->getDenominacion() . "\n" .
			"Direccion: " . $this->getDireccion() . "\n" .
			"Coleccion de Objetos Cliente: " . $this->strColObjCliente() . "\n" .
			"Coleccion de objetos Moto: " . $this->strColObjMoto() . "\n" .
			"Coleccion Objetos Venta: " . $this->strColObjVenta() . "\n";
	}

	//*recorre la colección de motos de la Empresa y retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro
	public function retornarMoto($codigoMoto)
	{
		$i = 0;
		$seEncontro = false;
		while ($seEncontro == true || $i < count($this->getColObjMoto())) {
			if ($this->getColObjMoto()[$i]->getCodigo() == $codigoMoto) {
				$seEncontro = true;
				return $this->getColObjMoto()[$i];
			}
			$i++;
		}
	}


	//*método que recibe por parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia Venta que debe ser creada. 
	//!Recordar que no todos los clientes ni todas las motos, están disponibles para registrar una venta en un momento determinado. 
	//*El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la venta
	public function registrarVenta($colCodigosMoto, $objCliente)
	{
		$nuevaColObjMoto = [];
		$colObjVenta[] = $this->getColObjVenta();
		for ($i = 0; $i < count($colCodigosMoto); $i++) {
			if (!($objCliente->getDadoBaja()) && $this->getColObjMoto()[$i]->getActiva()) {
				$objMotoEncontrada = $this->retornarMoto($colCodigosMoto[$i]);
				if ($objMotoEncontrada != null) {
					$nuevaColObjMoto[] = $objMotoEncontrada;

					//*Creo obj de venta
					$objVentaRegistrada = new Venta(null, null, $objCliente, $nuevaColObjMoto, null);
					//*Se setean  la colObjMoto y el precio final de venta
					$objVentaRegistrada->incorporarMoto($objMotoEncontrada);

					//*Se actualiza las variables instancias de colObjventa y colObjMoto
					$this->setColObjMoto($nuevaColObjMoto);
					$colObjVenta[] = $objVentaRegistrada;
					$this->setColObjVenta($colObjVenta);

					//*retorno el precio final
					return $objVentaRegistrada->getPrecioFinal();
				}/*  else {
					echo "No hubo coincidencia por lo que no retorno nada.\n";
				} */
			} /* else {
					echo "fallo en la condicion";
				} */
		}
	} //!Cierre de registrarVenta


	//*Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente
	public function retornarVentasXCliente($tipo, $numDoc)
	{
		$ventasRealizadas = [];
		foreach ($this->getColObjVenta() as $venta) {
			foreach ($venta->getObjCliente()() as $cliente) {
				if ($cliente->getNumDoc() == $numDoc && $cliente->getTipoDoc() == $tipo) {
					$ventasRealizadas[] = $venta;
				}
			}
		}
		return $ventasRealizadas;
	}
}//!Cierre clase
