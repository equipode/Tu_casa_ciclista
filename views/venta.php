<?php 
  require ("../models/models_admin.php");
  date_default_timezone_set("America/Bogota");
  include "../controllers/controller_consultas_backend.php";
  ?>
<?php 
                        $objDB = new ExtraerDatos();

                        $idp = $_GET["cp"];//variable url

                        $vproductoDetalle = array();
                        $vproductoDetalle = $objDB->productoDetalle($idp);
                        
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
                                <h3 class="card-title">Verificación de usuario</h3>
                            </div>
                            <!-- Para controles de formularios siempre usar etiqueta FORM -->

                            <?php 
            if(isset($_POST["txt_pro"])){//verificar la existencia de envio de datos
         // estas variables se utilizan a la hora de insertar datos en la base de datos en la variable ejecucion
              $monbre = $_POST["txt_pro"];
              $pro = $_POST["txt_codprod"];
              
  
              $objDBO = new DBConfig();
              $objDBO->config();
              $objDBO->conexion();


              $ejecucion = $objDBO->Operaciones("INSERT INTO info_venta(cliente, fk_product, fechac)
                                                                values($monbre, $pro, NOW()) ");

              if($ejecucion){ // Todo se ejecuto correctamente
                echo "
                <audio controls='' autoplay='' id='ocultar'>
                <source src='../Audios/sony1.mp3' type='audio/mp3'>
                </audio>
                <div class='alert alert-success'>
                         usuario verificado
                      </div>
                      ";
              }else{ // Algo paso mal
                echo "
                <audio controls='' autoplay='' id='ocultar'>
                <source src='../Audios/sony2.mp3' type='audio/mp3'>
                </audio>
            
                <div class='alert alert-danger'>
                         Debe selecionar un usuario
                      </div>";
              }

              $objDBO->close();


            }
            ?>



                            <?php 
            $objDB = new ExtraerDatos();

            $productos = array();
            $productos = $objDB->listadoClientesc();

            // if($productos){

            //   echo "<div class='row'>";
              
            // //proceso para mostrar listas de datos
            // foreach ($productos as $rows){  //la variable rows puede ser cualquier nombre y lo que hace es ir registro por registro de la tabla
        ?>


                            <form role="form" name="frm_prods" id="frm_prods" method="POST"
                                action="venta.php?cp=<?php echo $idp ?>" enctype="multipart/form-data">
                                <div class="card-body">

                                    <div class="row">



                                        <div class="col-md-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Usuario</label>
                                                <select class="form-control" name="txt_pro" id="txt_pro">
                                                    <option value="0">Selecionar Usuario</option>
                                                    <?php foreach ($productos as $opciones): ?>
                                                    <option value="<?php echo $opciones['id'] ?>">
                                                        <?php echo $opciones['nombrec'] ?>
                                                        <?php endforeach ?>
                                                    </option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12 col-12">
                                            <br>
                                            
                                            <button type="submit" id="btn_regist"  class="btn bg-primary">Verificar
                                            </button> <i class="fas fa-user-check"></i>
                                            
                                        </div>

                                        <input type="hidden" name="txt_codprod" id="txt_codprod"
                                            value="<?php echo $idp ?>">





                                    </div> <!-- /.fin row -->

                                </div> <!-- /.fin card-body -->

                                <div class="card-footer">
                                    <a href="crear_cuenta.php" class="btn bg-primary">Crear Cuenta</a>
                                    <a href="list_ventas.php" class="btn bg-primary">Continuar</a>


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