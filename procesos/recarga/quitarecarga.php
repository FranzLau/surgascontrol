<?php 
	session_start();
	$index = $_POST['ind'];
	unset($_SESSION['tablaRecargasTemp'][$index]);
	$datos = array_values($_SESSION['tablaRecargasTemp']);
	unset($_SESSION['tablaRecargasTemp']);
	$_SESSION['tablaRecargasTemp'] = $datos;
 ?>