<?php 
  include "../controllers/controller_consultas_ventas.php";
?>
<!DOCTYPE html>
<html>

<?php 
                        $objDB = new ExtraerDatos();

                        $idp = $_GET["cp"];//variable url

                        $comprasDetalle = array();
                        $comprasDetalle = $objDB->comprasDetalle($idp);
                        
                        ?>

<head>
    <title>Compras</title>
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
                            <h1 align="right"><b>Carrito de compra</b></h1>
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

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">



                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">

                                        <h4>
                                            <i class="fas fa-bicycle"></i><b> Tu casa ciclista L.T.D.A</b>
                                            <small class="float-right"><b>Fecha: </b>
                                                <?php echo $comprasDetalle[0]['fechac'] ?></small>
                                        </h4>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        Empresa
                                        <address>
                                            <strong>Admin, Inc.</strong><br>
                                            Calle 18 Carrera 20<br>
                                            Ciénaga Magdalena<br>
                                            Celular: 310 841 6583<br>
                                            Email: equipodetrabajosdjr@gmail.com
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        Cliente
                                        <address>
                                            <strong><?php echo $comprasDetalle[0]['nombrec'] ?></strong><br>
                                            <?php echo $comprasDetalle[0]['direccion'] ?><br>
                                            <?php echo $comprasDetalle[0]['ciudad'] ?><br>
                                            <?php echo $comprasDetalle[0]['telefono'] ?><br>
                                            <?php echo $comprasDetalle[0]['usuario'] ?><br>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">

                                        <br>
                                        <b>ID de Orden:</b> 4F3S8J<br>
                                        <b>Fecha de pago: </b><?php echo $comprasDetalle[0]['fechac'] ?><br>
                                        <b>Cuenta:</b> 968-34567
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>

                                                    <th>Producto</th>
                                                    <th>Serial #</th>
                                                    <th>Descripción</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td><?php echo $comprasDetalle[0]['nombre'] ?></td>
                                                    <td><?php echo $comprasDetalle[0]['referencia'] ?></td>
                                                    <td><?php echo $comprasDetalle[0]['descripcioncorta'] ?></td>
                                                    <td><?php echo $comprasDetalle[0]['valorcomercial'] ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-6">
                                        <p class="lead"><b>Métodos de pago:</b></p>
                                        <img src="../imgs/credit/visa.png" alt="Visa">
                                        <img src="../imgs/credit/mastercard.png" alt="Mastercard">
                                        <img src="../imgs/credit/american-express.png" alt="American Express">
                                        <img src="../imgs/credit/paypal2.png" alt="Paypal">

                                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">

                                        </p>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <p class="lead"><b>Fecha: </b><?php echo $comprasDetalle[0]['fechac'] ?></p>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th style="width:50%">Subtotal:</th>
                                                    <td>$<?php echo $comprasDetalle[0]['valorcomercial']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>IVA (19%) </th>
                                                    <td>$<?php 
                        $valor = $comprasDetalle[0]['valorcomercial']; 
                        $iva = ($valor * 19) / 100;

                        echo $iva;
                        ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td>$ <?php

                                                    $total = $valor + $iva;
                                                    echo $total;

                                                      ?>

                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-12">
                                        <a href="compras.php?cp=<?php echo $comprasDetalle[0]['cod']; ?>"
                                            target="_blank" class="btn btn-default"><i class="fas fa-print" id="lo"></i>
                                            Imprimir</a>
                                        <button type="button" class="btn btn-success float-right"><i
                                                class="far fa-credit-card"></i> Pagar

                                        </button>
                                        <button type="button" class="btn btn-primary float-right"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-download"></i> Generar PDF
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.invoice -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->




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

    <script type="text/javascript">
    window.addEventListener("lo", window.print());
    </script>
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