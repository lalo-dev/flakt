<?php
	session_start();
	
	include_once("../01Clases/01Util/ConexionBD.php");
		
	$vConn = new ConexionBD();
	
	if(isset($_POST['acc'])){
		
		$vAcc = $_POST['acc'];
		
		switch($vAcc)
		{
			case "consulta":
					consulta();
				break;
			case "consultTotalPaginas":
					consultTotalPaginas();
				break;
			case "consultaFanPorId":
					consultaFanPorId();
				break;
			case "guardaFan":
					guardaFan();
				break;
			case "eliminaFanPorId":
					eliminaFanPorId();
				break;
			case "consultaFeatures":
					consultaFeatures();
				break;
			case "guardaFanFeature":
					guardaFanFeature();
				break;
			case "eliminaFeaturePorId":
					eliminaFeaturePorId();
				break;
		}
		
		
	}


	function consulta(){

		global $vConn;

		$vLInif = (10 * ($_POST['NoPagina'] - 1));

		$vQuery = "";
		$vQuery = " SELECT * FROM Fan ORDER BY Description ASC LIMIT ".$vLInif.",10";

		$vRes =  $vConn->ExecuteWithReturn($vQuery);

		$vHTML = "";

		foreach($vRes as $vObj){
			$vHTML .= "<tr>
								<td>".$vObj['Description']."</td>
								<td>".$vObj['Model']."</td>
                    			<td>".$vObj['Presion']."</td>
                    			<td>".$vObj['Aspa']."</td>
                    			<td>".$vObj['Arreglo']."</td>
                    			<td class=\"text-center\">                      				
									<a class=\"label label-primary btnViewFan\" 
										onclick=\"$('#hdnFanId').val('".$vObj['FanId']."')\" >
                        				<i class=\"fa fa-eye\"></i>
                      				</a>
                      				&nbsp;
                      				<a class=\"label label-primary btnActualiza\" 
                      					onclick=\"$('#hdnFanId').val('".$vObj['FanId']."')\" >
                        				<i class=\"fa fa-pencil\"></i>
                      				</a>
									&nbsp;
									<a class=\"label label-danger\" 
										onclick=\"if(confirm('Delete fan: ".$vObj['Model']." - ".$vObj['Presion']." ?')){ eliminaFan('".$vObj['FanId']."'); }\" >
										<i class=\"fa fa-times\"></i>
									</a>
                    			</td>
                  			</tr>";
		}

		echo $vHTML;

	}

	function consultaFeatures(){

		global $vConn;


		$vQuery = " SELECT * FROM FanFeature WHERE FanId = ".$_POST['FanId']." ORDER BY 'Order' ASC ";

		echo json_encode($vConn->ExecuteWithReturn($vQuery));

	}

	function consultTotalPaginas(){
		
		global $vConn;	

		$vRes =  $vConn->ExecuteWithReturn(" SELECT COUNT(FanId) AS Total FROM Fan ");

		$vElementosPorPagina = 10;
		$vTotalElementos = $vRes[0]["Total"];

		$vDivision =number_format( (float)( $vTotalElementos / $vElementosPorPagina), 1, '.', '');

		$vEntDec = explode(".",$vDivision);	

		$vTotPaginas = $vEntDec[0];

		if($vEntDec[1] > 0)
			$vTotPaginas = $vTotPaginas + 1;

		echo $vTotPaginas;

	}

	function consultaFanPorId(){

		global $vConn;

		$vQuery = "";
		$vQuery = " SELECT *
					FROM Fan 
					WHERE 
						FanId = ".$_POST['FanId']."";

		echo json_encode($vConn->ExecuteWithReturn($vQuery));

	}

	function guardaFan(){

		global $vConn;

		$vFanId = $_POST['txtFanId'];
		$vQuery = "";

		if($vFanId == 0 || $vFanId == ""){

			$vQuery = " 
				INSERT INTO Fan(Description,Model,Presion,Aspa,Arreglo,
								UserIdCreated,DateCreated,UserIdLastMod,DateLastMod) 
					VALUES(
						'".$_POST['txtDescription']."',
						'".$_POST['slcModel']."',
						'".$_POST['slcPresion']."',
						'".$_POST['slcAspa']."',
						'".$_POST['slcArreglo']."',
						'".$_SESSION["UserId"]."',
						NOW(),
						'".$_SESSION["UserId"]."',
						NOW()
					)
				";

			//Insertando fan
			$vConn->ExecuteWithoutReturn($vQuery);	
			
			//Recuperando Id
			$vQuery = " SELECT * FROM Fan ORDER BY DateCreated DESC LIMIT 0,1; ";
			$vRes =  $vConn->ExecuteWithReturn($vQuery);	

			//Insertando Caracteristicas
			$vQuery = " 
				INSERT INTO FanFeature(FanId,Section,FOrder,Description) 
					VALUES('".$vRes[0]["FanId"]."','Diameters','1','".$_POST['txtDiameters']."'),
					('".$vRes[0]["FanId"]."','Volumes','2','".$_POST['txtVolumes']."'),
					('".$vRes[0]["FanId"]."','Pressures','3','".$_POST['txtPressures']."'),
					('".$vRes[0]["FanId"]."','Impeller','4','".$_POST['txtImpeller']."'),
					('".$vRes[0]["FanId"]."','CaseStyle','5','".$_POST['txtCaseStyle']."'),
					('".$vRes[0]["FanId"]."','CaseCoating','6','".$_POST['txtCaseCoating']."'),
					('".$vRes[0]["FanId"]."','Installation','7','".$_POST['txtInstallation']."'),
					('".$vRes[0]["FanId"]."','Location','8','".$_POST['txtLocation']."'),
					('".$vRes[0]["FanId"]."','IPRating','9','".$_POST['txtIPRating']."'),
					('".$vRes[0]["FanId"]."','Temperature','10','".$_POST['txtTemperature']."'),
					('".$vRes[0]["FanId"]."','Emergency','11','".$_POST['txtEmergency']."');
				";

			$vResF = $vConn->ExecuteWithoutReturn($vQuery);

			echo $vResF;
			
		}else{

			$vQuery = " 
				UPDATE Fan 
				SET
					Description = '".$_POST['txtDescription']."',
					Model = '".$_POST['slcModel']."',
					Presion = '".$_POST['slcPresion']."',
					Aspa = '".$_POST['slcAspa']."',
					Arreglo = '".$_POST['slcArreglo']."',
					UserIdLastMod = '".$_SESSION["UserId"]."',
					DateLastMod = NOW()

				WHERE
					FanId = ".$_POST['txtFanId']." ; ";
			
			$vResF = $vConn->ExecuteWithoutReturn($vQuery);

			$vQuery = " 
				UPDATE FanFeature 
				SET
					Description = '".$_POST['txtDiameters']."'
				WHERE
					FanId = ".$_POST['txtFanId']."
					AND FOrder = 1 ; ";

			$vResF = $vConn->ExecuteWithoutReturn($vQuery);

			$vQuery = " 
				UPDATE FanFeature 
				SET
					Description = '".$_POST['txtVolumes']."'
				WHERE
					FanId = ".$_POST['txtFanId']."
					AND FOrder = 2 ; ";
			
			$vResF = $vConn->ExecuteWithoutReturn($vQuery);

			$vQuery = " 
				UPDATE FanFeature 
				SET
					Description = '".$_POST['txtPressures']."'
				WHERE
					FanId = ".$_POST['txtFanId']."
					AND FOrder = 3 ; ";

			$vResF = $vConn->ExecuteWithoutReturn($vQuery);

			$vQuery = " 
				UPDATE FanFeature 
				SET
					Description = '".$_POST['txtImpeller']."'
				WHERE
					FanId = ".$_POST['txtFanId']."
					AND FOrder = 4 ; ";

			$vResF = $vConn->ExecuteWithoutReturn($vQuery);

			$vQuery = " 
				UPDATE FanFeature 
				SET
					Description = '".$_POST['txtCaseStyle']."'
				WHERE
					FanId = ".$_POST['txtFanId']."
					AND FOrder = 5 ; ";

			$vResF = $vConn->ExecuteWithoutReturn($vQuery);

			$vQuery = " 
				UPDATE FanFeature 
				SET
					Description = '".$_POST['txtCaseCoating']."'
				WHERE
					FanId = ".$_POST['txtFanId']."
					AND FOrder = 6 ; ";

			$vResF = $vConn->ExecuteWithoutReturn($vQuery);

			$vQuery = " 
				UPDATE FanFeature 
				SET
					Description = '".$_POST['txtInstallation']."'
				WHERE
					FanId = ".$_POST['txtFanId']."
					AND FOrder = 7 ; ";

			$vResF = $vConn->ExecuteWithoutReturn($vQuery);

			$vQuery = " 
				UPDATE FanFeature 
				SET
					Description = '".$_POST['txtLocation']."'
				WHERE
					FanId = ".$_POST['txtFanId']."
					AND FOrder = 8 ; ";

			$vResF = $vConn->ExecuteWithoutReturn($vQuery);

			$vQuery = " 
				UPDATE FanFeature 
				SET
					Description = '".$_POST['txtIPRating']."'
				WHERE
					FanId = ".$_POST['txtFanId']."
					AND FOrder = 9 ; ";

			$vResF = $vConn->ExecuteWithoutReturn($vQuery);

			$vQuery = " 
				UPDATE FanFeature 
				SET
					Description = '".$_POST['txtTemperature']."'
				WHERE
					FanId = ".$_POST['txtFanId']."
					AND FOrder = 10 ; ";

			$vResF = $vConn->ExecuteWithoutReturn($vQuery);
			
			$vQuery = " 
				UPDATE FanFeature 
				SET
					Description = '".$_POST['txtEmergency']."'
				WHERE
					FanId = ".$_POST['txtFanId']."
					AND FOrder = 11 ; ";


			$vResF = $vConn->ExecuteWithoutReturn($vQuery);

			echo $vResF;

		}
	

		

	}


	function eliminaFanPorId(){

		global $vConn;

		$vQuery = " 
				DELETE FROM Fan 
				WHERE
					FanId = ".$_POST['FanId']." ; ";

		$vConn->ExecuteWithoutReturn($vQuery);

		$vQuery = " 
				DELETE FROM FanFeature
				WHERE
					FanId = ".$_POST['FanId']." ; ";

		echo $vConn->ExecuteWithoutReturn($vQuery);
	}


?>