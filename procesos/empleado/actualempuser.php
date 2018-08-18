<?php 
	require '../../config/conexion.php';
	$iduserfrm =$_POST['idUser'];
	$fnuserfrm = $_POST['nacUser'];
	$druserfrm = $_POST['direcUser'];
	$fouserfrm = $_POST['fonUser'];
	$eluserfrm = $_POST['emailUser'];
	

	$upd = $con->query("UPDATE empleado SET fechnac_emp='$fnuserfrm',
											dir_emp='$druserfrm',
											telf_emp='$fouserfrm',
											email_emp='$eluserfrm'
										WHERE id_emp= '$iduserfrm' ");
	if ($upd) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	
$con->close();
 ?>