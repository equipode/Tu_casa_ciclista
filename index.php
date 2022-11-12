<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="templates/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="templates/AdminLTE-3.0.5/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="templates/AdminLTE-3.0.5/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link href="CSS/style.css" rel="stylesheet">
</head>

<body>

    <?php include "includesp/config.php"; ?>

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand <?php echo $headerStyle; ?>" id="header">
            <?php 
      include "includesp/header.php";
    ?>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar <?php echo $lateralStyle; ?> elevation-4" id="lateral">
            <?php 
    include "includesp/lateralaside.php";
     ?>
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 align="right"><b>Tu Casa Ciclista</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="views/iniciar_sesion.php">Login</a></li>

                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
                <?php 
                include "includesp/slaider.php"
                
                ?>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container">
                    <h2><b>Hola, aficionados ciclistas</b></h2><br>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Somos el sitio web ideal donde puedes encontrar las mejores opciones de bicicletas de
                                alta gama, buena calidad y a tu gusto.</h2><br>
                        </div>
                    </div>
                </div><br><br>

                <!-- TITULO -->
                <div class="container">
                    <div class="row">

                        <div align="center" class="col-md-12">
                            <h2><b>¡Mira lo que te ofrecemos!</b></h2>
                        </div>

                    </div>
                </div><br>

                <!-- IMAGENES CON TEXTO -->
                <div class="container">
                    <div class="row">

                        <div class="col-md-4">
                            <img src="imgs/Principal/imge1.jpg" alt="" width="350" height="300">

                        </div>
                        <div class="col-md-4">
                            <img src="imgs/Principal/img2.jpg" alt="" width="350" height="300">
                        </div>

                        <div class="col-md-4">
                            <img src="imgs/Principal/img3.png" alt="" width="350" height="300">
                        </div>

                    </div>
                </div><br>

                <div class="container">
                    <div class="row">

                        <div class="col-md-4">
                            <h2><b>Bicicleta urbana</b></h2>
                            <h3>Ideal para desplazarte por la ciudad con seguridad.</h3>

                        </div>
                        <div class="col-md-4">
                            <h2><b>Bicicleta profesional</b></h2>
                            <h3>Perfecta para entrenar.</h3>
                        </div>

                        <div class="col-md-4">
                            <h2><b>Bicicleta de montaña</b></h2>
                            <h3>Perfecta para entrenar en zona montañosa y rural.</h3>
                        </div>

                    </div>
                </div><br><br>
                <!-- /.content -->

                <div class="container">
                    <h2 align="center"><b>¿Por qué es bueno a hacer ciclismo?</b></h2><br>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Los expertos dicen que practicar ciclismo te ayuda a mejorar el rendimiento del corredor
                                al mejorar la forma física, la
                                resistencia y el aguante sin dañar los músculos de las piernas. También es un gran
                                ejercicio cardiovascular de bajo impacto y, al añadirlo a tu régimen de entrenamiento
                                semanal, te ayudará a hacer más con menos estrés en tu cuerpo.</h2><br>
                        </div>
                    </div>
                </div><br><br>

                <div class="container">
                    <div class="row">
                        <div align="center" class="col-md-12">
                            <iframe width="853" height="480" src="https://www.youtube.com/embed/-TaHV3Ziw_A"
                                title="10 BENEFICIOS de andar en BICICLETA para tu SALUD" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div><br>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="imgs/Principal/fondo.png" alt="" width="1099" height="500">
                        </div>
                    </div>
                </div><br><br>




                <!-- TITULO -->
                <div class="container">
                    <div class="row">

                        <div align="left" class="col-md-12">
                            <h2><b>Mira el listado de nuestros productos</b></h2>
                            <a class="btn btn-primary" href="views/productos.php" role="button">¡Ingresa aquí!</a>
                        </div>
                    </div>

                </div>

                <!-- TITULO -->
                <div class="container">
                    <div class="row">

                        <div align="right" class="col-md-12">
                            <h2><b>¿No tienes una cuenta?</b></h2>
                            <a class="btn btn-primary" href="views/crear_cuenta.php" role="button">¡Crea una!</a>
                            <a class="btn btn-primary" href="views/iniciar_sesion.php" role="button">O ingresa</a>
                        </div>
                    </div>

                </div>

        </div><br>


        </section>



    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <?php 
      include "includesp/footer.php";
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
    <script src="templates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="templates/AdminLTE-3.0.5/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="templates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="templates/AdminLTE-3.0.5/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- AdminLTE App -->
    <script src="templates/AdminLTE-3.0.5/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="templates/AdminLTE-3.0.5/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="templates/AdminLTE-3.0.5/dist/js/demo.js"></script>

</body>

</html>