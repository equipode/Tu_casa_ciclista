<?php 
  include "../controllers/controller_consultas_backend.php";
?>
<!DOCTYPE html>
<html>
<?php 
                        $objDB = new ExtraerDatos();

                        $idp = $_GET["cp"];//variable url

                        $productoDetalle = array();
                        $productoDetalle = $objDB->productoDetalle($idp);
                        
                        ?>

<head>
    <title><?php echo $productoDetalle[0]['nombre'] ?></title>
    <link rel="icon" href="../<?php echo $productoDetalle[0]['foto1'] ?>">
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


            <!-- Main content -->



            <section class="content">

                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3 class="d-inline-block d-sm-none">Gravel</h3>
                                <div class="col-12">
                                    <img src="../<?php echo $productoDetalle[0]['foto1'] ?>" class="product-image"
                                        alt="Product Image">
                                </div>
                                <div class="col-12 product-image-thumbs">
                                    <div class="product-image-thumb active"><img
                                            src="../<?php echo $productoDetalle[0]['foto1'] ?>" alt="Product Image">
                                    </div>
                                    <div class="product-image-thumb active"><img
                                            src="../<?php echo $productoDetalle[0]['foto2'] ?>" alt="Product Image">
                                    </div>
                                    <div class="product-image-thumb"><img
                                            src="../<?php echo $productoDetalle[0]['foto3'] ?>" alt="Product Image">
                                    </div>
                                    <div class="product-image-thumb"><img
                                            src="../<?php echo $productoDetalle[0]['foto4'] ?>" alt="Product Image">
                                    </div>
                                    <div class="product-image-thumb"><img
                                            src="../<?php echo $productoDetalle[0]['foto5'] ?>" alt="Product Image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h3 align="center" class="my-3"><b><?php echo $productoDetalle[0]['nombre'] ?></b></h3>
                                <p><h3><?php echo $productoDetalle[0]['descripcioncorta'] ?></h3></p>
                                <h4 class="mt-3"><b>Escoja su talla</b></h4>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-default text-center">
                                        <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                                        <span class="text-xl">S</span>
                                        <br>
                                        Small
                                    </label>
                                    <label class="btn btn-default text-center">
                                        <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                                        <span class="text-xl">M</span>
                                        <br>
                                        Medium
                                    </label>
                                    <label class="btn btn-default text-center">
                                        <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                                        <span class="text-xl">L</span>
                                        <br>
                                        Large
                                    </label>
                                    <label class="btn btn-default text-center">
                                        <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                                        <span class="text-xl">XL</span>
                                        <br>
                                        Xtra-Large
                                    </label>
                                </div>

                                <div class="bg-gray py-2 px-3 mt-4">
                                    <h2 class="mb-0">
                                        Precio: <?php echo $productoDetalle[0]['valorcomercial'] ?>
                                        <!-- <?php 
                                        
                                        // $hola = 200.000;
                                    //   $precio =  $productoDetalle[0]['valorcomercial'];
        

                                        // $resultado = $precio * 2;

                                        // echo $resultado;
                                        
                                        
                                        ?> -->

                                    </h2>
                                </div>

                                <div class="mt-4">
                                    <!-- <div class="btn btn-primary btn-lg btn-flat">
                                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                        Comprar
                                    </div> -->
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <!-- el cod es la clave primaria de la clave productos -->
                                            <a href="venta.php?cp=<?php echo $idp ?>"
                                                class="btn btn-sm btn-primary">
                                                </i> <h4>Comprar</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 product-share">
                                    <a href="#" class="text-gray">
                                        <i class="fab fa-facebook-square fa-2x"></i>
                                    </a>
                                    <a href="#" class="text-gray">
                                        <i class="fab fa-twitter-square fa-2x"></i>
                                    </a>
                                    <a href="#" class="text-gray">
                                        <i class="fas fa-envelope-square fa-2x"></i>
                                    </a>
                                    <a href="#" class="text-gray">
                                        <i class="fas fa-rss-square fa-2x"></i>
                                    </a>
                                </div>

                            </div>
                        </div>

                        <div class="row mt-4">

                            <nav class="w-100">
                                <div class="nav nav-tabs" id="product-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                        href="#product-desc" role="tab" aria-controls="product-desc"
                                        aria-selected="true"><b>Descripción</b></a>
                                </div>
                            </nav>

                            <!--de aqui pa bajo va la descripcion comentarios y raiting -->
                            <div class="tab-content p-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                                    aria-labelledby="product-desc-tab"><?php echo $productoDetalle[0]['descripcion'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- /.card -->












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