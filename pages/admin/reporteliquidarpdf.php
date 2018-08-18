<?php 
	require '../../config/conexion.php';
	require '../../config/ventas.php';
	$obj = new ventas();
	$idliquida = $_GET['idliqi'];
	$sql=$con->query("SELECT fecha_li,cantidad_li,tipo_balon,precio_li,descuento_li,gasto_li,id_emp,id_repartidor,id_producto FROM liquidar WHERE id_liquidar='$idliquida'");
	$result = $sql->fetch_row();
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Reporte Chofer</title>
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
 				<h1>REPORTE</h1>
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
 				<h5>Reporte a</h5>
 				<?php echo $obj->nombreRepartidor($result[7]) ?>
 				<br>
 				<span class="text-muted">Chofer / Repartidor</span>
 			</div>
 			<div class="text-right">
 				<h5>Detalles</h5>
 				<strong>Fecha :</strong>
 				<span class="text-muted"><?php echo $result[0] ?></span>
 				<br>
 				<strong>Folio :</strong>
 				<span class="text-muted"><?php echo $idliquida ?></span>
 			</div>
 		</div>
 		<div class="row">
 			<div class="col-sm-12">
 				<table class="table">
				  <thead style="background: #5659A6; color: #fff;">
				    <tr>
				      <td>Cant</td>
				      <td>Producto</td>
				      <td>Precio Und.</td>
				      <td>Tipo</td>
				      <td>Sub Total</td>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php  
					  	$sqlre=$con->query("SELECT fecha_li,cantidad_li,tipo_balon,precio_li,descuento_li,gasto_li,id_emp,id_repartidor,id_producto FROM liquidar WHERE id_liquidar='$idliquida'");
					  	$total=0;
					  	$gasto=0;
					  	$descuento=0;
		  				while($verli=$sqlre->fetch_row()):
				  	?>
				    <tr>
				      <td><?php echo $verli[1] ?></td>
				      <td><?php echo $obj->nombreProducto($verli[8]) ?></td>
				      <td><?php echo $verli[3] ?></td>
				      <td><?php echo $verli[2] ?></td>
				      <td><?php echo $sub=(($verli[3]-$verli[4])*$verli[1])-$verli[5] ?></td>
				    </tr>
				    <?php
				    	$descuento = $descuento + $verli[4] ;
				    	$gasto = $gasto+$verli[5];
						$total=$total+$sub; 
						endwhile; 
					?>
				  </tbody>
				</table>
 			</div>
 		</div>
 		<div class="row">
 			<div class="text-left">
 				<ul>
 					<li>Descuento Total : <?php echo $descuento ?></li>
 					<li>Gasto Total : <?php echo $gasto ?></li>
 					<li>Monto Total : <?php echo $total ?></li>
 				</ul>
 			</div>
 			<div class="text-right">
 				Reporte finalizado, Gracias.
 			</div>
 		</div>
 	</div>
 	<script src="../../assets/js/jquery.3.2.1.min.js"></script>
	<script src="../../assets/js/popper.min.js" ></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
 </body>
 </html>