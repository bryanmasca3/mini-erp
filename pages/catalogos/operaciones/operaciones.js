var rutaSQL = "pages/catalogos/operaciones/sql.php";
let vehicleGlobal="";
let encargadoGlobal=1;

function appBotonReset(){

  dashboardGrafica01();
  dashboardGrafica02();
  dashboardGrafica03();
  dashboardGrafica04();
}
function search_personal_orden_compra(){

  var msn=$('#txt_search_requerimiento_compra').val();
  let datos = {
    TipoQuery : '02_search_personal_ordencompra',
    value:msn     
  };      
  console.log(datos)
  appAjaxQuery(datos,rutaSQL).done(function(resp){    
    if(resp.error){
      swal("No se encontro incidencia para el DNI", {
        icon: "warning",
      });
    }else{
      
      swal("Has seleccionado a: "+resp.tabla.nombres+" "+resp.tabla.apellidos+"", {
        icon: "success",
      });

      $("#idrequerimientoCompraHidden").val(resp.tabla.id);
      $('#txt_search_name_requerimientoCompra').val(resp.tabla.nombres);
      $('#txt_search_apellido_requerimientoCompra').val(resp.tabla.apellidos);  
    }
  });
}
function OpenModalRequerimiento(id){
  //console.log(id)
  let datos = {
    TipoQuery : 'sql_get_requerimiento_by_id',
    data:id
  };  
  var table;   
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    console.log(resp)       
    $('#txt_n_requerimiento_modal').val(resp.data[0].n_requerimiento)
    $('#txt_area_requerimiento_modal').val(resp.data[0].area)
    $('#txt_solicitante_requerimiento_modal').val(resp.data[0].solicitante)
    $('#txt_centro_costo_requerimiento_modal').val(resp.data[0].centro_costo)
    $('#txt_fecha_requerimiento_modal').val(resp.data[0].fecha_requerimiento)
    $('#txt_prioridad_requerimiento_modal').val(resp.data[0].prioridad)
    $('#txt_motivo_requerimiento_modal').val(resp.data[0].motivo)
    $('#txt_estado_requerimiento_modal').val(resp.data[0].estado)
    $('#txt_tiempo_atencion_requerimiento_modal').val(resp.data[0].tiempo_atencion)
    
    $("#tableItemRequerimientoModalShow > tbody").empty()
    resp.data.forEach((it)=>{
      $("#tableItemRequerimientoModalShow > tbody").append("<tr>"+
      "<td>"+it.item+"</td>"+
      "<td>"+it.codigo_parte+"</td>"+
      "<td>"+it.n_parte+"</td>"+
      "<td>"+it.descripcion+"</td>"+
      "<td>"+it.cantidad+"</td>"+
      "<td>"+it.unidad_medida+"</td>"+
      "<td>"+it.prioridad+"</td>"+
      "<td>"+it.observacion+"</td>"+
      "</tr>")
    })
    $('#ModalOpenRequerimiento').modal('show');   

  } );   
}

function addItemRequerimiento(tableItemRequerimiento){
  
  let idx=1;
  let element =$('#'+tableItemRequerimiento+' > tbody > tr').last();
  if(element.length){
    let lastEle=element.find(".txt_item_requerimiento").val()
    idx=Number(lastEle)+1

  }

  $('#'+tableItemRequerimiento+' > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='ItemsRemoveRequerimientoRow'>"+
  "<td><input type='text' class='obligatory-input form-control txt_item_requerimiento' disabled value='"+idx+"'/></td>"+
  "<td><input type='text' class='form-control txt_codigo_requerimiento' /></td>"+
  "<td><input type='text' class='form-control txt_n_parte_requerimiento' /></td>"+
  "<td><input type='text' class='obligatory-input form-control txt_descripcion_requerimiento' /></td>"+
  "<td><input type='text' class='obligatory-input form-control txt_cantidad_requerimiento' /></td>"+
  "<td><input type='text' class='obligatory-input form-control txt_unidad_requerimiento' /></td>"+
  //"<td><input type='text' class='obligatory-input form-control txt_prioridad_requerimiento' /></td>"+

  "<td><input type='text' class='form-control txt_observacion_requerimiento' /></td>"+
"<td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500  py-2 px-2 text-white' onclick='removeComentarios("+(new Date()).getTime()+")'></button>"+ 
"</div></td>"+
"</tr>")
}


function add_Requerimientos(){

  let datos = {
    TipoQuery : 'sql_get_last_requerimiento'      
  };                
 appAjaxQuery(datos,rutaSQL).done(function(dat){   

  console.log(dat.tabla.id)
 // let id=(new Date()).getTime();
  let id=Number(dat.tabla.id)+1;
  let Maindata=[      
    {title:"n_requerimiento",element:"",type:"text",status:0,value:"RQ-CM-2022-"+id},
    {title:"area",element:"",type:"text",status:0,value:"3"},
    {title:"solicitante",element:"idrequerimientoCompraHidden",type:"text",status:1,value:"val"},
    {title:"fecha_requerimiento",element:"txt_fecha_requerimiento_requerimiento",type:"text",status:1,value:"val"},
    {title:"centro_costo",element:"txt_centro_costo_requerimiento",type:"text",status:0,value:"val"},
    {title:"prioridad",element:"slct_prioridad_requerimiento",type:"select",status:1,value:"selectVal"},
    {title:"motivo",element:"txt_motivo_requerimiento",type:"text",status:1,value:"val"},

    {title:"id",element:"idrequerimientoCompraHidden",type:"text",status:1,value:"val"},
    {title:"search",element:"txt_search_requerimiento_compra",type:"text",status:1,value:"val"},
    {title:"name",element:"txt_search_name_requerimientoCompra",type:"text",status:1,value:"val"},
    {title:"surname",element:"txt_search_apellido_requerimientoCompra",type:"text",status:1,value:"val"},

    {title:"itemsRequerimiento",element:"tableItemRequerimiento",type:"table",status:1,value:"table"}      
  ]
  if(validate(Maindata)){
    swal("Completa todos los campos", {
      icon: "error",
    });
  }else{      
        let datos = {
          TipoQuery : 'sql_RequerimientosAndItems',
          data:generateInsertData(Maindata)
        };                
       appAjaxQuery(datos,rutaSQL).done(function(resp){   
                           
            ResetAndUpdateGrid(Maindata,updateGrid,"gridRequerimientoGrid");
            swal("Insertado correctamente", {
              icon: "success",
            });   
                           
        }); 
  }
}); 
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
        alert("El vehiculo fue creado exitosamente!");
      }
    });
  } else {
    alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
  }

}
function HistorialdeDocumentos(){
  
  $("#AgregarDocumentos").hide();
  $("#HistorialdeDocumentos").show();
  
  updateGrid("griddeDocumentos");
  $("#link_AgregarDocumentos").removeClass("active");
  $("#link_HistorialdeDocumentos").addClass("active");

}
function AgregarDocumentos(){
  
  $("#HistorialdeDocumentos").hide();
  $("#AgregarDocumentos").show();
  

  $("#link_HistorialdeDocumentos").removeClass("active");
  $("#link_AgregarDocumentos").addClass("active");

}

function HistorialConductores(){
  
  $("#NuevoRegistroConductores").hide();
  $("#HistorialConductores").show();
  
  updateGrid("gridConductor");
  $("#link_NuevoRegistroConductores").removeClass("active");
  $("#link_HistorialConductores").addClass("active");

}

function HistorialProveedores(){  
  $("#HistorialProveedores").show();  
  updateGrid("gridProveedor");
  $("#link_HistorialProveedores").addClass("active");

}
function NuevoRegistroConductores(){
  
  $("#HistorialConductores").hide();
  $("#NuevoRegistroConductores").show();
  $("#link_HistorialConductores").removeClass("active");

  $("#link_NuevoRegistroConductores").addClass("active");

}

function HistorialSolicitudTrabajo(){
  
  $("#NuevoRegistroSolicitudTrabajo").hide();
  $("#HistorialSolicitudTrabajo").show();
  
  //updateGrid("gridConductor");
  $("#link_NuevoRegistroSolicitudTrabajo").removeClass("active");
  $("#link_HistorialSolicitudTrabajo").addClass("active");

}
function NuevoRegistroSolicitudTrabajo(){
  
  $("#HistorialSolicitudTrabajo").hide();
  $("#NuevoRegistroSolicitudTrabajo").show();
  $("#link_HistorialSolicitudTrabajo").removeClass("active");

  $("#link_NuevoRegistroSolicitudTrabajo").addClass("active");

}
function HistorialTareas(){
  
  $("#NuevoRegistroTareas").hide();
  $("#HistorialTareas").show();
  
  updateGrid("gridOperacionTarea");
  $("#link_NuevoRegistroTareas").removeClass("active");
  $("#link_HistorialTareas").addClass("active");

}
function NuevoRegistroTareas(){
  
  $("#HistorialTareas").hide();
  $("#NuevoRegistroTareas").show();

  $("#link_HistorialTareas").removeClass("active");

  $("#link_NuevoRegistroTareas").addClass("active");


}
function HistorialCombustible(){
  
  $("#NuevoRegistroCombustible").hide();
  $("#HistorialCombustible").show();
  
  updateGrid("gridOperacionCumbustible");
  $("#link_NuevoRegistroCombustible").removeClass("active");
  $("#link_HistorialCombustible").addClass("active");

}
function HistorialdeVehiculo(){
  
  $("#detalleVehiculo").hide();
  $("#contentVehiculos").show();

 // $("#VehiculoTablesCombustibleMensual").empty()
 // $("#VehiculoTablesCombustibleAnual").empty()
 // $("#VehiculoTablesGastoOperativoMensual").empty()
  //$("#VehiculoTablesGastoOperativoAnual").empty()
  updateGrid("gridVehiculo");

}
function NuevoRegistroCombustible(){
  
  $("#HistorialCombustible").hide();
  $("#NuevoRegistroCombustible").show();

  $("#link_HistorialCombustible").removeClass("active");

  $("#link_NuevoRegistroCombustible").addClass("active");

}
function HistorialMantenimiento(){
  $("#HistorialSolicitudMantenimiento").hide();
  $("#NuevoRegistroSolicitudMantenimiento").hide();
  $("#NuevoRegistroMantenimiento").hide();
  $("#HistorialMantenimiento").show();
  
  updateGrid("gridOperacionMantenimiento");
  $("#link_HistorialSolicitudMantenimiento").removeClass("active");
  $("#link_NuevoRegistroSolicitudMantenimiento").removeClass("active");
  $("#link_NuevoRegistroMantenimiento").removeClass("active");
  $("#link_HistorialMantenimiento").addClass("active");

}
function NuevoRegistroMantenimiento(){
  $("#HistorialSolicitudMantenimiento").hide();
  $("#NuevoRegistroSolicitudMantenimiento").hide();
  $("#HistorialMantenimiento").hide();
  $("#NuevoRegistroMantenimiento").show();

  $("#link_HistorialMantenimiento").removeClass("active");
  $("#link_NuevoRegistroSolicitudMantenimiento").removeClass("active");
  $("#link_HistorialSolicitudMantenimiento").removeClass("active");
  $("#link_NuevoRegistroMantenimiento").addClass("active");

}
function HistorialSolicitudMantenimiento(){
  $("#HistorialMantenimiento").hide();
  $("#NuevoRegistroMantenimiento").hide();
  $("#NuevoRegistroSolicitudMantenimiento").hide();
  $("#HistorialSolicitudMantenimiento").show();
  
 // updateGrid("gridOperacionMantenimiento");
 $("#link_NuevoRegistroMantenimiento").removeClass("active");
 $("#link_HistorialMantenimiento").removeClass("active");
  $("#link_NuevoRegistroSolicitudMantenimiento").removeClass("active");
  $("#link_HistorialSolicitudMantenimiento").addClass("active");

}
function NuevoRegistroSolicitudMantenimiento(){
  $("#HistorialMantenimiento").hide();
  $("#NuevoRegistroMantenimiento").hide();
  $("#HistorialSolicitudMantenimiento").hide();
  $("#NuevoRegistroSolicitudMantenimiento").show();

  $("#link_HistorialSolicitudMantenimiento").removeClass("active");
  $("#link_NuevoRegistroMantenimiento").removeClass("active");
  $("#link_HistorialMantenimiento").removeClass("active");

  $("#link_NuevoRegistroSolicitudMantenimiento").addClass("active");

}
function HistorialCostosOperarios(){
  
  $("#NuevoRegistroCostosOperarios").hide();
  $("#HistorialCostosOperarios").show();
  
  updateGrid("gridOperacionCostosOperarios");
  $("#link_NuevoRegistroCostosOperarios").removeClass("active");
  $("#link_HistorialCostosOperarios").addClass("active");

}
function NuevoRegistroCostosOperarios(){
  
  $("#HistorialCostosOperarios").hide();
  $("#NuevoRegistroCostosOperarios").show();

  $("#link_HistorialCostosOperarios").removeClass("active");

  $("#link_NuevoRegistroCostosOperarios").addClass("active");

}
function HistorialRequerimientosPersonas(){
  
  $("#NuevoRegistroPersonas").hide();
  $("#HistorialRequerimientosPersonas").show();

  $("#link_NuevoRegistroPersonas").removeClass("active");
  //gridSecondRequerimientos();

  $("#link_HistorialRequerimientosPersonas").addClass("active");
  //gridFirst();
}

  function NuevoRegistroPersonas(){

  $("#HistorialRequerimientosPersonas").hide();
  $("#NuevoRegistroPersonas").show();

  $("#link_HistorialRequerimientosPersonas").removeClass("active");
  

  $("#link_NuevoRegistroPersonas").addClass("active");
  //gridFirst();
}

function modalViewDetailsCombustible(id){
  //console.log(id)
  let datos = {
   TipoQuery : 'sql_operacion_combustible_by_id',
   data:id
 };  
 var table;   
 appAjaxQuery(datos,rutaSQL).done(function(resp){
   
   $('#modalOpenDetailsCombustible_tipo_combustible').val(resp.data.tipo_combustible)

   $('#modalOpenDetailsCombustible_fecha').val(resp.data.fecha)
   $('#modalOpenDetailsCombustible_hora').val(resp.data.hora)

   $('#modalOpenDetailsCombustible_cantidad').val(resp.data.cantidad)
   $('#modalOpenDetailsCombustible_precio').val("S/. "+resp.data.precio)
   $('#modalOpenDetailsCombustible_total').val("S/. "+resp.data.total)

   $('#modalOpenDetailsCombustible_vehiculo').val(resp.data.vehiculo)
   $('#modalOpenDetailsCombustible_active').val(resp.data.active)
   $('#modalOpenDetailsCombustible_condicion').val(resp.data.condicion)

   $('#modalOpenDetailsCombustible_nombres_conductor').val(resp.data.nombres_conductor)

   $('#modalOpenDetailsCombustible_proveedor').val(resp.data.proveedor)
   $('#modalOpenDetailsCombustible_ruc').val(resp.data.ruc)
     

   $('#modalOpenDetailsCombustible').modal('show');   

 } );   
 
}

function modalViewDetailsOtrosGastos(id){
  //console.log(id)
  let datos = {
   TipoQuery : 'sql_operacion_otros_gastos_by_id',
   data:id
 };  
 var table;   
 appAjaxQuery(datos,rutaSQL).done(function(resp){
   
   $('#modalOpenDetailsOtrosGastos_nombre').val(resp.data.nombre)
   $('#modalOpenDetailsOtrosGastos_tipo').val(resp.data.tipo)
   $('#modalOpenDetailsOtrosGastos_fecha').val(resp.data.fecha)

   $('#modalOpenDetailsOtrosGastos_hora').val(resp.data.hora)
   $('#modalOpenDetailsOtrosGastos_referencia').val(resp.data.referencia)

   $('#modalOpenDetailsOtrosGastos_vehiculo').val(resp.data.vehiculo)
   $('#modalOpenDetailsOtrosGastos_descripcion').val(resp.data.descripcion)

   $('#modalOpenDetailsOtrosGastos_precio').val("S/. "+resp.data.precio)
   $('#modalOpenDetailsOtrosGastos_cantidad').val(resp.data.cantidad)
   $('#modalOpenDetailsOtrosGastos_total').val("S/. "+resp.data.total)

   $('#modalOpenDetailsOtrosGastos_nombres_conductor').val(resp.data.nombres_conductor)
   
     

   $('#modalOpenDetailsOtrosGastos ').modal('show');   

 } );   
 
}
function modalViewDetailsTareas(id){
   //console.log(id)
   let datos = {
    TipoQuery : 'sql_operacion_tarea_by_id',
    data:id
  };  
  var table;   
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    
    $('#modalOpenDetailsTarea_nombre').val(resp.data.nombre)
    $('#modalOpenDetailsTarea_tipo').val(resp.data.tipo)
    $('#modalOpenDetailsTarea_fecha').val(resp.data.fecha_limite)
    $('#modalOpenDetailsTarea_prioridad').val(resp.data.prioridad)
    $('#modalOpenDetailsTarea_activo').val(resp.data.active)
    $('#modalOpenDetailsTarea_descripcioin').val(resp.data.nombre_vehiculo)
    $('#modalOpenDetailsTarea_condicion').val(resp.data.condicion)
    $('#modalOpenDetailsTarea_conductor').val(resp.data.nombres_conductor)
    $('#modalOpenDetailsTarea_responsable').val(resp.data.nombres_responsable)
     
  
    $("#modalOpenDetailsTarea_comentarios_table > tbody").empty()

    resp.dataComent.forEach((it,index)=>{
      $("#modalOpenDetailsTarea_comentarios_table > tbody").append("<tr>"+
      "<td>"+(Number(index)+1)+"</td>"+   
      "<td>"+it.descripcion+"</td>"+
      "</tr>")
    })
    

    $('#modalOpenDetailsTarea').modal('show');   

  } );   
  
}
function generateGrid(querySQL,IdgridTable,ope,Enabledcolumns,IdparentSearch,searchColumns,params=null,order=1,enabledID=1){
  let datos={
    TipoQuery : querySQL,
    value : params,
  }
  var table;
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    console.log(resp)
    if(resp.data.length>0){
     let dataCols=generateColumnsGrid(resp.column,ope,Enabledcolumns,enabledID);

     table= $('#'+IdgridTable).DataTable( {
        "sPaginationType": "simple",
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
        },
        data: resp.data,                
        destroy: true,
        columns: dataCols,  
        columnDefs: [
          {            
              className: 'dt-body-center',
              targets: "_all"
          }
        ], 
        order: [[order, "asc"]]
    } );    
        searchParent(IdparentSearch,searchColumns,dataCols);
        var parent= $("#"+IdparentSearch);      
        table.columns().eq( 0 ).each( function ( colIdx ) {    
        var child= parent.find("#"+colIdx);    
        child.on('keyup', function() {          
              table
              .column( colIdx )
              .search(child.val(), false, true)
              .draw();
      })   

    } );   

    }else{
      $('#'+IdgridTable).empty()
    }
  });
}



function searchParent(IdparentSearch,dataColumnsEnabled,allCols){   
let elements="";
allCols.forEach((ele,idx)=>{
  if(dataColumnsEnabled.findIndex((it)=>it==ele.title)!=-1){
    elements+='<span class="input-group-addon" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"></i></span>'+
    '<input id="'+idx+'" type="text" class="form-control" placeholder="Buscar por '+ele.title+'" />'
  }      
})

$("#"+IdparentSearch).html(elements);
}



  function searchSolicitante(){
  var msn=$('#txt_search_solicitante').val();
  let datos = {
    TipoQuery : '02_search_solicitante',
    value:msn     
  };      
  appAjaxQuery(datos,rutaSQL).done(function(resp){    
    if(resp.error){
      swal("No se encontro incidencia para el DNI", {
        icon: "warning",
      });
    }else{
      
      swal("Has seleccionado a: "+resp.tabla.nombres+" "+resp.tabla.apellidos+"", {
        icon: "success",
      });

      $("#idsolicitanteHidden").val(resp.tabla.id);
      $('#txt_solicitante_nombres').val(resp.tabla.nombres);
      $('#txt_solicitante_apellidos').val(resp.tabla.apellidos);
      $('#txt_solicitante_area').val(resp.tabla.area);
      $('#txt_solicitante_cargo').val(resp.tabla.cargo);
    }
  });
}

function searchFuncionForNameAndSurname(inputsearch,sql,inputtext){
  var msn=$('#'+inputsearch).val();
  let datos = {
    TipoQuery : sql,
    value:msn     
  };      
  appAjaxQuery(datos,rutaSQL).done(function(resp){    
    if(resp.error){
      swal("No se encontro incidencia para el DNI", {
        icon: "warning",
      });
    }else{
      
      swal("Has seleccionado a: "+resp.tabla.nombres+" "+resp.tabla.apellidos+"", {
        icon: "success",
      });

      $("#"+inputtext[0]).val(resp.tabla.id);
      $('#'+inputtext[1]).val(resp.tabla.nombres);
      $('#'+inputtext[2]).val(resp.tabla.apellidos);    
    }
  });
}     

function modalGestionPersonas(id){
 
    console.log(id)
  let datos = {
    TipoQuery : '01_gridRequerimientoGestionPersonal',
    value:id    
  };  
     
  appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp)

      $('#txt-modal-gestion-personas-vacante-search').val();
      $('#table_gestion_personas_vacante_list > tbody').empty();
      $('#table_gestion_personas_vacante_list_observaciones > tbody').empty();
     // $('#button_add_gestion_personas_vacante').hide();

     $("#txt-modal-gestion-personas-nombre").val(resp.tabla.nombre_solicitante
      )
      $("#txt-modal-gestion-personas-apellido").val(resp.tabla.apellido_solicitante); 

      $("#txt-modal-gestion-personas-area").val(resp.tabla.area); 
      $("#txt-modal-gestion-personas-cargo").val(resp.tabla.cargo); 
      $("#txt-modal-gestion-personas-motivo").val(resp.tabla.motivo); 
      $("#txt-modal-gestion-personas-vacantes").val(resp.tabla.vacantes); 
      $("#txt-modal-gestion-personas-estado").val(resp.tabla.estado); 
   

      
    let tr="";

    if(resp.tabla1.length){
      resp.tabla1.forEach((ele)=>{
        tr+="<tr id='"+(new Date()).getTime()+"'>"
        tr+="<td>"+ele.nombre+"</td>"
        tr+="<td>"+ele.apellido+"</td>"
        tr+="<td>"+ele.dni+"</td>"
        tr+="<td>"+ele.cargo+"</td>"  
        tr+="</tr>"
    })      
    }else{
      tr="<tr><td colspan='5' style='color:red;text-align:center'>No hay personal asociado al requerimiento</td></tr>"
    }
  


    $('#table_gestion_personas_vacante_list > tbody').append(tr)


    let tr1="";

    if(resp.tabla2.length){
      resp.tabla2.forEach((ele)=>{
        tr1+="<tr id='"+((new Date()).getTime()+1)+"'>"
        tr1+="<td>"+ele.descripcion+"</td>"    
        tr1+="</tr>"
    })
    }else{
      tr1="<tr><td colspan='1' style='color:red;text-align:center'>No hay observaciones</td></tr>"
    }
  
    


    $('#table_gestion_personas_vacante_list_observaciones > tbody').append(tr1)


  $('#modal_gestionPersonas').modal('show');

  } ); 
}

function updateGrid(grid){
  switch (grid) {
    case "gridRequerimientoGrid":
      generateGrid(
        "sqlRequerimientosGrid",
        "gridRequerimientoshtml",
        {
          print:{state:0,funct:""},
          view:{state:1,funct:"OpenModalRequerimiento"},
          edit:{state:0,funct:""},
          delet:{state:0,funct:""},
        },
        [
          "Nº Requerimiento",
          "Area",
          "Prioridad",
          "Estado",
          "Motivo",
          "Fecha"  
        ],"searchRequerimientoshtml",[            
           "Nº Requerimiento",
            "Area",
            "Fecha",
            "Estado"   
        ],null,1,0
      );
    break;      
    case "gridRequerimientoPersonalGrid":
        generateGrid(
          "01_gridRequerimientosPersonas",
          "gridRequrimientoPersonalLogisticahtml",
          {
            print:{state:0,funct:""},
            view:{state:1,funct:"modalGestionPersonas"},
            edit:{state:0,funct:""},
            delet:{state:0,funct:""},
          },
          [
  "Nº Requerimiento",
  "Area",
  "Cargo",
  "Vacantes",
  "Asignados",
  "Motivo",
  "Estado"  
          ],"searchRequrimientoPersonalLogisticahtml",[            
            "Nº Requerimiento",         
            "Area",
            "Cargo",
            "Estado"
          ],"1",0
        );
      break; 

    case "gridRequerimientoPersonalOperaciones":
      generateGrid(
        "01_gridRequerimientosPersonas",
        "gridRequerimientoPersonalshtml",
        {
          print:{state:0,funct:""},
          view:{state:0,funct:""},
          edit:{state:0,funct:""},
          delet:{state:0,funct:""},
        },
        [

        ],"searchRequerimientosPersonalhtml",[
          "Cargo",
          "Vacantes",
          "Motivo",
          "Estado"
        ],"1"
      );
    break;
    case "gridProveedor":
      generateGrid(
        "sqlProveedorFlota",
        "grd01FloatProveedor",
        {
          print:{state:0,funct:""},
          view:{state:0,funct:""},
          edit:{state:0,funct:""},
          delet:{state:0,funct:""},
        },
        [

        ],"search01FloatProveedor",[
          "RUC",
          "Nombre",
          "Grupo",
          "Clase"
        ],"1"
      );
    break;
    case "gridOperacionSolicitudMantenimiento":
      generateGrid(
        "01_gridSolicitudMantenimiento",
        "grd01OperacionSolicitudMantenimiento",
        {
          print:{state:0,funct:""},
          view:{state:0,funct:""},
          edit:{state:0,funct:""},
          delet:{state:0,funct:""},
        },
        [                                           
              ],"search01OperacionSolicitudMantenimiento",[
                "Area",
                "Prioridad",
                "Tipo",
                "Estado"
              ],null,1           
      );
    break;
    case "gridOperacionSolicitudTrabajo":
      generateGrid(
        "01_gridRequerimientosPersonas",
        "grd01RequerimientosHistorial",
        {
          print:{state:0,funct:""},
          view:{state:0,funct:""},
          edit:{state:0,funct:""},
          delet:{state:0,funct:""},
        },
        [                                           
              ],"RegistroRequerimientosPersonasSearch",[
                "Nombre",
                "Area",
                "Cargo",
                "Fecha"
              ],1           
      );
    break;
    case "gridOperacionCostosOperarios":
      generateGrid(
        "sql_operacion_costos_operativos",
        "grd01OperacionCostosOperativos",
        {
          print:{state:0,funct:""},
          view:{state:1,funct:"modalViewDetailsOtrosGastos"},
          edit:{state:0,funct:""},
          delet:{state:0,funct:""},
        },
        [ "Codigo",
                "Descripcion de Gasto",
                "Fecha",
                "Precio Unitario",
                "Cantidad",
                "Total",
              ],"search01OperacionCostosOperativos",[
                "Codigo",
                "Descripcion de Gasto",
                "Fecha"              
              ],1           
      );
    break;
   
    case "griddeDocumentos":
      generateGrid(
        "sql_operacion_documentos",
        "grd01OdeDocumentos",
        {
          print:{state:0,funct:""},
          view:{state:0,funct:""},
          edit:{state:0,funct:""},
          delet:{state:0,funct:""},
        },
        [
          "Codigo",
          'Resolución de bonificación',
          'Certificación de instalación de GPS',             
          'Peso',
          'Revisión técnica',
          'Cubicación',
          'DGN',
          'Tarjeta de mercancías',
          'Certificado de operativo',
          'Certificado de Hermeticidad',
          'Certificado de epoxicado',
          'Lavado interno',
          'Línea de vida',
          'Materiales peligrosos MATPEL',
          'Check List',
          'Contrato',
          'SOAT',
          'Responsabilidad Civil',
          'Póliza vehicular'
        
              ],"search01OdeDocumentos",[
                "Codigo",
                
              ],1           
      );
    break;
    case "gridDocumentoVehiculo":
      generateGrid(
        "sql_vehiculo_documento",
        "grd01VehiculoDocumento",
        {
          print:{state:0,funct:""},
          view:{state:0,funct:""},
          edit:{state:0,funct:""},
          delet:{state:0,funct:"deleteDocument"},
        },
        [                
          "Certificacion de instalacion de GPS",
          "Peso",
          "Revision tecnica",        
          "Cubicacion",
          "DGN",
          "Tarjeta de mercancías",
          "Certificado de operativo",
          "Certificado de Hermeticidad",
          "Certificado de epoxicado",
          "Lavado interno",
          "Linea de vida",
          "Materiales peligrosos MATPEL",
          "Check List",
          "Contrato",
          "SOAT",
          "Responsabilidad Civil",                                          
          "Poliza vehicular",
              ],"search01VehiculoDocumento",[     
              ],vehicleGlobal          
      );
    break;
    case "gridOperacionCumbustible":
      generateGrid(
        "sql_operacion_combustible",
        "grd01OperacionCumbustible",
        {
          print:{state:0,funct:""},
          view:{state:1,funct:"modalViewDetailsCombustible"},
          edit:{state:0,funct:""},
          delet:{state:0,funct:""},
        },
        [              
          "Codigo",
          "Conductor",
          "Tipo",
          "Fecha",                       
          "Cantidad",
          "Total",
              ],"search01OperacionCumbustible",[
                "Codigo",
                "Conductor",
                "Tipo",
                "Fecha"
              ],1           
      );
    break;
    case "gridOperacionTarea":
      generateGrid(
        "sql_operacion_tarea",
        "grd01OperacionTarea",
        {
          print:{state:0,funct:""},
          view:{state:1,funct:"modalViewDetailsTareas"},
          edit:{state:0,funct:""},
          delet:{state:0,funct:""},
        },
        [ 
        "Codigo",
        "Nombre",
        "Tipo", 
        "Fecha",
        "Responsable",
        "Conductor"                                         
              ],"search01OperacionTarea",[
                "Codigo",
                "Fecha",
                "Conductor",
                "Responsable"
              ],null,1,1           
      );
    break;
    case "gridOperacionMantenimiento":
      generateGrid(
        "sql_operacion_mantenimiento",
        "grd01OperacionMantenimiento",
        {
          print:{state:0,funct:""},
          view:{state:0,funct:""},
          edit:{state:0,funct:""},
          delet:{state:0,funct:""},
        },
        [                                           
              ],"search01OperacionMantenimiento",[
                "Servicio",
                "Referencia",
                "Fecha Inicial",
                "Causa"
              ],1           
      );
    break;
    case "gridMantenimientoVehiculo":
      generateGrid(
        "sql_mantenimiento_vehiculo",
        "01_gridMantenimientoVehiculo",
        {
          print:{state:0,funct:""},
          view:{state:0,funct:""},
          edit:{state:0,funct:""},
          delet:{state:0,funct:""},
        },
        [                                           
              ],"01_searchMantenimientoVehiculo",[
                "Servicio",
                "Tipo",
                "Fecha Inicial",
                "Causa"
              ],vehicleGlobal           
      );
    break;
    case "gridGastosOperativosVehiculo":
      generateGrid(
        "sql_gastosOperativos_vehiculo",
        "01_gridGastoOperativo",
        {
          print:{state:0,funct:""},
          view:{state:1,funct:"modalViewDetailsOtrosGastos"},
          edit:{state:0,funct:""},
          delet:{state:0,funct:""},
        },
        [   "Codigo",
        "Descripcion de Gasto",
        "Fecha",
        "Precio Unitario",
        "Cantidad",
        "Total",                                        
              ],"01_searchGastoOperativo",[
                "Codigo",
                "Descripcion de Gasto",
                "Fecha"  
              ],vehicleGlobal       
      );
    break;
    case "gridTareaVehiculo":
      generateGrid(
        "sql_Tarea_vehiculo",
        "01_gridTareaVehiculo",
        {
          print:{state:0,funct:""},
          view:{state:0,funct:""},
          edit:{state:0,funct:""},
          delet:{state:0,funct:""},
        },
        [                                           
              ],"01_searchTareaVehiculo",[
                "Nombre",
                "Tipo",
                "Prioridad",
                "Responsable"
              ],vehicleGlobal           
      );
    break;
    case "gridCombustibleVehiculo":
        generateGrid(
          "sql_combustible_vehiculo",
          "01_gridCombustibleVehiculo",
          {
            print:{state:0,funct:""},
            view:{state:1,funct:"modalViewDetailsCombustible"},
            edit:{state:0,funct:""},
            delet:{state:0,funct:""},
          },
          [ 
          "Codigo",
          "Conductor",
          "Tipo",
          "Fecha",                       
          "Cantidad",
          "Total",                                         
                ],"01_searchCombustibleVehiculo",[
                  "Codigo",
                  "Conductor",
                  "Tipo",
                  "Fecha"
                ],vehicleGlobal           
        );
      break;
      case "gridVehiculo":
        generateGrid(
          "01_grid",
          "grd01FlotaVehiculo",
          {
            print:{state:0,funct:""},
            view:{state:1,funct:"ViewVehiculo"},
            edit:{state:0,funct:""},
            delet:{state:0,funct:""},
          },
          [ "Codigo",
          "Clase",
          "Condicion",                                         
                ],"search01FlotaVehiculo",[
                  "Codigo",
                  "Clase",
                  "Condicion"                  
                ]
        );
      break;
      case "gridConductor":
        generateGrid(
          "02_grid",
          "grd01Conductores",
          {
            print:{state:0,funct:""},
            view:{state:0,funct:""},
            edit:{state:0,funct:""},
            delet:{state:0,funct:""},
          },
          [
"N",
"Nombre",
"Apellidos",
"Dni",
"Edad",
"Telefono",
          ],"search01FlotaConductor",[
            "Nombre",
            "Apellidos",
            "Dni",
            "Telefono"
          ]
        );
      break;
     /* case "gridConductor":
        generateGrid(
          "02_grid",
          "grd01Conductores",
          {
            print:{state:0,funct:""},
            view:{state:0,funct:""},
            edit:{state:0,funct:""},
            delet:{state:0,funct:""},
          },
          [

          ],"search01FlotaConductor",[
            "Nombre",
            "Apellidos",
            "Estado",
            "Tipo Licencia"
          ]
        );
      break;   */
   
    default:
      break;
  }
}

function insert_registro_personas(){
  let datos = {
    TipoQuery : 'sql_get_last_requerimiento_personal'      
  };                
 appAjaxQuery(datos,rutaSQL).done(function(dat){   

//  console.log(dat.tabla.id)
 // let id=(new Date()).getTime();
  let id=Number(dat.tabla.id)+1;

  let Maindata=[    
    {title:"id",element:"",type:"text",status:0,value:"RQ-CM-P-2022-"+id},
    {title:"id_personal",element:"idsolicitanteHidden",type:"text",status:1,value:"val"},
    {title:"cargo",element:"txt_cargo_personas",type:"text",status:1,value:"val"},
    {title:"n_vacantes",element:"txt_n_vacantes_personas",type:"text",status:1,value:"val"},
    {title:"area",element:"personas_select_area",type:"text",status:0,value:"3"},
    {title:"contrato",element:"personas_select_contrato",type:"select",status:1,value:"selectVal"}, 
    {title:"id_motivo",element:"personas_select_motivo",type:"select",status:1,value:"selectVal"}, 
    {title:"lugar_trabajo",element:"personas_select_lugar",type:"select",status:1,value:"selectVal"}, 
    {title:"duracion_trabajo",element:"personas_select_duracion",type:"text",status:1,value:"val"},
    {title:"fecha_incorporacion",element:"txt_fecha_g_personas",type:"text",status:1,value:"val"},
    {title:"remuneracion",element:"personas_remuneracion",type:"text",status:1,value:"val"},
    {title:"observaciones",element:"table_observaciones_personas",type:"text",child:"observaciones_personas",content:"ComentarioParentPersonal",status:0,value:"manyinputs"},

    {title:"",element:"txt_search_solicitante",type:"text",status:0,value:"none"},
    {title:"",element:"txt_solicitante_nombres",type:"text",status:0,value:"none"},
    {title:"",element:"txt_solicitante_apellidos",type:"text",status:0,value:"none"},

    {title:"",element:"txt_solicitante_area",type:"text",status:0,value:"none"},
    {title:"",element:"txt_solicitante_cargo",type:"text",status:0,value:"none"}  
    

  ]
  if(validate(Maindata)){
    swal("Completa todos los campos", {
      icon: "error",
    });
  }else{
  
        let datos = {
          TipoQuery : '03_save_register_people',
          data:generateInsertData(Maindata)
        };        
        console.log(datos)
       appAjaxQuery(datos,rutaSQL).done(function(resp){   
                           
            ResetAndUpdateGrid(Maindata,updateGrid,"gridRequerimientoPersonalGrid");
            $('#table_observaciones_personas > tbody').empty();
            swal("Insertado correctamente", {
              icon: "success",
            });   
                           
        }); 
  }
}); 
   
}
function add_solicitudMantenimiento(){

  let datos = {
    TipoQuery : 'sql_get_last_requerimiento_mantenimiento'      
  };                
 appAjaxQuery(datos,rutaSQL).done(function(dat){   
  let id=Number(dat.tabla.id)+1;
  let Maindata=[    
    {title:"id",element:"",type:"text",status:0,value:"RQ-CM-M-2022-"+id},
    {title:"vehiculo",element:"txt_vehiculo_solicitud_mantenimiento",type:"text",status:1,value:"val"},
    {title:"asignado",element:"txt_solicitud_mantenimiento_dpt_asignado",type:"text",status:0,value:3},
    {title:"prioridad",element:"txt_solicitud_mantenimiento_prioridad",type:"select",status:1,value:"select"},
    {title:"tipo",element:"txt_solicitud_mantenimiento_tipo",type:"select",status:1,value:"selectVal"},
    {title:"fecha",element:"txt_solicitud_mantenimiento_fecha",type:"text",status:1,value:"val"},
    {title:"descripcion",element:"txt_solicitud_mantenimiento_descripcion",type:"text",status:1,value:"val"},

    {title:"comentario",element:"txt_solicitud_mantenimiento_comentario",type:"text",child:"ComentarioHijoSolicitudMantenimiento",content:"ComentarioParentSolicitudMantenimiento",status:0,value:"manyinputs"},

    {title:"",element:"txt_search_vehiculo_solicitud_mantenimiento",type:"text",status:0,value:"none"},
    {title:"",element:"txt_vehiculo_solicitud_mantenimiento_activo",type:"text",status:0,value:"none"},
    {title:"",element:"txt_vehiculo_solicitud_mantenimiento_descripcion",type:"text",status:0,value:"none"}
  ]
  if(validate(Maindata)){
    swal("Completa todos los campos", {
      icon: "error",
    });
  }else{
  
        let datos = {
          TipoQuery : '03_save_add_solicitud_mantenimiento',
          data:generateInsertData(Maindata)
        };        
        console.log(datos)
       appAjaxQuery(datos,rutaSQL).done(function(resp){   
                           
            ResetAndUpdateGrid(Maindata,updateGrid,"gridOperacionSolicitudMantenimiento");

            swal("Insertado correctamente", {
              icon: "success",
            });   
                           
        }); 
  }
}); 
}
function add_combustible(){
  let Maindata=[    
    {title:"vehiculo",element:"txt_tarea_vehiculo_comburtible",type:"text",status:1,value:"val"},
    {title:"conductor",element:"txt_vehiculo_combustible",type:"text",status:1,value:"val"},
    {title:"proveedor",element:"txt_combustible_proveedor_id",type:"text",status:1,value:"val"},
    {title:"tipo",element:"txt_combustible_tipo",type:"select",status:1,value:"select"},
    {title:"fecha",element:"txt_combustible_fecha",type:"text",status:1,value:"val"},
    {title:"hora",element:"txt_combustible_hora",type:"text",status:1,value:"val"}, 
    {title:"cantidad",element:"txt_combustible_cantidad",type:"text",status:1,value:"val"}, 
    {title:"precio",element:"txt_combustible_precio",type:"text",status:1,value:"val"}, 
    {title:"total",element:"txt_combustible_total",type:"text",status:1,value:"val"},

    {title:"",element:"txt_search_vehiculo_comburtible",type:"text",status:0,value:"none"},
    {title:"",element:"txt_tarea_vehiculo_comburtible",type:"text",status:0,value:"none"},
    {title:"",element:"txt_input_search_vehiculo_comburtibleactivo",type:"text",status:0,value:"none"},
    {title:"",element:"txt_input_search_vehiculo_comburtibledescripcion",type:"text",status:0,value:"none"},

    {title:"",element:"txt_search_vehiculo_ope",type:"text",status:0,value:"none"},
    {title:"",element:"txt_vehiculo_combustible",type:"text",status:0,value:"none"},
    {title:"",element:"txt_vehiculo_combustible_nombre",type:"text",status:0,value:"none"},
    {title:"",element:"txt_vehiculo_combustible_apellido",type:"text",status:0,value:"none"},

    {title:"",element:"txt_search_combustible_proveedor",type:"text",status:0,value:"none"},
    {title:"",element:"txt_combustible_proveedor_id",type:"text",status:0,value:"none"},
    {title:"",element:"txt_combustible_proveedor_nombre",type:"text",status:0,value:"none"},
    {title:"",element:"txt_combustible_proveedor_apellido",type:"text",status:0,value:"none"},
  ]
  if(validate(Maindata)){
    swal("Completa todos los campos", {
      icon: "error",
    });
  }else{
  
        let datos = {
          TipoQuery : '03_save_add_combustible',
          data:generateInsertData(Maindata)
        };        
        console.log(datos)
       appAjaxQuery(datos,rutaSQL).done(function(resp){   
                           
            ResetAndUpdateGrid(Maindata,updateGrid,"gridOperacionCumbustible");

            swal("Insertado correctamente", {
              icon: "success",
            });   
                           
        }); 
  }
}
function add_costosoperativos(){
  let Maindata=[    
    {title:"nombre",element:"txt_gastosoperarios_nombre",type:"text",status:1,value:"val"},
    {title:"tipo",element:"txt_gastosoperarios_tipo",type:"text",status:1,value:"val"},
    {title:"conductor",element:"txt_gastosoperarios_search_conductor_id",type:"text",status:1,value:"val"},
    {title:"vehiculo",element:"txt_gastosoperarios_search_vehiculo_id",type:"text",status:1,value:"val"},
    {title:"referencia",element:"txt_gastosoperarios_referencia",type:"text",status:1,value:"val"},
   // {title:"etiqueta",element:"txt_gastosoperarios_etiquetas",type:"text",status:0,value:"val"},

    {title:"fecha",element:"txt_gastosoperarios_fecha",type:"text",status:1,value:"val"},
    {title:"hora",element:"txt_gastosoperarios_hora",type:"text",status:1,value:"val"},

    {title:"cantidad",element:"txt_gastosoperarios_cantidad",type:"text",status:1,value:"val"},
    {title:"precio",element:"txt_gastosoperarios_precio",type:"text",status:1,value:"val"},

    {title:"total",element:"txt_gastosoperarios_total",type:"text",status:1,value:"val"},
  
    {title:"",element:"txt_gastosoperarios_search_vehiculo",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_gastosoperarios_search_activo",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_gastosoperarios_search_descripcion",type:"text",status:0,value:"none"},

      
    {title:"",element:"txt_gastosoperarios_search_conductor",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_gastosoperarios_search_conductor_id",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_gastosoperarios_conductor_search_activo",type:"text",status:0,value:"none"},
    {title:"",element:"txt_gastosoperarios_conductor_search_descripcion",type:"text",status:0,value:"none"}
  ]
  if(validate(Maindata)){
    swal("Completa todos los campos", {
      icon: "error",
    });
  }else{
  
        let datos = {
          TipoQuery : '03_save_add_gasto_operativo',
          data:generateInsertData(Maindata)
        };        
        console.log(datos)
       appAjaxQuery(datos,rutaSQL).done(function(resp){   
                           
            ResetAndUpdateGrid(Maindata,updateGrid,"gridOperacionCostosOperarios");

            swal("Insertado correctamente", {
              icon: "success",
            });   
                           
        }); 
  }
}
function add_mantenimiento(){
  let Maindata=[    
    {title:"servicio",element:"txt_mantenimiento_nombre",type:"text",status:1,value:"val"},
    {title:"tipo",element:"txt_mantenimiento_tipo",type:"select",status:1,value:"select"},
    {title:"referencia",element:"txt_mantenimiento_referencia",type:"text",status:1,value:"val"},
    {title:"fecha_ini",element:"txt_mantenimiento_fecha_inicio",type:"text",status:1,value:"val"},
    {title:"hora_ini",element:"txt_mantenimiento_hora_inicio",type:"text",status:1,value:"val"},
    {title:"fecha_fin",element:"txt_mantenimiento_fecha_entrega",type:"text",status:1,value:"val"},
    {title:"hora_fin",element:"txt_mantenimiento_hora_estimada",type:"text",status:1,value:"val"},
  //  {title:"etiqueda",element:"txt_mantenimiento_etiqueta",type:"text",status:1,value:"val"},
    {title:"causa",element:"txt_mantenimiento_causa",type:"text",status:1,value:"val"},
    {title:"ubicacion",element:"txt_mantenimiento_ubicacion",type:"text",status:1,value:"val"},
    {title:"conductor",element:"txt_vehiculo_combustible_conductor_id",type:"text",status:1,value:"val"},
    {title:"responsable",element:"txt_vehiculo_combustible_responsable_id",type:"text",status:1,value:"val"},
    {title:"orden",element:"txt_mantenimiento_orden",type:"text",status:1,value:"val"},
    {title:"vehiculo",element:"txt_vehiculo_combustible_id",type:"text",status:1,value:"val"},
    {title:"proveedor",element:"txt_vehiculo_combustible_proveedor_id",type:"text",status:1,value:"val"},
    {title:"comentario",element:"txt_combustible_comentario",type:"text",child:"ComentarioParentCombustible",content:"ComentarioHijoCombustible",status:0,value:"manyinputs"},

    {title:"",element:"txt_search_vehiculo_mantenimiento",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_vehiculo_combustible_activo",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_vehiculo_combustible_descripcion",type:"text",status:0,value:"none"}, 

    {title:"",element:"txt_vehiculo_combustible_conductor",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_vehiculo_combustible_conductor_nombre",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_vehiculo_combustible_conductor_apellido",type:"text",status:0,value:"none"}, 

    {title:"",element:"txt_vehiculo_combustible_responsable",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_vehiculo_combustible_responsable_nombre",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_vehiculo_combustible_responsable_apellido",type:"text",status:0,value:"none"}, 

    {title:"",element:"txt_vehiculo_combustible_proveedor",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_vehiculo_combustible_proveedor_nombre",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_vehiculo_combustible_proveedor_apellido",type:"text",status:0,value:"none"}
  ]
  if(validate(Maindata)){
    swal("Completa todos los campos", {
      icon: "error",
    });
  }else{
  
        let datos = {
          TipoQuery : '03_save_add_mantenimiento',
          data:generateInsertData(Maindata)
        };        
        console.log(datos)
       appAjaxQuery(datos,rutaSQL).done(function(resp){   
                           
            ResetAndUpdateGrid(Maindata,updateGrid,"gridOperacionCumbustible");

            swal("Insertado correctamente", {
              icon: "success",
            });   
                           
        }); 
  }
}
function add_tarea(){
  let Maindata=[    
    {title:"id",element:"",type:"text",status:0,value:(new Date()).getTime()},
    {title:"nombre",element:"txt_tarea_nombre",type:"text",status:1,value:"val"},
    {title:"tipo",element:"txt_tarea_tipo",type:"text",status:0,value:"val"},
    {title:"fecha_limite",element:"txt_tarea_fecha_limite",type:"text",status:0,value:"val"},
    {title:"prioridad",element:"txt_tarea_prioridad",type:"select",status:1,value:"select"},
    {title:"vehiculo",element:"txt_tarea_vehiculo_empleado",type:"text",status:1,value:"val"},
    {title:"Responsable",element:"txt_tarea_responsable",type:"text",status:1,value:"val"},
    {title:"Conductor",element:"txt_tarea_conductor",type:"text",status:1,value:"val"}, 

    {title:"",element:"txt_search_vehiculo",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_input_search_vehiculo_activo",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_input_search_vehiculo_descripcion",type:"text",status:0,value:"none"}, 

    {title:"",element:"txt_search_responsable",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_input_search_responsable_nombres",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_input_search_responsable_apellidos",type:"text",status:0,value:"none"}, 

    {title:"",element:"txt_search_conductor",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_input_search_conductor_nombres",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_input_search_conductor_apellidos",type:"text",status:0,value:"none"}, 

    {title:"comentario",element:"txt_tarea_comentario",child:"tareaComentarioHijo",type:"text",status:0,value:"manyinputs",content:"ComentarioParent"}   
  ]
  if(validate(Maindata)){
    swal("Completa todos los campos", {
      icon: "error",
    });
  }else{
  
        let datos = {
          TipoQuery : '03_save_add_tarea',
          data:generateInsertData(Maindata)
        };        
        console.log(datos)
       appAjaxQuery(datos,rutaSQL).done(function(resp){   
                           
            ResetAndUpdateGrid(Maindata,updateGrid,"gridOperacionTarea");

            swal("Insertado correctamente", {
              icon: "success",
            });   
                           
        }); 
  }
}
function add_conductor(){
  let Maindata=[    
    {title:"nombre",element:"txt_conductor_nombre",type:"text",status:1,value:"val"},
    {title:"apellidos",element:"txt_conductor_apellido",type:"text",status:1,value:"val"},
    {title:"fecha_ingreso",element:"txt_conductor_fecha_ingreso",type:"text",status:1,value:"val"},
    {title:"estado_conductor",element:"txt_conductor_estado",type:"text",status:1,value:"val"},
    {title:"empleado",element:"txt_conductor_n_empleado",type:"text",status:1,value:"val"},
    {title:"email",element:"txt_conductor_email",type:"text",status:1,value:"val"},
    {title:"telefono",element:"txt_conductor_telefono",type:"text",status:1,value:"val"},
    {title:"telefono_emer",element:"txt_conductor_telefono_emergencia",type:"text",status:1,value:"val"},
    {title:"ciudad",element:"txt_conductor_ciudad",type:"text",status:1,value:"val"},
    {title:"direccion",element:"txt_conductor_direccion",type:"text",status:1,value:"val"},
    {title:"fecha_nacimiento",element:"txt_conductor_fecha_nacimiento",type:"text",status:1,value:"val"},
    {title:"telepeaje",element:"txt_conductor_tarjeta",type:"text",status:1,value:"val"},
   // {title:"Etiqueta",element:"txt_conductor_etiqueta",type:"text",status:1,value:"val"},
    {title:"tipo_licencia",element:"txt_conductor_tipo_licencia",type:"text",status:1,value:"val"},
    {title:"num_licencia",element:"txt_conductor_n_licencia",type:"text",status:1,value:"val"},
    {title:"fecha_vencimiento",element:"txt_conductor_fecha_vencimiento",type:"text",status:1,value:"val"},
    {title:"grupo",element:"txt_conductor_grupo",type:"select",status:1,value:"select"},
    {title:"comentario",element:"txt_conductor_comentario",type:"text",status:1,value:"val"}
  ]
  console.log(Maindata)
  if(validate(Maindata)){
    swal("Completa todos los campos", {
      icon: "error",
    });
  }else{
  
        let datos = {
          TipoQuery : '03_save_add_conductor',
          data:generateInsertData(Maindata)
        };        
        console.log(datos)
       appAjaxQuery(datos,rutaSQL).done(function(resp){   
                           
            ResetAndUpdateGrid(Maindata);

            swal("Insertado correctamente", {
              icon: "success",
            });   
                           
        }); 
  }
}
function add_comentario_vehiculo(){
  let Maindata=[
    {title:"vehiculo",element:"",type:"text",status:0,value:vehicleGlobal},
    {title:"encargado",element:"",type:"text",status:0,value:encargadoGlobal},
    {title:"descripcion",element:"txt_comentario_add_comentario",type:"text",status:1,value:"val"}
  ]
  if(validate(Maindata)){
    swal("Completa todos los campos", {
      icon: "error",
    });
  }else{
  
        let datos = {
          TipoQuery : '03_save_add_vehiculo_comentario',
          data:generateInsertData(Maindata)
        };        
        console.log(datos)
       appAjaxQuery(datos,rutaSQL).done(function(resp){   
                 
            $('#ModalComentarioVehiculo').modal('hide');
            ResetAndUpdateGrid(Maindata,ViewVehiculo,vehicleGlobal
            );

            swal("Insertado correctamente", {
              icon: "success",
            });   
                           
        }); 
  }
}
function add_estado_vehiculo(){
  let Maindata=[
    {title:"vehiculo",element:"",type:"text",status:0,value:vehicleGlobal},
    {title:"motivo",element:"txt_estado_add_motivo",type:"text",status:1,value:"val"},
    {title:"estado",element:"txt_estado_add_estado",type:"text",status:0,value:"select"},
    {title:"encargado",element:"",type:"text",status:0,value:"1"}
  ]
  if(validate(Maindata)){
    swal("Completa todos los campos", {
      icon: "error",
    });
  }else{   
        let datos = {
          TipoQuery : '03_save_add_vehiculo_estado',
          data:generateInsertData(Maindata)
        };        
        console.log(datos)
       appAjaxQuery(datos,rutaSQL).done(function(resp){   
                 
            $('#ModalEstadosVehiculo').modal('hide');
            ResetAndUpdateGrid(Maindata,ViewVehiculo,vehicleGlobal
            );

            swal("Insertado correctamente", {
              icon: "success",
            });   
                          
        }); 

  }
}

function openModalGeneric(element){
  $('#'+element).modal('show')
  let datos = {
    TipoQuery : '03_get_last_odometro',
    id:vehicleGlobal
  };          
 appAjaxQuery(datos,rutaSQL).done(function(resp){ 
      console.log(resp)             
      $('#txt_asig_add_odometro').val(resp.table);              
  }); 
    
}

function add_asignacion_vehiculo(){
  let Maindata=[
    {title:"id",element:"",type:"text",status:0,value:(new Date()).getTime()},
    {title:"vehiculo",element:"",type:"text",status:0,value:vehicleGlobal},
    {title:"nombre",element:"txt_asi_add_nombre",type:"text",status:1,value:"val"},
    {title:"fecha_ini",element:"txt_asig_add_fecha_ini",type:"text",status:1,value:"val"},
    {title:"fecha_final",element:"txt_asig_add_fecha_fin",type:"text",status:1,value:"val"},
    {title:"hora_ini",element:"txt_asig_add_hora_ini",type:"text",status:1,value:"val"},
    {title:"hora_final",element:"txt_asig_add_hora_fin",type:"text",status:1,value:"val"},
    {title:"odometro",element:"txt_asig_add_odometro",type:"text",status:1,value:"val"},
    {title:"punto_partida",element:"txt_asig_add_punto_partida",type:"text",status:1,value:"val"},
    {title:"punto_carga",element:"txt_asig_add_punto_carga",type:"text",status:1,value:"val"},
    {title:"punto_decarga",element:"txt_asig_add_punto_decarga",type:"text",status:1,value:"val"},
    {title:"punto_retorno",element:"txt_asig_add_punto_retorno",type:"text",status:1,value:"val"},

    {title:"guia1",element:"txt_file_operaciones_asignaciones_guia1",type:"file",status:1,value:"file"},
    {title:"guia2",element:"txt_file_operaciones_asignaciones_guia2",type:"file",status:1,value:"file"},
    {title:"tipo",element:"txt_select_operaciones_asignaciones_tipo",type:"select",status:1,value:"select"},
    
    {title:"conductor",element:"txt_id_hidden_conductor_operaciones_asignaciones",type:"text",status:1,value:"val"},

    {title:"",element:"txt_search_conductor_nombres_operaciones_asignaciones",type:"text",status:0,value:"none"},
    {title:"",element:"txt_search_conductor_apellidos_operaciones_asignaciones",type:"text",status:0,value:"none"},
    {title:"",element:"txt_id_hidden_conductor_operaciones_asignaciones",type:"text",status:0,value:"none"},
    {title:"",element:"txt_search_conductor_operaciones_asignaciones",type:"text",status:0,value:"none"},

    {title:"comentario",element:"txt_tarea_comentario",child:"tareaComentarioHijo",type:"text",status:0,value:"manyinputs",content:"ComentarioParent"},  
    {title:"",element:"txt_search_responsable",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_input_search_responsable_nombres",type:"text",status:0,value:"none"}, 
    {title:"",element:"txt_input_search_responsable_apellidos",type:"text",status:0,value:"none"}, 
    {title:"Responsable",element:"txt_tarea_responsable",type:"text",status:1,value:"val"},
       {title:"descripcion",element:"txt_tarea_nombre",type:"text",status:1,value:"val"},
  ]
  if(validate(Maindata)){
    swal("Completa todos los campos", {
      icon: "error",
    });
  }else{
  
        let datos = {
          TipoQuery : '03_save_add_vehiculo_asignacion',
          data:generateInsertData(Maindata)
        };        
        console.log(datos)
       appAjaxQuery(datos,rutaSQL).done(function(resp){   
                 
            $('#ModalAsigacionesVehiculo').modal('hide');
            ResetAndUpdateGrid(Maindata,ViewVehiculo,vehicleGlobal
            );

            swal("Insertado correctamente", {
              icon: "success",
            });   
                           
        }); 
  }
}
function removeComentarios(id){
  swal({    
    text: "¿Deseas Eliminar?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $( "#"+id ).remove();        
    }
  });

}
function update_document_vehiculo(){

  let datos = {
    TipoQuery : "get_id_document_item",
    value:$("#txt_id_type_pdf_Ficha_Personal").val(),
    params:$("#txt_id_type").val(),
    data:{
      "fecha_emi":$("#txt_ficha_Personal_emi_modal").val(),
      "fecha_cadu":$("#txt_ficha_Personal_cadu_modal").val()
    }
  };  
  var table;   
  console.log(datos)
  appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp)
      $('#modal_FichaPersonal').modal('hide');
      //$("#txt_id_type_pdf_Ficha_Personal").val(resp.tabla1.id_personal)
      //$("#txt_id_name_pdf_ficha_personal").val(resp.tabla1.nombre); 
      //$("#txt_id_type").val(resp.tabla1.type); 
      //$('#modal_FichaPersonal').modal('show');
      swal("Insertado correctamente", {
        icon: "success",
      }); 
      updateGrid("gridDocumentoVehiculo");
      updateGrid("griddeDocumentos");
      
  } ); 
}

function resporte_gasto_operativo_total_resumen_vehicle_fixed(){
  
  $("#chart_gasto_operativo_total_resumen_vehicle").empty();
  var anio = $("#txt06_anio_gasto_operativo_total_resumen_vehicle").val();
  var mes = $("#cbo06_meses_gasto_operativo_total_resumen_vehicle").val();
  //var flota = $("#cbo06_Contenidos_gasto_operativo_total").val();
  //var equipo = $("#cbo06_Equipos_gasto_operativo_total").val();
   
  if($.trim(anio) === ''){
    alert("Ingrese año!!");
    return;
  }
  

  let datos; 
//todos meses, un equipo
if(mes==="-1"){
  datos = {
    TipoQuery : "06_getAll_gasto_operativo_total_all_by_vehicle_2",
    anio: anio,
   // clase: value,
    vehicle:vehicleGlobal
  }
//console.log(datos)
appAjaxQuery(datos,rutaSQL).done(function(data){
  generateSeriesGastoOperativo(data,["Combustible","Otros Gastos","Gasto Operativo"],"Gasto Operativo","chart_gasto_operativo_total_resumen_vehicle");    

});

return;
}

//un mes, un equipo

if(mes!="-1"){
  datos = {
    TipoQuery : "06_getAll_gasto_operativo_total_all_by_mes_and_vehicle_2",
    anio: anio,
   // clase: value,
    mes:mes,
    vehicle:vehicleGlobal
  }
//console.log(datos)
appAjaxQuery(datos,rutaSQL).done(function(data){
  generateSeriesGastoOperativo(data,["Combustible","Otros Gastos","Gasto Operativo"],"Gasto Operativo","chart_gasto_operativo_total_resumen_vehicle");    
});

return;
}


}
function resporte_gasto_operativo_total_resumen_fixed(){
  console.log("hola")
  
  $("#chart_gasto_operativo_total_resumen").empty();
  var anio = $("#txt06_anio_gasto_operativo_total_resumen").val();
  var mes = $("#cbo06_meses_gasto_operativo_total_resumen").val();
  //var flota = $("#cbo06_Contenidos_gasto_operativo_total").val();
  //var equipo = $("#cbo06_Equipos_gasto_operativo_total").val();
   
  if($.trim(anio) === ''){
    alert("Ingrese año!!");
    return;
  }
  

  let datos; 
  //todos meses, todos equipos
if(mes==="-1"){  
    datos = {
      TipoQuery : "06_getAll_gasto_operativo_total_all_2",
      anio: anio,
      //clase: value
    }

  appAjaxQuery(datos,rutaSQL).done(function(data){    
    generateSeriesGastoOperativo(data,["Combustible","Otros Gastos","Gasto Operativo"],"Gasto Operativo","chart_gasto_operativo_total_resumen");    
  });

  return;
}

//un mes, todos equipos
if(mes!="-1"){

  datos = {
    TipoQuery : "06_getAll_gasto_operativo_total_all_by_mes_2",
    anio: anio,
   // clase: value,
    mes:mes
   // vehicle:equipo
  }
console.log(datos)
appAjaxQuery(datos,rutaSQL).done(function(data){
  generateSeriesGastoOperativo(data,["Combustible","Otros Gastos","Gasto Operativo"],"Gasto Operativo","chart_gasto_operativo_total_resumen");    
});

return;
}


}
function update_document_vehiculo_file(){

  let datos = {
    TipoQuery : "get_id_update_document_file",
    value: $("#txt_file_vehiculo_update_file").val(),
    params: $("#txt_file_vehiculo_update_type").val(),
    data: {
      "file":$("#txt_name_file_update").val()
    }
    
  };  
  var table;   
  console.log(datos)
  appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp)
      $('#modal_updateFiles ').modal('hide');
      //$("#txt_id_type_pdf_Ficha_Personal").val(resp.tabla1.id_personal)
      //$("#txt_id_name_pdf_ficha_personal").val(resp.tabla1.nombre); 
      //$("#txt_id_type").val(resp.tabla1.type); 
      //$('#modal_FichaPersonal').modal('show');
      swal("Insertado correctamente", {
        icon: "success",
      }); 
      updateGrid("gridDocumentoVehiculo");
      
  } ); 
}
function showUpdateDataDocument(id,item){
  $('#modal_FichaPersonal').modal('show');
  $("#txt_id_type_pdf_Ficha_Personal").val(vehicleGlobal);
  $("#txt_id_type").val(item);
}
function showUpdateDataDocumentFiles(id,item){
  $('#modal_updateFiles').modal('show');
  $("#txt_file_vehiculo_update_file").val(vehicleGlobal);
  $("#txt_file_vehiculo_update_type").val(item);
}
function addComentario(element,classesParent,classesInput){
  $('#'+element+' > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='"+classesParent+"'><td><input type='text' class='form-control "+classesInput+"'/>"+
  "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500 py-2 px-2 text-white' onclick='removeComentarios("+(new Date()).getTime()+")'></button>"+
 // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
  "</div></td></tr>" )
}

function generateColumnsGrid(data,ope,Enabledcolumns,enabledID=1){
  let columns=[]
  let num=[
  "file1",
  "file2",
  "file3",
  "file4",
  "file5",
  "file6",
  "file7",
  "file8",
  "file9",
  "file10",
  "file11",
  "file12",
  "file13",
  "file14",
  "file15",
  "file16",
  "file17",
  "file18"]
  if(!Enabledcolumns.length){
    
    data.forEach((ele)=>{  
      console.log(ele.key)
      if(ele.icon==1 &&ele.popup==1){
        let findElemenet=num.find((it)=>it==ele.key)
  
        let val=findElemenet.substring(4)
        //console.log(val)
        columns.push({data:ele.key,title:ele.title,
      fnCreatedCell: function (nTd, sData,oData,iCol) { 
        console.log(oData)
         if(sData==="0") {   
                                
          $(nTd).html('<span class="badge"style="background:#343a40" onClick="showUpdateDataDocument('+oData.id+','+val+')">&nbsp;</span>');
          
        }else if(sData==="1") {            
          $(nTd).html('<span class="badge"style="background:#28a745">&nbsp;</span>');
        
        }  
          else if(sData==="2") {                    
            $(nTd).html('<span class="badge"style="background:#ffc107" onClick="showUpdateDataDocumentFiles('+oData.id+','+val+')">&nbsp;</span>');
        }  
          else{          
            $(nTd).html('<span class="badge"style="background:#dc3545" onClick="showUpdateDataDocumentFiles('+oData.id+','+val+')">&nbsp;</span>');                 
        }          
      }})
      }else if(ele.icon==1 &&ele.popup==0){
        let findElemenet=num.find((it)=>it==ele.key)
  
        let val=findElemenet.substring(4)
        //console.log(val)
        columns.push({data:ele.key,title:ele.title,
      fnCreatedCell: function (nTd, sData,oData,iCol) { 

         if(sData==="0") {   
                                
          $(nTd).html('<span class="badge"style="background:#343a40" >&nbsp;</span>');
          
        }else if(sData==="1") {            
          $(nTd).html('<span class="badge"style="background:#28a745">&nbsp;</span>');
        
        }  
          else if(sData==="2") {                    
            $(nTd).html('<span class="badge"style="background:#ffc107">&nbsp;</span>');
        }  
          else{          
            $(nTd).html('<span class="badge"style="background:#dc3545">&nbsp;</span>');                 
        }          
      }})
      }  else{
        columns.push({data:ele.key,title:ele.title})
      }       
    })
  }else{
    data.forEach((ele)=>{
      //let val=Enabledcolumns.find("ID");
      if(Enabledcolumns.findIndex((it)=>it==ele.title)!=-1){
        console.log(ele.icon)
        if(ele.icon==1 &&ele.popup==1){
          let findElemenet=num.find((it)=>it==ele.key)
    
          let val=findElemenet.substring(4)
          //console.log(val)
          columns.push({data:ele.key,title:ele.title,
        fnCreatedCell: function (nTd, sData,oData,iCol) { 
          console.log(oData)
           if(sData==="0") {   
                                  
            $(nTd).html('<span class="badge"style="background:#343a40" onClick="showUpdateDataDocument('+oData.id+','+val+')">&nbsp;</span>');
            
          }else if(sData==="1") {            
            $(nTd).html('<span class="badge"style="background:#28a745">&nbsp;</span>');
          
          }  
            else if(sData==="2") {                    
              $(nTd).html('<span class="badge"style="background:#ffc107" onClick="showUpdateDataDocumentFiles('+oData.id+','+val+')">&nbsp;</span>');
          }  
            else{          
              $(nTd).html('<span class="badge"style="background:#dc3545" onClick="showUpdateDataDocumentFiles('+oData.id+','+val+')">&nbsp;</span>');                 
          }          
        }})
        }else if(ele.icon==1 &&ele.popup==0){
          let findElemenet=num.find((it)=>it==ele.key)
    
          let val=findElemenet.substring(4)
          //console.log(val)
          columns.push({data:ele.key,title:ele.title,
        fnCreatedCell: function (nTd, sData,oData,iCol) { 
  
           if(sData==="0") {   
                                  
            $(nTd).html('<span class="badge"style="background:#343a40" >&nbsp;</span>');
            
          }else if(sData==="1") {            
            $(nTd).html('<span class="badge"style="background:#28a745">&nbsp;</span>');
          
          }  
            else if(sData==="2") {                    
              $(nTd).html('<span class="badge"style="background:#ffc107">&nbsp;</span>');
          }  
            else{          
              $(nTd).html('<span class="badge"style="background:#dc3545">&nbsp;</span>');                 
          }          
        }})
        } else{
          columns.push({data:ele.key,title:ele.title})
        }
        
      }    
    })
  }
  columns.push({data:'id',title:'',
  fnCreatedCell: function (nTd, sData, oData, iRow, iCol) { 
console.log(sData)
    let dd=sData.toString()

    let contentOpe="";

        contentOpe+=ope.print.state?'<button class="fa fa-print bg-emerald-500 py-2 px-2 text-white"'+
                                    'onclick='+ope.print.funct+'("'+dd+'"); type="button"></button>':''
        contentOpe+=ope.view.state?'<button class="fa fa-eye bg-cyan-500 py-2 px-2 text-white"'+
                                    'onclick='+ope.view.funct+'("'+dd+'"); type="button"></button>':''
        contentOpe+=ope.edit.state?'<button class="fa fa-pencil bg-cyan-500 py-2 px-2 text-white"'+
                                    'onclick='+ope.edit.funct+'("'+dd+'"); type="button"></button>':''
        contentOpe+=ope.delet.state?'<button class="fa fa-trash bg-rose-500 py-2 px-2 text-white"'+
                                    'onclick='+ope.delet.funct+'("'+dd+'"); type="button"></button>':''

        $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;">'+contentOpe+'</div>');
    
  }})

  console.log(columns)


  return columns
}

function ModalViewAsignacionVehiculo(id){
    //console.log(id)
    let datos = {
      TipoQuery : 'sql_get_asignacion_vehiculo_by_id',
      data:id
    };  
    var table;   
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp)       
      $('#txt_ModalViewAsignacionVehiculo_fecha_ini').val(resp.data[0].fecha_ini)
      $('#txt_ModalViewAsignacionVehiculo_hora_ini').val(resp.data[0].hora_ini)

      $('#txt_ModalViewAsignacionVehiculo_fecha_final').val(resp.data[0].fecha_final)
      $('#txt_ModalViewAsignacionVehiculo_hora_final').val(resp.data[0].hora_final)

      $('#txt_ModalViewAsignacionVehiculo_odometro').val(resp.data[0].odometro)

      $('#txt_ModalViewAsignacionVehiculo_punto_partida').val(resp.data[0].punto_partida)
      $('#txt_ModalViewAsignacionVehiculo_punto_carga').val(resp.data[0].punto_carga)
      $('#txt_ModalViewAsignacionVehiculo_punto_decarga').val(resp.data[0].punto_decarga)
      $('#txt_ModalViewAsignacionVehiculo_punto_retorno').val(resp.data[0].punto_retorno)

      $('#txt_ModalViewAsignacionVehiculo_nombre').val(resp.data[0].nombre)
      $('#txt_ModalViewAsignacionVehiculo_tipo').val(resp.data[0].tipo)

      $('#txt_ModalViewAsignacionVehiculo_descripcion_tarea').val(resp.data[0].descripcion_tarea)

      $('#txt_ModalViewAsignacionVehiculo_activo_vehiculo').val(resp.data[0].activo_vehiculo)
      $('#txt_ModalViewAsignacionVehiculo_descripcion_vehiculo').val(resp.data[0].descripcion_vehiculo)

      $('#txt_ModalViewAsignacionVehiculo_nombres_conductor').val(resp.data[0].nombres_conductor)

      $('#txt_ModalViewAsignacionVehiculo_nombres_responsable').val(resp.data[0].nombres_responsable)
     
      
      $("#txt_ModalViewAsignacionVehiculo_table > tbody").empty()
      resp.data.forEach((it,index)=>{
        $("#txt_ModalViewAsignacionVehiculo_table > tbody").append("<tr>"+
        "<td>"+(++index)+"</td>"+
        "<td>"+it.asignacion_comentario+"</td>"+    
        "</tr>")
      })
      $('#ModalViewAsignacionVehiculo').modal('show');   
  
   } );   

}
function addObservacionespersonas(){
  $('#table_observaciones_personas > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='class_add_observaciones_personas'><td><input type='text' class='form-control observaciones_personas'/>"+
  "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500  py-2 px-2 text-white' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
 // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
  "</div></td></tr>" )
}
function removeChildFormPasajeros(id){
  swal({    
    text: "¿Deseas Eliminar?",
    icon: "warning",
    buttons: true,
   // dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $( "#"+id ).remove();        
    }
  });

}
function UtilLoadSelect(sql,component){
  let datos = {
    TipoQuery : sql,
    data:{
        param:''
    }   
  };      
  appAjaxQuery(datos,rutaSQL).done(function(resp){   
  console.log(resp)
  $.each(resp, function(i, item) {
    $('#'+component).append($("<option>", {
        value: item.id,
        text: item.descripcion,    
    }));
  });
});

}
function searchParent(IdparentSearch,dataColumnsEnabled,allCols){   
  let elements="";
  allCols.forEach((ele,idx)=>{
    if(dataColumnsEnabled.findIndex((it)=>it==ele.title)!=-1){
      elements+='<span class="input-group-addon" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"></i></span>'+
      '<input id="'+idx+'" type="text" class="form-control" placeholder="Buscar por '+ele.title+'" />'
    }      
  })
  
  $("#"+IdparentSearch).html(elements);
}

/*
function app01GridAll(){
  $("#datos03").hide();
  $("#datos02").show();

  let datos = {
    TipoQuery : '01_grid'
  };
  var table;
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      console.log(resp);
     table= $('#grd01FlotaVehiculo').DataTable( {
        "sPaginationType": "simple",
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
        },
        data: resp.tabla,        
        columns: 
        [
            { data: "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                if(oData.id) {
                    $(nTd).html('<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(oData.id))+');" ><i class="fa fa-eye"></i></button>');
                }
              }
            },
            { data: "id"},
            { data: "nombre" },
            { data: "placa" },
            { data: "serie" },
            { data: "estado" },
            { data: "tipo" },
            { data: "grupo" },
            { data: "conductor_asignado" },
            { data: "odometro" },
            { data: "marca" },
            { data: "modelo" },
            { data: "anio" },
            { data: "propiedad" },
            { data: "arrendamiento_inicio" },
            { data: "arrendamiento_fin" },
            { data: "arrendamiento_total" }
        ]
    } );               
    }
  });
}*/
function ViewVehicleDetalle(){
  $("#detalleVehiculo").hide();
  $("#contentVehiculos").show();

}
function ViewVehiculo(id){
  vehicleGlobal=id

  $("#detalleVehiculo").show();
  $("#contentVehiculos").hide();

  console.log(vehicleGlobal)
  console.log(encargadoGlobal)
 // managementGraphsReport("sql_mantenimiento_report_by_id", "mantenimientoVehiculo","VehiculoTablesMantenimientoMensual");
 // managementGraphsReport("sql_mantenimiento_report_by_id", "mantenimientoVehiculo","VehiculoTablesMantenimientoAnual",365);

  //managementGraphsReport("sql_costoOperacional_report_by_id_vehiculo", "costoOperacionaVehiculo","VehiculoTablesGastoOperativoMensual");
 // managementGraphsReport("sql_costoOperacional_report_by_id_vehiculo", "costoOperacionaVehiculo","VehiculoTablesGastoOperativoAnual",365);

  console.log(id)
  FlotaVehiculoOdometro(id);
  FlotaVehiculoAsignaciones(id);
  FlotaVehiculoEstados(id);
  FlotaComentario(id);
  LoadData(id);

  
   updateGrid("gridDocumentoVehiculo");
   updateGrid("gridTareaVehiculo");
   updateGrid("gridCombustibleVehiculo");
   //updateGrid("gridMantenimientoVehiculo");
   updateGrid("gridGastosOperativosVehiculo");
   resporte_gasto_operativo_total_resumen_vehicle_fixed();
  //VehiculoTablesCombustibleAnual
  //VehiculoTablesCombustibleMensual
    //VehiculoTablesGastoOperativoAnual
  //VehiculoTablesGastoOperativoMensual

  //VehiculoTablesGastoOperativo
  //managenementGraphs("sql_combustible_by_all", "combustibleAll", "resumencombustibleGraphMensual");
  //managenementGraphs("sql_combustible_by_all", "combustibleAll", "resumencombustibleGraphAnual", 365);
}
function LoadSeguro(data){

 let parent=$("#content-seguro-vehiculo");

 let content="";
 console.log(data)
data.forEach((ele)=>{
  content+=
  '<div class="row">'+
  '<div class="col-md-11">'+
  '    <div class="panel-body">'+
  '        <p><b>Seguro</b></p>'+
  '    </div>'+
  '</div>'+
  '<div class="col-md-1">  '+
  '    <div class="panel-body">'+
  '        <a style="color:gray" href=""'+
  '            data-toggle="modal"'+
  '            data-target=".seguroEdit"> <i'+
  '                class="fa fa-pencil"></i> </a>'+
  '    </div>'+
  '</div>'+
  '<div class="col-md-6">'+
  '    <div class="panel-body">'+
  '        <div class="table-responsive">'+
  '            <table class="table">'+
  '                <tr>'+
  '                    <th>Proveedor</th>'+
  '                    <td><span id="seg_proveedor">'+ele.proveedor+'</span>'+
  '                    </td>'+
  '                </tr>'+
  '                <tr>'+
  '                    <th>Fecha de inicio</th>'+
  '                    <td><span id="seg_fechaIni">'+ele.fecha_inicio+'</span>'+
  '                    </td>'+
  '                </tr>'+
  '                <tr>'+
  '                    <th>Total</th>'+
  '                    <td><span id="seg_total">'+ele.total+'</span>'+
  '                    </td>'+
  '                </tr>'+

  '            </table>'+
  '        </div>'+
  '    </div>'+
  '</div>'+
  '<div class="col-md-6">'+
  '    <div class="panel-body">'+
  '        <div class="table-responsive">'+
  '            <table class="table">'+
   '               <tr>'+
  '                    <th>Referencia</th>'+
  '                    <td><span id="seg_refe">'+ele.Referencia+'</span></td>'+
  '                </tr>'+
  '                <tr>'+
  '                    <th>Fecha de vencimiento</th>'+
  '                    <td><span id="seg_fechaVen">'+ele.fecha_vencimiento+'</span>'+
  '                    </td>'+
  '                </tr>'+
  '                <tr>'+
  '                    <th>Documentos</th>'+
  '                    <td><span id="seg_docs">'+ele.documentos+'</span></td>'+
  '                </tr>'+

  '            </table>'+
  '        </div>'+
  '    </div>'+
  '</div>'+
'</div>';


})
console.log(content)
parent.append(content);
}

function LoadData(id){
  let datos = {
    TipoQuery : "01_getMainData",
    QueryDelete: "delete_Odometro",
    value:id
  }
  /*let Maindata=[
    {title:"vehiculo",element:"view_descripcion",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"view_placa",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"view_odometro",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"view_estado",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"view_marca",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"view_conductor",type:"text",status:1,value:"text"},

    {title:"vehiculo",element:"det_nombre",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"det_estado",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"det_propiedad",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"det_grupo",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"det_serie",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"det_tipo",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"det_anio",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"det_marca",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"det_modelo",type:"text",status:1,value:"text"},

    {title:"vehiculo",element:"det_cuerpo",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"det_version",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"det_color",type:"text",status:1,value:"text"},

    {title:"vehiculo",element:"com_capacidad_tanque01",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"com_tipo_tanque01",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"com_rendimiento_tanque01",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"com_capacidad_tanque02",type:"text",status:1,value:"text"},

    {title:"vehiculo",element:"pro_proveedor",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"pro_fecha_compra",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"pro_precio",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"pro_fecha_garan",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"pro_notas",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"pro_documentos",type:"text",status:1,value:"text"},

    {title:"vehiculo",element:"dist_ejes",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"anc_eje_frontal",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"sis_frenado1",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"dia_neumaticos_tras",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"tipo_neumaticos_tras",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"tipo_neumaticos_delant",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"sis_frenado",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"dia_neumaticos_tras",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"anc_eje_trasero",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"dia_neumaticos_delant",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"eje_posterior",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"psi_neumaticos_delanteros",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"psi_neumaticos_traseros",type:"text",status:1,value:"text"},
    {title:"vehiculo",element:"sis_frenado2",type:"text",status:1,value:"text"}

  ]*/
  //ResetAndUpdateGrid(Maindata);
  $("#content-seguro-vehiculo").empty();
  
  $("#view_descripcion").text("")
  $("#view_placa").text("")
  $("#view_odometro").text("")
  $("#view_estado").text("")
  $("#view_marca").text("")
  $("#view_conductor").text("") 


  $("#det_categoria").text("")
  $("#det_activo").text("")
  $("#det_descripcion").text("")
  $("#det_marca").text("")
  $("#det_modelo").text("")
  $("#det_anio").text("")
  $("#det_odometro").text("")
  $("#det_propiedad").text("")
  $("#det_propietario").text("")
  $("#det_serie").text("")
  $("#det_motor").text("")
  $("#det_transmision").text("")
  $("#com_tipo").text("")
  $("#com_proveedor").text("")
  $("#com_fecha").text("")
  $("#com_cantidad").text("")
  
  $("#com_total").text("")
 
  $("#pro_proveedor").text("")
  $("#pro_fecha_compra").text("")
  $("#pro_precio").text("")
  $("#pro_fecha_garan").text("")
  $("#pro_notas").text("")
  $("#pro_documentos").text("")

  appAjaxQuery(datos,rutaSQL).done(function(resp){


    console.log(resp)

    $("#view_descripcion").text(resp.tabla1.codigo)
    $("#view_placa").text(resp.tabla1.placa)
    $("#view_odometro").text(resp.tabla4.odometro+" km")
    $("#view_estado").text(resp.tabla3.estado)
    $("#view_marca").text(resp.tabla1.marca)
    $("#view_conductor").text(resp.tabla2.nombres) 


    $("#det_categoria").text(resp.tabla1.id)
    $("#det_activo").text(resp.tabla1.codigo)
    $("#det_serie").text(resp.tabla1.serie)

    $("#det_descripcion").text(resp.tabla1.parte)
    $("#det_marca").text(resp.tabla1.clase)
    $("#det_modelo").text(resp.tabla1.grupo)

    $("#det_anio").text(resp.tabla1.condicion)
    $("#det_odometro").text(resp.tabla1.inicio_garantia)
    $("#det_propiedad").text(resp.tabla1.fin_garantia)
   

    $("#det_motor").text(resp.tabla1.fecha_adquisicion)
    $("#det_transmision").text(resp.tabla1.color)
    
    
    LoadSeguro(resp.tabla5)

    $("#com_tipo").text(resp.tabla6.tipo)
    $("#com_proveedor").text(resp.tabla6.proveedor)
    $("#com_fecha").text(resp.tabla6.fecha)
    $("#com_cantidad").text(resp.tabla6.cantidad)
    

    $("#com_total").text(resp.tabla6.total)
   
    
    $("#pro_proveedor").text(resp.tabla7.proveedor)
    $("#pro_fecha_compra").text(resp.tabla7.fecha_compra)
    $("#pro_precio").text(resp.tabla7.precio)
    $("#pro_fecha_garan").text(resp.tabla7.fecha_garantia)
    $("#pro_notas").text(resp.tabla7.notas)
    $("#pro_documentos").text(resp.tabla7.documentos)

    /*$("#dist_ejes").text(resp.tabla8.dist_ejes)
    $("#anc_eje_frontal").text(resp.tabla8.anc_eje_frontal)
    $("#sis_frenado1").text(resp.tabla8.sis_frenado1)
    $("#dia_neumaticos_tras").text(resp.tabla8.dia_neumaticos_tras)
    $("#tipo_neumaticos_tras").text(resp.tabla8.tipo_neumaticos_tras)
    $("#tipo_neumaticos_delant").text(resp.tabla8.tipo_neumaticos_delant)
    $("#sis_frenado").text(resp.tabla8.sis_frenado)
    $("#anc_eje_trasero").text(resp.tabla8.anc_eje_trasero)
    $("#dia_neumaticos_delant").text(resp.tabla8.dia_neumaticos_delant)
    $("#eje_posterior").text(resp.tabla8.eje_posterior)
    $("#psi_neumaticos_delanteros").text(resp.tabla8.psi_neumaticos_delanteros)
    $("#psi_neumaticos_traseros").text(resp.tabla8.psi_neumaticos_traseros)
    $("#sis_frenado2").text(resp.tabla8.sis_frenado2)*/
    

    chargeTableFlotaIntoVehicle(resp.tabla11,"table_tipo_sistema_11");
    chargeTableFlotaIntoVehicle(resp.tabla12,"table_tipo_sistema_12");
    chargeTableFlotaIntoVehicle(resp.tabla13,"table_tipo_sistema_13");
    chargeTableFlotaIntoVehicle(resp.tabla14,"table_tipo_sistema_14");
    chargeTableFlotaIntoVehicle(resp.tabla15,"table_tipo_sistema_15");
    chargeTableFlotaIntoVehicle(resp.tabla16,"table_tipo_sistema_16");
    chargeTableFlotaIntoVehicle(resp.tabla17,"table_tipo_sistema_17");

  });
}
function chargeTableFlotaIntoVehicle(data,table){
  $("#"+ table+"> tbody").empty();
  data.forEach((it,index)=>{
    $("#"+ table+"> tbody").append(
    '<tr>'+
    '<td>'+it.active+'</td>'+
    '<td>'+it.clase+'</td>'+
    '<td>'+it.grupo+'</td>'+     
    '<td>'+it.condicion+'</td>'+    
    '<td>'+it.fecha_adquisicion+'</td>'+    
    '<td>'+it.fin_garantia+'</td>'+    
    '</tr>')
  })

}
function ComentarioRowStyling(nombres,fecha,descripcion){
  let element='<div style="display:flex;gap:1rem;align-items:center">'+
    '<i class="fa fa-user fa-3x" style="color:#c8c8c8"></i>'+
    '<div style="display:flex; justify-content:space-between;width:100%">'+
      '<div style="display:flex;flex-direction:column;">'+
      '<div style="display:flex;flex-direction:row;gap:1rem;">'+
        '<span style="font-weight:700;color:#337ab7;font-size:1.4rem">'+nombres+'</span>'  +  
        '<span style="color:#c8c8c8;font-size:1.4rem">'+fecha+'</span>'+ 
        '</div>'+
        '<div><span style="color:#c8c8c8;font-size:1.4rem">'+descripcion+'</span></div>'+      
      '</div>'+    
    '</div>'+ 
  '</div>';
  
  return element;
}
function EstadoRowStyling(nombres,fecha,hora,motivo,estado){
  let element='<div style="display:flex;gap:1rem;align-items:center">'+
    '<i class="fa fa-stop-circle-o fa-3x" style="color:#c8c8c8"></i>'+
    '<div style="display:flex; justify-content:space-between;width:100%">'+
      '<div style="display:flex;flex-direction:column">'+
        '<div><span style="font-weight:700;color:#337ab7;font-size:1.4rem">'+nombres+'</span> cambio el estado a: </span></div>'  +  
        '<span style="color:#c8c8c8;font-size:1.4rem">'+fecha+'</span>'+ 
        '<div><span style="font-weight:700;color:#aaa;font-size:1.4rem">Motivo: </span><span style="color:#c8c8c8;font-size:1.4rem">'+motivo+'</span></div>'+      

      '</div>'+  
    '<div style="display:flex;flex-direction:row;align-items:center;gap:1rem;">'+
      '<i class="fa fa-stop-circle-o fa-x" style="color:#c8c8c8"></i><span style="color:#c8c8c8;font-size:1.4rem">'+estado+'</span>'+      
    '</div>'+
    '</div>'+ 
  '</div>';
  
  return element;
}
function AsignacionRowStyling(id,nombres,fecha_ini,fecha_final,hora_ini,hora_final,odometro){
 
  let element='<div style="display:flex;gap:1rem;align-items:center">'+
    '<i class="fa fa-id-card-o fa-3x" style="color:#c8c8c8"></i>'+
    '<div style="width: 100%;">'+
    '<div style="display:flex;flex-direction:column">'+
      '<span style="font-weight:700;color:#337ab7;font-size:1.4rem">'+nombres+'</span>'+      
    '</div>'+
    '<div style="display:flex;justify-content:space-between">'+
      '<div>'+
        '<span style="font-weight:700;color:#aaa;font-size:1.4rem"> Inicio: </span><span style="color:#c8c8c8;font-size:1.4rem"> '+fecha_ini+' - '+hora_ini+'</span>'+      
        '<span style="display:block;color:#c8c8c8;font-size:1.4rem">'+odometro+' km</span>'+      
      '</div>'+
      '<div>'+    
      '<span style="font-weight:700;color:#aaa;font-size:1.4rem"> Fin: </span><span style=";padding-right:5px;color:#c8c8c8;font-size:1.4rem"> '+fecha_final+' - '+hora_final+'</span>'+   
      '<button class="fa fa-eye bg-cyan-500 py-2 px-2 text-white"'+
      'onclick=ModalViewAsignacionVehiculo("'+id+'"); type="button"></button>'+              
      '</div>'+
    '</div>'+   
    '<div>'+
  '</div>';
 /* let element='<div style="display:flex;gap:1rem;align-items:center">'+
    '<i class="fa fa-id-card-o fa-3x" style="color:#c8c8c8"></i>'+
    '<div style="width: 100%;">'+
    '<div style="display:flex;flex-direction:column">'+
      '<span style="font-weight:700;color:#337ab7;font-size:1.4rem">'+nombres+'</span>'+      
    '</div>'+
    '<div style="display:flex;justify-content:space-between">'+
      '<div>'+
        '<span style="font-weight:700;color:#aaa;font-size:1.4rem"> Inicio: </span><span style="color:#c8c8c8;font-size:1.4rem"> '+fecha_ini+'</span>'+      
        '<span style="display:block;color:#c8c8c8;font-size:1.4rem">'+odometro+' km</span>'+      
      '</div>'+      
    '</div>'+    
    '<div>'+
  '</div>';*/
  return element;
}
function OdometroRowStyling(odometro,fecha){
  console.log(fecha)
  let element='<div style="display:flex;gap:1rem;align-items:center">'+
    '<i class="fa fa-tachometer fa-3x" style="color:#c8c8c8"></i>'+
    '<div style="display:flex;flex-direction:column">'+
      '<span style="font-weight:700;color:#337ab7;font-size:1.4rem">'+odometro+' km</span>'+
      '<span style="font-size:1.2rem;color:#c8c8c8">'+fecha+'</span>'+
    '</div>'+
  '</div>';
  
  return element;
}
function add_document(){
  let Maindata=[
    {title:"vehiculo",element:"txt_search_documento_vehiculo_id",type:"text",status:1,value:"val"},
    {title:"file1",element:"doc_vehiculo_1",type:"file",status:1,value:"file"},
    {title:"file2",element:"doc_vehiculo_2",type:"file",status:1,value:"file"},
    {title:"file3",element:"doc_vehiculo_3",type:"file",status:1,value:"file"},
    {title:"file4",element:"doc_vehiculo_4",type:"file",status:1,value:"file"},
    {title:"file5",element:"doc_vehiculo_5",type:"file",status:1,value:"file"},
    {title:"file6",element:"doc_vehiculo_6",type:"file",status:1,value:"file"},
    {title:"file7",element:"doc_vehiculo_7",type:"file",status:1,value:"file"},
    {title:"file8",element:"doc_vehiculo_8",type:"file",status:1,value:"file"},
    {title:"file9",element:"doc_vehiculo_9",type:"file",status:1,value:"file"},
    {title:"file10",element:"doc_vehiculo_10",type:"file",status:1,value:"file"},
    {title:"file11",element:"doc_vehiculo_11",type:"file",status:1,value:"file"},
    {title:"file12",element:"doc_vehiculo_12",type:"file",status:1,value:"file"},
    {title:"file13",element:"doc_vehiculo_13",type:"file",status:1,value:"file"},
    {title:"file14",element:"doc_vehiculo_14",type:"file",status:1,value:"file"},
    {title:"file15",element:"doc_vehiculo_15",type:"file",status:1,value:"file"},
    {title:"file16",element:"doc_vehiculo_16",type:"file",status:1,value:"file"},
    {title:"file17",element:"doc_vehiculo_17",type:"file",status:1,value:"file"},
    {title:"file18",element:"doc_vehiculo_18",type:"file",status:1,value:"file"},
    
    {title:"",element:"txt_search_documentos_vehiculo",type:"text",status:0,value:"none"},
    {title:"",element:"txt_search_documento_vehiculo_id",type:"text",status:0,value:"none"},
    {title:"",element:"txt_search_vehiculo_documento_activo",type:"text",status:0,value:"none"},
    {title:"",element:"txt_search_vehiculo_documento_descripcion",type:"text",status:0,value:"none"},
  ]
  if(validate(Maindata)){
    swal("Completa todos los campos", {
      icon: "error",
    });
  }else{
  
        let datos = {
          TipoQuery : '03_save_add_vehiculo_documento',
          data:generateInsertData(Maindata)
        };        
        console.log(datos)
       appAjaxQuery(datos,rutaSQL).done(function(resp){   
                 
            $('#documentosVehiculoNuevo').modal('hide');          
            ResetAndUpdateGrid(Maindata,updateGrid,"griddeDocumentos"
            );

            swal("Insertado correctamente", {
              icon: "success",
            });   
                           
        }); 
  }
}
function add_odometro(){
  let Maindata=[
    {title:"vehiculo",element:"",type:"text",status:0,value:vehicleGlobal},
    {title:"status",element:"",type:"text",status:0,value:"1"},
    {title:"type",element:"",type:"text",status:0,value:"manual"},
    //{title:"fecha",element:"txt_odo_add_fecha",type:"text",status:0,value:"val"},
   // {title:"hora",element:"txt_odo_add_hora",type:"text",status:0,value:"val"},
    {title:"odometro",element:"txt_odo_add_odometro",type:"text",status:1,value:"val"}
  ]
  if(validate(Maindata)){
    swal("Completa todos los campos", {
      icon: "error",
    });
  }else{
    let datos = {
      TipoQuery : '03_check_odometro',
      id:vehicleGlobal
    }; 
    appAjaxQuery(datos,rutaSQL).done(function(resp){   
      if(resp.tabla.length && validateOdometro(resp.tabla[0],$("#txt_odo_add_odometro").val())){   

       swal("El odometro no puede ser inferior al ultimo ingresado", {
        icon: "error",
      });
    
      }else{
        let datos = {
          TipoQuery : '03_save_add_vehiculo_odometro',
          data:generateInsertData(Maindata)
        };      
        

        appAjaxQuery(datos,rutaSQL).done(function(resp){   
                  
              $('#ModalOdometro').modal('hide');
              ResetAndUpdateGrid(Maindata,ViewVehiculo,vehicleGlobal
              );

              swal("Insertado correctamente", {
                icon: "success",
              });   
                            
          }); 
      }
    }); 
    
  }
}
function validateOdometro(last,curret){//TIENE QUE RETORNA T si 
  return Number(last)<Number(curret)?false:true
}
function generateInsertData(data){
  let returnData={}
  data.forEach((it)=>{
    switch(it.value){
      case "val":
        returnData[it.title]=$("#"+it.element).val().trim();
      break;
      case "text":
        returnData[it.title]=$("#"+it.element).text().trim();
      break;
      case "file":
        returnData[it.title]=$("#"+it.element).val().trim();
      break;
      case "select":
        returnData[it.title]=$("#"+it.element+" :selected").text().trim();
      break;
      case "selectVal":
        returnData[it.title]=$("#"+it.element+" :selected").val().trim();
      break;
      case "id":{
        if($('input[name="'+it.element+'"]').length){
          returnData[it.title]=$('input[name="'+it.element+'"]:checked').attr('id')
        }else{
          returnData[it.title]=null
        }   
        break;     
      }                 
      case "radio":
        returnData[it.title]=$('input[name="'+it.name+'"]:checked').attr('id')
      break;
      case "manyinputs":
        returnData[it.title]=$('#'+it.element+' > tbody').find("."+it.child).map(function(){return $(this).val();}).get(); 
      break;
      case "table":{
        let matrix=[]
        let parent=$('#'+it.element).find("tbody > tr");          
         parent.map(function(){ 
          let data= $(this).find("td").children();        
          let row=[]
          data.map(function(){        
            row.push($(this).val());
          })          
          matrix.push(row);         
         });   
        returnData[it.title]=matrix
      }
      break;
      case "none":
      break;
      default:
        returnData[it.title]=it.value
      break;  
    }
  })
  return returnData;
}
function validate(data){
  let error=0;
  $(".error").remove(); 
  data.forEach((it)=>{
    if(it.status){
      switch(it.type){
        case "text":{
          let ele=$('#'+it.element);
          if(!ele.val().length){
            ele.after('<span class="error">Este campo es requerido</span>');  
            error=1;
          }
        }
        break;
        case "radio":{
          let ele=$('input[name="'+it.element+'"]:checked')
          if (ele.length < 1) {
            $('input[name="'+it.element+'"]').after('<span class="error">Alguno de estos campos es requerido</span>');  
            error=1;
          }
         
        }
        break;
        case "file":{
          let ele=$('#'+it.element);
          if(ele.get(0).files.length===0){
            ele.after('<span class="error">Este campo es requerido</span>');  
            error=1;
          }
        }
        break;
        case "select":{
          let ele=$('#'+it.element);
          if(ele.val()==="-1"){
            ele.after('<span class="error">Este campo es requerido</span>');  
            error=1;
          }
        }
        break;
        case "table":{
          let parent=$('#'+it.element).find("tbody > tr");
         // console.log(parent)
         if(parent.length){
          parent.map(function(){ 

            let data= $(this).find(".obligatory-input");
           data.map(function(){        
            let val=$(this).prop('type');
          //  console.log(val)
              switch (val) {
                case "text":
                  if(!$(this).val().length){
                    $(this).after('<span class="error">Este campo es requerido</span>');  
                    error=1;
                  }
                break;
                case "select-one":
                  if($(this).val()==="-1"){
                    $(this).after('<span class="error">Este campo es requerido</span>');  
                    error=1;
                  }
                break;
               /* case "radio":
                  if(!$(this).is(":checked")){
                    $(this).after('<span class="error">Este campo es requerido</span>');  
                    error=1;
                  }
                break;*/
                default:
                  break;
              }
           })
          
           /* if($(this).val()==="-1"){
              $(this).after('<span class="error">Este campo es requerido</span>');  
              error=1;
            }*/
          });   
        }else{
          $('#'+it.element).after('<span class="error">Este campo es requerido</span>');  
          error=1;
        }  
        }
        break;
        case "group":{
          let parent=$('#'+it.element).find("tbody > tr");
         // console.log(parent)
          parent.map(function(){ 
           let data= $(this).find("td").children();
           switch (it.value) {
            case 'radio':
              if(!data.is(":checked")){
                $(this).after('<span class="error">Este campo es requerido</span>');  
                error=1;
              }
              break;             
            default:
              break;
           }                     
          });   
        }
        break;
        default:
        break;

      }     
      
    }      
  })
  return error;
}
function ResetAndUpdateGrid(data,func=null,id=null){
  data.forEach((it)=>{
    if(it.status){
      switch(it.value){
        case "val":
          $("#"+it.element).val("");
        break;
        case "text":
          $("#"+it.element).text("");
        break;
        case "file":
          $("#"+it.element).val(null);
        break;
        case "select":
          $("#"+it.element).val("-1");
        break;
        case "selectVal":
          $("#"+it.element).val("-1");
        break;
        case "manyinputs":
          $("."+it.content).remove();
        break;
        case "table":
          $("#"+it.element).find('tbody').children().remove();
        break;
        case "selectArray":
          $("."+it.element).val("-1");
        break;
        case "date":
          $("#"+it.element).val(new Date().toISOString().slice(0, 10));
        break; 
        default:
        break;
      }

      
    }else{
      switch(it.value){       
        case "none":
          $("#"+it.element).val("");
        break;
        case "manyinputs":
          $("."+it.content).remove();
        break;
        default:
        break;
      }
    }   
  })  
  if(func){
    func(id);
  } 
}
function FlotaComentario(id){
  console.log(id)
  let datos = {
    TipoQuery : "01_getComentarioVehiculoById",
    QueryDelete: "delete_Odometro",
    id:id
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    console.log(resp)
    if(resp.tabla.length>0){
      table= $('#ComentariosVehiculoTables').DataTable({
        "sPaginationType": "simple",
        "lengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "pageLength": 5,
        "order": [], 
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
        },
        data: resp.tabla,
        drawCallback: function() {
          $("#ComentariosVehiculoTables thead").remove();
      }, 
        destroy: true,
        columns: 
        [
            
            { data: "id",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              console.log(oData)
              if(oData.id) {
                  $(nTd).html(ComentarioRowStyling(oData.nombres,oData.fecha,oData.descripcion));
              }
            }
            }        
        ]
      } );
    }else{
      $('#ComentariosVehiculoTables').empty()
    }

    
    
  });
}
function FlotaVehiculoEstados(id){
  let datos = {
    TipoQuery : "01_getEstadosById",
    QueryDelete: "delete_Odometro",
    id:id
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    console.log(resp)
    if(resp.tabla.length>0){
      table= $('#EstadosTables').DataTable({
        "sPaginationType": "simple",
        "lengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "pageLength": 5,
        "order": [], 
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
        },
        data: resp.tabla,
        drawCallback: function() {
          $("#EstadosTables thead").remove();
      }, 
        destroy: true,
        columns: 
        [
            
            { data: "id",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              console.log(oData)
              if(oData.id) {
                  $(nTd).html(EstadoRowStyling(oData.nombres,oData.fecha,oData.hora,oData.motivo,oData.estado));
              }
            }
            }        
        ]
      } );
    }else{
      $('#EstadosTables').empty()
    }

    
    
  });
}
function searchFillInputReport(inputsearch,sqlQuery,inputs,graph){
  var msn=$('#'+inputsearch).val();
  let datos = {
    TipoQuery : sqlQuery,
    value:msn     
  };      
  appAjaxQuery(datos,rutaSQL).done(function(resp){  
    console.log(inputsearch)  
    console.log(sqlQuery)  
    console.log(inputs)  
    console.log(graph)  
    if(resp.error){
      swal("No se encontro incidencia", {
        icon: "warning",
      });
    }else{
      
      swal("Has seleccionado a: "+resp.tabla.first+" "+resp.tabla.second+"", {
        icon: "success",
      });

      $("#"+inputs.id).val(resp.tabla.id);
      $('#'+inputs.firt).val(resp.tabla.first);      
      $('#'+inputs.second).val(resp.tabla.second);      
      $('#'+inputs.third).val(resp.tabla.third);      

      vehicleGlobal=resp.tabla.id
      $("#"+graph.content).empty()
      managementGraphsReport(graph.sql,
                        graph.type,
                        graph.content,
                        graph.periodicity)
    }
  });
}
function resporte_combustible_fixed(){
  $("#chart_combustible").empty();
  var anio = $("#txt06_anio_combustible").val();
  var mes = $("#cbo06_meses_combustible").val();
  var flota = $("#cbo06_Contenidos_combustible").val();
  var equipo = $("#cbo06_Equipos_combustible").val();
 
  if(flota==="-1"){
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
  var $option = $("#cbo06_Contenidos_combustible").find('option:selected');
  var value = $option.val(); 
  //todos meses, todos equipos
if(mes==="-1" && equipo==="-1"){  
    datos = {
      TipoQuery : "06_getAll_combustible_all",
      anio: anio,
      clase: value
    }

  appAjaxQuery(datos,rutaSQL).done(function(data){
    console.log(data)
    const groupByCategory = data.table.reduce((group, product) => {
      const { codigo } = product;

      group[codigo] = group[codigo] ?? [];    
      group[codigo].push(product);            
      return group;
    }, {});
    
    let populationArr = Object.entries(groupByCategory);
    let series=[];
    let titles=[];
    populationArr.forEach((item)=>{
      let newprocessed=[];
      item[1].reduce(function(res, value) {
        if (!res[value.date]) {
          res[value.date] = { date: value.date, costo: 0 };
          newprocessed.push(res[value.date])
        }
        res[value.date].costo += Number(value.costo);
        return res;
      }, {});
     // series.push({"codigo":item[0],"serie":newprocessed});
      titles.push(item[0]);
      series.push(newprocessed);
    })

   generateSeriesNewReports(series,titles,"Combustible","chart_combustible");
  });

  return;
}

//todos meses, un equipo
if(mes==="-1" && equipo!="-1"){
  datos = {
    TipoQuery : "06_getAll_combustible_all_by_vehicle",
    anio: anio,
    clase: value,
    vehicle:equipo
  }
console.log(datos)
appAjaxQuery(datos,rutaSQL).done(function(data){
  console.log(data)
  const groupByCategory = data.table.reduce((group, product) => {
    const { codigo } = product;

    group[codigo] = group[codigo] ?? [];    
    group[codigo].push(product);            
    return group;
  }, {});
  
  let populationArr = Object.entries(groupByCategory);
  let series=[];
  let titles=[];
  populationArr.forEach((item)=>{
    let newprocessed=[];
    item[1].reduce(function(res, value) {
      if (!res[value.date]) {
        res[value.date] = { date: value.date, costo: 0 };
        newprocessed.push(res[value.date])
      }
      res[value.date].costo += Number(value.costo);
      return res;
    }, {});
   // series.push({"codigo":item[0],"serie":newprocessed});
    titles.push(item[0]);
    series.push(newprocessed);
  })

 generateSeriesNewReports(series,titles,"Combustible","chart_combustible");
});

return;
}

//un mes, todos equipos
if(mes!="-1" && equipo==="-1"){

  datos = {
    TipoQuery : "06_getAll_combustible_all_by_mes",
    anio: anio,
    clase: value,
    mes:mes
   // vehicle:equipo
  }
console.log(datos)
appAjaxQuery(datos,rutaSQL).done(function(data){
  console.log(data)
  const groupByCategory = data.table.reduce((group, product) => {
    const { codigo } = product;

    group[codigo] = group[codigo] ?? [];    
    group[codigo].push(product);            
    return group;
  }, {});
  
  let populationArr = Object.entries(groupByCategory);
  let series=[];
  let titles=[];
  populationArr.forEach((item)=>{
    let newprocessed=[];
    item[1].reduce(function(res, value) {
      if (!res[value.date]) {
        res[value.date] = { date: value.date, costo: 0 };
        newprocessed.push(res[value.date])
      }
      res[value.date].costo += Number(value.costo);
      return res;
    }, {});
   // series.push({"codigo":item[0],"serie":newprocessed});
    titles.push(item[0]);
    series.push(newprocessed);
  })

 generateSeriesNewReports(series,titles,"Combustible","chart_combustible");
});

return;
}

//un mes, un equipo

if(mes!="-1" && equipo!="-1"){
  datos = {
    TipoQuery : "06_getAll_combustible_all_by_mes_and_vehicle",
    anio: anio,
    clase: value,
    mes:mes,
    vehicle:equipo
  }
console.log(datos)
appAjaxQuery(datos,rutaSQL).done(function(data){
  console.log(data)
  const groupByCategory = data.table.reduce((group, product) => {
    const { codigo } = product;

    group[codigo] = group[codigo] ?? [];    
    group[codigo].push(product);            
    return group;
  }, {});
  
  let populationArr = Object.entries(groupByCategory);
  let series=[];
  let titles=[];
  populationArr.forEach((item)=>{
    let newprocessed=[];
    item[1].reduce(function(res, value) {
      if (!res[value.date]) {
        res[value.date] = { date: value.date, costo: 0 };
        newprocessed.push(res[value.date])
      }
      res[value.date].costo += Number(value.costo);
      return res;
    }, {});
   // series.push({"codigo":item[0],"serie":newprocessed});
    titles.push(item[0]);
    series.push(newprocessed);
  })

 generateSeriesNewReports(series,titles,"Combustible","chart_combustible");
});

   return;
 }  
}
function resporte_gasto_operativo_fixed(){

  $("#chart_gasto_operativo").empty();
  var anio = $("#txt06_anio_gasto_operativo").val();
  var mes = $("#cbo06_meses_gasto_operativo").val();
  var flota = $("#cbo06_Contenidos_gasto_operativo").val();
  var equipo = $("#cbo06_Equipos_gasto_operativo").val();
 
  if(flota==="-1"){
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
  var $option = $("#cbo06_Contenidos_gasto_operativo").find('option:selected');
  var value = $option.val(); 
  //todos meses, todos equipos
if(mes==="-1" && equipo==="-1"){  
    datos = {
      TipoQuery : "06_getAll_combustible_all",
      anio: anio,
      clase: value
    }

  appAjaxQuery(datos,rutaSQL).done(function(data){
    console.log(data)
    const groupByCategory = data.table.reduce((group, product) => {
      const { codigo } = product;

      group[codigo] = group[codigo] ?? [];    
      group[codigo].push(product);            
      return group;
    }, {});
    
    let populationArr = Object.entries(groupByCategory);
    let series=[];
    let titles=[];
    populationArr.forEach((item)=>{
      let newprocessed=[];
      item[1].reduce(function(res, value) {
        if (!res[value.date]) {
          res[value.date] = { date: value.date, costo: 0 };
          newprocessed.push(res[value.date])
        }
        res[value.date].costo += Number(value.costo);
        return res;
      }, {});
     // series.push({"codigo":item[0],"serie":newprocessed});
      titles.push(item[0]);
      series.push(newprocessed);
    })

   generateSeriesNewReports(series,titles,"Otros Gastos","chart_gasto_operativo");
  });

  return;
}

//todos meses, un equipo
if(mes==="-1" && equipo!="-1"){
  datos = {
    TipoQuery : "06_getAll_gasto_operativo_all_by_vehicle",
    anio: anio,
    clase: value,
    vehicle:equipo
  }
console.log(datos)
appAjaxQuery(datos,rutaSQL).done(function(data){
  console.log(data)
  const groupByCategory = data.table.reduce((group, product) => {
    const { codigo } = product;

    group[codigo] = group[codigo] ?? [];    
    group[codigo].push(product);            
    return group;
  }, {});
  
  let populationArr = Object.entries(groupByCategory);
  let series=[];
  let titles=[];
  populationArr.forEach((item)=>{
    let newprocessed=[];
    item[1].reduce(function(res, value) {
      if (!res[value.date]) {
        res[value.date] = { date: value.date, costo: 0 };
        newprocessed.push(res[value.date])
      }
      res[value.date].costo += Number(value.costo);
      return res;
    }, {});
   // series.push({"codigo":item[0],"serie":newprocessed});
    titles.push(item[0]);
    series.push(newprocessed);
  })

 generateSeriesNewReports(series,titles,"Otros Gastos","chart_gasto_operativo");
});

return;
}

//un mes, todos equipos
if(mes!="-1" && equipo==="-1"){

  datos = {
    TipoQuery : "06_getAll_gasto_operativo_all_by_mes",
    anio: anio,
    clase: value,
    mes:mes
   // vehicle:equipo
  }
console.log(datos)
appAjaxQuery(datos,rutaSQL).done(function(data){
  console.log(data)
  const groupByCategory = data.table.reduce((group, product) => {
    const { codigo } = product;

    group[codigo] = group[codigo] ?? [];    
    group[codigo].push(product);            
    return group;
  }, {});
  
  let populationArr = Object.entries(groupByCategory);
  let series=[];
  let titles=[];
  populationArr.forEach((item)=>{
    let newprocessed=[];
    item[1].reduce(function(res, value) {
      if (!res[value.date]) {
        res[value.date] = { date: value.date, costo: 0 };
        newprocessed.push(res[value.date])
      }
      res[value.date].costo += Number(value.costo);
      return res;
    }, {});
   // series.push({"codigo":item[0],"serie":newprocessed});
    titles.push(item[0]);
    series.push(newprocessed);
  })

 generateSeriesNewReports(series,titles,"Otros Gastos","chart_gasto_operativo");
});

return;
}

//un mes, un equipo

if(mes!="-1" && equipo!="-1"){
  datos = {
    TipoQuery : "06_getAll_gasto_operativo_all_by_mes_and_vehicle",
    anio: anio,
    clase: value,
    mes:mes,
    vehicle:equipo
  }
console.log(datos)
appAjaxQuery(datos,rutaSQL).done(function(data){
  console.log(data)
  const groupByCategory = data.table.reduce((group, product) => {
    const { codigo } = product;

    group[codigo] = group[codigo] ?? [];    
    group[codigo].push(product);            
    return group;
  }, {});
  
  let populationArr = Object.entries(groupByCategory);
  let series=[];
  let titles=[];
  populationArr.forEach((item)=>{
    let newprocessed=[];
    item[1].reduce(function(res, value) {
      if (!res[value.date]) {
        res[value.date] = { date: value.date, costo: 0 };
        newprocessed.push(res[value.date])
      }
      res[value.date].costo += Number(value.costo);
      return res;
    }, {});
   // series.push({"codigo":item[0],"serie":newprocessed});
    titles.push(item[0]);
    series.push(newprocessed);
  })

 generateSeriesNewReports(series,titles,"Otros Gastos","chart_gasto_operativo");
});

return;
}

  
}
function resporte_gasto_operativo_total_fixed(){

  $("#chart_gasto_operativo_total").empty();
  var anio = $("#txt06_anio_gasto_operativo_total").val();
  var mes = $("#cbo06_meses_gasto_operativo_total").val();
  var flota = $("#cbo06_Contenidos_gasto_operativo_total").val();
  var equipo = $("#cbo06_Equipos_gasto_operativo_total").val();
 
  if(flota==="-1"){
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
  var $option = $("#cbo06_Contenidos_gasto_operativo_total").find('option:selected');
  var value = $option.val(); 
  //todos meses, todos equipos
if(mes==="-1" && equipo==="-1"){  
    datos = {
      TipoQuery : "06_getAll_gasto_operativo_total_all",
      anio: anio,
      clase: value
    }

  appAjaxQuery(datos,rutaSQL).done(function(data){    
    generateSeriesGastoOperativo(data,["Combustible","Otros Gastos","Gasto Operativo"],"Gasto Operativo","chart_gasto_operativo_total");    
  });

  return;
}

//todos meses, un equipo
if(mes==="-1" && equipo!="-1"){
  datos = {
    TipoQuery : "06_getAll_gasto_operativo_total_all_by_vehicle",
    anio: anio,
    clase: value,
    vehicle:equipo
  }
//console.log(datos)
appAjaxQuery(datos,rutaSQL).done(function(data){
  generateSeriesGastoOperativo(data,["Combustible","Otros Gastos","Gasto Operativo"],"Gasto Operativo","chart_gasto_operativo_total");    

});

return;
}

//un mes, todos equipos
if(mes!="-1" && equipo==="-1"){

  datos = {
    TipoQuery : "06_getAll_gasto_operativo_total_all_by_mes",
    anio: anio,
    clase: value,
    mes:mes
   // vehicle:equipo
  }
console.log(datos)
appAjaxQuery(datos,rutaSQL).done(function(data){
  generateSeriesGastoOperativo(data,["Combustible","Otros Gastos","Gasto Operativo"],"Gasto Operativo","chart_gasto_operativo_total");    
});

return;
}

//un mes, un equipo

if(mes!="-1" && equipo!="-1"){
  datos = {
    TipoQuery : "06_getAll_gasto_operativo_total_all_by_mes_and_vehicle",
    anio: anio,
    clase: value,
    mes:mes,
    vehicle:equipo
  }
//console.log(datos)
appAjaxQuery(datos,rutaSQL).done(function(data){
  generateSeriesGastoOperativo(data,["Combustible","Otros Gastos","Gasto Operativo"],"Gasto Operativo","chart_gasto_operativo_total");    
});

return;
}

  
}
function managementGraphsReport(sql,type,element,periodicity=30){
  switch(type){
    case "combustibleByReportId":    
      generateSeries(sql,["Combustible"], vehicleGlobal,"Combustible",element,periodicity);          
     break;     
     case "mantenimientoByReportId":    
      generateSeries(sql,["Mantenimiento"], vehicleGlobal,"Mantenimiento",element,periodicity);          
     break;   
     case "costoOperacionalByReportId":    
      generateSeries(sql,["CostoOperacional"], vehicleGlobal,"Otros Gastos",element,periodicity);          
     break;     
     case "costoOperacionalByReportIdTotal":    
     generateSeries(sql,["Combustible","Otros Gastos","Total"], vehicleGlobal,"Gasto Operativo",element,periodicity);          
    break;     
    case "combustibleVehiculo":    
      generateSeries(sql,["Combustible"], vehicleGlobal,"Combustible",element,periodicity);          
   break;   
   case "mantenimientoVehiculo":    
      generateSeries(sql,["Mantenimiento"], vehicleGlobal,"Mantenimiento",element,periodicity);          
   break; 
   case "costoOperacionaVehiculo":    
      generateSeries(sql,["Combustible","Otros Gastos","Gasto Operativo"], vehicleGlobal,"Gasto Operativo",element,periodicity);          
   break;   
    default:
    break;
  }
}
function  searchInput(type){
  switch(type){
    case "searchVehiculoReportCombustible":
      searchFillInputReport(
        "txt_search_vehiculo_responsable",
        "sql_search_vechiculo",
       { id:"txt_search_vehiculo_responsable_report_id",
        firt:"txt_search_vehiculo_responsable_report_activo",
        second:"txt_search_vehiculo_responsable_report_descripcion",
        third:"txt_search_vehiculo_responsable_report_tipo",},
        {
          sql:"sql_combustible_report_by_id",
          type:"combustibleByReportId",
          content:"resumencombustibleGraphReportIndividualMensual",
          periodicity:30
        }
      )
      break;
      case "searchVehiculoReportMantenimiento":
        searchFillInputReport(
          "txt_search_vehiculo_mantenimiento2",
          "sql_search_vechiculo",
         { id:"txt_search_vehiculo_mantenimiento_report_id",
          firt:"txt_search_vehiculo_mantenimiento_report_activo",
          second:"txt_search_vehiculo_mantenimiento_report_descripcion"},
          {
            sql:"sql_mantenimiento_report_by_id",
            type:"mantenimientoByReportId",
            content:"resumenmantenimientoGraphReportIndividualMensual",
            periodicity:30
          }
        )
        break;
        case "searchVehiculoCombustible":
          searchFillInput(
            "txt_search_vehiculo_comburtible",
            "sql_search_vechiculo",
            "txt_tarea_vehiculo_comburtible",
            "txt_input_search_vehiculo_comburtibleactivo",
            "txt_input_search_vehiculo_comburtibledescripcion"
          )
          break;
        case "searchVehiculoReportGastoOperativo":
          searchFillInputReport(
            "txt_search_vehiculo_costoOperacional",
            "sql_search_vechiculo",
           { id:"txt_search_vehiculo_costoOperacional_report_id",
            firt:"txt_search_vehiculo_costoOperacional_report_activo",
            second:"txt_search_vehiculo_costoOperacional_report_descripcion"},
            {
              sql:"sql_costoOperacional_report_by_id",
              type:"costoOperacionalByReportId",
              content:"resumencostoOperacionalGraphReportIndividualMensual",
              periodicity:30
            }
          )
          break;
          case "searchVehiculoReportGastoOperativoTotal":
          searchFillInputReport(
            "txt_search_vehiculo_costoOperacional_total",
            "sql_search_vechiculo",
           { id:"txt_search_vehiculo_costoOperacional_report_id_total",
            firt:"txt_search_vehiculo_costoOperacional_report_activo_total",
            second:"txt_search_vehiculo_costoOperacional_report_descripcion_total"},
            {
              sql:"sql_costoOperacional_report_by_idTotal",
              type:"costoOperacionalByReportIdTotal",
              content:"resumencostoOperacionalGraphReportIndividualMensualTotal",
              periodicity:30
            }
          )
          break;
    case "searchVehiculoCostosOperarios":
      searchFillInput(
        "txt_gastosoperarios_search_vehiculo",
        "sql_search_vechiculo",
        "txt_gastosoperarios_search_vehiculo_id",
        "txt_gastosoperarios_search_activo",
        "txt_gastosoperarios_search_descripcion"
      )
      break;
      case "searchConductorCostosOperarios":
        searchFillInput(
          "txt_gastosoperarios_search_conductor",
          "sql_search_conductor",
          "txt_gastosoperarios_search_conductor_id",
          "txt_gastosoperarios_conductor_search_activo",
          "txt_gastosoperarios_conductor_search_descripcion"
        )
        break;
        case "searchConductorOperacionesAsignacion":
          searchFillInput(
            "txt_search_conductor_operaciones_asignaciones",
            "sql_search_conductor",
            "txt_id_hidden_conductor_operaciones_asignaciones",
            "txt_search_conductor_nombres_operaciones_asignaciones",
            "txt_search_conductor_apellidos_operaciones_asignaciones"
          )
          break;
      case "searchVehiculoSolicitudMantenimiento":
        searchFillInput(
          "txt_search_vehiculo_solicitud_mantenimiento",
          "sql_search_vechiculo",
          "txt_vehiculo_solicitud_mantenimiento",
          "txt_vehiculo_solicitud_mantenimiento_activo",
          "txt_vehiculo_solicitud_mantenimiento_descripcion"
        )
      break;
      case "searchDocumentoVehiculo":
        searchFillInput(
          "txt_search_documentos_vehiculo",
          "sql_search_vechiculo",
          "txt_search_documento_vehiculo_id",
          "txt_search_vehiculo_documento_activo",
          "txt_search_vehiculo_documento_descripcion"
        )
      break;
    case "searchVehiculo":
      searchFillInput(
        "txt_search_vehiculo",
        "sql_search_vechiculo",
        "txt_tarea_vehiculo_empleado",
        "txt_input_search_vehiculo_activo",
        "txt_input_search_vehiculo_descripcion"
      )
    break;
    case "searchVehiculoMantenimiento":
      searchFillInput(
        "txt_search_vehiculo_mantenimiento",
        "sql_search_vechiculo_mantenimiento",
        "txt_vehiculo_combustible_id",
        "txt_vehiculo_combustible_activo",
        "txt_vehiculo_combustible_descripcion"
      )
    break;
    case "searchConductorMantenimiento":
      searchFillInput(
        "txt_vehiculo_combustible_conductor",
        "sql_search_conductor",
        "txt_vehiculo_combustible_conductor_id",
        "txt_vehiculo_combustible_conductor_nombre",
        "txt_vehiculo_combustible_conductor_apellido"
      )
    break;
    case "searchResponsableMantenimiento":
      searchFillInput(
        "txt_vehiculo_combustible_responsable",
        "sql_search_conductor",
        "txt_vehiculo_combustible_responsable_id",
        "txt_vehiculo_combustible_responsable_nombre",
        "txt_vehiculo_combustible_responsable_apellido"
      )
    break;
    case "searchProveedorantenimiento":
      searchFillInput(
        "txt_vehiculo_combustible_proveedor",
        "sql_search_proveedor",
        "txt_vehiculo_combustible_proveedor_id",
        "txt_vehiculo_combustible_proveedor_nombre",
        "txt_vehiculo_combustible_proveedor_apellido"
      )
    break;
    case "searchResponsable":
      searchFillInput(
        "txt_search_responsable",
        "sql_search_responsable",
        "txt_tarea_responsable",
        "txt_input_search_responsable_nombres",
        "txt_input_search_responsable_apellidos"
      )
    break;
    case "searchConductor":
      searchFillInput(
        "txt_search_conductor",
        "sql_search_conductor",
        "txt_tarea_conductor",
        "txt_input_search_conductor_nombres",
        "txt_input_search_conductor_apellidos"
      ) 
    break;
    case "searchConductor2":
      searchFillInput(
        "txt_search_vehiculo_ope",
        "sql_search_conductor",
        "txt_vehiculo_combustible",
        "txt_vehiculo_combustible_nombre",
        "txt_vehiculo_combustible_apellido"
      )
      break;
      case "searchProveedor":
        searchFillInput(
          "txt_search_combustible_proveedor",
          "sql_search_proveedor",
          "txt_combustible_proveedor_id",
          "txt_combustible_proveedor_nombre",
          "txt_combustible_proveedor_apellido"
        )
    break;
  }
}
function searchFillInput(inputsearch,sqlQuery,idinput,searchinputfirst,searchinputsecond){
  var msn=$('#'+inputsearch).val();
  let datos = {
    TipoQuery : sqlQuery,
    value:msn     
  };      
  appAjaxQuery(datos,rutaSQL).done(function(resp){   
    console.log(resp) 
    if(resp.error){
      swal("No se encontro incidencia", {
        icon: "warning",
      });
    }else{
      
      swal("Has seleccionado a: "+resp.tabla.first+" "+resp.tabla.second+"", {
        icon: "success",
      });

      $("#"+idinput).val(resp.tabla.id);
      $('#'+searchinputfirst).val(resp.tabla.first);      
      $('#'+searchinputsecond).val(resp.tabla.second);      

     
    }
  });
}
function search_conductor(){
  var msn=$('#txt_search_conductor').val();
  let datos = {
    TipoQuery : '02_search_conductor',
    value:msn     
  };      
  appAjaxQuery(datos,rutaSQL).done(function(resp){    
    if(resp.error){
      swal("No se encontro incidencia para el DNI", {
        icon: "warning",
      });
    }else{
      
      swal("Has seleccionado a: "+resp.tabla.nombres+" "+resp.tabla.apellidos+"", {
        icon: "success",
      });

      $("#txt_id_hidden_conductor").val(resp.tabla.id);
      $('#txt_search_conductor_nombres').val(resp.tabla.nombres+" "+resp.tabla.apellidos);      
    }
  });
}
function FlotaVehiculoAsignaciones(id){
  let datos = {
    TipoQuery : "01_getAsignacionesById",
    QueryDelete: "delete_Odometro",
    id:id
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    console.log(resp)
    $('#asignacionesTables').empty();
    if(resp.tabla.length>0){
      table= $('#asignacionesTables').DataTable({
        "sPaginationType": "simple",
        "lengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "pageLength": 5,
        "order": [],  
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
        },
        data: resp.tabla,
        drawCallback: function() {
          $("#asignacionesTables thead").remove();
      }, 
        destroy: true,
        columns: 
        [
            
            { data: "id",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              console.log(oData)
              if(oData.id) {
                  $(nTd).html(AsignacionRowStyling(oData.id,oData.nombres,oData.fecha_ini,oData.fecha_final,oData.hora_ini,oData.hora_final,oData.odometro,oData.comentario));
              }
            }
            }        
        ]
      } );
    }else{
      $('#asignacionesTables').empty();
    }

    
    
  });
}
function add_seguro(){
  let Maindata=[
    {title:"vehiculo",element:"",type:"text",status:0,value:vehicleGlobal},
    {title:"status",element:"",type:"text",status:0,value:"1"},
    {title:"proveedor",element:"txt_seguro_proveedor",type:"text",status:1,value:"val"},
    {title:"Referencia",element:"txt_seguro_referencia",type:"text",status:1,value:"val"},
    {title:"fecha_inicio",element:"txt_seguro_fecha_inicio",type:"text",status:1,value:"val"},
    {title:"fecha_vencimiento",element:"txt_seguro_fecha_vencimiento",type:"text",status:1,value:"val"},
    {title:"total",element:"txt_seguro_total",type:"text",status:1,value:"val"},
    {title:"comentarios",element:"txt_seguro_comentario",type:"text",status:1,value:"val"},
  ]
  if(validate(Maindata)){
    swal("Completa todos los campos", {
      icon: "error",
    });
  }else{
  
        let datos = {
          TipoQuery : '03_save_add_vehiculo_seguro',
          data:generateInsertData(Maindata)
        };        
        console.log(datos)
       appAjaxQuery(datos,rutaSQL).done(function(resp){   
                 
            $('#addModalSeguro').modal('hide');
            ResetAndUpdateGrid(Maindata,LoadData,vehicleGlobal
            );

            swal("Insertado correctamente", {
              icon: "success",
            });   
                           
        }); 
  }
}
function FlotaVehiculoOdometro(id){
  let datos = {
    TipoQuery : "01_getOdometrobyId",
    QueryDelete: "delete_Odometro",
    id:id
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    console.log(resp)
    if(resp.tabla.length>0){
      table= $('#odometroTable').DataTable( {
        "sPaginationType": "simple",
        "lengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "pageLength": 5,
        "order": [],  
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
        },
        data: resp.tabla,
        drawCallback: function() {
          $("#odometroTable thead").remove();
      }, 
        destroy: true,
        columns: 
        [
            
            { data: "odometro",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              console.log(oData.fecha)
              if(oData.odometro) {
                  $(nTd).html(OdometroRowStyling(oData.odometro,oData.fecha));
              }
            }
            },          
            { data: "type"},
            { 
              data: "id",
              targets: -1,
              className: 'dt-body-right',            
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                console.log(oData)
                if(oData.id) {
                    $(nTd).html("<button  type='button' class='btn btn-danger bg-rose-500  py-2 px-2 text-white' onclick='DeleteElement("+(parseInt(oData.id))+","+(parseInt(oData.vehiculo))+",\"" + datos.QueryDelete + "\")' ><i class='fa fa-trash'></i></button>");
                }
              }
            }
          
        ]
      } );
    }else{
      $('#odometroTable').empty();
    }

    
    
  });
}
function DeleteElement(id,parent,query){
  console.log(id)
  console.log(query)
  console.log(parent)
  swal({
    title: "¿Estas seguro que deseas eliminar?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {        
      let datos = {
        TipoQuery :query,
        value:id
      };

      appAjaxQuery(datos,rutaSQL).done(function(resp){                
          FlotaVehiculoOdometro(parent);  
          swal("Has eliminado el registro", {
           icon: "success",
          });
      });  
      
    }
  });
}
function app01VerVehiculo(id){
  
  $("#contentVehiculos").hide();
  $("#detalleVehiculo").show();
  

  let datos = {
    TipoQuery : "01_getbyId",
    id: id
  }
  console.log("id: "+id);
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    //$("#txt02_NroActivo").val($("#lbl_ActivoGrupo").html()+' - '+$("#lbl_ActivoNro").html());
    var vehiculo = resp.tabla[0];
    $("#vehi_titulo").text(" "+resp.tabla[0].nombre+" "+resp.tabla[0].placa);
    $("#vehi_placa").text(" "+resp.tabla[0].placa);
    $("#vehi_odometro").text(" "+resp.tabla[0].odometro);
    $("#vehi_estado").text(" "+resp.tabla[0].estado);
    $("#vehi_tipo").text(" "+resp.tabla[0].tipo);
    $("#vehi_ciudad").text(" "+resp.tabla[0].ciudad);

    $("#det_nombre").text(resp.tabla[0].nombre);
    $("#det_estado").text(resp.tabla[0].estado);
    $("#det_tipo").text(resp.tabla[0].tipo);
    $("#det_grupo").text("Arequipa");
    $("#det_propiedad").text(resp.tabla[0].propiedad);
    $("#det_serie").text(resp.tabla[0].serie);
    $("#det_anio").text(resp.tabla[0].anio);
    $("#det_marca").text(resp.tabla[0].marca);
    $("#det_modelo").text(resp.tabla[0].modelo);
    $("#det_version").text("-");
    $("#det_color").text("-");
    $("#det_cuerpo").text("-");

    let datos = {
      TipoQuery : "01_getSegurobyId",
      id: id
    }

    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.tabla.length>0){
        $("#seg_proveedor").text(resp.tabla[0].proveedor);
        $("#seg_fechaIni").text(moment(resp.tabla[0].fecha_inicio).format("DD/MM/YYYY"));
        $("#seg_total").text(resp.tabla[0].subtotal);
        $("#seg_refe").text(resp.tabla[0].Referencia);
        $("#seg_fechaVen").text(moment(resp.tabla[0].fecha_vencimiento).format("DD/MM/YYYY"));
        $("#seg_docs").text("-");
        console.log("comb id: "+vehiculo.combustible)
        let datos = {
          TipoQuery : "01_getCombustiblebyId",
          id: vehiculo.combustible
        }
    
        appAjaxQuery(datos,rutaSQL).done(function(resp){
          if (resp.tabla.length>0){
            $("#com_tanque01").text(resp.tabla[0].rendimiento_a+" GaLones (US)");
            $("#com_rendimiento").text(resp.tabla[0].capacidad)+" km/G (US)";
            $("#com_tanque02").text(resp.tabla[0].rendimiento_b+" GaLones (US)");

            let datos = {
              TipoQuery : "01_getPropiedadbyId",
              id: vehiculo.propio
            }
        
            appAjaxQuery(datos,rutaSQL).done(function(resp){
              if(resp.tabla.length>0){
                $("#pro_proveedor").text(resp.tabla[0].proveedor);
                $("#pro_fecha_compra").text(moment(resp.tabla[0].fecha_compra).format("DD/MM/YYYY"));
                $("#pro_precio").text(resp.tabla[0].precio);
                $("#pro_fecha_garan").text(moment(resp.tabla[0].fecha_garantia).format("DD/MM/YYYY"));
                $("#pro_notas").text(resp.tabla[0].notas);
                $("#pro_documentos").text(resp.tabla[0].documentos);

              
              }
              

            });
          }
          

        })
      }
      
    });

  });
}

function app01Boton_cancel(){
  $("#grid01").show();
  $("#btn01_New").show();
  $("#detalle01").hide();
  $("#btn01_Cancel").hide();
}

function dashboardGrafica01(){
    
  var options = {
    series: [{
    name: 'Sales',
    data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 50, 7, 5]
  }],
    chart: {
    height: 350,
    type: 'line',
  },
  forecastDataPoints: {
    count: 7
  },
  stroke: {
    width: 5,
    curve: 'smooth'
  },
  xaxis: {
    type: 'datetime',
    categories: ['1/11/2000', '2/11/2000', '3/11/2000', '4/11/2000', '5/11/2000', '6/11/2000', '7/11/2000', '8/11/2000', '9/11/2000', '10/11/2000', '11/11/2000', '12/11/2000', '1/11/2001', '2/11/2001', '3/11/2001','4/11/2001' ,'5/11/2001' ,'6/11/2001'],
    tickAmount: 10,
    labels: {
      formatter: function(value, timestamp, opts) {
        return opts.dateFormatter(new Date(timestamp), 'dd MMM')
      }
    }
  },
  title: {
    text: 'Combustible',
    align: 'left',
    style: {
      fontSize: "16px",
      color: '#666'
    }
  },
  fill: {
    type: 'gradient',
    gradient: {
      shade: 'dark',
      gradientToColors: [ '#FDD835'],
      shadeIntensity: 1,
      type: 'horizontal',
      opacityFrom: 1,
      opacityTo: 1,
      stops: [0, 100, 100, 100]
    },
  },
  yaxis: {
    min: 0,
    max: 50
  }
  };

  var chart = new ApexCharts(document.querySelector("#dashboardChart01"), options);
  chart.render();

}

function dashboardGrafica02(){
  var options = {
    series: [{
      name: "Combustible",
      data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
    },
    {
      name: "Mantenimientos",
      data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
    },
    {
      name: 'Gastos',
      data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
    }
  ],
    chart: {
    height: 350,
    type: 'line',
    zoom: {
      enabled: false
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    width: [5, 7, 5],
    curve: 'straight',
    dashArray: [0, 8, 5]
  },
  title: {
    text: 'Costos Operativos',
    align: 'left'
  },
  legend: {
    tooltipHoverFormatter: function(val, opts) {
      return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
    }
  },
  markers: {
    size: 0,
    hover: {
      sizeOffset: 6
    }
  },
  xaxis: {
    categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
      '10 Jan', '11 Jan', '12 Jan'
    ],
  },
  tooltip: {
    y: [
      {
        title: {
          formatter: function (val) {
            return val + " (mins)"
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val + " per session"
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val;
          }
        }
      }
    ]
  },
  grid: {
    borderColor: '#f1f1f1',
  }
  };

  var chart = new ApexCharts(document.querySelector("#dashboardChart02"), options);
  chart.render();
}
function resumenAsignacionFlota(){
  let datos = {
    TipoQuery : "sql_resumen_flota_asginacion"
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){
  // console.log(resp)

    let mainData="";
    $("#tablaResumenflotaTarea").empty();
    $("#asig_asignar").text(resp.general.Asignados);
    $("#asig_sinasignar").text(Number(resp.general.NoAsignados)-Number(resp.general.Asignados));
    resp.tabla.forEach((it)=>{
      mainData+='<div class="row">'+
      '<div class="col-md-12">'+
          '<p><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp;'+
          '   '+it.nombre+' - Vehiculo :  '+it.vehiculo+'</p>'+
         ' <p style="font-size:10px;"><span style="color:gray;">Fecha'+
        '          limite: '+it.fecha+'</span></p>'+
     ' </div>'+
  '</div>';
    })
$("#tablaResumenflotaTarea").append(mainData)
});
}
function resumenEstadoFlota(){
  let datos = {
    TipoQuery : "sql_resumen_flota_estado"
  }
  appAjaxQuery(datos,rutaSQL).done(function(resp){
   
      console.log(resp)
      let mainData="";

      let colors=[
        "primary",   
        "dark",
        "danger",
        "warning",
        "secondary",
        "info",
        "success"
      ];
      let estados=["Operativo",
        "Baja",
        "Asignados",
        "Alquilados",
        "En el taller",
        "Inactivo",
        "Siniestrado"]
        let idx=0;
        $("#tablaResumenflota").empty();
        $("#tablaResumenflota").append(
    '      <tr>'+
    '      <th>Vehiculos de la flota</th>'+
    '      <th></th>'+
    '      <th>Cantidad</th>'+
    '      <th>%</th>'+
    '  </tr>'+
   '  <tr>'+
   '       <th>Totales:</th>'+
   '       <td><span id="resumenflotatotal"></span></td>'+
   '       <td width="40%">'+
   '           <div class="progress">'+
  '                <div class="progress-bar progress-bar-success"'+
  '                    role="progressbar"'+
  '                    aria-valuenow="40" aria-valuemin="0"'+
  '                    aria-valuemax="100"'+
  '                    style="width: 100%">'+
  '                    '+
  '                </div>'+
  '            </div>'+
  '        </td>'+
  '        <td><span>100%</span></td>'+
  '    </tr>'
        );
      resp.tabla.forEach((it)=>{
        let cadena=it.estado.trim()
        const index = estados.indexOf(cadena);
        if (index > -1) { // only splice array when item is found
          estados.splice(index, 1); // 2nd parameter means remove one item only
        }
        mainData+='<tr>'+
        '<th>'+it.estado+':</th>'+
        '<td>'+it.cantidad+'</td>'+
        '<td width="40%">'+
         '   <div class="progress">'+
        '        <div class="progress-bar progress-bar-'+colors[idx]+'"'+
        '            role="progressbar"'+
         '           aria-valuenow="40" aria-valuemin="0"'+
         '           aria-valuemax="100"'+
        '            style="width: '+Number((Number(it.cantidad)*100)/resp.total)+'%">'+
        '        </div>'+
        '    </div>'+
        '</td>'+
        '<td>'+
        '            <span style="color:#000">'+(Number((Number(it.cantidad)*100)/resp.total)).toFixed(2)+'%</span>'+
        '</td>'+
    '</tr>';
        idx+=1;
   // console.log(estados);
      })
      estados.forEach((it)=>{
        mainData+='<tr>'+
        '<th>'+it+':</th>'+
        '<td>0</td>'+
        '<td width="40%">'+
         '   <div class="progress">'+
        '        <div class="progress-bar progress-bar-'+colors[idx]+'"'+
        '            role="progressbar"'+
         '           aria-valuenow="40" aria-valuemin="0"'+
         '           aria-valuemax="100"'+
        '            style="width: 0%">'+
        '        </div>'+
        '    </div>'+
        '</td>'+
        '<td>'+
        '            <span style="color:#000">0%</span>'+
        '</td>'+
    '</tr>';
    idx+=1;
      })
      $("#resumenflotatotal").text(resp.total);
$("#tablaResumenflota").append(mainData)

  });
}
function generateSeriesGastoOperativo(resp,nameSerie,title,element){
let sumX=[]
let sumY=[]

let mainData=[]
let X=[]
let Y=[]
let ddddd=[]
resp.forEach((it,index)=>{

  X=it.map((it)=>it.date)
  Y=it.map((it)=>it.costo)
  /**/
  
  sumX=sumX.concat(X)
  sumY=sumY.concat(Y)

  /**/
  mainData.push({
    x: X,
    y: Y,
    name: nameSerie[index],
    mode: 'lines+markers'
  })
})


if(nameSerie.length>2){

  for (let index = 0; index < sumX.length; index++) {
    ddddd.push({x:sumX[index],y:sumY[index]})        
  }

  ddddd = ddddd.sort((a, b) => new Date(a.x) - new Date(b.x))

  sumX=ddddd.map((it)=>it.x)
  sumY=ddddd.map((it)=>it.y)


  let resultX = sumX.filter((item,index)=>{
    return sumX.indexOf(item) === index;
  })

  let resultY=[...Array(resultX.length)].map(x =>0);

  sumX.forEach((ele,index)=>{
    let idx=resultX.findIndex((it)=>it==ele)
    resultY[idx]=Number(resultY[idx])+Number(sumY[index])

  })

  mainData.push({
    x: resultX,
    y: resultY,
    name: nameSerie[nameSerie.length-1],
    mode: 'lines+markers'
  })
}
//var data = [ trace2, trace3 ];
var config = {responsive: true,displaylogo: false}
var layout = {
  autosize: false,
  width: 580,
  showlegend: true,
  title:title,
   xaxis: {
    range: [X[0], X[X.length-1]],
    type: 'date'
  },
  yaxis: {
    title: {
      text: 'S/.',         
    }
  }
};
  Plotly.newPlot(element, mainData, layout,config );


   }
function generateSeries(type,nameSerie,vehiculo,title,element,period){
  let datos = {
    TipoQuery : type,
    value:vehiculo,
    period:period
  }

console.log(type)
console.log(nameSerie)
console.log(vehiculo)
console.log(title)
console.log(element)
console.log(period)

  appAjaxQuery(datos,rutaSQL).done(function(resp){
    let sumX=[]
    let sumY=[]

    let sumtesX=[]
    let sumtesY=[]
    let mainData=[]
    let X=[]
    let Y=[]
    let ddddd=[]
    resp.forEach((it,index)=>{
    
      X=it.map((it)=>it.date)
      Y=it.map((it)=>it.costo)
      /**/
      
      sumX=sumX.concat(X)
      sumY=sumY.concat(Y)

     
      /**/
    

      mainData.push({
        x: X,
        y: Y,
        name: nameSerie[index],
        mode: 'lines+markers'
      })
    })


    if(nameSerie.length>2){

      for (let index = 0; index < sumX.length; index++) {
        ddddd.push({x:sumX[index],y:sumY[index]})        
      }

      ddddd = ddddd.sort((a, b) => new Date(a.x) - new Date(b.x))

      sumX=ddddd.map((it)=>it.x)
      sumY=ddddd.map((it)=>it.y)


      let resultX = sumX.filter((item,index)=>{
        return sumX.indexOf(item) === index;
      })

      let resultY=[...Array(resultX.length)].map(x =>0);

      sumX.forEach((ele,index)=>{
        let idx=resultX.findIndex((it)=>it==ele)
        resultY[idx]=Number(resultY[idx])+Number(sumY[index])

      })

      mainData.push({
        x: resultX,
        y: resultY,
        name: nameSerie[nameSerie.length-1],
        mode: 'lines+markers'
      })
    }
    //var data = [ trace2, trace3 ];
    var config = {responsive: true,displaylogo: false}
    var layout = {
      autosize: false,
      width: 550,
      title:title,
       xaxis: {
        range: [X[0], X[X.length-1]],
        type: 'date'
      },
      yaxis: {
        title: {
          text: 'S/.',         
        }
      }
    };
    Plotly.newPlot(element, mainData, layout,config );
     })

   }
function generateSeriesNewReports(resp,nameSerie,title,element){

let sumX=[]
let sumY=[]

let mainData=[]
let X=[]
let Y=[]
let ddddd=[]
resp.forEach((it,index)=>{

  X=it.map((it)=>it.date)
  Y=it.map((it)=>it.costo)
  /**/
  
  sumX=sumX.concat(X)
  sumY=sumY.concat(Y)

  /**/
  mainData.push({
    x: X,
    y: Y,
    name: nameSerie[index],
    mode: 'lines+markers'
  })
})


if(nameSerie.length>2){

  for (let index = 0; index < sumX.length; index++) {
    ddddd.push({x:sumX[index],y:sumY[index]})        
  }

  ddddd = ddddd.sort((a, b) => new Date(a.x) - new Date(b.x))

  sumX=ddddd.map((it)=>it.x)
  sumY=ddddd.map((it)=>it.y)


 /* let resultX = sumX.filter((item,index)=>{
    return sumX.indexOf(item) === index;
  })

  let resultY=[...Array(resultX.length)].map(x =>0);

  sumX.forEach((ele,index)=>{
    let idx=resultX.findIndex((it)=>it==ele)
    resultY[idx]=Number(resultY[idx])+Number(sumY[index])

  })*/

  mainData.push({
    x: sumX,
    y: sumY,
    name: nameSerie[nameSerie.length-1],
    mode: 'lines+markers'
  })
}
//var data = [ trace2, trace3 ];
var config = {responsive: true,displaylogo: false}
var layout = {
  autosize: false,
  showlegend: true,
  title:title,
   xaxis: {
    range: [X[0], X[X.length-1]],
    type: 'date'
  },
  yaxis: {
    title: {
      text: 'S/.',         
    }
  }
};
  Plotly.newPlot(element, mainData, layout,config );

}
/*function generateSeries(type,nameSerie,vehiculo,title,element,period){
  let datos = {
    TipoQuery : type,
    value:vehiculo,
    period:period
  }


  appAjaxQuery(datos,rutaSQL).done(function(resp){
  console.log(resp)
    let returnData=[];
    let obj={};
   // let datamain={};
    //let objX=[];
    let footer=[];
  

    resp.forEach((arr)=>{
      arr.forEach((ele)=>{
        if (!footer.includes(ele.date)){
          footer.push(ele.date)
        }    
      })
    
    })    
    footer = footer.sort((a, b) => new Date(a) - new Date(b))
    console.log(footer)
    let general=[...Array(resp.length)].map(x => []);
    footer.forEach((ele)=>{
      resp.forEach((arr,index)=>{
        let idx=arr.findIndex((et)=>et.date==ele)
        if(idx!=-1){
          general[index].push(arr[idx].costo)
        }else{
          general[index].push(null)
        }                   
      })
    })
    let tmp=[...Array(general[0].length)].map(x =>0);

    general.forEach((ele)=>{
      for (let index = 0; index < ele.length; index++) {
        tmp[index]= Number(tmp[index])+Number(ele[index])
      }
    })
    if(nameSerie.length>1){
      general.push(tmp)
    }
   

    general.forEach((ele,index)=>{

      let obj={};
      obj["name"]=nameSerie[index]
      obj["data"]= ele   
      returnData.push(obj)        
    })
    console.log(returnData)
  //  console.log(footer)
  var options = {
    series: returnData,
    chart: {
    height: 350,
    type: 'line',
    toolbar: {
      show: true,
      offsetX: 0,
      offsetY: 0,
      tools: {
        download: true,
        selection: false,
        zoom: false,
        zoomin: true,
        zoomout: true,
        pan: false,
        reset: true | '<img src="/static/icons/reset.png" width="20">',
      }
    }
  },
  dataLabels: {
    enabled: false
  },
  title: {
    text: title,
    align: 'center'
  },
  legend: {
    tooltipHoverFormatter: function(val, opts) {
      return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
    }
  },
  labels:footer,
  xaxis: {
  //  categories: footer,
  },
  tooltip: {
    y: [
      {
        title: {
          formatter: function (val) {
            return val
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val;
          }
        }
      }
    ]
  },
  grid: {
    borderColor: '#f1f1f1',
  }
  };
  
  var chart = new ApexCharts(document.querySelector("#"+element), options);
  console.log(chart)
  chart.render();
  });
 // datamain["series"]=returnData;
 // datamain["footer"]=footer;
  //console.log(datamain);


}*/

function managenementGraphs(sql,type,element,periodicity=30){
  switch(type){
    case "mantenimientoAll":
      generateSeries(sql,["Mantenimiento","total"],"1","Mantenimiento",element,periodicity);          
     break;      
    case "gastoOperativoAll":
     generateSeries(sql,["Combustible","Otros Gastos","Gasto Operativo"],"1","Gasto Operativo",element,periodicity);      
    break;       
    case "combustibleAll":
     generateSeries(sql,["Gasto Operativo"],"1","Gasto Operativo",element);      
     break;  
    default:
    break;
  }
}
function generateDashBoard(dataSerie,footerSerie,title,element){

  var options = {
    series: dataSerie,
    chart: {
    height: 350,
    type: 'line',
    zoom: {
      enabled: false
    },
  },
  dataLabels: {
    enabled: false
  },
  title: {
    text: title,
    align: 'center'
  },
  legend: {
    tooltipHoverFormatter: function(val, opts) {
      return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
    }
  },
  xaxis: {
    categories: footerSerie,
  },
  tooltip: {
    y: [
      {
        title: {
          formatter: function (val) {
            return val
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val;
          }
        }
      }
    ]
  },
  grid: {
    borderColor: '#f1f1f1',
  }
  };

  var chart = new ApexCharts(document.querySelector("#"+element), options);
  console.log(chart)
  chart.render();
}
function dashboardGrafica03(){
  var options = {
    series: [{
      name: "Preventivo",
      data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
    }
  ],
    chart: {
    height: 350,
    type: 'line',
    zoom: {
      enabled: false
    },
  },
  dataLabels: {
    enabled: false
  },
  title: {
    text: 'Costos Mantenimiento',
    align: 'left'
  },
  legend: {
    tooltipHoverFormatter: function(val, opts) {
      return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
    }
  },
  xaxis: {
    categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
      '10 Jan', '11 Jan', '12 Jan'
    ],
  },
  tooltip: {
    y: [
      {
        title: {
          formatter: function (val) {
            return val
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val;
          }
        }
      }
    ]
  },
  grid: {
    borderColor: '#f1f1f1',
  }
  };

  var chart = new ApexCharts(document.querySelector("#dashboardChart03"), options);
  chart.render();
}

function dashboardGrafica04(){
  var options = {
    series: [{
      name: "Combustible",
      data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
    },
    {
      name: "Mantenimientos",
      data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
    },
    {
      name: 'Gastos',
      data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
    }
  ],
    chart: {
    height: 350,
    type: 'line',
    zoom: {
      enabled: false
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    width: [5, 7, 5],
    curve: 'straight',
    dashArray: [0, 8, 5]
  },
  title: {
    text: 'Costos Operativos',
    align: 'left'
  },
  legend: {
    tooltipHoverFormatter: function(val, opts) {
      return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
    }
  },
  markers: {
    size: 0,
    hover: {
      sizeOffset: 6
    }
  },
  xaxis: {
    categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
      '10 Jan', '11 Jan', '12 Jan'
    ],
  },
  tooltip: {
    y: [
      {
        title: {
          formatter: function (val) {
            return val + " (mins)"
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val + " per session"
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val;
          }
        }
      }
    ]
  },
  grid: {
    borderColor: '#f1f1f1',
  }
  };

  var chart = new ApexCharts(document.querySelector("#dashboardChart04"), options);
  chart.render();
}
/*
function app03GridAll(){
  $("#datos02").hide();
  $("#datos03").show();
  $('#grd01DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : '02_grid'
  };
  var table;
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      console.log(resp.tabla);
     table= $('#grd01Conductores').DataTable( {
        "sPaginationType": "simple",
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
        },
        data: resp.tabla,      
        columns: 
        [
            { data: "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                if(oData.id) {
                    $(nTd).html('<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(oData.id))+');" ><i class="fa fa-pencil"></i></button>');
                }
              }
            },
            { data: "id"},
            { data: "nombre" },
            { data: "apellidos"},
            { data: "fecha_ingreso" },
            { data: "estado_conductor"},
            { data: "empleado"},
            { data: "ciudad"},
            { data: "fecha_nacimiento"},
            { data: "telepeaje"},
            { data: "Etiqueta"},
            { data: "tipo_licencia"},
            { data: "num_licencia"},
            { data: "fecha_vencimiento"},
            { data: "grupo"}
        ]
    } );
   
      
      /* $.each(resp.tabla,function(key, valor){
          fila += '<tr>';
          fila += '<td>'+
          '<button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(valor.id))+');" ><i class="fa fa-eye"></i></button>';
 
          fila += '<td>'+(valor.id)+'</td>';
          fila += '<td>'+(valor.nombre)+'</td>';
          fila += '<td>'+(valor.placa)+'</td>';
          fila += '<td>'+(valor.serie)+'</td>';
          fila += '<td>'+(valor.estado)+'</td>';
          fila += '<td>'+(valor.tipo)+'</td>';
          
          fila += '<td>'+(valor.grupo)+'</td>';
          fila += '<td>'+(valor.odometro)+'</td>';
          fila += '<td>'+(valor.marca)+'</td>';
          fila += '<td>'+(valor.modelo)+'</td>';
          fila += '<td>'+(valor.anio)+'</td>';
          fila += '<td>'+(valor.propiedad)+'</td>';


          
          fila += '</tr>';
      });
          $('#grd01DatosBody').html(fila); 
      
    }else{
      $('#grd10DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}*/

function app04GridAll(){
  $("#datos02").hide();
  $("#datos03").show();
  $('#grd01DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : '04_grid'
  };
  var table;
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      console.log(resp.tabla);
     table= $('#opetareasVencidas').DataTable( {
        "sPaginationType": "simple",
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
        },
        data: resp.tabla,
        destroy: true,
        columns: 
        [
            { data: "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                if(oData.id) {
                    $(nTd).html('<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(oData.id))+');" ><i class="fa fa-pencil"></i></button>');
                }
              }
            },
            { data: "id", title:"ID"},
            { data: "nombre", title:"Nombre" },
            { data: "tipo", title:"Tipo" },
            { data: "fecha_limite", title:"Fecha Limite" },
            { data: "prioridad", title:"Prioridad" },
            { data: "vehiculo", title:"Vehiculo" },
            { data: "Responsable", title:"Conductor" },
            { data: "Conductor", title:"Conductor" },
            { data: "Proveedor", title:"Proveedor" }
           
        ]
    } );
   
      
      /* $.each(resp.tabla,function(key, valor){
          fila += '<tr>';
          fila += '<td>'+
          '<button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(valor.id))+');" ><i class="fa fa-eye"></i></button>';
 
          fila += '<td>'+(valor.id)+'</td>';
          fila += '<td>'+(valor.nombre)+'</td>';
          fila += '<td>'+(valor.placa)+'</td>';
          fila += '<td>'+(valor.serie)+'</td>';
          fila += '<td>'+(valor.estado)+'</td>';
          fila += '<td>'+(valor.tipo)+'</td>';
          
          fila += '<td>'+(valor.grupo)+'</td>';
          fila += '<td>'+(valor.odometro)+'</td>';
          fila += '<td>'+(valor.marca)+'</td>';
          fila += '<td>'+(valor.modelo)+'</td>';
          fila += '<td>'+(valor.anio)+'</td>';
          fila += '<td>'+(valor.propiedad)+'</td>';


          
          fila += '</tr>';
      });
          $('#grd01DatosBody').html(fila); */
      
    }else{
      $('#grd10DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}