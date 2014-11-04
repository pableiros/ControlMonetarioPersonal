<?php
    if (isset($_POST['nombrecarteraedit']) && isset($_GET['pagina'])) {
    require_once('conection.php');
    $sql = "UPDATE tblcartera SET nombre='". $_POST['nombrecarteraedit'] . "' WHERE id=" . $_POST['idcarteraeditar'];
    $query = mysql_query($sql);
    echo $sql;
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
