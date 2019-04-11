<?php 
	session_start();
	require '../../config/conexion.php';
	
	$clivenfrm=$_POST['cliVen'];//cliente 
	$provenfrm=$_POST['producVen'];//producto
	$canvenfrm=$_POST['cantVen'];//cantidad
	$desvenfrm=$_POST['descuVen'];//descuento
	$tipvenfrm=$_POST['fierroVen'];//tipo de venta
	//$precivfrm=$_POST['preVenta'];//precio final monto
	//$sllvenfrm=$_POST['stockllVen'];// llenos
	//$svavenfrm=$_POST['stockvacVen'];//vacios

	$sql=$con->query("SELECT nom_cliente,ape_cliente FROM cliente WHERE id_cliente= '$clivenfrm' ");
	$c = $sql->fetch_row();
	$ncliente = $c[1]." ".$c[0];

	$sql=$con->query("SELECT nom_producto,stock_llenos,stock_vacios,precio_zonal,precio_fierro FROM producto WHERE id_producto = '$provenfrm' ");
	$p = $sql->fetch_row();
	$nproducto = $p[0];
	$sllvenfrm = $p[1];
	$svavenfrm = $p[2];
	$preciozon = $p[3];
	$preciofie = $p[4];

	if ($tipvenfrm=="G") {
		$precivfrm=$preciozon;
	}else if($tipvenfrm=="G/E"){
		$precivfrm = $preciozon+ $preciofie;
	}else {
		$precivfrm = $preciofie;
	}

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