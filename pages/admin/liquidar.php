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
			<div class="col-sm-12 text-center text-lg-left d-md-flex">
				<h4 class="font-primary my-auto">LIQUIDAR <strong>CHOFER</strong></h4>
			</div>
		</div>
		<hr>
		<!--***********************************************************************************************-->
		<div class="row mt-3">
			<div class="col-sm-12">
				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active font-primary" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-file"></i> Nueva Liquidación</a>
						<a class="nav-item nav-link font-primary" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-file-alt"></i> Mis Liquidaciones</a>
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<!--*********Primera parte***************-->
						<div class="card border-top-0">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-8">
										<form action="">
											<!--*********Primera fila de formulario***************-->
											<div class="form-group row">
												<label for="chofliquida" class="col-form-label col-form-label-sm col-md-2">Conductor:</label>
												<div class="col-md-6">
													<select name="chofliquida" id="chofliquida" class="form-control form-control-sm">
														<option value="">Elije uno..</option>
														<?php 
															date_default_timezone_set('America/Lima');
															$liqfech = date('Y-m-d');
															$prod = $con->query("SELECT * FROM repartidor WHERE fecha_re='$liqfech' GROUP BY id_repartidor ");
															while ($row = $prod->fetch_assoc()) {
																echo "<option value='".$row['id_repartidor']."' ";
																echo ">";
																echo $obj->nombreEmpleado($row['id_emp']);
																
																echo "</option>";
															}
														?>
													</select>
												</div>
												<div class="col-md-4">
													<button class="btn btn-warning btn-sm w-100" id="btnliquidaver"><i class="fas fa-eye"></i> Verificar</button>
												</div>
											</div>
											<!--*********Fin Primera fila de formulario***************-->
											<!--*********Segunda fila de formulario***************-->
											<div class="form-group row">
												<label for="" class="col-form-label col-form-label-sm col-md-2">Inicial</label>
												<div class="col-md-3">
													<input type="text" readonly class="form-control text-center form-control-sm">
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-form-label col-form-label-sm col-md-2">Recargas</label>
												<div class="col-md-3">
													<input type="text" readonly class="form-control text-center form-control-sm">
												</div>
											</div>
											<div class="form-group row">
												<label for="" class="col-form-label col-form-label-sm col-md-2">Saldo</label>
												<div class="col-md-3">
													<input type="text" readonly class="form-control text-center form-control-sm">
												</div>
											</div>
											<!--*********Fin Segunda fila de formulario***************-->
											<!--*********Tercera fila de formulario***************-->
											<hr>
											<div class="form-group row">
												<label for="" class="col-form-label col-form-label-sm col-md-2">Descuento:</label>
												<div class="col-md-3">
													<input type="number" class="form-control text-center form-control-sm">
												</div>
												<div class="col-md-3">
													<input type="text" readonly class="form-control text-center form-control-sm">
												</div>
												<div class="col-md-4">
													<button class="btn btn-info btn-sm w-100"><i class="fas fa-calculator"></i> Calcular</button>
												</div>
											</div>
											<!--*********Fin Tercera fila de formulario***************-->
										</form>
										<!--*********Fin de formulario***************-->
									</div>
									<div class="col-sm-4">
										<div class="card mt-3">
											<h1 class="card-header bg-dark text-white text-center">S/.</h1>
											<div class="card-body">
												<h5 class="card-title">Chofer: </h5>
												<p class="card-text">Fecha : <?php echo $liqfech ?></p>
												
												<button class="btn btn-success w-100"><i class="fas fa-check"></i> Liquidar Chofer</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--*****FIN de la primera****************-->
					</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						<div class="row">
							<div class="col-sm-12">
								<div class="card border-top-0">
									<div class="card-body">
										<div id="tableLiquido" class="table-responsive"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--***********************************************************************************************-->
	</div>
	<?php include('scripts.php'); ?>
	<!--***********************************************************************************************-->
	<script>
		$(document).ready(function() {
			$('#tableLiquido').load("../componentes/tableliquidos.php");
		});
	</script>
	<!--***********************************************************************************************-->
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
	
</body>
</html>
<?php 
  }else{
    header('Location: ../../');
  }
?>