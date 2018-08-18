<?php 
	session_start();
	require '../../config/conexion.php';
	require '../../config/ventas.php';
	$obj=new ventas();

	if (count($_SESSION['tablaLiquidaTemp'])==0) {
		echo 0;
	}else{
		$result = $obj->crearLiquidacion();
		unset($_SESSION['tablaLiquidaTemp']);
		echo $result;
	}

 ?>