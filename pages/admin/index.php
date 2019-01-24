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
    <div class="row mt-5">
      <div class="col-sm-6 text-center text-lg-left d-md-flex">
        <h4 class="my-auto font-primary"><i class="fas fa-chart-pie mr-2"></i> Panel de <strong>Control</strong></h4>
      </div>
      <div class="col-sm-6 d-flex justify-content-center justify-content-lg-end">
        <p class="my-auto">Resumen <i class="fas fa-exclamation-circle"></i></p>
      </div>
    </div>
   <!---****************************************************************************-->
    <div class="row mt-5">
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
              Ventas
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
            <h5>Venta diaria</h5>
          </div>
        </div>
      </div>
    </div>
   <!---****************************************************************************-->
    <div class="row mt-5">
      <div class="col-sm-6">
        <div class="card border-0">
          <div class="card-body card-body-pad">
            <div class="row">
              <div class="col-sm-8">
                <p class="font-primary"><i class="fas fa-warehouse mr-2"></i> Lista de Productos</p>
              </div>
              <div class="col-sm-4 text-right">
                <a href="balones.php"><i class="fas fa-ellipsis-v font-primary"></i></a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive mt-4">
                  <table class="table table-hover">
                    <thead class="font-primary">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">LLENOS</th>
                        <th scope="col">VACIOS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $num=0;
                      $sql = $con->query("SELECT * FROM producto");
                      while ($result = $sql->fetch_row()) {
                      ?>
                      <tr>
                        <td><?php echo $num=$num+1 ?></td>
                        <td><?php echo $result[1] ?></td>
                        <td><?php echo $result[3] ?></td>
                        <td><?php echo $result[4] ?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card border-0">
          <div class="card-body card-body-pad">
            <div class="row">
              <div class="col-sm-8">
                <p class="font-primary"><i class="fas fa-truck mr-2"></i> Repartidores de Hoy</p>
              </div>
              <div class="col-sm-4 text-right">
                <a href="repartidor.php"><i class="fas fa-ellipsis-v font-primary"></i></a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive mt-4">
                  <table class="table">
                    <thead class="font-primary">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Chofer</th>
                        <th scope="col">Placa</th>
                        <th scope="col">Cantidad</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $num=0;
                      $fechnow = date('Y-m-d');
                      $obj = new ventas(); 
                      $sql = $con->query("SELECT * FROM repartidor WHERE fecha_re='$fechnow'");
                      while ($result = $sql->fetch_row()) {
                      ?>
                      <tr>
                        <td><?php echo $num=$num+1 ?></td>
                        <td><?php echo $obj->nombreEmpleado($result[5]) ?></td>
                        <td><?php echo $result[1] ?></td>
                        <td><?php echo $result[4] ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 <!---****************************************************************************-->
    <div class="row mt-5">
      <div class="col-sm-12">
        <div class="card bg-gradient-box">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 d-flex">
                <h2 class="m-auto"><i class="fas fa-phone-volume mr-3"></i>PEDIDOS : (052) 247070 - (052) 248080</h2>
              </div>
            </div>
          </div>
        </div>
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
</body>
</html>
<?php 
  }else{
    header('Location: ../../');
  }
 ?>