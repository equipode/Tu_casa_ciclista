<?php
////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////
// $host="localhost";
// $usuario="root";
// $contraseña="123456789";
// $base="db_subastas";

$conexion=mysqli_connect("localhost", "root", "123456789", "db_tienda_ciclista");

/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
$consulta="SELECT  iv.fechac, c.nombrec, p.foto1 , p.nombre
FROM info_venta AS iv
INNER JOIN info_clientes AS c ON iv.cliente=c.id
INNER JOIN info_productos AS p ON iv.fk_product=p.cod";

$resAlumnos=mysqli_query($conexion,$consulta);


///TABLA DONDE SE DESPLIEGAN LOS REGISTROS //////////////////////////////


				while ($filaAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
						 <td>'.$filaAlumnos['fechac'].'</td>
						 <td>'.$filaAlumnos['nombrec'].'</td>
						 <td>'.$filaAlumnos['nombre'].'</td>
						 <td><img src="../'.$filaAlumnos['foto1'].'" width="50"></td>
						 </tr>';
				}
		


        mysqli_free_result($resAlumnos);
        mysqli_close($conexion);      
?>
