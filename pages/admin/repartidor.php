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
		<div class="row mt-4">
			<div class="col-sm-12 text-center text-lg-left d-md-flex">
				<h4 class="font-primary my-auto">Registro de <strong>Partidas</strong></h4>
			</div>
		</div>
    <hr>
    <!--************************************************************************-->
    <div class="row mt-3">
      <div class="col-sm-12">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active font-primary" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-file"></i> Nueva Partida</a>
            <a class="nav-item nav-link font-primary" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-file-alt"></i> Mis partidas</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
              <div class="col-md-12">
                <div class="card border-top-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-10">
                        <form action="" id="formPartidaCho">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="parChof" class="col-form-label col-form-label-sm">Chofer :</label>
                                  <select class="form-control form-control-sm" name="parChof" id="parChof">
                                    <option value="">Elije uno..</option>
                                    <?php $prod = $con->query("SELECT * FROM empleado");
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
                              <div class="form-row">
                                <div class="form-group col-sm-12">
                                  <label for="tipobalon" class="col-form-label col-form-label-sm">Tipo Balon :</label>
                                  <select name="tipobal" id="tipobalon" class="form-control form-control-sm">
                                    <option value="cg">Gas + Envase</option>
                                    <option value="sg">Solo Envase</option>
                                  </select> 
                                </div>
                                
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-row">
                                <div class="form-group col-sm-6">
                                  <label for="parprodu" class="col-form-label col-form-label-sm">Producto :</label>
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
                                <div class="form-group col-sm-6">
                                  <label for="parcantidad" class="col-form-label col-form-label-sm ">Cantidad :</label>
                                  <input type="number" class="form-control form-control-sm" id="parcantidad" name="parcantidad">
                                </div>
                              </div>
                              <div class="form-row">
                                
                                <div class="form-group col-sm-6">
                                  <label for="parlle" class="col-form-label col-form-label-sm ">Llenos:</label>
                                  <input type="text" class="form-control form-control-sm" id="parlle" name="parlle" readonly>
                                </div>
                                <div class="form-group col-sm-6">
                                  <label for="parvac" class="col-form-label col-form-label-sm ">Vacios:</label>
                                  <input type="text" class="form-control form-control-sm" id="parvac" name="parvacd" readonly>
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
                              <button class="btn btn-success mr-2" id="btnAgregarPar"><i class="fas fa-plus"></i></button>
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-md-12">
                              <button class="btn btn-danger" id="btnLimpiarPart"><i class="fas fa-trash-alt"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-12">
                <div id="TablaPartidaTempLoad"></div>
              </div>
            </div>	
          
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row mt-4">
              <div class="col-sm-12">
                <div id="tabRecarga" class="table-responsive"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
		
	</div>
	<?php include('scripts.php'); ?>
	<script>
		$(document).ready(function() {
      $('#TablaPartidaTempLoad').load("../componentes/tablePartidaTemp.php");
      $('#tabRecarga').load('../componentes/tablepartidas.php');
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
              $('#tabRecarga').load('../componentes/tablepartidas.php');
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