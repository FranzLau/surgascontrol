<?php 
	require '../../config/conexion.php';
	$idgtosfrm =$_POST['idGto'];
	$dcgtosfrm = $_POST['GtoDesc'];
	$prgtosfrm = $_POST['GtoPrec'];
	$tigtosfrm = $_POST['gastoTi'];

	$upd = $con->query("UPDATE gasto SET precio_gasto='$prgtosfrm',
											desc_gasto='$dcgtosfrm',
											id_tipogasto='$tigtosfrm' 
										WHERE id_gasto= '$idgtosfrm' ");
	if ($upd) {
		echo json_encode(array('error' => false));
	}else{
		echo json_encode(array('error' => true));
	}
	$con->close();
 ?>