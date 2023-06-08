<?php
session_start();
require '../../models/Contacto.php';

$Contacto = new Contacto();

if ($_SESSION["id_usuario"]) {
	if ($_GET["id_contacto"]) {
		$idContacto = $_GET["id_contacto"];
		$idUsuario = $_SESSION["id_usuario"];

		if ($Contacto->eliminarContacto($idContacto, $idUsuario)) {
			$dataMsg = array('sucess' => 'true', 'info' => 'Se elimino el contacto de forma correcta.');
			$_SESSION['msg'] = $dataMsg;
			header('location:../../views/dashboard.php');
		} else {
			$dataMsg = array('sucess' => 'false', 'info' => 'No se pudo eliminar.');
			$_SESSION['msg'] = $dataMsg;
			header('location:../../views/dashboard.php');
		}
	}
} else {
	$dataMsg = array('sucess' => 'false', 'info' => 'No se pudo actualizar.');
	$_SESSION['msg'] = $dataMsg;
	header('location: ./index.php');
}
