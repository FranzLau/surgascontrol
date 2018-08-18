<?php 
	require '../../config/conexion.php';
	require '../../config/ventas.php';

	$obj = new ventas();
	echo json_encode($obj->obtenDatosProducto($_POST['idproducto']));

 ?>