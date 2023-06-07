<?php
session_start();

require '../../models/Contacto.php';

$Contacto = new Contacto();

if (!empty($_POST["name-contact"]) && !empty($_POST["email-contact"])) {
	$nameContacto = $_POST["name-contact"];
	$emailContacto = $_POST["email-contact"];

	if (isset($_SESSION["id_usuario"])) {
		$id_user = $_SESSION["id_usuario"];
		if ($Contacto->crearContacto($id_user, $nameContacto, $emailContacto)) {
			$dataMsg = array('sucess' => 'true', 'info' => 'Se registro el contacto de forma correcta.');
			$_SESSION['msg'] = $dataMsg;
			header('location:../../views/dashboard.php');
		}
	}
} else {
	$dataMsg = array('sucess' => 'false', 'info' => 'No se pudo registrar contacto.');
	$_SESSION['msg'] = $dataMsg;
	header('location:../../views/dashboard.php');
}
