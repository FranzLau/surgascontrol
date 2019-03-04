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
			<div class="col-sm-12 text-center text-lg-left d-md-flex">
				<h4 class="font-primary my-auto">REGISTRO DE <strong>VENTAS</strong></h4>
			</div>
		</div>
		<!--******************************************************************************-->
		<div class="row mt-3">
			<div class="col-sm-12">
				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active font-primary" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-file"></i> Nueva Venta</a>
						<a class="nav-item nav-link font-primary" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-file-alt"></i> Mis Ventas</a>
					</div>
				</nav>
				<!--******************************************************************************-->
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<!--******************************************************************************-->
						<div class="row">
							<div class="col-md-12">
								<div class="card border-top-0">
									<div class="card-body">
										<div class="row">
											<div class="col-sm-10">
												<form action="" id="frmVentasProducto">
													<div class="row">
														<div class="col-sm-4" style="border-right: 1px solid #f2f4f4; border-left: 1px solid #f2f4f4">
															<div class="form-row">
																<div class="form-group col-sm-12">
																	<label for="cliVen" class="col-form-label col-form-label-sm">Cliente :</label>
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
															</div>
															<div class="form-row">
																<div class="form-group col-sm-7">
																	<label for="tipoVen" class="col-form-label-sm col-form-label">Venta</label>
																	<select name="fierroVen" id="fierroVen" class="form-control form-control-sm">
																		<option selected value="G">Normal (GAS)</option>
																		<option value="G/E">GAS + Envase</option>
																		<option value="E">Envase</option>
																	</select>
																</div>
																<div class="form-group col-sm-5">
																	<label for="" class="col-form-label-sm col-form-label">Monto</label>
																	<input type="number" step="any" class="form-control form-control-sm" id="preVenta" name="preVenta" readonly>
																</div>
															</div>
														</div><!--****************************-->
														<div class="col-sm-4" style="border-right: 1px solid #f2f4f4; border-left: 1px solid #f2f4f4">
															<div class="form-row">
																<div class="form-group col-sm-12">
																	<label for="producVen" class="col-form-label col-form-label-sm">Producto :</label>
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
															</div>
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
														</div><!--****************************-->
														<div class="col-sm-4">
															<div class="form-row">
																<div class="form-group col-sm-6">
																	<label for="cantVen" class="col-form-label col-form-label-sm">Cantidad</label>
																	<input step="any" type="number" class="form-control form-control-sm" id="cantVen" name="cantVen">
																</div>
																<div class="form-group col-sm-6">
																	<label for="descuVen" class="col-form-label col-form-label-sm">Descuento</label>
																	<input step="any" type="number" class="form-control form-control-sm" id="descuVen" name="descuVen">
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col-sm-6">
																		<label for="precioVen" class="col-form-label col-form-label-sm">Precio Zonal</label>
																		<input readonly="" step="any" type="number" class="form-control form-control-sm" id="precioVenz" name="precioVenz">
																</div>
																<div class="form-group col-sm-6">
																	<label for="precioFie" class="col-form-label-sm col-form-label">Precio Envase</label>
																	<input type="number" step="any" readonly="" class="form-control form-control-sm" id="precioFie" name="precioFie">
																</div>
															</div>
														</div><!--****************************-->
														
													</div>
												</form>
											</div>
											<div class="col-sm-2 d-flex">
												<div class="m-auto">
													<div class="row">
														<div class="col-md-12">
															<button class="btn btn-success" id="btnAgregarVen"><i class="fas fa-plus"></i></button>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-12">
															<button class="btn btn-danger" id="btnLimpiarVen"><i class="fas fa-trash"></i></button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--******************************************************************************-->
										<div id="TablaVentasTempLoad"></div>
										<!--******************************************************************************-->
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						<!--******************************************************************************-->
						<div class="row">
							<div class="col-sm-12">
								<div class="card border-top-0">
									<div class="card-body">
										<div id="tableVentas" class="table-responsive"></div>
									</div>
								</div>
							</div>
						</div>
						<!--******************************************************************************-->
					</div>
				</div>
			</div>
		</div>
		<!--******************************************************************************-->
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
    		$('#producVen').change(function() {
    			$.ajax({
    				url: '../../procesos/ventas/llenarformproducto.php',
    				type: 'POST',
    				data: "idproducto=" + $('#producVen').val(),
    				success:function(r){
    					
    					datos = jQuery.parseJSON(r);
    					$('#stockllVen').val(datos['stock_llenosphp']);
    					$('#stockvacVen').val(datos['stock_vaciosphp']);
    					$('#precioVenz').val(datos['precio_zonalphp']);
    					$('#precioFie').val(datos['precio_fierrophp']);

    					var tven = $('#fierroVen').val();
		    			var pzon = $('#precioVenz').val();
							var pfie = $('#precioFie').val();

		    			if (tven=="G") {
								$('#preVenta').val(pzon);
		    			}else if(tven=="G/E"){
		    				var total = parseFloat(pzon)+ parseFloat(pfie);
		    				$('#preVenta').val(total);
		    			}else {
								$('#preVenta').val(pfie);
		    			}
    				}
    			})

    		});

    		$('#fierroVen').change(function() {
    			var tven = $('#fierroVen').val();
    			var pzon = $('#precioVenz').val();
					var pfie = $('#precioFie').val();

    			if (tven=="G") {
    				$('#preVenta').val(pzon);
    			}else if(tven=="G/E"){
    				var total = parseFloat(pzon)+ parseFloat(pfie);
    				$('#preVenta').val(total);
    			}else {
    				$('#preVenta').val(pfie);
    			}
    		});

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