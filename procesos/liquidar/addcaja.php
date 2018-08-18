<?php
session_start();
require '../../config/conexion.php';
date_default_timezone_set('America/Lima');
$hoyfecha = date('Y-m-d');

$gastobox = $_POST['gastoZon'];
$ventabox = $_POST['ventaZon'];
$liquibox = $_POST['liquidoZon'];
$emplebox = $_SESSION['loggedIN']['id_emp'];

$sql=$con->query("SELECT COUNT(*) FROM caja WHERE fecha_caja='$hoyfecha'");
$result=$sql->fetch_row();
if($result[0]==0){
    $res = $con->query("INSERT INTO caja (fecha_caja,monto_liquida,monto_venta,monto_gasto,id_emp) VALUES ('$hoyfecha','$liquibox','$ventabox','$gastobox','$emplebox')");
    if ($res) {
        echo json_encode(array('error' => false));
    }else{
        echo json_encode(array('error' => true));
    }
}else{
    echo 0;
}

?>