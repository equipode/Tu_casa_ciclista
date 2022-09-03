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
	function listadoclientes($start=0, $regsCant = 0){
		$sql = "SELECT * FROM info_clientes";
		if ($regsCant > 0 )
			 $sql = "SELECT * from info_clientes $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	// DETALLE DE CLIENTES SELECCIONADA SEGUN ID
	function clientesDetalle($idu){
		$sql = "SELECT * from info_clientes where id=$idu ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	// DETALLE DE PRODUCTOS
	function productoDetalle($idp){
		$sql = "SELECT * from info_productos where cod=$idp";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	//listado de productos
	function listadoProductos($start=0, $regsCant = 0){
		$sql = "SELECT * FROM info_productos";
		if ($regsCant > 0 )                   //productos es como se llama la tabla en la base de datos
			 $sql = "SELECT * from info_productos $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	//listado usuarios

	function listadoUsuarios($start=0, $regsCant = 0){
		$sql = "SELECT * FROM info_usuarios";
		if ($regsCant > 0 )
			 $sql = "SELECT * from info_usuarios $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	//Usuarios detalles

	function usuariosDetalle($idc){
		$sql = "SELECT * from info_usuarios where id=$idc ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	//Detalle de productos
	function productoPorId($idFilter){
		$sql = "SELECT * from info_productos where cod=$idFilter";
		if ($regsCant > 0)
		      $sql = "SELECT * from info_productos where cod=$idFilter $start, $regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

		//Detalle de usuarios
		function usuariosPorId($idFilter){
			$sql = "SELECT * from info_usuarios where id=$idFilter";
			if ($regsCant > 0)
				  $sql = "SELECT * from info_usuarios where id=$idFilter $start, $regsCant";
			$lista = $this->consulta_generales($sql);	
			return $lista;
		}

	//Detalle de productos segun concidencia
	function productoPorIdCoinc($idFilter){
		$sql = "SELECT * from info_productos where nombre like '%$idFilter%' ";
		if ($regsCant > 0)
		      $sql = "SELECT * from info_productos where nombre like '%$idFilter%' $start, $regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	// ****************************************************************************
	// Agregue aqui debajo el resto de Funciones - Se ha dejado  Listado y detalle
	// ****************************************************************************

	

	
}//fin CLASE

?>
