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
      		src: '#mdlUser',
      		type: 'inline'
	  	},
	  	alignTop: 'true',
  		callbacks: {
			beforeOpen: function() {
				iniciaGuardaUser();
			}					
		}	
	});	

	cargaCatalogoUsers(1);

});


function verUser(){
	
	$("#mdlMensajes").html("");

	$.blockUI(); 

	var vUserId = $("#hdnUserId").val();
	var vDatos = "acc=consultaUserPorId&esEdicion=0&UserId=" + vUserId;
	var vUrl = "php/02Controladores/CUsers.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
		$("#mdlUsrBody").html(vRes);
		$("#btnGuardar").hide();				

		$.unblockUI();
	});

}

function iniciaActualizaUser(){

	$("#mdlMensajes").html("");

	$.blockUI();

	var vUserId = $("#hdnUserId").val();
	var vDatos = "acc=consultaUserPorId&esEdicion=1&UserId=" + vUserId;
	var vUrl = "php/02Controladores/CUsers.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
		$("#mdlUsrBody").html(vRes);
		$("#btnGuardar").show();				

		$.unblockUI();
	});

}

function cargaCatalogoUsers(noPag){
	
	$.blockUI(); 

	//Cargar todos los usuarios en BD	
	var vDatos = "acc=consultaUsers&NoPagina=" + noPag;
	var vUrl = "php/02Controladores/CUsers.php";

	$.when(
		$.ajax({
			data: "acc=consultaUsers&NoPagina=" + noPag,
			type: "POST",
			url: "php/02Controladores/CUsers.php"
		}),		  
		$.ajax({
			data:"acc=consultTotalPaginas",
			type: "POST",
			url: "php/02Controladores/CUsers.php"
		})
	).done(function(vCat, vTot){

		$("#tbUSers").html(vCat[0]);

		$('.btnViewUser').magnificPopup({
		  	items: {
	      		src: '#mdlUser',
	      		type: 'inline'
		  	},
		  	alignTop: 'true',
	  		callbacks: {
				beforeOpen: function() {
					verUser();
				}					
			}	
		});

		$('.btnActualiza').magnificPopup({
		  	items: {
	      		src: '#mdlUser',
	      		type: 'inline'
		  	},
		  	alignTop: 'true',
	  		callbacks: {
				beforeOpen: function() {
					iniciaActualizaUser();
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
				cargaCatalogoUsers(numeroPagina);
			}
		});

		$.unblockUI();

		$.fn.dataTableExt.sErrMode = 'throw';

		$('#tblUsers').dataTable({
	        "paging":   false,
	        "info":     false,
	        "order": [[ 0, "asc" ]],
	        "searching": false,
	        "columnDefs": [
			    { "orderable": true, "targets": 0 },
			    { "orderable": true, "targets": 1 },
			    { "orderable": true, "targets": 2 },
			    { "orderable": true, "targets": 3 },
			    { "orderable": true, "targets": 4 },
			    { "orderable": true, "targets": 5 },
			    { "orderable": false, "targets": 6 }
			]
	    });

	});

}

function iniciaGuardaUser(){

	$("#mdlMensajes").html("");

	$.blockUI(); 

	var vDatos = "acc=iniciaNuevoUser";
	var vUrl = "php/02Controladores/CUsers.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
		$("#mdlUsrBody").html(vRes);
		$("#btnGuardar").show();				

		$.unblockUI();
	});

}

function guardaUser(){
	
	if(!validaUser()){
		return;
	}

	$.blockUI(); 

	var vDatos = $('#frmUser').serialize() + "&acc=guardaUser";
	var vUrl = "php/02Controladores/CUsers.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
			
		if(vRes[0] == 0){
			alert("Saved successfully.");
			cargaCatalogoUsers($("#paginador").pagination("getCurrentPage"));
			$("#mdlUser").magnificPopup("close");
		}

		$.unblockUI();
	});

}

function validaUser(){
	
	$("#frmUser .form-group").removeClass("has-error");

	var vCorrecto = true;

	vHTMLErr = "<ul>";

	if($("#txtName").val() == ""){
		$("#dName").addClass("has-error");
		vHTMLErr += "<li> <strong> Name is required. </strong> </li>";
		vCorrecto = false;
	}

	if($("#txtFirstLastName").val() == ""){
		$("#dFirstLastName").addClass("has-error");
		vHTMLErr += "<li> <strong> First Last Name is required. </strong> </li>";
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

	if($("#txtPassword").val() == "" ){
		$("#dPassword").addClass("has-error");
		vHTMLErr += "<li> <strong> Password is required. </strong> </li>";
		vCorrecto = false;
	}

	if($("#txtConfirmPassword").val() == "" ){
		$("#dConfirmPassword").addClass("has-error");
		vHTMLErr += "<li> <strong> Confirm password. </strong> </li>";
		vCorrecto = false;
	}

	if($("#txtPassword").val() != "" && $("#txtConfirmPassword").val() != ""){
		if($("#txtPassword").val() != $("#txtConfirmPassword").val()){
			$("#dConfirmPassword").addClass("has-error");
			vHTMLErr += "<li> <strong> Password and Confirm password doesn't match. </strong> </li>";
			vCorrecto = false;
		}
	}

	vHTMLErr += "</ul>";

	if(!vCorrecto)
		$("#mdlMensajes").html(msjRojoCerrable(vHTMLErr));

	return vCorrecto;

}

function eliminaUser(userId){
	
	$.blockUI(); 

	var vDatos = "acc=eliminaUserPorId&UserId=" + userId;
	var vUrl = "php/02Controladores/CUsers.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
	
		if(vRes[0] == 0){
			alert("Eliminado correctamente.");
			cargaCatalogoUsers($("#paginador").pagination("getCurrentPage"));
		}

		$.unblockUI();
	});

}





