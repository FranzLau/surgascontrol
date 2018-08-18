<?php 
  require '../../config/conexion.php';
  $sql = $con->query("SELECT * FROM fierro");
 ?>
<div class="col-md-12 table-responsive">
  <table class="table table-hover" id="tablefie">
    <thead class="font-weight-bold text-white">
      <tr class="bg-surgas">
          <td>Nombre</td>
          <td>Sin Gas</td>
          <td>Con Gas</td>
          <td>Opciones</td>
      </tr>
    </thead>
    
    <tbody>
      <?php while($mostrarfi = $sql->fetch_row()){ ?>
        <tr>
          <td><?php echo $mostrarfi[1] ?></td>
          <td><?php echo $mostrarfi[2] ?></td>
          <td><?php echo $mostrarfi[3] ?></td>
          <td>
            
            <button type="button" class="btn btn-warning btn-sm" title="Editar" data-toggle="modal" data-target="#editfierModal" onclick="obtenDatosFierro('<?php echo $mostrarfi[0] ?>')"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-danger btn-sm" title="Eliminar" onclick="eliminarFierro('<?php echo $mostrarfi[0] ?>')"><i class="fas fa-trash-alt"></i></button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>