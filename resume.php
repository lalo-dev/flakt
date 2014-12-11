<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.ico">

    <title>FLAKT MÉXICO : Resume</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="js/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css" />
    <link rel="stylesheet" href="js/jquery.nanoscroller/nanoscroller.css" />
    <link rel="stylesheet" href="js/bootstrap.switch/bootstrap-switch.css" />
    <link rel="stylesheet" href="js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="js/jquery.niftymodals/css/component.css" />
    
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/jquery.dataTables.css">
  </head>

<body>

<!-- Fixed navbar -->
<!-- Se incluye la barra de navegación -->
<?php include_once("navbar.php"); ?>

<!-- Nifty Modal -->
<div class="md-modal colored-header success md-effect-10" id="general">
    <div class="md-content">
      <div class="modal-header">
        <h3>General info</h3>
        <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">

        <h3>Customer</h3>
        <div class="content">
          <div class="table-responsive">
            <table class="table table-bordered table-condensed">
              <thead>
                <tr>
                  <th><label class="control-label">Name</label></th>
                  <th><label class="control-label">Installation</label></th>
                  <th><label class="control-label">Proposal</label></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Cemento Mariel</td>
                  <td>ME-021</td>
                  <td>1021 k 0734 OMR</td>
                </tr>
              </tbody>
            </table>              
          </div>
        </div>

        <h3>Standard conditions</h3>
        <div class="content">
          <div class="table-responsive">
            <table class="table table-bordered table-condensed">
              <thead>
                <tr>
                  <th><label class="control-label">Description</label></th>
                  <th><label class="control-label">SI</label></th>
                  <th><label class="control-label">AM</label></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Temperature</td>
                  <td>0 °C</td>
                  <td>70 °F</td>
                </tr>
                <tr>
                  <td>Pressure</td>
                  <td>1013.25 mBar</td>
                  <td>29.927 inHg</td>
                </tr>
                <tr>
                  <td>Air</td>
                  <td>1.293 kg/Nm3</td>
                  <td>0.075 lb/ft3</td>
                </tr>
              </tbody>
            </table>              
          </div>
        </div>

        <h3>General conditions</h3>
        <div class="content">
          <div class="table-responsive">
            <table class="table table-bordered table-condensed">
              <thead>
                <tr>
                  <th><label class="control-label">Description</label></th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Barom Pressure</td>
                  <td>608</td>
                  <td>mmHg</td>
                </tr>
                <tr>
                  <td>Elevation</td>
                  <td>0</td>
                  <td>m</td>
                </tr>
              </tbody>
            </table>              
          </div>
        </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-flat md-close" data-dismiss="modal">Close</button>
      </div>
    </div>
</div>

<!-- Nifty Modal -->
<div class="md-modal colored-header success md-effect-10" id="colored-primary" style="width: 800px; max-width:800px; height: 300px; max-height: 300px; margin-top: -160px;">
    <div class="md-content">
      <div class="modal-header">
        <h3>Selection results</h3>
        <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">

        <div class="content">
          <div class="table-responsive" style="max-height: 420px; overflow-y: auto">
              <table class="table table-bordered hover table-condensed" id="fans" >
                <thead>
                  <tr>
                    <th style="width:10%;" class="text-center"><strong>Select</strong></th>
                    <th style="width:10%;"><strong>No</strong></th>
                    <th><strong>Type</strong></th>
                    <th><strong>Size</strong></th>
                    <th><strong>Eff</strong></th>
                    <th><strong>RPM</strong></th>
                    <th><strong>HP</strong></th>
                    <th class="text-center"><strong>Pressure rise</strong></th>
                    <th class="text-center success-emphasis-dark"><strong>Work line</strong></th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="gradeA">
                    <td><input type="radio"></td>
                    <td>10</td>
                    <td>HCGB</td>
                    <td>140</td>
                    <td>76.2</td>
                    <td>791</td>
                    <td>49.58</td>
                    <td>1127.3</td>
                    <td class="success-emphasis-dark">3.2</td>
                  </tr>
                </tbody>
              </table>   
          </div>
        </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat md-close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-flat md-close" data-dismiss="modal" id="btnProceed">Proceed</button>
      </div>
    </div>
</div>

<!-- Nifty Modal Sketch -->
<div class="md-modal colored-header success md-effect-10" id="colored-success">
    <div class="md-content">
      <div class="modal-header">
        <h3>Preview</h3>
        <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body"> 
        <div class="text-center">
          <h4>Sketch!</h4>
          <img src="images/centrifugo200.jpg" alt="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat md-close" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success btn-flat md-close" data-dismiss="modal">Imprimir</button>
      </div>
    </div>
</div>

<!-- Background Nifty Modal -->
<div class="md-overlay"></div>

<div id="cl-wrapper">
	
  <!-- Se incluye el menu general -->
  <?php include_once("menu.php"); ?>

  <div class="container-fluid" id="pcont">
    <div class="page-head">
      <h2>Resume - Blade type: 
              <span class="color-success" id="spanBladeType">A</span>
            </h2>
    </div>
    <div class="cl-mcont">		
      <div class="row">

        <div class="row" style="margin: auto;">
          <div class="col-xs-3 col-sm-2 col-md-1 col-sm-offset-2">
            <button type="button" class="btn btn-primary btn-lg btn-block" data-placement="top" data-toggle="tooltip" data-original-title="Return to wizard" onclick="window.location.href='selection.php'">
              <i class="fa fa-arrow-left"></i>
            </button>
          </div>
          <div class="col-xs-3 col-sm-2 col-md-1">
            <button type="button" class="btn btn-primary btn-lg btn-block md-trigger" data-placement="top" data-toggle="tooltip" data-original-title="Geneal Info" data-modal="general">
              <i class="fa fa-fire"></i>
            </button>
          </div>
          <div class="col-xs-3 col-sm-2 col-md-1">
            <button type="button" class="btn btn-primary btn-lg btn-block md-trigger" data-placement="top" data-toggle="tooltip" data-original-title="Sketch" data-modal="colored-success">
              <i class="fa fa-picture-o"></i>
            </button>
          </div>
          <div class="col-xs-3 col-sm-2 col-md-1">
            <button type="button" class="btn btn-primary btn-lg btn-block" data-placement="top" data-toggle="tooltip" data-original-title="Technical Info">
              <i class="fa fa-info"></i>
            </button>
          </div>
          <div class="col-xs-3 col-sm-2 col-md-1">
            <button type="button" class="btn btn-primary btn-lg btn-block" data-placement="top" data-toggle="tooltip" data-original-title="Price" id="tocanvas">
              <i class="fa fa-usd"></i>
            </button>
          </div>
          <div class="col-xs-3 col-sm-2 col-md-1">
            <a class="btn btn-primary btn-lg btn-block" data-placement="top" data-toggle="tooltip" data-original-title="Full Cost" id="svg">
              <i class="fa fa-money"></i>
            </a>
          </div>
          <div class="col-xs-3 col-sm-2 col-md-1">
            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="exportaPDFResume()"
                data-placement="top" data-toggle="tooltip" data-original-title="Export PDF">
              <i class="fa fa-file-text"></i>
            </button>
          </div>
          <div class="col-xs-3 col-sm-2 col-md-1">
            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="imprimePDFResume()" 
                data-placement="top" data-toggle="tooltip" data-original-title="Print">
              <i class="fa fa-print"></i>
            </button>
          </div> 
        </div>

        <hr>
        <div class="col-sm-12" >
          <table class="table no-border table-condensed">
            <thead class="no-border">
              <tr class="success">
                <th colspan="7"><strong>Indata</strong></th> 
              </tr>
            </thead>
            <tbody class="no-border-y">
              <tr>
                <td style="width: 15%;"><label class="control-label">Flow</label></td>
                <td style="width: 15%;"><label class="control-label">Inlet pressure</label></td>
                <td style="width: 15%;"><label class="control-label">Outlet pressure</label></td>
                <td style="width: 15%;"><label class="control-label">Temperature</label></td>
                <td style="width: 15%;"><label class="control-label">Temp Cold Start Up</label></td>
                <td style="width: 15%;"><label class="control-label">Density</label></td>
                <td style="width: 10%;">&nbsp;</td>
              </tr>
              <tr>
                <td>
                  <div class="input-group input-group-sm">
                    <input type="hidden" id="hdnBladeType">
                    <input type="text" class="form-control" id="txtFlow" value="0">
                    <select class="form-control" id="slcFlow">
                      <option value="0">Select</option>
                      <option class="uSI" value="m3h">m3/h</option>
                      <option class="uSI" value="m3s">m3/s</option>
                      <option class="uSI" value="nm3h">Nm3/h</option>
                      <option class="uSA" value="acfm">acfm</option>
                      <option class="uSA" value="scfm">scfm</option>
                    </select>
                  </div>
                </td>
                <td>
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="txtInletPressure" value="0">
                    <select class="form-control" id="slcInletPressure">
                      <option value="0">Select</option>
                      <option class="uSI" value="mmwg">mmwg</option>
                      <option class="uSI" value="Pa">Pa</option>
                      <option class="uSA" value="inwg">inwg</option>
                      <option class="uSA" value="lbin2">lb/in2</option>
                    </select>
                  </div>
                </td>
                <td>
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="txtOuletPressure" value="0">
                  </div>
                </td>
                <td>
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="txtTemp" value="0">
                    <select class="form-control" id="slcTemp">
                      <option value="0">Select</option>
                      <option class="uSI" value="c">&deg;C</option>
                      <option class="uSA" value="f">&deg;F</option>
                    </select>
                  </div>
                </td>
                <td>
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="txtTemCold" value="0">
                  </div>
                </td>
                <td>
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="txtDensity" value="0">
                    <select class="form-control" id="slcDensity">
                      <option value="0">Select</option>
                      <option class="uSI" value="kgm3">Kg/m3</option>
                      <option class="uSI" value="kgnm3">Kg/Nm3</option>
                      <option class="uSA" value="lbft3">lb/ft3</option>
                      <option class="uSA" value="slbft3">slb/ft3</option>
                    </select>
                  </div>
                </td>
                <td>
                  <button class="btn btn-primary btn-sm btn-block md-trigger" data-modal="colored-primary" id="btnSearch">
                    Search <i class="fa fa-search"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        
        <div class="col-sm-5">

          <table class="table no-border table-condensed">
            <thead class="no-border">
              <tr class="success">
                <th style="width:50%;"><strong>Selected fan</strong></th>
                <th style="width:25%"><strong>&nbsp;</strong></th>
                <th style="width:25%"><strong>&nbsp;</strong></th>
              </tr>
            </thead>
            <tbody class="no-border-y">
              <tr>
                <td>
                  <label class="control-label">Type</label>
                </td>
                <td><span id="spanType">HCGB</span></td>
                <td><span>&nbsp;</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">Size</label>
                </td>
                <td><span id="spanSize">140</span></td>
                <td><span>&nbsp;</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">Fan connection area</label>
                </td>
                <td><span id="spanArea">1.568</span></td>
                <td><span id="spanAreaUnit">m2</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">Pd</label>
                </td>
                <td><span id="spanPd">0</span></td>
                <td><span id="spanPdUnit">Pa</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">Accessories</label>
                </td>
                <td><span id="spanAccessories">0</span></td>
                <td><span id="spanAccessoriesUnit">Pa</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">Inlet connection</label>
                </td>
                <td><span id="spanInConnection">0</span></td>
                <td><span id="spanInConnectionUnit">Pa</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">Oulet connection</label>
                </td>
                <td><span id="spanOutConnection">0</span></td>
                <td><span id="spanOutConnectionUnit">Pa</span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">Flow</label>
                </td>
                <td><span id="spanFlow">0</span></td>
                <td><span id="spanFlowUnit">m3/h</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">Total pressure</label>
                </td>
                <td><span id="spanTotalPressure">0</span></td>
                <td><span id="spanTotalPressureUnit">Pa</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">Efficiancy</label>
                </td>
                <td><span id="spanEff">0</span></td>
                <td><span>%</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">&nbsp;</label>
                </td>
                <td><span id="spanKomp">0</span></td>
                <td><span>Kp</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">Power</label>
                </td>
                <td><span id="spanPower">0</span></td>
                <td><span>HP</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">Power at Cold Star Up</label>
                </td>
                <td><span id="spanPowerCold">0</span></td>
                <td><span>HP</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">Throttle line</label>
                </td>
                <td><span id="spanLine">0</span></td>
                <td><span></span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">Moment of inertia WR2</label>
                </td>
                <td><span id="spanWr2">0</span></td>
                <td><span id="spanWr2Unit">Kgm2</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">Total wight</label>
                </td>
                <td><span id="spanTotalWeight">0</span></td>
                <td><span id="spanTotalWeightUnit">Kg</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">Speed</label>
                </td>
                <td><span id="spanSpeed">0</span></td>
                <td><span>rpm</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">Start torque</label>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">At operation conditions</label>
                </td>
                <td><span id="spanTorqueOperation">0</span></td>
                <td><span>Nm</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">At 0 flow and 20º C</label>
                </td>
                <td><span id="spanTorqueFlow">0</span></td>
                <td><span>Nm</span></td>
              </tr>
            </tbody>
          </table>

          <table class="table no-border table-condensed">
            <thead class="no-border">
              <tr class="success">
                <th style="width:50%;"><strong>Sound</strong></th>
                <th style="width:20%;"><strong>&nbsp;</strong></th>
                <th style="width:20%;"><strong>&nbsp;</strong></th>
                <th style="width:10%;"><strong>&nbsp;</strong></th>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <th>L wtot</th>
                <th>L ptot at <span style="display: inline;">1</span></th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody class="no-border-y">
              <tr>
                <td>
                  <label class="control-label">To inlet and outlet</label>
                </td>
                <td><span id="spanSoundA1">0</span></td>
                <td><span id="spanSoundA2">0</span></td>
                <td><span>dB(A)</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">To surrounding - free inlet</label>
                </td>
                <td><span id="spanSoundB1">0</span></td>
                <td><span id="spanSoundB2">0</span></td>
                <td><span>dB(A)</span></td>
              </tr>
              <tr>
                <td>
                  <label class="control-label">To surrounding - ducted intet</label>
                </td>
                <td><span id="spanSoundC1">0</span></td>
                <td><span id="spanSoundC2">0</span></td>
                <td><span>dB(A)</span></td>
              </tr>
            </tbody>
          </table>

        </div>

        <div class="col-sm-7">

          <table class="table no-border table-condensed">
            <thead class="no-border">
              <tr class="success">
                <th colspan="4"><strong>Chart data</strong></th>
              </tr>
            </thead>
            <tbody class="no-border-y">
              <tr>
                <td><label class="control-label">Density</label></td>
                <td><label class="control-label">Flow</label></td>
                <td><label class="control-label">Pressure</label></td>
                <td><label class="control-label">Power</label></td>
              </tr>
              <tr>
                <td>0.932 Kg/m3</td>
                <td>m3/h</td>
                <td>Pa</td>
                <td>Hp</td>
              </tr>
            </tbody>
          </table>

          <div id="graficaA" class="block-flat">
            <div class="content">
              <div id="graficaPresion" style="width: 100%; height: 430px; margin: 0 auto"></div>
            </div>
          </div>

          <div id="graficaB" class="block-flat">
            <div class="content">
              <div id="graficaPoder" style="width: 100%; height: 400px; padding: 0px; position: relative;"></div>
            </div>
          </div>

          <div class="generarImagenGrafica" style="width:670px;">
            <div id="graficaPresionPfd">
              <canvas id="canvasPresion" style="" width="670" height="430"></canvas>
            </div>
            <div id="graficaPoderPfd">
              <canvas id="canvasPoder" style="" width="670" height="400"></canvas>
            </div>
          </div>

        </div>
    
      </div>
    
    </div>
  </div> 
</div>


  <script src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
  <script src="js/behaviour/general.js"></script>
  <script src="js/jquery.ui/jquery-ui.js"></script>

  <script src="js/bootstrap.switch/bootstrap-switch.min.js"></script>
  <script src="js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script src="js/jquery.niftymodals/js/jquery.modalEffects.js"></script>
  
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->  
  <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>

  <script src="js/highcharts/highcharts.js"></script>
  <script src="js/highcharts/modules/exporting.js"></script>

  <!-- Bloqueo de pagina -->
  <script type="text/javascript" src="lib/jquery.blockUI.js" ></script>
  <!-- html2canvas-->
  <script type="text/javascript" src="lib/html2canvas.js" ></script>
  <!-- Controlador de página -->
  <script type="text/javascript" src="lib/util.js" ></script>
  <script type="text/javascript" src="lib/jQuery.stringify.js" ></script>
  <script type="text/javascript" src="js/01Controladores/CResume.js" ></script>
  <!-- Datatable -->
  <script type="text/javascript" src="js/jquery.dataTables.js"></script>

</body>
</html>