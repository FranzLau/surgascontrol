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
    <?php include('navbar.php'); ?>
    <div class="container">
      <div class="row mt-5">
        <div class="col-sm-6 text-center text-lg-left d-md-flex">
          <h4 class="my-auto font-primary">Cierre de <strong>Caja</strong></h4>
        </div>
        <div class="col-sm-6 justify-content-center justify-content-lg-end d-flex">
          <p class="my-auto font-primary"><a href="misliquidaciones.php">Mis Liquidaciones</a></p>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-sm-12">
          <div class="card border-0">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8">
                <form action="" id="formCaja">
                  <div class="form-row">
                    <?php
                      date_default_timezone_set('America/Lima');
                      $fechi = date('Y-m-d');
                    ?>
                    <div class="form-group col-sm-3">
                      <label for="fechacajero" class="col-form-label col-form-label-sm">Fecha</label>
                      <input id="fechacajero" class="form-control form-control-sm" type="date" readonly value="<?php echo $fechi ?>">
                    </div>
                  </div>
                  <div class="form-row">
                  <?php
                    $sql=$con->query("SELECT SUM(precio_gasto) FROM gasto WHERE fecha_gasto='$fechi'");
                    $result=$sql->fetch_row();
                  ?>
                    <div class="form-group col-sm-3">
                      <label for="ventaZon" class="col-form-label col-form-label-sm">Ventas Zonal</label>
                      <input id="ventaZon" step="any" name="ventaZon" readonly class="form-control form-control-sm" type="number">
                    </div>
                    <div class="form-group col-sm-3">
                      <label for="liquidoZon" class="col-form-label col-form-label-sm">Monto Liquidación</label>
                      <input id="liquidoZon" step="any" name="liquidoZon" readonly class="form-control form-control-sm" type="number">
                    </div>
                    <div class="form-group col-sm-3">
                      <label for="gastoZon" class="col-form-label col-form-label-sm">Gastos Zonal</label>
                      <input id="gastoZon" step="any" name="gastoZon" readonly class="form-control form-control-sm" type="number">
                    </div>
                    <div class="form-group col-sm-3">
                      <label for="totalZon" class="col-form-label col-form-label-sm">Total Caja</label>
                      <input id="totalZon" name="totalZon" step="any" readonly class="form-control form-control-sm" type="number" name="cajaemp">
                    </div>
                  </div>
                </form>
                </div>
                <div class="col-sm-4 d-flex">
                  <div class="m-auto">
                    <button type="button" id="btnviewDate" class="btn btn-warning w-75 mb-3"> <i class="fas fa-check fa-xs mr-2"></i> Validar</button>
                    <button type="button" id="btnsaveDate" class="btn btn-success w-75" disabled="disabled"><i class="fas fa-save fa-xs mr-2"></i> Guardar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-sm-6 text-center text-lg-left d-md-flex">
          <h4 class="my-auto font-primary">Lista de <strong>Cerrajes</strong></h4>
        </div>
        <div class="col-sm-6 justify-content-center justify-content-lg-end d-flex">
          <p class="my-auto font-primary"><a href="misliquidaciones.php">Mis Liquidaciones</a></p>
        </div>
      </div>
      <hr>
      <div class="row mt-5">
        <div class="col-sm-12">
          <div id="tabCaja" class="table-responsive"></div>
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
        $('#tabCaja').load('../componentes/tablecaja.php');
      });
    </script>
    <script>
      $('#btnviewDate').click(function () { 
        var fb = $('#fechacajero').val();
        $.ajax({
          type: "POST",
          url: "../../procesos/liquidar/cerrarcaja.php",
          data: "fb="+fb,
          success: function (response) {
            var datos= $.parseJSON(response);
            $('#gastoZon').val(datos['gastosphp']);
            $('#liquidoZon').val(datos['totaliq']);
            $('#ventaZon').val(datos['totalve']);
            $('#totalZon').val(datos['cajafull']);
            $('#btnsaveDate').removeAttr('disabled');
            $('#btnviewDate').attr('disabled','disabled');
          }
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