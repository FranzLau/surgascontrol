<?php 
	session_start();
	require '../../config/conexion.php';
	require '../../config/ventas.php';
	$obj=new ventas();

	if (count($_SESSION['tablaRecargaTemp'])==0) {
		echo 0;
	}else{
		$result = $obj->crearRecarga();
		unset($_SESSION['tablaRecargaTemp']);
		echo $result;
	}

 ?>