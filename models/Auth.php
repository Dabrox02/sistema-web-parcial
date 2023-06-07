<?php
require 'Conexion.php';

class Auth extends Conexion
{
	public function registrar($usuario, $password)
	{
		$conexion = new Conexion();
		$sql = "INSERT INTO usuarios (id_user, username, pass, created_at)  VALUES (?, ?, ?, ?)";
		$query = $conexion->prepare($sql);
		$query->bindValue(1, 1, PDO::PARAM_INT);
		$query->bindParam(2, $usuario, PDO::PARAM_STR);
		$query->bindParam(3, $password, PDO::PARAM_STR);
		$query->bindParam(4, date("y/m/d"), PDO::PARAM_STR);

		return $query->execute();
	}

	public function logear($usuario, $clave)
	{
		$conexion = new Conexion();
		$sql = "SELECT * FROM usuarios WHERE username = ?";
		$query = $conexion->prepare($sql);
		$query->bindParam(1, $usuario, PDO::PARAM_STR);
		$query->execute();
		$res = $query->fetch(PDO::FETCH_ASSOC);
		if ($res) {
			$pass_user = $res["pass"];
			if (password_verify($clave, $pass_user)) {
				$_SESSION["usuario"] = $usuario;
				$_SESSION["id_usuario"] = $res["id_user"];
				return true;
			}
		} else {
			return false;
		}
	}


	public function validarUsuario($usuario)
	{
		$conexion = new Conexion();
		$sql = "SELECT COUNT(*) AS existente FROM usuarios WHERE username = ?";
		$query = $conexion->prepare($sql);
		$query->bindParam(1, $usuario, PDO::PARAM_STR);
		$query->execute();
		$res = $query->fetch(PDO::FETCH_ASSOC);
		$count = $res['existente'];
		return $count;
	}

	public function validarLongitud($cadena, $min, $max)
	{
		if (strlen($cadena) >= $min && strlen($cadena) <= $max) {
			return true;
		} else {
			return false;
		}
	}

	public function validarClave($clave)
	{
		if (preg_match('/^(?=.*[A-Z])(?=.*[a-z]).{6,50}$/', $clave)) {
			return true;
		} else {
			return false;
		}
	}
}
