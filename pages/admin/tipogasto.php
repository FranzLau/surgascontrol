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
	<?php include('../../modaledit/modaledittgasto.php'); ?>
	<?php include('navbar.php'); ?>
	<div class="container">
		<div class="row mt-5">
      <div class="col-sm-6 text-center text-lg-left d-md-flex">
        <h4 class="my-auto font-primary">Tipo de <strong>Gasto</strong></h4>
      </div>
      <div class="col-sm-6 justify-content-center justify-content-lg-end d-flex">
        <p class="my-auto font-primary">Tipo de Gasto / <a href="retiro.php">Gastar</a></p>
      </div>
    </div>
    <hr>
    <div class="row mt-5">
    	<div class="col-sm-4">
    		<form action="" id="frmtga">
              <div class="form-group">
              	<label for="inputNamecat" class="col-form-label">Nombre :</label>
                  <input name="nomtga" type="text" class="form-control" id="inputNamecat" placeholder="Tipo de Gasto">
              </div>
              <div class="form-group">
                  <label for="inputDesCat" class="col-form-label">Descripción :</label>
                  <textarea name="desctga" class="form-control" id="inputDesCat" rows="3"></textarea> 
              </div>
          </form>
          <button id="agregatga" type="button" class="btn btn-green-secondary m-auto"><i class="fas fa-save"></i> Guardar</button>
    	</div>
    	<div class="col-sm-8">
    		<div id="tabletg"></div>
    	</div>
    </div>
	</div>
	<?php include('scripts.php'); ?>
	<script>
		$(document).ready(function() {
			$('#tabletg').load('../componentes/tabletipogasto.php');
		});
	</script>
	<script>
    	function obtenTipoGasto(idtga){
    		$.ajax({
    			url: '../../procesos/gasto/edittgas.php',
    			type: 'POST',
    			data: "idtga=" + idtga,
    			success:function(r){
    				var datos = $.parseJSON(r);
    				$('#idTga').val(datos['idtgphp']);
    				$('#inputNametcg').val(datos['nomtgphp']);
    				$('#inputDestga').val(datos['destgphp']);
    			}
    		})
    	}
    	function eliminarTipoGasto(idtga){
    	alertify.confirm("¿Seguro de BORRAR esto?.",
          function(){
             $.ajax({
              url: '../../procesos/gasto/deletetga.php',
              type: 'POST',
              data: "idtga=" + idtga,
              success:function(r){
               if (r==1) {
                $('#tabletg').load('../componentes/tabletipogasto.php');
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