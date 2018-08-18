<?php 
	require '../../config/conexion.php';
	require '../../config/ventas.php';
	
	$obj = new ventas();
	$idfer = $_POST['idcho'];
	$sql = $con->query("SELECT llega_lleno,llega_vacio,fierro_prestado,fierro_vendido FROM detallerepartidor WHERE id_repartidor='$idfer'");
	
	while ($ver = $sql->fetch_row()) {
	  echo '<tr>';
		echo '<td>'.$ver[0].'</td>';
		echo '<td>'.$ver[1].'</td>';
		echo '<td>'.$ver[2].'</td>';
		echo '<td>'.$ver[3].'</td>';
	  echo '<tr>';
	}
 ?>