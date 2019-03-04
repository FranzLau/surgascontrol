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
	
	<?php include('../../modaledit/modaleditgasto.php'); ?>
	<?php include('navbar.php'); ?>
	<div class="container">
    
    <div class="row mt-5">
			<div class="col-sm-12 text-center text-lg-left d-md-flex">
				<h4 class="font-primary my-auto">REGISTRO DE <strong>GASTOS</strong></h4>
			</div>
		</div>
    <hr>
    <!--*********************************************************************************-->
    <div class="row">
      <div class="col-md-12">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active font-primary" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-file"></i> Nuevo Gasto</a>
            <a class="nav-item nav-link font-primary" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-file-alt"></i> Mis Gastos</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
              <div class="col-md-12">
                <div class="card border-top-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <form action="" id="frmGastar">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="row form-group">
                                <label for="selemp" class="col-form-label col-md-4">Empleado</label>
                                <div class="col-md-8">
                                  <select name="selemp" id="selemp" class="form-control">
                                    <option value="">Elije una..</option>
                                    <?php $gto = $con->query("SELECT * FROM empleado");
                                      while ($row = $gto->fetch_assoc()) {
                                        echo "<option value='".$row['id_emp']."' ";
                                        echo ">";
                                        echo $row['nom_emp'];
                                        echo "</option>";
                                      }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="selectg" class="col-form-label col-md-4">Tipo</label>
                                <div class="col-md-8">
                                  <select class="form-control" id="selectg" name="selectg">
                                    <option value="0">Elije una..</option>
                                    <option value="Combustible">Combustible</option>
                                    <option value="Movilidad">Movilidad</option>
                                    <option value="Útiles de Aseo">Útiles de Aseo</option>
                                    <option value="Útiles de Oficina">Útiles de Oficina</option>
                                    <option value="Otros">Otros</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputpgto" class="col-form-label col-md-4">Precio</label>
                                <div class="col-md-4">
                                  <input type="number" step="any" name="inputpgto" class="form-control" id="inputpgto" placeholder="s/.">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="inputgtodes" class="col-form-label col-md-4">Descripción</label>
                                <div class="col-md-8">
                                  <textarea class="form-control" name="inputgtodes" id="inputgtodes" rows="3"></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                     
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <button type="button" id="agregaGasto" class="btn btn-success"><i class="fas fa-dollar-sign"></i> Registrar Gasto</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row">
              <div class="col-md-12">
                <div class="card border-top-0">
                  <div class="card-body">
                    <div id="tableGasto"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--*********************************************************************************-->
	</div>
	<?php include('scripts.php'); ?>
	<script type="text/javascript">
      $(document).ready(function() {
        $('#tableGasto').load('../componentes/tablegasto.php');
       
      });
    </script>
    <script type="text/javascript">
    	function obtenDatosGasto(idgto){
    		$.ajax({
    			url: '../../procesos/gasto/editgasto.php',
    			type: 'POST',
    			data: "idgto=" + idgto,
    			success:function(r){
    				var datos= $.parseJSON(r);
    				$('#idGto').val(datos['idgtophp']);
    				$('#Gtotipo').val(datos['idtgtophp']);
    				$('#GtoDesc').val(datos['dcgtophp']);
    				$('#GtoPrec').val(datos['pcgtophp']);
    			}
    		})
    		.done(function() {
    			console.log("success");
    		})
    		.fail(function() {
    			console.log("error");
    		})
    		.always(function() {
    			console.log("complete");
    		});
    		
    	}
    	function eliminarGastos(idgto){
    	  alertify.confirm("¿Seguro de BORRAR?.",
          function(){
             $.ajax({
              url: '../../procesos/gasto/deletegasto.php',
              type: 'POST',
              data: "idgto=" + idgto,
              success:function(r){
               if (r==1) {
                $('#tableGasto').load('../componentes/tablegasto.php');
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