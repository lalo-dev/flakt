<?php
	session_start();
	
	include_once("../01Clases/01Util/ConexionBD.php");
		
	$vConn = new ConexionBD();
	
	if(isset($_POST['acc'])){
		
		$vAcc = $_POST['acc'];
		
		switch($vAcc)
		{
			case "consultaUsers":
					consultaUsers();
				break;
			case "consultTotalPaginas":
					consultTotalPaginas();
				break;
			case "consultaUserPorId":
					consultaUserPorId();
				break;
			case "guardaUser":
					guardaUser();
				break;
			case "iniciaNuevoUser":
					iniciaNuevoUser();
				break;
			case "eliminaUserPorId":
					eliminaUserPorId();
				break;
		}
		
		
	}


	function consultaUsers(){

		global $vConn;

		$vLInif = (10 * ($_POST['NoPagina'] - 1));

		$vQuery = "";
		$vQuery = " SELECT * FROM User ORDER BY UserId ASC LIMIT ".$vLInif.",10";

		$vRes =  $vConn->ExecuteWithReturn($vQuery);

		$vHTMLUSers = "";

		foreach($vRes as $vUser){

			$vType = $vUser["Type"];

			$vSuper = "";
			$vAdmin = "";
			$vIav = "";
			$vCustomer = "";

			if($vType == 1){
				$vSuper = "Super admin";
			} elseif ($vType == 2) {
				$vAdmin = "Admin";
			} elseif ($vType == 3) {
				$vIav = "IAV";
			} elseif ($vType == 4) {
				$vCustomer = "Customer";
			}

			$vHTMLUSers .= "<tr>
								<td>".$vUser['UserId']."</td>
								<td>".$vUser['Name']."</td>
                    			<td>".$vUser['FirstLastName']."</td>
                    			<td>".$vUser['SecondLastName']."</td>
                    			<td>".$vUser['AEmail']."</td>
		                    	<td>".$vSuper.$vAdmin.$vIav.$vCustomer."</td>
                    			<td class=\"text-center\">                      				
									<a class=\"label label-primary btnViewUser\" 
										onclick=\"$('#hdnUserId').val('".$vUser['UserId']."')\" >
                        				<i class=\"fa fa-eye\"></i>
                      				</a>
                      				&nbsp;
                      				<a class=\"label label-primary btnActualiza\" 
                      					onclick=\"$('#hdnUserId').val('".$vUser['UserId']."')\" >
                        				<i class=\"fa fa-pencil\"></i>
                      				</a>
									&nbsp;
									<a class=\"label label-danger\" 
										onclick=\"if(confirm('Delete user: ".$vUser['Name']." - ".$vUser['FirstLastName']." ?')){ eliminaUser('".$vUser['UserId']."'); }\" >
										<i class=\"fa fa-times\"></i>
									</a>
                    			</td>
                  			</tr>";
		}

		echo $vHTMLUSers;

	}

	function consultTotalPaginas(){
		
		global $vConn;	

		$vRes =  $vConn->ExecuteWithReturn(" SELECT COUNT(UserId) AS Total FROM User ");

		$vElementosPorPagina = 10;
		$vTotalElementos = $vRes[0]["Total"];

		$vDivision =number_format( (float)( $vTotalElementos / $vElementosPorPagina), 1, '.', '');

		$vEntDec = explode(".",$vDivision);	

		$vTotPaginas = $vEntDec[0];

		if($vEntDec[1] > 0)
			$vTotPaginas = $vTotPaginas + 1;

		echo $vTotPaginas;

	}

	function consultaUserPorId(){

		global $vConn;

		$vQuery = "";
		$vQuery = " SELECT 
						UserId,
						AEmail,
						AES_DECRYPT( APassword, (SELECT Value FROM Configuration WHERE ConfigurationId = 1) ) AS APassword,
						ActiveAccount,
						Name,
						FirstLastName,
						SecondLastName,
						Type
					FROM User 
					WHERE 
						UserId = ".$_POST['UserId']."";

		$vRes =  $vConn->ExecuteWithReturn($vQuery);

		$vEsEdicion = $_POST['esEdicion'];
		$vType = $vRes[0]["Type"];

		$vDisabled = "";
		$vSuper = "";
		$vAdmin = "";
		$vIav = "";
		$vCustomer = "";

		if($vEsEdicion == 0)
			$vDisabled = "disabled";

		if($vType == 1){
			$vSuper = "selected";
		} elseif ($vType == 2) {
			$vAdmin = "selected";
		} elseif ($vType == 3) {
			$vIav = "selected";
		} elseif ($vType == 4) {
			$vCustomer = "selected";
		}

		$vHTMLUser = "
			<form id=\"frmUser\" class=\"form-horizontal\" role=\"form\">
	      		<div class=\"form-group\">
	          		<div class=\"col-xs-7\"></div>
          			<label class=\"col-sm-2 control-label\" >Id:</label>
		          	<div class=\"col-xs-3\">
	              		<input type=\"text\" name=\"txtUserId\"  class=\"form-control\" 
		              		value=\"".$vRes[0]["UserId"]."\"  placeholder=\"Usuario Id\" readonly>
		          	</div>
		      	</div>
		      	<div id=\"dName\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Name:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"text\" id=\"txtName\" name=\"txtName\" 
		           			value=\"".$vRes[0]["Name"]."\"  class=\"form-control\" 
		           				placeholder=\"Name\" ".$vDisabled.">
		        	</div>
        	  	</div>
        	  	<div id=\"dFirstLastName\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Last Name:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"text\" id=\"txtFirstLastName\" name=\"txtFirstLastName\" 
		           			value=\"".$vRes[0]["FirstLastName"]."\" class=\"form-control\" 
		           				placeholder=\"Last Name\" ".$vDisabled.">
		        	</div>
		      	</div>
		      	<div id=\"dSecondLastName\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Second Last Name:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"text\" name=\"txtSecondLastName\" 
		           			value=\"".$vRes[0]["SecondLastName"]."\" class=\"form-control\" 
		           				placeholder=\"Second Last Name\" ".$vDisabled.">
		        	</div>
		      	</div>
		      	<div id=\"dEmail\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">E-mail:</label>
	        		<div class=\"col-sm-9\">
	           			<input type=\"text\" id=\"txtEmail\" name=\"txtEmail\" 
       						value=\"".$vRes[0]["AEmail"]."\" class=\"form-control\" 
       							placeholder=\"E-mail\" ".$vDisabled.">
	        		</div>
	          	</div>
	          	<div id=\"dType\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Type:</label>
	        		<div class=\"col-sm-9\">
	        			<select id=\"slcType\" name=\"slcType\" class=\"form-control\" ".$vDisabled.">
	        				<option value=\"0\">Select</option>
	        				<option value=\"1\" ".$vSuper.">Super admin</option>
	        				<option value=\"2\" ".$vAdmin.">Admin</option>
	        				<option value=\"3\" ".$vIav.">IAV</option>
	        				<option value=\"4\" ".$vCustomer.">Customer</option>
	        			</select>
	        		</div>
	          	</div>
	          	<div id=\"dPassword\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Password:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"Password\" id=\"txtPassword\" name=\"txtPassword\"  
		           			value=\"".$vRes[0]["APassword"]."\" class=\"form-control\" 
		           				placeholder=\"Password\" ".$vDisabled.">
	      			</div>
      			</div>
		      	<div id=\"dConfirmPassword\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Confirm Password:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"Password\" id=\"txtConfirmPassword\" name=\"txtConfirmPassword\"
		           			value=\"".$vRes[0]["APassword"]."\" class=\"form-control\" 
		           				placeholder=\"Confirm Password\" ".$vDisabled.">
		      		</div>
	      		</div>
	      	</form> ";

		echo $vHTMLUser;

	}

	function iniciaNuevoUser(){

		$vHTMLUser = "
			<form id=\"frmUser\" class=\"form-horizontal\" role=\"form\">
	      		<div class=\"form-group\">
	          		<div class=\"col-xs-7\"></div>
          			<label class=\"col-sm-2 control-label\" >Id:</label>
		          	<div class=\"col-xs-3\">
	              		<input type=\"text\" name=\"txtUserId\"  class=\"form-control\" 
		              		value=\"0\"  placeholder=\"Usuario Id\" readonly>
		          	</div>
		      	</div>
		      	<div id=\"dName\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Name:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"text\" id=\"txtName\" name=\"txtName\" 
		           			class=\"form-control\" placeholder=\"Name\" >
		        	</div>
        	  	</div>
        	  	<div id=\"dFirstLastName\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Last Name:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"text\" id=\"txtFirstLastName\" name=\"txtFirstLastName\" 
		           			class=\"form-control\" placeholder=\"Last Name\" >
		        	</div>
		      	</div>
		      	<div id=\"dSecondLastName\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Second Last Name:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"text\" name=\"txtSecondLastName\" 
		           			class=\"form-control\" placeholder=\"Second Last Name\" >
		        	</div>
		      	</div>
		      	<div id=\"dEmail\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">E-mail:</label>
	        		<div class=\"col-sm-9\">
	           			<input type=\"text\" id=\"txtEmail\" name=\"txtEmail\" 
       						class=\"form-control\" placeholder=\"E-mail\" >
	        		</div>
	          	</div>
	          	<div id=\"dType\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Type:</label>
	        		<div class=\"col-sm-9\">
	        			<select id=\"slcType\" name=\"slcType\" class=\"form-control\">
	        				<option value=\"0\">Select</option>
	        				<option value=\"1\">Super admin</option>
	        				<option value=\"2\">Admin</option>
	        				<option value=\"3\">IAV</option>
	        				<option value=\"4\">Customer</option>
	        			</select>
	        		</div>
	          	</div>
	          	<div id=\"dPassword\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Password:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"Password\" id=\"txtPassword\" name=\"txtPassword\"  
		           			class=\"form-control\" placeholder=\"Password\" >
	      			</div>
      			</div>
		      	<div id=\"dConfirmPassword\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Confirm Password:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"Password\" id=\"txtConfirmPassword\" name=\"txtConfirmPassword\"
		           			class=\"form-control\" placeholder=\"Confirm Password\" >
		      		</div>
	      		</div>
	      	</form> ";

		echo $vHTMLUser;

	}

	function guardaUser(){

		global $vConn;

		$vQuery = "";
		$vQuery = " SELECT 
						(MAX(UserId)+1) AS ultimo
					FROM User";

		$vRes =  $vConn->ExecuteWithReturn($vQuery);
		$vUltimo = $vRes[0]["ultimo"];

		$vUserId = $_POST['txtUserId'];
		$vQuery = "";

		if($vUserId == 0){

			$vQuery = " 
				INSERT INTO User(Name,FirstLastName,SecondLastName,AEmail,ActiveAccount,
						APassword,UserIdCreated,DateCreated,UserIdLastMod,DateLastMod,Type,UserId) 
					VALUES(
						'".$_POST['txtName']."',
						'".$_POST['txtFirstLastName']."',
						'".$_POST['txtSecondLastName']."',
						'".$_POST['txtEmail']."',
						'1',
						AES_ENCRYPT( '".$_POST['txtPassword']."' ,
							(SELECT Value FROM Configuration WHERE ConfigurationId = 1)),
						'".$_SESSION["UserId"]."',
						NOW(),
						'".$_SESSION["UserId"]."',
						NOW(),
						'".$_POST['slcType']."',
						'".$vUltimo."'
					)
				";		
			
		}else{

			$vQuery = " 
				UPDATE User 
				SET
					Name = '".$_POST['txtName']."',
					FirstLastName = '".$_POST['txtFirstLastName']."',
					SecondLastName = '".$_POST['txtSecondLastName']."',
					AEmail = '".$_POST['txtEmail']."',
					APassword = CASE
									WHEN 
										( '".$_POST['txtPassword']."' = AES_DECRYPT( APassword , (SELECT Value FROM Configuration WHERE ConfigurationId = 1)) )
									THEN APassword
									ELSE AES_ENCRYPT( '".$_POST['txtPassword']."' , (SELECT Value FROM Configuration WHERE ConfigurationId = 1) ) 
								END,
					UserIdLastMod = '".$_SESSION["UserId"]."',
					DateLastMod = NOW(),
					Type = '".$_POST["slcType"]."'

				WHERE
					UserId = ".$_POST['txtUserId']." ; ";

		}

		$vRes =  $vConn->ExecuteWithoutReturn($vQuery);

		echo $vRes;

	}

	function eliminaUserPorId(){

		global $vConn;

		$vQuery = " 
				DELETE FROM User 
				WHERE
					UserId = ".$_POST['UserId']." ; ";

		echo $vConn->ExecuteWithoutReturn($vQuery);
	}

?>