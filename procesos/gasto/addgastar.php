<?php 
	session_start();
	require '../../config/conexion.php';
	
	$pregtofrm = $_POST['inputpgto'];
	$desgtofrm = $_POST['inputgtodes'];
	$gtoidempfrm = $_SESSION['loggedIN']['id_emp'];
	$nomgtofrm = $_POST['selectg'];

	$gasto = $con->query("INSERT INTO gasto (precio_gasto,desc_gasto,fecha_gasto,id_emp,id_tipogasto) VALUES ('$pregtofrm','$desgtofrm',now(),'$gtoidempfrm','$nomgtofrm')");

	if ($gasto) {
		echo json_encode(array('error' => false));
	}else{
		echo json_encode(array('error' => true));
	}
	
	$con->close();
 ?>