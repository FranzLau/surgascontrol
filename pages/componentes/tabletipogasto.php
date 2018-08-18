<?php 
  require '../../config/conexion.php';
  $sql = $con->query("SELECT * FROM tipogasto");
 ?>
<div class="table-responsive">
  <table class="table table-hover" id="tabletgast">
    <thead class="font-primary">
      <tr>
          <th>NOMBRE</th>
          <th>DESCRIPCIÓN</th>
          <th>ACCIONES</th>
      </tr>
    </thead>
    <tbody class="bg-white">
      <?php while($mostrartg = $sql->fetch_row()){ ?>
        <tr>
          <td><?php echo $mostrartg[1] ?></td>
          <td><?php echo $mostrartg[2] ?></td>
          <td>
            
            <button type="button" class="btn btn-purple-warning btn-sm" title="Editar" data-toggle="modal" data-target="#vertgastoModalCenter" onclick="obtenTipoGasto('<?php echo $mostrartg[0] ?>')"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-sm btn-purple-danger" title="Eliminar" onclick="eliminarTipoGasto('<?php echo $mostrartg[0] ?>')" ><i class="fas fa-trash-alt"></i></button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>