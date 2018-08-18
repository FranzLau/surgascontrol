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
	<?php include('../../modaledit/modaleditperfil.php') ?>
	<?php include('navbar.php'); ?>
	<div class="container">
		<div class="row mt-5">
			<div class="col-sm-12">
				<a href="index.php"><i class="fas fa-chevron-left"></i> Regresar al Inicio</a>
			</div>
		</div>
	    <div class="row mt-3">
	    	<div class="col-sm-12">
	    		<div class="card p-4">
	    			<div class="card-body">
	    				<div class="row">
	    					<div class="col-sm-4 d-flex">
	    						<?php if ($_SESSION['loggedIN']['sexo_emp'] == "M") { ?>
				                  <img src="../../assets/css/img/boyemp.png" class="m-auto" alt="" width="250px" height="250px">
				                <?php 
				                 }else{ ?> 
				                  <img src="../../assets/css/img/girlemp.png" class="m-auto" alt="" width="250px" height="250px">
				                <?php  } ?>
	    					</div>
	    					<?php 
    						$idmy = $_SESSION['loggedIN']['id_emp'];
    						$sql=$con->query("SELECT * FROM empleado WHERE id_emp='$idmy' ");
    						$date = $sql->fetch_row();	
    						 ?>
	    					<div class="col-sm-8">
	    						<div class="row mt-3 mt-lg-0">
	    							<div class="col-sm-4 text-center text-lg-left">
	    								<h3 class="font-weight-bold"><?php echo $_SESSION['loggedIN']['nom_emp'] ?></h3>
	    							</div>
	    							<div class="col-sm-8 text-lg-right text-center">
	    								<button type="button" class="btn btn-outline-yellow-secondary" data-toggle="modal" data-target="#EditempUserCenter" onclick="obtenDatosEmp('<?php echo $idmy ?>')"><i class="fas fa-edit"></i> Editar Perfil</button>
	    							</div>
	    						</div>
	    						<hr>
	    						<div class="row">
	    							<div class="col-sm-12">
	    								<ul class="list-inline">
										  <li class="list-inline-item"><p><strong><?php echo $date[9] ?></strong></p></li>
										  <li class="list-inline-item"><i class="fas fa-star fa-sm" style="color: #f39c12"></i></li>
										  <li class="list-inline-item"><i class="fas fa-star fa-sm" style="color: #f39c12"></i></li>
										  <?php if ($_SESSION['loggedIN']['acceso_emp'] == "Administrador"): ?>
										  <li class="list-inline-item"><i class="fas fa-star fa-sm" style="color: #f39c12"></i></li>
										  <li class="list-inline-item"><i class="fas fa-star fa-sm" style="color: #f39c12"></i></li>
										  <li class="list-inline-item"><i class="fas fa-star fa-sm" style="color: #f39c12"></i></li>
										  <?php else: ?>
										  <li class="list-inline-item"><i class="far fa-star fa-sm" style="color: #f39c12"></i></li>
										  <li class="list-inline-item"><i class="far fa-star fa-sm" style="color: #f39c12"></i></li>
										  <li class="list-inline-item"><i class="far fa-star fa-sm" style="color: #f39c12"></i></li>
										<?php endif ?>
										</ul>
	    								
	    							</div>
	    						</div>
	    						<div class="row">
	    							<div class="col-sm-12">
	    								<form action="">
			    							<?php 
											date_default_timezone_set('America/Lima'); 
							            	$fech = date('Y-m-d');
							            	$nac = $date[4];
											$age = strtotime($fech)-strtotime($nac);
											$anios = intval($age/60/60/24/365.25);
											 ?>
			    							<div class="row">
											    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm font-weight-bold">Edad :</label>
											    <div class="col-sm-9">
											    	<input type="text" readonly class="form-control-plaintext form-control-sm" id="colFormLabelSm" value="<?php echo $anios ?>">
											    </div>
										  	</div>
										  	<div class="row">
											    <label for="" class="col-sm-3 col-form-label col-form-label-sm font-weight-bold">Dirección :</label>
											    <div class="col-sm-9">
											    	<input type="text" readonly class="form-control-plaintext form-control-sm w-100" id="" value="<?php echo $date[6]?>">
											    </div>
										  	</div>
										  	<div class="row">
											    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm font-weight-bold">Email :</label>
											    <div class="col-sm-9">
											    	<input type="text" readonly class="form-control-plaintext form-control-sm" id="colFormLabelSm" value="<?php echo $date[8] ?>">
											    </div>
										  	</div>
										  	<div class="row">
											    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm font-weight-bold">Teléfono :</label>
											    <div class="col-sm-9">
											    	<input type="text" readonly class="form-control-plaintext form-control-sm" id="colFormLabelSm" value="<?php echo $date[7] ?>">
											    </div>
										  	</div>
			    						</form>
	    							</div>
	    						</div>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    	
	    </div>
	</div>
	<?php include('scripts.php'); ?>
	<script>
		function obtenDatosEmp(idemp){
        $.ajax({
          url: '../../procesos/empleado/editemp.php',
          type: 'POST',
          data: "idemp=" + idemp,
          success:function(r){
            var datos = $.parseJSON(r);
            $('#idUser').val(datos['idempphp']);
            $('#nomUser').val(datos['nomempphp']);
            $('#apeUser').val(datos['apempphp']);
            $('#dniUser').val(datos['ndempphp']);
            
            $('#nacUser').val(datos['fnempphp']);
            $('#direcUser').val(datos['dirempphp']);
            $('#fonUser').val(datos['fonempphp']);
            $('#emailUser').val(datos['emempphp']);
           
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
	</script>
</body>
</html>
<?php 
  }else{
    header('Location: ../../');
  }
?>