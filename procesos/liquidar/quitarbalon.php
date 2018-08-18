<?php 
	session_start();
	$index = $_POST['ind'];
	unset($_SESSION['tablaLiquidaTemp'][$index]);
	$datos = array_values($_SESSION['tablaLiquidaTemp']);
	unset($_SESSION['tablaLiquidaTemp']);
	$_SESSION['tablaLiquidaTemp'] = $datos;
 ?>