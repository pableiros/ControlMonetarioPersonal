<?php
       require_once('conection.php');
        $sql = "select * from tblproducto where activo = 1 and idCategoria = " . $_POST['option'];
        
        $query = mysql_query($sql);
        echo '<select id="productosEgresos" name="producto" class="form-control">';
        echo '<option value="" disabled selected>Seleccione un producto</option>';
        while ($row = mysql_fetch_array($query)) {
            echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
        }
        echo '</select>';
?>