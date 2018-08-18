<?php 
	require '../../config/conexion.php';
	$nomempfrm = $_POST['nomemp'];
	$apeempfrm = $_POST['apeemp'];
	$sexempfrm = $_POST['sexemp'];
	$fechnacfrm = $_POST['fechnac'];
	$dniempfrm = $_POST['dniemp'];
	$dirempfrm = $_POST['diremp'];
	$telfempfrm = $_POST['telfemp'];
	$emailempfrm = $_POST['emailemp'];
	$accempfrm = $_POST['accemp'];
	$passempfrm = $_POST['passemp'];
	$cargoempfrm = $_POST['cargoemp'];

	$val = $con->query("SELECT numdoc_emp FROM empleado WHERE numdoc_emp LIKE '$dniempfrm' ");
	$emple = $val->fetch_row();
	if ($emple[0]==$dniempfrm) {
		echo json_encode(array('error' => true));
	}else{
		$reg = $con->query("INSERT INTO empleado (nom_emp,ape_emp,sexo_emp,fechnac_emp,numdoc_emp,dir_emp,telf_emp,email_emp,acceso_emp,password_emp,id_cargo) VALUES ('$nomempfrm','$apeempfrm','$sexempfrm','$fechnacfrm','$dniempfrm','$dirempfrm','$telfempfrm','$emailempfrm','$accempfrm','$passempfrm','$cargoempfrm')");
		if ($reg) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	}

$con->close();
 ?>