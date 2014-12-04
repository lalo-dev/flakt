<?php
	session_start();
	
	include_once("../01Clases/01Util/ConexionBD.php");
	include_once("../01Clases/01Util/dompdf/dompdf_config.inc.php");
		
	$vConn = new ConexionBD();
	
	if(isset($_POST['acc'])){
		
		$vAcc = $_POST['acc'];
		
		switch($vAcc)
		{
			case "exportaPDF":
					exportaPDF();
				break;
			case "imprimePDF":
					imprimePDF();
				break;
		}
		
		
	}


	function exportaPDF(){
		
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
							  padding: 5px;
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
							  font-size: 13px;
							  font-weight: 200;
							}
							table tbody td {
							  padding: 7px 8px;
							  font-size: 12px;
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
							  font-size: 15px;
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
							  font-size: 15px;
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
								&nbsp;&nbsp;&nbsp;<b>Price - Centrifugal HA</b>
						  	</div>
						  	<div id="footer">
								 <p class="page" style="margin-right: 10px;">Page </p>
						  	</div>
						  	<div id="content" >
						    	<div class="col-sm-12">
								 	  <h3>Specification and Price Calculation</h3>
							          	<p class="text-danger">(only valid for HK fans)</p>
							          <table class="table table-condensed" >
							            <thead class="no-border" >
							              <tr>
							                <th colspan="4"><strong>Fan</strong></th>
							                <th>Prog</th>
							                <th>Sel</th>
							                <th>Cancel</th>
							                <th>List Price</th>
							                <th>H.H.</th>
							                <th>&nbsp;</th>
							                <th>&nbsp;</th>
							              </tr>
							            </thead>
							            <tbody class="no-border">
							              <tr>
							                <td style="width: 30%;">Fan</td>
							                <td style="width: 8%;">HCGB</td>
							                <td style="width: 8%;">- 25</td>
							                <td style="width: 8%;">&nbsp;</td>
							                <td>x</td>
							                <td style="width: 5%;"><input type="text" style="width: 90%;"></td>
							                <td style="width: 5%;"><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td style="width: 5%;">label</td>
							                <td style="width: 5%;">&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Frame</td>
							                <td>HCVZ</td>
							                <td>- 01</td>
							                <td>- 001</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Inspection door</td>
							                <td>HCVZ</td>
							                <td>- 07</td>
							                <td>- 03</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Cooling disc</td>
							                <td>HCGB</td>
							                <td>- 06</td>
							                <td>- 01</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Drain</td>
							                <td>FLDR</td>
							                <td>- 1</td>
							                <td>&nbsp;</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Beltdrive with guard</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Transmision</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>General arrangment drawing</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							            </tbody>
							          </table>
							          <br />
							          <table class="table table-condensed">
							            <thead class="no-border">
							              <tr>
							                <th colspan="4">
							                  <strong>Accessories</strong>
							                  <p>(For further explanation see HC catalogue)</p>
							                </th>
							                <th>Prog</th>
							                <th>Sel</th>
							                <th>Cancel</th>
							                <th>List Price</th>
							                <th>H.H.</th>
							                <th>&nbsp;</th>
							                <th>&nbsp;</th>
							              </tr>
							            </thead>
							            <tbody class="no-border">
							              <tr>
							                <td colspan="11"><p class="text-success">Inlet side</p></td>
							              </tr>
							              <tr>
							                <td style="width: 30%;">Inlet vane control</td>
							                <td style="width: 8%;">N/A</td>
							                <td style="width: 8%;">- 0</td>
							                <td style="width: 8%;">- 0</td>
							                <td>x</td>
							                <td style="width: 5%;"><input type="text" style="width: 90%;"></td>
							                <td style="width: 5%;"><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td style="width: 5%;">label</td>
							                <td style="width: 5%;">&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Inlet damper</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Inlet flange</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Inlet flexible joint low temp</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Inlet flexible joint high temp</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Inlet taper piece with screen</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Counter flange</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Inlet box</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="4">Check the inlet box program</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td colspan="11">
							              		<p class="text-success">Oulet side</p>
						              		</td>
							              </tr>
							              <tr>
							                <td>Louver damper</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Fabric duct</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Flue gas duct</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Protective screen</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Counter flange</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td colspan="11"><p class="text-success"><strong>Motor</strong></p></td>
							              </tr>
							              <tr>
							                <td>SIEMENS</td>
							                <td>Hi. Ef.</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>&nbsp;</td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>50</td>
							                <td>Hp</td>
							                <td>&nbsp;</td>
							                <td colspan="2">Discount</td>
							                <td>%</td>
							                <td>0</td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Other</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="2">Discount</td>
							                <td>%</td>
							                <td>0</td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td colspan="11"><p class="text-success"><strong>Price calculation (Motor not incl.)</strong></p></td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="3">Sum fan list price</td>
							                <td>&nbsp;</td>
							                <td>0</td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="3">Normal discount on fan list price</td>
							                <td>%</td>
							                <td>0 %</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="3">Sum fan H.H cost</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="3">Sales factor on motor</td>
							                <td>%</td>
							                <td>0 %</td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="3">Additional costs</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="5"><input type="text" style="width: 100%"></td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="5"><input type="text" style="width: 100%"></td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="5"><input type="text" style="width: 100%; border: solid 1px black" value="John"></td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td colspan="11"><p class="text-success"><strong>Total</strong></p></td>
							              </tr>
							              <tr>
							                <td colspan="8">&nbsp;</td>
							                <td>Material</td>
							                <td>HH</td>
							                <td>Final</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="5">Total sales price</td>
							                <td>0.00</td>
							                <td>0.00</td>
							                <td>0.00</td>
							              </tr>
							            </tbody>
							          </table>
					          	</div>
						  	</div> 	
						</body>
					</html> ';
		
		

		$dompdf = new DOMPDF();
    	$dompdf->load_html($vHTML);
    	$dompdf->render();
		file_put_contents("../../media/pdf/price.pdf", $dompdf->output());

		echo "1";

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
							  padding: 5px;
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
							  font-size: 13px;
							  font-weight: 200;
							}
							table tbody td {
							  padding: 7px 8px;
							  font-size: 12px;
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
							  font-size: 15px;
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
							  font-size: 15px;
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
								&nbsp;&nbsp;&nbsp;<b>Price - Centrifugal HA</b>
						  	</div>
						  	<div id="footer">
								 <p class="page" style="margin-right: 10px;">Page </p>
						  	</div>
						  	<div id="content" >
						    	<div class="col-sm-12">
								 	  <h3>Specification and Price Calculation</h3>
							          	<p class="text-danger">(only valid for HK fans)</p>
							          <table class="table table-condensed" >
							            <thead class="no-border" >
							              <tr>
							                <th colspan="4"><strong>Fan</strong></th>
							                <th>Prog</th>
							                <th>Sel</th>
							                <th>Cancel</th>
							                <th>List Price</th>
							                <th>H.H.</th>
							                <th>&nbsp;</th>
							                <th>&nbsp;</th>
							              </tr>
							            </thead>
							            <tbody class="no-border">
							              <tr>
							                <td style="width: 30%;">Fan</td>
							                <td style="width: 8%;">HCGB</td>
							                <td style="width: 8%;">- 25</td>
							                <td style="width: 8%;">&nbsp;</td>
							                <td>x</td>
							                <td style="width: 5%;"><input type="text" style="width: 90%;"></td>
							                <td style="width: 5%;"><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td style="width: 5%;">label</td>
							                <td style="width: 5%;">&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Frame</td>
							                <td>HCVZ</td>
							                <td>- 01</td>
							                <td>- 001</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Inspection door</td>
							                <td>HCVZ</td>
							                <td>- 07</td>
							                <td>- 03</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Cooling disc</td>
							                <td>HCGB</td>
							                <td>- 06</td>
							                <td>- 01</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Drain</td>
							                <td>FLDR</td>
							                <td>- 1</td>
							                <td>&nbsp;</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Beltdrive with guard</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Transmision</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>General arrangment drawing</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							            </tbody>
							          </table>
							          <br />
							          <table class="table table-condensed">
							            <thead class="no-border">
							              <tr>
							                <th colspan="4">
							                  <strong>Accessories</strong>
							                  <p>(For further explanation see HC catalogue)</p>
							                </th>
							                <th>Prog</th>
							                <th>Sel</th>
							                <th>Cancel</th>
							                <th>List Price</th>
							                <th>H.H.</th>
							                <th>&nbsp;</th>
							                <th>&nbsp;</th>
							              </tr>
							            </thead>
							            <tbody class="no-border">
							              <tr>
							                <td colspan="11"><p class="text-success">Inlet side</p></td>
							              </tr>
							              <tr>
							                <td style="width: 30%;">Inlet vane control</td>
							                <td style="width: 8%;">N/A</td>
							                <td style="width: 8%;">- 0</td>
							                <td style="width: 8%;">- 0</td>
							                <td>x</td>
							                <td style="width: 5%;"><input type="text" style="width: 90%;"></td>
							                <td style="width: 5%;"><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td style="width: 5%;">label</td>
							                <td style="width: 5%;">&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Inlet damper</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Inlet flange</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Inlet flexible joint low temp</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Inlet flexible joint high temp</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Inlet taper piece with screen</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Counter flange</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Inlet box</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="4">Check the inlet box program</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td colspan="11">
							              		<p class="text-success">Oulet side</p>
						              		</td>
							              </tr>
							              <tr>
							                <td>Louver damper</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Fabric duct</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Flue gas duct</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Protective screen</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Counter flange</td>
							                <td>N/A</td>
							                <td>- 0</td>
							                <td>- 0</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>0</td>
							                <td>0</td>
							                <td>label</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td colspan="11"><p class="text-success"><strong>Motor</strong></p></td>
							              </tr>
							              <tr>
							                <td>SIEMENS</td>
							                <td>Hi. Ef.</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>x</td>
							                <td><input type="text" style="width: 90%;"></td>
							                <td>&nbsp;</td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>50</td>
							                <td>Hp</td>
							                <td>&nbsp;</td>
							                <td colspan="2">Discount</td>
							                <td>%</td>
							                <td>0</td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>Other</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="2">Discount</td>
							                <td>%</td>
							                <td>0</td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td colspan="11"><p class="text-success"><strong>Price calculation (Motor not incl.)</strong></p></td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="3">Sum fan list price</td>
							                <td>&nbsp;</td>
							                <td>0</td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="3">Normal discount on fan list price</td>
							                <td>%</td>
							                <td>0 %</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="3">Sum fan H.H cost</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="3">Sales factor on motor</td>
							                <td>%</td>
							                <td>0 %</td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="3">Additional costs</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="5"><input type="text" style="width: 100%"></td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="5"><input type="text" style="width: 100%"></td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="5"><input type="text" style="width: 100%; border: solid 1px black" value="John"></td>
							                <td>0</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							              </tr>
							              <tr>
							                <td colspan="11"><p class="text-success"><strong>Total</strong></p></td>
							              </tr>
							              <tr>
							                <td colspan="8">&nbsp;</td>
							                <td>Material</td>
							                <td>HH</td>
							                <td>Final</td>
							              </tr>
							              <tr>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td>&nbsp;</td>
							                <td colspan="5">Total sales price</td>
							                <td>0.00</td>
							                <td>0.00</td>
							                <td>0.00</td>
							              </tr>
							            </tbody>
							          </table>
					          	</div>
						  	</div> 	
						  	<script type="text/javascript"> 
								this.print(true);
							</script> 
						</body>
					</html> ';
		
		

		$dompdf = new DOMPDF();
    	$dompdf->load_html($vHTML);
    	$dompdf->render();
		file_put_contents("../../media/pdf/priceImp.pdf", $dompdf->output());

		echo "1";
	}


?>