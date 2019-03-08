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
    
    <?php include('../../modal/newclimodal.php'); ?>
    <?php include('../../modaledit/modaleditcli.php'); ?>
    <?php include('navbar.php'); ?>

  <div class="container">
    <div class="row mt-5">
      <div class="col-sm-6 text-center text-lg-left d-md-flex">
        <h4 class="my-auto font-primary">LISTA DE <strong>CLIENTES</strong></h4>
      </div>
      <div class="col-sm-6 text-center text-lg-right">
        <button type="button" class="btn btn-green-secondary" data-toggle="modal" data-target="#cliModalCenter"><i class="far fa-file fa-sm mr-2"></i> Nuevo Cliente</button>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-12">
        <div id="tableCli"></div>
      </div>
    </div>
  </div>
    <?php include('scripts.php'); ?>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tableCli').load('../componentes/tablecli.php');
      });
    </script>
    <script type="text/javascript">
      function obtencliente(idcli){
        $.ajax({
          url: '../../procesos/cliente/editcli.php',
          type: 'POST',
          data: "idcli=" + idcli,
          success:function(r){
            var datos= $.parseJSON(r);
            
            $('#idcliC').val(datos['idcliphp']);
            $('#inputnomC').val(datos['nomcliphp']);
            $('#inputapeC').val(datos['apecliphp']);
            $('#sexcliC').val(datos['sexcliphp']);
            $('#inputDateC').val(datos['fncliphp']);
            $('#inputDtipo').val(datos['tdcliphp']);
            $('#inputDcli').val(datos['ndcliphp']);
            $('#inputdirC').val(datos['dircliphp']);
            $('#inputfonC').val(datos['fnocliphp']);
            $('#emailcliC').val(datos['mailcliphp']);
          }
        })
      }
      function eliminarcliente(idcli){
        alertify.confirm("¿Seguro de BORRAR el cliente?.",
          function(){
            $.ajax({
              url: '../../procesos/cliente/deletecli.php',
              type: 'POST',
              data: "idcli=" + idcli,
              success:function(r){
               if (r==1) {
                $('#tableCli').load('../componentes/tablecli.php');
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