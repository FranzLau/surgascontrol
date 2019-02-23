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
<body style="background:  #F2F4F4">
	<?php include('navbar.php'); ?>
	<div class="container">
		<div class="row mt-5">
			<div class="col-sm-6 text-center text-lg-left d-md-flex">
				<h4 class="my-md-auto font-primary">Lista de <strong>Liquidaciones</strong></h4>
			</div>
			<div class="col-sm-6 justify-content-center justify-content-lg-end d-flex">
				<p class="my-auto font-primary"><a href="repartidor.php">Repartidores</a> <i class="fas fa-chevron-right fa-xs"></i> <a href="recarga.php">Recargar</a> <i class="fas fa-chevron-right fa-xs"></i> <a href="liquidar.php">Liquidar</a> <i class="fas fa-chevron-right fa-xs"></i> Liquidaciones</p>
			</div>
		</div>
		<hr>
		
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
	<script>
		$(document).ready(function() {
			
		});
	</script>
</body>
</html>
<?php 
  }else{
    header('Location: ../../');
  }
?>