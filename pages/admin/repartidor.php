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
			<div class="col-sm-6">
				<h4 class="font-primary">Registro de <strong>Partida</strong></h4>
			</div>
			<div class="col-sm-6 text-right">
				<p class="my-auto font-primary">Registro de Partida<i class="fas fa-chevron-right fa-xs ml-2 mr-2"></i><a href="partidas.php">Mis Partidas</a></p>
			</div>
		</div>
		<div class="row mt-3">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <form action="" id="formPartidaCho">
              <?php
                date_default_timezone_set('America/Lima');
                $fech = date('Y-m-d');
              ?>
              <div class="form-group row">
                <label for="colFormLabelSm" class="col-form-label col-form-label-sm col-sm-3">Fecha :</label>
                <div class="col-sm-9">
                  <input type="text" readonly class="form-control text-center form-control-sm" id="colFormLabelSm" value=" <?php echo $fech ?> ">
                </div>
              </div>
              <div class="form-group row">
                <label for="parChof" class="col-form-label col-form-label-sm col-sm-3">Chofer :</label>
                <div class="col-sm-9">
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
              <div class="form-group row">
                <label for="parplaca" class="col-form-label col-form-label-sm col-sm-3">Placa :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control form-control-sm" id="parplaca" name="parplaca">
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <label for="parprodu" class="col-form-label col-form-label-sm col-sm-3">Producto :</label>
                <div class="col-md-9">
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
              <div class="form-group row">
                <label for="parcantidad" class="col-form-label col-form-label-sm col-sm-3">Cantidad :</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control form-control-sm" id="parcantidad" name="parcantidad">
                </div>
              </div>
              
              <div class="form-group row">
                <label for="tipobalon" class="col-form-label col-form-label-sm col-sm-3">Tipo Balon :</label>
                <div class="col-sm-9">
                  <select name="tipobal" id="tipobalon" class="form-control form-control-sm">
                    <option value="cg">Con Gas</option>
                    <option value="sg">Sin Gas</option>
                  </select>
                </div> 
              </div>
            </form>
            <hr>
            <div class="text-right">
              <button class="btn btn-danger btn-lg" id="btnLimpiarPart"><i class="fas fa-trash-alt"></i> Limpiar</button>
              <button class="btn btn-success btn-lg mr-2" id="btnAgregarPar"><i class="fas fa-plus"></i> Agregar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div id="TablaPartidaTempLoad"></div>
      </div>
		</div>	
		<footer class="footer">
      <div class="d-sm-flex justify-content-sm-between justify-content-center">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
          Copyright <i class="far fa-copyright"></i>2018 
          <a href="#" target="_blank">SURGAS</a>. Todos los derechos reservados
        </span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
          Desarrollado <i class="fas fa-code text-danger"></i> por Franz Cruz <i class="fas fa-laptop text-danger"></i>
        </span>
      </div>
    </footer>
	</div>
	<?php include('scripts.php'); ?>
	<script>
		$(document).ready(function() {
			
			$('#TablaPartidaTempLoad').load("../componentes/tablePartidaTemp.php");
		});
	</script>
	<script>
		function obtenDatosChofer(idcho){
			$.ajax({
	 			url: '../../procesos/recarga/datoschofer.php',
	 			type: 'POST',
	 			dataType: 'html',
	 			data: "idcho=" + idcho,
	 			success:function(r){
	 				$('#bodychofer').html(r);
	 			}
    		})
		}
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
</body>
</html>
<?php 
  }else{
    header('Location: ../../');
  } 
?>