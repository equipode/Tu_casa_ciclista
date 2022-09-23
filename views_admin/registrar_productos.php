<?php 
  require ("../models/models_admin.php");
  date_default_timezone_set("America/Bogota");
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

<!--class="sidebar-collapse sidebar-mini" -->

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
        <div class="content-wrapper" id="fondo">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 align="right">Crear nuevo Producto</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index_admin.php">Home</a></li>
                                <li class="breadcrumb-item active"><a href="productos_admin.php">Listado</a></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content" id="fondo">

                <div class="row">
                    <div class="col-md-2">

                    </div>

                    <!-- COLUMNA DE FORMULARIO  -->
                    <div class="col-md-8">
                        <!-- columna de contenido -->


                        <!-- /.card-header -->
                        <div class="card">
                            <div class="card-header bg-primary" class="Sub">
                                <h3 class="card-title">Formulario de Datos </h3>
                            </div>
                            <!-- Para controles de formularios siempre usar etiqueta FORM -->

                            <?php 
            if(isset($_POST["txt_refer"])){//verificar la existencia de envio de datos

              $refer = $_POST["txt_refer"];
              $nombr = $_POST["txt_Nombre"];
              $descr = $_POST["txt_Descri"];
              $descor = $_POST["txt_Descor"];
              $canti = $_POST["txt_cantEx"];
              $vlrcm = $_POST["txt_vlrCom"];



              //Verificamos que el usuario halla seleccionado archivos
              //y se procede a subir al servidor y elazarlo a la base de datos    
              $ext =""; $msgfile = ""; $logError="";
              if(isset($_FILES["txt_File"]['name']) && $_FILES["txt_File"]['name']!=null ){           
                $extens = array('.jpeg'=>'JPEG','.JPEG'=>'JPEG','.jpg' => 'JPG', '.png' => 'PNG', '.JPG' => 'JPG', '.PNG' => 'PNG');
                $ext = strrchr(basename($_FILES["txt_File"]['name']),".");        
                if($extens[$ext]){            
                  if($_FILES["txt_File"]['error'] == UPLOAD_ERR_OK ){ //Si el archivo se paso correctamente Continuamos 
                    $fotop = "imgs/productos/";
                    $postname = date("Y").date("m").date("d")."_".date("H").date("i");
                    $fullname = explode(".",basename($_FILES["txt_File"]['name'])); // variabe temporal para sacar el nombre y separarlo de la extension
                    $NombreOriginal = $fullname[0];//Obtenemos el nombre original del archivo
                    $temporal = $_FILES["txt_File"]['tmp_name']; //Obtenemos la ruta Original del archivo
                    $Destino = "../".$fotop.$NombreOriginal."_".$postname.$ext; //Creamos una ruta de destino con la variable ruta y el nombre original del archivo 
                    $fotop = $fotop.$NombreOriginal."_".$postname.$ext; //Esto se guarda en el campo imagend e la base de dato
                    if(copy($temporal, $Destino)){ //Movemos el archivo temporal a la ruta especificada               
                      $msgfile = "Imagen subida.";
                    }else{
                      $msgfile .= "<span class='label label-danger'>la imagen del Producto .</span>";
                      $logError = "No se pudo subir la imagen del Producto, puede ser por tamaño. \n";
                    }  
                  }else{
                    $msgfile .= "<span class='label label-danger'>Error al transferirse el archivo.</span> ";
                  }

                }else{
                  $msgfile .= "<span class='label label-danger'><i class='fa fa-file-o'></i> Por seguridad se bloqueo el envío del archivo con extension no permitida [$ext].</span>"  ;  
                  $logError .="Por seguridad se bloqueo el envío del archivo con extension no permitida [$ext]. \n";
                } 
              }

              //echo $msgfile;

              $objDBO = new DBConfig();
              $objDBO->config();
              $objDBO->conexion();

              $ejecucion = $objDBO->Operaciones("INSERT INTO info_productos(referencia, nombre, descripcion, descripcioncorta, cantidad, valorcomercial, foto, fecha, hora) 
                                                                values('$refer', '$nombr', '$descr', '$descor', $canti, $vlrcm, '$fotop', NOW(), NOW() - 5 )  ");

              if($ejecucion){ // Todo se ejecuto correctamente
                echo "<div class='alert alert-success'>
                         Producto ha sido creado correctamente
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
                                action="registrar_productos.php" enctype="multipart/form-data">
                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txt_refer">Referencia</label>
                                                <input type="text" class="form-control" id="txt_refer" name="txt_refer"
                                                    placeholder="#">
                                            </div>
                                        </div>

                                        <!-- Control Inputbox ejemplo -->
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txt_Nombre">Nombre del Producto</label>
                                                <input type="text" class="form-control" id="txt_Nombre"
                                                    name="txt_Nombre" placeholder="Nombre">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txt_Descor">Descripción corta</label>
                                                <textarea class="form-control" rows="3" placeholder="Describa..."
                                                    name="txt_Descor" id="txt_Descor"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txt_Descri">Coloque una Descripción</label>
                                                <textarea class="form-control" rows="3" placeholder="Describa..."
                                                    name="txt_Descri" id="txt_Descri"></textarea>
                                            </div>
                                        </div>

                                        <!-- Control cantidad  -->
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txt_cantEx">Cantidad Existente</label>
                                                <input type="text" class="form-control" id="txt_cantEx"
                                                    name="txt_cantEx" placeholder="Stock">
                                            </div>
                                        </div>

                                        <!-- Control VALOR -->
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txt_vlrCom">Valor Comercial</label>
                                                <input type="text" class="form-control" id="txt_vlrCom"
                                                    name="txt_vlrCom" placeholder="Valor">
                                            </div>
                                        </div>

                                        <!-- Control Fecha -->
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txt_vlrCom">Fecha</label>
                                                <input type="text" class="form-control" id="txt_fecha" name="txt_fecha"
                                                    placeholder="Fecha y hora automatica">
                                            </div>
                                        </div>


                                        <!-- Control FileUpload ejemplo -->
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txtFile">Subir Foto</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="txt_File"
                                                            name="txt_File">
                                                        <label class="custom-file-label"
                                                            for="txt_File">Seleccionar</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div> <!-- /.fin row -->

                                </div> <!-- /.fin card-body -->

                                <div class="card-footer">
                                    <button type="submit" id="btn_regist" class="btn bg-primary">Registrar
                                        Producto</button>
                                    <button type="reset" class="btn btn-default">Limpiar</button>
                                </div>

                            </form>
                            <!-- /.fin Form -->



                        </div>

                    </div>

                    <div class="col-md-2">

                    </div>

                    <?php 
            $objDB = new ExtraerDatos();

            $productos = array();
            $productos = $objDB->listadoProductos();

            if($productos){

              echo "<div class='row'>";
              
            //proceso para mostrar listas de datos
            foreach ($productos as $rows){  //la variable rows puede ser cualquier nombre y lo que hace es ir registro por registro de la tabla
        ?>
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="card bg-light">
                            <div class="card-header text-muted border-bottom-0">
                                <h3><?php echo $rows["nombre"]; ?></h3>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h4>Precio: <?php echo $rows["valorcomercial"]; ?></h4>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="../<?php echo $rows['foto']; ?>" alt="" width="160px" height="160px"
                                            class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <!-- el cod es la clave primaria de la clave productos -->
                                    <a href="detalle_productos.php?cp=<?php echo $rows['cod'];?>"
                                        class="btn btn-sm btn-primary">
                                        </i> Detalle
                                    </a>
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



                    <!--  <div class="col-md-6">
                        <img src="../imgs/crear_productos/presentación.jpg">

                    </div>   -->


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
