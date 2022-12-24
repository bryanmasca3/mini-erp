function validarcamposAddOdometro(){
    
  let error=0;
  let data={ 
        fecha: $('#txt_odo_add_fecha').val(),
        hora: $('#txt_odo_add_hora').val(),
        odometro: $('#txt_odo_add_odometro').val()        
    }
    $(".error").remove(); 
    if(!data.fecha.length){
      $('#txt_odo_add_fecha').after('<span class="error">Este campo es requerido</span>');  
      error=1; 
    }
    if(!data.hora.length){
      $('#txt_odo_add_hora').after('<span class="error">Este campo es requerido</span>');  
      error=1; 
    }
    if (!data.odometro.length) {
      $('#txt_odo_add_odometro').after('<span class="error">Este campo es requerido</span>');  
      error=1; 
      }
       return error;
}