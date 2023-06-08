<?php
session_start();
require '../../models/Contacto.php';

$Contacto = new Contacto();

if ($_SESSION["id_usuario"]) {
	if ($_POST["id-contact"] && $_POST["name-contact"] && $_POST["email-contact"]) {
		$idContacto = $_POST["id-contact"];
		$nombreContacto = $_POST["name-contact"];
		$emailContacto = $_POST["email-contact"];
		if ($Contacto->actualizarContacto($idContacto, $nombreContacto, $emailContacto)) {
			$dataMsg = array('sucess' => 'true', 'info' => 'Se actualizo el contacto de forma correcta.');
			$_SESSION['msg'] = $dataMsg;
			header('location:../../views/dashboard.php');
		} else {
			$dataMsg = array('sucess' => 'false', 'info' => 'No se pudo actualizar.');
			$_SESSION['msg'] = $dataMsg;
			header('location:../../views/dashboard.php');
		}
	}
}
