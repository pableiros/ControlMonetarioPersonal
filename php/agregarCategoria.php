<?php 
	session_start();

	if (isset($_SESSION['idusuario']) && isset($_POST['nombreCategoria'])) {
		require_once('conection.php');
		$sql = "insert into tblcategoria(id, activo, nombre, idTipo, idUsuario)
		 values(NULL, 1, '".$_POST['nombreCategoria']."', ".$_GET['tipo'].", ".$_SESSION['idusuario'].");";
		$query = mysql_query($sql);
		echo $sql;
		if ($query) {
    			header('location: ../Principal.php'); 
			}	
	}else{		
    	header('location: ../logout.php'); 
	}
 ?>