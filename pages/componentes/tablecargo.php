<?php 
  require '../../config/conexion.php';
  $sql = $con->query("SELECT * FROM cargo");
 ?>
<div class="table-responsive">
  <table class="table table-hover" id="tableCgo">
    <thead class="font-primary">
      <tr>
          <th>NOMBRE</th>
          <th>DESCRIPCIÓN</th>
          <th>ACCIONES</th>
      </tr>
    </thead>
    <tbody class="bg-white">
      <?php while($mostrarcar = $sql->fetch_row()){ ?>
        <tr>
          <td><?php echo $mostrarcar[1] ?></td>
          <td><?php echo $mostrarcar[2] ?></td>
          <td>
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-purple-warning btn-sm" title="Editar" data-toggle="modal" data-target="#editcargoModalCenter"><i class="fas fa-edit" onclick="obtenDatosCargo('<?php echo $mostrarcar[0] ?>')"></i></button>
              <button type="button" class="btn btn-sm btn-purple-danger" title="Eliminar" onclick="eliminarCargo('<?php echo $mostrarcar[0] ?>')"><i class="fas fa-trash-alt"></i></button>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>