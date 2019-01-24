<?php 
	class ventas {
		public function obtenDatosProducto($idproducto){
			require 'conexion.php';
			$sql = $con->query("SELECT id_producto,
										nom_producto,
										desc_producto,
										stock_llenos,
										stock_vacios,
										precio_zonal,
										precio_domicilio,
										precio_fierro,
										tipo_producto
								FROM producto 
								WHERE id_producto = '$idproducto' ");
			$result = $sql->fetch_row();
			$datos = array('stock_llenosphp'=>$result[3],
							'stock_vaciosphp'=>$result[4],
							'precio_zonalphp'=>$result[5],
							'precio_domiciliophp'=>$result[6],
							'precio_fierrophp'=>$result[7]);
			return $datos;
		}
		public function crearVenta(){
			require 'conexion.php';
			date_default_timezone_set('America/Lima'); 
			$feche = date('Y-m-d');
			$emple=$_SESSION['loggedIN']['id_emp'];
			$idvent = self::creaFolio();
			$datos = $_SESSION['tablaCompraTemp'];
			$r=0;
			for ($i=0; $i < count($datos) ; $i++) {
				$d=explode("||", $datos[$i]);
				$sql=$con->query("INSERT INTO detalleventa (id_detalleventa,
															cantidad,
															precio_venta,
															fecha_venta,
															tipo_venta,
															id_emp,
															id_cliente,
															id_producto) 
									VALUES ('$idvent',
											'$d[3]',
											'$d[4]',
											'$feche',
											'$d[6]',
											'$emple',
											'$d[5]',
											'$d[0]') ");
				$r = $r + $sql;
				self::descuentaCantidad($d[0],$d[3],$d[6]);
			}
			return $r;
		}

		public function creaPartida() {
			require 'conexion.php';
			date_default_timezone_set('America/Lima'); 
			$fechpar = date('Y-m-d');
			$emple=$_SESSION['loggedIN']['id_emp'];
			$idpart = self::creaFolioPartida();
			$datos = $_SESSION['tablaPartidasTemp'];
			$r=0;
			for ($i=0; $i < count($datos) ; $i++){
				$d=explode("||", $datos[$i]);
				$sql=$con->query("INSERT INTO repartidor (id_repartidor,
															placa_re,
															id_producto,
															fecha_re,
															cantidad_re,
															id_emp,
															tipo_prod)
								VALUES ('$idpart',
										'$d[0]',
										'$d[5]',
										'$fechpar',
										'$d[3]',
										'$emple',
										'$d[4]')");
				$r = $r + $sql;
				self::descuentaCantidadPartida($d[5],$d[3],$d[4]);
			}
			return $r;
		}

		public function descuentaCantidadPartida($idprodu,$cantidad,$tipobal){
			require 'conexion.php';
			$sql = $con->query("SELECT stock_llenos,stock_vacios FROM producto WHERE id_producto='$idprodu' ");
			$result = $sql->fetch_row();
			$llenos = $result[0];
			$vacios = $result[1];
			if ($tipobal == "cg"){
				$newllenos = abs($cantidad - $llenos);

				$sql = $con->query("UPDATE producto SET stock_llenos='$newllenos' WHERE id_producto='$idprodu' ");
			}else {
				$newvacios = abs($cantidad - $vacios);
				$sql = $con->query("UPDATE producto SET stock_vacios='$newvacios' WHERE id_producto='$idprodu' ");
			}
		}

		public function obtenDetallesRepartidor($idrepartidor){
			require 'conexion.php';
			$sql = $con->query("SELECT SUM(llega_vacio),SUM(fierro_prestado),SUM(fierro_vendido) FROM detallerepartidor WHERE id_repartidor='$idrepartidor'");
			$reparte=$sql->fetch_row();
			$datos = array('sumvacphp'=>$reparte[0],
							'sumprephp'=>$reparte[1],
							'sumvenphp'=>$reparte[2]);
			return $datos;

		}

		public function descuentaCantidad($idproducto,$cantidad,$tipo){
			require 'conexion.php';
			$sql = $con->query("SELECT stock_llenos,stock_vacios FROM producto WHERE id_producto='$idproducto' ");
			$result = $sql->fetch_row();
			$llenos = $result[0];
			$vacios = $result[1];

			if ($tipo == "G") {
				$newllenos = abs($cantidad - $llenos);
				$newvacios = abs($cantidad + $vacios);

				$sql = $con->query("UPDATE producto SET stock_llenos='$newllenos',stock_vacios='$newvacios' WHERE id_producto='$idproducto' ");
			}elseif ($tipo=="G/E") {
				$newllenos = abs($cantidad - $llenos);
				$sql = $con->query("UPDATE producto SET stock_llenos='$newllenos' WHERE id_producto='$idproducto' ");
			}else{
				$newvacios = abs($cantidad - $vacios);
				$sql = $con->query("UPDATE producto SET stock_vacios='$newvacios' WHERE id_producto='$idproducto' ");
			}
		}

		public function creaFolio(){
			require 'conexion.php';
			$sql = $con->query("SELECT id_detalleventa FROM detalleventa GROUP BY id_detalleventa DESC ");
			$result = $sql->fetch_row();
			$id = $result[0];
			if ($id=="" or $id==null or $id==0) {
				return 1;
			}else{
				return $id + 1;
			}
		}
		public function creaFolioPartida(){
			require 'conexion.php';
			$sql = $con->query("SELECT id_repartidor FROM repartidor GROUP BY id_repartidor DESC ");
			$result = $sql->fetch_row();
			$id = $result[0];
			if ($id=="" or $id==null or $id==0) {
				return 1;
			}else{
				return $id + 1;
			}
		}
		public function creaFolioRepartidor(){
			require 'conexion.php';
			$sql = $con->query("SELECT id_liquidar FROM liquidar GROUP BY id_liquidar DESC");
			$result = $sql->fetch_row();
			$id = $result[0];
			if ($id=="" or $id==null or $id==0) {
				return 1;
			}else{
				return $id + 1;
			}
		}

		public function nombreCliente($idcliente){
			require 'conexion.php';
			$sql = $con->query("SELECT nom_cliente,ape_cliente FROM cliente WHERE id_cliente = '$idcliente' ");
			$result = $sql->fetch_row();
			return $result[0]." ".$result[1];
		}
		public function obtenerTotal($idventa,$idprodu){
			require 'conexion.php';
			$sqlp = $con->query("SELECT cantidad,precio_venta,tipo_venta FROM detalleventa WHERE id_detalleventa = '$idventa' ");
			$total = 0;
			while ($result = $sqlp->fetch_row()) {
				$total=$total+($result[0]*$result[1]);
			}
			return $total;
		}
		public function obtenerMonto($idliqi,$idprodu){
			require 'conexion.php';
			$sql=$con->query("SELECT cantidad_li,precio_li,tipo_balon,descuento_li,gasto_li FROM liquidar WHERE id_liquidar='$idliqi' ");
			$total = 0;
			while ($result = $sql->fetch_row()) {
				$total=$total+((($result[1]-$result[3])*$result[0])-$result[4]);
			}
			return $total;

		}
		public function nombreProducto($idprod){
			require 'conexion.php';
			$sql=$con->query("SELECT nom_producto FROM producto WHERE id_producto= '$idprod' ");
			$result = $sql->fetch_row();
			return $result[0];
		}
		public function obtenDatosRepartidor($idrep){
			require 'conexion.php';
			$sql = $con->query("SELECT cantidad_re,placa_re FROM repartidor WHERE id_repartidor='$idrep' ");
			$result = $sql->fetch_row();
			$datos = array('cantiphp'=>$result[0],
							'placaphp'=>$result[1]);
			return $datos;
		}
		public function nombreRepartidor($idrep){
			require 'conexion.php';
			$sql=$con->query("SELECT id_emp FROM repartidor WHERE id_repartidor='$idrep' ");
			$result=$sql->fetch_row();
			return self::nombreEmpleado($result[0]);
		}
		public function nombreEmpleado($idemp){
			require 'conexion.php';
			$sql = $con->query("SELECT nom_emp,ape_emp FROM empleado WHERE id_emp = '$idemp' ");
			$result = $sql->fetch_row();
			return $result[0]." ".$result[1];
		}

		public function crearLiquidacion(){
			require 'conexion.php';
			date_default_timezone_set('America/Lima'); 
			$fechahoy = date('Y-m-d');
			$emple=$_SESSION['loggedIN']['id_emp'];
			$idliq = self::creaFolioRepartidor();
			$datos = $_SESSION['tablaLiquidaTemp'];
			$r=0;
			for ($i=0; $i < count($datos) ; $i++) { 
				$d=explode("||", $datos[$i]);
				$sql=$con->query("INSERT INTO liquidar (id_liquidar,
															fecha_li,
															cantidad_li,
															tipo_balon,
															precio_li,
															descuento_li,
															gasto_li,
															id_emp,
															id_repartidor,
															id_producto) 
									VALUES ('$idliq',
											'$fechahoy',
											'$d[3]',
											'$d[7]',
											'$d[4]',
											'$d[5]',
											'$d[8]',
											'$emple',
											'$d[6]',
											'$d[0]')");
				$r = $r + $sql;
				self::descuentaCantidad($d[0],$d[3],$d[4]);
			}
			return $r;
		}

	}


 ?>