<?php 
	require '../config/conexion.php';
	
	$idprofrm = $_POST['prodRec'];
	$cansafrm = $_POST['cantllega'];
	

    $rs = $con->query("SELECT MAX(id_salida) AS id FROM salida");
    if ($row=$rs->fetch_row()) {
    	$id = trim($row[0]);
    	$sql = $con->query("INSERT INTO detallesalida (id_salida,id_producto,cantidad_salida) VALUES ('$id','$idprofrm','$cansafrm') ");

    	if ($sql) {
    		$verte = $con->query("SELECT * FROM detallesalida WHERE id_detallesalida='$id' ");
    		
    		while ($mostrar = $verte->fetch_row()) {
                echo '<ul>';
                echo '<li>'.$mostrar[1].'</li>';
                echo '</ul>';
    		}
    		
		}
    }

    $con->close();
 ?>