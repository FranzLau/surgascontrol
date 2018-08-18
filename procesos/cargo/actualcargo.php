<?php 
	require '../../config/conexion.php';
	$idcgfrm =$_POST['idCargoC'];
	$nomcgfrm = $_POST['nomcgC'];
	$descgfrm = $_POST['descgC'];
	

	$upd = $con->query("UPDATE cargo SET nom_cargo='$nomcgfrm',
											desc_cargo='$descgfrm'
										WHERE id_cargo= '$idcgfrm' ");
	if ($upd) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	
$con->close();
 ?>