<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS - Login</title>
    <?php include './config/header.php'; ?>  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h1"><b>POS</b>sistema</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Inicia con tus credenciales</p>
      <form>
        <div class="input-group mb-3">
          <input id='username' type="text" class="form-control" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id='password' type="password" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recordar credenciales
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <a onClick="login()" class="btn btn-primary btn-block">Entrar</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!--<p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
    <?php include './config/scripts.php'; ?>
</body>
</html>