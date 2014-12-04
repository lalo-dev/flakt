<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="images/favicon.png">

	<title>FLAKT MÉXICO</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

	<!-- Bootstrap core CSS -->
	<link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="js/jquery.gritter/css/jquery.gritter.css" />

	<link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css">
  

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="../../assets/js/html5shiv.js"></script>
	  <script src="../../assets/js/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="js/jquery.nanoscroller/nanoscroller.css" />
	<link rel="stylesheet" type="text/css" href="js/jquery.easypiechart/jquery.easy-pie-chart.css" />
	<link rel="stylesheet" type="text/css" href="js/bootstrap.switch/bootstrap-switch.css" />
	<link rel="stylesheet" type="text/css" href="js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" type="text/css" href="js/jquery.select2/select2.css" />
	<link rel="stylesheet" type="text/css" href="js/bootstrap.slider/css/slider.css" />
  <link rel="stylesheet" href="lib/magnific/magnific-popup.css"  />
	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet" />	

</head>

<body>

<!-- Fixed navbar -->
<!-- Se incluye la barra de navegación -->
<?php include_once("navbar.php"); ?>

<!-- Modal User -->
<div id="mdlCustomer" class=" white-popup mfp-hide colored-header " >
    <div class="md-content">
      <br/>
      <br/>
      <div class="modal-header">
        <h3>Customer Data</h3>
      </div>
      <br/>      
      <div class="modal-body" id="mdlBody">        
          
      </div>
      <div class="modal-footer">
        <button type="button" id="btnGuardar" onclick="guardaCustomer()" 
            class="btn btn-success btn-flat " data-dismiss="modal">Save</button>
      </div>
      <div id="mdlMensajes"> </div>
    </div>
</div>

<!-- Modal Contacts -->
<div id="mdlContacts" class=" white-popup mfp-hide colored-header " >
    <input type="hidden" id="hdnCustomerContactId" />
    <div class="md-content" style="display:none;" id="divContact">
      <br/>
      <br/>
      <div class="modal-header">
          <h3>Contact Data</h3>
      </div>
      <br/>      
      <div class="modal-body" id="mdlCBody">        
          
      </div>
      <div class="modal-footer">
        <button type="button" id="btnCGuardar" onclick="cancelaAccionContacto()" 
            class="btn btn-flat " data-dismiss="modal">Cancel</button>

        <button type="button" id="btnCGuardar" onclick="guardaContact()" 
            class="btn btn-success btn-flat " data-dismiss="modal">Save</button>
      </div>
      <div id="mdlCMensajes"> </div>
    </div>

    <div class="md-content" id="divContactList">
      <br/>
      <br/>
      <div class="modal-header">
        <h3>Contact List</h3>
      </div>
      <br/>     
      <div class="modal-body" > 
          <div class="row" >
          <div class="col-md-12">
            <div class="block-flat">
              <div class="header">              
                <div class="row">
                    <div class="col-md-3">
                      <button class="btn btn-primary" onclick="iniciaGuardaContact()" >
                        <i class="fa fa-building-o"></i>
                        New Contact
                      </button>  
                    </div>
                </div>
              </div>
              <div class="content">            
                <div class="table-responsive">
                <table class="table no-border hover">
                  <thead class="no-border">
                    <tr>
                      <th style="width:50%;"><strong>Name</strong></th>
                      <th style="width:20%;"><strong>Email</strong></th>
                      <th style="width:15%;"><strong>Phone</strong></th>
                      <th style="width:15%;"><strong>Action</strong></th>
                    </tr>
                  </thead>
                  <tbody class="no-border-y" id="tbContacts">
                    
                  </tbody>
                </table>  
                <div class="row text-center">
                      <ul class="pagination " id="Cpaginador"></ul>  
                  </div>  
                </div>
              </div>
            </div>        
          </div>
        </div>
          
      </div>
      <div id="mdlCMensajes"> </div>
    </div>
</div>

<div id="cl-wrapper">

  <!-- Se incluye el menu general -->
  <?php include_once("menu.php"); ?>

	<div class="container-fluid" id="pcont">
		<div class="page-head">
			<h2>Customers Administrator</h2>
    </div>		
    <div class="cl-mcont"> 
      <input type="hidden" id="hdnCustomerId" />
      
      <div class="row">
        <div class="col-md-12">
          <div class="block-flat">
            <div class="header">              
              <h3>Customers List</h3>
              <div class="row">
                  <div class="col-md-3">
                    <button class="btn btn-primary btnGuarda" >
                      <i class="fa fa-building-o"></i>
                      New Customer
                    </button>  
                  </div>
              </div>
              
            </div>
            <div class="content">            
              <div class="table-responsive">
              <table class="table no-border hover">
                <thead class="no-border">
                  <tr>
                    <th style="width:35%;"><strong>Name</strong></th>
                    <th style="width:35%;"><strong>Description</strong></th>
                    <th style="width:15%;"><strong>RFC</strong></th>
                    <th class="width:5%;" class="text-center"><strong>Contacts</strong></th>
                    <th style="width:15%;" class="text-center"><strong>Action</strong></th>
                  </tr>
                </thead>
                <tbody class="no-border-y" id="tbCustomers">
                  
                </tbody>
              </table>  
              <div class="row text-center">
                    <ul class="pagination " id="paginador"></ul>  
                </div>  
              </div>
            </div>
          </div>        
        </div>
      </div>


    </div>
	</div> 
	
</div>

	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
	<script type="text/javascript" src="js/jquery.sparkline/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="js/jquery.easypiechart/jquery.easy-pie-chart.js"></script>
	<script type="text/javascript" src="js/behaviour/general.js"></script>
  <script src="js/jquery.ui/jquery-ui.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.nestable/jquery.nestable.js"></script>
	<script type="text/javascript" src="js/bootstrap.switch/bootstrap-switch.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script src="js/jquery.select2/select2.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.slider/js/bootstrap-slider.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.gritter/js/jquery.gritter.js"></script>
  <script src="js/jquery.niftymodals/js/jquery.modalEffects.js"></script>
   
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/behaviour/voice-commands.js"></script>
  <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.flot/jquery.flot.js"></script>
  <script type="text/javascript" src="js/jquery.flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="js/jquery.flot/jquery.flot.resize.js"></script>
  <script type="text/javascript" src="js/jquery.flot/jquery.flot.labels.js"></script>

  <!-- Bloqueo de pagina -->
  <script type="text/javascript" src="lib/jquery.blockUI.js" ></script>
  <!-- Controlador de página -->
  <script type="text/javascript" src="lib/util.js" ></script>
  <script type="text/javascript" src="js/01Controladores/CCustomers.js" ></script>  

  <!-- PopUp -->
  <script type="text/javascript" src="lib/magnific/jquery.magnific-popup.min.js" ></script>  
  <!-- Paginacion -->
  <script type="text/javascript" src="lib/jquery.simplePagination.js" ></script>  

</body>
</html>
