<?php 
	session_start();
	//print_r($_SESSION['tablaCompraTemp']);
 ?>
 <div class="row">
   <div class="col-sm-12">
    <table class="table table-sm table-bordered">
      <thead>
        <tr>
          <th scope="col">Cant.</th>
          <th scope="col">Producto</th>
          <th scope="col">Precio</th>
          <th scope="col">Desc.</th>
          <th scope="col">Venta</th>
          <th scope="col">Sub Total</th>
          <th scope="col">Quitar</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $total = 0; //esta variable guarda los totales de las venta
          
        if(isset($_SESSION['tablaCompraTemp'])):
          $i=0;
          foreach (@$_SESSION['tablaCompraTemp'] as $key) {
            $d= explode("||", @$key);
            
        ?>
        <tr>
          <td><?php echo $d[3]; ?></td>
          <td><?php echo $d[1]; ?></td>
          <td><?php echo $d[4]; ?></td>
          <td><?php echo $d[7]; ?></td>
          <td><?php echo $d[6]; ?></td>
          <td><?php echo $st=($d[4]-$d[7])*$d[3]; ?></td>
          <td>
            <button class="btn btn-danger-melody btn-sm" onclick="quitarP('<?php echo $i; ?>')"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        <?php
          $total = $total + $st;
          $i++; 
          $cliente = $d[2];
          }
        endif;
      ?>
      </tbody>
    </table>
   </div>
 </div>
 <hr>
 <div class="row align-items-center">
   <div class="col-sm-1 text-right">
    <i class="fas fa-shopping-cart"></i>
   </div>
   <div class="col-sm-5">
    <input type="text" class="form-control"  id="clienteVent" readonly="">
   </div>
   <div class="col-sm-2 font-weight-bold">
    <input type="text" class="form-control bg-dark" style="color: #6FF60B" readonly="" value="s/.<?php echo $total; ?>">
   </div>
   <div class="col-sm-4">
    <button class="btn btn-success-melody w-100" onclick="crearVentas()"><i class="fas fa-save mr-2"></i>Generar Venta</button>
   </div>
 </div>
<script>
  $(document).ready(function() {
    nombre = "<?php echo @$cliente ?>";
    $('#clienteVent').val(nombre);
  });
</script>