<?php 
require '../../config/conexion.php';
require '../../config/ventas.php';
session_start();
date_default_timezone_set('America/Lima');
$obj = new ventas();
$nowfecha = date('Y-m-d');
$sql = $con->query("SELECT * FROM repartidor WHERE fecha_re='$nowfecha' ");
 ?>
<table class="table table-hover table-sm" id="tablerec">
  <thead class="font-primary">
    <tr>
      <th>FECHA</th>
      <th>CHOFER</th>
      <th>PLACA</th>
      <th>ZONA</th>
      <th>CANTIDAD</th>
      <th>ACCIONES</th>
    </tr>
  </thead>
  <tbody class="bg-white">
    <?php while($verep = $sql->fetch_row()){ ?>
    <tr>
      <td><?php echo $verep[3] ?></td>
      <td><?php echo $obj->nombreEmpleado($verep[5]) ?></td>
      <td><?php echo $verep[1] ?></td>
      <td><?php echo $verep[2] ?></td>
      <td><?php echo $verep[4] ?></td>
      <td class="text-center">
        <div class="btn-group" role="group" aria-label="Basic example">
          <button class="btn btn-purple-info btn-sm" data-toggle="modal" data-target="#VerRecargasModal" onclick="obtenDatosChofer('<?php echo $verep[0] ?>')"><i class="fas fa-eye"></i></button>
          <button class="btn btn-purple-warning btn-sm"><i class="fas fa-edit"></i></button>
          <button class="btn btn-purple-danger btn-sm" onclick="eliminarRecarga('<?php echo $verep[0] ?>')" ><i class="fas fa-trash"></i></button>
        </div>
      </td>
    </tr>
    <?php 
      } 
    ?>
  </tbody>
</table>
<script>
  $(document).ready(function() {
    $('#tablerec').DataTable({
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