<?php 
  session_start();
  require '../../config/conexion.php';
  require '../../config/ventas.php';
  $objc= new ventas();
  if (isset($_SESSION['loggedIN'])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	 <?php include('head.php'); ?>
</head>
<body style="background: #F2F4F4">
	
  <?php include('navbar.php'); ?>
  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
	<div class="container">
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
    <div class="row mt-4">
      <div class="col-md-12">
        <h4 class="font-primary">Sección de <strong>COMPRAS</strong></h4>
      </div>
    </div>
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
    <div class="row mt-3">
      <div class="col-md-12">
        <nav>
          <div class="nav nav-tabs pt-2 px-2" style="background:#E8EAF6; border: 1px solid #D6DBDF" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active font-primary" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-file"></i> Registro de Compra</a>
            <a class="nav-item nav-link font-primary" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-file-alt"></i> Lista de Compras</a>
          </div>
        </nav>
        <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="card border-top-0">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    <form action="" id="formComprar">
                      <div class="row">
                        <div class="col-md-4" style="border-right: 1px solid #f2f4f4; border-left: 1px solid #f2f4f4"><!--<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label for="provCompra" class="col-form-label col-form-label-sm">Proveedor:</label>
                              <select class="form-control form-control-sm" id="provCompra" name="provCompra">
                                <option selected value="">Elije uno</option>
                                  <?php $prov = $con->query("SELECT * FROM proveedor");
                                    while ($row = $prov->fetch_assoc()) {
                                      echo "<option value='".$row['id_proveedor']."' ";
                                      echo ">";
                                      echo $row['razon_social'];
                                      echo "</option>";
                                    }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-sm-12">
                              <label for="compCompra" class="col-form-label-sm col-form-label">Compra</label>
                              <select name="compCompra" id="compCompra" class="form-control form-control-sm">
                                <option selected value="G">Normal (GAS)</option>
                                <option value="G/E">GAS + Envase</option>
                                <option value="E">Envase</option>
                              </select>
                            </div>
                            <!--<div class="form-group col-md-5">
                              <label for="tipoCompra" class="col-form-label col-form-label-sm">Tipo</label>
                              <select name="tipoCompra" id="tipoCompra" class="form-control form-control-sm">
                                
                                <option selected value="">Normal</option>
                                <option value="">Prestado</option>
                              </select>
                            </div>-->
                          </div>
                        </div>
                        <div class="col-md-3"><!--<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label for="prodCompra" class="col-form-label col-form-label-sm">Artículo</label>
                              <select class="form-control form-control-sm" id="prodCompra" name="prodCompra">
                                <option value="">Elije uno</option>
                                <?php 
                                  $prod = $con->query("SELECT * FROM producto");
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
                              <label for="llenoCompra" class="col-form-label col-form-label-sm">Llenos</label>
                              <input readonly="" type="number" class="form-control form-control-sm" id="llenoCompra" name="llenoCompra">
                            </div>
                            <div class="form-group col-sm-6">
                              <label for="vacioCompra" class="col-form-label-sm col-form-label">Vacios</label>
                              <input readonly="" type="number" class="form-control form-control-sm" id="vacioCompra" name="vacioCompra">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-5"><!--<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="cantCompra" class="col-form-label col-form-label-sm">Cantidad</label>
                              <input type="number" class="form-control form-control-sm" id="cantCompra" name="cantCompra">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="descCompra" class="col-form-label col-form-label-sm">Descuento</label>
                              <input type="number" step="any" class="form-control form-control-sm" id="descCompra" name="descCompra">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-sm-4">
                              <label for="precZonal" class="col-form-label col-form-label-sm">Precio Zonal</label>
                              <input readonly="" step="any" type="number" class="form-control form-control-sm" id="precZonal" name="precZonal">
                            </div>
                            <div class="form-group col-sm-4">
                              <label for="precEnvase" class="col-form-label-sm col-form-label">Precio Envase</label>
                              <input type="number" step="any" readonly="" class="form-control form-control-sm" id="precEnvase" name="precEnvase">
                            </div>
                            <div class="form-group col-sm-4">
                              <label for="precMonto" class="col-form-label-sm col-form-label">Monto</label>
                              <input type="number" step="any" class="form-control form-control-sm" id="precMonto" name="precMonto" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-2 d-flex">
                    <div class="m-auto">
                      <div class="row">
                        <div class="col-md-12">
                          <button type="button" class="btn btn-success" id="agregaCompra"><i class="fas fa-plus"></i></button>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <button class="btn btn-danger" id="limpiaCompra"><i class="fas fa-trash"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--**************************************-->
                <div id="TablaCompraTempLoad"></div>
                <!--**************************************-->
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="card border-top-0">
              <div class="card-body">
                <div id="tableCompra"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
		
    
	</div>
  <?php include('scripts.php'); ?>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#TablaCompraTempLoad').load("../componentes/tablaCompraTemp.php");
      $('#tableCompra').load('../componentes/tablecompra.php');
    });
  </script>
  <script type="text/javascript">
      $(document).ready(function() {
        $('#prodCompra').change(function() {
    			$.ajax({
    				url: '../../procesos/ventas/llenarformproducto.php',
    				type: 'POST',
    				data: "idproducto=" + $('#prodCompra').val(),
    				success:function(r){
    					
    					datos = jQuery.parseJSON(r);
    					$('#llenoCompra').val(datos['stock_llenosphp']);
    					$('#vacioCompra').val(datos['stock_vaciosphp']);
    					$('#precZonal').val(datos['precio_zonalphp']);
    					$('#precEnvase').val(datos['precio_fierrophp']);

    					var compra = $('#compCompra').val();
    			    var precio = $('#precZonal').val();
					    var envase = $('#precEnvase').val();

		    			if (compra=="G") {
								$('#precMonto').val(precio);
		    			}else if(compra=="G/E"){
		    				var total = parseFloat(precio)+ parseFloat(envase);
		    				$('#precMonto').val(total);
		    			}else {
								$('#precMonto').val(envase);
		    			}
    				}
    			})
    		});

        $('#compCompra').change(function() {
    			var compra = $('#compCompra').val();
    			var precio = $('#precZonal').val();
					var envase = $('#precEnvase').val();

    			if (compra=="G") {
    				$('#precMonto').val(precio);
    			}else if(compra=="G/E"){
    				var total = parseFloat(precio)+ parseFloat(envase);
    				$('#precMonto').val(total);
    			}else {
    				$('#precMonto').val(envase);
    			}
        });
        
        $('#agregaCompra').click(function() {
    			vacios = validarFrmVacio('formComprar');
          if(vacios > 0){
            alertify.error("Debe llenar todos los campos!");
            return false;
          }
          datos = $('#formComprar').serialize();
          $.ajax({
            url: '../../procesos/compra/agregacompratemp.php',
            type: 'POST',
            data: datos,
            success:function(r){
              if (r==2) {
                alertify.error('No hay producto');
              }else if(r==1){
                alertify.error('Pocos Prodcutos en Stock');
              }else{
                $('#TablaCompraTempLoad').load("../componentes/tablaCompraTemp.php");
              }
            }
          })
        });

        $('#limpiaCompra').click(function() {
		    	$.ajax({
		    		url: '../../procesos/compra/limpiarcompratemp.php',
		    		
		    		success:function(r){
		    			$('#TablaCompraTempLoad').load("../componentes/tablaCompraTemp.php");
		    		}
		    	})
		    });
      });
  </script>
  <script>
  function quitarCompra(index){
    $.ajax({
      url: '../../procesos/compra/quitarcompra.php',
      type: 'POST',
      data: "ind=" + index,
      success:function(r){
        $('#TablaCompraTempLoad').load("../componentes/tablaCompraTemp.php");
        alertify.success("Se quito el producto");
      }
    })
  }
  function crearCompra(){
    $.ajax({
      url: '../../procesos/compra/crearcompra.php',
      success:function(r){
        if (r > 0) {
          $('#TablaCompraTempLoad').load("../componentes/tablaCompraTemp.php");
          $('#tableCompra').load('../componentes/tablecompra.php');
          $('#formComprar')[0].reset();
          alertify.alert("Compra creada con Exito, consulte sus Compras");
        }else if(r == 0){
          alertify.alert("No hay lista de Compra");
        }else{
          alertify.error("No se Pudo crear la Compra");
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