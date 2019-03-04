<?php 
	session_start();
	require '../../config/conexion.php';
	
	$clivenfrm=$_POST['cliVen'];//cliente 
	$provenfrm=$_POST['producVen'];//producto
	$canvenfrm=$_POST['cantVen'];//cantidad
	$desvenfrm=$_POST['descuVen'];//descuento
	$tipvenfrm=$_POST['fierroVen'];//tipo de venta
	$precivfrm=$_POST['preVenta'];//precio final monto
	$sllvenfrm=$_POST['stockllVen'];// llenos
	$svavenfrm=$_POST['stockvacVen'];//vacios

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
				$tipvenfrm."||".
				$desvenfrm;

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