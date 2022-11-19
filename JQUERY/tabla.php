<?php 
  include "../controllers/controller_consultas_admin.php";
?>

<?php
  $objDB = new ExtraerDatos();

  $prods = array();
  $prods = $objDB->listadodVentas();

foreach($prods as $rows){

	echo'<tr>
	 <td>'.$rows['fechac'].'</td>
	 <td>'.$rows['nombrec'].'</td>
	 <td>'.$rows['nombre'].'</td>
	 <td><img src="../'.$rows['foto1'].'" width="50"></td>
	 </tr>';
}
?>

