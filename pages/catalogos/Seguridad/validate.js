function validatecamposAsistance(){
  let error=0;
  let data={
      id: $('#idAsistenciaHidden').val(),
      capacitacion: $('#asistencia_capacitacion').val()
  }
  $(".error").remove(); 
  if (!data.id.length) {  
    $('#idAsistenciaHidden').after('<span class="error">Este campo es requerido</span>');  
    error=1;
    }  
  if (data.capacitacion=="-1") {  
    $('#asistencia_capacitacion').after('<span class="error">Este campo es requerido</span>');  
    error=1;
  }  
  return error;
}
function validatecamposchecklistcisterna(){

  let error=0;
  let data={
      id: $('#txt01_conductor_cisterna_id').val(),
    
      lc:$('#txt01_conductor_cisterna_LC').val(),
      capacidad: $('#txt01_conductor_cisterna_capacidad').val(),

      fecha: $('#txt01_conductor_cisterna_fecha').val(),
      hora: $('#txt01_conductor_cisterna_hora').val(),
      placa: $('#txt01_conductor_cisterna_placas').val(),

      km_tracto: $('#txt01_conductor_cisterna_km_tracto').val(),
      km_cisterna: $('#txt01_conductor_cisterna_km_cisterna').val(),     
      actividad: $('#txt01_conductor_cisterna_actividad').val(),

      km_inicial: $('#txt01_conductor_km_inicial').val(),
      km_hora_ini: $('#txt01_conductor_hora_ini').val(),     
      km_inicial_2: $('#txt01_conductor_km_inicial_2').val(),
      km_hora_ini_2: $('#txt01_conductor_hora_ini_2').val(),

      checkList1 :$(".checkList2_declaracion_jurada:radio:checked"),
      checkList2 :$(".checkList2_luces:radio:checked"),
      checkList3 :$(".checkList2_documentos:radio:checked"),
      checkList4 :$(".checkList2_general:radio:checked"),
      checkList5 :$(".checkList2_neumaticos:radio:checked"),
      checkList6 :$(".checkList2_motor:radio:checked"),
      checkList7 :$(".checkList2_seguridad:radio:checked"),      
      checkList8 :$(".checkList2_sistema_recarga:radio:checked"),  
      
      firma_conductor: $('#txt_firma_conductor_citerna').val(),
      firma_supervisor: $('#txt_firma_supervisor_citerna').val(),
  }
  $(".error").remove();  
  if (!data.id.length) {  
      $('#txt01_conductor_cisterna_id').after('<span class="error">Este campo es requerido</span>');  
      error=1;
      }  
      if (!data.lc.length) {  
        $('#txt01_conductor_cisterna_LC').after('<span class="error">Este campo es requerido</span>');  
        error=1;
        }  
        if (!data.capacidad.length) {  
          $('#txt01_conductor_cisterna_capacidad').after('<span class="error">Este campo es requerido</span>');  
          error=1;
          }  
        
      if (!data.hora.length) {  
        $('#txt01_conductor_cisterna_hora').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  
      if (!data.placa.length) {  
        $('#txt01_conductor_cisterna_placas').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  
      if (!data.km_tracto.length) {  
        $('#txt01_conductor_cisterna_km_tracto').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  

      if (!data.km_cisterna.length) {  
        $('#txt01_conductor_cisterna_km_cisterna').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  
      if (!data.actividad.length) {  
        $('#txt01_conductor_cisterna_actividad').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  
      if (!data.km_inicial.length) {  
        $('#txt01_conductor_km_inicial').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  
      if (!data.km_hora_ini.length) {  
        $('#txt01_conductor_hora_ini').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  
      if (!data.km_inicial_2.length) {  
        $('#txt01_conductor_km_inicial_2').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  
      if (!data.km_hora_ini_2.length) {  
        $('#txt01_conductor_hora_ini_2').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  
      if (!data.firma_conductor.length) {  
        $('#txt_firma_conductor_citerna').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }   
      if (!data.firma_supervisor.length) {  
        $('#txt_firma_supervisor_citerna').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  





      if (data.checkList1.length<5) {  
        $('#declaracion_jurada_cisterna').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
        error=1;
      }  
      if (data.checkList2.length<14) {  
        $('#cisterna_luces_table').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
        error=1;
      }  
      if (data.checkList3.length<18) {  
        $('#cisterna_documentos_table').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
        error=1;
      }  
      if (data.checkList4.length<17) {  
        $('#cisterna_general_table').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
        error=1;
      }  
      if (data.checkList5.length<5) {  
        $('#cisterna_neumaticos_table').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
        error=1;
      }  
      if (data.checkList6.length<9) {  
        $('#cisterna_motor_table').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
        error=1;
      }  
      if (data.checkList7.length<27) {  
        $('#cisterna_seguridad_table').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
        error=1;
      }  

      if (data.checkList8.length<9) {  
        $('#cisterna_sistema_recarga_table').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
        error=1;
      }  
  return error;


}
function validatecamposchecklistcamioneta(){

  let error=0;
  let data={
      id: $('#txt01_camioneta_conductor_id').val(),
      fecha: $('#txt01_camioneta_fecha').val(),
      hora: $('#txt01_camioneta_hora').val(),
      placa: $('#seguridad_placa_camioneta').val(),
      inicial: $('#txt01_camioneta_km_inicial').val(),
      final: $('#txt01_camioneta_km_final').val(),
      actividad: $('#txt01_camioneta_km_actividad').val(),
      checkList1 :$(".checkList_declaracion_jurada:radio:checked"),
      checkList2 :$(".checkList_category_luces:radio:checked"),
      checkList3 :$(".checkList_category_documentos:radio:checked"),
      checkList4 :$(".checkList_category_general:radio:checked"),
      checkList5 :$(".checkList_category_neumatico:radio:checked"),
      checkList6 :$(".checkList_category_motor:radio:checked"),
      checkList7 :$(".checkList_category_seguridad:radio:checked"),      
  }
  $(".error").remove();  
  if (!data.id.length) {  
      $('#txt01_camioneta_conductor_id').after('<span class="error">Este campo es requerido</span>');  
      error=1;
      }  
      if (!data.fecha.length) {  
        $('#txt01_camioneta_fecha').after('<span class="error">Este campo es requerido</span>');  
        error=1;
        }  
        if (!data.hora.length) {  
          $('#txt01_camioneta_hora').after('<span class="error">Este campo es requerido</span>');  
          error=1;
          }  
     if (data.placa=="-1") {  
        $('#seguridad_placa_camioneta').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  
      if (!data.inicial.length) {  
        $('#txt01_camioneta_km_inicial').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  
      if (!data.final.length) {  
        $('#txt01_camioneta_km_final').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  
      if (!data.actividad.length) {  
        $('#txt01_camioneta_km_actividad').after('<span class="error">Este campo es requerido</span>');  
        error=1;
      }  
      if (data.checkList1.length<5) {  
        $('#declaracion_jurada_camioneta').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
        error=1;
      }  
      if (data.checkList2.length<9) {  
        $('#camioneta_luces').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
        error=1;
      }  
      if (data.checkList3.length<8) {  
        $('#camioneta_documentos').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
        error=1;
      }  
      if (data.checkList4.length<12) {  
        $('#camioneta_general').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
        error=1;
      }  
      if (data.checkList5.length<4) {  
        $('#camioneta_neumaticos').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
        error=1;
      }  
      if (data.checkList6.length<9) {  
        $('#camioneta_motor').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
        error=1;
      }  
      if (data.checkList7.length<17) {  
        $('#camioneta_seguridad').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
        error=1;
      }  
  return error;


}
function validarcamposPernocte(){

  let error=0;
  let data={
      dni: $('#txt_uspervisor_search').val(),
      proyecto: $('#txt_proyecto').val(),
      lugar: $('#txt_lugar_pernocte').val()
  }
  $(".error").remove();  
  if (!data.dni.length) {  
      $('#txt_uspervisor_search').after('<span class="error">Este campo es requerido</span>');  
      error=1;
      }  
  if (!data.proyecto.length) {  
      $('#txt_proyecto').after('<span class="error">Este campo es requerido</span>');  
      error=1;
      }  
  if (!data.lugar.length) {  
    $('#txt_lugar_pernocte').after('<span class="error">Este campo es requerido</span>'); 
    error=1; 
  }  
  return error;
}

function validarcamposSintomatologia(){
  let error=0;
  let data={
      id: $('#txtOperadorSearchSintomatologia').val(),
      sec1:$(".check_sintomatologia:radio:checked"),
  }
  console.log(data)
  $(".error").remove();  
  if (!data.id.length) {  
      $('#txt_search_operador_sintomatologia').after('<span class="error">Este campo es requerido</span>');  
      error=1;

      }  
  if (data.sec1.length<7) {  
        $('#grd09Datos').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
        error=1;
      }
  return error;
}
function validarcamposNuevoRegistro(){
    
  let error=0;
    let data={
        tema: $('#txt_tema').val(),
        tipo: $('#seguridad_tipo_registro_select').val(),
        area: $('#seguridad_area_select').val(),
        expositor: $('#txt_expositor').val(),
        empresa: $('#txt_expositor_empresa').val(),      
        hora_ini: $('#txt_hora_inicio').val(),
        hora_final: $('#txt_hora_final').val(),
        hora_total: $('#txt_hora_total').val(),
        objetivos: $('#txt_objetivos').val(),
        materiales: $('#txt_materiales').val(),
        lugar: $('#txt_lugar').val()
    }
    console.log(data)
    $(".error").remove();  
    if (!data.tema.length) {  
        $('#txt_tema').after('<span class="error">Este campo es requerido</span>');  
        error=1;

        }  
    if (data.tipo=="-1") {  
      $('#seguridad_tipo_registro_select').after('<span class="error">Este campo es requerido</span>');  
      error=1;
    }  
    if (data.area=="-1") {  
      $('#seguridad_area_select').after('<span class="error">Este campo es requerido</span>');  
      error=1;
    }  
    if (!data.expositor.length) {  
        $('#txt_expositor').after('<span class="error">Este campo es requerido</span>');  
        error=1;
        }  
    if (!data.empresa.length) {  
      $('#txt_expositor_empresa').after('<span class="error">Este campo es requerido</span>'); 
      error=1; 
    }  
    if (!data.hora_ini.length) {  
        $('#txt_hora_inicio').after('<span class="error">Este campo es requerido</span>');  
        error=1;
        }  
    if (!data.hora_final.length) {  
      $('#txt_hora_final').after('<span class="error">Este campo es requerido</span>');  
      error=1;
    }  
    if (!data.hora_total.length) {  
      $('#txt_hora_total').after('<span class="error">Este campo es requerido</span>');  
      error=1;
    }  
    if (!data.objetivos.length) {  
        $('#txt_objetivos').after('<span class="error">Este campo es requerido</span>'); 
        error=1; 
        }  
    if (!data.materiales.length) {  
      $('#txt_materiales').after('<span class="error">Este campo es requerido</span>'); 
      error=1; 
    }  
    if (!data.lugar.length) {  
      $('#txt_lugar').after('<span class="error">Este campo es requerido</span>');  
      error=1;
    }   
    return error;
  }
  
function validarcamposNuevoControl(){
 
  let error=0;
  let data={
      operador: $('#txt_view_operador').val(),
      evaluador: $('#txt_view_evaluador').val(),
      proyecto: $('#txt01_proyecto_somnolencia').val(),
      horas_ultimo: $('#txt01_horas_ultimo_sue').val(),
      horas_durmio: $('#txt01_horas_durmio').val(),
      sec1:$(".check_Section_1:radio:checked"),
      sec2:$(".check_Section_2:radio:checked"),
      conclusion:$("#txt01_control_somnolencia_conclusion").val(),
      firma_operador:$("#txt01_control_somnolencia_firma_operador").val(),
      firma_evaluador:$("#txt01_control_somnolencia_firma_evaluador").val()
  }
  $(".error").remove();  
  if (!data.operador.length) {  
      $('#txt_view_operador').after('<span class="error">Este campo es requerido</span>');  
      error=1;

      }  
  if (!data.evaluador.length) {  
      $('#txt_view_evaluador').after('<span class="error">Este campo es requerido</span>');  
      error=1;
      }  
  if (!data.proyecto.length) {  
    $('#txt01_proyecto_somnolencia').after('<span class="error">Este campo es requerido</span>'); 
    error=1; 
  }  
  if (!data.horas_ultimo.length) {  
    $('#txt01_horas_ultimo_sue').after('<span class="error">Este campo es requerido</span>'); 
    error=1; 
  }     
  if (!data.horas_durmio.length) {  
      $('#txt01_horas_durmio').after('<span class="error">Este campo es requerido</span>');  
      error=1;
      }  
  if (data.sec1.length<10) {  
    $('#grd04Datos').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
    error=1;
  }  
  if (data.sec2.length<10) {  
    $('#grd05Datos').after('<span class="error">Los campos  SI / NO son requeridos</span>');  
    error=1;
  }
  if(!data.conclusion.length){
    $('#txt01_control_somnolencia_conclusion').after('<span class="error">Este campo es requerido</span>');  
    error=1;
  }  
  if(!data.firma_operador.length){
    $('#txt01_control_somnolencia_firma_operador').after('<span class="error">Este campo es requerido</span>');  
    error=1;
  }  
  if(!data.firma_evaluador.length){
    $('#txt01_control_somnolencia_firma_evaluador').after('<span class="error">Este campo es requerido</span>');  
    error=1;
  }  
  return error;
}