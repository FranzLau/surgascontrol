<?php 
    
    require 'config/conexion.php';
    $sql= $con->query("SELECT * FROM empleado WHERE acceso_emp='Administrador'  ");
    $result = $sql->fetch_row();
     
    if ($result>0) {
    	header("Location:index.php");
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
	<link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/alertify/css/alertify.css">
    <link rel="stylesheet" href="assets/alertify/css/themes/bootstrap.css">
</head>
<body>
	<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
				<div class="row flex-grow">
					<div class="col-lg-6 align-items-center justify-content-center d-flex">
						<div class="auth-form-register text-left p-3 m-auto">
							<img src="assets/css/img/logome.png" class="pb-3">
							<h5 class="font-primary"><strong>Nuevo Aquí?</strong></h5>
							<p>¡Únete a nosotros hoy! Solo lleva unos pocos pasos</p>
							<form action="" id="frmemp" class="mt-3">
				              <div class="form-row">
				              	<div class="form-group col-sm-6">
				              		<label for="inputemp" class="col-form-label col-form-label-sm">Nombres :</label>
				              		<input name="nomemp" type="text" class="form-control form-control-sm" id="inputemp">
				              	</div>
				              	<div class="form-group col-sm-6">
				              		<label for="inputape" class="col-form-label col-form-label-sm">Apellidos :</label>
				              		<input name="apeemp" type="text" class="form-control form-control-sm" id="inputape">
				              	</div>
				              </div>
				              <div class="form-row">
				              	<div class="form-group col-sm-6">
					                <label for="inputDocemp" class="col-form-label col-form-label-sm">DNI :</label>
					                <input name="dniemp" type="number" class="form-control form-control-sm" id="inputDocemp" placeholder="Nro. de DNI">
					            </div>
					            <div class="form-group col-sm-6">
				               		<label for="inputSex" class="col-form-label col-form-label-sm">Sexo :</label>
				               		<select name="sexemp" id="inputSex" class="form-control form-control-sm">
				                       <option selected>Elije una</option>
				                       <option value="M">Masculino</option>
				                       <option value="F">Femenino</option>
				                    </select>
				               	</div>
				              </div>
				              <div class="form-row">
				               	<div class="form-group col-sm-6">
				               		<label for="inputDatemp" class="col-form-label col-form-label-sm">Fecha Nacimiento :</label>
				               		<input name="fechnac" type="date" class="form-control form-control-sm" id="inputDatemp">
				               	</div>
				              </div> 
				               <div class="form-group">
				                 <label for="inputdirpro" class="col-form-label col-form-label-sm">Dirección :</label>
				                 <input name="diremp" type="text" class="form-control form-control-sm" id="inputdirpro" placeholder="Tu dirección">
				               </div>
				               <div class="form-row">
				              	
				              	<div class="form-group col-sm-4">
				              		<label for="inputfone" class="col-form-label col-form-label-sm">Teléfono :</label>
				              		<input name="telfemp" type="number" class="form-control form-control-sm" id="inputfone">
				              	</div>
				              	<div class="form-group col-sm-4">
				              		<label for="inputemail" class="col-form-label col-form-label-sm">Correo :</label>
				              		<input name="emailemp" type="email" class="form-control form-control-sm" id="inputemail">
				              	</div>
				              	<div class="form-group col-sm-4">
				               		<label for="" class="col-form-label col-form-label-sm">Contraseña :</label>
				               		<input name="passemp" type="password" class="form-control form-control-sm" id="inputpass">
				               	</div>
				              </div>
				               <div class="form-row" hidden="">
				               	<div class="form-group col-sm-6">
				               		<label for="" class="col-form-label col-form-label-sm">Acceso :</label>
				               		<input type="text" class="form-control form-control-sm" name="accemp" id="inputAccEmp" value="Administrador">
				               	</div>
				               	<div class="form-group col-sm-4">
				              		<label for="inputAcceso" class="col-form-label col-form-label-sm">Cargo</label>
				              		<!--<input type="text" class="form-control form-control-sm" name="cargoemp" id="inputAcceso" value="1">-->
				              		<select name="cargoemp" id="inputAcceso">
									  	<option value="0">Elije una...</option>
										<option value="Gerente">Gerente</option>
										<option value="Chofer">Chofer</option>
										<option value="Administrador">Administrador</option>
										<option value="Contador">Contador</option>
										<option value="Soporte Técnico">Soporte Técnico</option>
										<option value="Recepcionista de Llamadas">Recepcionista de Llamadas</option>
										<option value="Ventas">Ventas</option>
										<option value="Limpieza">Limpieza</option>
										<option value="Otro">Otro</option>
									</select>
				              	</div>
				              </div>  
				            </form>
				            <hr>
				            <button id="regiemp" type="button" class="btn btn-green-secondary"><i class="fas fa-save"></i> Registrar</button>
						</div>
					</div>
					<div class="col-lg-6 d-flex flex-row register-bg-half">
						<p class="text-white text-center flex-grow align-self-end"><i class="fas fa-laptop"></i>Desarrollado por <strong>Franz Cruz</strong></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery.3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js" ></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/alertify/alertify.js"></script>
    
    <script src="assets/js/funciones.js"></script>
    <script>
    	$(document).ready(function() {
    		$('#regiemp').click(function(event) {
    			vacios = validarFrmVacio('frmemp');
				if(vacios > 0){
					alertify.error("Debe llenar todos los campos!");
					return false;
				}
				var datos=$('#frmemp').serialize();
    			$.ajax({
    				url: 'procesos/empleado/addemp.php',
    				type: 'POST',
    				dataType: 'json',
    				data: datos,
    			})
    			.done(function(r) {
    				if (!r.error) {
						alertify.success("Agregado con ÉXITO");
						window.location.href='index.php';
					}else{
						alertify.error("Datos Incorrectos");
					}
		    			});
    		});
    	});
    </script>
</body>
</html>