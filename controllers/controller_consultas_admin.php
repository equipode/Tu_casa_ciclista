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

	
	//listado de productos
	function listadoProductos($start=0, $regsCant = 0){
		$sql = "SELECT COUNT(*) total_p FROM info_productos";
		if ($regsCant > 0 )                   //productos es como se llama la tabla en la base de datos
			 $sql = "SELECT COUNT(*) total_p FROM info_productos $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}


	//listado de productos
	function listadoUsuarios($start=0, $regsCant = 0){
		$sql = "SELECT COUNT(*) total_u FROM info_usuarios";
		if ($regsCant > 0 )                   //productos es como se llama la tabla en la base de datos
			 $sql = "SELECT COUNT(*) total_u FROM info_usuarios $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

    //listado de productos
	function listadoVentas($start=0, $regsCant = 0){
		$sql = "SELECT COUNT(*) total_v FROM info_venta";
		if ($regsCant > 0 )                   //productos es como se llama la tabla en la base de datos
			 $sql = "SELECT COUNT(*) total_v FROM info_venta $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

    //listado de productos
	function listadoClientes($start=0, $regsCant = 0){
		$sql = "SELECT COUNT(*) total_c FROM info_clientes";
		if ($regsCant > 0 )                   //productos es como se llama la tabla en la base de datos
			 $sql = "SELECT COUNT(*) total_c FROM info_clientes $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	


	// ****************************************************************************
	// Agregue aqui debajo el resto de Funciones - Se ha dejado  Listado y detalle
	// ****************************************************************************

	

	
}//fin CLASE

?>