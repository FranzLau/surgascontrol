<?php 
	require '../../config/conexion.php';
	require '../../config/ventas.php';

	$obj = new ventas();

	$idventa = $_GET['idventa'];
	$sql = $con->query("SELECT fecha_venta, precio_venta, id_cliente, cantidad, id_producto, tipo_venta, descuento_ven FROM detalleventa WHERE id_detalleventa= '$idventa' ");
	$result = $sql->fetch_row();
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Reporte Venta</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/ico" href="../../assets/css/img/log.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
 </head>
 <body>
 	<div class="container-fluid">
 		<div class="row">
 			<div class="text-left">
 				<img src="../../assets/css/img/logofull.png" alt="" height="80px">
 			</div>
 			<div class="text-right">
 				<h3>SURGAS</h3>
 				<br>
 				<span class="text-muted">Telf. (052) 247070</span>
 				<br>
 				<span class="text-muted">Urb. Los Delfines B-04</span>
 				<br>
 				<span class="text-muted">Tacna</span>
 			</div>
 		</div>
 		<hr>
 		<div class="row">
 			<div class="text-left">
 				<h5>Reporte a :</h5>
 				<?php echo $obj->nombreCliente($result[2]) ?>
 				<br>
 				<span class="text-muted">Venta Zonal</span>
 			</div>
 			<div class="text-right">
 				<h5>Detalles</h5>
 				<strong>Fecha :</strong>
 				<span class="text-muted"><?php echo $result[0]; ?></span>
 				<br>
 				<strong>Folio :</strong>
 				<span class="text-muted"><?php echo $idventa; ?></span>
 			</div>
 		</div>
 		<div class="row">
 			<div class="col-sm-12">
 				<table class="table">
				  <thead style="background: #5659A6;color: #fff;">
				    <tr>
							<th>Cantidad</th>
				      <th>Balon</th>
				      <th>Precio</th>
				      <th>Desc.</th>
				      <th>Tipo</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
				  		$sqlv = $con->query("SELECT fecha_venta,precio_venta,id_cliente,cantidad,id_producto,tipo_venta,descuento_ven FROM detalleventa WHERE id_detalleventa= '$idventa' ");

				  		$total=0;
				  		while($verv=$sqlv->fetch_row()):
				  	 ?>
				    <tr>
							<td><?php echo $verv[3]; ?></td>
				      <td><?php echo $obj->nombreProducto($verv[4]) ?></td>
				      <td><?php echo $verv[1]; ?></td>
				      <td><?php echo $verv[6]; ?></td>
				      <td><?php echo $verv[5]; ?></td>
				    </tr>
					<?php
						$total=$total+(($verv[1]-$verv[6])*$verv[3]); 
						endwhile; 
					?>
				  </tbody>
				  <tfoot>
				  	<tr style="background:#ECECEC">
				  		<td>Total : <?php echo "S/. ".$total; ?></td>
				  	</tr>
				  </tfoot>
				</table>
 			</div>
 		</div>
 	</div>
 </body>
 </html>