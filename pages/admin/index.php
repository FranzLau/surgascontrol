<?php 
  session_start();
  require '../../config/conexion.php';
  require '../../config/ventas.php';
  date_default_timezone_set('America/Lima');
  if (isset($_SESSION['loggedIN'])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include("head.php"); ?>
</head>
<body style="background: #F2F4F4">
  <?php include('navbar.php'); ?>
    <!--AQUI VA LA INFORMACION------>
  <div class="container">
  
    <!---**************************************************************************
    <div class="row mt-5">
      <div class="col-sm-6 text-center text-lg-left">
        <h3 class="page-title">Panel de Control</h3>
      </div>
    </div>
  ***************************************************************************-->
    <div class="row mt-5">
      <div class="col-sm-4">
        <div class="d-flex">
          <img src="../../assets/css/img/mansurgas.png" class="m-auto">
        </div>
      </div>
      <div class="col-sm-8 text-white">
        <div class="row mb-3 mt-3 mt-lg-0">
          <div class="col-sm-12 text-center text-lg-left">
            <h3 class="page-title">Panel de Control</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="card bg-navbar-primary">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4 text-center pb-4 pb-lg-0">
                    <p><i class="fas fa-hourglass-start mr-2"></i>Llenos</p>
                    <?php 
                    $sql = $con->query("SELECT SUM(stock_llenos) FROM producto WHERE tipo_producto='Balon' ");
                    $result = $sql->fetch_row();
                    $ver = $result[0];
                    ?>
                    <h2 class="size-h2"><?php echo $ver; ?></h2>
                    <label class="badge badge-pill badge-outline-success">27% Increase</label>
                  </div>
                  <div class="col-sm-4 text-center pb-4 pb-lg-0">
                    <p><i class="fas fa-hourglass-half mr-2"></i>Vacios</p>
                    <?php
                    $sql = $con->query("SELECT SUM(stock_vacios) FROM producto WHERE tipo_producto='Balon'");
                    $result = $sql->fetch_row();
                    $verva = $result[0];
                    ?>
                    <h2 class="size-h2"><?php echo $verva ?></h2>
                    <label class="badge badge-pill badge-outline-success">27% Increase</label>
                  </div>
                  
                  <div class="col-sm-4 text-center">
                    <p><i class="fas fa-chart-line mr-2"></i>Ventas</p>
                    <h2 class="size-h2">000</h2>
                    <label class="badge badge-pill badge-outline-success">27% Increase</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-sm-12">
            <div class="alert alert-warning" role="alert">
              <div class="row">
                <div class="col-sm-4 d-flex mb-3 mb-lg-0">
                  <h1 class="alert-heading m-auto"><i class="fas fa-exclamation-triangle fa-2x"></i></h1>
                </div>
                <div class="col-sm-8">
                  <p><strong>Advertencia!</strong> Debes aperturar Caja para poder empezar a usar el sistema. Dale click en el enlace de abajo para ingresar el monto correspondiente.</p>
                  <hr>
                  <p class="mb-0">Aperturar caja <a href="cajero.php" class="alert-link"> Click Aquí</a>.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!---****************************************************************************-->
  
  <!---****************************************************************************-->
   
  <!---*************************************************************
    <div class="row mt-4">
      <div class="col-sm-4">
        <div class="card card-img-holder bg-gradient-danger text-white border-0">
          <div class="card-body card-body-pad">
            <img src="../../assets/css/img/circle.svg" class="card-img-absolute" alt="">
            <h4 class="mb-3">
              Stock
              <i class="fas fa-hourglass-start fa-sm float-right"></i>
            </h4>
            <?php 
            $sql = $con->query("SELECT SUM(stock_llenos) FROM producto WHERE tipo_producto='Balon' ");
            $result = $sql->fetch_row();
            $ver = $result[0];
            ?>
            <h2 class="mb-5"><?php echo $ver; ?></h2>
            <h5>Balones Llenos</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card card-img-holder bg-gradient-info text-white border-0">
          <div class="card-body card-body-pad">
            <img src="../../assets/css/img/circle.svg" class="card-img-absolute" alt="">
            <h4 class="mb-3">
              Stock
              <i class="fas fa-hourglass-half fa-sm float-right"></i>
            </h4>
            <?php 
            $sql = $con->query("SELECT SUM(stock_vacios) FROM producto WHERE tipo_producto='Balon'");
            $result = $sql->fetch_row();
            $verva = $result[0];
            ?>
            <h2 class="mb-5"><?php echo $verva ?></h2>
            <h5>Balones Vacios</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card card-img-holder bg-gradient-success text-white border-0">
          <div class="card-body card-body-pad">
            <img src="../../assets/css/img/circle.svg" class="card-img-absolute" alt="">
            <h4 class="mb-3">
              Caja
              <i class="fas fa-money-bill-wave fa-sm float-right"></i>
            </h4>
            <?php 
            $fechnow = date('Y-m-d');
            $sql = $con->query("SELECT cantidad,precio_venta FROM detalleventa WHERE fecha_venta='$fechnow' ");
            $venta=0;
            while ($result = $sql->fetch_row()) {
              $venta=$venta+($result[0]*$result[1]);
            }
            ?>
            <h2 class="mb-5"><?php echo "s./ ".$venta ?></h2>
            <h5>Caja diaria</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  ************************************************************-->
  <hr>
  <div class="container">
    <footer class="footer">
      <div class="d-sm-flex justify-content-sm-between justify-content-center">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
          Copyright <i class="far fa-copyright"></i>2019 
          <a href="#" target="_blank">SURGAS</a>. Todos los derechos reservados
        </span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
          Desarrollado <i class="fas fa-code text-danger"></i> por Franz Cruz <i class="fas fa-laptop text-danger"></i>
        </span>
      </div>
    </footer>
  </div>
  <!---****************************************************************************-->
  <?php include('scripts.php'); ?>
  <!---****************************************************************************-->
</body>
</html>
<?php 
  }else{
    header('Location: ../../');
  }
 ?>