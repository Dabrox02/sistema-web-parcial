<?php
session_start();
require '../../models/Contacto.php';

$Contacto = new Contacto();
echo json_encode($Contacto->obtenerEstadisticas($_SESSION['id_usuario']));
