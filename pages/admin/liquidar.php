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
		<!--*************************************************************************************-->
		<div class="row mt-5">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6 text-center text-lg-left d-md-flex">
								<h4 class="my-auto page-title"><i class="fas fa-user-clock mr-3"></i>Liquidación</h4>
							</div>
							<div class="col-sm-6">
								<ul class="nav nav-pills nav-pills-primary justify-content-lg-end justify-content-center" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="far fa-file mr-2"></i>Nuevo</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="far fa-file-alt mr-2"></i>Liquidaciones</a>
									</li>
								</ul>
							</div>
						</div><!--*** fin de fila 01-->
						<div class="row mt-3">
							<div class="col-sm-12">
								<div class="tab-content" id="pills-tabContent">
									<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
										<div class="row">
											<div class="col-sm-6">
												<form action="" id="formliquida">
													<!--*********Primera fila de formulario***************-->
													<div class="form-group row">
														<label for="chofliquida" class="col-form-label col-form-label-sm col-md-4">Conductor:</label>
														<div class="col-md-8">
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
													</div>
													<!--*********Fin Primera fila de formulario***************-->
													<!--*********Segunda fila de formulario***************-->
													<div class="form-group row">
														<label for="liqinicial" class="col-form-label col-form-label-sm col-md-4">Inicial</label>
														<div class="col-md-4">
															<input type="text" readonly class="form-control text-center form-control-sm" id="liqinicial" name="liqinicial">
														</div>
														<div class="col-sm-4">
															<small id="passwordHelpInline" class="text-muted">
																Balones.
															</small>
														</div>
													</div>
													<div class="form-group row">
														<label for="numrecliq" class="col-form-label col-form-label-sm col-md-4">Recargas</label>
														<div class="col-md-4">
															<input type="text" readonly class="form-control text-center form-control-sm" id="numrecliq" name="numrecliq">
														</div>
													</div>
													<div class="form-group row">
														<label for="saldoliq" class="col-form-label col-form-label-sm col-md-4">Saldo</label>
														<div class="col-md-4">
															<input type="text" readonly class="form-control text-center form-control-sm" id="saldoliq" name="saldoliq">
														</div>
													</div>
													<!--*********Fin Segunda fila de formulario***************-->
													<!--*********Tercera fila de formulario***************-->
													<hr>
													<div class="form-group row">
														<label for="gastoliq" class="col-form-label col-form-label-sm col-md-4">Gasto:</label>
														<div class="col-md-4">
															<input type="number" class="form-control text-center form-control-sm" id="gastoliq" name="gastoliq">
														</div>
														
													</div>
													<div class="row form-group">
														<label for="montoliq" class="col-form-label col-form-label-sm col-md-4">Monto:</label>
														<div class="col-md-4">
															<input type="text" readonly class="form-control text-center form-control-sm" id="montoliq" name="montoliq">
														</div>
														<div class="col-md-4">
															
														</div>
													</div>
													<!--*********Fin Tercera fila de formulario***************-->
												</form>
												<!--*********Fin de formulario***************-->
												<hr>
												<button class="btn btn-info-melody btn-sm w-100" id="calcLiquida"><i class="fas fa-calculator"></i> Calcular</button>
											</div>
											<div class="col-sm-6">
												<div class="row">
													<div class="col-md-12">
														<div class="card bg-navbar-primary">
															<div class="card-body">
																<div class="row">
																	<div class="col-sm-8 text-white d-flex">
																		<h4 class="my-auto" id="nomliqrepartidor"></h4>
																	</div>
																	<div class="col-sm-4 text-right">
																		<img src="../../assets/css/img/boyemp.png" alt="" height="50px">
																	</div>
																</div>
																<hr>
																<div class="row">
																	<div class="col-sm-12 text-center text-white">
																		<h1 id="liqmontotal"></h1>
																	</div>
																</div>
																<div class="row mt-4">
																	<div class="col-sm-6 text-white">
																		<p><?php echo $liqfech ?></p>
																	</div>
																	<div class="col-sm-6 text-right">
																		<img src="../../assets/css/img/logo2me.png" alt="" height="20px">
																	</div>
																</div>
																
															</div>
														</div>
													</div>
												</div>
												<div class="row mt-3">
													<div class="col-sm-12">
														<button type="button" class="btn btn-success-melody w-100" id="agregaliquido"><i class="fas fa-check" ></i> Liquidar Chofer</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
										<div id="tableLiquido" class="table-responsive"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--*************************************************************************************-->
		
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
			$('#chofliquida').change(function() {
				$.ajax({
					url: '../../procesos/liquidar/llenarformrepartidor.php',
					type: 'POST',
					data: "idrepartidor=" + $('#chofliquida').val(),
					success:function(r){
						
						datos = jQuery.parseJSON(r);
						$('#liqinicial').val(datos['cantidadinicial']);
						$('#numrecliq').val(datos['numrecargas']);
						$('#saldoliq').val(datos['preciorecargas']);
						$('#nomliqrepartidor').text(datos['repartidoremp']);

					}
				})
			});
    		
    	$('#calcLiquida').click(function() {
    		
				var saldo = $('#saldoliq').val();
				var gasto = $('#gastoliq').val();

				var total = parseFloat(saldo)- parseFloat(gasto);
		    $('#montoliq').val(total);
				$('#liqmontotal').text("S/ "+total);

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