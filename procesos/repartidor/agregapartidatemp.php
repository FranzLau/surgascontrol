<?php
    session_start();
    require '../../config/conexion.php';
    $parChofrm=$_POST['parChof'];
	
	$producfrm=$_POST['parprodu'];
    $cantidfrm=$_POST['parcantidad'];
    $tipobal=$_POST['tipobal'];
    
    $sql=$con->query("SELECT nom_emp,ape_emp FROM empleado WHERE id_emp= '$parChofrm' ");
	$emp = $sql->fetch_row();
    $emple = $emp[1]." ".$emp[0];
    
    $sql=$con->query("SELECT nom_producto FROM producto WHERE id_producto = '$producfrm' ");
	$p = $sql->fetch_row();
    $nproducto = $p[0];
    
    $articulo = $nproducto."||".
				$emple."||".
                $cantidfrm."||".
                $tipobal."||".
                $producfrm."||".
                $parChofrm;
                
    $sql=$con->query("SELECT stock_llenos FROM producto WHERE id_producto= '$producfrm' ");
    $st = $sql->fetch_row();
    $lleno = $st[0];

    if ($lleno == 0) {
        echo 2;
    }else{
        if ($cantidfrm <= $lleno) {
            $_SESSION['tablaPartidasTemp'][]=$articulo;
        }else{
            echo 1;
        }
    }

?>