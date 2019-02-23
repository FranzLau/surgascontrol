<?php 
  session_start();
?>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <table class="table table-sm table-hover">
          <thead class="thead-light">
            <tr>
              <th>Tipo</th>
              <th>Cant.</th>
              <th>Producto</th>
              <th>Precio</th>
              <th>Estado</th>
              <th>Balon</th>
              <th>Sub Total</th>
              <th>Quitar</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $total = 0;
              if (isset($_SESSION['tablaRecargasTemp'])):
              $i = 0;
              foreach (@$_SESSION['tablaRecargasTemp'] as $key) {
                $d= explode("||", @$key);
            ?>
            <tr>
              <td><?php echo $d[0]; ?></td>
              <td><?php echo $d[5]; ?></td>
              <td><?php echo $d[2]; ?></td>
              <td><?php echo $d[6]; ?></td>
              <td><?php echo $d[9]; ?></td>
              <td><?php echo $d[4]; ?></td>
              <td><?php echo $st=$d[3]*$d[5]; ?></td>
              <td>
                <button class="btn btn-danger btn-sm" onclick="quitarRec('<?php echo $i; ?>')"><i class="fas fa-times"></i></button>
              </td>
            </tr>
            <?php 
              $total = $total + $st;
              $i++;
              $conductor=$d[1];
              }
              endif;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header bg-dark text-center">
        
        <h3 style="color: #6FF60B">S/ <?php echo $total; ?></h3>
      </div>
      <div class="card-body">
        <p id="RecaChofer"></p>
        <button class="btn btn-success w-100" id="generaRec" onclick="creaRecargas()"><i class="fas fa-thumbs-up mr-2"></i>Recargar</button>
        <!--<i class="fas fa-shipping-fast"></i>-->
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    nombre = "<?php echo @$conductor ?>";
    $('#RecaChofer').text("CHOFER : "+nombre);
  });
</script>