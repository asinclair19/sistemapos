<?php 
  require_once './config/db.php';

  if(isset($_SESSION['userinfo'])){
    $user = $_SESSION['userinfo'];
    if($_SESSION['usersections']){
      $sections = (array)$_SESSION['usersections'];

?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="inicio" class="brand-link text-center">
      <img src="./src/vendor/dist/img/AdminLTELogo.png" 
        alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sistema POS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $user[0]['imagen'] == '' ? './src/vendor/dist/img/default-150x150.png':$user[0]['imagen'] ?>" 
            class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="inicio" class="d-block"><?php echo ucfirst(strtolower($user[0]['nombre'])).' '.ucfirst(strtolower($user[0]['apellido'])) ?></a>
          <small><a onClick="logOut()" class="btn btn-sm">Cerrar sesión</a></small>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MENU</li>
          <?php 
          
            foreach ($sections as $item) { ?>
              <li class="nav-item">
                <a href="<?php echo $item['accion'] ?>" class="nav-link">
                  <i class="<?php echo $item['icono'] ?> nav-icon text-warning"></i>
                  <p><?php echo $item['nombre'] ?></p>
                </a>
              </li>
            <?php
              }
            
            ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<?php
  }
}

?>