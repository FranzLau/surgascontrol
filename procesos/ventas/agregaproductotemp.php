<?php 
	session_start();
	require '../../config/conexion.php';
	$tipvenfrm=$_POST['fierroVen'];
	$clivenfrm=$_POST['cliVen'];
	$provenfrm=$_POST['producVen'];
	$canvenfrm=$_POST['cantVen'];
	$precivfrm=$_POST['preVenta'];
	$sllvenfrm=$_POST['stockllVen'];
	$svavenfrm=$_POST['stockvacVen'];

	$sql=$con->query("SELECT nom_cliente,ape_cliente FROM cliente WHERE id_cliente= '$clivenfrm' ");
	$c = $sql->fetch_row();
	$ncliente = $c[1]." ".$c[0];

	$sql=$con->query("SELECT nom_producto FROM producto WHERE id_producto = '$provenfrm' ");
	$p = $sql->fetch_row();
	$nproducto = $p[0];

	$articulo = $provenfrm."||".
				$nproducto."||".
				$ncliente."||".
				$canvenfrm."||".
				$precivfrm."||".
				$clivenfrm."||".
				$tipvenfrm;

	if ($tipvenfrm=="G" || $tipvenfrm=="G/E") {
		if ($sllvenfrm == 0) {
			echo 2;
		}else{
			if ($canvenfrm <= $sllvenfrm) {
				$_SESSION['tablaCompraTemp'][]=$articulo;
			}else{
				echo 1;
			}
		}
	}else {
		if ($svavenfrm==0) {
			echo 2;
		}else{
			if ($canvenfrm <= $svavenfrm) {
				$_SESSION['tablaCompraTemp'][]=$articulo;
			}else{
				echo 1;
			}
		}
	}

	//$_SESSION['tablaCompraTemp'][]=$articulo;

 ?>