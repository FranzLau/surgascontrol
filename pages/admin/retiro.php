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
      <div class="col-sm-6 text-center text-lg-left d-md-flex">
        <h4 class="my-auto font-primary">Registra un <strong>Gasto</strong></h4>
      </div>
      <div class="col-sm-6 justify-content-center justify-content-lg-end d-flex">
        <p class="my-auto font-primary">Gastos / <a href="tipogasto.php">Tipo Gasto</a></p>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-3">
        <form action="" id="frmGastar">
          <div class="form-group">
            <label for="selectg" class="col-form-label">Tipo</label>
            <select class="form-control" id="selectg" name="selectg">
              <option value="">Elije una..</option>
              <?php $gto = $con->query("SELECT * FROM tipogasto");
                    while ($row = $gto->fetch_assoc()) {
                      echo "<option value='".$row['id_tipogasto']."' ";
                      echo ">";
                      echo $row['nom_tipogasto'];
                      echo "</option>";
                    }
                ?>
            </select>
          </div>
          <div class="form-group">
            <label for="inputgtodes" class="col-form-label">Descripción</label>
            
            <textarea class="form-control" name="inputgtodes" id="inputgtodes" rows="3"></textarea>
          </div>
          <div class="form-row">
            <div class="form-group col-sm-6">
              <label for="inputpgto" class="col-form-label">Precio</label>
              <input type="number" step="any" name="inputpgto" class="form-control" id="inputpgto" placeholder="s/.">
            </div>
          </div>
        </form>
        <button type="button" id="agregaGasto" class="btn btn-success"><i class="fas fa-dollar-sign"></i> Gastar</button>
      </div>
      <div class="col-sm-9">
         <div id="tableGasto"></div>
      </div>
    </div>
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