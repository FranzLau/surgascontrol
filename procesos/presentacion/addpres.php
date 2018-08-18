<?php 
	require '../../config/conexion.php';
	$nompresfrm = $_POST['nompres'];
	$despresfrm = $_POST['descpres'];
	
	$vale = $con->query("SELECT nom_presentacion FROM presentacion WHERE nom_presentacion LIKE '". $nompresfrm ."'");
	$clie = $vale->fetch_row();
	if ($clie[0]==$nompresfrm) {
		echo json_encode(array('error' => true));
	}else{
		$res = $con->query("INSERT INTO presentacion (nom_presentacion,desc_presentacion) VALUES ('$nompresfrm','$despresfrm')");
		if ($res) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	}

$con->close();
 ?>