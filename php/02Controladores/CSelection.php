<?php
	session_start();
	
	include("../01Clases/01Util/ConexionBD.php");
		
	$vConn = new ConexionBD();
	
	if(isset($_POST['acc'])){
		
		$vAcc = $_POST['acc'];
		
		switch($vAcc)
		{
			case "iniciaSeleccion":
					iniciaSeleccion();
				break;
			case "obtenerSlcCustomer":
					obtenerSlcCustomer();
				break;
			case "obtenerSlcContactPorCustomerId":
					obtenerSlcContactPorCustomerId($_POST['CustomerId']);
				break;
			case "actualizaSelection":
					actualizaSelection();
				break;
			case "consolidaSelection":
					consolidaSelection();
				break;
		}
		
		
	}

	function iniciaSeleccion(){

		global $vConn;
		
		/* Verificando si el usuario tiene selecciones sin terminar*/
		$vQuery = " SELECT COUNT(SelectionId) AS SinTerminar
					FROM Selection 
					WHERE
						UserIdCreator = ".$_SESSION["UserId"]."
						AND Finished = false; ";

		$vRes =  $vConn->ExecuteWithReturn($vQuery);

		//Si no hay Selection por terminar insertar una nueva
		if($vRes[0]["SinTerminar"] == 0){

			/*Insertando Selection valores predeterminados*/
			$vQuery = " 
						INSERT INTO Selection
							( 
								SelectionId,
								SelectionDate,
								Seller,
								Reference,
								NoProposal,
								UserIdCreator,
								DateCreated
							)VALUES(
								0,
								NOW(),
								'FLAKT México',
								'ME-021',
								'1021 KORM',
								".$_SESSION["UserId"].",
								NOW()
							);
					";

			$vConn->ExecuteWithoutReturn($vQuery);
		}

		$vQuery = " SELECT * FROM Selection ORDER BY SelectionDate DESC LIMIT 0,1; ";
		$vRes =  $vConn->ExecuteWithReturn($vQuery);

		

		/*Formando JSON Respuesta segun Selection*/
		$vSeleccion = json_encode(array(
						"valX" => 4,
					    "Secc1" => array(
							"SelectionId"       => $vRes[0]["SelectionId"],
							"SelectionDate"     => date("d/m/Y", strtotime($vRes[0]["SelectionDate"])),
							"Seller"            => $vRes[0]["Seller"],
							"CustomerId"        => $vRes[0]["CustomerId"],
							"Reference"         => $vRes[0]["Reference"],
							"NoProposal"        => $vRes[0]["NoProposal"],
							"CustomerContactId" => $vRes[0]["CustomerContactId"]
					     ),
				    	"Secc2" => array(
					        "Unit" => $vRes[0]["Unit"]
					    ),
				    	"Secc3" => array(
					        "Filters" => array(
								"OutletVelocityMax" => $vRes[0]["OutletVelocityMax"],
								"OutletVelocityMin" => $vRes[0]["OutletVelocityMin"],
								"SoundMax"          => $vRes[0]["SoundMax"],
								"SoundMin"          => $vRes[0]["SoundMin"],
								"EfficiencyMax"     => $vRes[0]["EfficiencyMax"],
								"EfficiencyMin"     => $vRes[0]["EfficiencyMin"],
								"DiameterMax"       => $vRes[0]["DiameterMax"],
								"DiameterMin"       => $vRes[0]["DiameterMin"]
					     	),
					     	"AirConditions" => array(
								"DensityStandar"       => $vRes[0]["DensityStandar"],
								"DensityOperation"     => $vRes[0]["DensityOperation"],
								"TemperatureStandar"   => $vRes[0]["TemperatureStandar"],
								"TemperatureOperation" => $vRes[0]["TemperatureOperation"],
								"AltitudeStandar"      => $vRes[0]["AltitudeStandar"],					        	
								"AltitudeOperation"    => $vRes[0]["AltitudeOperation"],
								"DampStandar"          => $vRes[0]["DampStandar"],
								"DampOperation"        => $vRes[0]["DampOperation"],
								"PressureStandar"      => $vRes[0]["PressureStandar"],
								"PressureOperation"    => $vRes[0]["PressureOperation"],
								"WetbulbtempStandar"   => $vRes[0]["WetbulbtempStandar"],
								"WetbulbtempOperation" => $vRes[0]["WetbulbtempOperation"],
								"DrybulbtempStandar"   => $vRes[0]["DrybulbtempStandar"],
								"DrybulbtempOperation" => $vRes[0]["DrybulbtempOperation"]
					     	),
					     	"MotorOptions" => array(
								"SpeedControlType" => $vRes[0]["SpeedControlType"],
								"Enclosure"        => $vRes[0]["Enclosure"],
								"Supply"           => $vRes[0]["Supply"],
								"Supply1"          => $vRes[0]["Supply1"],
								"Supply2"          => $vRes[0]["Supply2"],
								"ServiceFactor"    => $vRes[0]["ServiceFactor"]
					     	),
					     	"Accessories" => array(
								"IvcIn_1"       => $vRes[0]["IvcIn_1"],
								"IvcOut_1"      => $vRes[0]["IvcOut_1"],
								"DmbgIn_1"      => $vRes[0]["DmbgIn_1"],
								"DmbgOut_1"     => $vRes[0]["DmbgOut_1"],
								"FlexibleIn_1"  => $vRes[0]["FlexibleIn_1"],
								"FlexibleOut_1" => $vRes[0]["FlexibleOut_1"],
								"ScreenIn_1"    => $vRes[0]["ScreenIn_1"],
								"ScreenOut_1"   => $vRes[0]["ScreenOut_1"],
								"DamperIn_1"    => $vRes[0]["DamperIn_1"],
								"DamperOut_1"   => $vRes[0]["DamperOut_1"],
								"DiffusorIn_1"  => $vRes[0]["DiffusorIn_1"],
								"DiffusorOut_1" => $vRes[0]["DiffusorOut_1"],
								"LouverIn_1"    => $vRes[0]["LouverIn_1"],
								"LouverOut_1"   => $vRes[0]["LouverOut_1"],
								"SilencerIn_1"  => $vRes[0]["SilencerIn_1"],
								"SilencerOut_1" => $vRes[0]["SilencerOut_1"],
								"InletBoxIn_1"  => $vRes[0]["InletBoxIn_1"],
								"InletBoxOut_1" => $vRes[0]["InletBoxOut_1"]
					     	)
					    ),
						"Secc4" => array(
							"BladeType"           => $vRes[0]["BladeType"],
							"FanArragment"        => $vRes[0]["FanArragment"],
							"AmbientPressure"     => $vRes[0]["AmbientPressure"],
							"AmbientPressureUnit" => $vRes[0]["AmbientPressureUnit"],
							"DefinitionIn"        => $vRes[0]["DefinitionIn"],
							"DefinitionOut"       => $vRes[0]["DefinitionOut"],
							"Connectionmav"       => $vRes[0]["Connectionmav"],
							"ConnectionmavUnit"   => $vRes[0]["ConnectionmavUnit"],
							"ConnectionmavYn"     => $vRes[0]["ConnectionmavYn"],
							"Motor"               => $vRes[0]["Motor"],
							"SpDistance"          => $vRes[0]["SpDistance"],
							"SpMaxSound"          => $vRes[0]["SpMaxSound"]
						)
					));

		$_SESSION["Selection"] = $vSeleccion;

		echo $vSeleccion;
		
	}	

	function actualizaSelection(){

		global $vConn;

		/*Obteniendo Selection actual de la sesion*/
		$vSeleccion = json_decode($_SESSION["Selection"]);
		
		/* Actualizando Selection */
		$vQuery = " UPDATE Selection 
					SET
						CustomerId           = ".$vSeleccion->Secc1->CustomerId.",
						Reference            = '".$vSeleccion->Secc1->Reference."',
						NoProposal           = '".$vSeleccion->Secc1->NoProposal."',
						CustomerContactId    = ".$vSeleccion->Secc1->CustomerContactId.",
						Unit                 = '".$vSeleccion->Secc2->Unit."',
						OutletVelocityMax    = '".$vSeleccion->Secc3->Filters->OutletVelocityMax."',
						OutletVelocityMin    = '".$vSeleccion->Secc3->Filters->OutletVelocityMax."',
						SoundMax             = '".$vSeleccion->Secc3->Filters->SoundMax."',
						SoundMin             = '".$vSeleccion->Secc3->Filters->SoundMin."',
						EfficiencyMax        = '".$vSeleccion->Secc3->Filters->EfficiencyMax."',
						EfficiencyMin        = '".$vSeleccion->Secc3->Filters->EfficiencyMin."',
						DiameterMax          = '".$vSeleccion->Secc3->Filters->DiameterMax."',
						DiameterMin          = '".$vSeleccion->Secc3->Filters->DiameterMin."',
						DensityStandar       = '".$vSeleccion->Secc3->AirConditions->DensityStandar."',
						DensityOperation     = '".$vSeleccion->Secc3->AirConditions->DensityOperation."',
						TemperatureStandar   = '".$vSeleccion->Secc3->AirConditions->TemperatureStandar."',
						TemperatureOperation = '".$vSeleccion->Secc3->AirConditions->TemperatureOperation."',
						AltitudeStandar      = '".$vSeleccion->Secc3->AirConditions->AltitudeStandar."',
						AltitudeOperation    = '".$vSeleccion->Secc3->AirConditions->AltitudeOperation."',
						DampStandar          = '".$vSeleccion->Secc3->AirConditions->DampStandar."',
						DampOperation        = '".$vSeleccion->Secc3->AirConditions->DampOperation."',
						PressureStandar      = '".$vSeleccion->Secc3->AirConditions->PressureStandar."',
						PressureOperation    = '".$vSeleccion->Secc3->AirConditions->PressureOperation."',
						WetbulbtempStandar   = '".$vSeleccion->Secc3->AirConditions->WetbulbtempStandar."',
						WetbulbtempOperation = '".$vSeleccion->Secc3->AirConditions->WetbulbtempOperation."',
						DrybulbtempStandar   = '".$vSeleccion->Secc3->AirConditions->DrybulbtempStandar."',
						DrybulbtempOperation = '".$vSeleccion->Secc3->AirConditions->DrybulbtempOperation."',
						SpeedControlType     = '".$vSeleccion->Secc3->MotorOptions->SpeedControlType."',
						Enclosure            = '".$vSeleccion->Secc3->MotorOptions->Enclosure."',
						Supply               = '".$vSeleccion->Secc3->MotorOptions->Supply."',
						Supply1              = '".$vSeleccion->Secc3->MotorOptions->Supply1."',
						Supply2              = '".$vSeleccion->Secc3->MotorOptions->Supply2."',
						ServiceFactor        = '".$vSeleccion->Secc3->MotorOptions->ServiceFactor."',
						IvcIn_1              = '".$vSeleccion->Secc3->Accessories->IvcIn_1."',
						IvcOut_1             = '".$vSeleccion->Secc3->Accessories->IvcOut_1."',
						DmbgIn_1             = '".$vSeleccion->Secc3->Accessories->DmbgIn_1."',
						DmbgOut_1            = '".$vSeleccion->Secc3->Accessories->DmbgOut_1."',
						FlexibleIn_1         = '".$vSeleccion->Secc3->Accessories->FlexibleIn_1."',
						FlexibleOut_1        = '".$vSeleccion->Secc3->Accessories->FlexibleOut_1."',
						ScreenIn_1           = '".$vSeleccion->Secc3->Accessories->ScreenIn_1."',
						ScreenOut_1          = '".$vSeleccion->Secc3->Accessories->ScreenOut_1."',
						DamperIn_1           = '".$vSeleccion->Secc3->Accessories->DamperIn_1."',
						DamperOut_1          = '".$vSeleccion->Secc3->Accessories->DamperOut_1."',
						DiffusorIn_1         = '".$vSeleccion->Secc3->Accessories->DiffusorIn_1."',
						DiffusorOut_1        = '".$vSeleccion->Secc3->Accessories->DiffusorOut_1."',
						LouverIn_1           = '".$vSeleccion->Secc3->Accessories->LouverIn_1."',
						LouverOut_1          = '".$vSeleccion->Secc3->Accessories->LouverOut_1."',
						SilencerIn_1         = '".$vSeleccion->Secc3->Accessories->SilencerIn_1."',
						SilencerOut_1        = '".$vSeleccion->Secc3->Accessories->SilencerOut_1."',
						InletBoxIn_1         = '".$vSeleccion->Secc3->Accessories->InletBoxIn_1."',
						InletBoxOut_1        = '".$vSeleccion->Secc3->Accessories->InletBoxOut_1."',
						BladeType            = '".$vSeleccion->Secc4->BladeType."',
						FanArragment         = '".$vSeleccion->Secc4->FanArragment."',
						AmbientPressure      = '".$vSeleccion->Secc4->AmbientPressure."',
						AmbientPressureUnit  = '".$vSeleccion->Secc4->AmbientPressureUnit."',
						DefinitionIn         = '".$vSeleccion->Secc4->DefinitionIn."',
						DefinitionOut        = '".$vSeleccion->Secc4->DefinitionOut."',
						Connectionmav        = '".$vSeleccion->Secc4->Connectionmav."',
						ConnectionmavUnit    = '".$vSeleccion->Secc4->ConnectionmavUnit."',
						ConnectionmavYn      = '".$vSeleccion->Secc4->ConnectionmavYn."',
						Motor                = '".$vSeleccion->Secc4->Motor."',
						SpDistance           = '".$vSeleccion->Secc4->SpDistance."',
						SpMaxSound           = '".$vSeleccion->Secc4->SpMaxSound."'
					WHERE
						SelectionId = ".$vSeleccion->Secc1->SelectionId." ; ";

		$vRes =  $vConn->ExecuteWithoutReturn($vQuery);

	}

	function obtenerSlcCustomer(){

		global $vConn;

		$vQuery = "";
		$vQuery = " SELECT * FROM Customer ORDER BY Name ASC";

		$vRes =  $vConn->ExecuteWithReturn($vQuery);

		$vSlcCustomer = "<option value=\"\">Select</option>";

		foreach($vRes as $vCat){
			$vSlcCustomer .= "<option value=\"".$vCat['CustomerId']."\">".$vCat['Name']."</option>";
		}

		echo $vSlcCustomer;

	}

	function obtenerSlcContactPorCustomerId($customerId){

		global $vConn;

		$vQuery = "";
		$vQuery = " SELECT * 
					FROM CustomerContact 
					WHERE CustomerId = ".$customerId." 
					ORDER BY Name ASC ";

		$vRes =  $vConn->ExecuteWithReturn($vQuery);

		$vSlcCustContact = "<option value=\"\">Select</option>";

		foreach($vRes as $vCat){
			$vSlcCustContact .= 
				"<option value=\"".$vCat['CustomerContactId']."\">"
					.$vCat['Name']." - ".$vCat['Email']."</option>";
		}

		echo $vSlcCustContact;

	}

	function consolidaSelection(){

		/* Obteniendo valores de la sesion */
		$vSelSesion = json_decode($_SESSION["Selection"]);
		/* Obteniendo valores a consolidar*/
		$vSelActual = json_decode($_POST["selection"]);

		$vSelSesion->Secc1->CustomerId        = $vSelActual->Secc1->CustomerId;
		$vSelSesion->Secc1->Reference         = $vSelActual->Secc1->Reference;
		$vSelSesion->Secc1->NoProposal        = $vSelActual->Secc1->NoProposal;
		$vSelSesion->Secc1->CustomerContactId = $vSelActual->Secc1->CustomerContactId;

		$vSelSesion->Secc2->Unit = $vSelActual->Secc2->Unit;

		$vSelSesion->Secc3->Filters->OutletVelocityMax = $vSelActual->Secc3->Filters->OutletVelocityMax;
		$vSelSesion->Secc3->Filters->OutletVelocityMin = $vSelActual->Secc3->Filters->OutletVelocityMin;
		$vSelSesion->Secc3->Filters->SoundMax          = $vSelActual->Secc3->Filters->SoundMax;
		$vSelSesion->Secc3->Filters->SoundMin          = $vSelActual->Secc3->Filters->SoundMin;
		$vSelSesion->Secc3->Filters->EfficiencyMax     = $vSelActual->Secc3->Filters->EfficiencyMax;
		$vSelSesion->Secc3->Filters->EfficiencyMin     = $vSelActual->Secc3->Filters->EfficiencyMin;
		$vSelSesion->Secc3->Filters->DiameterMax       = $vSelActual->Secc3->Filters->DiameterMax;
		$vSelSesion->Secc3->Filters->DiameterMin       = $vSelActual->Secc3->Filters->DiameterMin;

		$vSelSesion->Secc3->AirConditions->DensityStandar       = $vSelActual->Secc3->AirConditions->DensityStandar;
		$vSelSesion->Secc3->AirConditions->DensityOperation     = $vSelActual->Secc3->AirConditions->DensityOperation;
		$vSelSesion->Secc3->AirConditions->TemperatureStandar   = $vSelActual->Secc3->AirConditions->TemperatureStandar;
		$vSelSesion->Secc3->AirConditions->TemperatureOperation = $vSelActual->Secc3->AirConditions->TemperatureOperation;
		$vSelSesion->Secc3->AirConditions->AltitudeStandar      = $vSelActual->Secc3->AirConditions->AltitudeStandar;
		$vSelSesion->Secc3->AirConditions->AltitudeOperation    = $vSelActual->Secc3->AirConditions->AltitudeOperation;
		$vSelSesion->Secc3->AirConditions->DampStandar          = $vSelActual->Secc3->AirConditions->DampStandar;
		$vSelSesion->Secc3->AirConditions->DampOperation        = $vSelActual->Secc3->AirConditions->DampOperation;
		$vSelSesion->Secc3->AirConditions->PressureStandar      = $vSelActual->Secc3->AirConditions->PressureStandar;
		$vSelSesion->Secc3->AirConditions->PressureOperation    = $vSelActual->Secc3->AirConditions->PressureOperation;
		$vSelSesion->Secc3->AirConditions->WetbulbtempStandar   = $vSelActual->Secc3->AirConditions->WetbulbtempStandar;
		$vSelSesion->Secc3->AirConditions->WetbulbtempOperation = $vSelActual->Secc3->AirConditions->WetbulbtempOperation;
		$vSelSesion->Secc3->AirConditions->DrybulbtempStandar   = $vSelActual->Secc3->AirConditions->DrybulbtempStandar;
		$vSelSesion->Secc3->AirConditions->DrybulbtempOperation = $vSelActual->Secc3->AirConditions->DrybulbtempOperation;

		$vSelSesion->Secc3->MotorOptions->SpeedControlType = $vSelActual->Secc3->MotorOptions->SpeedControlType;
		$vSelSesion->Secc3->MotorOptions->Enclosure        = $vSelActual->Secc3->MotorOptions->Enclosure;
		$vSelSesion->Secc3->MotorOptions->Supply           = $vSelActual->Secc3->MotorOptions->Supply;
		$vSelSesion->Secc3->MotorOptions->Supply1          = $vSelActual->Secc3->MotorOptions->Supply1;
		$vSelSesion->Secc3->MotorOptions->Supply2          = $vSelActual->Secc3->MotorOptions->Supply2;
		$vSelSesion->Secc3->MotorOptions->ServiceFactor    = $vSelActual->Secc3->MotorOptions->ServiceFactor;

		$vSelSesion->Secc3->Accessories->IvcIn_1       = $vSelActual->Secc3->Accessories->IvcIn_1;
		$vSelSesion->Secc3->Accessories->IvcOut_1      = $vSelActual->Secc3->Accessories->IvcOut_1;
		$vSelSesion->Secc3->Accessories->DmbgIn_1      = $vSelActual->Secc3->Accessories->DmbgIn_1;
		$vSelSesion->Secc3->Accessories->DmbgOut_1     = $vSelActual->Secc3->Accessories->DmbgOut_1;
		$vSelSesion->Secc3->Accessories->FlexibleIn_1  = $vSelActual->Secc3->Accessories->FlexibleIn_1;
		$vSelSesion->Secc3->Accessories->FlexibleOut_1 = $vSelActual->Secc3->Accessories->FlexibleOut_1;
		$vSelSesion->Secc3->Accessories->ScreenIn_1    = $vSelActual->Secc3->Accessories->ScreenIn_1;
		$vSelSesion->Secc3->Accessories->ScreenOut_1   = $vSelActual->Secc3->Accessories->ScreenOut_1;
		$vSelSesion->Secc3->Accessories->DamperIn_1    = $vSelActual->Secc3->Accessories->DamperIn_1;
		$vSelSesion->Secc3->Accessories->DamperOut_1   = $vSelActual->Secc3->Accessories->DamperOut_1;
		$vSelSesion->Secc3->Accessories->DiffusorIn_1  = $vSelActual->Secc3->Accessories->DiffusorIn_1;
		$vSelSesion->Secc3->Accessories->DiffusorOut_1 = $vSelActual->Secc3->Accessories->DiffusorOut_1;
		$vSelSesion->Secc3->Accessories->LouverIn_1    = $vSelActual->Secc3->Accessories->LouverIn_1;
		$vSelSesion->Secc3->Accessories->LouverOut_1   = $vSelActual->Secc3->Accessories->LouverOut_1;
		$vSelSesion->Secc3->Accessories->SilencerIn_1  = $vSelActual->Secc3->Accessories->SilencerIn_1;
		$vSelSesion->Secc3->Accessories->SilencerOut_1 = $vSelActual->Secc3->Accessories->SilencerOut_1;
		$vSelSesion->Secc3->Accessories->InletBoxIn_1  = $vSelActual->Secc3->Accessories->InletBoxIn_1;
		$vSelSesion->Secc3->Accessories->InletBoxOut_1 = $vSelActual->Secc3->Accessories->InletBoxOut_1;

		$vSelSesion->Secc4->BladeType           = $vSelActual->Secc4->BladeType;
		$vSelSesion->Secc4->FanArragment        = $vSelActual->Secc4->FanArragment;
		$vSelSesion->Secc4->AmbientPressure     = $vSelActual->Secc4->AmbientPressure;
		$vSelSesion->Secc4->AmbientPressureUnit = $vSelActual->Secc4->AmbientPressureUnit;
		$vSelSesion->Secc4->DefinitionIn        = $vSelActual->Secc4->DefinitionIn;
		$vSelSesion->Secc4->DefinitionOut       = $vSelActual->Secc4->DefinitionOut;
		$vSelSesion->Secc4->Connectionmav       = $vSelActual->Secc4->Connectionmav;
		$vSelSesion->Secc4->ConnectionmavUnit   = $vSelActual->Secc4->ConnectionmavUnit;
		$vSelSesion->Secc4->ConnectionmavYn     = $vSelActual->Secc4->ConnectionmavYn;
		$vSelSesion->Secc4->Motor               = $vSelActual->Secc4->Motor;
		$vSelSesion->Secc4->SpDistance          = $vSelActual->Secc4->SpDistance;
		$vSelSesion->Secc4->SpMaxSound          = $vSelActual->Secc4->SpMaxSound;

		$_SESSION["Selection"] = json_encode($vSelSesion);

		actualizaSelection();

		echo "ready";
	}

	
?>