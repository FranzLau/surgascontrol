<?php 
	require '../../config/conexion.php';
	require '../../config/crud.php';
	
	$obj = new crud();
	echo $obj->deleteCargo($_POST['idcarg']);

 ?>