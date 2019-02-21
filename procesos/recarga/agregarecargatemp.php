<?php
session_start();
require '../../config/conexion.php';
$recopt=$_POST['recargaopcion'];
$recchof=$_POST['recargachofer'];
$recprod=$_POST['recargaprod'];
$recesta=$_POST['recargatipo'];
$reccant=$_POST['recargacant'];
$recpfin=$_POST['recargapfin'];
$recprec=$_POST['recargaprec'];

$sql=$con->query("SELECT id_emp FROM repartidor WHERE id_repartidor= '$recchof' ");
$emp = $sql->fetch_row();
$chof = $emp[0];

$sql=$con->query("SELECT nom_emp,ape_emp FROM empleado WHERE id_emp='$chof' ");
$empleado=$sql->fetch_row();
$conductor= $empleado[0]." ".$empleado[1];

$sql=$con->query("SELECT nom_producto FROM producto WHERE id_producto = '$recprod' ");
$p = $sql->fetch_row();
$nproducto = $p[0];

$articulo = $recopt."||".
            $conductor."||".
            $nproducto."||".
            $recpfin."||".
            $recesta."||".
            $reccant."||".
            $recprec."||".
            $chof."||".
            $recprod;

$sql=$con->query("SELECT stock_llenos FROM producto WHERE id_producto= '$recprod' ");
$st = $sql->fetch_row();
$lleno = $st[0];

if ($lleno == 0) {
    echo 2;
}else{
    if ($reccant <= $lleno) {
        $_SESSION['tablaRecargasTemp'][]=$articulo;
    }else{
        echo 1;
    }
}

?>