var rutaSQL = "pages/catalogos/uniopera/sql.php";

//=========================funciones para Dashboard============================
function appDashBoard(){
  let datos = {
    TipoQuery : 'selUniOperativas',
    uniopeID : $("#uniopeID").val()
  }
  console.log(datos);
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.length>0){
      let fila = "";
      $.each(resp,function(key, valor){
        fila += '<div class="col-lg-3 col-xs-6">';
        fila += ' <div class="small-box bg-green">';
        fila += '   <div class="inner">';
        fila += '     <h3><sup style="font-size:20px">'+(valor.codigo)+'</sup></h3>';
        fila += '     <p>'+(valor.descripcion)+'</p></div>';
        fila += '   <div class="icon"><i class="fa fa-truck"></i></div>';
        fila += '   <a href="javascript:appSubmitButton(\'arbol\','+(valor.ID)+');" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a></div></div>';
      });
      $('#div_unioperativas').html(fila);
    }
  });
}
