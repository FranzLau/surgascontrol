<?php 
	session_start();
	require '../../config/conexion.php';
	require '../../config/ventas.php';
	$obj=new ventas();

	if (count($_SESSION['tablaPartidasTemp'])==0) {
		echo 0;
	}else{
		$result = $obj->creaPartida();
		unset($_SESSION['tablaPartidasTemp']);
		echo $result;
	}

 ?>