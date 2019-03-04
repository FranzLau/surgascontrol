<?php 
	require '../../config/conexion.php';
	$idempfrm =$_POST['idemP'];
	$nmempfrm = $_POST['nomemP'];
	$apempfrm = $_POST['apemP'];
	$sxempfrm = $_POST['sexemP'];
	$fnempfrm = $_POST['fnemP'];
	$ndempfrm = $_POST['dniemP'];
	$drempfrm = $_POST['diremP'];
	$foempfrm = $_POST['telfemP'];
	$elempfrm = $_POST['emailemP'];
	$acempfrm = $_POST['accemP'];
	$psempfrm = $_POST['passemP'];
	$idcgefrm = $_POST['cargoemP'];
	$estademp = $_POST['selestadoE'];

	$upd = $con->query("UPDATE empleado SET nom_emp='$nmempfrm',
											ape_emp='$apempfrm',
											sexo_emp='$sxempfrm',
											fechnac_emp='$fnempfrm',
											numdoc_emp='$ndempfrm',
											dir_emp='$drempfrm',
											telf_emp='$foempfrm',
											email_emp='$elempfrm',
											acceso_emp='$acempfrm',
											password_emp='$psempfrm',
											cargo_emp='$idcgefrm',
											estado_emp='$estademp'
										WHERE id_emp= '$idempfrm' ");
	if ($upd) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	
$con->close();
 ?>