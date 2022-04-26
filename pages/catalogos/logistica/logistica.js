var rutaSQL = "pages/catalogos/logistica/sql.php";

function appBotonReset(){

  

  let datos = {
    TipoQuery : "01_datosAlmacen"
  }

  appAjaxQuery(datos,rutaSQL).done(function(resp){

    appLlenarDataEnComboBox(resp.sede,"#cbo01_Sede",0);
    appLlenarDataEnComboBox(resp.responsable,"#cbo01_Responsable",0);
    appLlenarDataEnComboBox(resp.pais,"#cbo01_Pais",0);
    appLlenarDataEnComboBox(resp.departamento,"#cbo01_Departamento",0);
    appLlenarDataEnComboBox(resp.moneda,"#cbo03_moneda",0);
    appLlenarDataEnComboInput(resp.proveedor,"#grupoOptionsProveedor",0);
    appLlenarDataEnComboInput(resp.proveedor,"#grupoOptionsProveedor10S",0);
    appLlenarDataEnComboInput(resp.proveedor,"#grupoOptionsProveedor11",0);
    appLlenarDataEnComboInput(resp.proveedor,"#grupoOptionsProveedorAnt",0);
    appLlenarDataEnComboInput(resp.proveedor,"#grupoOptionsProveedorAct",0);
    appLlenarDataEnComboInput(resp.cotizacion,"#grupoOptionsCotizacion",0);
    appLlenarDataEnComboInput(resp.groupClase,"#grupoOptionsClase",0);
    appLlenarDataEnComboBox(resp.stockClase,"#cbo03_stock_clase",0);
    appLlenarDataEnComboBox(resp.stockTipo,"#cbo03_stock_tipo",0);
    appLlenarDataEnComboBox(resp.tipoUsuario,"#cbo08_Rol",0);
    appLlenarDataEnComboInput(resp.grupo,"#grupoOptions",0);
    appLlenarDataEnComboInput(resp.herramienta,"#grupoOptionsHerra",0);
    appLlenarDataEnComboInput(resp.herramienta,"#grupoOptionsHerraRet",0);
    appLlenarDataEnComboInput(resp.usuario,"#grupoOptionsUsu",0);
    appLlenarDataEnComboInput(resp.tarea,"#grupoOptionsTarea",0);

  });

  app01Almacenes();
  app21GridAll();
  app22GridAll();
  app3GridAll();
  app4GridAll();
  app6GridAll();
  app7GridAll();
  app8GridAll();
  app9GridAll();
  app10GridAll();
  app12GridAll();
  app13GridAll();
  app14GridAll();

  $("#txt09_Fecha").datepicker("setDate",moment().format("DD/MM/YYYY"));
  $("#txt12_Fecha").datepicker("setDate",moment().format("DD/MM/YYYY"));
}


function app00_Tarea(){
  let datos = {
    TipoQuery : "01_datosAlmacen"
  }

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    appLlenarDataEnComboInput(resp.herramienta,"#grupoOptionsHerra",0);
    appLlenarDataEnComboInput(resp.herramienta,"#grupoOptionsHerraRet",0);
  });
}

function app00_Inventario(){
  let datos = {
    TipoQuery : "01_datosAlmacen"
  }

  appAjaxQuery(datos,rutaSQL).done(function(resp){

    appLlenarDataEnComboBox(resp.moneda,"#cbo03_moneda",0);
    appLlenarDataEnComboInput(resp.proveedor,"#grupoOptionsProveedor",0);
    appLlenarDataEnComboInput(resp.groupClase,"#grupoOptionsClase",0);
    appLlenarDataEnComboBox(resp.stockClase,"#cbo03_stock_clase",0);
    appLlenarDataEnComboBox(resp.stockTipo,"#cbo03_stock_tipo",0);
  });
  app3GridAll();
}

function app00_Retiro(){
  let datos = {
    TipoQuery : "01_datosAlmacen"
  }

  appAjaxQuery(datos,rutaSQL).done(function(resp){

    appLlenarDataEnComboInput(resp.usuario,"#grupoOptionsUsu",0);
    appLlenarDataEnComboInput(resp.tarea,"#grupoOptionsTarea",0);

  });
}

function app00_Cotizacion(){
  let datos = {
    TipoQuery : "01_datosAlmacen"
  }

  appAjaxQuery(datos,rutaSQL).done(function(resp){

    appLlenarDataEnComboInput(resp.proveedor,"#grupoOptionsProveedor9S",0);
    app10GridAll();
  
  });
}

function app00_CotiProveedor(){
  let datos = {
    TipoQuery : "01_datosAlmacen"
  }

  appAjaxQuery(datos,rutaSQL).done(function(resp){

    appLlenarDataEnComboInput(resp.proveedor,"#grupoOptionsProveedor11",0);
    appLlenarDataEnComboInput(resp.cotizacion,"#grupoOptionsCotizacion",0);

  });
}

function app00_Req(){
  app9GridAll();
}

function app00_Orden(){
  let datos = {
    TipoQuery : "01_datosAlmacen"
  }

  appAjaxQuery(datos,rutaSQL).done(function(resp){

    appLlenarDataEnComboInput(resp.proveedor,"#grupoOptionsProveedorAnt",0);
    appLlenarDataEnComboInput(resp.proveedor,"#grupoOptionsProveedorAct",0);
    app12GridAll();
  });
}

function app00_OrdenCompra(){
  app13GridAll();
}
function app01Boton_new(){
    let datos = {
      TipoQuery : "01_nuevo"
    }
  
    appAjaxQuery(datos,rutaSQL).done(function(resp){

      appLlenarDataEnComboBox(resp.departamento,"#cbo01_Departamento",0);
      appLlenarDataEnComboBox(resp.provincia,"#cbo01_Provincia",0);
      appLlenarDataEnComboBox(resp.distrito,"#cbo01_Distrito",0);
      
     
      $("#txt01_Fecha").datepicker("setDate",moment().format("DD/MM/YYYY"));
      $("#txt01_NroAlmacen").val("");
      $("#txt01_Descripción").val("");
      $("#cbo01_Sede").val(1);
      $("#txt01_Direccion").val("");
      $("#txt01_Referencia").val("");
      $("#cbo01_Responsable").val(1);
      $("#txt01_Telefono").val("");
      $("#cbo01_Pais").val(1);
      $("#cbo01_Departamento").val(1);
      $("#cbo01_Provincia").val(1);
      $("#cbo01_Distrito").val(1);
      $("#cbo01_Estado").val("Activo");

    
      //app02Estado(false);
      
      $("#btn01_Cancel").show();
      $("#btn01_Delete").hide();
      $("#btn01_Save").show();
      $("#btn01_New").hide();
      $("#btn01_Update").hide();
      
    });
  }


function app01Boton_cancel(){
  appBotonReset();
  $("#btn01_Cancel").hide();
  $("#btn01_Delete").show();
  $("#btn01_Save").hide();
  $("#btn01_New").show();
  $("#btn01_Update").show();
}

function app01Boton_delete(){
  var id = $("#txt01_NroAlmacen").val();
  if(confirm("¿Esta seguro que desea eliminar el almacen "+id+"?")){
    let datos = {
      TipoQuery: "01_save",
      commandSQL : "DEL",
      status: 0,
      almID: id
    }
    //console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        app01Boton_cancel();
        
        alert("El almacen numero "+id+" fue eliminado!!");
      }
    });
  }
  else{
      return false;
  }
}

function app01Boton_save(){

  let datos = app01GetDatos_ToDatabase();
  if(datos!=""){
    datos.commandSQL = "INS";
    console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        app01Boton_cancel();
        alert("El almacen fue creado exitosamente!");
      }
    });
  } else {
    alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
  }

}

function app01GetDatos_ToDatabase(){

  let EsError = false;
  let rpta = "";

  $('.box-body .form-group').removeClass('has-error');
  //if($("#txtDocum_Valor").val()=="") { $("#divDocum_Valor").prop("class","form-group has-error"); EsError = true; }

  if(!EsError){
   

    rpta = {
      TipoQuery : '01_save',
      estado: $("#cbo01_Estado").val(),
      descripcion: $("#txt01_Descripción").val(),
      sede:$("#cbo01_Sede").val(),
      direccion:$("#txt01_Direccion").val(),
      referencia:$("#txt01_Referencia").val(),
      responsable:$("#cbo01_Responsable").val(),
      telefono:$("#txt01_Telefono").val(),
      departamento:$("#cbo01_Departamento").val(),
      provincia:$("#cbo01_Provincia").val(),
      distrito:$("#cbo01_Distrito").val(),
      status:1,
      fecha:appConvertToFecha($("#txt01_Fecha").val(),"-")
    }
  }
  return rpta;
}


function app01Boton_update(){
  let datos = app01GetDatos_ToDatabase();
  if(datos!=""){
    datos.commandSQL = "UPD";
    datos.almID =$("#txt01_NroAlmacen").val(),
    console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        app01Boton_cancel();
        
        alert("El almacen se actualizo!");
      }
    });
  } else {
    alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
  }
}

function app01Almacenes(){

  let datos = {
    TipoQuery : '01_almacen'
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr onclick="javascript:app01Get_almacen('+(parseInt(valor.ID))+')";>'; 
        fila += '<th scope="row">'+(valor.ID)+'</th>';
        fila += '<td>'+(valor.descripcion)+'</td>';
        fila += '</tr>';
      });
      $('#alm01DatosBody').html(fila);

      
      app01Get_almacen(resp.tabla[0].ID);

    }else{
      $('#alm01DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados </td></tr>');
    }
    
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}


function app01Get_almacen(registro){

  
  $("#btn01_Cancel").hide();
  $("#btn01_Delete").show();
  $("#btn01_Save").hide();
  $("#btn01_New").show();
  $("#btn01_Update").show();
  //alert(registro);
  let datos = {
    TipoQuery : '01_getbyid',
    almacen: registro
  };

  //var idProv=0, idDis=0, idDep=0, idPais=0;
  var provincia, distrito, departamento;
  let distritos=[], provincias=[];
  appAjaxQuery(datos,rutaSQL).done(function(resp){

    $("#txt01_Fecha").datepicker("setDate",moment(resp.tabla[0].fecha).format("DD/MM/YYYY"));
    $("#txt01_NroAlmacen").val(resp.tabla[0].ID);
    $("#txt01_Descripción").val(resp.tabla[0].descripcion);
    $("#cbo01_Sede").val(resp.tabla[0].sede);
    $("#txt01_Direccion").val(resp.tabla[0].direccion);
    $("#txt01_Referencia").val(resp.tabla[0].referencia);
    $("#cbo01_Responsable").val(resp.tabla[0].responsable);
    $("#txt01_Telefono").val(resp.tabla[0].telefono);
    $("#cbo01_Departamento").val(resp.tabla[0].departamento);
    $("#cbo01_Estado").val(resp.tabla[0].estado);


    var idProv, idDis;
    idProv= resp.tabla[0].provincia;
    idDis= resp.tabla[0].distrito;
    let datos = {
      TipoQuery : '01_datosAlmaProv',
      departamento: resp.tabla[0].departamento
    };

    appAjaxQuery(datos,rutaSQL).done(function(resp){
      appLlenarDataEnComboBox(resp.tabla,"#cbo01_Provincia",0);
      $("#cbo01_Provincia").val(idProv);

      let datos = {
        TipoQuery : '01_datosAlmaDist',
        provincia: idProv
      };
      appAjaxQuery(datos,rutaSQL).done(function(resp){
        appLlenarDataEnComboBox(resp.tabla,"#cbo01_Distrito",0);
        $("#cbo01_Distrito").val(idDis);
      });

    });
  

    //$("#cbo01_Provincia").val(resp.tabla[0].provincia);
    //$("#cbo01_Distrito").val(resp.tabla[0].distrito);
    
    

    
 
    });

}

function app02Group(){
  
  $("#grid02_groupClass").hide();
  $("#grid02_group").show();
  $("#btn02_New").hide();
  $("#btn021_New").show();
  $("#link02_groupClass").removeClass("active");
  $("#link02_group").addClass("active");
  app021Boton_cancel();
  

}

function app02Group_class(){
  
  $("#grid02_group").hide();
  $("#grid02_groupClass").show();
  $("#btn021_New").hide();
  $("#btn02_New").show();
  
  $("#link02_group").removeClass("active");
  $("#link02_groupClass").addClass("active");

  app02Boton_cancel();

}


function app02Boton_new(){
  //hide
  //gruop other
  //buttons
  $("#btn021_Cancel").hide();
  $("#btn021_Save").hide();
  $("#btn021_Update").hide();
  $("#btn021_New").hide();

  //edit
  $("#edit021").hide();
  //grid
  $("#grid02_group").hide();

  //hide
  //group class own
  //buttons
  $("#btn02_Update").hide();
  $("#btn02_New").hide();

  //grid
  $("#grid02_groupClass").hide();

  //show
  //group buttons
  $("#btn02_Cancel").show();
  $("#btn02_Save").show();

  //group edit
  $("#edit02").show();

}

function app02Boton_cancel(){
  //hide
  //gruop other
  //buttons
  $("#btn021_Cancel").hide();
  $("#btn021_Save").hide();
  $("#btn021_Update").hide();
  $("#btn021_New").hide();

  //edit
  $("#edit021").hide();
  //grid
  $("#grid02_group").hide();

  //hide
  //group class own
  //buttons
  $("#btn02_Update").hide();
  $("#btn02_New").show();

  //grid
  $("#grid02_groupClass").show();

  //show
  //group buttons
  $("#btn02_Cancel").hide();
  $("#btn02_Save").hide();

  //group edit
  $("#edit02").hide();
  $("#txt02_NroGrupo").val("");
  $("#txt02_Descripcion").val("");
  $("#txt022_NroClase").val("");
  $("#txt022_Descripcion").val("");
  $("#txt022_NroGrupo").val("");
}

function app021Boton_new(){
  //hide
  //gruop class other
  //buttons
  $("#btn02_Cancel").hide();
  $("#btn02_Save").hide();
  $("#btn02_Update").hide();
  $("#btn02_New").hide();

  //edit
  $("#edit02").hide();
  //grid
  $("#grid02_groupClass").hide();

  //hide
  //group  own
  //buttons
  $("#btn021_Update").hide();
  $("#btn021_New").hide();

  //grid
  $("#grid02_group").hide();

  //show
  //group buttons
  $("#btn021_Cancel").show();
  $("#btn021_Save").show();

  //group edit
  $("#edit021").show();
  
}

function app021Boton_load(){
  //hide
  //gruop class other
  //buttons
  $("#btn02_Cancel").hide();
  $("#btn02_Save").hide();
  $("#btn02_Update").hide();
  $("#btn02_New").hide();

  //edit
  $("#edit02").hide();
  //grid
  $("#grid02_groupClass").hide();

  //hide
  //group  own
  //buttons
  $("#btn021_Save").hide();
  $("#btn021_New").hide();

  //grid
  $("#grid02_group").hide();

  //show
  //group buttons
  $("#btn021_Cancel").show();
  $("#btn021_Save").hide();

  //group edit
  $("#edit021").show();
  $("#btn021_Update").show();
  
}

function app02Boton_load(){
  //hide
  //gruop class other
  //buttons
  $("#btn021_Cancel").hide();
  $("#btn021_Save").hide();
  $("#btn021_Update").hide();
  $("#btn021_New").hide();

  //edit
  $("#edit021").hide();
  //grid
  $("#grid02_group").hide();

  //hide
  //group  own
  //buttons
  $("#btn02_Save").hide();
  $("#btn02_New").hide();

  //grid
  $("#grid02_groupClass").hide();

  //show
  //group buttons
  $("#btn02_Cancel").show();
  $("#btn02_Save").hide();

  //group edit
  $("#edit02").show();
  $("#btn02_Update").show();
  
}

function app021Boton_cancel(){
  $//hide
  //gruop class other
  //buttons
  $("#btn02_Cancel").hide();
  $("#btn02_Save").hide();
  $("#btn02_Update").hide();
  $("#btn02_New").hide();

  //edit
  $("#edit02").hide();
  //grid
  $("#grid02_groupClass").hide();

  //hide
  //group  own
  //buttons
  $("#btn021_Update").hide();
  $("#btn021_New").show();

  //grid
  $("#grid02_group").show();

  //show
  //group buttons
  $("#btn021_Cancel").hide();
  $("#btn021_Save").hide();

  //group edit
  $("#edit021").hide();
  $("#txt02_NroGrupo").val("");
  $("#txt02_Descripcion").val("");
  $("#txt022_NroClase").val("");
  $("#txt022_Descripcion").val("");
  $("#txt022_NroGrupo").val("");
  
}

function app021Boton_ins(){

  
  let datos = app021GetDatos_ToDatabase();

  let data={
    TipoQuery : '02_getgrupo',
    codigo:datos.codigo
  }

  appAjaxQuery(data,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      alert("El codigo de grupo ya existe! Ingrese otro...");
    }else{
      if(datos!=""){
        datos.commandSQL = "INS";
        console.log(datos);
        appAjaxQuery(datos,rutaSQL).done(function(resp){
          console.log(resp);
          if(resp.error==0) {
            alert("El group fue creado exitosamente!");
            let datos = {
              TipoQuery : "01_datosGrupo"
            }
          
            appAjaxQuery(datos,rutaSQL).done(function(resp){
              appLlenarDataEnComboInput(resp.grupo,"#grupoOptions",0);
            });
            app021Boton_cancel();
            app21GridAll();
            
          }
        });
      } else {
        alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
      }
    }
  });
  
}

function app021GetDatos_ToDatabase(){

  let EsError = false;
  let rpta = "";

  $('.box-body .form-group').removeClass('has-error');
  //if($("#txtDocum_Valor").val()=="") { $("#divDocum_Valor").prop("class","form-group has-error"); EsError = true; }

  if(!EsError){
   

    rpta = {
      TipoQuery : '02_save',
      ID: $("#txt02_id").val(),
      codigo: $("#txt02_NroGrupo").val(),
      descripcion: $("#txt02_Descripcion").val(),
    }
  }
  return rpta;
}

function app21GridAll(){
  $('#grd021DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : '02_grid'
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        fila += '<td>'+
        '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app021_laod('+(parseInt(valor.ID))+');"><i class="fa fa-pencil"></i></button>'+
        '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app021Boton_delete('+(parseInt(valor.ID))+','+valor.codigo+');"><i class="fa fa-trash"></i></button></td>';
        
        fila += '<td>'+(valor.codigo)+'</td>';
        fila += '<td>'+(valor.descripcion)+'</td>';
        fila += '</tr>';
      });
      $('#grd021DatosBody').html(fila);
    }else{
      $('#grd021DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

function app021Boton_Search(){
  $('#grd021DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txt021_Buscar_grupo").val();
  let datos = {
    TipoQuery : '02_grid_search',
    search_text : $("#txt021_Buscar_grupo").val()
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        fila += '<td>'+
        '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app021Boton_laod('+(parseInt(valor.ID))+');"><i class="fa fa-pencil"></i></button>'+
        '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app021Boton_delete('+(parseInt(valor.ID))+');"><i class="fa fa-trash"></i></button></td>';
        
        fila += '<td>'+(valor.codigo)+'</td>';
        fila += '<td>'+(valor.descripcion)+'</td>';
        fila += '</tr>';
      });
      $('#grd021DatosBody').html(fila);
    }else{
      $('#grd021DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

//formulario para accion nuevo ST
function app021_laod($id){

  let datos = {
    TipoQuery: "022_getbygrupo",
    grupo:$id
  }
  //console.log(datos);
  appAjaxQuery(datos,rutaSQL).done(function(resp){

    if(resp.tabla.length>0){
      alert("El group no se puede editar ya que tiene group class!");
    }else{
      let datos = {
        TipoQuery : "02_getbyid",
        grupo: $id
      }
      appAjaxQuery(datos,rutaSQL).done(function(resp){
        //$("#txt02_NroActivo").val($("#lbl_ActivoGrupo").html()+' - '+$("#lbl_ActivoNro").html());
        
        $("#txt02_id").val(resp.tabla[0].ID);
        $("#txt02_NroGrupo").val(resp.tabla[0].codigo);
        $("#txt02_Descripcion").val(resp.tabla[0].descripcion);
        app021Boton_load();
        
          
      });
    }
  });
  
}

//progrmación pendiente
function app021Boton_update(){
  let datos = app021GetDatos_ToDatabase();
  let data={
    TipoQuery : '02_getgrupo',
    codigo:datos.codigo
  }

  appAjaxQuery(data,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      alert("El codigo de grupo ya existe! Ingrese otro...");
    }else{
      if(datos!=""){
        datos.commandSQL = "UPD";
        console.log(datos);
        appAjaxQuery(datos,rutaSQL).done(function(resp){
          console.log(resp);
          if(resp.error==0) {
            alert("El group se actualizo correctamente!");
    
            let datos = {
              TipoQuery : "01_datosGrupo"
            }
          
            appAjaxQuery(datos,rutaSQL).done(function(resp){
              appLlenarDataEnComboInput(resp.grupo,"#grupoOptions",0);
            });
            app021Boton_cancel();
            app21GridAll();
          }
        });
      } else {
        alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
      }
    }
  });
  
}

function app021Boton_delete($id,$codigo){

  if(confirm("¿Esta seguro que desea eliminar el group con código: "+$codigo+"?")){

    let datos = {
      TipoQuery: "022_getbygrupo",
      grupo:$id
    }
    //console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){

     
      if(resp.tabla.length>0){
        alert("El group no se puede eliminar ya que tiene group class!");
      }else{
        datos = {
          TipoQuery: "02_save",
          commandSQL : "DEL",
          status: 0,
          ID: $id
        }
        //console.log(datos);
        appAjaxQuery(datos,rutaSQL).done(function(resp){
          console.log(resp);
          if(resp.error==0) {
            
            alert("El group con código "+$codigo+" fue eliminado!");
            let datos = {
              TipoQuery : "01_datosGrupo"
            }
          
            appAjaxQuery(datos,rutaSQL).done(function(resp){
              appLlenarDataEnComboInput(resp.grupo,"#grupoOptions",0);
            });
            app021Boton_cancel();
            app21GridAll();
          }
        });
      }
    });

    
  }
  else{
      return false;
  }
  
}


function app02Boton_ins(){

  let datos = app02GetDatos_ToDatabase();
  let data={
    TipoQuery : '022_getclase',
    codigo:datos.codigo
  }

  appAjaxQuery(data,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      alert("El codigo de clase ya existe! Ingrese otro...");
    }else{
      if(datos!=""){
        datos.commandSQL = "INS";
        console.log(datos);
        appAjaxQuery(datos,rutaSQL).done(function(resp){
          console.log(resp);
          if(resp.error==0) {
            alert("El group class fue creado exitosamente!");
            app02Boton_cancel();
            app22GridAll();
            
          }
        });
      } else {
        alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
      }
    }
  });
  
}

function app02GetDatos_ToDatabase(){

  let EsError = false;
  let rpta = "";

  $('.box-body .form-group').removeClass('has-error');
  //if($("#txtDocum_Valor").val()=="") { $("#divDocum_Valor").prop("class","form-group has-error"); EsError = true; }

  if(!EsError){
   
    var grupo = document.getElementById("txt022_NroGrupo").value;
    var grupoID = document.querySelector("#grupoOptions option[value='"+grupo+"']").dataset.value;
    //alert(grupoID);
    rpta = {
      TipoQuery : '022_save',
      ID: $("#txt022_id").val(),
      codigo: $("#txt022_NroGrupo").val()+""+$("#txt022_NroClase").val(),
      grupo:grupoID,
      descripcion: $("#txt022_Descripcion").val(),
    }
  }
  return rpta;
}


function app02Boton_Search(){
  $('#grd022DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txt022_Buscar_clase").val();
  let datos = {
    TipoQuery : '022_grid_search',
    search_text : $("#txt022_Buscar_clase").val()
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        fila += '<td>'+
        '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app021Boton_laod('+(parseInt(valor.ID))+');"><i class="fa fa-pencil"></i></button>'+
        '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app021Boton_delete('+(parseInt(valor.ID))+');"><i class="fa fa-trash"></i></button></td>';
        
        fila += '<td>'+(valor.codigo)+'</td>';
        fila += '<td>'+(valor.descripcion)+'</td>';
        fila += '</tr>';
      });
      $('#grd022DatosBody').html(fila);
    }else{
      $('#grd022DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

function app22GridAll(){
  $('#grd022DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : '022_grid'
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        fila += '<td>'+
        '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app02laod('+(parseInt(valor.ID))+');"><i class="fa fa-pencil"></i></button>'+
        '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app02Boton_delete('+(parseInt(valor.ID))+','+valor.codigo+');"><i class="fa fa-trash"></i></button></td>';
        
        fila += '<td>'+(valor.codigo)+'</td>';
        fila += '<td>'+(valor.descripcion)+'</td>';
        fila += '</tr>';
      });
      $('#grd022DatosBody').html(fila);
    }else{
      $('#grd022DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

function app02laod($id){


  let datos = {
    TipoQuery : "022_getbyid",
    clase: $id
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){

    $("#txt022_id").val(resp.tabla[0].ID);
    var cod = resp.tabla[0].codigo.substr(2, 3);
    $("#txt022_NroClase").val(cod);
    $("#txt022_Descripcion").val(resp.tabla[0].descripcion);
    let datos={
      TipoQuery:"02_getbyid",
      grupo: resp.tabla[0].grupo
    }
    appAjaxQuery(datos,rutaSQL).done(function(resp){

      $("#txt022_NroGrupo").val(resp.tabla[0].codigo);
      app02Boton_load();
    });
    
    
      
  });
   
}

function app02Boton_update(){
  let datos = app02GetDatos_ToDatabase();
  let data={
    TipoQuery : '022_getclase',
    codigo:datos.codigo
  }

  appAjaxQuery(data,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      alert("El codigo de clase ya existe! Ingrese otro...");
    }else{
      if(datos!=""){
        datos.commandSQL = "UPD";
        console.log(datos);
        appAjaxQuery(datos,rutaSQL).done(function(resp){
          console.log(resp);
          if(resp.error==0) {
          
            alert("La class fue creado exitosamente!");
            app02Boton_cancel();
            app22GridAll();
          }
        });
      } else {
        alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
      }
    }
  });
 
}

function app02Boton_delete($id,$codigo){

  if(confirm("¿Esta seguro que desea eliminar el group class con código: "+$codigo+"?")){
    let datos = {
      TipoQuery: "022_save",
      commandSQL : "DEL",
      status: 0,
      ID: $id
    }
    //console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        alert("El group class con código "+$codigo+" fue eliminado!");
        app02Boton_cancel();
        app22GridAll();
      }
    });
  }
  else{
      return false;
  }
  
}

//ini item
function app3GridAll(){
  $('#grd03DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : '03_grid'
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        fila += '<td>'+
        '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app03Boton_load('+(parseInt(valor.ID))+');"><i class="fa fa-pencil"></i></button>'+
        '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app03Boton_delete('+(parseInt(valor.ID))+');"><i class="fa fa-trash"></i></button></td>';
        
        fila += '<td>'+(valor.ID)+'</td>';
        fila += '<td>'+(valor.clase)+'</td>';
        fila += '<td>'+(valor.proveedor)+'</td>';
        fila += '<td>'+(valor.fabricante)+'</td>';
        fila += '<td>'+(valor.nombre)+'</td>';
        fila += '<td>'+(valor.descripcion)+'</td>';
        fila += '<td>'+(valor.unidad)+'</td>';
        fila += '<td>'+(valor.stock)+'</td>';
        fila += '<td>'+(valor.precio)+'</td>';
        fila += '</tr>';
      });
      $('#grd03DatosBody').html(fila);
    }else{
      $('#grd03DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

function app03Boton_Search(){
  $('#grd03DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txt03_Buscar").val();
  if(txtBuscar.length>0){
    let datos = {
      TipoQuery : '03_getbyclase',
      ID: txtBuscar
    };
  
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.tabla.length>0){
        let fila = "";
        $.each(resp.tabla,function(key, valor){
          fila += '<tr>';
          fila += '<td>'+
          '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app03Boton_load('+(parseInt(valor.ID))+');"><i class="fa fa-pencil"></i></button>'+
          '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app03Boton_delete('+(parseInt(valor.ID))+');"><i class="fa fa-trash"></i></button></td>';
          
          fila += '<td>'+(valor.ID)+'</td>';
          fila += '<td>'+(valor.clase)+'</td>';
          fila += '<td>'+(valor.proveedor)+'</td>';
          fila += '<td>'+(valor.fabricante)+'</td>';
          fila += '<td>'+(valor.nombre)+'</td>';
          fila += '<td>'+(valor.descripcion)+'</td>';
          fila += '<td>'+(valor.unidad)+'</td>';
          fila += '<td>'+(valor.stock)+'</td>';
          fila += '<td>'+(valor.precio)+'</td>';
          fila += '</tr>';
        });
        $('#grd03DatosBody').html(fila);
      }else{
        $('#grd03DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
      }
      //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
    });
  }else{
    app3GridAll();
  }
  
}
function app03Boton_new(){
  $("#grid03").hide();
  $("#btn03_New").hide();
  $("#btn03_Update").hide();
  $("#edit03").show();
  $("#btn03_Save").show();
  $("#btn03_Cancel").show();
}

function app03Boton_cancel(){
  app3GridAll();
  $("#edit03").hide();
  $("#btn03_Save").hide();
  $("#btn03_Cancel").hide();
  $("#btn03_Update").hide();
  $("#grid03").show();
  $("#btn03_New").show();
  $("#txt03_id").val("");
  $("#cbo03_group_class").val("");
  $("#txt03_ROP").val("");
  $("#txt03_ROQ").val("");
  $("#cbo03_UOI").val("EA");
  $("#txt03_num_parte").val("");
  $("#cbo03_moneda").val(1);
  $("#txt03_precio").val("");
  $("#cbo03_proveedor").val("");
  $("#txt03_nombre").val("");
  $("#txt03_nombre_col").val("");
  $("#txt03_stock_cod").val("");
  $("#txt03_stock_num").val("");
  $("#cbo03_stock_clase").val(1);
  $("#cbo03_stock_tipo").val(1);
  $("#txt03_stock_min").val("");
  $("#txt03_stock").val("");
  $("#area03_descripcion").val("");
  $("#cbo03_apl_tipo").val("G");
  $("#txt03_apl_ref").val("");
  $("#txt03_apl_cant").val("");
  $("#txt03_cod_comp").val("");
}

function app03GetDatos_ToDatabase(){

  let EsError = false;
  let rpta = "";
  $('.box-body .form-group').removeClass('has-error');
  //if($("#txtDocum_Valor").val()=="") { $("#divDocum_Valor").prop("class","form-group has-error"); EsError = true; }
  var clase = document.getElementById("cbo03_group_class").value;
  var claseID = document.querySelector("#grupoOptionsClase option[value='"+clase+"']").dataset.value;
  var proveedor = document.getElementById("cbo03_proveedor").value;
  var provID = document.querySelector("#grupoOptionsProveedor option[value='"+proveedor+"']").dataset.value;
  if(!EsError){
    rpta = {
      TipoQuery : '03_save',
      clase: claseID,
      rop: $("#txt03_ROP").val(),
      roq: $("#txt03_ROQ").val(),
      uoi: $("#cbo03_UOI").val(),
      numParte: $("#txt03_num_parte").val(),
      moneda: $("#cbo03_moneda").val(),
      precio: $("#txt03_precio").val(),
      proveedor: provID,
      nombre: $("#txt03_nombre").val(),
      nombreCol: $("#txt03_nombre_col").val(),
      stockCod: $("#txt03_stock_cod").val(),
      stockNum: $("#txt03_stock_num").val(),
      stockClase: $("#cbo03_stock_clase").val(),
      stockTipo: $("#cbo03_stock_tipo").val(),
      stockMin: $("#txt03_stock_min").val(),
      stock: $("#txt03_stock").val(),
      descripcion: $("#area03_descripcion").val(),
      apltipo: $("#cbo03_apl_tipo").val(),
      aplReferencia: $("#txt03_apl_ref").val(),
      aplCantidad: $("#txt03_apl_cant").val(),
      componente: $("#txt03_cod_comp").val()
    }
  }
  return rpta;
}

function app03Boton_save(){

  let datos = app03GetDatos_ToDatabase();
 
  if(datos!=""){
    datos.commandSQL = "INS";
    console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.error==0) {

        alert("El item fue registrado exitosamente!");
        app03Boton_cancel();
      }
    });
  } else {
    alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
  }
}

function app03_load(){
  $("#grid03").hide();
  $("#btn03_New").hide();
  $("#btn03_Save").hide();
  $("#edit03").show();
  $("#btn03_Update").show();
  $("#btn03_Cancel").show();
}

function app03Boton_load(id){

  let datos = {
    TipoQuery : "03_getbyid",
    ID: id
  }
  console.log("id: "+id);
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    //$("#txt02_NroActivo").val($("#lbl_ActivoGrupo").html()+' - '+$("#lbl_ActivoNro").html());
  
    $("#txt03_id").val(resp.tabla[0].ID);
    $("#cbo03_group_class").val($('#grupoOptionsClase [data-value="' + resp.tabla[0].clase + '"]').val());
    $("#txt03_ROP").val(resp.tabla[0].rop);
    $("#txt03_ROQ").val(resp.tabla[0].roq);
    $("#cbo03_UOI").val(resp.tabla[0].unidad);
    $("#txt03_num_parte").val(resp.tabla[0].numParte);
    $("#cbo03_moneda").val(resp.tabla[0].moneda);
    $("#txt03_precio").val(resp.tabla[0].precio);
    $("#cbo03_proveedor").val($('#grupoOptionsProveedor [data-value="' + resp.tabla[0].proveedor + '"]').val());
    $("#txt03_nombre").val(resp.tabla[0].nombre);
    $("#txt03_nombre_col").val(resp.tabla[0].nombreCol);
    $("#txt03_stock_cod").val(resp.tabla[0].stockCod);
    $("#txt03_stock_num").val(resp.tabla[0].stockNum);
    $("#cbo03_stock_clase").val(resp.tabla[0].stockClase);
    $("#cbo03_stock_tipo").val(resp.tabla[0].stockTipo);
    $("#txt03_stock_min").val(resp.tabla[0].stockMin);
    $("#txt03_stock").val(resp.tabla[0].stock);
    $("#area03_descripcion").val(resp.tabla[0].descripcion);
    $("#cbo03_apl_tipo").val(resp.tabla[0].aplTipo);
    $("#txt03_apl_ref").val(resp.tabla[0].aplReferencia);
    $("#txt03_apl_cant").val(resp.tabla[0].aplCantidad);
    $("#txt03_cod_comp").val(resp.tabla[0].componente);
    app03_load(); 
  });

  
}

function app03Boton_update(){

  let datos = app03GetDatos_ToDatabase();
  if(datos!=""){
    datos.commandSQL = "UPD";
    datos.ID= $("#txt03_id").val();
    console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        alert("El item fue actualizado correctamente!");

        app03Boton_cancel();
        app8GridAll();
      }
    });
  } else {
    alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
  }
}

function app03Boton_delete(id){

  if(confirm("¿Esta seguro que desea eliminar el item "+id+"?")){
    let datos = {
      TipoQuery: "03_save",
      commandSQL : "DEL",
      status: 0,
      ID: id
    }
    //console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        app03Boton_cancel();
        app3GridAll();
        alert("El item "+id+" fue eliminado!!");
      }
    });
  }
  else{
      return false;
  }
}
//fin item

//ini retiros
function app4GridAll(){
  $('#grd04DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : '04_grid'
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        fila += '<td>'+
        '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app04Boton_load('+(parseInt(valor.ID))+');"><i class="fa fa-eye"></i></button>';
       /*  '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app04Boton_delete('+(parseInt(valor.ID))+');"><i class="fa fa-trash"></i></button></td>'; */
        fila += '<td>'+(valor.ID)+'</td>';
        fila += '<td>'+(valor.fecha)+'</td>';
        fila += '<td>'+(valor.usuario)+'</td>';
        fila += '<td>'+(valor.tarea)+'</td>';
        fila += '<td>'+(valor.estado)+'</td>';
        fila += '</tr>';
      });
      $('#grd04DatosBody').html(fila);
    }else{
      $('#grd04DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

function app04Boton_Search(){
  $('#grd04DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txt04_Buscar").val();
  if(txtBuscar>0){
   
  let datos = {
    TipoQuery : '04_getbyid',
    ID:txtBuscar,
    estado: "Retirado"
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        fila += '<td>'+
        '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app04Boton_load('+(parseInt(valor.ID))+');"><i class="fa fa-eye"></i></button>';
       /*  '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app04Boton_delete('+(parseInt(valor.ID))+');"><i class="fa fa-trash"></i></button></td>'; */
        fila += '<td>'+(valor.ID)+'</td>';
        fila += '<td>'+(valor.fecha)+'</td>';
        fila += '<td>'+(valor.usuario)+'</td>';
        fila += '<td>'+(valor.tarea)+'</td>';
        fila += '<td>'+(valor.estado)+'</td>';
        fila += '</tr>';
      });
      $('#grd04DatosBody').html(fila);
    }else{
      $('#grd04DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
  }else{
    app4GridAll();
  }
}

function app04Boton_new(){
  $("#grid04").hide();
  $("#btn04_New").hide();
  $("#btn04_Update").hide();
  $("#edit04").show();
  $("#btn04_Save").show();
  $("#btn04_Cancel").show();
}

/* let herramientasRet=[];
let herraNombreRet=[];
let cantidadesRet=[]; */
let tareaDetalle=[];
let tareaRetirar=[];
let tareaObservacion=[];
function app04Boton_addTarea(){
  var nombre = document.getElementById("txt04_Tarea").value;
  var estado =false;
  if(nombre.length>0){
    
    var ID = document.querySelector("#grupoOptionsTarea option[value='"+nombre+"']").dataset.value;
    console.log("id:"+ID);
    var id = parseInt(ID);

    let datos={
      TipoQuery:"07_getDetalles",
      ID:id
    }
    appAjaxQuery(datos,rutaSQL).done(function(resp){

      if(resp.tabla.length>0){
        let fila = "";
        $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        fila += '<td>'+(valor.herramientaNombre)+'</td>';
        fila += '<td>'+(valor.cantidad)+'</td>';
        fila += '<td><input id="txt04_retirar'+parseInt(valor.ID)+'" type="number" min="0" value="1" class="form-control" placeholder="..."/></td>';
        fila += '<td><input id="txt04_observacion'+parseInt(valor.ID)+'" type="text" class="form-control" placeholder="..."/></td>';
        fila += '</tr>';
        tareaDetalle.push(parseInt(valor.ID));
        });
        //console.log("id detalle: "+valor.ID);
        $('#grd04TareaDatosBody').html(fila);
       
      }

    });

  }else{
    alert("Seleccione una herramienta.");
  }
  
  /* let datos = {
    TipoQuery : "07_getbyid",
    grupo: $id
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){

    
  }); */

}

let retiros=[];
let retiroNom=[];
let retirosCant=[];
function app04Boton_addHerra(){
  var nombre = document.getElementById("txt04_Herramienta").value;
  var estado =false;
  if(nombre.length>0){
    
    var ID = document.querySelector("#grupoOptionsHerraRet option[value='"+nombre+"']").dataset.value;
    console.log("id:"+ID);
    var id = parseInt(ID);
    retiros.forEach(function(elemento, indice, array) {
      if(elemento===id){
        alert("Esta herramienta ya fue agregada. Seleccione otra.");
        document.getElementById("txt04_Herramienta").value="";
        estado=true;
      }
    })
    if(!estado){
      
      let fila = "";
        fila += '<tr id="tr04_cantidad'+(id)+'">';
        fila += '<td>'+(nombre)+'</td>';
        fila += '<td><input id="txt04_cantidad'+(id)+'" type="number" class="form-control" value="1" min="1"/></td>';
        fila += '<td><button id="#" type="button" class="btn btn-danger" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app04Boton_deleteHerra('+id+');"><i class="fa fa-trash"></i></button></td>';
        fila += '</tr>';
      //$('#grd07HerraDatosBody').prepend(fila);
      $(fila).appendTo('#grd04HerraDatosBody');
      retiros.push(id);
      retiroNom.push(nombre);
      document.getElementById("txt04_Herramienta").value="";
    }
    
  }else{
    alert("Seleccione una herramienta.");
  }
  
  /* let datos = {
    TipoQuery : "07_getbyid",
    grupo: $id
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){

    
  }); */

}

function app04Boton_deleteHerra(id){
  let pos = retiros.indexOf(id);
  let eliminado=retiros.splice(pos, 1);
  retiroNom.splice(pos, 1);
  var td = "tr04_cantidad"+id;
  console.log("td:"+td);
  console.log("del: "+eliminado);
  $('#'+td+'').remove();
}

function app04GetDatos_ToDatabase(){

  let EsError = false;
  let rpta = "";

  retiros.forEach(function(elemento, indice, array) {
    var cant= $('#txt04_cantidad'+elemento).val();
    retirosCant.push(cant);
  })
  
  tareaDetalle.forEach(function(elemento, indice, array) {
    var obser= $('#txt04_observacion'+elemento).val();
    var retirar= $('#txt04_retirar'+elemento).val();
    tareaObservacion.push(obser);
    tareaRetirar.push(retirar);
  })
  $('.box-body .form-group').removeClass('has-error');
  //if($("#txtDocum_Valor").val()=="") { $("#divDocum_Valor").prop("class","form-group has-error"); EsError = true; }

  console.log(retiros.toString());
  console.log(retiroNom.toString());
  console.log(retirosCant.toString());
  console.log(tareaDetalle.toString());
  console.log(tareaRetirar.toString());
  console.log(tareaObservacion.toString());
  
  if(!EsError){
    var usuario = document.getElementById("txt04_Usuario").value;
    var usuarioID = document.querySelector("#grupoOptionsUsu option[value='"+usuario+"']").dataset.value;
    var tarea = document.getElementById("txt04_Tarea").value;
    var tareaID = document.querySelector("#grupoOptionsTarea option[value='"+tarea+"']").dataset.value;
    rpta = {
      TipoQuery : '04_save',
      usuarioID: usuarioID,
      tareaID:tareaID,
      estado: "Retirado"
    
    }
  }
  return rpta;
}

function app04Boton_save(){

   let datos = app04GetDatos_ToDatabase();
   //cantidades=[];
   if(datos!=""){
     datos.commandSQL = "INS";
     console.log(datos);
     appAjaxQuery(datos,rutaSQL).done(function(resp){
       if(resp.error==0) {
         var id = resp.tabla[0].ID;
         for(i=0; i<retiros.length;i++){
          let datos={
            TipoQuery : '04_save',
            commandSQL:"INS_DET",
            retiro: id,
            herraNombre: retiroNom[i],
            herramienta: retiros[i],
            cantidad:retirosCant[i]
           }
           console.log("herra:"+retiros[i]);
           appAjaxQuery(datos,rutaSQL).done(function(resp){
            console.log("detalle agregado");
            retirosCant=[];
            retiros=[];
            retiroNom=[];
           });
         }
         //
         for(i=0; i<tareaDetalle.length;i++){
          let datos={
            TipoQuery : '04_save',
            commandSQL:"INS_DET_TAR",
            retiro: id,
            tareaDetalle: tareaDetalle[i],
            retiroDes: tareaObservacion[i],
            retiroCant:tareaRetirar[i]
           }
           console.log("herra:"+retiros[i]);
           appAjaxQuery(datos,rutaSQL).done(function(resp){
            console.log("detalle tarea agregado");
            tareaRetirar=[];
            tareaObservacion=[];
            tareaDetalle=[];
           });
         }
         //
         app04Boton_cancel();
         alert("El retiro fue registrado exitosamente!");
         
         
       }
     });
   } else {
     alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
   }
}

function app04Boton_cancel(){
  app4GridAll();
  $("#edit04").hide();
  $("#btn04_Save").hide();
  $("#btn04_Cancel").hide();
  $("#btn04_Update").hide();
  $("#grid04").show();
  $("#btn04_New").show();

  $("#txt04_Usuario").val("");
  $("#txt04_Tarea").val("");
  $("#txt04_Herramienta").val("");

  $("#grd04TareaDatosBody").children("tr").remove();
  $("#grd04HerraDatosBody").children("tr").remove();

  $("#button04_addTarea").removeAttr("disabled");
  $("#button04_addHerra").removeAttr("disabled");
  $("#button04_newHerra").removeAttr("disabled");

/*   $("#button04_addTarea").attr("disabled", false);
  $("#button04_addHerra").attr("disabled", false);
  $("#button04_newHerra").attr("disabled", false); */
  
}

function app04_load(){
  $("#grid04").hide();
  $("#btn04_New").hide();
  $("#btn04_Save").hide();
  $("#edit04").show();
  $("#btn04_Update").show();
  $("#btn04_Cancel").show();
}

function app04Boton_load(id){
  $("#button04_addTarea").attr("disabled", true);
  $("#button04_addHerra").attr("disabled", true);
  $("#button04_newHerra").attr("disabled", true);
  let datos = {
    TipoQuery : "04_getbyid",
    ID: id
  }
  console.log("id: "+id);
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    //$("#txt02_NroActivo").val($("#lbl_ActivoGrupo").html()+' - '+$("#lbl_ActivoNro").html());
    
    $("#txt04_Usuario").val($('#grupoOptionsUsu [data-value="' + resp.tabla[0].usuario + '"]').val());
    $("#txt04_Tarea").val($('#grupoOptionsTarea [data-value="' + resp.tabla[0].tarea + '"]').val());

    let datos = {
      TipoQuery : "04_getDetalles",
      ID: id
    }
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      for ( detalle of resp.tabla) {
        let fila = "";
        fila += '<tr id="tr07_cantidad'+(detalle.herramientaID)+'">';
        fila += '<td>'+(detalle.herramientaNombre)+'</td>';
        fila += '<td><input id="txt07_cantidad'+(detalle.herramientaID)+'" type="number" class="form-control" value="'+(detalle.cantidad)+'" min="1"/></td>';
        fila += '<td><button id="#" type="button" class="btn btn-danger" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app07Boton_deleteHerra('+detalle.herramientaID+');" disabled><i class="fa fa-trash"></i></button></td>';
        fila += '</tr>';
       //$('#grd07HerraDatosBody').prepend(fila);
        $(fila).appendTo('#grd04HerraDatosBody');

      }

    });
    let data={
      TipoQuery:"07_getDetalles",
      ID:resp.tabla[0].tarea
    }
    

    //
    appAjaxQuery(data,rutaSQL).done(function(resp){
  
      if(resp.tabla.length>0){
        let fila = "";
        $.each(resp.tabla,function(key, valor){
          var v_valor=valor;
          let datos={
            TipoQuery:"07_getDetallesTarea",
            ID:valor.ID,
            retiroID: id
          }
          appAjaxQuery(datos,rutaSQL).done(function(resp){
            
            $.each(resp.tabla,function(key, valor){
              fila += '<tr>';
              fila += '<td>'+(v_valor.herramientaNombre)+'</td>';
              fila += '<td>'+(v_valor.cantidad)+'</td>';
              fila += '<td><input id="txt04_retirar'+(valor.ID)+'" type="number"  value="'+(valor.retiroCant)+'" class="form-control" placeholder="..."/></td>';
              fila += '<td><input id="txt04_observacion'+(valor.ID)+'" type="text" value="'+(valor.retiroDes)+'" class="form-control" placeholder="..."/></td>';
              fila += '</tr>';
              //$(fila).appendTo('#grd04TareaDatosBody');
            });
          
          $('#grd04TareaDatosBody').html(fila);
          });
        
        });
      }
  
    });
    //
    app04_load(); 
  });

  

  
}

/* function app04Boton_update(){
  let datos = app07GetDatos_ToDatabase();
  if(datos!=""){
    datos.commandSQL = "UPD";
    console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        alert("La tarea se actualizo correctamente!");

        app07Boton_cancel();
        app7GridAll();
      }
    });
  } else {
    alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
  }
} */
//fin retiros
function app05Boton_Search(){
  $('#grd05DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txt05_Buscar").val();
  let datos = {
    TipoQuery : '04_getbyidEstado',
    ID :txtBuscar,
    estado: "Retirado"
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        fila += '<td>'+
        '<button id="boton05_buscar'+(parseInt(valor.ID))+'" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Agregar" onclick="javascript:app05Boton_load('+(parseInt(valor.ID))+');"><i class="fa fa-plus"></i></button>';
       /*  '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app04Boton_delete('+(parseInt(valor.ID))+');"><i class="fa fa-trash"></i></button></td>'; */
        fila += '<td>'+(valor.ID)+'</td>';
        fila += '<td>'+(valor.fecha)+'</td>';
        fila += '<td>'+(valor.usuario)+'</td>';
        fila += '<td>'+(valor.tarea)+'</td>';
        fila += '<td>'+(valor.estado)+'</td>';
        fila += '</tr>';
      });
      $('#grd05DatosBody').html(fila);
    }else{
      $('#grd05DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });

}
let _tareaDetalle =[];
let _tareaDevolver =[];
let _tareaObservacion =[];
let _tareaRetirado=[];
function app05Boton_load(id){
  let datos = {
    TipoQuery : '04_getbyid',
    ID :id
  };
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    $("#label05_codigo").text(" "+resp.tabla[0].ID);
    $("#label05_fecha").text(" "+resp.tabla[0].fecha);
    $("#label05_estado").text(" "+resp.tabla[0].estado);
    let datos = {
      TipoQuery : '08_getbyid',
      ID :resp.tabla[0].usuario
    };
    appAjaxQuery(datos,rutaSQL).done(function(resp){

      $("#label05_almacenero").text(" "+resp.tabla[0].nombre+" "+resp.tabla[0].apellidos);
      $("#label05_usuario").text(" "+resp.tabla[0].nombre+" "+resp.tabla[0].apellidos);

    });

    datos = {
      TipoQuery : '07_getbyid',
      ID :resp.tabla[0].tarea
    };
    appAjaxQuery(datos,rutaSQL).done(function(resp){

      $("#label05_tarea").text(" "+resp.tabla[0].nombre);
      
    });
  
    let data={
      TipoQuery:"07_getDetalles",
      ID:resp.tabla[0].tarea
    }
    

    //
    
    appAjaxQuery(data,rutaSQL).done(function(resp){
  
      if(resp.tabla.length>0){
        let fila = "";
        $.each(resp.tabla,function(key, valor){
          var v_valor=valor;
          let datos={
            TipoQuery:"07_getDetallesTarea",
            ID:valor.ID,
            retiroID: id
          }
          appAjaxQuery(datos,rutaSQL).done(function(resp){
            
            $.each(resp.tabla,function(key, valor){
              fila += '<tr>';
              fila += '<td>'+(v_valor.herramientaNombre)+'</td>';
              fila += '<td>'+(valor.retiroCant)+'</td>';
              fila += '<td>'+(valor.retiroDes)+'</td>';
              fila += '<td><input id="txt05_devolver'+parseInt(valor.ID)+'" type="number"  min="0" value="1" class="form-control" placeholder="..."/></td>';
              fila += '<td><input id="txt05_observacion'+parseInt(valor.ID)+'" type="text" class="form-control" placeholder="..."/></td>';
              fila += '</tr>';
              //$(fila).appendTo('#grd04TareaDatosBody');
              _tareaDetalle.push(parseInt(valor.ID));
              _tareaRetirado.push(parseInt(valor.retiroCant));
            });
          
          $('#grd05DatosDetalleBody').html(fila);
          });
        
        });
      }
  
    });
    //
    
    
    
  });

  
}

function app05GetDatos_ToDatabase(){

  let EsError = false;
  let rpta = "";


  _tareaDetalle.forEach(function(elemento, indice, array) {
    var obser= $('#txt05_observacion'+elemento).val();
    var devol= $('#txt05_devolver'+elemento).val();
    _tareaObservacion[indice]=obser;
    _tareaDevolver[indice]=devol;
    /* _tareaObservacion.splice(indice,0,obser);
    _tareaDevolver.splice(indice,0,parseInt(devol)); */
  })
  $('.box-body .form-group').removeClass('has-error');
  //if($("#txtDocum_Valor").val()=="") { $("#divDocum_Valor").prop("class","form-group has-error"); EsError = true; }

  console.log(_tareaDetalle.toString());
  console.log(_tareaDevolver.toString());
  console.log(_tareaObservacion.toString());
  
  if(!EsError){
    //var usuario = document.getElementById("label05_usuario").value;
    //var tarea = document.getElementById("label05_tarea").value;
    
    rpta = {
      TipoQuery : '04_save',
      //usuarioID: usuario,
      //tareaID:tarea,
      estado: "Devuelto",
      ID:  $('#label05_codigo').text()
    }
  }
  return rpta;
}

function app05Boton_save(){

   let datos = app05GetDatos_ToDatabase();
   //cantidades=[];
   var menor=false;
   var observ=false;
   _tareaDetalle.forEach(function(elemento, indice, array) {
    if(_tareaDevolver[indice]<_tareaRetirado[indice]){
      menor = true;
      var obser= $('#txt05_observacion'+elemento).val();
      console.log("val:"+obser);
      console.log("tamanio:"+String(obser).length)
      if(String(obser).length<=0){
        observ= true;
      }
      
    }
   })
  /* for(i=0; _tareaDevolver.length; i++){
    if(_tareaDevolver[i]<_tareaRetirado[i]){
      menor = true;
    }
  } */
   if(menor===false){
     datos.commandSQL = "UPD";
     console.log(datos);
     appAjaxQuery(datos,rutaSQL).done(function(resp){
       if(resp.error==0) {
       
         for(i=0; i<_tareaDetalle.length;i++){
          let datos={
            TipoQuery : '04_save',
            commandSQL:"UPD_DET_TAR",
            ID: _tareaDetalle[i],
            devolDes: _tareaObservacion[i],
            devolCant:_tareaDevolver[i]
           }
           
           appAjaxQuery(datos,rutaSQL).done(function(resp){
            console.log("detalle actualizado");
            _tareaDevolver=[];
            _tareaObservacion=[];
            _tareaDetalle=[];
            _tareaRetirado=[];
           });
         }
         //
        
         alert("La devolución fue registrado exitosamente!");
         app05Boton_cancel();
         
       }
     });
   } else {
     if(observ===false){
      datos.commandSQL = "UPD";
     console.log(datos);
     appAjaxQuery(datos,rutaSQL).done(function(resp){
       if(resp.error==0) {
       
         for(i=0; i<_tareaDetalle.length;i++){
          let datos={
            TipoQuery : '04_save',
            commandSQL:"UPD_DET_TAR",
            ID: _tareaDetalle[i],
            devolDes: _tareaObservacion[i],
            devolCant:_tareaDevolver[i]
           }
           
           appAjaxQuery(datos,rutaSQL).done(function(resp){
            console.log("detalle actualizado");
            _tareaDevolver=[];
            _tareaObservacion=[];
            _tareaDetalle=[];
            _tareaRetirado=[];
           });
         }
         //
        
         alert("La devolución fue registrado exitosamente!");
         app05Boton_cancel();
         
       }
     });
     }else{
      alert("Debe ingresar una observaciones al devolver una menor cantidad de la retirada.");
     }
     
   }
}

function app05Boton_cancel(){
  $("#txt04_Buscar").val("");
  $("#label05_codigo").text("");
  $("#label05_almacenero").text("");
  $("#label05_usuario").text("");
  $("#label05_tarea").text("");
  $("#label05_fecha").text("");
  $("#label05_estado").text("");
  //$("#grd05DatosDetalleBody").remove();
  $("#grd05DatosDetalleBody").children("tr").remove();
  $("#grd05DatosBody").children("tr").remove();
  //$("#grd05DatosBody").remove();

}


function app6GridAll(){
  $('#grd06DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : '06_grid'
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        fila += '<td>'+
        '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app021Boton_laod('+(parseInt(valor.ID))+');"><i class="fa fa-pencil"></i></button>'+
        '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app021Boton_delete('+(parseInt(valor.ID))+');"><i class="fa fa-trash"></i></button></td>';
        fila += '<td>'+(valor.nombre)+'</td>';
        if(valor.consumible=="0"){
          fila += '<td><div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" disabled></div></td>';
        }else{
          fila += '<td><div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" checked disabled></div></td>';
        }
        fila += '<td>'+(valor.cant_tot)+'</td>';
        fila += '<td>'+(valor.cant_disp)+'</td>';
        fila += '</tr>';
      });
      $('#grd06DatosBody').html(fila);
    }else{
      $('#grd06DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

function app06Boton_Search(){
  $('#grd06DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txt06_Buscar").val();
  if(txtBuscar.length>0){
    let datos = {
      TipoQuery : '06_grid'
    };
  
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.tabla.length>0){
        let fila = "";
        $.each(resp.tabla,function(key, valor){
          fila += '<tr>';
          fila += '<td>'+
          '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app021Boton_laod('+(parseInt(valor.ID))+');"><i class="fa fa-pencil"></i></button>'+
          '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app021Boton_delete('+(parseInt(valor.ID))+');"><i class="fa fa-trash"></i></button></td>';
          fila += '<td>'+(valor.nombre)+'</td>';
          if(valor.consumible=="0"){
            fila += '<td><div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" disabled></div></td>';
          }else{
            fila += '<td><div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" checked disabled></div></td>';
          }
          fila += '<td>'+(valor.cant_tot)+'</td>';
          fila += '<td>'+(valor.cant_disp)+'</td>';
          fila += '</tr>';
        });
        $('#grd06DatosBody').html(fila);
      }else{
        $('#grd06DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
      }
      //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
    });
  }else{
    app6GridAll();
  }
}

function app7GridAll(){
  $('#grd07DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : '07_grid'
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        
        fila += '<td>'+
        '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app07Boton_load('+(parseInt(valor.ID))+');"><i class="fa fa-pencil"></i></button>'+
        '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app07Boton_delete('+(parseInt(valor.ID))+');"><i class="fa fa-trash"></i></button></td>';    
        fila += '<td>'+(valor.ID)+'</td>';
        fila += '<td>'+(valor.nombre)+'</td>';
        fila += '<td>'+(valor.descripcion)+'</td>';
        fila += '</tr>';
      });
      $('#grd07DatosBody').html(fila);
    }else{
      $('#grd07DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

function app07Boton_Search(){
  $('#grd07DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txt07_Buscar").val();
  if(txtBuscar>0){
    let datos = {
      TipoQuery : '07_getbyid',
      ID:txtBuscar
    };
  
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.tabla.length>0){
        let fila = "";
        $.each(resp.tabla,function(key, valor){
          fila += '<tr>';
          
          fila += '<td>'+
          '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app07Boton_load('+(parseInt(valor.ID))+');"><i class="fa fa-pencil"></i></button>'+
          '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app07Boton_delete('+(parseInt(valor.ID))+');"><i class="fa fa-trash"></i></button></td>';    
          fila += '<td>'+(valor.ID)+'</td>';
          fila += '<td>'+(valor.nombre)+'</td>';
          fila += '<td>'+(valor.descripcion)+'</td>';
          fila += '</tr>';
        });
        $('#grd07DatosBody').html(fila);
      }else{
        $('#grd07DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
      }
      //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
    });

  }else{
    app7GridAll();
  }
}



function app07Boton_new(){
  $("#grid07").hide();
  $("#btn07_New").hide();
  $("#btn07_Update").hide();
  $("#edit07").show();
  $("#btn07_Save").show();
  $("#btn07_Cancel").show();
}

let herramientas=[];
let herraNombre=[];
let cantidades=[];

function app07Boton_addHerra(){
  var nombre = document.getElementById("txt07_Herramienta").value;
  var estado =false;
  if(nombre.length>0){
    
    var ID = document.querySelector("#grupoOptionsHerra option[value='"+nombre+"']").dataset.value;
    console.log("id:"+ID);
    var id = parseInt(ID);
    herramientas.forEach(function(elemento, indice, array) {
      if(elemento===id){
        alert("Esta herramienta/respuesto/material ya fue agregada. Seleccione otro.");
        document.getElementById("txt07_Herramienta").value="";
        estado=true;
      }
    })
    if(!estado){
      
      let fila = "";
        fila += '<tr id="tr07_cantidad'+(id)+'">';
        fila += '<td>'+(nombre)+'</td>';
        fila += '<td><input id="txt07_cantidad'+(id)+'" type="number" class="form-control" value="1" min="1"/></td>';
        fila += '<td><button id="#" type="button" class="btn btn-danger" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app07Boton_deleteHerra('+id+');"><i class="fa fa-trash"></i></button></td>';
        fila += '</tr>';
      //$('#grd07HerraDatosBody').prepend(fila);
      $(fila).appendTo('#grd07HerraDatosBody');
      herramientas.push(id);
      herraNombre.push(nombre);
      document.getElementById("txt07_Herramienta").value="";
    }
    
  }else{
    alert("Seleccione una herramienta/repuesto/material.");
  }
  
  /* let datos = {
    TipoQuery : "07_getbyid",
    grupo: $id
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){

    
  }); */

}

function app07Boton_deleteHerra(id){
  let pos = herramientas.indexOf(id);
  let eliminado=herramientas.splice(pos, 1);
  herraNombre.splice(pos, 1);
  var td = "tr07_cantidad"+id;
  console.log("td:"+td);
  console.log("del: "+eliminado);
  $('#'+td+'').remove();
}

function app07GetDatos_ToDatabase(){

  let EsError = false;
  let rpta = "";

  herramientas.forEach(function(elemento, indice, array) {
    var cant= $('#txt07_cantidad'+elemento).val();
    cantidades.push(cant);
  })
  $('.box-body .form-group').removeClass('has-error');
  //if($("#txtDocum_Valor").val()=="") { $("#divDocum_Valor").prop("class","form-group has-error"); EsError = true; }

  console.log(herramientas.toString());
  console.log(herraNombre.toString());
  console.log(cantidades.toString());
  
  if(!EsError){
    rpta = {
      TipoQuery : '07_save',
      nombre: $("#txt07_Nombre").val(),
      descripcion: $("#area07_descripcion").val()
    
    }
  }
  return rpta;
}

function app07Boton_save(){

   let datos = app07GetDatos_ToDatabase();
   //cantidades=[];
   if(datos!=""){
     datos.commandSQL = "INS";
     console.log(datos);
     appAjaxQuery(datos,rutaSQL).done(function(resp){
       if(resp.error==0) {
         var id = resp.tabla[0].ID;
         for(i=0; i<herramientas.length;i++){
          let datos={
            TipoQuery : '07_save',
            commandSQL:"INS_DET",
            tarea: id,
            herraNombre: herraNombre[i],
            herramienta: herramientas[i],
            cantidad:cantidades[i]
           }
           console.log("herra:"+herramientas[i]);
           appAjaxQuery(datos,rutaSQL).done(function(resp){
            console.log("detalle agregado");
           });
         }
         app07Boton_cancel();
         alert("La tarea fue creada exitosamente!");
         cantidades=[];
         herramientas=[];
         herraNombre=[];
       }
     });
   } else {
     alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
   }
}

function app07Boton_cancel(){
  app7GridAll();
  $("#edit07").hide();
  $("#btn07_Save").hide();
  $("#btn07_Cancel").hide();
  $("#btn07_Update").hide();
  $("#grid07").show();
  $("#btn07_New").show();
  $("#txt07_Nombre").val("");
  $("#area07_descripcion").val("");
  $("#grd07HerraDatosBody").children("tr").remove();
}

function app07_load(){
  $("#grid07").hide();
  $("#btn07_New").hide();
  $("#btn07_Save").hide();
  $("#edit07").show();
  $("#btn07_Update").show();
  $("#btn07_Cancel").show();
}

function app07Boton_load(id){

  let datos = {
    TipoQuery : "07_getbyid",
    ID: id
  }
  console.log("id: "+id);
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    //$("#txt02_NroActivo").val($("#lbl_ActivoGrupo").html()+' - '+$("#lbl_ActivoNro").html());
    
    $("#txt07_id").val(resp.tabla[0].ID);
    $("#txt07_Nombre").val(resp.tabla[0].nombre);
    $("#area07_descripcion").val(resp.tabla[0].descripcion);

    let datos = {
      TipoQuery : "07_getDetalles",
      ID: id
    }
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      for ( detalle of resp.tabla) {
        let fila = "";
        fila += '<tr id="tr07_cantidad'+(detalle.herramientaID)+'">';
        fila += '<td>'+(detalle.herramientaNombre)+'</td>';
        fila += '<td><input id="txt07_cantidad'+(detalle.herramientaID)+'" type="number" class="form-control" value="'+(detalle.cantidad)+'" min="1"/></td>';
        fila += '<td><button id="#" type="button" class="btn btn-danger" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app07Boton_deleteHerra('+detalle.herramientaID+');"><i class="fa fa-trash"></i></button></td>';
        fila += '</tr>';
       //$('#grd07HerraDatosBody').prepend(fila);
        $(fila).appendTo('#grd07HerraDatosBody');

      }

    });
    app07_load(); 
  });

  
}

function app07Boton_update(){
  let datos = app07GetDatos_ToDatabase();
  if(datos!=""){
    datos.commandSQL = "UPD";
    console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        alert("La tarea se actualizo correctamente!");

        app07Boton_cancel();
        app7GridAll();
      }
    });
  } else {
    alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
  }
}


function app8GridAll(){
  $('#grd08DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : '08_grid'
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        fila += '<td>'+
        '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app08Boton_load('+(parseInt(valor.ID))+');"><i class="fa fa-pencil"></i></button>'+
        '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app08Boton_delete('+(parseInt(valor.ID))+');"><i class="fa fa-trash"></i></button></td>';    
        fila += '<td>'+(valor.ID)+'</td>';
        fila += '<td>'+(valor.nombre)+" "+(valor.apellidos)+'</td>';
        fila += '<td>'+(valor.dni)+'</td>';
        fila += '<td>'+(valor.telefono)+'</td>';
        fila += '<td>'+(valor.correo)+'</td>';
        fila += '<td>'+(valor.usuario)+'</td>';
        fila += '</tr>';
      });
      $('#grd08DatosBody').html(fila);
    }else{
      $('#grd08DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

function app08Boton_Search(){
  $('#grd08DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txt08_Buscar").val();
  if(txtBuscar>0){
    let datos = {
      TipoQuery : '08_getbyid',
      ID:txtBuscar
    };
  
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.tabla.length>0){
        let fila = "";
        $.each(resp.tabla,function(key, valor){
          fila += '<tr>';
          fila += '<td>'+
          '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app08Boton_load('+(parseInt(valor.ID))+');"><i class="fa fa-pencil"></i></button>'+
          '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app08Boton_delete('+(parseInt(valor.ID))+');"><i class="fa fa-trash"></i></button></td>';    
          fila += '<td>'+(valor.ID)+'</td>';
          fila += '<td>'+(valor.nombre)+" "+(valor.apellidos)+'</td>';
          fila += '<td>'+(valor.dni)+'</td>';
          fila += '<td>'+(valor.telefono)+'</td>';
          fila += '<td>'+(valor.correo)+'</td>';
          fila += '<td>'+(valor.usuario)+'</td>';
          fila += '</tr>';
        });
        $('#grd08DatosBody').html(fila);
      }else{
        $('#grd08DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
      }
      //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
    });
  }else{
    app8GridAll();
  }
}

function app08Boton_new(){
  $("#grid08").hide();
  $("#btn08_New").hide();
  $("#btn08_Update").hide();
  $("#edit08").show();
  $("#btn08_Save").show();
  $("#btn08_Cancel").show();
}

function app08Boton_cancel(){
  app8GridAll();
  $("#edit08").hide();
  $("#btn08_Save").hide();
  $("#btn08_Cancel").hide();
  $("#btn08_Update").hide();
  $("#grid08").show();
  $("#btn08_New").show();
  $("#txt08_DNI").val("");
  $("#txt08_Nombre").val("");
  $("#txt08_Apellidos").val("");
  $("#txt08_Telefono").val("");
  $("#cbo08_Rol").val(1);
  $("#txt08_Correo").val("");
  $("#txt08_Usuario").val("");
  $("#txt08_Contrasena").val("");
  $("#txt08_Contrasena").attr("placeholder", "...").blur();

}

function app08GetDatos_ToDatabase(){

  let EsError = false;
  let rpta = "";
  $('.box-body .form-group').removeClass('has-error');
  //if($("#txtDocum_Valor").val()=="") { $("#divDocum_Valor").prop("class","form-group has-error"); EsError = true; }

  if(!EsError){
    rpta = {
      TipoQuery : '08_save',
      dni: $('#txt08_DNI').val(),
      nombre: $("#txt08_Nombre").val(),
      apellidos: $("#txt08_Apellidos").val(),
      telefono: $("#txt08_Telefono").val(),
      correo: $("#txt08_Correo").val(),
      rol: $("#cbo08_Rol").val(),
      usuario: $("#txt08_Usuario").val(),
      contrasena: ($("#txt08_Contrasena").val().trim()==="")? 0 : SHA1($("#txt08_Contrasena").val()).toString().toUpperCase()
    }
  }
  return rpta;
}

function app08Boton_save(){

  let datos = app08GetDatos_ToDatabase();
 
  if(datos!=""){
    datos.commandSQL = "INS";
    console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.error==0) {

        alert("El usuario fue registrado exitosamente!");
        app08Boton_cancel();
      }
    });
  } else {
    alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
  }
}

function app08_load(){
  $("#grid08").hide();
  $("#btn08_New").hide();
  $("#btn08_Save").hide();
  $("#edit08").show();
  $("#btn08_Update").show();
  $("#btn08_Cancel").show();
}

function app08Boton_load(id){

  let datos = {
    TipoQuery : "08_getbyid",
    ID: id
  }
  console.log("id: "+id);
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    //$("#txt02_NroActivo").val($("#lbl_ActivoGrupo").html()+' - '+$("#lbl_ActivoNro").html());
    
    $("#txt08_id").val(resp.tabla[0].ID);
    $("#txt08_DNI").val(resp.tabla[0].dni);
    $("#txt08_Nombre").val(resp.tabla[0].nombre);
    $("#txt08_Apellidos").val(resp.tabla[0].apellidos);
    $("#txt08_Telefono").val(resp.tabla[0].telefono);
    $("#cbo08_Rol").val(resp.tabla[0].rol);
    $("#txt08_Correo").val(resp.tabla[0].correo);
    $("#txt08_Usuario").val(resp.tabla[0].usuario);
    $("#txt08_Contrasena").attr("placeholder", "Ingresar nueva contraseña").blur();
    app08_load(); 
  });

  
}

function app08Boton_update(){

  let datos = app08GetDatos_ToDatabase();
  if(datos!=""){
    datos.commandSQL = "UPD";
    datos.ID= $("#txt08_id").val();
    console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        alert("El usuario fue actualizado correctamente!");

        app08Boton_cancel();
        app8GridAll();
      }
    });
  } else {
    alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
  }
}

function app08Boton_delete(id){

  if(confirm("¿Esta seguro que desea eliminar el usuario "+id+"?")){
    let datos = {
      TipoQuery: "08_save",
      commandSQL : "DEL",
      status: 0,
      ID: id
    }
    //console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        app08Boton_cancel();
        app8GridAll();
        alert("El usuario "+id+" fue eliminado!!");
      }
    });
  }
  else{
      return false;
  }
}


function app9GridAll(){
  
  $('#grd09DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : '03_grid'
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        fila += '<td>'+
          '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Q" onclick="javascript:app09Boton_Q('+(parseInt(valor.ID))+');">Q</button>';
          /* '<button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app09Boton_S('+(parseInt(valor.ID))+');">S</button>'; */
        
        fila += '<td>'+(valor.ID)+'</td>';
        fila += '<td>'+(valor.clase)+'</td>';
        fila += '<td>'+(valor.proveedor)+'</td>';
        fila += '<td>'+(valor.fabricante)+'</td>';
        fila += '<td>'+(valor.nombre)+'</td>';
        fila += '<td>'+(valor.descripcion)+'</td>';
        fila += '<td>'+(valor.unidad)+'</td>';
        fila += '<td>'+(valor.stock)+'</td>';
        fila += '<td>'+(valor.precio)+'</td>';
        fila += '</tr>';
      });
      $('#grd09DatosBody').html(fila);
    }else{
      $('#grd09DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

function app09Boton_Search(){
  
  $('#grd09DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txt09_Buscar").val();
  if(txtBuscar>0){
    let datos = {
      TipoQuery : '03_getbyid',
      ID:txtBuscar
    };
  
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.tabla.length>0){
        let fila = "";
        $.each(resp.tabla,function(key, valor){
          fila += '<tr>';
          fila += '<td>'+
            '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Q" onclick="javascript:app09Boton_Q('+(parseInt(valor.ID))+');">Q</button>';
            /* '<button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app09Boton_S('+(parseInt(valor.ID))+');">S</button>'; */
          
          fila += '<td>'+(valor.ID)+'</td>';
          fila += '<td>'+(valor.clase)+'</td>';
          fila += '<td>'+(valor.proveedor)+'</td>';
          fila += '<td>'+(valor.fabricante)+'</td>';
          fila += '<td>'+(valor.nombre)+'</td>';
          fila += '<td>'+(valor.descripcion)+'</td>';
          fila += '<td>'+(valor.unidad)+'</td>';
          fila += '<td>'+(valor.stock)+'</td>';
          fila += '<td>'+(valor.precio)+'</td>';
          fila += '</tr>';
        });
        $('#grd09DatosBody').html(fila);
      }else{
        $('#grd09DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
      }
      //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
    });
  }else{
    app9GridAll();
  }
}
function app09Boton_Q(id){

  let datos={
    TipoQuery: "03_getbyid",
    ID:id
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    
    $("#txt09_Numero").val(resp.tabla[0].ID);
    loadQ();
  });
  
}

function app09Boton_S(id){
  let datos={
    TipoQuery: "03_getbyid",
    ID:id
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    
    $("#txt09Q_Numero").val(resp.tabla[0].ID);
    //$("#area09_descripcion").val(resp.tabla[0].descripcion);
    loadS();
  });
}

function loadQ(){
  $("#edit09_Q").show();
  $("#btn09Q_Cancel").show();
  $("#btn09Q_Save").show();
  $("#edit09_S").hide();
  $("#btn09S_Cancel").hide();
  $("#btn09S_Save").hide();
  $("#grid09").hide();
}

function loadS(){
  $("#edit09_Q").hide();

  $("#btn09Q_Cancel").hide();
  $("#btn09Q_Save").hide();
  $("#edit09_S").show();
  $("#btn09S_Cancel").show();
  $("#btn09S_Save").show();
  $("#grid09").hide();
}

function app09SBoton_cancel(){

  $("#edit09_Q").hide();
  $("#btn09Q_Cancel").hide();
  $("#btn09Q_Save").hide();
  $("#edit09_S").hide();
  $("#btn09S_Cancel").hide();
  $("#btn09S_Save").hide();
  $("#grid09").show();
  //$("#grd09SDatosProvBody").remove();
  $("#grd09SDatosProvBody").children("tr").remove();
  proveedores=[];
  
}

function app09QBoton_cancel(){
  $("#edit09_Q").hide();
  $("#btn09Q_Cancel").hide();
  $("#btn09Q_Save").hide();
  $("#edit09_S").hide();
  $("#btn09S_Cancel").hide();
  $("#btn09S_Save").hide();
  $("#grid09").show();
}

/* let proveedores=[]; */
function app09SBoton_addProv(){
  var nombre = document.getElementById("cbo09S_proveedor").value;
  var estado =false;
  if(nombre.length>0){
    
    var ID = document.querySelector("#grupoOptionsProveedor9S option[value='"+nombre+"']").dataset.value;
    console.log("id:"+ID);
    var id = parseInt(ID);
    proveedores.forEach(function(elemento, indice, array) {
      if(elemento===id){
        alert("Este Proveedor ya fue agregado. Seleccione otro .");
        document.getElementById("cbo09S_proveedor").value="";
        estado=true;
      }
    })
    if(estado==false){

      let datos={
        TipoQuery: "09_getProv",
        ID:id
      }
      appAjaxQuery(datos,rutaSQL).done(function(resp){
      
        let fila = "";
          fila += '<tr>';
          fila += '<td>'+(resp.tabla[0].codigo)+'</td>';
          fila += '<td>'+(resp.tabla[0].nombre)+'</td>';
          fila += '<td>'+(resp.tabla[0].descripcion)+'</td>';
          fila += '</tr>';
        //$('#grd07HerraDatosBody').prepend(fila);
        $(fila).appendTo('#grd09SDatosProvBody');
        proveedores.push(parseInt(resp.tabla[0].ID));
        document.getElementById("cbo09S_proveedor").value="";
        estado=false;
      });
      estado=false;
    }
    
  }else{
    alert("Seleccione un proveedor.");
  }

}

function app09SBoton_save(){
  if(proveedores.length>0){
    if(confirm("Se asignaran los proveedores a este item ¿Continuar?")){
      
      
      proveedores.forEach(function(elemento, indice, array) {
        let datos={
          requisicion:$("#txt09Q_Numero").val(),
          proveedor: elemento,
          TipoQuery: "09_save",
          commandSQL: "INS_PROV"
        }
        appAjaxQuery(datos,rutaSQL).done(function(resp){
         
        });
      })
     
      app09SBoton_cancel();
      app9GridAll();
      alert("Se agregaron los proveedores exitosamente.");
      
      
  
    }else{
      return false;
    }
  }else{
    alert("Debe ingresar al menos 1 proveedor.");
  }
  
}


function app09QBoton_save(){
  if(confirm("Se creara la RFQ ¿Continuar?")){
    let datos={
      fecha: appConvertToFecha($("#txt09_Fecha").val(),"-"),
      descripcion: $("#area09_descripcion").val(),
      item: $("#txt09_Numero").val(),
      TipoQuery: "09_save",
      commandSQL: "INS"
    }
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.error==0) {
        app09QBoton_cancel();
        app9GridAll();
        alert("Se creo la RFQ exitosamente.");
      }
    });

  }else{
    return false;
  }
}

function app10GridAll(){
  
  $('#grd10DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : '10_grid'
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        
        let datos={
          TipoQuery:"03_getbyid",
          ID: valor.item
        }
        appAjaxQuery(datos,rutaSQL).done(function(resp){
          fila += '<tr>';
         if(valor.estado==0){
          fila += '<td>'+
          '<button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app10Boton_S('+(parseInt(valor.ID))+');" disabled>S</button>';
         }else{
          fila += '<td>'+
          '<button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app10Boton_S('+(parseInt(valor.ID))+');">S</button>';
         }
          fila += '<td>'+(valor.ID)+'</td>';
          fila += '<td>'+(valor.descripcion)+'</td>';
          fila += '<td>'+(valor.fecha)+'</td>';
          fila += '<td>'+(valor.item)+'</td>';
          fila += '<td>'+(resp.tabla[0].nombre)+'</td>';
          fila += '<td>'+(resp.tabla[0].stock)+'</td>';
          
          fila += '<td>'+(resp.tabla[0].unidad)+'</td>';
          fila += '<td>'+(resp.tabla[0].precio)+'</td>';
          fila += '<td>'+(resp.tabla[0].descripcion)+'</td>';
          
          fila += '</tr>';

          $('#grd10DatosBody').html(fila);
        });
        
        
        
      });
      
    }else{
      $('#grd10DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

function app10Boton_Search(){
  
  $('#grd10DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txt10_Buscar").val();
  if(txtBuscar.length>0){
    let datos = {
      TipoQuery : '10_getbyid',
      ID:txtBuscar
    };
  
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.tabla.length>0){
        let fila = "";
        $.each(resp.tabla,function(key, valor){
          
          let datos={
            TipoQuery:"03_getbyid",
            ID: valor.item
          }
          appAjaxQuery(datos,rutaSQL).done(function(resp){
            fila += '<tr>';
           if(valor.estado==0){
            fila += '<td>'+
            '<button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app10Boton_S('+(parseInt(valor.ID))+');" disabled>S</button>';
           }else{
            fila += '<td>'+
            '<button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app10Boton_S('+(parseInt(valor.ID))+');">S</button>';
           }
            fila += '<td>'+(valor.ID)+'</td>';
            fila += '<td>'+(valor.descripcion)+'</td>';
            fila += '<td>'+(valor.fecha)+'</td>';
            fila += '<td>'+(valor.item)+'</td>';
            fila += '<td>'+(resp.tabla[0].nombre)+'</td>';
            fila += '<td>'+(resp.tabla[0].stock)+'</td>';
            
            fila += '<td>'+(resp.tabla[0].unidad)+'</td>';
            fila += '<td>'+(resp.tabla[0].precio)+'</td>';
            fila += '<td>'+(resp.tabla[0].descripcion)+'</td>';
            
            fila += '</tr>';
  
            $('#grd10DatosBody').html(fila);
          });
          
          
          
        });
        
      }else{
        $('#grd10DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
      }
      //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
    });
  }else{
    app10GridAll();
  }
}

function app10Boton_S(id){
  let datos={
    TipoQuery: "10_getbyid",
    ID:id
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    
    $("#txt10Q_Numero").val(resp.tabla[0].ID);
    //$("#area09_descripcion").val(resp.tabla[0].descripcion);
    loadS_10();
  });
}

function loadS_10(){
  $("#edit10_Q").hide();

  $("#btn10Q_Cancel").hide();
  $("#btn10Q_Save").hide();
  $("#edit10_S").show();
  $("#btn10S_Cancel").show();
  $("#btn10S_Save").show();
  $("#grid10").hide();
}

function app10SBoton_cancel(){


  $("#edit10_S").hide();
  $("#btn10S_Cancel").hide();
  $("#btn10S_Save").hide();
  $("#grid10").show();
  //$("#grd09SDatosProvBody").remove();
  $("#grd10SDatosProvBody").children("tr").remove();
  proveedores=[];
  
}

let proveedores=[];
function app10SBoton_addProv(){
  var nombre = document.getElementById("cbo10S_proveedor").value;
  var estado =false;
  if(nombre.length>0){
    
    var ID = document.querySelector("#grupoOptionsProveedor10S option[value='"+nombre+"']").dataset.value;
    console.log("id:"+ID);
    var id = parseInt(ID);
    proveedores.forEach(function(elemento, indice, array) {
      if(elemento===id){
        alert("Este Proveedor ya fue agregado. Seleccione otro .");
        document.getElementById("cbo10S_proveedor").value="";
        estado=true;
      }
    })
    if(estado==false){

      let datos={
        TipoQuery: "09_getProv",
        ID:id
      }
      appAjaxQuery(datos,rutaSQL).done(function(resp){
      
        let fila = "";
          fila += '<tr>';
          fila += '<td>'+(resp.tabla[0].codigo)+'</td>';
          fila += '<td>'+(resp.tabla[0].nombre)+'</td>';
          fila += '<td>'+(resp.tabla[0].descripcion)+'</td>';
          fila += '</tr>';
        //$('#grd07HerraDatosBody').prepend(fila);
        $(fila).appendTo('#grd10SDatosProvBody');
        proveedores.push(parseInt(resp.tabla[0].ID));
        document.getElementById("cbo10S_proveedor").value="";
        estado=false;
      });
      estado=false;
    }
    
  }else{
    alert("Seleccione un proveedor.");
  }

}


function app10SBoton_save(){
  if(proveedores.length>0){
    if(confirm("Se asignaran los proveedores a este RFQ¿Continuar?")){
      
      
      proveedores.forEach(function(elemento, indice, array) {
        let datos={
          requisicion:$("#txt10Q_Numero").val(),
          proveedor: elemento,
          TipoQuery: "09_save",
          commandSQL: "INS_PROV"
        }
        appAjaxQuery(datos,rutaSQL).done(function(resp){
         
        });
      })
     
      app10SBoton_cancel();
      app10GridAll();
      alert("Se agregaron los proveedores exitosamente.");
      
      
  
    }else{
      return false;
    }
  }else{
    alert("Debe ingresar al menos 1 proveedor.");
  }
  
}

let cotizaciones=[];
function app11Boton_searchCot(){
  var cotizacion = document.getElementById("cbo11_cotizacion").value;
  var proveedor = document.getElementById("cbo11_proveedor").value;
  var cotID = document.querySelector("#grupoOptionsCotizacion option[value='"+cotizacion+"']").dataset.value;
  var provID = document.querySelector("#grupoOptionsProveedor11 option[value='"+proveedor+"']").dataset.value;

  if(cotizacion.length<0 || cotizacion.length<0){
    alert("Seleccione una cotización y proveedor");
  }else{
    let datos={
      TipoQuery: "11_getCot",
      cotizacion:cotID,
      proveedor: provID
    }
    let fila = "";
    var idCot;
    appAjaxQuery(datos,rutaSQL).done(function(resp){


      $.each(resp.tabla,function(key, valor){

        let provID=valor.cotizacion;
        let cotID=valor.proveedor;
    
        fila += '<tr>';
        fila += '<td>'+(valor.ID)+'</td>';
        fila += '<td>'+(valor.cotizacion)+'</td>';
        fila += '<td>'+(valor.proveedor)+'</td>';
        
        let datos={
          TipoQuery:"10_getbyid",
          ID: valor.cotizacion
        }
        appAjaxQuery(datos,rutaSQL).done(function(resp){

          let datos={
            TipoQuery:"03_getbyid",
            ID: resp.tabla[0].item
          }

          appAjaxQuery(datos,rutaSQL).done(function(resp){

            fila += '<td>'+(resp.tabla[0].ID)+'</td>';
            fila += '<td>'+(resp.tabla[0].nombre)+'</td>';
            fila += '<td>'+(resp.tabla[0].unidad)+'</td>';
            fila += '<td>'+(resp.tabla[0].stock)+'</td>';
            fila += '<td>'+(resp.tabla[0].precio)+'</td>';
            fila += '<td><input id="txt11_precio'+parseInt(valor.ID)+'" type="text" class="form-control" /></td>';
            fila += '<td><button id="#" type="button" class="btn btn-success" style="margin-left:2px;margin-right:2px;" title="Guardar" onclick="javascript:app11Boton_save('+(parseInt(valor.ID))+','+(parseInt(valor.cotizacion))+');"><i class="fa fa-flash"></i></button></td>';
            fila += '</tr>';
          //$('#grd07HerraDatosBody').prepend(fila);
           // $(fila).appendTo('#grd11DatosCotBody');
            $('#grd11DatosCotBody').html(fila);
          });
  
          
  
        });
      });

      
    
      
      /* proveedores.push(parseInt(resp.tabla[0].ID));
      document.getElementById("cbo10S_proveedor").value="";
      estado=false; */
    });
  }

}

function app11Boton_save(id, coti){

  var precio = $("#txt11_precio"+id).val();
  if(precio.length<0){
    alert("Deben ingresar un precio.");
  }else{

    let datos={
      TipoQuery: "11_save",
      commandSQL: "UPD",
      precio: precio,
      ID: id

    }
    appAjaxQuery(datos,rutaSQL).done(function(resp){

      let datos={
        TipoQuery: "09_save",
        commandSQL: "UPD_EST",
        estado: 0,
        ID: coti
      }
      appAjaxQuery(datos,rutaSQL).done(function(resp){
        alert("Se ingreso el precio ofertado para la cotización.");
        $("#cbo11_cotizacion").val("");
        $("#cbo11_proveedor").val("");
        $("#grd11DatosCotBody").children("tr").remove();
      });
      

    });
  }
}


function app12GridAll(){
  $('#grd12DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos={
    TipoQuery : '12_getbyPre'
  }
  let fila="";
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      $.each(resp.tabla,function(key, valor){
        var precio = valor.precio;
        var preveedor = valor.proveedor;
        let datos = {
          TipoQuery : '10_grid',
          ID: valor.cotizacion
        }
        appAjaxQuery(datos,rutaSQL).done(function(resp){
          
          let datos={
            TipoQuery:"03_getbyid",
            ID: resp.tabla[0].item
          }
          var cotiza = resp;
          appAjaxQuery(datos,rutaSQL).done(function(resp){
            fila += '<tr>';
            console.log("estado:"+valor.estado);
            if(valor.estado ==0){
              fila += '<td>'+
            '<button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="Crear Orden" onclick="javascript:app12Boton_I('+(parseInt(valor.ID))+');" disabled>I</button>';
            }else{
              fila += '<td>'+
            '<button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="Crear Orden" onclick="javascript:app12Boton_I('+(parseInt(valor.ID))+');">I</button>';
            }
            
            fila += '<td>'+(valor.ID)+'</td>';
            fila += '<td>'+(cotiza.tabla[0].ID)+'</td>';
            fila += '<td>'+(preveedor)+'</td>';
            fila += '<td>'+(cotiza.tabla[0].descripcion)+'</td>';
            fila += '<td>'+(cotiza.tabla[0].fecha)+'</td>';
            fila += '<td>'+(cotiza.tabla[0].item)+'</td>';
            fila += '<td>'+(resp.tabla[0].nombre)+'</td>';
            fila += '<td>'+(resp.tabla[0].stock)+'</td>';
            
            fila += '<td>'+(resp.tabla[0].unidad)+'</td>';
            fila += '<td>'+(resp.tabla[0].precio)+'</td>';
            fila += '<td>'+(resp.tabla[0].descripcion)+'</td>';
            fila += '<td>'+(precio)+'</td>';
            fila += '</tr>';
  
            $('#grd12DatosBody').html(fila);
          });
        });
      });
    }else{
      $('#grd12DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }

  })


}

function app12Boton_Search(){
  $('#grd12DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txt12_Buscar").val();
  if(txtBuscar>0){
    let datos={
      TipoQuery : '12_getbyPreId',
      ID:txtBuscar
    }
    let fila="";
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.tabla.length>0){
        $.each(resp.tabla,function(key, valor){
          var precio = valor.precio;
          var preveedor = valor.proveedor;
          let datos = {
            TipoQuery : '10_grid',
            ID: valor.cotizacion
          }
          appAjaxQuery(datos,rutaSQL).done(function(resp){
            
            let datos={
              TipoQuery:"03_getbyid",
              ID: resp.tabla[0].item
            }
            var cotiza = resp;
            appAjaxQuery(datos,rutaSQL).done(function(resp){
              fila += '<tr>';
              fila += '<td>'+
              '<button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app12Boton_I('+(parseInt(valor.ID))+');">I</button>';
              fila += '<td>'+(valor.ID)+'</td>';
              fila += '<td>'+(cotiza.tabla[0].ID)+'</td>';
              fila += '<td>'+(preveedor)+'</td>';
              fila += '<td>'+(cotiza.tabla[0].descripcion)+'</td>';
              fila += '<td>'+(cotiza.tabla[0].fecha)+'</td>';
              fila += '<td>'+(cotiza.tabla[0].item)+'</td>';
              fila += '<td>'+(resp.tabla[0].nombre)+'</td>';
              fila += '<td>'+(resp.tabla[0].stock)+'</td>';
              
              fila += '<td>'+(resp.tabla[0].unidad)+'</td>';
              fila += '<td>'+(resp.tabla[0].precio)+'</td>';
              fila += '<td>'+(resp.tabla[0].descripcion)+'</td>';
              fila += '<td>'+(precio)+'</td>';
              fila += '</tr>';
    
              $('#grd12DatosBody').html(fila);
            });
          });
        });
      }else{
        $('#grd12DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
      }
  
    })
  }else{
    app12GridAll();
  }


}

function app12Boton_I(id){

  let datos={
    TipoQuery : '12_getbyid',
    ID:id
  }
  
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      $.each(resp.tabla,function(key, valor){
        var precio = valor.precio;
        var preveedor = valor.proveedor;
        let datos = {
          TipoQuery : '10_grid',
          ID: valor.cotizacion
        }
        appAjaxQuery(datos,rutaSQL).done(function(resp){
          
          let datos={
            TipoQuery:"03_getbyid",
            ID: resp.tabla[0].item
          }
          var cotiza = resp;
          appAjaxQuery(datos,rutaSQL).done(function(resp){
           /*  fila += '<tr>';
            fila += '<td>'+
            '<button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app12Boton_I('+(parseInt(valor.ID))+');">S</button>';
            fila += '<td>'+(valor.ID)+'</td>';
            fila += '<td>'+(cotiza.tabla[0].ID)+'</td>';
            fila += '<td>'+(preveedor)+'</td>';
            fila += '<td>'+(cotiza.tabla[0].descripcion)+'</td>';
            fila += '<td>'+(cotiza.tabla[0].fecha)+'</td>';
            fila += '<td>'+(cotiza.tabla[0].item)+'</td>';
            fila += '<td>'+(resp.tabla[0].nombre)+'</td>';
            fila += '<td>'+(resp.tabla[0].stock)+'</td>';
            
            fila += '<td>'+(resp.tabla[0].unidad)+'</td>';
            fila += '<td>'+(resp.tabla[0].precio)+'</td>';
            fila += '<td>'+(resp.tabla[0].descripcion)+'</td>';
            fila += '<td>'+(precio)+'</td>';
            fila += '</tr>'; */
            
            $("#txt12_Numero").val(valor.ID);
            $("#txt12_rfq").val(cotiza.tabla[0].ID);
            $("#cbo12_proveedorAct").val($('#grupoOptionsProveedorAct [data-value="' + preveedor + '"]').val());
            $("#txt12_codigoItem").val(cotiza.tabla[0].item);
            $("#txt12_item").val(resp.tabla[0].nombre);
            $("#txt12_unidad").val(resp.tabla[0].unidad);
            $("#txt12_parte").val(resp.tabla[0].numParte);
            $("#txt12_descripcion").val(resp.tabla[0].descripcion);
            $("#cbo12_proveedorAnt").val($('#grupoOptionsProveedorAnt [data-value="' + resp.tabla[0].proveedor + '"]').val());
            $("#txt12_precioOfer").val(precio);
            $("#txt12_total").val(precio);
            
            

            app12Load();
            
         
          });
        });
      });
    }

  })

  

}

function app12Load(){

  $("#edit12").show();
  $("#grid12").hide();
  $("#btn12_Cancel").show();
  $("#btn12_Save").show();
}

function app12Boton_cancel(){
  $("#edit12").hide();
  $("#grid12").show();
  $("#btn12_Cancel").hide();
  $("#btn12_Save").hide();
}


function app12Boton_Cantidad(){
  var cant= $("#txt12_cantidad").val();
  if(cant.length>0){
    cant=parseInt(cant);
    $("#txt12_total").val((cant* parseFloat($("#txt12_precioOfer").val())).toFixed(2));
  }
  console.log(cant);
}


function app12Boton_save(){

  var precio = $("#txt12_cantidad").val();
  if(precio.length<0){
    alert("Deben ingresar una cantidad.");
  }else{

    let datos={
      TipoQuery: "12_save",
      commandSQL: "INS",
      cotizacion: $("#txt12_Numero").val(),
      fecha: appConvertToFecha($("#txt12_Fecha").val(),"-"),
      cantidad: $("#txt12_cantidad").val(),
      total: $("#txt12_total").val()

    }
    appAjaxQuery(datos,rutaSQL).done(function(resp){

      let datos={
        TipoQuery: "12_save",
        commandSQL: "UPD_EST",
        estado: 0,
        ID: $("#txt12_Numero").val()
      }
      appAjaxQuery(datos,rutaSQL).done(function(resp){
        alert("Se genero la orden de compra exitosamente.");
        app12Boton_cancel();
        app12GridAll();
      });
      

    });
  }
}

function app13GridAll(){
  $('#grd13DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();

  let datos={
    TipoQuery : '13_grid'
  }
  let fila="";
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    $.each(resp.tabla,function(key, valor_ord){
      if(resp.tabla.length){
        let datos={
          TipoQuery : '12_getbyid',
          //ID: resp.tabla[0].cotizacion
          ID:valor_ord.cotizacion
        }
      
        appAjaxQuery(datos,rutaSQL).done(function(resp){
          if(resp.tabla.length>0){
            $.each(resp.tabla,function(key, valor){
              var precio = valor.precio;
              var preveedor = valor.proveedor;
              let datos = {
                TipoQuery : '10_grid',
                ID: valor.cotizacion
              }
              appAjaxQuery(datos,rutaSQL).done(function(resp){
                
                let datos={
                  TipoQuery:"03_getbyid",
                  ID: resp.tabla[0].item
                }
                var cotiza = resp;
                appAjaxQuery(datos,rutaSQL).done(function(resp){
                  fila += '<tr>';
                  if(valor_ord.estado==0){
                    fila += '<td>'+
                  '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Imprimir" onclick="javascript:app13Boton_Print('+(parseInt(valor_ord.ID))+');"><i class="fa fa-print"></i></button>'+
                  '<button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="Aprobar" onclick="javascript:app13Boton_Check('+(parseInt(valor_ord.ID))+');" disabled><i class="fa fa-check"></i></button>';
                  fila += '<td>'+(valor_ord.ID)+'</td>';
                  }else{
                    fila += '<td>'+
                  '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Imprimir" onclick="javascript:app13Boton_Print('+(parseInt(valor_ord.ID))+');"><i class="fa fa-print"></i></button>'+
                  '<button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="Aprobar" onclick="javascript:app13Boton_Check('+(parseInt(valor_ord.ID))+');"><i class="fa fa-check"></i></button>';
                  fila += '<td>'+(valor_ord.ID)+'</td>';
                  }
                  fila += '<td>'+(valor.ID)+'</td>';
                  fila += '<td>'+(cotiza.tabla[0].ID)+'</td>';
                  fila += '<td>'+(preveedor)+'</td>';
                  /* fila += '<td>'+(cotiza.tabla[0].descripcion)+'</td>'; */
                  /* fila += '<td>'+(cotiza.tabla[0].fecha)+'</td>'; cierre*/
                  fila += '<td>'+(cotiza.tabla[0].item)+'</td>';
                  fila += '<td>'+(resp.tabla[0].nombre)+'</td>';
                  fila += '<td>'+(resp.tabla[0].stock)+'</td>';
                  
                  fila += '<td>'+(resp.tabla[0].unidad)+'</td>';
                  /* fila += '<td>'+(resp.tabla[0].precio)+'</td>'; item*/
                  /* fila += '<td>'+(resp.tabla[0].descripcion)+'</td>'; item*/
                  fila += '<td>'+(precio)+'</td>';
                  fila += '<td>'+(valor_ord.cantidad)+'</td>';
                  fila += '<td>'+(valor_ord.total)+'</td>';
                  fila += '</tr>';
        
                  
                  //$(fila).appendTo('#grd13DatosBody');
                  $('#grd13DatosBody').html(fila);
                });
              });
            });
          }else{
            $('#grd13DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
          }
      
        })
      }else{
        $('#grd13DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
      }
    })
    
  });
  


}

function app13Boton_Check(id){
  if(confirm("Se aprobará la orden de compra numero: "+id+". Se agregará la cantidad al stock del item.¿Continuar?")){
    let datos = {
      TipoQuery: "13_aprov",
      estado: 0,
      ID: id
    }
    //console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      //
      let datos={
        TipoQuery : '13_getbyid',
        ID:id
      }
      appAjaxQuery(datos,rutaSQL).done(function(resp){
        var orden = resp;
        let datos={
          TipoQuery : '12_getbyid',
          //ID: resp.tabla[0].cotizacion
          ID:resp.tabla[0].cotizacion
        }
        appAjaxQuery(datos,rutaSQL).done(function(resp){
          
          let datos = {
            TipoQuery : '10_grid',
            ID: resp.tabla[0].cotizacion
          }
          appAjaxQuery(datos,rutaSQL).done(function(resp){

            let datos={
              TipoQuery:"03_getbyid",
              ID: resp.tabla[0].item
            }
            appAjaxQuery(datos,rutaSQL).done(function(resp){
              let datos={
                TipoQuery:"03_save",
                commandSQL:"UPD_STOCK",
                ID: resp.tabla[0].ID,
                stock: parseInt(resp.tabla[0].stock) + parseInt(orden.tabla[0].cantidad)
              }
              appAjaxQuery(datos,rutaSQL).done(function(resp){
                alert("Se aprobo la orden de compra exitosamente.");
                app13GridAll();
              })
            })
          })
        })
      })                  
      //   
    })
  }else{
    return;
  }
}

function app13Boton_Print(id){

  let datos={
    TipoQuery : '13_getbyid',
    ID:id
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    var orden = resp.tabla[0];
    let datos={
      TipoQuery : '12_getbyid',
      //ID: resp.tabla[0].cotizacion
      ID:resp.tabla[0].cotizacion
    }
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      var cotiProv = resp.tabla[0];
      let datos = {
        TipoQuery : '10_grid',
        ID: resp.tabla[0].cotizacion
      }
      appAjaxQuery(datos,rutaSQL).done(function(resp){
        var cotiRFQ = resp.tabla[0];
        let datos={
          TipoQuery:"03_getbyid",
          ID: resp.tabla[0].item
        }
        appAjaxQuery(datos,rutaSQL).done(function(resp){
          var item = resp.tabla[0];
          let datos={
            TipoQuery:"14_getbyid",
            ID: cotiProv.proveedor
          }
          appAjaxQuery(datos,rutaSQL).done(function(resp){
            var prov = resp.tabla[0];
            let datos={
              TipoQuery:"15_getbyid",
              ID: 1
            }
            appAjaxQuery(datos,rutaSQL).done(function(resp){
              var emp = resp.tabla[0];
              let datos={
                TipoQuery:"16_getbyid",
                ID: item.moneda
              }
              appAjaxQuery(datos,rutaSQL).done(function(resp){
                var moneda = resp.tabla[0];
                window.jsPDF = window.jspdf.jsPDF;
                var ini=110;
                var det=200;

                var doc = new jsPDF();
                doc.setFont(undefined, 'bold');
                doc.text("ORDEN DE COMPRA: "+orden.ID, 105, 75, null, null, "center");
                doc.setFontSize(11.5);
                doc.text("Fecha: "+moment(orden.fecha).format("DD/MM/YYYY"),150,55);
                
                doc.setFontSize(10.5);
                doc.setTextColor(128,128,128);
                doc.text("Información del provedor", 28, 104);
                doc.setTextColor(0,0,0);

                doc.text("ID del proveedor: ", 20, ini+7);
                doc.text("Nombre: ", 20, ini+14);
                doc.text("RUC: ", 20, ini+21);
                doc.text("Dirección: ", 20, ini+28);
                doc.text("Telefono: ", 20, ini+35);
                doc.text("Email: ", 20, ini+42);
                doc.setTextColor(128,128,128);
                doc.text("Información de la empresa ", 133, 104);
                doc.setTextColor(0,0,0);

                doc.text("Fecha de compra: ", 125, ini+7);
                doc.text("Contacto: ", 125, ini+14);
                doc.text("Nombre: ", 125, ini+21);
                doc.text("Telefono: ", 125, ini+28);
                doc.text("Email: ", 125, ini+35);

                doc.setFont(undefined, 'normal');
                
                doc.text(prov.ID, 52, ini+7);
                doc.text(prov.nombre, 52, ini+14);
                doc.text(prov.ruc, 52, ini+21);
                doc.text(prov.direccion, 52, ini+28);
                doc.text(prov.telefono, 52, ini+35);
                doc.text(prov.email, 52, ini+42);

                
                doc.text(moment(orden.fecha).format("DD/MM/YYYY"), 158, ini+7);
                doc.text(emp.contacto, 158, ini+14);
                doc.text(emp.nombre, 158, ini+21);
                doc.text(emp.telefono, 158, ini+28);
                doc.text(emp.email, 158, ini+35);


                /* doc.text("ID del proveedor: ", 55, ini+7,{align: 'center'});
                doc.text("Nombre: ", 55, ini+14,{align: 'center'});
                doc.text("RUC: ", 55, ini+21,{align: 'center'});
                doc.text("Dirección: ", 55, ini+28,{align: 'center'});
                doc.text("Telefono: ", 55, ini+35,{align: 'center'});
                doc.text("Email: ", 55, ini+42,{align: 'center'});
                doc.setTextColor(128,128,128);
                doc.text("Información de la empresa ", 135, 104);
                doc.setTextColor(0,0,0);

                doc.text("Fecha de compra: ", 160, ini+7,{align: 'center'});
                doc.text("Contacto: ", 160, ini+14,{align: 'center'});
                doc.text("Nombre: ", 160, ini+21,{align: 'center'});
                doc.text("Telefono: ", 160, ini+28,{align: 'center'});
                doc.text("Email: ", 160, ini+35,{align: 'center'});

                doc.setFont(undefined, 'normal');
                
                doc.text(prov.ID, 55, ini+7,{align: 'center'});
                doc.text(prov.nombre, 55, ini+14,{align: 'center'});
                doc.text(prov.ruc, 55, ini+21,{align: 'center'});
                doc.text(prov.direccion, 55, ini+28,{align: 'center'});
                doc.text(prov.telefono, 55, ini+35,{align: 'center'});
                doc.text(prov.email, 55, ini+42,{align: 'center'});

                
                doc.text(moment(orden.fecha).format("DD/MM/YYYY"), 160, ini+7,{align: 'center'});
                doc.text(emp.contacto, 160, ini+14,{align: 'center'});
                doc.text(emp.nombre, 160, ini+21,{align: 'center'});
                doc.text(emp.telefono, 160, ini+28,{align: 'center'});
                doc.text(emp.email, 160, ini+35,{align: 'center'}); */

                /* doc.setTextColor(128,128,128);
                doc.setFont(undefined, 'bold');
                doc.text("Descripcion", 30, det,{align: 'center'});
                doc.text("Cantidad", 60, det,{align: 'center'});
                doc.text("Unidad", 90, det,{align: 'center'});
                doc.text("Tarifa Unitaria", 120, det,{align: 'center'});
                doc.text("Moneda", 150, det,{align: 'center'});
                doc.text("Total", 180, det,{align: 'center'});
                doc.setTextColor(0,0,0);
                doc.setFont(undefined, 'normal');
                doc.text("value", 30, det+7,{align: 'center'});
                doc.text("value", 60, det+7,{align: 'center'});
                doc.text("value", 90, det+7,{align: 'center'});
                doc.text("value", 120, det+7,{align: 'center'});
                doc.text("value", 150, det+7,{align: 'center'});
                doc.text("value", 180, det+7,{align: 'center'}); */

                doc.setTextColor(128,128,128);
                doc.setFont(undefined, 'bold');
                doc.text("Descripcion", 20, det);
                doc.text("Cantidad", 80, det);
                doc.text("Unidad", 100, det);
                doc.text("Tarifa Unitaria", 120, det);
                doc.text("Moneda", 150, det);
                doc.text("Total", 180, det);
                doc.setTextColor(0,0,0);
                doc.setFont(undefined, 'normal');
                doc.text(item.nombre, 20, det+7);
                doc.text(orden.cantidad, 80, det+7);
                doc.text(item.unidad, 100, det+7);
                doc.text(parseFloat(cotiProv.precio).toFixed(2), 120, det+7);
                doc.text(moneda.nombre, 150, det+7);
                doc.text(parseFloat(orden.total).toFixed(2), 180, det+7);

                doc.save('Orden '+orden.ID+'.pdf');
                app13GridAll();
              })

              
            })
          })

        })
      })
    })
  })                  
  //   
  

  
}
function app14GridAll(){
  $('#grd14DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : '14_grid'
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      let fila = "";
      $.each(resp.tabla,function(key, valor){
        fila += '<tr>';
        fila += '<td>'+
        '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app14Boton_load('+(parseInt(valor.ID))+');"><i class="fa fa-pencil"></i></button>'+
        '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app14Boton_delete('+(parseInt(valor.ID))+');"><i class="fa fa-trash"></i></button></td>';    
        fila += '<td>'+(valor.ID)+'</td>';
        fila += '<td>'+(valor.codigo)+'</td>';
        fila += '<td>'+(valor.ruc)+'</td>';
        fila += '<td>'+(valor.nombre)+'</td>';
        fila += '<td>'+(valor.descripcion)+'</td>';
        fila += '</tr>';
      });
      $('#grd14DatosBody').html(fila);
    }else{
      $('#grd14DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

function app14Boton_Search(){
  $('#grd14DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txt14_Buscar").val();
  if(txtBuscar>0){
    let datos = {
      TipoQuery : '14_getbyid',
      ID:txtBuscar
    };
  
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.tabla.length>0){
        let fila = "";
        $.each(resp.tabla,function(key, valor){
          fila += '<tr>';
          fila += '<td>'+
          '<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="Editar" onclick="javascript:app14Boton_load('+(parseInt(valor.ID))+');"><i class="fa fa-pencil"></i></button>'+
          '<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="Eliminar" onclick="javascript:app14Boton_delete('+(parseInt(valor.ID))+');"><i class="fa fa-trash"></i></button></td>';    
          fila += '<td>'+(valor.ID)+'</td>';
          fila += '<td>'+(valor.codigo)+'</td>';
          fila += '<td>'+(valor.ruc)+'</td>';
          fila += '<td>'+(valor.nombre)+'</td>';
          fila += '<td>'+(valor.descripcion)+'</td>';
          fila += '</tr>';
        });
        $('#grd14DatosBody').html(fila);
      }else{
        $('#grd14DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
      }
      //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
    });
  }else{
    app14GridAll();
  }
}

function app14Boton_new(){
  $("#grid14").hide();
  $("#btn14_New").hide();
  $("#btn14_Update").hide();
  $("#edit14").show();
  $("#btn14_Save").show();
  $("#btn14_Cancel").show();
}

function app14Boton_cancel(){
  app14GridAll();
  $("#edit14").hide();
  $("#btn14_Save").hide();
  $("#btn14_Cancel").hide();
  $("#btn14_Update").hide();
  $("#grid14").show();
  $("#btn14_New").show();
  $("#txt14_id").val("");
  $("#txt14_codigo").val("");
  $("#txt14_Nombre").val("");
  $("#txt14_ruc").val("");
  $("#area14_descripcion").val("");
  

}

function app14GetDatos_ToDatabase(){

  let EsError = false;
  let rpta = "";
  $('.box-body .form-group').removeClass('has-error');
  //if($("#txtDocum_Valor").val()=="") { $("#divDocum_Valor").prop("class","form-group has-error"); EsError = true; }

  if(!EsError){
    rpta = {
      TipoQuery : '14_save',
      codigo: $('#txt14_codigo').val(),
      ruc: $("#txt14_ruc").val(),
      nombre: $("#txt14_Nombre").val(),
      descripcion: $("#area14_descripcion").val(),
      telefono: $("#txt14_telefono").val(),
      email: $("#txt14_email").val(),
      direccion: $("#txt14_Direccion").val(),
      
    }
  }
  return rpta;
}

function app14Boton_save(){

  let datos = app14GetDatos_ToDatabase();
 
  if(datos!=""){
    datos.commandSQL = "INS";
    console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.error==0) {

        alert("El proveedor fue registrado exitosamente!");
        app14Boton_cancel();
      }
    });
  } else {
    alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
  }
}

function app14_load(){
  $("#grid14").hide();
  $("#btn14_New").hide();
  $("#btn14_Save").hide();
  $("#edit14").show();
  $("#btn14_Update").show();
  $("#btn14_Cancel").show();
}

function app14Boton_load(id){

  let datos = {
    TipoQuery : "14_getbyid",
    ID: id
  }
  console.log("id: "+id);
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    //$("#txt02_NroActivo").val($("#lbl_ActivoGrupo").html()+' - '+$("#lbl_ActivoNro").html());
    
    $("#txt14_id").val(resp.tabla[0].ID);
    $("#txt14_codigo").val(resp.tabla[0].codigo);
    $("#txt14_Nombre").val(resp.tabla[0].nombre);
    $("#txt14_ruc").val(resp.tabla[0].ruc);
    $("#area14_descripcion").val(resp.tabla[0].descripcion);
    $("#txt14_telefono").val(resp.tabla[0].telefono);
    $("#txt14_email").val(resp.tabla[0].email);
    $("#txt14_Direccion").val(resp.tabla[0].direccion);
    app14_load(); 
  });

  
}

function app14Boton_update(){

  let datos = app14GetDatos_ToDatabase();
  if(datos!=""){
    datos.commandSQL = "UPD";
    datos.ID= $("#txt14_id").val();
    console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        alert("El proveedor fue actualizado correctamente!");

        app14Boton_cancel();
      }
    });
  } else {
    alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
  }
}

function app14Boton_delete(id){

  if(confirm("¿Esta seguro que desea eliminar el proveedor "+id+"?")){
    let datos = {
      TipoQuery: "14_save",
      commandSQL : "DEL",
      status: 0,
      ID: id
    }
    //console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        app14Boton_cancel();
        alert("El proveedor "+id+" fue eliminado!!");
      }
    });
  }
  else{
      return false;
  }
}


