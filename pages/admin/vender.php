<?php 
  session_start();
  require '../../config/conexion.php';
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
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6 text-center text-lg-left d-md-flex">
								<h4 class="my-auto page-title"><i class="fas fa-shopping-cart mr-3"></i>SECCIÓN DE <strong>VENTAS</strong></h4>
							</div>
							<div class="col-sm-6">
								<ul class="nav nav-pills nav-pills-primary justify-content-lg-end justify-content-center" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-file mr-2"></i>Nuevo</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-file-alt mr-2"></i>Mis Ventas</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-sm-12">
								<div class="tab-content" id="pills-tabContent">
									<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
										<div class="row">
											<div class="col-sm-4">
												<form action="" id="frmVentasProducto">
													<div class="row form-group">
														<label for="cliVen" class="col-form-label col-form-label-sm col-sm-4">Cliente :</label>
														<div class="col-sm-8">
															<select class="form-control form-control-sm" id="cliVen" name="cliVen">
																<option value="">Elije cliente</option>
																<option value="Público General">Publico General</option>
																<?php $prod = $con->query("SELECT * FROM cliente");
																	while ($row = $prod->fetch_assoc()) {
																		echo "<option value='".$row['id_cliente']."' ";
																		echo ">";
																		echo $row['nom_cliente'];
																		echo " ";
																		echo $row['ape_cliente'];
																		echo "</option>";
																	}
																?>
															</select>
														</div>
													</div><!--xxxxxxxxxxxxxxxxxxxxxxxx-->
													<div class="row form-group">
														<label for="tipoVen" class="col-form-label-sm col-form-label col-sm-4">Venta</label>
														<div class="col-sm-8">
															<select name="fierroVen" id="fierroVen" class="form-control form-control-sm">
																<option selected value="G">Normal (GAS)</option>
																<option value="G/E">GAS + Envase</option>
																<option value="E">Envase</option>
															</select>
														</div>
													</div><!--xxxxxxxxxxxxxxxxxxxxxxxx-->
													<div class="row form-group">
														<label for="producVen" class="col-form-label col-form-label-sm col-sm-4">Producto :</label>
														<div class="col-sm-8">
															<select class="form-control form-control-sm" id="producVen" name="producVen">
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
													</div><!--xxxxxxxxxxxxxxxxxxxxxxxx-->
													<div class="row form-group">
														<label for="cantVen" class="col-form-label col-form-label-sm col-sm-4">Cantidad</label>
														<div class="col-sm-4">
															<input step="any" type="number" class="form-control form-control-sm" id="cantVen" name="cantVen">
														</div>
													</div><!--xxxxxxxxxxxxxxxxxxxxxxxx-->
													<div class="row form-group">
														<label for="descuVen" class="col-form-label col-form-label-sm col-sm-4">Descuento</label>
														<div class="col-sm-4">
															<input step="any" type="number" class="form-control form-control-sm" id="descuVen" name="descuVen" placeholder="s/.">
														</div>
													</div><!--xxxxxxxxxxxxxxxxxxxxxxxx-->
												</form>
												<hr>
												<div class="row">
													<div class="col-sm-12 text-right">
														<button class="btn btn-danger-melody btn-sm" id="btnLimpiarVen"><i class="fas fa-trash mr-2"></i>Limpiar Lista</button>
														<button class="btn btn-info-melody btn-sm" id="btnAgregarVen"><i class="fas fa-plus mr-2"></i>Agregar</button>
													</div>
												</div>
											</div><!-- Aqui termina col-4 panel 01-->
											<div class="col-sm-8">
												<div id="TablaVentasTempLoad"></div>
											</div><!-- Aqui termina col-8 panel 01-->
										</div>
									</div><!--xxxxx FIN de Panel 01 xxxxxxxx-->
									<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
										<div id="tableVentas" class="table-responsive"></div>
									</div><!--xxxxx FIN de Panel 02 xxxxxxxx-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<!--******************************************************************************-->
		
		<!--********************************************************
		<form action="" >
			<div class="row">
				
				<div class="col-sm-3" style="border-right: 1px solid #f2f4f4; border-left: 1px solid #f2f4f4">
					
					<div class="form-row">
						<div class="form-group col-sm-6">
							<label for="stockVen" class="col-form-label col-form-label-sm">Llenos</label>
							<input readonly="" type="number" class="form-control form-control-sm" id="stockllVen" name="stockllVen">
						</div>
						<div class="form-group col-sm-6">
							<label for="stockvacVen" class="col-form-label-sm col-form-label">Vacios</label>
							<input readonly="" type="number" class="form-control form-control-sm" id="stockvacVen" name="stockvacVen">
						</div>
					</div>
				</div>
				<div class="col-sm-5">
					
					<div class="form-row">
						<div class="form-group col-sm-4">
								<label for="precioVen" class="col-form-label col-form-label-sm">Precio Zonal</label>
								<input readonly="" step="any" type="number" class="form-control form-control-sm" id="precioVenz" name="precioVenz">
						</div>
						<div class="form-group col-sm-4">
							<label for="precioFie" class="col-form-label-sm col-form-label">Precio Envase</label>
							<input type="number" step="any" readonly="" class="form-control form-control-sm" id="precioFie" name="precioFie">
						</div>
						<div class="form-group col-sm-4">
							<label for="" class="col-form-label-sm col-form-label">Monto</label>
							<input type="number" step="any" class="form-control form-control-sm" id="preVenta" name="preVenta" readonly>
						</div>
					</div>
				</div>
				
			</div>
		</form>********************-->
	</div>
	 <?php include('scripts.php'); ?>
    <script>
      $(document).ready(function() {
        $('#TablaVentasTempLoad').load("../componentes/tableVentasTemp.php");
				$('#tableVentas').load("../componentes/tablevendo.php");
      });
    </script>
    <script>
    	$(document).ready(function() {
    		//$('#producVen').change(function() {
    		//	$.ajax({
    		//		url: '../../procesos/ventas/llenarformproducto.php',
    		//		type: 'POST',
    		//		data: "idproducto=" + $('#producVen').val(),
    		//		success:function(r){
    		//			
    		//			datos = jQuery.parseJSON(r);
    		//			$('#stockllVen').val(datos['stock_llenosphp']);
    		//			$('#stockvacVen').val(datos['stock_vaciosphp']);
    		//			$('#precioVenz').val(datos['precio_zonalphp']);
    		//			$('#precioFie').val(datos['precio_fierrophp']);

    		//			var tven = $('#fierroVen').val();
		    //			var pzon = $('#precioVenz').val();
				//			var pfie = $('#precioFie').val();

		    //			if (tven=="G") {
				//				$('#preVenta').val(pzon);
		    //			}else if(tven=="G/E"){
		    //				var total = parseFloat(pzon)+ parseFloat(pfie);
		    //				$('#preVenta').val(total);
		    //			}else {
				//				$('#preVenta').val(pfie);
		    //			}
    		//		}
    		//	})
				//});
				
    		$('#btnAgregarVen').click(function() {
    			vacios = validarFrmVacio('frmVentasProducto');
					if(vacios > 0){
						alertify.error("Debe llenar todos los campos!");
						return false;
					}
					datos = $('#frmVentasProducto').serialize();
					$.ajax({
						url: '../../procesos/ventas/agregaproductotemp.php',
						type: 'POST',
						data: datos,
						success:function(r){
							if (r==2) {
								alertify.error('No hay producto');
							}else if(r==1){
								alertify.error('Pocos Prodcutos en Stock');
							}else{
								$('#TablaVentasTempLoad').load("../componentes/tableVentasTemp.php");
							}
						}
					})
				});

		    $('#btnLimpiarVen').click(function() {
		    	$.ajax({
		    		url: '../../procesos/ventas/limpiarventastemp.php',
		    		
		    		success:function(r){
		    			$('#TablaVentasTempLoad').load("../componentes/tableVentasTemp.php");
		    		}
		    	})
		    });
    	});
    </script>
    <script>
    	function quitarP(index){
    		$.ajax({
    			url: '../../procesos/ventas/quitarproducto.php',
    			type: 'POST',
    			data: "ind=" + index,
    			success:function(r){
    				$('#TablaVentasTempLoad').load("../componentes/tableVentasTemp.php");
    				alertify.success("Se quito el producto :)");
    			}
    		})
    	}
    	function crearVentas(){
    		$.ajax({
    			url: '../../procesos/ventas/crearventa.php',
    			success:function(r){
    				if (r > 0) {
    					$('#TablaVentasTempLoad').load("../componentes/tableVentasTemp.php");
    					$('#frmVentasProducto')[0].reset();
							$('#tableVentas').load("../componentes/tablevendo.php");
    					alertify.alert("Venta creada con Exito, consulte las Ventas Hechas");
    				}else if(r == 0){
    					alertify.alert("No hay lista de Venta");
    				}else{
    					alertify.error("No se Pudo crear la Venta");
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