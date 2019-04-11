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
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6 text-center text-lg-left d-md-flex">
                  <h4 class="my-auto page-title">Cierre de <strong>Caja</strong></h4>
                </div>
                <div class="col-sm-6">
                  <ul class="nav nav-pills nav-pills-primary justify-content-lg-end justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-file mr-2"></i>Nuevo</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-file-alt mr-2"></i>Cierres</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                    </li>
                  </ul>
                </div>
              </div><!--xxxxxxx fin de fila 01-->
              <div class="row mt-3">
                <div class="col-sm-12">
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                      <div class="row">
                        <div class="col-sm-6">
                          <form action="" id="formCaja">
                            <div class="row form-group">
                              <?php
                                date_default_timezone_set('America/Lima');
                                $fechi = date('Y-m-d');
                              ?>
                              <label for="fechacajero" class="col-form-label col-form-label-sm col-sm-4">Fecha</label>
                              <div class="col-sm-8">
                                <input id="fechacajero" class="form-control form-control-sm" type="date" readonly value="<?php echo $fechi ?>">
                              </div>
                            </div>
                            <div class="row form-group">
                              <label for="ventaZon" class="col-form-label col-form-label-sm col-sm-4">Ventas Zonal</label>
                              <div class="col-sm-8">
                                <input id="ventaZon" step="any" name="ventaZon" readonly class="form-control form-control-sm" type="number">
                              </div>
                            </div>
                            <div class="row form-group">
                              <label for="liquidoZon" class="col-form-label col-form-label-sm col-sm-4">Monto Liquidación</label>
                              <div class="col-sm-8">  
                                <input id="liquidoZon" step="any" name="liquidoZon" readonly class="form-control form-control-sm" type="number">
                              </div>
                            </div>
                            <div class="row form-group">
                              <label for="gastoZon" class="col-form-label col-form-label-sm col-sm-4">Gastos Zonal</label>
                              <?php
                                $sql=$con->query("SELECT SUM(precio_gasto) FROM gasto WHERE fecha_gasto='$fechi'");
                                $result=$sql->fetch_row();
                              ?>
                              <div class="col-sm-8">
                                <input id="gastoZon" step="any" name="gastoZon" readonly class="form-control form-control-sm" type="number">
                              </div>
                            </div>
                          </form>
                        </div><!--xxxxx fin de col 06 panel-->
                        <div class="col-sm-6">
                          <div class="row form-group">
                            <label for="totalZon" class="col-form-label col-sm-4">Total Caja</label>
                            <div class="col-sm-4">
                              <input id="totalZon" name="totalZon" step="any" readonly class="form-control" type="number" name="cajaemp">
                            </div>
                            <div class="col-sm-4">
                              <button type="button" id="btnviewDate" class="btn btn-warning-melody w-100"> <i class="fas fa-check mr-2"></i> Validar</button>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-12">
                              <button type="button" id="btnsaveDate" class="btn btn-success-melody w-100"><i class="fas fa-save mr-2"></i>Guardar</button>
                            </div>
                          </div>
                        </div><!--xxxx fin de col 06 panel 01-->
                      </div><!--xxxx fin de row panel 01-->
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                      <div id="tabCaja" class="table-responsive"></div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                      asdadadsadsadas 03
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