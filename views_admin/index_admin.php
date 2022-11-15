<?php 

include "../controllers/controller_consultas_admin.php";


 session_start();

 $nombre = $_SESSION['nombre'];

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



    <!--Estilos de las paginas web -->
    <link href="../CSS/style.css" rel="stylesheet">
</head>

<body>

    <?php include "includes/config.php"; ?>

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand <?php echo $headerStyle; ?>" id="header">
            <?php 
      include "includes/header.php";
    ?>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar <?php echo $lateralStyle; ?> elevation-4" id="lateral">
            <?php 
    include "includes/lateralaside.php";
     ?>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tu Casa Ciclista</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index_admin.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="../index.php">publica</a></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <h6>Hola <?php echo $nombre; ?></h6>

<div class="row">


                <?php 
            $objDB = new ExtraerDatos();

            $listadoVentas = array();
            $listadoVentas = $objDB->listadoVentas();


            if($listadoVentas){

            //   echo "<div class='row'>";
              
            //proceso para mostrar listas de datos
            foreach ($listadoVentas as $rows){  //la variable rows puede ser cualquier nombre y lo que hace es ir registro por registro de la tabla
        ?>

                <div class="col-3 col-sm-3 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cubes"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Ventas</span>
                            <span class="info-box-number">
                                <?php echo $rows["total_v"]; ?>

                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <?php   }  } ?>




                <?php 
            $objDB = new ExtraerDatos();

            $listadoProductos = array();
            $listadoProductos = $objDB->listadoProductos();


            if($listadoProductos){

            //   echo "<div class='row'>";
              
            //proceso para mostrar listas de datos
            foreach ($listadoProductos as $rowsp){  //la variable rows puede ser cualquier nombre y lo que hace es ir registro por registro de la tabla
        ?>

                <div class="col-3 col-sm-3 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cubes"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Productos</span>
                            <span class="info-box-number"><?php echo $rowsp["total_p"]; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <?php   }  } ?>
               
               
               
               
               
               <?php 
            $objDB = new ExtraerDatos();

            $listadoClientes = array();
            $listadoClientes = $objDB->listadoClientes();


            if($listadoClientes){

            //   echo "<div class='row'>";
              
            //proceso para mostrar listas de datos
            foreach ($listadoClientes as $rowsc){  //la variable rows puede ser cualquier nombre y lo que hace es ir registro por registro de la tabla
        ?>

                <div class="col-3 col-sm-3 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cubes"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Clientes</span>
                            <span class="info-box-number"><?php echo $rowsc["total_c"]; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <?php   }  } ?>



                <?php 
            $objDB = new ExtraerDatos();

            $listadoUsuarios = array();
            $listadoUsuarios = $objDB->listadoUsuarios();


            if($listadoUsuarios){

            //   echo "<div class='row'>";
              
            //proceso para mostrar listas de datos
            foreach ($listadoUsuarios as $rowsu){  //la variable rows puede ser cualquier nombre y lo que hace es ir registro por registro de la tabla
        ?>

                <div class="col-3 col-sm-3 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cubes"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Usuarios</span>
                            <span class="info-box-number"><?php echo $rowsu["total_u"]; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <?php   }  } ?>

                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <?php 
      include "includes/footer.php";
     ?>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Graficos-->


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