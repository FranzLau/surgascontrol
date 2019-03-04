<?php 
	session_start();
	require '../../config/conexion.php';
	
	$pregtofrm = $_POST['inputpgto'];//precio de gasto
	$desgtofrm = $_POST['inputgtodes'];//descripcion del gasto
	$gtoidempfrm = $_SESSION['loggedIN']['id_emp'];//usuario q registra
	$nomgtofrm = $_POST['selectg'];//tipo de gasto
	$gtoempfrm = $_POST['selemp'];//empleado que gasta

	$gasto = $con->query("INSERT INTO gasto (precio_gasto,desc_gasto,fecha_gasto,id_emp,tipogasto,empleado) VALUES ('$pregtofrm','$desgtofrm',now(),'$gtoidempfrm','$nomgtofrm','$gtoempfrm')");

	if ($gasto) {
		echo json_encode(array('error' => false));
	}else{
		echo json_encode(array('error' => true));
	}
	
	$con->close();
 ?>