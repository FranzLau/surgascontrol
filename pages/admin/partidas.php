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
                <h4 class="my-auto font-primary">Lista de <strong>Repartidores</strong></h4>
            </div>
            <div class="col-sm-6 text-center text-lg-right">
                <a href="repartidor.php" class="btn btn-green-secondary"><i class="far fa-file fa-sm mr-2"></i> Nuevo Repartidor</a>
                
            </div>
        </div>
        <div class="row mt-5">
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
</body>
</html>
<?php 
  }else{
    header('Location: ../../');
  } 
?>