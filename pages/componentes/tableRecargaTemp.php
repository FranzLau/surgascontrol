<?php 
  session_start();
?>
<div class="row">
  <div class="col-md-12">
    <table class="table table-sm table-hover table-bordered">
      <thead>
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
            <button class="btn btn-danger-melody btn-sm" onclick="quitarRec('<?php echo $i; ?>')"><i class="fas fa-times"></i></button>
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
<hr>
<div class="row align-items-center">
  <div class="col-sm-1 text-center">
    <i class="fas fa-truck-loading"></i>
  </div>
  <div class="col-sm-5">
    <input type="text" class="form-control form-control-sm" id="RecaChofer" readonly="">
  </div>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" readonly="" value="s/ <?php echo $total; ?>">
  </div>
  <div class="col-sm-4">
    <button class="btn btn-success-melody btn-sm w-100" id="generaRec" onclick="creaRecargas()"><i class="fas fa-save mr-2"></i>RECARGAR</button>
  </div>
</div>
<script>
  $(document).ready(function() {
    nombre = "<?php echo @$conductor ?>";
    $('#RecaChofer').val(nombre);
  });
</script>