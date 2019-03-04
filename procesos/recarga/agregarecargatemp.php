<?php
session_start();
require '../../config/conexion.php';
$recopt=$_POST['recargaopcion']; //tipo Entrada o Salida
$recchof=$_POST['recargachofer']; // id de repartidor
$recprod=$_POST['recargaprod']; // id de producto
$recesta=$_POST['recargaestado']; // estado del producto
$rectipo=$_POST['recargatipo']; // balon prestado o vendido o robado
$reccant=$_POST['recargacant']; // cantidad recarga
$recpfin=$_POST['recargapfin']; // precio sub total
$recprec=$_POST['recargaprec']; // precio del gas o producto

//Aqui consigo el id del empleado o chofer
$sql=$con->query("SELECT id_emp FROM repartidor WHERE id_repartidor= '$recchof' ");
$emp = $sql->fetch_row();
$chof = $emp[0];

// con el id del chofer puedo obtener su nombre
$sql=$con->query("SELECT nom_emp,ape_emp FROM empleado WHERE id_emp='$chof' ");
$empleado=$sql->fetch_row();
$conductor= $empleado[0]." ".$empleado[1];

// con id del producto consigo el nombre del producto
$sql=$con->query("SELECT nom_producto FROM producto WHERE id_producto = '$recprod' ");
$p = $sql->fetch_row();
$nproducto = $p[0];

//hacer que los llenos al entrar no cobre
if ($recopt=="E") {
    if ($recesta=="G/E") {
        if ($rectipo=="N") {
            $recpfin=0;
        }elseif ($rectipo=="R") {
            $recpfin= -$recpfin;
        }
        
    }elseif ($recesta=="E") {
        if ($rectipo=="P") {
            $recpfin = -$recpfin;
        }
    }
}

$articulo = $recopt."||".
            $conductor."||".
            $nproducto."||".
            $recpfin."||".
            $rectipo."||".
            $reccant."||".
            $recprec."||".
            $chof."||".
            $recprod."||".
            $recesta."||".
            $recchof;

$sql=$con->query("SELECT stock_llenos FROM producto WHERE id_producto= '$recprod' ");
$st = $sql->fetch_row();
$lleno = $st[0];

if ($recopt=="S") {
    if ($lleno == 0) {
        echo 2;
    }else{
        if ($reccant <= $lleno) {
            $_SESSION['tablaRecargasTemp'][]=$articulo;
        }else{
            echo 1;
        }
    }
}else {
    $_SESSION['tablaRecargasTemp'][]=$articulo;
}


?>