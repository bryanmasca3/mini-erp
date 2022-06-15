var rutaSQL = "pages/catalogos/personas/sql.php";
function addObservacionespersonas(){
    $('#table_observaciones_personas > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='class_add_observaciones_personas'><td><input type='text' class='form-control observaciones_personas'/>"+
    "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash btn btn-danger btn-xs' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addFichaPersonalProfesion(){
    $('#table_FichaPersonalProfesion > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='addFichaPersonalProfesion'><td><input type='text' class='form-control personal_profesional_data'/>"+
    "</td><td><select id='txt_ficha_personal_profesion_estado' class='form-control personal_profesional_data'><option value='-1'>Selecciona...</option> <option value='0'>TITULO</option><option value='1'>BACHILLER</option><option value='2'>EGRESADO</option><option value='3'>CURSANDO<option></select></td><td><input type='text' class='form-control personal_profesional_data'/></td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash btn btn-danger btn-xs' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addFichaPersonalReferencia(){
    $('#table_FichaPersonalReferencia > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='addFichaPersonalReferencia'><td><input type='text' class='form-control personal_referencia_data'/>"+
    "</td><td><input type='text' class='form-control personal_referencia_data'/></td><td><input type='text' class='form-control personal_referencia_data'/></td><td><input type='text' class='form-control personal_referencia_data'/></td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash btn btn-danger btn-xs' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addFichaPersonalTecnica(){
    $('#table_FichaPersonalTecnica > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='addFichaPersonalTecnica'><td><input type='text' class='form-control personal_tecnica_data'/>"+
    "</td><td><select id='txt_ficha_personal_profesion_estado' class='form-control personal_tecnica_data'><option value='-1'>Selecciona...</option> <option value='0'>TITULO</option><option value='1'>EGRESADO</option><option value='2'>CURSANDO<option></select></td><td><input type='text' class='form-control personal_tecnica_data'/></td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash btn btn-danger btn-xs' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addFichaPersonalOtrosEstudios(){
    $('#table_FichaPersonalOtrosEstudios > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='addFichaPersonalOtrosEstudios'><td><input type='text' class='form-control personal_otros_estudios_data'/>"+
    "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash btn btn-danger btn-xs' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addFichaPersonalIdiomas(){
    $('#table_FichaPersonalIdiomas > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='addFichaPersonalIdiomas'><td><select  class='form-control personal_idioma_data'><option value='-1'>Selecciona...</option><option value='0'>ESPAÑOL</option><option value='1'>INGLES</option><option value='2'>PORTUGUES</option> <option value='3'>FRANCES</option></select>"+
    "</td><td><select class='form-control personal_idioma_data'><option value='-1'>Selecciona...</option><option value='0'>BASICO</option><option value='1'>INTERMEDIO</option><option value='2'>AVANZADO</option></select></td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash btn btn-danger btn-xs' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
  function addChildren(){
    $('#table_children_personas > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='addChildren'><td><input type='text' class='form-control personal_hijos_data'/></td>"+
    "<td><input type='text' class='form-control personal_hijos_data'/></td>"+
    "<td><input type='date' class='form-control personal_hijos_data'/></td>"+
    "<td><input type='number' class='form-control personal_hijos_data'/></td>"+
    "<td><input type='text' class='form-control personal_hijos_data'/></td>"+
    "<td><input type='number' class='form-control personal_hijos_data'/></td>"+

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
             
                { data: "id"},          
                { data: "nombrescandidato" },
                { data: "dni" },                                                     
                { data: "dni_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(sData==="0") {   
                                  
                    $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"0"+')">');
                    
                  }else if(sData==="1") {            
                    $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"0"+')">');
                  
                  }  
                    else if(sData==="2") {                    
                      $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"0"+')">');
                  }  
                    else{          
                      $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"0"+')">');        
                   
                  }   
                } },    
                { data: "licencia_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(sData==="0") {   
                                  
                    $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"1"+')">');
                    
                  }else if(sData==="1") {            
                    $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"1"+')">');
                  
                  }  
                    else if(sData==="2") {                    
                      $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"1"+')">');
                  }  
                    else{          
                      $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"1"+')">');        
                   
                  }   
                }  },    
                { data: "sctr_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(sData==="0") {   
                                  
                    $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"2"+')">');
                    
                  }else if(sData==="1") {            
                    $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"2"+')">');
                  
                  }  
                    else if(sData==="2") {                    
                      $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"2"+')">');
                  }  
                    else{          
                      $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"2"+')">');        
                   
                  }   
                }  },    
                { data: "seguro_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(sData==="0") {   
                                  
                    $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"3"+')">');
                    
                  }else if(sData==="1") {            
                    $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"3"+')">');
                  
                  }  
                    else if(sData==="2") {                    
                      $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"3"+')">');
                  }  
                    else{          
                      $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"3"+')">');        
                   
                  }   
                }  },    
                { data: "policial_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(sData==="0") {   
                                  
                    $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"4"+')">');
                    
                  }else if(sData==="1") {            
                    $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"4"+')">');
                  
                  }  
                    else if(sData==="2") {                    
                      $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"4"+')">');
                  }  
                    else{          
                      $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"4"+')">');        
                   
                  }   
                }  },    
                { data: "judicial_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(sData==="0") {   
                                  
                    $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"5"+')">');
                    
                  }else if(sData==="1") {            
                    $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"5"+')">');
                  
                  }  
                    else if(sData==="2") {                    
                      $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"5"+')">');
                  }  
                    else{          
                      $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"5"+')">');        
                   
                  }   
                }  },    
                { data: "penal_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(sData==="0") {   
                                  
                    $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"6"+')">');
                    
                  }else if(sData==="1") {            
                    $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"6"+')">');
                  
                  }  
                    else if(sData==="2") {                    
                      $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"6"+')">');
                  }  
                    else{          
                      $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"6"+')">');        
                   
                  }   
                }  },    
                { data: "trabajo_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(sData==="0") {   
                                  
                    $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"7"+')">');
                    
                  }else if(sData==="1") {            
                    $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"7"+')">');
                  
                  }  
                    else if(sData==="2") {                    
                      $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"7"+')">');
                  }  
                    else{          
                      $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"7"+')">');        
                   
                  }   
                }  },  
                { data: "medico_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(sData==="0") {   
                                  
                    $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"8"+')">');
                    
                  }else if(sData==="1") {            
                    $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"8"+')">');
                  
                  }  
                    else if(sData==="2") {                    
                      $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"8"+')">');
                  }  
                    else{          
                      $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"8"+')">');        
                   
                  }   
                }  },    
                { data: "lice_fecha_vigencia",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  
                  if(sData==="0") {   
                                  
                    $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"9"+')">');
                    
                  }else if(sData==="1") {            
                    $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"9"+')">');
                  
                  }  
                    else if(sData==="2") {                    
                      $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"9"+')">');
                  }  
                    else{          
                      $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddControlDateFichaPersonal('+oData.id+','+"9"+')">');        
                   
                  }   
                
                }  },    
                { data: "id",
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  if(oData.id) {                      
                      $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-print btn btn-success btn-xs" type="button" onclick="pdf_FichaPersonal('+oData.id+')"></button><button class="fa fa-trash btn btn-danger btn-xs" type="button" onclick="modalDeleteFichaPersonal('+oData.id+')">');
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
function pdf_FichaPersonal(id){
  let datos = {
    TipoQuery : '03_pdf_Ficha_Personal',
    value:id 
  }
 // var hashmap = new Map();
 appAjaxQuery(datos,rutaSQL).done(function(resp){  
  
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
              text: resp.tabla1.nombres,                       
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
             text: resp.tabla1.fecha_nacimiento+" / "+resp.tabla1.lugar_nacimiento ,                       
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
           text: resp.tabla1.distrito,                       
           fontSize: 8,                                                  
          },
          {
            text: 'Provincia:',                       
            fontSize: 8,          
            bold: true,   
          },
          {
            text: resp.tabla1.provincia,                       
            fontSize: 8, 
          },
          {
            text: 'Dpto:',                       
            fontSize: 8,          
            bold: true,  
          },
          {
            text: resp.tabla1.departamento,                       
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
         text: resp.tabla1.dni,                       
         fontSize: 8,                                                  
        },
        {
          text: 'Teléf. Fijo:',                       
          fontSize: 8,          
          bold: true,   
        },
        {
          text: resp.tabla1.telefono,                       
          fontSize: 8, 
        },
        {
          text: 'Celular:',                       
          fontSize: 8,          
          bold: true,  
        },
        {
          text: resp.tabla1.celular,                       
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
       text: resp.tabla1.domicilio,                       
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
      text: resp.tabla1.urbanizacion,                       
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
        text: resp.tabla1.distrito_domicilio,                       
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
           text: resp.tabla1.estado_civil,                       
           fontSize: 8,                                                  
          },
          {
            text: 'Edad:',                       
            fontSize: 8,          
            bold: true,   
          },
          {
            text: resp.tabla1.edad,                       
            fontSize: 8, 
          },
          {
            text: 'Nº Hijos:',                       
            fontSize: 8,          
            bold: true,  
          },
          {
            text: resp.tabla1.n_hijos,                       
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
         text: resp.tabla1.sexo,                       
         fontSize: 8,                                                  
        },
        {
          text: 'Talla:',                       
          fontSize: 8,          
          bold: true,   
        },
        {
          text: resp.tabla1.talla,                       
          fontSize: 8, 
        },
        {
          text: 'Contextura:',                       
          fontSize: 8,          
          bold: true,  
        },
        {
          text: resp.tabla1.contextura,                       
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
              text: resp.tabla1.ruc,                       
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
            text: resp.tabla1.essalud,                       
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
          text: resp.tabla1.onp,                       
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
        text: resp.tabla1.cusp,                       
        fontSize: 8,                                                       
      },
      { 
        text: 'FECHA AFILIACIÓN',                       
        fontSize: 8,          
        bold: true,  
      },
      {
        text: resp.tabla1.fecha_afiliacion,                       
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
      widths: ['20%', '20%','10%','5%','10%', '5%','10%','5%','10%','5%'],
       headerRows: 1,
       body: [
           [
              {             
                text: 'Profesión:',                       
                fontSize: 8,          
                bold: true,          
              }  
              ,              
              {  
                text: 'resp.tabla1.cargo',                       
                fontSize: 8,                                                       
              },
              { 
                text: 'Título',                       
                fontSize: 8,          
                bold: true,  
              },
              {
                text: 'X',                       
                fontSize: 8,  
              } ,
              { 
                text: 'Bachiller',                       
                fontSize: 8,          
                bold: true,  
              },
              {
                text: '',                       
                fontSize: 8,  
              } ,
              { 
                text: 'Egresado',                       
                fontSize: 8,          
                bold: true,  
              },
              {
                text: '',                       
                fontSize: 8,  
              } ,
              { 
                text: 'Cursando',                       
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
              text: 'EducaciónSuperior (Lugar):',                       
              fontSize: 8,          
              bold: true,          
            }  
            ,              
            {  
              text: 'resp.tabla1.cargo',                       
              fontSize: 8,   
              colSpan:9,                                                    
            },
            { 
         
            },
            {
             
            } ,
            {  
            },
            {
             
            } ,
            { 
               
            },
            {
             
            } ,
            { 
             
            },
            {
          
            }          
         ],
         [
          {             
            text: 'Técnica:',                       
            fontSize: 8,          
            bold: true,          
          }  
          ,              
          {  
            text: 'resp.tabla1.cargo',                       
            fontSize: 8,                                                       
            colSpan:3,
          },
          {

          },
          {

          },
          { 
            text: 'Título',                       
            fontSize: 8,          
            bold: true,  
          },
          {
            text: 'X',                       
            fontSize: 8,  
          } ,        
          { 
            text: 'Egresado',                       
            fontSize: 8,          
            bold: true,  
          },
          {
            text: '',                       
            fontSize: 8,  
          } ,
          { 
            text: 'Cursando',                       
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
          text: 'Educación Técnica (Lugar):',                       
          fontSize: 8,          
          bold: true,          
        }  
        ,              
        {  
          text: 'resp.tabla1.cargo',                       
          fontSize: 8,   
          colSpan:9,                                                    
        },
        { 
     
        },
        {
         
        } ,
        {  
        },
        {
         
        } ,
        { 
           
        },
        {
         
        } ,
        { 
         
        },
        {
      
        }          
     ],                       
     [
      {             
        text: 'Otros Estudios:',                       
        fontSize: 8,          
        bold: true,          
      }  
      ,              
      {  
        text: 'response',                       
        fontSize: 8,   
        colSpan:9,                                                    
      },
      { 
   
      },
      {
       
      } ,
      {  
      },
      {
       
      } ,
      { 
         
      },
      {
       
      } ,
      { 
       
      },
      {
    
      }          
   ], 
       ]
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
                      text: resp.tabla2.nombres,                       
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
                     text: resp.tabla2.fecha+" / "+resp.tabla2.lugar_nacimiento,                       
                     fontSize: 8,                     
                     colSpan:3                    
                    },{},{},
                    {
                      text: 'Edad:',                       
                      fontSize: 8,          
                      bold: true,  
                    },
                    {
                      text: '28',                       
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
                   text: resp.tabla2.distrito,                       
                   fontSize: 8,                                                  
                  },
                  {
                    text: 'Provincia:',                       
                    fontSize: 8,          
                    bold: true,   
                  },
                  {
                    text: resp.tabla2.provincia,                       
                    fontSize: 8, 
                  },
                  {
                    text: 'Dpto:',                       
                    fontSize: 8,          
                    bold: true,  
                  },
                  {
                    text: resp.tabla2.departamento,                       
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
                 text: resp.tabla2.dni,                       
                 fontSize: 8,                                                  
                },
                {
                  text: 'RUC:',                       
                  fontSize: 8,          
                  bold: true,   
                },
                {
                  text: resp.tabla2.ruc,                       
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
              text: resp.tabla2.profesion,                       
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
                text: resp.tabla2.ocupacion,                       
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
               text: resp.tabla2.centro_lsboral,                       
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
              text: resp.tabla2.direccion,                       
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
                   text: resp.tabla2.telefono,                       
                   fontSize: 8,                                                  
                   colSpan:2,  
                  },{},
                  {
                    text: 'Celular:',                       
                    fontSize: 8,          
                    bold: true,   
                  },
                  {
                    text: resp.tabla2.celular,                       
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
                        text: resp.tabla3.nombres_padre,                       
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
                       text:resp.tabla3.trabajo_padre,                       
                       fontSize: 8,                     
                                     
                      },
                      {
                        text: 'Ocupación: ',                       
                        fontSize: 8,          
                        bold: true,  
                      },
                      {
                        text: resp.tabla3.ocupacion_padre,                       
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
                     text: resp.tabla3.direccion_padre,                       
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
                   text: resp.tabla3.telefono_padre,                       
                   fontSize: 8,                     
                                 
                  },
                  {
                    text: 'Celular: ',                       
                    fontSize: 8,          
                    bold: true,  
                  },
                  {
                    text: resp.tabla3.celular_padre,                       
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
                 text: resp.tabla3.nombres_madre,                       
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
                text: resp.tabla3.trabajo_madre,                       
                fontSize: 8,                     
                              
               },
               {
                 text: 'Ocupación: ',                       
                 fontSize: 8,          
                 bold: true,  
               },
               {
                 text: resp.tabla3.ocupacion_madre,                       
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
              text:  resp.tabla3.direccion_madre,                       
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
            text:  resp.tabla3.telefono_madre,                       
            fontSize: 8,                     
                          
           },
           {
             text: 'Celular: ',                       
             fontSize: 8,          
             bold: true,  
           },
           {
             text: resp.tabla3.celular_madre,                       
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
                            text: resp.tabla4.nombres,                       
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
                           text: resp.tabla4.parentesco,                       
                           fontSize: 8,                     
                                         
                          },
                          {
                            text: 'Teléfonos: ',                       
                            fontSize: 8,          
                            bold: true,  
                          },
                          {
                            text: resp.tabla4.telefono,                       
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
                    widths: ['20%','10%', '5%','10%', '5%','25%','25%'],
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
                              text: 'X',                       
                              fontSize: 8,    
                             },
                             {
                              text: 'NO',                       
                              fontSize: 8,
                             },
                             {
                              text: '',                       
                              fontSize: 8,
                             },
                             {             
                              text: 'Nro. De Licencia de Conducir:',                       
                              fontSize: 8,          
                              bold: true,          
                            },
                            {
                              text: '',                       
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
                                text: resp.tabla6.O_1,                       
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
                               text: resp.tabla6.O_2,                       
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
                             text: resp.tabla6.O_3,                       
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
                           text: resp.tabla6.O_4,                       
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
      
        $("#txt_id_type_pdf_Ficha_Personal").val(resp.tabla1.id_personal)
        $("#txt_id_name_pdf_ficha_personal").val(resp.tabla1.nombre); 
        $("#txt_id_type").val(resp.tabla1.type); 
        $('#modal_FichaPersonal').modal('show');
        //$('#modal_ProgramaCapacitacion').modal('hide');
        
    } ); 
 
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
function pdf_ModalAddProgramaCapacitacion(id,type){
  let datos = {
    TipoQuery : '01_get_pdf_file_programa_capacitacion',
    value:id,
    type:type
  };  
  var table;   
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    
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
         
            { data: "id"},                                                       
            { data: "induc_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"0"+')">');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"0"+')">');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"0"+')">');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"0"+')">');        
               
              }   
            } },    
            { data: "defen_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"1"+')">');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"1"+')">');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"1"+')">');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"1"+')">');        
               
              }   
            }  },    
            { data: "peligroso1_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"2"+')">');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"2"+')">');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"2"+')">');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"2"+')">');        
               
              }   
            }  },    
            { data: "peligroso2_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"3"+')">');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"3"+')">');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"3"+')">');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"3"+')">');        
               
              }   
            }  },    
            { data: "peligroso3_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"4"+')">');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"4"+')">');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"4"+')">');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"4"+')">');        
               
              }   
            }  },    
            { data: "auxilio_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"5"+')">');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"5"+')">');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"5"+')">');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"5"+')">');        
               
              }   
            }  },    
            { data: "extintores_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"6"+')">');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"6"+')">');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"6"+')">');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"6"+')">');        
               
              }   
            }  },    
            { data: "trabajo_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"7"+')">');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"7"+')">');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"7"+')">');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"7"+')">');        
               
              }   
            }  },  
            { data: "fatiga_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"8"+')">');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"8"+')">');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"8"+')">');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"8"+')">');        
               
              }   
            }  },    
            { data: "curso_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"9"+')">');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"9"+')">');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"9"+')">');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"9"+')">');        
               
              }   
            
            }  }, { data: "induccion_fecha_vigencia",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              
              if(sData==="0") {   
                              
                $(nTd).html('<span class="badge"style="background:#343a40">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"10"+')">');
                
              }else if(sData==="1") {            
                $(nTd).html('<span class="badge"style="background:#28a745">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"10"+')">');
              
              }  
                else if(sData==="2") {                    
                  $(nTd).html('<span class="badge"style="background:#ffc107">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"10"+')">');
              }  
                else{          
                  $(nTd).html('<span class="badge"style="background:#dc3545">o</span><button class="fa fa-pencil btn btn-info btn-xs" type="button" onclick="pdf_ModalAddProgramaCapacitacion('+oData.id+','+"10"+')">');        
               
              }   
            
            }  },    
            { data: "id",
            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              if(oData.id) {                      
                  $(nTd).html('<div style="display:flex;justify-content:center;gap:2rem;"><button class="fa fa-trash btn btn-danger btn-xs" type="button" onclick="modalDeleteProgramaCapacitacion('+oData.id+')">');
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
function save_programacion_capacitacion(){

  if(validarProgramacionCapacitacion()){
    swal("Completa todos los campos", {
      icon: "error",
     });
  }else{     
         var data   = new FormData();
           
         var files=$(".input_files_programacion_capacitacion").map(function(index, i){      
           data.append('file_'+index, this.files[0]);
           return  this.files[0].name
         }).get();
      
        
         let datos = {
           TipoQuery : '03_save_register_programacion_capacitacion',
           data:{
             id:(new Date()).getTime(),    
             files:files         
           },
         };        
         console.log(datos)
         appAjaxQuery(datos,rutaSQL).done(function(resp){  
         
        
            var xhttp = new XMLHttpRequest();
           
           // Set POST method and ajax file path
           xhttp.open("POST", "pages/catalogos/personas/ajaxfile.php", true);
     
           // call on request changes state
           xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
     
                var response = this.responseText;
                if(response == 1){
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
         resetProgramaCapacitacion();                                      
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
  function save_FichaPersonal(){

   


 if(validarFichaPersonal()){
     swal("Completa todos los campos", {
       icon: "error",
      });
   }else{     
          var data   = new FormData();
            
          var files=$(".input_files_ficha_personal").map(function(index, i){      
            data.append('file_'+index, this.files[0]);
            return  this.files[0].name
          }).get();
          var profesion=$('#table_FichaPersonalProfesion > tbody > tr').map(function(){
            
            var children =$(this).children().find('.personal_profesional_data').map(function(){ return $(this).val()}).get();
              return [children];              
             }).get();

             var tecnica=$('#table_FichaPersonalTecnica > tbody > tr').map(function(){
            
              var children =$(this).children().find('.personal_tecnica_data').map(function(){ return $(this).val()}).get();
                return [children];              
               }).get();

               var otrosEstudios=$('#table_FichaPersonalOtrosEstudios > tbody').find(".personal_otros_estudios_data").map(function(){return $(this).val();}).get();   

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
              nombres: $('#txt_ficha_personal_nombres').val(),
              apellidos: $('#txt_ficha_personal_apellidos').val(),
              fecha_nacimiento: $('#txt_ficha_personal_nacimiento').val(),
              lugar_nacimiento:$('#txt_ficha_personal_lugar').val(),      
              departamento: $('#select_Ficha_Personal_departamento_g').val(),
              provincia: $('#select_Ficha_Personal_provincia_g').val(),      
              distrito: $('#select_Ficha_Personal_distrito_g').val(),
              dni: $('#txt_ficha_personal_dni').val(),
              telefono: $('#txt_ficha_personal_telefono').val(),
              celular: $('#txt_ficha_personal_celular').val(),
              domicilio: $('#txt_ficha_personal_domicilio').val(),
              urbanizacion: $('#txt_ficha_personal_ubanizacion').val(),
              distrito: $('#txt_ficha_personal_distrito').val(),
              civil: $('#txt_ficha_personal_civil').val(),
              edad: $('#txt_ficha_personal_edad').val(),
              n_hijos: $('#txt_ficha_personal_n_hijos').val(),
              sexo: $('#txt_ficha_personal_sexo').val(),
              talla: $('#txt_ficha_personal_talla').val(),   
              contextura: $('#txt_ficha_personal_contextura').val(),
              
              ruc: $('#txt_ficha_personal_ruc').val(),
              essalud: $('#txt_ficha_personal_essalud').val(),
              onp: $('#txt_ficha_personal_onp').val(),   
              cussp: $('#txt_ficha_personal_cusspp').val(),
              fecha_afiliacion: $('#txt_ficha_personal_fecha_afiliacion').val(),
                             
              nombre_conyuge: $('#txt_ficha_personal_fecha_conyuge_nombre').val(),
              apellido_conyuge: $('#txt_ficha_personal_fecha_conyuge_apellido').val(),
              fecha_conyuge: $('#txt_ficha_personal_fecha_conyuge_fecha').val(),
              lugar_conyuge: $('#txt_ficha_personal_fecha_conyuge_lugar').val(),
              edad_conyuge: $('#txt_ficha_personal_fecha_conyuge_edad').val(),
              departamento_conyuge: $('#select_Ficha_Personal_departamento_conyuge_g').val(),
              provincia_conyuge: $('#select_Ficha_Personal_provincia_conyuge_g').val(),
              distrito_conyuge: $('#select_Ficha_Personal_distrito_conyuge_g').val(),         
              dni_conyuge: $('#select_Ficha_Personal_dni_conyuge').val(),
              ruc_conyuge: $('#select_Ficha_Personal_ruc_conyuge').val(),
              profesion_conyuge: $('#select_Ficha_Personal_profesion_conyuge').val(),                    
              ocupacion_conyuge: $('#select_Ficha_Personal_ocupacion_conyuge').val(),
              centro_conyuge: $('#select_Ficha_Personal_centro_conyuge').val(),
              direccion_conyuge: $('#select_Ficha_Personal_direccion_conyuge').val(),
              telefono_conyuge: $('#select_Ficha_Personal_telefono_conyuge').val(),
              celular_conyuge: $('#select_Ficha_Personal_celular_conyuge').val(),
    
              nombre_padre: $('#txt_Ficha_Personal_padre_nombre').val(),
              apellido_padre: $('#txt_Ficha_Personal_padre_apellido').val(),
              centro_padre: $('#txt_Ficha_Personal_padre_centro').val(),
              ocupacion_padre: $('#txt_Ficha_Personal_padre_ocupacion').val(),
              direccion_padre: $('#txt_Ficha_Personal_padre_direccion').val(),
              telefono_padre: $('#txt_Ficha_Personal_padre_telefono').val(),
              celular_padre: $('#txt_Ficha_Personal_padre_celular').val(),
    
              nombre_madre: $('#txt_Ficha_Personal_madre_nombres').val(),
              apellido_madre: $('#txt_Ficha_Personal_madre_apellidos').val(),
              centro_madre: $('#txt_Ficha_Personal_madre_centro').val(),
              ocupacion_madre: $('#txt_Ficha_Personal_madre_ocupacion').val(),
              direccion_madre: $('#txt_Ficha_Personal_madre_direccion').val(),
              telefono_madre: $('#txt_Ficha_Personal_madre_telefono').val(),
              celular_madre: $('#txt_Ficha_Personal_madre_celular').val(),
    
              nombre_referencia: $('#txt_Ficha_Personal_referencia_nombre').val(),
              apellido_referencia: $('#txt_Ficha_Personal_referencia_apellido').val(),
              parentesco_referencia: $('#txt_Ficha_Personal_referencia_parentesco').val(),
              telefono_referencia: $('#txt_Ficha_Personal_referencia_telefono').val(),
    
              licencia: $('#check_Ficha_Personal_licencia').val(),
              vehiculo: $('#check_Ficha_Personal_tipo_vehiculo').val(),
              marca: $('#check_Ficha_Personal_tipo_marca').val(),
              anio: $('#check_Ficha_Personal_tipo_anio').val(),
              placa: $('#check_Ficha_Personal_tipo_placa').val(), 
              
              profesion:profesion,
              tecnica:tecnica,
              otrosEstudios:otrosEstudios,
              idioma:idioma,
              referencia:referencia,
              hijos:hijos,
              movilidad:movilidad,
              files:files,
              policia_1:$('#Ficha_Personal_antecedentes_1').val(), 
              policia_2:$('#Ficha_Personal_antecedentes_2').val(), 
              policia_3:$('#Ficha_Personal_antecedentes_3').val(), 
              policia_4:$('#Ficha_Personal_antecedentes_4').val() 


            },
          };        
          console.log(datos)
          appAjaxQuery(datos,rutaSQL).done(function(resp){  
          
         
             var xhttp = new XMLHttpRequest();
            
            // Set POST method and ajax file path
            xhttp.open("POST", "pages/catalogos/personas/ajaxfile.php", true);
      
            // call on request changes state
            xhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
      
                 var response = this.responseText;
                 if(response == 1){
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
          });         
      }
  }
  function resetProgramaCapacitacion(){
    $(".input_files_programacion_capacitacion").val(null);
  }
  function resetFieldsFichaPersonal(){
  
 
    $('#txt_ficha_personal_nombres').val(""),
    $('#txt_ficha_personal_apellidos').val(""),
    $('#txt_ficha_personal_nacimiento').val(""),
    $('#txt_ficha_personal_lugar').val(""),      
    $('#select_Ficha_Personal_departamento_g').val(""),
    $('#select_Ficha_Personal_provincia_g').val(""),      
    $('#select_Ficha_Personal_distrito_g').val(""),
    $('#txt_ficha_personal_dni').val(""),
    $('#txt_ficha_personal_telefono').val(""),
    $('#txt_ficha_personal_celular').val(""),
    $('#txt_ficha_personal_domicilio').val(""),
    $('#txt_ficha_personal_ubanizacion').val(""),
    $('#txt_ficha_personal_distrito').val(""),
    $('#txt_ficha_personal_civil').val(""),
    $('#txt_ficha_personal_edad').val(""),
    $('#txt_ficha_personal_n_hijos').val(""),
    $('#txt_ficha_personal_sexo').val(""),
    $('#txt_ficha_personal_talla').val(""),   
    $('#txt_ficha_personal_contextura').val(""),
    
    $('#txt_ficha_personal_ruc').val(""),
    $('#txt_ficha_personal_essalud').val(""),
    $('#txt_ficha_personal_onp').val(""),   
    $('#txt_ficha_personal_cusspp').val(""),
    $('#txt_ficha_personal_fecha_afiliacion').val(""),
                   
    $('#txt_ficha_personal_fecha_conyuge_nombre').val(""),
    $('#txt_ficha_personal_fecha_conyuge_apellido').val(""),
    $('#txt_ficha_personal_fecha_conyuge_fecha').val(""),
    $('#txt_ficha_personal_fecha_conyuge_lugar').val(""),
    $('#txt_ficha_personal_fecha_conyuge_edad').val(""),
    $('#select_Ficha_Personal_departamento_conyuge_g').val(""),
    $('#select_Ficha_Personal_provincia_conyuge_g').val(""),
    $('#select_Ficha_Personal_distrito_conyuge_g').val(""),         
    $('#select_Ficha_Personal_dni_conyuge').val(""),
    $('#select_Ficha_Personal_ruc_conyuge').val(""),
    $('#select_Ficha_Personal_profesion_conyuge').val(""),                    
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
    $('#Ficha_Personal_antecedentes_1').val(""), 
    $('#Ficha_Personal_antecedentes_2').val(""), 
    $('#Ficha_Personal_antecedentes_3').val(""), 
    $('#Ficha_Personal_antecedentes_4').val(""), 
    $(".addFichaPersonalProfesion").remove();
    $(".addFichaPersonalReferencia").remove();
    $(".addFichaPersonalTecnica").remove();
    $(".addFichaPersonalOtrosEstudios").remove();
    $(".addFichaPersonalIdiomas").remove();
    $(".input_files_ficha_personal").val(null);
    $(".addChildren").remove();
    
  }