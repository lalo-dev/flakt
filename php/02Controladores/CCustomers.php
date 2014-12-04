<?php
	session_start();
	
	include_once("../01Clases/01Util/ConexionBD.php");
		
	$vConn = new ConexionBD();
	
	if(isset($_POST['acc'])){
		
		$vAcc = $_POST['acc'];
		
		switch($vAcc)
		{
			case "consultaCustomers":
					consultaCustomers();
				break;
			case "consultTotalPaginas":
					consultTotalPaginas();
				break;
			case "consultaCustomerPorId":
					consultaCustomerPorId();
				break;
			case "guardaCustomer":
					guardaCustomer();
				break;
			case "iniciaNuevoCustomer":
					iniciaNuevoCustomer();
				break;
			case "eliminaCustomerPorId":
					eliminaCustomerPorId();
				break;
			case "consultaCustomerContactsPorCustomerId":
					consultaCustomerContactsPorCustomerId();
				break;
			case "iniciaNuevoContact":
					iniciaNuevoContact();
				break;
			case "eliminaCustomerContactPorId":
					eliminaCustomerContactPorId();
				break;
			case  "guardaContact":
					guardaContact();
				break;
			case "consultaCustomerContactPorId":
					consultaCustomerContactPorId();
				break;
				
		}
		
		
	}


	function consultaCustomers(){

		global $vConn;

		$vLInif = (10 * ($_POST['NoPagina'] - 1));

		$vQuery = "";
		$vQuery = " SELECT * FROM Customer ORDER BY Name ASC LIMIT ".$vLInif.",10";

		$vRes =  $vConn->ExecuteWithReturn($vQuery);

		$vHTMLUSers = "";

		foreach($vRes as $vCustomer){
			$vHTMLUSers .= "<tr>
								<td>".$vCustomer['Name']."</td>
                    			<td>".$vCustomer['Description']."</td>
                    			<td>".$vCustomer['RFC']."</td>
                    			<td class=\"text-center\" >
                    				<a class=\"label label-primary btnContacts\" 
										onclick=\"$('#hdnCustomerId').val('".$vCustomer['CustomerId']."')\" >
                        				<i class=\"fa fa-user\"></i>
                      				</a>
                    			</td>
                    			<td class=\"text-center\">                      				
									<a class=\"label label-primary btnView\" 
										onclick=\"$('#hdnCustomerId').val('".$vCustomer['CustomerId']."')\" >
                        				<i class=\"fa fa-eye\"></i>
                      				</a>
                      				&nbsp;
                      				<a class=\"label label-primary btnActualiza\" 
                      					onclick=\"$('#hdnCustomerId').val('".$vCustomer['CustomerId']."')\" >
                        				<i class=\"fa fa-pencil\"></i>
                      				</a>
									&nbsp;
									<a class=\"label label-danger\" 
										onclick=\"if(confirm('Delete customer: ".$vCustomer['Name']."?')){ eliminaCustomer('".$vCustomer['CustomerId']."'); }\" >
										<i class=\"fa fa-times\"></i>
									</a>
                    			</td>
                  			</tr>";
		}

		echo $vHTMLUSers;

	}

	function consultTotalPaginas(){
		
		global $vConn;	

		$vRes =  $vConn->ExecuteWithReturn(" SELECT COUNT(CustomerId) AS Total FROM Customer ");

		$vElementosPorPagina = 10;
		$vTotalElementos = $vRes[0]["Total"];

		$vDivision =number_format( (float)( $vTotalElementos / $vElementosPorPagina), 1, '.', '');

		$vEntDec = explode(".",$vDivision);	

		$vTotPaginas = $vEntDec[0];

		if($vEntDec[1] > 0)
			$vTotPaginas = $vTotPaginas + 1;

		echo $vTotPaginas;

	}

	function consultaCustomerPorId(){

		global $vConn;

		$vQuery = "";
		$vQuery = " SELECT *
					FROM Customer
					WHERE 
						CustomerId = ".$_POST['CustomerId']."";

		$vRes =  $vConn->ExecuteWithReturn($vQuery);

		$vEsEdicion = $_POST['esEdicion'];

		$vDisabled = "";

		if($vEsEdicion == 0)
			$vDisabled = "disabled";

		$vHTMLUser = "
			<form id=\"frmCustomer\" class=\"form-horizontal\" role=\"form\">
	      		<div class=\"form-group\">
	          		<div class=\"col-xs-7\"></div>
          			<label class=\"col-sm-2 control-label\" >Id:</label>
		          	<div class=\"col-xs-3\">
	              		<input type=\"text\" name=\"txtCustomerId\"  
	              			value=\"".$vRes[0]["CustomerId"]."\" class=\"form-control\" 
		              		  placeholder=\"Customer Id\" readonly>
		          	</div>
		      	</div>
		      	<div id=\"dName\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Name:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"text\" id=\"txtName\" name=\"txtName\" 
		           			value=\"".$vRes[0]["Name"]."\" class=\"form-control\" 
		           				placeholder=\"Name\" ".$vDisabled.">
		        	</div>
        	  	</div>
        	  	<div id=\"dDescription\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Description:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"text\" id=\"txtDescription\" name=\"txtDescription\" maxlength=\"150\" 
		           			value=\"".$vRes[0]["Description"]."\" class=\"form-control\" 
		           				placeholder=\"Description\" ".$vDisabled.">
		        	</div>
		      	</div>
		      	<div id=\"dRFC\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">RFC:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"text\" id=\"txtRFC\" name=\"txtRFC\" maxlength=\"15\"
		           			value=\"".$vRes[0]["RFC"]."\" class=\"form-control\" 
		           				placeholder=\"RFC\" ".$vDisabled.">
		        	</div>
		      	</div>
	      	</form>";

		echo $vHTMLUser;

	}

	function iniciaNuevoCustomer(){

		$vHTMLUser = "
			<form id=\"frmCustomer\" class=\"form-horizontal\" role=\"form\">
	      		<div class=\"form-group\">
	          		<div class=\"col-xs-7\"></div>
          			<label class=\"col-sm-2 control-label\" >Id:</label>
		          	<div class=\"col-xs-3\">
	              		<input type=\"text\" name=\"txtCustomerId\"  class=\"form-control\" 
		              		value=\"0\"  placeholder=\"Customer Id\" readonly>
		          	</div>
		      	</div>
		      	<div id=\"dName\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Name:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"text\" id=\"txtName\" name=\"txtName\" 
		           			class=\"form-control\" placeholder=\"Name\" >
		        	</div>
        	  	</div>
        	  	<div id=\"dDescription\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Description:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"text\" id=\"txtDescription\" name=\"txtDescription\" maxlength=\"150\"  
		           			class=\"form-control\" placeholder=\"Description\" >
		        	</div>
		      	</div>
		      	<div id=\"dRFC\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">RFC:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"text\" id=\"txtRFC\" name=\"txtRFC\" maxlength=\"15\" 
		           			class=\"form-control\" placeholder=\"Contact Name\" >
		        	</div>
		      	</div>
	      	</form> ";

		echo $vHTMLUser;

	}

	function guardaCustomer(){

		global $vConn;

		$vCustomerId = $_POST['txtCustomerId'];
		$vQuery = "";

		if($vCustomerId == 0){

			$vQuery = " 
				INSERT INTO Customer(Name,Description,RFC,UserIdCreated,DateCreated,UserIdLastMod,DateLastMod) 
					VALUES(
						'".$_POST["txtName"]."',
						'".$_POST["txtDescription"]."',
						'".$_POST["txtRFC"]."',
						'".$_SESSION["UserId"]."',
						NOW(),
						'".$_SESSION["UserId"]."',
						NOW()
					)
				";		
			
		}else{

			$vQuery = " 
				UPDATE Customer 
				SET
					Name = '".$_POST['txtName']."',
					Description = '".$_POST['txtDescription']."',
					RFC = '".$_POST['txtRFC']."',
					UserIdLastMod = '".$_SESSION["UserId"]."',
					DateLastMod = NOW()

				WHERE
					CustomerId = ".$_POST['txtCustomerId']." ; ";

		}

		$vRes =  $vConn->ExecuteWithoutReturn($vQuery);

		echo $vRes;

	}

	function eliminaCustomerPorId(){

		global $vConn;

		$vQuery = " 
				DELETE FROM Customer 
				WHERE
					CustomerId = ".$_POST['CustomerId']." ; ";

		echo $vConn->ExecuteWithoutReturn($vQuery);
	}

	function consultaCustomerContactsPorCustomerId(){

		global $vConn;

		$vQuery = " SELECT * 
					FROM CustomerContact 
					WHERE CustomerId = ".$_POST['CustomerId']." 
					ORDER BY Name ASC ";

		$vRes =  $vConn->ExecuteWithReturn($vQuery);

		$vHTML = "";

		foreach($vRes as $vContact){
			$vHTML .= "<tr>
								<td>".$vContact['Name']."</td>
								<td>".$vContact['Email']."</td>
								<td>".$vContact['Phone']."</td>
                    			<td class=\"text-center\">     
                      				<a class=\"label label-primary \" 
                      					onclick=\"iniciaActualizaContact('".$vContact['CustomerContactId']."')\" >
                        				<i class=\"fa fa-pencil\"></i>
                      				</a>
									&nbsp;
									<a class=\"label label-danger\" 
										onclick=\"if(confirm('Delete customer: ".$vContact['Name']."?')){ eliminaCustomerContact('".$vContact['CustomerContactId']."'); }\" >
										<i class=\"fa fa-times\"></i>
									</a>
                    			</td>
                  			</tr>";
		}

		echo $vHTML;
	}

	function iniciaNuevoContact(){

		$vHTMLUser = "
			<form id=\"frmContact\" class=\"form-horizontal\" role=\"form\">
	      		<div class=\"form-group\">
	          		<div class=\"col-xs-7\"></div>
          			<label class=\"col-sm-2 control-label\" >Id:</label>
		          	<div class=\"col-xs-3\">
	              		<input type=\"text\" name=\"txtContactId\"  class=\"form-control\" 
		              		value=\"0\"  placeholder=\"Customer Id\" readonly>
		          	</div>
		      	</div>
		      	<div id=\"dName\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Name:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"text\" id=\"txtName\" name=\"txtName\" 
		           			class=\"form-control\" placeholder=\"Name\" >
		        	</div>
        	  	</div>
		      	<div id=\"dEmail\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">E-mail:</label>
	        		<div class=\"col-sm-9\">
	           			<input type=\"text\" id=\"txtEmail\" name=\"txtEmail\" 
       						class=\"form-control\" placeholder=\"E-mail\" >
	        		</div>
	          	</div>
        	  	<div id=\"dPhone\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Phone:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"text\" id=\"txtPhone\" name=\"txtPhone\" 
		           			class=\"form-control\" placeholder=\"Phone\" >
		        	</div>
		      	</div>
	      	</form> ";

		echo $vHTMLUser;

	}

	function eliminaCustomerContactPorId(){

		global $vConn;

		$vQuery = " 
				DELETE FROM CustomerContact
				WHERE
					CustomerContactId = ".$_POST['CustomerContactId']." ; ";

		echo $vConn->ExecuteWithoutReturn($vQuery);
	}

	function guardaContact(){

		global $vConn;

		$vCustomerContactId = $_POST['txtContactId'];
		$vCustomerId = $_POST['CustomerId'];
		
		$vQuery = "";

		if($vCustomerContactId == 0){

			$vQuery = " 
				INSERT INTO CustomerContact(CustomerId,Name,Email,Phone) 
					VALUES(
						'".$vCustomerId."',
						'".$_POST["txtName"]."',
						'".$_POST["txtEmail"]."',
						'".$_POST["txtPhone"]."'
					)
				";		
			
		}else{

			$vQuery = " 
				UPDATE CustomerContact 
				SET
					Name = '".$_POST['txtName']."',
					Email = '".$_POST["txtEmail"]."',
					Phone = '".$_POST["txtPhone"]."'

				WHERE
					CustomerContactId = ".$vCustomerContactId." ; ";

		}

		$vRes =  $vConn->ExecuteWithoutReturn($vQuery);

		echo $vRes;

	}

function consultaCustomerContactPorId(){

		global $vConn;

		$vQuery = "";
		$vQuery = " SELECT *
					FROM CustomerContact
					WHERE 
						CustomerContactId = ".$_POST['CustomerContactId']."";

		$vRes =  $vConn->ExecuteWithReturn($vQuery);

		$vEsEdicion = $_POST['esEdicion'];

		$vDisabled = "";

		if($vEsEdicion == 0)
			$vDisabled = "disabled";

		$vHTML = "

			<form id=\"frmContact\" class=\"form-horizontal\" role=\"form\">
	      		<div class=\"form-group\">
	          		<div class=\"col-xs-7\"></div>
          			<label class=\"col-sm-2 control-label\" >Id:</label>
		          	<div class=\"col-xs-3\">
	              		<input type=\"text\" id=\"txtContactId\" name=\"txtContactId\"  class=\"form-control\" 
		              		value=\"".$_POST['CustomerContactId']."\"  placeholder=\"Customer Id\" readonly>
		          	</div>
		      	</div>
		      	<div id=\"dName\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Name:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"text\" id=\"txtName\" name=\"txtName\" 
		           			value=\"".$vRes[0]["Name"]."\" class=\"form-control\" 
		           				placeholder=\"Name\" >
		        	</div>
        	  	</div>
		      	<div id=\"dEmail\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">E-mail:</label>
	        		<div class=\"col-sm-9\">
	           			<input type=\"text\" id=\"txtEmail\" name=\"txtEmail\" 
       						value=\"".$vRes[0]["Email"]."\" class=\"form-control\" 
       							placeholder=\"E-mail\" >
	        		</div>
	          	</div>
        	  	<div id=\"dPhone\" class=\"form-group\">
		        	<label class=\"col-sm-3 control-label\">Phone:</label>
		        	<div class=\"col-sm-9\">
		           		<input type=\"text\" id=\"txtPhone\" name=\"txtPhone\" 
		           			value=\"".$vRes[0]["Phone"]."\" class=\"form-control\" 
		           				placeholder=\"Phone\" >
		        	</div>
		      	</div>
	      	</form>";

		echo $vHTML;

	}

?>