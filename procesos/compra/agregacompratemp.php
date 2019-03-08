<?php
session_start();
require '../../config/conexion.php';

$idprovecompra = $_POST['provCompra'];
$tipocompra = $_POST['compCompra'];
//$bestadocompra = $_POST['tipoCompra'];
$idprodcompra = $_POST['prodCompra'];
$bllenocompra = $_POST['llenoCompra'];
$bvaciocompra = $_POST['vacioCompra'];
$cantidacompra = $_POST['cantCompra'];
$descuencompra = $_POST['descCompra'];
$pzonalcompra = $_POST['precZonal'];
$penvasecompra = $_POST['precEnvase'];
$montocompra = $_POST['precMonto'];

$sql=$con->query("SELECT razon_social FROM proveedor WHERE id_proveedor= '$idprovecompra' ");
$c = $sql->fetch_row();
$nomprovcompra = $c[0];

$sql=$con->query("SELECT nom_producto FROM producto WHERE id_producto = '$idprodcompra' ");
$p = $sql->fetch_row();
$nomprodcompra = $p[0];

$articulo = $idprovecompra."||".
            $nomprovcompra."||".
            $tipocompra."||".
            //$bestadocompra."||".
            $idprodcompra."||".
            $nomprodcompra."||".
            $bllenocompra."||".
            $bvaciocompra."||".
            $cantidacompra."||".
            $descuencompra."||".
            $pzonalcompra."||".
            $penvasecompra."||".
            $montocompra;

if ($tipocompra=="G") {
    if ($bvaciocompra == 0) {
        echo 2;
    }else{
        if ($cantidacompra <= $bvaciocompra) {
            $_SESSION['CompraTemporal'][]=$articulo;
        }else{
            echo 1;
        }
    }
}else {
    $_SESSION['CompraTemporal'][]=$articulo;
}
?>