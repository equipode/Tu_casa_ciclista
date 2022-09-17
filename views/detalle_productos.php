<?php 
  include "../controllers/controller_consultas_backend.php";
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

        <?php 
    $objDB = new ExtraerDatos();

    $idp = $_GET["cp"];//variable url

    $productoDetalle = array();
    $productoDetalle = $objDB->productoDetalle($idp);
    
    ?>

        <!-- Content Wrapper. Contains page content --> 
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 align="center"><b><?php echo $productoDetalle[0]['nombre'] ?></b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                                <li class="breadcrumb-item active"><a href="productos.php">Productos</a></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-3">

                    </div>
                    <div class="col-md-6 col-sm-6 col-6">
                        <img src="../<?php echo $productoDetalle[0]['foto'] ?>" width="200">
                    </div>
                    <div class="col-md-3 col-sm-3 col-3">

                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-2 col-sm-2 col-2">

                    </div>
                    <div class="col-md-8 col-sm-8 col-8">
                        <h2 align="center"><b>Descripcion</b></h2><br>
                        <h5><?php echo $productoDetalle[0]['descripcion'] ?></h5>
                    </div>
                    <div class="col-md-2 col-sm-2 col-2">

                    </div>
                </div><br><br>



                <div class="row">
                    <div class="col-md-3">
                        <img src="../imgs/productos/prince_20220902_1725.jpg" width="250">
                    </div>

                    <div class="col-md-3">
                        <img src="../imgs/productos/prince_20220902_1725.jpg" width="250">
                    </div>

                    <div class="col-md-3">
                        <img src="../imgs/productos/prince_20220902_1725.jpg" width="250">
                    </div>

                    <div class="col-md-3">
                        <img src="../imgs/productos/prince_20220902_1725.jpg" width="250">
                    </div>
                </div>




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
