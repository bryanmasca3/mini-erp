var rutaSQL = "pages/catalogos/personas/sql.php";
function addObservacionespersonas(){
    $('#table_observaciones_personas > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='class_add_observaciones_personas'><td><input type='text' class='form-control observaciones_personas'/>"+
    "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash btn btn-danger btn-xs' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addFichaPersonalProfesion(){
    $('#table_FichaPersonalProfesion > tbody').append( "<tr id='"+(new Date()).getTime()+"' class=''><td><input type='text' class='form-control'/>"+
    "</td><td><select id='txt_ficha_personal_profesion_estado' class='form-control'><option value='-1'>Selecciona...</option> <option value='0'>TITULO</option><option value='1'>BACHILLER</option><option value='2'>EGRESADO</option><option value='3'>CURSANDO<option></select></td><td><input type='text' class='form-control'/></td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash btn btn-danger btn-xs' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addFichaPersonalReferencia(){
    $('#table_FichaPersonalReferencia > tbody').append( "<tr id='"+(new Date()).getTime()+"' class=''><td><input type='text' class='form-control'/>"+
    "</td><td><input type='text' class='form-control'/></td><td><input type='text' class='form-control'/></td><td><input type='text' class='form-control'/></td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash btn btn-danger btn-xs' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addFichaPersonalTecnica(){
    $('#table_FichaPersonalTecnica > tbody').append( "<tr id='"+(new Date()).getTime()+"' class=''><td><input type='text' class='form-control'/>"+
    "</td><td><select id='txt_ficha_personal_profesion_estado' class='form-control'><option value='-1'>Selecciona...</option> <option value='0'>TITULO</option><option value='1'>EGRESADO</option><option value='2'>CURSANDO<option></select></td><td><input type='text' class='form-control'/></td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash btn btn-danger btn-xs' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addFichaPersonalOtrosEstudios(){
    $('#table_FichaPersonalOtrosEstudios > tbody').append( "<tr id='"+(new Date()).getTime()+"' class=''><td><input type='text' class='form-control'/>"+
    "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash btn btn-danger btn-xs' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addFichaPersonalIdiomas(){
    $('#table_FichaPersonalIdiomas > tbody').append( "<tr id='"+(new Date()).getTime()+"' class=''><td><select  class='form-control'><option value='-1'>Selecciona...</option><option value='0'>ESPAÑOL</option><option value='1'>INGLES</option><option value='2'>PORTUGUES</option> <option value='3'>FRANCES</option></select>"+
    "</td><td><select class='form-control'><option value='-1'>Selecciona...</option><option value='0'>BASICO</option><option value='1'>INTERMEDIO</option><option value='2'>AVANZADO</option></select></td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash btn btn-danger btn-xs' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addChildren(){
    $('#table_children_personas > tbody').append( "<tr id='"+(new Date()).getTime()+"' class=''><td><input type='text' class='form-control '/></td>"+
    "<td><input type='text' class='form-control '/></td>"+
    "<td><input type='date' class='form-control '/></td>"+
    "<td><input type='number' class='form-control '/></td>"+
    "<td><input type='text' class='form-control '/></td>"+
    "<td><input type='number' class='form-control '/></td>"+

    "<td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash btn btn-danger btn-xs' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
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
            nombresCandidato: $('#txt_referencia_laboral_candidato_nombres').val(),
            apellidosCandidato: $('#txt_referencia_laboral_candidato_apellidos').val(),
            nombresReferente: $('#txt_referencia_laboral_referente_nombres').val(),
            apellidosReferente:$('#txt_referencia_laboral_referente_apellidos').val(),
            
            telefonoReferente: $('#txt_referencia_laboral_referente_telefono').val(),
            cargoReferente: $('#txt_referencia_laboral_referente_cargo').val(),      
            empresaReferente: $('#txt_referencia_laboral_referente_empresa').val(),

            criterio1: $('#ReferenciaLaboralPreguntasCriterio_1').val(),
            criterio2: $('#ReferenciaLaboralPreguntasCriterio_2').val(),
            criterio3: $('#ReferenciaLaboralPreguntasCriterio_3').val(),
            criterio4: $('#ReferenciaLaboralPreguntasCriterio_4').val(),
            criterio5: $('#ReferenciaLaboralPreguntasCriterio_5').val(),
            criterio6: $('#ReferenciaLaboralPreguntasCriterio_6').val(),
            criterio7: $('#ReferenciaLaboralPreguntasCriterio_7').val(),
            criterio8: $('#ReferenciaLaboralPreguntasCriterio_8').val(),
            criterio9: $('#ReferenciaLaboralPreguntasCriterio_9').val(),
            criterio10: $('#ReferenciaLaboralPreguntasCriterio_10').val(),

            checkbox1:checkbox1                                       
          },
        };    
      //console.log(datos)
       appAjaxQuery(datos,rutaSQL).done(function(resp){   
        swal("Se ha registrado correctamente", {
          icon: "success",
        });
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
        var checkbox1=$(".check_gestion_entrevista:radio:checked").map(function(){return $(this).attr('id');}).get();    
        var checkbox2=$(".check_otros_entrevistas:radio:checked").map(function(){return $(this).attr('id');}).get();    

            let datos = {
              TipoQuery : '03_save_register_entrevista',
              data:{
                 nombres: $('#txt_entrevistas_nombres').val(),
                apellidos: $('#txt_entrevistas_apellidos').val(),
                dni: $('#txt_entrevistas_dni').val(),
                puesto:$('#txt_entrevistas_puesto').val(),
                
                edad: $('#txt_entrevistas_edad').val(),
                fecha: $('#txt_entrevistas_fecha').val(),      
                civil: $('#txt_entrevistas_civil').val(),

                correo: $('#txt_entrevistas_correo').val(),
                telefono: $('#txt_entrevistas_telefono').val(),
                pretenciones: $('#txt_entrevistas_pretenciones').val(),
                checkbox1:checkbox1,
                checkbox2:checkbox2                                   
              },
            };    
          console.log(datos)
           appAjaxQuery(datos,rutaSQL).done(function(resp){   
            swal("Se ha registrado correctamente", {
              icon: "success",
            });
                resetCaFieldsPersonasEntrevista();         
                               
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
              id_solicitante: $('#idsolicitanteHidden').val(),
              cargo: $('#txt_cargo_personas').val(),
              vacante: $('#txt_n_vacantes_personas').val(),
    
              area: $('#personas_select_area').val(),
              contrato: $('#personas_select_contrato').val(),      
              motivo: $('#personas_select_motivo').val(),
    
              lugar: $('#personas_select_lugar').val(),
              duracion: $('#personas_select_duracion').val(),
              fecha: $('#txt_fecha_g_personas').val(),
    
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

    $("#link_NuevoRegistroFichaPersonal").removeClass("active");    
    $("#link_HistorialFichaPersonal").addClass("active");    
  }
  function NuevoRegistroFichaPersonal(){
  
    $("#HistorialFichaPersonal").hide();
    $("#NuevoRegistroFichaPersonal").show();

    $("#link_HistorialFichaPersonal").removeClass("active");    
    $("#link_NuevoRegistroFichaPersonal").addClass("active");    
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
             
                { data: "id"},          
                { data: "nombrescandidato" },
                { data: "nombresreferente" },                                     
                { data: "id",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(oData.id) {                      
                      $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print btn btn-success btn-xs" type="button" onclick="pdf_ReferenciaLaboral('+oData.id+')"></button><button class="fa fa-trash btn btn-danger btn-xs" type="button" onclick="modalDeleteReferenciaLaboral('+oData.id+')">');
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
function gridEntrevistas(){
    let datos = {
        TipoQuery : '01_gridEntrevistasPersonas'
      };
      var table;   
      appAjaxQuery(datos,rutaSQL).done(function(resp){
       
        if(resp.tabla.length>0){      
         table= $('#grd01EntrevistaHistorial').DataTable( {         
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
                { data: "fecha" },            
                { data: "id",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(oData.id) {                      
                      $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print btn btn-success btn-xs" type="button" onclick="pdf_EntrevsitasPersona('+oData.id+')"></button><button class="fa fa-trash btn btn-danger btn-xs" type="button" onclick="modalDeleteEntrevistaPersona('+oData.id+')">');
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
      });
  }
function gridSecondRequerimientos(){
    let datos = {
        TipoQuery : '01_gridRequerimientosPersonas'
      };
      var table;   
      appAjaxQuery(datos,rutaSQL).done(function(resp){
       
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
             
                { data: "id"},          
                { data: "nombres" },
                { data: "vacantes" },
                { data: "cargo" },
                { data: "fecha" },
                { data: "area" },
                { data: "id",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(oData.id) {
                      console.log(oData.id)
                      $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print btn btn-success btn-xs" type="button" onclick="pdf_requerimientoPersona('+oData.id+')"></button><button class="fa fa-trash btn btn-danger btn-xs" type="button" onclick="modalDeleteRequerimientoPersona('+oData.id+')">');
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
            text: resp.tabla1.nombresCandidato,                       
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
           text:  resp.tabla1.nombresReferente,                       
           fontSize: 8                                                
          },{
            text: 'Teléfono : ',                       
            fontSize: 8,          
            bold: true,  
          },{
            text:  resp.tabla1.telefono,                       
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
         text:  resp.tabla1.cargo,                       
         fontSize: 8                                                
        },{
          text: 'Empresa : ',                       
          fontSize: 8,          
          bold: true,  
        },{
          text:  resp.tabla1.empresa,                       
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
          text:  resp.tabla1.criterio1,
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
          text: resp.tabla1.criterio2,
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
          text: resp.tabla1.criterio3,
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
          text: resp.tabla1.criterio4,
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
          text: resp.tabla1.criterio5,
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
          text: resp.tabla1.criterio6,
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
          text: resp.tabla1.criterio7,
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
          text: resp.tabla1.criterio8,
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
          text: resp.tabla1.criterio9,
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
          text: resp.tabla1.criterio10,
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
              text: resp.tabla1.recomendacion=="1"?'X':'',                       
              fontSize: 8,
            border: [true, false, true, true],    
            },
            {
              text: 'NO : ',                       
              fontSize: 8,
             border: [true, false, true, true],    
            },
            {
              text: resp.tabla1.recomendacion=="0"?'X':'',                       
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
            text:resp.tabla1.nombres,                       
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
           text: resp.tabla1.dni,                       
           fontSize: 8                                                
          },{
            text: 'EDAD: ',                       
            fontSize: 8,          
            bold: true,  
          },{
            text: resp.tabla1.edad,                       
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
         text: resp.tabla1.fecha,                       
         fontSize: 8                                                
        },{
          text: 'ESTADO CIVIL : ',                       
          fontSize: 8,          
          bold: true,  
        },{
          text: resp.tabla1.civil,                       
          fontSize: 8 
        }
   ], [
    {             
      text: 'CORREO ELECTRONICO : ',                       
      fontSize: 8,          
      bold: true,          
    } 
    ,              
     {  
       text:resp.tabla1.correo,                       
       fontSize: 8                                                
      },{
        text: 'TELEFONO : ',                       
        fontSize: 8,          
        bold: true,  
      },{
        text: resp.tabla1.telefono,                       
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
     text: resp.tabla1.puesto,                       
     fontSize: 8 , 
     border: [true, true, true, false],                                               
    },{
      text: 'PRETENCIONES SALARIALES : ',                       
      fontSize: 8,          
      bold: true,  
      border: [true, true, true, false], 
    },{
      text: 'S/. '+resp.tabla1.presenciones,                       
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
         {text: resp.tabla1.O_1=="3"?'X':'',                       
         fontSize: 8,                   
        },{
          text:  resp.tabla1.O_1=="2"?'X':'',                       
          fontSize: 8,          
        
         },{
          text:  resp.tabla1.O_1=="1"?'X':'',                       
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
         {text:  resp.tabla1.O_2=="3"?'X':'',                       
         fontSize: 8,                   
        },{
          text:  resp.tabla1.O_2=="2"?'X':'',                       
          fontSize: 8,          
        
         },{
          text:  resp.tabla1.O_2=="1"?'X':'',                       
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
         {text:  resp.tabla1.O_3=="3"?'X':'',                       
         fontSize: 8,                   
        },{
          text:  resp.tabla1.O_3=="2"?'X':'',                       
          fontSize: 8,          
        
         },{
          text:  resp.tabla1.O_3=="1"?'X':'',                       
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
          text: (Number(resp.tabla1.O_3)+Number(resp.tabla1.O_2)+Number(resp.tabla1.O_1))/3,                       
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
           {text:  resp.tabla1.S_1=="3"?'X':'',                       
           fontSize: 8,                   
          },{
            text:  resp.tabla1.S_1=="2"?'X':'',                       
            fontSize: 8,          
          
           },{
            text:  resp.tabla1.S_1=="1"?'X':'',                       
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
           {text:  resp.tabla1.S_2=="3"?'X':'',                       
           fontSize: 8,                   
          },{
            text:  resp.tabla1.S_2=="2"?'X':'',                       
            fontSize: 8,          
          
           },{
            text:  resp.tabla1.S_2=="1"?'X':'',                       
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
           {text:  resp.tabla1.S_1=="3"?'X':'',                       
           fontSize: 8,                   
          },{
            text:  resp.tabla1.S_1=="2"?'X':'',                       
            fontSize: 8,          
          
           },{
            text:  resp.tabla1.S_1=="1"?'X':'',                       
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
            text: (Number(resp.tabla1.S_3)+Number(resp.tabla1.S_2)+Number(resp.tabla1.S_1))/3,                       
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
          gridReferenciaLaboral();
            swal("Has eliminado el registro", {
             icon: "success",
            });
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
    $("#txt_entrevistas_fecha").datepicker("setDate",moment().format("DD/MM/YYYY"));

    $("#txt_entrevistas_civil").val("-1");

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