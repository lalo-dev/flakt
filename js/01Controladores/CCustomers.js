$(document).ready(function() {
	
	$.blockUI(); 

	validaSesion();
	//initialize the javascript
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
	
	$('.btnGuarda').magnificPopup({
	  	items: {
      		src: '#mdlCustomer',
      		type: 'inline'
	  	},
	  	alignTop: 'true',
  		callbacks: {
			beforeOpen: function() {
				iniciaGuardaCustomer();
			}					
		}	
	});	


	cargaCatalogoCustomers(1);

});


function verCustomer(){
	
	$("#mdlMensajes").html("");

	$.blockUI(); 

	var vCustomerId = $("#hdnCustomerId").val();
	var vDatos = "acc=consultaCustomerPorId&esEdicion=0&CustomerId=" + vCustomerId;
	var vUrl = "php/02Controladores/CCustomers.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
		$("#mdlBody").html(vRes);
		$("#btnGuardar").hide();				

		$.unblockUI();
	});

}

function iniciaActualizaCustomer(){

	$("#mdlMensajes").html("");

	$.blockUI();

	var vCustomerId = $("#hdnCustomerId").val();
	var vDatos = "acc=consultaCustomerPorId&esEdicion=1&CustomerId=" + vCustomerId;
	var vUrl = "php/02Controladores/CCustomers.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
		$("#mdlBody").html(vRes);
		$("#btnGuardar").show();				

		$.unblockUI();
	});

}

function cargaCatalogoCustomers(noPag){
	
	$.blockUI(); 

	$.when(
		$.ajax({
			data: "acc=consultaCustomers&NoPagina=" + noPag,
			type: "POST",
			url: "php/02Controladores/CCustomers.php"
		}),		  
		$.ajax({
			data:"acc=consultTotalPaginas",
			type: "POST",
			url: "php/02Controladores/CCustomers.php"
		})
	).done(function(vCat, vTot){

		$("#tbCustomers").html(vCat[0]);

		$('.btnView').magnificPopup({
		  	items: {
	      		src: '#mdlCustomer',
	      		type: 'inline'
		  	},
		  	alignTop: 'true',
	  		callbacks: {
				beforeOpen: function() {
					verCustomer();
				}					
			}	
		});

		$('.btnActualiza').magnificPopup({
		  	items: {
	      		src: '#mdlCustomer',
	      		type: 'inline'
		  	},
		  	alignTop: 'true',
	  		callbacks: {
				beforeOpen: function() {
					iniciaActualizaCustomer();
				}					
			}	
		});		

		$('.btnContacts').magnificPopup({
		  	items: {
	      		src: '#mdlContacts',
	      		type: 'inline'
		  	},
		  	alignTop: 'true',
	  		callbacks: {
				beforeOpen: function() {
					$("#divContactList").show();
					$("#divContact").hide();
					verContactosPorCustomerId();
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
				cargaCatalogoCustomers(numeroPagina);
			}
		});   

		$.unblockUI();

	});

}

function iniciaGuardaCustomer(){

	$("#mdlMensajes").html("");

	$.blockUI(); 

	var vDatos = "acc=iniciaNuevoCustomer";
	var vUrl = "php/02Controladores/CCustomers.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
		$("#mdlBody").html(vRes);
		$("#btnGuardar").show();				

		$.unblockUI();
	});

}

function guardaCustomer(){
	
	if(!validaCustomer()){
		return;
	}

	$.blockUI(); 

	var vDatos = $('#frmCustomer').serialize() + "&acc=guardaCustomer";
	var vUrl = "php/02Controladores/CCustomers.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
			
		if(vRes[0] == 0){
			alert("Saved successfully.");
			cargaCatalogoCustomers($("#paginador").pagination("getCurrentPage"));
			$("#mdlCustomer").magnificPopup("close");
		}

		$.unblockUI();
	});

}

function validaCustomer(){
	
	$("#frmCustomer .form-group").removeClass("has-error");

	var vCorrecto = true;

	vHTMLErr = "<ul>";

	if($("#txtName").val() == ""){
		$("#dName").addClass("has-error");
		vHTMLErr += "<li> <strong> Name is required. </strong> </li>";
		vCorrecto = false;
	}

	vHTMLErr += "</ul>";

	if(!vCorrecto)
		$("#mdlMensajes").html(msjRojoCerrable(vHTMLErr));

	return vCorrecto;

}

function eliminaCustomer(CustomerId){
	
	$.blockUI(); 

	var vDatos = "acc=eliminaCustomerPorId&CustomerId=" + CustomerId;
	var vUrl = "php/02Controladores/CCustomers.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
	
		if(vRes[0] == 0){
			alert("Eliminado correctamente.");
			cargaCatalogoCustomers($("#paginador").pagination("getCurrentPage"));
		}

		$.unblockUI();
	});

}

function verContactosPorCustomerId(){

	$.blockUI(); 
	
	var vCustomerId = $("#hdnCustomerId").val();
	var vDatos = "acc=consultaCustomerContactsPorCustomerId&CustomerId=" + vCustomerId;
	var vUrl = "php/02Controladores/CCustomers.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {

		$("#tbContacts").html(vRes);

		$.unblockUI();
	});

	
}

function cancelaAccionContacto(){
	$("#divContactList").show();
	$("#divContact").hide();	
}

function iniciaGuardaContact(){

	$("#divContactList").hide();
	$("#divContact").show();
	
	$("#mdlCMensajes").html("");

	$.blockUI(); 

	var vDatos = "acc=iniciaNuevoContact";
	var vUrl = "php/02Controladores/CCustomers.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
		$("#mdlCBody").html(vRes);
		$.unblockUI();
	});


}

function guardaContact(){
	
	if(!validaContact()){
		return;
	}

	$.blockUI(); 

	var vCustomerId = $("#hdnCustomerId").val();
	var vDatos = $('#frmContact').serialize() + "&acc=guardaContact&CustomerId=" + vCustomerId;
	var vUrl = "php/02Controladores/CCustomers.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
			
		if(vRes[0] == 0){
			alert("Saved successfully.");
			verContactosPorCustomerId();
			cancelaAccionContacto();
		}

		$.unblockUI();
	});

}

function validaContact(){
	
	$("#frmContact .form-group").removeClass("has-error");

	var vCorrecto = true;

	vHTMLErr = "<ul>";

	if($("#txtName").val() == ""){
		$("#dName").addClass("has-error");
		vHTMLErr += "<li> <strong> Name is required. </strong> </li>";
		vCorrecto = false;
	}

	if($("#txtEmail").val() == ""){
		$("#dEmail").addClass("has-error");
		vHTMLErr += "<li> <strong> Email is required. </strong> </li>";
		vCorrecto = false;
	}else if(!validaEstruturaMail($("#txtEmail").val())){
		$("#dEmail").addClass("has-error");
		vHTMLErr += "<li> <strong> Invalid Email. </strong> </li>";
		vCorrecto = false;
	}

	vHTMLErr += "</ul>";

	if(!vCorrecto)
		$("#mdlCMensajes").html(msjRojoCerrable(vHTMLErr));

	return vCorrecto;

}


function iniciaActualizaContact(CustomerContactId){

	$("#divContactList").hide();
	$("#divContact").show();

	$("#mdlCMensajes").html("");

	$.blockUI();

	//var vCustomerContactId = $("#hdnCustomerContactId").val();
	var vDatos = "acc=consultaCustomerContactPorId&esEdicion=1&CustomerContactId=" + CustomerContactId;
	var vUrl = "php/02Controladores/CCustomers.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
		$("#mdlCBody").html(vRes);
		$.unblockUI();
	});

}

function eliminaCustomerContact(CustomerContactId){
	

	$.blockUI(); 

	var vDatos = "acc=eliminaCustomerContactPorId&CustomerContactId=" + CustomerContactId;
	var vUrl = "php/02Controladores/CCustomers.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
	
		if(vRes[0] == 0){
			alert("Eliminado correctamente.");
			verContactosPorCustomerId();
		}

		$.unblockUI();
	});

}






