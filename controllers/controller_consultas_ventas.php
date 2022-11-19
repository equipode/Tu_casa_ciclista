<?php
session_start();
require_once( "../models/models_admin.php");

class ConsultasDB extends DBConfig {
    					
	function consulta_generales($sql){
		$this->config();
		$this->conexion(); 
		  
  		$records = $this->Consultas($sql);		 		  		  		  

  		$this->close();		
		return $records;				
	}
}
/**
* IMPLEMENTACION DE ACCESO A CONSULTAS PARA PROTEGER MAS LA VISTA
*/
class ExtraerDatos extends ConsultasDB
{
	//MUESTRA EL ULTIMO RESULTADO DE LA TABLA
	function listadoVentas($start=0, $regsCant = 0){
		$sql = "SELECT  iv.cod, c.nombrec, p.foto1 , p.nombre, p.descripcion
		FROM info_venta AS iv
		INNER JOIN info_clientes AS c ON iv.cliente=c.id
		INNER JOIN info_productos AS p ON iv.fk_product=p.cod
		WHERE iv.cod=(SELECT max(cod) FROM info_venta)";

		if ($regsCant > 0 )
			 $sql = "SELECT  iv.cod, c.nombrec, p.foto1 , p.nombre, p.descripcion
			 FROM info_venta AS iv
			 INNER JOIN info_clientes AS c ON iv.cliente=c.id
			 INNER JOIN info_productos AS p ON iv.fk_product=p.cod
			 WHERE iv.cod=(SELECT max(cod) FROM info_venta) $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	// DETALLE DE CADA VENTA
	function comprasDetalle($idp){
		$sql = "SELECT  iv.cod, iv.fechac, c.nombrec, c.ciudad, c.direccion, c.telefono, c.usuario, p.nombre, p.referencia, p.descripcioncorta, p.valorcomercial
		FROM info_venta AS iv
		INNER JOIN info_clientes AS c ON iv.cliente=c.id
		INNER JOIN info_productos AS p ON iv.fk_product=p.cod
		 WHERE iv.cod=$idp ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	
}//fin CLASE

?>