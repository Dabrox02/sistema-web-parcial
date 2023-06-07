<?php
require 'Conexion.php';

class Contacto extends Conexion
{

	public function mostrarContactos($idUser)
	{
		$contactos = array();
		$conexion = new Conexion();
		$sql = "SELECT * FROM contacto WHERE id_user = ?";
		$query = $conexion->prepare($sql);
		$query->bindParam(1, $idUser, PDO::PARAM_STR);
		$query->execute();

		while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
			$contactos[] = $res;
		}
		return $contactos;
	}

	public function crearContacto($idUser, $nameContact, $emailContact)
	{
		$conexion = new Conexion();
		$sql = "INSERT INTO contacto (nombre_contacto, email_contacto, id_user)  VALUES (?, ?, ?)";
		$query = $conexion->prepare($sql);
		$query->bindParam(1, $nameContact, PDO::PARAM_STR);
		$query->bindParam(2, $emailContact, PDO::PARAM_STR);
		$query->bindParam(3, $idUser, PDO::PARAM_INT);

		return $query->execute();
	}
}
