<?php 
	require '../../config/conexion.php';
	$idtgafrm =$_POST['idTga'];
	$nomtgafrm = $_POST['nomTga'];
	$destgafrm = $_POST['descTga'];

	$upd = $con->query("UPDATE tipogasto SET nom_tipogasto='$nomtgafrm',
											desc_tipogasto='$destgafrm' 
										WHERE id_tipogasto= '$idtgafrm' ");
	if ($upd) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	
$con->close();
 ?>