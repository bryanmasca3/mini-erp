var rutaSQL = "pages/catalogos/seguridad/sql.php";
$(document).ready(function() {


 });
function SeguridadHistorialRegistro(){
  
    $("#SeguridadHistorialRegistro").show();
    $("#SeguridadNuevoRegistro").hide();

    $("#link_nuevo_registro").removeClass("active");
    $("#link_buscar").removeClass("active");

    $("#link_historial_registro").addClass("active");
    gridSecond();       
  }

  function SectionDeclaracionNoSintoHistorial(){
  
    $("#SectionDeclaracionNoSintoHistorial").show();
    $("#SectionDeclaracionNoSintoRegistro").hide();

    $("#link_registro_no_sintomatologia").removeClass("active");
    $("#link_historial_no_sintomatologia").addClass("active");
  //gridSecond();       
  }
  function SectionDeclaracionNoSintoRegistro(){
  
    $("#SectionDeclaracionNoSintoRegistro").show();
    $("#SectionDeclaracionNoSintoHistorial").hide();

    $("#link_historial_no_sintomatologia").removeClass("active");
    $("#link_registro_no_sintomatologia").addClass("active");
  //gridSecond();       
  }
  
  function SeguridadNuevoRegistro(){
  
    $("#SeguridadHistorialRegistro").hide();
    $("#SeguridadNuevoRegistro").show();

    $("#link_historial_registro").removeClass("active");
    $("#link_buscar").removeClass("active");

    $("#link_nuevo_registro").addClass("active");
    //gridFirst();
  }
  function SeguridadHistorial(){
  
    $("#SeguridadHistorial").show();
    $("#SeguridadNuevoControl").hide();

    $("#link_nuevo_Control").removeClass("active");    
    $("#link_historial").addClass("active");
          
  }
  function SeguridadNuevoControl(){
     
    $("#SeguridadHistorial").hide();
    $("#SeguridadNuevoControl").show();

    $("#link_historial").removeClass("active");    
    $("#link_nuevo_Control").addClass("active");
    //gridFour();   
    //gridFive();   
  }
  function SeguridadCrearPernocte(){
    $("#SeguridadRegistrarPernocte").hide();
    $("#SeguridadCrearPernocte").show();

    $("#link_Registrar_Pernocte").removeClass("active");    
    $("#link_Crear_Pernocte").addClass("active");
  }
  function SeguridadRegistrarPernocte(){
    $("#SeguridadCrearPernocte").hide();
    $("#SeguridadRegistrarPernocte").show();

    $("#link_Crear_Pernocte").removeClass("active");    
    $("#link_Registrar_Pernocte").addClass("active");
  }
  function SeguridadCamioneta(){
    $("#SeguridadHistorialCamio_Cisterna").hide();
    $("#SeguridadCisterna").hide();
    $("#SeguridadCamioneta").show();

    $("#link_Cisterna").removeClass("active");  
    $("#link_HistorialCamio_Cisterna").removeClass("active");    
    $("#link_Camioneta").addClass("active");
    gridSix();     
  }
  function SeguridadHistorialCamio_Cisterna(){
     
    $("#SeguridadCisterna").hide();
    $("#SeguridadCamioneta").hide();
    $("#SeguridadHistorialCamio_Cisterna").show();

    $("#link_Camioneta").removeClass("active");    
    $("#link_Cisterna").removeClass("active");   
    $("#link_HistorialCamio_Cisterna").addClass("active");
    //gridSix();     
  }
  function SeguridadCisterna(){
    $("#SeguridadHistorialCamio_Cisterna").hide();
    $("#SeguridadCamioneta").hide();
    $("#SeguridadCisterna").show();

    $("#link_Camioneta").removeClass("active");    
    $("#link_HistorialCamio_Cisterna").removeClass("active");   
    $("#link_Cisterna").addClass("active");
    gridEigth();  
  }
  function gridEigth(){
    
    let txtBuscar = $("#txtBuscar").val();
    let datos = {
      TipoQuery : '01_grid'
    };
    let fila ="";
    var table;
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.tabla.length>0){
        console.log(resp.tabla);
       table= $('#grd08Datos').DataTable( {
          "sPaginationType": "simple",
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
          },
          data: resp.tabla,
          destroy: true,
          columns: 
          [
           
              { data: "id"},                       
              { data: "nombre" },                   
              { data: "id",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(oData.id) {
                  $(nTd).html( ' <div class="form-check">'+
                  '<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>                '+
                '</div>');
              }
            }
          },
          { data: "id",
          fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
            if(oData.id) {
                $(nTd).html( ' <div class="form-check">'+
                '<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>                '+
              '</div>');
            }
          }
        }


           
          ]
      } );                          
      }else{
        $('#grd10DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
      }
      //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
    });
  }
  function gridSix(){
    
    let txtBuscar = $("#txtBuscar").val();
    let datos = {
      TipoQuery : '01_grid'
    };
    let fila ="";
    var table;
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.tabla.length>0){
        
       table= $('#grd06Datos').DataTable( {
          "sPaginationType": "simple",
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
          },
          data: resp.tabla,
          destroy: true,
          columns: 
          [
           
              { data: "id"},                       
              { data: "nombre" },                   
              { data: "id",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(oData.id) {
                  $(nTd).html( ' <div class="form-check">'+
                  '<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>                '+
                '</div>');
              }
            }
          },
          { data: "id",
          fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
            if(oData.id) {
                $(nTd).html( ' <div class="form-check">'+
                '<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>                '+
              '</div>');
            }
          }
        }


           
          ]
      } );                          
      }else{
        $('#grd10DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
      }
      //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
    });
  }

  function gridFive(){
    
    let txtBuscar = $("#txtBuscar").val();
    let datos = {
      TipoQuery : '01_grid'
    };
    let fila ="";
    var table;
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.tabla.length>0){       
       table= $('#grd05Datos').DataTable( {
          "sPaginationType": "simple",
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
          },
          data: resp.tabla,
          destroy: true,
          columns: 
          [
           
              { data: "id"},                       
              { data: "nombre" },           
              { data: "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                if(oData.id) {
                    $(nTd).html('<div class="form-check">'+
                    '<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"></div>');
                }
              }
            },
            { data: "id",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(oData.id) {
                  $(nTd).html( ' <div class="form-check">'+
                  '<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>                '+
                '</div>');
              }
            }
          },
          { data: "id",
          fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
            if(oData.id) {
                $(nTd).html( '<input id="" type="text" class="form-control" placeholder="" value=""/>');
            }
          }
        }


           
          ]
      } );                          
      }else{
        $('#grd10DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
      }
      //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
    });
  }
  function gridFour(){
    
    let txtBuscar = $("#txtBuscar").val();
    let datos = {
      TipoQuery : '01_grid'
    };
    let fila ="";
    var table;
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.tabla.length>0){
        console.log(resp.tabla);
       table= $('#grd04Datos').DataTable( {
          "sPaginationType": "simple",
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
          },
          data: resp.tabla,
          destroy: true,
          columns: 
          [
           
              { data: "id"},                       
              { data: "nombre" },           
              { data: "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                if(oData.id) {
                    $(nTd).html('<div class="form-check">'+
                    '<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"></div>');
                }
              }
            },
            { data: "id",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(oData.id) {
                  $(nTd).html( ' <div class="form-check">'+
                  '<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>                '+
                '</div>');
              }
            }
          },
          { data: "id",
          fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
            if(oData.id) {
                $(nTd).html( '<input id="" type="text" class="form-control" placeholder="" value=""/>');
            }
          }
        }


           
          ]
      } );                          
      }else{
        $('#grd10DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
      }
      //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
    });
  }

  function gridThird(){
      
    let datos = {
      TipoQuery : '01_grid_somnolencia_fatiga'
    };
    let fila ="";
    var table;
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.tabla.length>0){
        console.log(resp.tabla);
       table= $('#grd03DatosHistorialFatigaSomnolencia').DataTable( {
          "sPaginationType": "simple",
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
          },
          data: resp.tabla,
          destroy: true,
          columns: 
          [
           
              { data: "id"},          
              { data: "ope_nombre" },
              { data: "eva_nombre" },
              { data: "fecha" },              
              { data: "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
               /* if(oData.id) {
                    $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print  bg-emerald-500 py-2 px-2 text-white" type="button" onclick="pdf_control_fatiga_sonnolencia('+oData.id+')"></button><button class="fa fa-trash bg-rose-500 py-2 px-2 text-white" type="button" onclick="modalDeleteSolmnolenciaFatiga('+oData.id+')"></button></div>');
                }*/
                  if(oData.id) {
                    $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print  bg-emerald-500 py-2 px-2 text-white" type="button" onclick="pdf_control_fatiga_sonnolencia('+oData.id+')"></button></div>');
                }
              }
            }
          ]
      } );      
      
      table.columns().eq( 0 ).each( function ( colIdx ) {
         
        var parent= $("#SearchGroupFatigaSomnolencia");      
        var child= parent.find("#"+colIdx);    
        child.on('keyup', function() {          
              table
              .column( colIdx )
              .search(child.val(), false, true)
              .draw();
      })   

    } ); 
      }else{
        $('#grd03DatosHistorialFatigaSomnolencia').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados </td></tr>');
      }      
    });
  }
  function modalGridAddPernocte(id){
    let datos = {
      TipoQuery : '01_get_pernocte_grid',
      value:id
    };  
    appAjaxQuery(datos,rutaSQL).done(function(resp){ 

      $('#grd02ModalPernocte_View_Workers > tbody').remove();
      if(resp.tabla2.length>0){
        
        table= $('#grd02ModalPernocte_View_Workers').DataTable( {
           "sPaginationType": "simple",
           "language": {
             "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
           },
           data: resp.tabla2,
           destroy: true,
           columns: 
           [            
               { data: "id"},                       
               { data: "nombres" },                   
               { data: "dni" }, 
               { data: "correo" },            
           /*  { data: "id",
             fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
               if(oData.id) {
                  if(oData.cantidad<3){
                    $(nTd).html( '<div class="form-check">'+
                    '<input class="form-check-input radiobuttonAddHorarioPernocteClass" type="radio" name="radiobuttonAddHorarioPernocte" onclick="addHorarioPernocte('+oData.id+','+id+')"/>'+
                  '</div>');
                  }else{
                    $(nTd).html( '<div class="form-check">'+
                    '<span>limite</span>'+
                  '</div>');
                  }
                 
               }
             }
           }   */           
           ]
       } );                          
       }  
    })
     
  }
  
  function modalRegisterPernocte(id){
    let datos = {
      TipoQuery : '01_get_pernocte',
      value:id
    };  
    var table;   
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      
        $("#txt_id_pernocte").val(resp.tabla1.id)
        $("#txt_proyecto_modal").val(resp.tabla1.proyecto);
        $("#txt_hora_inicio_ruta_modal").val(resp.tabla1.fecha_inicio_ruta);
        $("#txt_hora_inicio_pernocte_modal").val(resp.tabla1.fecha_inicio_pernocte);
        $("#txt_hora_fin_pernocte_modal").val(resp.tabla1.fecha_fin_pernocte);   
        $("#txt_lugar_pernocte_modal").val(resp.tabla1.lugar);  

  
        modalGridAddPernocte(resp.tabla1.id);
        $('#modal_pernocte_view').modal();
        
    } ); 
  }

  function addHorarioPernocte(id_trabajador,id_pernocte){    
    $("#id_hidden_trabajador").val(id_trabajador);
    $("#id_hidden_pernocte").val(id_pernocte);
    $('#modal_add_horario_pernocte').modal();
  }
  function insert_horario_pernocte_modal_add(){
    var pernocte=$("#id_hidden_pernocte").val();
    var trabajador=$("#id_hidden_trabajador").val();
    var inicio=$("#txt_horarios_pernocte_inicio_modal").val();
    var final=$("#txt_horarios_pernocte_fin_modal").val();
    let datos = {
      TipoQuery : '01_insert_horario_pernoecte',
      pernocte:pernocte,
      trabajador:trabajador,
      inicio:inicio,
      final:final,
    };  
    appAjaxQuery(datos,rutaSQL).done(function(resp){
        swal("Se ha insertado correctamente", {
          icon: "success",
      });         

      $("#txt_search_trabajador").val("");
      modalGridAddPernocte($("#txt_id_pernocte").val());
      //modalGridAddPernocte();
      $(".radiobuttonAddHorarioPernocteClass:radio").prop("checked", false);
      $('#modal_add_horario_pernocte').modal('hide');

    });
  }
  function modalEditCapacitacion(id){   
    let datos = {
      TipoQuery : '01_get_capacitacion',
      value:id
    };  
    appAjaxQuery(datos,rutaSQL).done(function(resp){ 
        select_load_tipo_regitro("seguridad_tipo_registro_select_modal",resp.main.id_tipo_registro)
        select_load_area_select("seguridad_area_select_modal",resp.main.id_area)
        
        $("#txt_tema_modal").val(resp.main.tema);
        $("#txt_expositor_modal").val(resp.main.expositor);
        $("#txt_expositor_empresa_modal").val(resp.main.expositor_empresa);
        $("#txt_fecha_capacitaciones_modal").val(resp.main.fecha);
        $("#txt_hora_inicio_modal").val(resp.main.hora_ini);
        $("#txt_hora_final_modal").val(resp.main.hora_fin);
        $("#txt_hora_total_modal").val(resp.main.total_horas);
        $("#txt_objetivos_modal").val(resp.main.objetivos);
        $("#txt_materiales_modal").val(resp.main.materiales_usados);
        $("#txt_lugar_modal").val(resp.main.lugar_capacitacion);
       

        resp.observaciones.forEach(it => {
          $('#table_observaciones_capacitaciones_modal > tbody').append( "<tr><td><input type='text' id='"+it.id+"' class='form-control observaciones_modal' value='"+it.descripcion+"'/>"+
          "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button class='fa fa-trash btn btn-danger btn-xs' onclick='modalDeleteObservaciones("+it.id+");'></button>"+
         // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
          "</div></td></tr>" )
        });
        resp.acuerdos.forEach(it => {
          $('#table_Acuerdos_Compromisos_Capacitaciones_modal > tbody').append( "<tr><td><input type='text' id='"+it.id+"' class='form-control acuerdos_modal' value='"+it.descripcion+"'/>"+
          "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button class='fa fa-trash btn btn-danger btn-xs'onclick='modalDeleteAcuerdos("+it.id+");'></button>"+
         // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
          "</div></td></tr>" )
        });
        //gridModalEdit();
        $('#modal_edit_capacitacion').modal();
        
    } ); 
  }
  function gridPernocte(){  
     
    let datos = {
      TipoQuery : '01_grid_pernocte'
    };
  
    var table;
    appAjaxQuery(datos,rutaSQL).done(function(resp){
     
      if(resp.tabla.length>0){ 

       table= $('#grd01Pernocte').DataTable( {         
          "sPaginationType": "simple",
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
          },
          
          data: resp.tabla,
          destroy: true,
          columns: 
          [
           
              { data: "id"},          
              { data: "proyecto" },
              { data: "fecha_inicio_ruta" },
              { data: "fecha_inicio_pernocte" },
              { data: "fecha_fin_pernocte" },
              { data: "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                if(oData.id) {
                    console.log(oData.id)
                    $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print bg-indigo-500 py-2 px-2 text-white"  type="button"onclick="generatepdfPernocte('+oData.id+')"></button><button class="fa fa-eye bg-cyan-500 py-2 px-2 text-white" type="button" onclick="modalRegisterPernocte('+oData.id+')"></button></div>');
                }
              }
            }
          ]
      }
       );     
      
       table.columns().eq( 0 ).each( function ( colIdx ) {
         
        var parent= $("#SearchControlPernocte");      
        var child= parent.find("#"+colIdx);    
        child.on('keyup', function() {          
              table
              .column( colIdx )
              .search(child.val(), false, true)
              .draw();
      })   

    } );   
      }else{
        $('#grd01Pernocte').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados</td></tr>');
      }      
    });
    

  }
  function generatepdfPernocte(id){

    let datos = {
      TipoQuery : '03_pdf_pernocte',
      id:id 
    }
   // var hashmap = new Map();
    appAjaxQuery(datos,rutaSQL).done(function(resp){  
      console.log(resp)
      /*let result = resp.tabla2.reduce((r, a) => { 
        r[a.id_trabajadores] = [...r[a.id_trabajadores] || [], a];
        return r;
       }, {});

       let data=[];
    for (const key in result) {
        hashmap.set(key, {
          n:result[key][0].id_trabajadores,
          nombres:result[key][0].nombres,
          dni:result[key][0].dni,
          cargo:result[key][0].cargo          
        });
        result[key].forEach((it,index)=>{
          hashmap.get(key)['hor_ini_'+(index+1)]=it.hora_ini
          hashmap.get(key)['hor_fin_'+(index+1)]=it.hora_fin
      })
    }
    for (let value of hashmap.values()){
      data.push(value)
    }
    console.log(data)
    */
    
    var docDefinition = {
      pageOrientation: 'landscape',
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
           text: 'CONTROL DE PERNOCTE',
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
},{
  table: {
    widths: ['40%', '15%', '15%', '15%','15%'],
    // heights: [10,10,10,10,30,10,25],
     headerRows: 1,
     body: [
         [
           {
             
             text: 'SUPERVISOR ESCOLTA',                       
             fontSize: 8,
             bold: true,     
             alignment: 'center',
            fillColor: '#d9d9d9',  
             border: [true, false, true, true]    
           } , 
             {
               text: 'FECHA DE INICIO DE RUTA',              
               bold: true,     
               fontSize: 8,      
               alignment: 'center',
              fillColor: '#d9d9d9', 
               border: [true, false, true, true]   
             },
             { 
               text: 'FIRMA',              
               bold: true,     
               fontSize: 8,
               alignment: 'center',
              fillColor: '#d9d9d9', 
               border: [true, false, true, true]   
             },
             {
              text: 'FECHA INICIO PERNOCTE',              
              bold: true,     
              fontSize: 8,
              alignment: 'center',
            fillColor: '#d9d9d9', 
              border: [true, false, true, true]   
         
             },
             {
              text: 'FECHA FINAL PERNOCTE',              
              bold: true,     
              fontSize: 8,
              alignment: 'center',
            fillColor: '#d9d9d9', 
              border: [true, false, true, true]   
         
             }
         ],                                
         [
          {
            
            text: resp.tabla1.dni_supervisor,                       
            fontSize: 8,
            bold: true,     
            alignment: 'center',      
          } , 
            {
              text: resp.tabla1.fecha_inicio_ruta,              
              bold: true,     
              fontSize: 8,      
              alignment: 'center'
            },
            { 
              text: '',              
              bold: true,     
              fontSize: 8,
              alignment: 'center'
            },
            {
             text:  resp.tabla1.fecha_inicio_pernocte,              
             bold: true,     
             fontSize: 8,
             alignment: 'center'
        
            },
            {
             text:  resp.tabla1.fecha_fin_pernocte,              
             bold: true,     
             fontSize: 8,
             alignment: 'center'
        
            }
        ],
        [
          {
            
            text: 'PROYECTO / RUTA',                       
            fontSize: 8,
            bold: true,  
            colSpan:3,   
                  fillColor: '#d9d9d9', 
            alignment: 'center',      
          } , {},{},
            {
              text: 'LUGAR',              
              bold: true,     
              fontSize: 8,
                    fillColor: '#d9d9d9',       
              colSpan:2,
              alignment: 'center'
            },{}
        ],
        [
          {
            
            text: resp.tabla1.proyecto,                       
            fontSize: 8,
            bold: true,  
            colSpan:3,   
            alignment: 'center',      
          } , {},{},
            {
              text: resp.tabla1.lugar,              
              bold: true,     
              fontSize: 8,      
              colSpan:2,
              alignment: 'center'
            },{}
        ]
   
     ]
  }
  },
{
  table: {
    widths: ['5%','25%','15%','15%','10%','10%','10%','10%' ],
    // heights: [10,10,10,10,30,10,25],
     headerRows: 1,
     body:buildTableBody(['id_trabajadores','nombres','dni','cargo',
     'hora_ini','firma','hora_fin','firma'],resp.tabla2, [
      { 
          text: 'N°',               
          bold: true,              
          fontSize: 8,       
          fillColor: '#339966',     
          border: [true, false, true, false]
          
      },{ 
     
        text: ' NOMBRES Y APELLIDOS ',               
        bold: true,          
        fontSize: 8,  
        fillColor: '#339966',  
        border: [true, false, true, false]        
    },
    { 
     
      text: 'DNI',               
      bold: true,          
      fontSize: 8,
      fillColor: '#339966',    
      border: [true, false, true, false]        
      }  ,
      { 
        
        text: 'CARGO',               
        bold: true,        
        fillColor: '#339966',    
        fontSize: 8,  
        border: [true, false, true, false]        
    }  ,
    { 
        
      text: 'HORA DE INICIO',               
      bold: true,          
      fontSize: 8,  
      fillColor: '#d9d9d9', 
      border: [true, false, true, false]        
    }    ,
    { 
        
      text: 'FIRMA',               
      bold: true,          
      fontSize: 8,
       fillColor: '#d9d9d9',  
      border: [true, false, true, false]        
    } , 
    { 
        
      text: 'HORA TERMINO',               
      bold: true,          
      fontSize: 8,  
       fillColor: '#d9d9d9', 
      border: [true, false, true, false]        
    } , 
    { 
        
      text: 'FIRMA',               
      bold: true,          
      fontSize: 8,  
       fillColor: '#d9d9d9', 
      border: [true, false, true, false]        
    }                
  ])
  },
  },
  {
    table: {
      widths: ['80%','20%'],
      // heights: [10,10,10,10,30,10,25],
       headerRows: 1,
       body:[
        [
          {
            
            text: 'Tomar en cuenta:',                       
            fontSize: 8,
            bold: true,      
            border: [true, false, true, true]                       
          } , 
            {
              text: 'FIRMA DEL SUPERVISOR HSE',              
              bold: true,     
              fontSize: 8,      
              alignment: 'center',
              border: [true, false, true, true]   
            }
        ],                                        
       [
         {
          text:  '1. La escolta es responsable de hacer el control respectivo para el cumplimiento del presente documento. '+
          '2. Los operadores deben cumplir con las normas de la zona de pernocte. '+
          '3. De incumplir con las normas de seguridad establecidas por Coporación de Servicios Moquegua será merecedor de una sanción pre-escrita por la empresa, si es reincidente se solicitará su retiro inmediato',                       
          fontSize: 8,                  
                         
         } ,
           {
             text: '',                          
             fontSize: 8,                 
             alignment: 'center'
           }
       ],
    
  
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
function gridSintomatologia(){
  let datos = {
    TipoQuery : '01_grid_sintomatologia'
  };
  var table;
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    console.log(resp)
    if(resp.tabla.length>0){      
     table= $('#grd01Sintomatologia').DataTable( {         
        "sPaginationType": "simple",
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
        },
        
        data: resp.tabla,
        destroy: true,
        columns: 
        [         
            { data: "id"},          
            { data: "nombres" },
            { data: "dni" },
         //   { data: "area" },            
            { data: "id",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(oData.id) {                  
                /*  $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print bg-indigo-500 py-2 px-2 text-white"  type="button" onclick="generatepdfSintomatology('+oData.id+')"></button><button class="fa fa-trash bg-rose-500 py-2 px-2 text-white" type="button" onclick="deleteSintomatologyRegister('+oData.id+')">');*/
                    $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print bg-indigo-500 py-2 px-2 text-white"  type="button" onclick="generatepdfSintomatology('+oData.id+')"></button>');
              }
            }
          }
        ]
    }
     );     
    
     table.columns().eq( 0 ).each( function ( colIdx ) {
       
      var parent= $("#SearchButtonSintomatologia");      
      var child= parent.find("#"+colIdx);    
      child.on('keyup', function() {          
            table
            .column( colIdx )
            .search(child.val(), false, true)
            .draw();
    })   

  } );   
    }else{
      $('#grd01Sintomatologia').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados</td></tr>');
    }    
  });  
}

function deleteSintomatologyRegister(id){
  
  swal({    
    text: "¿Deseas Eliminar la sintomatología?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {  
      let datos = {
        TipoQuery : '01_delete_sintomatologia',
        value:id
      };
        console.log(id)
      appAjaxQuery(datos,rutaSQL).done(function(resp){      
          gridSintomatologia();   
      });  
      
    }
  });
}
function load_field_supervisor(id){
  var msn=$("#txt_search_supervisor").val();
  let datos = {
    TipoQuery : '02_search_Supervisor',
    value:msn
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){   
    if(resp.error){
      swal("No se encontro incidencia para el DNI", {
        icon: "warning",
      });
    }else{
      console.log(resp)
      swal("Has seleccionado a: "+resp.tabla.nombres+" "+resp.tabla.apellidos+"", {
        icon: "success",
      });
      $("#txt_uspervisor_search").val(resp.tabla.id);
      $("#txt_nombre_supervisor").val(resp.tabla.nombres);
      $("#txt_apellido_supervisor").val(resp.tabla.apellidos);    

    }
 
 
    
  });
}
function gridCheckListPreUso(){
  let datos = {
    TipoQuery : '01_grid_checkList'
  };
  var table;
  appAjaxQuery(datos,rutaSQL).done(function(resp){
   let newData=resp.tabla1.concat(resp.tabla2)  
    if(newData.length>0){      
     table= $('#grd01checkListHistorial').DataTable( {         
        "sPaginationType": "simple",
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
        },
        
        data: newData,
        destroy: true,
        columns: 
        [
         
            { data: "id"},          
            { data: "nombres" },
            { data: "fecha" },
            { data: "actividad" },
            //{ data: "tipo" },
            { data: "id",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(oData.id) {
                  if(oData.tipo==1){
                    $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print bg-indigo-500 py-2 px-2 text-white"  type="button" onclick="pdf_check_list_camioneta('+oData.id+')"></button>');
                  }else{
                    $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print bg-indigo-500 py-2 px-2 text-white"  type="button" onclick="pdf_check_list_cisterna('+oData.id+')"></button>');
                  }
                  
              }
            }
          }
        ]
    }
     );     
    
     table.columns().eq( 0 ).each( function ( colIdx ) {
       
      var parent= $("#SearchCheckListHistorialGroup");      
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
function deleteCheckListCamio_Cister(id){

  swal({    
    text: "¿Deseas Eliminar la registro?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {  
      let datos = {
        TipoQuery : '01_delete_checklist_camioneta',
        value:id
      };
       
      appAjaxQuery(datos,rutaSQL).done(function(resp){      
        gridCheckListPreUso();   
      });  
      
    }
  });
}
function deleteCheckListCamio_Cister2(id){

  swal({    
    text: "¿Deseas Eliminar la registro?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {  
      let datos = {
        TipoQuery : '01_delete_checklist_cisterna',
        value:id
      };
       
      appAjaxQuery(datos,rutaSQL).done(function(resp){      
        gridCheckListPreUso();   
      });  
      
    }
  });
}
  function gridSecond(){  
        
    let datos = {
      TipoQuery : '01_grid'
    };
    var table;
    var asistance="asistance";
    appAjaxQuery(datos,rutaSQL).done(function(resp){
     
      if(resp.tabla.length>0){      
       table= $('#grd01Datos').DataTable( {         
          "sPaginationType": "simple",
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
          },
          
          data: resp.tabla,
          destroy: true,
          columns: 
          [
           
              { data: "id"},          
              { data: "tipo" },
              { data: "area" },
              { data: "tema" },
              { data: "fecha" },
              { data: "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              /*  if(oData.id) {
                    console.log(oData.id)
                    $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button type="button" class ="fa fa-copy bg-amber-500 py-2 px-2 text-white"onclick="copyToClipboard();"></button><button class="fa fa-print bg-indigo-500 py-2 px-2 text-white" type="button" onclick="pdf_capacitacion('+oData.id+')"></button>');
                }*/
                   if(oData.id) {
                    console.log(oData.id)
                    $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print bg-indigo-500 py-2 px-2 text-white" type="button" onclick="pdf_capacitacion('+oData.id+')"></button>');
                }
              }
            }
          ]
      }
       );     
      
       table.columns().eq( 0 ).each( function ( colIdx ) {
         
        var parent= $("#SearchSeguridadHistorialRegistro");      
        var child= parent.find("#"+colIdx);    
        child.on('keyup', function() {          
              table
              .column( colIdx )
              .search(child.val(), false, true)
              .draw();
      })   

    } );   
      }else{
        $('#grd01Datos').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados</td></tr>');
      }    
    });
    

  }

function insertPernocte(){

  if(validarcamposPernocte()){
    swal("Completa todos los campos", {
      icon: "error",
    });
  }else{
      let datos = {
        TipoQuery : '01_insert_pernocte',
        data:{
          id_supervisor:$("#txt_uspervisor_search").val(),
          fecha_inicio_ruta: $("#txt_fecha_inicio_ruta").val(),
          proyecto: $("#txt_proyecto").val(),
          fecha_inicio_pernocte:$("#txt_fecha_inicio_pernocte").val(),
          fecha_fin_pernocte:$("#txt_fecha_fin_pernocte").val(),  
          lugar:$("#txt_lugar_pernocte").val()
        },
      };
      
    /*  swal({    
        text: "¿Deseas insertar nuevo Pernocte?",
        icon: "info",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {    
*/
          appAjaxQuery(datos,rutaSQL).done(function(resp){                
            swal("Se ha insertado correctamente", {
              icon: "success",
            });
            gridPernocte();
            ResetPernocte();
          });  
          
     //   }
  //    });
}
}

function ResetPernocte(){  

  $("#txt_nombre_supervisor").val("");
  $("#txt_uspervisor_search").val("");
  $("#txt_apellido_supervisor").val("");
  $("#txt_search_supervisor").val("");
  $("#txt_fecha_inicio_ruta").datepicker("setDate",moment().format("DD/MM/YYYY"));
  $("#txt_proyecto").val("");
  $("#txt_fecha_inicio_pernocte").datepicker("setDate",moment().format("DD/MM/YYYY"));
  $("#txt_fecha_fin_pernocte").datepicker("setDate",moment().format("DD/MM/YYYY"));  
  $("#txt_lugar_pernocte").val("");
}
function search_Trabajador(){


  var msn=$("#txt_search_trabajador").val();
 let datos = {
    TipoQuery : '02_search_Trabajador',
    value:msn
  };

  appAjaxQuery(datos,rutaSQL).done(function(resp){   
    if(resp.error){
      swal("No se encontro incidencia para el DNI", {
        icon: "warning",
      });
    }else{         
      swal({    
        title: ""+resp.tabla.nombres+" "+resp.tabla.apellidos+"",       
        text: "¿Estas seguro que deseas agregarlo?",
        icon: "info",
        buttons: true,
        dangerMode: false,
      })
      .then((willDelete) => {
        if (willDelete) {              
          addHorarioPernocte(resp.tabla.id,$("#txt_id_pernocte").val());
         /* let datos = {
            TipoQuery : '02_insert_pernocte_workers',
            value:resp.tabla.id,
            second:$("#txt_id_pernocte").val()
          };
          
          appAjaxQuery(datos,rutaSQL).done(function(resp){                
            /*swal("Se ha insertado correctamente", {
               icon: "success",
            });       
          //  modalGridAddPernocte($("#txt_id_pernocte").val());
          });  */
          
        }
      });

    }
 
 
    
  });
}
  function load_field_sintomatologia(id){


    var msn=$("#txt_search_operador_sintomatologia").val();
   let datos = {
      TipoQuery : '02_search_Operador',
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
        $("#txt_nombre_operador").val(resp.tabla.nombres);
        $("#txt_apellido_operador").val(resp.tabla.apellidos);
        $("#txt_area_operador").val(resp.tabla.area);
        $("#txt_dni_operador").val(resp.tabla.dni);
        $("#txt_direccion_operador").val(resp.tabla.direccion);
        $("#txt_numero_operador").val(resp.tabla.celular);
        $("#txtOperadorSearchSintomatologia").val(resp.tabla.id);
        
      }
   
   
      
    });
  }
  /*function select_load_operadores(){
    let datos = {
      TipoQuery : '01_select_operadores'
    };
 
    appAjaxQuery(datos,rutaSQL).done(function(resp){      
      $.each(resp.tabla, function (i, item) {
        $('#seguridad_dni_operador').append($('<option>', { 
            value: item.value,
            text : item.text 
        }));
      });
    });
  
  }*/
  function resetCheckListCisterna(){    
    $("#txt_search_cisterna_conductor").val("");
    $("#txt01_conductor_cisterna_nombre").val("");
    $("#txt01_conductor_cisterna_dni").val("");
    $("#txt_firma_conductor_citerna").val("");
    $("#txt_firma_supervisor_citerna").val("");
    $('#txt01_conductor_cisterna_id').val("");
    $('#txt01_conductor_cisterna_LC').val("");
    $('#txt01_conductor_cisterna_capacidad').val("");       
    $("#txt01_conductor_cisterna_hora").val("");
    $("#txt01_conductor_cisterna_placas").val("");
    $("#txt01_conductor_cisterna_km_tracto").val("");
    $("#txt01_conductor_cisterna_km_cisterna").val("");
    $("#txt01_conductor_cisterna_actividad").val("");
    $("#txt01_conductor_cisterna_fecha").datepicker("setDate",moment().format("DD/MM/YYYY"));
    $("#txt01_conductor_km_inicial").val("");
    $("#txt01_conductor_hora_ini").val("");
    $("#txt01_conductor_km_inicial_2").val("");
    $("#txt01_conductor_hora_ini_2").val("");
    $("#txt01_camioneta_km_observaciones").val("");

    $(".checkList2_declaracion_jurada:radio").prop("checked", false);
    $(".checkList2_luces:radio").prop("checked", false);
    $(".checkList2_documentos:radio").prop("checked", false);
    $(".checkList2_general:radio").prop("checked", false);
    $(".checkList2_neumaticos:radio").prop("checked", false);
    $(".checkList2_motor:radio").prop("checked", false);
    $(".checkList2_seguridad:radio").prop("checked", false);
    $(".checkList2_sistema_recarga:radio").prop("checked", false);


    $(".input_luces_cisterna").each(function(){
      $(this).val("");
    });
    $(".input_documentos_cisterna").each(function(){
      $(this).val("");
    });
    $(".input_general_cisterna").each(function(){
      $(this).val("");
    });
    $(".input_neumaticos_cisterna").each(function(){
      $(this).val("");
    });
    $(".input_motor_cisterna").each(function(){
      $(this).val("");
    });
    $(".input_seguridad_cisterna").each(function(){
      $(this).val("");
    });
    $(".input_descarga_abastecimiento_cisterna").each(function(){
      $(this).val("");
    });

    $("#headerpanel21").css({
      "background-color": "#ffffff"
    })
    $("#headerpanel22").css({
     "background-color": "#ffffff"
    })
    $("#headerpanel23").css({
     "background-color": "#ffffff"
    })
    $("#headerpanel24").css({
     "background-color": "#ffffff"
    })
    $("#headerpanel25").css({
     "background-color": "#ffffff"
    })
    $("#headerpanel26").css({
     "background-color": "#ffffff"
    })
    $("#headerpanel27").css({
      "background-color": "#ffffff"
     })
  }
  function resetCheckListCamioneta(){  
    $("#txt01_camioneta_fecha").datepicker("setDate",moment().format("DD/MM/YYYY"));
    $('#txt01_camioneta_conductor_id').val("")
    $('#txt01_camioneta_nombres_conductor').val("")
    $('#txt01_camioneta_apellidos_conductor').val("")        
    $("#txt01_camioneta_hora").val("");
    $("#seguridad_placa_camioneta").val("");
    $("#txt01_camioneta_km_inicial").val("");
    $("#txt01_camioneta_km_final").val("");
    $("#txt01_camioneta_km_actividad").val("");
    $("#txt01_camioneta_osbervaciones").val("");
    $(".checkList_declaracion_jurada:radio").prop("checked", false);
    $(".checkList_category_luces:radio").prop("checked", false);
    $(".checkList_category_documentos:radio").prop("checked", false);
    $(".checkList_category_general:radio").prop("checked", false);
    $(".checkList_category_neumatico:radio").prop("checked", false);
    $(".checkList_category_motor:radio").prop("checked", false);
    $(".checkList_category_seguridad:radio").prop("checked", false);
    $( "#table_pasajeros_checklist > tbody > tr" ).remove();

    $(".input_luces_camioneta").each(function(){
      $(this).val("");
    });
    $(".input_documentos_camioneta").each(function(){
      $(this).val("");
    });
    $(".input_general_camioneta").each(function(){
      $(this).val("");
    });
    $(".input_neumaticos_camioneta").each(function(){
      $(this).val("");
    });
    $(".input_motor_camioneta").each(function(){
      $(this).val("");
    });
    $(".input_seguridad_camioneta").each(function(){
      $(this).val("");
    });

    $("#headerpanel11").css({
      "background-color": "#ffffff"
  })
  $("#headerpanel12").css({
    "background-color": "#ffffff"
})
$("#headerpanel13").css({
  "background-color": "#ffffff"
})
$("#headerpanel14").css({
  "background-color": "#ffffff"
})
$("#headerpanel15").css({
  "background-color": "#ffffff"
})
$("#headerpanel16").css({
  "background-color": "#ffffff"
})
  }
  function ResetDeclaracionNoSintomatologia(){
    $("#txt_search_operador_sintomatologia").val("");
    $("#txtOperadorSearchSintomatologia").val("");
    $("#txt_nombre_operador").val("");
    $("#txt_apellido_operador").val("");
    $("#txt_area_operador").val("");
    $("#txt_dni_operador").val("");
    $("#txt_direccion_operador").val("");
    $("#txt_numero_operador").val("");
    $(".check_sintomatologia:radio").prop("checked", false);
  }
  function generatepdfSintomatology(id){

    let datos = {
      TipoQuery : '03_pdf_sintomatologia',
      id:id 
    }
    appAjaxQuery(datos,rutaSQL).done(function(resp){  
      console.log(resp)

    var docDefinition = {
      content: [
{
table: {
    widths: ['100%'],
    headerRows: 1,
    body: [
        [
          {
            
            text: 'Ficha de sintomatológica COVID-19 para el regreso o',                      
            fontSize: 12,
            bold: true,
            alignment: 'center'            
          }        
        ],
        [
     
          {
            text: 'Reincorporación al trabajo',                
            bold: true,
            fontSize: 12,
            alignment: 'center'
          }      
      ],                  
      [
       
        { 
          text: 'DECLARACIÓN JURADA',              
          fontSize: 14,
          bold: true,
          alignment: 'center'
        }    
    ],  
    [  
      { 
        text: 'He recibido explicación del objetivo de esta evaluación y me comprometo a responder con la verdad',              
        fontSize: 8
      }
  ] 
  
    ]
}
},
{
  table: {
      widths: ['25%', '25%','25%','25%'],     
      headerRows: 1,
      body: [
          [
            {              
              text: 'Empresa o Entidad Pública:',         
              fillColor: '#d9d9d9',     
              bold: true,
              fontSize: 8,             
              border: [true, false, true, true]                   
            }, 
            { 
            text: '', 
            fillColor: '#d9d9d9',     
            bold: true,
            fontSize: 8,   
            border: [true, false, true, true] 
           },
            {              
              text: 'RUC:',                   
              bold: true,
              fontSize: 8,             
              border: [true, false, true, true]                        
            } ,
            { text:'',     
              fillColor: '#d9d9d9',     
              bold: true,
              fontSize: 8,         
              border: [true, false, true, true] }
          ],     
          [
            {              
              text: 'Apellidos y nombres:',         
              fillColor: '#d9d9d9',     
              bold: true,
              fontSize: 8,             
                       
            }, 
            { 
            text: resp.table.nombres, 
            fillColor: '#d9d9d9',     
            bold: true,
            fontSize: 8,
            colSpan:3
         
           },
            {              
                                 
            } ,
            {
            }
          ],
          [
            {              
              text: 'Área de trabajo:',         
              fillColor: '#d9d9d9',     
              bold: true,
              fontSize: 8,             
                       
            }, 
            { 
            text: resp.table.area, 
            fillColor: '#d9d9d9',     
            bold: true,
            fontSize: 8,   
         
           },
            {              
              text: 'DNI:',                   
              bold: true,
              fontSize: 8,             
                                  
            } ,
            { text:resp.table.dni,     
              fillColor: '#d9d9d9',     
              bold: true,
              fontSize: 8,                      
            }
          ],
          [
            {              
              text: 'Dirección:',         
              fillColor: '#d9d9d9',     
              bold: true,
              fontSize: 8,             
                       
            }, 
            { 
            text: resp.table.direccion, 
            fillColor: '#d9d9d9',     
            bold: true,
            fontSize: 8,   
         
           },
            {              
              text: 'Número (celular):',                   
              bold: true,
              fontSize: 8,             
                                  
            } ,
            { text:resp.table.celular,     
              fillColor: '#d9d9d9',     
              bold: true,
              fontSize: 8,                      
            }
            
          ]
      ]
  }
  },
  {
    table: {
        widths: ['90%','5%','5%'],
       // heights: [10,10,10,10,30,10,25],
        headerRows: 1,
        body: [
            [
                { 
                    text: 'En los últimos 14 días calendario ha tenido alguno de los síntomas siguientes:',               
                    bold: true,
                    fontSize: 8,
                    border: [true, false, true, true],
                    colSpan:3                                
                } ,
              {              
              },  
              {              
              }                
            ],
            [
              { 
                text: '',               
                bold: true,
                fontSize: 8,           
                fillColor: '#d9d9d9'   
            } ,         
          {
            text: 'SI',               
            bold: true,
            fontSize: 8,          
            fillColor: '#d9d9d9'
          },  
          {
            text: 'NO',               
            bold: true,
            fontSize: 8,              
            fillColor: '#d9d9d9'
          }
          ],
          [
            { 
              text: '1. Sensación de alza térmica o fiebre',               
              bold: true,
              fontSize: 8,
                                      
          } ,         
        {
          text: resp.table.P_1=="1"?'X':'',               
          bold: true,
          fontSize: 8,          
        
        },  
        {
          text: resp.table.P_1=="0"?'X':'',               
          bold: true,
          fontSize: 8,              
        
        }
        ] ,
        [
          { 
            text: '2. Dolor de garganta , tos, estornudos o dificultad para respirar',               
            bold: true,
            fontSize: 8,
                                    
        } ,         
      {
        text:  resp.table.P_2=="1"?'X':'',               
        bold: true,
        fontSize: 8,          
      
      },  
      {
        text:  resp.table.P_2=="0"?'X':'',               
        bold: true,
        fontSize: 8,              
    
      }
      ] ,
      [
        { 
          text: '3. Dolor de cabeza, diarrea o congestión nasa',               
          bold: true,
          fontSize: 8,
                                  
      } ,         
    {
      text:  resp.table.P_3=="1"?'X':'',               
      bold: true,
      fontSize: 8,          
    
    },  
    {
      text:  resp.table.P_3=="0"?'X':'',               
      bold: true,
      fontSize: 8,              
  
    }
    ] ,
    [
      { 
        text: '4. Pérdida del gusto y/o del olfato',               
        bold: true,
        fontSize: 8,
                                
    } ,         
  {
    text:  resp.table.P_4=="1"?'X':'',               
    bold: true,
    fontSize: 8,          
  
  },  
  {
    text:  resp.table.P_4=="0"?'X':'',               
    bold: true,
    fontSize: 8,              

  }
  ] ,
  [
    { 
      text: '5. Contacto con un caso confirmado de COVID-19',               
      bold: true,
      fontSize: 8,
                              
  } ,         
{
  text:  resp.table.P_5=="1"?'X':'',               
  bold: true,
  fontSize: 8,          

},  
{
  text:  resp.table.P_5=="0"?'X':'',               
  bold: true,
  fontSize: 8,              

}
] , [
  { 
    text: '6. Está tomando alguna medicación (detallar cuál o cuáles)',               
    bold: true,
    fontSize: 8,
                            
} ,         
{
text:  resp.table.P_6=="1"?'X':'',               
bold: true,
fontSize: 8,          

},  
{
text:  resp.table.P_6=="0"?'X':'',               
bold: true,
fontSize: 8,              

}
] , [
  { 
    text: '7. Pertenece a algún grupo de Riesgo para COVID-19',               
    bold: true,
    fontSize: 8,
    border: [true, true, true, false]                     
} ,         
{
text:  resp.table.P_7=="1"?'X':'',               
bold: true,
fontSize: 8,          
border: [true, true, true, false] 
},  
{
text:  resp.table.P_7=="0"?'X':'',               
bold: true,
fontSize: 8,              
border: [true, true, true, false] 
}
] ]
    }
  } ,
  {
    table: {
        widths: ['25%','25%','25%','25%'],
       // heights: [10,10,10,10,30,10,25],
        headerRows: 1,
        body: [
            [
                { 
                    text: 'Especifique',               
                    bold: true,
                    fontSize: 8 ,
                                 
                } ,
              {
                text: '',               
                bold: true,
                fontSize: 8,   
                conSpan:3,                         
              },  
              {
             
              },
              {
           
              }
                
            ],
            [
              { 
                text: 'He recibido explicación del objetivo de esta evaluación y he respondido con la verdad.',               
                bold: true,
                fontSize: 8,  
                colSpan:4                              
            } ,
          {
           
          },  
          {
         
          },
          {
     
          }
          ],
          [
            { 
              text: 'Fecha: ',               
              bold: true,
              fontSize: 8               
                               
          } ,
        {
          text: '',               
          bold: true,
          fontSize: 8                   
        },  
        {
          text: 'Firma del trabajador',               
          bold: true,
          fontSize: 8          
        },
        {
          text: '',               
          bold: true,
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

  function pdf_check_list_cisterna(id){
           
    let  datos={
      TipoQuery : '03_pdf_checkList_cisterna', 
      id:id
    }
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
              rowSpan:4
            } , 
              {
                text: 'FORMATO',              
                bold: true,
                fontSize: 8,
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
              text: 'REGISTRO',
              rowSpan: 3,              
              bold: true,
              fontSize: 8,
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
      [
        {               
        }, 
        {      
        },
        { 
          text: 'Páginas:',              
          fontSize: 8
        },
        {
            text: '1',
            fontSize: 8
        }
    ] 
    
      ]
  }
  },
  {
    table: {
        widths: ['20%', '20%', '15%','15%', '15%','15%'],
       // heights: [10,10,10,10,30,10,25],
        headerRows: 1,
        body: [
            [
              {              
                text: 'CONDUCTOR',         
                fillColor: '#65b58f',     
                bold: true,
                alignment: 'center', 
                fontSize: 8,             
                border: [true, false, true, true]                   
              }, 
              { 
              text: resp.tabla.nombres,               
              bold: true,
              fontSize: 8,       
              border: [true, false, true, true] 
             },
              {              
                text: 'DNI',                    
                bold: true,
                alignment: 'center', 
                fontSize: 8, 
                fillColor: '#65b58f',             
                border: [true, false, true, true]                  
              } ,
              { text: resp.tabla.dni,     
                border: [true, false, true, true] ,          
                fontSize: 8,         
                  },
                {              
                  text: 'L.C #',                    
                  bold: true,
                  alignment: 'center', 
                  fontSize: 8, 
                  fillColor: '#65b58f',             
                  border: [true, false, true, true]                  
                } ,
                { text: resp.tabla.lc,                                      
                  fontSize: 8,    
                  border: [true, false, true, true]      
                   },
            ],     
            [
              {              
                text: 'CAPACIDAD',         
                fillColor: '#65b58f',     
                bold: true,
                alignment: 'center', 
                fontSize: 8,             
                                 
              }, 
              { 
              text: resp.tabla.capacidad,               
              
              fontSize: 8,       
              
             },
              {              
                text: 'FECHA',                    
                bold: true,
                alignment: 'center', 
                fontSize: 8, 
                fillColor: '#65b58f',             
                                   
              } ,
              { text: resp.tabla.fecha,     
                              
                fontSize: 8,         
                },
                {              
                  text: 'HORA',                    
                  bold: true,
                  alignment: 'center', 
                  fontSize: 8, 
                  fillColor: '#65b58f',             
                                      
                } ,
                { text: resp.tabla.hora_cisterna,                    
                  
                  fontSize: 8,         
                   },
            ],
            [
              {              
                text: 'PLACA TRACTO',         
                fillColor: '#65b58f',     
                bold: true,
                alignment: 'center', 
                fontSize: 8,             
                                 
              }, 
              { 
              text: resp.tabla.placa,               
              
              fontSize: 8,       
              
             },
              {              
                text: 'PLACA CISTERNA',                    
                bold: true,
                alignment: 'center', 
                fontSize: 8, 
                fillColor: '#65b58f',             
                                   
              } ,
              { text: resp.tabla.km_tracto,     
                colSpan:3,
                fontSize: 8,         
                 }
            ],
            [
              {              
                text: 'ACTIVIDAD',         
                fillColor: '#65b58f',     
                bold: true,
                alignment: 'center', 
                fontSize: 8,  
                rowSpan:2,           
                                 
              }, 
              { 
              text: resp.tabla.actividad,               
              rowSpan:2,    
              fontSize: 8,       
              
             },
              {              
                text: 'KILOMETRAJE INICIAL',                    
                bold: true,
                alignment: 'center', 
                fontSize: 8, 
                fillColor: '#65b58f',             
                                     
              } ,
              { text: resp.tabla.km_inicial,     
                              
                fontSize: 8,         
                  },
                {              
                  text: 'HORA',                    
                  bold: true,
                  alignment: 'center', 
                  fontSize: 8, 
                  fillColor: '#65b58f',             
                                     
                } ,
                { text: resp.tabla.hora_ini,                    
                  
                  fontSize: 8,         
                   },
              
            ],
            [
              {                                              
              }, 
              {              
             },
              {              
                text: 'KILOMETRAJE FINAL',                    
                bold: true,
                alignment: 'center', 
                fontSize: 8, 
                fillColor: '#65b58f',             
                                    
              } ,
              { text: resp.tabla.km_inicial_2,     
                              
                fontSize: 8,         
                 },
                {              
                  text: 'HORA',                    
                  bold: true,
                  alignment: 'center', 
                  fontSize: 8, 
                  fillColor: '#65b58f',             
                                      
                } ,
                { text: resp.tabla.hora_ini_2,                    
                  
                  fontSize: 8,         
                   },
              
            ]
        ]
    }
    },
    {
      table: {
          widths: ['80%','10%','10%'],
         // heights: [10,10,10,10,30,10,25],
          headerRows: 1,
          body: [
              [
                  { 
                      text: 'DECLARACION JURADA DEL CONDUCTOR',               
                      bold: true,
                      fontSize: 8,
                      fillColor: '#ffff00',
                      border: [true, false, true, true] ,  
                      alignment: 'center',            
                  } ,
                {
                  text: 'SI',               
                  bold: true,
                  fontSize: 8,          
                  fillColor: '#d9d9d9',
                  border: [true, false, true, true] 
                },  
                {
                  text: 'NO',               
                  bold: true,
                  fontSize: 8,              
                  fillColor: '#d9d9d9',
                  border: [true, false, true, true] 
                }
                  
              ],
              [
                { 
                  text: 'He descansado lo suficiente y me encuentro en condiciones de conducir',               
                  bold: true,
                  fontSize: 8,           
                              
              } ,         
            {
              text: resp.tabla.J_1=="1"?'X':'',               
              bold: true,
              fontSize: 8,          
              
            },  
            {
              text:  resp.tabla.J_1=="0"?'X':'',               
              bold: true,
              fontSize: 8,              
              
            }
            ],
            [
              { 
                text: 'Me siento en buenas condiciones físicas y no tengo ninguna dolencia o enfermedad que me impida conducir en forma segura ',               
                bold: true,
                fontSize: 8,
              
                            
            } ,         
          {
            text:  resp.tabla.J_2=="1"?'X':'',               
            bold: true,
            fontSize: 8,          
            
          },  
          {
            text:  resp.tabla.J_2=="0"?'X':'',               
            bold: true,
            fontSize: 8,              
            
          }
          ] ,
          [
            { 
              text: 'Estoy tomando medicamentos recetados por un médico quien me ha asegurado que no son impedimento para conducir de forma segura',               
              bold: true,
              fontSize: 8,
       
                          
          } ,         
        {
          text:  resp.tabla.J_3=="1"?'X':'',               
          bold: true,
          fontSize: 8,          
          
        },  
        {
          text:  resp.tabla.J_3=="0"?'X':'',               
          bold: true,
          fontSize: 8,              
          
        }
        ] ,
        [
          { 
            text: 'Me encuentro emocional y personalmente en buenas condiciones para poder concentrarme en la conducción segura del vehculo',               
            bold: true,
            fontSize: 8
        
                        
        } ,         
      {
        text:  resp.tabla.J_4=="1"?'X':'',               
        bold: true,
        fontSize: 8,          
        
      },  
      {
        text:  resp.tabla.J_4=="0"?'X':'',               
        bold: true,
        fontSize: 8,              
        
      }
      ] ,
      [
        { 
          text: 'Estoy consciente de la responsabilidad que significa conducir este vehiculo , sin poner en riesgo mi integridad, la de mis compañeros ni el patrimonio de la empresa',               
          bold: true,
          fontSize: 8
                      
      } ,         
    {
      text:  resp.tabla.J_5=="1"?'X':'',               
      bold: true,
      fontSize: 8,          
      
    },  
    {
      text:  resp.tabla.J_5=="0"?'X':'',               
      bold: true,
      fontSize: 8,              
      
    }
    ] ]
      }
    } ,
    {
      table: {
          widths: ['40%','10%','50%'],
         // heights: [10,10,10,10,30,10,25],
          headerRows: 1,
          body: [
            [
                { 
                    text: 'LUCES',               
                    bold: true,
                    fontSize: 8,                               
                    alignment: 'center', 
                    fillColor: '#65b58f',   
                      border: [true, false, true, true]                 
                } ,
              {
                text: 'Conforme?',               
                bold: true,
                fontSize: 8,      
                alignment: 'center',     
                fillColor: '#d9d9d9',
                  border: [true, false, true, true]  
              },  
              {
                text: 'Observaciones',               
                bold: true,
                fontSize: 8,              
                alignment: 'center', 
                fillColor: '#d9d9d9', 
                  border: [true, false, true, true]  
              }             
          ],  
          [
            { 
                text: 'Luces altas',               
                bold: true,
                fontSize: 8,                               
                alignment: 'center', 
                
                  border: [true, false, true, true]                 
            } ,
            {
              text: resp.tabla.L_1=="1" ? "SI"
                : resp.tabla.L_1=="0" ? "NO"              
                : "N/A",               
              bold: true,
              fontSize: 8,               
            },  
          {
            text: resp.tabla.L_1_Obs,               
            bold: true,
            fontSize: 8,              
            alignment: 'center', 
       
              border: [true, false, true, true]  
          }             
        ]   ,
        [
          { 
              text: 'Luces altas',               
              bold: true,
              fontSize: 8,                               
              alignment: 'center', 
            
                border: [true, false, true, true]                 
          } ,
          {
            text: resp.tabla.L_2=="1" ? "SI"
            : resp.tabla.L_2=="0" ? "NO"              
            : "N/A",               
            bold: true,
            fontSize: 8,          
            
            },    
        {
          text: resp.tabla.L_2_Obs,               
          bold: true,
          fontSize: 8,              
          alignment: 'center', 
         
            border: [true, false, true, true]  
        }             
    ] ,
    [
      { 
          text: 'Luces laterales',               
          bold: true,
          fontSize: 8,                               
          alignment: 'center', 
        
            border: [true, false, true, true]                 
      } ,
      {
        text: resp.tabla.L_3=="1" ? "SI"
        : resp.tabla.L_3=="0" ? "NO"              
        : "N/A",               
        bold: true,
        fontSize: 8,          
        
        },      
    {
      text: resp.tabla.L_3_Obs,               
      bold: true,
      fontSize: 8,              
      alignment: 'center', 
     
        border: [true, false, true, true]  
    }             
],
[
  { 
      text: 'Luz de placa',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  } ,
  {
    text: resp.tabla.L_4=="1" ? "SI"
    : resp.tabla.L_4=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,          
    
    },      
{
  text: resp.tabla.L_4_Obs,               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
 
    border: [true, false, true, true]  
}             
],
[
  { 
      text: 'Luz de placa',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  } ,
  {
    text: resp.tabla.L_5=="1" ? "SI"
    : resp.tabla.L_5=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,          
    
    },      
{
  text: resp.tabla.L_5_Obs,               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
 
    border: [true, false, true, true]  
}             
],
[
  { 
      text: 'Luz de emergencia',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
  text: resp.tabla.L_6=="1" ? "SI"
  : resp.tabla.L_6=="0" ? "NO"              
  : "N/A",               
  bold: true,
  fontSize: 8,          
  
  },     
{
  text: resp.tabla.L_6_Obs,               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
 
    border: [true, false, true, true]  
}             
] ,


[
  { 
      text: 'Luz de proceso',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
      
        border: [true, false, true, true]                 
  } ,
  {
    text: resp.tabla.L_7=="1" ? "SI"
      : resp.tabla.L_7=="0" ? "NO"              
      : "N/A",               
    bold: true,
    fontSize: 8,               
  },  
{
  text: resp.tabla.L_7_Obs,               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 

    border: [true, false, true, true]  
}             
]   ,
[
{ 
    text: 'Luz de parqueo',               
    bold: true,
    fontSize: 8,                               
    alignment: 'center', 
  
      border: [true, false, true, true]                 
} ,
{
  text: resp.tabla.L_8=="1" ? "SI"
  : resp.tabla.L_8=="0" ? "NO"              
  : "N/A",               
  bold: true,
  fontSize: 8,          
  
  },    
{
text: resp.tabla.L_8_Obs,               
bold: true,
fontSize: 8,              
alignment: 'center', 

  border: [true, false, true, true]  
}             
] ,
[
{ 
text: 'Indicadores del tablero',               
bold: true,
fontSize: 8,                               
alignment: 'center', 

  border: [true, false, true, true]                 
} ,
{
text: resp.tabla.L_9=="1" ? "SI"
: resp.tabla.L_9=="0" ? "NO"              
: "N/A",               
bold: true,
fontSize: 8,          

},      
{
text: resp.tabla.L_9_Obs,               
bold: true,
fontSize: 8,              
alignment: 'center', 

border: [true, false, true, true]  
}             
],
[
{ 
text: 'Cicrulina (ambar) / Baliza estroboscopica',               
bold: true,
fontSize: 8,                               
alignment: 'center', 

border: [true, false, true, true]                 
} ,
{
text: resp.tabla.L_10=="1" ? "SI"
: resp.tabla.L_10=="0" ? "NO"              
: "N/A",               
bold: true,
fontSize: 8,          

},      
{
text: resp.tabla.L_10_Obs,               
bold: true,
fontSize: 8,              
alignment: 'center', 

border: [true, false, true, true]  
}             
],
[
{ 
text: 'Faros principales / Faros neblineros / Luces pirata',               
bold: true,
fontSize: 8,                               
alignment: 'center', 

border: [true, false, true, true]                 
} ,
{
text: resp.tabla.L_11=="1" ? "SI"
: resp.tabla.L_11=="0" ? "NO"              
: "N/A",               
bold: true,
fontSize: 8,          

},      
{
text: resp.tabla.L_11_Obs,               
bold: true,
fontSize: 8,              
alignment: 'center', 

border: [true, false, true, true]  
}             
],
[
{ 
text: 'Bocina',               
bold: true,
fontSize: 8,                               
alignment: 'center', 

border: [true, false, true, true]                 
},
{
text: resp.tabla.L_12=="1" ? "SI"
: resp.tabla.L_12=="0" ? "NO"              
: "N/A",               
bold: true,
fontSize: 8,          

},     
{
text: resp.tabla.L_12_Obs,               
bold: true,
fontSize: 8,              
alignment: 'center', 

border: [true, false, true, true]  
}             
] ,
[
  { 
  text: 'Limpia parabrisas',               
  bold: true,
  fontSize: 8,                               
  alignment: 'center', 
  
  border: [true, false, true, true]                 
  },
  {
  text: resp.tabla.L_13=="1" ? "SI"
  : resp.tabla.L_13=="0" ? "NO"              
  : "N/A",               
  bold: true,
  fontSize: 8,          
  
  },     
  {
  text: resp.tabla.L_13_Obs,               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
  
  border: [true, false, true, true]  
  }             
  ] ,
  [
    { 
    text: 'Direcionales (izq. - der.)',               
    bold: true,
    fontSize: 8,                               
    alignment: 'center', 
    
    border: [true, false, true, true]                 
    },
    {
    text: resp.tabla.L_14=="1" ? "SI"
    : resp.tabla.L_14=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,          
    
    },     
    {
    text: resp.tabla.L_14_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
    
    border: [true, false, true, true]  
    }             
    ] ,
[
  { 
      text: 'DOCUMENTOS',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
      fillColor: '#65b58f',   
        border: [true, false, true, true]                 
  } ,
{
  text: 'Conforme?',               
  bold: true,
  fontSize: 8,      
  alignment: 'center',     
  fillColor: '#d9d9d9',
    border: [true, false, true, true]  
},  
{
  text: 'Observaciones',               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
  fillColor: '#d9d9d9', 
    border: [true, false, true, true]  
}             
],  
[
    { 
        text: 'Licencia de conducir',               
        bold: true,
        fontSize: 8,                               
        alignment: 'center', 
      
          border: [true, false, true, true]                 
    },
    {
      text:  resp.tabla.D_1=="1" ? "SI"
      : resp.tabla.D_1=="0" ? "NO"              
      : "N/A",               
      bold: true,
      fontSize: 8,               
      
      },      
    {
      text: resp.tabla.D_1_Obs,               
      bold: true,
      fontSize: 8,              
      alignment: 'center', 
    
        border: [true, false, true, true]  
    }             
],    
[
  { 
      text: 'Certificados de Cursos de Capacitación',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_2=="1" ? "SI"
    : resp.tabla.D_2=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },     
  {
    text: resp.tabla.D_2_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],   
[
  { 
      text: 'Tarjeta de Propiedad',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_3=="1" ? "SI"
    : resp.tabla.D_3=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },     
  {
    text: resp.tabla.D_3_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],   
[
  { 
      text: 'SOAT',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_4=="1" ? "SI"
    : resp.tabla.D_4=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },     
  {
    text: resp.tabla.D_4_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],  
[
  { 
      text: 'Fotocheck con licencia interna de manejo',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.D_5=="1" ? "SI"
    : resp.tabla.D_5=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },    
  {
    text: resp.tabla.D_5_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Revision Tecnica',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.D_6=="1" ? "SI"
    : resp.tabla.D_6=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },     
  {
    text: resp.tabla.D_6_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Cartilla de emergencias',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.D_7=="1" ? "SI"
    : resp.tabla.D_7=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },      
  {
    text: resp.tabla.D_7_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Plan de emergencia:',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_8=="1" ? "SI"
    : resp.tabla.D_8=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },       
  {
    text: resp.tabla.D_8_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],




[
  { 
      text: 'MSDS',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_9=="1" ? "SI"
    : resp.tabla.D_9=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },       
  {
    text: resp.tabla.D_9_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Directorio de emergencia',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_10=="1" ? "SI"
    : resp.tabla.D_10=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },       
  {
    text: resp.tabla.D_10_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Poliza de seguros y responsabilidad civil',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_11=="1" ? "SI"
    : resp.tabla.D_11=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },       
  {
    text: resp.tabla.D_11_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'SCTR Pensión y salud',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_12=="1" ? "SI"
    : resp.tabla.D_12=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },       
  {
    text: resp.tabla.D_12_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Seguro de vida Ley',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_13=="1" ? "SI"
    : resp.tabla.D_13=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },       
  {
    text: resp.tabla.D_13_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Certificado de Aptitud Medica',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_14=="1" ? "SI"
    : resp.tabla.D_14=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },       
  {
    text: resp.tabla.D_14_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Tarjeta cubicación vigente',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_15=="1" ? "SI"
    : resp.tabla.D_15=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },       
  {
    text: resp.tabla.D_15_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Ficha de registro por OSINERGMING (DGH)',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_16=="1" ? "SI"
    : resp.tabla.D_16=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },       
  {
    text: resp.tabla.D_16_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Certificado de hermeticidad del tanque císterna (copia)',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_17=="1" ? "SI"
    : resp.tabla.D_17=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },       
  {
    text: resp.tabla.D_17_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Otros.',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_18=="1" ? "SI"
    : resp.tabla.D_18=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },       
  {
    text: resp.tabla.D_18_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'GENERAL',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
      fillColor: '#65b58f',   
        border: [true, false, true, true]                 
  } ,
{
  text: 'Conforme?',               
  bold: true,
  fontSize: 8,      
  alignment: 'center',     
  fillColor: '#d9d9d9',
    border: [true, false, true, true]  
},  
{
  text: 'Observaciones',               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
  fillColor: '#d9d9d9', 
    border: [true, false, true, true]  
}             
],
[
  { 
      text: 'Estado de máscara frontal',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_1=="1" ? "SI"
    : resp.tabla.G_1=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },      
  {
    text: resp.tabla.G_1_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Espejos retrovisores e interiores',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_2=="1" ? "SI"
    : resp.tabla.G_2=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },  
  {
    text: resp.tabla.G_2_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Estado de la carrocería',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_3=="1" ? "SI"
    : resp.tabla.G_3=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },  
  {
    text: resp.tabla.G_3_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Espejos convexos',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_4=="1" ? "SI"
    : resp.tabla.G_4=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },  
  {
    text: resp.tabla.G_4_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Defensas laterales',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_5=="1" ? "SI"
    : resp.tabla.G_5=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_5_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Llave de corte de energia',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_6=="1" ? "SI"
    : resp.tabla.G_6=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_6_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Sistema de aire acondicionado y calefacción operativo',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_7=="1" ? "SI"
    : resp.tabla.G_7=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_7_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Traba tuercas (12)',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_8=="1" ? "SI"
    : resp.tabla.G_8=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_8_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Bandeja pequeña en caja de válvulas de carga / descarga',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_9=="1" ? "SI"
    : resp.tabla.G_9=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_9_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Exterior de la cisterna en buen esstado',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_10=="1" ? "SI"
    : resp.tabla.G_10=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_10_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Parabrisas y ventanas sin rajaduras',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_11=="1" ? "SI"
    : resp.tabla.G_11=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_11_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Plumillas limpia y lava parabrisas',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_12=="1" ? "SI"
    : resp.tabla.G_12=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_12_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Seguro de puertas',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_13=="1" ? "SI"
    : resp.tabla.G_13=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_13_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'NEUMATICOS',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
      fillColor: '#65b58f',   
        border: [true, false, true, true]                 
  } ,
{
  text: 'Conforme?',               
  bold: true,
  fontSize: 8,      
  alignment: 'center',     
  fillColor: '#d9d9d9',
    border: [true, false, true, true]  
},  
{
  text: 'Observaciones',               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
  fillColor: '#d9d9d9', 
    border: [true, false, true, true]  
}             
],
[
  { 
      text: 'Presion de Aire',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.N_1=="1" ? "SI"
    : resp.tabla.N_1=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,              
  
  },
  {
    text: resp.tabla.N_1_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Abultamientos',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.N_2=="1" ? "SI"
    : resp.tabla.N_2=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,              
  
  },
  {
    text: resp.tabla.N_2_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Cortaduras',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.N_3=="1" ? "SI"
    : resp.tabla.N_3=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,              
    
    },
  {
    text: resp.tabla.N_3_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Llanta de respuesto (02)',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.N_4=="1" ? "SI"
    : resp.tabla.N_4=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },
  {
    text: resp.tabla.N_4_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'MOTOR',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
      fillColor: '#65b58f',   
        border: [true, false, true, true]                 
  } ,
{
  text: 'Conforme?',               
  bold: true,
  fontSize: 8,      
  alignment: 'center',     
  fillColor: '#d9d9d9',
    border: [true, false, true, true]  
},  
{
  text: 'Observaciones',               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
  fillColor: '#d9d9d9', 
    border: [true, false, true, true]  
}             
],
[
  { 
      text: 'Nivel de aceite',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_1=="1" ? "SI"
    : resp.tabla.M_1=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_1_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Nivel de refrigerante',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_2=="1" ? "SI"
    : resp.tabla.M_2=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_2_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Nivel de liquido de frenos',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_3=="1" ? "SI"
    : resp.tabla.M_3=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_3_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Nivel de liquido de embrague',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_4=="1" ? "SI"
    : resp.tabla.M_4=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_4_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Nivel de agua para limpia parabrisas',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_5=="1" ? "SI"
    : resp.tabla.M_5=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_5_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Fugas hidráulicas',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_6=="1" ? "SI"
    : resp.tabla.M_6=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_6_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Estado de fajas',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_7=="1" ? "SI"
    : resp.tabla.M_7=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_7_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Estado del radiador',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_8=="1" ? "SI"
    : resp.tabla.M_8=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_8_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Estado de la bateria',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_9=="1" ? "SI"
    : resp.tabla.M_9=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_9_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'SEGURIDAD',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
      fillColor: '#65b58f',   
        border: [true, false, true, true]                 
  } ,
{
  text: 'Conforme?',               
  bold: true,
  fontSize: 8,      
  alignment: 'center',     
  fillColor: '#d9d9d9',
    border: [true, false, true, true]  
},  
{
  text: 'Observaciones',               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
  fillColor: '#d9d9d9', 
    border: [true, false, true, true]  
}             
],
[
  { 
      text: 'Rombos NFPA',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_1=="1" ? "SI"
    : resp.tabla.S_1=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_1_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Números UN',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_2=="1" ? "SI"
    : resp.tabla.S_2=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_2_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Rombos DOT (4 lados)',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_3=="1" ? "SI"
    : resp.tabla.S_3=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_3_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Cadena de arrastre',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_4=="1" ? "SI"
    : resp.tabla.S_4=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_4_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Mata chisps en tubo de escape',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_5=="1" ? "SI"
    : resp.tabla.S_5=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_5_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Cinturón de seguridad',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_6=="1" ? "SI"
    : resp.tabla.S_6=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_6_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Alarma de retroceso',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_7=="1" ? "SI"
    : resp.tabla.S_7=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_7_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Bocina',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_8=="1" ? "SI"
    : resp.tabla.S_8=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_8_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'EPP completo y en buen estado',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_9=="1" ? "SI"
    : resp.tabla.S_9=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_9_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Ropa impermeable',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_10=="1" ? "SI"
    : resp.tabla.S_10=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_10_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Extintores Cargados y vigentes',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_11=="1" ? "SI"
    : resp.tabla.S_11=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_11_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: '01 kit de herramientas',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_12=="1" ? "SI"
    : resp.tabla.S_12=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_12_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: '01 kit de antiderrames',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_13=="1" ? "SI"
    : resp.tabla.S_13=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_13_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Gata y palanca',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_14=="1" ? "SI"
    : resp.tabla.S_14=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_14_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Tacos de madera para gata hidráulica (02)',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_15=="1" ? "SI"
    : resp.tabla.S_15=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_15_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Llave de ruedas',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_16=="1" ? "SI"
    : resp.tabla.S_16=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_16_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Manguera de aire',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_17=="1" ? "SI"
    : resp.tabla.S_17=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.S_17_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
]





,
[
  { 
      text: 'Botiquín',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_18=="1" ? "SI"
    : resp.tabla.S_18=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.S_18_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
]
,
[
  { 
      text: 'Linterna',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_19=="1" ? "SI"
    : resp.tabla.S_19=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.S_19_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
]
,
[
  { 
      text: 'Triángulos reflectivos (02)',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_20=="1" ? "SI"
    : resp.tabla.S_20=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.S_20_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
]
,
[
  { 
      text: 'Conos de seguridad con cinta reflectiva (03)',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_21=="1" ? "SI"
    : resp.tabla.S_21=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.S_21_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
]
,
[
  { 
      text: 'Tacos de madera (02)',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_22=="1" ? "SI"
    : resp.tabla.S_22=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.S_22_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
]
,
[
  { 
      text: 'Tacos de goma para llantas (02)',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_23=="1" ? "SI"
    : resp.tabla.S_23=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.S_23_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
]
,
[
  { 
      text: 'Estrobo (01) cable remolcador de 1 5m de largo',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_24=="1" ? "SI"
    : resp.tabla.S_24=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.S_24_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
]
,
[
  { 
      text: 'Cables cocdrillo de terminal rojo y verde (02)',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_25=="1" ? "SI"
    : resp.tabla.S_25=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.S_25_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
]
,
[
  { 
      text: 'Maletín de parchado',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_26=="1" ? "SI"
    : resp.tabla.S_26=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.S_26_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
]
,
[
  { 
      text: 'Lampa y pico',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_27=="1" ? "SI"
    : resp.tabla.S_27=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.S_27_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
]
,
[
  { 
      text: 'Equipo de comunicación (Celular o radio de comunicación)',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_28=="1" ? "SI"
    : resp.tabla.S_28=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.S_28_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
]
,
[
  { 
      text: 'GPS con señal',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_29=="1" ? "SI"
    : resp.tabla.S_29=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.S_29_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
]
,
[
  { 
      text: 'Cámaras HD Operativas',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_30=="1" ? "SI"
    : resp.tabla.S_30=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.S_30_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
]
,
[
  { 
      text: 'Tablet copiloto con rutas cargadas',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_31=="1" ? "SI"
    : resp.tabla.S_31=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.S_31_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'SISTEMA DE RECARGA Y ABASTECIMIENTO',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
      fillColor: '#65b58f',   
        border: [true, false, true, true]                 
  } ,
{
  text: 'Conforme?',               
  bold: true,
  fontSize: 8,      
  alignment: 'center',     
  fillColor: '#d9d9d9',
    border: [true, false, true, true]  
},  
{
  text: 'Observaciones',               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
  fillColor: '#d9d9d9', 
    border: [true, false, true, true]  
}             
],



[
  { 
      text: 'Tapas de manhole hermeticamente cerrada',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.R_1=="1" ? "SI"
    : resp.tabla.R_1=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.R_1_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Válvulas de fondo (*)',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.R_2=="1" ? "SI"
    : resp.tabla.R_2=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.R_2_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Mangueras de descarga en buen estado',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.R_3=="1" ? "SI"
    : resp.tabla.R_3=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.R_3_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Puesta a tierra',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.R_4=="1" ? "SI"
    : resp.tabla.R_4=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.R_4_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Mangueras de reuperación de gases 4 x6m incluye tapas y cadenas',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.R_5=="1" ? "SI"
    : resp.tabla.R_5=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.R_5_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Codo visor',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.R_6=="1" ? "SI"
    : resp.tabla.R_6=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, true]  
    },
  {
    text: resp.tabla.R_6_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
       ]
      }
    } ,

    {
      table: {
          widths: ['100%'],       
          headerRows: 1,
          body: [    
            [
              { 
                text: 'OBSERVACIONES',               
                bold: true,
                fontSize: 8,
                fillColor: '#65b58f',   
                border: [true, false, true, true]  
                            
            }
          ] ,
          [
            { 
              text: resp.tabla.observacion,               
                  bold: true,
                  fontSize: 8,
                  border: [true, false, true, true]  
                                                         
          } ] , [       
        {
          text: 'DEJO CONSTANCIA DEL ESTADO DE MI UNIDAD Y ASUMO LA RESPONSABILIDAD CON SEGURIDAD',               
          bold: true,
          fontSize: 8,          
          fillColor: '#65b58f',
        }
        ]]
      }
    },
    {
      table: {
          widths: ['20%','30%','20%','30%'],       
          headerRows: 1,
          body: [    
            [
              { 
                text: 'FIRMA DEL CONDUCTOR',               
                bold: true,
                fontSize: 8,
                fillColor: '#d9d9d9',
                colSpan:2,
                alignment: 'center',  
                border: [true, false, true, true]  
                            
              },{},
              { 
                text: 'FIRMA DEL SUPERVISOR',               
                bold: true,
                fontSize: 8,
                colSpan:2,
                alignment: 'center',  
                fillColor: '#d9d9d9',
                border: [true, false, true, true]  
                            
            },{}    
          ] ,
          [
            { 
              text: '',               
              bold: true,
              fontSize: 8,     
              colSpan:2,
         
                          
            },{},
            { 
              text: '',               
              bold: true,
              fontSize: 8,
              colSpan:2,                              
          },{}   
          ],
          [
            { 
              text: 'NOMBRE Y APELLIDOS',               
              bold: true,
              fontSize: 8,                                         
            },{
              text: '',               
              bold: true,
              fontSize: 8,
            },
            { 
              text: 'NOMBRE Y APELLIDOS',               
              bold: true,
              fontSize: 8,
                                          
          },{
            text: '',               
            bold: true,
            fontSize: 8
        }   ]  ,
        [
          { 
            text: 'DNI',               
            bold: true,
            fontSize: 8,                                         
          },{
            text: '',               
            bold: true,
            fontSize: 8,
          },
          { 
            text: 'DNI',               
            bold: true,
            fontSize: 8,
                                        
        },{
          text: '',               
          bold: true,
          fontSize: 8
      }   ]      
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
  function pdf_check_list_camioneta(id){
           
  let  datos={
    TipoQuery : '03_pdf_checkList_camioneta', 
    id:id
  }
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
            rowSpan:4
          } , 
            {
              text: 'FORMATO',              
              bold: true,
              fontSize: 8,
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
            text: 'REGISTRO',
            rowSpan: 3,              
            bold: true,
            fontSize: 8,
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
    [
      {               
      }, 
      {      
      },
      { 
        text: 'Páginas:',              
        fontSize: 8
      },
      {
          text: '1',
          fontSize: 8
      }
  ] 
  
    ]
}
},
{
  table: {
      widths: ['20%', '20%', '15%','15%', '15%','15%'],
     // heights: [10,10,10,10,30,10,25],
      headerRows: 1,
      body: [
          [
            {              
              text: 'CONDUCTOR ESCOLTA',         
              fillColor: '#65b58f',     
              bold: true,
              alignment: 'center', 
              fontSize: 8,             
              border: [true, false, true, true]                   
            }, 
            { 
            text: resp.tabla.nombres,               
            bold: true,
            fontSize: 8,
            colSpan:2,
            border: [true, false, true, true] 
           },{},
            {              
              text: 'DNI',                    
              bold: true,
              alignment: 'center', 
              fontSize: 8, 
              fillColor: '#65b58f',             
              border: [true, false, true, true]                     
            } ,
            { text: resp.tabla.dni,     
              conSpan:2,
              bold: true,
              fontSize: 8,         
              border: [true, false, false, true]  },
              {text: '',
                border: [false, false, true, true]}
          ],     
          [
            {              
              text: 'FECHA',         
              fillColor: '#65b58f',   
              alignment: 'center',   
              bold: true,
              fontSize: 8,
                                     
            }, 
            { 
            text: resp.tabla.fecha,               
            bold: true,
            fontSize: 8,
            colSpan:2,
            
           },{},
            {              
              text: 'HORA DE INSPECCION',                    
              bold: true,
              fontSize: 8,  
              alignment: 'center', 
              fillColor: '#65b58f',          
              border: [true, false, true, false]                       
            } ,
            { text:resp.tabla.hora,              
              bold: true,
              fontSize: 8,
              colSpan:2,
              border: [true, false, true, false] },{}
          ],
          [
            {              
              text: 'PLACA',         
              fillColor: '#65b58f',  
              alignment: 'center',  
              bold: true,
              fontSize: 8,            
              border: [true, false, true, false]                   
            }, 
            { 
            text:resp.tabla.placa,     
              
            bold: true,
            fontSize: 8,        
            border: [true, false, true, false] 
           },{
            text: 'Km Inicial',         
            fillColor: '#d9d9d9', 
            alignment: 'center',     
            bold: true,
            fontSize: 8,         
         
           },
            {              
              text: resp.tabla.km_ini,                    
              bold: true,
              fontSize: 8,           
                              
            } ,
            {   text: 'Km final',         
            fillColor: '#d9d9d9',     
            alignment: 'center', 
            bold: true,
            fontSize: 8,        
        },
            {
              text: resp.tabla.km_fin,                    
              bold: true,
              fontSize: 8,           
          
            }
          ],
          [
            {
              
              text: 'ACTIVIDAD/ DESTINO',              
              bold: true,
              fontSize: 8,
              alignment: 'center', 
              fillColor: '#65b58f',  
              border: [true, true, true, false]                   
            }, { 
              text: resp.tabla.actividad,              
            bold: true,
            fontSize: 8,        
            colSpan:5,
            border: [true, true, true, false] },{},{},{},{}
            
          ]
      ]
  }
  },
  {
    table: {
        widths: ['80%','10%','10%'],
       // heights: [10,10,10,10,30,10,25],
        headerRows: 1,
        body: [
            [
                { 
                    text: 'DECLARACION JURADA DEL CONDUCTOR',               
                    bold: true,
                    fontSize: 8,
                    fillColor: '#ffff00',  
                    alignment: 'center',            
                } ,
              {
                text: 'SI',               
                bold: true,
                fontSize: 8,          
                fillColor: '#d9d9d9'
              },  
              {
                text: 'NO',               
                bold: true,
                fontSize: 8,              
                fillColor: '#d9d9d9'
              }
                
            ],
            [
              { 
                text: 'He descansado lo suficiente y me encuentro en condiciones de conducir',               
                bold: true,
                fontSize: 8,           
                            
            } ,         
          {
            text: resp.tabla.J_1=="1"?'X':'',               
            bold: true,
            fontSize: 8,          
            
          },  
          {
            text:  resp.tabla.J_1=="0"?'X':'',               
            bold: true,
            fontSize: 8,              
            
          }
          ],
          [
            { 
              text: 'Me siento en buenas condiciones físicas y no tengo ninguna dolencia o enfermedad que me impida conducir en forma segura ',               
              bold: true,
              fontSize: 8,
            
                          
          } ,         
        {
          text:  resp.tabla.J_2=="1"?'X':'',               
          bold: true,
          fontSize: 8,          
          
        },  
        {
          text:  resp.tabla.J_2=="0"?'X':'',               
          bold: true,
          fontSize: 8,              
          
        }
        ] ,
        [
          { 
            text: 'Estoy tomando medicamentos recetados por un médico quien me ha asegurado que no son impedimento para conducir de forma segura',               
            bold: true,
            fontSize: 8,
     
                        
        } ,         
      {
        text:  resp.tabla.J_3=="1"?'X':'',               
        bold: true,
        fontSize: 8,          
        
      },  
      {
        text:  resp.tabla.J_3=="0"?'X':'',               
        bold: true,
        fontSize: 8,              
        
      }
      ] ,
      [
        { 
          text: 'Me encuentro emocional y personalmente en buenas condiciones para poder concentrarme en la conducción segura del vehculo',               
          bold: true,
          fontSize: 8
      
                      
      } ,         
    {
      text:  resp.tabla.J_4=="1"?'X':'',               
      bold: true,
      fontSize: 8,          
      
    },  
    {
      text:  resp.tabla.J_4=="0"?'X':'',               
      bold: true,
      fontSize: 8,              
      
    }
    ] ,
    [
      { 
        text: 'Estoy consciente de la responsabilidad que significa conducir este vehiculo , sin poner en riesgo mi integridad, la de mis compañeros ni el patrimonio de la empresa',               
        bold: true,
        fontSize: 8
                    
    } ,         
  {
    text:  resp.tabla.J_5=="1"?'X':'',               
    bold: true,
    fontSize: 8,          
    
  },  
  {
    text:  resp.tabla.J_5=="0"?'X':'',               
    bold: true,
    fontSize: 8,              
    
  }
  ] ]
    }
  } ,
  {
    table: {
        widths: ['40%','10%','50%'],
       // heights: [10,10,10,10,30,10,25],
        headerRows: 1,
        body: [
            [
                { 
                    text: 'LUCES',               
                    bold: true,
                    fontSize: 8,                               
                    alignment: 'center', 
                    fillColor: '#65b58f',   
                      border: [true, false, true, true]                 
                } ,
              {
                text: 'Conforme?',               
                bold: true,
                fontSize: 8,      
                alignment: 'center',     
                fillColor: '#d9d9d9',
                  border: [true, false, true, true]  
              },  
              {
                text: 'Observaciones',               
                bold: true,
                fontSize: 8,              
                alignment: 'center', 
                fillColor: '#d9d9d9', 
                  border: [true, false, true, true]  
              }             
          ],  
          [
            { 
                text: 'Luces de retroceso',               
                bold: true,
                fontSize: 8,                               
                alignment: 'center', 
                
                  border: [true, false, true, true]                 
            } ,
            {
              text: resp.tabla.L_1=="1" ? "SI"
                : resp.tabla.L_1=="0" ? "NO"              
                : "N/A",               
              bold: true,
              fontSize: 8,               
            },  
          {
            text: resp.tabla.L_1_Obs,               
            bold: true,
            fontSize: 8,              
            alignment: 'center', 
       
              border: [true, false, true, true]  
          }             
        ]   ,
        [
          { 
              text: 'Luces de parqueo',               
              bold: true,
              fontSize: 8,                               
              alignment: 'center', 
            
                border: [true, false, true, true]                 
          } ,
          {
            text: resp.tabla.L_2=="1" ? "SI"
            : resp.tabla.L_2=="0" ? "NO"              
            : "N/A",               
            bold: true,
            fontSize: 8,          
            
            },    
        {
          text: resp.tabla.L_2_Obs,               
          bold: true,
          fontSize: 8,              
          alignment: 'center', 
         
            border: [true, false, true, true]  
        }             
    ] ,
    [
      { 
          text: 'Indicadores de tablero',               
          bold: true,
          fontSize: 8,                               
          alignment: 'center', 
        
            border: [true, false, true, true]                 
      } ,
      {
        text: resp.tabla.L_4=="1" ? "SI"
        : resp.tabla.L_4=="0" ? "NO"              
        : "N/A",               
        bold: true,
        fontSize: 8,          
        
        },      
    {
      text: resp.tabla.L_3_Obs,               
      bold: true,
      fontSize: 8,              
      alignment: 'center', 
     
        border: [true, false, true, true]  
    }             
],
[
  { 
      text: 'Circulina (ambar) /Baliza estroboscópica',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  } ,
  {
    text: resp.tabla.L_5=="1" ? "SI"
    : resp.tabla.L_5=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,          
    
    },      
{
  text: resp.tabla.L_4_Obs,               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
 
    border: [true, false, true, true]  
}             
],
[
  { 
      text: 'Faros principales / Faros neblineros / Luces pirata',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  } ,
  {
    text: resp.tabla.L_6=="1" ? "SI"
    : resp.tabla.L_6=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,          
    
    },      
{
  text: resp.tabla.L_5_Obs,               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
 
    border: [true, false, true, true]  
}             
],
[
  { 
      text: 'Direccionales (izq.-der.)',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
  text: resp.tabla.L_9=="1" ? "SI"
  : resp.tabla.L_9=="0" ? "NO"              
  : "N/A",               
  bold: true,
  fontSize: 8,          
  
  },     
{
  text: resp.tabla.L_6_Obs,               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
 
    border: [true, false, true, true]  
}             
] ,
[
  { 
      text: 'DOCUMENTOS',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
      fillColor: '#65b58f',   
        border: [true, false, true, true]                 
  } ,
{
  text: 'Conforme?',               
  bold: true,
  fontSize: 8,      
  alignment: 'center',     
  fillColor: '#d9d9d9',
    border: [true, false, true, true]  
},  
{
  text: 'Observaciones',               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
  fillColor: '#d9d9d9', 
    border: [true, false, true, true]  
}             
],  
[
    { 
        text: 'Licencia de conducir',               
        bold: true,
        fontSize: 8,                               
        alignment: 'center', 
      
          border: [true, false, true, true]                 
    },
    {
      text:  resp.tabla.D_1=="1" ? "SI"
      : resp.tabla.D_1=="0" ? "NO"              
      : "N/A",               
      bold: true,
      fontSize: 8,               
      
      },      
    {
      text: resp.tabla.D_1_Obs,               
      bold: true,
      fontSize: 8,              
      alignment: 'center', 
    
        border: [true, false, true, true]  
    }             
],    
[
  { 
      text: 'DNI del conductor',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_2=="1" ? "SI"
    : resp.tabla.D_2=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },     
  {
    text: resp.tabla.D_2_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],   
[
  { 
      text: 'Tarjeta de Propiedad',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_3=="1" ? "SI"
    : resp.tabla.D_3=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },     
  {
    text: resp.tabla.D_3_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],   
[
  { 
      text: 'SOAT',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_4=="1" ? "SI"
    : resp.tabla.D_4=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },     
  {
    text: resp.tabla.D_4_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],  
[
  { 
      text: 'Fotocheck con licencia interna de manejo',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.D_5=="1" ? "SI"
    : resp.tabla.D_5=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },    
  {
    text: resp.tabla.D_5_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Revision Tecnica',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.D_6=="1" ? "SI"
    : resp.tabla.D_6=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },     
  {
    text: resp.tabla.D_6_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Cartilla de emergencias',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.D_7=="1" ? "SI"
    : resp.tabla.D_7=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },      
  {
    text: resp.tabla.D_7_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Otros:',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text:  resp.tabla.D_8=="1" ? "SI"
    : resp.tabla.D_8=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },       
  {
    text: resp.tabla.D_8_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'GENERAL',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
      fillColor: '#65b58f',   
        border: [true, false, true, true]                 
  } ,
{
  text: 'Conforme?',               
  bold: true,
  fontSize: 8,      
  alignment: 'center',     
  fillColor: '#d9d9d9',
    border: [true, false, true, true]  
},  
{
  text: 'Observaciones',               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
  fillColor: '#d9d9d9', 
    border: [true, false, true, true]  
}             
],
[
  { 
      text: 'Estado de máscara frontal',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_1=="1" ? "SI"
    : resp.tabla.G_1=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },      
  {
    text: resp.tabla.G_1_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Espejos retrovisores e interiores',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_2=="1" ? "SI"
    : resp.tabla.G_2=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },  
  {
    text: resp.tabla.G_2_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Estado de la carrocería',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_3=="1" ? "SI"
    : resp.tabla.G_3=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },  
  {
    text: resp.tabla.G_3_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Parabrisas y ventanas sin rajaduras',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_4=="1" ? "SI"
    : resp.tabla.G_4=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },  
  {
    text: resp.tabla.G_4_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Plumillas limpia y lava parabrisas',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_5=="1" ? "SI"
    : resp.tabla.G_5=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_5_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Cinturones de seguridad',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_6=="1" ? "SI"
    : resp.tabla.G_6=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_6_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Seguro de puerta',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_7=="1" ? "SI"
    : resp.tabla.G_7=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_7_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Claxon',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_8=="1" ? "SI"
    : resp.tabla.G_8=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_8_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Espárragos, tuercas (Torque según fabricante ), seguro de tuercas',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_9=="1" ? "SI"
    : resp.tabla.G_9=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_9_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Letreros identificatorios',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_10=="1" ? "SI"
    : resp.tabla.G_10=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_10_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Frenos ABS',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_11=="1" ? "SI"
    : resp.tabla.G_11=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_11_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Sist. de Comunicación:Radio base y/o telefono satelital',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_12=="1" ? "SI"
    : resp.tabla.G_12=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_12_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Alarma de retroceso',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_13=="1" ? "SI"
    : resp.tabla.G_13=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_13_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Bocina',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_14=="1" ? "SI"
    : resp.tabla.G_14=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_14_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Limpia parabrisas',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.G_15=="1" ? "SI"
    : resp.tabla.G_15=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    }, 
  {
    text: resp.tabla.G_15_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'NEUMATICOS',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
      fillColor: '#65b58f',   
        border: [true, false, true, true]                 
  } ,
{
  text: 'Conforme?',               
  bold: true,
  fontSize: 8,      
  alignment: 'center',     
  fillColor: '#d9d9d9',
    border: [true, false, true, true]  
},  
{
  text: 'Observaciones',               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
  fillColor: '#d9d9d9', 
    border: [true, false, true, true]  
}             
],
[
  { 
      text: 'Presion de Aire',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.N_1=="1" ? "SI"
    : resp.tabla.N_1=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,              
  
  },
  {
    text: resp.tabla.N_1_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Abultamientos',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.N_2=="1" ? "SI"
    : resp.tabla.N_2=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,              
  
  },
  {
    text: resp.tabla.N_2_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Cortaduras',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.N_3=="1" ? "SI"
    : resp.tabla.N_3=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,              
    
    },
  {
    text: resp.tabla.N_3_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Llanta de respuesto',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.N_4=="1" ? "SI"
    : resp.tabla.N_4=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,               
    
    },
  {
    text: resp.tabla.N_4_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'MOTOR',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
      fillColor: '#65b58f',   
        border: [true, false, true, true]                 
  } ,
{
  text: 'Conforme?',               
  bold: true,
  fontSize: 8,      
  alignment: 'center',     
  fillColor: '#d9d9d9',
    border: [true, false, true, true]  
},  
{
  text: 'Observaciones',               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
  fillColor: '#d9d9d9', 
    border: [true, false, true, true]  
}             
],
[
  { 
      text: 'Nivel de aceite',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_1=="1" ? "SI"
    : resp.tabla.M_1=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_1_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Nivel de refrigerante',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_2=="1" ? "SI"
    : resp.tabla.M_2=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_2_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Nivel de liquido de frenos',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_3=="1" ? "SI"
    : resp.tabla.M_3=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_3_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Nivel de liquido de embrague',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_4=="1" ? "SI"
    : resp.tabla.M_4=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_4_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Nivel de agua para limpia parabrisas',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_5=="1" ? "SI"
    : resp.tabla.M_5=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_5_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Fugas hidráulicas',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_6=="1" ? "SI"
    : resp.tabla.M_6=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_6_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Estado de fajas',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_7=="1" ? "SI"
    : resp.tabla.M_7=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_7_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Estado del radiador',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_8=="1" ? "SI"
    : resp.tabla.M_8=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_8_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Estado de la bateria',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.M_9=="1" ? "SI"
    : resp.tabla.M_9=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                  
    
    },
  {
    text: resp.tabla.M_9_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'SEGURIDAD',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
      fillColor: '#65b58f',   
        border: [true, false, true, true]                 
  } ,
{
  text: 'Conforme?',               
  bold: true,
  fontSize: 8,      
  alignment: 'center',     
  fillColor: '#d9d9d9',
    border: [true, false, true, true]  
},  
{
  text: 'Observaciones',               
  bold: true,
  fontSize: 8,              
  alignment: 'center', 
  fillColor: '#d9d9d9', 
    border: [true, false, true, true]  
}             
],
[
  { 
      text: 'Barra antivuelco (Interno y Externo)',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_1=="1" ? "SI"
    : resp.tabla.S_1=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_1_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Kit basico de herramientas',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_2=="1" ? "SI"
    : resp.tabla.S_2=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_2_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Llave de ruedas tipo cruz',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_3=="1" ? "SI"
    : resp.tabla.S_3=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_3_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Gata ( Doble peso bruto) y sus accesorios',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_4=="1" ? "SI"
    : resp.tabla.S_4=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_4_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Botiquin',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_5=="1" ? "SI"
    : resp.tabla.S_5=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_5_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Linterna',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_6=="1" ? "SI"
    : resp.tabla.S_6=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_6_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Triangulos (2)',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_7=="1" ? "SI"
    : resp.tabla.S_7=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_7_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Conos de Seguridad (3) con cinta reflectiva',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_8=="1" ? "SI"
    : resp.tabla.S_8=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_8_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Extintor = Cant:….... Capacidad….....',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_9=="1" ? "SI"
    : resp.tabla.S_9=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_9_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Tacos (02 )',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_10=="1" ? "SI"
    : resp.tabla.S_10=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_10_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Pico (01) y Pala (01)',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_11=="1" ? "SI"
    : resp.tabla.S_11=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_11_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Cable de remolque / Grillere/ Eslinga de remolque',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_12=="1" ? "SI"
    : resp.tabla.S_12=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_12_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Cable para pasar corriente',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_13=="1" ? "SI"
    : resp.tabla.S_13=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_13_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Gata Hidraulica',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_14=="1" ? "SI"
    : resp.tabla.S_14=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_14_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Kit antiderrame',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_15=="1" ? "SI"
    : resp.tabla.S_15=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_15_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Pértiga',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, true]                 
  },
  {
    text: resp.tabla.S_16=="1" ? "SI"
    : resp.tabla.S_16=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    
    },
  {
    text: resp.tabla.S_16_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, true]  
  }             
],
[
  { 
      text: 'Banderolas (2) color rojo',               
      bold: true,
      fontSize: 8,                               
      alignment: 'center', 
    
        border: [true, false, true, false]                 
  },
  {
    text: resp.tabla.S_17=="1" ? "SI"
    : resp.tabla.S_17=="0" ? "NO"              
    : "N/A",               
    bold: true,
    fontSize: 8,                       
    border: [true, false, true, false]  
    },
  {
    text: resp.tabla.S_17_Obs,               
    bold: true,
    fontSize: 8,              
    alignment: 'center', 
  
      border: [true, false, true, false]  
  }             
]
       ]
    }
  } ,
  {
    table: {
        widths: ['10%','90%'],       
        headerRows: 1,
        body: buildTableBody(['id','descripcion'],resp.pasajeros,  [
          { 
              text: 'N',               
              bold: true,
              fontSize: 8,
              fillColor: '#65b58f'
              
          } ,
          {   
            text: 'NOMBRES DE LOS PASAJEROS',                          
            bold: true,
            fontSize: 8,
            fillColor: '#65b58f'                                          
        }        
      ])
    }
  },
  {
    table: {
        widths: ['100%'],       
        headerRows: 1,
        body: [    
          [
            { 
              text: 'OBSERVACIONES',               
              bold: true,
              fontSize: 8,
              fillColor: '#65b58f',   
              border: [true, false, true, true]  
                          
          }
        ] ,
        [
          { 
            text: resp.tabla.observaciones,               
                bold: true,
                fontSize: 8,
                border: [true, false, true, true]  
                                                       
        } ] , [       
      {
        text: 'DEJO CONSTANCIA DEL ESTADO DE MI UNIDAD Y ASUMO LA RESPONSABILIDAD CON SEGURIDAD',               
        bold: true,
        fontSize: 8,          
        fillColor: '#65b58f',
      }
      ]]
    }
  },
  {
    table: {
        widths: ['20%','30%','20%','30%'],       
        headerRows: 1,
        body: [    
          [
            { 
              text: 'FIRMA DEL CONDUCTOR ESCOLTA',               
              bold: true,
              fontSize: 8,
              fillColor: '#d9d9d9',
              colSpan:2,
              alignment: 'center',  
              border: [true, false, true, true]  
                          
            },{},
            { 
              text: 'FIRMA DEL CONDUCTOR ESCOLTA',               
              bold: true,
              fontSize: 8,
              colSpan:2,
              alignment: 'center',  
              fillColor: '#d9d9d9',
              border: [true, false, true, true]  
                          
          },{}    
        ] ,
        [
          { 
            text: '',               
            bold: true,
            fontSize: 8,     
            colSpan:2,
       
                        
          },{},
          { 
            text: '',               
            bold: true,
            fontSize: 8,
            colSpan:2,                              
        },{}   
        ],
        [
          { 
            text: 'NOMBRE Y APELLIDOS',               
            bold: true,
            fontSize: 8,                                         
          },{
            text: '',               
            bold: true,
            fontSize: 8,
          },
          { 
            text: 'NOMBRE Y APELLIDOS',               
            bold: true,
            fontSize: 8,
                                        
        },{
          text: '',               
          bold: true,
          fontSize: 8
      }   ]  ,
      [
        { 
          text: 'DNI',               
          bold: true,
          fontSize: 8,                                         
        },{
          text: '',               
          bold: true,
          fontSize: 8,
        },
        { 
          text: 'DNI',               
          bold: true,
          fontSize: 8,
                                      
      },{
        text: '',               
        bold: true,
        fontSize: 8
    }   ]      
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
  function pdf_control_fatiga_sonnolencia(id){
    let datos = {
      TipoQuery : '03_pdf_fatiga_somnolencia',
      id:id 
    }

    /*
    var section1=$(".check_Section_1:radio:checked").map(function(){return $(this).attr('id');}).get(); 
    var section2=$(".check_Section_2:radio:checked").map(function(){return $(this).attr('id');}).get();*/

    appAjaxQuery(datos,rutaSQL).done(function(resp){ 
           console.log(resp)
  /*let  data={ 
    operador:$("#txt_view_operador").val(),
    proyecto:$("#txt01_proyecto_somnolencia").val(),
    fecha:$("#txt_fecha_control").val(),
    evaluador:$("#txt_view_evaluador").val(),
    obs1: $("#P_1_obs").val(),
    obs2: $("#P_2_obs").val(),
    obs3: $("#P_3_obs").val(),
    obs4: $("#P_4_obs").val(),
    obs5: $("#P_5_obs").val(),
    obs6: $("#P_6_obs").val(),
    obs7: $("#P_7_obs").val(),
    obs8: $("#P_8_obs").val(),
    obs9: $("#P_9_obs").val(),
    obs10: $("#P_10_obs").val(),
    sueno:$("#txt01_horas_ultimo_sue").val(),
    durmio:$("#txt01_horas_durmio").val(),
    obs21:$("#T_1_obs").val(),
    obs22:$("#T_2_obs").val(),
    obs23:$("#T_3_obs").val(),
    obs24:$("#T_4_obs").val(),
    obs25:$("#T_5_obs").val(),
    obs26:$("#T_6_obs").val(),
    obs27:$("#T_7_obs").val(),
    obs28:$("#T_8_obs").val(),
    obs29:$("#T_9_obs").val(),
    obs30:$("#T_10_obs").val(),
    conclusion:$("#txt01_control_somnolencia_conclusion").val(),
    f_operador:$("#txt01_control_somnolencia_firma_operador").val(),
    f_evaluador:$("#txt01_control_somnolencia_firma_evaluador").val(),
    sec1:section1,
    sec2:section2
  }*/
// console.log(data)

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
            rowSpan:4
          } , 
            {
              text: 'FORMATO',              
              bold: true,
              fontSize: 8,
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
            text: 'REGISTRO',
            rowSpan: 3,              
            bold: true,
            fontSize: 8,
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
    [
      {               
      }, 
      {      
      },
      { 
        text: 'Páginas:',              
        fontSize: 8
      },
      {
          text: '1',
          fontSize: 8
      }
  ] 
  
    ]
}
},
{
  table: {
      widths: ['30%', '40%', '15%','15%'],
     // heights: [10,10,10,10,30,10,25],
      headerRows: 1,
      body: [
          [
            {              
              text: 'NOMBRE',         
              fillColor: '#d9d9d9',     
              bold: true,
              fontSize: 8,
              border: [true, false, true, false]                   
            },
            {              
              text: resp.table.operador,              
              bold: true,
              fontSize: 8,
              colSpan:3,
              border: [true, false, true, false]                       
            } ,
            {},{}
          ],     
          [
            {              
              text: 'PROYECTO / OPERACIÓN',  
              fillColor: '#d9d9d9',            
              bold: true,
              fontSize: 8, 
              border: [true, true, true, false]                            
            },
            {
              
              text: resp.table.operacion,              
              bold: true,
              fontSize: 8, 
               border: [true, true, true, false]                        
            }, 
            {
                text: 'FECHA',              
                bold: true,
                fillColor: '#d9d9d9',
                fontSize: 8, 
                border: [true, true, true, false]         
            },
            { 
                text: resp.table.fecha,              
                bold: true,
                fontSize: 8,  
                 border: [true, true, true, false]          
            }
          ],
          [
            {
              
              text: 'NOMBRE DEL EVALUADOR',              
              bold: true,
              fontSize: 8,             
              fillColor: '#d9d9d9',
               border: [true, true, true, false]                            
            } ,
            {
              
              text: resp.table.evaluador,              
              bold: true,
              fontSize: 8,
              colSpan:3,
              border: [true, true, true, false]                       
            } ,
            {},{}
          ],
          [
            {
              
              text: 'El objetivo del presente formato es evaluar el nivel de operatividad del Conductor, por lo que deberá concluir si este "PROCEDE PARA INICIAR RUTA" O "NO PROCEDE PARA INICIAR RUTA"',              
              bold: true,
              fontSize: 8,
              alignment: 'center',
              colSpan:4,
              border: [true, true, true, false]                   
            }, {},{},{}
            
          ]
      ]
  }
  },
{
  table: {
      widths: ['5%','65%','5%','5%','20%'],
     // heights: [10,10,10,10,30,10,25],
      headerRows: 1,
      body: [
          [
              { 
                  text: 'EVIDENCIAS NOTABLES EN EL OPERADOR',               
                  bold: true,
                  fontSize: 8,
                  colSpan: 2 ,
                  fillColor: '#d9d9d9'                   
              } ,
              {                            
            },
            {
              text: 'SI',               
              bold: true,
              fontSize: 8,          
              fillColor: '#d9d9d9'
            },  
            {
              text: 'NO',               
              bold: true,
              fontSize: 8,              
              fillColor: '#d9d9d9'
            }, 
            {
              text: 'Observaciones',               
              bold: true,
              fontSize: 8,              
              fillColor: '#d9d9d9'
            }        
          ],
          [
            { 
              text: '1',               
              bold: true,
              fontSize: 8                    
          } ,
            {   
              text: 'Ojos rojos',               
              bold: true,
              fontSize: 8            
          } ,  
          {
            text: resp.table.S_1=="1"?'X':'',               
            bold: true,
            fontSize: 8 
          }, 
          {text:resp.table.S_1=="0"?'X':'',               
          bold: true,
          fontSize: 8 

          },
          {text: resp.table.S_1_Obs,               
          bold: true,
          fontSize: 8 
          }
        ],
        [
          { 
            text: '2',               
            bold: true,
            fontSize: 8                    
        } ,
          {   
            text: 'Movimientos mas lentos',               
            bold: true,
            fontSize: 8            
        } ,  
        {
          text: resp.table.S_2=="1"?'X':'',               
          bold: true,
          fontSize: 8 
        }, 
        {text:resp.table.S_2=="0"?'X':'',               
        bold: true,
        fontSize: 8 

        },
        {text: resp.table.S_2_Obs,               
        bold: true,
        fontSize: 8 
        }
      ] ,
      [
        { 
          text: '3',               
          bold: true,
          fontSize: 8                    
      } ,
        {   
          text: 'Dificultades para coordinar movimientos y el habla ',               
          bold: true,
          fontSize: 8            
      } ,  
      {
        text: resp.table.S_3=="1"?'X':'',               
        bold: true,
        fontSize: 8 
      }, 
      {text:resp.table.S_3=="0"?'X':'',               
      bold: true,
      fontSize: 8 

      },
      {text: resp.table.S_3_Obs,               
      bold: true,
      fontSize: 8 
      }
    ] ,
    [
      { 
        text: '4',               
        bold: true,
        fontSize: 8                    
    } ,
      {   
        text: 'Tiempo de respuesta mas lento de lo normal (ej. Contacto por radio)',               
        bold: true,
        fontSize: 8            
    } ,  
    {
      text: resp.table.S_4=="1"?'X':'',               
      bold: true,
      fontSize: 8 
    }, 
    {text:resp.table.S_4=="0"?'X':'',               
    bold: true,
    fontSize: 8 

    },
    {text: resp.table.S_4_Obs,               
    bold: true,
    fontSize: 8 
    }
  ] ,
  [
    { 
      text: '5',               
      bold: true,
      fontSize: 8                    
  } ,
    {   
      text: 'Dificultades de atención y/o concentración',               
      bold: true,
      fontSize: 8            
  } ,  
  {
    text: resp.table.S_5=="1"?'X':'',               
    bold: true,
    fontSize: 8 
  }, 
  {text:resp.table.S_5=="0"?'X':'',               
  bold: true,
  fontSize: 8 

  },
  {text: resp.table.S_5_Obs,               
  bold: true,
  fontSize: 8 
  }
] ,
[
  { 
    text: '6',               
    bold: true,
    fontSize: 8                    
} ,
  {   
    text: 'Tareas sin finalizar',               
    bold: true,
    fontSize: 8            
} ,  
{
  text: resp.table.S_6=="1"?'X':'',               
  bold: true,
  fontSize: 8 
}, 
{text:resp.table.S_6=="0"?'X':'',               
bold: true,
fontSize: 8 

},
{text: resp.table.S_6_Obs,               
bold: true,
fontSize: 8 
}
] ,
[
  { 
    text: '7',               
    bold: true,
    fontSize: 8                    
} ,
  {   
    text: 'Pérdida de memoria a corto plazo ( olvida instrucciones)',               
    bold: true,
    fontSize: 8            
} ,  
{
  text: resp.table.S_7=="1"?'X':'',               
  bold: true,
  fontSize: 8 
}, 
{text:resp.table.S_7=="0"?'X':'',               
bold: true,
fontSize: 8 

},
{text: resp.table.S_7_Obs,               
bold: true,
fontSize: 8 
}
] ,
[
  { 
    text: '8',               
    bold: true,
    fontSize: 8                    
} ,
  {   
    text: 'Cabeceos',               
    bold: true,
    fontSize: 8            
} ,  
{
  text: resp.table.S_8=="1"?'X':'',               
  bold: true,
  fontSize: 8 
}, 
{text:resp.table.S_8=="0"?'X':'',               
bold: true,
fontSize: 8 

},
{text: resp.table.S_8_Obs,               
bold: true,
fontSize: 8 
}
] ,
[
  { 
    text: '9',               
    bold: true,
    fontSize: 8                    
} ,
  {   
    text: 'Tiene antecedentes de incidentes o accidentes a causa de somnolencia o fatiga',               
    bold: true,
    fontSize: 8            
} ,  
{
  text: resp.table.S_9=="1"?'X':'',               
  bold: true,
  fontSize: 8 
}, 
{text:resp.table.S_9=="0"?'X':'',               
bold: true,
fontSize: 8 

},
{text:  resp.table.S_9_Obs,               
bold: true,
fontSize: 8 
}
] ,
[
  { 
    text: '10',               
    bold: true,
    fontSize: 8                    
} ,
  {   
    text: 'Irritabilidad o enojos infundados',               
    bold: true,
    fontSize: 8            
} ,  
{
  text: resp.table.S_10=="1"?'X':'',               
  bold: true,
  fontSize: 8 
}, 
{text:resp.table.S_10=="0"?'X':'',               
bold: true,
fontSize: 8 

},
{text: resp.table.S_10_Obs,               
bold: true,
fontSize: 8 
}
]                   
      ]
  }
  },
  {
    table: {
        widths: ['5%','65%','30%'],
       // heights: [10,10,10,10,30,10,25],
        headerRows: 1,
        body: [
            [
                { 
                    text: 'EVALUADOR LE CONSULTA A OPERADOR Y/O CONDUCTOR DIRECTAMENTE',               
                    bold: true,
                    fontSize: 8,
                    colSpan: 3,
                    border: [true, false, true, true],
                    fillColor: '#d9d9d9'                   
                } ,
                {   
                           
              },
              {
                
              }     
            ],
            [
              { 
                text: '1',               
                bold: true,
                fontSize: 8,
                border: [true, false, false, false]                        
            } ,
              {   
                text: 'Horas transcurridas desde su ultimo sueño',               
                bold: true,
                fontSize: 8,
                border: [false, false, false, false]             
            } ,  
            {
              text: 'Nº horas: '+resp.table.horas_transcurridas, 
              border: [false, false, true, false] ,              
              bold: true,
              fontSize: 8 
            }
          ],
          [
            { 
              text: '2',               
              bold: true,
              fontSize: 8,
              border: [true, false, false, false] ,                      
          } ,
            {   
              text: 'Cuantas horas durmió antes del turno', 
              border: [false, false, false, false] ,               
              bold: true,
              fontSize: 8            
          } ,  
          {
            text: 'Nº horas: '+resp.table.horas_duerme,  
            border: [false, false, true, false] ,               
            bold: true,
            fontSize: 8 
          }
        ]                                     
      ]
    }
    },
  {
    table: {
        widths: ['5%','65%','5%','5%','20%'],
       // heights: [10,10,10,10,30,10,25],
        headerRows: 1,
        body: [
            [
                { 
                    text: 'EVIDENCIAS NOTABLES EN EL OPERADOR',               
                    bold: true,
                    fontSize: 8,
                    colSpan: 2 ,
                    fillColor: '#d9d9d9'                   
                } ,
                {   
                           
              },
              {
                text: 'SI',               
                bold: true,
                fontSize: 8,
            
                fillColor: '#d9d9d9'
              },  
              {
                text: 'NO',               
                bold: true,
                fontSize: 8,
          
                fillColor: '#d9d9d9'
              }, 
              {
                text: 'Observaciones',               
                bold: true,
                fontSize: 8,
               
                fillColor: '#d9d9d9'
              }        
            ],
            [
              { 
                text: '1',               
                bold: true,
                fontSize: 8                    
            } ,
              {   
                text: 'Viaja mas de 2 horas para llegar a faena ?',               
                bold: true,
                fontSize: 8            
            } ,  
            {
              text: resp.table.R_1=="1"?'X':'',               
              bold: true,
              fontSize: 8 
            }, 
            {text:resp.table.R_1=="0"?'X':'',               
            bold: true,
            fontSize: 8 
            
            },
            {text: resp.table.R_1_Obs,               
            bold: true,
            fontSize: 8 
            }
          ],
          [
            { 
              text: '2',               
              bold: true,
              fontSize: 8                    
          } ,
            {   
              text: 'Siente párpados pesados ?',               
              bold: true,
              fontSize: 8            
          } ,  
          {
            text: resp.table.R_2=="1"?'X':'',               
            bold: true,
            fontSize: 8 
          }, 
          {text:resp.table.R_2=="0"?'X':'',               
          bold: true,
          fontSize: 8 
          
          },
          {text:  resp.table.R_2_Obs,               
          bold: true,
          fontSize: 8 
          }
        ] ,
        [
          { 
            text: '3',               
            bold: true,
            fontSize: 8                    
        } ,
          {   
            text: 'Ha bebido algun líquido y/o consumido alguna comida durante su turno?',               
            bold: true,
            fontSize: 8            
        } ,  
        {
          text: resp.table.R_3=="1"?'X':'',               
          bold: true,
          fontSize: 8 
        }, 
        {text:resp.table.R_3=="0"?'X':'',               
        bold: true,
        fontSize: 8 
        
        },
        {text:  resp.table.R_3_Obs,               
        bold: true,
        fontSize: 8 
        }
      ] ,
      [
        { 
          text: '4',               
          bold: true,
          fontSize: 8                    
      } ,
        {   
          text: 'Ha ingerido algun fámaco que pueda provocar la disminución de sus reflejos ? Ej. Antialérgicos, relajantes musculares, antidepresivos, etc.',               
          bold: true,
          fontSize: 8            
      } ,  
      {
        text: resp.table.R_4=="1"?'X':'',               
        bold: true,
        fontSize: 8 
      }, 
      {text:resp.table.R_4=="0"?'X':'',               
      bold: true,
      fontSize: 8 
      
      },
      {text:  resp.table.R_4_Obs,               
      bold: true,
      fontSize: 8 
      }
    ] ,
    [
      { 
        text: '5',               
        bold: true,
        fontSize: 8                    
    } ,
      {   
        text: 'Bosteza de forma contínua?',               
        bold: true,
        fontSize: 8            
    } ,  
    {
      text: resp.table.R_5=="1"?'X':'',               
      bold: true,
      fontSize: 8 
    }, 
    {text:resp.table.R_5=="0"?'X':'',               
    bold: true,
    fontSize: 8 
    
    },
    {text:  resp.table.R_5_Obs,               
    bold: true,
    fontSize: 8 
    }
  ] ,
  [
    { 
      text: '6',               
      bold: true,
      fontSize: 8                    
  } ,
    {   
      text: 'Presenta dolores de cabeza?',               
      bold: true,
      fontSize: 8            
  } ,  
  {
    text: resp.table.R_6=="1"?'X':'',               
    bold: true,
    fontSize: 8 
  }, 
  {text:resp.table.R_6=="0"?'X':'',               
  bold: true,
  fontSize: 8 
  
  },
  {text:  resp.table.R_6_Obs,               
  bold: true,
  fontSize: 8 
  }
  ] ,
  [
    { 
      text: '7',               
      bold: true,
      fontSize: 8                    
  } ,
    {   
      text: 'Siente cansancio físico?',               
      bold: true,
      fontSize: 8            
  } ,  
  {
    text: resp.table.R_7=="1"?'X':'',               
    bold: true,
    fontSize: 8 
  }, 
  {text:resp.table.R_7=="0"?'X':'',               
  bold: true,
  fontSize: 8 
  
  },
  {text:  resp.table.R_7_Obs,               
  bold: true,
  fontSize: 8 
  }
  ] ,
  [
    { 
      text: '8',               
      bold: true,
      fontSize: 8                    
  } ,
    {   
      text: 'Requiere descansar mas tiempo?',               
      bold: true,
      fontSize: 8            
  } ,  
  {
    text: resp.table.R_8=="1"?'X':'',               
    bold: true,
    fontSize: 8 
  }, 
  {text:resp.table.R_8=="0"?'X':'',               
  bold: true,
  fontSize: 8 
  
  },
  {text:resp.table.R_8_Obs,               
  bold: true,
  fontSize: 8 
  }
  ] ,
  [
    { 
      text: '9',               
      bold: true,
      fontSize: 8                    
  } ,
    {   
      text: 'Le resulta dificil concentrarme',               
      bold: true,
      fontSize: 8            
  } ,  
  {
    text: resp.table.R_9=="1"?'X':'',               
    bold: true,
    fontSize: 8 
  }, 
  {text:resp.table.R_9=="0"?'X':'',               
  bold: true,
  fontSize: 8 
  
  },
  {text:  resp.table.R_9_Obs,               
  bold: true,
  fontSize: 8 
  }
  ] ,
  [
    { 
      text: '10',               
      bold: true,
      fontSize: 8                    
  } ,
    {   
      text: 'Su periodo de descanso fue satisfactorio? (Si es "No" no puede iniciar ruta")',               
      bold: true,
      fontSize: 8            
  } ,  
  {
    text: resp.table.R_10=="1"?'X':'',               
    bold: true,
    fontSize: 8 
  }, 
  {text:resp.table.R_10=="0"?'X':'',               
  bold: true,
  fontSize: 8 
  
  },
  {text: resp.table.R_10_Obs,               
  bold: true,
  fontSize: 8 
  }
  ]                   
        ]
    }
    },
    {
      table: {
          widths: ['40%','30%','30%'],
         // heights: [10,10,10,10,30,10,25],
          headerRows: 1,
          body: [
              [
                  { 
                      text: 'CONCLUSIÓN',               
                      bold: true,
                      fontSize: 8,                 
                      fillColor: '#d9d9d9',
                      border:[true, false, true, true]                   
                  } ,                 
                {
                  text: 'FIRMA DEL OPERADOR / CONDUCTOR',               
                  bold: true,
                  fontSize: 8,              
                  fillColor: '#d9d9d9',
                  border: [true, false, true, true]
                },  
                {
                  text: 'FIRMA DEL EVALUADOR',               
                  bold: true,
                  fontSize: 8,            
                  fillColor: '#d9d9d9',
                  border: [true, false, true, true] 
                } 
                   
              ],
              [
                { 
                  text: resp.table.conclusion,               
                  bold: true,
                  fontSize: 8               
                                
              } ,                 
            {
              text: '',               
              bold: true,
              fontSize: 8             
             
            },  
            {
              text: '',               
              bold: true,
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
  function pdf_capacitacion(id){
    
 
    let datos = {
      TipoQuery : '01_get_capacitacion_all',
      id:id
    };   
   
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
            rowSpan:4
          } , 
            {
              text: 'FORMATO',              
              bold: true,
              fontSize: 8,
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
            text: 'REGISTRO',
            rowSpan: 3,              
            bold: true,
            fontSize: 8,
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
    [
      {               
      }, 
      {      
      },
      { 
        text: 'Páginas:',              
        fontSize: 8
      },
      {
          text: '1',
          fontSize: 8
      }
  ] 
  
    ]
}
},
{
  table: {
      widths: ['15%', '15%', '20%','20%', '15%', '15%'],
     // heights: [10,10,10,10,30,10,25],
      headerRows: 1,
      body: [
          [
            {
              
              text: 'REUNION DE TRABAJO',              
              bold: true,
              fontSize: 8      ,
              border: [true, false, false, false]                   
            } ,
            {
              
              text: resp.tabla1.tipo_registro=="1"?'X':'___',              
              bold: true,
              fontSize: 8 ,
              border: [false, false, false, false]                       
            } , 
              {
                text: 'INDUCCIÓN',              
                bold: true,
                fontSize: 8,  
                border: [false, false, false, false]      
              },
              { 
                text:resp.tabla1.tipo_registro=="2"?'X':'___',              
                bold: true,
                fontSize: 8,
                border: [false, false, false, false]          
              },
              {
                  text: 'REUNION CLIENTES',
                  fontSize: 8,
                  bold: true,
                  border: [false, false, false, false]
              },{ 
                text: resp.tabla1.tipo_registro=="3"?'X':'___',              
                bold: true,
                fontSize: 9,
                border: [false, false, true, false]          
              }
          ],
     
          [
            {
              
              text: 'CAPACITACIÓN',              
              bold: true,
              fontSize: 8 , 
               border: [true, false, false, false]                            
            } ,
            {
              
              text: resp.tabla1.tipo_registro=="4"?'X':'___',              
              bold: true,
              fontSize: 8 , 
               border: [false, false, false, false]                        
            } , 
              {
                text: 'CHARLA 5 MINUTOS',              
                bold: true,
                fontSize: 8, 
                 border: [false, false, false, false]         
              },
              { 
                text: resp.tabla1.tipo_registro=="5"?'X':'___',              
                bold: true,
                fontSize: 8,  
                 border: [false, false, false, false]          
              },
              {
                  text: 'OTROS (Especifique)',
                  fontSize: 8,
                  bold: true,
                  border: [false, false, false, false]    
              },{ 
                text: resp.tabla1.tipo_registro=="6"?'X':'___',              
                bold: true,
                fontSize: 8, 
                 border: [false, false, true, false]          
              }
          ], [
            {
              
              text: 'ORGANIZADO POR:',              
              bold: true,
              fontSize: 8, 
              colSpan:6,
              fillColor: '#d9d9d9' ,
               border: [true, true, true, false]                            
            } ,
            {
                                               
            } , 
              {               
              },
              { 
                   
              },
              {                  
              },{ 
                   
              }
          ],
          [
            {
              
              text: 'SSOMA',              
              bold: true,
              fontSize: 8      ,
              border: [true, false, false, false]                   
            } ,
            {
              
              text:resp.tabla1.area=="1"?'X':'___',              
              bold: true,
              fontSize: 8,
              border: [false, false, false, false]                       
            } , 
              {
                text: 'G.PERSONAS',              
                bold: true,
                fontSize: 8,  
                border: [false, false, false, false]      
              },
              { 
                text: resp.tabla1.area=="2"?'X':'___',              
                bold: true,
                fontSize: 8,
                border: [false, false, false, false]          
              },
              {
                  text: 'MANTENIMIENTO',
                  fontSize: 8,
                  bold: true,
                  border: [false, false, false, false]
              },{ 
                text: resp.tabla1.area=="3"?'X':'___',              
                bold: true,
                fontSize: 8,
                border: [false, false, true, false]          
              }
          ],
     
          [
            {
              
              text: 'OPERACIONES',              
              bold: true,
              fontSize: 8 , 
               border: [true, false, false, false]                            
            } ,
            {
              
              text: resp.tabla1.area=="4"?'X':'___',              
              bold: true,
              fontSize: 8 , 
               border: [false, false, false, false]                        
            } , 
              {
                text: 'ADMINISTRACIÓN',              
                bold: true,
                fontSize: 8, 
                 border: [false, false, false, false]         
              },
              { 
                text: resp.tabla1.area=="5"?'X':'___',              
                bold: true,
                fontSize: 8,  
                 border: [false, false, false, false]          
              },
              {
                  text: 'OTROS (Especifique)',
                  fontSize: 8,
                  bold: true,
                  border: [false, false, false, false]    
              },{ 
                text:resp.tabla1.area=="6"?'X':'___',              
                bold: true,
                fontSize: 8 , 
                 border: [false, false, true, false]          
              }
          ]
      ]
  }
  },
{
  table: {
      widths: ['15%','10%','10%','10%','15%', '10%', '10%','20%'],
     // heights: [10,10,10,10,30,10,25],
      headerRows: 1,
      body: [
          [
              { 
                  text: 'TEMAS',               
                  bold: true,
                  fontSize: 9,
                  fillColor: '#d9d9d9'                   
              } ,
              {   
                text: resp.tabla1.tema,                                         
                colSpan: 7 ,               
                fontSize: 8            
            },
            {

            },  
            {

            }, 
            {

            }, 
            {

            }, 
            {

            }, 
            {

            }         
          ],
          [
            { 
              text: 'EXPOSITOR',               
              bold: true,
              fontSize: 8,  
              fillColor: '#65b58f'            
          } ,
            {   
              text: resp.tabla1.expositor,                                  
              colSpan: 3,
              fontSize: 8            
          } ,  
          {

          }, 
          {

          },            
          { 
            text: 'EMPRESA DE EXPOSITOR',                    
            bold: true,
            fontSize: 8,
            fillColor: '#65b58f'
        } ,
          {   
            text: resp.tabla1.empresa,                                  
            colSpan: 3,
            fontSize: 8            
        },
        {

        }, 
        {

        } 

        ],                  
        [
          { 
            text: 'FECHA',   
            fillColor: '#65b58f',
            bold: true,
            fontSize: 8
        } ,
          {   
            text: resp.tabla1.fecha,                                      
            fontSize: 8           
        } ,   
        { 
          text: 'HORA INICIO',               
          bold: true,
          fillColor: '#65b58f',
          fontSize: 8
      } ,
        {   
          text: resp.tabla1.hora_ini,                                  
          fontSize: 8            
      }   ,
      {   
        text: 'HORA FINAL', 
        fillColor: '#65b58f',
        bold: true,                                    
        fontSize: 8            
    }      ,
    {   
      text: resp.tabla1.hora_fin,                                    
      fontSize: 8            
  }  ,
  {   
    text: 'TOTAL HORAS',  
    fillColor: '#65b58f',                        
    bold: true,        
    fontSize: 8            
}  ,
{   
  text: resp.tabla1.hora_total,                               
  fontSize: 8           
}  
      ], 
      [
        {    
          text: 'OBJETIVOS: ' + resp.tabla1.objetivos,                          
          bold: true,        
          fontSize: 8 , 
          colSpan: 8,          
        }       
    ],  
    [
      { 
        text: 'MATERIALES USADOS: ' + resp.tabla1.materiales,
        colSpan: 8,
        bold: true,
        fontSize: 8
    }    
  ], 
  [
    { 
      text: 'LUGAR DE CAPACITACIÓN: '+ resp.tabla1.lugar,
      colSpan: 8,
      bold: true,
      border: [true, true, true, false],
      fontSize: 8
  }  
  ]
      ]
  }
  },
  {
    table: {
              //['15%','10%','10%','10%','15%', '10%', '10%','20%'],
        widths: ['5%','10%','30%','15%','30%', '10%'],
       // heights: [10,10,10,10,30,10,25],
        headerRows: 1,
        body:buildTableBody(['id','dni','nombres','telefono','cargo','firma'],resp.tabla4,  [
            { 
                text: 'N',               
                bold: true,
                fontSize: 8,
                fillColor: '#65b58f'
                
            } ,
            {   
              text: 'DNI',                          
              bold: true,
              fontSize: 8,
              fillColor: '#65b58f'                                          
          },
          {
            text: 'NOMBRES',                          
            bold: true,
            fontSize: 8,
            fillColor: '#65b58f'
          
          },  
          {  
            text: 'TELEFONO',                          
            bold: true,
            fontSize: 8,
            fillColor: '#65b58f'

          }, 
          {
            text: 'CARGO',                          
            bold: true,
            fontSize: 8,
            fillColor: '#65b58f'
          }, 
          {
            text: 'FIRMA',                          
            bold: true,
            fontSize: 8,
            fillColor: '#65b58f'
          }        
        ])
    }
    }
  , 
  {
    table: {          
        widths: ['70%','30%'],
       // heights: [10,10,10,10,30,10,25],
        headerRows: 1,
        body: buildTableBody(['descripcion'],resp.tabla2, [
        { 
            text: 'OBSERVACION',               
            bold: true,              
            fontSize: 8,            
            border: [true, false, true, false]
            
        }  ,{ 
       
          text: 'TOTAL: '+resp.tabla4.length,               
          bold: true,          
          fontSize: 8,  
          rowSpan: resp.tabla2.length+1
         
          
      }       
    ])
    }
    } ,
      {
        table: {          
            widths: ['70%','30%'],
           // heights: [10,10,10,10,30,10,25],
            headerRows: 1,
            body: buildTableBody(['descripcion'], resp.tabla3, [
            { 
                text: 'ACUERDOS Y COMPROMISOS',               
                bold: true,              
                fontSize: 8,
                border: [true, false, true, false]           
              
                
            }  ,{ 
           
              text: 'DNI: '+resp.tabla1.dni,               
              bold: true,                       
              fontSize: 8,     
              rowSpan: resp.tabla3.length+1          
              
          }       
        ])
        }
        }
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
    data.forEach(function(row,index) {
        var dataRow = [];

        header.forEach(function(column) {
          if(column==='id'){
            dataRow.push({text:Number(index)+1,fontSize: 8});
          }
          else if(row[column]){
            dataRow.push({text:row[column].toString(),bold: false,fontSize: 8});
          }else{
            dataRow.push({text:'',fontSize: 8});
          }
           
        })

        body.push(dataRow);
    });
  
    return body;
}
  function insert_checklist_cisterna(){
    if(validatecamposchecklistcisterna()){
      swal("Completa todos los campos", {
        icon: "error",
      });

    }else{

        /*let datos = {
          TipoQuery : '01_validate_firma_checkList',
          /*evaluadorFirma:$("#txt01_control_somnolencia_firma_evaluador").val(),
          evaluador:$("#idEvaluadorHidden").val(),
          operadorFirma:$("#txt_firma_conductor_citerna").val(),
          operador:$("#txt01_conductor_cisterna_id").val()
        }
        console.log(datos)
        appAjaxQuery(datos,rutaSQL).done(function(resp){     

          if(resp.error){
            swal("Verifica que el código de firmas sea correcto", {
              icon: "warning",
            });
          }else{     

                  */
            var checkboxDeclaracionJurada=$(".checkList2_declaracion_jurada:radio:checked").map(function(){return $(this).attr('id');}).get(); 
            var checkboxLuces=$(".checkList2_luces:radio:checked").map(function(){return $(this).attr('id');}).get(); 
            var checkboxDocumentos=$(".checkList2_documentos:radio:checked").map(function(){return $(this).attr('id');}).get(); 
            var checkboxGeneral=$(".checkList2_general:radio:checked").map(function(){return $(this).attr('id');}).get(); 
            var checkboxNeumatico=$(".checkList2_neumaticos:radio:checked").map(function(){return $(this).attr('id');}).get(); 
            var checkboxMotor=$(".checkList2_motor:radio:checked").map(function(){return $(this).attr('id');}).get(); 
            var checkboxSeguridad=$(".checkList2_seguridad:radio:checked").map(function(){return $(this).attr('id');}).get(); 
        
            var checkboxSistemaRecarga=$(".checkList2_sistema_recarga:radio:checked").map(function(){return $(this).attr('id');}).get(); 
            

            var inputSec1=$(".input_luces_cisterna").map(function(){return $(this).val();}).get(); 
            var inputSec2=$(".input_documentos_cisterna").map(function(){return $(this).val();}).get(); 
            var inputSec3=$(".input_general_cisterna").map(function(){return $(this).val();}).get(); 
            var inputSec4=$(".input_neumaticos_cisterna").map(function(){return $(this).val();}).get();
            var inputSec5=$(".input_motor_cisterna").map(function(){return $(this).val();}).get();
            var inputSec6=$(".input_seguridad_cisterna").map(function(){return $(this).val();}).get();
            var inputSec7=$(".input_descarga_abastecimiento_cisterna").map(function(){return $(this).val();}).get();

            let datos = {
              TipoQuery : '01_insert_checklick_cisterna',
              data:{
                id:(new Date()).getTime(),
                id_conductor:$("#txt01_conductor_cisterna_id").val(),
               // lc:$("#txt01_conductor_cisterna_LC").val(),
                capacidad:$("#txt01_conductor_cisterna_capacidad").val(),
                fecha:$("#txt01_conductor_cisterna_fecha").val(),
                hora_cisterna:$("#txt01_conductor_cisterna_hora").val(),
                placa:$("#txt01_conductor_cisterna_placas").val(),
                km_tracto:$("#txt01_conductor_cisterna_km_tracto").val(),
              //  km_cisterna:$("#txt01_conductor_cisterna_km_cisterna").val(),
                actividad:$("#txt01_conductor_cisterna_actividad").val(),
                km_inicial:$("#txt01_conductor_km_inicial").val(),
                hora_ini:$("#txt01_conductor_hora_ini").val(),
                km_inicial_2:$("#txt01_conductor_km_inicial_2").val(),
                hora_ini_2:$("#txt01_conductor_hora_ini_2").val(),
                observacion:$("#txt01_camioneta_km_observaciones").val(),
                declaracionJurada:checkboxDeclaracionJurada,
                luces:checkboxLuces,
                documentos:checkboxDocumentos,
                general:checkboxGeneral,
                neumatico:checkboxNeumatico,
                motor:checkboxMotor,
                seguridad:checkboxSeguridad,            
                recarga:checkboxSistemaRecarga,
                obs_1:inputSec1,
                obs_2:inputSec2,
                obs_3:inputSec3,
                obs_4:inputSec4,
                obs_5:inputSec5,
                obs_6:inputSec6,
                obs_7:inputSec7,                                 
              }        
            };   
            console.log(datos)
            appAjaxQuery(datos,rutaSQL).done(function(resp){                           
              swal("Se ha insertado correctamente", {
                icon: "success",
            });                               
            resetCheckListCisterna();
            gridCheckListPreUso();
          
          })            
        }
     //   });
               

  //}
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
  function addObservacionespersonas(){
    $('#table_observaciones_personas > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='class_add_observaciones_personas'><td><input type='text' class='form-control observaciones_personas'/>"+
    "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500  py-2 px-2 text-white' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
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
          case "val":
            $("#"+it.element).val("");
          break;
          case "select":
            $("#"+it.element).val("-1");
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
  function searchFuncionForNameAndSurnameCapacitacion(inputsearch,sql,inputtext,tableId,nameInput){
    var msn=$('#'+inputsearch).val();
    let idx=1;
    let datos = {
      TipoQuery : sql,
      value:msn     
    };      
  
    appAjaxQuery(datos,rutaSQL).done(function(resp){    
      if(resp.error){
        swal("No se encontro incidencia para el codigo ingresado", {
          icon: "warning",
        });
      }else{
        
        swal("Has seleccionado a: "+resp.tabla.nombres+" "+resp.tabla.apellidos+"", {
          icon: "success",
        });

           
        
        //$('#'+tableId+' > tbody').empty();
        let element =$('#'+tableId+' > tbody > tr');
        if(element.length){
          let lastEle=element.find("#indexChild").text()
          idx=Number(lastEle)+1

        }

          console.log(resp)


        let tr="";
     
            tr+="<tr>"        
            tr+="<td id='indexChild'>"+idx+"<input type='hidden' value='"+resp.tabla.id+"'/></td>"
            tr+="<td>"+resp.tabla.nombres+"</td>"
            tr+="<td>"+resp.tabla.apellidos+"</td>"
            tr+="<td>"+resp.tabla.cargo+"</td>"  
            tr+="<td>"+resp.tabla.dni+"</td>"           
            tr+="<td><input type='checkbox' name='"+nameInput+"' id='"+resp.tabla.id+"'/></td>"           
            tr+="</tr>"
               
        $("#txt_search_participante_capacitacion_search").val("");
        $("#txt_id_participante_capacitacion_id").val("");

        $('#'+tableId+' > tbody').append(tr)
      }
    });
  }
  function insert_checklist_camioneta(){
    if(validatecamposchecklistcamioneta()){
      swal("Completa todos los campos", {
        icon: "error",
      });

    }else{
    /*  swal({
        text: 'Ingrese Código de Firma Digital',
        content: "input",
        button: {
          text: "Confirmar" 
        },
      })
      .then(firma => {
        let datos = {
          TipoQuery : '03_save_validate_firma_conductor',
          id:$("#txt01_camioneta_conductor_id").val(),      
          codFimr:firma
        }
        appAjaxQuery(datos,rutaSQL).done(function(resp){     

          if(resp.error){
            swal("Verifica que el código de firmas sea correcto", {
              icon: "warning",
            });
          }else{        
        */    
            
            var checkboxDeclaracionJurada=$(".checkList_declaracion_jurada:radio:checked").map(function(){return $(this).attr('id');}).get(); 
            var checkboxLuces=$(".checkList_category_luces:radio:checked").map(function(){return $(this).attr('id');}).get(); 
            var checkboxDocumentos=$(".checkList_category_documentos:radio:checked").map(function(){return $(this).attr('id');}).get(); 
            var checkboxGeneral=$(".checkList_category_general:radio:checked").map(function(){return $(this).attr('id');}).get(); 
            var checkboxNeumatico=$(".checkList_category_neumatico:radio:checked").map(function(){return $(this).attr('id');}).get(); 
            var checkboxMotor=$(".checkList_category_motor:radio:checked").map(function(){return $(this).attr('id');}).get(); 
            var checkboxSeguridad=$(".checkList_category_seguridad:radio:checked").map(function(){return $(this).attr('id');}).get(); 
        
            var Inputpasajeros=$('#table_pasajeros_checklist > tbody').find(".pasajeros_checklist").map(function(){return $(this).val();}).get();



            var inputSec1=$(".input_luces_camioneta").map(function(){return $(this).val();}).get(); 
            var inputSec2=$(".input_documentos_camioneta").map(function(){return $(this).val();}).get(); 
            var inputSec3=$(".input_general_camioneta").map(function(){return $(this).val();}).get(); 
            var inputSec4=$(".input_neumaticos_camioneta").map(function(){return $(this).val();}).get();
            var inputSec5=$(".input_motor_camioneta").map(function(){return $(this).val();}).get();
            var inputSec6=$(".input_seguridad_camioneta").map(function(){return $(this).val();}).get();
        
            let datos = {
              TipoQuery : '01_insert_checklick_camioneta',
              data:{
                id:(new Date()).getTime(),
                id_conductor:$("#txt01_camioneta_conductor_id").val(),
                fecha:$("#txt01_camioneta_fecha").val(),
                hora:$("#txt01_camioneta_hora").val(),
                placa:$("#seguridad_placa_camioneta").val(),
                km_inicial:$("#txt01_camioneta_km_inicial").val(),
                km_final:$("#txt01_camioneta_km_final").val(),            
                actividad:$("#txt01_camioneta_km_actividad").val(),
                declaracionJurada:checkboxDeclaracionJurada,
                luces:checkboxLuces,
                documentos:checkboxDocumentos,
                general:checkboxGeneral,
                neumatico:checkboxNeumatico,
                motor:checkboxMotor,
                seguridad:checkboxSeguridad,            
                observacion:$("#txt01_camioneta_osbervaciones").val(),
                pasajeros:Inputpasajeros,
                obs_1:inputSec1,
                obs_2:inputSec2,
                obs_3:inputSec3,
                obs_4:inputSec4,
                obs_5:inputSec5,
                obs_6:inputSec6,
              
              }        
            };   

            console.log(datos)
            appAjaxQuery(datos,rutaSQL).done(function(resp){                           
              return resp
          
          }).then((results) => {     
            swal("Se ha insertado correctamente", {
              icon: "success",
          });                               
          resetCheckListCamioneta();
          gridCheckListPreUso();
          });;   
        }

      //  });
    //  })             

 // }
  }
  function insert_sintomatologia(){ 
    if(validarcamposSintomatologia()){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{
      var checkbox=$(".check_sintomatologia:radio:checked").map(function(){return $(this).attr('id');}).get();     

      let datos = {
        TipoQuery : '01_insert_sintomatologia',
        data:checkbox,
        id:$("#txtOperadorSearchSintomatologia").val(),
      };
      /*
      swal({    
        text: "¿Deseas insertar sintomatología?",
        icon: "info",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {    
*/
          appAjaxQuery(datos,rutaSQL).done(function(resp){                
            swal("Se ha insertado correctamente", {
               icon: "success",
            });
            ResetDeclaracionNoSintomatologia();
            gridSintomatologia();
          });  
          
      //  }
    //  });
    } 
  }

  function select_load_tipo_regitro(id, value=-1){
    let datos = {
      TipoQuery : '01_select_tipo_registro'
    };
   
 
    appAjaxQuery(datos,rutaSQL).done(function(resp){      
      $.each(resp.tabla, function (i, item) {
        console.log(item.value)
        $('#'+id).append($("<option>", { 
            value: item.value,
            text : item.text ,
            selected:item.value===value?true:false
        }));
      });
    });
  
  }
  function select_asistencia_capacitacion(id, value=-1){
    let datos = {
      TipoQuery : '01_select_asistencia_form'
    };
   
 
    appAjaxQuery(datos,rutaSQL).done(function(resp){      
      $.each(resp.tabla, function (i, item) {
        console.log(item.value)
        $('#'+id).append($("<option>", { 
            value: item.value,
            text : "tema: "+item.text+" hora ini: "+item.hora_ini+" hora fin: "+item.hora_fin,
            selected:item.value===value?true:false
        }));
      });
    });
  
  }
  function select_loal_camioneta(id, value=-1){
    let datos = {
      TipoQuery : '01_select_load_placa_camioneta'
    };
   
 
    appAjaxQuery(datos,rutaSQL).done(function(resp){      
      $.each(resp.tabla, function (i, item) {
        console.log(item.value)
        $('#'+id).append($("<option>", { 
            value: item.value,
            text : item.text ,
            selected:item.value===value?true:false
        }));
      });
    });
  
  }
  function select_load_area_select(id, value=-1){
    let datos = {
      TipoQuery : '01_select_area'
    };
 
    appAjaxQuery(datos,rutaSQL).done(function(resp){      
      $.each(resp.tabla, function (i, item) {
        $('#'+id).append($('<option>', { 
            value: item.value,
            text : item.text ,
            selected:item.value===value?true:false
        }));
      });
    });  
  }
  function addObservacionesCapacitaciones_modal(){
    $('#table_observaciones_capacitaciones_modal > tbody').append( "<tr><td><input type='text' class='form-control observaciones_modal'/>"+
    "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button class='fa fa-trash bg-rose-500 py-4 px-4 text-white'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addAcuerdosCompromisosCapacitaciones_modal(){
    $('#table_Acuerdos_Compromisos_Capacitaciones_modal > tbody').append( "<tr><td><input type='text' class='form-control acuerdos_modal'/>"+
    "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button class='fa fa-trash bg-rose-500 py-4 px-4 text-white'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
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
  function addPasajerosChecklist(){
    $('#table_pasajeros_checklist > tbody').append( "<tr id='"+(new Date()).getTime()+"'><td><input type='text' class='form-control pasajeros_checklist'/>"+
    "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button class='fa fa-trash bg-rose-500 py-2 px-2 text-white' type='button' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  
  function addObservacionesCapacitaciones(){
    $('#table_observaciones_capacitaciones > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='class_add_observaciones'><td><input type='text' class='form-control observaciones'/>"+
    "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500 py-2 px-2 text-white' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addAcuerdosCompromisosCapacitaciones(){
    $('#table_Acuerdos_Compromisos_Capacitaciones > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='class_add_acuerdos'><td><input type='text' class='form-control acuerdos'/>"+
    "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button class='fa fa-trash bg-rose-500 py-2 px-2 text-white' type='button' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function modalDeleteObservaciones(id){
    
    swal({    
      text: "¿Deseas Eliminar la observación?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {

        console.log(id)
        let datos = {
          TipoQuery : '01_delete_observacion',
          value:id
        };

        appAjaxQuery(datos,rutaSQL).done(function(resp){      
          console.log(resp);
          /*swal("Has eliminado la capacitación", {
          icon: "success",
        });*/
        });  
        
      }
    });
  }
  function modalDeleteAcuerdos(id){
    console.log(id)
    swal({    
      text: "¿Deseas Eliminar el Acuerdo o Compromiso?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {

      
        let datos = {
          TipoQuery : '01_delete_acuerdo',
          value:id
        };

        appAjaxQuery(datos,rutaSQL).done(function(resp){      
          console.log(resp);
          swal("Has eliminado la capacitación", {
          icon: "success",
        });
        });  
        
      }
    });
  }
  function modalDeleteSolmnolenciaFatiga(id){
    swal({
      title: "¿Estas seguro que deseas eliminar?",
      text: "Al realizar esta operación se quitarán todos los datos asociados a la Control de Somnolencia y Fatiga",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {        
        let datos = {
          TipoQuery : '01_delete_fatiga_somnolencia',
          value:id
        };

        appAjaxQuery(datos,rutaSQL).done(function(resp){                
          gridThird();
          swal("Has eliminado la Registro de Somnolencia y Fatiga", {
          icon: "success",
        });

        });  
        
      }
    });
  }
  function modalDeleteCapacitacion(id){
    swal({
      title: "¿Estas seguro que deseas eliminar?",
      text: "Al realizar esta operación se quitarán todos los datos asociados a la capacitación",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {        
        let datos = {
          TipoQuery : '01_delete_capacitacion',
          value:id
        };

        appAjaxQuery(datos,rutaSQL).done(function(resp){                
          gridSecond();
          swal("Has eliminado la capacitación", {
          icon: "success",
        });
        });  
        
      }
    });
  }
  function insert_control(){

    if(validarcamposNuevoControl()){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{    
/*
    let datos = {
      TipoQuery : '01_validate_firma',
      evaluadorFirma:$("#txt01_control_somnolencia_firma_evaluador").val(),
      evaluador:$("#idEvaluadorHidden").val(),
      operadorFirma:$("#txt01_control_somnolencia_firma_operador").val(),
      operador:$("#idOperadorHidden").val()

    };
    console.log(datos)
    appAjaxQuery(datos,rutaSQL).done(function(resp){  
      console.log(resp);    
      if(resp.error){
        swal("Verifica que el código de firmas sea correcto", {
          icon: "warning",
        });
      }else{
*/
        var checkboxSec1=$(".check_Section_1:radio:checked").map(function(){return $(this).attr('id');}).get(); 
        var inputSec1=$(".input_section_1").map(function(){return $(this).val();}).get(); 
        var checkboxSec2=$(".check_Section_2:radio:checked").map(function(){return $(this).attr('id');}).get(); 
        var inputSec2=$(".input_section_2").map(function(){return $(this).val();}).get(); 

        let datos = {
          TipoQuery : '01_insert_control_somnolencia',
          data:{
            id_evaluador:$("#idEvaluadorHidden").val(),
            id_operador:$("#idOperadorHidden").val(),
            operacion:$("#txt01_proyecto_somnolencia").val(),
            fecha:$("#txt_fecha_control").val(),
            horas_duerme:$("#txt01_horas_durmio").val(),
            horas_transcurridas:$("#txt01_horas_ultimo_sue").val(),            
            conclusion:$("#txt01_control_somnolencia_conclusion").val(),
            S_check_1:checkboxSec1,
            S_obs_1:inputSec1,
            S_check_2:checkboxSec2,
            S_obs_2:inputSec2,
           
          }        
        };      
        console.log(datos)
       appAjaxQuery(datos,rutaSQL).done(function(resp){                                     
            swal("Se ha insertado correctamente", {
              icon: "success",
           });            
           gridThird();     
           resetControlSomnolencia();
        });             
   //  }
  //  });  
  }
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
function insert_registro_personas(){
  let datos = {
    TipoQuery : 'sql_get_last_requerimiento_personal'      
  };                
 appAjaxQuery(datos,rutaSQL).done(function(dat){   
  let id=Number(dat.tabla.id)+1;
  let Maindata=[    
    {title:"id",element:"",type:"text",status:0,value:"RQ-CM-P-2022-"+id},
    {title:"id_personal",element:"idsolicitanteHidden",type:"text",status:1,value:"val"},
    {title:"cargo",element:"txt_cargo_personas",type:"text",status:1,value:"val"},
    {title:"n_vacantes",element:"txt_n_vacantes_personas",type:"text",status:1,value:"val"},
    {title:"area",element:"personas_select_area",type:"text",status:0,value:"4"},
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

        contentOpe+=ope.print.state?'<button class="fa fa-print bg-indigo-500 py-2 px-2 text-white"'+
                                    'onclick='+ope.print.funct+'("'+dd+'"); type="button"></button>':''
        contentOpe+=ope.view.state?'<button class="fa fa-eye bg-cyan-500 py-2 px-2 text-white"'+
                                    'onclick='+ope.view.funct+'("'+dd+'");  type="button"></button>':''
        contentOpe+=ope.edit.state?'<button class="fa fa-pencil bg-amber-500 py-2 px-2 text-white"'+
                                    'onclick='+ope.edit.funct+'("'+dd+'"); type="button"></button>':''
        contentOpe+=ope.delet.state?'<button class="fa fa-trash bg-rose-500 py-2 px-2 text-white"'+
                                    'onclick='+ope.delet.funct+'("'+dd+'"); type="button"></button>':''

        $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;">'+contentOpe+'</div>');
  }})

  console.log(columns)
  return columns
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
  "<td><input type='text' class='obligatory-input obligatory-input form-control txt_prioridad_requerimiento' /></td>"+
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
    {title:"area",element:"",type:"text",status:0,value:"4"},
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
  
          ],"searchRequrimientoPersonalLogisticahtml",[            
            "Nº Requerimiento",         
            "Area",
            "Cargo",
            "Estado"
          ],"1",0
        );
      break; 

      default:
        break;
    }
  }
  function resetControlSomnolencia(){  

    $("#txt_search_evaluador").val("");
    $("#txt_search_operador").val("");
    $("#txt_view_operador").val("");
    $("#txt_view_evaluador").val("");

    $("#txt01_control_somnolencia_firma_operador").val("");
    $("#txt01_control_somnolencia_firma_evaluador").val("");

    $("#idEvaluadorHidden").val("");
    $("#idOperadorHidden").val("");
    $("#txt01_proyecto_somnolencia").val("");
    $("#txt_fecha_control").datepicker("setDate",moment().format("DD/MM/YYYY"));
    $("#txt01_horas_durmio").val("");
    $("#txt01_horas_ultimo_sue").val("");
    $("#txt01_control_somnolencia_conclusion").val("");
    $(".check_Section_1:radio").prop("checked", false);
    $(".check_Section_2:radio").prop("checked", false);
    $(".input_section_2").each(function(){
      $(this).val("");
    });
    $(".input_section_1").each(function(){
      $(this).val("");
    });
  }
  function insert_capacitacion(){
    
      if(validarcamposNuevoRegistro()){
        swal("Completa todos los campos", {
          icon: "error",
        });
      }else{   

     /* swal({
        text: 'Ingrese Código de Firma Digital',
        content: "input",
        button: {
          text: "Confirmar" 
        },
      })
      .then(firma => {  
       

        let datos = {
          TipoQuery : '03_save_validate_firma_expositor',
          id:$("#idExpositorHidden").val(),          
          codFimr:firma
        }
        appAjaxQuery(datos,rutaSQL).done(function(resp){     

          if(resp.error){
            swal("Verifica que el código de firmas sea correcto", {
              icon: "warning",
            });
          }else{    
            
            */  
            var observaciones=$('#table_observaciones_capacitaciones > tbody').find(".observaciones").map(function(){return $(this).val();}).get();
            var acuerdos=$('#table_Acuerdos_Compromisos_Capacitaciones > tbody').find(".acuerdos").map(function(){return $(this).val();}).get();
            
            /*var asistances=$('.check-asistances:checkbox:checked').map(function(){return $(this).attr('id');}).get();
        */
            var data = Array();
            var dataContent = Array();
            $("#grid_capacitacion_add_participante > tbody > tr").each(function(i, v){
                data[i] = Array();
                $(this).children('td').each(function(ii, vv){
                    let dataVal;

                    if($(this).attr("id")){
                      dataVal=$(this).find("input").val();
                    }else{
                      dataVal=($(this).text())?$(this).text():$(this).find("input").is(':checked');
                    }
                    data[i][ii] =  dataVal;
                }); 
            })
           
            data.forEach((it)=>{        
              if(it[5]){
                dataContent.push(it[0])
              }
           
            })
            console.log(data)
            let datos = {
              TipoQuery : '03_save_capacitacion',
              data:{
                id:(new Date()).getTime(),
                tipo_registro:$("#seguridad_tipo_registro_select").val(),
                area:$("#seguridad_area_select").val(),
                tema:$("#txt_tema").val(),
                id_expositor:$("#idExpositorHidden").val(),
                fecha:$("#txt_fecha_capacitaciones").val(),
                hora_ini:$("#txt_hora_inicio").val(),
                hora_fin:$("#txt_hora_final").val(),
                hora_total:$("#txt_hora_total").val(),
                objetivos:$("#txt_objetivos").val(),
                materiales:$("#txt_materiales").val(),
                empresa:$("#txt_empresa_expositor").val(),
                lugar:$("#txt_lugar").val(),
                observaciones:observaciones,
                acuerdos:acuerdos,
                asistances:dataContent
              },
             // items:dataContent
            };    
          console.log(datos)
          appAjaxQuery(datos,rutaSQL).done(function(resp){   
            swal("Se ha registrado correctamente", {
              icon: "success",
            });
          gridSecond();
          $("#grid_capacitacion_add_participante > tbody").empty();
          resetCapacitacionFields();         
             //console.log(resp)                                     
                // return resp                      
            });          
      //   }

      //  });
    //  });
    }
  }
  function resetCapacitacionFields(){  
    $("#txt_tema").val("");
    $("#seguridad_tipo_registro_select").val("-1");
    $("#seguridad_area_select").val("-1");

    $("#txt_search_expositor").val("");
    $("#txt_expositor").val("");
    $("#txt_expositor_empresa").val("");

    $("#txt_fecha_capacitaciones").datepicker("setDate",moment().format("DD/MM/YYYY"));  
    $("#txt_hora_inicio").val("");
    $("#txt_hora_final").val("");
    $("#txt_hora_total").val("");

    $("#txt_objetivos").val("");
    $("#txt_materiales").val("");
    $("#txt_lugar").val("");

    $(".class_add_observaciones").remove();
    $(".class_add_acuerdos").remove();
  }
  function searchConductorEscolta(){
    var msn=$('#txt_search_camioneta_conductor').val();
    let datos = {
      TipoQuery : '02_search_conductor_camioneta',
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

        $("#txt01_camioneta_conductor_id").val(resp.tabla.id);
        $('#txt01_camioneta_nombres_conductor').val(resp.tabla.nombres);
        $('#txt01_camioneta_apellidos_conductor').val(resp.tabla.apellidos);
      }
    });
  }
  function searchConductorEscolta2(){
    var msn=$('#txt_search_cisterna_conductor').val();
    let datos = {
      TipoQuery : '02_search_conductor_camioneta',
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

        $("#txt01_conductor_cisterna_id").val(resp.tabla.id);
        $('#txt01_conductor_cisterna_nombre').val(resp.tabla.nombres+" "+resp.tabla.apellidos);
        $("#txt01_conductor_cisterna_dni").val(resp.tabla.dni);
        
      
      }
    });
  }

  function searchFuncionForNameAndSurnameTemplate(inputsearch,sql,inputtext){
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
        $('#'+inputtext[1]).val(resp.tabla.nombres+" "+resp.tabla.apellidos);
       // $('#'+inputtext[2]).val(resp.tabla.apellidos);    
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

  function searchExpositors(){
    var msn=$('#txt_search_expositor').val();
    let datos = {
      TipoQuery : '02_search_Expositor',
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

        $("#idExpositorHidden").val(resp.tabla.id);
        $('#txt_expositor').val(resp.tabla.nombres+" "+resp.tabla.apellidos);
        $('#txt_expositor_empresa').val(resp.tabla.empresa);
      }
    });
  }
  function searchAsistance(){
    var msn=$('#txt_search_asistance_dni').val();
    let datos = {
      TipoQuery : '02_search_asistance',
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

        $("#idAsistenciaHidden").val(resp.tabla.id);
        $('#txt_search_asistance_dni_view').val(resp.tabla.nombres+" "+resp.tabla.apellidos);
      }
    });
  }
  function searchEvaluador(){
    
    var msn=$('#txt_search_evaluador').val();
    let datos = {
      TipoQuery : '02_search_Evaluador',
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
        $("#idEvaluadorHidden").val(resp.tabla.id);
        $('#txt_view_evaluador').val(resp.tabla.nombres+" "+resp.tabla.apellidos);
      }
    });
  }
  function searchOperador(){
    var msn=$('#txt_search_operador').val();
    let datos = {
      TipoQuery : '02_search_Operador',
      value:msn
    };  
    console.log("payasada");
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.error){
        swal("No se encontro incidencia para el DNI", {
          icon: "warning",
        });
      }else{
        
        swal("Has seleccionado a: "+resp.tabla.nombres+" "+resp.tabla.apellidos+"", {
          icon: "success",
        });
        $("#idOperadorHidden").val(resp.tabla.id)
        $('#txt_view_operador').val(resp.tabla.nombres+" "+resp.tabla.apellidos);
      }   
    });
  }
 



  function gridFirst(id){  
     
    let datos = {
      TipoQuery : '02_grid',
      value:id
    };
    let fila ="";
    var table;
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.tabla.length>0){       
       table= $('#grd02Datos').DataTable( {
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
                      $(nTd).html('<input class="form-check-input check-asistances" type="checkbox" value="" id="'+(parseInt(oData.id))+'"/>');
                  }
                }
              },
              { data: "id"},          
              { data: "dni" },
              { data: "nombres" },
              { data: "area" },
              { data: "cargo" }              
             
          ]
      } );  
                        
        $('#grd02Datos_filter').on('keyup', function() {          
              table
              .column(2)
              .search($('#grd02Datos_filter').val(), false, true)
              .draw();
      })   

 

      }else{
        $('#grd02Datos').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados</td></tr>');
      }
      //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
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
  function insert_asistance(){
    if(validatecamposAsistance()){
      swal("Completa todos los campos", {
        icon: "error",
      });

    }else{
      swal({
        text: 'Ingrese Código de Firma Digital',
        content: "input",
        button: {
          text: "Confirmar" 
        },
      })
      .then(firma => {
        let datos = {
          TipoQuery : '03_save_validate_asistacance_capacitacion',
          id:$("#idAsistenciaHidden").val(),      
          codFimr:firma
        }
        appAjaxQuery(datos,rutaSQL).done(function(resp){     

          if(resp.error){
            swal("Verifica que el código de firmas sea correcto", {
              icon: "warning",
            });
          }else{             
            let datos = {
              TipoQuery : '01_insert_capacitacion_asistance_',
              data:{
                id_capacitacion:$("#asistencia_capacitacion").val(),
                id_asistance:$("#idAsistenciaHidden").val(),                  
              }        
            };   
     
            appAjaxQuery(datos,rutaSQL).done(function(resp){                           
              return resp
          
          }).then((results) => {     
            swal("Se ha insertado correctamente", {
              icon: "success",
          });                               
          resetFieldAsistanceForm();
          });;   
        }

        });
      })             

    }
  }
  function resetFieldAsistanceForm(){
    $("#asistencia_capacitacion").val("-1");
    $("#idAsistenciaHidden").val("");
    $("#txt_search_asistance_dni").val("");
    $("#txt_search_asistance_dni_view").val("");
  }
  function copyToClipboard(){
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val("http://localhost/ERP/mini-erp/mini-erp/asistance.php").select();
    document.execCommand("copy");
    $temp.remove();
  }