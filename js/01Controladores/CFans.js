$(document).ready(function() {
	
	$.blockUI(); 
	validaSesion();

	//initialize the javascript
	App.init();

	var f = $('form');
	var l = $('#loader'); // loder.gif image
	var b = $('#button'); // upload button
	var p = $('#preview'); // preview area

	b.click(function(){
		// implement with ajaxForm Plugin
		f.ajaxForm({
			beforeSend: function(){
				l.show();
				b.attr('disabled', 'disabled');
				p.fadeOut();
			},
			success: function(e){
				l.hide();
				//f.resetForm();
				b.removeAttr('disabled');
				p.html(e).fadeIn();
			},
			error: function(e){
				b.removeAttr('disabled');
				p.html(e).fadeIn();
			}
		});
	});

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
	
	$('.btnGuarda').magnificPopup({
	  	items: {
      		src: '#mdlFan',
      		type: 'inline'
	  	},
	  	alignTop: 'true',
  		callbacks: {
			beforeOpen: function() {
				iniciaGuarda();
			}					
		}	
	});	

	$("#slcModel").change(function() {
		
		var vModel = $("#slcModel").val();

		configuraPorModelo(vModel);

	});

	cargaCatalogo(1);

});


function configuraPorModelo(model){
	
	if(model == "AXIAL"){
		$("#slcPresion").html('<option value="">Select...</option><option value="NONE" >NONE</option>');
		$("#slcAspa").html('<option value="">Select...</option><option value="NONE" >NONE</option>');
		$("#slcArreglo").html('<option value="">Select...</option><option value="NONE" >NONE</option>');
	}

	if(model == "COOLER"){
		$("#slcPresion").html('<option value="">Select...</option><option value="NONE" >NONE</option>');
		$("#slcAspa").html('<option value="">Select...</option><option value="NONE" >NONE</option>');
		$("#slcArreglo").html('<option value="">Select...</option><option value="NONE" >NONE</option>');
	}

	if(model == "FZ"){
		$("#slcPresion").html('<option value="">Select...</option><option value="NONE" >NONE</option>');

		$("#slcAspa").html('<option value="">Select...</option><option value="ASPA FIJA" >ASPA FIJA</option>'
								+ '<option value="ASPA AJUSTABLE" >ASPA AJUSTABLE</option>');

		$("#slcArreglo").html('<option value="">Select...</option>'
								+ '<option value="FLAKT 1" >FLAKT 1</option>'
								+ '<option value="FLAKT 3" >FLAKT 3</option>'
								+ '<option value="FLAKT 5" >FLAKT 5</option>'
								+ '<option value="FLAKT 6" >FLAKT 6</option>'
								+ '<option value="FLAKT 13" >FLAKT 13</option>');

	}

	if(model == "FZ"){
		$("#slcPresion").html('<option value="">Select...</option><option value="NONE" >NONE</option>');

		$("#slcAspa").html('<option value="">Select...</option><option value="ASPA FIJA" >ASPA FIJA</option>'
								+ '<option value="ASPA AJUSTABLE" >ASPA AJUSTABLE</option>');

		$("#slcArreglo").html('<option value="">Select...</option>'
								+ '<option value="FLAKT 1" >FLAKT 1</option>'
								+ '<option value="FLAKT 3" >FLAKT 3</option>'
								+ '<option value="FLAKT 5" >FLAKT 5</option>'
								+ '<option value="FLAKT 6" >FLAKT 6</option>'
								+ '<option value="FLAKT 13" >FLAKT 13</option>');

	}

	if(model == "GL"){
		$("#slcPresion").html('<option value="">Select...</option>'
								+'<option value="L" >L</option>');

		$("#slcAspa").html('<option value="">Select...</option>'
								+'<option value="B" >B</option>');

		$("#slcArreglo").html('<option value="">Select...</option>'
								+ '<option value="FLAKT 3 (AMCA 1)" >FLAKT 3 (AMCA 1)</option>'
								+ '<option value="FLAKT 5 (AMCA 3)" >FLAKT 5 (AMCA 3)</option>');


	}

	if(model == "HAC"){
		$("#slcPresion").html('<option value="">Select...</option>'
								+'<option value="NONE" >None</option>');

		$("#slcAspa").html('<option value="">Select...</option>'
								+'<option value="B" >B</option>'
								+'<option value="P" >P</option>'
								+'<option value="S" >S</option>');

		$("#slcArreglo").html('<option value="">Select...</option>'
								+ '<option value="FLAKT 1 (AMCA 4)" >FLAKT 1 (AMCA 4)</option>'
								+ '<option value="FLAKT 7 (AMCA 8)" >FLAKT 7 (AMCA 8)</option>'
								+ '<option value="FLAKT 3 (AMCA 1)" >FLAKT 3 (AMCA 1)</option>'
								+ '<option value="FLAKT 3 (AMCA 3)" >FLAKT 3 (AMCA 3)</option>'
								+ '<option value="FLAKT 7 (AMCA 7)" >FLAKT 7 (AMCA 7)</option>');

	}

	if(model == "HC"){
		$("#slcPresion").html('<option value="">Select...</option>'
								+'<option value="L" >L</option>'
								+'<option value="M" >M</option>'
								+'<option value="H" >H</option>');

		$("#slcAspa").html('<option value="">Select...</option>'
								+'<option value="B" >B</option>'
								+'<option value="P" >P</option>'
								+'<option value="T" >T</option>');

		$("#slcArreglo").html('<option value="">Select...</option>'
								+ '<option value="FLAKT 1 (AMCA 4)" >FLAKT 1 (AMCA 4)</option>'
								+ '<option value="FLAKT 7 (AMCA 8)" >FLAKT 7 (AMCA 8)</option>'
								+ '<option value="FLAKT 3 (AMCA 1)" >FLAKT 3 (AMCA 1)</option>');


	}

	if(model == "HD"){
		$("#slcPresion").html('<option value="">Select...</option>'
								+'<option value="NONE" >NONE</option>');

		$("#slcAspa").html('<option value="">Select...</option>'
								+'<option value="HD" >HD</option>'
								+'<option value="HV" >HV</option>');

		$("#slcArreglo").html('<option value="">Select...</option>'
								+ '<option value="FLAKT 1 (AMCA 4)" >FLAKT 1 (AMCA 4)</option>'
								+ '<option value="FLAKT 7 (AMCA 8)" >FLAKT 7 (AMCA 8)</option>'
								+ '<option value="FLAKT 3 (AMCA 1)" >FLAKT 3 (AMCA 1)</option>');



	}

	if(model == "LH"){
		$("#slcPresion").html('<option value="">Select...</option>'
								+'<option value="L" >L</option>');

		$("#slcAspa").html('<option value="">Select...</option>'
								+'<option value="B" >B</option>'
								+'<option value="T" >T</option>');

		$("#slcArreglo").html('<option value="">Select...</option>'
								+ '<option value="FLAKT 1 (AMCA 4)" >FLAKT 1 (AMCA 4)</option>'
								+ '<option value="FLAKT 3 (AMCA 1)" >FLAKT 3 (AMCA 1)</option>');

	}

	if(model == "RGML"){
		$("#slcPresion").html('<option value="">Select...</option>'
								+'<option value="NONE" >NONE</option>');

		$("#slcAspa").html('<option value="">Select...</option>'
								+'<option value="F" >F</option>');

		$("#slcArreglo").html('<option value="">Select...</option>'
								+ '<option value="FLAKT 5" >FLAKT 5</option>');

	}

	if(model == "STDM"){
		$("#slcPresion").html('<option value="">Select...</option>'
								+'<option value="L" >L</option>');

		$("#slcAspa").html('<option value="">Select...</option>'
								+'<option value="B" >B</option>');

		$("#slcArreglo").html('<option value="">Select...</option>'
								+ '<option value="FLAKT 1 (AMCA 4)" >FLAKT 1 (AMCA 4)</option>'
								+ '<option value="FLAKT 3 (AMCA 1)" >FLAKT 3 (AMCA 1)</option>');


	}


}

function verFan(){
	
	$("#mdlMensajes").html("");

	$("#frmFan .form-group").removeClass("has-error");

	
	$("#divFanData").show();	
	$("#btnNuevaFeature").hide();
	

	$.blockUI(); 

	var vFanId = $("#hdnFanId").val();
	var vDatos = "acc=consultaFanPorId&esEdicion=0&FanId=" + vFanId;
	var vUrl = "php/02Controladores/CFans.php";

	peticionAjaxJSON(vDatos, vUrl).done(function(vRes) {
		
		configuraPorModelo(vRes[0].Model);

		$("#txtFanId").val(vRes[0].FanId);
		$("#txtDescription").val(vRes[0].Description);
		$("#slcModel").val(vRes[0].Model);
		$("#slcPresion").val(vRes[0].Presion);
		$("#slcAspa").val(vRes[0].Aspa);
		$("#slcArreglo").val(vRes[0].Arreglo);

		$("#btnGuardar").hide();	

		desactivaCampos();			

		$.unblockUI();
	});

	cargaFeatures();

}

function iniciaActualizaFan(){

	$("#mdlMensajes").html("");

	$("#frmFan .form-group").removeClass("has-error");

	$.blockUI();

	$("#divFanData").show();
	$("#btnNuevaFeature").show();

	var vFanId = $("#hdnFanId").val();
	var vDatos = "acc=consultaFanPorId&esEdicion=1&FanId=" + vFanId;
	var vUrl = "php/02Controladores/CFans.php";

	peticionAjaxJSON(vDatos, vUrl).done(function(vRes) {
		
		configuraPorModelo(vRes[0].Model);

		$("#txtFanId").val(vRes[0].FanId);
		$("#txtDescription").val(vRes[0].Description);
		$("#slcModel").val(vRes[0].Model);
		$("#slcPresion").val(vRes[0].Presion);
		$("#slcAspa").val(vRes[0].Aspa);
		$("#slcArreglo").val(vRes[0].Arreglo);

		$("#btnGuardar").show();

		activaCampos();				

		$.unblockUI();
	});

	cargaFeatures();

}

function cargaCatalogo(noPag){
	
	$.blockUI(); 

	$.when(
		$.ajax({
			data: "acc=consulta&NoPagina=" + noPag,
			type: "POST",
			url: "php/02Controladores/CFans.php"
		}),		  
		$.ajax({
			data:"acc=consultTotalPaginas",
			type: "POST",
			url: "php/02Controladores/CFans.php"
		})
	).done(function(vCat, vTot){

		$("#tbFans").html(vCat[0]);

		$('.btnViewFan').magnificPopup({
		  	items: {
	      		src: '#mdlFan',
	      		type: 'inline'
		  	},
		  	alignTop: 'true',
	  		callbacks: {
				beforeOpen: function() {
					verFan();
				}					
			}	
		});

		$('.btnActualiza').magnificPopup({
		  	items: {
	      		src: '#mdlFan',
	      		type: 'inline'
		  	},
		  	alignTop: 'true',
	  		callbacks: {
				beforeOpen: function() {
					iniciaActualizaFan();
				}					
			}	
		});		

		$("#paginador").pagination({
			pages: vTot[0],
			displayedPages: 3,
			edges: 1,
			hrefTextPrefix: "#",
			prevText: "<<",
			nextText: ">>",
			currentPage: noPag, 
			onPageClick: function(numeroPagina){
				cargaCatalogo(numeroPagina);
			}
		});   

		$.unblockUI();

	});

}

function iniciaGuarda(){

	limpiarformulario("#frmFan");

	$("#frmFan .form-group").removeClass("has-error");

	$("#divFanData").show();
	activaCampos();

	$("#mdlMensajes").html("");
}

function activaCampos(){
	$("#txtDescription").prop( "disabled", false );
	$("#slcModel").prop( "disabled", false );
	$("#slcPresion").prop( "disabled", false );
	$("#slcAspa").prop( "disabled", false );
	$("#slcArreglo").prop( "disabled", false );

	$("#txtDiameters").prop( "disabled", false );
	$("#txtVolumes").prop( "disabled", false );
	$("#txtPressures").prop( "disabled", false );
	$("#txtImpeller").prop( "disabled", false );
	$("#txtCaseStyle").prop( "disabled", false );
	$("#txtCaseCoating").prop( "disabled", false );
	$("#txtInstallation").prop( "disabled", false );
	$("#txtLocation").prop( "disabled", false );
	$("#txtIPRating").prop( "disabled", false );
	$("#txtTemperature").prop( "disabled", false );
	$("#txtEmergency").prop( "disabled", false );

}

function desactivaCampos(){
	$("#txtDescription").prop( "disabled", true );
	$("#slcModel").prop( "disabled", true );
	$("#slcPresion").prop( "disabled", true );
	$("#slcAspa").prop( "disabled", true );
	$("#slcArreglo").prop( "disabled", true );

	$("#txtDiameters").prop( "disabled", true );
	$("#txtVolumes").prop( "disabled", true );
	$("#txtPressures").prop( "disabled", true );
	$("#txtImpeller").prop( "disabled", true );
	$("#txtCaseStyle").prop( "disabled", true );
	$("#txtCaseCoating").prop( "disabled", true );
	$("#txtInstallation").prop( "disabled", true );
	$("#txtLocation").prop( "disabled", true );
	$("#txtIPRating").prop( "disabled", true );
	$("#txtTemperature").prop( "disabled", true );
	$("#txtEmergency").prop( "disabled", true );
}

function guarda(){
	
	if(!validaFan()){
		return;
	}

	$.blockUI(); 

	var vDatos = $('#frmFan').serialize() + "&acc=guardaFan";
	var vUrl = "php/02Controladores/CFans.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
			
		if(vRes[0] == 0){
			alert("Saved successfully.");
			cargaCatalogo($("#paginador").pagination("getCurrentPage"));
			$("#mdlFan").magnificPopup("close");
		}

		$.unblockUI();
	});

}

function cargaFeatures(){
	
	$.blockUI(); 


	var vFanId = $("#hdnFanId").val();
	var vDatos = "acc=consultaFeatures&FanId=" + vFanId;
	var vUrl = "php/02Controladores/CFans.php";

	peticionAjaxJSON(vDatos, vUrl).done(function(vRes) {

		$("#txtDiameters").val(vRes[0].Description);
		$("#txtVolumes").val(vRes[1].Description);
		$("#txtPressures").val(vRes[2].Description);
		$("#txtImpeller").val(vRes[3].Description);
		$("#txtCaseStyle").val(vRes[4].Description);
		$("#txtCaseCoating").val(vRes[5].Description);
		$("#txtInstallation").val(vRes[6].Description);
		$("#txtLocation").val(vRes[7].Description);
		$("#txtIPRating").val(vRes[8].Description);
		$("#txtTemperature").val(vRes[9].Description);
		$("#txtEmergency").val(vRes[10].Description);

		$.unblockUI();
	});
}

function validaFan(){
	
	$("#frmFan .form-group").removeClass("has-error");

	var vCorrecto = true;

	vHTMLErr = "<ul>";

	if($("#txtDescription").val() == ""){
		$("#dDescription").addClass("has-error");
		vHTMLErr += "<li> <strong> Description is required. </strong> </li>";
		vCorrecto = false;
	}

	vHTMLErr += "</ul>";

	if(!vCorrecto)
		$("#mdlMensajes").html(msjRojoCerrable(vHTMLErr));

	return vCorrecto;

}


function eliminaFan(FanId){
	
	$.blockUI(); 

	var vDatos = "acc=eliminaFanPorId&FanId=" + FanId;
	var vUrl = "php/02Controladores/CFans.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
	
		if(vRes[0] == 0){
			alert("Eliminado correctamente.");
			cargaCatalogo($("#paginador").pagination("getCurrentPage"));
		}

		$.unblockUI();
	});

}




