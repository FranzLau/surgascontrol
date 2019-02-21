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
    
    <?php include('../../modal/newmodalbal.php'); ?>
    <?php include('../../modaledit/modaleditbal.php'); ?>
   
    <?php include('navbar.php'); ?>
      <div class="container">
        <div id="printableArea">
        <div class="row mt-5">
          <div class="col-sm-6 text-center text-lg-left d-md-flex">
            <h4 class="my-auto font-primary">Lista de<strong> Productos</strong></h4>
          </div>
          <div class="col-sm-6 text-center text-lg-right">
            
            <button type="button" class="btn btn-green-secondary" data-toggle="modal" data-target="#balonModalCenter"><i class="far fa-file fa-sm mr-2"></i> Nuevo Producto</button>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-12">
            <div id="tableBal" class="table-responsive"></div>
          </div>
        </div>
        
        </div>
      </div>

    <?php include('scripts.php'); ?>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tableBal').load('../componentes/tablebal.php');
      });
    </script>
    <script>
      
      function agregaeditarbal(idbal){
        $.ajax({
          url: '../../procesos/balon/editbal.php',
          type: 'POST',
          
          data: "idbal=" + idbal,
          success:function(r){
            var datos= $.parseJSON(r);
           
            $('#idbalE').val(datos['idbalphp']);
            $('#inputNamepE').val(datos['nombalphp']);
            $('#inputDescripcionE').val(datos['descbalphp']);
            $('#zonalpBale').val(datos['zonabalphp']);
            $('#domiciliopBale').val(datos['domibalphp']);
            $('#fierropBale').val(datos['fierbalphp']);
            $('#inputpresE').val(datos['presbalphp']);
          }
        })
        .done(function(r) {
          console.log(r);
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
      
      }
      function eliminargalon(idbal){
        alertify.confirm("¿Seguro de BORRAR este producto?.",
          function(){
             $.ajax({
              url: '../../procesos/balon/deletebal.php',
              type: 'POST',
              data: "idbal=" + idbal,
              success:function(r){
               if (r==1) {
                $('#tableBal').load('../componentes/tablebal.php');
                alertify.success("Eliminaste con EXITO");
               }else{
                alertify.error("No se pudo Eliminar este producto");
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