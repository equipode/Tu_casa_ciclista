<?php 
  include "../controllers/controller_consultas_ventas.php";
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 align="right"><b>Registro de compra</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">titulo Corto</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            
            <!-- Main content -->
   

            <section class="content">
            <?php 
        //La variable $objDB apunta a la clase ExtraerDatos Que esta en los Controllers
            $objDB = new ExtraerDatos();

            $listadousuarios = array();
            $listadousuarios = $objDB->listadoVentas();

            if($listadousuarios){

              echo "<div class='row'>";
              
            //proceso para mostrar listas de datos
             //la variable rows puede ser cualquier nombre y lo que hace es ir registro por registro de la tabla
            foreach ($listadousuarios as $rows){ 
        ?>
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="card bg-light">
                       
                        <div class="card-body pt-0">
                            <div class="row">

                                <div class="col-7">
                                <b>Cliente: </b><?php echo $rows["nombrec"]; ?>
                                    <br>
                                    <b>Producto:</b> <?php echo $rows["nombre"]; ?><br>
                                    <b> Descripción:</b> <?php echo $rows["descripcion"]; ?><br>
                                    
                                </div>

                                <div class="col-5 text-center">
                                    <img src="../<?php echo $rows['foto1']; ?>" alt="" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                  <!-- Los dos enlaces siguientes son para editar y eliminar -->
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="compras.php?cp=<?php echo $rows['cod']; ?>"
                                    class="bnt btn-xs btn-info">Continuar </a>
                                 
                            </div>
                        </div>
                    <!-- fin de los enlaces de editar y eliminar-->
                    </div>
                </div>

                <?php
            }//Fin del foreach

            echo "</div>"; //fin del row

            }else{
              echo "No hay datos o no se pudo conectar a la fuente";
            }            
            //fin de la validación
            ?>



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