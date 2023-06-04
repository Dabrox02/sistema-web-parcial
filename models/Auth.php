<?php

include '../../config/Conexion.php';

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
		$query->bindParam(4, date("d/m/y"), PDO::PARAM_STR);

		return $query->execute();
	}
}
