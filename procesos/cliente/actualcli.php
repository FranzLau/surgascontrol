<?php 
	require '../../config/conexion.php';
	$idclifrm = $_POST['idcliC'];
	$nomclifrm = $_POST['nomcliC'];
	$apeclifrm = $_POST['apecliC'];
	$sexclifrm = $_POST['sexcliC'];
	$fnaclifrm = $_POST['datecliC'];
	$tdoclifrm = $_POST['tdocliC'];
	$ndoclifrm = $_POST['docliC'];
	$dirclifrm = $_POST['dircliC'];
	$fnoclifrm = $_POST['foncliC'];
	$mailclifrm = $_POST['emailcliC'];

	$upd = $con->query("UPDATE cliente SET nom_cliente='$nomclifrm',
											ape_cliente='$apeclifrm',
											sexo_cliente='$sexclifrm',
											fechnac_cliente='$fnaclifrm',
											tipodoc_cliente='$tdoclifrm',
											numdoc_cliente='$ndoclifrm',
											dir_cliente='$dirclifrm',
											telf_cliente='$fnoclifrm',
											email_cliente='$mailclifrm' 
										WHERE id_cliente= '$idclifrm' ");
	if ($upd) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	
$con->close();
 ?>