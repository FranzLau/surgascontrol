<?php 
	require '../../config/conexion.php';
	$nomcatfrm = $_POST['nomcateg'];
	$descatfrm = $_POST['descateg'];
	

	$vale = $con->query("SELECT nom_categoria FROM categoria WHERE nom_categoria LIKE '". $nomcatfrm ."'");
	$clie = $vale->fetch_row();
	if ($clie[0]==$nomcatfrm) {
		echo json_encode(array('error' => true));
	}else{
		$res = $con->query("INSERT INTO categoria (nom_categoria,desc_categoria) VALUES ('$nomcatfrm','$descatfrm')");
		if ($res) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	}

$con->close();
 ?>