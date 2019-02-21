<?php 
	session_start();
 ?>
 <div class="row">
  <div class="col-sm-8">
    <div class="card">
      <div class="card-body">
        <table class="table table-sm table-hover">
          <thead class="bg-light">
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
                  <td><button class="btn btn-danger btn-sm" onclick="quitarPar('<?php echo $i; ?>')"><i class="fas fa-trash"></i></button></td>
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
  </div>
  <div class="col-md-4">
    <div class="card">
        <div class="card-header bg-dark text-center">
            <h3 style="color: #6FF60B">Total: <?php echo $total; ?> </h3>
        </div>
        <div class="card-body">
            <p id="chofepart"></p>
            <button class="btn btn-success w-100" onclick="crearPartida()"><i class="fas fa-truck"></i> Generar Partida</button>
        </div>
    </div>
  </div>

</div>

 <script>
  $(document).ready(function() {
    nombre = "<?php echo @$chofe ?>";
    $('#chofepart').text("Chofer : "+nombre);
  });
</script>