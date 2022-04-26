var rutaSQL = "pages/catalogos/arbol/sql.php";
var uni_ope = "";
//=========================funciones para workers============================
function appBotonReset(){
  let datos ={
    TipoQuery : "selUniOpera",
    uniopeID  : $("#id_uniopera").val()
  }

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    let setting = {
      view  : { showLine: true, selectedMulti: false },
      check : { enable: true },
      data  : {
        simpleData: {
            enable : true,
            idKey  : "id",
            pIdKey : "pId"
        }
      },
      callback:{
        onClick : onClick
      }
    };
    $("#lbl_uniopera").html(resp.uniopera.descripcion);
    uni_ope=resp.uniopera.codigo;
    $.fn.zTree.init($("#appTreeView"), setting, resp.arbol);
    $("#txt02_Fecha").datepicker("setDate",moment().format("DD/MM/YYYY"));

    let datos = {
      TipoQuery : "datosgrafica"
    }
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      appLlenarDataEnComboBox(resp.contenidos,"#cbo07_Contenidos",0);
      appLlenarDataEnComboBox(resp.contenidos,"#cbo06_Contenidos",0);
    });
  });
}

function onClick(event, treeId, treeNode, clickFlag) {
  if(treeNode.id.substr(0,1)!="C"){
    let datos = {
      TipoQuery : "datosArbol",
      arbolID : treeNode.id,
      padreID : treeNode.pId
    }
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      //console.log(resp);
      $("#hid_ActivoID").val(treeNode.id);
      $("#lbl_ActivoNro").html(resp.activos.codigo);
      $("#lbl_ActivoDescripcion").html(resp.activos.descripcion);
      $("#lbl_ActivoGrupo").html(resp.activos.padreCodigo);
      $("#lbl_ActivoGrupoDescripcion").html(resp.activos.padreDescri);
      $("#lbl_ActivoNroPrincipal").html(resp.activos.prnCodigo);
      $("#lbl_ActivoGrpPrincipal").html(resp.activos.prnDescri);
      $("#lbl_ActivoCategoria").html(resp.activos.prnCategoria);
      $("#lbl_ActivoMantenible").html('SI');
      //solicitud
      app02GridAll();
      appLlenarDataEnComboBox(resp.prioridad,"#cbo02_Prioridad",0);
      appLlenarDataEnComboBox(resp.tipotrabajo,"#cbo02_TipoSolTrabajo",0);
      appLlenarDataEnComboBox(resp.departamento,"#cbo02_DepAsignado",0);
      appLlenarDataEnComboBox(resp.departamento,"#cbo03_DepAsignado",0);
      //appLlenarDataEnComboBox(resp.contenidos,"#cbo06_Contenidos",0);
      //appLlenarDataEnComboBoxCodigo(resp.equipos,"#cbo06_Equipos",0);
      //appLlenarDataEnComboBox(resp.contenidos,"#cbo07_Contenidos",0);
      //appLlenarDataEnComboBoxCodigo(resp.equipos,"#cbo07_Equipos",0);       
      $("#txt02_NroActivo").val("");
      $("#txt02_Fecha").datepicker("setDate",moment().format("DD/MM/YYYY"));
      $("#txt02_UsuarioSolicita").val("");
      $("#txt02_Descripcion").val("");
      $("#txt02_Creador").val("");
      $("#txt02_Creador_correo").val("");
      $("#txt02_Telefono").val("");
      $("#txt02_Correo").val("");
      app02Estado(true);
      $("#btn02_New").show();
      $("#btn02_Save").hide();
      $("#btn02_Update").hide();
      $("#div02_Search").show();
      $("#btn02_Cancel").hide();
      //$("#div03_Search").show();

      //OT
      app03GridAll();
      //app06gridControl();
    });
  }
}

function appActivosFiltro(treeId, parentNode, childNodes) {
  return childNodes;
}

function app01Boton_GO(){
  switch($("#cbo01_Visualizar").val()){
    case "1":
      app02Boton_new();
      $('[href="#datos02"]').tab('show');
      break;
    case "2":
      $('[href="#datos02"]').tab('show');
      app02Boton_cancel();
      break;
  }
}


//formulario para accion nuevo ST
function app02Boton_new(){
  let datos = {
    TipoQuery : "02_nuevo"
  }

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    $("#txt02_NroActivo").val($("#lbl_ActivoGrupo").html()+' - '+$("#lbl_ActivoNro").html());
    $("#txt02_Fecha").datepicker("setDate",moment().format("DD/MM/YYYY"));
    $("#txt02_UsuarioSolicita").val(resp.usuario);
    $("#txt02_Descripcion").val("");
    $("#txt02_Creador").val(resp.usuario);
    $("#txt02_Creador_correo").val("");
    $("#txt02_Telefono").val(resp.telefono);
    $("#txt02_Correo").val("");
    app02Estado(false);
    $("#grid02").hide();
    $("#edit02").show();
    $("#btn02_Cancel").show();
    $("#btn02_Save").show();
    $("#btn02_Update").hide();
    $("#btn02_New").hide();
    $("#div02_Search").hide();
    
  });
}

function app02Boton_ins(){
  let datos = app02GetDatos_ToDatabase();
  if(datos!=""){
    datos.commandSQL = "INS";
    console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        app02Boton_cancel();
        app02GridAll();
        alert("!!!LA SOLICITUD DE TRABAJO "+(resp.soliciID)+" SE CREO EN ESTADO: ABIERTO!!!");
      }
    });
  } else {
    alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
  }
}


function app02Boton_cancel(){
  //solicitud
  $("#txt02_NroActivo").val("");
  $("#txt02_Fecha").datepicker("setDate",moment().format("DD/MM/YYYY"));
  $("#txt02_UsuarioSolicita").val("");
  $("#txt02_Descripcion").val("");
  $("#txt02_Creador").val("");
  $("#txt02_Creador_correo").val("");
  $("#txt02_Telefono").val("");
  $("#txt02_Correo").val("");
  app02Estado(true);
  $("#grid02").show();
  $("#edit02").hide();
  $("#btn02_Update").hide();
  $("#btn02_New").show();
  $("#btn02_Save").hide();
  $("#btn02_Cancel").hide();
  $("#div02_Search").show();
}

function app03Boton_cancel(){
  //solicitud
  $("#txt03_NroActivo").val("");
  $("#txt03_Fecha").datepicker("setDate",moment().format("DD/MM/YYYY"));
  $("#txt03_OT").val("");
  $("#txt03_Descripcion").val("");
  $("#txt03_GrupActivo").val("");
  $("#txt03_Duracion").val("");
  $("#txt03_HoraIni").data("DateTimePicker").clear();
  $("#txt03_HoraFin").data("DateTimePicker").clear();
  $("#divhorini").hide();
  $("#divhorfin").hide();
  dataFileOT="-";
  isfile=false;
  $("#image").val(''); 
  $('#buttonPDF').remove();
  //$('#txt03_HoraIni').val("");

//$('#txt03_HoraFin').val("");

  //$('#txt03_HoraIni').datepicker('setDate', null).datepicker('fill');
  //$('#txt03_HoraFin').datepicker('setDate', null).datepicker('fill');
  //$('.txt03_HoraIni').val('');
  //$('.txt03_HoraFin').val('');
  //$('#txt03_HoraIni').datetimepicker({
  //  format: "HH:mm"});
  //  $('#txt03_HoraFin').datetimepicker({
  //    format: "HH:mm"});
  //$("#txt03_HoraIni").data("DateTimePicker").date(null);
  //$("#txt03_HoraFin").data("DateTimePicker").date(null);
  //$("#txt02_Telefono").val("");
  //$("#txt02_Correo").val("");
  //app02Estado(true);
  $("#grid03").show();
  $("#edit03").hide();
  $("#btn03_Update").hide();
  //$("#btn02_New").show();
  //$("#btn02_Save").hide();
  $("#btn03_Cancel").hide();
  //$("#div02_Search").show();
  //$("#div03_Search").hide();
}

  /**
 * Get the week number of the month, from "First" to "Last"
 * @param {Date} date 
 * @returns {string}
 */
   function weekOfTheMonth(date) {
    const day = date.getDate()
    const weekDay = date.getDay()
    let week = Math.ceil(day / 7)
    
    const ordinal = ['Primera', 'Segunda', 'Tercera', 'Cuarta', 'Quinta']
    const weekDays  = ['Sunday','Monday','Tuesday','Wednesday', 'Thursday','Friday','Saturday']
    
  
    // Check the next day of the week and if it' on the same month, if not, respond with "Last"
    const nextWeekDay = new Date(date.getTime() + (1000 * 60 * 60 * 24 * 7))
    if (nextWeekDay.getMonth() !== date.getMonth()) {
      week = 5
    }
    
    return `${ordinal[week - 1]}`
    //return `${ordinal[week - 1]}`
  }


function app02GetDatos_ToDatabase(){
  let EsError = false;
  let rpta = "";

  $('.box-body .form-group').removeClass('has-error');
  //if($("#txtDocum_Valor").val()=="") { $("#divDocum_Valor").prop("class","form-group has-error"); EsError = true; }

  if(!EsError){
    console.log(appConvertToFecha($("#txt02_Fecha").val(),"-").toString());
    const month = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Setiembre","Octubre","Noviembre","Diciembre"];

    var d = new Date(appConvertToFecha($("#txt02_Fecha").val(),"-").toString());
    let name = month[d.getMonth()];
    
    var sem = weekOfTheMonth(d);
    var m =name;
    var a = d.getFullYear();
    
    rpta = {
      TipoQuery : "02_exec",
      //solitraID : 0,
      solitraID : $("#txt02_id").val(),
      unidad: uni_ope,
      codarbol : $("#lbl_ActivoNro").html(),
      estado   : 'En espera de planificación',
      estado_st   : 'En espera de planificación',
      razon_st   : 'Pendiente',
      status: '1',
      prioriID : $("#cbo02_Prioridad").val(),
      tipotraID : $("#cbo02_TipoSolTrabajo").val(),
      depasigID : $("#cbo02_DepAsignado").val(),
      depasigOTID : 0,
      //duracion : '-',
      horaini: $('#txt03_HoraIni').val(),
      horafin: $('#txt03_HoraFin').val(),
      //departamento : 0,
      fecha : appConvertToFecha($("#txt02_Fecha").val(),"-"),
      solicitado : $("#txt02_UsuarioSolicita").val(),
      descripcion : $("#txt02_Descripcion").val(),
      creado : $("#txt02_Creador").val(),
      creado_correo : $("#txt02_Creador_correo").val(),
      notifica : $("#cbo02_NotificaUser").val(),
      telefono : $("#txt02_Telefono").val(),
      correo : $("#txt02_Correo").val(),
      tipOT: "Preventivo",
      file_base64:"-",
      file_nombre:"-",
      file_tamanio:"-",
      file_tipo:"-",
      semana: sem,
      mes: m,
      anio:a,
      horaini: 0,
      horafin:0
    }
  }
  return rpta;
}

function uploadFile(event){
  
  console.log("dasdasdas");
  //var namephoto = $("#af_rpta_propertyland_filename").val();
  var file=event.target.files[0];

  //var filename = namephoto.length > 1 ? name + ".pdf" : file.name;
    var filetype = file.type;
    var filesize = file.size;

    lert(namephoto);
    alert(file.name);
    alert(filetype);
    alert(filesize);

}

var dataFileOT="-";
var isfile=false;
$("#image").on("change", function(e) {
  
 
  //var name = $("#af_rpta_propertyland_filename").val()
  var file = e.target.files[0];

  if(file.size > 2000000) {
    alert("El archivo debe pesar menos de 2MB!!");
    return;
  }else if(file.type!="application/pdf"){
    alert("Solo se permiten archivos PDFs!!");
  }else{
    //, filename = name.length > 1 ? name + ".pdf" : file.name
  var filename = file.name
  , filetype = file.type
  , filesize = file.size;
  dataFileOT = {
      "filename":filename,
      "filetype":filetype,
      "filesize":filesize
    };
  reader = new FileReader();

  //console.log(dataFileOT);
    reader.onload = function(e) {
      dataFileOT.file_base64 = e.target.result.split(/,/)[1];
        /* $.post("fileupload.php", {file:data}, "json")
        .then(function(data) {
          // parse `json` string `data`
          var filedata = JSON.parse(data)
          // do stuff with `data` (`file`) object
          , results = $("<a />", {
                "href": "data:" + filedata.filetype 
                        + ";base64," + filedata.file_base64,
                "download": filedata.filename,
                "target": "_blank",
                "text": filedata.filename
              });
          $("body").append("<br>download:", results[0]);
        }, function(jqxhr, textStatus, errorThrown) {
          console.log(textStatus, errorThrown)
        }) */
    };
    reader.readAsDataURL(file)
  }
  
});

function app03GetDatos_ToDatabase(){
  let EsError = false;
  let rpta = "";

  $('.box-body .form-group').removeClass('has-error');
  //if($("#txtDocum_Valor").val()=="") { $("#divDocum_Valor").prop("class","form-group has-error"); EsError = true; }

  if(!EsError){
    console.log(appConvertToFecha($("#txt03_Fecha").val(),"-").toString());
    const month = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Setiembre","Octubre","Noviembre","Diciembre"];

    var d = new Date(appConvertToFecha($("#txt03_Fecha").val(),"-").toString());
    let name = month[d.getMonth()];
    
    var sem = weekOfTheMonth(d);
    var m =name;
    var a = d.getFullYear();
    
    //var reader = new FileReader();
        //file = $('#image')[0];
    //var file = $("#image")[0].files[0]; 

    //var file = $('#image').get(0).files;
    //var namephoto = $("#af_rpta_propertyland_filename").val();

    /* var filename = namephoto.length > 1 ? name + ".pdf" : file.name;
    var filetype = file.type;
    var filesize = file.size;
    alert(namephoto);
    alert(filename);
    alert(filetype);
    alert(filesize); */
    /* if (!file.files.length) {
        alert('no file uploaded');
        return false;
    }
 */
    
    if(isfile==false){
      if((dataFileOT==="-" || dataFileOT===null)){
        dataFileOT = {
          "file_base64":"-",
          "filename":"-",
          "filetype":"-",
          "filesize":"-"
        };

      }
    }
    rpta = {
      TipoQuery : "03_exec",
      file_base64: dataFileOT.file_base64,
      file_name: dataFileOT.filename,
      file_size: dataFileOT.filesize,
      file_type: dataFileOT.filetype,
      //solitraID : 0,
      solitraID : $("#txt03_id").val(),
      //codarbol : $("#lbl_ActivoNro").html(),
      estado   : $("#cbo03_Status").val(),
      duracion   : $("#txt03_Duracion").val(),
      //estado_st   : 'pendiente',
      //prioriID : $("#cbo02_Prioridad").val(),
      //tipotraID : $("#cbo02_TipoSolTrabajo").val(),
      depasigID : $("#cbo03_DepAsignado").val(),
      //departamento : 0,
      fecha : appConvertToFecha($("#txt03_Fecha").val(),"-"),
      horaini: $("#txt03_HoraIni").val()+":00",
      horafin: $("#txt03_HoraFin").val()+":00",
      //solicitado : $("#txt02_UsuarioSolicita").val(),
      descripcion : $("#txt03_Descripcion").val(),
      tipOT: $("#cbo03_TipOT").val(),
      //creado : $("#txt02_Creador").val(),
      //creado_correo : $("#txt02_Creador_correo").val(),
      //notifica : $("#cbo02_NotificaUser").val(),
      //telefono : $("#txt02_Telefono").val(),
      //correo : $("#txt02_Correo").val()
      semana: sem,
      mes: m,
      anio:a
    }
  }
  return rpta;
}

function app02Estado(ss){
  $("#txt02_Fecha").prop("disabled",ss);
  $("#cbo02_Prioridad").prop("disabled",ss);
  $("#cbo02_TipoSolTrabajo").prop("disabled",ss);
  $("#cbo02_DepAsignado").prop("disabled",ss);
  $("#txt02_Descripcion").prop("disabled",ss);
  $("#txt02_Telefono").prop("disabled",ss);
  $("#txt02_Correo").prop("disabled",ss);
  $("#cbo02_NotificaUser").prop("disabled",ss);
}

function app02GridAll(){
  $('#grd02DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : '02_grid',
    codarbol : $("#lbl_ActivoNro").html()
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        fila += '<td><button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="Aprobar" onclick="javascript:app02Boton_approve('+valor.ID+');"><i class="fa fa-check"></i></button>'+
        '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Rechazar" onclick="javascript:app02Boton_refuse('+valor.ID+');"><i class="fa fa-times"></i></button>'+
        '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app02Boton_laod('+valor.ID+');"><i class="fa fa-pencil"></i></button>'+
        '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app02Boton_delete('+valor.ID+');"><i class="fa fa-trash"></i></button></td>';
        
        fila += '<td>'+'UO-'+(valor.unidad)+'-SOL-'+(valor.ID)+'</td>';
        fila += '<td>'+(valor.descripcion)+'</td>';
        fila += '<td>'+(valor.estado_st)+'</td>';
        //fila += '<td>'+(valor.codarbol)+'</td>';
        fila += '</tr>';
      });
      $('#grd02DatosBody').html(fila);
    }else{
      $('#grd02DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

//formulario para accion nuevo ST
function app02Boton_laod($id){
  let datos = {
    TipoQuery : "02_getbyid",
    id_solitra: $id
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    //$("#txt02_NroActivo").val($("#lbl_ActivoGrupo").html()+' - '+$("#lbl_ActivoNro").html());
    $("#txt02_id").val(resp.tabla[0].ID);
    $("#txt02_Fecha").datepicker("setDate",moment(resp.tabla[0].fecha).format("DD/MM/YYYY"));
    $("#txt02_UsuarioSolicita").val(resp.tabla[0].solicitado);
    $("#txt02_Descripcion").val(resp.tabla[0].descripcion);
    $("#txt02_Creador").val(resp.tabla[0].creado);
    $("#txt02_Creador_correo").val(resp.tabla[0].correo);
    $("#txt02_Telefono").val(resp.tabla[0].telefono);
    //$("#txt02_Correo").val();
    $("#cbo02_Prioridad").val(resp.tabla[0].id_priori);
    $("#cbo02_DepAsignado").val(resp.tabla[0].departamento);
    $("#cbo02_TipoSolTrabajo").val(resp.tabla[0].id_tipotra);
    $("#cbo02_NotificaUser").val(resp.tabla[0].notifica);
    $("#txt02_NroActivo").val(resp.tabla[0].cod_arbol);
    app02Estado(false);
    $("#grid02").hide();
    $("#edit02").show();
    $("#btn02_Cancel").show();
    $("#btn02_Save").hide();
    $("#btn02_Update").show();
    $("#btn02_New").hide();
    $("#div02_Search").hide();
  });
}

//progrmación pendiente
function app02Boton_update(){
  let datos = app02GetDatos_ToDatabase();
  if(datos!=""){
    datos.commandSQL = "UPD";
    console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        app02Boton_cancel();
        app02GridAll();
        alert("!!!LA SOLICITUD DE TRABAJO "+(resp.soliciID)+" SE ACTUALIZO!!!");
      }
    });
  } else {
    alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
  }
}


function app02Boton_delete($id){

  if(confirm("¿Esta seguro que desea eliminar la ST N°"+$id+"?")){
    let datos = {
      TipoQuery: "02_exec",
      commandSQL : "DEL",
      status: 0,
      solitraID: $id
    }
    //console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        //app02Boton_cancel();
        app02GridAll();
        alert("!!!LA SOLICITUD DE TRABAJO "+$id+" SE ELIMINO!!!");
      }
    });
  }
  else{
      return false;
  }
  
}


function app02Boton_approve($id){

  if(confirm("¿Esta seguro que desea aprobar la ST N°"+$id+"?")){
    let datos = {
      TipoQuery: "02_exec",
      commandSQL : "APV",
      estado: "Aprobado",
      solitraID: $id
    }
    //console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        //app02Boton_cancel();
        app02GridAll();
        app03GridAll();
        alert("!!!LA SOLICITUD DE TRABAJO "+$id+" FUE APROBADA!!!");
      }
    });
  }
  else{
      return false;
  }
  
}


function app02Boton_refuse($id){

  let reason = prompt("Ingrese la razón de rechazo");
  if (reason == null || reason == "") {
    return false;
  } else {
    let datos = {
      TipoQuery: "02_exec",
      commandSQL : "RFS",
      estado: "Rechazado",
      razon: reason,
      solitraID: $id
    }
    //console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        //app02Boton_cancel();
        app02GridAll();
        alert("!!!LA SOLICITUD DE TRABAJO "+$id+" FUE RECHAZADA!!!");
      }
    });
  } 
}

function app02Boton_Search(){
  $('#grd02DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txt02_Buscar_solicitud").val();
  let datos = {
    TipoQuery : '02_grid_search',
    codarbol : $("#lbl_ActivoNro").html(),
    search_text : $("#txt02_Buscar_solicitud").val()
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        fila += '<td><button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="Aprobar" onclick="javascript:app02Boton_approve('+valor.ID+');"><i class="fa fa-check"></i></button>'+
        '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Rechazar" onclick="javascript:app02Boton_refuse('+valor.ID+');"><i class="fa fa-times"></i></button>'+
        '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app02Boton_laod('+valor.ID+');"><i class="fa fa-pencil"></i></button>'+
        '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app02Boton_delete('+valor.ID+');"><i class="fa fa-trash"></i></button></td>';
        
        fila += '<td>'+'UO-'+(valor.unidad)+'-SOL-'+(valor.ID)+'</td>';
        fila += '<td>'+(valor.descripcion)+'</td>';
        fila += '<td>'+(valor.estado_st)+'</td>';
        //fila += '<td>'+(valor.codarbol)+'</td>';
        fila += '</tr>';
      });
      $('#grd02DatosBody').html(fila);
    }else{
      $('#grd02DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}


function app03Boton_Search(){
  $('#grd03DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txt03_Buscar_solicitud").val();
  let datos = {
    TipoQuery : '03_grid_search',
    codarbol : $("#lbl_ActivoNro").html(),
    search_text : $("#txt03_Buscar_solicitud").val()
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        if(valor.estado==="Cerrada"){
          fila += '<td><button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app03Boton_laod('+valor.ID+');" disabled><i class="fa fa-pencil"></i></button></td>';
        }else{
          fila += '<td><button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app03Boton_laod('+valor.ID+');"><i class="fa fa-pencil"></i></button></td>';
        }
        /* fila += '<td><button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app03Boton_laod('+valor.ID+');"><i class="fa fa-pencil"></i></button></td>'; */
        fila += '<td>'+'UO-'+(valor.unidad)+'-OT-'+(valor.ID)+'</td>';
        fila += '<td>'+(valor.descripcion)+'</td>';
        fila += '<td>'+(valor.estado)+'</td>';
        fila += '</tr>';
      });
      $('#grd03DatosBody').html(fila);
    }else{
      $('#grd03DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

function app03GridAll(){
  $('#grd03DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : '03_grid',
    codarbol : $("#lbl_ActivoNro").html()
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        if(valor.estado==="Cerrada"){
          fila += '<td><button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app03Boton_laod('+valor.ID+');" disabled><i class="fa fa-pencil"></i></button></td>';
        }else{
          fila += '<td><button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app03Boton_laod('+valor.ID+');"><i class="fa fa-pencil"></i></button></td>';
        }
        
        fila += '<td>'+'UO-'+(valor.unidad)+'-OT-'+(valor.ID)+'</td>';
        fila += '<td>'+(valor.descripcion)+'</td>';
        fila += '<td>'+(valor.estado)+'</td>';
        fila += '</tr>';
      });
      $('#grd03DatosBody').html(fila);
    }else{
      $('#grd03DatosBody').html('<tr><td colspan="3" style="text-align:center;color:red;">Sin Resultados</td></tr>');
    }
    //$('#grd03DatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

function app03Boton_laod($id){
  let datos = {
    TipoQuery : "03_getbyid",
    id_solitra: $id
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    //$("#txt02_NroActivo").val($("#lbl_ActivoGrupo").html()+' - '+$("#lbl_ActivoNro").html());
    $("#txt03_id").val(resp.tabla[0].ID);
    $("#cbo03_Status").val(resp.tabla[0].estado);
    $("#txt03_Fecha").datepicker("setDate",moment(resp.tabla[0].fecha).format("DD/MM/YYYY"));
    //$("#txt03_HoraIni").datepicker("setDate",moment(resp.tabla[0].fecha).format("DD/MM/YYYY"));
    /* var d = new Date(); */
    // hours, minutes, seconds
    /* var hi = resp.tabla[0].horaini;
    var h = hi.substr(0, 2);
    var m = hi.substr(3,2); */
    //var hf = resp.tabla[0].horafin;
    
    //d.setHours("12:12:00");
   /*  d.setHours(h);
    d.setMinutes(m) */
    //alert(defaultStartTime);
    $('#txt03_HoraIni').datetimepicker({
      format: "HH:mm"});
    
    

    $('#txt03_HoraFin').datetimepicker({
       format: 'HH:mm'/* , defaultDate:d */});
     
    
    //$("#txt02_UsuarioSolicita").val(resp.tabla[0].solicitado);
    $("#txt03_Descripcion").val(resp.tabla[0].descripcion);
    //$("#txt02_Creador").val(resp.tabla[0].creado);
    //$("#txt02_Creador_correo").val(resp.tabla[0].correo);
    //$("#txt02_Telefono").val(resp.tabla[0].telefono);
    //$("#txt02_Correo").val();
    //$("#cbo02_Prioridad").val(resp.tabla[0].id_priori);
    $("#cbo03_DepAsignado").val(resp.tabla[0].departamento);
    $("#txt03_Duracion").val(resp.tabla[0].duracion);
    //$("#cbo02_TipoSolTrabajo").val(resp.tabla[0].id_tipotra);
    //$("#cbo02_NotificaUser").val(resp.tabla[0].notifica);
    $("#txt03_OT").val('UO-'+resp.tabla[0].unidad+'-OT-'+resp.tabla[0].ID);
    $("#txt03_NroActivo").val(resp.tabla[0].cod_arbol);
    $("#txt03_GrupActivo").val(resp.tabla[0].cod_arbol);
    $("#txt03_NroActivo").val(resp.tabla[0].cod_arbol);
    $("#cbo03_TipOT").val(resp.tabla[0].tipOT);
    //app02Estado(false);
    //$("#grid02").hide();
    $("#grid03").hide();
    $("#edit03").show();
    $("#btn03_Cancel").show();
    //$("#btn02_Save").show();
    $("#btn03_Update").show();
    //$("#btn02_New").hide();

    // parse `json` string `data`
    //var filedata = JSON.parse(data)
    // do stuff with `data` (`file`) object
    /* console.log("data:" + resp.tabla[0].file_type);
    console.log("data:" + resp.tabla[0].file_base64); */
    console.log("data:" + resp.tabla[0].file_name);

    if(resp.tabla[0].file_name!= "-"){

      isfile=true;

      dataFileOT = {
        "file_base64":resp.tabla[0].file_base64,
        "filename":resp.tabla[0].file_name,
        "filetype":resp.tabla[0].file_type,
        "filesize":resp.tabla[0].file_size
      };

      var results = $("<a />", {
        "class": "btn btn-success",
        "id":"buttonPDF",
        "role":"button",
        "href": "data:" + resp.tabla[0].file_type 
                + ";base64," + resp.tabla[0].file_base64,
        "download": resp.tabla[0].file_name,
        "target": "_blank",
        "text": "Ver"
      });
      
      $(".verPDF").append(results[0]);

    }
    else{
      isfile=false;
    }
    


   
    //$(".verPDF").append(r);

    

  });
}

//progrmación pendiente
function app03Boton_update(){
  let datos = app03GetDatos_ToDatabase();
  if(datos!=""){
    datos.commandSQL = "UPD";
    console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        app03Boton_cancel();
        app03GridAll();
        alert("!!!LA ORDEN DE TRABAJO "+(resp.soliciID)+" SE ACTUALIZO!!!");
        //dataFileOT="-";
      }
    });
  } else {
    alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
  }
}

function app03ShowTime(sel)
{
  if(sel.value==="Cerrada"){
    $("#divhorini").show();
    $("#divhorfin").show();
  }else{
    $("#divhorini").hide();
    $("#divhorfin").hide();
    $("#txt03_HoraIni").data("DateTimePicker").clear();
    $("#txt03_HoraFin").data("DateTimePicker").clear();
  }

}









function appBotonDownload(){
  let datos = {
    TipoQuery  : 'downloadPredios',
    dmisioneroID  : $('#cboDMisioneros').val()
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    Jhxlsx.export(resp.tableData, resp.options);
  });
}

function appPredioBotonEditar(){
  Predio.editar($('#lbl_ID').html());
  $('#btn_modPredioUpdate').on('click',function(e) {
    if(Predio.sinErrores()){ //sin errores
      Predio.ejecutaSQL().done(function(resp){
        let data = JSON.parse(resp);
        appPredioSetData(data.tablaPredio);
        Predio.close();
      });
    } else {
      alert("!!!Faltan llenar Datos!!!");
    }
    e.stopImmediatePropagation();
    $('#btn_modPredioUpdate').off('click');
  });
}

function msToTime(s) {

  // Pad to 2 or 3 digits, default is 2
  function pad(n, z) {
    z = z || 2;
    return ('00' + n).slice(-z);
  }

  var ms = s % 1000;
  s = (s - ms) / 1000;
  var secs = s % 60;
  s = (s - secs) / 60;
  var mins = s % 60;
  var hrs = (s - mins) / 60;

  return pad(hrs) + ':' + pad(mins) + ':' + pad(secs) + '.' + pad(ms, 3);
}



function app06Boton_visual(){
  $("#chart").empty();
  /* $("#chart_indicador").empty();
  $("#chart_indicador_2").empty();
  $("#chart_tiempo_2").empty();
  $("#chart_tiempo").empty(); */

  var fecha = $("#cbo06_fecha").val();
  var anio = $("#txt06_anio").val();
  var mes = $("#cbo06_meses").val();
  var semana = $("#cbo06_semanas").val();
  var flota = $("#cbo06_Contenidos").val();
  var equipo = $("#cbo06_Equipos").val();

  if(flota==="0"){
    alert("Seleccione una flota!!");
    return;
  }
  if($.trim(anio) === ''){
    alert("Ingrese año!!");
    return;
  }
  
  //grafica 01
  var options = {
    series: [],
    chart: {
    height: 300,
    type: 'rangeBar',
    locales: [{
      name: 'en',
      options: {
        months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        shortMonths: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Set', 'Oct', 'Nov', 'Dic'],
        days: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
        shortDays: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        toolbar: {
          download: 'Descargar SVG',
          selection: 'Seleccionar',
          selectionZoom: 'Seleccionar Zoom',
          zoomIn: 'Aumentar',
          zoomOut: 'Disminuir',
          pan: 'Mover',
          reset: 'Reiniciar Zoom',
        }
      }
    }]
  },
  plotOptions: {
    bar: {
      horizontal: true,
      barHeight: '80%',
      rangeBarGroupRows: true
    }
  },
  xaxis: {
    type: 'datetime',
    labels: {
      datetimeFormatter: {
        year: 'yyyy',
        month: 'MMM \'yyyy',
        day: 'dd MMM',
        hour: 'hh:mm tt',
        minute:'hh:mm tt',
        second:'hh:mm tt'
      }
    }
    
    /* labels: {
      formatter: function (value, timestamp) {
          //return moment(timestamp, "hh:mm");
          return moment(value).format("DD MMM");
      },
  } */
  },
  stroke: {
    width: 1
  },
  fill: {
    type: 'solid',
    opacity: 0.6
  },
  legend: {
    position: 'top',
    horizontalAlign: 'left'
  },
  noData: {
    text: 'Loading...'
  },
  grid: {
    show: true,
    borderColor: '#90A4AE',
    strokeDashArray: 0,
    position: 'back',
    xaxis: {
        lines: {
            show: true
        }
    },   
    yaxis: {
        lines: {
            show: true
        }
    },  
    row: {
        colors: undefined,
        opacity: 0.5
    },  
    column: {
        colors: undefined,
        opacity: 0.5
    },  
    padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
    },  
},
  tooltip: {
    custom: function({series, seriesIndex, dataPointIndex, w}) {
      var data = w.globals.initialSeries[seriesIndex].data[dataPointIndex];
      var hini = new Date(data.fecha+" "+data.hora_ini).getTime();
      var hfin = new Date(data.fecha+" "+data.hora_fin).getTime();
      var dur = hfin-hini;
      console.log("duración:"+dur);
      dur = msToTime(dur);
      moment.locale('es');
      return '<div style="padding:6px;font-size: 12px;">'+
      '<ul class="list-unstyled">' +
      '<li><b>Equipo</b>: ' + data.x + '</li>' +
      '<li><b>Fecha</b>: ' + moment(data.fecha, "YYYY-MM-DD").format("LL") + '</li>' +
      '<li><b>Hora ini</b>: ' + moment(data.hora_ini, "HH:mm:ss").format("h:mm a") + '</li>' +
      '<li><b>Hora fin</b>: ' +moment(data.hora_fin, "HH:mm:ss.sss").format("h:mm a") + '</li>' +
      '<li><b>Duración</b>: ' +moment(dur, "h:m").format("HH:mm") +" hrs"+ '</li>' +
      '<li><b>Estado</b>: ' + data.estado + '</li>' +
      '<li><b>Supervisor</b>: ' + data.supervisor + '</li>' +
      '<li><b>descripcion</b>: ' + data.descripcion + '</li>' +
      '</ul>'+
      '</div>';

    }
  }
  };

  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();

  //fin

  console.log(fecha);
  console.log(anio);
  console.log(mes);
  console.log(semana);
  console.log(flota);
  console.log(equipo);

  

  let datos;
  var equipos=[];
  var solicitudes=[];
  let resultados=[];

  //todos meses, todos equipos
if(mes==="Todos" && equipo==="Todos los equipos"){

  datos = {
    TipoQuery : "07_getEquipos",
    contenido: flota
  }

  //todos los equipos de la flota seleccionada
  appAjaxQuery(datos,rutaSQL).done(function(resp){
 
    equipos=resp;
  
  });

  console.log("flota:"+flota);
  console.log("anio:"+anio);
  datos = {
    TipoQuery : "06_getAll",
    anio: anio,
    estado: "Cerrada"
  }

  //todas las solicitudes
  appAjaxQuery(datos,rutaSQL).done(function(resp){

      
    solicitudes=resp;

    console.log(equipos);
    console.log(solicitudes);

    for (sol of solicitudes) {

      for(equi of equipos.tabla){
        
        if(equi.codigo === sol.x){
          resultados.push(sol);
          
        }
      }
        
    }
    console.log(resultados);

    var corr=[], prev=[], pred=[];
    //var gmt = new Date("05:00:00");
    //console.log("gmt:"+gmt.getTime());
    for (elem of resultados) {
      
      console.log("tipo: "+elem.tipOT);
      //console.log("y0:"+elem.y[0]);
      //console.log("y1:"+elem.y[1]);
      var dateini = new Date(elem.y[0]);
      var datefin = new Date(elem.y[1]);
      
      //console.log(dateini);
      //console.log(datefin);
      var millini = dateini.getTime()-18000000;
      var millfin = datefin.getTime()-18000000;
      //console.log(millini);
      //console.log(millfin);
      elem.y[0]=millini;
      elem.y[1]=millfin;

      if(elem.tipOT === "Correctivo"){
        corr.push(elem);
      }else if(elem.tipOT === "Preventivo"){
        prev.push(elem);
      }else{
        pred.push(elem);
      }
      
    }

    console.log(corr);
    console.log(prev);
    console.log(pred);

    
    chart.updateSeries([
      {
        name: 'Correctivo',
        data: corr
      },
      {
        name: 'Preventivo',
        data: prev
      },
      {
        name: 'Predictivo',
        data: pred
      }
    ]);
      
  });
  return;
}

//todos meses, un equipo
if(mes==="Todos" && equipo!="Todos los equipos"){

  datos = {
    TipoQuery : "06_getEquiSolicitud",
    anio: anio,
    estado: "Cerrada",
    equipo: equipo
  }

   //todas las solicitudes
   appAjaxQuery(datos,rutaSQL).done(function(resp){

      
    resultados=resp;
    console.log(resultados);

    var corr=[], prev=[], pred=[];

    for (elem of resultados) {
      
      console.log("tipo: "+elem.tipOT);
      //console.log("y0:"+elem.y[0]);
      //console.log("y1:"+elem.y[1]);
      var dateini = new Date(elem.y[0]);
      var datefin = new Date(elem.y[1]);
      var millini = dateini.getTime()-18000000;
      var millfin = datefin.getTime()-18000000;
      elem.y[0]=millini;
      elem.y[1]=millfin;

      if(elem.tipOT === "Correctivo"){
        corr.push(elem);
      }else if(elem.tipOT === "Preventivo"){
        prev.push(elem);
      }else{
        pred.push(elem);
      }
      
    }

    console.log(corr);
    console.log(prev);
    console.log(pred);

    
    chart.updateSeries([
      {
        name: 'Correctivo',
        data: corr
      },
      {
        name: 'Preventivo',
        data: prev
      },
      {
        name: 'Predictivo',
        data: pred
      }
    ]);
    
   });
return;
}

//un mes, todos equipos
if(mes!="Todos" && equipo==="Todos los equipos"){

  datos = {
    TipoQuery : "07_getEquipos",
    contenido: flota
  }

  //todos los equipos de la flota seleccionada
  appAjaxQuery(datos,rutaSQL).done(function(resp){
 
    equipos=resp;
  
  });

  console.log("flota:"+flota);
  console.log("anio:"+anio);
  datos = {
    TipoQuery : "06_getAll_mes",
    anio: anio,
    estado: "Cerrada",
    mes: mes
  }

  //todas las solicitudes
  appAjaxQuery(datos,rutaSQL).done(function(resp){

    solicitudes=resp;

    console.log(equipos);
    console.log(solicitudes);

    for (sol of solicitudes) {

      for(equi of equipos.tabla){
        
        if(equi.codigo === sol.x){
          resultados.push(sol);
          
        }
      }
        
    }
    console.log(resultados);

    var corr=[], prev=[], pred=[];

    for (elem of resultados) {
      
      console.log("tipo: "+elem.tipOT);
      //console.log("y0:"+elem.y[0]);
      //console.log("y1:"+elem.y[1]);
      var dateini = new Date(elem.y[0]);
      var datefin = new Date(elem.y[1]);
      var millini = dateini.getTime()-18000000;
      var millfin = datefin.getTime()-18000000;
      elem.y[0]=millini;
      elem.y[1]=millfin;

      if(elem.tipOT === "Correctivo"){
        corr.push(elem);
      }else if(elem.tipOT === "Preventivo"){
        prev.push(elem);
      }else{
        pred.push(elem);
      }
      
    }

    console.log(corr);
    console.log(prev);
    console.log(pred);

    
    chart.updateSeries([
      {
        name: 'Correctivo',
        data: corr
      },
      {
        name: 'Preventivo',
        data: prev
      },
      {
        name: 'Predictivo',
        data: pred
      }
    ]);


  });
  return;

}

//un mes, un equipo
if(mes!="Todos" && equipo!="Todos los equipos"){

  datos = {
    TipoQuery : "06_getEquiSolicitudMes",
    anio: anio,
    estado: "Cerrada",
    equipo: equipo,
    mes: mes
  }

  //todas las solicitudes
  appAjaxQuery(datos,rutaSQL).done(function(resp){

    resultados=resp;
    console.log(resultados);

    var corr=[], prev=[], pred=[];

    for (elem of resultados) {
      
      console.log("tipo: "+elem.tipOT);
      //console.log("y0:"+elem.y[0]);
      //console.log("y1:"+elem.y[1]);
      var dateini = new Date(elem.y[0]);
      var datefin = new Date(elem.y[1]);
      var millini = dateini.getTime()-18000000;
      var millfin = datefin.getTime()-18000000;
      elem.y[0]=millini;
      elem.y[1]=millfin;

      if(elem.tipOT === "Correctivo"){
        corr.push(elem);
      }else if(elem.tipOT === "Preventivo"){
        prev.push(elem);
      }else{
        pred.push(elem);
      }
      
    }

    console.log(corr);
    console.log(prev);
    console.log(pred);

    
    chart.updateSeries([
      {
        name: 'Correctivo',
        data: corr
      },
      {
        name: 'Preventivo',
        data: prev
      },
      {
        name: 'Predictivo',
        data: pred
      }
    ]);
    
   });
  return;
}

  
}

function app07LoadEquipo(id){
  let datos = {
    TipoQuery : "07_getEquipos",
    contenido: id.value, 
    estado: "Cerrada"
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){

    appLlenarDataEnComboBoxCodigo(resp.tabla,"#cbo07_Equipos",0);
  });
}

function app06LoadEquipo(id){
  let datos = {
    TipoQuery : "07_getEquipos",
    contenido: id.value, 
    estado: "Cerrada"
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){

    appLlenarDataEnComboBoxCodigo(resp.tabla,"#cbo06_Equipos",0);
  });
}

function graph_0(){
  var options = {
    series: [
    {
      name: 'Bob',
      data: [
        {
          x: 'CisCom-01',
          y: [
            new Date('2019-03-05:00:00:00').getTime(),
            new Date('2019-03-05:12:00:00').getTime()
          ],
          fecha: '2019-03-05',
          hora_ini: '00:00',
          hora_fin: '12:00',
          estado: 'Cerrado',
          supervisor: 'admin'
        },
        {
          x: 'CisCom-02',
          y: [
            new Date('2019-03-02:00:00:00').getTime(),
            new Date('2019-03-02:05:00:00').getTime()
          ],
          fecha: "2019-03-02",
          hora_ini: '00:00',
          hora_fin: '05:00',
          estado: 'Cerrado',
          supervisor: 'admin'
        },

        {
          x: 'CisCom-02',
          y: [
            new Date('2019-03-07:00:00:00').getTime(),
            new Date('2019-03-07:16:00:00').getTime()
          ],
          fecha: "2019-03-02",
          hora_ini: '00:00',
          hora_fin: '05:00',
          estado: 'Cerrado',
          supervisor: 'admin'
        },
        {
          x: 'CisCom-03',
          y: [
            new Date('2019-03-05:12:00:00').getTime(),
            new Date('2019-03-05:16:00:00').getTime()
          ],
          fecha: '2019-03-05',
          hora_ini: '12:00',
          hora_fin: '16:00',
          estado: 'Cerrado',
          supervisor: 'admin'
        },
        {
          x: 'CisCom-04',
          y: [
            new Date('2019-03-03:15:00:00').getTime(),
            new Date('2019-03-03:24:00:00').getTime()
          ],
          fecha: '2019-03-03',
          hora_ini: '15:00',
          hora_fin: '24:00',
          estado: 'Cerrado',
          supervisor: 'admin'
        }
      ]
    }/* ,
    {
      name: 'Joe',
      data: [
        {
          x: 'Design',
          y: [
            new Date('2019-03-02').getTime(),
            new Date('2019-03-05').getTime()
          ]
        },
        {
          x: 'Test',
          y: [
            new Date('2019-03-06').getTime(),
            new Date('2019-03-16').getTime()
          ],
          goals: [
            {
              name: 'Break',
              value: new Date('2019-03-10').getTime(),
              strokeColor: '#CD2F2A'
            }
          ]
        },
        {
          x: 'Code',
          y: [
            new Date('2019-03-03').getTime(),
            new Date('2019-03-07').getTime()
          ]
        },
        {
          x: 'Deployment',
          y: [
            new Date('2019-03-20').getTime(),
            new Date('2019-03-22').getTime()
          ]
        },
        {
          x: 'Design',
          y: [
            new Date('2019-03-10').getTime(),
            new Date('2019-03-16').getTime()
          ]
        }
      ]
    }, */
    /* {
      name: 'Dan',
      data: [
        {
          x: 'Code',
          y: [
            new Date('2019-03-10').getTime(),
            new Date('2019-03-17').getTime()
          ]
        },
        {
          x: 'Validation',
          y: [
            new Date('2019-03-05').getTime(),
            new Date('2019-03-09').getTime()
          ],
          goals: [
            {
              name: 'Break',
              value: new Date('2019-03-07').getTime(),
              strokeColor: '#CD2F2A'
            }
          ]
        },
      ]
    } */
  ],
    chart: {
    height: 350,
    type: 'rangeBar'
  },
  plotOptions: {
    bar: {
      horizontal: true,
      barHeight: '90%'
    }
  },
  xaxis: {
    type: 'datetime'
  },
  stroke: {
    width: 1
  },
  fill: {
    type: 'solid',
    opacity: 0.6
  },
  legend: {
    position: 'top',
    horizontalAlign: 'left'
  },
  tooltip: {
    custom: function({series, seriesIndex, dataPointIndex, w}) {
      var data = w.globals.initialSeries[seriesIndex].data[dataPointIndex];
      
      return '<ul>' +
      '<li><b>Equipo</b>: ' + data.x + '</li>' +
      '<li><b>Fecha</b>: ' + data.fecha + '</li>' +
      '<li><b>Hora ini</b>: ' + data.hora_ini + '</li>' +
      '<li><b>Hora fin</b>: ' +data.hora_fin+ '</li>' +
      '<li><b>Estado</b>: ' + data.estado + '</li>' +
      '<li><b>Supervisor</b>: ' + data.supervisor + '</li>' +
      '</ul>';

    }
  }
  };

  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();
}

function app06Link_visual(){

  

  $(".indicador06").hide();
  $(".control06").show();

  $("#chart").empty();
  $("#chart_indicador").empty();
  $("#chart_indicador_2").empty();
  $("#chart_tiempo_2").empty();
  $("#chart_tiempo").empty();

  console.log("visual");
}

function app06Link_indicador(){

  

  $(".control06").hide();
  $(".indicador06").show();

  $("#chart").empty();
  $("#chart_indicador").empty();
  $("#chart_indicador_2").empty();
  $("#chart_tiempo_2").empty();
  $("#chart_tiempo").empty();
  

  console.log("indicador");
}

function grahp_1(){
  var options = {
    series: [
      /*
    {
      name: "disponibilidad",
      data: [80.5, 81.3, 89.6, 90.3, 92.2, 94.3, 90.8,90.2,85.4,87.8,94.2,90.1]
    } ,
    {
      name: "Low - 2013",
      data: [12, 11, 14, 18, 17, 13, 13]
    } */
  ],
    chart: {
    height: 350,
    type: 'line',
    dropShadow: {
      enabled: true,
      color: '#000',
      top: 18,
      left: 7,
      blur: 10,
      opacity: 0.2
    },
    toolbar: {
      show: false
    }
  },
  colors: ['#77B6EA', '#545454'],
  dataLabels: {
    enabled: true,
  },
  stroke: {
    curve: 'smooth'
  },
  noData: {
    text: 'Loading...'
  },
  /* title: {
    text: 'Average High & Low Temperature',
    align: 'left'
  }, */
  grid: {
    borderColor: '#e7e7e7',
    row: {
      colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.5
    },
  },
  markers: {
    size: 1
  },
  xaxis: {
    categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul','Ago','Set','Oct','Nov','Dic']/* ,
    title: {
      text: 'Meses'
    } */
  },
  yaxis: {
    /* title: {
      text: 'Disponibilidad'
    }, */
    min: 0,
    max: 100
  },
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    floating: true,
    offsetY: -25,
    offsetX: -5
  }
  };

  var chart = new ApexCharts(document.querySelector("#chart_indicador"), options);
  chart.render();
}

function graph_2(){
  //second

  var options = {
    series: [{
    name: 'Disponibilidad',
    data: [90.3]
  },/*  {
    name: 'Revenue',
    data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
  }, {
    name: 'Free Cash Flow',
    data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
  } */],
    chart: {
    type: 'bar',
    height: 350
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '40%',
      endingShape: 'rounded'
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
  },
  xaxis: {
    categories: ['2022'],
  },
  yaxis: {
    /* title: {
      text: '$ (thousands)'
    } */
  },
  fill: {
    opacity: 1
  }/* ,
  tooltip: {
    y: {
      formatter: function (val) {
        return "$ " + val + " thousands"
      }
    }
  } */
  };

  var chart = new ApexCharts(document.querySelector("#chart_indicador_2"), options);
  chart.render();
}

function grahp_3(){
  //third
  var options = {
    series: [{
    name: 'MTBF',
    data: [210]
  }, {
    name: 'MTTR',
    data: [10]
  }/*, {
    name: 'Free Cash Flow',
    data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
  } */],
    chart: {
    type: 'bar',
    height: 350
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '40%',
      endingShape: 'rounded'
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
  },
  xaxis: {
    categories: ['2022'],
  },
  yaxis: {
    /* title: {
      text: '$ (thousands)'
    } */
    min: 0,
    max: 300
  },
  fill: {
    opacity: 1
  }/* ,
  tooltip: {
    y: {
      formatter: function (val) {
        return "$ " + val + " thousands"
      }
    }
  } */
  };

  var chart = new ApexCharts(document.querySelector("#chart_tiempo_2"), options);
  chart.render();
}

function graph_4(){
   //fourth

   var options = {
    series: [
    {
      name: "MTBF",
      data: [120.1, 70.2, 60.2, 55.4, 48.3, 72.5, 76.5,60,51.2,45.3,30.2,10.1]
    },
    {
      name: "MTTR",
      data: [12, 11, 14, 18, 17, 13, 13,10,9,10,15,17]
    }
  ],
    chart: {
    height: 350,
    type: 'line',
    dropShadow: {
      enabled: true,
      color: '#000',
      top: 18,
      left: 7,
      blur: 10,
      opacity: 0.2
    },
    toolbar: {
      show: false
    }
  },
  colors: ['#77B6EA', '#545454'],
  dataLabels: {
    enabled: true,
  },
  stroke: {
    curve: 'smooth'
  },
  /* title: {
    text: 'Average High & Low Temperature',
    align: 'left'
  }, */
  grid: {
    borderColor: '#e7e7e7',
    row: {
      colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.5
    },
  },
  markers: {
    size: 1
  },
  xaxis: {
    categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul','Ago','Set','Oct','Nov','Dic']/* ,
    title: {
      text: 'Meses'
    } */
  },
  yaxis: {
    /* title: {
      text: 'Disponibilidad'
    }, */
    min: 0,
    max: 300
  },
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    floating: true,
    offsetY: -25,
    offsetX: -5
  }
  };

  var chart = new ApexCharts(document.querySelector("#chart_tiempo"), options);
  chart.render();
}

function app06Boton_indicador(){

$("#chart_indicador").empty();
$("#chart_indicador_2").empty();
$("#chart_tiempo_2").empty();
$("#chart_tiempo").empty();

var flota = $("#cbo07_Contenidos").val();
var anio = $("#txt07_Anio").val();
var mes = $("#cbo07_Meses").val();
var equipo = $("#cbo07_Equipos").val();

//grafica 01
var options = {
  series: [
    /*
  {
    name: "disponibilidad",
    data: [80.5, 81.3, 89.6, 90.3, 92.2, 94.3, 90.8,90.2,85.4,87.8,94.2,90.1]
  } ,
  {
    name: "Low - 2013",
    data: [12, 11, 14, 18, 17, 13, 13]
  } */
],
  chart: {
  height: 350,
  type: 'line',
  dropShadow: {
    enabled: true,
    color: '#000',
    top: 18,
    left: 7,
    blur: 10,
    opacity: 0.2
  },
  toolbar: {
    show: false
  }
},
colors: ['#F44336', '#545454'],

dataLabels: {
  enabled: true,
},
stroke: {
  curve: 'smooth'
},
noData: {
  text: 'Loading...'
},
/* title: {
  text: 'Average High & Low Temperature',
  align: 'left'
}, */
grid: {
  borderColor: '#e7e7e7',
  row: {
    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
    opacity: 0.5
  },
},
markers: {
  size: 1
},
xaxis: {
  categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul','Ago','Set','Oct','Nov','Dic']/* ,
  title: {
    text: 'Meses'
  } */
},
yaxis: {
  /* title: {
    text: 'Disponibilidad'
  }, */
  min: 0,
  max: 100
},
legend: {
  position: 'top',
  horizontalAlign: 'right',
  floating: true,
  offsetY: -25,
  offsetX: -5
}
};

var chart = new ApexCharts(document.querySelector("#chart_indicador"), options);
chart.render();
//fin

//grafica 02
var options = {
  series: [],
  chart: {
  type: 'bar',
  height: 350
},
plotOptions: {
  bar: {
    horizontal: false,
    columnWidth: '40%',
    endingShape: 'rounded'
  },
},
dataLabels: {
  enabled: false
},
stroke: {
  show: true,
  width: 2,
  colors: ['transparent']
},
xaxis: {
  categories: [anio],
},
yaxis: {
  /* title: {
    text: '$ (thousands)'
  } */
},
noData: {
  text: 'Loading...'
},
fill: {
  opacity: 1,
  colors: ['#F44336', '#E91E63', '#9C27B0']
}/* ,
tooltip: {
  y: {
    formatter: function (val) {
      return "$ " + val + " thousands"
    }
  }
} */
};

var chart_2 = new ApexCharts(document.querySelector("#chart_indicador_2"), options);
chart_2.render();

//fin

//grafica 03
var options = {
  series: [],
  chart: {
  type: 'bar',
  height: 350
},
plotOptions: {
  bar: {
    horizontal: false,
    columnWidth: '40%',
    endingShape: 'rounded'
  },
},
dataLabels: {
  enabled: false
},
stroke: {
  show: true,
  width: 2,
  colors: ['transparent']
},
colors: ['#4db2ff', '#ffca1c'],
xaxis: {
  categories: ['2022'],
},
yaxis: {
  /* title: {
    text: '$ (thousands)'
  } */
  min: 0,
  max: 720
},
noData: {
  text: 'Loading...'
},
fill: {
  opacity: 1
},

/* ,
tooltip: {
  y: {
    formatter: function (val) {
      return "$ " + val + " thousands"
    }
  }
} */
};

var chart_3 = new ApexCharts(document.querySelector("#chart_tiempo_2"), options);
chart_3.render();
//fin

//grafica 04

var options = {
  series: [
  /* {
    name: "MTBF",
    data: [120.1, 70.2, 60.2, 55.4, 48.3, 72.5, 76.5,60,51.2,45.3,30.2,10.1]
  },
  {
    name: "MTTR",
    data: [12, 11, 14, 18, 17, 13, 13,10,9,10,15,17]
  } */
],
  chart: {
  height: 350,
  type: 'line',
  dropShadow: {
    enabled: true,
    color: '#000',
    top: 18,
    left: 7,
    blur: 10,
    opacity: 0.2
  },
  toolbar: {
    show: false
  }
},
colors: ['#4db2ff', '#ffca1c'],
dataLabels: {
  enabled: true,
},
stroke: {
  curve: 'smooth'
},
/* title: {
  text: 'Average High & Low Temperature',
  align: 'left'
}, */
grid: {
  borderColor: '#e7e7e7',
  row: {
    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
    opacity: 0.5
  },
},
markers: {
  size: 1
},
xaxis: {
  categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul','Ago','Set','Oct','Nov','Dic']/* ,
  title: {
    text: 'Meses'
  } */
},
yaxis: {
  /* title: {
    text: 'Disponibilidad'
  }, */
  min: 0,
  max: 720
},
noData: {
  text: 'Loading...'
},
legend: {
  position: 'top',
  horizontalAlign: 'right',
  floating: true,
  offsetY: -25,
  offsetX: -5
}
};

var chart_4 = new ApexCharts(document.querySelector("#chart_tiempo"), options);
chart_4.render();

//fin




if(flota==="0"){
  alert("Seleccione una flota!!");
  return;
}
if($.trim(anio) === ''){
  alert("Ingrese año!!");
  return;
}
let datos;
var equipos=[];
var solicitudes=[];
let resultados=[];
console.log("mes ini:"+mes);
console.log("Equipo ini:"+equipo);

var ene=0, feb=0, mar=0, abr=0, may=0, jun=0, jul=0, ago=0, set=0, oct=0, nov=0, dic=0;
var fene=0, ffeb=0, fmar=0, fabr=0, fmay=0, fjun=0, fjul=0, fago=0, fset=0, foct=0, fnov=0, fdic=0;

var mtbfene=0, mtbffeb=0, mtbfmar=0, mtbfabr=0, mtbfmay=0, mtbfjun=0, mtbfjul=0, mtbfago=0, mtbfset=0, mtbfoct=0, mtbfnov=0, mtbfdic=0;
var mttrene=0, mttrfeb=0, mttrmar=0, mttrabr=0, mttrmay=0, mttrjun=0, mttrjul=0, mttrago=0, mttrset=0, mttroct=0, mttrnov=0, mttrdic=0;
var disgene=0, disgfeb=0, disgmar=0, disgabr=0, disgmay=0, disgjun=0, disgjul=0, disgago=0, disgset=0, disgoct=0, disgnov=0, disgdic=0;

var dispmeses=[];
var mtbfmeses=[];
var mttrmeses=[];

var disum;
var disanio=[];

var mtbfsum=0,mttrsum=0;
var mtbfanio=[];
var mttranio=[];

//week
var sem1=0, sem2=0, sem3=0, sem4=0, sem5=0;
var fsem1=0, fsem2=0, fsem3=0, fsem4=0, fsem5=0;

var mtbfsem1=0, mtbfsem2=0, mtbfsem3=0, mtbfsem4=0, mtbfsem5=0;
var mttrsem1=0, mttrsem2=0, mttrsem3=0, mttrsem4=0, mttrsem5=0;
var disgsem1=0, disgsem2=0, disgsem3=0, disgsem4=0, disgsem5=0;


var dispsemanas=[];
var mtbfsemanas=[];
var mttrsemanas=[];

var disMes=[];

var mtbfmes=[];
var mttrmes=[];

//todos meses, todos equipos
if(mes==="Todos" && equipo==="Todos los equipos"){
  console.log("flota:"+flota);
 
  datos = {
    TipoQuery : "07_getEquipos",
    contenido: flota
  }

  //todos los equipos de la flota seleccionada
  appAjaxQuery(datos,rutaSQL).done(function(resp){
 
    equipos=resp;
  
  });
  datos = {
    TipoQuery : "07_getAllSolicitud",
    flota: flota,
    anio: anio,
    estado: "Cerrada"
  }
  
  //todas las solicitudes
  appAjaxQuery(datos,rutaSQL).done(function(resp){

    
    solicitudes=resp;
    //console.log(solicitudes);
    //console.log("dasd");
    //console.log(equipos);

     //comparar codigo equipo del equipo/solicitud para filtar equipos del contenido seleccionado
    for (sol of solicitudes.tabla) {

      for(equi of equipos.tabla){
        
        if(equi.codigo === sol.flota){
          resultados.push(sol);
          
        }
      }
        
    }
    console.log(resultados);
    
    
    for (resul of resultados){
      let month= resul.mes;
      switch(month){
        case "Enero":
          ene+=parseInt(resul.duracion);
          console.log("phpdif:"+resul.duracion)
          console.log("dif:"+ene);
          fene++;
          break;

        case "Febrero":
          feb+=parseInt(resul.duracion);
          ffeb++;
          break;

        case "Marzo":
          mar+=parseInt(resul.duracion);
          fmar++;
          break;

        case "Abril":
          abr+=parseInt(resul.duracion);
          fabr++;
          break;

        case "Mayo":
          may+=parseInt(resul.duracion);
          fmay++;
          break;

        case "Junio":
          jun+=parseInt(resul.duracion);
          fjun++;
          break;

        case "Julio":
          jul+=parseInt(resul.duracion);
          fjul++;
          break;

        case "Agosto":
          ago+=parseInt(resul.duracion);
          fago++;
          break;

        case "Setiembre":
          set+=parseInt(resul.duracion);
          fset++;
          break;

        case "Octubre":
          oct+=parseInt(resul.duracion);
          foct++;
          break;

        case "Noviembre":
          nov+=parseInt(resul.duracion);
          fnov++;
          break;

        case "Diciembre":
          dic+=parseInt(resul.duracion);
          fdic++;
          break;
        default:
            console.log('no se econtro mes para:'+resul.flota);
      }
    }
    
    
    mtbfene=calcular_mtbf(ene,fene);
    mttrene=calcular_mttr(ene,fene);
    disgene=(calcular_disgenerica(mtbfene,mttrene)*100).toFixed(2)*1;
    dispmeses.push(disgene);
    mtbfmeses.push((mtbfene/60).toFixed(2)*1);
    mttrmeses.push((mttrene/60).toFixed(2)*1);

    console.log(mtbfene);
    console.log(mttrene);
    console.log(disgene);

    mtbffeb=calcular_mtbf(feb,ffeb);
    mttrfeb=calcular_mttr(feb,ffeb);
    disgfeb=(calcular_disgenerica(mtbffeb,mttrfeb)*100).toFixed(2)*1;
    dispmeses.push(disgfeb);
    mtbfmeses.push((mtbffeb/60).toFixed(2)*1);
    mttrmeses.push((mttrfeb/60).toFixed(2)*1);
    console.log(mtbffeb);
    console.log(mttrfeb);
    console.log(disgfeb);

    mtbfmar=calcular_mtbf(mar,fmar);
    mttrmar=calcular_mttr(mar,fmar);
    disgmar=(calcular_disgenerica(mtbfmar,mttrmar)*100).toFixed(2)*1;
    dispmeses.push(disgmar);
    mtbfmeses.push((mtbfmar/60).toFixed(2)*1);
    mttrmeses.push((mttrmar/60).toFixed(2)*1);

    mtbfabr=calcular_mtbf(abr,fabr);
    mttrabr=calcular_mttr(abr,fabr);
    disgabr=(calcular_disgenerica(mtbfabr,mttrabr)*100).toFixed(2)*1;
    dispmeses.push(disgabr);
    mtbfmeses.push((mtbfabr/60).toFixed(2)*1);
    mttrmeses.push((mttrabr/60).toFixed(2)*1);

    mtbfmay=calcular_mtbf(may,fmay);
    mttrmay=calcular_mttr(may,fmay);
    disgmay=(calcular_disgenerica(mtbfmay,mttrmay)*100).toFixed(2)*1;
    dispmeses.push(disgmay);
    mtbfmeses.push((mtbfmay/60).toFixed(2)*1);
    mttrmeses.push((mttrmay/60).toFixed(2)*1);

    mtbfjun=calcular_mtbf(jun,fjun);
    mttrjun=calcular_mttr(jun,fjun);
    disgjun=(calcular_disgenerica(mtbfjun,mttrjun)*100).toFixed(2)*1;
    dispmeses.push(disgjun);
    mtbfmeses.push((mtbfjun/60).toFixed(2)*1);
    mttrmeses.push((mttrjun/60).toFixed(2)*1);

    mtbfjul=calcular_mtbf(jul,fjul);
    mttrjul=calcular_mttr(jul,fjul);
    disgjul=(calcular_disgenerica(mtbfjul,mttrjul)*100).toFixed(2)*1;
    dispmeses.push(disgjul);
    mtbfmeses.push((mtbfjul/60).toFixed(2)*1);
    mttrmeses.push((mttrjul/60).toFixed(2)*1);

    mtbfago=calcular_mtbf(ago,fago);
    mttrago=calcular_mttr(ago,fago);
    disgago=(calcular_disgenerica(mtbfago,mttrago)*100).toFixed(2)*1;
    dispmeses.push(disgago);
    mtbfmeses.push((mtbfago/60).toFixed(2)*1);
    mttrmeses.push((mttrago/60).toFixed(2)*1);

    mtbfset=calcular_mtbf(set,fset);
    mttrset=calcular_mttr(set,fset);
    disgset=(calcular_disgenerica(mtbfset,mttrset)*100).toFixed(2)*1;
    dispmeses.push(disgset);
    mtbfmeses.push((mtbfset/60).toFixed(2)*1);
    mttrmeses.push((mttrset/60).toFixed(2)*1);

    mtbfoct=calcular_mtbf(oct,foct);
    mttroct=calcular_mttr(oct,foct);
    disgoct=(calcular_disgenerica(mtbfoct,mttroct)*100).toFixed(2)*1;
    dispmeses.push(disgoct);
    mtbfmeses.push((mtbfoct/60).toFixed(2)*1);
    mttrmeses.push((mttroct/60).toFixed(2)*1);

    mtbfnov=calcular_mtbf(nov,fnov);
    mttrnov=calcular_mttr(nov,fnov);
    disgnov=(calcular_disgenerica(mtbfnov,mttrnov)*100).toFixed(2)*1;
    dispmeses.push(disgnov);
    mtbfmeses.push((mtbfnov/60).toFixed(2)*1);
    mttrmeses.push((mttrnov/60).toFixed(2)*1);

    mtbfdic=calcular_mtbf(dic,fdic);
    mttrdic=calcular_mttr(dic,fdic);
    disgdic=(calcular_disgenerica(mtbfdic,mttrdic)*100).toFixed(2)*1;
    dispmeses.push(disgdic);
    mtbfmeses.push((mtbfdic/60).toFixed(2)*1);
    mttrmeses.push((mttrdic/60).toFixed(2)*1);
    
    console.log(dispmeses);
    disum=((disgene+disgfeb+disgmar+disgabr+disgmay+disgjun+disgjul+disgago+disgset+disgoct+disgnov+disgdic)/12).toFixed(2);
  
    disanio.push(disum);    
    console.log(disanio);
    console.log(mtbfmeses);
    console.log(mttrmeses);

    
    for(value of mtbfmeses){
      mtbfsum+=value;
    }
    for(value of mttrmeses){
      mttrsum+=value;
    }
    
    mtbfanio.push((mtbfsum/12).toFixed(2));
    mttranio.push((mttrsum/12).toFixed(2));

    chart.updateSeries([
      {
        name: 'Disponibilidad',
        data: dispmeses
      }
    ]);

    chart_2.updateSeries([
      {
        name: 'Disponibilidad',
        data: disanio
      }
    ]);

    chart_3.updateSeries([
      {
        name: 'MTBF',
        data: mtbfanio
      },
      {
        name: 'MTTR',
        data: mttranio
      }
    ]);

    chart_4.updateSeries([
      {
        name: 'MTBF',
        data: mtbfmeses
      },
      {
        name: 'MTTR',
        data: mttrmeses
      }
    ]);

  });
  
 
  return; 
}
//todos meses, un equipo
if(mes==="Todos" && equipo!="Todos los equipos"){

  
  datos = {
    TipoQuery : "07_getEquiSolicitud",
    flota: flota,
    anio: anio,
    estado: "Cerrada",
    equipo: equipo
  }
  
  //todas las solicitudes
  appAjaxQuery(datos,rutaSQL).done(function(resp){

    resultados=resp.tabla;
    console.log(resultados);
    
    
    for (resul of resultados){
      let month= resul.mes;
      switch(month){
        case "Enero":
          ene+=parseInt(resul.duracion);
          console.log("phpdif:"+resul.duracion)
          console.log("dif:"+ene);
          fene++;
          break;

        case "Febrero":
          feb+=parseInt(resul.duracion);
          ffeb++;
          break;

        case "Marzo":
          mar+=parseInt(resul.duracion);
          fmar++;
          break;

        case "Abril":
          abr+=parseInt(resul.duracion);
          fabr++;
          break;

        case "Mayo":
          may+=parseInt(resul.duracion);
          fmay++;
          break;

        case "Junio":
          jun+=parseInt(resul.duracion);
          fjun++;
          break;

        case "Julio":
          jul+=parseInt(resul.duracion);
          fjul++;
          break;

        case "Agosto":
          ago+=parseInt(resul.duracion);
          fago++;
          break;

        case "Setiembre":
          set+=parseInt(resul.duracion);
          fset++;
          break;

        case "Octubre":
          oct+=parseInt(resul.duracion);
          foct++;
          break;

        case "Noviembre":
          nov+=parseInt(resul.duracion);
          fnov++;
          break;

        case "Diciembre":
          dic+=parseInt(resul.duracion);
          fdic++;
          break;
        default:
            console.log('no se econtro mes para:'+resul.flota);
      }
    }
 
    mtbfene=calcular_mtbf(ene,fene);
    mttrene=calcular_mttr(ene,fene);
    disgene=(calcular_disgenerica(mtbfene,mttrene)*100).toFixed(2)*1;
    dispmeses.push(disgene);
    mtbfmeses.push((mtbfene/60).toFixed(2)*1);
    mttrmeses.push((mttrene/60).toFixed(2)*1);

    console.log(mtbfene);
    console.log(mttrene);
    console.log(disgene);

    mtbffeb=calcular_mtbf(feb,ffeb);
    mttrfeb=calcular_mttr(feb,ffeb);
    disgfeb=(calcular_disgenerica(mtbffeb,mttrfeb)*100).toFixed(2)*1;
    dispmeses.push(disgfeb);
    mtbfmeses.push((mtbffeb/60).toFixed(2)*1);
    mttrmeses.push((mttrfeb/60).toFixed(2)*1);
    console.log(mtbffeb);
    console.log(mttrfeb);
    console.log(disgfeb);

    mtbfmar=calcular_mtbf(mar,fmar);
    mttrmar=calcular_mttr(mar,fmar);
    disgmar=(calcular_disgenerica(mtbfmar,mttrmar)*100).toFixed(2)*1;
    dispmeses.push(disgmar);
    mtbfmeses.push((mtbfmar/60).toFixed(2)*1);
    mttrmeses.push((mttrmar/60).toFixed(2)*1);

    mtbfabr=calcular_mtbf(abr,fabr);
    mttrabr=calcular_mttr(abr,fabr);
    disgabr=(calcular_disgenerica(mtbfabr,mttrabr)*100).toFixed(2)*1;
    dispmeses.push(disgabr);
    mtbfmeses.push((mtbfabr/60).toFixed(2)*1);
    mttrmeses.push((mttrabr/60).toFixed(2)*1);

    mtbfmay=calcular_mtbf(may,fmay);
    mttrmay=calcular_mttr(may,fmay);
    disgmay=(calcular_disgenerica(mtbfmay,mttrmay)*100).toFixed(2)*1;
    dispmeses.push(disgmay);
    mtbfmeses.push((mtbfmay/60).toFixed(2)*1);
    mttrmeses.push((mttrmay/60).toFixed(2)*1);

    mtbfjun=calcular_mtbf(jun,fjun);
    mttrjun=calcular_mttr(jun,fjun);
    disgjun=(calcular_disgenerica(mtbfjun,mttrjun)*100).toFixed(2)*1;
    dispmeses.push(disgjun);
    mtbfmeses.push((mtbfjun/60).toFixed(2)*1);
    mttrmeses.push((mttrjun/60).toFixed(2)*1);

    mtbfjul=calcular_mtbf(jul,fjul);
    mttrjul=calcular_mttr(jul,fjul);
    disgjul=(calcular_disgenerica(mtbfjul,mttrjul)*100).toFixed(2)*1;
    dispmeses.push(disgjul);
    mtbfmeses.push((mtbfjul/60).toFixed(2)*1);
    mttrmeses.push((mttrjul/60).toFixed(2)*1);

    mtbfago=calcular_mtbf(ago,fago);
    mttrago=calcular_mttr(ago,fago);
    disgago=(calcular_disgenerica(mtbfago,mttrago)*100).toFixed(2)*1;
    dispmeses.push(disgago);
    mtbfmeses.push((mtbfago/60).toFixed(2)*1);
    mttrmeses.push((mttrago/60).toFixed(2)*1);

    mtbfset=calcular_mtbf(set,fset);
    mttrset=calcular_mttr(set,fset);
    disgset=(calcular_disgenerica(mtbfset,mttrset)*100).toFixed(2)*1;
    dispmeses.push(disgset);
    mtbfmeses.push((mtbfset/60).toFixed(2)*1);
    mttrmeses.push((mttrset/60).toFixed(2)*1);

    mtbfoct=calcular_mtbf(oct,foct);
    mttroct=calcular_mttr(oct,foct);
    disgoct=(calcular_disgenerica(mtbfoct,mttroct)*100).toFixed(2)*1;
    dispmeses.push(disgoct);
    mtbfmeses.push((mtbfoct/60).toFixed(2)*1);
    mttrmeses.push((mttroct/60).toFixed(2)*1);

    mtbfnov=calcular_mtbf(nov,fnov);
    mttrnov=calcular_mttr(nov,fnov);
    disgnov=(calcular_disgenerica(mtbfnov,mttrnov)*100).toFixed(2)*1;
    dispmeses.push(disgnov);
    mtbfmeses.push((mtbfnov/60).toFixed(2)*1);
    mttrmeses.push((mttrnov/60).toFixed(2)*1);

    mtbfdic=calcular_mtbf(dic,fdic);
    mttrdic=calcular_mttr(dic,fdic);
    disgdic=(calcular_disgenerica(mtbfdic,mttrdic)*100).toFixed(2)*1;
    dispmeses.push(disgdic);
    mtbfmeses.push((mtbfdic/60).toFixed(2)*1);
    mttrmeses.push((mttrdic/60).toFixed(2)*1);
    
    console.log(dispmeses);
    disum=((disgene+disgfeb+disgmar+disgabr+disgmay+disgjun+disgjul+disgago+disgset+disgoct+disgnov+disgdic)/12).toFixed(2);
   
    
    disanio.push(disum);    
    console.log(disanio);
    console.log(mtbfmeses);
    console.log(mttrmeses);

    var mtbfsum=0,mttrsum=0;
    for(value of mtbfmeses){
      mtbfsum+=value;
    }
    for(value of mttrmeses){
      mttrsum+=value;
    }
    
    mtbfanio.push((mtbfsum/12).toFixed(2));
    mttranio.push((mttrsum/12).toFixed(2));

    chart.updateSeries([
      {
        name: 'Disponibilidad',
        data: dispmeses
      }
    ]);

    chart_2.updateSeries([
      {
        name: 'Disponibilidad',
        data: disanio
      }
    ]);

    chart_3.updateSeries([
      {
        name: 'MTBF',
        data: mtbfanio
      },
      {
        name: 'MTTR',
        data: mttranio
      }
    ]);

    chart_4.updateSeries([
      {
        name: 'MTBF',
        data: mtbfmeses
      },
      {
        name: 'MTTR',
        data: mttrmeses
      }
    ]);


  });
  return;
}
//un mes, todos equipos
if(mes!="Todos" && equipo==="Todos los equipos"){
  $("#chart_indicador").empty();
  $("#chart_indicador_2").empty();
  $("#chart_tiempo_2").empty();
  $("#chart_tiempo").empty();

  //grafica 01
var options = {
  series: [],
  chart: {
  height: 350,
  type: 'line',
  dropShadow: {
    enabled: true,
    color: '#000',
    top: 18,
    left: 7,
    blur: 10,
    opacity: 0.2
  },
  toolbar: {
    show: false
  }
},
colors: ['#F44336', '#545454'],

dataLabels: {
  enabled: true,
},
stroke: {
  curve: 'smooth'
},
noData: {
  text: 'Loading...'
},
/* title: {
  text: 'Average High & Low Temperature',
  align: 'left'
}, */
grid: {
  borderColor: '#e7e7e7',
  row: {
    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
    opacity: 0.5
  },
},
markers: {
  size: 1
},
xaxis: {
  categories: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5']/* ,
  title: {
    text: 'Meses'
  } */
},
yaxis: {
  /* title: {
    text: 'Disponibilidad'
  }, */
  min: 0,
  max: 100
},
legend: {
  position: 'top',
  horizontalAlign: 'right',
  floating: true,
  offsetY: -25,
  offsetX: -5
}
};

var chart = new ApexCharts(document.querySelector("#chart_indicador"), options);
chart.render();
//fin

//grafica 02
var options = {
  series: [],
  chart: {
  type: 'bar',
  height: 350
},
plotOptions: {
  bar: {
    horizontal: false,
    columnWidth: '40%',
    endingShape: 'rounded'
  },
},
dataLabels: {
  enabled: false
},
stroke: {
  show: true,
  width: 2,
  colors: ['transparent']
},
xaxis: {
  categories: [mes],
},
yaxis: {
  /* title: {
    text: '$ (thousands)'
  } */
},
noData: {
  text: 'Loading...'
},
fill: {
  opacity: 1,
  colors: ['#F44336', '#E91E63', '#9C27B0']
}/* ,
tooltip: {
  y: {
    formatter: function (val) {
      return "$ " + val + " thousands"
    }
  }
} */
};

var chart_2 = new ApexCharts(document.querySelector("#chart_indicador_2"), options);
chart_2.render();

//fin

//grafica 03
var options = {
  series: [],
  chart: {
  type: 'bar',
  height: 350
},
plotOptions: {
  bar: {
    horizontal: false,
    columnWidth: '40%',
    endingShape: 'rounded'
  },
},
dataLabels: {
  enabled: false
},
stroke: {
  show: true,
  width: 2,
  colors: ['transparent']
},
colors: ['#4db2ff', '#ffca1c'],
xaxis: {
  categories: [mes],
},
yaxis: {
  /* title: {
    text: '$ (thousands)'
  } */
  min: 0,
  max: 168
},
noData: {
  text: 'Loading...'
},
fill: {
  opacity: 1
},

/* ,
tooltip: {
  y: {
    formatter: function (val) {
      return "$ " + val + " thousands"
    }
  }
} */
};

var chart_3 = new ApexCharts(document.querySelector("#chart_tiempo_2"), options);
chart_3.render();
//fin

//grafica 04

var options = {
  series: [],
  chart: {
  height: 350,
  type: 'line',
  dropShadow: {
    enabled: true,
    color: '#000',
    top: 18,
    left: 7,
    blur: 10,
    opacity: 0.2
  },
  toolbar: {
    show: false
  }
},
colors: ['#4db2ff', '#ffca1c'],
dataLabels: {
  enabled: true,
},
stroke: {
  curve: 'smooth'
},
grid: {
  borderColor: '#e7e7e7',
  row: {
    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
    opacity: 0.5
  },
},
markers: {
  size: 1
},
xaxis: {
  categories: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5']
},
yaxis: {
  /* title: {
    text: 'Disponibilidad'
  }, */
  min: 0,
  max: 168
},
noData: {
  text: 'Loading...'
},
legend: {
  position: 'top',
  horizontalAlign: 'right',
  floating: true,
  offsetY: -25,
  offsetX: -5
}
};

var chart_4 = new ApexCharts(document.querySelector("#chart_tiempo"), options);
chart_4.render();

//fin
  
  
  datos = {
    TipoQuery : "07_getEquipos",
    contenido: flota
  }

  //todos los equipos de la flota seleccionada
  appAjaxQuery(datos,rutaSQL).done(function(resp){
 
    equipos=resp;
  
  });
  datos = {
    TipoQuery : "07_getAllSolicitudMes",
    flota: flota,
    anio: anio,
    estado: "Cerrada",
    mes:mes
  }
  
  //todas las solicitudes
  appAjaxQuery(datos,rutaSQL).done(function(resp){

    
    solicitudes=resp;
    for (sol of solicitudes.tabla) {

      for(equi of equipos.tabla){
        
        if(equi.codigo === sol.flota){
          resultados.push(sol);
          
        }
      }
        
    }
    console.log(resultados);

    for (resul of resultados){
      let week= resul.semana;
      switch(week){
        case "Primera":
          sem1+=parseInt(resul.duracion);
          console.log("phpdif:"+resul.duracion)
          console.log("dif:"+sem1);
          fsem1++;
          break;

        case "Segunda":
          sem2+=parseInt(resul.duracion);
          fsem2++;
          break;

        case "Tercera":
          sem3+=parseInt(resul.duracion);
          fsem3++;
          break;

        case "Cuarta":
          sem4+=parseInt(resul.duracion);
          fsem4++;
          break;

        case "Quinta":
          sem5+=parseInt(resul.duracion);
          fsem5++;
          break;
     
        default:
            console.log('no se econtro semana para:'+resul.flota);
      }
    }
    
    
    mtbfsem1=calcular_mtbf_mes(sem1,fsem1);
    mttrsem1=calcular_mttr_mes(sem1,fsem1);
    disgsem1=(calcular_disgenerica_mes(mtbfsem1,mttrsem1)*100).toFixed(2)*1;
    dispsemanas.push(disgsem1);
    mtbfsemanas.push((mtbfsem1/60).toFixed(2)*1);
    mttrsemanas.push((mttrsem1/60).toFixed(2)*1);


    mtbfsem2=calcular_mtbf_mes(sem2,fsem2);
    mttrsem2=calcular_mttr_mes(sem2,fsem2);
    disgsem2=(calcular_disgenerica_mes(mtbfsem2,mttrsem2)*100).toFixed(2)*1;
    dispsemanas.push(disgsem2);
    mtbfsemanas.push((mtbfsem2/60).toFixed(2)*1);
    mttrsemanas.push((mttrsem2/60).toFixed(2)*1);


    mtbfsem3=calcular_mtbf_mes(sem3,fsem3);
    mttrsem3=calcular_mttr_mes(sem3,fsem3);
    disgsem3=(calcular_disgenerica_mes(mtbfsem3,mttrsem3)*100).toFixed(2)*1;
    dispsemanas.push(disgsem3);
    mtbfsemanas.push((mtbfsem3/60).toFixed(2)*1);
    mttrsemanas.push((mttrsem3/60).toFixed(2)*1);

    mtbfsem4=calcular_mtbf_mes(sem4,fsem4);
    mttrsem4=calcular_mttr_mes(sem4,fsem4);
    disgsem4=(calcular_disgenerica_mes(mtbfsem4,mttrsem4)*100).toFixed(2)*1;
    dispsemanas.push(disgsem4);
    mtbfsemanas.push((mtbfsem4/60).toFixed(2)*1);
    mttrsemanas.push((mttrsem4/60).toFixed(2)*1);

    mtbfsem5=calcular_mtbf_mes(sem5,fsem5);
    mttrsem5=calcular_mttr_mes(sem5,fsem5);
    disgsem5=(calcular_disgenerica_mes(mtbfsem5,mttrsem5)*100).toFixed(2)*1;
    dispsemanas.push(disgsem5);
    mtbfsemanas.push((mtbfsem5/60).toFixed(2)*1);
    mttrsemanas.push((mttrsem5/60).toFixed(2)*1);
    
    console.log(dispmeses);
    disum=((disgsem1+disgsem2+disgsem3+disgsem4+disgsem5)/5).toFixed(2);
  
    console.log(dispsemanas);
    console.log(mtbfsemanas);
    console.log(mttrsemanas);
    disMes.push(disum);    
    console.log(disMes);
    console.log(mtbfsemanas);
    console.log(mttrsemanas);

    
    for(value of mtbfsemanas){
      mtbfsum+=value;
    }
    for(value of mttrsemanas){
      mttrsum+=value;
    }
    
    mtbfmes.push((mtbfsum/5).toFixed(2));
    mttrmes.push((mttrsum/5).toFixed(2));

    chart.updateSeries([
      {
        name: 'Disponibilidad',
        data: dispsemanas
      }
    ]);

    chart_2.updateSeries([
      {
        name: 'Disponibilidad',
        data: disMes
      }
    ]);

    chart_3.updateSeries([
      {
        name: 'MTBF',
        data: mtbfmes
      },
      {
        name: 'MTTR',
        data: mttrmes
      }
    ]);

    chart_4.updateSeries([
      {
        name: 'MTBF',
        data: mtbfsemanas
      },
      {
        name: 'MTTR',
        data: mttrsemanas
      }
    ]);
  });
  return;
}
// un mes, un equipo
if(mes!="Todos" && equipo!="Todos los equipos"){
  $("#chart_indicador").empty();
  $("#chart_indicador_2").empty();
  $("#chart_tiempo_2").empty();
  $("#chart_tiempo").empty();

  //grafica 01
var options = {
  series: [],
  chart: {
  height: 350,
  type: 'line',
  dropShadow: {
    enabled: true,
    color: '#000',
    top: 18,
    left: 7,
    blur: 10,
    opacity: 0.2
  },
  toolbar: {
    show: false
  }
},
colors: ['#F44336', '#545454'],

dataLabels: {
  enabled: true,
},
stroke: {
  curve: 'smooth'
},
noData: {
  text: 'Loading...'
},
/* title: {
  text: 'Average High & Low Temperature',
  align: 'left'
}, */
grid: {
  borderColor: '#e7e7e7',
  row: {
    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
    opacity: 0.5
  },
},
markers: {
  size: 1
},
xaxis: {
  categories: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5']/* ,
  title: {
    text: 'Meses'
  } */
},
yaxis: {
  /* title: {
    text: 'Disponibilidad'
  }, */
  min: 0,
  max: 100
},
legend: {
  position: 'top',
  horizontalAlign: 'right',
  floating: true,
  offsetY: -25,
  offsetX: -5
}
};

var chart = new ApexCharts(document.querySelector("#chart_indicador"), options);
chart.render();
//fin

//grafica 02
var options = {
  series: [],
  chart: {
  type: 'bar',
  height: 350
},
plotOptions: {
  bar: {
    horizontal: false,
    columnWidth: '40%',
    endingShape: 'rounded'
  },
},
dataLabels: {
  enabled: false
},
stroke: {
  show: true,
  width: 2,
  colors: ['transparent']
},
xaxis: {
  categories: [mes],
},
yaxis: {
  /* title: {
    text: '$ (thousands)'
  } */
},
noData: {
  text: 'Loading...'
},
fill: {
  opacity: 1,
  colors: ['#F44336', '#E91E63', '#9C27B0']
}/* ,
tooltip: {
  y: {
    formatter: function (val) {
      return "$ " + val + " thousands"
    }
  }
} */
};

var chart_2 = new ApexCharts(document.querySelector("#chart_indicador_2"), options);
chart_2.render();

//fin

//grafica 03
var options = {
  series: [],
  chart: {
  type: 'bar',
  height: 350
},
plotOptions: {
  bar: {
    horizontal: false,
    columnWidth: '40%',
    endingShape: 'rounded'
  },
},
dataLabels: {
  enabled: false
},
stroke: {
  show: true,
  width: 2,
  colors: ['transparent']
},
colors: ['#4db2ff', '#ffca1c'],
xaxis: {
  categories: [mes],
},
yaxis: {
  /* title: {
    text: '$ (thousands)'
  } */
  min: 0,
  max: 168
},
noData: {
  text: 'Loading...'
},
fill: {
  opacity: 1
},

/* ,
tooltip: {
  y: {
    formatter: function (val) {
      return "$ " + val + " thousands"
    }
  }
} */
};

var chart_3 = new ApexCharts(document.querySelector("#chart_tiempo_2"), options);
chart_3.render();
//fin

//grafica 04

var options = {
  series: [],
  chart: {
  height: 350,
  type: 'line',
  dropShadow: {
    enabled: true,
    color: '#000',
    top: 18,
    left: 7,
    blur: 10,
    opacity: 0.2
  },
  toolbar: {
    show: false
  }
},
colors: ['#4db2ff', '#ffca1c'],
dataLabels: {
  enabled: true,
},
stroke: {
  curve: 'smooth'
},
grid: {
  borderColor: '#e7e7e7',
  row: {
    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
    opacity: 0.5
  },
},
markers: {
  size: 1
},
xaxis: {
  categories: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5']
},
yaxis: {
  /* title: {
    text: 'Disponibilidad'
  }, */
  min: 0,
  max: 168
},
noData: {
  text: 'Loading...'
},
legend: {
  position: 'top',
  horizontalAlign: 'right',
  floating: true,
  offsetY: -25,
  offsetX: -5
}
};

var chart_4 = new ApexCharts(document.querySelector("#chart_tiempo"), options);
chart_4.render();

datos = {
  TipoQuery : "07_getEquiSolicitudMes",
  flota: flota,
  anio: anio,
  estado: "Cerrada",
  equipo: equipo,
  mes:mes
}

//todas las solicitudes
appAjaxQuery(datos,rutaSQL).done(function(resp){

  resultados=resp.tabla;
  console.log(resultados);

  for (resul of resultados){
    let week= resul.semana;
      switch(week){
        case "Primera":
          sem1+=parseInt(resul.duracion);
          console.log("phpdif:"+resul.duracion)
          console.log("dif:"+sem1);
          fsem1++;
          break;

        case "Segunda":
          sem2+=parseInt(resul.duracion);
          fsem2++;
          break;

        case "Tercera":
          sem3+=parseInt(resul.duracion);
          fsem3++;
          break;

        case "Cuarta":
          sem4+=parseInt(resul.duracion);
          fsem4++;
          break;

        case "Quinta":
          sem5+=parseInt(resul.duracion);
          fsem5++;
          break;
     
        default:
            console.log('no se econtro semana para:'+resul.flota);
      }
    }
    
    
    mtbfsem1=calcular_mtbf_mes(sem1,fsem1);
    mttrsem1=calcular_mttr_mes(sem1,fsem1);
    disgsem1=(calcular_disgenerica_mes(mtbfsem1,mttrsem1)*100).toFixed(2)*1;
    dispsemanas.push(disgsem1);
    mtbfsemanas.push((mtbfsem1/60).toFixed(2)*1);
    mttrsemanas.push((mttrsem1/60).toFixed(2)*1);


    mtbfsem2=calcular_mtbf_mes(sem2,fsem2);
    mttrsem2=calcular_mttr_mes(sem2,fsem2);
    disgsem2=(calcular_disgenerica_mes(mtbfsem2,mttrsem2)*100).toFixed(2)*1;
    dispsemanas.push(disgsem2);
    mtbfsemanas.push((mtbfsem2/60).toFixed(2)*1);
    mttrsemanas.push((mttrsem2/60).toFixed(2)*1);


    mtbfsem3=calcular_mtbf_mes(sem3,fsem3);
    mttrsem3=calcular_mttr_mes(sem3,fsem3);
    disgsem3=(calcular_disgenerica_mes(mtbfsem3,mttrsem3)*100).toFixed(2)*1;
    dispsemanas.push(disgsem3);
    mtbfsemanas.push((mtbfsem3/60).toFixed(2)*1);
    mttrsemanas.push((mttrsem3/60).toFixed(2)*1);

    mtbfsem4=calcular_mtbf_mes(sem4,fsem4);
    mttrsem4=calcular_mttr_mes(sem4,fsem4);
    disgsem4=(calcular_disgenerica_mes(mtbfsem4,mttrsem4)*100).toFixed(2)*1;
    dispsemanas.push(disgsem4);
    mtbfsemanas.push((mtbfsem4/60).toFixed(2)*1);
    mttrsemanas.push((mttrsem4/60).toFixed(2)*1);

    mtbfsem5=calcular_mtbf_mes(sem5,fsem5);
    mttrsem5=calcular_mttr_mes(sem5,fsem5);
    disgsem5=(calcular_disgenerica_mes(mtbfsem5,mttrsem5)*100).toFixed(2)*1;
    dispsemanas.push(disgsem5);
    mtbfsemanas.push((mtbfsem5/60).toFixed(2)*1);
    mttrsemanas.push((mttrsem5/60).toFixed(2)*1);
    
    console.log(dispmeses);
    disum=((disgsem1+disgsem2+disgsem3+disgsem4+disgsem5)/5).toFixed(2);
  
    console.log(dispsemanas);
    console.log(mtbfsemanas);
    console.log(mttrsemanas);
    disMes.push(disum);    
    console.log(disMes);
    console.log(mtbfsemanas);
    console.log(mttrsemanas);

    
    for(value of mtbfsemanas){
      mtbfsum+=value;
    }
    for(value of mttrsemanas){
      mttrsum+=value;
    }
    
    mtbfmes.push((mtbfsum/5).toFixed(2));
    mttrmes.push((mttrsum/5).toFixed(2));

    chart.updateSeries([
      {
        name: 'Disponibilidad',
        data: dispsemanas
      }
    ]);

    chart_2.updateSeries([
      {
        name: 'Disponibilidad',
        data: disMes
      }
    ]);

    chart_3.updateSeries([
      {
        name: 'MTBF',
        data: mtbfmes
      },
      {
        name: 'MTTR',
        data: mttrmes
      }
    ]);

    chart_4.updateSeries([
      {
        name: 'MTBF',
        data: mtbfsemanas
      },
      {
        name: 'MTTR',
        data: mttrsemanas
      }
    ]);
    return;
});

//fin


}
//console.log(resultados);
//appAjaxQuery(datos,rutaSQL).done(function(resp){

  //appLlenarDataEnComboBoxCodigo(resp.tabla,"#cbo06_Equipos",0);
//});

/* console.log(flota);
console.log(anio);
console.log(mes);
console.log(equipo); */

//grahp_1();
//graph_2();
//grahp_3();
//graph_4();
 
}


function calcular_mtbf(hrfall, numtotfall){

  var mtbf;
 if(hrfall!=0){
    mtbf=((30*24*60)-hrfall)/numtotfall;
    return mtbf;
 }else{
   return 30*24*60;
 }

}

function calcular_mttr(hrfall,numtotfall){

  var mttr;
  if(hrfall!=0){
    mttr=hrfall/numtotfall;
    return mttr;
  }else{
    return 0;
  }

}

function calcular_disgenerica(mtbf, mttr){
  
  if(mttr!=0){
    //return ((mtbf)/(mtbf+mttr)).toFixed(2);
    var num =(mtbf)/(mtbf+mttr);
    //var i= num.toFixed(2);
    //console.log("roud:"+i);
    return num;
  }else{
    return 1;
  }
  
}

function calcular_mtbf_mes(hrfall, numtotfall){

  var mtbf;
 if(hrfall!=0){
    mtbf=((7*24*60)-hrfall)/numtotfall;
    return mtbf;
 }else{
   return 7*24*60;
 }

}

function calcular_mttr_mes(hrfall,numtotfall){

  var mttr;
  if(hrfall!=0){
    mttr=hrfall/numtotfall;
    return mttr;
  }else{
    return 0;
  }

}

function calcular_disgenerica_mes(mtbf, mttr){
  
  if(mttr!=0){
    //return ((mtbf)/(mtbf+mttr)).toFixed(2);
    var num =(mtbf)/(mtbf+mttr);
    //var i= num.toFixed(2);
    //console.log("roud:"+i);
    return num;
  }else{
    return 1;
  }
  
}

function appBotonCancel(){
  $('#edit').hide();
  $('#grid').show();
}

function appPredioEdit(predioID){
  let datos = {
    TipoQuery : 'editPredioFull',
    ID : predioID
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    appPredioSetData(resp.predio); //basico
    //documentaria
    if(resp.docum==null) { appPredioDocumClear(resp.conditerreno,resp.modos,resp.monedas,resp.titulos,resp.fedatarios); }
    else { appPredioDocumSetData(resp.conditerreno,resp.modos,resp.monedas,resp.titulos,resp.fedatarios,resp.docum); }
    //registral
    if(resp.registral==null) { appPredioRegistralClear(); }
    else { appPredioRegistralSetData(resp.registral); }
    //usos inmueble
    if(resp.preusos==null) { appPredioUsoClear(resp.usos);}
    else {appPredioUsoSetData(resp.usos,resp.preusos);}
    //fiscal
    if(resp.fiscal==null) { appPredioFiscalClear(); }
    else { appPredioFiscalSetData(resp.fiscal); }
    //especificaciones
    if(resp.espec==null) { appPredioEspecClear(); }
    else { appPredioEspecSetData(resp.espec); }
    //archivos
    if(resp.arch==null) { appPredioArchClear(); }
    else { appPredioArchSetData(resp.arch); }

    $("#btnInsert").hide();
    $("#btnUpdate").show();
    $('#grid').hide();
    $('#edit').show();
  });
}

function appPredioSetData(data){
  //basico
  $("#lbl_ID").html(data.ID);
  $("#lbl_minipredio").html(data.nombre);
  $("#lbl_miniclase").html(data.clase);
  $("#lbl_minimision").html(data.mision);
  $("#lbl_minidmisionero").html(data.dmisionero);

  $("#lbl_codigo").html(data.codigo);
  $("#hid_PredioID").val(data.ID);
  $("#lbl_PredioCodigo").html(data.codigo);
  $("#lbl_PredioNombre").html(data.nombre);
  $("#lbl_PredioMision").html(data.mision);
  $("#lbl_PredioClase").html(data.clase);
  $("#lbl_PredioDisMisionero").html(data.dmisionero);
  $("#lbl_PredioJuridica").html(data.perjuridica);
  $("#lbl_PredioTelefonos").html(data.telefono);
  $("#lbl_PredioEmail").html(data.correo);
  $("#lbl_PredioUbigeo").html(data.region+" - "+data.provincia+" - "+data.distrito);
  $("#lbl_PredioSector").html(data.sector);
  $("#lbl_PredioAvenida").html(data.avenida);
  $("#lbl_PredioNro").html(data.nro);
  $("#lbl_PredioDpto").html(data.dpto);
  $("#lbl_PredioMza").html(data.mza);
  $("#lbl_PredioLote").html(data.lte);
  $("#lbl_PredioObservac").html(data.observac);
  $("#lbl_PredioSysFecha").html(data.sysfecha);
  $("#lbl_PredioSysUser").html(data.sysuser);
}

function appPredioDocumSetData(cboTerreno,cboModos,cboMonedas,cboTitulos,cboFedatarios,data){
  appLlenarDataEnComboBox(cboTerreno,"#cboDocum_CondiTerreno",data.conditerreno);
  appLlenarDataEnComboBox(cboModos,"#cboDocum_modoID",data.id_modo);
  appLlenarDataEnComboBox(cboMonedas,"#cboDocum_monedaID",data.id_moneda);
  appLlenarDataEnComboBox(cboTitulos,"#cboDocum_tituloID",data.id_titulo);
  appLlenarDataEnComboBox(cboFedatarios,"#cboDocum_fedatarioID",data.id_fedatario);
  $("#txtDocum_Valor").val(appFormatMoney(data.valor,2));
  $("#txtDocum_Transfirientes").val(data.transfirientes);
  $("#txtDocum_Adquirientes").val(data.adquirientes);
  $("#txtDocum_Nro").val(data.nro_titulo);
  $("#txtDocum_Folio").val(data.folio);
  appCheckFecha(data.fecha,"#chkDocum_Fecha","#txtDocum_Fecha","#spanDocum_Fecha");
  $("#txtDocum_Fedatario").val(data.nombrefedatario);
}
function appPredioDocumClear(cboTerreno,cboModos,cboMonedas,cboTitulos,cboFedatarios){
  appLlenarDataEnComboBox(cboTerreno,"#cboDocum_CondiTerreno",0);
  appLlenarDataEnComboBox(cboModos,"#cboDocum_modoID",0);
  appLlenarDataEnComboBox(cboMonedas,"#cboDocum_monedaID",0);
  appLlenarDataEnComboBox(cboTitulos,"#cboDocum_tituloID",0);
  appLlenarDataEnComboBox(cboFedatarios,"#cboDocum_fedatarioID",0);
  $("#txtDocum_Valor").val(appFormatMoney(0,2));
  $("#txtDocum_Transfirientes").val("");
  $("#txtDocum_Adquirientes").val("");
  $("#txtDocum_Nro").val("");
  $("#txtDocum_Folio").val("");
  appCheckFecha(null,"#chkDocum_Fecha","#txtDocum_Fecha","#spanDocum_Fecha");
  $("#txtDocum_Fedatario").val("");
}

function appCheckFecha(valor,checkbox,textbox,span){
  if(valor==null){
    $(checkbox).attr("checked",false);
    $(span).css("background","#EEEEEE");
    $(textbox).attr("disabled","disabled");
    $(textbox).val("");
  } else {
    $(checkbox).attr("checked",true);
    $(span).css("background","#FFFFFF");
    $(textbox).removeAttr("disabled");
    $(textbox).datepicker("setDate",valor);
  }
}

function appCheckOnOff(check,span,textbox){
  if(check.checked){
    $(span).css("background","#FFFFFF");
    $(textbox).removeAttr("disabled");
    if($(textbox).val().trim()=="") { $(textbox).datepicker("setDate",moment().format("DD/MM/YYYY")); }
  } else {
    $(span).css("background","#EEEEEE");
    $(textbox).attr("disabled","disabled");
  }
}

function modArchSubirPDF(){
  let nombreArchivo = $("#txt_modArchNombre").val().trim();
  if(nombreArchivo==""){
    alert("!!!Falta el nombre del archivo!!!");
  } else {
    let exec = new FormData();
    let datos = {
      TipoQuery : "subirArchivos",
      predioID : $("#lbl_ID").html(),
      nombre : nombreArchivo
    }

    exec.append('filePDF', $('#file_modArchPDF')[0].files[0]);
    exec.append("appSQL",JSON.stringify(datos));
    let rpta = $.ajax({
      url  : rutaSQL,
      type : 'POST',
      processData : false,
      contentType : false,
      data : exec
    })
    .fail(function(resp){
      console.log("fail:.... "+resp.responseText);
    })
    .done(function(resp){
      let rpta = JSON.parse(resp);
      appPredioArchSetData(rpta);
      $("#modalArchivos").modal("hide");
    });
  }
}
