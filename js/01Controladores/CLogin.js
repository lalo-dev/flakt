$(document).ready(function() {


	if(obtenerParametroUrl("acc") != null){
		
		$.blockUI(); 

		var vKey = obtenerParametroUrl("key");

		var vDatos = "acc=activaCuenta&key="+ vKey;
		var vUrl = "php/02Controladores/CLogin.php";

		peticionAjax(vDatos, vUrl).done(function(vRes) {

			if(vRes[0] == 0){
				$("#cMensajes").html(msjVerdeCerrable("<strong> Account activated successfully. </strong>"));
			}
			

		$.unblockUI();

	});
	}

	$("#btnRegister").magnificPopup({
	  	items: {
      		src: '#mdlRegister',
      		type: 'inline'
	  	},
  		callbacks: {
			beforeOpen: function() {
				inicaRegister();
			}					
		}	
	});	

});	
function validaUsuario(){
	
	$.blockUI(); 
	$("#cMensajes").html("");
	
	var vUsuario = htmlEntities($("#txtUsuario").val());
	var vContrasenia = htmlEntities($("#txtContrasenia").val());

	var vDatos = "acc=validaUsuario&PUsuario=" + vUsuario + "&PContrasenia=" + vContrasenia;
	var vUrl = "php/02Controladores/CLogin.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {

		if(vRes == 1){
			window.location.href = "main.php";
		}else if(vRes == 2){
			$("#cMensajes").html(msjRojoCerrable("<strong> Your account is inactive. </strong>"));
		}else{
			$("#cMensajes").html(msjRojoCerrable("<strong> Incorrect data. </strong>"));
		}

		$.unblockUI();

	});


}

function inicaRegister(){

	$.blockUI(); 

	$("#mdlMensajes").html("");
	
	var vDatos = "acc=inicaRegister";
	var vUrl = "php/02Controladores/CLogin.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {
		$("#btnGuardar").show();
		$("#mdlRegisterBody").html(vRes);

		$.unblockUI();

	});

}

function guardaRegister(){

	if(!validaRegister()){
		return;
	}

	$.blockUI(); 

	var vDatos = $('#frmRegister').serialize() + "&acc=guardaRegister";
	var vUrl = "php/02Controladores/CLogin.php";

	peticionAjaxJSON(vDatos, vUrl).done(function(vRes) {

		if(vRes.Errores.length == 0){
			$("#btnGuardar").hide();
			$("#mdlRegisterBody").html(msjVerdeCerrable("<strong> Thank You!. A confirmation Email has been sent to your Email, please verify to activate your account. </strong>"));
		}else{
			$("#mdlMensajes").html(msjRojoCerrable("<strong> "+ vRes.Errores[0].ErrorDesc +" </strong>"));
		}

		$.unblockUI();
	});

}

function validaRegister(){
	
	$("#frmRegister .form-group").removeClass("has-error");

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
