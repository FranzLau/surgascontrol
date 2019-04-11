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
		// ------------------------------- PARA VENTAS ------------------------
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
															id_producto,
															descuento_ven) 
									VALUES ('$idvent',
											'$d[3]',
											'$d[4]',
											'$feche',
											'$d[6]',
											'$emple',
											'$d[5]',
											'$d[0]',
											'$d[7]') ");
				$r = $r + $sql;
				self::descuentaCantidad($d[0],$d[3],$d[6]);
			}
			return $r;
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
		//------------<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
		public function creaPartida() {
			require 'conexion.php';
			date_default_timezone_set('America/Lima'); 
			$fechpar = date('Y-m-d');
			
			$idpart = self::creaFolioPartida();
			$datos = $_SESSION['tablaPartidasTemp'];
			$r=0;
			for ($i=0; $i < count($datos) ; $i++){
				$d=explode("||", $datos[$i]);
				$sql=$con->query("INSERT INTO repartidor (id_repartidor,
															id_producto,
															fecha_re,
															cantidad_re,
															id_emp,
															tipo_prod)
								VALUES ('$idpart',
										'$d[4]',
										'$fechpar',
										'$d[2]',
										'$d[5]',
										'$d[3]')");
				$r = $r + $sql;
				self::descuentaCantidadPartida($d[4],$d[2],$d[3]);
			}
			return $r;
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
		// ---------------- datos para Liquidar repartidor ------------------------------
		
		public function obtenDatosRepartidor($idrepartidor){
			require 'conexion.php';
			$sql = $con->query("SELECT SUM(cantidad_re), id_emp FROM repartidor WHERE id_repartidor='$idrepartidor' ");
			$result = $sql->fetch_row();
			$idemp = $result[1];
			
			$sqlemp = $con->query("SELECT nom_emp,ape_emp FROM empleado WHERE id_emp='$idemp' ");
			$datosemp = $sqlemp->fetch_row();
			$nomemprepar = $datosemp[0]." ".$datosemp[1];
			
			$sqlrec = $con->query("SELECT precio_recarga,cantidad_recarga FROM recarga WHERE id_repartidor='$idrepartidor' ");
			$total = 0;
			while ($rec = $sqlrec->fetch_row()) {
				$total = $total+($rec[0]*$rec[1]);
			}

			$sqlsalir = $con->query("SELECT COUNT(tipo_recarga) FROM recarga WHERE id_repartidor='$idrepartidor' AND tipo_recarga='S' ");
			$salida=$sqlsalir->fetch_row();

			$datos = array('cantidadinicial'=>$result[0],
							'repartidoremp'=>$nomemprepar,
							'numrecargas'=>$salida[0],
							'preciorecargas'=>$total);
			return $datos;
		}
		public function nombreRepartidor($idrep){
			require 'conexion.php';
			$sql=$con->query("SELECT id_emp FROM repartidor WHERE id_repartidor='$idrep' ");
			$result=$sql->fetch_row();
			return self::nombreEmpleado($result[0]);
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
		// ------------------------------- funciones para Liquidar ---
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
		//----------------------------------------------------------------------------
		
		//------- OTROS DATOS
		public function nombreCliente($idcliente){
			require 'conexion.php';
			$sql = $con->query("SELECT nom_cliente,ape_cliente FROM cliente WHERE id_cliente = '$idcliente' ");
			$result = $sql->fetch_row();
			return $result[0]." ".$result[1];
		}
		public function obtenerTotal($idventa,$idprodu){
			require 'conexion.php';
			$sqlp = $con->query("SELECT cantidad,precio_venta,descuento_ven FROM detalleventa WHERE id_detalleventa = '$idventa' ");
			$total = 0;
			while ($result = $sqlp->fetch_row()) {
				$total=$total+(($result[1]-$result[2])*$result[0]);
			}
			return $total;
		}

		public function totalPartida($idrep){
			require 'conexion.php';
			$sqlre = $con->query("SELECT cantidad_re FROM repartidor WHERE id_repartidor = '$idrep' ");
			$total=0;
			while ($result=$sqlre->fetch_row()){
				$total=$total+$result[0];
			}
			return $total;
		}

		public function obtenerMonto($idliqi){
			require 'conexion.php';
			$sql=$con->query("SELECT saldo_li,gasto_li FROM liquidar WHERE id_liquidar='$idliqi' ");
			$total = 0;
			while ($result = $sql->fetch_row()) {
				$total=$total+($result[0]-$result[1]);
			}
			return $total;

		}
		public function nombreProducto($idprod){
			require 'conexion.php';
			$sql=$con->query("SELECT nom_producto FROM producto WHERE id_producto= '$idprod' ");
			$result = $sql->fetch_row();
			return $result[0];
		}
		public function nombreProveedor($idprove){
			require 'conexion.php';
			$sql=$con->query("SELECT razon_social FROM proveedor WHERE id_proveedor= '$idprove' ");
			$result = $sql->fetch_row();
			return $result[0];
		}
		
		public function nombreEmpleado($idemp){
			require 'conexion.php';
			$sql = $con->query("SELECT nom_emp,ape_emp FROM empleado WHERE id_emp = '$idemp' ");
			$result = $sql->fetch_row();
			return $result[0]." ".$result[1];
		}
		
		// -------Aqui empezaremos a crear la funcion para ------------ CREAR RECARGA ---------------
		public function FolioRecarga(){
			require 'conexion.php';
			$sql = $con->query("SELECT id_recarga FROM recarga GROUP BY id_recarga DESC");
			$result = $sql->fetch_row();
			$id = $result[0];
			if ($id=="" or $id==null or $id==0) {
				return 1;
			}else{
				return $id + 1;
			}
		}
		public function crearRecargas(){
			require 'conexion.php';
			date_default_timezone_set('America/Lima'); 
			$fecharec = date('Y-m-d');
			$idrec = self::FolioRecarga();
			$datos = $_SESSION['tablaRecargasTemp'];
			$r=0;
			for ($i=0; $i < count($datos) ; $i++){
				$d=explode("||", $datos[$i]);
				$sql=$con->query("INSERT INTO recarga (id_recarga,
														id_repartidor,
														id_emp,
														id_producto,
														fecha_recarga,
														tipo_recarga,
														estado_recarga,
														cantidad_recarga,
														balon_recarga,
														precio_recarga) 
									VALUES ('$idrec',
											'$d[10]',
											'$d[7]',
											'$d[8]',
											'$fecharec',
											'$d[0]',
											'$d[9]',
											'$d[5]',
											'$d[4]',
											'$d[3]')");
				$r = $r + $sql;
				self::descuentaStock($d[8],$d[5],$d[0],$d[9]);
			}
			return $r;
		}
		public function descuentaStock($idprod,$cantidad,$tipo,$estado){
			require 'conexion.php';
			$sql = $con->query("SELECT stock_llenos,stock_vacios FROM producto WHERE id_producto='$idprod' ");
			$result = $sql->fetch_row();
			$llenos = $result[0];
			$vacios = $result[1];

			if ($tipo=="S"){
				if ($estado=="G") {
					$newllenos = abs($cantidad - $llenos);
					$newvacios = abs($cantidad + $vacios);

					$sql = $con->query("UPDATE producto SET stock_llenos='$newllenos',stock_vacios='$newvacios' WHERE id_producto='$idprod' ");
				}elseif($estado=="G/E"){
					$newllenos = abs($cantidad - $llenos);
					$sql = $con->query("UPDATE producto SET stock_llenos='$newllenos' WHERE id_producto='$idprod' ");
				}else{
					$newvacios = abs($cantidad - $vacios);
					$sql = $con->query("UPDATE producto SET stock_vacios='$newvacios' WHERE id_producto='$idprod' ");
				}
			}else {
				if ($estado=="G/E") {
					$newllenos = abs($cantidad + $llenos);
					$sql = $con->query("UPDATE producto SET stock_llenos='$newllenos' WHERE id_producto='$idprod' ");
				}elseif($estado=="E"){
					$newvacios = abs($cantidad + $vacios);
					$sql = $con->query("UPDATE producto SET stock_vacios='$newvacios' WHERE id_producto='$idprod' ");
				}
			}
		}
		public function totalRecarga($idrec){
			require 'conexion.php';
			$sqlre = $con->query("SELECT cantidad_recarga FROM recarga WHERE id_recarga = '$idrec' ");
			$total=0;
			while ($result=$sqlre->fetch_row()){
				$total=$total+$result[0];
			}
			return $total;
		}
		public function montoRecarga($idrec){
			require 'conexion.php';
			$sqlre = $con->query("SELECT cantidad_recarga,precio_recarga FROM recarga WHERE id_recarga = '$idrec' ");
			$total=0;
			while ($result=$sqlre->fetch_row()){
				$total=$total+($result[0]*$result[1]);
			}
			return $total;
		}
		//--------------------------<<<<<<funciones para  COMPRAR>>>>>>>-------------------------
		public function FolioCompra(){
			require 'conexion.php';
			$sql = $con->query("SELECT id_detalleingreso FROM detalleingreso GROUP BY id_detalleingreso DESC");
			$result = $sql->fetch_row();
			$id = $result[0];
			if ($id=="" or $id==null or $id==0) {
				return 1;
			}else{
				return $id + 1;
			}
		}
		public function crearCompras(){
			require 'conexion.php';
			date_default_timezone_set('America/Lima'); 
			$fechacompra = date('Y-m-d');
			$idemp=$_SESSION['loggedIN']['id_emp'];
			$idcompra = self::FolioCompra();
			$datos = $_SESSION['CompraTemporal'];
			$r=0;
			for ($i=0; $i < count($datos) ; $i++){
				$d=explode("||", $datos[$i]);
				$sql=$con->query("INSERT INTO detalleingreso (id_detalleingreso,
														cantidad_ingreso,
														fecha_compra,
														tipo_compra,
														id_producto,
														id_emp,
														id_proveedor)
														 
									VALUES ('$idcompra',
											'$d[7]',
											'$fechacompra',
											'$d[2]',
											'$d[3]',
											'$idemp',
											'$d[0]')");
				$r = $r + $sql;
				self::descuentaCompra($d[3],$d[7],$d[2]);
			}
			return $r;
		}
		public function descuentaCompra($idprod,$cantidad,$tipo){
			require 'conexion.php';
			$sql = $con->query("SELECT stock_llenos,stock_vacios FROM producto WHERE id_producto='$idprod' ");
			$result = $sql->fetch_row();
			$llenos = $result[0];
			$vacios = $result[1];

			if ($tipo == "G") {
				$newllenos = abs($cantidad + $llenos);
				$newvacios = abs($cantidad - $vacios);

				$sql = $con->query("UPDATE producto SET stock_llenos='$newllenos',stock_vacios='$newvacios' WHERE id_producto='$idprod' ");
			}elseif ($tipo=="G/E") {
				$newllenos = abs($cantidad + $llenos);
				$sql = $con->query("UPDATE producto SET stock_llenos='$newllenos' WHERE id_producto='$idprod' ");
			}else{
				$newvacios = abs($cantidad + $vacios);
				$sql = $con->query("UPDATE producto SET stock_vacios='$newvacios' WHERE id_producto='$idprod' ");
			}
		}
		public function TotalCompra($idcompra){
			require 'conexion.php';
			$sqlp = $con->query("SELECT cantidad_ingreso,precio_ingreso,descuento_compra FROM detalleingreso WHERE id_detalleingreso = '$idcompra' ");
			$total = 0;
			while ($result = $sqlp->fetch_row()) {
				$total=$total+(($result[1]-$result[2])*$result[0]);
			}
			return $total;
		}
	}


 ?>