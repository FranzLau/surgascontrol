<?php 
	require '../../config/conexion.php';
	
	$emprecfrm = $_POST['empChof'];
	$cantchfrm = $_POST['cantChof'];
    $llenosfrm = $_POST['llenosRec'];
	$vaciosfrm = $_POST['vaciosRec'];
	$prestfrm = $_POST['galonPres'];
	$vendifrm = $_POST['galonVend'];

	$carga = $llenosfrm + $vaciosfrm + $prestfrm + $vendifrm;
	
	if ($carga==$cantchfrm) {
		$rec = $con->query("INSERT INTO detallerepartidor (llega_lleno,llega_vacio,fierro_prestado,fierro_vendido,id_repartidor) VALUES ('$llenosfrm','$vaciosfrm','$prestfrm','$vendifrm','$emprecfrm')");
		if ($rec) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	}else{
		echo 0;
	}

	$con->close();
 ?>