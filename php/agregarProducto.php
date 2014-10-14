<?php 
	session_start();

	if (isset($_SESSION['user']) && isset($_POST['nombreProducto'])) {
		require_once('conexion.php');
		$sql = "insert into tblproducto(nombre, idCategoria)
		 values('".$_POST['nombreProducto']."', ".$_POST['idCategoria'].");";
		$query = mysql_query($query, $conn);
		if ($query) {
				//Regresar al index
			}	
	}else{
		
		header('Location ../login.php');
	}
 ?>