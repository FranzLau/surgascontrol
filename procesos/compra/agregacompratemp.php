<?php
session_start();
require '../../config/conexion.php';

$idprovecompra = $_POST['provCompra'];
$tipocompra = $_POST['compCompra'];
$idprodcompra = $_POST['prodCompra'];
$cantidacompra = $_POST['cantCompra'];

$sql=$con->query("SELECT razon_social FROM proveedor WHERE id_proveedor= '$idprovecompra' ");
$c = $sql->fetch_row();
$nomprovcompra = $c[0];

$sql=$con->query("SELECT nom_producto,stock_llenos,stock_vacios FROM producto WHERE id_producto = '$idprodcompra' ");
$p = $sql->fetch_row();
$nomprodcompra = $p[0];
$bllenocompra = $p[1];
$bvaciocompra = $p[2];

$articulo = $idprovecompra."||".
            $nomprovcompra."||".
            $tipocompra."||".
            $idprodcompra."||".
            $nomprodcompra."||".
            $bllenocompra."||".
            $bvaciocompra."||".
            $cantidacompra;

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