<?php 
  session_start();
  if (!isset($_SESSION['user'])) {
    header("Location login.php");
  }else{
    require_once 'php/conexion.php';

 ?>
<!DOCTYPE html>
<!-- saved from url=(0039)http://getbootstrap.com/examples/theme/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Theme Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="http://getbootstrap.com/dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/theme/theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Theme Template for Bootstrap_files/ie-emulation-modes-warning.js"></script><style type="text/css"></style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style id="holderjs-style" type="text/css"></style></head>

  <body role="document">

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://getbootstrap.com/examples/theme/#">Bootstrap theme</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://getbootstrap.com/examples/theme/#">Home</a></li>
            <li><a href="http://getbootstrap.com/examples/theme/#about">About</a></li>
            <li><a href="http://getbootstrap.com/examples/theme/#contact">Contact</a></li>
            <li class="dropdown">
              <a href="http://getbootstrap.com/examples/theme/#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="http://getbootstrap.com/examples/theme/#">Action</a></li>
                <li><a href="http://getbootstrap.com/examples/theme/#">Another action</a></li>
                <li><a href="http://getbootstrap.com/examples/theme/#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="http://getbootstrap.com/examples/theme/#">Separated link</a></li>
                <li><a href="http://getbootstrap.com/examples/theme/#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container theme-showcase" role="main">





      <div class="page-header">
        <h1>Agregar Producto</h1>
        <h2>Nombre Categoria: <?php echo $_GET['nombreCategoria'] ?></h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form role="form" method="post" action="php/agregarProducto.php">
              <div class="form-group">
                <label for="categoriaInput">Nombre Categoria</label>
                <input type="text" class="form-control" name="nombreCategoria" id="categoriaInput" placeholder="Ingrese el nombre de la categoria">
              </div>
              <div class="form-group">
                <label for="categoriaInput">Seleccione el tipo de categoria</label>
                
                <?php
                  $sql = "select * from tblcategoria where activo = 1 and idUsuario = ".$_SESSION['idUsuario'];
                  $query = mysql_query($conn, $sql);
                  echo '<select name="categoria">';
                  while ($row = mysql_fetch_array($query)) {
                    echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
                  }
                  echo '</select>';
                ?>
              </div>
           
              <input type="submit" class="btn btn-default" value="Agregar">
            </form>
            
        </div>
      </div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Theme Template for Bootstrap_files/jquery.min.js"></script>
    <script src="./Theme Template for Bootstrap_files/bootstrap.min.js"></script>
    <script src="./Theme Template for Bootstrap_files/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Theme Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
  
</body></html>
 <?php   } ?>