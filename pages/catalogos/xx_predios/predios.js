var rutaSQL = "pages/catalogos/predios/sql.php";
var glob_IdIglMision = 0;

//=========================funciones para workers============================
function appGridAll(){
  $('#grdDatosBody').html('<tr><td colspan="7" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : 'selPredios',
    distritoID : $("#cboDMisioneros").val(),
    buscar : txtBuscar
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        let stylo = (valor.arbifecha==null)?("color:red;"):((valor.arbifecha!=resp.currdate)?("color:red;"):(""));
        fila += '<tr style="'+(stylo)+'">';
        fila += '<td><input type="checkbox" name="chk_Borrar" value="'+(valor.ID)+'"/></td>';
        fila += '<td>'+(valor.clase)+'</td>';
        fila += '<td>'+((valor.dmisionero.length>13)?(valor.dmisionero.substr(0,13)+'...'):(valor.dmisionero))+'</td>';
        fila += '<td>'+((valor.distrito.length>13)?(valor.distrito.substr(0,13)+'...'):(valor.distrito))+'</td>';
        fila += '<td><a href="javascript:appPredioEdit('+(valor.ID)+')" title="'+(valor.ID)+'" style="'+(stylo)+'">'+(valor.predio)+'</a></td>';
        fila += '<td>'+(valor.mision)+'</td>';
        fila += '<td>'+((valor.direccion.length>60)?(valor.direccion.substr(0,60)+'...'):(valor.direccion))+'</td>';
        fila += '</tr>';
      });
      $('#grdDatosBody').html(fila);
    }else{
      $('#grdDatosBody').html('<tr><td colspan="7" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    $('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

function appBotonReset(){
  $("#txtBuscar").val("");
  let datos = { TipoQuery:'comboDMisioneros' }
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    appLlenarDataEnComboBox(resp.tabla,"#cboDMisioneros",resp.misionID);
    if(resp.tipo==5){ $("#cboDMisioneros").attr("disabled","disabled"); } else { $("#cboDMisioneros").removeAttr("disabled"); }
    appGridAll();
  });
}

function appBotonBuscar(e){
  var code = (e.keyCode ? e.keyCode : e.which);
  if(code == 13) { appGridAll(); }
}

function appBotonNuevo(){
  Predio.nuevo();
  $('#btn_modPredioInsert').on('click',function(e) {
    if(Predio.sinErrores()){ //sin errores
      Predio.ejecutaSQL().done(function(resp){
        let data = JSON.parse(resp);
        appPredioSetData(data.tablaPredio); //basico
        appPredioDocumClear(data.conditerreno,data.modos,data.monedas,data.titulos,data.fedatarios);
        appPredioUsoClear(data.usos);
        appPredioRegistralClear();
        appPredioFiscalClear();
        appPredioEspecClear();
        appPredioArchClear();

        $("#btnInsert").show();
        $("#btnUpdate").hide();
        $('#grid').hide();
        $('#edit').show();
        Predio.close();
      });
    } else {
      alert("!!!Faltan llenar Datos!!!");
    }
    e.stopImmediatePropagation();
    $('#btn_modPredioInsert').off('click');
  });
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

function appBotonDelete(){
  let arr = $('[name="chk_Borrar"]:checked').map(function(){ return this.value; }).get();
  if(confirm("¿Esta seguro de continuar borrando estos "+arr.length+" registros?")){
    let datos = { TipoQuery : 'execPredioFull', commandSQL : "DEL", IDs : arr };
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if (!resp.error) { appGridAll(); }
    });
  }
}

function appBotonCancel(){
  $('#edit').hide();
  $('#grid').show();
}

function appBotonInsert(){
  let datos = appGetDatosToDatabase();
  if(datos!=""){
    datos.commandSQL = "INS";
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      appGridAll();
      appBotonCancel();
    });
  } else {
    alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
  }
}

function appBotonUpdate(){
  let datos = appGetDatosToDatabase();
  if(datos!=""){
    datos.commandSQL = "UPD";
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      appGridAll();
      appBotonCancel();
    });
  } else {
    alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
  }
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
function appPredioDocumToDatabase(){
  let data = {
    condiTerreno : $("#cboDocum_CondiTerreno").val(),
    valor : appConvertToNumero($("#txtDocum_Valor").val()),
    modoID : $("#cboDocum_modoID").val(),
    monedaID : $("#cboDocum_monedaID").val(),
    trans : $("#txtDocum_Transfirientes").val(),
    adqui : $("#txtDocum_Adquirientes").val(),
    tituloID : $("#cboDocum_tituloID").val(),
    tituloNRO : $("#txtDocum_Nro").val(),
    fedatarioID : $("#cboDocum_fedatarioID").val(),
    fedatarioNombres : $("#txtDocum_Fedatario").val(),
    fecha : ($("#chkDocum_Fecha").prop("checked")==true)?(appConvertToFecha($("#txtDocum_Fecha").val(),"-")):(null),
    folio : $("#txtDocum_Folio").val(),
  }
  return data;
}

function appPredioRegistralSetData(data){
  $("#txtRegistral_NoFicha").val(data.ficha);
  appCheckFecha(data.fecha1,"#chkRegistral_FichaFecha","#txtRegistral_FichaFecha","#spanRegistral_FichaFecha");
  $("#txtRegistral_Municipio").val(data.municipio);
  appCheckFecha(data.fecha2,"#chkRegistral_MuniFecha","#txtRegistral_MuniFecha","#spanRegistral_MuniFecha");
  $("#txtRegistral_Libro").val(data.libro);
  $("#txtRegistral_Folio").val(data.folio);
  $("#txtRegistral_Asiento").val(data.asiento);
  $("#txtRegistral_Titular").val(data.titular);
  $("#txtRegistral_Zonareg").val(data.zonareg);
}
function appPredioRegistralClear(){
  $("#txtRegistral_NoFicha").val("");
  appCheckFecha(null,"#chkRegistral_FichaFecha","#txtRegistral_FichaFecha","#spanRegistral_FichaFecha");
  $("#txtRegistral_Municipio").val("");
  appCheckFecha(null,"#chkRegistral_MuniFecha","#txtRegistral_MuniFecha","#spanRegistral_MuniFecha");
  $("#txtRegistral_Libro").val("");
  $("#txtRegistral_Folio").val("");
  $("#txtRegistral_Asiento").val("");
  $("#txtRegistral_Titular").val("");
  $("#txtRegistral_Zonareg").val("");
}
function appPredioRegistralToDatabase(){
  let data = {
    fecha1 : ($("#chkRegistral_FichaFecha").prop("checked")==true)?(appConvertToFecha($("#txtRegistral_FichaFecha").val(),"-")):(null),
    fecha2 : ($("#chkRegistral_MuniFecha").prop("checked")==true)?(appConvertToFecha($("#txtRegistral_MuniFecha").val(),"-")):(null),
    ficha : $("#txtRegistral_NoFicha").val(),
    libro : $("#txtRegistral_Libro").val(),
    folio : $("#txtRegistral_Folio").val(),
    asiento : $("#txtRegistral_Asiento").val(),
    titular : $("#txtRegistral_Titular").val(),
    municipio : $("#txtRegistral_Municipio").val(),
    zonareg : $("#txtRegistral_Zonareg").val()
  }
  return data;
}

function appPredioUsoSetData(cboUsos,data){
  appLlenarDataEnComboBox(cboUsos,"#cboUsos_principalID",data.principalID);
  appLlenarDataEnComboBox(cboUsos,"#cboUsos_terceroID",data.terceroID);
  $("#txtUsos_Sesion").val(data.modo);
  appCheckFecha(data.fecha,"#chkUsos_SesionFecha","#txtUsos_SesionFecha","#spanUsos_SesionFecha");
  $("#txtUsos_Periodo").val(data.periodo);
  $("#txtUsos_Pertenece").val(data.pertenece);
  $("#txtUsos_Otros").val(data.otros);
}
function appPredioUsoClear(cboUsos){
  appLlenarDataEnComboBox(cboUsos,"#cboUsos_principalID",0);
  appLlenarDataEnComboBox(cboUsos,"#cboUsos_terceroID",0);
  $("#txtUsos_Sesion").val("");
  appCheckFecha(null,"#chkUsos_SesionFecha","#txtUsos_SesionFecha","#spanUsos_SesionFecha");
  $("#txtUsos_Periodo").val("");
  $("#txtUsos_Pertenece").val("");
  $("#txtUsos_Otros").val("");
}
function appPredioUsoToDatabase(){
  let data = {
    principalID : $("#cboUsos_principalID").val(),
    terceroID : $("#cboUsos_terceroID").val(),
    fecha : ($("#chkUsos_SesionFecha").prop("checked")==true)?(appConvertToFecha($("#txtUsos_SesionFecha").val(),"-")):(null),
    modo : $("#txtUsos_Sesion").val(),
    periodo : $("#txtUsos_Periodo").val(),
    pertenece : $("#txtUsos_Pertenece").val(),
    otros : $("#txtUsos_Otros").val()
  }
  return data;
}

function appPredioFiscalSetData(data){
  $("#txtFiscal_ArbiCodigo").val(data.arbicodigo);
  $("#txtFiscal_PredioCodigo").val(data.arbiresol);
  appCheckFecha(data.arbifecha,"#chkFiscal_ArbiFecha","#txtFiscal_ArbiFecha","#spanFiscal_ArbiFecha");
  $("#txtFiscal_LuzCodigo").val(data.luzcodigo);
  appCheckFecha(data.luzfecha,"#chkFiscal_LuzFecha","#txtFiscal_LuzFecha","#spanFiscal_LuzFecha");
  $("#txtFiscal_AguaCodigo").val(data.aguacodigo);
  appCheckFecha(data.aguafecha,"#chkFiscal_AguaFecha","#txtFiscal_AguaFecha","#spanFiscal_AguaFecha");
  $("#txtFiscal_AvaluoCodigo").val(data.impucodigo);
  $("#txtFiscal_ResolInaf").val(data.impuresol);
  appCheckFecha(data.impufecha,"#chkFiscal_AvaluoFecha","#txtFiscal_AvaluoFecha","#spanFiscal_AvaluoFecha");
  $("#txtFiscal_ConstrCodigo").val(data.construtexto);
  appCheckFecha(data.construfecha,"#chkFiscal_ConstrFecha","#txtFiscal_ConstrFecha","#spanFiscal_ConstrFecha");
  $("#txtFiscal_FabricaCodigo").val(data.declaratexto);
  appCheckFecha(data.declarafecha,"#chkFiscal_FabricaFecha","#txtFiscal_FabricaFecha","#spanFiscal_FabricaFecha");
}
function appPredioFiscalClear(){
  $("#txtFiscal_ArbiCodigo").val("");
  $("#txtFiscal_PredioCodigo").val("");
  appCheckFecha(null,"#chkFiscal_ArbiFecha","#txtFiscal_ArbiFecha","#spanFiscal_ArbiFecha");
  $("#txtFiscal_LuzCodigo").val("");
  appCheckFecha(null,"#chkFiscal_LuzFecha","#txtFiscal_LuzFecha","#spanFiscal_LuzFecha");
  $("#txtFiscal_AguaCodigo").val("");
  appCheckFecha(null,"#chkFiscal_AguaFecha","#txtFiscal_AguaFecha","#spanFiscal_AguaFecha");
  $("#txtFiscal_AvaluoCodigo").val("");
  $("#txtFiscal_ResolInaf").val("");
  appCheckFecha(null,"#chkFiscal_AvaluoFecha","#txtFiscal_AvaluoFecha","#spanFiscal_AvaluoFecha");
  $("#txtFiscal_ConstrCodigo").val("");
  appCheckFecha(null,"#chkFiscal_ConstrFecha","#txtFiscal_ConstrFecha","#spanFiscal_ConstrFecha");
  $("#txtFiscal_FabricaCodigo").val("");
  appCheckFecha(null,"#chkFiscal_FabricaFecha","#txtFiscal_FabricaFecha","#spanFiscal_FabricaFecha");
}
function appPredioFiscalToDatabase(){
  let data = {
    arbifecha : ($("#chkFiscal_ArbiFecha").prop("checked")==true)?(appConvertToFecha($("#txtFiscal_ArbiFecha").val(),"-")):(null),
    arbicodigo : $("#txtFiscal_ArbiCodigo").val(),
    arbiresol : $("#txtFiscal_PredioCodigo").val(),
    impufecha : ($("#chkFiscal_AvaluoFecha").prop("checked")==true)?(appConvertToFecha($("#txtFiscal_AvaluoFecha").val(),"-")):(null),
    impucodigo : $("#txtFiscal_AvaluoCodigo").val(),
    impuresol : $("#txtFiscal_ResolInaf").val(),
    luzfecha : ($("#chkFiscal_LuzFecha").prop("checked")==true)?(appConvertToFecha($("#txtFiscal_LuzFecha").val(),"-")):(null),
    luzcodigo : $("#txtFiscal_LuzCodigo").val(),
    aguafecha : ($("#chkFiscal_AguaFecha").prop("checked")==true)?(appConvertToFecha($("#txtFiscal_AguaFecha").val(),"-")):(null),
    aguacodigo : $("#txtFiscal_AguaCodigo").val(),
    construfecha : ($("#chkFiscal_ConstrFecha").prop("checked")==true)?(appConvertToFecha($("#txtFiscal_ConstrFecha").val(),"-")):(null),
    construtexto : $("#txtFiscal_ConstrCodigo").val(),
    declarafecha : ($("#chkFiscal_FabricaFecha").prop("checked")==true)?(appConvertToFecha($("#txtFiscal_FabricaFecha").val(),"-")):(null),
    declaratexto : $("#txtFiscal_FabricaCodigo").val(),
  }
  return data;
}

function appPredioEspecSetData(data){
  $("#txtEspec_Zona").val(data.ubizona);
  $("#txtEspec_Arancel").val(data.arancel);
  $("#txtEspec_AreaTerreno").val(data.area_total);
  $("#txtEspec_AreaConstruida").val(data.area_const);
  $("#txtEspec_Frente").val(data.frent_medi);
  $("#txtEspec_FrenteCalle").val(data.frent_colin);
  $("#txtEspec_Derecha").val(data.right_medi);
  $("#txtEspec_DerechaCalle").val(data.right_colin);
  $("#txtEspec_Izquierda").val(data.left_medi);
  $("#txtEspec_IzquierdaCalle").val(data.left_colin);
  $("#txtEspec_Fondo").val(data.back_medi);
  $("#txtEspec_FondoCalle").val(data.back_colin);
}
function appPredioEspecClear(){
  $("#txtEspec_Zona").val("");
  $("#txtEspec_Arancel").val("");
  $("#txtEspec_AreaTerreno").val("");
  $("#txtEspec_AreaConstruida").val("");
  $("#txtEspec_Frente").val("");
  $("#txtEspec_FrenteCalle").val("");
  $("#txtEspec_Derecha").val("");
  $("#txtEspec_DerechaCalle").val("");
  $("#txtEspec_Izquierda").val("");
  $("#txtEspec_IzquierdaCalle").val("");
  $("#txtEspec_Fondo").val("");
  $("#txtEspec_FondoCalle").val("");
}
function appPredioEspecToDatabase(){
  let data = {
    ubizona : $("#txtEspec_Zona").val(),
    arancel : $("#txtEspec_Arancel").val(),
    area_total : $("#txtEspec_AreaTerreno").val(),
    area_const : $("#txtEspec_AreaConstruida").val(),
    frent_medi : $("#txtEspec_Frente").val(),
    frent_colin : $("#txtEspec_FrenteCalle").val(),
    right_medi : $("#txtEspec_Derecha").val(),
    right_colin : $("#txtEspec_DerechaCalle").val(),
    left_medi : $("#txtEspec_Izquierda").val(),
    left_colin : $("#txtEspec_IzquierdaCalle").val(),
    back_medi : $("#txtEspec_Fondo").val(),
    back_colin : $("#txtEspec_FondoCalle").val()
  }
  return data;
}

function appPredioArchSetData(data){
  if(data.length>0){
    let fila = "";
    $.each(data,function(key, valor){
      fila += '<tr>';
      fila += '<td>'+(key+1)+'</td>';
      fila += '<td><a href="javascript:appPredioArchBotonDel('+(valor.ID)+')" title="'+(valor.ID)+'"><i class="fa fa-times"></i></a></td>';
      fila += '<td><a target="_blank" href="'+(valor.url)+'" title="'+(valor.ID)+'"><i class="fa fa-eye"></i></a></td>';
      fila += '<td>'+(valor.nombre)+'</td>';
      fila += '</tr>';
    });
    $('#grdArchivosBody').html(fila);
  }else{
    $('#grdArchivosBody').html('<tr><td colspan="4" style="text-align:center;color:red;">Sin Resultados</td></tr>');
  }
  $('#grdArchivosCount').html(data.length);
}
function appPredioArchClear(){
  $("#grdArchivosBody").html("");
  $("#grdArchivosCount").html("0");
}
function appPredioArchBotonAdd(){
  $("#txt_modArchNombre").val("");
  $("#file_modArchPDF").val(null);
  $("#modalArchivos").modal("show");
}
function appPredioArchBotonDel(id){
  if(confirm("¿Estas seguro de borrar este archivo?")){
    let datos = {
      TipoQuery : 'borrarArchivos',
      predioID : $("#lbl_ID").html(),
      ID : id
    }
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      appPredioArchSetData(resp);
    });
  }
}

function appGetDatosToDatabase(){
  let EsError = false;
  let rpta = "";

  $('.box-body .form-group').removeClass('has-error');
  if($("#txtDocum_Valor").val()=="") { $("#divDocum_Valor").prop("class","form-group has-error"); EsError = true; }

  if(!EsError){
    rpta = {
      TipoQuery : "execPredioFull",
      predioID : $("#lbl_ID").html(),
      docum : appPredioDocumToDatabase(),
      registral : appPredioRegistralToDatabase(),
      usos : appPredioUsoToDatabase(),
      fiscal : appPredioFiscalToDatabase(),
      espec : appPredioEspecToDatabase()
    }
  }
  return rpta;
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
