<?php 
  session_start();
 ?>
<table class="table table-sm table-hover">
  <thead class="thead-light">
    <tr>
      <th>Producto</th>
      <th>Cantidad</th>
      <th>Precio</th>
      <th>Quitar</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $total = 0;
      if (isset($_SESSION['tablaRecargaTemp'])):
       $i = 0;
       foreach (@$_SESSION['tablaRecargaTemp'] as $key) {
         $d= explode("||", @$key);
     ?>
    <tr>
      <td><?php echo $d[1]; ?></td>
      <td><?php echo $d[2]; ?></td>
      <td><?php echo $d[3]; ?></td>
      <td>
        <button class="btn btn-danger btn-sm" onclick="quitarR('<?php echo $i; ?>')"><i class="fas fa-trash"></i></button>
      </td>
    </tr>
    <?php 
      $total = $total + $d[2];
      $i++;
      }
      endif;
     ?>
  </tbody>
</table>
<hr>
<div class="row">
  <div class="col-sm-4">
    <p>Total : <?php echo $total; ?></p>
  </div>
  <div class="col-sm-4"></div>
  <div class="col-sm-4 text-right">
    <button class="btn btn-success" id="generaRec" onclick="crearRecarga()">Recargar <i class="fas fa-shipping-fast"></i></button>
  </div>
  
</div>
