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
 
	<div class="container">
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
    <div class="row mt-5">
			<div class="col-sm-12 text-center text-lg-left d-md-flex">
				<h4 class="font-primary my-auto">REGISTRO DE <strong>COMPRAS</strong></h4>
			</div>
		</div>
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
    <div class="row mt-3">
      <div class="col-md-12">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active font-primary" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-file"></i> Nueva Compra</a>
            <a class="nav-item nav-link font-primary" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-file-alt"></i> Mis Compras</a>
          </div>
        </nav>
        <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="card border-top-0">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    <form action="" id="frmComprar">
                      <div class="row">
                        <div class="col-md-4" style="border-right: 1px solid #f2f4f4; border-left: 1px solid #f2f4f4"><!--<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label for="provComp" class="col-form-label col-form-label-sm">Proveedor:</label>
                              <select class="form-control form-control-sm" id="provComp" name="provComp">
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
                            <div class="form-group col-sm-7">
                              <label for="" class="col-form-label-sm col-form-label">Compra</label>
                              <select name="" id="" class="form-control form-control-sm">
                                <option selected value="G">Normal (GAS)</option>
                                <option value="G/E">GAS + Envase</option>
                                <option value="E">Envase</option>
                              </select>
                            </div>
                            <div class="form-group col-md-5">
                              <label for="" class="col-form-label col-form-label-sm">Tipo</label>
                              <select name="" id="" class="form-control form-control-sm">
                                <option value="">Elije una...</option>
                                <option value="">Normal</option>
                                <option value="">Prestado</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3"><!--<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label for="produComp" class="col-form-label col-form-label-sm">Artículo</label>
                              <select class="form-control form-control-sm" id="produComp" name="produComp">
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
                              <label for="" class="col-form-label col-form-label-sm">Llenos</label>
                              <input readonly="" type="number" class="form-control form-control-sm" id="" name="">
                            </div>
                            <div class="form-group col-sm-6">
                              <label for="" class="col-form-label-sm col-form-label">Vacios</label>
                              <input readonly="" type="number" class="form-control form-control-sm" id="" name="">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-5"><!--<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="stockComp" class="col-form-label col-form-label-sm">Cantidad</label>
                              <input type="number" class="form-control form-control-sm" id="stockComp" name="stockComp">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="" class="col-form-label col-form-label-sm">Descuento</label>
                              <input type="number" step="any" class="form-control form-control-sm" id="" name="">
                            </div>
                            
                          </div>
                          <div class="form-row">
                            <div class="form-group col-sm-4">
                              <label for="" class="col-form-label col-form-label-sm">Precio Zonal</label>
                              <input readonly="" step="any" type="number" class="form-control form-control-sm" id="" name="">
                            </div>
                            <div class="form-group col-sm-4">
                              <label for="" class="col-form-label-sm col-form-label">Precio Envase</label>
                              <input type="number" step="any" readonly="" class="form-control form-control-sm" id="" name="">
                            </div>
                            <div class="form-group col-sm-4">
                              <label for="" class="col-form-label-sm col-form-label">Monto</label>
                              <input type="number" step="any" class="form-control form-control-sm" id="" name="" readonly>
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
                          <button class="btn btn-success" id="generarCompra"><i class="fas fa-plus"></i></button>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <button class="btn btn-danger" id=""><i class="fas fa-trash"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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
        $('#tableCompra').load('../componentes/tablecompra.php');
      });
     </script>
     <script type="text/javascript">
      $(document).ready(function() {
        $('#subtotal').change(function() {
          
        $num1 = parseFloat($('#stockComp').val());
        $num2 = parseFloat($('#pcomComp').val());
        $compra = $num1*$num2;
        $('#PagarComp').val('s/. '+$compra);
          
        });
        $('#produComp').change(function() {
          $.ajax({
            url: '../../procesos/ventas/llenarformproducto.php',
            type: 'POST',
            data: "idproducto=" + $('#produComp').val(),
            success:function(r){
              
              datos = jQuery.parseJSON(r);
              
              $('#pventaComp').val(datos['precio_domiciliophp']);
              
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