 <?php 
    require '../../config/conexion.php';
    $sql = $con->query("SELECT * FROM presentacion");
 ?>
<div class="col-md-12 table-responsive">
  <table class="table table-hover" id="tablePrese">
    <thead class="font-weight-bold text-white">
      <tr class="bg-surgas">
          <td>Nombre</td>
          <td>Descripción</td>
          <td>Opciones</td>
      </tr>
    </thead>
   
    <tbody>
      <?php while($mostrarpres = $sql->fetch_row()){ ?>
      <tr>
        <td><?php echo $mostrarpres[1] ?></td>
        <td><?php echo $mostrarpres[2] ?></td>
        <td>
          
          <button type="button" class="btn btn-warning btn-sm" title="Editar" data-toggle="modal" data-target="#editpresModalCenter" onclick="obtenDatosPresentacion('<?php echo $mostrarpres[0] ?>')"><i class="fas fa-edit"></i></button>
          <button type="button" class="btn btn-danger btn-sm" title="Eliminar" onclick="eliminarPresentacion('<?php echo $mostrarpres[0] ?>')"><i class="fas fa-trash-alt"></i></button>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>