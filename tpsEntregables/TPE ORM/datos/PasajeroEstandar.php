<?php
class PasajeroEstandar extends Pasajero{
    public function __construct($nombre, $apellido, $num_doc, $telefono, $numAsiento, $numTicket)
    {
        parent::__construct($nombre, $apellido, $num_doc, $telefono, $numAsiento, $numTicket);
    }
 
    public function darPorcentajeIncremento() {
        $incremento= 0.1;
        return $incremento;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.="Incremento: ". $this->darPorcentajeIncremento()."\n";
        return $cadena;
    }
}
?>