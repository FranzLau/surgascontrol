<?php 
	session_start();
	require '../../config/conexion.php';
	$cantidliq = $_POST['cantLiq'];
	$baltipliq = $_POST['tvenLiq'];
	$precioliq = $_POST['prectotLiq'];
	$desctoliq = $_POST['desctoLiq'];
	$reparliq = $_POST['repartLiq'];
	$produliq = $_POST['produLiq'];
	$gastoliq = $_POST['gastoLiq'];
	
	$sql=$con->query("SELECT id_emp FROM repartidor WHERE id_repartidor='$reparliq' ");
	$rep=$sql->fetch_row();
	$nrepartidor=$rep[0];

	$sql=$con->query("SELECT nom_producto FROM producto WHERE id_producto ='$produliq' ");
	$p = $sql->fetch_row();
	$nproducto = $p[0];

	$articulo = $produliq."||".
				$nproducto."||".
				$nrepartidor."||".
				$cantidliq."||".
				$precioliq."||".
				$desctoliq."||".
				$reparliq."||".
				$baltipliq."||".
				$gastoliq;

	$_SESSION['tablaLiquidaTemp'][]=$articulo;

 ?>