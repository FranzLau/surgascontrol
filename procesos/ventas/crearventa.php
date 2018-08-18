<?php 
	session_start();
	require '../../config/conexion.php';
	require '../../config/ventas.php';
	$obj=new ventas();

	if (count($_SESSION['tablaCompraTemp'])==0) {
		echo 0;
	}else{
		$result = $obj->crearVenta();
		unset($_SESSION['tablaCompraTemp']);
		echo $result;
	}

 ?>