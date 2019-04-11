<?php
require '../../config/conexion.php';
session_start();
$idrepartidorliq = $_POST['chofliquida'];
$inicialreparliq = $_POST['liqinicial'];
$numrecargasliq = $_POST['numrecliq'];
$subsaldoliq = $_POST['saldoliq'];
$gastoliq = $_POST['gastoliq'];

date_default_timezone_set('America/Lima'); 
$fechaliq = date('Y-m-d');
$idemple = $_SESSION['loggedIN']['id_emp'];

$res = $con->query("INSERT INTO liquidar (fecha_li,inicial_li,recargas_li,saldo_li,gasto_li,id_emp,id_repartidor) VALUES ('$fechaliq','$inicialreparliq','$numrecargasliq','$subsaldoliq','$gastoliq','$idemple','$idrepartidorliq')");
if ($res) {
    echo json_encode(array('error' => false));
}else{
    echo json_encode(array('error' => true));
}

$con->close();
?>