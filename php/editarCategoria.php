<?php 
	session_start();

	if (isset($_SESSION['idusuario'])) {
		require_once('conection.php');
		$sql = "UPDATE tblcategoria SET nombre=\"".$_POST['nombrecategoriaedit']."\" WHERE id=".$_GET['id'];
		$query = mysql_query($sql);
		echo $sql;
		if ($query) {
    			header('location: http://localhost/ControlMonetarioPersonal/Principal.php'); 
			}	
	}else{		
    	header('location: http://localhost/ControlMonetarioPersonal/logout.php'); 
	}
 ?>