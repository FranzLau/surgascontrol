<?php 
    session_start();
    if(isset($_SESSION['loggedIN'])){
        header('Location: pages/admin/');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hola, SurGas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/ico" href="assets/css/img/log.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="assets/fontawesome/css/fontawesome-all.min.css">

    <link rel="stylesheet" href="assets/alertify/css/alertify.css">
    <link rel="stylesheet" href="assets/alertify/css/themes/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
	
	<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
				<div class="row flex-grow">
					<div class="col-lg-6 align-items-center justify-content-center d-flex">
						<div class="auth-form-transparent text-left p-3 m-auto">
							<img src="assets/css/img/logome.png" class="mb-5">
							<h5><strong>Bienvenido!</strong></h5>
							<p>Feliz de verte de nuevo!</p>
							<form action="" method="post" id="frmlg" class="pt-2">
				                <div class="form-group">
				                	<div class="input-group" style="border-bottom: 1px solid #5659A6">
				                		<div class="input-group-addon bg-white border-0">
				                			<i class="fas fa-user text-muted font-primary"></i>
				                		</div>
				                		<input type="text" class="form-control form-control-sm border-0" name="userlg" pattern="[A-Za-z0-9_-]{1,15}" required autocomplete="off" id="userlg" placeholder="DNI" autofocus="">
				                	</div>
				                </div>
				                <div class="form-group">
				                	<div class="input-group" style="border-bottom: 1px solid #5659A6">
				                		<div class="input-group-addon bg-white border-0">
											<i class="fas fa-unlock-alt text-muted font-primary"></i> 
									   	</div>
									   	<input type="password" class="form-control form-control-sm border-0" name="passlg" pattern="[A-Za-z0-9_-]{1,15}" required id="passlg" placeholder="Contraseña">
				                	</div>
				                </div>
				            </form>
				            <div class="row mt-5">
				            	<div class="col-sm-6 d-flex">
				            		<?php 
						            require 'config/conexion.php';
						            $sql = $con->query("SELECT * FROM empleado WHERE acceso_emp= 'Administrador' ");
						            $validar =0;
						            if ($result=$sql->fetch_row()>0){
						            	$validar = 1;
						            } 
						            if (!$validar):
						             ?>
				            		<a href="registro.php" class="font-primary my-auto">Registrate Aquí!</a>
				            		<?php endif; ?>
				            	</div>
				            	<div class="col-sm-6 text-right">
				            		<button class="btn btn-green-secondary w-100"  id="btnlg">INGRESAR</button>
				            	</div>
				            </div>
						</div>
					</div>
					<div class="col-lg-6 d-flex flex-row">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						  <ol class="carousel-indicators">
						    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						  </ol>
						  <div class="carousel-inner">
						    <div class="carousel-item active">
						      <img class="d-block w-100" src="assets/css/img/madre3gas.jpg" alt="First slide" style="height: 100vh;">
						      <div class="carousel-caption d-none d-md-block">
							    <h5>SURGAS</h5>
							    <p><i class="fas fa-fire mr-2"></i> El calor de tu ciudad</p>
							  </div>
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="assets/css/img/planta2gas.jpg" alt="Second slide" style="height: 100vh;">
						      <div class="carousel-caption d-none d-md-block">
							    <h5>Control de Gas</h5>
							    <p><i class="fas fa-laptop mr-2"></i>Desarrollado por <strong>Franz Cruz</strong></p>
							  </div>
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="assets/css/img/tacna1gas.jpg" alt="Third slide" style="height: 100vh;">
						      <div class="carousel-caption d-none d-md-block">
							    <h5>Tacna - Perú</h5>
							    <p>Copyright<i class="far fa-copyright"></i> 2018. Todos los derechos reservados</p>
							  </div>
						    </div>
						  </div>
						  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						  <!--<p class="text-white text-center flex-grow align-self-end"><i class="fas fa-laptop"></i>Desarrollado por <strong>Franz Cruz</strong></p>-->
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="assets/js/jquery.3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js" ></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/alertify/alertify.js"></script>
    <script src="assets/js/mainlg.js"></script>
</body>
</html>