<?php 
	require '../../config/conexion.php';
	$rsprovfrm = $_POST['nomprove'];
	$scprovfrm = $_POST['sectorprove'];
	$tdprovfrm = $_POST['tdocprov'];
	$ndprovfrm = $_POST['ndocprov'];
	$dirprovfrm = $_POST['dirprov'];
	$fonprovfrm = $_POST['fonprov'];
	$emailprovfrm = $_POST['emailprov'];
	$urlprovfrm = $_POST['urlprov'];

	$vale = $con->query("SELECT numdoc_proveedor FROM proveedor WHERE numdoc_proveedor LIKE '". $ndprovfrm ."'");
	$clie = $vale->fetch_row();
	if ($clie[0]==$ndprovfrm) {
		echo json_encode(array('error' => true));
	}else{
		$res = $con->query("INSERT INTO proveedor (razon_social,sector_comercial,tipodoc_proveedor,numdoc_proveedor,dir_proveedor,telf_proveedor,email_proveedor,url_proveedor) VALUES ('$rsprovfrm','$scprovfrm','$tdprovfrm','$ndprovfrm','$dirprovfrm','$fonprovfrm','$emailprovfrm','$urlprovfrm')");
		if ($res) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	}

$con->close();
 ?>