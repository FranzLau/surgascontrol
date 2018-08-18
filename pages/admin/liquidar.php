<?php 
  session_start();
  require '../../config/conexion.php';
  require '../../config/ventas.php';
  $obj = new ventas();
  if (isset($_SESSION['loggedIN'])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('head.php'); ?>
</head>
<body style="background: #F2F4F4">
	<?php include('navbar.php'); ?>
	<div class="container">
		<div class="row mt-5">
          <div class="col-sm-6 text-center text-lg-left d-md-flex">
            <h4 class="font-primary my-auto">Liquidar <strong>Chofer</strong></h4>
          </div>
          <div class="col-sm-6 justify-content-center justify-content-lg-end d-flex">
            <p class="my-auto font-primary"><a href="repartidor.php">Repartidores</a> <i class="fas fa-chevron-right fa-xs"></i> <a href="recarga.php">Recargar</a> <i class="fas fa-chevron-right fa-xs"></i> Liquidar <i class="fas fa-chevron-right fa-xs"></i> <a href="misliquidaciones.php">Mis Liquidaciones</a></p>
          </div>
        </div>
		<div class="row mt-3">
			<div class="col-sm-12">
				<div class="card border-0">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<form action="" id="frmLiquidaChofer">
									<div class="row">
										<div class="col-sm-8">
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="repartLiq" class="col-form-label col-form-label-sm">Repartidor :</label>
													<select class="form-control form-control-sm" id="repartLiq" name="repartLiq">
													  	<option value="">Elije Chofer</option>
													  	<?php
													  		date_default_timezone_set('America/Lima');
													      	$fechnow = date('Y-m-d'); 
													  		$prod = $con->query("SELECT * FROM repartidor WHERE fecha_re='$fechnow' ");
											                while ($row = $prod->fetch_assoc()) {
											                  echo "<option value='".$row['id_repartidor']."' ";
											                  echo ">";
											                  echo $obj->nombreEmpleado($row['id_emp']);
											                  echo "</option>";
											                }
										            	?>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="tvenLiq" class="col-form-label col-form-label-sm">Tipo :</label>
													<select class="form-control form-control-sm" id="tvenLiq" name="tvenLiq">
													  	<option value="G" selected>Normal (GAS)</option>
												      	<option value="G/E">GAS + Envase</option>
												      	<option value="E">Envase</option>
													</select>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-4">
													<label for="produLiq" class="col-form-label col-form-label-sm">Producto :</label>
													<select class="form-control form-control-sm" id="produLiq" name="produLiq">
													  	<option value="">Elije producto</option>
													  	<?php $prod = $con->query("SELECT * FROM producto");
											                while ($row = $prod->fetch_assoc()) {
											                  echo "<option value='".$row['id_producto']."' ";
											                  echo ">";
											                  echo $row['nom_producto'];
											                  echo "</option>";
											                }
										            	?>
													</select>
												</div>
												
												<div class="form-group col-md-2">
													<label for="cantLiq" class="col-form-label col-form-label-sm">Cantidad</label>
													<input class="form-control form-control-sm" type="number" id="cantLiq" name="cantLiq">
												</div>
												<div class="form-group col-sm-2">
													<label for="desctoLiq" class="col-form-label col-form-label-sm">Descuento ( s/ )</label>
													<input class="form-control form-control-sm" type="number" id="desctoLiq" name="desctoLiq">
												</div>
												<div class="form-group col-sm-2">
													<label for="gastoLiq" class="col-form-label col-form-label-sm">Gasto ( s/ )</label>
													<input type="number" class="form-control form-control-sm" id="gastoLiq" name="gastoLiq">
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-row">
												<div class="form-group col-sm-4">
													<label for="balvacLiq" class="col-form-label col-form-label-sm">B. Vacios</label>
													<input class="form-control form-control-sm" readonly type="number" id="balvacLiq" name="balvacLiq">
												</div>
												<div class="form-group col-sm-4">
													<label for="balpresLiq" class="col-form-label col-form-label-sm">B. Prestado</label>
													<input class="form-control form-control-sm" readonly type="number" id="balpresLiq" name="balpresLiq">
												</div>
												<div class="form-group col-sm-4">
													<label for="balvenLiq" class="col-form-label col-form-label-sm">B. Vendido</label>
													<input class="form-control form-control-sm" readonly type="number" id="balvenLiq" name="balvenLiq">
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-sm-4">
													<label for="precdomLiq" class="col-form-label col-form-label-sm">Domicilio:</label>
													<input class="form-control form-control-sm" readonly type="number" id="precdomLiq" name="precdomLiq">
												</div>
												<div class="form-group col-sm-4">
													<label for="precenvLiq" class="col-form-label col-form-label-sm">Envase:</label>
													<input class="form-control form-control-sm" readonly type="number" id="precenvLiq" name="precenvLiq">
												</div>
												<div class="form-group col-sm-4">
													<label for="prectotLiq" class="col-form-label col-form-label-sm">Precio:</label>
													<input class="form-control form-control-sm is-valid" readonly type="number" id="prectotLiq" name="prectotLiq">
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-12">
								<button type="button" class="btn btn-warning" id="btnAddBalon"><i class="fas fa-shopping-cart fa-xs"></i> Agregar</button>
								<button type="button" class="btn btn-danger" id="btnCleanLiqui"><i class="fas fa-trash fa-xs"></i> Limpiar</button>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<div id="TablaLiquidarTempLoad"></div>

		<footer class="footer mt-3">
	      <div class="d-sm-flex justify-content-sm-between justify-content-center">
	        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
	          Copyright <i class="far fa-copyright"></i>2018 
	          <a href="#" target="_blank">SURGAS</a>. Todos los derechos reservados
	        </span>
	        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
	          Hecho a mano <i class="fas fa-code text-danger"></i> por Franz Cruz <i class="fas fa-laptop text-danger"></i>
	        </span>
	      </div>
	    </footer>
	</div>
	<?php include('scripts.php'); ?>
	<script>
		$(document).ready(function() {
			$('#TablaLiquidarTempLoad').load("../componentes/tableLiquidarTemp.php");
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#produLiq').change(function() {
    			$.ajax({
    				url: '../../procesos/ventas/llenarformproducto.php',
    				type: 'POST',
    				data: "idproducto=" + $('#produLiq').val(),
    				success:function(r){
    					
    					datos = jQuery.parseJSON(r);
    					$('#precdomLiq').val(datos['precio_domiciliophp']);
    					$('#precenvLiq').val(datos['precio_fierrophp']);

    					var tven = $('#tvenLiq').val();
		    			var pdom = $('#precdomLiq').val();
		    			var pfie = $('#precenvLiq').val();

		    			if (tven=="G") {
		    				$('#prectotLiq').val(pdom);
		    			}else if(tven=="G/E"){
		    				var total = parseFloat(pdom)+ parseFloat(pfie);
		    				$('#prectotLiq').val(total);
		    			}else {
		    				$('#prectotLiq').val(pfie);
		    			}
    				}
    			})
    		});
    		$('#tvenLiq').change(function() {
    			var tven = $('#tvenLiq').val();
    			var pdom = $('#precdomLiq').val();
    			var pfie = $('#precenvLiq').val();

    			if (tven=="G") {
    				$('#prectotLiq').val(pdom);
    			}else if(tven=="G/E"){
    				var total = parseFloat(pdom)+ parseFloat(pfie);
    				$('#prectotLiq').val(total);
    			}else {
    				$('#prectotLiq').val(pfie);
    			}
    		});
    		$('#repartLiq').change(function() {
    			$.ajax({
    				url: '../../procesos/liquidar/llenarformrepartidor.php',
    				type: 'POST',
    				data: "idrepartidor=" + $('#repartLiq').val(),
    				success:function(r){
    					datos = jQuery.parseJSON(r);
    					$('#balvacLiq').val(datos['sumvacphp']);
    					$('#balpresLiq').val(datos['sumprephp']);
    					$('#balvenLiq').val(datos['sumvenphp']);
    				}
    			})
    		});
    		$('#btnAddBalon').click(function() {
    			vacios = validarFrmVacio('frmLiquidaChofer');
				if(vacios > 0){
					alertify.error("Debe llenar todos los campos!");
					return false;
				}
				datos = $('#frmLiquidaChofer').serialize();
				$.ajax({
					url: '../../procesos/liquidar/agregabalontemp.php',
					type: 'POST',
					data: datos,
					success:function(r){
						$('#TablaLiquidarTempLoad').load("../componentes/tableLiquidarTemp.php");
					}
				})
			});
			$('#btnCleanLiqui').click(function() {
		    	$.ajax({
		    		url: '../../procesos/liquidar/limpiarbalontemp.php',
		    		
		    		success:function(r){
		    			$('#TablaLiquidarTempLoad').load("../componentes/tableLiquidarTemp.php");
		    		}
		    	})
		    	
		    });
		});
	</script>
	<script>
		function quitarArtic(index){
    		$.ajax({
    			url: '../../procesos/liquidar/quitarbalon.php',
    			type: 'POST',
    			data: "ind=" + index,
    			success:function(r){
    				$('#TablaLiquidarTempLoad').load("../componentes/tableLiquidarTemp.php");
    				alertify.success("Se quito el producto");
    			}
    		})
    	}
    	function crearLiquida(){
    		$.ajax({
    			url: '../../procesos/liquidar/crearliquida.php',
    			success:function(r){
    				if (r > 0) {
    					$('#TablaLiquidarTempLoad').load("../componentes/tableLiquidarTemp.php");
    					$('#frmLiquidaChofer')[0].reset();
    					alertify.alert("Chofer Liquidado con Exito");
    				}else if(r == 0){
    					alertify.alert("No hay lista de Productos");
    				}else{
    					alertify.error("No se pudo Liquidar");
    				}
    			}
    		})
    	}
	</script>
</body>
</html>
<?php 
  }else{
    header('Location: ../../');
  }
?>