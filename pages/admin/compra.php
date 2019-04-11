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
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6 text-center text-lg-left d-lg-flex">
                <h4 class="my-lg-auto page-title"><i class="fas fa-shopping-basket mr-3"></i>Sección de <strong>Compras</strong></h4>
              </div>
              <div class="col-md-6">
                <ul class="nav nav-pills nav-pills-primary justify-content-lg-end justify-content-center" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active font-primary" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="far fa-file mr-2"></i>Nuevo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link font-primary" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="far fa-file-alt mr-2"></i>Mis Compras</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-12">
                <div class="tab-content" id="pills-tabContent"><!--Inicia TABCOntent-->
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                      <div class="col-sm-4">
                        <form action="" id="formComprar">
                          <div class="form-group row">
                            <label for="provCompra" class="col-form-label col-form-label-sm col-sm-4">Proveedor:</label>
                            <div class="col-md-8">
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
                          </div><!--<<<<<<<<<<<<<<<<<-->
                          <div class="row form-group">
                            <label for="prodCompra" class="col-form-label col-form-label-sm col-sm-4">Artículo</label>
                            <div class="col-md-8">
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
                          </div><!--<<<<<<<<<<<<<<<<<-->
                          <div class=" form-group row">
                            <label for="compCompra" class="col-form-label-sm col-form-label col-sm-4">Compra</label>
                            <div class="col-sm-8">
                              <select name="compCompra" id="compCompra" class="form-control form-control-sm">
                                <option selected value="G">Normal (GAS)</option>
                                <option value="G/E">GAS + Envase</option>
                                <option value="E">Envase</option>
                              </select>
                            </div>
                          </div><!--<<<<<<<<<<<<<<<<<-->
                          <div class="row form-group">
                            <label for="cantCompra" class="col-form-label col-form-label-sm col-sm-4">Cantidad</label>
                            <div class="col-md-4">
                              <input type="number" class="form-control form-control-sm" id="cantCompra" name="cantCompra">
                            </div>
                          </div><!--<<<<<<<<<<<<<<<<<-->
                          <!--<div class="row form-group">
                            <label for="descCompra" class="col-form-label col-form-label-sm col-sm-4">Descuento</label>
                            <div class="col-sm-4">
                              <input type="number" step="any" class="form-control form-control-sm" id="descCompra" name="descCompra" placeholder="s/.">
                            </div>
                          </div><!--<<<<<<<<<<<<<<<<<-->
                        </form>
                        <hr>
                        <div class="row">
                          <div class="col-sm-12 text-right">
                            <button class="btn btn-danger-melody btn-sm" id="limpiaCompra"><i class="fas fa-trash mr-2"></i>Limpiar Lista</button>
                            <button type="button" class="btn btn-info-melody btn-sm" id="agregaCompra"><i class="fas fa-plus mr-2"></i>Agregar</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div id="TablaCompraTempLoad"></div>
                      </div>
                    </div>
                    <!--**************************************-->
                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <!--**************************************-->
                    <div id="tableCompra"></div>
                  </div>
                </div><!--FIN TABCOntent-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
    <form action="" >
      <div class="row">
        <div class="col-md-3">
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
        <div class="col-md-5">
          
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
    </form><<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
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
        //$('#prodCompra').change(function() {
    		//	$.ajax({
    		//		url: '../../procesos/ventas/llenarformproducto.php',
    		//		type: 'POST',
    		//		data: "idproducto=" + $('#prodCompra').val(),
    		//		success:function(r){
    					
    		//			datos = jQuery.parseJSON(r);
    		//			$('#llenoCompra').val(datos['stock_llenosphp']);
    		//			$('#vacioCompra').val(datos['stock_vaciosphp']);
    		//			$('#precZonal').val(datos['precio_zonalphp']);
    		//			$('#precEnvase').val(datos['precio_fierrophp']);

    		//			var compra = $('#compCompra').val();
    		//	    var precio = $('#precZonal').val();
				//	    var envase = $('#precEnvase').val();

		    //			if (compra=="G") {
				//				$('#precMonto').val(precio);
		    //			}else if(compra=="G/E"){
		    //				var total = parseFloat(precio)+ parseFloat(envase);
		    //				$('#precMonto').val(total);
		    //			}else {
				//				$('#precMonto').val(envase);
		    //			}
    		//		}
    		//	})
    	  //});
        
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