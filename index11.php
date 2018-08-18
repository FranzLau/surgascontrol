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
</head>
<body style="background-image: url(assets/css/img/purpleTacna.jpg); background-size: 100vw 100vh;background-attachment: fixed;">
	<div class="container">
		<div class="row" style="height: 100vh">
			
			<div class="col-sm-12 d-flex">
				<div class="card m-auto">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<img src="assets/css/img/mansurgas.png" alt="" class="img-fluid">
							</div>
							
							<div class="col-sm-6 text-center">
								<img src="assets/css/img/log.png" alt="">
								<h4 class="mt-4 font-weight-bold" style="color: #6c1841">SURGAS</h4>
								<hr>
								<form action="" method="post" id="frmlg">
					                <div class="form-group">
					                	<div class="input-group">
					                		<div class="input-group-addon bg-white">
					                			<i class="fas fa-user text-muted"></i>
					                		</div>
					                		<input type="text" class="form-control form-control-sm" name="userlg" pattern="[A-Za-z0-9_-]{1,15}" required autocomplete="off" id="userlg" placeholder="DNI" autofocus="">
					                	</div>
					                </div>
					                <div class="form-group">
					                	<div class="input-group">
					                		<div class="input-group-addon bg-white">
												<i class="fas fa-unlock-alt text-muted"></i> 
										   	</div>
										   	<input type="password" class="form-control form-control-sm" name="passlg" pattern="[A-Za-z0-9_-]{1,15}" required id="passlg" placeholder="Contraseña">
					                	</div>
					                	
					                </div>

					            </form>
					            <button class="btn btn-outline-warning w-100"  id="btnlg"><i class="fas fa-check-square"></i> Ingresar</button>
					            <?php 
					            require 'config/conexion.php';
					            $sql = $con->query("SELECT * FROM empleado WHERE acceso_emp= 'Administrador' ");
					            $validar =0;
					            if ($result=$sql->fetch_row()>0){
					            	$validar = 1;
					            } 
					            if (!$validar):
					             ?>
					            <div class="text-left mt-2">
					            	<ul class="list-inline">
					            		<li class="list-inline-item"><p>Tienes cuenta ?</p></li>
					            		<li class="list-inline-item"><a href="registro.php"  id="btnreg">Registrate aquí</a></li>
					            	</ul>
					            </div>
					            <?php endif; ?>
							</div>
							
						</div>
					</div>
					<div class="card-footer text-center text-muted">
						Copyright <i class="far fa-copyright"></i>2018, SURGAS
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