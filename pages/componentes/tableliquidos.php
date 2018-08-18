<?php 
	require '../../config/conexion.php';
	require '../../config/ventas.php';
	$obj = new ventas();
	$sql=$con->query("SELECT id_liquidar,fecha_li,tipo_balon,id_repartidor,id_producto FROM liquidar GROUP BY id_liquidar");
 ?>

 <table class="table" id="tabliquis">
  <thead class="font-primary">
    <tr>
      <th>FOLIO</th>
      <th>FECHA</th>
      <th>CHOFER</th>
      <th>TIPO</th>
      <th>MONTO</th>
      <th>REPORTE</th>
    </tr>
  </thead>
  <tbody class="bg-white">
  	<?php while ($ver = $sql->fetch_row()): ?>
    <tr>
      <td><?php echo $ver[0] ?></td>
      <td><?php echo $ver[1] ?></td>
      <td><?php echo $obj->nombreRepartidor($ver[3]) ?></td>
      <td><?php echo $ver[2] ?></td>
      <td><?php echo "S/.".$obj->obtenerMonto($ver[0],$ver[4]) ?></td>
      <td>
      	<a href="../../procesos/liquidar/crearReporteLiqPdf.php?idliqi=<?php echo $ver[0] ?>" class="btn btn-sm btn-danger"><i class="fas fa-file-pdf"></i> Reporte</a>
      </td>
    </tr>
    <?php endwhile;  ?>
  </tbody>
</table>
<script type="text/javascript">
      $(document).ready(function() {
        $('#tabliquis').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nada encontrado, lo siento!",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "Buscar",
                "paginate": {
                  "first":      "Primero",
                  "previous":   "Anterior",
                  "next":       "Siguiente",
                  "last":       "Último"
                }
            }
        });
      });
 </script>