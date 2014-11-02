<?php 
	session_start();

	if (isset($_GET['idcartera'])) {

		require_once('conection.php');
		
		$sql = "update tblcartera set activo = 0 where id = ".$_GET['idcartera'];
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