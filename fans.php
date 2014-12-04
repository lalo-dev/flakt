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

<!-- Modal Fan -->
<div id="mdlFan" class=" white-popup mfp-hide colored-header " >
    <div class="md-content" id="divFanData" >
      <br/>
      <br/>
      <div class="modal-header">
        <h3>Fan Data</h3>
      </div>
      <br/>      
      <div class="modal-body" id="mdlFanBody" >        
          <form id="frmFan" class="form-horizontal" role="form">
            <div class="form-group">
                <div class="col-xs-7"></div>
                <label class="col-sm-2 control-label" >Id:</label>
                <div class="col-xs-3">
                    <input type="text" id="txtFanId" name="txtFanId"  class="form-control" 
                      value="0"  readonly>
                </div>
            </div>
            <div id="dDescription" class="form-group" >
              <label class="col-sm-2 control-label">Description:</label>
              <div class="col-sm-10">
                  <input type="text" name="txtDescription" id="txtDescription" 
                     class="form-control" placeholder="Description" maxlength="100" >
              </div>
            </div>
            <div id="dModel" class="form-group">
                <label class="col-sm-2 control-label">Model:</label>
                <div class="col-sm-4">
                  <select id="slcModel" name="slcModel" class="form-control">
                    <option value="">Select...</option>
                    <option value="AXIAL">AXIAL</option>
                    <option value="COOLER">COOLER</option>
                    <option value="FZ">FZ</option>
                    <option value="GL">GL</option>
                    <option value="HAC">HAC</option>
                    <option value="HC">HC</option>
                    <option value="HD">HD</option>
                    <option value="LH">LH</option>
                    <option value="RGML">RGML</option>
                    <option value="STDM">STDM</option>
                  </select>
                </div>
                <label class="col-sm-2 control-label">Presion:</label>
                <div class="col-sm-4">
                  <select id="slcPresion" name="slcPresion" class="form-control">
                    <option value="">Select...</option>             
                  </select>
                </div>
              </div>
              <div id="dPresion" class="form-group">
                <label class="col-sm-2 control-label">Aspa:</label>
                <div class="col-sm-4">
                  <select id="slcAspa" name="slcAspa" class="form-control">
                    <option value="">Select...</option>
                  </select>
                </div>
                <label class="col-sm-2 control-label">Arreglo:</label>
                <div class="col-sm-4">
                  <select id="slcArreglo" name="slcArreglo" class="form-control">
                    <option value="">Select...</option>
                  </select>
                </div>
              </div>
              <div id="dDiameters" class="form-group">
                <label class="col-sm-2 control-label">Diameters:</label>
                <div class="col-sm-4">
                    <input type="text" name="txtDiameters" id="txtDiameters" 
                       class="form-control" placeholder="Diameters" maxlength="100" >
                </div>
                <label class="col-sm-2 control-label">Volumes:</label>
                <div class="col-sm-4">
                    <input type="text" name="txtVolumes" id="txtVolumes" 
                       class="form-control" placeholder="Volumes" maxlength="100" >
                </div>
              </div>
              <div id="dPressures" class="form-group">
                <label class="col-sm-2 control-label">Pressures:</label>
                <div class="col-sm-4">
                    <input type="text" name="txtPressures" id="txtPressures" 
                       class="form-control" placeholder="Pressures" maxlength="100" >
                </div>
                <label class="col-sm-2 control-label">Impeller:</label>
                <div class="col-sm-4">
                    <input type="text" name="txtImpeller" id="txtImpeller" 
                       class="form-control" placeholder="Impeller" maxlength="100" >
                </div>
              </div>
              <div id="dCaseStyle" class="form-group">
                <label class="col-sm-2 control-label">Case Style:</label>
                <div class="col-sm-4">
                    <input type="text" name="txtCaseStyle" id="txtCaseStyle" 
                       class="form-control" placeholder="Case Style" maxlength="100" >
                </div>
                <label class="col-sm-2 control-label">Case Coating:</label>
                <div class="col-sm-4">
                    <input type="text" name="txtCaseCoating" id="txtCaseCoating" 
                       class="form-control" placeholder="Case Coating" maxlength="100" >
                </div>
              </div>
              <div id="dInstallation" class="form-group">
                <label class="col-sm-2 control-label">Installation:</label>
                <div class="col-sm-4">
                    <input type="text" name="txtInstallation" id="txtInstallation" 
                       class="form-control" placeholder="Installation" maxlength="100" >
                </div>
                <label class="col-sm-2 control-label">Location:</label>
                <div class="col-sm-4">
                    <input type="text" name="txtLocation" id="txtLocation" 
                       class="form-control" placeholder="Location" maxlength="100" >
                </div>
              </div>
              <div id="dIPRating" class="form-group">
                <label class="col-sm-2 control-label">IP Rating:</label>
                <div class="col-sm-4">
                    <input type="text" name="txtIPRating" id="txtIPRating" 
                       class="form-control" placeholder="IP Rating" maxlength="100" >
                </div>
                <label class="col-sm-2 control-label">Temperature:</label>
                <div class="col-sm-4">
                    <input type="text" name="txtTemperature" id="txtTemperature" 
                       class="form-control" placeholder="Temperature" maxlength="100" >
                </div>
              </div>
              <div id="dEmergency" class="form-group">
                <label class="col-sm-2 control-label">Emergency:</label>
                <div class="col-sm-10">
                    <input type="text" name="txtEmergency" id="txtEmergency" 
                       class="form-control" placeholder="Emergency" maxlength="100" >
                </div>
              </div>

          </form>
          <!-- Imagen -->
          <form id="formImagen" class="form-horizontal" role="form" action="ajaxupload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-3 control-label">Image:</label>                 
                <div class="col-sm-3">
                  <div id="preview" style="display:none"></div>
                </div>
                <div class="col-sm-3">
                  <input id="uploadImage" type="file" accept="image/*" name="image" />
                </div>
                <div class="col-sm-1">
                  <img style="display:none" id="loader" src="images/loader.gif" alt="Loading...." title="Loading...." />
                </div>
                <div class="col-sm-2">
                  <input id="button" type="submit" value="Upload">
                </div>
            </div>
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" id="btnGuardar" onclick="guarda()" 
            class="btn btn-success btn-flat " data-dismiss="modal">Save</button>
      </div>
      <div id="mdlMensajes"> </div>
    </div>
</div>

<div id="cl-wrapper">
  
  <!-- Se incluye el menu general -->
  <?php include_once("menu.php"); ?>

	<div class="container-fluid" id="pcont">
		<div class="page-head">
			<h2>Fans Administrator</h2>
    </div>		
    <div class="cl-mcont"> 
      <input type="hidden" id="hdnFanId" />
      <div class="row">
        <div class="col-md-12">
          <div class="block-flat">
            <div class="header">              
              <h3>Fans List</h3>
              <div class="row">
                  <div class="col-md-3">
                    <button class="btn btn-primary btnGuarda" >
                      <i class="fa fa-user"></i>
                      New Fan
                    </button>  
                  </div>
              </div>
              
            </div>
            <div class="content">            
              <div class="table-responsive">
              <table class="table no-border hover">
                <thead class="no-border">
                  <tr>
                    <th style="width:25%;" class="text-center"><strong>Description</strong></th>
                    <th style="width:15%;" class="text-center"><strong>Model</strong></th>
                    <th style="width:15%;"><strong>Presion</strong></th>
                    <th style="width:15%;"><strong>Aspa</strong></th>
                    <th style="width:15%;"><strong>Arreglo</strong></th>
                    <th style="width:15%;" class="text-center"><strong>Action</strong></th>
                  </tr>
                </thead>
                <tbody class="no-border-y" id="tbFans">
                  
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
  <script type="text/javascript" src="js/01Controladores/CFans.js" ></script>  

  <!-- PopUp -->
  <script type="text/javascript" src="lib/magnific/jquery.magnific-popup.min.js" ></script>  
  <!-- Subir imagen -->
  <script type="text/javascript" src="lib/jquery.form.js" ></script>  
  <!-- Paginacion -->
  <script type="text/javascript" src="lib/jquery.simplePagination.js" ></script>  

</body>
</html>
