function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

function obtenerParametroUrl(vParam)
{
    var vPagURL = window.location.search.substring(1);
    var vURLVars = vPagURL.split('&');
    for (var i = 0; i < vURLVars.length; i++)
    {
        var vNomParam = vURLVars[i].split('=');
        if (vNomParam[0] == vParam)
        {
            return vNomParam[1];
        }
    }
}

function validaEstruturaMail(mail) {
    
    if (/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/.test(mail)){
        return true;
    }else{
        return false;
    }

}

function peticionAjax(datos,url){

  return  $.ajax({
        data: datos,
        type: "POST",
        url: url,
        error: function (xhr, ajaxOptions, thrownError) {
              alert("Error: " + thrownError + "Status: " + xhr.status);
              $.unblockUI();
            },
      });

}

function peticionAjaxJSON(datos,url){

  return  $.ajax({
        data: datos,
        type: "POST",
        url: url,
        dataType: "json",
        error: function (xhr, ajaxOptions, thrownError) {
              alert("Error: " + thrownError + "Status: " + xhr.status);
              $.unblockUI();
            },
      });

}

function onKPSoloNum(evt){
  
  if(evt.keyCode != 13){
      var theEvent = evt || window.event;
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode( key );

      var regex = /[0-9]|\./;
      if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
      }
    }

}

function validaSesion(){

  var vDatos = "acc=validaSesion";
  var vUrl = "php/02Controladores/CLogin.php";

  peticionAjax(vDatos, vUrl).done(function(vRes) {
      
      if(vRes == 0){
        window.location.href = "login.php";
      }
      
  });
}

function cerrarSesion(){
  
  var vDatos = "acc=cerrarSesion";
  var vUrl = "php/02Controladores/CLogin.php";

  peticionAjax(vDatos, vUrl).done(function(vRes) {
      
      if(vRes == 0){
        window.location.href = "login.php";
      }
      
  });

}

function msjRojoCerrable(mensaje){

  return  "<div class='alert alert-danger alert-dismissible' role='alert'>"
              + "<button type='button' class='close' data-dismiss='alert'>"
              + "<span aria-hidden='true'>&times;</span>"
              + "<span class='sr-only'>Close</span></button>"
          + mensaje 
          + "</div> ";

}

function msjVerdeCerrable(mensaje){

  return  "<div class='alert alert-success alert-dismissible' role='alert'>"
              + "<button type='button' class='close' data-dismiss='alert'>"
              + "<span aria-hidden='true'>&times;</span>"
              + "<span class='sr-only'>Close</span></button>"
          + mensaje 
          + "</div> ";

}

function limpiarformulario(formulario){

   /* Se encarga de leer todas las etiquetas input del formulario*/
   $(formulario).find('input').each(function() {
      switch(this.type) {
         case 'password':
         case 'text':
         case 'hidden':
              $(this).val('');
              break;
         case 'checkbox':
         case 'radio':
              this.checked = false;
      }
   });
 
   /* Se encarga de leer todas las etiquetas select del formulario */
   $(formulario).find('select').each(function() {
       $("#"+this.id + " option[value='']").attr("selected",true);
   });
   /* Se encarga de leer todas las etiquetas textarea del formulario */
   $(formulario).find('textarea').each(function(){
      $(this).val('');
   });

}