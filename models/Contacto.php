<?php
require 'Conexion.php';

class Contacto extends Conexion
{
	public function mostrarContactos($idUsuario)
	{
		$contactos = array();
		$conexion = new Conexion();
		$sql = "SELECT * FROM contacto WHERE id_user = ?";
		$query = $conexion->prepare($sql);
		$query->bindParam(1, $idUsuario, PDO::PARAM_STR);
		$query->execute();

		while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
			$contactos[] = $res;
		}
		return $contactos;
	}

	public function obtenerContacto($idUsuario, $idContacto)
	{
		$contactos = array();
		$conexion = new Conexion();
		$sql = "SELECT nombre_contacto, email_contacto FROM contacto WHERE id_user = ? AND id_contacto = ?";
		$query = $conexion->prepare($sql);
		$query->bindParam(1, $idUsuario, PDO::PARAM_STR);
		$query->bindParam(2, $idContacto, PDO::PARAM_STR);
		$query->execute();
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function crearContacto($idUsuario, $nombreContacto, $emailContacto)
	{
		$conexion = new Conexion();
		$sql = "INSERT INTO contacto (nombre_contacto, email_contacto, id_user)  VALUES (?, ?, ?)";
		$query = $conexion->prepare($sql);
		$query->bindParam(1, $nombreContacto, PDO::PARAM_STR);
		$query->bindParam(2, $emailContacto, PDO::PARAM_STR);
		$query->bindParam(3, $idUsuario, PDO::PARAM_INT);

		return $query->execute();
	}

	public function actualizarContacto($idUsuario, $nombreContacto, $emailContacto)
	{
		$conexion = new Conexion();
		$sql = "UPDATE contacto SET nombre_contacto = ?, email_contacto = ? WHERE id_contacto = ?";
		$query = $conexion->prepare($sql);
		$query->bindParam(1, $nombreContacto, PDO::PARAM_STR);
		$query->bindParam(2, $emailContacto, PDO::PARAM_STR);
		$query->bindParam(3, $idUsuario, PDO::PARAM_INT);

		return $query->execute();
	}

	public function eliminarContacto($idContacto, $idUsuario)
	{
		$conexion = new Conexion();
		$sql = "DELETE FROM contacto WHERE id_contacto = ? AND id_user = ?";
		$query = $conexion->prepare($sql);
		$query->bindParam(1, $idContacto, PDO::PARAM_INT);
		$query->bindParam(2, $idUsuario, PDO::PARAM_INT);

		return $query->execute();
	}

	public function obtenerEstadisticas($idUsuario)
	{
		$contactos = array();
		$conexion = new Conexion();
		$sql = "SELECT 
						CASE 
								WHEN email_contacto LIKE '%@gmail%' THEN '@gmail'
								WHEN email_contacto LIKE '%@hotmail%' THEN '@hotmail'
								WHEN email_contacto LIKE '%@yahoo%' THEN '@yahoo'
								ELSE 'Otros'
						END AS dominio,
							COUNT(*) AS cantidad
						FROM 
							contacto
						WHERE
							id_user = ?
						GROUP BY dominio";
		$query = $conexion->prepare($sql);
		$query->bindParam(1, $idUsuario, PDO::PARAM_STR);
		$query->execute();

		while ($res = $query->fetch(PDO::FETCH_ASSOC)) {
			$contactos[] = $res;
		}
		return $contactos;
	}
}
