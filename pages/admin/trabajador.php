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
    <?php include('../../modaledit/modaleditemp.php') ?>
    <?php include('../../modal/modalemp.php'); ?>
    <?php include('navbar.php'); ?>

      <div class="container">
        <div class="row mt-5">
          <div class="col-sm-6 text-center text-lg-left d-md-flex">
            <h4 class="my-auto font-primary">LISTA DE <strong>EMPLEADOS</strong></h4>
          </div>
          <div class="col-sm-6 text-center text-lg-right">
            <button type="button" class="btn btn-green-secondary" data-toggle="modal" data-target="#empModalCenter"><i class="far fa-file fa-sm mr-2"></i> Nuevo Empleado</button>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-12">
            <div id="tabEmp"></div>
          </div>
        </div>  
      </div>
    
    <?php include('scripts.php'); ?>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tabEmp').load('../componentes/tableemp.php');
      });
    </script>
    <script>
      function obtenDatosEmp(idemp){
        $.ajax({
          url: '../../procesos/empleado/editemp.php',
          type: 'POST',
          data: "idemp=" + idemp,
          success:function(r){
            var datos = $.parseJSON(r);
            $('#idemP').val(datos['idempphp']);
            $('#inputemP').val(datos['nomempphp']);
            $('#inputapeP').val(datos['apempphp']);
            $('#inputSexemP').val(datos['sexempphp']);
            $('#inputDatemP').val(datos['fnempphp']);
            $('#inputDemP').val(datos['ndempphp']);
            $('#inputdiremP').val(datos['dirempphp']);
            $('#inputfonemP').val(datos['fonempphp']);
            $('#inputEmailemP').val(datos['emempphp']);
            $('#inputAccemP').val(datos['accempphp']);
            $('#inputpassP').val(datos['pasempphp']);
            $('#inputcgemP').val(datos['idcgephp']);
            $('#selestadoE').val(datos['estadoemp']);
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
      function eliminarEmple(idemp){
        alertify.confirm("¿Seguro de BORRAR al empleado?.",
          function(){
             $.ajax({
              url: '../../procesos/empleado/deletemp.php',
              type: 'POST',
              data: "idemp=" + idemp,
              success:function(r){
               if (r==1) {
                $('#tabEmp').load('../componentes/tableemp.php');
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