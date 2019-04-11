<?php
require '../../config/conexion.php';
require '../../config/ventas.php';
$obj = new ventas();
$sql = $con->query("SELECT * FROM detalleingreso GROUP BY id_detalleingreso");
?>
 <div class="table-responsive">
   <table class="table table-hover table-sm table-bordered" id="tableComp">
     <thead class="font-primary">
         <tr>
            <th>#</th>
            <th>FECHA</th>
            <th>EMPLEADO</th>
            <th>PROVEEDOR</th>
            <th>TOTAL</th>
            <th>PDF</th>
         </tr>
     </thead>
     <tbody class="bg-white">
        <?php
         while($mostrar = $sql->fetch_row()){
         ?>
         <tr>
            <td><?php echo $mostrar[0] ?></td>
            <td><?php echo $mostrar[4] ?></td>
            <td><?php echo $obj->nombreEmpleado($mostrar[7]) ?></td>
            <td><?php echo $obj->nombreProveedor($mostrar[8]) ?></td>
            <td>
              <?php 
                echo "S/.".$obj->TotalCompra($mostrar[0]);
              ?>
            </td>
            <td>
              <a href="../../procesos/ventas/crearReportepdf.php?idcompra=<?php echo $ver[0] ?>" class="btn btn-sm btn-danger"><i class="fas fa-file-pdf"></i></a>
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
        $('#tableComp').DataTable({
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