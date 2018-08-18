<?php 
  session_start();
  require '../../config/conexion.php';
  require '../../config/ventas.php';
  $objc= new ventas();
  if (isset($_SESSION['loggedIN'])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	 <?php include('head.php'); ?>
</head>
<body style="background: #F2F4F4">
	
  <?php include('navbar.php'); ?>
  <?php include('../../modal/modalcompra.php') ?>
	<div class="container">
		<div class="row mt-5">
      <div class="col-sm-6 text-center text-lg-left d-md-flex">
        <h4 class="my-md-auto font-primary">Lista de <strong>Compras</strong></h4>
      </div>
      <div class="col-sm-6 text-center text-lg-right">
        <button type="button" class="btn btn-green-secondary ml-3" data-toggle="modal" data-target="#ModalCompra"><i class="far fa-file fa-sm mr-2"></i> Nueva Compra</button>
      </div>
    </div>
    <hr>
		<div class="row mt-5">
			<div class="col-sm-12">
				<div id="tableCompra"></div>
			</div>
		</div>
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
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tableCompra').load('../componentes/tablecompra.php');
      });
     </script>
     <script type="text/javascript">
      $(document).ready(function() {
        $('#subtotal').change(function() {
          
        $num1 = parseFloat($('#stockComp').val());
        $num2 = parseFloat($('#pcomComp').val());
        $compra = $num1*$num2;
        $('#PagarComp').val('s/. '+$compra);
          
        });
        $('#produComp').change(function() {
          $.ajax({
            url: '../../procesos/ventas/llenarformproducto.php',
            type: 'POST',
            data: "idproducto=" + $('#produComp').val(),
            success:function(r){
              
              datos = jQuery.parseJSON(r);
              
              $('#pventaComp').val(datos['precio_domiciliophp']);
              
            }
          })
        });
      });

     </script>
</body>
</html>
<?php 
  }else{
    header('Location: ../../');
  }
?>