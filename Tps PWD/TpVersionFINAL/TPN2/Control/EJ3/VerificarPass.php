<?php
class VerificaPass
{
	private $arrayUsuarios = [];

	public function __construct($arrayUsuarios)
	{
		$this->arrayUsuarios = $arrayUsuarios;
	}

	public function getArrayUsuarios()
	{
		return $this->arrayUsuarios;
	}

	public function setArrayUsuarios($arrayUsuarios)
	{
		$this->arrayUsuarios = $arrayUsuarios;
	}

	public function existeUsuario($user, $pass)
	{
		// Usuarios precargados
		$usuariosPrecargados = [
			["usuario" => "enzooooo", "clave" => "12345678a"],
			["usuario" => "gallardo", "clave" => "11111111a"],
			["usuario" => "huevoooo", "clave" => "22222222"]
		];
		$existe = false;
		$contador = 0;
		
		while ($contador < count($usuariosPrecargados) && !$existe) {
			$usuarioActual = $usuariosPrecargados[$contador];
			if ($usuarioActual["usuario"] == $user && $usuarioActual["clave"] == $pass) {
				$existe = true;
			}
			$contador++;
		}
		return $existe;
	}

	public function verificarUsuario($user, $pass)
	{
		$msj ="Usuario o contraseña incorrectos.";
		if ($this->existeUsuario($user, $pass)) {
			$msj = "El usuario existe.";
		} 
		return $msj;
	}

}
