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
    <?php include('../../modal/modalviewrecarga.php'); ?>
    <?php include('navbar.php'); ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-6 text-center text-lg-left d-md-flex">
                <h4 class="my-auto font-primary">Partidas de <strong>HOY</strong></h4>
            </div>
            <div class="col-sm-6 text-center text-lg-right">
                <a href="repartidor.php" class="btn btn-green-secondary"><i class="far fa-file fa-sm mr-2"></i> Nueva Partida</a>
                
            </div>
        </div>
        <hr>
        <div class="row mt-3">
			<div class="col-sm-12">
				<div id="tabRecarga" class="table-responsive"></div>
			</div>
		</div>
    </div>
    <?php include('scripts.php'); ?>
    <script>
        $(document).ready(function(){
            $('#tabRecarga').load('../componentes/tablerecarga.php');
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