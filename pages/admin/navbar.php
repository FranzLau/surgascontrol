<style>
/*background: linear-gradient(to right, #5659a6, #A659c9)!important;*/

.navbar {
  background: linear-gradient(to right, #5659a6, #A659c9)!important;
}
.navbar .navbar-brand {
  color: #fdfdfd;
}
.navbar .navbar-brand:hover,
.navbar .navbar-brand:focus {
  color: #ffffff;
}
.navbar .navbar-text {
  color: #fdfdfd;
}
.navbar .navbar-text a {
  color: #ffffff;
}
.navbar .navbar-text a:hover,
.navbar .navbar-text a:focus {
  color: #ffffff; 
}
.navbar .navbar-nav .nav-link {
  color: #fdfdfd;
  border-radius: .25rem;
  margin: 0 0.25em;
}
.navbar .navbar-nav .nav-link:not(.disabled):hover,
.navbar .navbar-nav .nav-link:not(.disabled):focus {
  color: #ffffff;
}
.navbar .navbar-nav .dropdown-menu {
  background-color: #5659a6;
  border-color: #3f4187;
}
.navbar .navbar-nav .dropdown-menu .dropdown-item {
  color: #fdfdfd;
}
.navbar .navbar-nav .dropdown-menu .dropdown-item:hover,
.navbar .navbar-nav .dropdown-menu .dropdown-item:focus,
.navbar .navbar-nav .dropdown-menu .dropdown-item.active {
  color: #ffffff;
  background-color: #3f4187;
}
.navbar .navbar-nav .dropdown-menu .dropdown-divider {
  border-top-color: #3f4187;
}
.navbar .navbar-nav .nav-item.active .nav-link,
.navbar .navbar-nav .nav-item.active .nav-link:hover,
.navbar .navbar-nav .nav-item.active .nav-link:focus,
.navbar .navbar-nav .nav-item.show .nav-link,
.navbar .navbar-nav .nav-item.show .nav-link:hover,
.navbar .navbar-nav .nav-item.show .nav-link:focus {
  color: #ffffff;
  background-color: #3f4187;
}
.navbar .navbar-toggle {
  border-color: #3f4187;
}
.navbar .navbar-toggle:hover,
.navbar .navbar-toggle:focus {
  background-color: #3f4187;
}
.navbar .navbar-toggle .navbar-toggler-icon {
  color: #fdfdfd;
}
.navbar .navbar-collapse,
.navbar .navbar-form {
  border-color: #fdfdfd;
}
.navbar .navbar-link {
  color: #fdfdfd;
}
.navbar .navbar-link:hover {
  color: #ffffff;
}

@media (max-width: 575px) {
  .navbar-expand-sm .navbar-nav .show .dropdown-menu .dropdown-item {
    color: #fdfdfd;
  }
  .navbar-expand-sm .navbar-nav .show .dropdown-menu .dropdown-item:hover,
  .navbar-expand-sm .navbar-nav .show .dropdown-menu .dropdown-item:focus {
    color: #ffffff;
  }
  .navbar-expand-sm .navbar-nav .show .dropdown-menu .dropdown-item.active {
    color: #ffffff;
    background-color: #3f4187;
  }
}

@media (max-width: 767px) {
  .navbar-expand-md .navbar-nav .show .dropdown-menu .dropdown-item {
    color: #fdfdfd;
  }
  .navbar-expand-md .navbar-nav .show .dropdown-menu .dropdown-item:hover,
  .navbar-expand-md .navbar-nav .show .dropdown-menu .dropdown-item:focus {
    color: #ffffff;
  }
  .navbar-expand-md .navbar-nav .show .dropdown-menu .dropdown-item.active {
    color: #ffffff;
    background-color: #3f4187;
  }
}

@media (max-width: 991px) {
  .navbar-expand-lg .navbar-nav .show .dropdown-menu .dropdown-item {
    color: #fdfdfd;
  }
  .navbar-expand-lg .navbar-nav .show .dropdown-menu .dropdown-item:hover,
  .navbar-expand-lg .navbar-nav .show .dropdown-menu .dropdown-item:focus {
    color: #ffffff;
  }
  .navbar-expand-lg .navbar-nav .show .dropdown-menu .dropdown-item.active {
    color: #ffffff;
    background-color: #3f4187;
  }
}

@media (max-width: 1199px) {
  .navbar-expand-xl .navbar-nav .show .dropdown-menu .dropdown-item {
    color: #fdfdfd;
  }
  .navbar-expand-xl .navbar-nav .show .dropdown-menu .dropdown-item:hover,
  .navbar-expand-xl .navbar-nav .show .dropdown-menu .dropdown-item:focus {
    color: #ffffff;
  }
  .navbar-expand-xl .navbar-nav .show .dropdown-menu .dropdown-item.active {
    color: #ffffff;
    background-color: #3f4187;
  }
}

.navbar-expand .navbar-nav .show .dropdown-menu .dropdown-item {
  color: #fdfdfd;
}
.navbar-expand .navbar-nav .show .dropdown-menu .dropdown-item:hover,
.navbar-expand .navbar-nav .show .dropdown-menu .dropdown-item:focus {
  color: #ffffff;
}
.navbar-expand .navbar-nav .show .dropdown-menu .dropdown-item.active {
  color: #ffffff;
  background-color: #3f4187;
}
</style>
<?php include('../../modal/modalhelp.php'); ?>
<nav class="navbar navbar-expand-lg py-4">
  <div class="container">
      <a class="navbar-brand" href="index.php">
          <img src="../../assets/css/img/logo2me.png" alt="" height="40px">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars fa-lg" style="color:#ffff"></i>
      </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto ml-auto">
          <li class="nav-item dropdown mr-2">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Almacén</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="balones.php"><i class="fas fa-fire"></i> Productos</a>
              <a class="dropdown-item" href="compra.php"><i class="fas fa-fire"></i> Mis Compras</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="vender.php"><i class="fas fa-fire"></i> Vender ahora</a>
              <a class="dropdown-item" href="ventas.php"><i class="fas fa-fire"></i> Mis Ventas</a>
            </div>
          </li>
          <li class="nav-item dropdown mr-2">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Recargas</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="repartidor.php"><i class="fas fa-fire"></i> Registro de Partidas</a>
              <!--<a class="dropdown-item" href="partidas.php"><i class="fas fa-fire"></i> Lista de Partidas</a>-->
              <a class="dropdown-item" href="recarga.php"><i class="fas fa-fire"></i> Recargar Partida</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="liquidar.php"><i class="fas fa-fire"></i> Liquidar Chofer</a>
              <a class="dropdown-item" href="misliquidaciones.php"><i class="fas fa-fire"></i> Liquidaciones</a>
              
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Caja</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="cajero.php"><i class="fas fa-fire"></i> Cerrar Caja</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="retiro.php"><i class="fas fa-fire"></i> Mis Gastos</a>
              <a class="dropdown-item" href="tipogasto.php"><i class="fas fa-fire"></i> Tipo Gasto</a>
            </div>
          </li>
          <?php if ($_SESSION['loggedIN']['acceso_emp'] == "Administrador"): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mantenimiento
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="trabajador.php"><i class="fas fa-fire"></i> Empleados</a>
              <a class="dropdown-item" href="cargo.php"><i class="fas fa-fire"></i> Especialidad</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="cliente.php"><i class="fas fa-fire"></i> Mis Clientes</a>
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
              <?php 
               }else{ ?> 
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
