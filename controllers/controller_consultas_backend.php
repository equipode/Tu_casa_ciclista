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

	
	//MUESTRA LISTADO DE USUARIOS
	function listadoUsuarios($start=0, $regsCant = 0){
		$sql = "SELECT * FROM usuarios";
		if ($regsCant > 0 )
			 $sql = "SELECT * from usuarios $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	// DETALLE DE USUARIOS SELECICONADA SEGUN ID
	function usuariosDetalle($idu){
		$sql = "SELECT * from usuarios where id=$idu ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	//listado de productos
	function listadoProductos($start=0, $regsCant = 0){
		$sql = "SELECT * FROM productos";
		if ($regsCant > 0 )                   //productos es como se llama la tabla en la base de datos
			 $sql = "SELECT * from productos $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	//Detalle de productos
	function productoPorId($idFilter){
		$sql = "SELECT * from productos where cod=$idFilter";
		if ($regsCant > 0)
		      $sql = "SELECT * from productos where cod=$idFilter $start, $regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	//Detalle de productos segun concidencia
	function productoPorIdCoinc($idFilter){
		$sql = "SELECT * from productos where nombre like '%$idFilter%' ";
		if ($regsCant > 0)
		      $sql = "SELECT * from productos where nombre like '%$idFilter%' $start, $regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	// ****************************************************************************
	// Agregue aqui debajo el resto de Funciones - Se ha dejado  Listado y detalle
	// ****************************************************************************

	

	
}//fin CLASE

?>
