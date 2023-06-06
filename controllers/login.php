<?php

require '../models/Auth.php';

session_start();
$usuario = strtolower($_POST['username']);
$pass = $_POST['password'];
$Auth = new Auth();

if ($Auth->logear($usuario, $pass)) {
	header('location:../views/inicio.php');
} else {
	$dataMsg = array('sucess' => 'false', 'info' => 'Usuario o clave incorrecta.');
	$_SESSION['msg'] = $dataMsg;
	header('location:../views/login.php');
}
