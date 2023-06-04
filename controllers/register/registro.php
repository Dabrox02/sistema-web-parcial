<?php

include '../../models/Auth.php';

$usuario = $_POST['username'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

$Auth = new Auth();

if ($Auth->registrar($usuario, $pass)) {
	header('location:../../index.php');
} else {
	echo "No se pudo registrar";
}
