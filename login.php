<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="images/favicon.png">

	<title>FLAKT MÉXICO</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

	<!-- Bootstrap core CSS -->
	<link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

	<link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css">
	<link rel="stylesheet" href="lib/magnific/magnific-popup.css"  />

	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet" />	

</head>

<body class="texture">

<!-- Modal Register -->
<div id="mdlRegister" class=" white-popup mfp-hide colored-header " >
    <div class="md-content">
      <br/>
      <br/>
      <div class="modal-header">
        <h2>Register Data</h2>
      </div>
      <br/>      
      <div class="modal-body" id="mdlRegisterBody">        
          
      </div>
      <div class="modal-footer">
        <button type="button" id="btnGuardar" onclick="guardaRegister()" 
            class="btn btn-success btn-flat " data-dismiss="modal">Register</button>
      </div>
      <div id="mdlMensajes"> </div>
    </div>
</div>


<div id="cl-wrapper" class="login-container">

	<div class="middle-login">
		<div class="block-flat">
			<div class="header">							
				<h3 class="text-center">FLAKT MEXICO</h3>
			</div>
			<div>
				<form style="margin-bottom: 0px !important;" class="form-horizontal" action="">
					<div class="content">
						<h4 class="title">Login</h4>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" placeholder="Enter your E-mail" id="txtUsuario" class="form-control" autofocus>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="password" placeholder="Enter your Password" id="txtContrasenia" class="form-control">
									</div>
								</div>
							</div>
							
					</div>
					<div class="foot">
						<div class="row">
							<button class="btn btn-default" id="btnRegister" type="button">Register</button>
							<button class="btn btn-default" data-dismiss="modal" type="button">Ask for password</button>
							<button class="btn btn-primary" data-dismiss="modal"
								onclick="validaUsuario();return false;" type="submit">Login</button>	
						</div>
						<div class="row">&nbsp;</div>
					</div>
					<div id="cMensajes" > </div>
				</form>
			</div>
		</div>
		<div class="text-center out-links"><a href="#">&copy; 2015 FLAKT MÉXICO</a></div>
	</div> 
	
</div>

	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/behaviour/general.js"></script>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
  	<script src="js/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Bloqueo de pagina -->
	<script type="text/javascript" src="lib/jquery.blockUI.js" ></script>
	<!-- Controlador de página -->
	<script type="text/javascript" src="lib/util.js" ></script>
	<script type="text/javascript" src="js/01Controladores/CLogin.js" ></script>	
  	<!-- PopUp -->
  	<script type="text/javascript" src="lib/magnific/jquery.magnific-popup.min.js" ></script>  
</body>
</html>