<?php

class Conexion extends PDO
{
	// CONEXION A LA BASE DE DATOS
	private $hostBd = 'localhost';
	private $nombreBd = 'sistema_web';
	private $userBd = 'root';
	private $passBd = '';

	public function __construct()
	{
		try {
			parent::__construct('mysql:host=' . $this->hostBd . ';dbname=' . $this->nombreBd . ';charset=utf8', $this->userBd, $this->passBd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch (PDOException $e) {
			echo 'Error: ' . $e->getMessage();
			exit;
		}
	}
}
