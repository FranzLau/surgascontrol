<?php 
	/**
	 
	 */
	
	class crud {
		
		public function obtenDatosBal($idbal){
			require 'conexion.php';
			$sql = $con->query("SELECT id_producto,nom_producto,desc_producto,precio_zonal,precio_domicilio,precio_fierro,tipo_producto FROM producto WHERE id_producto = '$idbal' ");
			$verbal = $sql->fetch_row();
			$datos = array('idbalphp' => $verbal[0],
							'nombalphp'=>$verbal[1],
							'descbalphp'=>$verbal[2],
							'zonabalphp'=>$verbal[3],
							'domibalphp'=>$verbal[4],
							'fierbalphp'=>$verbal[5],
							'presbalphp'=>$verbal[6]);
			return $datos;
		}

		public function deleteBal($idbal){
			require 'conexion.php';
			$sql = $con->query("DELETE FROM producto WHERE id_producto = '$idbal' ");
			return $sql;
		}
		/*CODIGO PARA CLIENTE *****************************/
		public function obtendatosCli($idcli){
			require 'conexion.php';
			$sql = $con->query("SELECT id_cliente,nom_cliente,ape_cliente,sexo_cliente,fechnac_cliente,tipodoc_cliente,numdoc_cliente,dir_cliente,telf_cliente,email_cliente FROM cliente WHERE id_cliente='$idcli'");
			$vercli = $sql->fetch_row();
			$datos = array('idcliphp'=> $vercli[0],
							'nomcliphp'=>$vercli[1],
							'apecliphp'=>$vercli[2],
							'sexcliphp'=>$vercli[3],
							'fncliphp'=>$vercli[4],
							'tdcliphp'=>$vercli[5],
							'ndcliphp'=>$vercli[6],
							'dircliphp'=>$vercli[7],
							'fnocliphp'=>$vercli[8],
							'mailcliphp'=>$vercli[9]);
			return $datos;
		}

		public function deleteCli($idcli){
			require 'conexion.php';
			$sql = $con->query("DELETE FROM cliente WHERE id_cliente = '$idcli' ");
			return $sql;
		}
		/*CODIGO PARA CATEGORIA**********************************/
		public function obtenDatosCat($idcat){
			require 'conexion.php';
			$sql = $con->query("SELECT * FROM categoria WHERE id_categoria='$idcat'");
			$vercat = $sql->fetch_row();
			$datos= array('idcatphp'=>$vercat[0],
							'nomcatphp'=>$vercat[1],
							'descatphp'=>$vercat[2]);
			return $datos;
		}
		public function deleteCat($idcat){
			require 'conexion.php';
			$sql = $con->query("DELETE FROM categoria WHERE id_categoria = '$idcat' ");
			return $sql;
		}
		/*CODIGO PARA TABLA PRESENTACION**************************/
		public function obtenDatosPres($idpres){
			require 'conexion.php';
			$sql = $con->query("SELECT * FROM presentacion WHERE id_presentacion = '$idpres' ");
			$verpres = $sql->fetch_row();
			$datos = array('idpresphp'=> $verpres[0],
							'nompresphp'=>$verpres[1],
							'despresphp'=>$verpres[2]);
			return $datos;
		}
		public function deletePres($idpres){
			require 'conexion.php';
			$sql = $con->query("DELETE FROM presentacion WHERE id_presentacion = '$idpres' ");
			return $sql;
		}
		/*CODIGO PARA TIPO DE CARGO**************************/
		public function obtenDatosCargo($idcarg){
			require 'conexion.php';
			$sql = $con->query("SELECT * FROM cargo WHERE id_cargo = '$idcarg' ");
			$vercargo = $sql->fetch_row();
			$datos = array('idcgphp'=>$vercargo[0],
							'nomcgphp'=>$vercargo[1],
							'descgphp'=>$vercargo[2]);
			return $datos;
		}
		public function deleteCargo($idcarg){
			require 'conexion.php';
			$sql = $con->query("DELETE FROM cargo WHERE id_cargo = '$idcarg' ");
			return $sql;
		}
		/*CODIGO PARA CADA PROVEEDORES******************************/
		public function obtenDatosProve($idprov){
			require 'conexion.php';
			$sql = $con->query("SELECT * FROM proveedor WHERE id_proveedor = '$idprov' ");
			$verprov = $sql->fetch_row();
			$datos = array('idprovphp'=>$verprov[0],
							'rsprovphp'=>$verprov[1],
							'scprovphp'=>$verprov[2],
							'tdprovphp'=>$verprov[3],
							'ndprovphp'=>$verprov[4],
							'dirprovphp'=>$verprov[5],
							'fonprovphp'=>$verprov[6],
							'emailprovphp'=>$verprov[7],
							'urlprovphp'=>$verprov[8]);
			return $datos;
		}
		public function deleteProv($idprov){
			require 'conexion.php';
			$sql = $con->query("DELETE FROM proveedor WHERE id_proveedor = '$idprov' ");
			return $sql;
		}
		/*CODIGO PARA TIPO DE GASTOS************************/
		public function obtenDatosTg($idtga){
			require 'conexion.php';
			$sql = $con->query("SELECT * FROM tipogasto WHERE id_tipogasto = '$idtga' ");
			$vertg = $sql->fetch_row();
			$datos = array('idtgphp'=>$vertg[0],
							'nomtgphp'=>$vertg[1],
							'destgphp'=>$vertg[2]);
			return $datos;
		}
		public function deleteTipoGasto($idtga){
			require 'conexion.php';
			$sql = $con->query("DELETE FROM tipogasto WHERE id_tipogasto = '$idtga' ");
			return $sql;
		}
		/**CODIGO PARA LOS EMPLEADOS************************/
		public function obtenDatosEmple($idemp){
			require 'conexion.php';
			$sql = $con->query("SELECT * FROM empleado WHERE id_emp = '$idemp' ");
			$ver = $sql->fetch_row();
			$datos = array('idempphp'=>$ver[0],
							'nomempphp'=>$ver[1],
							'apempphp'=>$ver[2],
							'sexempphp'=>$ver[3],
							'fnempphp'=>$ver[4],
							'ndempphp'=>$ver[5],
							'dirempphp'=>$ver[6],
							'fonempphp'=>$ver[7],
							'emempphp'=>$ver[8],
							'accempphp'=>$ver[9],
							'pasempphp'=>$ver[10],
							'idcgephp'=>$ver[11],
							'estadoemp'=>$ver[12]);
			return $datos;
		}
		public function deleteEmple($idemp){
			require 'conexion.php';
			$sql = $con->query("DELETE FROM empleado WHERE id_emp = '$idemp' ");
			return $sql;
		}
		/*CODIGOS PARA GASTOS**********************************/
		public function obtenDatosGastar($idgto){
			require 'conexion.php';
			$sql = $con->query("SELECT * FROM gasto WHERE id_gasto= '$idgto' ");
			$ver = $sql->fetch_row();
			$datos = array('idgtophp'=>$ver[0],
							'pcgtophp'=>$ver[1],
							'dcgtophp'=>$ver[2],
							'fgtophp'=>$ver[3],
							'idegtophp'=>$ver[4],
							'idtgtophp'=>$ver[5],
							'empgasta'=>$ver[6]);
			return $datos;
		}
		public function DeleteGastos($idgto){
			require 'conexion.php';
			$sql = $con->query("DELETE FROM gasto WHERE id_gasto = '$idgto' ");
			return $sql;
		}
		/***************************/
		public function deleteSalida($idsal){
			require 'conexion.php';
			$sql=$con->query("DELETE FROM repartidor WHERE id_repartidor = '$idsal' ");
			return $sql;
		}

		public function obtenDatosChofer($idcho){
			require 'conexion.php';
			$sql=$con->query("SELECT * FROM repartidor WHERE id_repartidor='$idcho' ");
			$ver = $sql->fetch_row();
			$datos = array('idrepaphp'=>$ver[0],
							'placaphp'=>$ver[1],
							'zonaphp'=>$ver[2],
							'cantiphp'=>$ver[4],
							'choferphp'=>$ver[5]);
			return $datos;
		}
		public function datosCaja($fb){
			require 'conexion.php';
			$sqlg=$con->query("SELECT SUM(precio_gasto) FROM gasto WHERE fecha_gasto='$fb' ");
			$gasto=$sqlg->fetch_row();

			$sqli=$con->query("SELECT cantidad_li,precio_li,tipo_balon,descuento_li,gasto_li FROM liquidar WHERE fecha_li='$fb' ");
			$totli=0;
			while ($liqui=$sqli->fetch_row()){
				$totli=$totli+((($liqui[1]-$liqui[3])*$liqui[0])-$liqui[4]);
			}

			$sqlv=$con->query("SELECT cantidad,precio_venta,tipo_venta FROM detalleventa WHERE fecha_venta='$fb'");
			$totven=0;
			while ($ventas=$sqlv->fetch_row()){
				$totven=$totven+($ventas[0]*$ventas[1]);
			}

			$caja=($totli+$totven)-$gasto[0];
			$datos = array('gastosphp'=>$gasto[0],
							'totaliq'=>$totli,
							'totalve'=>$totven,
							'cajafull'=>$caja);
			return $datos;
		}
	}

 ?>