<?php 
	require '../../config/conexion.php';
	$nomclifrm = $_POST['nomcli'];
	$apeclifrm = $_POST['apecli'];
	$sexclifrm = $_POST['sexcli'];
	$fnaclifrm = $_POST['datecli'];
	$tdoclifrm = $_POST['tdoccli'];
	$ndoclifrm = $_POST['doccli'];
	$dirclifrm = $_POST['dircli'];
	$fonclifrm = $_POST['foncli'];
	$mailclifrm = $_POST['emailcli'];

	$vale = $con->query("SELECT numdoc_cliente FROM cliente WHERE numdoc_cliente LIKE '". $ndoclifrm ."'");
	$clie = $vale->fetch_row();
	if ($clie[0]==$ndoclifrm) {
		echo json_encode(array('error' => true));
	}else{
		$res = $con->query("INSERT INTO cliente (nom_cliente,ape_cliente,sexo_cliente,fechnac_cliente,tipodoc_cliente,numdoc_cliente,dir_cliente,telf_cliente,email_cliente) VALUES ('$nomclifrm','$apeclifrm','$sexclifrm','$fnaclifrm','$tdoclifrm','$ndoclifrm','$dirclifrm','$fonclifrm','$mailclifrm')");
		if ($res) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	}

$con->close();
 ?>