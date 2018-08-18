<?php 
  require '../../config/conexion.php';
  require '../../config/ventas.php';
  $obj = new ventas();
  $sql = $con->query("SELECT id_detalleventa,fecha_venta,id_cliente,tipo_venta,id_producto FROM detalleventa GROUP BY id_detalleventa");
 ?>
<table class="table table-sm table-hover" id="tableVen">
  <thead class="font-primary">
    <tr>
      <th>FOLIO</th>
      <th>FECHA</th>
      <th>CLIENTE</th>
      <th>TIPO</th>
      <th>TOTAL</th>
      <th>TICKET</th>
      <th>REPORTE</th>
    </tr>
  </thead>
  <tbody class="bg-white">
    <?php while ($ver = $sql->fetch_row()): ?>
    <tr>
      <td><?php echo $ver[0]; ?></td>
      <td><?php echo $ver[1]; ?></td>
      <td>
        <?php 
          if ($obj->nombreCliente($ver[2])==" ") {
            echo "Zonal";
          }else{
            echo $obj->nombreCliente($ver[2]);
          }
         ?>
      </td>
      <td><?php echo $ver[3] ?></td>
      <td>
        <?php 
          echo "S/.".$obj->obtenerTotal($ver[0],$ver[4]);
         ?>
      </td>
      <td>
        <a href="../../procesos/ventas/crearTicketpdf.php?idventa=<?php echo $ver[0] ?>" class="btn btn-sm btn-warning"><i class="fas fa-file-alt"></i> Ticket</a>
      </td>
      <td>
        <a href="../../procesos/ventas/crearReportepdf.php?idventa=<?php echo $ver[0] ?>" class="btn btn-sm btn-danger"><i class="fas fa-file-pdf"></i> Reporte</a>
      </td>
    </tr>
    <?php endwhile;  ?>
  </tbody>
</table>
<script>
  $(document).ready(function() {
    $('#tableVen').DataTable({
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