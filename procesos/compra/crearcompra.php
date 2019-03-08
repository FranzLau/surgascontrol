<?php 
	session_start();
	require '../../config/conexion.php';
	require '../../config/ventas.php';
	$obj=new ventas();

	if (count($_SESSION['CompraTemporal'])==0) {
		echo 0;
	}else{
		$result = $obj->crearCompras();
		unset($_SESSION['CompraTemporal']);
		echo $result;
	}
?>