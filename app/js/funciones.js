// coloca "0" a numeros menores de 10
function pad(s) {
  return (s < 10) ? "0" + s : s;
}

//formatea un numero a 2 decimales y con separador de miles
function appFormatMoney(num, c) {
  // c = cantidad decimales
  var d = "."; //decimales
  var t = ","; //miles
  var s = num < 0 ? "-" : "";
  var i = String(parseInt(num = Math.abs(Number(num) || 0).toFixed(c)));
  var j = (j = i.length) > 3 ? j % 3 : 0;

  return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(num - i).toFixed(c).slice(2) : "");
};

//selecciona todas las filas en una Grid
function toggleAll(source,name){
  let checkboxes = document.getElementsByName(name);
  for(let x=0; x<checkboxes.length; x++) {
    checkboxes[x].checked = source.checked;
  }
}

//devuleve la URL absoluta del servidor
function appUrlServer(){
  let loc = window.location;
  let pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
  return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}

//convierte una fecha dd/mm/yyyy a yyyymmdd o yyyy-mm-dd (dependiendo del simbolo= "" "-")
function appConvertToFecha(miFecha,simbolo){
  var fecha = miFecha.split("/");
  var rpta = fecha.reverse().join(simbolo);
  return rpta;
}

//convierte un numero formateado con comas a numero
function appConvertToNumero(numFormateado){
  var preNumero = numFormateado.split(",");
  var rpta = preNumero.join("");
  return Number(rpta);
}

//establecer un texto de un textbox o combobox a un label
function appSetTexto(miTarget,miSource,esCombo){
  if(esCombo){
    $(miTarget).html($(miSource+" option:selected").text());
  } else{
    $(miTarget).html($(miSource).val());
  }
}

//llenar un combobox con la data YA extraida de la DB
function appLlenarDataEnComboBox(data,miComboBox,valorSelect){
  let miData = "";
  $.each(data,function(key, valor){ miData += '<option value="'+parseInt(valor.ID)+'" '+((valor.ID==valorSelect) ? ("selected") : (""))+'>'+(valor.nombre)+'</option>'; });
  $(miComboBox).html(miData);
}

//llama a la funcion AJAX para obtener los datos
function appAjaxQuery(datos,ruta){
  //let uri = (ruta==undefined) ? ("includes/sql_select.php") : (ruta);
  //console.log(datos)
  //console.log(ruta)
  let rpta = $.ajax({
    type : 'POST',
    dataType : 'json',    
    url : ruta,      
    data : {appSQL : JSON.stringify(datos)}
  })
  .done( function(data) {

   // console.log(JSON.stringify(data));
    //return 
})
  .fail(function(xhr, status, error) {
    //Ajax request failed.
    swal({
      title: "Se ha producido un error inesperado",
      text: "Comunícate con soporte técnico para recibir ayuda.",
      icon: "error",
      dangerMode: true,
    })
    //var errorMessage = xhr.status + ': ' + xhr.statusText
    //console.log('Error - ' + errorMessage);
    //console.log('Error - ' + status);
    //console.log('Error - ' + error);
});
  return rpta;
}

//llenar un combobox con la data YA extraida de la DB
function appLlenarDataEnComboBoxCodigo(data,miComboBox,valorSelect){
  let miData = "";
  $.each(data,function(key, valor){ miData += '<option value="'+(valor.codigo)+'" '+((valor.ID==valorSelect) ? ("selected") : (""))+'>'+(valor.codigo)+'</option>'; });
  $(miComboBox).html(miData);
}

function appLlenarDataEnComboInput(data,miComboBox,valorSelect){
  let miData = "";
  $.each(data,function(key, valor){ miData += '<option  data-value="'+parseInt(valor.ID)+'" value="'+(valor.codigo)+'" '+((valor.ID==valorSelect) ? ("selected") : (""))+'>'; });
  $(miComboBox).html(miData);
}




