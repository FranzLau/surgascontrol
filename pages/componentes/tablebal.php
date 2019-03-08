<?php 
  session_start();
  require '../../config/conexion.php';
  $sql = $con->query("SELECT id_producto,nom_producto,desc_producto,stock_llenos,stock_vacios,precio_zonal,precio_domicilio,precio_fierro,tipo_producto FROM producto");
 ?>
<div class="table-responsive">
  <table class="table table-hover table-sm" id="tablebal">
    <thead class="font-primary">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>LLENOS</th>
            <th>VACIOS</th>
            <th>ZONAL</th>
            <th>DOMICILIO</th>
            <th>ENVASE</th>
            <th>TIPO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <?php while($mostrarprov = $sql->fetch_row()){ ?>
          <tr>
              <td><?php echo $mostrarprov[0] ?></td>
              <td><?php echo $mostrarprov[1] ?></td>
              <td><?php echo $mostrarprov[3] ?></td>
              <td><?php echo $mostrarprov[4] ?></td>
              <td>s/ <?php echo $mostrarprov[5] ?></td>
              <td>s/ <?php echo $mostrarprov[6] ?></td>
              <td>s/ <?php echo $mostrarprov[7] ?></td>
              <td><?php echo $mostrarprov[8] ?></td> 
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-purple-warning btn-sm" title="Editar" data-toggle="modal" data-target="#editabalModalCenter" onclick="agregaeditarbal('<?php echo $mostrarprov[0] ?>')"><i class="fas fa-edit"></i></button>
                  <?php if ($_SESSION['loggedIN']['acceso_emp'] == "Administrador"):
                  ?>
                  <button type="button" class="btn btn-purple-danger btn-sm" title="Eliminar" onclick="eliminargalon('<?php echo $mostrarprov[0] ?>')"><i class="fas fa-trash-alt"></i></button>
                  <?php endif; ?>
                </div>
              </td>
           </tr>
         <?php } ?>
      </tbody>
  </table>
</div>
<script>
  $(document).ready(function() {
    $('#tablebal').DataTable({
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