<?php 
  require ("../models/models_admin.php");
  date_default_timezone_set("America/Bogota");
  include "../controllers/controller_consultas_backend.php";
  ?>
<?php 
                        $objDB = new ExtraerDatos();

                        $idp = $_GET["cp"];//variable url

                        $motosCarrosDetalle = array();
                        $motosCarrosDetalle = $objDB->productoDetalle($idp);
                        
                        ?>
  
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link href="../CSS/style.css" rel="stylesheet">
</head>

<!--class="sidebar-collapse sidebar-mini" -->

<body>

    <?php include "includes2/config.php"; ?>

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand <?php echo $headerStyle; ?>" id="header">
            <?php 
      include "includes2/header.php";
    ?>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar <?php echo $lateralStyle; ?> elevation-4" id="lateral">
            <?php 
    include "includes2/lateralaside.php";
     ?>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="fondo">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 align="right">Bienvenido</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content" id="fondo">

                <div class="row">
                     <!-- este div es para centrar el formulario -->
                    <div class="col-md-2">
                            
                    </div>

                    <!-- COLUMNA DE FORMULARIO  -->
                    <div class="col-md-8">
                        <!-- columna de contenido -->


                        <!-- /.card-header -->
                        <div class="card">
                            <div class="card-header bg-primary" class="Sub">
                                <h3 class="card-title">Formulario de registro </h3>
                            </div>
                            <!-- Para controles de formularios siempre usar etiqueta FORM -->

                            <?php 
            if(isset($_POST["txt_nome"])){//verificar la existencia de envio de datos
         // estas variables se utilizan a la hora de insertar datos en la base de datos en la variable ejecucion
              $monbre = $_POST["txt_nome"];
              $pro = $_POST["txt_codprod"];
              
              $objDBO = new DBConfig();
              $objDBO->config();
              $objDBO->conexion();


              $ejecucion = $objDBO->Operaciones("INSERT INTO info_venta(cod, cliente, fk_product)
                                                                values(NULL ,'$monbre', $pro) ");

              if($ejecucion){ // Todo se ejecuto correctamente
                echo "<div class='alert alert-success'>
                         Has sido registrado con exito
                      </div>";
              }else{ // Algo paso mal
                echo "<div class='alert alert-danger'>
                         Ha ocurrido un error inexperado
                      </div>";
              }

              $objDBO->close();


            }
            ?>


                            <form role="form" name="frm_prods" id="frm_prods" method="POST" 
                            action="venta.php?cp=<?php echo $idp ?>"
                                enctype="multipart/form-data">
                                <div class="card-body">

                                    <div class="row">

                                        

                                        <div class="col-md-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="txt_nome">Nombre</label>
                                                <input type="text" class="form-control" id="txt_nome" name="txt_nome"
                                                    placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12 col-12">
                                        <h2> <?php echo $motosCarrosDetalle[0]['nombre'] ?></h2>
                                        </div>
                                        
                                        <input type="hidden" name="txt_codprod" id="txt_codprod"
                                    value="<?php echo $idp ?>">

                                    
                                        

                                        
                                    </div> <!-- /.fin row -->

                                </div> <!-- /.fin card-body -->

                                <div class="card-footer">
                                    <button type="submit" id="btn_regist" class="btn bg-primary">Registrarse
                                    </button>
                                    <button type="reset" class="btn btn-default">Limpiar</button>
                                    <a href="list_ventas.php">seguir</a>
                                </div>


                                <div class="card-footer">
                                        

                            </form> <!-- /.fin Form -->

                           

                        </div>

                        

                    </div>
                   <!-- este div es para centrar el formulario -->
                    <div class="col-md-2">

                    </div>


                    <!--  <div class="col-md-6">
                        <img src="../imgs/crear_productos/presentación.jpg">

                    </div>   -->


            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <?php 
      include "includes2/footer.php";
     ?>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->




    <!-- jQuery -->
    <script src="../templates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../templates/AdminLTE-3.0.5/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../templates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../templates/AdminLTE-3.0.5/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- AdminLTE App -->
    <script src="../templates/AdminLTE-3.0.5/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../templates/AdminLTE-3.0.5/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../templates/AdminLTE-3.0.5/dist/js/demo.js"></script>

</body>

</html>