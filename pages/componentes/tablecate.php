<?php 
  require '../../config/conexion.php';
  $sql = $con->query("SELECT * FROM categoria");
 ?>
<div class="col-md-12 table-responsive">
  <table class="table table-hover" id="tableCat">
    <thead class="font-weight-bold text-white">
      <tr class="bg-surgas">
          <td>Nombre</td>
          <td>Descripción</td>
          <td>Opciones</td>
      </tr>
    </thead>
    
    <tbody>
      <?php while($mostrarcat = $sql->fetch_row()){ ?>
        <tr>
          <td><?php echo $mostrarcat[1] ?></td>
          <td><?php echo $mostrarcat[2] ?></td>
          <td>
            
            <button type="button" class="btn btn-warning btn-sm" title="Editar" data-toggle="modal" data-target="#editcatModalCenter" onclick="obtenDatosCategoria('<?php echo $mostrarcat[0] ?>')"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-danger btn-sm" title="Eliminar" onclick="eliminarCategoria('<?php echo $mostrarcat[0] ?>')"><i class="fas fa-trash-alt"></i></button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>