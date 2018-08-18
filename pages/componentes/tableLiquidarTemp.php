<?php 
	session_start();
	require '../../config/ventas.php';
	$obj = new ventas();
 ?>
<div class="row mt-3">
	<div class="col-sm-8">
		<div class="card border-0">
			<div class="card-body table-responsive">
				<table class="table table-hover table-sm">
				  <thead>
				    <tr>
				      <th scope="col">Tipo</th>
				      <th scope="col">Cant.</th>
				      <th scope="col">Producto</th>
				      <th scope="col">Prec.</th>
				      <th scope="col">Desc.</th>
				      <th scope="col">Gasto</th>
				      <th scope="col">SubTotal</th>
				      <th scope="col">Quitar</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
					  	$total = 0; //esta variable guarda los totales de las venta
					  	 
					  	if(isset($_SESSION['tablaLiquidaTemp'])):
					  		$i=0;
					  		foreach (@$_SESSION['tablaLiquidaTemp'] as $key) {
					  			$li= explode("||", @$key);	
					?>
				    <tr>
				      <th scope="row"><?php echo $li[7] ?></th>
				      <td><?php echo $li[3] ?></td>
				      <td><?php echo $li[1] ?></td>
				      <td><?php echo $li[4] ?></td>
				      <td><?php echo $li[5] ?></td>
				      <td><?php echo $li[8] ?></td>
				      <td><?php echo $subt=(($li[4]-$li[5])*$li[3])-$li[8] ?></td>
				      <td>
				      	<button class="btn-danger btn-sm btn" onclick="quitarArtic('<?php echo $i; ?>')"><i class="fas fa-times"></i></button>
				      </td>
				    </tr>
				    <?php
						    	$total = $total + $subt;
						    	$i++; 
						      	$repartidor = $li[2];
				    		}
						endif;
					?>
				  </tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="card">
			<div class="card-header bg-light d-flex">
				<h5 class="m-auto">S/. <?php echo $total; ?></h5>
			</div>
			<div class="card-body">
				<div class="form-group row">
					<label for="repartidorliqui" class="col-sm-12 col-form-label col-form-label-sm" id="choferliquida"></label>
				</div>
				<button class="btn btn-success w-100" onclick="crearLiquida()">Liquidar <i class="fas fa-truck fa-xs ml-2"></i></button>
			</div>
		</div>
	</div>
</div>
<script>
  $(document).ready(function() {
    nombre = "<?php echo $obj->nombreRepartidor(@$repartidor) ?>";
    $('#choferliquida').text("Chofer : "+nombre);
  });
</script>