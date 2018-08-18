<?php 
	require '../../config/conexion.php';
	$nombalfrm = $_POST['nombal'];
	$desbalfrm = $_POST['descbal'];
	$stockllen = $_POST['stocklle'];
	$stockvaci = $_POST['stockvac'];

	$zonbalfrm = $_POST['zonalpBal'];
	$dombalfrm = $_POST['domiciliopBal'];
	$fierrofrm = $_POST['fierroBal'];
	$prebalfrm = $_POST['presbal'];

	$vale = $con->query("SELECT nom_producto FROM producto WHERE nom_producto LIKE '". $nombalfrm ."' ");
	$bal = $vale->fetch_row();
	if ($bal[0]==$nombalfrm) {
		echo 0;
	}else{
		$res = $con->query("INSERT INTO producto (nom_producto,desc_producto,stock_llenos,stock_vacios,precio_zonal,precio_domicilio,precio_fierro,tipo_producto) VALUES ('$nombalfrm','$desbalfrm','$stockllen','$stockvaci','$zonbalfrm','$dombalfrm','$fierrofrm','$prebalfrm')");
		if ($res) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	}

$con->close();
 ?>