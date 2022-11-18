<?php   
  require ("../models/models_admin.php");
  include "../controllers/controller_consultas_backend_editodel.php";  
  //se llama al otro controller pa que no valla a ver envio de datos
  date_default_timezone_set("America/Bogota");
?>

<?php 
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

    <link href="../CSS/style.css" rel="stylesheet">
</head>

<!-- class="sidebar-collapse sidebar-mini" -->

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
                            <h1 align="right"><b>Editar Producto</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active"><a href="index_admin.php">Home</a></li>
                                <li class="breadcrumb-item active"><a href="productos_admin.php">Listado</a></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->

            <?php 

if(isset($_GET["cp"])){//URL PERFECTA

  $objDBC = new ExtraerDatos();

  $producto = array();
  $producto = $objDBC->productoPorId($_GET["cp"]);

  if($producto){ //VERIFICA QUE LA INFORMACION EXISTE

?>

            <section class="content" id="fondo">

                <div class="row">

                    <div class="col-md-2">

                    </div>

                    <!-- COLUMNA DE FORMULARIO  -->
                    <div class="col-md-8">
                        <!-- columna de contenido -->


                        <!-- /.card-header -->
                        <div class="card">
                            <div class="card-header bg-indigo">
                                <h3 class="card-title">Formulario de Datos </h3>
                            </div>
                            <!-- Para controles de formularios siempre usar etiqueta FORM -->

                            <?php 
            if(isset($_POST["txt_refer"])){//verificar la existencia de envio de datos

              $codp = $_POST["txt_codprod"];
              $refer = $_POST["txt_refer"];
              $nombr = $_POST["txt_Nombre"];
              $descr = $_POST["txt_Descri"];
              $descor = $_POST["txt_Descor"];
              $canti = $_POST["txt_cantEx"];
              $vlrcm = $_POST["txt_vlrCom"];
              $fotop = $_POST["txt_foto"];
              $fotop2 = $_POST["txt_foto2"];
              $fotop3 = $_POST["txt_foto3"];
              $fotop4 = $_POST["txt_foto4"];
              $fotop5 = $_POST["txt_foto5"];

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

              //echo $msgfile imagen2;

              //Verificamos que el usuario halla seleccionado archivos
              //y se procede a subir al servidor y elazarlo a la base de datos    
              $ext =""; $msgfile = ""; $logError="";
              if(isset($_FILES["txt_File2"]['name']) && $_FILES["txt_File2"]['name']!=null ){           
                $extens = array('.jpeg'=>'JPEG','.JPEG'=>'JPEG','.jpg' => 'JPG', '.png' => 'PNG', '.JPG' => 'JPG', '.PNG' => 'PNG');
                $ext = strrchr(basename($_FILES["txt_File2"]['name']),".");        
                if($extens[$ext]){            
                  if($_FILES["txt_File2"]['error'] == UPLOAD_ERR_OK ){ //Si el archivo se paso correctamente Continuamos 
                    $fotop2 = "imgs/productos/";
                    $postname = date("Y").date("m").date("d")."_".date("H").date("i");
                    $fullname = explode(".",basename($_FILES["txt_File2"]['name'])); // variabe temporal para sacar el nombre y separarlo de la extension
                    $NombreOriginal = $fullname[0];//Obtenemos el nombre original del archivo
                    $temporal = $_FILES["txt_File2"]['tmp_name']; //Obtenemos la ruta Original del archivo
                    $Destino = "../".$fotop2.$NombreOriginal."_".$postname.$ext; //Creamos una ruta de destino con la variable ruta y el nombre original del archivo 
                    $fotop2 = $fotop2.$NombreOriginal."_".$postname.$ext; //Esto se guarda en el campo imagend e la base de dato
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

               //echo $msgfile imagen3;

              //Verificamos que el usuario halla seleccionado archivos
              //y se procede a subir al servidor y elazarlo a la base de datos    
              $ext =""; $msgfile = ""; $logError="";
              if(isset($_FILES["txt_File3"]['name']) && $_FILES["txt_File3"]['name']!=null ){           
                $extens = array('.jpeg'=>'JPEG','.JPEG'=>'JPEG','.jpg' => 'JPG', '.png' => 'PNG', '.JPG' => 'JPG', '.PNG' => 'PNG');
                $ext = strrchr(basename($_FILES["txt_File3"]['name']),".");        
                if($extens[$ext]){            
                  if($_FILES["txt_File3"]['error'] == UPLOAD_ERR_OK ){ //Si el archivo se paso correctamente Continuamos 
                    $fotop3 = "imgs/productos/";
                    $postname = date("Y").date("m").date("d")."_".date("H").date("i");
                    $fullname = explode(".",basename($_FILES["txt_File3"]['name'])); // variabe temporal para sacar el nombre y separarlo de la extension
                    $NombreOriginal = $fullname[0];//Obtenemos el nombre original del archivo
                    $temporal = $_FILES["txt_File3"]['tmp_name']; //Obtenemos la ruta Original del archivo
                    $Destino = "../".$fotop3.$NombreOriginal."_".$postname.$ext; //Creamos una ruta de destino con la variable ruta y el nombre original del archivo 
                    $fotop3 = $fotop3.$NombreOriginal."_".$postname.$ext; //Esto se guarda en el campo imagend e la base de dato
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

               //echo $msgfile imagen4;

              //Verificamos que el usuario halla seleccionado archivos
              //y se procede a subir al servidor y elazarlo a la base de datos    
              $ext =""; $msgfile = ""; $logError="";
              if(isset($_FILES["txt_File4"]['name']) && $_FILES["txt_File4"]['name']!=null ){           
                $extens = array('.jpeg'=>'JPEG','.JPEG'=>'JPEG','.jpg' => 'JPG', '.png' => 'PNG', '.JPG' => 'JPG', '.PNG' => 'PNG');
                $ext = strrchr(basename($_FILES["txt_File4"]['name']),".");        
                if($extens[$ext]){            
                  if($_FILES["txt_File4"]['error'] == UPLOAD_ERR_OK ){ //Si el archivo se paso correctamente Continuamos 
                    $fotop4 = "imgs/productos/";
                    $postname = date("Y").date("m").date("d")."_".date("H").date("i");
                    $fullname = explode(".",basename($_FILES["txt_File4"]['name'])); // variabe temporal para sacar el nombre y separarlo de la extension
                    $NombreOriginal = $fullname[0];//Obtenemos el nombre original del archivo
                    $temporal = $_FILES["txt_File4"]['tmp_name']; //Obtenemos la ruta Original del archivo
                    $Destino = "../".$fotop4.$NombreOriginal."_".$postname.$ext; //Creamos una ruta de destino con la variable ruta y el nombre original del archivo 
                    $fotop4 = $fotop4.$NombreOriginal."_".$postname.$ext; //Esto se guarda en el campo imagend e la base de dato
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

               //echo $msgfile imagen5;

              //Verificamos que el usuario halla seleccionado archivos
              //y se procede a subir al servidor y elazarlo a la base de datos    
              $ext =""; $msgfile = ""; $logError="";
              if(isset($_FILES["txt_File5"]['name']) && $_FILES["txt_File5"]['name']!=null ){           
                $extens = array('.jpeg'=>'JPEG','.JPEG'=>'JPEG','.jpg' => 'JPG', '.png' => 'PNG', '.JPG' => 'JPG', '.PNG' => 'PNG');
                $ext = strrchr(basename($_FILES["txt_File5"]['name']),".");        
                if($extens[$ext]){            
                  if($_FILES["txt_File5"]['error'] == UPLOAD_ERR_OK ){ //Si el archivo se paso correctamente Continuamos 
                    $fotop5 = "imgs/productos/";
                    $postname = date("Y").date("m").date("d")."_".date("H").date("i");
                    $fullname = explode(".",basename($_FILES["txt_File5"]['name'])); // variabe temporal para sacar el nombre y separarlo de la extension
                    $NombreOriginal = $fullname[0];//Obtenemos el nombre original del archivo
                    $temporal = $_FILES["txt_File5"]['tmp_name']; //Obtenemos la ruta Original del archivo
                    $Destino = "../".$fotop5.$NombreOriginal."_".$postname.$ext; //Creamos una ruta de destino con la variable ruta y el nombre original del archivo 
                    $fotop5 = $fotop5.$NombreOriginal."_".$postname.$ext; //Esto se guarda en el campo imagend e la base de dato
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

              $ejecucion = $objDBO->Operaciones("UPDATE info_productos SET referencia='$refer', nombre='$nombr', descripcion='$descr', descripcioncorta='$descor', cantidad=$canti, valorcomercial=$vlrcm, 
              foto1='$fotop', foto2='$fotop2', foto3='$fotop3', foto4='$fotop4', foto5='$fotop5'
                                                 WHERE cod=$codp ");

if($ejecucion){ // Todo se ejecuto correctamente
  echo "
  <audio controls='' autoplay='' id='ocultar'>
  <source src='../Audios/sony1.mp3' type='audio/mp3'>
  </audio>
  <div class='alert alert-success'>
           Producto ha sido actualizado correctamente
        </div>
        ";
}else{ // Algo paso mal
  echo "
  <audio controls='' autoplay='' id='ocultar'>
  <source src='../Audios/sony2.mp3' type='audio/mp3'>
  </audio>

  <div class='alert alert-danger'>
           Ha ocurrido un error inexperado
        </div>";
}

              $objDBO->close();


            }
            ?>


                            <form role="form" name="frm_prods" id="frm_prods" method="POST"
                                action="editar_productos.php?cp=<?php echo $_GET['cp']; ?>"
                                enctype="multipart/form-data">
                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txt_refer">Referencia</label>
                                                <input type="text" class="form-control" id="txt_refer" name="txt_refer"
                                                    placeholder="#" value="<?php echo $producto[0]['referencia']; ?>">
                                            </div>
                                        </div>

                                        <!-- Control Inputbox ejemplo -->
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txt_Nombre">Nombre del Producto</label>
                                                <input type="text" class="form-control" id="txt_Nombre"
                                                    name="txt_Nombre" placeholder="Nombre"
                                                    value="<?php echo $producto[0]['nombre']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txt_Descor">Descripción corta</label>
                                                <textarea class="form-control" rows="3" placeholder="Describa..."
                                                    name="txt_Descor"
                                                    id="txt_Descri"><?php echo $producto[0]['descripcioncorta']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txt_Descri">Coloque una Descripción</label>
                                                <textarea class="form-control" rows="3" placeholder="Describa..."
                                                    name="txt_Descri"
                                                    id="txt_Descri"><?php echo $producto[0]['descripcion']; ?></textarea>
                                            </div>
                                        </div>

                                        <!-- Control cantidad  -->
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txt_cantEx">Cantidad Existente</label>
                                                <input type="text" class="form-control" id="txt_cantEx"
                                                    name="txt_cantEx" placeholder="Cantidad"
                                                    value="<?php echo $producto[0]['cantidad']; ?>">
                                            </div>
                                        </div>

                                        <!-- Control VALOR -->
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txt_vlrCom">Valor Comercial</label>
                                                <input type="text" class="form-control" id="txt_vlrCom"
                                                    name="txt_vlrCom" placeholder="Valor"
                                                    value="<?php echo $producto[0]['valorcomercial']; ?>">
                                            </div>
                                        </div>

                                        <!-- IMAGEN 1 -->
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <br>
                                            <img src="../<?php echo $producto[0]['foto']; ?>" width="100">
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

                                        <!-- IMAGEN2 -->
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <br>
                                            <img src="../<?php echo $producto[0]['foto2']; ?>" width="100">
                                        </div>

                                        <!-- Control FileUpload ejemplo -->
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txtFile2">Subir Foto 2</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="txt_File2"
                                                            name="txt_File2">
                                                        <label class="custom-file-label"
                                                            for="txt_File2">Seleccionar</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- IMAGEN 3 -->
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <br>
                                            <img src="../<?php echo $producto[0]['foto3']; ?>" width="100">
                                        </div>
                                        <!-- Control FileUpload ejemplo -->
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txtFile3">Subir Foto 3</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="txt_File3"
                                                            name="txt_File3">
                                                        <label class="custom-file-label"
                                                            for="txt_File3">Seleccionar</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- IMAGEN 4 -->
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <br>
                                            <img src="../<?php echo $producto[0]['foto4']; ?>" width="100">
                                        </div>
                                        <!-- Control FileUpload ejemplo -->
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txtFile4">Subir Foto 4</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="txt_File4"
                                                            name="txt_File4">
                                                        <label class="custom-file-label"
                                                            for="txt_File4">Seleccionar</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- IMAGEN 5 -->
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <br>
                                            <img src="../<?php echo $producto[0]['foto5']; ?>" width="100">
                                        </div>
                                        <!-- Control FileUpload ejemplo -->
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="form-group">
                                                <label for="txtFile5">Subir Foto 5</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="txt_File5"
                                                            name="txt_File5">
                                                        <label class="custom-file-label"
                                                            for="txt_File5">Seleccionar</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div> <!-- /.fin row -->

                                </div> <!-- /.fin card-body -->

                                <div class="card-footer">
                                    <button type="submit" id="btn_actualizar" class="btn btn-success">Actualizar
                                        Producto</button>
                                    <a href="productos_admin.php" class="btn btn-default">Cancelar</a>
                                </div>

                                <input type="hidden" name="txt_codprod" id="txt_codprod"
                                    value="<?php echo $producto[0]['cod']; ?>">

                                <input type="hidden" name="txt_foto" id="txt_foto"
                                    value="<?php echo $producto[0]['foto']; ?>">

                                <input type="hidden" name="txt_foto2" id="txt_foto2"
                                    value="<?php echo $producto[0]['foto2']; ?>">

                                <input type="hidden" name="txt_foto3" id="txt_foto3"
                                    value="<?php echo $producto[0]['foto3']; ?>">

                                <input type="hidden" name="txt_foto4" id="txt_foto4"
                                    value="<?php echo $producto[0]['foto4']; ?>">

                                <input type="hidden" name="txt_foto5" id="txt_foto5"
                                    value="<?php echo $producto[0]['foto5']; ?>">

                            </form> <!-- /.fin Form -->

                        </div>
                        <div class="col-md-2">

                        </div>


                    </div>


            </section>

            <?php 
  }else{//en caso la URL tiene un valor incorrecto
    echo "<div class='alert alert-danger'>
              <b>No hay Datos</b><br>
              Información no existe en base de datos
          </div>";
  }
  ?>

            <?php 
  }else{//en caso que URL haya sido alterada
    echo "<div class='alert alert-danger'>
              <b>Acceso Denegado</b><br>
              Usted esta accediendo de forma incorrecta
          </div>";
  }
?>


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