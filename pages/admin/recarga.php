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
			<div class="col-sm-6 text-center text-lg-left d-md-flex">
				<h4 class="my-auto font-primary">Nueva <strong>Recarga</strong></h4>
			</div>
			<div class="col-sm-6 justify-content-center justify-content-lg-end d-flex">
				<p class="my-auto font-primary"><a href="repartidor.php">Repartidores</a> <i class="fas fa-chevron-right fa-xs"></i> Recarga <i class="fas fa-chevron-right fa-xs"></i> <a href="liquidar.php">Liquidar</a> <i class="fas fa-chevron-right fa-xs"></i> <a href="misliquidaciones.php">Mis Liquidaciones</a></p>
			</div>
    </div>
		<div class="row mt-3">
			<div class="col-sm-12">
				<div class="card border-0">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-4">
								<img src="../../assets/css/img/recarga.png" alt="" class="img-fluid">
							</div>
							<div class="col-sm-8">
								<form action="" id="frmRec">
			  						<div class="form-row">
			  							<div class="form-group col-sm-6">
											<label for="" class="col-form-label">Repartidor :</label>
											<select class="form-control" name="empChof" id="empChofe">
												<option value="">Elije uno</option>
											      <?php 
											      	
											      	date_default_timezone_set('America/Lima');
											      	$fechnow = date('Y-m-d');
											      	$reparte = $con->query("SELECT * FROM repartidor WHERE fecha_re='$fechnow' ");
											        while ($row = $reparte->fetch_assoc()) {
											          echo "<option value='".$row['id_repartidor']."' ";
											          echo ">";
											          echo $obj->nombreEmpleado($row['id_emp']);
											          
											          echo "</option>";
											        }
											      ?>
											</select>
										</div>
										<div class="form-group col-sm-3">
											<label for="" class="col-form-label">Cantidad</label>
											<input type="number" readonly class="form-control" id="cantChof" name="cantChof">
										</div>
										<div class="form-group col-sm-3">
											<label for="" class="col-form-label">Placa</label>
											<input type="text" class="form-control" id="placaChof" name="placaChof" readonly>
										</div>
			  						</div>
			  						<hr>
			  						<div class="form-row">
			  							<div class="col-sm-6">
			  								<div class="form-group row">
						                  <label for="llenosRec" class="col-sm-6 col-form-label">Llega Llenos :</label>
						                  <div class="col-sm-6">
						                    <input class="form-control" type="number" id="llenosRec" name="llenosRec">
						                  </div>
						               </div>
						               <div class="form-group row">
						               	<label for="vaciosRec" class="col-sm-6 col-form-label">Llega Vacios :</label>
						                  <div class="col-sm-6">
						                    <input class="form-control" type="number" id="vaciosRec" name="vaciosRec">
						                  </div>
						               </div>
			  							</div>
			  							<div class="col-sm-6">
			  								<div class="form-group row">
						                  <label for="galonPres" class="pl-lg-5 col-sm-6 col-form-label">N° Prestado :</label>
						                  <div class="col-sm-6">
						                    <input class="form-control" type="number" id="galonPres" name="galonPres">
						                  </div>
						               </div>
						               <div class="form-group row">
						                  <label for="galonVend" class="pl-lg-5 col-sm-6 col-form-label">N° Vendido :</label>
						                  <div class="col-sm-6">
						                    <input class="form-control" type="number" id="galonVend" name="galonVend">
						                  </div>
						               </div>
			  							</div>
			  						</div> 
			  					</form>
			  					<hr>
			  					<div class="row mt-3">
			  						<div class="col-sm-12 text-right">
			  							<button class="btn btn-green-secondary" id="registroRec">Recargar <i class="fas fa-truck fa-sm ml-2"></i></button>
			  						</div>
			  					</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="footer mt-5">
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
	<script type="text/javascript">
      $(document).ready(function() {
        $('#tabRecarga').load('../componentes/tablerecarga.php');
      });
    </script>
    <script>
	  jQuery(document).ready(function() {
	    $('#empChofe').change(function() {
	      $.ajax({
	        url: '../../procesos/recarga/llenarepartidor.php',
	        type: 'POST',
	        data: "idrep=" + $('#empChofe').val(),
	        success:function(r){
	          datos = jQuery.parseJSON(r);
	          $('#cantChof').val(datos['cantiphp']);
	          $('#placaChof').val(datos['placaphp']);
	        }
	      })
	    });
	  });
	</script>
	<script>

		function crearRecarga(){
			$.ajax({
    			url: '../../procesos/recarga/crearecarga.php',
    			success:function(r){
    				if (r > 0) {
    					$('#TablaRecargaTempLoad').load("../componentes/tableRecargaTemp.php");
    					$('#frmRecBal')[0].reset();
    					$('#frmRec')[0].reset();

    					$('#empChofe').removeAttr('disabled');
    					$('#llenosRec').removeAttr('disabled');
    					$('#vaciosRec').removeAttr('disabled');
    					$('#galonPres').removeAttr('disabled');
    					$('#galonVend').removeAttr('disabled');

    					$('#prodRec').attr('disabled', 'disabled');
    					$('#cantReca').attr('disabled', 'disabled');
    					$('#recargaBal').attr('disabled', 'disabled');
    					$('#cleanRec').attr('disabled', 'disabled');

    					alertify.alert("Recarga con Exito, consulte sus Recargas");
    				}else if(r == 0){
    					alertify.alert("No hay lista de Galones");
    				}else{
    					alertify.error("No se Pudo Recargar");
    				}
    			}
    		})
		}

		function eliminarRecarga(idsal){
			alertify.confirm("¿Desea BORRAR la llegada.",
          	function(){
             	$.ajax({
              	url: '../../procesos/recarga/deleterec.php',
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