<?php 
	require '../../config/conexion.php';
	$idpresfrm =$_POST['idpreP'];
	$nompresfrm = $_POST['nompresP'];
	$despresfrm = $_POST['descpresP'];
	

	$upd = $con->query("UPDATE presentacion SET nom_presentacion='$nompresfrm',
											desc_presentacion='$despresfrm' 
										WHERE id_presentacion= '$idpresfrm' ");
	if ($upd) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	
$con->close();
 ?>