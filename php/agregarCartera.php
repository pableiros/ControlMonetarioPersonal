<?php 
	session_start();

	if (isset($_SESSION['user']) && isset($_POST['nombreCartera'])) {
		require_once('conexion.php');
		$sql = "insert into tblcartera(nombre, idUsuario) values('".$_POST['nombreCartera']."', ".$_SESSION['idUsuario'].");";
		$query = mysql_query($query, $conn);
		if ($query) {
                                header('Location ../Principal.php');
			}	
	}else{
		
		header('Location ../login.php');
	}
 ?>