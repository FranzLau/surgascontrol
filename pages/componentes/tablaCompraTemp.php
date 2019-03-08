<?php
session_start();
?>
<div class="row mt-3">
  <div class="col-md-8">
    <table class="table table-sm table-bordered">
      <thead>
        <tr>
          <th scope="col">Cant.</th>
          <th scope="col">Compra</th>
          <th scope="col">Producto</th>
          <th scope="col">Precio</th>
          <th scope="col">Desc.</th>
          <th scope="col">Sub Total</th>
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
          <td><?php echo $d[2]; ?></td>
          <td><?php echo $d[4]; ?></td>
          <td><?php echo $d[11]; ?></td>
          <td><?php echo $d[8]; ?></td>
          <td><?php echo $st=($d[11]-$d[8])*$d[7]; ?></td>
          <td>
            <button class="btn btn-danger btn-sm" onclick="quitarCompra('<?php echo $i; ?>')"><i class="fas fa-times"></i></button>
          </td>
        </tr>

        <?php
          $total = $total + $st;
          $i++; 
          $cliente = $d[1];
          }
          endif;
        ?>
      </tbody>
    </table>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header bg-dark text-center">
        <h3 style="color: #6FF60B">s/. <?php echo $total; ?></h3>
      </div>
      <div class="card-body">
        <p><i class="fas fa-tag mr-2"></i><span id="ProveCompra"></span></p>
        <button class="btn btn-success w-100" onclick="crearCompra()"><i class="fas fa-save mr-2"></i>Generar Compra</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    nombre = "<?php echo @$cliente ?>";
    $('#ProveCompra').text(nombre);
  });
</script>