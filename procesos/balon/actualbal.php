<?php 
	require '../../config/conexion.php';
	$idbalfrm =$_POST['idbalE'];
	$nombalfrm = $_POST['nombalE'];
	$desbalfrm = $_POST['descbalE'];
	$znbalfrm = $_POST['zonalpBale'];
	$dmbalfrm = $_POST['domiciliopBale'];
	$fierrfrm = $_POST['fierropBale'];
	$prebalfrm = $_POST['presbalE'];

	$upd = $con->query("UPDATE producto SET nom_producto='$nombalfrm',
											desc_producto='$desbalfrm',
											precio_zonal='$znbalfrm',
											precio_domicilio='$dmbalfrm',
											precio_fierro ='$fierrfrm',
											tipo_producto='$prebalfrm' 
										WHERE id_producto= '$idbalfrm' ");
	if ($upd) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	
$con->close();
 ?>