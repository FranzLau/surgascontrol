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
		<!--<div class="row mt-5">
			<div class="col-sm-12 ">
				
      </div>
		</div>-->
    <!--************************************************************************-->
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6 text-center text-lg-left d-md-flex">
                <h3 class="my-lg-auto page-title"><i class="fas fa-people-carry mr-3"></i>Repartidores</h3>
              </div>
              <div class="col-sm-6">
                <ul class="nav nav-pills nav-pills-primary justify-content-center justify-content-lg-end" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active font-primary" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="far fa-file mr-2"></i>Nuevo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link font-primary" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="far fa-file-alt mr-2"></i>Mis Partidas</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-12">
                <div class="tab-content" id="pills-tabContent">
                  <!--*************************************************************-->
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                      <div class="col-sm-5">
                        <form action="" id="formPartidaCho">
                          <div class="row form-group">
                            <label for="parChof" class="col-form-label col-form-label-sm col-sm-4">Chofer :</label>
                            <div class="col-sm-8">
                              <select class="form-control form-control-sm" name="parChof" id="parChof">
                                <option value="">Elije uno..</option>
                                <?php $prod = $con->query("SELECT * FROM empleado WHERE cargo_emp='Chofer' AND estado_emp='Activo'");
                                    while ($row = $prod->fetch_assoc()) {
                                      echo "<option value='".$row['id_emp']."' ";
                                      echo ">";
                                      echo $row['nom_emp'];
                                      echo " ";
                                      echo $row['ape_emp'];
                                      echo "</option>";
                                    }
                                ?>
                              </select>
                            </div>
                          </div>
                          <!--*************************-->
                          <div class="row form-group">
                            <label for="tipobalon" class="col-form-label col-form-label-sm col-sm-4">Tipo Balon :</label>
                            <div class="col-sm-8">
                              <select name="tipobal" id="tipobalon" class="form-control form-control-sm">
                                <option value="cg">Gas + Envase</option>
                                <option value="sg">Solo Envase</option>
                              </select> 
                            </div>
                          </div>
                          <!--*************************-->
                          
                          <!--*************************-->
                          <div class="row form-group">
                            <label for="parprodu" class="col-form-label col-form-label-sm col-sm-4">Producto :</label>
                            <div class="col-sm-8">
                              <select name="parprodu" class="form-control form-control-sm" id="parprodu">
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
                          <!--*************************-->
                          <div class="row form-group">
                            <label for="parlle" class="col-form-label col-form-label-sm col-sm-4">Ll/Va</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control form-control-sm" id="parlle" name="parlle" readonly>
                            </div>
                            <div class="col-sm-4">
                              <!--<label for="parvac" class="col-form-label col-form-label-sm ">Vacios:</label>-->
                              <input type="text" class="form-control form-control-sm" id="parvac" name="parvacd" readonly>
                            </div>
                          </div>
                          <!--*************************-->
                          <div class="row form-group">
                            <label for="parcantidad" class="col-form-label col-form-label-sm col-sm-4">Cantidad :</label>
                            <div class="col-sm-4">
                              <input type="number" class="form-control form-control-sm" id="parcantidad" name="parcantidad">
                            </div>
                          </div>
                          
                        </form>
                        <hr>
                        <div class="row">
                          <div class="col-md-12 text-right">
                            <button class="btn btn-danger-melody btn-sm" id="btnLimpiarPart"><i class="fas fa-trash-alt mr-2"></i>Vaciar Lista</button>
                            <button class="btn btn-info-melody btn-sm" id="btnAgregarPar"><i class="fas fa-plus mr-2"></i>Agregar</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-7">
                        <div id="TablaPartidaTempLoad"></div>
                      </div>
                    </div>
                  </div>
                  <!--************************************************************************-->
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div id="tablaPartidas" class="table-responsive"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--************************************************************************-->
   
		
	</div>
	<?php include('scripts.php'); ?>
	<script>
		$(document).ready(function() {
      $('#TablaPartidaTempLoad').load("../componentes/tablePartidaTemp.php");
      $('#tablaPartidas').load('../componentes/tablepartidas.php');
      $('#parprodu').change(function(){
        $.ajax({
          url: '../../procesos/ventas/llenarformproducto.php',
          type: 'POST',
          data: "idproducto=" + $('#parprodu').val(),
          success:function(r){
            datos = jQuery.parseJSON(r);
            $('#parlle').val(datos['stock_llenosphp']);
            $('#parvac').val(datos['stock_vaciosphp']);
          }

        })
      });
		});
	</script>
	<script>
		
		function quitarPar(index){
    		$.ajax({
    			url: '../../procesos/repartidor/quitarpartida.php',
    			type: 'POST',
    			data: "ind=" + index,
    			success:function(r){
    				$('#TablaPartidaTempLoad').load("../componentes/tablePartidaTemp.php");
    				alertify.success("Se quito el producto :)");
    			}
    		})
    	}
      function crearPartida(){
    		$.ajax({
    			url: '../../procesos/repartidor/crearpartida.php',
    			success:function(r){
    				if (r > 0) {
              $('#TablaPartidaTempLoad').load("../componentes/tablePartidaTemp.php");
              $('#tablaPartidas').load('../componentes/tablepartidas.php');
    					$('#formPartidaCho')[0].reset();
    					alertify.alert("Partida creada con Exito, consulte las Partidas");
    				}else if(r == 0){
    					alertify.alert("No hay lista de Productos");
    				}else{
    					alertify.error("No se Pudo crear la Partida");
    				}
    			}
    		})
    	}
	</script>
	<script>
		$(document).ready(function(){
			$('#btnAgregarPar').click(function() {
    		vacios = validarFrmVacio('formPartidaCho');
				if(vacios > 0){
					alertify.error("Debe llenar todos los campos!");
					return false;
				}
				datos = $('#formPartidaCho').serialize();
				$.ajax({
					url: '../../procesos/repartidor/agregapartidatemp.php',
					type: 'POST',
					data: datos,
					success:function(r){
						if (r==2) {
							alertify.error('No hay producto');
						}else if(r==1){
							alertify.error('Pocos Prodcutos en Stock');
						}else{
							$('#TablaPartidaTempLoad').load("../componentes/tablePartidaTemp.php");
						}
					}
				})
			});
			$('#btnLimpiarPart').click(function() {
				$.ajax({
					url: '../../procesos/repartidor/limpiarpartidastemp.php',
					
					success:function(r){
						$('#TablaPartidaTempLoad').load("../componentes/tablePartidaTemp.php");
					}
				})
			});
		});
	</script>
  <script>
    function eliminaPartida(idsal){
        alertify.confirm("¿Desea BORRAR la llegada.",
        function(){
            $.ajax({
            url: '../../procesos/recarga/deletepartida.php',
            type: 'POST',
            data: "idsal=" + idsal,
            success:function(r){
                if (r==1) {
                    $('#tabRecarga').load('../componentes/tablerecarga.php');
                    $('#cargachofer').load('../componentes/tablechofer.php');
                    alertify.success("Eliminaste con EXITO");
                }else{
                    alertify.error("No se pudo Eliminar");
                }
            }
            })
        },
        function(){
            alertify.warning('Estuviste a punto de Eliminar');
        });
    }
    </script>
</body>
</html>
<?php 
  }else{
    header('Location: ../../');
  } 
?>