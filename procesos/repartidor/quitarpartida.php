<?php 
	session_start();
	$index = $_POST['ind'];
	unset($_SESSION['tablaPartidasTemp'][$index]);
	$datos = array_values($_SESSION['tablaPartidasTemp']);
	unset($_SESSION['tablaPartidasTemp']);
	$_SESSION['tablaPArtidasTemp'] = $datos;
 ?>