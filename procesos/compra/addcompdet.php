<?php 
	session_start();
	require '../../config/conexion.php';
	
	$pccompfrm = $_POST['pcomComp'];
	$pvcompfrm = $_POST['pventaComp'];
	$stcompfrm = $_POST['stockComp'];
	date_default_timezone_set('America/Lima'); 
	$fechnow = date('Y-m-d');
	$idprodfrm = $_POST['produComp'];
	$idempfrm =  $_SESSION['loggedIN']['id_emp'];
	$idprovfrm = $_POST['provComp'];

	$sqlp = $con->query("SELECT stock_llenos,stock_vacios,tipo_producto FROM producto WHERE id_producto = '$idprodfrm' ");
	$produti = $sqlp->fetch_row();
	
	if ($produti[2]=="Balon") {
		if ($produti[1]==0) {
			echo 1;
		}else{
			if ($stcompfrm <= $produti[1] ) {
				$sql=$con->query("INSERT INTO detalleingreso (precio_compra,precio_venta,stock_llenoinicial,fecha_in,id_producto,id_emp,id_proveedor) VALUES ('$pccompfrm','$pvcompfrm','$stcompfrm','$fechnow','$idprodfrm','$idempfrm','$idprovfrm')");
				if ($sql) {
					$llenos = $produti[0] + $stcompfrm;
					$vacios = $produti[1] - $stcompfrm;
					$actual = $con->query("UPDATE producto SET stock_llenos = '$llenos', stock_vacios = '$vacios' WHERE id_producto = '$idprodfrm'");
					echo json_encode(array('error' => false));
				}else{
					echo json_encode(array('error' => true));
				}
			}else{
				echo 0;
			}
		}
	}else {
		$sql=$con->query("INSERT INTO detalleingreso (precio_compra,precio_venta,stock_llenoinicial,fecha_in,id_producto,id_emp,id_proveedor) VALUES ('$pccompfrm','$pvcompfrm','$stcompfrm','$fechnow','$idprodfrm','$idempfrm','$idprovfrm')");
		if ($sql) {
			$llenos = $produti[0] + $stcompfrm;
			$actual = $con->query("UPDATE producto SET stock_llenos = '$llenos' WHERE id_producto = '$idprodfrm'");
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	}	
	$con->close();
 ?>