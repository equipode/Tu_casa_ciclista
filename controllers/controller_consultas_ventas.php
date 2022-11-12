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

	
	//MUESTRA LISTADO DE CLIENTES
	function listadoVentas($start=0, $regsCant = 0){
		$sql = "SELECT  iv.cod, c.nombrec, p.nombre
FROM info_venta AS iv
INNER JOIN info_clientes AS c ON iv.cliente=c.id
INNER JOIN info_productos AS p ON iv.fk_product=p.cod";

		if ($regsCant > 0 )
			 $sql = "SELECT  iv.cod, c.nombrec, p.nombre
			 FROM info_venta AS iv
			 INNER JOIN info_clientes AS c ON iv.cliente=c.id
			 INNER JOIN info_productos AS p ON iv.fk_product=p.cod $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	// DETALLE DE CLIENTES SELECCIONADA SEGUN ID
	function comprasDetalle($idp){
		$sql = "SELECT  iv.cod, c.nombrec, c.ciudad, c.direccion, c.telefono, c.usuario, p.nombre, p.referencia, p.descripcioncorta, p.valorcomercial
		FROM info_venta AS iv
		INNER JOIN info_clientes AS c ON iv.cliente=c.id
		INNER JOIN info_productos AS p ON iv.fk_product=p.cod
		 WHERE iv.cod=$idp ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	
	// ****************************************************************************
	// Agregue aqui debajo el resto de Funciones - Se ha dejado  Listado y detalle
	// ****************************************************************************

	

	
}//fin CLASE

?>