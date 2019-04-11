<?php 
	session_start();
 ?>
 <div class="row">
  <div class="col-sm-12">
    <table class="table table-sm table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">Cantidad</th>
          <th scope="col">Producto</th>
          <th scope="col">Tipo</th>
          <th scope="col">Quitar</th>
        </tr>
      </thead>
      <tbody>
          <?php 
              $total = 0; //esta variable guarda los totales de la cantidades
              if(isset($_SESSION['tablaPartidasTemp'])):
                  $i=0;
                  foreach (@$_SESSION['tablaPartidasTemp'] as $key) {
                      $d= explode("||", @$key);
          ?>
          <tr>
              <td><?php echo $d[2]; ?></td>
              <td><?php echo $d[0]; ?></td>
              <td><?php echo $d[3]; ?></td>
              <td><button class="btn btn-danger-melody btn-sm" onclick="quitarPar('<?php echo $i; ?>')"><i class="fas fa-times"></i></button></td>
          </tr>
          <?php
              $total = $total + $d[2];
              $i++; 
              $chofe = $d[1];
              }
              endif;
          ?>
      </tbody>
    </table>
  </div>
</div>
<hr>
<div class="form-row align-items-center">
  <div class="col-sm-1 text-center">
    <i class="fas fa-people-carry"></i>
  </div>
  <div class="col-sm-5">
    <input type="text" class="form-control form-control-sm" id="chofepart" readonly="">
  </div>
  <div class="col-sm-2">
    <input type="text" class="form-control form-control-sm" readonly="" value="<?php echo $total; ?>">
  </div>
  <div class="col-sm-4">
    <button class="btn btn-success-melody btn-sm w-100" onclick="crearPartida()"><i class="fas fa-save mr-2"></i>Generar Partida</button>
  </div>
</div>
 <script>
  $(document).ready(function() {
    nombre = "<?php echo @$chofe ?>";
    $('#chofepart').val(nombre);
  });
</script>