<?php 
	session_start();

	if (isset($_SESSION['user']) && isset($_POST['nombreIngreso']) && isset($_POST['cantidad'])) {
		require_once('conexion.php');
		$sql = "insert into tblegreso(nombre, cantidad, fecha, unix, idProducto, idCategoria)
		 values('".$_POST['nombreIngreso']."', ".$_POST['cantidad'].",
		 CURDATE(), ".time().", ".$_POST['idProducto'].", ".$_POST['idCategoria'].");";
		$query = mysql_query($query, $conn);
		if ($query) {
				//Regresar al index
			}	
	}else{
		
		header('Location ../login.php');
	}
 ?>