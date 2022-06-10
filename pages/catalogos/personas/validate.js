function validarcamposNuevoReferenciaLaboral(){
  let error=0;
  let data={
        nombresCandidato: $('#txt_referencia_laboral_candidato_nombres').val(),
        apellidosCandidato: $('#txt_referencia_laboral_candidato_apellidos').val(),
        nombresReferente: $('#txt_referencia_laboral_referente_nombres').val(),
        apellidosReferente:$('#txt_referencia_laboral_referente_apellidos').val(),
        
        telefonoReferente: $('#txt_referencia_laboral_referente_telefono').val(),
        cargoReferente: $('#txt_referencia_laboral_referente_cargo').val(),      
        empresaReferente: $('#txt_referencia_laboral_referente_empresa').val(),
        
        criterio1:$("#ReferenciaLaboralPreguntasCriterio_1").val(),
        criterio2:$("#ReferenciaLaboralPreguntasCriterio_2").val(),
        criterio3:$("#ReferenciaLaboralPreguntasCriterio_3").val(),
        criterio4:$("#ReferenciaLaboralPreguntasCriterio_4").val(),
        criterio5:$("#ReferenciaLaboralPreguntasCriterio_5").val(),
        criterio6:$("#ReferenciaLaboralPreguntasCriterio_6").val(),
        criterio7:$("#ReferenciaLaboralPreguntasCriterio_7").val(),
        criterio8:$("#ReferenciaLaboralPreguntasCriterio_8").val(),
        criterio9:$("#ReferenciaLaboralPreguntasCriterio_9").val(),
        criterio10:$("#ReferenciaLaboralPreguntasCriterio_10").val(),
        checkList1 :$(".check_referencia_laboral_recomendaciones:radio:checked"),
        
    }
  $(".error").remove();  
  if(!data.nombresCandidato.length){
    $('#txt_referencia_laboral_candidato_nombres').after('<span class="error">Este campo es requerido</span>');  
    error=1;  
  }  
  if(!data.apellidosCandidato.length){
    $('#txt_referencia_laboral_candidato_apellidos').after('<span class="error">Este campo es requerido</span>');  
    error=1;  
  }  
  if(!data.nombresReferente.length){
    $('#txt_referencia_laboral_referente_nombres').after('<span class="error">Este campo es requerido</span>');  
    error=1;  
  }  
  if(!data.apellidosReferente.length){
    $('#txt_referencia_laboral_referente_apellidos').after('<span class="error">Este campo es requerido</span>');  
    error=1;  
  }  
  if(!data.telefonoReferente.length){
    $('#txt_referencia_laboral_referente_telefono').after('<span class="error">Este campo es requerido</span>');  
    error=1;  
  }  
  if(data.cargoReferente=="-1"){
    $('#txt_referencia_laboral_referente_cargo').after('<span class="error">Este campo es requerido</span>');  
    error=1;  
  }  
  if(!data.empresaReferente.length){
    $('#txt_referencia_laboral_referente_empresa').after('<span class="error">Este campo es requerido</span>');  
    error=1;  
  }  


  if(!data.criterio1.length){
    $('#ReferenciaLaboralPreguntasCriterio_1').after('<span class="error">Este campo es requerido</span>');  
    error=1;  
  }
  if(!data.criterio2.length){
    $('#ReferenciaLaboralPreguntasCriterio_2').after('<span class="error">Este campo es requerido</span>');  
    error=1;  
  }
  if(!data.criterio3.length){
    $('#ReferenciaLaboralPreguntasCriterio_3').after('<span class="error">Este campo es requerido</span>');  
    error=1;  
  }
  if(!data.criterio4.length){
    $('#ReferenciaLaboralPreguntasCriterio_4').after('<span class="error">Este campo es requerido</span>');  
    error=1;  
  }
  if(!data.criterio5.length){
    $('#ReferenciaLaboralPreguntasCriterio_5').after('<span class="error">Este campo es requerido</span>');  
    error=1;  
  }
  if(!data.criterio6.length){
    $('#ReferenciaLaboralPreguntasCriterio_6').after('<span class="error">Este campo es requerido</span>');  
    error=1;  
  }
  if(!data.criterio7.length){
    $('#ReferenciaLaboralPreguntasCriterio_7').after('<span class="error">Este campo es requerido</span>');  
    error=1;  
  }
  if(!data.criterio8.length){
    $('#ReferenciaLaboralPreguntasCriterio_8').after('<span class="error">Este campo es requerido</span>');  
    error=1;  
  }
  if(!data.criterio9.length){
    $('#ReferenciaLaboralPreguntasCriterio_9').after('<span class="error">Este campo es requerido</span>');  
    error=1;  
  }
  if(!data.criterio10.length){
    $('#ReferenciaLaboralPreguntasCriterio_10').after('<span class="error">Este campo es requerido</span>');  
    error=1;  
  }
  if (data.checkList1.length<1) {  
    $('#ReferenciaLaboralPreguntasCriterioRecomienda').after('<span class="error">Los campos son requeridos</span>');  
    error=1;
  }  
  return error;
}
function validarcamposNuevoRegistroEntrevista(){
    let error=0;
    let data={
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
   
          checkList1 :$(".check_gestion_entrevista:radio:checked"),
          checkList2 :$(".check_otros_entrevistas:radio:checked"),
      }   
      $(".error").remove();  
      if (!data.nombres.length) {  
          $('#txt_entrevistas_nombres').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          }  
        if (!data.apellidos.length) {  
        $('#txt_entrevistas_apellidos').after('<span class="error">Este campo es requerido</span>');  
        error=1;

        }  
        if (!data.puesto.length) {  
            $('#txt_entrevistas_puesto').after('<span class="error">Este campo es requerido</span>');  
            error=1;
    
            } 
        if (!data.dni.length) {  
        $('#txt_entrevistas_dni').after('<span class="error">Este campo es requerido</span>');  
        error=1;
        }  
        if (!data.edad.length) {  
            $('#txt_entrevistas_edad').after('<span class="error">Este campo es requerido</span>');  
            error=1;
            }  
        
      if (data.civil=="-1") {  
        $('#txt_entrevistas_civil').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }     

      if (!data.correo.length) {  
          $('#txt_entrevistas_correo').after('<span class="error">Este campo es requerido</span>');  
          error=1;
          }  
      if (!data.telefono.length) {  
        $('#txt_entrevistas_telefono').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  
      if (!data.pretenciones.length) {  
        $('#txt_entrevistas_pretenciones').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  
      if (data.checkList1.length<3) {  
        $('#sistemaGestionEnbtrevista').after('<span class="error">Los campos son requeridos</span>');  
        error=1;
      }  
      if (data.checkList2.length<3) {  
        $('#sistemaGestionEnbtrevistaOtros').after('<span class="error">Los campos son requeridos</span>');  
        error=1;
      }  
      return error;
}
function validarcamposNuevoRegistroPersonas(){
    
    let error=0;
      let data={
          id: $('#idsolicitanteHidden').val(),
          cargo: $('#txt_cargo_personas').val(),
          vacante: $('#txt_n_vacantes_personas').val(),

          area: $('#personas_select_area').val(),
          contrato: $('#personas_select_contrato').val(),      
          motivo: $('#personas_select_motivo').val(),

          lugar: $('#personas_select_lugar').val(),
          duracion: $('#personas_select_duracion').val(),
          fecha: $('#txt_fecha_g_personas').val(),

          remuneracion: $('#personas_remuneracion').val(),
       
      }   
      $(".error").remove();  
      if (!data.id.length) {  
          $('#idsolicitanteHidden').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          }  
        if (!data.cargo.length) {  
        $('#txt_cargo_personas').after('<span class="error">Este campo es requerido</span>');  
        error=1;

        }  
        if (!data.vacante.length) {  
        $('#txt_n_vacantes_personas').after('<span class="error">Este campo es requerido</span>');  
        error=1;

        }  
      if (data.area=="-1") {  
        $('#personas_select_area').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  
      if (data.contrato=="-1") {  
        $('#personas_select_contrato').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  
      if (data.motivo=="-1") {  
          $('#personas_select_motivo').after('<span class="error">Este campo es requerido</span>');  
          error=1;
          }  

      if (data.lugar=="-1") {  
        $('#personas_select_lugar').after('<span class="error">Este campo es requerido</span>'); 
        error=1; 
      }  


      if (!data.duracion.length) {  
          $('#personas_select_duracion').after('<span class="error">Este campo es requerido</span>');  
          error=1;
          }  
      if (!data.remuneracion.length) {  
        $('#personas_remuneracion').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  
    
      return error;
    }