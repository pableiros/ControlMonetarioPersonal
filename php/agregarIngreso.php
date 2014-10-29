<?php 
	session_start();
        $cartera = $_GET['idCartera'];

        
	if (isset($_SESSION['username']) && isset($_POST['nombreIngreso']) && isset($_POST['cantidad']) && isset($_POST['categoriaIngresos'])) {
		require_once('conection.php');
                    $consulta = mysql_query("SELECT id FROM tblproducto WHERE nombre = 'N/A'");
                    $producto = mysql_fetch_array($consulta);
                  
                    $sql = "insert into tblmovimiento (comentario,
                    cantidad, 
                    fecha, 
                    unix, 
                    activo, 
                    idCategoria,
                    idProducto,
                    idCartera)
		 values(
                 '".$_POST['nombreIngreso']."',"
                        . " ".$_POST['cantidad'].",                          
		 CURDATE(),
                 ".time().","
                        . " 1 ,"
                        . " ".$_POST['categoriaIngresos'].","
                        . " ".$producto['id'].","
                        . " ".$cartera." );";
		$query = mysql_query($sql);
		echo "
				<html>
					<head>
						<meta http-equiv='REFRESH' content='0;url=../cartera.php?id=".$cartera."'>
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

