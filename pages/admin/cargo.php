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
	
    <?php include('../../modaledit/modaleditcargo.php'); ?>
    <?php include('navbar.php'); ?>
	<div class="container">
    <div class="row mt-5">
      <div class="col-sm-12 text-left">
        <h4 class="font-primary">Nuevo <strong>Cargo</strong></h4>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <form action="" id="frmcargo">
              <div class="form-group">
                <input name="nomcg" type="text" class="form-control" id="inputNamecat" placeholder="Cargo / Especialidad">
              </div>
              <div class="form-group">
                <label for="inputDesCat" class="col-form-label">Descripción :</label>
                <textarea name="descg" class="form-control" id="inputDesCat" rows="3"></textarea>
              </div>
            </form>
            <button id="agregacargo" type="button" class="btn btn-green-secondary"><i class="fas fa-save fa-sm mr-2"></i> Guardar</button>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div id="tableCarg"></div>
      </div>
    </div>
    
	</div>


     <?php include('scripts.php'); ?>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tableCarg').load('../componentes/tablecargo.php');
      });
    </script>
    <script type="text/javascript">
    	function obtenDatosCargo(idcarg){
    		$.ajax({
    			url: '../../procesos/cargo/editcarg.php',
    			type: 'POST',
    			data: "idcarg=" + idcarg,
    			success:function(r){
    				var datos= $.parseJSON(r);
    				$('#idCargoC').val(datos['idcgphp']);
    				$('#inputNamecgC').val(datos['nomcgphp']);
    				$('#inputDescgC').val(datos['descgphp']);
    			}
    		})
    	
    	}
    	function eliminarCargo(idcarg){
    	  alertify.confirm("¿Seguro de Eliminar el cargo?.",
          function(){
             $.ajax({
              url: '../../procesos/cargo/deletecarg.php',
              type: 'POST',
              data: "idcarg=" + idcarg,
              success:function(r){
               if (r==1) {
                $('#tableCarg').load('../componentes/tablecargo.php');
                alertify.success("Eliminaste con EXITO");
               }else{
                alertify.error("No se pudo Eliminar el cargo.");
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