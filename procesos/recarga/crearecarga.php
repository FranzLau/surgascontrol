<?php 
	session_start();
	require '../../config/conexion.php';
	require '../../config/ventas.php';
	$obj=new ventas();

	if (count($_SESSION['tablaRecargasTemp'])==0) {
		echo 0;
	}else{
		$result = $obj->crearRecargas();
		unset($_SESSION['tablaRecargasTemp']);
		echo $result;
	}

 ?>