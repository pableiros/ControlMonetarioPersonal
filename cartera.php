<?php 
    include_once "php/conection.php";
    include_once "php/paths_permission.php";
    
    function cargarSelectCategorias($nomSelect, $tipo) {
    $sql = "select * from tblcategoria where activo = 1 and idUsuario = " . $_SESSION['idusuario'] . " and idTipo = " . $tipo;
    $query = mysql_query($sql);
    echo '<select id="categoriaInput" name="'.$nomSelect.'" class="form-control" required>';
    echo '<option value="" disabled selected>Seleccione una categoria</option>';
    while ($row = mysql_fetch_array($query)) {
        echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
    }
    echo '</select>';   
    }
    
    function  cargarTablaMovimiento(){
        $sql = "select * from vistamovimientos where idCartera = '".$_GET['id']."'";
        $query = mysql_query($sql);
        echo '<tbody>';
        while ($row = mysql_fetch_array($query)) {
            if ($row['nomProducto'] == "N/A") {
                // es ingreso
                echo '<tr><td class="center success">';
                echo '<span class="glyphicon glyphicon-plus"></span>';
                echo '</td>'
                . '<td class="right">$' . $row['cantidad'] . '</td>'
                . '<td class="right"><strong>' . $row['nomCategoria'] . '</strong></td>'
                . '<td><small>' . $row['comentario'] . '</small></td>'
                . '<td class="small-text left">' . $row['fecha'] . '<td>';
            } else {
                // es egreso
                echo '<tr><td class="center danger">';
                echo '<span class="glyphicon glyphicon-minus"></span>';
                echo '</td>'
                . '<td class="right">$' . $row['cantidad'] . '</td>'
                . '<td class="right"><strong>' . $row['nomCategoria'] . '</strong></td>'
                . '<td><small>' . $row['nomProducto'] . '</small></td>'
                . '<td class="small-text left">' . $row['fecha'] . '<td>';
            }
            echo '</tr>';
        }
        echo '</tbody>';
    }


?>
<!DOCTYPE html>
<!-- saved from url=(0043)http://getbootstrap.com/examples/jumbotron/ -->
<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.css" />										<!-- Bootstrap Main Style css -->
    <link rel="stylesheet" href="css/dataTables.tableTools.min.css" />										<!-- Bootstrap Theme Table tools Style css -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.css" />											<!-- Bootstrap Theme for DataTables css -->
    <link rel="stylesheet" href="css/alertify.min.css" />                     								<!-- Alertify style css -->
    <link rel="stylesheet" href="css/alertify.bootstrap.css" />   
    <style type="text/css">
      body {
        padding-top: 50px;
        padding-bottom: 20px;
      }
      .right{
        text-align: right;
      }
      .left{
        text-align: left;
      }
      .big-text{
          font-size: 30px;
      }
      .small-text{
          font-size: 13px;
      }
      .center{
          text-align: center;
      }
      .botonesRedondos{
          height: 48px;
          width: 48px;
          border-radius: 24px;
      }
      a.myButtons {
          border-radius: 20px;
          padding: 10px 12.3px;
      }
      .popover {
          max-width:500px;
      }
    </style>

    <title>Control Monetario Personal | Cartera</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery-1.11.1.js"></script>				<!-- jquery 1.11.1 js -->
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>		<!-- jquery dataTables js -->
    <script type="text/javascript" language="javascript" src="js/dataTables.tableTools.min.js"/></script>	<!-- jquery tableTools js -->
    <script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js"/></script>		<!-- jquery dataTables bootstrap theme js -->
    <script type="text/javascript" language="javascript" src="js/alertify.min.js"></script>					<!-- alertify js -->
    <script type="text/javascript" language="javascript" src="js/ownscript.js"></script>
    <style type="text/css"></style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="Principal.php">Control Monetario Personal</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#" data-toggle='modal' data-target='#myModalCategorias'>Categorías</a></li>
                    </ul>
                    <form class="navbar-form navbar-right" action="logout.php">
                        <button type="submit" class="btn btn-default">Cerrar Sesi&oacute;n</button>
                    </form>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <div class="modal fade" id="myModalCategorias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-pencil"></span>  Categorías: </h4>
					</div>
					<div class="modal-body">
						<div id="autorespanelgroup" class="panel-group">
							<div id="accordion" class="panel panel-primary">
								<div class="panel-heading btn btn-lg btn-primary btn-block" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
									<h4 class="panel-title">
										<span class="glyphicon glyphicon-plus"></span>   Nueva categoría
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse">
									<div class="panel-body">
										<form class="form-horizontal col-lg-10 col-lg-offset-1" id="categoriasaddform" role="form" action="" method="POST" onReset="javascript:location.reload()">
											<div class="form-group">
												<div class="col-lg-12">
													<label class="control-label">Nombre(s):</label>
													<input type="text" id="nombreCategoria" name="nombreCategoria" class="form-control" onKeyPress="return filtrado(event)" required="required" >
												</div>
											</div>
											<div class="form-group"><!-- Grupo de botones -->
												<div style="margin-bottom:5px;" class="col-sm-6">
													<button type="submit" id="btntovalidate" class="btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
												</div>
												<div class="col-sm-6">
													<button type="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="btn btn-lg btn-danger btn-block"><span class="glyphicon glyphicon-floppy-remove"></span> Cancel</button>
												</div>
											</div><!-- Grupo de botones fin -->
										</form>
									</div>
								</div>
							</div>
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h4 class="panel-title text-center">Categorías</h4>
								</div>
								<div class="panel-body">
									<table width="99.99%" id="datatablecategorias" class="table table-hover table-condensed display">
										<thead>
											<tr>
												<th class="hidden"><b></b></th>
												<th class='text-center'><b>Editar</b></th>
												<th><b>Nombre</b></th>
												<th><b>Productos</b></th>
												<th class='text-center'><b>Eliminar</b></th>
											</tr>
										</thead>
										<tbody id="tbodyTablaCategorias">
											<tr>
												<td class="hidden">1</td>
												<td width='60' class='text-center'><a href='#' class='btn btn-default myButtons BotonEditarCategoria'><span class='glyphicon glyphicon-pencil'></span></a></td>
												<td>Servicios</td>
												<td width='60' class='text-center'><a href='#' class='btn btn-default myButtons BotonProductosModal'><span class='glyphicon glyphicon-plus'></span></a></td>
												<td width='60' class='text-center'><a href='#' class='btn btn-danger myButtons BotonEliminarCategoria'><span class='glyphicon glyphicon-remove'></span></a></td>
											</tr>
											<tr>
												<td class="hidden">2</td>
												<td width='60' class='text-center'><a href='#' class='btn btn-default myButtons BotonEditarCategoria'><span class='glyphicon glyphicon-pencil'></span></a></td>
												<td>Vicios</td>
												<td width='60' class='text-center'><a href='#' class='btn btn-default myButtons BotonProductosModal'><span class='glyphicon glyphicon-plus'></span></a></td>
												<td width='60' class='text-center'><a href='#' class='btn btn-danger myButtons BotonEliminarCategoria'><span class='glyphicon glyphicon-remove'></span></a></td>
											</tr>
											<tr>
												<td class="hidden">3</td>
												<td width='60' class='text-center'><a href='#' class='btn btn-default myButtons BotonEditarCategoria'><span class='glyphicon glyphicon-pencil'></span></a></td>
												<td>Electronica</td>
												<td width='60' class='text-center'><a href='#' class='btn btn-default myButtons BotonProductosModal'><span class='glyphicon glyphicon-plus'></span></a></td>
												<td width='60' class='text-center'><a href='#' class='btn btn-danger myButtons BotonEliminarCategoria'><span class='glyphicon glyphicon-remove'></span></a></td>
											</tr>
											<tr>
												<td class="hidden">4</td>
												<td width='60' class='text-center'><a href='#' class='btn btn-default myButtons BotonEditarCategoria'><span class='glyphicon glyphicon-pencil'></span></a></td>
												<td>Entretenimiento</td>
												<td width='60' class='text-center'><a href='#' class='btn btn-default myButtons BotonProductosModal'><span class='glyphicon glyphicon-plus'></span></a></td>
												<td width='60' class='text-center'><a href='#' class='btn btn-danger myButtons BotonEliminarCategoria'><span class='glyphicon glyphicon-remove'></span></a></td>
											</tr>
											<tr>
												<td class="hidden">5</td>
												<td width='60' class='text-center'><a href='#' class='btn btn-default myButtons BotonEditarCategoria'><span class='glyphicon glyphicon-pencil'></span></a></td>
												<td>Ropa</td>
												<td width='60' class='text-center'><a href='#' class='btn btn-default myButtons BotonProductosModal'><span class='glyphicon glyphicon-plus'></span></a></td>
												<td width='60' class='text-center'><a href='#' class='btn btn-danger myButtons BotonEliminarCategoria'><span class='glyphicon glyphicon-remove'></span></a></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<script type="text/javascript">
								$('#datatablecategorias')
								.removeClass( 'display' )
								.addClass('table table-striped table-bordered');
							</script>
						</div>
					</div>
					<div class="modal-footer">
					</div>
				</div>
			</div>
    </div>
        <div class="modal fade" id="myModalProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-pencil"></span>  Productos: </h4>
                </div>
                <div class="modal-body">
                    <div id="autorespanelgroup" class="panel-group">
                        <div id="accordion" class="panel panel-primary">
                            <div class="panel-heading btn btn-lg btn-primary btn-block" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                <h4 class="panel-title">
                                    <span class="glyphicon glyphicon-plus"></span>   Nuevo producto
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <form class="form-horizontal col-lg-10 col-lg-offset-1" id="productosaddform" role="form" action="" method="POST" onReset="javascript:location.reload()">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <label class="control-label">Nombre:</label>
                                                <input type="text" id="nombreProducto" name="nombreProducto" class="form-control" onKeyPress="return filtrado(event)" required="required" >
                                            </div>
                                        </div>
                                        <div class="form-group"><!-- Grupo de botones -->
                                            <div style="margin-bottom:5px;" class="col-sm-6">
                                                <button type="submit" id="btntovalidate" class="btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="btn btn-lg btn-danger btn-block"><span class="glyphicon glyphicon-floppy-remove"></span> Cancel</button>
                                            </div>
                                        </div><!-- Grupo de botones fin -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title text-center">Productos</h4>
                            </div>
                            <div class="panel-body">
                                <table width="99.99%" id="datatableproductos" class="table table-hover table-condensed display">
                                    <thead>
                                        <tr>
                                            <th class="hidden"><b></b></th>
                                            <th class='text-center'><b>Editar</b></th>
                                            <th><b>Nombre</b></th>
                                            <th class='text-center'><b>Eliminar</b></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyTablaCategorias">
                                        <tr>
                                            <td class="hidden">1</td>
                                            <td width='60' class='text-center'><a href='#' class='btn btn-default myButtons BotonEditarProducto'><span class='glyphicon glyphicon-pencil'></span></a></td>
                                            <td>Pantalon</td>
                                            <td width='60' class='text-center'><a href='#' class='btn btn-danger myButtons BotonEliminarProducto'><span class='glyphicon glyphicon-remove'></span></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <script type="text/javascript">
                                $('#datatableproductos')
                                .removeClass( 'display' )
                                .addClass('table table-striped table-bordered');
                        </script>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
        <div id="popover-content" class="hide">
            <form class="modal-form form-horizontal" role="form" action="" method="POST" id="categoriaseditform">
                <div class="form-group">
                    <div class="col-lg-12">
                        <label class="control-label">Nombre Categoría:</label>
                        <input type="text" id="nombrecategoriaedit" name="nombrecategoriaedit" class="form-control" required="required" >
                    </div>               
                </div>
                <div class="form-group"><!-- Grupo de botones -->
                    <div class="col-sm-12">
                        <button type="submit" id="btntovalidate" class="btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                    </div>
                </div><!-- Grupo de botones fin -->    
            </form>
        </div>
    <?php 
    
    $sql = "SELECT * FROM vistadetallecartera WHERE id =".$_GET['id'];
    $query = mysql_query($sql);
    $row = mysql_fetch_array($query);
 
    
    ?>        
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="center "><?php echo $row['nombre']; ?></h1>
        <h2 class="center"><?php echo '$'.$row['total']; ?></h2>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4 center">
            <img src="images/cartera.png" width="200"><br><br>
            <div class="row">
              <div class="btn-group btn-group-justified">
                <a class="btn btn-danger btn-lg" data-toggle="modal" data-target="#modalEgreso"><span class="glyphicon glyphicon-minus"></span></a>
                <a class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalIngreso"><span class="glyphicon glyphicon-plus"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </div>
<!-- CONTENEDOR BODY -->
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <table class="table table-hover big-text">
            <thead>
              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
          <!--  <tbody>
              <tr>
                <td class="center success"><span class="glyphicon glyphicon-plus"></span></td>
                <td class="right">$2000.00</td>
                <td class="right"><strong>Abono</strong></td>
                <td><small>Ya me pagó!</small></td>
                <td class="small-text left">14/Sep/2014</td>
              </tr>
              <tr>
                <td class="center danger"><span class="glyphicon glyphicon-minus"></span></td>
                <td class="right">$10.00</td>
                <td class="right"><strong>Vicios</strong></td>
                <td><small>Coca-Cola</small></td>
                <td class="small-text left">10/Sep/2014</td>
              </tr>
                <td class="center danger"><span class="glyphicon glyphicon-minus"></span></td>
                <td class="right">$100.00</td>
                <td class="right"><strong>Comida</strong></td>
                <td><small>Hamburgesa</small></td>
                <td class="small-text left">08/Sep/2014</td>
              </tr>
              <tr>
                <td class="center success"><span class="glyphicon glyphicon-plus"></span></td>
                <td class="right">$6200.00</td>
                <td class="right"><strong>Quincena</strong></td>
                <td><small>Finally!</small></td>
                <td class="small-text left">15/Ago/2014</td>
              </tr>
              <tr>
                <td class="center danger"><span class="glyphicon glyphicon-minus"></span></td>
                <td class="right">$10.00</td>
                <td class="right"><strong>Vicios</strong></td>
                <td><small>Coca-Cola</small></td>
                <td class="small-text left">10/Ago/2014</td>
              </tr> 
              <tr>
                <td class="center danger"><span class="glyphicon glyphicon-minus"></span></td>
                <td class="right">$10.00</td>
                <td class="right"><strong>Vicios</strong></td>
                <td><small>Coca-Cola</small></td>
                <td class="small-text left">08/Ago/2014</td>
              </tr>
              <tr>
                <td class="center danger"><span class="glyphicon glyphicon-minus"></span></td>
                <td class="right">$35.00</td>
                <td class="right"><strong>Novia</strong></td>
                <td><small>Rosa</small></td>
                <td class="small-text left">01/Ago/2014</td>
              </tr>
            </tbody>-->
            <?php cargarTablaMovimiento(); ?>
          </table>
        </div>
      </div>
<!-- CONTENEDOR BODY - FIN -->

<!-- MODAL EGRESO -->
      <div class="modal fade" id="modalEgreso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Nuevo Egreso</h4>
            </div>
              <form role="form" method="post" action="php/agregarEgreso.php?idCartera=<?php echo $_GET['id']; ?>">
            <div class="modal-body">
              
              <div class="form-group">
                <label for="categoriaInput">Nombre Egreso</label>
                <input type="text" class="form-control" name="nombreEgreso" id="nombreInput" required placeholder="Ingrese el nombre del egreso">
              </div>
              <div class="form-group">
                <label for="cantidadInput">Cantidad</label>
                <input type="number" class="form-control" step="0.01" name="cantidad" id="cantidadInput" required placeholder="Ingrese la cantidad">

              </div>
              <div class="form-group">
                <label for="categoriaInput">Seleccione el tipo de categoria</label>
               <?php              
                        cargarSelectCategorias('categoriasEgresos',2);
                ?>
              </div>
              <div class="form-group">
                  <label for="categoriaInput">Seleccione un producto</label>
                  <div id="contenedorProductos">
                        <select id="productosInput" nombre="producto" class="form-control">
                          <option value="" selected disabled>Seleccione un producto</option>
                      </select> 
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Agregar Egreso</button>
            </div>
             </form>
          </div>
        </div>
      </div>
<!-- MODAL EGRESO - FIN -->

<!-- MODAL INGRESO -->
      <div class="modal fade" id="modalIngreso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Nuevo Ingreso</h4>
            </div>
              <form role="form" method="post" action="php/agregarIngreso.php?idCartera=<?php echo $_GET['id']; ?>">
              <div class="modal-body">
                
                <div class="form-group">
                  <label for="categoriaInput">Nombre Ingreso</label>
                  <input type="text" class="form-control" name="nombreIngreso" required id="nombreInput" placeholder="Ingrese el nombre del ingreso">
                </div>
                <div class="form-group">
                  <label for="cantidadInput">Cantidad</label>
                  <input type="number" step="0.01" class="form-control" required name="cantidad" id="cantidadInput" placeholder="Ingrese la cantidad">
                </div>
                <div class="form-group">
                  <label for="categoriaInput">Seleccione el tipo de categoria</label>
                  <?php
                                  cargarSelectCategorias('categoriaIngresos',1);
                  ?>
                  
                </div>
               
             
                <!-- <input type="submit" class="btn btn-default" value="Agregar"> -->
             
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Agregar Ingreso</button>
              </div>
             </form>
          </div>
        </div>
      </div>
<!-- MODAL INGRESO - FIN -->
      <hr>

      <footer>
        <p>© Company 2014</p>
      </footer>
    </div> <!-- /container -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
      $('#categoriaInput').change(function(){
        $.ajax({
            url: "php/mostrarProductos.php",
            type: "post",
            data: {option: $(this).find("option:selected").val()},
            success: function(data){
                $("#contenedorProductos").html(data);
            }
        });
    });

    </script>
</body></html>

