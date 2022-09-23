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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            

            <!-- Main content -->

            <?php 
                        $objDB = new ExtraerDatos();

                        $idp = $_GET["cp"];//variable url

                        $productoDetalle = array();
                        $productoDetalle = $objDB->productoDetalle($idp);
                        
                        ?>


            <section class="content">

                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3 class="d-inline-block d-sm-none">Gravel</h3>
                                <div class="col-12">
                                    <img src="../<?php echo $productoDetalle[0]['foto'] ?>" class="product-image"
                                        alt="Product Image">
                                </div>
                                <div class="col-12 product-image-thumbs">
                                    <div class="product-image-thumb active"><img
                                            src="../<?php echo $productoDetalle[0]['foto'] ?>" alt="Product Image">
                                    </div>
                                    <div class="product-image-thumb"><img
                                            src="../<?php echo $productoDetalle[0]['foto'] ?>" alt="Product Image">
                                    </div>
                                    <div class="product-image-thumb"><img
                                            src="../<?php echo $productoDetalle[0]['foto'] ?>" alt="Product Image">
                                    </div>
                                    <div class="product-image-thumb"><img
                                            src="../<?php echo $productoDetalle[0]['foto'] ?>" alt="Product Image">
                                    </div>
                                    <div class="product-image-thumb"><img
                                            src="../<?php echo $productoDetalle[0]['foto'] ?>" alt="Product Image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h3 class="my-3"><?php echo $productoDetalle[0]['nombre'] ?></h3>
                                <p><?php echo $productoDetalle[0]['descripcioncorta'] ?></p>
                                <h4 class="mt-3">Escoja <small>su talla</small></h4>
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
                                        <?php echo $productoDetalle[0]['valorcomercial'] ?>
                                    </h2>
                                    <h4 class="mt-0">
                                        <small>Ex Tax: $80.00 </small>
                                    </h4>
                                </div>

                                <div class="mt-4">
                                    <div class="btn btn-primary btn-lg btn-flat">
                                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                        Add to Cart
                                    </div>

                                    <div class="btn btn-default btn-lg btn-flat">
                                        <i class="fas fa-heart fa-lg mr-2"></i>
                                        Add to Wishlist
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
                                        aria-selected="true">Description</a>
                                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                                        href="#product-comments" role="tab" aria-controls="product-comments"
                                        aria-selected="false">Comments</a>
                                    <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
                                        href="#product-rating" role="tab" aria-controls="product-rating"
                                        aria-selected="false">Rating</a>
                                </div>
                            </nav>

                            <!--de aqui pa bajo va la descripcion comentarios y raiting -->
                            <div class="tab-content p-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                                    aria-labelledby="product-desc-tab"><?php echo $productoDetalle[0]['descripcion'] ?>
                                </div>

                                <div class="tab-pane fade" id="product-comments" role="tabpanel"
                                    aria-labelledby="product-comments-tab">
                                    Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat
                                    laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget
                                    neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit,
                                    consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris
                                    ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus,
                                    ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem,
                                    dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna
                                    elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel,
                                    tincidunt ipsum.
                                </div>

                                <div class="tab-pane fade" id="product-rating" role="tabpanel"
                                    aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non,
                                    posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id
                                    fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel
                                    ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod
                                    neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet
                                    feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie
                                    lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at,
                                    consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a.
                                    Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi
                                    orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius
                                    massa at semper posuere. Integer finibus orci vitae vehicula placerat.
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