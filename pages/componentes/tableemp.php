<?php
    require '../../config/conexion.php';
    $sql = $con->query("SELECT * FROM empleado ");
?>
 <div class="table-responsive">
   <table class="table table-hover table-sm" id="tablemp">
     <thead class="font-primary">
         <tr>
             <th>NOMBRE</th>
             <th>DNI</th>
             <th>TELÉFONO</th>
             <th>CARGO</th>
             <th>ESTADO</th>
             <th>ACCESO</th>
             <th>ACCIONES</th>
         </tr>
     </thead>
     <tbody class="bg-white">
        <?php
         while($mostrar = $sql->fetch_row()){
         ?>
         <tr>
            <td><?php echo $mostrar[1]." ".$mostrar[2] ?></td>
            <td><?php echo $mostrar[5] ?></td>
            <td><?php echo $mostrar[7] ?></td>
            <td><?php echo $mostrar[11] ?></td>
            <td>
              <?php 
              if ($mostrar[12]=="Activo") {
              ?>
                <h5><span class="badge badge-success"><?php echo $mostrar[12] ?></span></h5>
              <?php
              }else {
              ?>
              <h5><span class="badge badge-danger"><?php echo $mostrar[12] ?></span></h5>
              <?php
              } 
              ?>
            </td>
            <td><?php echo $mostrar[9] ?></td>
            <td>
               <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-purple-warning btn-sm" title="Editar" data-toggle="modal" data-target="#EditempModalCenter" onclick="obtenDatosEmp('<?php echo $mostrar[0] ?>')"><i class="fas fa-edit"></i></button>
                  <button type="button" class="btn btn-purple-danger btn-sm" title="Eliminar" onclick="eliminarEmple('<?php echo $mostrar[0] ?>')"><i class="fas fa-trash-alt"></i></button>
               </div>
            </td>
         </tr>
         <?php
           }
         ?>
     </tbody>
   </table>
 </div>
 <script type="text/javascript">
      $(document).ready(function() {
        $('#tablemp').DataTable({
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