 <?php 
  require '../../config/conexion.php';
  $sql = $con->query("SELECT * FROM proveedor");
  ?>
<div class="table-responsive">
  <table class="table table-hover table-sm" id="tableprove">
    <thead class="font-primary">
      <tr>
           <th>NOMBRE</th>
           <th>SECTOR</th>
           <th>N° DOC</th>
           <th>DIRECCIÓN</th>
           <th>TELÉFONO</th>
          <th>ACCIONES</th>
      </tr>
    </thead>
    <tbody class="bg-white">
      <?php
        while($mostrarprov = $sql->fetch_row()){
      ?>
      <tr>
        <td><?php echo $mostrarprov[1] ?></td>
        <td><?php echo $mostrarprov[2] ?></td>
        <td><?php echo $mostrarprov[4] ?></td>
        <td><?php echo $mostrarprov[5] ?></td>
        <td><?php echo $mostrarprov[6] ?></td>
        <td>
          <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-purple-warning btn-sm" title="Editar" data-toggle="modal" data-target="#VerprovModalCenter" onclick="obtenDatosProve('<?php echo $mostrarprov[0] ?>')"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-purple-danger btn-sm" title="Eliminar" onclick="eliminarProve('<?php echo $mostrarprov[0] ?>')"><i class="fas fa-trash-alt"></i></button>
          </div>
        </td>
      </tr>
      <?php 
        }
       ?>
    </tbody>
  </table>
</div>
 <script>
  $(document).ready(function() {
    $('#tableprove').DataTable({
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