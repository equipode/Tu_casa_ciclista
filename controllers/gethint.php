<?php

// get the q parameter from URL
$q = $_REQUEST["q"];

//$hint = "";
//servidor local
$con = mysqli_connect('localhost','root','12345678','db_asistencia');
//Servidor web

if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// lookup all hints from array if $q is different from ""
if ($q !="") {
  /*$q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }*/
$result=mysqli_query($con,"SELECT * FROM registro_asistencia WHERE name='$q'");
$rowcount=mysqli_num_rows($result);
if($rowcount==0){
$ret=mysqli_query($con,"INSERT INTO `registro_asistencia`(name,Time) VALUES ('$q',NOW())");
if($ret)
{
echo '<div class="alert alert-success"><strong>Success!</strong>Estudiante registrado</div> '+date('l jS \of F Y h:i:s A'); 
?>
<?php }
else
{

}
}else{
//echo 'employee is already registered';  
echo '<div class="alert alert-success"><strong>Success!</strong>Estudiante registrado</div>';


  }

}

// Output "no suggestion" if no hint was found or output correct values
//echo $hint === "" ? "no suggestion" : $hint;
?>
