<?php
session_start();
require '../models/Auth.php';

$usuario = strtolower($_POST['username']);
$pass = $_POST['password'];

$Auth = new Auth();
$res = $Auth->validarUsuario($usuario);

if ($res == 0) {
	if ($Auth->validarLongitud($usuario, 6, 15)) {
		if ($Auth->validarClave($pass)) {
			$pass = password_hash($pass, PASSWORD_DEFAULT);
			if ($Auth->registrar($usuario, $pass)) {
				$dataMsg = array('sucess' => 'true', 'info' => 'Se registro de forma correcta.');
				$_SESSION['msg'] = $dataMsg;
				header('location:../index.php');
			} else {
				$dataMsg = array('sucess' => 'false', 'info' => 'No se pudo registrar.');
				$_SESSION['msg'] = $dataMsg;
				header('location:../views/register.php');
			}
		} else {
			$dataMsg = array('sucess' => 'false', 'info' => 'Clave invalida: Minimo 6 caracteres, 1 mayuscula y minusculas.');
			$_SESSION['msg'] = $dataMsg;
			header('location:../views/register.php');
		}
	} else {
		$dataMsg = array('sucess' => 'false', 'info' => 'Usuario invalido: De 6 a 15 caracteres.');
		$_SESSION['msg'] = $dataMsg;
		header('location:../views/register.php');
	}
} else {
	$dataMsg = array('sucess' => 'false', 'info' => 'Usuario ya existente.');
	$_SESSION['msg'] = $dataMsg;
	header('location:../views/register.php');
}
