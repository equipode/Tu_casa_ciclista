<?php
	
	require "../models/conexion.php";
	
	session_start();
	
	if($_POST){
		
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		
		$sql = "SELECT id, password, nombre FROM info_usuarios WHERE usuario='$usuario'";
		//echo $sql;
		$resultado = $mysqli->query($sql);
		$num = $resultado->num_rows;
		
		if($num>0){
			$row = $resultado->fetch_assoc();
			$password_bd = $row['password'];
			
			$pass_c = sha1($password);
			
			if($password_bd == $pass_c){
				
				$_SESSION['id'] = $row['id'];
				$_SESSION['nombre'] = $row['nombre'];
				//$_SESSION['tipo_usuario'] = $row['tipo_usuario'];
				
				header("Location: ../views_admin/index_admin.php");
				
			} else {
			
			echo "La contraseña no coincide";
			
			}
			
			
			} else {
			echo "NO existe usuario";
		}
		
		
		
	}
	
	
	
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
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

    <link rel="stylesheet" href="../CSS/style.css">
</head>
<!-- y de esta manera ↑ con la pagina de iniciar ↓ sesion o registrarse -->
<body class="hold-transition login-page" id="fondo">
    <div class="login-box">
        <div class="login-logo">
            <a href="../index.php"></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg"><h4 align="center"><b>Tienda</b>ciclista</h4></p>

                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Correo" id="usuario" name="usuario">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" id="password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Recuérdame
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                    <a href="#">Olvidé mi contraseña</a>
                </p>
                <p class="mb-0">
                    <a href="crear_cuenta.php" class="text-center">Crear una cuenta</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../templates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../templates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../templates/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>

</body>

</html>