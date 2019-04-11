<?php 
  session_start();
  require '../../config/conexion.php';
  require '../../config/ventas.php';
  $obj=new ventas;
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
		<!--****************************************************************************-->
		<div class="row mt-4">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<!--Primera Fila------>
						<div class="row">
							<div class="col-sm-6 text-center text-lg-left d-md-flex">
								<h3 class="my-auto page-title"><i class="fas fa-truck-loading mr-3"></i>Recargas</h3>
							</div>
							<div class="col-sm-6">
								<ul class="nav nav-pills nav-pills-primary justify-content-lg-end justify-content-center" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active font-primary" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="far fa-file mr-2"></i>Nuevo</a>
									</li>
									<li class="nav-item">
										<a class="nav-link font-primary" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="far fa-file-alt mr-2"></i>Mis Recargas</a>
									</li>
								</ul>
							</div>
						</div>
						<!-------------------->
						<!--Segunda Fila------>
						<div class="row mt-3">
							<div class="col-sm-12">
								<div class="tab-content" id="pills-tabContent">
									<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
										<div class="row">
											<div class="col-sm-4">
												<form action="" id="formRecargas">
													<div class="row form-group">
														<label for="recargachofer" class="col-form-label col-form-label-sm col-sm-4">Chofer</label>
														<div class="col-md-8">
															<select name="recargachofer" id="recargachofer" class="form-control form-control-sm">
																<option value="">Elije uno..</option>
																<?php 
																	date_default_timezone_set('America/Lima');
																	$repfech = date('Y-m-d');
																	$prod = $con->query("SELECT * FROM repartidor WHERE fecha_re='$repfech' GROUP BY id_repartidor ");
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
													<!--**********************************-->
													<div class="row form-group">
														<label for="recargaopcion" class="col-form-label col-form-label-sm col-sm-4">Tipo</label>
														<div class="col-sm-8">
															<select name="recargaopcion" id="recargaopcion" class="form-control form-control-sm">
																<option value="S">Salida</option>
																<option value="E">Entrada</option>
															</select>
														</div>
													</div>
													<!--**********************************-->
													<div class="row form-group">
														<label for="recargaprod" class="col-form-label col-form-label-sm col-sm-4">Producto</label>
														<div class="col-sm-8">
															<select name="recargaprod" id="recargaprod" class="form-control form-control-sm">
																<option value="">Elije uno..</option>
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
													</div>
													<!--**********************************-->
													<div class="row form-group">
														<label for="recargaprec" class="col-form-label col-form-label-sm col-sm-4">Precios</label>
														<div class="col-sm-4">
															<input type="number" step="any" name="recargaprec" id="recargaprec" class="form-control form-control-sm" readonly>
														</div>
														<div class="col-sm-4">
															<!--<label for="recargaenv" class="col-form-label col-form-label-sm">P. Envase</label>-->
															<input type="number" step="any" name="recargaenv" id="recargaenv" class="form-control form-control-sm" readonly>
														</div>
													</div>
													<!--**********************************-->
													<div class="row form-group">
														<label for="recargaestado" class="col-form-label col-form-label-sm col-sm-4">Estado</label>
														<div class="col-md-8">
															<select name="recargaestado" id="recargaestado" class="form-control form-control-sm">
																<option value="G">Solo GAS</option>
																<option value="G/E">Gas + Envase</option>
																<option value="E">Solo Envase</option>
															</select>
														</div>
													</div>
													<!--**********************************-->
													<div class="row form-group">
														<label for="recargatipo" class="col-form-label col-form-label-sm col-sm-4">Balon</label>
														<div class="col-sm-8">
															<select name="recargatipo" id="recargatipo" class="form-control form-control-sm">
																<option value="N">Normal</option>
																<option value="P">Prestado</option>
																<option value="V">Vendido</option>
																<option value="R">Robado</option>
															</select>
														</div>
													</div>
													<!--**********************************-->
													<div class="row form-group">
														<label for="recargacant" class="col-form-label col-form-label-sm col-sm-4">Cantidad</label>
														<div class="col-sm-4">
															<input type="number" name="recargacant" id="recargacant" class="form-control form-control-sm">
														</div>
														<div class="col-sm-4">
															<!--<label for="recargapfin" class="col-form-label col-form-label-sm">Sub Total</label>-->
															<input type="number" step="any" name="recargapfin" id="recargapfin" class="form-control form-control-sm" readonly>
														</div>
													</div>
												</form>
												<hr><!--**********************************-->
												<div class="row">
													<div class="col-sm-12 text-right">
														<button class="btn btn-sm btn-danger-melody" id="btnClearRecarga"><i class="fas fa-trash mr-2"></i>Limpiar Lista</button>
														<button class="btn btn-sm btn-info-melody" id="btnAddRecargar"><i class="fas fa-plus mr-2"></i>Agregar</button>
													</div>
												</div>
											</div>
											<div class="col-sm-8">
												<div id="TablaRecargaTempLoad"></div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
										<div id="tableRecargas" class="table-responsive"></div>
									</div>
								</div>
							</div>
						</div>
						<!-------------------->
					</div>
				</div>
			</div>
		</div>
		


		<!--****************************************************************************-->
		
		<!--****************************************************************************************-->
		<!--****************************************************************************************>-->
	</div>
	<?php include('scripts.php'); ?>
	<script type="text/javascript">
      $(document).ready(function() {
				$('#TablaRecargaTempLoad').load('../componentes/tableRecargaTemp.php');
        $('#tableRecargas').load('../componentes/tablerecargas.php');
      });
  </script>
	<!--****************************************************************************************>-->
  <script>
	  jQuery(document).ready(function() {
	    
			$('#recargaprod').change(function() {
	      $.ajax({
	        url: '../../procesos/ventas/llenarformproducto.php',
	        type: 'POST',
	        data: "idproducto=" + $('#recargaprod').val(),
	        success:function(r){
	          datos = jQuery.parseJSON(r);
	          $('#recargaprec').val(datos['precio_domiciliophp']);
						$('#recargaenv').val(datos['precio_fierrophp']);
						
						var estado = $('#recargaestado').val();
						var precio = $('#recargaprec').val();
						var fierro = $('#recargaenv').val();

						//igual q ventas
						if (estado=="G") {
							$('#recargapfin').val(precio);
						}else if(estado=="G/E"){
							var total = parseFloat(precio)+ parseFloat(fierro);
							$('#recargapfin').val(total);
						}else {
							$('#recargapfin').val(fierro);
						}
	        }
	      })
			});
			$('#recargaestado').change(function(){
				var estado = $('#recargaestado').val();
				var precio = $('#recargaprec').val();
				var fierro = $('#recargaenv').val();

				//igual q ventas
				if (estado=="G") {
					$('#recargapfin').val(precio);
				}else if(estado=="G/E"){
					var total = parseFloat(precio)+ parseFloat(fierro);
					$('#recargapfin').val(total);
				}else {
					$('#recargapfin').val(fierro);
				}
			});
	  });
	</script>
	<!--****************************************************************************************>-->
	<script>
	$(document).ready(function(){
		$('#btnAddRecargar').click(function(){
			vacios = validarFrmVacio('formRecargas');
			if(vacios > 0){
				alertify.error("Debe llenar todos los campos!");
				return false;
			}
			datos = $('#formRecargas').serialize();
			$.ajax({
				url: '../../procesos/recarga/agregarecargatemp.php',
				type: 'POST',
				data: datos,
				success:function(r){
					if (r==2) {
						alertify.error('No hay producto');
					}else if(r==1){
						alertify.error('Pocos Productos en Stock');
					}else{
						$('#TablaRecargaTempLoad').load('../componentes/tableRecargaTemp.php');
					}
				}
			})
		});
		$('#btnClearRecarga').click(function(){
			$.ajax({
				url: '../../procesos/recarga/limpiarecargatemp.php',
				success:function(r){
					$('#TablaRecargaTempLoad').load('../componentes/tableRecargaTemp.php');
				}
			})
		});
	})
	</script>
	<!--****************************************************************************************>-->
	<script>
	function quitarRec(index){
		$.ajax({
			url: '../../procesos/recarga/quitarecarga.php',
			type: 'POST',
			data: "ind=" + index,
			success:function(r){
				$('#TablaRecargaTempLoad').load('../componentes/tableRecargaTemp.php');
				alertify.success("Se quito el producto :)");
			}
		})
	}
	function creaRecargas(){
		$.ajax({
			url: '../../procesos/recarga/crearecarga.php',
			success:function(r){
				if (r > 0) {
					$('#TablaRecargaTempLoad').load('../componentes/tableRecargaTemp.php');
					$('#tableRecargas').load('../componentes/tablerecargas.php');
					$('#formRecargas')[0].reset();
					alertify.alert("Recarga creada con Exito, consulte sus recargas");
				}else if(r == 0){
					alertify.alert("No hay lista de productos");
				}else{
					alertify.error("No se Pudo crear la Recarga");
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