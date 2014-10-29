<?php

session_start();
$cartera = $_GET['idCartera'];

if (isset($_SESSION['username']) && isset($_POST['nombreEgreso']) && isset($_POST['cantidad'])) {
    require_once('conection.php');
    $sql = "insert into tblmovimiento(comentario,
                    cantidad,
                    fecha,
                    unix,
                    idCategoria,
                    idProducto,
                    idCartera)
		 values(
                 '" . $_POST['nombreEgreso'] . "',"
            . " " . $_POST['cantidad'] . ",                          
		 CURDATE(), 
                 " . time() . ","
            . " " . $_POST['categoriasEgresos']. ","
            . " " . $_POST['producto'] . ","
            . " " . $cartera . ");";
    $query = mysql_query($sql);

   echo "
				<html>
					<head>
						<meta http-equiv='REFRESH' content='0;url=../cartera.php?id=" . $cartera . "'>
					</head>
				</html>
			";
} else {

    echo "
				<html>
					<head>
						<meta http-equiv='REFRESH' content='0;url=../index.php'>
					</head>
				</html>
			";
}
?>