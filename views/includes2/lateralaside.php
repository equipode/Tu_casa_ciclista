<!-- Brand Logo -->
<a href="index.php" class="brand-link">
  <img src="../imgs/logo.JPG"
       alt="AdminLTE Logo"
       class="brand-image img-circle elevation-3"
       style="opacity: .8">
  <span class="brand-text font-weight-light">INFO<b>APS</b></span>
</a>

<!-- Sidebar -->
<div class="sidebar ">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="../imgs/usuarios/user.png" class="img-circle elevation-2" alt="Usuario">
    </div>
    <div class="info">
      <a href="iniciar_sesion.php" class="d-block">Usuario Nombre</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      <!-- MENU CON OPCIONES DESPLEGABLES -->
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link ">
          <i class="nav-icon fas fa-user"></i>
          <p>
            CLIENTE
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="iniciar_sesion.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Iniciar sesion</p>
            </a>
          </li>
        </ul>
      </li> 

      <!-- MENU CON OPCIONES DESPLEGABLES -->
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-cubes"></i>
          <p>
            PRODUCTOS
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="productos.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Listado</p>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->