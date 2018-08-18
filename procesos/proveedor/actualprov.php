<?php 
	require '../../config/conexion.php';
	$idprovfrm =$_POST['idproV'];
	$rsprovfrm = $_POST['nomproV'];
	$scprovfrm = $_POST['secproV'];
	$tdprovfrm = $_POST['tdproV'];
	$ndprovfrm = $_POST['ndocproV'];
	$dirprovfrm = $_POST['dirproV'];
	$fonprovfrm = $_POST['fonproV'];
	$mailprovfrm = $_POST['emailproV'];
	$linkprovfrm = $_POST['urlproV'];

	$upd = $con->query("UPDATE proveedor SET razon_social='$rsprovfrm',
											sector_comercial='$scprovfrm',
											tipodoc_proveedor='$tdprovfrm',
											numdoc_proveedor='$ndprovfrm',
											dir_proveedor='$dirprovfrm',
											telf_proveedor='$fonprovfrm',
											email_proveedor='$mailprovfrm',
											url_proveedor='$linkprovfrm' 
										WHERE id_proveedor= '$idprovfrm' ");
	if ($upd) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	
$con->close();
 ?>