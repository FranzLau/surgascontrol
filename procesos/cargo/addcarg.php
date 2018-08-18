<?php 
	require '../../config/conexion.php';
	$nomcgfrm = $_POST['nomcg'];
	$descgfrm = $_POST['descg'];
	

	$vale = $con->query("SELECT nom_cargo FROM cargo WHERE nom_cargo LIKE '". $nomcgfrm ."'");
	$cargo = $vale->fetch_row();
	if ($cargo[0]==$nomcgfrm) {
		echo json_encode(array('error' => true));
	}else{
		$res = $con->query("INSERT INTO cargo (nom_cargo,desc_cargo) VALUES ('$nomcgfrm','$descgfrm')");
		if ($res) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	}

$con->close();
 ?>