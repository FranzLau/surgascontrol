<?php
session_start();
?>
<div class="row">
  <div class="col-sm-12">
    <table class="table table-sm table-bordered">
      <thead>
        <tr>
          <th scope="col">Cant.</th>
          <th scope="col">Producto</th>
          <th scope="col">Balon</th>
          <th scope="col">Quitar</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $total = 0; //esta variable guarda los totales de las venta
            
          if(isset($_SESSION['CompraTemporal'])):
            $i=0;
            foreach (@$_SESSION['CompraTemporal'] as $key) {
              $d= explode("||", @$key);
              
        ?>
        <tr>
          <td><?php echo $d[7]; ?></td>
          <td><?php echo $d[4]; ?></td>
          <td><?php echo $d[2]; ?></td>
          <td>
            <button class="btn btn-danger btn-sm" onclick="quitarCompra('<?php echo $i; ?>')"><i class="fas fa-times"></i></button>
          </td>
        </tr>

        <?php
          $total = $total + $d[7];
          $i++; 
          $cliente = $d[1];
          }
          endif;
        ?>
      </tbody>
    </table>
  </div>
</div>
<div class="row align-items-center">
  <div class="col-sm-1 text-right">
    <i class="fas fa-tag"></i>
  </div>
  <div class="col-sm-5">
    <input type="text" class="form-control form-control-sm" id="ProveCompra" readonly="">
  </div>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" readonly="" value="<?php echo $total; ?>">
  </div>
  <div class="col-sm-4">
    <button class="btn btn-success-melody btn-sm w-100" onclick="crearCompra()"><i class="fas fa-save mr-2"></i>Generar Compra</button>
  </div>
</div>
<script>
  $(document).ready(function() {
    nombre = "<?php echo @$cliente ?>";
    $('#ProveCompra').val(nombre);
  });
</script>