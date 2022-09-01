<?php 
  require ("../models/models_admin.php");
  date_default_timezone_set("America/Bogota");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Registrar nuevo usuario</p>

      <?php 
            if(isset($_POST["txt_nome"])){//verificar la existencia de envio de datos
// estas variables se utilizan a la hora de insertar datos en la base de datos en la variable ejecucion
              $monbre = $_POST["txt_nome"];
              $email = $_POST["txt_email"];
              $pas = $_POST["txt_pas"];
              $dire = $_POST["txt_dir"];
              $telf = $_POST["txt_telf"];

              //echo $msgfile;

              $objDBO = new DBConfig();
              $objDBO->config();
              $objDBO->conexion();

              //y aca las utiliza en codigo sql

              $ejecucion = $objDBO->Operaciones("INSERT INTO clientes(nombre, telefono, direccion, usuaio, pass)
                                                                values('$monbre', '$telf', '$dire', '$email', '$pas') ");

              if($ejecucion){ // Todo se ejecuto correctamente
                echo "<div class='alert alert-success'>
                         Cliente Registrado
                      </div>";
              }else{ // Algo paso mal
                echo "<div class='alert alert-danger'>
                         Ha ocurrido un error inexperado
                      </div>";
              }

              $objDBO->close();


            }
            ?>
              

<!-- en el span se pueden cambiar los iconos -->
      <form method="POST" action="crear_usuario.php" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="txt_nome" name="txt_nome" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="txt_email" name="txt_email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="txt_pas" name="txt_pas" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="txt_dir" name="txt_dir" placeholder="Dirección">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" id="txt_telf" name="txt_telf" placeholder="Telefono">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" id="btn_regist" class="btn btn-primary btn-block">Registrar</button>
          </div>
          <!-- /.col          btn btn-success-->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="#" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../templates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../templates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../templates/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>
</body>
</html>
