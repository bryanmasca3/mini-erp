//=========================funciones para boton Submit============================
function appSubmitButton(miTarea,miModulo){
  if(miTarea=="logout") { location.href = 'includes/sess_logout.php'; }
  else{
    $.ajax({
      url:'includes/app_sql.php',
      type:'POST',
      dataType:'json',
      data:{
        "appSQL":JSON.stringify({
          TipoQuery : 'route',
          page : miTarea,
          padreID : miModulo
        })},
      success: function(data){
        console.log(data);
        location.href = "interfaz.php";
      }
    });
  }
}

function appChangePage(miTarea){
 
  $.ajax({
    url:'includes/app_page.php',
    type:'POST',
    dataType:'json',
    data:{
      "appPage":JSON.stringify({
        page : miTarea
      })},
    success: function(data){
      console.log(data);
      location.href = "interfaz.php";
    }
  });
}

function appNotificacionesSetInterval(){
  $.ajax({
    url:'includes/sql_select.php',
    type:'POST',
    dataType:'json',
    data:{"appSQL":JSON.stringify({TipoQuery:'notificaciones'})},
    success: function(data){ appNotificacionesData(data); },
    complete:function(data){ setTimeout(appNotificacionesSetInterval,4000); }
  });
}

function appNotificaciones(){
  appAjaxSelect('includes/sql_select.php',{TipoQuery:'notificaciones'}).done(function(data){
    appNotificacionesData(data);
  });
}

function appNotificacionesData(resp){
  //cuenta total
  $('.NotifiCount').html(resp.cuenta);
  if(resp.cuenta>0) { $('#lblNotifiCount1').show(); } else { $('#lblNotifiCount1').hide(); }

  //detalle de datos
  if(resp.tabla.length>0){
    let appData = "";
    $.each(resp.tabla,function(key, valor){
      if(key<=4) { appData += '<li><a href="javascript:appSubmitButton(\'notificaciones\');" title="'+(valor.usr_solic)+' &raquo; '+(valor.persona)+'"><i class="fa fa-shield text-aqua"></i> '+(valor.usr_solic)+' <i class="fa fa-angle-double-right" style="width:12px;"></i>'+(valor.persona)+'</a></li>'; }
      else { return false; }
    });
    $('#appInterfazNotificaciones').html(appData);
  } else{
    $('#appInterfazNotificaciones').html("");
  }
}
