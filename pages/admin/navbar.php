<?php include('../../modal/modalhelp.php'); ?>
<nav class="navbar navbar-expand-lg bg-navbar-primary navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">
        <img src="../../assets/css/img/logo2me.png" alt="" height="30px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars fa-lg" style="color:#ffff"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto ml-auto">
        <li class="nav-item dropdown mr-2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-warehouse"></i> Almacén</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="balones.php"><i class="fas fa-fire"></i> Productos</a>
            <a class="dropdown-item" href="compra.php"><i class="fas fa-fire"></i> Ingresos</a>
            <a class="dropdown-item" href="vender.php"><i class="fas fa-fire"></i> Ventas</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="retiro.php"><i class="fas fa-fire"></i> Gastos</a>
            <a class="dropdown-item" href="cajero.php"><i class="fas fa-fire"></i> Caja</a>
            <!--<a class="dropdown-item" href="tipogasto.php"><i class="fas fa-fire"></i> Tipo Gasto</a>
            <!--<a class="dropdown-item" href="ventas.php"><i class="fas fa-fire"></i> Mis Ventas</a>-->
          </div>
        </li>
        <li class="nav-item dropdown mr-2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-truck"></i> Repartidor</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="repartidor.php"><i class="fas fa-fire"></i> Partidas</a>
            <!--<a class="dropdown-item" href="partidas.php"><i class="fas fa-fire"></i> Lista de Partidas</a>-->
            <a class="dropdown-item" href="recarga.php"><i class="fas fa-fire"></i> Recargar</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="liquidar.php"><i class="fas fa-fire"></i> Liquidar</a>
            <!--<a class="dropdown-item" href="misliquidaciones.php"><i class="fas fa-fire"></i> Liquidaciones</a>-->
            
          </div>
        </li>
          <!--<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Caja</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="cajero.php"><i class="fas fa-fire"></i> Cerrar Caja</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="retiro.php"><i class="fas fa-fire"></i> Mis Gastos</a>
              <a class="dropdown-item" href="tipogasto.php"><i class="fas fa-fire"></i> Tipo Gasto</a>
            </div>
          </li>-->
        <?php if ($_SESSION['loggedIN']['acceso_emp'] == "Administrador"): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-cog"></i> Mantenimiento
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="trabajador.php"><i class="fas fa-fire"></i> Empleados</a>
            <!--<a class="dropdown-item" href="cargo.php"><i class="fas fa-fire"></i> Especialidad</a>-->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="cliente.php"><i class="fas fa-fire"></i> Clientes</a>
            <a class="dropdown-item" href="proveedor.php"><i class="fas fa-fire"></i> Proveedores</a>
          </div>
        </li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav navbar-right">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php if ($_SESSION['loggedIN']['sexo_emp'] == "M") { ?>
              <img src="../../assets/css/img/boyemp.png" alt="" width="30px" height="30px">
            <?php  }else{ ?> 
              <img src="../../assets/css/img/girlemp.png" alt="" width="30px" height="30px">
            <?php  } ?> 
            <?php echo $_SESSION['loggedIN']['nom_emp'] ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="myprofile.php"><i class="fas fa-cog fa-spin"></i> Perfil</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#HelpModalCenter"><i class="fas fa-fire-extinguisher"></i> Acerca de</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" onclick="salir()"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
