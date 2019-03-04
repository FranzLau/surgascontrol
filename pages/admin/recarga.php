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
		<div class="row mt-5">
			<div class="col-sm-12 text-center text-lg-left d-md-flex">
				<h4 class="font-primary my-auto">REGISTRO DE <strong>RECARGAS</strong></h4>
			</div>
		</div>
		<hr>
		<!--****************************************************************************-->
		<div class="row mt-3">
			<div class="col-sm-12">
				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active font-primary" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-file"></i> Nueva Recarga</a>
						<a class="nav-item nav-link font-primary" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-file-alt"></i> Mis Recargas</a>
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<div class="row">
							<div class="col-sm-12">
								<div class="card border-top-0">
									<div class="card-body">
										<div class="row">
											<div class="col-md-10">
												<form action="" id="formRecargas">
													<div class="row">
														<!--**********************************************************-->
														
														<div class="col-md-4" style="border-right: 1px solid #f2f4f4; border-left: 1px solid #f2f4f4">
															<!--**********************************************************-->
															<div class="form-row">
																<div class="col-md-12 form-group">
																	<label for="recargachofer" class="col-form-label col-form-label-sm">Chofer</label>
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
															<!--**********************************************************-->
															<div class="form-row">
																<div class="form-group col-sm-12">
																	<label for="recargaopcion" class="col-form-label col-form-label-sm">Tipo</label>
																	<select name="recargaopcion" id="recargaopcion" class="form-control form-control-sm">
																		<option value="S">Salida</option>
																		<option value="E">Entrada</option>
																	</select>
																</div>
																
															</div>
														</div>
														<!--**********************************************************-->
														<div class="col-md-8">
															<div class="form-row">
																<div class="col-sm-4 form-group">
																	<label for="recargaprod" class="col-form-label col-form-label-sm">Producto</label>
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
																<div class="form-group col-md-3">
																	<label for="recargaestado" class="col-form-label col-form-label-sm">Estado</label>
																	<select name="recargaestado" id="recargaestado" class="form-control form-control-sm">
																		<option value="G">Solo GAS</option>
																		<option value="G/E">Gas + Envase</option>
																		<option value="E">Solo Envase</option>
																	</select>
																</div>

																<div class="col-sm-3 form-group">
																	<label for="recargatipo" class="col-form-label col-form-label-sm">Balon</label>
																	<select name="recargatipo" id="recargatipo" class="form-control form-control-sm">
																		<option value="N">Normal</option>
																		<option value="P">Prestado</option>
																		<option value="V">Vendido</option>
																		<option value="R">Robado</option>
																	</select>
																</div>
																<div class="col-sm-2 form-group">
																	<label for="recargacant" class="col-form-label col-form-label-sm">Cantidad</label>
																	<input type="number" name="recargacant" id="recargacant" class="form-control form-control-sm">
																</div>
															</div>
															<div class="form row">
																<div class="col-sm-4 form-group">
																	<label for="recargaprec" class="col-form-label col-form-label-sm">Precio</label>
																	<input type="number" step="any" name="recargaprec" id="recargaprec" class="form-control form-control-sm" readonly>
																</div>
																<div class="col-sm-4 form-group">
																	<label for="recargaenv" class="col-form-label col-form-label-sm">P. Envase</label>
																	<input type="number" step="any" name="recargaenv" id="recargaenv" class="form-control form-control-sm" readonly>
																</div>
																<div class="col-sm-4 form-group">
																	<label for="recargapfin" class="col-form-label col-form-label-sm">Sub Total</label>
																	<input type="number" step="any" name="recargapfin" id="recargapfin" class="form-control form-control-sm" readonly>
																</div>
																
															</div>
														</div>
														<!--**********************************************************-->
													</div>
												</form>
											</div>
											<div class="col-md-2 d-flex">
												<div class="m-auto">
													<div class="row">
														<div class="col-md-12">
															<button class="btn btn-success" id="btnAddRecargar"><i class="fas fa-plus"></i></button>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-12">
															<button class="btn btn-danger" id="btnClearRecarga"><i class="fas fa-trash"></i></button>
														</div>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<!--****************************************************************************************-->
						<div class="row mt-3">
							<div class="col-md-12">
								<div id="TablaRecargaTempLoad"></div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						<div class="row">
              <div class="col-sm-12">
                <div class="card border-top-0">
									<div class="card-body">
										<div id="tableRecargas" class="table-responsive"></div>
									</div>
								</div>
              </div>
            </div>
					</div>
				</div>
			</div>
		</div>
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