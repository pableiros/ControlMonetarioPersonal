<?php 
	session_start();

	if (isset($_SESSION['user']) && isset($_POST['tipo']) && isset($_POST['nombreCategoria'])) {
		require_once('conexion.php');
		$sql = "insert into tblcategoria(nombre, idUsuario, idTipo)
		 values('".$_POST['nombreCartera']."', ".$_SESSION['idUsuario'].", ".$_SESSION['idTipo'].");";
		$query = mysql_query($query, $conn);
		if ($query) {
				//Regresar al index
			}	
	}else{
		
		header('Location ../login.php');
	}
 ?>