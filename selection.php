<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" type="text/css" href="js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />
    
    <link href="js/fuelux/css/fuelux.css" rel="stylesheet">
    <link href="js/fuelux/css/fuelux-responsive.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/pygments.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="js/jquery.nanoscroller/nanoscroller.css" />
    <link rel="stylesheet" type="text/css" href="js/bootstrap.switch/bootstrap-switch.css" />
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
      <h2>Wizard Selection - Centrifugal HA</h2>
    </div>
    <div class="cl-mcont">		
    <div class="row wizard-row">
      <div class="col-md-12 fuelux">
        <div class="block-wizard">
          <div id="wizard1" class="wizard wizard-ux">
            <ul class="steps">
              <li data-target="#step1" class="active">Step 1<span class="chevron"></span></li>
              <li data-target="#step2">Step 2<span class="chevron"></span></li>
              <li data-target="#step3">Step 3<span class="chevron"></span></li>
              <li data-target="#step4">Step 4<span class="chevron"></span></li>
            </ul>
            <div class="actions">
              <button type="button" class="btn btn-xs btn-prev btn-default" onclick="actualizaSelection('no')"> <i class="icon-arrow-left"></i>Prev</button>
              <button type="button" class="btn btn-xs btn-next btn-default" onclick="actualizaSelection('no')" data-last="Finish">Next<i class="icon-arrow-right"></i></button>
            </div>
          </div>
          <div class="step-content">
            <form class="form-horizontal group-border-dashed" action="#" data-parsley-namespace="data-parsley-" data-parsley-validate novalidate> 
              <!-- ************************************************************************************************ -->
              <div class="step-pane active" id="step1">
                <div class="form-group no-padding">
                  <div class="col-sm-10">
                    <h3 class="hthin">Step 1: Customer</h3>
                    <table class="table table-condensed no-border">
                      <thead class="no-border">
                        <tr>
                          <th style="width:50%;"><strong>Title</strong></th>
                          <th style="width:50%"><strong>Data</strong></th>
                        </tr>
                      </thead>
                      <tbody class="no-border-y">
                        <tr>
                          <td><strong>#</strong></td>
                          <td><span id="spnSelectionId"></span></td>
                        </tr>
                        <tr>
                          <td><strong>Date</strong></td>
                          <td><span id="spnSelectionDate"></span></td>
                        </tr>
                        <tr>
                          <td><strong>Seller</strong></td>
                          <td><span id="spnSeller" ></span></td>
                        </tr>
                        <tr>
                          <td><strong>Customer Name</strong></td>
                          <td>
                            <select id="slcCustomer" class="form-control">
                              <option value="">Select</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td><strong>Reference</strong></td>
                          <td>
                            <input type="text" class="form-control" id="txtReference" value="">
                          </td>
                        </tr>
                        <tr>
                          <td><strong>No. Proposal</strong></td>
                          <td>
                            <input type="text" class="form-control" id="txtNoProposal" value="">
                          </td>
                        </tr>
                        <tr>
                          <td><strong>Contact</strong></td>
                          <td>
                            <select id="slcCustomerContact" class="form-control">
                              <option value="">Select</option>
                            </select>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <button data-wizard="#wizard1" class="btn btn-default wizard-previous"><i class="fa fa-caret-left"></i> Previous</button>
                    <button data-wizard="#wizard1" onclick="actualizaSelection('no')" class="btn btn-primary wizard-next">Next Step <i class="fa fa-caret-right"></i></button>
                  </div>
                </div>	
              </div>
              <!-- ************************************************************************************************ -->
              <div class="step-pane" id="step2">
                <div class="form-group no-padding">
                  <div class="col-sm-10">
                    <h3 class="hthin">Step 2: Units of Measure</h3>
                    <div class="table-responsive">
                      <input type="hidden" id="hdnUnit" >
                      <table class="table table-condensed no-border">
                        <thead class="no-border">
                          <tr>
                            <th style="width:50%;"><strong>Description</strong></th>
                            <th style="width:25%; text-align: center;"><strong>System International</strong></th>
                            <th style="width:25%; text-align: center;"><strong>System American</strong></th>
                          </tr>
                        </thead>
                        <tbody class="no-border-y">
                          <tr>
                            <td>&nbsp;</td>
                            <td style="text-align: center;">
                              <button type="button" onclick="cambiarSeleccionUnidades('SI');" class="btnSistemaSI btn btn-rad">
                                <i class="fa fa-star"></i>
                              </button>
                            </td>
                            <td style="text-align: center;">
                              <button type="button" onclick="cambiarSeleccionUnidades('SA');" class="btnSistemaSA btn btn-rad">
                                <i class="fa fa-star"></i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td><strong>Temperature</strong></td>
                            <td style="text-align: center;" class="sistemaSI">°C</td>
                            <td style="text-align: center;" class="sistemaSA primary-emphasis">°F</td>
                          </tr>
                          <tr>
                            <td><strong>Flow</strong></td>
                            <td style="text-align: center;" class="sistemaSI">m&sup3;/h - Nm&sup3;/h</td>
                            <td style="text-align: center;" class="sistemaSA primary-emphasis">acfm - scfm</td>
                          </tr>
                          <tr>
                            <td><strong>Pressure</strong></td>
                            <td style="text-align: center;" class="sistemaSI">mmwg - Pa</td>
                            <td style="text-align: center;" class="sistemaSA primary-emphasis">inwg - lb/in&sup2;</td>
                          </tr>
                          <tr>
                            <td><strong>Density</strong></td>
                            <td style="text-align: center;" class="sistemaSI">Kg/m&sup3; - Kg/Nm&sup3;</td>
                            <td style="text-align: center;" class="sistemaSA primary-emphasis">lb/ft&sup3; - slb/ft&sup3;</td>
                          </tr>
                          <tr>
                            <td><strong>Ambient pressure</strong></td>
                            <td style="text-align: center;" class="sistemaSI">mmHg - mBar - m</td>
                            <td style="text-align: center;" class="sistemaSA primary-emphasis">inHg - ft</td>
                          </tr>
                          <tr>
                            <td><strong>Air velocity</strong></td>
                            <td style="text-align: center;" class="sistemaSI">m/s</td>
                            <td style="text-align: center;" class="sistemaSA primary-emphasis">fpm</td>
                          </tr>
                          <tr>
                            <td><strong>Area</strong></td>
                            <td style="text-align: center;" class="sistemaSI">m&sup2;</td>
                            <td style="text-align: center;" class="sistemaSA primary-emphasis">ft&sup2;</td>
                          </tr>
                          <tr>
                            <td><strong>Power</strong></td>
                            <td style="text-align: center;" class="sistemaSI">Kw</td>
                            <td style="text-align: center;" class="sistemaSA primary-emphasis">Hp</td>
                          </tr>
                          <tr>
                            <td><strong>Inertia</strong></td>
                            <td style="text-align: center;" class="sistemaSI">Kgm&sup2;</td>
                            <td style="text-align: center;" class="sistemaSA primary-emphasis">lbft&sup2;</td>
                          </tr>
                          <tr>
                            <td><strong>Weight</strong></td>
                            <td style="text-align: center;" class="sistemaSI">Kg</td>
                            <td style="text-align: center;" class="sistemaSA primary-emphasis">Lb</td>
                          </tr>
                          <tr>
                            <td><strong>Torque</strong></td>
                            <td style="text-align: center;" class="sistemaSI">Nm</td>
                            <td style="text-align: center;" class="sistemaSA primary-emphasis">lbft</td>
                          </tr>
                          <tr>
                            <td><strong>Sound distance</strong></td>
                            <td style="text-align: center;" class="sistemaSI">m</td>
                            <td style="text-align: center;" class="sistemaSA primary-emphasis">ft</td>
                          </tr>
                          <tr>
                            <td><strong>Sound</strong></td>
                            <td colspan="2" style="text-align: center;" class="primary-emphasis">dB(A)</td>
                          </tr>
                        </tbody>
                      </table>    
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <button data-wizard="#wizard1" onclick="actualizaSelection('no')" class="btn btn-default wizard-previous"><i class="fa fa-caret-left"></i> Previous</button>
                    <button data-wizard="#wizard1" onclick="actualizaSelection('no')" class="btn btn-primary wizard-next">Next Step <i class="fa fa-caret-right"></i></button>
                  </div>
                </div>  
              </div>
              <!-- ************************************************************************************************ -->
              <div class="step-pane" id="step3">
                <div class="form-group no-padding">
                  <div class="col-sm-10">
                    <h3 class="hthin">Step 3: Accessories</h3>
                    <div class="table-responsive">
                      <table class="table table-condensed no-border">
                        <thead class="no-border">
                          <tr>
                            <th style="width:35%;"><strong>Title</strong></th>
                            <th style="width:20%;"><strong>Inlet</strong></th>
                            <th style="width:20%"><strong>Outlet</strong></th>
                            <th style="width:10%;"><strong>Value</strong></th>
                            <th style="width:10%;"><strong>Image</strong></th>
                          </tr>
                        </thead>
                        <tbody class="no-border-y">
                          <tr>
                            <td colspan="5"><strong>IVC</strong></td>
                          </tr>
                          <tr>
                            <td>IVC Default</td>
                            <td>
                              <input type="checkbox" id="ivcIn_1">
                            </td>
                            <td>
                              <input type="checkbox" id="ivcOut_1">
                            </td>
                            <td>0.3</td>
                            <td>
                              <img src="images/ivc.jpg" style="width:40px; height:40px;">
                            </td>
                          </tr>
                          <!-- ******************************************************************** -->
                          <tr>
                            <td colspan="5"><strong>DMBG</strong></td>
                          </tr>
                          <tr>
                            <td>DMBG Default</td>
                            <td>
                              <input type="checkbox" id="dmbgIn_1">
                            </td>
                            <td>
                              <input type="checkbox" id="dmbgOut_1">
                            </td>
                            <td>0.2</td>
                            <td>
                              <img src="images/difusor.jpg" style="width:40px; height:40px;">
                            </td>
                          </tr>
                          <!-- ******************************************************************** -->
                          <tr>
                            <td colspan="5"><strong>Flexible</strong></td>
                          </tr>
                          <tr>
                            <td>Flexible Default</td>
                            <td>
                              <input type="checkbox" id="flexibleIn_1">
                            </td>
                            <td>
                              <input type="checkbox" id="flexibleOut_1">
                            </td>
                            <td>0</td>
                            <td>
                              <img src="images/flexible.jpg" style="width: 40px; height:40px;">
                            </td>
                          </tr>
                          <!-- ******************************************************************** -->
                          <tr>
                            <td colspan="5"><strong>Screen</strong></td>
                          </tr>
                          <tr>
                            <td>Screen Default</td>
                            <td>
                              <input type="checkbox" id="screenIn_1">
                            </td>
                            <td>
                              <input type="checkbox" id="screenOut_1">
                            </td>
                            <td>0.2</td>
                            <td>
                              <img src="images/screen.jpg" style="width: 40px; height:40px;">
                            </td>
                          </tr>
                          <!-- ******************************************************************** -->
                          <tr>
                            <td colspan="5"><strong>Damper</strong></td>
                          </tr>
                          <tr>
                            <td>Damper Default</td>
                            <td>
                              <input type="checkbox" id="damperIn_1">
                            </td>
                            <td>
                              <input type="checkbox" id="damperOut_1">
                            </td>
                            <td>0</td>
                            <td>
                              <img src="images/damper.jpg" style="width: 40px; height:40px;">
                            </td>
                          </tr>
                          <!-- ******************************************************************** -->
                          <tr>
                            <td colspan="5"><strong>Diffusor</strong></td>
                          </tr>
                          <tr>
                            <td>Diffusor Default</td>
                            <td>
                              <input type="checkbox" id="diffusorIn_1">
                            </td>
                            <td>
                              <input type="checkbox" id="diffusorOut_1">
                            </td>
                            <td>0</td>
                            <td>
                              <img src="images/diffusor.jpg" style="width: 40px; height:40px;">
                            </td>
                          </tr>
                          <!-- ******************************************************************** -->
                          <tr>
                            <td colspan="5"><strong>Louver</strong></td>
                          </tr>
                          <tr>
                            <td>Louver Default</td>
                            <td>
                              <input type="checkbox" id="louverIn_1">
                            </td>
                            <td>
                              <input type="checkbox" id="louverOut_1">
                            </td>
                            <td>0.15</td>
                            <td>
                              <img src="images/louver.jpg" style="width: 40px; height:40px;">
                            </td>
                          </tr>
                          <!-- ******************************************************************** -->
                          <tr>
                            <td colspan="5"><strong>Silencer</strong></td>
                          </tr>
                          <tr>
                            <td>Silencer Default</td>
                            <td>
                              <input type="checkbox" id="silencerIn_1">
                            </td>
                            <td>
                              <input type="checkbox" id="silencerOut_1">
                            </td>
                            <td>0.15</td>
                            <td>
                              <img src="images/silencer.jpg" style="width: 40px; height:40px;">
                            </td>
                          </tr>
                          <!-- ******************************************************************** -->
                          <tr>
                            <td colspan="5"><strong>Inlet box</strong></td>
                          </tr>
                          <tr>
                            <td>Inlet Box Default</td>
                            <td>
                              <input type="checkbox" id="inletBoxIn_1">
                            </td>
                            <td>
                              <input type="checkbox" id="inletBoxOut_1">
                            </td>
                            <td>0.15</td>
                            <td>
                              <img src="images/inletbox.jpg" style="width: 40px; height:40px;">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <button data-wizard="#wizard1" onclick="actualizaSelection('no')" class="btn btn-default wizard-previous"><i class="fa fa-caret-left"></i> Previous</button>
                    <button data-wizard="#wizard1" onclick="actualizaSelection('no')" class="btn btn-primary wizard-next">Next Step <i class="fa fa-caret-right"></i></button>
                  </div>
                </div>  
              </div>
              <!-- ************************************************************************************************ -->
              <div class="step-pane" id="step4">
                <div class="form-group no-padding">
                  <div class="col-sm-10">
                    <h3 class="hthin">Step 4: Indata</h3>
                    <div class="table-responsive">
                      <table class="table no-border hover">
                        <thead class="no-border">
                          <tr>
                            <th style="width:50%;"><strong>Description</strong></th>
                            <th style="width:20%"><strong>Data</strong></th>
                            <th style="width:15%;"><strong>Units</strong></th>
                            <th style="width:15%"><strong>Yes/No</strong></th>
                          </tr>
                        </thead>
                        <tbody class="no-border-y">
                          <tr>
                            <td><strong>Blade Type</strong></td>
                            <td>
                              <select class="form-control" id="slcBladeType">
                                <option value="0">Select</option>
                                <option value="B">B</option>
                                <option value="P">P</option>
                                <option value="T">T</option>
                                <option value="C">C</option>
                              </select>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><strong>Fan Arrangment</strong></td>
                            <td>
                              <select class="form-control" id="slcFanArragment">
                                <option value="0">Select</option>
                                <option value="1">1 Amca</option>
                                <option value="4">4 Amca</option>
                              </select>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><strong>Ambient Pressure</strong></td>
                            <td>
                              <input type="text" class="form-control" id="txtAmbientPressure">
                            </td>
                            <td>
                              <select class="form-control" id="slcAmbientPressureUnit">
                                <option value="0">Select</option>
                                <option class="uSI" value="mmHg">mmHg</option>
                                <option class="uSI" value="mBar">mBar</option>
                                <option class="uSI" value="m">m</option>
                                <option class="uSA" value="inHg">inHg</option>
                                <option class="uSA" value="ft">ft</option>
                              </select>
                            </td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><strong>Pressure Definition Inlet</strong></td>
                            <td>
                              <select class="form-control" id="slcPressureIn">
                                <option value="0">Select</option>
                                <option value="S">Static</option>
                                <option value="T">Total</option>
                              </select>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><strong>Pressure Definition Outlet</strong></td>
                            <td>
                              <select class="form-control" id="slcPressureOut">
                                <option value="0">Select</option>
                                <option value="S">Static</option>
                                <option value="T">Total</option>
                              </select>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><strong>Connections - Max Air Velocity</strong></td>
                            <td>
                              <input type="text" class="form-control" id="txtConnectionMax">
                            </td>
                            <td>
                              <select class="form-control" id="slcMaxAir">
                                <option value="0">Select</option>
                                <option class="uSI" value="ms">m/s</option>
                                <option class="uSA" value="fpm">fpm</option>
                              </select>
                            </td>
                            <td>
                              <select class="form-control" id="slcMaxAirYn">
                                <option value="0">Select</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td><strong>Motors</strong></td>
                            <td>
                              <select class="form-control" id="slcMotor">
                                <option value="0">Select</option>
                                <option value="siemens">Siemens</option>
                                <option value="us">US</option>
                                <option value="abb">ABB</option>
                              </select>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><strong>Sound Pressure - Distance</strong></td>
                            <td>
                              <input type="text" class="form-control" id="txtSoundDistance">
                            </td>
                            <td>m</td>
                          </tr>
                          <tr>
                            <td><strong>Sound Pressure - Max Sound</strong></td>
                            <td>
                              <input type="text" class="form-control" id="txtSoundMax">
                            </td>
                            <td>db(A)</td>
                            <td>&nbsp;</td>
                          </tr>
                        </tbody>
                      </table>    
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <button data-wizard="#wizard1" onclick="actualizaSelection('no')" class="btn btn-default wizard-previous">
                      <i class="fa fa-caret-left"></i> Previous
                    </button>
                    <button data-wizard="#wizard1" onclick="actualizaSelection('ok')" class="btn btn-success wizard-next" id="btnComplete">
                      <i class="fa fa-check"></i> Complete
                    </button>
                  </div>
                </div>	
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    </div>
  </div> 
</div>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.niftymodals/js/jquery.modalEffects.js"></script>   
  <script type="text/javascript" src="js/fuelux/loader.min.js"></script>  
  <script src="js/modernizr.js" type="text/javascript"></script>
  <script type="text/javascript" src="js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
  <script type="text/javascript" src="js/bootstrap.switch/bootstrap-switch.min.js"></script>
  <script type="text/javascript" src="js/jquery.nestable/jquery.nestable.js"></script>
  <script type="text/javascript" src="js/bootstrap.switch/bootstrap-switch.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript" src="js/behaviour/general.js"></script>
  <script src="js/jquery.ui/jquery-ui.js" type="text/javascript"></script>
  
  <!-- Bloqueo de pagina -->
  <script type="text/javascript" src="lib/jquery.blockUI.js" ></script>
  <!-- Controlador de página -->
  <script type="text/javascript" src="lib/util.js" ></script>
  <script type="text/javascript" src="lib/jQuery.stringify.js" ></script>
  <script type="text/javascript" src="js/01Controladores/CSelection.js" ></script>  
</body>
</html>