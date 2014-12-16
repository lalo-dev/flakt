<?php
	session_start();
	
	include_once("../01Clases/01Util/ConexionBD.php");
	include_once("../01Clases/01Util/dompdf/dompdf_config.inc.php");
		
	$vConn = new ConexionBD();
	
	if(isset($_REQUEST['acc'])){
		
		$vAcc = $_REQUEST['acc'];
		
		switch($vAcc)
		{
			case "guardaGraficas":
					guardaGraficas();
				break;
			case "exportaPDF":
					exportaPDF();
				break;
			case "imprimePDF":
					imprimePDF();
				break;
			case "consultaBaseb":
					consultaBaseb();
				break;
			case "sistemaUnidades":
					sistemaUnidades();
				break;
		}
				
	}

	function guardaGraficas(){

		$vChartA = $_POST['chartA'];
    	$vChartA = str_replace('data:image/png;base64,', '', $vChartA);
    	$vChartADecoded = base64_decode($vChartA);


		$vChartB = $_POST['chartB'];
    	$vChartB = str_replace('data:image/png;base64,', '', $vChartB);
    	$vChartBDecoded = base64_decode($vChartB);

    	file_put_contents("../../media/pdf/chartA.jpg", $vChartADecoded, LOCK_EX);
    	file_put_contents("../../media/pdf/chartB.jpg", $vChartBDecoded, LOCK_EX);

		echo "ready";
	}

	function imprimePDF(){
		
		$vHTML = '<html>
						<head>
						</head>
						<style>
							@page { margin: 70px 50px; }
					    	#header { position: fixed; left: 0px; top: -70px; right: 0px; height: 50px; color: white; background-color: #016040; text-align: left; }
					    	#footer { position: fixed; left: 0px; bottom: -70px; right: 0px; height: 50px; color: white; background-color: #016040; text-align: right; }
					    	#footer .page:after { content: counter(page); }

							html {
							  font-family: sans-serif;
							  -webkit-text-size-adjust: 100%;
							      -ms-text-size-adjust: 100%;
							}
							table {
							  border-spacing: 0;
							  border-collapse: collapse;
							}
							td,
							th {
							  padding: 0;
							}

							table {
							  max-width: 100%;
							  background-color: transparent;
							}
							th {
							  text-align: left;
							}
							.table {
							  width: 100%;
							  margin-bottom: 20px;
							}
							.table > thead > tr > th,
							.table > tbody > tr > th,
							.table > tfoot > tr > th,
							.table > thead > tr > td,
							.table > tbody > tr > td,
							.table > tfoot > tr > td {
							  padding: 8px;
							  line-height: 1.428571429;
							  vertical-align: top;
							  border-top: 1px solid #ddd;
							}
							.table > thead > tr > th {
							  vertical-align: bottom;
							  border-bottom: 2px solid #ddd;
							}
							.table > caption + thead > tr:first-child > th,
							.table > colgroup + thead > tr:first-child > th,
							.table > thead:first-child > tr:first-child > th,
							.table > caption + thead > tr:first-child > td,
							.table > colgroup + thead > tr:first-child > td,
							.table > thead:first-child > tr:first-child > td {
							  border-top: 0;
							}
							.table > tbody + tbody {
							  border-top: 2px solid #ddd;
							}
							.table .table {
							  background-color: #fff;
							}
							.table-condensed > thead > tr > th,
							.table-condensed > tbody > tr > th,
							.table-condensed > tfoot > tr > th,
							.table-condensed > thead > tr > td,
							.table-condensed > tbody > tr > td,
							.table-condensed > tfoot > tr > td {
							  padding: 1px;
							}
							.table-bordered {
							  border: 1px solid #ddd;
							}
							.table-bordered > thead > tr > th,
							.table-bordered > tbody > tr > th,
							.table-bordered > tfoot > tr > th,
							.table-bordered > thead > tr > td,
							.table-bordered > tbody > tr > td,
							.table-bordered > tfoot > tr > td {
							  border: 1px solid #ddd;
							}
							.table-bordered > thead > tr > th,
							.table-bordered > thead > tr > td {
							  border-bottom-width: 2px;
							}
							.table-striped > tbody > tr:nth-child(odd) > td,
							.table-striped > tbody > tr:nth-child(odd) > th {
							  background-color: #f9f9f9;
							}
							.table-hover > tbody > tr:hover > td,
							.table-hover > tbody > tr:hover > th {
							  background-color: #f5f5f5;
							}
							table col[class*="col-"] {
							  position: static;
							  display: table-column;
							  float: none;
							}
							table td[class*="col-"],
							table th[class*="col-"] {
							  position: static;
							  display: table-cell;
							  float: none;
							}
							.table > thead > tr > td.active,
							.table > tbody > tr > td.active,
							.table > tfoot > tr > td.active,
							.table > thead > tr > th.active,
							.table > tbody > tr > th.active,
							.table > tfoot > tr > th.active,
							.table > thead > tr.active > td,
							.table > tbody > tr.active > td,
							.table > tfoot > tr.active > td,
							.table > thead > tr.active > th,
							.table > tbody > tr.active > th,
							.table > tfoot > tr.active > th {
							  background-color: #f5f5f5;
							}
							.table-hover > tbody > tr > td.active:hover,
							.table-hover > tbody > tr > th.active:hover,
							.table-hover > tbody > tr.active:hover > td,
							.table-hover > tbody > tr.active:hover > th {
							  background-color: #e8e8e8;
							}
							.table > thead > tr > td.success,
							.table > tbody > tr > td.success,
							.table > tfoot > tr > td.success,
							.table > thead > tr > th.success,
							.table > tbody > tr > th.success,
							.table > tfoot > tr > th.success,
							.table > thead > tr.success > td,
							.table > tbody > tr.success > td,
							.table > tfoot > tr.success > td,
							.table > thead > tr.success > th,
							.table > tbody > tr.success > th,
							.table > tfoot > tr.success > th {
							  background-color: #dff0d8;
							}
							.table-hover > tbody > tr > td.success:hover,
							.table-hover > tbody > tr > th.success:hover,
							.table-hover > tbody > tr.success:hover > td,
							.table-hover > tbody > tr.success:hover > th {
							  background-color: #d0e9c6;
							}
							.table > thead > tr > td.info,
							.table > tbody > tr > td.info,
							.table > tfoot > tr > td.info,
							.table > thead > tr > th.info,
							.table > tbody > tr > th.info,
							.table > tfoot > tr > th.info,
							.table > thead > tr.info > td,
							.table > tbody > tr.info > td,
							.table > tfoot > tr.info > td,
							.table > thead > tr.info > th,
							.table > tbody > tr.info > th,
							.table > tfoot > tr.info > th {
							  background-color: #d9edf7;
							}
							.table-hover > tbody > tr > td.info:hover,
							.table-hover > tbody > tr > th.info:hover,
							.table-hover > tbody > tr.info:hover > td,
							.table-hover > tbody > tr.info:hover > th {
							  background-color: #c4e3f3;
							}
							.table > thead > tr > td.warning,
							.table > tbody > tr > td.warning,
							.table > tfoot > tr > td.warning,
							.table > thead > tr > th.warning,
							.table > tbody > tr > th.warning,
							.table > tfoot > tr > th.warning,
							.table > thead > tr.warning > td,
							.table > tbody > tr.warning > td,
							.table > tfoot > tr.warning > td,
							.table > thead > tr.warning > th,
							.table > tbody > tr.warning > th,
							.table > tfoot > tr.warning > th {
							  background-color: #fcf8e3;
							}
							.table-hover > tbody > tr > td.warning:hover,
							.table-hover > tbody > tr > th.warning:hover,
							.table-hover > tbody > tr.warning:hover > td,
							.table-hover > tbody > tr.warning:hover > th {
							  background-color: #faf2cc;
							}
							.table > thead > tr > td.danger,
							.table > tbody > tr > td.danger,
							.table > tfoot > tr > td.danger,
							.table > thead > tr > th.danger,
							.table > tbody > tr > th.danger,
							.table > tfoot > tr > th.danger,
							.table > thead > tr.danger > td,
							.table > tbody > tr.danger > td,
							.table > tfoot > tr.danger > td,
							.table > thead > tr.danger > th,
							.table > tbody > tr.danger > th,
							.table > tfoot > tr.danger > th {
							  background-color: #f2dede;
							}
							.table-hover > tbody > tr > td.danger:hover,
							.table-hover > tbody > tr > th.danger:hover,
							.table-hover > tbody > tr.danger:hover > td,
							.table-hover > tbody > tr.danger:hover > th {
							  background-color: #ebcccc;
							}

							.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
							  position: relative;
							  min-height: 1px;
							  padding-right: 15px;
							  padding-left: 15px;
							}

							.text-danger {
							  color: #a94442;
							}

							.text-success {
							  color: #3c763d;
							}

							table thead th {
							  padding: 5px;
							  font-size: 11px;
							  font-weight: 200;
							}
							table tbody td {
							  padding: 7px 8px;
							  font-size: 10px;
							}
							table .primary-emphasis,
							table .primary-emphasis-dark {
							  background: #017E56;
							  color: #FFF;
							  border-color: #017E56;
							  text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.3);
							}
							table .primary-emphasis-dark {
							  background-color: #437edd;
							}
							table .success-emphasis,
							table .success-emphasis-dark {
							  background: #60C060;
							  color: #FFF;
							  border-color: #60C060;
							  text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.3);
							}
							table .success-emphasis-dark {
							  background-color: #58b058;
							  border-color: #58b058;
							}
							table .warning-emphasis,
							table .warning-emphasis-dark {
							  background: #FC9700;
							  color: #FFF;
							  border-color: #FC9700;
							  text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.3);
							}
							table .warning-emphasis-dark {
							  background-color: #fc8800;
							  border-color: #fc8800;
							}
							table .danger-emphasis,
							table .danger-emphasis-dark {
							  background: #DA4932;
							  color: #FFF;
							  border-color: #DA4932;
							  text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.3);
							}
							table .danger-emphasis-dark {
							  background-color: #c8432e;
							  border-color: #c8432e;
							}
							table {
							  border-collapse: collapse;
							  width: 100%;
							}
							table.no-border {
							  border: 0;
							}
							table .right {
							  text-align: right;
							}
							table .left {
							  text-align: left;
							}
							.red thead th {
							  color: #d36442;
							}
							.blue thead th {
							  color: #3078EF;
							}
							.violet thead th {
							  color: #8b12ae;
							}
							.green thead th {
							  color: #4da60c;
							}
							table thead th span {
							  color: #333;
							}
							table thead th {
							  vertical-align: bottom;
							  border-bottom: 1px solid #DADADA;
							  border-left: 1px solid #DADADA;
							  border-top: 1px solid #DADADA;
							  padding: 10px 8px 5px 8px;
							}
							table thead th:last-child {
							  border-right: 1px solid #DADADA;
							}
							table thead span {
							  font-size: 13px;
							  display: block;
							}
							table td {
							  border-left: 1px solid #DADADA;
							  border-bottom: 1px solid #dadada;
							  padding: 7px 8px;
							}
							table.padding-sm td {
							  padding: 4px 6px;
							}
							table td .progress {
							  margin: 0;
							}
							table.hover tbody tr:hover {
							  background: #f3f3f3;
							}
							table td i {
							  font-size: 13px;
							  display: inline-block;
							  text-align: center;
							  width: 23px;
							}
							table td:last-child {
							  border-right: 1px solid #dadada;
							}
							table tr:nth-child(2n) {
							  background: #f8f8f8;
							}
							table.no-strip tr:nth-child(2n) {
							  background: transparent;
							}
							/*No-Internal borders in thead*/
							table .no-border th {
							  border-left: 0;
							}
							table .no-border tr th:first-child {
							  border-left: 1px solid #dadada;
							}
							/*No-Internal borders in tbody x and y*/
							table .no-border-x td {
							  border-bottom: 0;
							}
							table .no-border-x tr:last-child td {
							  border-bottom: 1px solid #dadada;
							}
							table .no-border-y td {
							  border-left: 0;
							}
							table .no-border-y tr td:first-child {
							  border-left: 1px solid #dadada;
							}
							/*No-External borders general table*/
							table.no-border tr th {
							  border-top: 0;
							}
							table.no-border tr th:first-child {
							  border-left: 0;
							}
							table.no-border tr th:last-child {
							  border-right: 0;
							}
							table.no-border tr td:first-child {
							  border-left: 0;
							}
							table.no-border tr td:last-child {
							  border-right: 0;
							}
							table.no-border tr:last-child td {
							  border-bottom: 0;
							}
							/*No-External borders when .no-padding in block*/
							.no-padding table th:first-child {
							  border-left: 0;
							}
							.no-padding table th:last-child {
							  border-right: 0;
							}
							.no-padding table tr td:first-child {
							  border-left: 0;
							}
							.no-padding table tr td:last-child {
							  border-right: 0;
							}
							.no-padding table tr:last-child td {
							  border-bottom: 0;
							}
							table tbody .toggle-details {
							  cursor: pointer;
							}
							table tbody .details {
							  background: #FFF;
							}
							table tbody td .btn {
							  margin-bottom: 0 !important;
							}
							table tbody td .btn-group .dropdown-menu {
							  margin-top: -1px;
							  min-width: 130px;
							}
							table tbody td .btn-group .dropdown-menu li > a {
							  padding: 5px 12px;
							  text-align: left;
							}
							table td .flag {
							  text-align: center;
							  padding: 0 4px;
							}
							table td .legend {
							  width: 10px;
							  height: 10px;
							  background: #efefef;
							}
						</style>
						<body>
							<div id="header">
								<img src="../../media/img/logo.bmp"  style="height:30px; margin-left: 10px;margin-top:10px;" />
								&nbsp;&nbsp;&nbsp;<b>Resume - '.$_POST['type'].' '.$_POST['size'].'</b>
						  	</div>
						  	<div id="footer">
								 <p class="page" style="margin-right: 10px;">Page </p>
						  	</div>
						  	<div id="content">
						  		<table class="table no-border table-condensed">
						  			<thead class="no-border">
						  				<tr class="success">
						  					<th colspan="6"><strong>Indata</strong></th>
						  					<th><strong>Departure</strong></th>
						  				</tr>
						  			</thead>
						  			<tbody class="no-border-y">
						  				<tr>
						  					<td><label class="control-label">Date: </label></td>
						  					<td colspan="5">'.date("Y-m-d H:i:s").'</td>
						  					<td rowspan="7" style="font-size: 50px; text-align: center; vertical-align: middle;">'.$_POST['departure'].'</td>
						  				</tr>
						  				<tr>
						  					<td><label class="control-label">Seller:</label></td>
						  					<td colspan="5">'.$_POST['seller'].'</td>
						  				</tr>
						  				<tr>
						  					<td><label class="control-label">Customer:</label></td>
						  					<td colspan="5">'.$_POST['customerName'].'</td>
						  				</tr>
						  				<tr>
						  					<td><label class="control-label">No. Proposal:</label></td>
						  					<td colspan="5">'.$_POST['proposal'].'</td>
						  				</tr>
							            <tr>
							              <td style="width: 15%;"><label class="control-label">Flow</label></td>
							              <td style="width: 15%;"><label class="control-label">Inlet pressure</label></td>
							              <td style="width: 15%;"><label class="control-label">Outlet pressure</label></td>
							              <td style="width: 15%;"><label class="control-label">Temperature</label></td>
							              <td style="width: 20%;"><label class="control-label">Temp Cold Start Up</label></td>
							              <td style="width: 15%;"><label class="control-label">Density Normal</label></td>
							            </tr>
							            <tr>
							              <td>
							                <div class="input-group input-group-sm">
							                  '.$_POST['flow'].' '.$_POST['flowUnit'].'
							                </div>
							              </td>
							              <td>
							                <div class="input-group input-group-sm">
							                  '.$_POST['inletPressure'].' '.$_POST['inletPressureUnit'].'
							                </div>
							              </td>
							              <td>
							                <div class="input-group input-group-sm">
							                  '.$_POST['ouletPressure'].' '.$_POST['inletPressureUnit'].'
							                </div>
							              </td>
							              <td>
							                <div class="input-group input-group-sm">
							                  '.$_POST['temp'].' &deg;'.strtoupper($_POST['tempUnit']).'
							                </div>
							              </td>
							              <td>
							                <div class="input-group input-group-sm">
							                  '.$_POST['tempCold'].' &deg;'.strtoupper($_POST['tempUnit']).'
							                </div>
							              </td>
							              <td>
							                <div class="input-group input-group-sm">
							                  '.$_POST['density'].' '.$_POST['densityUnit'].'
							                </div>
							              </td>
							            </tr>
							        </tbody>
							    </table>

							    <table class="table no-border table-condensed">
						    		<tr>
							    		<td width="200">

											<table class="table no-border table-condensed">
												<thead class="no-border">
												  <tr class="success">
												    <th colspan="3"><strong>General Conditions</strong></th>
												  </tr>
												</thead>
												<tbody class="no-border-y">
												  <tr>
												    <td style="width:50%">
												      <label class="control-label">Barom Pressure</label>
												    </td>
												    <td style="width:25%"><span>760</span></td>
												    <td style="width:25%"><span>mmHg</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">Elevation</label>
												    </td>
												    <td><span>0</span></td>
												    <td><span>m</span></td>
												  </tr>
												</tbody>
											</table>

											<table class="table no-border table-condensed">
												<thead class="no-border">
												  <tr class="success">
												    <th style="width:50%"><strong>Selected fan</strong></th>
												    <th style="width:25%"><strong>&nbsp;</strong></th>
												    <th style="width:25%"><strong>&nbsp;</strong></th>
												  </tr>
												</thead>
												<tbody class="no-border-y">
												  <tr>
												    <td>
												      <label class="control-label">Type</label>
												    </td>
												    <td><span>'.$_POST['type'].'</span></td>
												    <td><span>&nbsp;</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">Size</label>
												    </td>
												    <td><span>'.$_POST['size'].'</span></td>
												    <td><span>&nbsp;</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">Fan connection area</label>
												    </td>
												    <td><span>'.$_POST['area'].'</span></td>
												    <td><span>'.$_POST['areaUnit'].'</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">Pd</label>
												    </td>
												    <td><span>'.$_POST['pd'].'</span></td>
												    <td><span>'.$_POST['pdUnit'].'</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">Accessories</label>
												    </td>
												    <td><span>'.$_POST['accessories'].'</span></td>
												    <td><span>'.$_POST['pdUnit'].'</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">Inlet connection</label>
												    </td>
												    <td><span>'.$_POST['inlet'].'</span></td>
												    <td><span>'.$_POST['pdUnit'].'</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">Oulet connection</label>
												    </td>
												    <td><span>'.$_POST['oulet'].'</span></td>
												    <td><span>'.$_POST['pdUnit'].'</span></td>
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
												    <td><span>'.$_POST['sflow'].'</span></td>
												    <td><span>'.$_POST['flowUnit'].'</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">Total pressure</label>
												    </td>
												    <td><span>'.$_POST['totalPressure'].'</span></td>
												    <td><span>'.$_POST['pdUnit'].'</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">Efficiancy</label>
												    </td>
												    <td><span>'.$_POST['eff'].'</span></td>
												    <td><span>%</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">&nbsp;</label>
												    </td>
												    <td><span>'.$_POST['komp'].'</span></td>
												    <td><span>Kp</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">Power</label>
												    </td>
												    <td><span>'.$_POST['power'].'</span></td>
												    <td><span>Hp</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">Power at Cold Star Up</label>
												    </td>
												    <td><span>'.$_POST['powerCold'].'</span></td>
												    <td><span>Hp</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">Throttle line</label>
												    </td>
												    <td><span>'.$_POST['line'].'</span></td>
												    <td><span></span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">Moment of inertia WR2</label>
												    </td>
												    <td><span>'.$_POST['wr2'].'</span></td>
												    <td><span>'.$_POST['wr2Unit'].'</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">Total wight</label>
												    </td>
												    <td><span>'.$_POST['totalWeight'].'</span></td>
												    <td><span>'.$_POST['totalWeightUnit'].'</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">Speed</label>
												    </td>
												    <td><span>'.$_POST['speed'].'</span></td>
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
												    <td><span>'.$_POST['torqueOperation'].'</span></td>
												    <td><span>Nm</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">At 0 flow and 20º C</label>
												    </td>
												    <td><span>'.$_POST['torqueFlow'].'</span></td>
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
												</thead>
												<tbody class="no-border-y">
												  <tr>
												    <td>&nbsp;</td>
												    <td>L wtot</td>
												    <td>L ptot at <span style="display: inline;">1</span></td>
												    <td>&nbsp;</td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">To inlet and outlet</label>
												    </td>
												    <td><span>96</span></td>
												    <td><span>88</span></td>
												    <td><span>dB(A)</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">To surrounding - free inlet</label>
												    </td>
												    <td><span>94</span></td>
												    <td><span>86</span></td>
												    <td><span>dB(A)</span></td>
												  </tr>
												  <tr>
												    <td>
												      <label class="control-label">To surrounding - ducted intet</label>
												    </td>
												    <td><span>93</span></td>
												    <td><span>85</span></td>
												    <td><span>dB(A)</span></td>
												  </tr>
												</tbody>
											</table>
							    		</td>
							    		<td width="300">
							    			<table class="table no-border table-condensed">
												<thead class="no-border" class="success">
												  <tr class="success">
												    <th><strong>Charts</strong></th>
												    <th></th>
												    <th></th>
												    <th>Density 1.294 Kg/Nm3</th>
												  </tr>
												</thead>
											</table>
									        <img src="../../media/pdf/chartA.jpg" width="380" height="330" style="margin-left: 27px;" />
									        <br />
									        <img src="../../media/pdf/chartB.jpg" width="380" height="310" style="margin-left: 27px;" />
							    		</td>
							    	</tr>
							    </table>

						  	</div> 	
						  	<script type="text/javascript"> 
								this.print(true);
							</script> 
						</body>
					</html> ';

		$dompdf = new DOMPDF();
		$dompdf->load_html($vHTML);
		$dompdf->render();
		file_put_contents("../../media/pdf/resumeImp.pdf", $dompdf->output());

		echo "1";
	}

	function sistemaUnidades(){
		global $vConn;

		$vQuery = " SELECT * FROM Selection ORDER BY SelectionDate DESC LIMIT 0,1; ";
		$vRes =  $vConn->ExecuteWithReturn($vQuery);

		//Query para buscar el nombre del cliente
		$qCustomer = "";
		$qCustomer = "SELECT Name FROM Customer WHERE CustomerId=".$vRes[0]['CustomerId'];
		$qRes      = $vConn->ExecuteWithReturn($qCustomer);

		/*Formando JSON Respuesta segun Selection*/
		$vSeleccion = json_encode(array(
						"System"    => $vRes[0]["Unit"],
						"BladeType" => $vRes[0]["BladeType"],
						"CustomerName" => $qRes[0]["Name"],
						"Proposal" => $vRes[0]["NoProposal"]
					));

		echo $vSeleccion;
	}

	function consultaBaseb(){
		global $vConn;

		//Query para buscar los datos de seleccion
		$vQuery     = "";
		$vQuery     = " SELECT * FROM Selection ORDER BY SelectionDate DESC LIMIT 0,1; ";
		$vSeleccion =  $vConn->ExecuteWithReturn($vQuery);

		//Query de calculos para generar RESUMEN
		$vQuery = "";
		if ($vSeleccion[0]["BladeType"] == 'B') {
			$vQuery = "SELECT * FROM base_b";
		} elseif ($vSeleccion[0]["BladeType"] == 'P') {
			$vQuery = "SELECT * FROM base_p";
		} elseif ($vSeleccion[0]["BladeType"] == 'T') {
			$vQuery = "SELECT * FROM base_t";
		} elseif ($vSeleccion[0]["BladeType"] == 'C') {
			$vQuery = "SELECT * FROM base_c";
		} else {
			$vQuery = "SELECT * FROM base_b";
		}
		
		//$vQuery = "SELECT * FROM base_b";
		$vRes   =  $vConn->ExecuteWithReturn($vQuery);

		$vIndata        = json_decode($_REQUEST["indata"]);
		$v_bladeType    = $vIndata->bladeType;
		$v_flow         = $vIndata->flow;
		$v_flowUnit     = $vIndata->flowUnit;
		$v_inp          = $vIndata->inp;
		$v_inpUnit      = $vIndata->inpUnit;
		$v_outp         = $vIndata->outp;
		$v_temp         = $vIndata->temp;
		$v_tempUnit     = $vIndata->tempUnit;
		$v_tempCold     = $vIndata->tempCold;
		$v_density      = $vIndata->density;
		$v_densityUnit  = $vIndata->densityUnit;

		$vHTML        = "";

		//Pressure rise
		//$pressureRise = 997;
		if ($v_inpUnit == 'inwg') {
			$pressureRise = abs($v_outp-$v_inp)*249.174;
		} elseif ($v_inpUnit == 'lbin2') {
			$pressureRise = abs($v_outp-$v_inp)*6895;
		} elseif ($v_inpUnit == 'mmwg') {
			$pressureRise = abs($v_outp-$v_inp)*9.81;
		} else{
			$pressureRise = abs($v_outp-$v_inp);
		}

		//mBar para calcular Densidad
		//810
		if ($vSeleccion[0]["AmbientPressureUnit"] == 'mBar') {
			$mBar = $vSeleccion[0]["AmbientPressure"];
			//$lalo = 'A';
		} elseif ($vSeleccion[0]["AmbientPressureUnit"] == 'mmHg') {
			$mBar = $vSeleccion[0]["AmbientPressure"]*1013.15/760;
			//$lalo = 'B';
		} elseif ($vSeleccion[0]["AmbientPressureUnit"] == 'inHg') {
			$mBar = $vSeleccion[0]["AmbientPressure"]*33.857;
			//$lalo = 'C';
		} elseif ($vSeleccion[0]["AmbientPressureUnit"] == 'm') {
			$mBar = 1013.15*exp(-$vSeleccion[0]["AmbientPressure"]/8040);
			//$lalo = 'D';
		} else {
			$mBar = 1013.15*exp(-($vSeleccion[0]["AmbientPressure"]/3.281)/8040);
			//$lalo = 'E';
		}

		//Inlet pressure para calcular el density y flow
		if ($v_inpUnit == 'inwg') {
			$inletPressucec = $v_inp*249.174;
			$pressureChart  = 25.4*9.81;
		} elseif ($v_inpUnit == 'lbin2') {
			$inletPressucec = $v_inp*6895;
			$pressureChart  = 6895;
		} elseif ($v_inpUnit == 'mmwg') {
			$inletPressucec = $v_inp*9.81;
			$pressureChart  = 9.81;
		} else {
			$inletPressucec = $v_inp;
			$pressureChart  = 1;
		}
		
		//Densidad para calcular el flow
		//1.273
		if ($v_densityUnit == 'kgm3' || $v_densityUnit == 'kgnm3') {
			$densityc = $v_density;
		} elseif ($v_densityUnit == 'slbft3' || $v_densityUnit == 'lbft3') {
			$densityc = $v_density*16.0187;
		} else {
			$densityc = $v_density;
		}

		//Densidad
		//$density      = 0.932184;
		if ($v_densityUnit == 'kgm3') {
			$density = $v_density;
		} elseif ($v_densityUnit == 'kgnm3') {
			$density = $v_density*273/(273+$v_temp)*(($mBar*100)+$inletPressucec)/101325;
		} elseif ($v_densityUnit == 'slbft3') {
			$density = $v_density*16.0187*294.1/(273+$v_temp)*(($mBar*100)+$inletPressucec)/101325;
		} else {
			$density = $v_density*16.0187;
		}

		//Flow m3/s
		//$flow         = 25.0000;
		if ($v_flowUnit == 'acfm') {
			$flow      = $v_flow*4.72*pow(10, -4);
			$flowChart = 0.000472;
		} elseif ($v_flowUnit == 'scfm') {
			$flow      = $v_flow*0.000472*$densityc/$density;
			$flowChart = 1/3600;
		} elseif ($v_flowUnit == 'm3h') {
			$flow      = $v_flow/3600;
			$flowChart = 1/3600;
		} elseif ($v_flowUnit == 'nm3h') {
			$flow      = $v_flow*$densityc/$density/3600;
			$flowChart = 1/3600;
		} else {
			$flow      = $v_flow;
			$flowChart = 1;
		}
		
		$b33         = 60;
		$temperature = $v_temp;
		$power       = 1.341;//Es el estandar a manejar
		$powerChart  = 1/1.341;

		//Datos para la pantalla resumen
		//*********************************************************
		//Barom pressure - unidad
		if ($vSeleccion[0]["AmbientPressureUnit"] == 'mmHg' || $vSeleccion[0]["AmbientPressureUnit"] == 'm') {
			$baromUnit = 'mmHg';
		} elseif ($vSeleccion[0]["AmbientPressureUnit"] == 'mBar') {
			$baromUnit = 'mBar';
		} else {
			$baromUnit = 'inHg';
		}

		//Barom pressure - valor
		if ($baromUnit == 'inHg') {
			$barom = round($mBar/33.857, 2);
		} elseif ($baromUnit == 'mmHg') {
			$barom = round($mBar/1.333, 0);
		} else{
			$barom = $mBar;
		}

		//*********************************************************
		//Elevation - unidad
		if ($vSeleccion[0]["AmbientPressureUnit"] == 'm') {
			$elevationUnit = 'm';
		} elseif ($vSeleccion[0]["AmbientPressureUnit"] == 'ft') {
			$elevationUnit = 'Ft';
		} else {
			$elevationUnit = '';
		}

		foreach ($vRes as $vResume)
		{
			$id     = $vResume["id"];
			$number = $vResume["number"];
			$type   = $vResume["type"];
			$size   = $vResume["size"];
			$ncurve = $vResume["ncurve"];
			$nmax   = $vResume["nmax"];
			$pdx2   = $vResume["pdx2"];
			$pdx    = $vResume["pdx"];
			$pdk    = $vResume["pdk"];
			$ptx2   = $vResume["ptx2"];
			$ptx    = $vResume["ptx"];
			$ptk    = $vResume["ptk"];
			$pex3   = $vResume["pex3"];
			$pex2   = $vResume["pex2"];
			$pex    = $vResume["pex"];
			$pek    = $vResume["pek"];
			$rpm    = 0;
			$pe     = 0;
			$eff    = 0;
			$s13    = 0;
			$s14    = 0;
			$s15    = 0;
			$s16    = 0;
			$komp   = 0;
			$area   = 0;
			$areaUnit = 'ft2';
			$wr2 = 0;
			$wr2Unit = 'lbft2';
			$totalWeightUnit = 'Lb';
			$torqueUnit = 'lbft';
			$s6 = 0;

			$pdActual = ((($pdx2*pow($flow, 2))+$pdx*($density+$pdk)))*$density/1.2;
			// Duct / Diff
			//$duct     = $flow/(4000*0.3048/60);
			if ($vSeleccion[0]["ConnectionmavUnit"] == 'ms') {
				$duct = $flow/$vSeleccion[0]["Connectionmav"];
			} elseif ($vSeleccion[0]["ConnectionmavUnit"] == 'fpm') {
				$duct = $flow/($vSeleccion[0]["Connectionmav"]*0.3048/60);
			} else {
				$duct = $flow/20;
			}

			//In
			//$in       = .1*$pdActual;
			if ($vSeleccion[0]["DefinitionIn"] == 'T' && $v_inp > 0) {
				$in = 0;
			} elseif ($v_inp != 0) {
				$in = 0.05*$pdActual;
			} else {
				$in = 0.1*$pdActual;
			}

			$out = pow($flow/$duct, 2)*$density/2;
			
			//ej: v34 baseB->sel
			if ($out > $pdActual) {
				if ($vSeleccion[0]["DefinitionIn"] == 'T') {
					$v34 = $pdActual;
				} else {
					$v34 = 0;
				}
			} elseif ($vSeleccion[0]["DiffusorOut_1"] == 0) {
				if ($vSeleccion[0]["DefinitionIn"] == 'T') {
					$v34 = 0.3*($pdActual-$out)+$out;
				} else {
					$v34 = 0.3*($pdActual-$out);
				}
			} elseif ($vSeleccion[0]["DefinitionIn"] == 'T') {
				$v34 = 0.2*($pdActual-$out)+$out;
			} else {
				$v34 = 0.2*($pdActual-$out);
			}

			//$ps
			//$ps = $pdActual;
			if ($vSeleccion[0]["ConnectionmavYn"] == "Y") {
				$ps = $v34;
			} elseif ($vSeleccion[0]["DefinitionIn"] == 'T') {
				$ps = $pdActual;
			} else {
				$ps = 0;
			}
			
			//$pt
			//$pt = $ps;
			if ($vSeleccion[0]["DefinitionOut"] == 'S') {
				$pt = $ps;
			} elseif ($vSeleccion[0]["Connectionmav"] > 0 && $pdActual > $out) {
				$pt = 0.3*($pdActual-$out);
			} else {
				$pt = 0;
			}

			//echo '<br> connection - '.$vSeleccion[0]["Connectionmav"];
			//echo '<br> pr - '.$pressureRise;
			//echo '<br> in - '.$in;
			//echo '<br> pt - '.$pt;
			$ptActual = $pressureRise+$in+$pt; //+accesorios
			$line = sqrt($pdActual/$ptActual);
			$line2 = pow($line, 2);
			$qFull = -($pdx/$line2-$ptx)/(2*($pdx2/$line2-$ptx2))+sqrt(pow(($pdx/$line2-$ptx)/(2*($pdx2/$line2-$ptx2)), 2)-(($pdk/$line2-$ptk)/($pdx2/$line2-$ptx2)));
			
			//if ($line > 0.19 && (($flow/$qFull*$ncurve) < $nmax)) {
				$rpm = $flow/$qFull*$ncurve;
			//}

			//if ($rpm > 0) {
				$pe = pow($rpm/$ncurve, 3)*($pex3*pow($qFull, 3)+$pex2*pow($qFull, 2)+$pex*$qFull+$pek)*$density/1.2;
			//}

			//if ($rpm > 0) {
				$eff = $ptActual*$flow/$pe/10;
			//}

			$workLine = sqrt($pdActual/$ptActual)*10;

			//echo '<br>pe - '.round($pe,1);
			$hp = $pe*$power;

			if ($workLine >= 2 && $workLine <= 5) {

				if ($vSeleccion[0]["Unit"] == 'SI') {
					$areaUnit = 'm2';
					$wr2Unit = 'kgm2';
					$totalWeightUnit = 'Kg';
					$torqueUnit = 'Nm';
				}
				
				//Connection area
				switch ($size) {
					case '10':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 0.008; } else { $area = 0.008/pow(0.3048, 2); }
						break;

					case '12':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 0.0138; } else { $area = 0.0138/pow(0.3048, 2); }
						break;

					case '16':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 0.02; } else { $area = 0.02/pow(0.3048, 2); }
						break;

					case '20':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 0.032; } else { $area = 0.032/pow(0.3048, 2); }
						break;

					case '25':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 0.05; } else { $area = 0.05/pow(0.3048, 2); }
						break;

					case '31':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 0.0788; } else { $area = 0.0788/pow(0.3048, 2); }
						break;

					case '35':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 0.098; } else { $area = 0.098/pow(0.3048, 2); }
						break;

					case '40':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 0.126; } else { $area = 0.126/pow(0.3048, 2); }
						break;

					case '45':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 0.16; } else { $area = 0.16/pow(0.3048, 2); }
						break;

					case '50':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 0.2; } else { $area = 0.2/pow(0.3048, 2); }
						break;

					case '56':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 0.252; } else { $area = 0.252/pow(0.3048, 2); }
						break;

					case '63':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 0.315; } else { $area = 0.315/pow(0.3048, 2); }
						break;

					case '71':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 0.398; } else { $area = 0.398/pow(0.3048, 2); }
						break;

					case '80':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 0.504; } else { $area = 0.504/pow(0.3048, 2); }
						break;

					case '90':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 0.639; } else { $area = 0.639/pow(0.3048, 2); }
						break;

					case '100':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 0.8; } else { $area = 0.8/pow(0.3048, 2); }
						break;

					case '112':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 1.008; } else { $area = 1.008/pow(0.3048, 2); }
						break;

					case '125':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 1.25; } else { $area = 1.25/pow(0.3048, 2); }
						break;

					case '140':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 1.568; } else { $area = 1.568/pow(0.3048, 2); }
						break;

					case '160':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 2; } else { $area = 2/pow(0.3048, 2); }
						break;

					case '180':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 2.52; } else { $area = 2.52/pow(0.3048, 2); }
						break;

					case '200':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 3.2; } else { $area = 3.2/pow(0.3048, 2); }
						break;

					case '224':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 4.032; } else { $area = 4.032/pow(0.3048, 2); }
						break;

					case '250':
						if ($vSeleccion[0]["Unit"] == 'SI') { $area = 5; } else { $area = 5/pow(0.3048, 2); }
						break;
					
					default:
						$area = 0;
						break;
				}

				//Komp
				$s13  = $pressureRise/(($mBar*100)+$inletPressucec);
				//echo 's13 - '.$s13;
				$s14  = $pressureRise/($eff*10*(($mBar*100)+$inletPressucec))*0.4/1.4*1000;
				//echo 'rpm - '.$rpm;
				//echo '<br>eff - '.$eff;
				//echo '<br>s14 - '.$s14;
				$s15  = log($s13+1)/$s13;
				$s16  = $s14/log($s14+1);
				$komp = $s16*$s15;

				//Calculo de las curvas
				//Se tomaron las celdas de "Fancel->chart" como referencia del excel para estos calculos
				$e10 = $pdx2-$ptx2;
				$f10 = ($pdx-$ptx)/$e10;
				$g10 = ($pdk-$ptk)/$e10;
				$maxFlow = -$f10/2+sqrt(pow(($f10/2), 2)-$g10);
				$m12 = $ptActual;
				$q12 = $hp;//Aqui puede haber alguna falla
				$loadPoint = $flow/$flowChart;
				
				//if ($number == 10) {
				$curvaI = '';
				$curvaH = '';
				$curvaJ = '';
				$curvaK = '';
				$curvaL = '';
				$curvaT = '';
				$curvaU = '';
						
				//Calculos de curvas
				for ($i=0; $i < 10; $i++) { 
					//Curva I
					$cI       = ($i*$maxFlow)/10;
					$curvaI[] = round($cI,2);

					//Curva H
					$cH       = +$cI*($rpm/$nmax/$flowChart);
					$curvaH[] = round($cH);

					//Curva J
					$cJ       = (+$pdx2*pow($cI, 2)+$pdx*$cI+$pdk)*$density/1.2*pow($rpm/$nmax, 2)/$pressureChart;
					$curvaJ[] = round($cJ,2);

					//Curva K
					$cK       = (+$ptx2*pow($cI, 2)+$ptx*$cI+$ptk)*$density/1.2*pow($rpm/$nmax, 2)/$pressureChart;
					$curvaK[] = round($cK,2);

					//Curva L
  					$cL       = (+$pex3*pow($cI, 3)+$pex2*pow($cI, 2)+$pex*$cI+$pek)*$density/1.2*pow($rpm/$nmax, 3)/$powerChart*$komp;
					$curvaL[] = round($cL,2);
					
					//Curva T
  					$cT       = $cJ/pow($workLine/10, 2);
					$curvaT[] = round($cT,2);
					
					//Curva U
  					$cU       = $cJ/0.04;
					$curvaU[] = round($cU,2);
				}

				//wr2
				//Query para buscar el valor wr2
				$vQuery     = "";
				$vQuery     = "SELECT wr2,k,l FROM base_data WHERE number = '".$number."' LIMIT 0,1";
				$vRes =  $vConn->ExecuteWithReturn($vQuery);
				$wr2 = $vRes[0]["wr2"];
				$resK = $vRes[0]["k"];
				$resL = $vRes[0]["l"];

				if ($vSeleccion[0]["Unit"] == 'SI') {
					$wr2 = 1.05*$wr2;
					$totalWeight = $resK+$resL;
					$s6 = $v_temp;
				} else {
					$wr2 = 1.05*$wr2/0.04214;
					$totalWeight = ($resK+$resL)*2.205;
					$s6 = ($v_temp-32)/1.8;
				}

				$l1 = $curvaL[0];

				$vHTML .= 
					'<tr>
						<td class="text-center">
		                    <input type="radio" name="select" id="select_'.$number.'" class="icheck panda" value="'.$number.'" >
		                    <input type="hidden" id="lineah_'.$number.'" value="'.json_encode($curvaH).'">
		                    <input type="hidden" id="lineai_'.$number.'" value="'.json_encode($curvaI).'">
		                    <input type="hidden" id="lineaj_'.$number.'" value="'.json_encode($curvaJ).'">
		                    <input type="hidden" id="lineak_'.$number.'" value="'.json_encode($curvaK).'">
		                    <input type="hidden" id="lineal_'.$number.'" value="'.json_encode($curvaL).'">
		                    <input type="hidden" id="lineat_'.$number.'" value="'.json_encode($curvaT).'">
		                    <input type="hidden" id="lineau_'.$number.'" value="'.json_encode($curvaU).'">
		                    <input type="hidden" id="m_'.$number.'" value="'.$m12.'">
		                    <input type="hidden" id="loadPoint_'.$number.'" value="'.$loadPoint.'">
		                    <input type="hidden" id="pdActual_'.$number.'" value="'.$pdActual.'">
		                    <input type="hidden" id="inPa_'.$number.'" value="'.round($in).'">
		                    <input type="hidden" id="area_'.$number.'" value="'.$area.'">
		                    <input type="hidden" id="areaUnit_'.$number.'" value="'.$areaUnit.'">
		                    <input type="hidden" id="komp_'.$number.'" value="'.$komp.'">
		                    <input type="hidden" id="wr2_'.$number.'" value="'.$wr2.'">
		                    <input type="hidden" id="wr2Unit_'.$number.'" value="'.$wr2Unit.'">
		                    <input type="hidden" id="totalWeight_'.$number.'" value="'.$totalWeight.'">
		                    <input type="hidden" id="totalWeightUnit_'.$number.'" value="'.$totalWeightUnit.'">
		                    <input type="hidden" id="s6_'.$number.'" value="'.$s6.'">
		                    <input type="hidden" id="l1_'.$number.'" value="'.$l1.'">
						</td>
						<td>
							'.$number.'
						</td>
		    			<td>'.$type.'<input type="hidden" id="type_'.$number.'" value="'.$type.'"></td>
		    			<td>'.$size.'<input type="hidden" id="size_'.$number.'" value="'.$size.'"></td>
		    			<td>'.round($eff, 1).'<input type="hidden" id="eff_'.$number.'" value="'.round($eff, 2).'"></td>
		    			<td>'.round($rpm).'<input type="hidden" id="rpm_'.$number.'" value="'.round($rpm, 1).'"></td>
		    			<td>'.round($hp, 1).'<input type="hidden" id="hp_'.$number.'" value="'.$hp.'"></td>
		    			<td class="text-center">'.round($ptActual, 1).'<input type="hidden" id="ptActual_'.$number.'" value="'.round($ptActual, 1).'"></td>
		    			<td class="text-center success-emphasis-dark">'.round($workLine, 2).'<input type="hidden" id="line_'.$number.'" value="'.round($workLine, 1).'"></td>
		  			</tr>';

		  		
			}
			
		}
		
		/*Formando JSON*/
		$vData = json_encode(array(
						"tr" => $vHTML,
						"barom" => $barom,
						"baromUnit" => $baromUnit,
						"elevationUnit" => $elevationUnit,
						"komp" => $komp
					));

		echo $vData;
	}
?>