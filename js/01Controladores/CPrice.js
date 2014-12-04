$(document).ready(function() {	
	

});	

function exportaPDF(){
	
	$.blockUI(); 

	var vDatos = "acc=exportaPDF";
	var vUrl = "php/02Controladores/CPrice.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {

		window.open('media/pdf/price.pdf', '_blank');

		$.unblockUI();
	});

}

function imprimePDF(){
		
	$.blockUI(); 

	var vDatos = "acc=imprimePDF";
	var vUrl = "php/02Controladores/CPrice.php";

	peticionAjax(vDatos, vUrl).done(function(vRes) {

		window.open('media/pdf/priceImp.pdf', '_blank');	

		$.unblockUI();
	});
}

