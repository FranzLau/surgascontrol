<?php 
  require '../../config/conexion.php';
  $sql = $con->query("SELECT * FROM gasto ");
 ?>
<div class="mt-4 table-responsive">
  <table class="table table-sm table-hover" id="tableGto">
    <thead class="font-primary">
      <tr>
        <th>Fecha</th>
        <th>Empleado</th>
        <th>Tipo</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Opciones</th>
      </tr>
    </thead>
    
    <tbody class="bg-white">
      <?php while($vergasto = $sql->fetch_row()){ ?>
        <tr>
          <td><?php echo $vergasto[3] ?></td>
          <td><?php echo $vergasto[6] ?></td>
          <td><?php echo $vergasto[5] ?></td>
          <td><?php echo $vergasto[2] ?></td>
          <td><?php echo $vergasto[1] ?></td>
          <td>
            
            <button type="button" class="btn btn-warning btn-sm" title="Editar" data-toggle="modal" data-target="#GastoModalEdit" onclick="obtenDatosGasto('<?php echo $vergasto[0] ?>')"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-danger btn-sm" title="Eliminar" onclick="eliminarGastos('<?php echo $vergasto[0] ?>')"><i class="fas fa-trash-alt"></i></button>
          </td>
        </tr>
       <?php } ?>
    </tbody>
  </table>
</div>
<script>
  $(document).ready(function() {
    $('#tableGto').DataTable({
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