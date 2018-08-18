<?php
    session_start();
  require '../../config/conexion.php';
  require '../../config/ventas.php';
  $obj= new ventas;
  $sql=$con->query("SELECT * from caja");
?>
<table class="table table-sm" id="tablecajero">
  <thead class="font-primary">
    <tr>
      <th scope="col">Fecha</th>
      <th scope="col">Empleado</th>
      <th scope="col">M. Zonal</th>
      <th scope="col">M. Liquidado</th>
      <th scope="col">M. Gastos</th>
      <th scope="col">Total</th>
      <th scope="col">Reporte</th>
    </tr>
  </thead>
  <tbody class="bg-white">
  <?php while ($result=$sql->fetch_row()){ ?>
    <tr>
      <th scope="row"><?php echo $result[1] ?></th>
      <td><?php echo $obj->nombreEmpleado($result[5]) ?></td>
      <td><?php echo $result[3] ?></td>
      <td><?php echo $result[2] ?></td>
      <td><?php echo $result[4] ?></td>
      <td><?php echo $total=($result[3]+$result[2])-$result[4] ?></td>
      <td>
        <a href="../../procesos/liquidar/crearReporteCajapdf.php?idcaja=<?php echo $result[0] ?>" class="btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i> Reporte</a>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<script>
  $(document).ready(function() {
    $('#tablecajero').DataTable({
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