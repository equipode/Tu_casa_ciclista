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
                            <h1>Información de los usuarios</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index_admin.php">Home</a></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->


            <section class="content">

                <?php 
            $objDB = new ExtraerDatos();

            $listadousuarios = array();
            $listadousuarios = $objDB->listadoUsuarios();

            if($listadousuarios){

              echo "<div class='row'>";
              
            //proceso para mostrar listas de datos
            foreach ($listadousuarios as $rows){  //la variable rows puede ser cualquier nombre y lo que hace es ir registro por registro de la tabla
        ?>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                            Usuario
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b><?php echo $rows["nombre"]; ?></b></h2>
                                    <!--en esta parte va el nombre -->
                                    <p class="text-muted text-sm"><b>Descripción: </b>Desarrollador de software e
                                        inteligencia artificial. </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i
                                                    class="fas fa-lg fa-building"></i></span> Dirección:
                                            <?php echo $rows["direccion"]; ?></li>
                                        <li class="small"><span class="fa-li"><i
                                                    class="fas fa-lg fa-phone"></i></span>Telefono #:
                                            <?php echo $rows["telefono"]; ?></li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="../<?php echo $rows['foto']; ?>" alt="" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="editar_perfil_usuarios.php?cp=<?php echo $rows['id']; ?>"
                                    class="bnt btn-xs btn-info"><i class="fa fa-edit"></i></a>
                                <a href="eliminar_usuarios.php?cp=<?php echo $rows['id']; ?>"
                                    class="bnt btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }//Fin del foreach

            echo "</div>";

            }else{
              echo "No hay datos o no se pudo conectar a la fuente";
            }
            
            
            ?>
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