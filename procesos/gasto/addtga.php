<?php 
	require '../../config/conexion.php';
	$nomtgafrm = $_POST['nomtga'];
	$destgafrm = $_POST['desctga'];
	

	$vale = $con->query("SELECT nom_tipogasto FROM tipogasto WHERE nom_tipogasto LIKE '". $nomtgafrm ."'");
	$gasto = $vale->fetch_row();
	if ($gasto[0]==$nomtgafrm) {
		echo json_encode(array('error' => true));
	}else{
		$res = $con->query("INSERT INTO tipogasto (nom_tipogasto,desc_tipogasto) VALUES ('$nomtgafrm','$destgafrm')");
		if ($res) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	}

$con->close();
 ?>