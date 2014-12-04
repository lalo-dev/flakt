<!DOCTYPE html>
<html lang="es">
  <head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="shortcut icon" href="images/favicon.ico">

  	<title>FLAKT MÉXICO : Home</title>
  	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
  	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

  	<!-- Bootstrap core CSS -->
  	<link rel="stylesheet" href="js/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css" />
  	<link rel="stylesheet" href="js/jquery.nanoscroller/nanoscroller.css" />
  	<link rel="stylesheet" href="js/bootstrap.switch/bootstrap-switch.css" />
  	<link rel="stylesheet" href="js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />
  	
    <!-- Custom styles for this template -->
  	<link href="css/style.css" rel="stylesheet" />
  </head>

  <body>

    <!-- Fixed navbar -->
    <!-- Se incluye la barra de navegación -->
    <?php include_once("navbar.php"); ?>

  	
  <div id="cl-wrapper">

    <!-- Se incluye el menu general -->
    <?php include_once("menu.php"); ?>
  	
  	<div class="container-fluid" id="pcont">
  		<div class="page-head">
  			<h2>Dashboard Super Admin</h2>
  		</div>		
      <div class="cl-mcont">

        <div class="row">
          <div class="col-md-offset-3 col-md-6">
            <button type="button" onclick="window.location.href='selection.php'" class="btn btn-primary btn-lg btn-rad" style="width: 100%">
              <h3><i class="fa fa-magic"></i> Start Selection</h3>
            </button>
          </div>
        </div>
        
        <div class="row">
          <div class="col-xs-6 col-sm-4 col-md-2">
            <div class="block-flat badge-primary" onclick="window.location.href='users.php'" data-placement="top" data-toggle="tooltip" data-original-title="Admin Users" style="text-align: center; color: #fff; cursor: pointer;">
              <div class="header">
                <i class="fa fa-users fa-3x"></i>
              </div>
              <h5>Users</h5>
            </div>        
          </div>
          <div class="col-xs-6 col-sm-4 col-md-2">
            <div class="block-flat badge-primary" onclick="window.location.href='customer.php'" data-placement="top" data-toggle="tooltip" data-original-title="Admin Customers" style="text-align: center; color: #fff; cursor: pointer;">
              <div class="header">
                <i class="fa fa-building-o fa-3x"></i>
              </div>
              <h5>Customers</h5>
            </div>        
          </div>
          <div class="col-xs-6 col-sm-4 col-md-2">
            <div class="block-flat badge-primary" onclick="window.location.href='fans.php'" data-placement="top" data-toggle="tooltip" data-original-title="Admin Fans" style="text-align: center; color: #fff; cursor: pointer;">
              <div class="header">
                <i class="fa fa-asterisk fa-3x"></i>
              </div>
              <h5>Fans</h5>
            </div>        
          </div>
          <div class="col-xs-6 col-sm-4 col-md-2">
            <div class="block-flat badge-primary" onclick="window.location.href='resume.php'" data-placement="top" data-toggle="tooltip" data-original-title="Resume" style="text-align: center; color: #fff; cursor: pointer;">
              <div class="header">
                <i class="fa fa-tags fa-3x"></i>
              </div>
              <h5>Resume</h5><!-- -->
            </div>        
          </div>
          <div class="col-xs-6 col-sm-4 col-md-2">
            <div class="block-flat badge-primary" data-placement="top" data-toggle="tooltip" data-original-title="Admin Catalogs" style="text-align: center; color: #fff; cursor: pointer;">
              <div class="header">
                <i class="fa fa-book fa-3x"></i>
              </div>
              <h5>Catalogs</h5>
            </div>        
          </div>
          <div class="col-xs-6 col-sm-4 col-md-2">
            <div class="block-flat badge-primary" data-placement="top" data-toggle="tooltip" data-original-title="Password Requests" style="text-align: center; color: #fff; cursor: pointer;">
              <div class="header">
                <i class="fa fa-lock fa-3x"></i>
              </div>
              <h5>Password</h5>
            </div>        
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="block-flat">
              <div class="header">              
                <h3>My Selections</h3>
              </div>
              <div class="content">
                <div class="table-responsive">
                <table class="table no-border hover">
                  <thead class="no-border">
                    <tr>
                      <th style="width:5%;" class="text-center"><strong>#</strong></th>
                      <th style="width:15%;"><strong>Date</strong></th>
                      <th style="width:20%;"><strong>Customer</strong></th>
                      <th style="width:15%;"><strong>Reference</strong></th>
                      <th class="width:10%"><strong>Fan Type</strong></th>
                      <th style="width:10%;"><strong>Fan Size</strong></th>
                      <th style="width:15%;"><strong>Progress</strong></th>
                      <th style="width:10%;" class="text-center"><strong>Action</strong></th>
                    </tr>
                  </thead>
                  <tbody class="no-border-y">
                    <tr>
                      <td class="text-center primary-emphasis">1</td>
                      <td>01/01/2014</td>
                      <td>Customer 1</td>
                      <td>Reference 00</td>
                      <td>HCGB</td>
                      <td>25</td>
                      <td class="color-success"><div class="progress"><div class="progress-bar progress-bar-success" style="width: 40%">40%</div></div></td>
                      <td class="text-center">
                        <a class="label label-primary" href="#">
                          <i class="fa fa-eye"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center primary-emphasis">2</td>
                      <td>01/01/2014</td>
                      <td>Customer 2</td>
                      <td>Reference 00</td>
                      <td>HCGB</td>
                      <td>40</td>
                      <td class="color-success"><div class="progress"><div class="progress-bar progress-bar-danger" style="width: 30%">30%</div></div></td>
                      <td class="text-center">
                        <a class="label label-primary" href="#">
                          <i class="fa fa-eye"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center primary-emphasis">3</td>
                      <td>01/01/2014</td>
                      <td>Customer 3</td>
                      <td>Reference 00</td>
                      <td>HCGB</td>
                      <td>50</td>
                      <td class="color-success"><div class="progress"><div class="progress-bar progress-bar-primary" style="width: 50%">50%</div></div></td>
                      <td class="text-center">
                        <a class="label label-primary" href="#">
                          <i class="fa fa-eye"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>    
                </div>
              </div>
            </div>        
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="block-flat">
              <div class="header">              
                <h3>All Selections</h3>
              </div>
              <div class="content">
                <div class="table-responsive">
                <table class="table no-border hover">
                  <thead class="no-border">
                    <tr>
                      <th style="width:5%;" class="text-center"><strong>#</strong></th>
                      <th style="width:10%;"><strong>Date</strong></th>
                      <th style="width:20%;"><strong>User</strong></th>
                      <th style="width:15%;"><strong>Customer</strong></th>
                      <th style="width:15%;"><strong>Reference</strong></th>
                      <th class="width:10%"><strong>Fan Type</strong></th>
                      <th style="width:10%;"><strong>Fan Size</strong></th>
                      <th style="width:10%;"><strong>Progress</strong></th>
                      <th style="width:5%;" class="text-center"><strong>Action</strong></th>
                    </tr>
                  </thead>
                  <tbody class="no-border-y">
                    <tr>
                      <td class="text-center primary-emphasis">1</td>
                      <td>01/01/2014</td>
                      <td>User Name</td>
                      <td>Customer 1</td>
                      <td>Reference 00</td>
                      <td>HCGB</td>
                      <td>25</td>
                      <td class="color-success"><div class="progress"><div class="progress-bar progress-bar-success" style="width: 40%">40%</div></div></td>
                      <td class="text-center">
                        <a class="label label-primary" href="#">
                          <i class="fa fa-eye"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center primary-emphasis">2</td>
                      <td>01/01/2014</td>
                      <td>User Name</td>
                      <td>Customer 2</td>
                      <td>Reference 00</td>
                      <td>HCGB</td>
                      <td>40</td>
                      <td class="color-success"><div class="progress"><div class="progress-bar progress-bar-danger" style="width: 30%">30%</div></div></td>
                      <td class="text-center">
                        <a class="label label-primary" href="#">
                          <i class="fa fa-eye"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center primary-emphasis">3</td>
                      <td>01/01/2014</td>
                      <td>User Name</td>
                      <td>Customer 3</td>
                      <td>Reference 00</td>
                      <td>HCGB</td>
                      <td>50</td>
                      <td class="color-success"><div class="progress"><div class="progress-bar progress-bar-primary" style="width: 50%">50%</div></div></td>
                      <td class="text-center">
                        <a class="label label-primary" href="#">
                          <i class="fa fa-eye"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>    
                </div>
              </div>
            </div>        
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="block-flat">
              <div class="header">              
                <h3>Users Log</h3>
              </div>
              <div class="content">
                <div class="table-responsive">
                <table class="table no-border hover">
                  <thead class="no-border">
                    <tr>
                      <th style="width:5%;" class="text-center"><strong>#</strong></th>
                      <th style="width:20%;"><strong>User</strong></th>
                      <th style="width:20%;"><strong>Last signed</strong></th>
                      <th style="width:20%;"><strong>Last selection</strong></th>
                      <th class="width:15%"><strong>system logins</strong></th>
                      <th class="width:10%"><strong>status</strong></th>
                      <th style="width:10%;" class="text-center"><strong>Action</strong></th>
                    </tr>
                  </thead>
                  <tbody class="no-border-y">
                    <tr>
                      <td class="text-center primary-emphasis">1</td>
                      <td>User Name</td>
                      <td>01/01/2014 16:15</td>
                      <td>10002 M123</td>
                      <td>13</td>
                      <td>online</td>
                      <td class="text-center">
                        <a class="label label-primary" href="#">
                          <i class="fa fa-eye"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center primary-emphasis">1</td>
                      <td>User Name</td>
                      <td>01/01/2014 10:20</td>
                      <td>10002 M123</td>
                      <td>13</td>
                      <td>offline</td>
                      <td class="text-center">
                        <a class="label label-primary" href="#">
                          <i class="fa fa-eye"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center primary-emphasis">1</td>
                      <td>User Name</td>
                      <td>01/01/2014 15:30</td>
                      <td>10002 M123</td>
                      <td>13</td>
                      <td>online</td>
                      <td class="text-center">
                        <a class="label label-primary" href="#">
                          <i class="fa fa-eye"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>    
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
  	<script type="text/javascript" src="js/behaviour/general.js"></script>
    <script src="js/jquery.ui/jquery-ui.js" type="text/javascript"></script>
  	<script type="text/javascript" src="js/jquery.nestable/jquery.nestable.js"></script>
  	<script type="text/javascript" src="js/bootstrap.switch/bootstrap-switch.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
     
    <script type="text/javascript">
      $(document).ready(function(){
        //initialize the javascript
        validaSesion();

        App.init();

        $("#fanCentrifugal").hide();
        $("#fanAxial").hide();
        $("#fanAir").hide();
        $("#tools").hide();

        $(".fanCentrifugal").click(function(){
          $("#fanCentrifugal").toggle();
        });

        $(".fanAxial").click(function(){
          $("#fanAxial").toggle();
        });

        $(".fanAir").click(function(){
          $("#fanAir").toggle();
        });

        $(".tools").click(function(){
          $("#tools").toggle();
        });

      });
    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Bloqueo de pagina -->
    <script type="text/javascript" src="lib/jquery.blockUI.js" ></script>
    <!-- Controlador de página -->
    <script type="text/javascript" src="lib/util.js" ></script>
  </body>
</html>