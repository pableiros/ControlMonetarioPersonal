<?php 
	session_start();

if (isset($_SESSION['idusuario'])) {
    require_once('conection.php');
    $sql = "UPDATE tblcategoria SET nombre=\"" . $_POST['nombrecategoriaedit'] . "\" WHERE id=" . $_POST['idcategoriaeditar'];
    $query = mysql_query($sql);
    //echo $sql;
    if ($query) {
        if ($_GET['pagina'] == "0") {
            header('location: ../Principal');
        } else {
            header('location: ../cartera.php?id=' . $_GET['pagina']);
        }
    }
} else {
    header('location: ../logout.php');
}
?>