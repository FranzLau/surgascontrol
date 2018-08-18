<?php 
	require '../../config/conexion.php';
	require '../../config/ventas.php';

	$obj = new ventas();

	$idventa = $_GET['idventa'];
	$sql = $con->query("SELECT fecha_venta,precio_venta,id_cliente,cantidad,id_producto,tipo_venta FROM detalleventa WHERE id_detalleventa= '$idventa' ");
	$result = $sql->fetch_row();
	

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>TicketVenta</title>
 	<style type="text/css">
 		@page {
 			margin-top: 0.3em;
 			margin-left: 0.6em;
 			margin-right: 0.6em;
 			margin-bottom: 0.3em;
 		}
 		body {
 			font-size: xx-small;
 			padding: 0;
 		}
 	</style>
 </head>
 <body>
 	
 	<h2 class="text-center">SURGAS</h2>
 	<p>El calor de tu ciudad</p>
 	<hr>
 	<p>Folio : <?php echo $idventa; ?></p>
 	<p>Fecha : <?php echo $result[0]; ?> </p>
 	<p>Cliente : <?php echo $obj->nombreCliente($result[2]) ?></p>
 	<hr>
 	<table>
 		<thead>
 			<tr>
	 			<td>Can.</td>
	 			<td>Balon</td>
	 			<td>Tip.</td>
	 			<td>Pre.</td>
	 		</tr>
 		</thead>
 		<tbody>
 			<?php 
				$sqlv = $con->query("SELECT fecha_venta,precio_venta,id_cliente,cantidad,id_producto,tipo_venta FROM detalleventa WHERE id_detalleventa= '$idventa' ");

				$total=0;
				while($verv=$sqlv->fetch_row()):
			 ?>
 			<tr>
 				<td><?php echo $verv[3]; ?></td>
 				<td><?php echo $obj->nombreProducto($verv[4]) ?></td>
 				<td><?php echo $verv[5] ?></td>
 				<td><?php echo $verv[1]; ?></td>
 			</tr>
 			<?php
				$total=$total+($verv[3]*$verv[1]); 
				endwhile; 
			?>
 		</tbody>
 	</table>
 	<hr>
 	<h2>Total: <?php echo "S/. ".$total; ?></h2>
 </body>
 </html>