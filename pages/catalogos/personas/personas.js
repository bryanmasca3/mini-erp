var rutaSQL = "pages/catalogos/personas/sql.php";
function addObservacionespersonas(){
    $('#table_observaciones_personas > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='class_add_observaciones_personas'><td><input type='text' class='form-control observaciones_personas'/>"+
    "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500  py-2 px-2 text-white' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addFichaPersonalProfesion(){
    $('#table_FichaPersonalProfesion > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='addFichaPersonalProfesion'><td><input type='text' class='form-control personal_profesional_data'/>"+
    "</td><td><select id='txt_ficha_personal_profesion_estado' class='form-control personal_profesional_data'><option value='-1'>Selecciona...</option> <option value='0'>UNIVERSITARIO</option><option value='1'>TÉCNICO</option><option value='2'>OTROS</option></select></td><td><select id='txt_ficha_personal_profesion_estado' class='form-control personal_profesional_data'><option value='-1'>Selecciona...</option> <option value='0'>TITULO</option><option value='1'>BACHILLER</option><option value='2'>EGRESADO</option><option  value='3'>CURSANDO</option></select></td><td><input type='text' class='form-control personal_profesional_data'/></td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500 py-2 px-2 text-white' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addFichaPersonalReferencia(){
    $('#table_FichaPersonalReferencia > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='addFichaPersonalReferencia'><td><input type='text' class='form-control personal_referencia_data'/>"+
    "</td><td><input type='text' class='form-control personal_referencia_data'/></td><td><input type='text' class='form-control personal_referencia_data'/></td><td><input type='text' class='form-control personal_referencia_data'/></td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500 py-2 px-2 text-white' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addFichaPersonalTecnica(){
    $('#table_FichaPersonalTecnica > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='addFichaPersonalTecnica'><td><input type='text' class='form-control personal_tecnica_data'/>"+
    "</td><td><select id='txt_ficha_personal_profesion_estado' class='form-control personal_tecnica_data'><option value='-1'>Selecciona...</option> <option value='0'>TITULO</option><option value='1'>EGRESADO</option><option value='2'>CURSANDO<option></select></td><td><input type='text' class='form-control personal_tecnica_data'/></td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500 py-2 px-2 text-white' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addFichaPersonalOtrosEstudios(){
    $('#table_FichaPersonalOtrosEstudios > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='addFichaPersonalOtrosEstudios'><td><input type='text' class='form-control personal_otros_estudios_data'/>"+
    "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500 py-2 px-2 text-white' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addFichaPersonalIdiomas(){
    $('#table_FichaPersonalIdiomas > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='addFichaPersonalIdiomas'><td><select  class='form-control personal_idioma_data'><option value='-1'>Selecciona...</option><option value='0'>ESPAÑOL</option><option value='1'>INGLES</option><option value='2'>PORTUGUES</option> <option value='3'>FRANCES</option></select>"+
    "</td><td><select class='form-control personal_idioma_data'><option value='-1'>Selecciona...</option><option value='0'>BASICO</option><option value='1'>INTERMEDIO</option><option value='2'>AVANZADO</option></select></td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500 py-2 px-2 text-white' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addChildren(){
    $('#table_children_personas > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='addChildren'><td><input type='text' class='form-control personal_hijos_data'/></td>"+
    "<td><input type='text' class='form-control personal_hijos_data'/></td>"+
    "<td><input type='date' class='form-control personal_hijos_data'/></td>"+
    "<td><input type='number' class='form-control personal_hijos_data'/></td>"+
    "<td><select class='form-control personal_hijos_data'><option value='-1'>Selecciona...</option><option value='0'>Masculino</option> <option value='1'>Femenino</option></select></td>"+
    "<td><input type='number' class='form-control personal_hijos_data'/></td>"+
    "<td><input type='file' class='form-control input_files_ficha_hijos'/></td>"+
    "<td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500 py-2 px-2 text-white' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
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

            // let data= $(this).find("td").children();
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
       // "<td>"+it.prioridad+"</td>"+
        "<td>"+it.observacion+"</td>"+
        "</tr>")
      })
      $('#ModalOpenRequerimiento').modal('show');   

    } );   
  }
  function generateColumnsGrid(data,ope,Enabledcolumns){
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
          if(ele.icon){
            columns.push({ddata:ele.key,title:ele.title,
          fnCreatedCell: function (nTd, sData,oData) { 
             if(sData==="0") {   
                                    
              $(nTd).html('<span class="badge"style="background:#343a40">&nbsp;</span>');
              
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
          }else{
            columns.push({data:ele.key,title:ele.title})
          }
          
        }    
      })
    }
    columns.push({data:'id',title:'',
    fnCreatedCell: function (nTd, sData, oData, iRow, iCol) { 
      let dd=sData.toString()
      let contentOpe="";
  
          contentOpe+=ope.print.state?'<button class="fa fa-print btn btn-success btn-xs"'+
                                      'onclick='+ope.print.funct+'("'+dd+'"); type="button"></button>':''
          contentOpe+=ope.view.state?'<button class="fa fa-eye bg-cyan-500 py-2 px-2 text-white"'+
                                      'onclick='+ope.view.funct+'("'+dd+'"); type="button"></button>':''
          contentOpe+=ope.edit.state?'<button class="fa fa-pencil btn btn-warning btn-xs"'+
                                      'onclick='+ope.edit.funct+'("'+dd+'"); type="button"></button>':''
          contentOpe+=ope.delet.state?'<button class="fa fa-trash bg-rose-500 py-2 px-2 text-white"'+
                                      'onclick='+ope.delet.funct+'("'+dd+'"); type="button"></button>':''
  
          $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;">'+contentOpe+'</div>');
      
    }})
  
    console.log(columns)
    return columns
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
  function generateGrid(querySQL,IdgridTable,ope,Enabledcolumns,IdparentSearch,searchColumns,params=null,order=1){
    let datos={
      TipoQuery : querySQL,
      value : params,
    }
    var table;
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp)
      if(resp.data.length>0){
       let dataCols=generateColumnsGrid(resp.column,ope,Enabledcolumns);
  
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
  function updateGrid(grid){
    switch (grid) {
      case "gridOrdenCompraGrid":
        generateGrid(
          "sqlOrdenDeCompraGrid",
          "gridOrdenDeComprahtml",
          {
            print:{state:1,funct:"generatepdfOrdenCompra"},
            view:{state:1,funct:"OpenModalOrdenCompra"},
            edit:{state:1,funct:""},
            delet:{state:1,funct:""},
          },
          [
  
          ],"searchOrdenDeComprahtml",[            
            "Nº Orden de Compra",         
            "Nº de Requerimiento",
            "Fecha",
            "Estado"
          ],"1",0
        );
      break;  
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
          ["Nº Requerimiento",
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
          ],null,1,1
        );
      break;   
      case "gridProveedorCategory":
        generateGrid(
          "sqlCategoryProveedorGrid",
          "gridProveedorCategoryhtml",
          {
            print:{state:0,funct:""},
            view:{state:0,funct:""},
            edit:{state:1,funct:""},
            delet:{state:1,funct:"modalDeleteCategoryProveedor"},
          },
          [
  
          ],"searchProveedorCategoryhtml",[            
            "N",         
            "area",
            "prioridad",
            "estado",
          ],"1",0
        );
      break;   
      case "gridAlmacenGrid":
        generateGrid(
          "sqlAlmacenGrid",
          "gridAlmacenhtml",
          {
            print:{state:0,funct:""},
            view:{state:0,funct:""},
            edit:{state:1,funct:""},
            delet:{state:1,funct:"modalDeleteAlmacen"},
          },
          [
  
          ],"searchAlmacenhtml",[
            "N° de Almacen",
            "Descripción",
            "Direccion",
            "Responsable"
          ],"1",0
        );
      break;        
      case "gridItemsGrid":
        generateGrid(
          "sqlItemsGrid",
          "gridItemshtml",
          {
            print:{state:0,funct:""},
            view:{state:0,funct:""},
            edit:{state:1,funct:""},
            delet:{state:1,funct:"modalDeleteItem"},
          },
          [
  
          ],"searchItemshtml",[
            "Activo",
            "Serie",
            "Fecha de Adquisicion",
            "Condicion"
          ],"1",0
        );
      break;   
      case "gridGroupGrid":
        generateGrid(
          "sqlGroupGrid",
          "gridGrouphtml",
          {
            print:{state:0,funct:""},
            view:{state:0,funct:""},
            edit:{state:1,funct:""},
            delet:{state:0,funct:""},
          },
          [
  
          ],"searchGrouphtml",[
            "Grupo",
            "Descripcion"         
          ],"1",0
        );
      break;     
      case "gridGroupClassGrid":
        generateGrid(
          "sqlGroupClassGrid",
          "gridGroupClasshtml",
          {
            print:{state:0,funct:""},
            view:{state:0,funct:""},
            edit:{state:1,funct:""},
            delet:{state:0,funct:""},
          },
          [
  
          ],"searchGroupClasshtml",[
            "Codigo",
            "Grupo",
            "Descripcion"            
          ],"1",0
        );
      break;      
      case "gridProveedorGrid":
        generateGrid(
          "sqlProveedorGrid",
          "gridProveedorhtml",
          {
            print:{state:0,funct:""},
            view:{state:0,funct:""},
            edit:{state:1,funct:""},
            delet:{state:1,funct:"modalDeleteCategoryProveedor"},
          },
          [
  
          ],"searchProveedorhtml",[
            "N",
            "Nombre",
            "Categoria",
            "Tipo"
          ],"1",0
        );
      break;    
      default:
        break;
    }
  }
  function add_Requerimientos(){

    let datos = {
      TipoQuery : 'sql_get_last_requerimiento'      
    };                
   appAjaxQuery(datos,rutaSQL).done(function(dat){   
    let id=Number(dat.tabla.id)+1;
    let Maindata=[      
      {title:"n_requerimiento",element:"",type:"text",status:0,value:"RQ-CM-2022-"+id},
      {title:"area",element:"",type:"text",status:0,value:"7"},
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

  function loadSelectedGestionPersonasArea(){
    let datos = {
      TipoQuery : '03_selected_gestionPersona_area'   
    };      
    appAjaxQuery(datos,rutaSQL).done(function(resp){   
      console.log(resp);
    $.each(resp[0], function(i, item) {
      $('#personas_select_area').append($("<option>", {
          value: item.id,
          text: item.descripcion,    
      }));
    });
  });
  }
  function loadSelectedGestionPersonasMotivo(){
    let datos = {
      TipoQuery : '03_selected_gestionPersona_motivo'   
    };      
    appAjaxQuery(datos,rutaSQL).done(function(resp){   
      console.log(resp);
    $.each(resp[0], function(i, item) {
      $('#personas_select_motivo').append($("<option>", {
          value: item.id,
          text: item.descripcion,    
      }));
    });
  });
  }
  function removeChildFormPasajeros(id){
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
  function search_postulante(){

    var msn=$('#txt_search_postulante').val();
    let datos = {
      TipoQuery : '02_search_aspirante_without_personal',
      value:msn     
    };      
    appAjaxQuery(datos,rutaSQL).done(function(resp){    
      if(resp.error){
        swal("No se encontro incidencia para el DNI o ya se encuentra registrado en el Personal", {
          icon: "warning",
        });
      }else{
        
        swal("Has seleccionado a: "+resp.tabla.nombres+" "+resp.tabla.apellidos+"", {
          icon: "success",
        });

        $("#idpostulanteHidden").val(resp.tabla.id);
        $('#txt_search_name_postulante').val(resp.tabla.nombres);
        $('#txt_search_apellido_postulante').val(resp.tabla.apellidos);  
        $('#txt_search_dni_postulante').val(resp.tabla.dni);  
        $('#txt_search_telefono_postulante').val(resp.tabla.telefono);  
      }
    });
  }
  function search_personal_reeferencia(){

    var msn=$('#txt_search_aspirante').val();
    let datos = {
      TipoQuery : '02_search_aspirante',
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

        $("#idAspiranteHidden").val(resp.tabla.id);
        $('#txt_search_name_aspirante').val(resp.tabla.nombres);
        $('#txt_search_apellido_aspirante').val(resp.tabla.apellidos);  
      }
    });
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

  function search_Personal(){

    var msn=$('#txt_search_personal').val();
    let datos = {
      TipoQuery : '02_search_personal',
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

        $("#idPersonalHidden").val(resp.tabla.id);
        $('#txt_search_name_personal').val(resp.tabla.nombres);
        $('#txt_search_apellido_personal').val(resp.tabla.apellidos);  
      }
    });
  }


  function searchForGestionPersonalVacante(){
    var msn=$('#txt-modal-gestion-personas-vacante-search').val();
    let datos = {
      TipoQuery : '02_search_vacante_gestion_personas',
      value:msn,
      req:$("#txt-modal-gestion-personas-vacante-requerimiento").val()     
    };          
    appAjaxQuery(datos,rutaSQL).done(function(resp){    
      if(resp.error){
        swal("No se encontro incidencia para el DNI", {
          icon: "warning",
        });
      }else{
        
        swal("Has seleccionado correctamente", {
          icon: "success",
        });
        console.log(resp)
        $('#table_gestion_personas_vacante > tbody').empty();
        $("#txt-modal-gestion-personas-id-personal").val(resp.tabla1.id)
        $("#txt-modal-gestion-personas-id-cargo").val(resp.tabla0.id_cargo)
      
        let tr="";
        resp.tabla.forEach((ele)=>{
            tr+="<tr id='"+(new Date()).getTime()+"'>"
            tr+="<td>"+ele.nombres+"</td>"
            tr+="<td>"+ele.apellidos+"</td>"
            tr+="<td>"+ele.dni+"</td>"
            tr+="<td>"+ele.puesto_al_postular+"</td>"
            tr+="<td>"+ele.puesto_actual+"</td>"
            tr+="</tr>"
        })
        
        if (!tr) {
          tr="<tr><td colspan='6'><p style='text-align: center'>El registro seleccionado no ocupa ningun puesto actualmente.</p></td></tr>";
        }

        $('#table_gestion_personas_vacante > tbody').append(tr)

        $('#button_add_gestion_personas_vacante').show()


            
      }
    });
  }
function addvacanteForGestionPersonal(){

  let Maindata=[     
    {title:"search",element:"txt-modal-gestion-personas-vacante-search",type:"text",status:1,value:"val"}, 
    {title:"id_personal",element:"txt-modal-gestion-personas-id-personal",type:"text",status:1,value:"val"},
    {title:"id_cargo",element:"txt-modal-gestion-personas-id-cargo",type:"text",status:1,value:"val"},   
    {title:"id_requerimiento",element:"txt-modal-gestion-personas-vacante-requerimiento",type:"text",status:1,value:"val"},     
  ]
  if(validate(Maindata)){
    swal("Completa todos los campos", {
      icon: "error",
    });
  }else{      
    //console.log(Maindata)
    
        let datos = {
          TipoQuery : 'sql_add_vacante_gestion_personal',
          data:generateInsertData(Maindata)
        };                
       appAjaxQuery(datos,rutaSQL).done(function(resp){   
            
        let datos = {
          TipoQuery : 'sql_add_vacante_gestion_personal_update',
          data:{
            type:Number(resp.table1.n_vacantes)-1==Number(resp.table1.n_cumplidos)?true:false,
            req:$("#txt-modal-gestion-personas-vacante-requerimiento").val(),
            n:resp.table1.n_vacantes,
            c:Number(resp.table1.n_cumplidos)+1
          }, 
        };                
       appAjaxQuery(datos,rutaSQL).done(function(resp){   
                           
            ResetAndUpdateGrid(Maindata);
            gridSecondRequerimientos();
            $('#modal_gestionPersonasSearch').modal('hide')     
            $('#table_gestion_personas_vacante > tbody').empty();
           // $('#txt-modal-gestion-personas-vacante-requerimiento').val("");
          
            swal("Insertado correctamente", {
              icon: "success",
            });   
            
        }); 
                           
        }); 
  }
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
       // $('#txt_solicitante_pretencion_salarial').val(resp.tabla.pretencion_salarial);
       // $('#txt_solicitante_dni').val(resp.tabla.dni);
      }
    });
  }
function insert_registro_referencia_laboral(){
  if(validarcamposNuevoReferenciaLaboral()){
    swal("Completa todos los campos", {
      icon: "error",
    });
  }else{
    var checkbox1=$(".check_referencia_laboral_recomendaciones:radio:checked").map(function(){return $(this).attr('id');}).get();    
    

        let datos = {
          TipoQuery : '03_save_register_referencia_laboral',
          data:{
            id:(new Date()).getTime(),
            id_aspirante: $('#idAspiranteHidden').val(),            
            nombresReferente: $('#txt_referencia_laboral_referente_nombres').val(),
            apellidosReferente:$('#txt_referencia_laboral_referente_apellidos').val(),
            
            telefonoReferente: $('#txt_referencia_laboral_referente_telefono').val(),
            cargoReferente: $('#txt_referencia_laboral_referente_cargo').val(),      
            empresaReferente: $('#txt_referencia_laboral_referente_empresa').val(),

            respuestas:[ $('#ReferenciaLaboralPreguntasCriterio_1').val(),
             $('#ReferenciaLaboralPreguntasCriterio_2').val(),
             $('#ReferenciaLaboralPreguntasCriterio_3').val(),
             $('#ReferenciaLaboralPreguntasCriterio_4').val(),
             $('#ReferenciaLaboralPreguntasCriterio_5').val(),
             $('#ReferenciaLaboralPreguntasCriterio_6').val(),
             $('#ReferenciaLaboralPreguntasCriterio_7').val(),
             $('#ReferenciaLaboralPreguntasCriterio_8').val(),
             $('#ReferenciaLaboralPreguntasCriterio_9').val(),
             $('#ReferenciaLaboralPreguntasCriterio_10').val(),
            checkbox1[0]]                                       
          },
        };    
      //console.log(datos)
       appAjaxQuery(datos,rutaSQL).done(function(resp){   
        swal("Se ha registrado correctamente", {
          icon: "success",
        });
            gridReferenciaLaboral();
            resetCaFieldsReferenciaLaboral();         
                           
        }); 
  }

}

function insert_registro_entrevistas(){
   
    if(validarcamposNuevoRegistroEntrevista()){
        swal("Completa todos los campos", {
          icon: "error",
        });
      }else{          
        $("#button_insert_registro_entrevistas").prop( "disabled", true);
        var checkbox1=$(".check_gestion_entrevista:radio:checked").map(function(){return $(this).attr('id');}).get();    
        var checkbox2=$(".check_otros_entrevistas:radio:checked").map(function(){return $(this).attr('id');}).get();    

            let datos = {
              TipoQuery : '03_save_register_entrevista',
              data:{
                id:(new Date()).getTime(),  
                nombre: $('#txt_entrevistas_nombres').val(),
                apellido: $('#txt_entrevistas_apellidos').val(),
                dni: $('#txt_entrevistas_dni').val(),
                puesto:$('#txt_entrevistas_puesto').val(),
                
                edad: $('#txt_entrevistas_edad').val(),
                fecha_nacimiento: $('#txt_entrevistas_fecha').val(),      
               // estadi_civil: $('#txt_entrevistas_civil').val(),

                correo: $('#txt_entrevistas_correo').val(),
                telefono: $('#txt_entrevistas_telefono').val(),
                pretencion_salarial	: $('#txt_entrevistas_pretenciones').val(),
                gestion:{
                  ids:[1,2,3],//RELACION A LA DB
                  data:checkbox1},
                otros:{
                  ids:[4,5,6],
                  data:checkbox2}                                   
              },
            };    
         
           appAjaxQuery(datos,rutaSQL).done(function(resp){   
            
            if(resp.table1 &&resp.table2&&resp.table3){
              swal("Se ha registrado correctamente", {
                icon: "success",
              });                            
                  resetCaFieldsPersonasEntrevista();      
                  gridEntrevistas();                                                             
            }else{
              swal({
                title: "No se lograron insertar algunos datos",
                text: "Comunícate con soporte técnico para recibir ayuda.",
                icon: "warning",
                dangerMode: true,
              })
            }
            $("#button_insert_registro_entrevistas").prop( "disabled", false);
          }); 
         }
  
  }
  function insert_registro_personas(){
    
    if(validarcamposNuevoRegistroPersonas()){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{          
                     
          var observaciones=$('#table_observaciones_personas > tbody').find(".observaciones_personas").map(function(){return $(this).val();}).get();    
     
          let datos = {
            TipoQuery : '03_save_register_people',
            data:{
              id:(new Date()).getTime(),
              id_personal: $('#idsolicitanteHidden').val(),
              cargo: $('#txt_cargo_personas').val(),
              n_vacantes: $('#txt_n_vacantes_personas').val(),
    
              area: $('#personas_select_area').val(),
              contrato: $('#personas_select_contrato').val(),      
              id_motivo: $('#personas_select_motivo').val(),
    
              lugar_trabajo: $('#personas_select_lugar').val(),
              duracion_trabajo: $('#personas_select_duracion').val(),
              fecha_incorporacion: $('#txt_fecha_g_personas').val(),
    
              remuneracion: $('#personas_remuneracion').val(),
              observaciones:observaciones,
             
            },
          };    
        console.log(datos)
         appAjaxQuery(datos,rutaSQL).done(function(resp){   
          swal("Se ha registrado correctamente", {
            icon: "success",
          });
          resetCapacitacionFieldsPersonas();         
          gridSecondRequerimientos();
          });             
       }

     
  }
  function HistorialRequerimientosPersonas(){
  
    $("#NuevoRegistroPersonas").hide();
    $("#HistorialRequerimientosPersonas").show();

    $("#link_NuevoRegistroPersonas").removeClass("active");
    gridSecondRequerimientos();

    $("#link_HistorialRequerimientosPersonas").addClass("active");
    //gridFirst();
  }
  function HistorialReferenciaLaboral(){
  
    $("#NuevoRegistroReferenciaLaboral").hide();
    $("#HistorialReferenciaLaboral").show();

    $("#link_NuevoRegistroReferenciaLaboral").removeClass("active");
    
    gridReferenciaLaboral()
    $("#link_HistorialReferenciaLaboral").addClass("active");
    
  }
  function NuevoRegistroReferenciaLaboral(){
  
    $("#HistorialReferenciaLaboral").hide();
    $("#NuevoRegistroReferenciaLaboral").show();

    $("#link_HistorialReferenciaLaboral").removeClass("active");    
    $("#link_NuevoRegistroReferenciaLaboral").addClass("active");    
  }
  
  function HistorialFichaPersonal(){
  
    $("#NuevoRegistroFichaPersonal").hide();
    $("#HistorialFichaPersonal").show();
    gridFichaPersonal();
    $("#link_NuevoRegistroFichaPersonal").removeClass("active");    
    $("#link_HistorialFichaPersonal").addClass("active");    
  }
  function NuevoRegistroFichaPersonal(){
  
    $("#HistorialFichaPersonal").hide();
    $("#NuevoRegistroFichaPersonal").show();

    $("#link_HistorialFichaPersonal").removeClass("active");    
    $("#link_NuevoRegistroFichaPersonal").addClass("active");    
  }
  function HistorialProgramaCapacitacion(){
  
    $("#NuevoProgramaCapacitacion").hide();
    $("#HistorialProgramaCapacitacion").show();
    gridProgramacionCapacitacion();
    $("#link_NuevoProgramaCapacitacion").removeClass("active");    
    $("#link_HistorialProgramaCapacitacion").addClass("active");    
  }
  function NuevoProgramaCapacitacion(){
  
    $("#HistorialProgramaCapacitacion").hide();
    $("#NuevoProgramaCapacitacion").show();

    $("#link_HistorialProgramaCapacitacion").removeClass("active");    
    $("#link_NuevoProgramaCapacitacion").addClass("active");    
  }
  function HistorialEntrevistaPersonas(){
    $("#NuevoRegistroEntrevistaPersonas").hide();
    $("#HistorialEntrevistaPersonas").show();

    $("#link_NuevoRegistroEntrevistaPersonas").removeClass("active");
    gridEntrevistas();

    $("#link_HistorialEntrevistaPersonas").addClass("active");
  }
  function NuevoRegistroEntrevistaPersonas(){
    $("#HistorialEntrevistaPersonas").hide();
    $("#NuevoRegistroEntrevistaPersonas").show();

    $("#link_HistorialEntrevistaPersonas").removeClass("active");
    

    $("#link_NuevoRegistroEntrevistaPersonas").addClass("active");
}
  function NuevoRegistroPersonas(){
  
    $("#HistorialRequerimientosPersonas").hide();
    $("#NuevoRegistroPersonas").show();

    $("#link_HistorialRequerimientosPersonas").removeClass("active");
    

    $("#link_NuevoRegistroPersonas").addClass("active");
    //gridFirst();
  }
  
  function gridReferenciaLaboral(){
    let datos = {
        TipoQuery : '01_gridReferenciaLaboral'
      };
      let idx=1;
      var table;   
      appAjaxQuery(datos,rutaSQL).done(function(resp){
       
        if(resp.tabla.length>0){      
         table= $('#grd01ReferenciaLaboral').DataTable( {         
            "sPaginationType": "simple",
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            
            data: resp.tabla,
            destroy: true,
            columns: 
            [
             
              { data: "id", fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                if(oData.id) {                                         
                      $(nTd).html(idx++);
                }
              }},        
                { data: "nombrescandidato" },
                { data: "nombresreferente" },     
                { data: "telefono" },  
                { data: "empresa" },  
                //{ data: "cargo" },                                  
                { data: "id",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                 /* if(oData.id) {                      
                      $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print bg-indigo-500 py-2 px-2 text-white" type="button" onclick="pdf_ReferenciaLaboral('+oData.id+')"></button><button class="fa fa-trash bg-rose-500 py-2 px-2 text-white" type="button" onclick="modalDeleteReferenciaLaboral('+oData.id+')">');
                  }*/
                  if(oData.id) {                      
                    $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print bg-indigo-500 py-2 px-2 text-white" type="button" onclick="pdf_ReferenciaLaboral('+oData.id+')"></button>');
                }
                }
              }
            ]
        }
         );     
        
         table.columns().eq( 0 ).each( function ( colIdx ) {
           
          var parent= $("#RegistroReferenciaLaboralSearch");      
          var child= parent.find("#"+colIdx);    
          child.on('keyup', function() {          
                table
                .column( colIdx )
                .search(child.val(), false, true)
                .draw();
        })   
  
      } );   
        }   
      });
  }


  function gridFichaPersonal(){
    let datos = {
        TipoQuery : '01_gridFichaPersonal'
      };
      var table;   
      appAjaxQuery(datos,rutaSQL).done(function(resp){
       
        if(resp.tabla.length>0){      
         table= $('#grd01FichaPersonal').DataTable( {         
            "sPaginationType": "simple",
        
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            
            data: resp.tabla,
            destroy: true,
            columns: 
            [
             
                //{ data: "id"},          
                { data: "nombrescandidato" },
                { data: "dni" },                                                     
                { data: "dni_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                 if(oData.dni_file_name){
                  if(sData==="0") {   
                                  
                    $(nTd).html('<span class="badge"style="margin:auto;display:block;width:20px;height:20px;background:#343a40" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"0"+')"></span>');
                    
                  }else if(sData==="1") {            
                    $(nTd).html('<span class="badge"style="margin:auto;display:block;width:20px;height:20px;background:#28a745" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"0"+')"></span>');
                  
                  }  
                    else if(sData==="2") {                    
                      $(nTd).html('<span class="badge"style="margin:auto;display:block;width:20px;height:20px;background:#ffc107" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"0"+')"></span>');
                  }  
                    else{          
                      $(nTd).html('<span class="badge"style="margin:auto;display:block;width:20px;height:20px;background:#dc3545" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"0"+')"></span>');        
                   
                  }  
                 }else{
                  $(nTd).html('<div></div>')
                }
             

                } },    
                { data: "licencia_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                 if(oData.licencia_file_name){
                  if(sData==="0") {   
                                  
                    $(nTd).html('<span class="badge"style="margin:auto; display:block;width:20px;height:20px;background:#343a40" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"1"+')"></span>');
                    
                  }else if(sData==="1") {            
                    $(nTd).html('<span class="badge"style="margin:auto; display:block;width:20px;height:20px;background:#28a745" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"1"+')"></span>');
                  
                  }  
                    else if(sData==="2") {                    
                      $(nTd).html('<span class="badge"style="margin:auto; display:block;width:20px;height:20px;background:#ffc107" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"1"+')"></span>');
                  }  
                    else{          
                      $(nTd).html('<span class="badge"style="margin:auto; display:block;width:20px;height:20px;background:#dc3545" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"1"+')"></span>');        
                   
                  } 
                 }else{
                  $(nTd).html('<div></div>')
                }
                 

                }  },    
                { data: "licencia_esp_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(oData.licencia_esp_file_name){
                    if(sData==="0") {   
                                  
                      $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"2"+')"></span>');
                      
                    }else if(sData==="1") {            
                      $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"2"+')"></span>');
                    
                    }  
                      else if(sData==="2") {                    
                        $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"2"+')"></span>');
                    }  
                      else{          
                        $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"2"+')"></span>');        
                     
                    } 
                  }else{
                    $(nTd).html('<div></div>')
                  }
                    
                }  },   
                { data: "sctr_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                    if(oData.sctr_file_name){
                      if(sData==="0") {   
                                  
                        $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"3"+')"></span>');
                        
                      }else if(sData==="1") {            
                        $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"3"+')"></span> ');
                      
                      }  
                        else if(sData==="2") {                    
                          $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"3"+')"></span> ');
                      }  
                        else{          
                          $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"3"+')"></span> ');        
                       
                      }   
                    }else{
                      $(nTd).html('<div></div>')
                    }
                

                }  },    
                { data: "seguro_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                      if(oData.seguro_file_name){
                        if(sData==="0") {   
                                  
                          $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"4"+')"></span>');
                          
                        }else if(sData==="1") {            
                          $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"4"+')"></span>');
                        
                        }  
                          else if(sData==="2") {                    
                            $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"4"+')"></span>');
                        }  
                          else{          
                            $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"4"+')"></span>');        
                         
                        }   
                      }else{
                        $(nTd).html('<div></div>')
                      }
           

                }  },    
                { data: "policial_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                    if(oData.policial_file_name){
                      if(sData==="0") {   
                                  
                        $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"5"+')"></span>');
                        
                      }else if(sData==="1") {            
                        $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"5"+')"></span>');
                      
                      }  
                        else if(sData==="2") {                    
                          $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"5"+')"></span>');
                      }  
                        else{          
                          $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"5"+')"></span>');        
                       
                      }   
                    }else{
                      $(nTd).html('<div></div>')
                    }
              


                }  },    
                { data: "judicial_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(oData.judicial_file_name){
                    if(sData==="0") {   
                                  
                      $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"6"+')"></span>');
                      
                    }else if(sData==="1") {            
                      $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"6"+')"></span>');
                    
                    }  
                      else if(sData==="2") {                    
                        $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"6"+')"></span>');
                    }  
                      else{          
                        $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"6"+')"></span>');        
                     
                    }  
                  }else{
                    $(nTd).html('<div></div>')
                  }
                 

                }  },    
                { data: "penal_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                    if(oData.penal_file_name){
                      if(sData==="0") {   
                                  
                        $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"7"+')"></span>');
                        
                      }else if(sData==="1") {            
                        $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"7"+')"></span>');
                      
                      }  
                        else if(sData==="2") {                    
                          $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"7"+')"></span>');
                      }  
                        else{          
                          $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"7"+')"></span>');        
                       
                      }   
                    }else{
                      $(nTd).html('<div></div>')
                    }
                

                }  },    
                { data: "trabajo_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(oData.trabajo_file_name){
                    if(sData==="0") {   
                                  
                      $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"8"+')"></span>');
                      
                    }else if(sData==="1") {            
                      $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"8"+')"></span>');
                    
                    }  
                      else if(sData==="2") {                    
                        $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"8"+')"></span>');
                    }  
                      else{          
                        $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"8"+')"></span>');        
                     
                    }   
                  }else{
                    $(nTd).html('<div></div>')
                  }
           

                }  },  
                { data: "medico_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(oData.medico_file_name){
                    if(sData==="0") {   
                                  
                      $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"9"+')"></span>');
                      
                    }else if(sData==="1") {            
                      $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"9"+')"></span>');
                    
                    }  
                      else if(sData==="2") {                    
                        $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"9"+')"></span>');
                    }  
                      else{          
                        $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"9"+')"></span>');        
                     
                    } 
                  }else{
                    $(nTd).html('<div></div>')
                  }
               

                }  },    
                { data: "lice_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(oData.lice_file_name){
                    if(sData==="0") {   
                                  
                      $(nTd).html('<span class="badge" style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"10"+')"></span>');
                      
                    }else if(sData==="1") {            
                      $(nTd).html('<span class="badge" style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"10"+')"></span>');
                    
                    }  
                      else if(sData==="2") {                    
                        $(nTd).html('<span class="badge" style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"10"+')"></span>');
                    }  
                      else{          
                        $(nTd).html('<span class="badge" style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"10"+')"></span>');        
                     
                    }   
                  }else{
                    $(nTd).html('<div></div>')
                  }
               
                
                }  },    
                { data: "id",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(oData.id) {                      
                      /*$(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print bg-indigo-500 py-2 px-2 text-white" type="button" onclick="pdf_FichaPersonal('+oData.id+')"></button><button class="fa fa-trash bg-rose-500 py-2 px-2 text-white" type="button" onclick="modalDeleteFichaPersonal('+oData.id+')">');*/
                      $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print bg-indigo-500 py-2 px-2 text-white" type="button" onclick="pdf_FichaPersonal('+oData.id+')"></button>');
                  }
                }
              }
            ]
        }
         );     
        
         table.columns().eq( 0 ).each( function ( colIdx ) {
           
          var parent= $("#HistorialFichaPersonal");      
          var child= parent.find("#"+colIdx);    
          child.on('keyup', function() {          
                table
                .column( colIdx )
                .search(child.val(), false, true)
                .draw();
        })   
  
      } );   
        }   
      });
  }
function pdf_FichaPersonal(id){
  console.log(id);
  let datos = {
    TipoQuery : '03_pdf_Ficha_Personal',
    value:id 
  }
 // var hashmap = new Map();
 appAjaxQuery(datos,rutaSQL).done(function(resp){  
    console.log(resp)
    if(resp.tabla9.length){
      var data=[];
      resp.tabla9.forEach((row)=>{
        var dataRow = {};
        dataRow['idioma']=row.idioma;
     
        for (let i = 0; i < 3; i++) {
          if(row.nivel==i){
            dataRow[i]="X";
          }else{
            dataRow[i]="";
          }
        }
        data.push(dataRow);

      })
      resp.tabla9=data;
    }
    console.log(resp)
 var docDefinition = {     
    content: [
   
{
table: {
widths: ['15%', '65%', '10%', '10%'],
// heights: [10,10,10,10,30,10,25],
 headerRows: 1,
 body: [
     [
       {
         
         text: 'LOGO',              
     
         fontSize: 8,
         alignment: 'center',
         rowSpan:3
       } , 
         {
           text: 'FORMATO',              
           bold: true,
           fontSize: 10,
           alignment: 'center'
         },
         { 
           text: 'CODIGO:',              
  
           fontSize: 8,
           alignment: 'center'
         },
         {
             text: 'SSOMA-F-01',
             fontSize: 8
     
         }
     ],
     [
       {               
       }, 
       {
         text: 'REQUERIMIENTO DE PERSONAL',
         rowSpan: 2,              
         bold: true,
         fontSize: 12,
         alignment: 'center'
       },
       { 
         text: 'Versión :',              
      
         fontSize: 8
       },
       {
           text: '01',
           fontSize: 8
     
       }
   ],                  
   [
     {               
     }, 
     {
   
     },
     { 
       text: 'F. de Aprobn:',              
       fontSize: 8
     },
     {
         text: '01/02/02',
         fontSize: 8

     }
 ],  


 ]
}
},  
{           
  text: 'A) DATOS GENERALES',              
  fontSize: 10,
  margin: [ 0, 30, 0, 5 ] ,
  bold: true
  }
  ,
  
{
  table: {
    widths: ['15%', '20%','15%','20%','15%','15%'],
     headerRows: 1,
     body: [
         [
           {             
             text: 'Nombre y Apellidos:',                       
             fontSize: 8,          
             bold: true,          
           } 
           ,              
            {  
              text: resp.tabla1[0].nombres,                       
              fontSize: 8,                     
              colSpan:5                    
             },{},{},{},{}
          
         ],
         [
          {             
            text: 'Fecha y Lugar de Nacimiento:',                       
            fontSize: 8,          
            bold: true,          
          } 
          ,              
           {  
             text: resp.tabla1[0].fecha_nacimiento+" / "+resp.tabla1[0].lugar_nacimiento ,                       
             fontSize: 8,                     
             colSpan:5                    
            },{},{},{},{}
       ],
       [
        {             
          text: 'Distrito:',                       
          fontSize: 8,          
          bold: true,          
        } 
        ,              
         {  
           text: resp.tabla1[0].distrito,                       
           fontSize: 8,                                                  
          },
          {
            text: 'Provincia:',                       
            fontSize: 8,          
            bold: true,   
          },
          {
            text: resp.tabla1[0].provincia,                       
            fontSize: 8, 
          },
          {
            text: 'Dpto:',                       
            fontSize: 8,          
            bold: true,  
          },
          {
            text: resp.tabla1[0].departamento,                       
            fontSize: 8,
          }
     ],
     [
      {             
        text: 'DNI. N°:',                       
        fontSize: 8,          
        bold: true,          
      } 
      ,              
       {  
         text: resp.tabla1[0].dni,                       
         fontSize: 8,                                                  
        },
        {
          text: 'Teléf. Fijo:',                       
          fontSize: 8,          
          bold: true,   
        },
        {
          text: resp.tabla1[0].telefono,                       
          fontSize: 8, 
        },
        {
          text: 'Celular:',                       
          fontSize: 8,          
          bold: true,  
        },
        {
          text: resp.tabla1[0].celular,                       
          fontSize: 8,
        }
   ],
   /*[
    {             
      text: 'Correo Electrónico:',                       
      fontSize: 8,          
      bold: true,          
    } 
    ,              
     {  
       text: '',                       
       fontSize: 8,                     
       colSpan:5                    
      },{},{},{},{}
  ],  */                  
  [
    {             
      text: 'Domicilio:',                       
      fontSize: 8,          
      bold: true,          
    } 
    ,              
     {  
       text: resp.tabla1[0].domicilio,                       
       fontSize: 8,                     
       colSpan:5                    
      },{},{},{},{}
  ],
  [
    {             
      text: 'Urbanización:',                       
      fontSize: 8,          
      bold: true,          
     
    } 
    ,{
      text: resp.tabla1[0].urbanizacion,                       
      fontSize: 8,          
      colSpan:2
    },{},              
     {  
       text: 'Distrito:',                       
       fontSize: 8,      
       bold: true,                
       colSpan:3                    
      },
      {
        text: resp.tabla1[0].distrito_domicilio,                       
      fontSize: 8,          
      colSpan:2
      },{}
      ],
     
      [
        {             
          text: 'Estado Civil:',                       
          fontSize: 8,          
          bold: true,          
        } 
        ,              
         {  
           text: resp.tabla1[0].estado_civil,                       
           fontSize: 8,                                                  
          },
          {
            text: 'Edad:',                       
            fontSize: 8,          
            bold: true,   
          },
          {
            text: resp.tabla1[0].edad,                       
            fontSize: 8, 
          },
          {
            text: 'Nº Hijos:',                       
            fontSize: 8,          
            bold: true,  
          },
          {
            text: '',                       
            fontSize: 8,
          }
     ],
      
     [
      {             
        text: 'Sexo:',                       
        fontSize: 8,          
        bold: true,          
      } 
      ,              
       {  
         text: resp.tabla1[0].sexo,                       
         fontSize: 8,                                                  
        },
        {
          text: 'Talla:',                       
          fontSize: 8,          
          bold: true,   
        },
        {
          text: resp.tabla1[0].talla,                       
          fontSize: 8, 
        },
        {
          text: 'Contextura:',                       
          fontSize: 8,          
          bold: true,  
        },
        {
          text: resp.tabla1[0].contextura,                       
          fontSize: 8,
        }
   ]
     ]
  }
  },
  
{           
  text: 'B) OTROS DATOS',              
  fontSize: 10,
  margin: [ 0, 30, 0, 5 ] ,
  bold: true
},
{
  table: {
    widths: ['25%', '25%','25%','25%'],
     headerRows: 1,
     body: [
         [
            {             
              text: 'RUC:',                       
              fontSize: 8,          
              bold: true,          
            }  
            ,              
            {  
              text: resp.tabla1[0].ruc,                       
              fontSize: 8,                                                       
            },
            { 
              text: 'AUTOGENERADO',                       
              fontSize: 8,          
              bold: true,  
            },
            {
              text: '',                       
              fontSize: 8,  
            }          
         ],
         [
          {             
            text: 'SSALUD:',                       
            fontSize: 8,          
            bold: true,          
          }  
          ,              
          {  
            text: resp.tabla1[0].essalud,                       
            fontSize: 8,  
            colSpan:3                                                     
          },
          {           
          },
          {          
          }          
       ],
       [
        {             
          text: 'ONP/AFP:',                       
          fontSize: 8,          
          bold: true,          
        }  
        ,              
        {  
          text: resp.tabla1[0].onp,                       
          fontSize: 8,  
          colSpan:3                                                     
        },
        {           
        },
        {          
        }          
     ],
     [
      {             
        text: 'CUSSPP:',                       
        fontSize: 8,          
        bold: true,          
      }  
      ,              
      {  
        text: resp.tabla1[0].cusp,                       
        fontSize: 8,                                                       
      },
      { 
        text: 'FECHA AFILIACIÓN',                       
        fontSize: 8,          
        bold: true,  
      },
      {
        text: resp.tabla1[0].fecha_afiliacion,                       
        fontSize: 8,  
      }          
   ],                           

     ]
  }
  },
  {           
    text: 'C) INSTRUCCIÓN',              
    fontSize: 10,
    margin: [ 0, 30, 0, 5 ] ,
    bold: true
  },
  {
    table: {
      widths: ['25%', '25%','25%','25%'],
       headerRows: 1,
       body: buildTableBody(['descripcion','tipo','estado','lugar'],resp.tabla7, [
        { 
        
           text: 'PROFESION',               
           bold: true,          
           fontSize: 8,                    
       },
       { 
        
        text: 'NIVEL',               
        bold: true,          
        fontSize: 8,                    
        }
        ,
          { 

          text: 'ESTADO',               
          bold: true,          
          fontSize: 8,                    
          },
          { 

          text: 'LUGAR',               
          bold: true,          
          fontSize: 8,                    
          }
                                                                   
     ])
      
    }
    },
    {           
      text: 'D) IDIOMAS',              
      fontSize: 10,
      margin: [ 0, 30, 0, 5 ] ,
      bold: true
    },
    {
      table: {
        widths: ['25%', '25%','25%','25%'],
         headerRows: 1,
         body:buildTableBody(['idioma','0','1','2'],resp.tabla9, [
          { 
          
             text: 'IDIOMA',               
             bold: true,          
             fontSize: 8,                    
         },
         { 
          
          text: 'BASICO',               
          bold: true,          
          fontSize: 8,                    
          }
          ,
            { 

            text: 'INTERMEDIO',               
            bold: true,          
            fontSize: 8,                    
            },
            { 

            text: 'AVANZADO',               
            bold: true,          
            fontSize: 8,                    
            }
                                                                     
       ])
         
      }
      },
      {           
        text: 'E) REFERENCIAS LABORALES',              
        fontSize: 10,
        margin: [ 0, 30, 0, 5 ] ,
        bold: true
      },
      {
        table: {
          widths: ['25%', '25%','25%','25%'],
           headerRows: 1,
           body:buildTableBody(['nombre','cargo','telefono','empresa'],resp.tabla10, [
            { 
            
               text: 'NOMBRE Y APELLIDOS',               
               bold: true,          
               fontSize: 8,                    
           },
           { 
            
            text: 'CARGO',               
            bold: true,          
            fontSize: 8,                    
            },
              { 
  
              text: 'TELEFONO',               
              bold: true,          
              fontSize: 8,                    
              },
              { 
  
              text: 'EMPRESA',               
              bold: true,          
              fontSize: 8,                    
              }
                                                                       
         ])
           
        }
        },

        
        {           
          text: 'F) DATOS DEL CÓNYUGE O CONVIVIENTE',              
          fontSize: 10,
          margin: [ 0, 30, 0, 5 ] ,
          bold: true
        },
        {
          table: {
            widths: ['15%', '20%','15%','20%','15%','15%'],
             headerRows: 1,
             body: [
                 [
                   {             
                     text: 'Nombre y Apellidos:',                       
                     fontSize: 8,          
                     bold: true,          
                   } 
                   ,              
                    {  
                      text: resp.tabla2.length?resp.tabla2[0].nombres:"",                       
                      fontSize: 8,                     
                      colSpan:5                    
                     },{},{},{},{}
                  
                 ],

                 [
                  {             
                    text: 'Fecha y Lugar de Nacimiento:',                       
                    fontSize: 8,          
                    bold: true,          
                  } 
                  ,              
                   {  
                     text: resp.tabla2.length?resp.tabla2[0].fecha+" / "+resp.tabla2[0].lugar_nacimiento:"",                       
                     fontSize: 8,                     
                     colSpan:3                    
                    },{},{},
                    {
                      text: 'Edad:',                       
                      fontSize: 8,          
                      bold: true,  
                    },
                    {
                      text: '',                       
                      fontSize: 8,                                           
                    }
               ],
               [
                {             
                  text: 'Distrito:',                       
                  fontSize: 8,          
                  bold: true,          
                } 
                ,              
                 {  
                   text: resp.tabla2.length?resp.tabla2[0].distrito:"",                       
                   fontSize: 8,                                                  
                  },
                  {
                    text: 'Provincia:',                       
                    fontSize: 8,          
                    bold: true,   
                  },
                  {
                    text: resp.tabla2.length?resp.tabla2[0].provincia:"",                       
                    fontSize: 8, 
                  },
                  {
                    text: 'Dpto:',                       
                    fontSize: 8,          
                    bold: true,  
                  },
                  {
                    text: resp.tabla2.length?resp.tabla2[0].departamento:"",                       
                    fontSize: 8,
                  }
             ],
             [
              {             
                text: 'DNI. N°:',                       
                fontSize: 8,          
                bold: true,          
              } 
              ,              
               {  
                 text: resp.tabla2.length?resp.tabla2[0].dni:"",                       
                 fontSize: 8,                                                  
                },
                {
                  text: 'RUC:',                       
                  fontSize: 8,          
                  bold: true,   
                },
                {
                  text: resp.tabla2.length?resp.tabla2[0].ruc:"",                       
                  fontSize: 8, 
                },
                {
                  text: 'AUTOGENERADO:',                       
                  fontSize: 8,          
                  bold: true,  
                },
                {
                  text: '',                       
                  fontSize: 8,
                }
           ],
           [
            {             
              text: 'Profesión:',                       
              fontSize: 8,          
              bold: true,          
            } 
            ,  
            {
              text: resp.tabla2.length?resp.tabla2[0].profesion:"",                       
              fontSize: 8,   
              colSpan:2
            },          
              {},
             {  
               text: 'Ocupación',                       
               fontSize: 8, 
               bold: true,                                                      
              },
              {
                text: resp.tabla2.length?resp.tabla2[0].ocupacion:"",                       
                fontSize: 8,   
                colSpan:2
              },{}
          ],                    
           [
            {             
              text: 'Centro de Trabajo Actual:',                       
              fontSize: 8,          
              bold: true,          
            } 
            ,              
             {  
               text: resp.tabla2.length?resp.tabla2[0].centro_lsboral:"",                       
               fontSize: 8,                     
               colSpan:5                    
              },{},{},{},{}
          ],
         [
            {             
              text: 'Dirección:',                       
              fontSize: 8,          
              bold: true,          
             
            } 
            ,{
              text: resp.tabla2.length?resp.tabla2[0].direccion:"",                       
              fontSize: 8,          
              colSpan:5
            },{},              
             {                                   
              },
              {
               
              },{}
              ],
             
              [
                {             
                  text: 'Teléfono:',                       
                  fontSize: 8,          
                  bold: true,          
                } 
                ,              
                 {  
                   text: resp.tabla2.length?resp.tabla2[0].telefono:"",                       
                   fontSize: 8,                                                  
                   colSpan:2,  
                  },{},
                  {
                    text: 'Celular:',                       
                    fontSize: 8,          
                    bold: true,   
                  },
                  {
                    text: resp.tabla2.length?resp.tabla2[0].celular:"",                       
                    fontSize: 8, 
                    colSpan:2, 
                  },
                  {
                 
                  }
                  
             ],
                        
             ]
          }
          },
          
          {           
            text: 'G) DATOS DE LOS PADRES',              
            fontSize: 10,
            margin: [ 0, 30, 0, 5 ] ,
            bold: true
          },
          {
            table: {
              widths: ['25%', '25%','25%','25%'],
               headerRows: 1,
               body: [
                   [
                     {             
                       text: 'Nombre y Apellidos (Padre):',                       
                       fontSize: 8,          
                       bold: true,          
                     } 
                     ,              
                      {  
                        text: resp.tabla3.length?resp.tabla3[0].nombres_padre:"",                       
                        fontSize: 8,                     
                        colSpan:3                  
                       },{},{}
                    
                   ],
                   [
                    {             
                      text: 'Centro de Trabajo: ',                       
                      fontSize: 8,          
                      bold: true,          
                    } 
                    ,              
                     {  
                       text:resp.tabla3.length?resp.tabla3.trabajo_padre:"",                       
                       fontSize: 8,                     
                                     
                      },
                      {
                        text: 'Ocupación: ',                       
                        fontSize: 8,          
                        bold: true,  
                      },
                      {
                        text: resp.tabla3.length?resp.tabla3.ocupacion_padre:"",                       
                        fontSize: 8, 
                      }
                 ],
                 [
                  {             
                    text: 'Dirección: ',                       
                    fontSize: 8,          
                    bold: true,          
                  } 
                  ,              
                   {  
                     text: resp.tabla3.length?resp.tabla3.direccion_padre:"",                       
                     fontSize: 8,                     
                      colSpan:3
                    },
                    {
                     
                    },
                    {
                    
                    }
               ],
               [
                {             
                  text: 'Teléfono: ',                       
                  fontSize: 8,          
                  bold: true,          
                } 
                ,              
                 {  
                   text: resp.tabla3.length?resp.tabla3.telefono_padre:"",                       
                   fontSize: 8,                     
                                 
                  },
                  {
                    text: 'Celular: ',                       
                    fontSize: 8,          
                    bold: true,  
                  },
                  {
                    text: resp.tabla3.length?resp.tabla3.celular_padre:"",                       
                    fontSize: 8, 
                  }
             ],
             [
              {             
                text: 'Nombre y Apellidos (Madre):',                       
                fontSize: 8,          
                bold: true,          
              } 
              ,              
               {  
                 text: resp.tabla3.length?resp.tabla3.nombres_madre:"",                       
                 fontSize: 8,                     
                 colSpan:3                  
                },{},{}
             
            ],
            [
             {             
               text: 'Centro de Trabajo: ',                       
               fontSize: 8,          
               bold: true,          
             } 
             ,              
              {  
                text: resp.tabla3.length?resp.tabla3.trabajo_madre:"",                       
                fontSize: 8,                     
                              
               },
               {
                 text: 'Ocupación: ',                       
                 fontSize: 8,          
                 bold: true,  
               },
               {
                 text: resp.tabla3.length?resp.tabla3.ocupacion_madre:"",                       
                 fontSize: 8, 
               }
          ],
          [
           {             
             text: 'Dirección: ',                       
             fontSize: 8,          
             bold: true,          
           } 
           ,              
            {  
              text:  resp.tabla3.length?resp.tabla3.direccion_madre:"",                       
              fontSize: 8,                     
               colSpan:3
             },
             {
              
             },
             {
             
             }
        ],
        [
         {             
           text: 'Teléfono: ',                       
           fontSize: 8,          
           bold: true,          
         } 
         ,              
          {  
            text:  resp.tabla3.length?resp.tabla3.telefono_madre:"",                       
            fontSize: 8,                     
                          
           },
           {
             text: 'Celular: ',                       
             fontSize: 8,          
             bold: true,  
           },
           {
             text: resp.tabla3.length?resp.tabla3.celular_madre:"",                       
             fontSize: 8, 
           }
      ],
            ]
            }
            },

            {           
              text: 'H) DATOS DE LOS HIJOS',              
              fontSize: 10,
              margin: [ 0, 30, 0, 5 ] ,
              bold: true
            },
            {
              table: {
                widths: ['25%', '25%','15%','15%','20%'],
                 headerRows: 1,
                 body:buildTableBody(['nombres','fecha_nacimiento','edad','sexo','dni'],resp.tabla11, [
                  { 
                  
                     text: 'Nombres y Apellidos',               
                     bold: true,          
                     fontSize: 8,                    
                 },
                 { 
                  
                  text: 'Fecha Nacimiento',               
                  bold: true,          
                  fontSize: 8,                    
                  },
                    { 
        
                    text: 'Edad',               
                    bold: true,          
                    fontSize: 8,                    
                    },
                    { 
        
                    text: 'Sexo',               
                    bold: true,          
                    fontSize: 8,                    
                    },
                    { 
        
                      text: 'N° DNI ',               
                      bold: true,          
                      fontSize: 8,                    
                      }
                                                                             
               ])
                 
              }
              },
              {           
                text: 'I) PERSONA A LLAMAR EN CASO DE EMERGENCIA',              
                fontSize: 10,
                margin: [ 0, 30, 0, 5 ] ,
                bold: true
              },
              {
                table: {
                  widths: ['25%', '25%','25%','25%'],
                   headerRows: 1,
                   body: [
                       [
                         {             
                           text: 'Nombre y Apellidos:',                       
                           fontSize: 8,          
                           bold: true,          
                         } 
                         ,              
                          {  
                            text: resp.tabla4.length?resp.tabla4.nombres:"",                       
                            fontSize: 8,                     
                            colSpan:3                  
                           },{},{}
                        
                       ],
                       [
                        {             
                          text: 'Parentesco: ',                       
                          fontSize: 8,          
                          bold: true,          
                        } 
                        ,              
                         {  
                           text: resp.tabla4.length?resp.tabla4.parentesco:"",                       
                           fontSize: 8,                     
                                         
                          },
                          {
                            text: 'Teléfonos: ',                       
                            fontSize: 8,          
                            bold: true,  
                          },
                          {
                            text: resp.tabla4.length?resp.tabla4.telefono:"",                       
                            fontSize: 8, 
                          }
                     ],                                                                           
                ]
                }
                },
                {           
                  text: 'J) MOVILIDAD ',              
                  fontSize: 10,
                  margin: [ 0, 30, 0, 5 ] ,
                  bold: true
                },
                {
                  table: {
                    widths: ['20%','10%', '10%','10%', '5%','20%','15%','10%'],
                     headerRows: 1,
                     body: [
                         [
                           {             
                             text: 'Posee Movilidad Propia:',                       
                             fontSize: 8,          
                             bold: true,          
                           } 
                           ,              
                            {  
                              text: 'SI',                       
                              fontSize: 8,                                                                    
                             },
                             {
                              text: resp.tabla5.length?resp.tabla5[0].movilidad=="1"?'X':"":"",                       
                              fontSize: 8,    
                             },
                             {
                              text: 'NO',                       
                              fontSize: 8,
                             },
                             {
                              text: resp.tabla5.length?resp.tabla5[0].movilidad=="0"?'X':"":"",                       
                              fontSize: 8,
                             },
                             {             
                              text: 'Nro. De Licencia de Conducir:',                       
                              fontSize: 8,          
                              bold: true,          
                            },
                            {
                              text: resp.tabla5.length?resp.tabla5[0].licencia_conducir:'',                       
                              fontSize: 8,
                              colSpan:2
                            },{}
                          
                         ],
                         [
                          {             
                            text: 'Tipo de vehículo:',                       
                            fontSize: 8,          
                            bold: true,          
                          } 
                          ,              
                           {  
                             text: resp.tabla5.length?resp.tabla5[0].tipo_vehiculo:'',                       
                             fontSize: 8,                                                                    
                            },
                            {
                             text: 'Marca',                       
                             fontSize: 8,    
                            },
                            {
                             text: resp.tabla5.length?resp.tabla5[0].marca:'',                       
                             fontSize: 8,
                            },
                            {
                             text: 'Año',                       
                             fontSize: 8,
                            },
                            {             
                             text: resp.tabla5.length?resp.tabla5[0].anio:'',                       
                             fontSize: 8,          
                             bold: true,          
                           },
                           {
                             text: 'Placa',                       
                             fontSize: 8,
                           },
                           {
                            text: resp.tabla5.length?resp.tabla5[0].placa:'',                       
                            fontSize: 8,
                          }
                         
                        ]
                        
                                                                                                 
                  ]
                  }
                  },
                  {           
                    text: 'K) ANTECEDENTES: Policiales y/o Penal:',              
                    fontSize: 10,
                    margin: [ 0, 30, 0, 5 ] ,
                    bold: true
                  },
                  {
                    table: {
                      widths: ['50%','50%'],
                       headerRows: 1,
                       body: [
                           [
                             {             
                               text: 'Ha sido detenido y/o enjuiciado en alguna oportunidad:',                       
                               fontSize: 8,          
                               bold: true,          
                             } 
                             ,              
                              {  
                                text: resp.tabla6.length?resp.tabla6[0].O_1:"",                       
                                fontSize: 8,                                                                    
                               }
                             
                            
                           ],
                           [
                            {             
                              text: 'Dependencia Policial donde sufrió la detención: ',                       
                              fontSize: 8,          
                              bold: true,          
                            } 
                            ,              
                             {  
                               text: resp.tabla6.length?resp.tabla6[0].O_2:"",                       
                               fontSize: 8,                                                                    
                              }
                         ],   [
                          {             
                            text: 'Juzgado que vió su caso:',                       
                            fontSize: 8,          
                            bold: true,          
                          } 
                          ,              
                           {  
                             text: resp.tabla6.length?resp.tabla6[0].O_3:"",                       
                             fontSize: 8,                                                                    
                            }
                       ],
                       [
                        {             
                          text: 'Motivo:',                       
                          fontSize: 8,          
                          bold: true,          
                        } 
                        ,              
                         {  
                           text: resp.tabla6.length?resp.tabla6[0].O_4:"",                       
                           fontSize: 8,                                                                    
                          }
                     ]                                                                         
                    ]
                    }
                    },
                    {           
                      text: 'Afirmo bajo mi responsabilidad que las anotaciones efectuadas en el presente formulario son correctas y que no he omitido intencionalmente ningún dato sobre las preguntas contenidas en el mismo. Si se descubriera posteriormente su inexactitud la empresa se reserva el derecho de prescindir de mis servicios. ',              
                      fontSize: 8,                      
                      alignment: 'center',
                      margin: [ 0, 30, 0, 5 ] ,                      
                    }
],
  defaultStyle: {
  }
};
pdfMake.createPdf(docDefinition).open(); 
})

}


  function pdf_ModalAddControlDateFichaPersonal(id,type){
    let datos = {
      TipoQuery : '01_get_pdf_file',
      value:id,
      type:type
    };  
    var table;   
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp)
        $("#txt_id_type_pdf_Ficha_Personal").val(resp.tabla1.id_personal)
        $("#txt_id_name_pdf_ficha_personal").val(resp.tabla1.nombre); 
        $("#txt_id_type").val(resp.tabla1.type); 
        $('#modal_FichaPersonal').modal('show');
        //$('#modal_ProgramaCapacitacion').modal('hide');
        
    } ); 
 
  }
  function enabledStatePadres(state,padre=0,madre=0){
    if(!state){
      $(".forDisabledStatusPadre").addClass("disabled");
    }else{
      if(padre=="1"){
        $("#txt_Ficha_Personal_padre_nombre").prop( "disabled", true );
        $("#txt_Ficha_Personal_padre_apellido").prop( "disabled", true );
        $("#txt_Ficha_Personal_padre_centro").prop( "disabled", true );
        $("#txt_Ficha_Personal_padre_ocupacion").prop( "disabled", true );
        $("#txt_Ficha_Personal_padre_direccion").prop( "disabled", true );
        $("#txt_Ficha_Personal_padre_telefono").prop( "disabled", true );
        $("#txt_Ficha_Personal_padre_celular").prop( "disabled", true );
      }else{
        $("#txt_Ficha_Personal_padre_nombre").prop( "disabled", false );
        $("#txt_Ficha_Personal_padre_apellido").prop( "disabled", false );
        $("#txt_Ficha_Personal_padre_centro").prop( "disabled", false );
        $("#txt_Ficha_Personal_padre_ocupacion").prop( "disabled", false );
        $("#txt_Ficha_Personal_padre_direccion").prop( "disabled", false );
        $("#txt_Ficha_Personal_padre_telefono").prop( "disabled", false );
        $("#txt_Ficha_Personal_padre_celular").prop( "disabled", false );
      }
      if(madre=="1"){
        $("#txt_Ficha_Personal_madre_nombres").prop( "disabled", true );
        $("#txt_Ficha_Personal_madre_apellidos").prop( "disabled", true );
        $("#txt_Ficha_Personal_madre_centro").prop( "disabled", true );
        $("#txt_Ficha_Personal_madre_ocupacion").prop( "disabled", true );
        $("#txt_Ficha_Personal_madre_direccion").prop( "disabled", true );
        $("#txt_Ficha_Personal_madre_telefono").prop( "disabled", true );
        $("#txt_Ficha_Personal_madre_celular").prop( "disabled", true );
      }else{
        $("#txt_Ficha_Personal_madre_nombres").prop( "disabled", false );
        $("#txt_Ficha_Personal_madre_apellidos").prop( "disabled", false );
        $("#txt_Ficha_Personal_madre_centro").prop( "disabled", false );
        $("#txt_Ficha_Personal_madre_ocupacion").prop( "disabled", false );
        $("#txt_Ficha_Personal_madre_direccion").prop( "disabled", false );
        $("#txt_Ficha_Personal_madre_telefono").prop( "disabled", false );
        $("#txt_Ficha_Personal_madre_celular").prop( "disabled", false );
      }
      $(".forDisabledStatusPadre").removeClass("disabled");
    }

  }
  function enabledButtonConyuge(value){
    if(value){
      $(".forDisabled").removeClass("disabled");
      
    }else{
      $(".forDisabled").addClass("disabled");
      
    }
    
  }
  function enabledButtonMovilidad(value){
    console.log(value)
    $("#check_Ficha_Personal_licencia").prop( "disabled", value );
    $("#check_Ficha_Personal_tipo_vehiculo").prop( "disabled", value );
    $("#check_Ficha_Personal_tipo_marca").prop( "disabled", value );
    $("#check_Ficha_Personal_tipo_anio").prop( "disabled", value );
    $("#check_Ficha_Personal_tipo_placa").prop( "disabled", value );
  }
  function enabledButtonAPenalesJudiciales(value){
    console.log(value)
    $("#Ficha_Personal_antecedentes_1").prop( "disabled", value );
    $("#Ficha_Personal_antecedentes_2").prop( "disabled", value );
    $("#Ficha_Personal_antecedentes_3").prop( "disabled", value );
    $("#Ficha_Personal_antecedentes_4").prop( "disabled", value );
  }
  function insert_modal_date_Ficha_Personal(){
    let datos = {
      TipoQuery : '01_get_insert_values_date',
      data:{
        type:$("#txt_id_type").val(),
        fecha_emi:$("#txt_ficha_Personal_emi_modal").val(),
        fecha_cadu:$("#txt_ficha_Personal_cadu_modal").val(),
        id:$("#txt_id_type_pdf_Ficha_Personal").val()
      }
    };  
   
    console.log(datos)
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      gridFichaPersonal();
      $('#modal_FichaPersonal').modal('hide');

      $("#txt_ficha_Personal_emi_modal").val("");
      $("#txt_ficha_Personal_cadu_modal").val("");
      $("#txt_id_name_pdf_ficha_personal").val("");

      swal("Insertado correctamente", {
        icon: "success",
      });
     
      
  } ); 

  }
function gridEntrevistas(){
    let datos = {
        TipoQuery : '01_gridEntrevistasPersonas'
      };
      let idx=1;
      var table;   
      appAjaxQuery(datos,rutaSQL).done(function(resp){
       
        if(resp.tabla.length>0){      
         table= $('#grd01EntrevistaHistorial').DataTable({         
            "sPaginationType": "simple",
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            
            data: resp.tabla,
            destroy: true,
            columns: 
            [
             
                { data: "id", fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(oData.id) {                                         
                        $(nTd).html(idx++);
                  }
                }},          
                { data: "nombres" },
                { data: "dni" },                
                { data: "estado" },            
                { data: "id",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(oData.id) {                      
                   
                        $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print bg-indigo-500 py-2 px-2 text-white" type="button" onclick="pdf_EntrevsitasPersona('+oData.id+')"></button>');
                  }
                }
              }
            ]
        }
         );     
        
         table.columns().eq( 0 ).each( function ( colIdx ) {
           
          var parent= $("#RegistroEntrevistaPersonasSearch");      
          var child= parent.find("#"+colIdx);    
          child.on('keyup', function() {          
                table
                .column( colIdx )
                .search(child.val(), false, true)
                .draw();
        })   
  
      } );   
        }   
       // idx++;
      });
  }
function gridSecondRequerimientos(){
    let datos = {
        TipoQuery : '01_gridRequerimientosPersonas'
      };
      var table;   
      appAjaxQuery(datos,rutaSQL).done(function(resp){
        console.log(resp)
        if(resp.tabla.length>0){      
         table= $('#grd01RequerimientosHistorial').DataTable( {         
            "sPaginationType": "simple",
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            },
            
            data: resp.tabla,
            destroy: true,
            columns: 
            [
             
                //{ data: "id"},          
                { data: "area" },
                { data: "cargo" },                        
                { data: "vacantes" },
                { data: "cumplidos" },
                { data: "motivo" },
                { data: "estado" },
                { data: "id",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  console.log(oData.estado_id)
                  if(oData.id) {
                    
                    //  $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print bg-indigo-500 py-2 px-2 text-white" type="button" onclick="pdf_requerimientoPersona('+oData.id+')"></button><button class="fa fa-trash bg-rose-500 py-2 px-2 text-white" type="button" onclick="modalDeleteRequerimientoPersona('+oData.id+')">');
                    $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-hand-pointer-o bg-violet-500 py-2 px-2 text-white" type="button" '+(oData.estado_id==5?"disabled":"")+' onclick="modalGestionPersonasSearchAdd('+oData.id+')"></button><button class="fa fa-eye bg-cyan-500 py-2 px-2 text-white" type="button" onclick="modalGestionPersonas('+oData.id+')"></button><button class="fa fa-print bg-indigo-500 py-2 px-2 text-white" type="button" onclick="pdf_requerimientoPersona('+oData.id+')"></button>');
                  }
                }
              }
            ]
        }
         );     
        
         table.columns().eq( 0 ).each( function ( colIdx ) {
           
          var parent= $("#RegistroRequerimientosPersonasSearch");      
          var child= parent.find("#"+colIdx);    
          child.on('keyup', function() {          
                table
                .column( colIdx )
                .search(child.val(), false, true)
                .draw();
        })   
  
      } );   
        }   
      });
      
}
function pdf_requerimientoPersona(id){

    let datos = {
      TipoQuery : '03_pdf_requerimiento_persona',
      id:id 
    }
    console.log(id)
   // var hashmap = new Map();
    appAjaxQuery(datos,rutaSQL).done(function(resp){  
      console.log(resp)  
    
    var docDefinition = {     
      content: [
     
{
table: {
  widths: ['15%', '65%', '10%', '10%'],
  // heights: [10,10,10,10,30,10,25],
   headerRows: 1,
   body: [
       [
         {
           
           text: 'LOGO',              
       
           fontSize: 8,
           alignment: 'center',
           rowSpan:3
         } , 
           {
             text: 'FORMATO',              
             bold: true,
             fontSize: 10,
             alignment: 'center'
           },
           { 
             text: 'CODIGO:',              
    
             fontSize: 8,
             alignment: 'center'
           },
           {
               text: 'SSOMA-F-01',
               fontSize: 8
       
           }
       ],
       [
         {               
         }, 
         {
           text: 'REQUERIMIENTO DE PERSONAL',
           rowSpan: 2,              
           bold: true,
           fontSize: 12,
           alignment: 'center'
         },
         { 
           text: 'Versión :',              
        
           fontSize: 8
         },
         {
             text: '01',
             fontSize: 8
       
         }
     ],                  
     [
       {               
       }, 
       {
     
       },
       { 
         text: 'F. de Aprobn:',              
         fontSize: 8
       },
       {
           text: '01/02/02',
           fontSize: 8
 
       }
   ],  

 
   ]
}
},  
{           
  text: 'I. DATOS DEL SOLICITANTE',              
  fontSize: 10,
  margin: [ 0, 30, 0, 5 ] ,
  bold: true
}
,
{
  table: {
    widths: ['25%', '25%','25%','25%'],
     headerRows: 1,
     body: [
         [
           {             
             text: 'Nombre y Apellidos:',                       
             fontSize: 8,          
             bold: true,          
           } 
           ,              
            {  
              text: resp.tabla1.nombres,                       
              fontSize: 8,                     
              colSpan:3                    
             },{},{}
          
         ],
         [
          {             
            text: 'Cargo:',                       
            fontSize: 8,          
            bold: true,          
          } 
          ,              
           {  
             text: resp.tabla1.cargo_s,                       
             fontSize: 8                                                
            },{
              text: 'Área/Departamento:',                       
              fontSize: 8,          
              bold: true,  
            },{
              text: resp.tabla1.area_s,                       
              fontSize: 8 
            }
       ],                  

     ]
  }
  },
  {           
    text: 'II. DATOS GENERALES DEL PUESTO',              
    fontSize: 10,
    margin: [ 0, 30, 0, 5 ] ,
    bold: true
  },
  {
    table: {
      widths: ['25%', '25%','25%','25%'],
       headerRows: 1,
       body: [
           [
             {             
               text: 'Cargo:',                       
               fontSize: 8,          
               bold: true,          
             }  

             ,              
              {  
                text: resp.tabla1.cargo,                       
                fontSize: 8,                                                       
               },{ text: 'N° de Vacantes:',                       
               fontSize: 8,          
               bold: true,  
              },{
                text: resp.tabla1.vacante,                       
                fontSize: 8,  
              }
            
           ]                        
  
       ]
    }
    },
    {           
      text: '',              
      fontSize: 10,
      margin: [ 0, 0, 0, 10 ] ,
      bold: true
    },
    {
      table: {
        widths: ['20%','5%','20%','5%','20%','5%','20%','5%'],
         headerRows: 1,
         body: [
             [
               {             
                 text: 'Tipo:',                       
                 fontSize: 8,          
                 bold: true,          
               } 
               ,              
                {  
                  text: '',                       
                  fontSize: 8                    
                                   
                 },{
                  text: 'Administrativo :',                       
                  fontSize: 8,          
                  bold: true,   
                 },{
                  text: '',                       
                  fontSize: 8,                    
                  
                 },{
                  text: 'Operativo :',                       
                  fontSize: 8,          
                  bold: true,   
                 },{
                  text: '',                       
                  fontSize: 8,                    
                  
                 },{
                  text: 'Práctica :',                       
                  fontSize: 8,          
                  bold: true,   
                 },{
                  text: 'X',                       
                  fontSize: 8,                                      
                 }
              
             ],
             [
              {             
                text: 'Plazo de Contrato :',                       
                fontSize: 8,          
                bold: true,          
              } 
              ,              
               {  
                 text: 'X',                       
                 fontSize: 8                    
                                  
                },{
                 text: 'Permanente :',                       
                 fontSize: 8,          
                 bold: true,   
                },{
                 text:  resp.tabla1.contrato=="0"?'X':'',                       
                 fontSize: 8,                    
                 
                },{
                 text: 'Temporal :',                       
                 fontSize: 8,          
                 bold: true,   
                },{
                 text: resp.tabla1.contrato=="1"?'X':'',                       
                 fontSize: 8,                    
                 
                },{
                 text: 'Otro (especificar) :',                       
                 fontSize: 8,          
                 bold: true,   
                },{
                 text: resp.tabla1.contrato=="2"?'X':'',                       
                 fontSize: 8,                                      
                }
           ],                  
    
         ]
      }
      },
      {           
        text: '',              
        fontSize: 10,
        margin: [ 0, 0, 0, 10 ] ,
        bold: true
      },
      {
        table: {
          widths: ['40%','10%','40%','10%'],
           headerRows: 1,
           body: [
               [
                 {             
                   text: 'Motivo del Pedido',                       
                   fontSize: 8,          
                   bold: true,     
                   colSpan:4     
                 } 
                 ,              
                  {                                                                      
                   },{                                                                      
                  },{                                                                      
                  }
                
               ],
               [
                {             
                  text: 'Renuncia del titular',                       
                  fontSize: 8,          
                  bold: true                        
                } 
                ,              
                  {                                                            text: resp.tabla1.motivo=="0"?'X':'',                       
                  fontSize: 8,            
                  },{                                                           text: 'Licencia de Maternidad',                       
                  fontSize: 8,          
                  bold: true           
                 },{                                                            text: resp.tabla1.motivo=="4"?'X':'',                       
                 fontSize: 8,     
                 }
             ],                  
             [
              {             
                text: 'Cancelación del contrato',                       
                fontSize: 8,          
                bold: true                        
              } 
              ,              
                {                                                            text: resp.tabla1.motivo=="1"?'X':'',                       
                fontSize: 8,            
                },{                                                           text: 'Incapacidad',                       
                fontSize: 8,          
                bold: true           
               },{                                                            text: resp.tabla1.motivo=="5"?'X':'',                       
               fontSize: 8,     
               }
           ],
           [
            {             
              text: 'Se crea un nuevo cargo*',                       
              fontSize: 8,          
              bold: true                        
            } 
            ,              
              {                                                            text: resp.tabla1.motivo=="2"?'X':'',                       
              fontSize: 8,            
              },{                                                           text: 'Vacaciones',                       
              fontSize: 8,          
              bold: true           
             },{                                                            text: resp.tabla1.motivo=="6"?'X':'',                       
             fontSize: 8,     
             }
         ],
         [
          {             
            text: 'Promoción, traslado, Licencia',                       
            fontSize: 8,          
            bold: true                        
          } 
          ,              
            {                                                            text: resp.tabla1.motivo=="3"?'X':'',                       
            fontSize: 8,            
            },{                                                           text: 'Incremento de actividades',                       
            fontSize: 8,          
            bold: true           
           },{                                                            text: resp.tabla1.motivo=="7"?'X':'',                       
           fontSize: 8,     
           }
       ]
           ]
        }
        },{           
          text: 'III. CONDICIONES DEL PUESTO',              
          fontSize: 10,
          margin: [ 0, 30, 0, 5 ] ,
          bold: true
        }, 
        {
          table: {
            widths: ['15%','15%','10%','15%','10%','20%','15%'],
             headerRows: 1,
             body: [
                 [
                   {             
                     text: 'Lugar de trabajo: ',                       
                     fontSize: 8,          
                     bold: true,     
             
                   } 
                   ,              
                    {  
                    text: 'Moquegua: ',                       
                    fontSize: 8,           bold: true,                                                             
                     },{                                        text: resp.tabla1.lugar=="0"?'X':'',                       
                     fontSize: 8,               
                    }, 
                    {  
                      text: 'Proyecto: ',                       
                      fontSize: 8,                  bold: true,                                                      
                       },{                                                     text: resp.tabla1.lugar=="1"?'X':'',                       
                       fontSize: 8,               
                      },
                      {  
                        text: 'Duración Estimada: : ',                       
                        fontSize: 8,       bold: true,                                                                 
                         },{                                    text: resp.tabla1.duracion,                       
                         fontSize: 8,               
                        },
                 ],
                 [
                  {             
                    text: 'Fecha deseable de incorporación:',                       
                    fontSize: 8,          
                    bold: true,     
            
                  } 
                  ,              
                   {  
                   text: resp.tabla1.fecha,                       
                   fontSize: 8,           
                   bold: true,  
                   colSpan:4                                                           
                    },
                    {},{},{},
                    {                                                          text: 'Remuneración a ofrecer: ',                       
                    fontSize: 8,                  
                    bold: true,                                
                   },
                   {text: 'S/. ' +resp.tabla1.remuneracion,                       
                   fontSize: 8 }
               ],                                                 
             ]
          }
          },
          {           
            text: 'IV. OBSERVACIONES Y RECOMENDACIONES',              
            fontSize: 10,
            margin: [ 0, 30, 0, 5 ] ,
            bold: true
          }, 
          {
            table: {
              widths: ['100%'],
               headerRows: 1,
               body: buildTableBody(['descripcion'],resp.tabla2, [
               { 
               
                  text: 'DESCRIPCION ',               
                  bold: true,          
                  fontSize: 8,                    
              }
                                                                          
            ])
            }
            },
            ,{           
              text: 'V. FIRMAS',              
              fontSize: 10,
              margin: [ 0, 30, 0, 5 ] ,
              bold: true
            }, 
],
    defaultStyle: {
    }
};
pdfMake.createPdf(docDefinition).open();  
})

}
function buildTableBody(header,data, columns) {
  var body = [];

  body.push(columns);
  data.forEach(function(row) {
      var dataRow = [];

      header.forEach(function(column) {
        if(row[column]){
          dataRow.push({text:row[column].toString(),bold: false,fontSize: 8});
        }else{
          dataRow.push({text:'',fontSize: 8});
        }
         
      })

      body.push(dataRow);
  });

  return body;
}

function pdf_ReferenciaLaboral(id){
  let datos = {
    TipoQuery : '03_pdf_referencia_laboral_persona',
    id:id 
  }
 // var hashmap = new Map();
  appAjaxQuery(datos,rutaSQL).done(function(resp){  
    console.log(resp)  
    let dataResponde={
      "nombresCandidato":resp.tabla1[0].nombresCandidato,
      "nombresReferente":resp.tabla1[0].nombresReferente,
      "telefono":resp.tabla1[0].telefono,
      "cargo":resp.tabla1[0].cargo,
      "empresa":resp.tabla1[0].empresa,     
      "respuesta": resp.tabla1.map((it,idx)=>(it.respuesta))
    }
  var docDefinition = {     
    content: [
   
      {
        table: {
        widths: ['15%', '65%', '10%', '10%'],
        // heights: [10,10,10,10,30,10,25],
         headerRows: 1,
         body: [
             [
               {
                 
                 text: 'LOGO',              
             
                 fontSize: 8,
                 alignment: 'center',
                 rowSpan:3
               } , 
                 {
                   text: 'VERIFICACIÓN DE REFERENCIA LABORAL ',              
                   bold: true,
                   fontSize: 10,
                   rowSpan:2,
                   alignment: 'center'
                 },
                 { 
                   text: 'CODIGO:',              
          
                   fontSize: 8,
                   alignment: 'center'
                 },
                 {
                     text: 'SSOMA-F-01',
                     fontSize: 8
             
                 }
             ],
             [
               {               
               }, 
               {         
               },
               { 
                 text: 'Versión :',              
              
                 fontSize: 8
               },
               {
                   text: '01',
                   fontSize: 8
             
               }
           ],                  
           [
             {               
             }, 
             {
           
             },
             { 
               text: 'F. de Aprobn:',              
               fontSize: 8
             },
             {
                 text: '01/02/02',
                 fontSize: 8
        
             }
         ],  
        
        
         ]
        }
        }
,
{           
  text: '',              
  fontSize: 10,
  margin: [ 0, 15, 0, 5 ] ,
  bold: true
},
{
table: {
  widths: ['25%', '25%','25%','25%'],
   headerRows: 1,
   body: [   
       [
         {             
           text: 'Nombre del candidato :',                       
           fontSize: 8,          
           bold: true,          
         } 
         ,              
          {  
            text: dataResponde.nombresCandidato,                       
            fontSize: 8,                     
            colSpan:3                    
           },{},{}
        
       ],
       [
        {             
          text: 'Persona de referencia : ',                       
          fontSize: 8,          
          bold: true,          
        } 
        ,              
         {  
           text:  dataResponde.nombresReferente,                       
           fontSize: 8                                                
          },{
            text: 'Teléfono : ',                       
            fontSize: 8,          
            bold: true,  
          },{
            text:  dataResponde.telefono,                       
            fontSize: 8 
          }
     ],   [
      {             
        text: 'Cargo :',                       
        fontSize: 8,          
        bold: true,          
      } 
      ,              
       {  
         text:  dataResponde.cargo,                       
         fontSize: 8                                                
        },{
          text: 'Empresa : ',                       
          fontSize: 8,          
          bold: true,  
        },{
          text:  dataResponde.empresa,                       
          fontSize: 8 
        }
   ]                
   ]
}
},

{
  table: {
    widths: ['5%', '95%'],
     headerRows: 1,
     body: [
      [
        {             
          text: '',                       
          fontSize: 8,                    
          bold: true,
          border: [true, false, true, true],            
          
        } ,
        {             
          text: 'Preguntas a realizar: ',                       
          fontSize: 8,                    
          bold: true ,
          border: [true, false, true, true],           
        
        } 
       
      ],
      [
        {             
          text: '1.',                       
          fontSize: 8,                                          
          
        } ,
        {             
          text: '¿Recuerda en qué fecha laboro con usted, fue su jefe directo, de qué empresa?',                       
          fontSize: 8,   
                                                
        }               
      ],
      [
        {             
          text: '', 
          
          margin: [ 0, 10, 0, 0 ]                                   
        } ,
        {             
          text:  dataResponde.respuesta[0],
          fontSize: 8,
          margin: [ 0, 10, 0, 0 ]                                 
        }               
      ],
      [
        {             
          text: '2.',                       
          fontSize: 8,                                    
          
        } ,
        {             
          text: '¿Qué puesto ocupaba?',                       
          fontSize: 8,                                              
        }               
      ], [
        {             
          text: '', 
          
          margin: [ 0, 10, 0, 0 ]                                   
        } ,
        {             
          text: dataResponde.respuesta[1],
          fontSize: 8,
          margin: [ 0, 10, 0, 0 ]                                 
        }               
      ],
      [
        {             
          text: '3.',                       
          fontSize: 8,                                    
          
        } ,
        {             
          text: 'Mencione sus principales cualidades o fortalezas',                       
          fontSize: 8,                                            
        }               
      ], [
        {             
          text: '', 
          
          margin: [ 0, 10, 0, 0 ]                                   
        } ,
        {             
          text: dataResponde.respuesta[2],
          fontSize: 8,
          margin: [ 0, 10, 0, 0 ]                                 
        }               
      ],
      [
        {             
          text: '4.',                       
          fontSize: 8,                                    
          
        } ,
        {             
          text: 'Mencione sus principales logros',                       
          fontSize: 8,                                          
        }               
      ], [
        {             
          text: '', 
          
          margin: [ 0, 10, 0, 0 ]                                   
        } ,
        {             
          text: dataResponde.respuesta[3],
          fontSize: 8,
          margin: [ 0, 10, 0, 0 ]                                 
        }               
      ],
      [
        {             
          text: '5.',                       
          fontSize: 8,                                     
          
        } ,
        {             
          text: '¿Cómo se llevaba con sus compañeros y jefes? ',                       
          fontSize: 8,                                            
        }               
      ], [
        {             
          text: '', 
          
          margin: [ 0, 10, 0, 0 ]                                   
        } ,
        {             
          text: dataResponde.respuesta[4],
          fontSize: 8,
          margin: [ 0, 10, 0, 0 ]                                 
        }               
      ],
      [
        {             
          text: '6.',                       
          fontSize: 8,          
                          
          
        } ,
        {             
          text: '¿Cuál considera que es su área de mejora?',                       
          fontSize: 8,          
                                   
        }               
      ], [
        {             
          text: '', 
          
          margin: [ 0, 10, 0, 0 ]                                   
        } ,
        {             
          text: dataResponde.respuesta[5],
          fontSize: 8,
          margin: [ 0, 10, 0, 0 ]                                 
        }               
      ],
      [
        {             
          text: '7.',                       
          fontSize: 8,          
                           
          
        } ,
        {             
          text: '¿Cuál fue el motivo de su salida? ',                       
          fontSize: 8,          
                                   
        }               
      ], [
        {             
          text: '', 
          
          margin: [ 0, 10, 0, 0 ]                                   
        } ,
        {             
          text: dataResponde.respuesta[6],
          fontSize: 8,
          margin: [ 0, 10, 0, 0 ]                                 
        }               
      ],
      [
        {             
          text: '8.',                       
          fontSize: 8,          
                           
          
        } ,
        {             
          text: 'En el caso lo contraten ¿Qué recomendación le haría a su jefe?',                       
          fontSize: 8,          
                                  
        }               
      ], [
        {             
          text: '', 
          
          margin: [ 0, 10, 0, 0 ]                                   
        } ,
        {             
          text: dataResponde.respuesta[7],
          fontSize: 8,
          margin: [ 0, 10, 0, 0 ]                                 
        }               
      ],
      [
        {             
          text: '9.',                       
          fontSize: 8,          
                         
          
        } ,
        {             
          text: '¿Si tuviera oportunidad de contratarlo de nuevo lo haría? ',                       
          fontSize: 8,          
                                   
        }               
      ], [
        {             
          text: '', 
          
          margin: [ 0, 10, 0, 0 ]                                   
        } ,
        {             
          text: dataResponde.respuesta[8],
          fontSize: 8,
          margin: [ 0, 10, 0, 0 ]                                 
        }               
      ],
      [
        {             
          text: '10.',                       
          fontSize: 8,          
                           
          
        } ,
        {             
          text: '10. Observaciones ',                       
          fontSize: 8,          
                                    
        }               
      ] ,  [
        {             
          text: '', 
          
          margin: [ 0, 10, 0, 0 ]                                   
        } ,
        {             
          text: dataResponde.respuesta[9],
          fontSize: 8,
          margin: [ 0, 10, 0, 0 ]                                 
        }               
      ]
     ]
  }
  }, 
  {
    table: {
      widths: ['40%', '15%','15%','15%','15%'],
       headerRows: 1,
       body: [
        [
          {             
            text: 'Lo recomienda: ',                       
            fontSize: 8,     
            border: [true, false, true, true],                         
          } 
          ,              
           {
            text: 'SI : ',                       
            fontSize: 8,
            border: [true, false, true, true],   
            },
            {
              text:  dataResponde.respuesta[10]=="1"?'X':'',                       
              fontSize: 8,
            border: [true, false, true, true],    
            },
            {
              text: 'NO : ',                       
              fontSize: 8,
             border: [true, false, true, true],    
            },
            {
              text:  dataResponde.respuesta[10]=="0"?'X':'',                       
              fontSize: 8,
             border: [true, false, true, true],    
            }
         
        ],    
        [
          {             
            text: 'Realizó Referencia: Nombres y Apellidos: ',                       
            fontSize: 8,  
            colSpan:2                           
          } 
          ,              
           {
           
            },
            {
              text: resp.tabla1.nombresReferente,                       
              fontSize: 8,
              colSpan:3
            },
            {
            
            },
            {
            
            }
        ],                       
        [
          {             
            text: 'Cargo : ',                       
            fontSize: 8,  
                                     
          } 
          ,              
           {
           text:'',
           fontSize:8
            },
            {
              text: 'Firma : ',                       
              fontSize: 8,
              
            },
            {
            text:'',
            fontSize:8,
            colSpan:2
            },
            {
            
            }
         
        ]                  
       ]

    }
    }  
],
  defaultStyle: {
  }
};
pdfMake.createPdf(docDefinition).open();  
})

}
function pdf_EntrevsitasPersona(id){

  let datos = {
    TipoQuery : '03_pdf_entrevista_persona',
    id:id 
  }
 // var hashmap = new Map();
  console.log(id)
  appAjaxQuery(datos,rutaSQL).done(function(resp){  
    console.log(resp)  
    let dataResponde={
      "nombres":resp.tabla1[0].nombres,
      "dni":resp.tabla1[0].dni,
      "edad":resp.tabla1[0].edad,
      "fecha":resp.tabla1[0].fecha,
     // "civil":resp.tabla1[0].civil,
      "correo":resp.tabla1[0].correo,
      "telefono":resp.tabla1[0].telefono,
      "puesto":resp.tabla1[0].puesto,
      "pretenciones":resp.tabla1[0].pretenciones,      
      "preguntas": resp.tabla1.map((it,idx)=>(it.respuesta))
    }



  var docDefinition = {     
    content: [
   
{
table: {
widths: ['15%', '65%', '10%', '10%'],
// heights: [10,10,10,10,30,10,25],
 headerRows: 1,
 body: [
     [
       {
         
         text: 'LOGO',              
     
         fontSize: 8,
         alignment: 'center',
         rowSpan:3
       } , 
         {
           text: 'FICHA DE ENTREVISTA',              
           bold: true,
           fontSize: 10,
           rowSpan:2,
           alignment: 'center'
         },
         { 
           text: 'CODIGO:',              
  
           fontSize: 8,
           alignment: 'center'
         },
         {
             text: 'SSOMA-F-01',
             fontSize: 8
     
         }
     ],
     [
       {               
       }, 
       {         
       },
       { 
         text: 'Versión :',              
      
         fontSize: 8
       },
       {
           text: '01',
           fontSize: 8
     
       }
   ],                  
   [
     {               
     }, 
     {
   
     },
     { 
       text: 'F. de Aprobn:',              
       fontSize: 8
     },
     {
         text: '01/02/02',
         fontSize: 8

     }
 ],  


 ]
}
}
,
{           
  text: '',              
  fontSize: 10,
  margin: [ 0, 15, 0, 5 ] ,
  bold: true
},
{
table: {
  widths: ['25%', '25%','25%','25%'],
   headerRows: 1,
   body: [
    [
      {             
        text: 'INFORMACION GENERAL',                       
        fontSize: 9,          
        fillColor: '#d9d9d9',  
        bold: true,    
        colSpan:4,
        alignment: 'center',          
      } 
      ,              
       { },{},{}
     
    ],
       [
         {             
           text: 'Nombre y Apellidos:',                       
           fontSize: 8,          
           bold: true,          
         } 
         ,              
          {  
            text:dataResponde.nombres,                       
            fontSize: 8,                     
            colSpan:3                    
           },{},{}
        
       ],
       [
        {             
          text: 'DNI: ',                       
          fontSize: 8,          
          bold: true,          
        } 
        ,              
         {  
           text: dataResponde.dni,                       
           fontSize: 8                                                
          },{
            text: 'EDAD: ',                       
            fontSize: 8,          
            bold: true,  
          },{
            text: dataResponde.edad,                       
            fontSize: 8 
          }
     ],   [
      {             
        text: 'FECHA DE NACIMIENTO : ',                       
        fontSize: 8,          
        bold: true,          
      } 
      ,              
       {  
         text: dataResponde.fecha,                       
         fontSize: 8,   
         colSpan:  3                                           
        }
        /*,{
          text: 'ESTADO CIVIL : ',                       
          fontSize: 8,          
          bold: true,  
        },{
          text: dataResponde.civil,                       
          fontSize: 8 
        }*/
   ], [
    {             
      text: 'CORREO ELECTRONICO : ',                       
      fontSize: 8,          
      bold: true,          
    } 
    ,              
     {  
       text:dataResponde.correo,                       
       fontSize: 8                                                
      },{
        text: 'TELEFONO : ',                       
        fontSize: 8,          
        bold: true,  
      },{
        text: dataResponde.telefono,                       
        fontSize: 8 
      }
 ] ,
 [
  {             
    text: 'PUESTO AL QUE POSTULA : ',                       
    fontSize: 8,          
    bold: true,      
    border: [true, true, true, false],     
  } 
  ,              
   {  
     text: dataResponde.puesto,                       
     fontSize: 8 , 
     border: [true, true, true, false],                                               
    },{
      text: 'PRETENCIONES SALARIALES : ',                       
      fontSize: 8,          
      bold: true,  
      border: [true, true, true, false], 
    },{
      text: 'S/. '+dataResponde.pretenciones,                       
      fontSize: 8, 
      border: [true, true, true, false], 
    }
]               

   ]
}
},

{
  table: {
    widths: ['55%', '15%','15%','15%'],
     headerRows: 1,
     body: [
      [
        {             
          text: 'INFORMACION RELEVANTE AL CARGO ',                       
          fontSize: 9,          
          alignment: 'center',
          bold: true,    
          fillColor: '#d9d9d9',  
          colSpan:4      
        } 
        ,              
         { },{},{}
       
      ],
      [
        {             
          text: 'SISTEMA DE GESTION ',                       
          fontSize: 9,          
          alignment: 'center',
          bold: true,    
          fillColor: '#d9d9d9',  
          colSpan:4      
        } 
        ,              
         { },{},{}
       
      ],
      [
        {             
          text: 'Criterios',                       
          fontSize: 8, 
               fillColor: '#d9d9d9',           
          bold: true,                 
        } 
        ,              
         {text: 'Cuenta con más de lo indicado (3)',                       
         fontSize: 8,          
              fillColor: '#d9d9d9',  
         bold: true,  
        },{
          text: 'Cumple con lo necesario (2)', 
               fillColor: '#d9d9d9',                        
          fontSize: 8,          
          bold: true, 
         },{
          text: 'No cumple (1)',    
               fillColor: '#d9d9d9',                     
          fontSize: 8,          
          bold: true, 
         }
       
      ],                       
      [
        {             
          text: 'Educación',                       
          fontSize: 8,          
          bold: true,                 
        } 
        ,              
         {text: dataResponde.preguntas[0]=="3"?'X':'',                       
         fontSize: 8,                   
        },{
          text:  dataResponde.preguntas[0]=="2"?'X':'',                       
          fontSize: 8,          
        
         },{
          text:  dataResponde.preguntas[0]=="1"?'X':'',                       
          fontSize: 8,                    
         }
       
      ],  
      [
        {             
          text: 'Formación',                       
          fontSize: 8,          
          bold: true,                 
        } 
        ,              
         {text:  dataResponde.preguntas[1]=="3"?'X':'',                       
         fontSize: 8,                   
        },{
          text:  dataResponde.preguntas[1]=="2"?'X':'',                       
          fontSize: 8,          
        
         },{
          text:  dataResponde.preguntas[1]=="1"?'X':'',                       
          fontSize: 8,                    
         }
       
      ], 
      [
        {             
          text: 'Experiencia',                       
          fontSize: 8,          
          bold: true,                 
        } 
        ,              
         {text:  dataResponde.preguntas[2]=="3"?'X':'',                       
         fontSize: 8,                   
        },{
          text:  dataResponde.preguntas[2]=="2"?'X':'',                       
          fontSize: 8,          
        
         },{
          text:  dataResponde.preguntas[2]=="1"?'X':'',                       
          fontSize: 8,                    
         }
       
      ]  ,
      [
        {             
          text: 'PROMEDIO (sumar y dividir /3):',                       
          fontSize: 8,          
          bold: true,  
          border: [true, true, true, false], 
                         
        } 
        ,              
         {  
          text: (Number(dataResponde.preguntas[0])+Number(dataResponde.preguntas[1])+Number(dataResponde.preguntas[2]))/3,                       
          fontSize: 8,         
          border: [true, true, true, false],  
          colSpan:3                  
        },
        {  
                                   
         },
         {  
                                    
         }
       
      ]   
     ]
  }
  }, 
  {
    table: {
      widths: ['55%', '15%','15%','15%'],
       headerRows: 1,
       body: [
        [
          {             
            text: 'OTROS(ADICIONALES)',                       
            fontSize: 9,          
            alignment: 'center',
            fillColor: '#d9d9d9',  
            bold: true,    
            colSpan:4      
          } 
          ,              
           { },{},{}
         
        ],    
        [
          {             
            text: 'Criterios',                       
            fontSize: 8,      
            
                 fillColor: '#d9d9d9',  
            bold: true,                 
          } 
          ,              
           {text: 'Excelente (3)',                       
           fontSize: 8,          
           bold: true,  
                fillColor: '#d9d9d9',  
          },{
            text: 'Cumple con lo necesario (2)',                       
            fontSize: 8,          
            bold: true, 
                 fillColor: '#d9d9d9',  
           },{
            text: 'No cumple (1)',                       
            fontSize: 8,   
                 fillColor: '#d9d9d9',         
            bold: true, 
           }
         
        ],                       
        [
          {             
            text: 'Puntualidad (*se presentó a la hora)',                       
            fontSize: 8,          
            bold: true,                 
          } 
          ,              
           {text:  dataResponde.preguntas[3]=="3"?'X':'',                       
           fontSize: 8,                   
          },{
            text:  dataResponde.preguntas[3]=="2"?'X':'',                       
            fontSize: 8,          
          
           },{
            text:  dataResponde.preguntas[3]=="1"?'X':'',                       
            fontSize: 8,                    
           }
         
        ],  
        [
          {             
            text: 'Capacidad de comunicación (*Se comunica adecuadamente)',                       
            fontSize: 8,          
            bold: true,                 
          } 
          ,              
           {text:  dataResponde.preguntas[4]=="3"?'X':'',                       
           fontSize: 8,                   
          },{
            text:  dataResponde.preguntas[4]=="2"?'X':'',                       
            fontSize: 8,          
          
           },{
            text:  dataResponde.preguntas[4]=="1"?'X':'',                       
            fontSize: 8,                    
           }
         
        ], 
        [
          {             
            text: 'Expresión verbal y corporal',                       
            fontSize: 8,          
            bold: true,                 
          } 
          ,              
           {text:  dataResponde.preguntas[5]=="3"?'X':'',                       
           fontSize: 8,                   
          },{
            text:  dataResponde.preguntas[5]=="2"?'X':'',                       
            fontSize: 8,          
          
           },{
            text:  dataResponde.preguntas[5]=="1"?'X':'',                       
            fontSize: 8,                    
           }
         
        ]  ,
        [
          {             
            text: 'PROMEDIO (sumar y dividir /3)',                       
            fontSize: 8,          
            bold: true, 
            border: [true, true, true, false],                         
          } 
          ,              
           {   
            text: (Number(dataResponde.preguntas[3])+Number(dataResponde.preguntas[4])+Number(dataResponde.preguntas[5]))/3,                       
            fontSize: 8,        
            border: [true, true, true, false],   
            colSpan:3                 
          },
          {    
                                   
           },
           {    
                                   
           }
         
        ]   
       ]

    }
    },
    {
      table: {
        widths: ['50%','50%'],
         headerRows: 1,
         body: [
          [
            {             
              text: 'CRITERIOS',                       
              fontSize: 9,          
              alignment: 'center',
              fillColor: '#d9d9d9',  
              bold: true,   
              colSpan:2              
            }        ,{}
          ],    
          [
            {             
              text: 'Se tomará en cuenta en los promedios, los puntajes obtenidos como aceptables y excelentes. (1 a 4=no aceptable, 5 a 7, aceptable y 7 a 9, excelent',                       
              fontSize: 8,   
              colSpan:2                                   
            } ,{}
           
          ],  
          [
            {             
              text: 'COMENTARIOS FINALES',                       
              fontSize: 9,   
              alignment: 'center',
              fillColor: '#d9d9d9',
              bold: true,     
              colSpan:2                                   
            } ,{}
           
          ],  
          [
            {             
              text: '',                       
              fontSize: 8                                                
            },
            {             
              text: '',                       
              fontSize: 8                                                
            }            
          ],
          [
            {             
              text: 'FIRMA ASISTENTE DE RECURSOS HUMANOS',                       
              fontSize: 9,
              fillColor: '#d9d9d9',  
              bold: true,       
              alignment: 'center'                                         
            },
            {             
              text: 'FIRMA DE ENCARGADO DE AREA', 
              bold: true,                         
              fontSize: 9,              
              fillColor: '#d9d9d9',  
              alignment: 'center'                                
            }            
          ],
          [
            {             
              text: '',                       
              fontSize: 8                                                
            },
            {             
              text: '',                       
              fontSize: 8                                                
            }            
          ]                                                        
         ]
         
      }
      }
],
  defaultStyle: {
  }
};
pdfMake.createPdf(docDefinition).open();  
})

}

function modalGestionPersonasSearchAdd(id){
   
     
  ///appAjaxQuery(datos,rutaSQL).done(function(resp){
     
    $('#txt-modal-gestion-personas-vacante-requerimiento').val(id)
    $('#modal_gestionPersonasSearch').modal('show');

 // } ); 
}
function modalGestionPersonas(id){
 
  
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

function pdf_ModalAddProgramaCapacitacion(id,type){
  let datos = {
    TipoQuery : '01_get_pdf_file_programa_capacitacion',
    value:id,
    type:type
  };  
  var table;   
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    console.log(resp)
    
      $("#txt_id_programa_capacitacion").val(resp.tabla1.id)
      $("#txt_id_modal_programa_capacitacion_name").val(resp.tabla1.nombre); 
      $("#txt_id_modal_programa_capacitacion_type").val(resp.tabla1.type); 
     // $('#modal_FichaPersonal').modal('hide');
     
      $('#modal_ProgramaCapacitacion').modal('show');
      
  } ); 
}
function insert_modal_date_Programa_capacitacion(){
  let datos = {
    TipoQuery : '01_get_insert_values_date_programa_capacitacion',
    data:{
      type:$("#txt_id_modal_programa_capacitacion_type").val(),
      fecha_emi:$("#txt_programa_capacitacion_emi_modal").val(),
      fecha_cadu:$("#txt_programa_capacitacion_cadu_modal").val(),
      id:$("#txt_id_programa_capacitacion").val()
    }
  };  
 
  console.log(datos)
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    console.log(resp)
    gridProgramacionCapacitacion();
    

    $("#txt_id_modal_programa_capacitacion_type").val("");
    $("#txt_id_programa_capacitacion").val("");
    $("#txt_programa_capacitacion_cadu_modal").val("");
    $("#txt_programa_capacitacion_emi_modal").val("");
    $('#modal_ProgramaCapacitacion').modal('hide');
    swal("Insertado correctamente", {
      icon: "success",
    });
   
    
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
 // "<td><input type='text' class='obligatory-input form-control txt_prioridad_requerimiento' /></td>"+
  "<td><input type='text' class='form-control txt_observacion_requerimiento' /></td>"+
"<td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500  py-2 px-2 text-white' onclick='removeComentarios("+(new Date()).getTime()+")'></button>"+ 
"</div></td>"+
"</tr>")
}
function gridProgramacionCapacitacion(){
  let datos = {
    TipoQuery : '01_gridProgramacionCapacitacion'
  };
  var table;   
  appAjaxQuery(datos,rutaSQL).done(function(resp){
   
    if(resp.tabla.length>0){      
     table= $('#grd01ProgramacionCapacitacion').DataTable( {         
        "sPaginationType": "simple",
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
        },
        
        data: resp.tabla,
        destroy: true,
        columns: 
        [
         
          { data: "nombrescandidato" },
          { data: "dni" },                                                          
            { data: "induc_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {

              if(oData.induc_file_name){
                if(sData==="0") {   
                              
                  $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"0"+')"></span>');
                  
                }else if(sData==="1") {            
                  $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"0"+')"></span>');
                
                }  
                  else if(sData==="2") {                    
                    $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"0"+')"></span>');
                }  
                  else{          
                    $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"0"+')"></span>');        
                 
                }  
              }else{
                $(nTd).html('<div></div>')
              }
              
            } },    
            { data: "defen_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
             if(oData.defen_file_name){
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"1"+')"></span>');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"1"+')"></span>');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"1"+')"></span>');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"1"+')"></span>');        
               
              }   
             }else{
              $(nTd).html('<div></div>')
            }
            }  },    
            { data: "peligroso1_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
            if(oData.peligroso1_file_name){
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"2"+')"></span>');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"2"+')"></span>');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"2"+')"></span>');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"2"+')"></span>');        
               
              }   
            }else{
              $(nTd).html('<div></div>')
            }
            }  },    
            { data: "peligroso2_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
            if(oData.peligroso2_file_name){
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"3"+')"></span>');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"3"+')"></span>');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"3"+')"></span>');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"3"+')"></span>');        
               
              }  
            } else{
              $(nTd).html('<div></div>')
            }
            }  },    
            { data: "peligroso3_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
           if(oData.peligroso3_file_name){
            if(sData==="0") {   
                              
              $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"4"+')"></span>');
              
            }else if(sData==="1") {            
              $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"4"+')"></span>');
            
            }  
              else if(sData==="2") {                    
                $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"4"+')"></span>');
            }  
              else{          
                $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"4"+')"></span>');        
             
            }   
           }else{
            $(nTd).html('<div></div>')
          }
            }  },    
            { data: "auxilio_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
            if(oData.auxilio_file_name){
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"5"+')"></span> ');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"5"+')"></span> ');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"5"+')"></span> ');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"5"+')"></span> ');        
               
              }   
            }else{
              $(nTd).html('<div></div>')
            }
            }  },    
            { data: "extintores_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
           if(oData.extintores_file_name){
            if(sData==="0") {   
                              
              $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"6"+')"></span> ');
              
            }else if(sData==="1") {            
              $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"6"+')"></span> ');
            
            }  
              else if(sData==="2") {                    
                $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"6"+')"></span> ');
            }  
              else{          
                $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"6"+')"></span> ');        
             
            }  
           } else{
            $(nTd).html('<div></div>')
          }
            }  },    
            { data: "trabajo_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
             if(oData.trabajo_file_name){
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"7"+')"></span> ');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"7"+')"></span> ');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"7"+')"></span> ');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"7"+')"></span> ');        
               
              }  
             } else{
              $(nTd).html('<div></div>')
            }
            }  },  
            { data: "fatiga_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
             if(oData.fatiga_file_name){
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"8"+')"></span> ');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"8"+')"></span> ');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"8"+')"></span> ');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"8"+')"></span> ');        
               
              }   
             }else{
              $(nTd).html('<div></div>')
            }
            }  },    
            { data: "curso_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              
             if(oData.curso_file_name){
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"9"+')"></span> ');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"9"+')"></span> ');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"9"+')"></span>');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"9"+')"></span>');        
               
              }   
             }else{
              $(nTd).html('<div></div>')
            }
            
            }  }, { data: "induccion_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              
             if(oData.induccion_file_name){
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"10"+')"></span> ');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"10"+')"></span> ');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"10"+')"></span> ');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545;display:block;width:20px;height:20px;margin:auto" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id_personal+','+"10"+')"></span> ');        
               
              }  
             } else{
              $(nTd).html('<div></div>')
            }
            
            }  },    
           /* { data: "id",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(oData.id) {                      
                  $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-trash bg-rose-500 py-2 px-2 text-white" type="button" onclick="modalDeleteProgramaCapacitacion('+oData.id+')">');
              }
            }
          }*/
        ]
    }
     );     
    
     table.columns().eq( 0 ).each( function ( colIdx ) {
       
      var parent= $("#ProgramaCapacitacionSearch");      
      var child= parent.find("#"+colIdx);    
      child.on('keyup', function() {          
            table
            .column( colIdx )
            .search(child.val(), false, true)
            .draw();
    })   

  } );   
    }   
  });
}
function save_programacion_capacitacion(){

  if(validarProgramacionCapacitacion()){
    swal("Completa todos los campos", {
      icon: "error",
     });
  }else{     
         var data   = new FormData();
           
         var files=$(".input_files_programacion_capacitacion").map(function(index, i){      
           data.append('file_'+index, this.files[0]);
           let dd="";
           if(this.files[0]){
             dd=this.files[0].name
           }
           return  dd
         }).get();
      
        
         let datos = {
           TipoQuery : '03_save_register_programacion_capacitacion',
           data:{
             id:(new Date()).getTime(),  
             id_personal:  $("#idPersonalHidden").val(),
             files:files         
           },
         };        
         console.log(datos)
         appAjaxQuery(datos,rutaSQL).done(function(resp){  
         
        /*
            var xhttp = new XMLHttpRequest();                 
           xhttp.open("POST", "pages/catalogos/personas/ajaxfile.php", true);            
           xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
     
                var response = this.responseText;
                if(response == 1){
                  gridProgramacionCapacitacion();
                   
                 swal("Se ha registrado correctamente", {
                   icon: "success",
             });
                }else{
                 swal("Ha existido un error", {
                   icon: "error",
             });
                }
              }
           };     
         xhttp.send(data);                          
         resetProgramaCapacitacion();*/
         gridProgramacionCapacitacion();
         resetProgramaCapacitacion();

            swal("Se ha registrado correctamente", {
                  icon: "success",
            });
         });         
     }


}
function modalDeleteFichaPersonal(id){
  swal({
    title: "¿Estas seguro que deseas eliminar?",
    text: "Al realizar esta operación se quitarán todos los datos asociados al registro",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {        
      let datos = {
        TipoQuery : '01_delete_ficha_personal',
        value:id
      };

      appAjaxQuery(datos,rutaSQL).done(function(resp){                
          gridFichaPersonal();
          swal("Has eliminado el registro", {
           icon: "success",
          });
      });  
      
    }
  });
}
function modalDeleteProgramaCapacitacion(id){
  console.log(id)
  swal({
    title: "¿Estas seguro que deseas eliminar?",
    text: "Al realizar esta operación se quitarán todos los datos asociados al registro",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {        
      let datos = {
        TipoQuery : '01_delete_programa_capacitacion',
        value:id
      };

      appAjaxQuery(datos,rutaSQL).done(function(resp){                
          gridProgramacionCapacitacion();
          swal("Has eliminado el registro", {
           icon: "success",
          });
      });  
      
    }
  });
}
function modalDeleteRequerimientoPersona(id){
    swal({
      title: "¿Estas seguro que deseas eliminar?",
      text: "Al realizar esta operación se quitarán todos los datos asociados al registro",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {        
        let datos = {
          TipoQuery : '01_delete_requerimiento_persona',
          value:id
        };

        appAjaxQuery(datos,rutaSQL).done(function(resp){                
            gridSecondRequerimientos();
            swal("Has eliminado el registro", {
             icon: "success",
            });
        });  
        
      }
    });
  }
  function modalDeleteEntrevistaPersona(id){
    swal({
      title: "¿Estas seguro que deseas eliminar?",
      text: "Al realizar esta operación se quitarán todos los datos asociados al registro",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {        
        let datos = {
          TipoQuery : '01_delete_entrevista_persona',
          value:id
        };

        appAjaxQuery(datos,rutaSQL).done(function(resp){                
            gridEntrevistas();
            swal("Has eliminado el registro", {
             icon: "success",
            });
        });  
        
      }
    });
  }
  function modalDeleteReferenciaLaboral(id){
    swal({
      title: "¿Estas seguro que deseas eliminar?",
      text: "Al realizar esta operación se quitarán todos los datos asociados al registro",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {        
        let datos = {
          TipoQuery : '01_delete_referencia_laboral_persona',
          value:id
        };

        appAjaxQuery(datos,rutaSQL).done(function(resp){                
 
            swal("Has eliminado el registro", {
             icon: "success",
            });

            gridReferenciaLaboral();
        });  
        
      }
    });
  }
  function resetCapacitacionFieldsPersonas(){  
    
    $("#idsolicitanteHidden").val("");
    $("#txt_search_solicitante").val("");
    $("#txt_search_solicitante").val("");
    $("#txt_cargo_personas").val("");
    $("#txt_n_vacantes_personas").val("");

    $("#personas_select_area").val("-1");
    $("#personas_select_contrato").val("-1");
    $("#personas_select_motivo").val("-1");
    $("#personas_select_lugar").val("-1");

    $("#personas_select_duracion").val("");

    $("#txt_fecha_g_personas").datepicker("setDate",moment().format("DD/MM/YYYY"));
    $("#personas_remuneracion").val("");


    $("#txt_solicitante_nombres").val("");
    $("#txt_solicitante_apellidos").val("");
    $("#txt_solicitante_area").val("");
    $("#txt_solicitante_cargo").val("");

    $(".class_add_observaciones_personas").remove();
  
  }
  function resetCaFieldsPersonasEntrevista(){  
    
    $("#txt_entrevistas_nombres").val("");
    $("#txt_entrevistas_apellidos").val("");

    $("#txt_entrevistas_dni").val("");
    $("#txt_entrevistas_edad").val("");
    $("#txt_entrevistas_fecha").val(new Date().toISOString().slice(0, 10));

    //$("#txt_entrevistas_civil").val("-1");

    $("#txt_entrevistas_correo").val("");
    $("#txt_entrevistas_telefono").val("");

    $("#txt_entrevistas_puesto").val("");
    $("#txt_entrevistas_pretenciones").val("");


    $(".check_gestion_entrevista:radio").prop("checked", false);
    $(".check_otros_entrevistas:radio").prop("checked", false);
  }
  function resetCaFieldsReferenciaLaboral(){  
    
    $("#txt_referencia_laboral_candidato_nombres").val("");
    $("#txt_referencia_laboral_candidato_apellidos").val("");
    $("#txt_referencia_laboral_referente_nombres").val("");
    $("#txt_referencia_laboral_referente_apellidos").val("");
    $("#txt_referencia_laboral_referente_telefono").val("");
    $("#txt_referencia_laboral_referente_cargo").val("-1");
    $("#txt_referencia_laboral_referente_empresa").val("");
    $("#ReferenciaLaboralPreguntasCriterio_1").val("");
    $("#ReferenciaLaboralPreguntasCriterio_2").val("");
    $("#ReferenciaLaboralPreguntasCriterio_3").val("");
    $("#ReferenciaLaboralPreguntasCriterio_4").val("");
    $("#ReferenciaLaboralPreguntasCriterio_5").val("");
    $("#ReferenciaLaboralPreguntasCriterio_6").val("");
    $("#ReferenciaLaboralPreguntasCriterio_7").val("");
    $("#ReferenciaLaboralPreguntasCriterio_8").val("");
    $("#ReferenciaLaboralPreguntasCriterio_9").val("");
    $("#ReferenciaLaboralPreguntasCriterio_10").val("");


    $(".check_referencia_laboral_recomendaciones:radio").prop("checked", false);
  }
  function loadDepartamentos(data,component){
    var departamentos = data.departamentos
    var distritos     = data.distritos
    var provincias    = data.provincias
    console.log(departamentos)
    console.log(distritos)
    console.log(provincias)
    console.log("sdsdsd")
    console.log(provincias[3292])
    $.each(departamentos, function (i, item) {
      //console.log(item.value)
      $('#'+component).append($("<option>", { 
          value: item.id_ubigeo,
          text : item.nombre_ubigeo ,
          //selected:item.value===value?true:false
      }));
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
  function save_FichaPersonal(){

   
 if(validarFichaPersonal()){
     swal("Completa todos los campos", {
       icon: "error",
      });
   }else{     
          var data   = new FormData();      
          var files;
          var files2;
          var files3;

          let i=0;
          var stateChilds=$('#table_children_personas > tbody').find("tr");
          var fileDniConyuge=  $('#formFileDniConyuge').get(0).files;

            files=$(".input_files_ficha_personal").map(function(){      
              data.append('file_'+i, this.files[0]);
              i++;
              let dd="";
              if(this.files[0]){
                dd=this.files[0].name
              }

            return  dd
          }).get();

          if(fileDniConyuge.length){
              files2=$(".input_files_ficha_personal_conyuge").map(function(){      
                data.append('file_'+i, this.files[0]);
                i++;
              return  this.files[0].name
            }).get();
  
          }
        
          if(stateChilds.length){
              files3=$(".input_files_ficha_hijos").map(function(){      
                data.append('file_'+i, this.files[0]);
                i++;
              return  this.files[0].name
            }).get();
          }
         

          var profesion=$('#table_FichaPersonalProfesion > tbody > tr').map(function(){
            
            var children =$(this).children().find('.personal_profesional_data').map(function(){ return $(this).val()}).get();
              return [children];              
             }).get();

           /*  var tecnica=$('#table_FichaPersonalTecnica > tbody > tr').map(function(){
            
              var children =$(this).children().find('.personal_tecnica_data').map(function(){ return $(this).val()}).get();
                return [children];              
               }).get();

               var otrosEstudios=$('#table_FichaPersonalOtrosEstudios > tbody').find(".personal_otros_estudios_data").map(function(){return $(this).val();}).get();   */

               var idioma=$('#table_FichaPersonalIdiomas > tbody > tr').map(function(){
            
                var children =$(this).children().find('.personal_idioma_data').map(function(){ return $(this).val()}).get();
                  return [children];              
                 }).get();


               var referencia=$('#table_FichaPersonalReferencia > tbody > tr').map(function(){
            
                var children =$(this).children().find('.personal_referencia_data').map(function(){ return $(this).val()}).get();
                  return [children];              
                 }).get();


                 var hijos=$('#table_children_personas > tbody > tr').map(function(){
            
                  var children =$(this).children().find('.personal_hijos_data').map(function(){ return $(this).val()}).get();
                    return [children];              
                   }).get();


                   var movilidad=$(".check_Ficha_Personal_movilidad:radio:checked").map(function(){return $(this).attr('id');}).get(); 

                   var id=(new Date()).getTime();
          let datos = {
            TipoQuery : '03_save_register_Ficha_Personal',
            data:{
              id:id,
              id_aspirante: $('#idpostulanteHidden').val(),
            //  apellidos: $('#txt_ficha_personal_apellidos').val(),
              //fecha_nacimiento: $('#txt_ficha_personal_nacimiento').val(),
              lugar_nacimiento:$('#txt_ficha_personal_lugar').val(),      
              civil:$('#txt_ficha_personal_civil :selected').text(),     
              departamento: $('#select_Ficha_Personal_departamento_g :selected').text(),
              provincia: $('#select_Ficha_Personal_provincia_g :selected').text(),      
              distrito: $('#select_Ficha_Personal_distrito_g :selected').text(),
              //dni: $('#txt_ficha_personal_dni').val(),
              //telefono: $('#txt_ficha_personal_telefono').val(),
              //celular: $('#txt_ficha_personal_celular').val(),
              domicilio: $('#txt_ficha_personal_domicilio').val(),
              urbanizacion: $('#txt_ficha_personal_ubanizacion').val(),
              distrito_domicilio: $('#txt_ficha_personal_distrito').val(),
              //civil: $('#txt_ficha_personal_civil :selected').text(),
              //edad: $('#txt_ficha_personal_edad').val(),
            //  n_hijos: $('#txt_ficha_personal_n_hijos').val(),
              sexo: $('#txt_ficha_personal_sexo :selected').text(),
              talla: $('#txt_ficha_personal_talla').val(),   
              contextura: $('#txt_ficha_personal_contextura :selected').text(),
              
              ruc: $('#txt_ficha_personal_ruc').val(),
              essalud: $('#txt_ficha_personal_essalud').val(),
              onp: $('#txt_ficha_personal_onp').val()=="0"?$('#txt_ficha_personal_onp :selected').text():$('#txt_ficha_personal_onp :selected').text()+"/"+$('#txt_ficha_personal_afp :selected').text(),   
              cussp: $('#txt_ficha_personal_cusspp').val(),
              fecha_afiliacion: $('#txt_ficha_personal_fecha_afiliacion').val(),
              
              
              stateconyuge: $('#txt_ficha_personal_civil').val(),
              nombre_conyuge: $('#txt_ficha_personal_fecha_conyuge_nombre').val(),
              apellido_conyuge: $('#txt_ficha_personal_fecha_conyuge_apellido').val(),
              fecha_conyuge: $('#txt_ficha_personal_fecha_conyuge_fecha').val(),
              lugar_conyuge: $('#txt_ficha_personal_fecha_conyuge_lugar').val(),
              edad_conyuge: $('#txt_ficha_personal_fecha_conyuge_edad').val(),
              
              departamento_conyuge: $('#select_Ficha_Personal_departamento_conyuge_g :selected').text(),
              provincia_conyuge: $('#select_Ficha_Personal_provincia_conyuge_g :selected').text(),
              distrito_conyuge: $('#select_Ficha_Personal_distrito_conyuge_g :selected').text(),         
              dni_conyuge: $('#select_Ficha_Personal_dni_conyuge').val(),
              ruc_conyuge: $('#select_Ficha_Personal_ruc_conyuge').val(),
              profesion_conyuge: $('#select_Ficha_Personal_profesion_conyuge :selected').text(),                    
              ocupacion_conyuge: $('#select_Ficha_Personal_ocupacion_conyuge').val(),
              centro_conyuge: $('#select_Ficha_Personal_centro_conyuge').val(),
              direccion_conyuge: $('#select_Ficha_Personal_direccion_conyuge').val(),
              telefono_conyuge: $('#select_Ficha_Personal_telefono_conyuge').val(),
              celular_conyuge: $('#select_Ficha_Personal_celular_conyuge').val(),
    
              state_padre:$('#state_padre').val(),

              nombre_padre: $('#txt_Ficha_Personal_padre_nombre').val(),
              apellido_padre: $('#txt_Ficha_Personal_padre_apellido').val(),
              centro_padre: $('#txt_Ficha_Personal_padre_centro').val(),
              ocupacion_padre: $('#txt_Ficha_Personal_padre_ocupacion').val(),
              direccion_padre: $('#txt_Ficha_Personal_padre_direccion').val(),
              telefono_padre: $('#txt_Ficha_Personal_padre_telefono').val(),
              celular_padre: $('#txt_Ficha_Personal_padre_celular').val(),

             
              state_madre: $('#state_madre').val(),
              nombre_madre: $('#txt_Ficha_Personal_madre_nombres').val(),
              apellido_madre: $('#txt_Ficha_Personal_madre_apellidos').val(),
              centro_madre: $('#txt_Ficha_Personal_madre_centro').val(),
              ocupacion_madre: $('#txt_Ficha_Personal_madre_ocupacion').val(),
              direccion_madre: $('#txt_Ficha_Personal_madre_direccion').val(),
              telefono_madre: $('#txt_Ficha_Personal_madre_telefono').val(),
              celular_madre: $('#txt_Ficha_Personal_madre_celular').val(),

              checkMovilidad:$(".check_Ficha_Personal_movilidad:radio:checked")[0].getAttribute('id'),
              licencia: $('#check_Ficha_Personal_licencia').val(),
              vehiculo: $('#check_Ficha_Personal_tipo_vehiculo').val(),
              marca: $('#check_Ficha_Personal_tipo_marca').val(),
              anio: $('#check_Ficha_Personal_tipo_anio').val(),
              placa: $('#check_Ficha_Personal_tipo_placa').val(), 

              checkPolicialesPenales :$(".filter_penales_judiciales:radio:checked")[0].getAttribute('id'),
              antecedente_policial:[
                $('#Ficha_Personal_antecedentes_1').val(), 
                $('#Ficha_Personal_antecedentes_2').val(), 
                $('#Ficha_Personal_antecedentes_3').val(), 
                $('#Ficha_Personal_antecedentes_4').val(),
              ],
           

              nombre_referencia: $('#txt_Ficha_Personal_referencia_nombre').val(),
              apellido_referencia: $('#txt_Ficha_Personal_referencia_apellido').val(),
              parentesco_referencia: $('#txt_Ficha_Personal_referencia_parentesco').val(),
              telefono_referencia: $('#txt_Ficha_Personal_referencia_telefono').val(),
    
            
              
              profesion:profesion,
              //tecnica:tecnica,
             // otrosEstudios:otrosEstudios,
              idioma:idioma,
              referencia:referencia,
              hijos:hijos,
              movilidad:movilidad,
              files:files,
              files2:files2,
              files3:files3
            },
          };        
          console.log(datos)
          appAjaxQuery(datos,rutaSQL).done(function(resp){  
            gridFichaPersonal();
             resetFieldsFichaPersonal();    
             swal("Se ha registrado correctamente", {
              icon: "success",
        });
         /*
             var xhttp = new XMLHttpRequest();
                        
            xhttp.open("POST", "pages/catalogos/personas/ajaxfile.php", true);                  
            xhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
      
                 var response = this.responseText;
                 if(response == 1){

                  gridFichaPersonal();
                  swal("Se ha registrado correctamente", {
                    icon: "success",
              });
                 }else{
                  swal("Ha existido un error", {
                    icon: "error",
              });
                 }
               }
            };
      
          xhttp.send(data);                                   
          resetFieldsFichaPersonal();    
*/
          });       
      }
  }
  function resetProgramaCapacitacion(){
    $(".input_files_programacion_capacitacion").val(null);
    $("#idPersonalHidden").val("");
    $('#txt_search_name_personal').val("");
    $('#txt_search_apellido_personal').val(""); 
    $('#txt_search_personal').val("");
  }
  function resetFieldsFichaPersonal(){
  
 
    $('#txt_ficha_personal_nombres').val(""),
    $('#txt_ficha_personal_apellidos').val(""),
    $('#txt_ficha_personal_nacimiento').val(""),
    $('#txt_ficha_personal_lugar').val(""),      
    $('#select_Ficha_Personal_departamento_g').val("-1"),
    $('#select_Ficha_Personal_provincia_g').val("-1"),      
    $('#select_Ficha_Personal_distrito_g').val("-1"),
    $('#txt_ficha_personal_dni').val(""),
    $('#txt_ficha_personal_telefono').val(""),
    $('#txt_ficha_personal_civil').val("-1"),
    $('#txt_ficha_personal_celular').val(""),
    $('#txt_ficha_personal_domicilio').val(""),
    $('#txt_ficha_personal_ubanizacion').val(""),
    $('#txt_ficha_personal_distrito').val(""),
    $('#txt_ficha_personal_civil').val("-1"),
    $('#txt_ficha_personal_edad').val(""),
  //  $('#txt_ficha_personal_n_hijos').val(""),
    $('#txt_ficha_personal_sexo').val("-1"),
    $('#txt_ficha_personal_talla').val(""),   
    $('#txt_ficha_personal_contextura').val("-1"),
    
    $('#txt_ficha_personal_ruc').val(""),
    $('#txt_ficha_personal_essalud').val(""),
    $('#txt_ficha_personal_onp').val("-1"),   
    $('#txt_ficha_personal_cusspp').val(""),
    $('#txt_ficha_personal_afp').val("-1"),
    $('#txt_ficha_personal_fecha_afiliacion').val(""),
                   
    $('#txt_ficha_personal_fecha_conyuge_nombre').val(""),
    $('#txt_ficha_personal_fecha_conyuge_apellido').val(""),
    $('#txt_ficha_personal_fecha_conyuge_fecha').val(""),
    $('#txt_ficha_personal_fecha_conyuge_lugar').val(""),
    $('#txt_ficha_personal_fecha_conyuge_edad').val(""),
    $('#select_Ficha_Personal_departamento_conyuge_g').val("-1"),
    $('#select_Ficha_Personal_provincia_conyuge_g').val("-1"),
    $('#select_Ficha_Personal_distrito_conyuge_g').val("-1"),         
    $('#select_Ficha_Personal_dni_conyuge').val(""),
    $('#select_Ficha_Personal_ruc_conyuge').val(""),
    $('#select_Ficha_Personal_profesion_conyuge').val("-1"),                    
    $('#select_Ficha_Personal_ocupacion_conyuge').val(""),
    $('#select_Ficha_Personal_centro_conyuge').val(""),
    $('#select_Ficha_Personal_direccion_conyuge').val(""),
    $('#select_Ficha_Personal_telefono_conyuge').val(""),
    $('#select_Ficha_Personal_celular_conyuge').val(""),

    $('#txt_Ficha_Personal_padre_nombre').val(""),
    $('#txt_Ficha_Personal_padre_apellido').val(""),
    $('#txt_Ficha_Personal_padre_centro').val(""),
    $('#txt_Ficha_Personal_padre_ocupacion').val(""),
    $('#txt_Ficha_Personal_padre_direccion').val(""),
    $('#txt_Ficha_Personal_padre_telefono').val(""),
    $('#txt_Ficha_Personal_padre_celular').val(""),

    $('#txt_Ficha_Personal_madre_nombres').val(""),
    $('#txt_Ficha_Personal_madre_apellidos').val(""),
    $('#txt_Ficha_Personal_madre_centro').val(""),
    $('#txt_Ficha_Personal_madre_ocupacion').val(""),
    $('#txt_Ficha_Personal_madre_direccion').val(""),
    $('#txt_Ficha_Personal_madre_telefono').val(""),
    $('#txt_Ficha_Personal_madre_celular').val(""),

    $('#txt_Ficha_Personal_referencia_nombre').val(""),
    $('#txt_Ficha_Personal_referencia_apellido').val(""),
    $('#txt_Ficha_Personal_referencia_parentesco').val(""),
    $('#txt_Ficha_Personal_referencia_telefono').val(""),

    $('#check_Ficha_Personal_licencia').val(""),
    $('#check_Ficha_Personal_tipo_vehiculo').val(""),
    $('#check_Ficha_Personal_tipo_marca').val(""),
    $('#check_Ficha_Personal_tipo_anio').val(""),
    $('#check_Ficha_Personal_tipo_placa').val("")
    

    $(".check_Ficha_Personal_movilidad:radio").prop("checked", false);
    $(".filter_penales_judiciales:radio").prop("checked", false);
    $('#Ficha_Personal_antecedentes_1').val(""), 
    $('#Ficha_Personal_antecedentes_2').val(""), 
    $('#Ficha_Personal_antecedentes_3').val(""), 
    $('#Ficha_Personal_antecedentes_4').val(""), 

    $(".addFichaPersonalProfesion").remove();
    $(".addFichaPersonalReferencia").remove();
   // $(".addFichaPersonalTecnica").remove();
    //$(".addFichaPersonalOtrosEstudios").remove();
    $(".addFichaPersonalIdiomas").remove();
    $(".input_files_ficha_personal").val(null);
    $(".input_files_ficha_personal_conyuge").val(null);
    $(".input_files_ficha_hijos").val(null);
    $(".addChildren").remove();
    
  }