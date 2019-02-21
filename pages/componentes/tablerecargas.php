<?php
require '../../config/conexion.php';
require '../../config/ventas.php';
session_start();
date_default_timezone_set('America/Lima');
$obj = new ventas();
$recfecha = date('Y-m-d');
$sqlr = $con->query("SELECT * FROM recarga WHERE fecha_recarga='$recfecha' GROUP BY id_recarga ");
?>
<table class="table table-hover table-sm" id="tablRecargas">
   <thead class="font-primary">
      <tr>
         <th>FECHA</th>
         <th>CHOFER</th>
         <th>TIPO</th>
         <th>CANT.</th>
         <th>TOTAL</th>
         <th>REPORTE</th>
      </tr>
   </thead>
   <tbody class="bg-white">
      <?php while($verec = $sqlr->fetch_row()){ ?>
      <tr>
         <td><?php echo $verec[3] ?></td>
         <td><?php echo $obj->nombreEmpleado($verec[1]) ?></td>
         <td><?php echo $verec[4] ?></td>
         <td><?php echo $obj->totalRecarga($verec[0]) ?></td>
         <td><?php echo $obj->montoRecarga($verec[0]) ?></td>
         <td>
            <button class="btn btn-danger">PDF</button>
         </td>
      </tr>
      <?php } ?>
   </tbody>
</table>
<script>
  $(document).ready(function() {
    $('#tablRecargas').DataTable({
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