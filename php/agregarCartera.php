<?php 
	session_start();

	if (isset($_SESSION['idusuario']) && isset($_POST['nombrecartera'])) {

		require_once('conection.php');
		
		$sql = "insert into tblcartera(nombre, idUsuario) values('".$_POST['nombrecartera']."', ".$_SESSION['idusuario'].");";
		$query = mysql_query($sql);
		echo "
				<html>
					<head>
						<meta http-equiv='REFRESH' content='0;url=../Principal.php'>
					</head>
				</html>
			";
	}else{
	
		echo "
				<html>
					<head>
						<meta http-equiv='REFRESH' content='0;url=../index.php'>
					</head>
				</html>
			";
	}
 ?>