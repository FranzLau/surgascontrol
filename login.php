<?php
session_start();

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	
	require 'config/conexion.php';
	$con->set_charset('utf8');

	$usuariolg = $con->real_escape_string($_POST['userphp']);
	$passwordlg = $con->real_escape_string($_POST['passphp']);

	if ($newsql = $con->prepare("SELECT id_emp,nom_emp,sexo_emp,numdoc_emp,acceso_emp,password_emp FROM empleado WHERE numdoc_emp = ? AND password_emp=?")) {

		$newsql->bind_param('ss',$usuariolg,$passwordlg);
		$newsql->execute();

		$resultado = $newsql->get_result();
		if ($resultado->num_rows == 1) {
			$datos = $resultado->fetch_assoc();
			$_SESSION['loggedIN'] = $datos;
			
			echo json_encode(array('error' => false,'tipo' => $datos['acceso_emp']));
		}else{
			echo json_encode(array('error' => true));
		}
		$newsql->close();
	}
}

$con->close();
?>