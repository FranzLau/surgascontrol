<?php 
	require '../../config/conexion.php';
	date_default_timezone_set('America/Lima');
	$formpla = $_POST['parplaca'];
	$formzon = $_POST['parzona'];
    $nowfech = date('Y-m-d');
	$formcant = $_POST['parcantidad'];
	$formchof = $_POST['parChof'];

	$sql = $con->query("SELECT id_emp FROM repartidor WHERE fecha_re='$nowfech' ");
	$result = $sql->fetch_row();
	if ($result[0]==$formchof) {
		echo 0;
	}else{
		$parte = $con->query("INSERT INTO repartidor (placa_re,zona_re,fecha_re,cantidad_re,id_emp) VALUES ('$formpla','$formzon','$nowfech','$formcant','$formchof')");
		if ($parte) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	}
	
 ?>