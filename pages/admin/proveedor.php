<?php 
  session_start();
  require '../../config/conexion.php';
  if (isset($_SESSION['loggedIN'])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include("head.php"); ?>
</head>
<body style="background: #F2F4F4">
    
    <?php include('../../modal/newmodalprov.php'); ?>
    <?php include('../../modaledit/modaleditprov.php'); ?>
    <?php include('navbar.php'); ?>
    
      <div class="container">
        
        <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
        <div class="row mt-5">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6 text-center text-lg-left d-md-flex">
                    <h4 class="my-md-auto page-title"><i class="fas fa-dolly mr-3"></i>Lista de <strong>Proveedores</strong></h4>
                  </div>
                  <div class="col-sm-6 text-center text-lg-right">
                    <button type="button" class="btn btn-primary-melody" data-toggle="modal" data-target="#proveModalCenter"><i class="far fa-file"></i> Nuevo Proveedor</button>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-sm-12">
                    <div class="card">
                      <div class="card-body">
                        <div id="tableProv"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
      </div>
   
     <?php include('scripts.php'); ?>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tableProv').load('../componentes/tableprove.php');
      });
    </script>
    <script type="text/javascript">
      function obtenDatosProve(idprov){
        $.ajax({
          url: '../../procesos/proveedor/editprov.php',
          type: 'POST',
          data: "idprov=" + idprov,
          success:function(r){
            var datos = $.parseJSON(r);
            $('#idproV').val(datos['idprovphp']);
            $('#inputnomV').val(datos['rsprovphp']);
            $('#inputsecV').val(datos['scprovphp']);
            $('#inputTdproV').val(datos['tdprovphp']);
            $('#inputDocproV').val(datos['ndprovphp']);
            $('#inputdirproV').val(datos['dirprovphp']);
            $('#inputfonproV').val(datos['fonprovphp']);
            $('#inputEproV').val(datos['emailprovphp']);
            $('#inputlinkV').val(datos['urlprovphp']);
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
      function eliminarProve(idprov){
        alertify.confirm("¿Seguro de ELIMINAR este PROVEEDOR?.",
          function(){
             $.ajax({
              url: '../../procesos/proveedor/deleteprov.php',
              type: 'POST',
              data: "idprov=" + idprov,
              success:function(r){
               if (r==1) {
                $('#tableProv').load('../componentes/tableprove.php');
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