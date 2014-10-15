

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.css" />										<!-- Bootstrap Main Style css -->
    <link rel="stylesheet" href="css/dataTables.tableTools.min.css" />										<!-- Bootstrap Theme Table tools Style css -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.css" />											<!-- Bootstrap Theme for DataTables css -->
    <link rel="stylesheet" href="css/alertify.min.css" />                     								<!-- Alertify style css -->
    <link rel="stylesheet" href="css/alertify.bootstrap.css" />   
    <title>Control Monetario Personal</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery-1.11.1.js"></script>				<!-- jquery 1.11.1 js -->
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>		<!-- jquery dataTables js -->
    <script type="text/javascript" language="javascript" src="js/dataTables.tableTools.min.js"/></script>	<!-- jquery tableTools js -->
    <script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js"/></script>		<!-- jquery dataTables bootstrap theme js -->
    <script type="text/javascript" language="javascript" src="js/alertify.min.js"></script>					<!-- alertify js -->
    <script type="text/javascript" language="javascript" src="js/ownscript.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
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
    
        </head>

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
          <a class="navbar-brand" href="#">Control Monetario Personal</a>
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
    
    <div class="modal fade" id="ModalNuevaCartera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nueva Cartera</h4>
                </div>
                <form class="modal-form form-horizontal"  role="form" action="" method="POST" id="categoriaseditform" onReset="javascript:location.reload()">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label class="control-label">Nombre de la cartera:</label>
                                <input type="text" id="nombrecarteraedit" name="nombrecarteraedit" class="form-control" required="required" >
                            </div>               
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btntovalidate" class="btn btn-primary" onclick="javascript." >Agregar</button>
                    </div>
                </form>
            </div>
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

    <div id="popover-contentCartera" class="hide">
        <div class="popover-content" style="width:400px">
         <form class="modal-form form-horizontal"  role="form" action="" method="POST" id="categoriaseditform" onReset="javascript:location.reload()">
            <div class="form-group">
                <div class="col-lg-12">
                    <label class="control-label">Nombre nuevo de la cartera:</label>
                    <input type="text" id="nombrecarteraedit" name="nombrecarteraedit" class="form-control" required="required" >
                </div>               
            </div>
            <div class="form-group"><!-- Grupo de botones -->
                <div class="col-sm-12">
                    <button type="submit" id="btntovalidate" class="btn btn-lg btn-primary btn-block" onclick="javascript." ><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                </div>
            </div><!-- Grupo de botones fin -->    
        </form>
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

    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron" style="background-color:#99ccff">
            <div class="row">
                <div class="col-lg-2">
                    <img alt="" src="images/monedas.png" width="130" height="180">
                </div>
                <div class="col-lg-10">
                    <h1 style="font-family: fantasy">Sistema de Control Monetario</h1>
                    <h3>Bienvenido jArredondo</h3>
                    <p>Registre diariamente sus ingresos y egresos para tener una mayor eficiencia en su control monetario.</p>
                </div>
            </div>
        </div>
        <div class="page-header">
            <h1 class="text-center">Carteras</h1>
        </div>

        <div>
            <div class="row">
                <div class="col-lg-4 text-center">
                    <div class="form-group">
                        <table>
                            <tr>
                                <td rowspan="2" width="66%"><a href="cartera.html"><img src="images/cartera.png" width="300" height="220"  /></a></td>
                                <td><button type="button" class="btn btn-danger botonesRedondos"> <span class="glyphicon glyphicon-remove"></span></button></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: bottom;"><button type="Button" class="btnEditarCartera btn btn-default botonesRedondos"  ><span class="glyphicon glyphicon-pencil"></span></button></td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group text-center">
                        <h3>Caja Fuerte</h3>
                    </div>
                    <div class="form-group text-success">
                        <h4>$8035.00</h4>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="form-group">
                        <table>
                            <tr>
                                <td rowspan="2" width="66%"><a href="cartera1.html"><img src="images/cartera.png" width="300" height="220"  /></a></td>
                                <td><button type="button" class="btn btn-danger botonesRedondos"> <span class="glyphicon glyphicon-remove"></span></a></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: bottom;"><button type="Button" class=" btnEditarCartera btn btn-default botonesRedondos"  ><span class="glyphicon glyphicon-pencil"></span></button></td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group text-center">
                        <h3>Alcancía</h3>
                    </div>
                    <div class="form-group text-success">
                        <h4>$1290.00</h4>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="form-group">
                        <a href="#" data-toggle='modal' data-target='#ModalNuevaCartera'><img src="images/cartera.png" width="300" height="220"  /></a>
                    </div>
                </div>
            </div>
        </div>

      </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
        <script type="text/javascript">    
            $('.btnEditarCartera').popover({ 
                    placement : 'top',
                    html : true,
                    content: function() {
                      return $("#popover-contentCartera").html();
                    }
                });

            $('body').on('click', function (e) {
                $('.btnEditarCartera').each(function () {
                    //the 'is' for buttons that trigger popups
                    //the 'has' for icons within a button that triggers a popup
                    if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                        $(this).popover('hide');
                    }
                });
            });
    </script>
  
</body>
</html>