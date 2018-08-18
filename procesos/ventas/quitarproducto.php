<?php 
	session_start();
	$index = $_POST['ind'];
	unset($_SESSION['tablaCompraTemp'][$index]);
	$datos = array_values($_SESSION['tablaCompraTemp']);
	unset($_SESSION['tablaCompraTemp']);
	$_SESSION['tablaCompraTemp'] = $datos;
 ?>