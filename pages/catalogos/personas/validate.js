function validarProgramacionCapacitacion(){

  let error=0;
  let data={
        formFile_1: $('#formFile_1').get(0).files,
        formFile_2: $('#formFile_2').get(0).files,
        formFile_3: $('#formFile_3').get(0).files,
        formFile_4: $('#formFile_4').get(0).files,
        formFile_5: $('#formFile_5').get(0).files,
        formFile_6: $('#formFile_6').get(0).files,
        formFile_7: $('#formFile_7').get(0).files,
        formFile_8: $('#formFile_8').get(0).files,
        formFile_9: $('#formFile_9').get(0).files,
        formFile_10: $('#formFile_10').get(0).files,
        formFile_11: $('#formFile_11').get(0).files        
    }
    $(".error").remove(); 

    if (data.formFile_1.length === 0) {
      $('#formFile_1').after('<span class="error">Este campo es requerido</span>');  
      error=1; 
      }
        if (data.formFile_2.length === 0) {
          $('#formFile_2').after('<span class="error">Este campo es requerido</span>');  
        error=1; 
      }
      if (data.formFile_3.length === 0) {
        $('#formFile_3').after('<span class="error">Este campo es requerido</span>');  
      error=1; 
      }
      if (data.formFile_4.length === 0) {
        $('#formFile_4').after('<span class="error">Este campo es requerido</span>');  
      error=1; 
      }
      if (data.formFile_5.length === 0) {
        $('#formFile_5').after('<span class="error">Este campo es requerido</span>');  
      error=1; 
      }
      if (data.formFile_6.length === 0) {
        $('#formFile_6').after('<span class="error">Este campo es requerido</span>');  
      error=1; 
      }
      if (data.formFile_7.length === 0) {
        $('#formFile_7').after('<span class="error">Este campo es requerido</span>');  
      error=1; 
      }
      if (data.formFile_9.length === 0) {
        $('#formFile_9').after('<span class="error">Este campo es requerido</span>');  
      error=1; 
      }
      if (data.formFile_10.length === 0) {
        $('#formFile_10').after('<span class="error">Este campo es requerido</span>');  
      error=1; 
      }
      if (data.formFile_11.length === 0) {
        $('#formFile_11').after('<span class="error">Este campo es requerido</span>');  
      error=1; 
      }


}

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
function validarFichaPersonal(){
  let error=0;
    let data={
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
          tipo: $('#check_Ficha_Personal_tipo_anio').val(),
          placa: $('#check_Ficha_Personal_tipo_placa').val(),
 

      } 
      $(".error").remove();  
      console.log(data)
      if (!data.nombres.length) {  
        $('#txt_ficha_personal_nombres').after('<span class="error">Este campo es requerido</span>');  
        error=1;  
        } 
        if (!data.apellidos.length) {  
          $('#txt_ficha_personal_apellidos').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          }        
          if (!data.lugar_nacimiento.length) {  
          $('#txt_ficha_personal_lugar').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (data.departamento=="-1") {  
          $('#select_Ficha_Personal_departamento_g').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (data.provincia=="-1") {  
            $('#select_Ficha_Personal_provincia_g').after('<span class="error">Este campo es requerido</span>');  
            error=1;  
            } 
            if (data.distrito=="-1") {  
              $('#select_Ficha_Personal_distrito_g').after('<span class="error">Este campo es requerido</span>');  
              error=1;  
              } 
          if (!data.dni.length) {  
          $('#txt_ficha_personal_dni').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.telefono.length) {  
          $('#txt_ficha_personal_telefono').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.celular.length) {  
          $('#txt_ficha_personal_celular').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.domicilio.length) {  
          $('#txt_ficha_personal_domicilio').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.urbanizacion.length) {  
          $('#txt_ficha_personal_ubanizacion').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.distrito.length) {  
          $('#txt_ficha_personal_distrito').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (data.civil=="-1") {  
          $('#txt_ficha_personal_civil').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.edad.length) {  
          $('#txt_ficha_personal_edad').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.n_hijos.length) {  
          $('#txt_ficha_personal_n_hijos').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (data.sexo=="-1") {  
          $('#txt_ficha_personal_sexo').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.talla.length) {  
            $('#txt_ficha_personal_talla').after('<span class="error">Este campo es requerido</span>');  
            error=1;  
            } 
        if (!data.contextura.length) {  
          $('#txt_ficha_personal_contextura').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 


          if (!data.ruc.length) {  
          $('#txt_ficha_personal_ruc').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.essalud.length) {  
          $('#txt_ficha_personal_essalud').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.onp.length) {  
          $('#txt_ficha_personal_onp').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.cussp.length) {  
          $('#txt_ficha_personal_cusspp').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
         

          if (!data.nombre_conyuge.length) {  
          $('#txt_ficha_personal_fecha_conyuge_nombre').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.apellido_conyuge.length) {  
          $('#txt_ficha_personal_fecha_conyuge_apellido').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.lugar_conyuge.length) {  
          $('#txt_ficha_personal_fecha_conyuge_lugar').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.edad_conyuge.length) {  
          $('#txt_ficha_personal_fecha_conyuge_edad').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (data.departamento_conyuge=="-1") {  
          $('#select_Ficha_Personal_departamento_conyuge_g').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (data.provincia_conyuge=="-1") {  
          $('#select_Ficha_Personal_provincia_conyuge_g').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (data.distrito_conyuge=="-1") {  
            $('#select_Ficha_Personal_distrito_conyuge_g').after('<span class="error">Este campo es requerido</span>');  
            error=1;  
            } 

          
          if (!data.dni_conyuge.length) {  
          $('#select_Ficha_Personal_dni_conyuge').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.ruc_conyuge.length) {  
          $('#select_Ficha_Personal_ruc_conyuge').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.profesion_conyuge.length) {  
          $('#select_Ficha_Personal_profesion_conyuge').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.ocupacion_conyuge.length) {  
          $('#select_Ficha_Personal_ocupacion_conyuge').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.centro_conyuge.length) {  
          $('#select_Ficha_Personal_centro_conyuge').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.direccion_conyuge.length) {  
          $('#select_Ficha_Personal_direccion_conyuge').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.telefono_conyuge.length) {  
          $('#select_Ficha_Personal_telefono_conyuge').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.celular_conyuge.length) {  
          $('#select_Ficha_Personal_celular_conyuge').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
        
          
          if (!data.nombre_padre.length) {  
          $('#txt_Ficha_Personal_padre_nombre').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.apellido_padre.length) {  
          $('#txt_Ficha_Personal_padre_apellido').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.centro_padre.length) {  
          $('#txt_Ficha_Personal_padre_centro').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.ocupacion_padre.length) {  
          $('#txt_Ficha_Personal_padre_ocupacion').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.direccion_padre.length) {  
          $('#txt_Ficha_Personal_padre_direccion').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if (!data.telefono_padre.length) {  
          $('#txt_Ficha_Personal_padre_telefono').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          } 
          if(!data.celular_padre.length) {  
          $('#txt_Ficha_Personal_padre_celular').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          }     
          

          if(!data.nombre_madre.length) {  
            $('#txt_Ficha_Personal_madre_nombres').after('<span class="error">Este campo es requerido</span>');  
            error=1;  
            } 
            if(!data.apellido_madre.length) {  
            $('#txt_Ficha_Personal_madre_apellidos').after('<span class="error">Este campo es requerido</span>');  
            error=1;  
            } 
            if(!data.centro_madre.length) {  
            $('#txt_Ficha_Personal_madre_centro').after('<span class="error">Este campo es requerido</span>');  
            error=1;  
            } 
            if(!data.ocupacion_madre.length) {  
            $('#txt_Ficha_Personal_madre_ocupacion').after('<span class="error">Este campo es requerido</span>');  
            error=1;  
            } 
            if(!data.direccion_madre.length) {  
            $('#txt_Ficha_Personal_madre_direccion').after('<span class="error">Este campo es requerido</span>');  
            error=1;  
            } 
            if(!data.telefono_madre.length) {  
            $('#txt_Ficha_Personal_madre_telefono').after('<span class="error">Este campo es requerido</span>');  
            error=1;  
            } 
            if(!data.celular_madre.length) {  
            $('#txt_Ficha_Personal_madre_celular').after('<span class="error">Este campo es requerido</span>');  
            error=1;  
            }   


          if(!data.nombre_referencia.length) {  
          $('#txt_Ficha_Personal_referencia_nombre').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          }   

          if(!data.apellido_referencia.length) {  
          $('#txt_Ficha_Personal_referencia_apellido').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          }   

        if(!data.parentesco_referencia.length) {  
        $('#txt_Ficha_Personal_referencia_parentesco').after('<span class="error">Este campo es requerido</span>');  
        error=1;  
        }   

        if(!data.telefono_referencia.length) {  
        $('#txt_Ficha_Personal_referencia_telefono').after('<span class="error">Este campo es requerido</span>');  
        error=1;  
        }   
      

          if(!data.licencia.length) {  
          $('#check_Ficha_Personal_licencia').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          }  
          if(!data.vehiculo.length) {  
          $('#check_Ficha_Personal_tipo_vehiculo').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          }  
          if (!data.marca.length) {  
          $('#check_Ficha_Personal_tipo_marca').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          }  
          if(!data.tipo.length) {  
          $('#check_Ficha_Personal_tipo_anio').after('<span class="error">Este campo es requerido</span>');  
          error=1;  
          }  
          if(!data.placa.length) {  
          $('#check_Ficha_Personal_tipo_placa').after('<span class="error">Este campo es requerido</span>');  
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