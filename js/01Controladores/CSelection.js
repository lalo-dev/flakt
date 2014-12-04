$(document).ready(function() {
	
	$.blockUI();

	validaSesion();

	/*initialize the javascript*/
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
    
	App.wizard();      
	$('.md-trigger').modalEffects();

	cargaInicialSelection();

});

function cargaInicialSelection(){
	
	/*Cargando Select Contact cuando Customer cambie*/
	$("#slcCustomer").change(function() {
		
		var vCustomerId = $("#slcCustomer").val();
		var vDatos = "acc=obtenerSlcContactPorCustomerId&CustomerId=" + vCustomerId;
		var vUrl = "php/02Controladores/CSelection.php";

		peticionAjax(vDatos, vUrl).done(function(vRes) {
			$("#slcCustomerContact").html(vRes);		
		});	  

	});
	console.warn('Inicio de peticion Ajax');
	$.when(
		$.ajax({
			data: "acc=obtenerSlcCustomer",
			type: "POST",
			url: "php/02Controladores/CSelection.php"
		}),
		$.ajax({
			data:"acc=iniciaSeleccion",
			type: "POST",
			url: "php/02Controladores/CSelection.php",
			dataType: "json"
		})
	).done(function(vCustomers, vRes){
		console.warn('Despues del done');

		$("#slcCustomer").html(vCustomers);
		
		//Asignando valores a la vista Selection
		//Seccion#1
		$("#spnSelectionId").text(vRes[0].Secc1.SelectionId);
		$("#spnSelectionDate").text(vRes[0].Secc1.SelectionDate); 
		$("#spnSeller").text(vRes[0].Secc1.Seller); 		
		$("#slcCustomer").val(vRes[0].Secc1.CustomerId); 	
		
		if(vRes[0].Secc1.CustomerId != "")
			cargaSlcCustomerContact(vRes[0].Secc1.CustomerId, vRes[0].Secc1.CustomerContactId);

		$("#txtReference").val(vRes[0].Secc1.Reference); 
		$("#txtNoProposal").val(vRes[0].Secc1.NoProposal);
		$("#slcCustomerContact").val(vRes[0].Secc1.CustomerContactId); 
		
		//Seccion#2
		if(vRes[0].Secc2.Unit != ""){
			cambiarSeleccionUnidades(vRes[0].Secc2.Unit);
		}

		//Seccion#3
		//Filters
		$("#txtOutletVelocityMax").val(vRes[0].Secc3.Filters.OutletVelocityMax);
		$("#txtOutletVelocityMin").val(vRes[0].Secc3.Filters.OutletVelocityMin);
		$("#txtSoundMax").val(vRes[0].Secc3.Filters.SoundMax);
		$("#txtSoundMin").val(vRes[0].Secc3.Filters.SoundMin);
		$("#txtEfficiencyMax").val(vRes[0].Secc3.Filters.EfficiencyMax);
		$("#txtEfficiencyMin").val(vRes[0].Secc3.Filters.EfficiencyMin);
		$("#txtDiameterMax").val(vRes[0].Secc3.Filters.DiameterMax);
		$("#txtDiameterMin").val(vRes[0].Secc3.Filters.DiameterMin);
		//AirConditions
		$("#txtDensityStandar").val(vRes[0].Secc3.AirConditions.DensityStandar);
		$("#txtDensityOperation").val(vRes[0].Secc3.AirConditions.DensityOperation);
		$("#txtTemperatureStandar").val(vRes[0].Secc3.AirConditions.TemperatureStandar);
		$("#txtTemperatureOperation").val(vRes[0].Secc3.AirConditions.TemperatureOperation);
		$("#txtAltitudeStandar").val(vRes[0].Secc3.AirConditions.AltitudeStandar);
		$("#txtAltitudeOperation").val(vRes[0].Secc3.AirConditions.AltitudeOperation);
		$("#txtDampStandar").val(vRes[0].Secc3.AirConditions.DampStandar);
		$("#txtDampOperation").val(vRes[0].Secc3.AirConditions.DampOperation);
		$("#txtPressureStandar").val(vRes[0].Secc3.AirConditions.PressureStandar);
		$("#txtPressureOperation").val(vRes[0].Secc3.AirConditions.PressureOperation);
		$("#txtWetbulbtempStandar").val(vRes[0].Secc3.AirConditions.WetbulbtempStandar);
		$("#txtWetbulbtempOperation").val(vRes[0].Secc3.AirConditions.WetbulbtempOperation);
		$("#txtDrybulbtempStandar").val(vRes[0].Secc3.AirConditions.DrybulbtempStandar);
		$("#txtDrybulbtempOperation").val(vRes[0].Secc3.AirConditions.DrybulbtempOperation);
		//MotorOptions
		$("#slcSpeedControlType").val(vRes[0].Secc3.MotorOptions.SpeedControlType);
		$("#slcEnclosure").val(vRes[0].Secc3.MotorOptions.Enclosure);
		$("#slcSupply").val(vRes[0].Secc3.MotorOptions.Supply);
		$("#slcSupply1").val(vRes[0].Secc3.MotorOptions.Supply1);
		$("#slcSupply2").val(vRes[0].Secc3.MotorOptions.Supply2);
		$("#slcServiceFactor").val(vRes[0].Secc3.MotorOptions.ServiceFactor);
		//Accessories
		if (vRes[0].Secc3.Accessories.IvcIn_1  == 1) { $("#ivcIn_1").attr('checked', true); }
		if (vRes[0].Secc3.Accessories.IvcOut_1  == 1) { $("#ivcOut_1").attr('checked', true); }
		if (vRes[0].Secc3.Accessories.DmbgIn_1 == 1) { $("#dmbgIn_1").attr('checked', true); }
		if (vRes[0].Secc3.Accessories.DmbgOut_1 == 1) { $("#dmbgOut_1").attr('checked', true); }
		if (vRes[0].Secc3.Accessories.FlexibleIn_1 == 1) { $("#flexibleIn_1").attr('checked', true); }
		if (vRes[0].Secc3.Accessories.FlexibleOut_1 == 1) { $("#flexibleOut_1").attr('checked', true); }
		if (vRes[0].Secc3.Accessories.ScreenIn_1 == 1) { $("#screenIn_1").attr('checked', true); }
		if (vRes[0].Secc3.Accessories.ScreenOut_1 == 1) { $("#screenOut_1").attr('checked', true); }
		if (vRes[0].Secc3.Accessories.DamperIn_1 == 1) { $("#damperIn_1").attr('checked', true); }
		if (vRes[0].Secc3.Accessories.DamperOut_1 == 1) { $("#damperOut_1").attr('checked', true); }
		if (vRes[0].Secc3.Accessories.DiffusorIn_1 == 1) { $("#diffusorIn_1").attr('checked', true); }
		if (vRes[0].Secc3.Accessories.DiffusorOut_1 == 1) { $("#diffusorOut_1").attr('checked', true); }
		if (vRes[0].Secc3.Accessories.LouverIn_1 == 1) { $("#louverIn_1").attr('checked', true); }
		if (vRes[0].Secc3.Accessories.LouverOut_1 == 1) { $("#louverOut_1").attr('checked', true); }
		if (vRes[0].Secc3.Accessories.SilencerIn_1 == 1) { $("#silencerIn_1").attr('checked', true); }
		if (vRes[0].Secc3.Accessories.SilencerOut_1 == 1) { $("#silencerOut_1").attr('checked', true); }
		if (vRes[0].Secc3.Accessories.InletBoxIn_1 == 1) { $("#inletBoxIn_1").attr('checked', true); }
		if (vRes[0].Secc3.Accessories.InletBoxOut_1 == 1) { $("#inletBoxOut_1").attr('checked', true); }

		//Seccion#4
		$("#slcBladeType").val(vRes[0].Secc4.BladeType);
		$("#slcFanArragment").val(vRes[0].Secc4.FanArragment);
		$("#txtAmbientPressure").val(vRes[0].Secc4.AmbientPressure);
		$("#slcAmbientPressureUnit").val(vRes[0].Secc4.AmbientPressureUnit);
		$("#slcPressureIn").val(vRes[0].Secc4.DefinitionIn);
		$("#slcPressureOut").val(vRes[0].Secc4.DefinitionOut);
		$("#txtConnectionMax").val(vRes[0].Secc4.Connectionmav);
		$("#slcMaxAir").val(vRes[0].Secc4.ConnectionmavUnit);
		$("#slcMaxAirYn").val(vRes[0].Secc4.ConnectionmavYn);
		$("#slcMotor").val(vRes[0].Secc4.Motor);
		$("#txtSoundDistance").val(vRes[0].Secc4.SpDistance);
		$("#txtSoundMax").val(vRes[0].Secc4.SpMaxSound);

		$.unblockUI();
	});


}

function cargaSlcCustomerContact(customerId, customerContactId){
   	
	var vCustomerId = customerId;
	var vDatos = "acc=obtenerSlcContactPorCustomerId&CustomerId=" + vCustomerId;
	var vUrl = "php/02Controladores/CSelection.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
		$("#slcCustomerContact").html(vRes);		
		$("#slcCustomerContact").val(customerContactId);
	});	  

}

function cambiarSeleccionUnidades(seleccion){
	if(seleccion == "SI"){
		$("#hdnUnit").val("SI");
		$(".sistemaSA").removeClass("primary-emphasis");		
		$(".sistemaSI").addClass("primary-emphasis");
		
		$(".btnSistemaSI").addClass("btn-primary").removeClass("btn-default");
		$(".btnSistemaSA").removeClass("btn-primary").addClass("btn-default");

		//Solo se muestran las opciones SI en los combos
		$('.uSA').hide();
		$('.uSI').show();
	}else{
		$("#hdnUnit").val("SA");
		$(".sistemaSA").addClass("primary-emphasis");
		$(".sistemaSI").removeClass("primary-emphasis");

		$(".btnSistemaSA").addClass("btn-primary").removeClass("btn-default");
		$(".btnSistemaSI").removeClass("btn-primary").addClass("btn-default");

		//Solo se muestran las opciones SA en los combos
		$('.uSI').hide();
		$('.uSA').show();
	}
}

function actualizaSelection(resumen){
	
	$.blockUI();

	/* Generar objeto Selection para enviar*/
	var vSelection = {
						"Secc1": {
							"SelectionId"       : $("#spnSelectionId").text(),
							"SelectionDate"     : $("#spnSelectionDate").text(),
							"Seller"            : $("#spnSeller").text(),
							"CustomerId"        : $("#slcCustomer").val(),
							"Reference"         : $("#txtReference").val(),
							"NoProposal"        : $("#txtNoProposal").val(),
							"CustomerContactId" : $("#slcCustomerContact").val()
					    },
					    "Secc2": {
							"Unit": $("#hdnUnit").val()
					    },
					    "Secc3" : {
							"Filters": {
								"OutletVelocityMax" : $("#txtOutletVelocityMax").val(),
								"OutletVelocityMin" : $("#txtOutletVelocityMin").val(),
								"SoundMax"          : $("#txtSoundMax").val(),
								"SoundMin"          : $("#txtSoundMin").val(),
								"EfficiencyMax"     : $("#txtEfficiencyMax").val(),
								"EfficiencyMin"     : $("#txtEfficiencyMin").val(),
								"DiameterMax"       : $("#txtDiameterMax").val(),
								"DiameterMin"       : $("#txtDiameterMin").val()
							},
							"AirConditions" : {
								"DensityStandar"       : $("#txtDensityStandar").val(),
								"DensityOperation"     : $("#txtDensityOperation").val(),
								"TemperatureStandar"   : $("#txtTemperatureStandar").val(),
								"TemperatureOperation" : $("#txtTemperatureOperation").val(),
								"AltitudeStandar"      : $("#txtAltitudeStandar").val(),					        	
								"AltitudeOperation"    : $("#txtAltitudeOperation").val(),
								"DampStandar"          : $("#txtDampStandar").val(),
								"DampOperation"        : $("#txtDampOperation").val(),
								"PressureStandar"      : $("#txtPressureStandar").val(),
								"PressureOperation"    : $("#txtPressureOperation").val(),
								"WetbulbtempStandar"   : $("#txtWetbulbtempStandar").val(),
								"WetbulbtempOperation" : $("#txtWetbulbtempOperation").val(),
								"DrybulbtempStandar"   : $("#txtDrybulbtempStandar").val(),
								"DrybulbtempOperation" : $("#txtDrybulbtempOperation").val()
					     	},
					     	"MotorOptions" : {
								"SpeedControlType" : $("#slcSpeedControlType").val(),
								"Enclosure"        : $("#slcEnclosure").val(),
								"Supply"           : $("#slcSupply").val(),
								"Supply1"          : $("#slcSupply1").val(),
								"Supply2"          : $("#slcSupply2").val(),
								"ServiceFactor"    : $("#slcServiceFactor").val()
					     	},
					     	"Accessories" : {
								"IvcIn_1"       : $("#ivcIn_1").is(':checked') ? 1 : 0,
								"IvcOut_1"      : $("#ivcOut_1").is(':checked') ? 1 : 0,
								"DmbgIn_1"      : $("#dmbgIn_1").is(':checked') ? 1 : 0,
								"DmbgOut_1"     : $("#dmbgOut_1").is(':checked') ? 1 : 0,
								"FlexibleIn_1"  : $("#flexibleIn_1").is(':checked') ? 1 : 0,
								"FlexibleOut_1" : $("#flexibleOut_1").is(':checked') ? 1 : 0,
								"ScreenIn_1"    : $("#screenIn_1").is(':checked') ? 1 : 0,
								"ScreenOut_1"   : $("#screenOut_1").is(':checked') ? 1 : 0,
								"DamperIn_1"    : $("#damperIn_1").is(':checked') ? 1 : 0,
								"DamperOut_1"   : $("#damperOut_1").is(':checked') ? 1 : 0,
								"DiffusorIn_1"  : $("#diffusorIn_1").is(':checked') ? 1 : 0,
								"DiffusorOut_1" : $("#diffusorOut_1").is(':checked') ? 1 : 0,
								"LouverIn_1"    : $("#louverIn_1").is(':checked') ? 1 : 0,
								"LouverOut_1"   : $("#louverOut_1").is(':checked') ? 1 : 0,
								"SilencerIn_1"  : $("#silencerIn_1").is(':checked') ? 1 : 0,
								"SilencerOut_1" : $("#silencerOut_1").is(':checked') ? 1 : 0,
								"InletBoxIn_1"  : $("#inletBoxIn_1").is(':checked') ? 1 : 0,
								"InletBoxOut_1" : $("#inletBoxOut_1").is(':checked') ? 1 : 0
					     	}
					    },
						"Secc4" : {
							"BladeType"           : $("#slcBladeType").val(),
							"FanArragment"        : $("#slcFanArragment").val(),
							"AmbientPressure"     : $("#txtAmbientPressure").val(),
							"AmbientPressureUnit" : $("#slcAmbientPressureUnit").val(),
							"DefinitionIn"        : $("#slcPressureIn").val(),
							"DefinitionOut"       : $("#slcPressureOut").val(),
							"Connectionmav"       : $("#txtConnectionMax").val(),
							"ConnectionmavUnit"   : $("#slcMaxAir").val(),
							"ConnectionmavYn"     : $("#slcMaxAirYn").val(),
							"Motor"               : $("#slcMotor").val(),
							"SpDistance"          : $("#txtSoundDistance").val(),
							"SpMaxSound"          : $("#txtSoundMax").val()
						}
					};

	var vDatos =  "acc=consolidaSelection&selection=" + jQuery.stringify(vSelection);
	
	var vUrl = "php/02Controladores/CSelection.php";

	/* Consolidando objeto Selection */
	peticionAjax(vDatos, vUrl).done(function(vRes) { 
		$.unblockUI();

		/* Si el parametro resumen == 'ok' se redirecciona a resume.php */
		if (resumen == 'ok') {
			//alert('done');
			location.href='resume.php';
		}
	});
	//alert(vDatos);
}