<?php
require '../../config/conexion.php';
require '../../config/ventas.php';
$obj = new ventas();
date_default_timezone_set('America/Lima');
$fechi = date('Y-m-d');
$idcaja = $_GET['idcaja'];
$sql=$con->query("SELECT * FROM caja WHERE id_caja='$idcaja'");
$result=$sql->fetch_row();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Zonal</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <div class="container-fluid">
    <div class="row">
        <div class="text-left">
            <img src="../../assets/css/img/logofull.png" alt="" height="50px">
        </div>
        <div class="text-right">
            <span class="text-muted">Telf. (052) 247070</span>
            <br>
            <span class="text-muted">Urb. Los Delfines B 04</span>
            <br>
            <span class="text-muted">Tacna</span>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="text-left">
            <h5 class=" font-weight-bold">Reporte Zonal :</h5>
            <?php echo $obj->nombreEmpleado($result[5]) ?>
            <br>
            <strong>Fecha :</strong>
            <span class="text-muted"><?php echo $result[1]; ?></span>
        </div>
        <div class="text-right">
            <h5 class=" font-weight-bold">Detalles</h5>
            <span class="text-muted">Monto Zonal :</span>
            <strong><?php echo $result[3] ?></strong><br>
            <span class="text-muted">Liquidado Zonal :</span>
            <strong><?php echo $result[2] ?></strong><br>
            <span class="text-muted">Gasto Zonal :</span>
            <strong><?php echo $result[4] ?></strong><br>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered table-sm">
                <thead style="background: #4e1631;color: #fff;">
                    <tr>
                        <th scope="col">Folio</th>
                        <th scope="col">Repartidor</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sqliq=$con->query("SELECT * FROM liquidar WHERE fecha_li='$fechi' GROUP BY id_liquidar");
                    //$total=0;
                    while ($verli=$sqliq->fetch_row()):
                    ?>
                    <tr>
                        <th scope="row"><?php echo $verli[0] ?></th>
                        <td><?php echo $obj->nombreRepartidor($verli[8]) ?></td>
                        <td><?php echo $obj->obtenerMonto($verli[0],$verli[9]) ?></td>
                        <td><?php echo $verli[1] ?></td>
                    </tr>
                    <?php
                        //$total=$total+$obj->obtenerMonto($verli[0],$verli[9]);
                        endwhile;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class=" table">
                <tfoot>
                <?php
                $caja=($result[3]+$result[2])-$result[4];
                ?>
				  	<tr style="background:#ECECEC">
				  		<td>Total : <?php echo "S/. ".$caja ?></td>
				  	</tr>
				</tfoot>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class=" text-center">
            Copyright 2018 SURGAS. Todos los derechos reservados.
        </div>
    </div>
    </div>
</body>
</html>