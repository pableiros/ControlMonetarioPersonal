<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
	<title></title>
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="css/signin.css" rel="stylesheet">
</head>
<body>
	<div class="container">
            <center><img src="images/logo.png" width="auto" height="130" title="Logo" alt="logo"></center>
		<form class="form-signin" method="POST" action="">
			<h2 class="form-signin-heading">Inciar sesi&oacute;n</h2></center>
			<input type="text" name="user" class="form-control" placeholder="Usuario" value="pborquez" autofocus required="required"><br>
			<input type="password" name="pass" class="form-control" placeholder="Contraseña" value="123" required="required">
			<!--<label class="checkbox">
			<input type="checkbox" value="remember-me"> Recordar
			</label> -->
			<button name="login" class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
		</form>
	</div>
	  <?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    include_once "php/conection.php";
    include_once "php/paths_permission.php";
  
    function verificar_login($user,$pass,&$result) { 
      $sql = "SELECT * FROM tblusuario WHERE user = '$user' AND pass = '$pass' AND activo = 1";
      
      $sql_client = "SELECT A.id, A.user, A.pass
      FROM tblusuario AS A";

      $rec_client = mysql_query($sql_client);

      $rec = mysql_query($sql); 
      $flag = false; 
    
      if($row = mysql_fetch_object($rec)) 
      { 
          $flag = true; 
          $row_client = mysql_fetch_object($rec_client);
          $result = $row_client; 
      }   
      echo $sql;
      return $flag;
    } 
  
	if(!isset($_SESSION['idusuario'])) 
	{ 
	    if(isset($_POST['login'])) 
	    { 
	        if(verificar_login($_POST['user'],md5($_POST['pass']),$result) == true) 
	        {

	          $_SESSION['idusuario'] = $result->id; 
	          $_SESSION['username'] = $result->user; 
	          check_session(0);
	          echo($_SESSION['idusuario']);     
	        } 
	        else 
	        { 
	            echo '<center><br><div class="alert alert-danger">Usuario y/o Password incorrecto, intente de nuevo!</div></center>'; 
	        } 
	    }
	}
	else 
	{
	  if($_SESSION['idusuario']>=1)
	    header("location:principal.php");
	  //header("location:admin.php");
	  //echo '<center><br><div class="alert alert-warning">Usurio ya identicado, desea hacer <a href="logout.php">LOGOUT?</a></div></center>'; 
	}  
?>
</body>
</html>