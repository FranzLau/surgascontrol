<?php 
	session_start();
	$index = $_POST['ind'];
	unset($_SESSION['CompraTemporal'][$index]);
	$datos = array_values($_SESSION['CompraTemporal']);
	unset($_SESSION['CompraTemporal']);
	$_SESSION['CompraTemporal'] = $datos;
 ?>