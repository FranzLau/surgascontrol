<?php 
	require '../../config/conexion.php';
	$idcatfrm =$_POST['idcatC'];
	$nomcatfrm = $_POST['nomcategC'];
	$descatfrm = $_POST['descategC'];
	

	$upd = $con->query("UPDATE categoria SET nom_categoria='$nomcatfrm',
											desc_categoria='$descatfrm' 
										WHERE id_categoria= '$idcatfrm' ");
	if ($upd) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	
$con->close();
 ?>