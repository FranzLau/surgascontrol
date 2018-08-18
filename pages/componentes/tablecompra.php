<?php
    require '../../config/conexion.php';
    $sql = $con->query("SELECT nom_emp,razon_social,nom_producto,fecha_in,stock_llenoinicial,precio_compra,precio_venta FROM detalleingreso INNER JOIN empleado ON detalleingreso.id_emp=empleado.id_emp INNER JOIN proveedor ON detalleingreso.id_proveedor=proveedor.id_proveedor INNER JOIN producto ON detalleingreso.id_producto=producto.id_producto");
?>
 <div class="table-responsive">
   <table class="table table-hover table-sm" id="tableComp">
     <thead class="font-primary">
         <tr>
            <th>FECHA</th>
            <th>EMPLEADO</th>
            <th>PROVEEDOR</th>
            <th>PRODUCTO</th>
            <th>CANTIDAD</th>
            <th>COMPRO</th>
            <th>VENDO</th>
         </tr>
     </thead>
     <tbody class="bg-white">
        <?php
         while($mostrar = $sql->fetch_row()){
         ?>
         <tr>
            <td><?php echo $mostrar[3] ?></td>
            <td><?php echo $mostrar[0] ?></td>
            <td><?php echo $mostrar[1] ?></td>
            <td><?php echo $mostrar[2] ?></td>
            <td><?php echo $mostrar[4] ?></td>
            <td><?php echo $mostrar[5] ?></td>
            <td><?php echo $mostrar[6] ?></td>
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