<?php 
  require_once './controller/MvcController.php';
  require_once './config/db.php';

  $MvcController = new MvcController();

  if($MvcController->ValidSessionUser()){ //true

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema | POS</title>
  <?php include './config/header.php'; ?>  
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php $MvcController->NavBarTemplate(); ?>

  <?php $MvcController->SideBarTemplate(); ?>

  <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
    <div class="content-header"><!-- Content Header (Page header) -->
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sistema POS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Sistema POS</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <?php $MvcController->RenderBody(); ?>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $MvcController->FooterTemplate(); ?>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<?php include './config/scripts.php'; ?>

</body>
</html>
<?php 
  } else{ //false
    header('Location: '.ROOT_PATH.'login.php', false);
  }
?>