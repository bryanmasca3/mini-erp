var rutaSQL = "pages/catalogos/mantenimiento/sql.php";
let vehicleGlobal="";
let encargadoGlobal=1;


/*function change_path_section(){
console.log("sssssssssssssss")
//  $("#site_path_section").text(title)
}*/
function app06Boton_visual(){
  $("#chart").empty();


 // var fecha = $("#cbo06_fecha").val();
  var anio = $("#txt06_anio").val();
  var mes = $("#cbo06_meses").val();
  //var semana = $("#cbo06_semanas").val();
  var flota = $("#cbo06_Contenidos").val();
  var equipo = $("#cbo06_Equipos").val();
  console.log(equipo)

  if(flota==="-1"){
    alert("Seleccione una flota!!");
    return;
  }
  if($.trim(anio) === ''){
    alert("Ingrese año!!");
    return;
  }
  
  //grafica 01
  var options = {
    series: [],
    chart: {
    height: 300,
    type: 'rangeBar',
    locales: [{
      name: 'en',
      options: {
        months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        shortMonths: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Set', 'Oct', 'Nov', 'Dic'],
        days: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
        shortDays: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        toolbar: {
          download: 'Descargar SVG',
          selection: 'Seleccionar',
          selectionZoom: 'Seleccionar Zoom',
          zoomIn: 'Aumentar',
          zoomOut: 'Disminuir',
          pan: 'Mover',
          reset: 'Reiniciar Zoom',
        }
      }
    }]
  },
  plotOptions: {
    bar: {
      horizontal: true,
      barHeight: '80%',
      rangeBarGroupRows: true
    }
  },
  xaxis: {
    type: 'datetime',
    labels: {
      datetimeFormatter: {
        year: 'yyyy',
        month: 'MMM \'yyyy',
        day: 'dd MMM',
        hour: 'hh:mm tt',
        minute:'hh:mm tt',
        second:'hh:mm tt'
      }
    }
    
    /* labels: {
      formatter: function (value, timestamp) {
          //return moment(timestamp, "hh:mm");
          return moment(value).format("DD MMM");
      },
  } */
  },
  stroke: {
    width: 1
  },
  fill: {
    type: 'solid',
    opacity: 0.6
  },
  legend: {
    position: 'top',
    horizontalAlign: 'left'
  },
  noData: {
    text: 'Loading...'
  },
  grid: {
    show: true,
    borderColor: '#90A4AE',
    strokeDashArray: 0,
    position: 'back',
    xaxis: {
        lines: {
            show: true
        }
    },   
    yaxis: {
        lines: {
            show: true
        }
    },  
    row: {
        colors: undefined,
        opacity: 0.5
    },  
    column: {
        colors: undefined,
        opacity: 0.5
    },  
    padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
    },  
},
  tooltip: {
    custom: function({series, seriesIndex, dataPointIndex, w}) {
      var data = w.globals.initialSeries[seriesIndex].data[dataPointIndex];
      var hini = new Date(data.fecha+" "+data.hora_ini).getTime();
      var hfin = new Date(data.fecha+" "+data.hora_fin).getTime();
      var dur = hfin-hini;
      console.log("duración:"+dur);
      dur = msToTime(dur);
      moment.locale('es');
      return '<div style="padding:6px;font-size: 12px;">'+
      '<ul class="list-unstyled">' +
      '<li><b>Equipo</b>: ' + data.x + '</li>' +
      '<li><b>Fecha</b>: ' + moment(data.fecha, "YYYY-MM-DD").format("LL") + '</li>' +
      '<li><b>Hora ini</b>: ' + moment(data.hora_ini, "HH:mm:ss").format("h:mm a") + '</li>' +
      '<li><b>Hora fin</b>: ' +moment(data.hora_fin, "HH:mm:ss.sss").format("h:mm a") + '</li>' +
      '<li><b>Duración</b>: ' +moment(dur, "h:m").format("HH:mm") +" hrs"+ '</li>' +
      '<li><b>Estado</b>: ' + data.estado + '</li>' +     
      '<li><b>descripcion</b>: ' + data.descripcion + '</li>' +
      '</ul>'+
      '</div>';

    }
  }
  };

  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();

  //fin



  

  let datos;
  var equipos=[];
  var solicitudes=[];
  let resultados=[];
  var $option = $("#cbo06_Contenidos").find('option:selected');
  var value = $option.val(); 
  //todos meses, todos equipos
if(mes==="-1" && equipo==="-1"){

  datos = {
    TipoQuery : "07_getEquipos",
    contenido: value
  }

  //todos los equipos de la flota seleccionada
  appAjaxQuery(datos,rutaSQL).done(function(resp){
 
    equipos=resp;
  
  

  console.log("flota:"+flota);
  console.log("anio:"+anio);
  datos = {
    TipoQuery : "06_getAll",
    anio: anio,
    estado: 18
  }

  //todas las solicitudes
  appAjaxQuery(datos,rutaSQL).done(function(resp){

      
    solicitudes=resp;

    console.log(equipos);
    console.log(solicitudes);

    for (sol of solicitudes) {

      for(equi of equipos.tabla){
        
        if(equi.codigo === sol.x){
          resultados.push(sol);
          
        }
      }
        
    }
    console.log(resultados);

    var corr=[], prev=[], pred=[],overhall=[];
    //var gmt = new Date("05:00:00");
    //console.log("gmt:"+gmt.getTime());
    for (elem of resultados) {
      
      console.log("tipo: "+elem.tipOT);
      //console.log("y0:"+elem.y[0]);
      //console.log("y1:"+elem.y[1]);
      var dateini = new Date(elem.y[0]);
      var datefin = new Date(elem.y[1]);
      
      //console.log(dateini);
      //console.log(datefin);
      var millini = dateini.getTime()-18000000;
      var millfin = datefin.getTime()-18000000;
      //console.log(millini);
      //console.log(millfin);
      elem.y[0]=millini;
      elem.y[1]=millfin;

      if(elem.tipOT === "CORRECTIVO"){
        corr.push(elem);
      }else if(elem.tipOT === "PREVENTIVO"){
        prev.push(elem);
      }else if(elem.tipOT === "OVERHALL"){
        prev.push(elem);
      }
      else{
        pred.push(elem);
      }
      
    }

 
  
    chart.updateSeries([
      {
        name: 'CORRECTIVO',
        data: corr
      },
      {
        name: 'PREVENTIVO',
        data: prev
      },
      {
        name: 'PREDICTIVO',
        data: pred
      }
      ,
      {
        name: 'OVERHALL',
        data: overhall
      }
    ]);
      
  });

});
  return;
}

//todos meses, un equipo
if(mes==="-1" && equipo!="-1"){

  datos = {
    TipoQuery : "06_getEquiSolicitud",
    anio: anio,
    estado: 18,
    equipo: equipo
  }

   //todas las solicitudes
   appAjaxQuery(datos,rutaSQL).done(function(resp){

      
    resultados=resp;
    console.log(resultados);

    var corr=[], prev=[], pred=[],overhall=[];;

    for (elem of resultados) {
      
      console.log("tipo: "+elem.tipOT);
      //console.log("y0:"+elem.y[0]);
      //console.log("y1:"+elem.y[1]);
      var dateini = new Date(elem.y[0]);
      var datefin = new Date(elem.y[1]);
      var millini = dateini.getTime()-18000000;
      var millfin = datefin.getTime()-18000000;
      elem.y[0]=millini;
      elem.y[1]=millfin;

      if(elem.tipOT === "CORRECTIVO"){
        corr.push(elem);
      }else if(elem.tipOT === "PREVENTIVO"){
        prev.push(elem);
      }else if(elem.tipOT === "OVERHALL"){
        prev.push(elem);
      }
      else{
        pred.push(elem);
      }
      
    }

    console.log(corr);
    console.log(prev);
    console.log(pred);

    
    chart.updateSeries([
      {
        name: 'CORRECTIVO',
        data: corr
      },
      {
        name: 'PREVENTIVO',
        data: prev
      },
      {
        name: 'PREDICTIVO',
        data: pred
      },
      {
        name: 'OVERHALL',
        data: overhall
      }
    ]);
    
   });
return;
}

//un mes, todos equipos
if(mes!="-1" && equipo==="-1"){

  datos = {
    TipoQuery : "07_getEquipos",
    contenido: value
  }

  //todos los equipos de la flota seleccionada
  appAjaxQuery(datos,rutaSQL).done(function(resp){
 
    equipos=resp;
  
  });

  console.log("flota:"+flota);
  console.log("anio:"+anio);
  datos = {
    TipoQuery : "06_getAll_mes",
    anio: anio,
    estado: 18,
    mes: mes
  }

  //todas las solicitudes
  appAjaxQuery(datos,rutaSQL).done(function(resp){

    solicitudes=resp;

    console.log(equipos);
    console.log(solicitudes);

    for (sol of solicitudes) {

      for(equi of equipos.tabla){
        
        if(equi.codigo === sol.x){
          resultados.push(sol);
          
        }
      }
        
    }
    console.log(resultados);

    var corr=[], prev=[], pred=[],overhall=[];;

    for (elem of resultados) {
      
      console.log("tipo: "+elem.tipOT);
      //console.log("y0:"+elem.y[0]);
      //console.log("y1:"+elem.y[1]);
      var dateini = new Date(elem.y[0]);
      var datefin = new Date(elem.y[1]);
      var millini = dateini.getTime()-18000000;
      var millfin = datefin.getTime()-18000000;
      elem.y[0]=millini;
      elem.y[1]=millfin;

      if(elem.tipOT === "CORRECTIVO"){
        corr.push(elem);
      }else if(elem.tipOT === "PREVENTIVO"){
        prev.push(elem);
      }else if(elem.tipOT === "OVERHALL"){
        prev.push(elem);
      }
      else{
        pred.push(elem);
      }

      
    }

    console.log(corr);
    console.log(prev);
    console.log(pred);

    
    chart.updateSeries([
      {
        name: 'CORRECTIVO',
        data: corr
      },
      {
        name: 'PREVENTIVO',
        data: prev
      },
      {
        name: 'PREDICTIVO',
        data: pred
      }
      ,
           {
             name: 'OVERHALL',
             data: overhall
           }
    ]);


  });
  return;

}

//un mes, un equipo
if(mes!="-1" && equipo!="-1"){

  datos = {
    TipoQuery : "06_getEquiSolicitudMes",
    anio: anio,
    estado: 18,
    equipo: equipo,
    mes: mes
  }

  //todas las solicitudes
  appAjaxQuery(datos,rutaSQL).done(function(resp){

    resultados=resp;
    console.log(resultados);

    var corr=[], prev=[], pred=[];

    for (elem of resultados) {
      
      console.log("tipo: "+elem.tipOT);
      //console.log("y0:"+elem.y[0]);
      //console.log("y1:"+elem.y[1]);
      var dateini = new Date(elem.y[0]);
      var datefin = new Date(elem.y[1]);
      var millini = dateini.getTime()-18000000;
      var millfin = datefin.getTime()-18000000;
      elem.y[0]=millini;
      elem.y[1]=millfin;

      if(elem.tipOT === "CORRECTIVO"){
        corr.push(elem);
      }else if(elem.tipOT === "PREVENTIVO"){
        prev.push(elem);
      }else{
        pred.push(elem);
      }
      
    }

    console.log(corr);
    console.log(prev);
    console.log(pred);

    
    chart.updateSeries([
      {
        name: 'CORRECTIVO',
        data: corr
      },
      {
        name: 'PREVENTIVO',
        data: prev
      },
      {
        name: 'PREDICTIVO',
        data: pred
      }
    ]);
    
   });
  return;
}

  
}



function app06Boton_indicador(){


  var flota = $("#cbo07_Contenidos").val();
  var anio = $("#txt07_anio").val();
  var mes = $("#cbo07_meses").val();
  var equipo = $("#cbo07_Equipos").val();
  
  //grafica 01
  var options = {
    series: [ 
  ],
    chart: {
    height: 350,
    type: 'line',
    dropShadow: {
      enabled: true,
      color: '#000',
      top: 18,
      left: 7,
      blur: 10,
      opacity: 0.2
    },
    toolbar: {
      show: false
    }
  },
  colors: ['#F44336', '#545454'],
  
  dataLabels: {
    enabled: true,
  },
  stroke: {
    curve: 'smooth'
  },
  noData: {
    text: 'Loading...'
  },
  /* title: {
    text: 'Average High & Low Temperature',
    align: 'left'
  }, */
  grid: {
    borderColor: '#e7e7e7',
    row: {
      colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.5
    },
  },
  markers: {
    size: 1
  },
  xaxis: {
    categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul','Ago','Set','Oct','Nov','Dic']/* ,
    title: {
      text: 'Meses'
    } */
  },
  yaxis: {
    /* title: {
      text: 'Disponibilidad'
    }, */
    min: 0,
    max: 100
  },
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    floating: true,
    offsetY: -25,
    offsetX: -5
  }
  };
  
  var chart = new ApexCharts(document.querySelector("#chart_indicador"), options);
  chart.render();
  //fin
  
  //grafica 02
  var options = {
    series: [],
    chart: {
    type: 'bar',
    height: 350
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '40%',
      endingShape: 'rounded'
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
  },
  xaxis: {
    categories: [anio],
  },
  yaxis: {
    /* title: {
      text: '$ (thousands)'
    } */
  },
  noData: {
    text: 'Loading...'
  },
  fill: {
    opacity: 1,
    colors: ['#F44336', '#E91E63', '#9C27B0']
  }/* ,
  tooltip: {
    y: {
      formatter: function (val) {
        return "$ " + val + " thousands"
      }
    }
  } */
  };
  
  var chart_2 = new ApexCharts(document.querySelector("#chart_indicador_2"), options);
  chart_2.render();
  
  //fin
  
  //grafica 03
  var options = {
    series: [],
    chart: {
    type: 'bar',
    height: 350
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '40%',
      endingShape: 'rounded'
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
  },
  colors: ['#4db2ff', '#ffca1c'],
  xaxis: {
    categories: ['2022'],
  },
  yaxis: {
    /* title: {
      text: '$ (thousands)'
    } */
    min: 0,
    max: 720
  },
  noData: {
    text: 'Loading...'
  },
  fill: {
    opacity: 1
  },
  

  };
  
  var chart_3 = new ApexCharts(document.querySelector("#chart_tiempo_2"), options);
  chart_3.render();
  //fin
  
  //grafica 04
  
  var options = {
    series: [  
  ],
    chart: {
    height: 350,
    type: 'line',
    dropShadow: {
      enabled: true,
      color: '#000',
      top: 18,
      left: 7,
      blur: 10,
      opacity: 0.2
    },
    toolbar: {
      show: false
    }
  },
  colors: ['#4db2ff', '#ffca1c'],
  dataLabels: {
    enabled: true,
  },
  stroke: {
    curve: 'smooth'
  },
  grid: {
    borderColor: '#e7e7e7',
    row: {
      colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.5
    },
  },
  markers: {
    size: 1
  },
  xaxis: {
    categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul','Ago','Set','Oct','Nov','Dic']/* ,
    title: {
      text: 'Meses'
    } */
  },
  yaxis: {
  
    min: 0,
    max: 720
  },
  noData: {
    text: 'Loading...'
  },
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    floating: true,
    offsetY: -25,
    offsetX: -5
  }
  };
  
  var chart_4 = new ApexCharts(document.querySelector("#chart_tiempo"), options);
  chart_4.render();
  
  //fin
  
  if(flota==="-1"){
    alert("Seleccione una flota!!");
    return;
  }
  if($.trim(anio) === ''){
    alert("Ingrese año!!");
    return;
  }
  let datos;
  var equipos=[];
  var solicitudes=[];
  let resultados=[];
  console.log("mes ini:"+mes);
  console.log("Equipo ini:"+equipo);
  
  var ene=0, feb=0, mar=0, abr=0, may=0, jun=0, jul=0, ago=0, set=0, oct=0, nov=0, dic=0;
  var fene=0, ffeb=0, fmar=0, fabr=0, fmay=0, fjun=0, fjul=0, fago=0, fset=0, foct=0, fnov=0, fdic=0;
  
  var mtbfene=0, mtbffeb=0, mtbfmar=0, mtbfabr=0, mtbfmay=0, mtbfjun=0, mtbfjul=0, mtbfago=0, mtbfset=0, mtbfoct=0, mtbfnov=0, mtbfdic=0;
  var mttrene=0, mttrfeb=0, mttrmar=0, mttrabr=0, mttrmay=0, mttrjun=0, mttrjul=0, mttrago=0, mttrset=0, mttroct=0, mttrnov=0, mttrdic=0;
  var disgene=0, disgfeb=0, disgmar=0, disgabr=0, disgmay=0, disgjun=0, disgjul=0, disgago=0, disgset=0, disgoct=0, disgnov=0, disgdic=0;
  
  var dispmeses=[];
  var mtbfmeses=[];
  var mttrmeses=[];
  
  var disum;
  var disanio=[];
  
  var mtbfsum=0,mttrsum=0;
  var mtbfanio=[];
  var mttranio=[];
  
  //week
  var sem1=0, sem2=0, sem3=0, sem4=0, sem5=0;
  var fsem1=0, fsem2=0, fsem3=0, fsem4=0, fsem5=0;
  
  var mtbfsem1=0, mtbfsem2=0, mtbfsem3=0, mtbfsem4=0, mtbfsem5=0;
  var mttrsem1=0, mttrsem2=0, mttrsem3=0, mttrsem4=0, mttrsem5=0;
  var disgsem1=0, disgsem2=0, disgsem3=0, disgsem4=0, disgsem5=0;
  
  
  var dispsemanas=[];
  var mtbfsemanas=[];
  var mttrsemanas=[];
  
  var disMes=[];
  
  var mtbfmes=[];
  var mttrmes=[];
  var $option = $("#cbo07_Contenidos").find('option:selected');
  var value = $option.val(); 

  //todos meses, todos equipos
  if(mes==="-1" && equipo==="-1"){
    console.log("flota:"+flota);
   
    datos = {
      TipoQuery : "07_getEquipos",
      contenido: value
    }
  
    //todos los equipos de la flota seleccionada
    appAjaxQuery(datos,rutaSQL).done(function(resp){
   
      equipos=resp;
    
   
    datos = {
      TipoQuery : "07_getAllSolicitud",
      flota: flota,
      anio: anio,
      estado: 18
    }
    
    //todas las solicitudes
    appAjaxQuery(datos,rutaSQL).done(function(resp){
  
      
      solicitudes=resp;
      //console.log(solicitudes);
      //console.log("dasd");
      //console.log(equipos);
  
       //comparar codigo equipo del equipo/solicitud para filtar equipos del contenido seleccionado
      for (sol of solicitudes.tabla) {
  
        for(equi of equipos.tabla){
          
          if(equi.codigo === sol.flota){
            resultados.push(sol);
            
          }
        }
          
      }
      console.log(resultados);
      
      
      for (resul of resultados){
        let month= resul.mes;
        switch(month){
          case 1:
            ene+=parseInt(resul.duracion);
            console.log("phpdif:"+resul.duracion)
            console.log("dif:"+ene);
            fene++;
            break;
  
          case 2:
            feb+=parseInt(resul.duracion);
            ffeb++;
            break;
  
          case 3:
            mar+=parseInt(resul.duracion);
            fmar++;
            break;
  
          case 4:
            abr+=parseInt(resul.duracion);
            fabr++;
            break;
  
          case 5:
            may+=parseInt(resul.duracion);
            fmay++;
            break;
  
          case 6:
            jun+=parseInt(resul.duracion);
            fjun++;
            break;
  
          case 7:
            jul+=parseInt(resul.duracion);
            fjul++;
            break;
  
          case 8:
            ago+=parseInt(resul.duracion);
            fago++;
            break;
  
          case 9:
            set+=parseInt(resul.duracion);
            fset++;
            break;
  
          case 10:
            oct+=parseInt(resul.duracion);
            foct++;
            break;
  
          case 11:
            nov+=parseInt(resul.duracion);
            fnov++;
            break;
  
          case 12:
            dic+=parseInt(resul.duracion);
            fdic++;
            break;
          default:
              console.log('no se econtro mes para:'+resul.flota);
        }
      }
      
      
      mtbfene=calcular_mtbf(ene,fene);
      mttrene=calcular_mttr(ene,fene);
      disgene=(calcular_disgenerica(mtbfene,mttrene)*100).toFixed(2)*1;
      dispmeses.push(disgene);
      mtbfmeses.push((mtbfene/60).toFixed(2)*1);
      mttrmeses.push((mttrene/60).toFixed(2)*1);
  
      console.log(mtbfene);
      console.log(mttrene);
      console.log(disgene);
  
      mtbffeb=calcular_mtbf(feb,ffeb);
      mttrfeb=calcular_mttr(feb,ffeb);
      disgfeb=(calcular_disgenerica(mtbffeb,mttrfeb)*100).toFixed(2)*1;
      dispmeses.push(disgfeb);
      mtbfmeses.push((mtbffeb/60).toFixed(2)*1);
      mttrmeses.push((mttrfeb/60).toFixed(2)*1);
      console.log(mtbffeb);
      console.log(mttrfeb);
      console.log(disgfeb);
  
      mtbfmar=calcular_mtbf(mar,fmar);
      mttrmar=calcular_mttr(mar,fmar);
      disgmar=(calcular_disgenerica(mtbfmar,mttrmar)*100).toFixed(2)*1;
      dispmeses.push(disgmar);
      mtbfmeses.push((mtbfmar/60).toFixed(2)*1);
      mttrmeses.push((mttrmar/60).toFixed(2)*1);
  
      mtbfabr=calcular_mtbf(abr,fabr);
      mttrabr=calcular_mttr(abr,fabr);
      disgabr=(calcular_disgenerica(mtbfabr,mttrabr)*100).toFixed(2)*1;
      dispmeses.push(disgabr);
      mtbfmeses.push((mtbfabr/60).toFixed(2)*1);
      mttrmeses.push((mttrabr/60).toFixed(2)*1);
  
      mtbfmay=calcular_mtbf(may,fmay);
      mttrmay=calcular_mttr(may,fmay);
      disgmay=(calcular_disgenerica(mtbfmay,mttrmay)*100).toFixed(2)*1;
      dispmeses.push(disgmay);
      mtbfmeses.push((mtbfmay/60).toFixed(2)*1);
      mttrmeses.push((mttrmay/60).toFixed(2)*1);
  
      mtbfjun=calcular_mtbf(jun,fjun);
      mttrjun=calcular_mttr(jun,fjun);
      disgjun=(calcular_disgenerica(mtbfjun,mttrjun)*100).toFixed(2)*1;
      dispmeses.push(disgjun);
      mtbfmeses.push((mtbfjun/60).toFixed(2)*1);
      mttrmeses.push((mttrjun/60).toFixed(2)*1);
  
      mtbfjul=calcular_mtbf(jul,fjul);
      mttrjul=calcular_mttr(jul,fjul);
      disgjul=(calcular_disgenerica(mtbfjul,mttrjul)*100).toFixed(2)*1;
      dispmeses.push(disgjul);
      mtbfmeses.push((mtbfjul/60).toFixed(2)*1);
      mttrmeses.push((mttrjul/60).toFixed(2)*1);
  
      mtbfago=calcular_mtbf(ago,fago);
      mttrago=calcular_mttr(ago,fago);
      disgago=(calcular_disgenerica(mtbfago,mttrago)*100).toFixed(2)*1;
      dispmeses.push(disgago);
      mtbfmeses.push((mtbfago/60).toFixed(2)*1);
      mttrmeses.push((mttrago/60).toFixed(2)*1);
  
      mtbfset=calcular_mtbf(set,fset);
      mttrset=calcular_mttr(set,fset);
      disgset=(calcular_disgenerica(mtbfset,mttrset)*100).toFixed(2)*1;
      dispmeses.push(disgset);
      mtbfmeses.push((mtbfset/60).toFixed(2)*1);
      mttrmeses.push((mttrset/60).toFixed(2)*1);
  
      mtbfoct=calcular_mtbf(oct,foct);
      mttroct=calcular_mttr(oct,foct);
      disgoct=(calcular_disgenerica(mtbfoct,mttroct)*100).toFixed(2)*1;
      dispmeses.push(disgoct);
      mtbfmeses.push((mtbfoct/60).toFixed(2)*1);
      mttrmeses.push((mttroct/60).toFixed(2)*1);
  
      mtbfnov=calcular_mtbf(nov,fnov);
      mttrnov=calcular_mttr(nov,fnov);
      disgnov=(calcular_disgenerica(mtbfnov,mttrnov)*100).toFixed(2)*1;
      dispmeses.push(disgnov);
      mtbfmeses.push((mtbfnov/60).toFixed(2)*1);
      mttrmeses.push((mttrnov/60).toFixed(2)*1);
  
      mtbfdic=calcular_mtbf(dic,fdic);
      mttrdic=calcular_mttr(dic,fdic);
      disgdic=(calcular_disgenerica(mtbfdic,mttrdic)*100).toFixed(2)*1;
      dispmeses.push(disgdic);
      mtbfmeses.push((mtbfdic/60).toFixed(2)*1);
      mttrmeses.push((mttrdic/60).toFixed(2)*1);
      
      console.log(dispmeses);
      disum=((disgene+disgfeb+disgmar+disgabr+disgmay+disgjun+disgjul+disgago+disgset+disgoct+disgnov+disgdic)/12).toFixed(2);
    
      disanio.push(disum);    
      console.log(disanio);
      console.log(mtbfmeses);
      console.log(mttrmeses);
  
      
      for(value of mtbfmeses){
        mtbfsum+=value;
      }
      for(value of mttrmeses){
        mttrsum+=value;
      }
      
      mtbfanio.push((mtbfsum/12).toFixed(2));
      mttranio.push((mttrsum/12).toFixed(2));
  
      chart.updateSeries([
        {
          name: 'Disponibilidad',
          data: dispmeses
        }
      ]);
  
      chart_2.updateSeries([
        {
          name: 'Disponibilidad',
          data: disanio
        }
      ]);
  
      chart_3.updateSeries([
        {
          name: 'MTBF',
          data: mtbfanio
        },
        {
          name: 'MTTR',
          data: mttranio
        }
      ]);
  
      chart_4.updateSeries([
        {
          name: 'MTBF',
          data: mtbfmeses
        },
        {
          name: 'MTTR',
          data: mttrmeses
        }
      ]);
  
    });
    
  });
    return; 
  }
  //todos meses, un equipo
  if(mes==="-1" && equipo!="-1"){
  
    
    datos = {
      TipoQuery : "07_getEquiSolicitud",
      flota: flota,
      anio: anio,
      estado: 18,
      equipo: equipo
    }
    
    //todas las solicitudes
    appAjaxQuery(datos,rutaSQL).done(function(resp){
  
      resultados=resp.tabla;
      console.log(resultados);
      
      
      for (resul of resultados){
        let month= resul.mes;
        switch(month){
          case 1:
            ene+=parseInt(resul.duracion);
            console.log("phpdif:"+resul.duracion)
            console.log("dif:"+ene);
            fene++;
            break;
  
          case 2:
            feb+=parseInt(resul.duracion);
            ffeb++;
            break;
  
          case 3:
            mar+=parseInt(resul.duracion);
            fmar++;
            break;
  
          case 4:
            abr+=parseInt(resul.duracion);
            fabr++;
            break;
  
          case 5:
            may+=parseInt(resul.duracion);
            fmay++;
            break;
  
          case 6:
            jun+=parseInt(resul.duracion);
            fjun++;
            break;
  
          case 7:
            jul+=parseInt(resul.duracion);
            fjul++;
            break;
  
          case 8:
            ago+=parseInt(resul.duracion);
            fago++;
            break;
  
          case 9:
            set+=parseInt(resul.duracion);
            fset++;
            break;
  
          case 10:
            oct+=parseInt(resul.duracion);
            foct++;
            break;
  
          case 11:
            nov+=parseInt(resul.duracion);
            fnov++;
            break;
  
          case 12:
            dic+=parseInt(resul.duracion);
            fdic++;
            break;
          default:
              console.log('no se econtro mes para:'+resul.flota);
        }
      }
   
      mtbfene=calcular_mtbf(ene,fene);
      mttrene=calcular_mttr(ene,fene);
      disgene=(calcular_disgenerica(mtbfene,mttrene)*100).toFixed(2)*1;
      dispmeses.push(disgene);
      mtbfmeses.push((mtbfene/60).toFixed(2)*1);
      mttrmeses.push((mttrene/60).toFixed(2)*1);
  
      console.log(mtbfene);
      console.log(mttrene);
      console.log(disgene);
  
      mtbffeb=calcular_mtbf(feb,ffeb);
      mttrfeb=calcular_mttr(feb,ffeb);
      disgfeb=(calcular_disgenerica(mtbffeb,mttrfeb)*100).toFixed(2)*1;
      dispmeses.push(disgfeb);
      mtbfmeses.push((mtbffeb/60).toFixed(2)*1);
      mttrmeses.push((mttrfeb/60).toFixed(2)*1);
      console.log(mtbffeb);
      console.log(mttrfeb);
      console.log(disgfeb);
  
      mtbfmar=calcular_mtbf(mar,fmar);
      mttrmar=calcular_mttr(mar,fmar);
      disgmar=(calcular_disgenerica(mtbfmar,mttrmar)*100).toFixed(2)*1;
      dispmeses.push(disgmar);
      mtbfmeses.push((mtbfmar/60).toFixed(2)*1);
      mttrmeses.push((mttrmar/60).toFixed(2)*1);
  
      mtbfabr=calcular_mtbf(abr,fabr);
      mttrabr=calcular_mttr(abr,fabr);
      disgabr=(calcular_disgenerica(mtbfabr,mttrabr)*100).toFixed(2)*1;
      dispmeses.push(disgabr);
      mtbfmeses.push((mtbfabr/60).toFixed(2)*1);
      mttrmeses.push((mttrabr/60).toFixed(2)*1);
  
      mtbfmay=calcular_mtbf(may,fmay);
      mttrmay=calcular_mttr(may,fmay);
      disgmay=(calcular_disgenerica(mtbfmay,mttrmay)*100).toFixed(2)*1;
      dispmeses.push(disgmay);
      mtbfmeses.push((mtbfmay/60).toFixed(2)*1);
      mttrmeses.push((mttrmay/60).toFixed(2)*1);
  
      mtbfjun=calcular_mtbf(jun,fjun);
      mttrjun=calcular_mttr(jun,fjun);
      disgjun=(calcular_disgenerica(mtbfjun,mttrjun)*100).toFixed(2)*1;
      dispmeses.push(disgjun);
      mtbfmeses.push((mtbfjun/60).toFixed(2)*1);
      mttrmeses.push((mttrjun/60).toFixed(2)*1);
  
      mtbfjul=calcular_mtbf(jul,fjul);
      mttrjul=calcular_mttr(jul,fjul);
      disgjul=(calcular_disgenerica(mtbfjul,mttrjul)*100).toFixed(2)*1;
      dispmeses.push(disgjul);
      mtbfmeses.push((mtbfjul/60).toFixed(2)*1);
      mttrmeses.push((mttrjul/60).toFixed(2)*1);
  
      mtbfago=calcular_mtbf(ago,fago);
      mttrago=calcular_mttr(ago,fago);
      disgago=(calcular_disgenerica(mtbfago,mttrago)*100).toFixed(2)*1;
      dispmeses.push(disgago);
      mtbfmeses.push((mtbfago/60).toFixed(2)*1);
      mttrmeses.push((mttrago/60).toFixed(2)*1);
  
      mtbfset=calcular_mtbf(set,fset);
      mttrset=calcular_mttr(set,fset);
      disgset=(calcular_disgenerica(mtbfset,mttrset)*100).toFixed(2)*1;
      dispmeses.push(disgset);
      mtbfmeses.push((mtbfset/60).toFixed(2)*1);
      mttrmeses.push((mttrset/60).toFixed(2)*1);
  
      mtbfoct=calcular_mtbf(oct,foct);
      mttroct=calcular_mttr(oct,foct);
      disgoct=(calcular_disgenerica(mtbfoct,mttroct)*100).toFixed(2)*1;
      dispmeses.push(disgoct);
      mtbfmeses.push((mtbfoct/60).toFixed(2)*1);
      mttrmeses.push((mttroct/60).toFixed(2)*1);
  
      mtbfnov=calcular_mtbf(nov,fnov);
      mttrnov=calcular_mttr(nov,fnov);
      disgnov=(calcular_disgenerica(mtbfnov,mttrnov)*100).toFixed(2)*1;
      dispmeses.push(disgnov);
      mtbfmeses.push((mtbfnov/60).toFixed(2)*1);
      mttrmeses.push((mttrnov/60).toFixed(2)*1);
  
      mtbfdic=calcular_mtbf(dic,fdic);
      mttrdic=calcular_mttr(dic,fdic);
      disgdic=(calcular_disgenerica(mtbfdic,mttrdic)*100).toFixed(2)*1;
      dispmeses.push(disgdic);
      mtbfmeses.push((mtbfdic/60).toFixed(2)*1);
      mttrmeses.push((mttrdic/60).toFixed(2)*1);
      
      console.log(dispmeses);
      disum=((disgene+disgfeb+disgmar+disgabr+disgmay+disgjun+disgjul+disgago+disgset+disgoct+disgnov+disgdic)/12).toFixed(2);
     
      
      disanio.push(disum);    
      console.log(disanio);
      console.log(mtbfmeses);
      console.log(mttrmeses);
  
      var mtbfsum=0,mttrsum=0;
      for(value of mtbfmeses){
        mtbfsum+=value;
      }
      for(value of mttrmeses){
        mttrsum+=value;
      }
      
      mtbfanio.push((mtbfsum/12).toFixed(2));
      mttranio.push((mttrsum/12).toFixed(2));
  
      chart.updateSeries([
        {
          name: 'Disponibilidad',
          data: dispmeses
        }
      ]);
  
      chart_2.updateSeries([
        {
          name: 'Disponibilidad',
          data: disanio
        }
      ]);
  
      chart_3.updateSeries([
        {
          name: 'MTBF',
          data: mtbfanio
        },
        {
          name: 'MTTR',
          data: mttranio
        }
      ]);
  
      chart_4.updateSeries([
        {
          name: 'MTBF',
          data: mtbfmeses
        },
        {
          name: 'MTTR',
          data: mttrmeses
        }
      ]);
  
  
    });
    return;
  }
  //un mes, todos equipos
  if(mes!="-1" && equipo==="-1"){
    $("#chart_indicador").empty();
    $("#chart_indicador_2").empty();
    $("#chart_tiempo_2").empty();
    $("#chart_tiempo").empty();
  
    //grafica 01
  var options = {
    series: [],
    chart: {
    height: 350,
    type: 'line',
    dropShadow: {
      enabled: true,
      color: '#000',
      top: 18,
      left: 7,
      blur: 10,
      opacity: 0.2
    },
    toolbar: {
      show: false
    }
  },
  colors: ['#F44336', '#545454'],  
  dataLabels: {
    enabled: true,
  },
  stroke: {
    curve: 'smooth'
  },
  noData: {
    text: 'Loading...'
  },
  grid: {
    borderColor: '#e7e7e7',
    row: {
      colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.5
    },
  },
  markers: {
    size: 1
  },
  xaxis: {
    categories: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5']
  },
  yaxis: { 
    min: 0,
    max: 100
  },
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    floating: true,
    offsetY: -25,
    offsetX: -5
  }
  };
  
  var chart = new ApexCharts(document.querySelector("#chart_indicador"), options);
  chart.render();
  //fin
  
  //grafica 02
  var options = {
    series: [],
    chart: {
    type: 'bar',
    height: 350
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '40%',
      endingShape: 'rounded'
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
  },
  xaxis: {
    categories: [mes],
  },
  yaxis: {

  },
  noData: {
    text: 'Loading...'
  },
  fill: {
    opacity: 1,
    colors: ['#F44336', '#E91E63', '#9C27B0']
  }
  };
  
  var chart_2 = new ApexCharts(document.querySelector("#chart_indicador_2"), options);
  chart_2.render();
  
  //fin
  
  //grafica 03
  var options = {
    series: [],
    chart: {
    type: 'bar',
    height: 350
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '40%',
      endingShape: 'rounded'
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
  },
  colors: ['#4db2ff', '#ffca1c'],
  xaxis: {
    categories: [mes],
  },
  yaxis: {   
    min: 0,
    max: 168
  },
  noData: {
    text: 'Loading...'
  },
  fill: {
    opacity: 1
  }, 
  };
  
  var chart_3 = new ApexCharts(document.querySelector("#chart_tiempo_2"), options);
  chart_3.render();
  //fin
  
  //grafica 04
  
  var options = {
    series: [],
    chart: {
    height: 350,
    type: 'line',
    dropShadow: {
      enabled: true,
      color: '#000',
      top: 18,
      left: 7,
      blur: 10,
      opacity: 0.2
    },
    toolbar: {
      show: false
    }
  },
  colors: ['#4db2ff', '#ffca1c'],
  dataLabels: {
    enabled: true,
  },
  stroke: {
    curve: 'smooth'
  },
  grid: {
    borderColor: '#e7e7e7',
    row: {
      colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.5
    },
  },
  markers: {
    size: 1
  },
  xaxis: {
    categories: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5']
  },
  yaxis: {    
    min: 0,
    max: 168
  },
  noData: {
    text: 'Loading...'
  },
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    floating: true,
    offsetY: -25,
    offsetX: -5
  }
  };
  
  var chart_4 = new ApexCharts(document.querySelector("#chart_tiempo"), options);
  chart_4.render();
  
  //fin
        
    datos = {
      TipoQuery : "07_getEquipos",
      contenido: value
    }
     
    appAjaxQuery(datos,rutaSQL).done(function(resp){
   
      equipos=resp;
    
    });
    datos = {
      TipoQuery : "07_getAllSolicitudMes",
      flota: flota,
      anio: anio,
      estado: 18,
      mes:mes
    }
    
    //todas las solicitudes
    appAjaxQuery(datos,rutaSQL).done(function(resp){
  
      
      solicitudes=resp;
      for (sol of solicitudes.tabla) {
  
        for(equi of equipos.tabla){
          
          if(equi.codigo === sol.flota){
            resultados.push(sol);
            
          }
        }
          
      }
      console.log(resultados);
  
      for (resul of resultados){
        let week= resul.semana;
        switch(week){
          case 1:
            sem1+=parseInt(resul.duracion);
            console.log("phpdif:"+resul.duracion)
            console.log("dif:"+sem1);
            fsem1++;
            break;
  
          case 2:
            sem2+=parseInt(resul.duracion);
            fsem2++;
            break;
  
          case 3:
            sem3+=parseInt(resul.duracion);
            fsem3++;
            break;
  
          case 4:
            sem4+=parseInt(resul.duracion);
            fsem4++;
            break;
  
          case 5:
            sem5+=parseInt(resul.duracion);
            fsem5++;
            break;
       
          default:
              console.log('no se econtro semana para:'+resul.flota);
        }
      }
      
      
      mtbfsem1=calcular_mtbf_mes(sem1,fsem1);
      mttrsem1=calcular_mttr_mes(sem1,fsem1);
      disgsem1=(calcular_disgenerica_mes(mtbfsem1,mttrsem1)*100).toFixed(2)*1;
      dispsemanas.push(disgsem1);
      mtbfsemanas.push((mtbfsem1/60).toFixed(2)*1);
      mttrsemanas.push((mttrsem1/60).toFixed(2)*1);
  
  
      mtbfsem2=calcular_mtbf_mes(sem2,fsem2);
      mttrsem2=calcular_mttr_mes(sem2,fsem2);
      disgsem2=(calcular_disgenerica_mes(mtbfsem2,mttrsem2)*100).toFixed(2)*1;
      dispsemanas.push(disgsem2);
      mtbfsemanas.push((mtbfsem2/60).toFixed(2)*1);
      mttrsemanas.push((mttrsem2/60).toFixed(2)*1);
  
  
      mtbfsem3=calcular_mtbf_mes(sem3,fsem3);
      mttrsem3=calcular_mttr_mes(sem3,fsem3);
      disgsem3=(calcular_disgenerica_mes(mtbfsem3,mttrsem3)*100).toFixed(2)*1;
      dispsemanas.push(disgsem3);
      mtbfsemanas.push((mtbfsem3/60).toFixed(2)*1);
      mttrsemanas.push((mttrsem3/60).toFixed(2)*1);
  
      mtbfsem4=calcular_mtbf_mes(sem4,fsem4);
      mttrsem4=calcular_mttr_mes(sem4,fsem4);
      disgsem4=(calcular_disgenerica_mes(mtbfsem4,mttrsem4)*100).toFixed(2)*1;
      dispsemanas.push(disgsem4);
      mtbfsemanas.push((mtbfsem4/60).toFixed(2)*1);
      mttrsemanas.push((mttrsem4/60).toFixed(2)*1);
  
      mtbfsem5=calcular_mtbf_mes(sem5,fsem5);
      mttrsem5=calcular_mttr_mes(sem5,fsem5);
      disgsem5=(calcular_disgenerica_mes(mtbfsem5,mttrsem5)*100).toFixed(2)*1;
      dispsemanas.push(disgsem5);
      mtbfsemanas.push((mtbfsem5/60).toFixed(2)*1);
      mttrsemanas.push((mttrsem5/60).toFixed(2)*1);
      
      console.log(dispmeses);
      disum=((disgsem1+disgsem2+disgsem3+disgsem4+disgsem5)/5).toFixed(2);
    
      console.log(dispsemanas);
      console.log(mtbfsemanas);
      console.log(mttrsemanas);
      disMes.push(disum);    
      console.log(disMes);
      console.log(mtbfsemanas);
      console.log(mttrsemanas);
  
      
      for(value of mtbfsemanas){
        mtbfsum+=value;
      }
      for(value of mttrsemanas){
        mttrsum+=value;
      }
      
      mtbfmes.push((mtbfsum/5).toFixed(2));
      mttrmes.push((mttrsum/5).toFixed(2));
  
      chart.updateSeries([
        {
          name: 'Disponibilidad',
          data: dispsemanas
        }
      ]);
  
      chart_2.updateSeries([
        {
          name: 'Disponibilidad',
          data: disMes
        }
      ]);
  
      chart_3.updateSeries([
        {
          name: 'MTBF',
          data: mtbfmes
        },
        {
          name: 'MTTR',
          data: mttrmes
        }
      ]);
  
      chart_4.updateSeries([
        {
          name: 'MTBF',
          data: mtbfsemanas
        },
        {
          name: 'MTTR',
          data: mttrsemanas
        }
      ]);
    });
    return;
  }
  // un mes, un equipo
  if(mes!="-1" && equipo!="-1"){
    $("#chart_indicador").empty();
    $("#chart_indicador_2").empty();
    $("#chart_tiempo_2").empty();
    $("#chart_tiempo").empty();
  
    //grafica 01
  var options = {
    series: [],
    chart: {
    height: 350,
    type: 'line',
    dropShadow: {
      enabled: true,
      color: '#000',
      top: 18,
      left: 7,
      blur: 10,
      opacity: 0.2
    },
    toolbar: {
      show: false
    }
  },
  colors: ['#F44336', '#545454'],
  
  dataLabels: {
    enabled: true,
  },
  stroke: {
    curve: 'smooth'
  },
  noData: {
    text: 'Loading...'
  },
  /* title: {
    text: 'Average High & Low Temperature',
    align: 'left'
  }, */
  grid: {
    borderColor: '#e7e7e7',
    row: {
      colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.5
    },
  },
  markers: {
    size: 1
  },
  xaxis: {
    categories: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5']/* ,
    title: {
      text: 'Meses'
    } */
  },
  yaxis: {
    /* title: {
      text: 'Disponibilidad'
    }, */
    min: 0,
    max: 100
  },
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    floating: true,
    offsetY: -25,
    offsetX: -5
  }
  };
  
  var chart = new ApexCharts(document.querySelector("#chart_indicador"), options);
  chart.render();
  //fin
  
  //grafica 02
  var options = {
    series: [],
    chart: {
    type: 'bar',
    height: 350
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '40%',
      endingShape: 'rounded'
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
  },
  xaxis: {
    categories: [mes],
  },
  yaxis: {
    /* title: {
      text: '$ (thousands)'
    } */
  },
  noData: {
    text: 'Loading...'
  },
  fill: {
    opacity: 1,
    colors: ['#F44336', '#E91E63', '#9C27B0']
  }/* ,
  tooltip: {
    y: {
      formatter: function (val) {
        return "$ " + val + " thousands"
      }
    }
  } */
  };
  
  var chart_2 = new ApexCharts(document.querySelector("#chart_indicador_2"), options);
  chart_2.render();
  
  //fin
  
  //grafica 03
  var options = {
    series: [],
    chart: {
    type: 'bar',
    height: 350
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '40%',
      endingShape: 'rounded'
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
  },
  colors: ['#4db2ff', '#ffca1c'],
  xaxis: {
    categories: [mes],
  },
  yaxis: {
    /* title: {
      text: '$ (thousands)'
    } */
    min: 0,
    max: 168
  },
  noData: {
    text: 'Loading...'
  },
  fill: {
    opacity: 1
  },
  
  /* ,
  tooltip: {
    y: {
      formatter: function (val) {
        return "$ " + val + " thousands"
      }
    }
  } */
  };
  
  var chart_3 = new ApexCharts(document.querySelector("#chart_tiempo_2"), options);
  chart_3.render();
  //fin
  
  //grafica 04
  
  var options = {
    series: [],
    chart: {
    height: 350,
    type: 'line',
    dropShadow: {
      enabled: true,
      color: '#000',
      top: 18,
      left: 7,
      blur: 10,
      opacity: 0.2
    },
    toolbar: {
      show: false
    }
  },
  colors: ['#4db2ff', '#ffca1c'],
  dataLabels: {
    enabled: true,
  },
  stroke: {
    curve: 'smooth'
  },
  grid: {
    borderColor: '#e7e7e7',
    row: {
      colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.5
    },
  },
  markers: {
    size: 1
  },
  xaxis: {
    categories: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5']
  },
  yaxis: {
    /* title: {
      text: 'Disponibilidad'
    }, */
    min: 0,
    max: 168
  },
  noData: {
    text: 'Loading...'
  },
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    floating: true,
    offsetY: -25,
    offsetX: -5
  }
  };
  
  var chart_4 = new ApexCharts(document.querySelector("#chart_tiempo"), options);
  chart_4.render();
  
  datos = {
    TipoQuery : "07_getEquiSolicitudMes",
    flota: flota,
    anio: anio,
    estado: 18,
    equipo: equipo,
    mes:mes
  }
  
  //todas las solicitudes
  appAjaxQuery(datos,rutaSQL).done(function(resp){
  
    resultados=resp.tabla;
    console.log(resultados);
  
    for (resul of resultados){
      let week= resul.semana;
        switch(week){
          case 1:
            sem1+=parseInt(resul.duracion);
            console.log("phpdif:"+resul.duracion)
            console.log("dif:"+sem1);
            fsem1++;
            break;
  
          case 2:
            sem2+=parseInt(resul.duracion);
            fsem2++;
            break;
  
          case 3:
            sem3+=parseInt(resul.duracion);
            fsem3++;
            break;
  
          case 4:
            sem4+=parseInt(resul.duracion);
            fsem4++;
            break;
  
          case 5:
            sem5+=parseInt(resul.duracion);
            fsem5++;
            break;
       
          default:
              console.log('no se econtro semana para:'+resul.flota);
        }
      }
      
      
      mtbfsem1=calcular_mtbf_mes(sem1,fsem1);
      mttrsem1=calcular_mttr_mes(sem1,fsem1);
      disgsem1=(calcular_disgenerica_mes(mtbfsem1,mttrsem1)*100).toFixed(2)*1;
      dispsemanas.push(disgsem1);
      mtbfsemanas.push((mtbfsem1/60).toFixed(2)*1);
      mttrsemanas.push((mttrsem1/60).toFixed(2)*1);
  
  
      mtbfsem2=calcular_mtbf_mes(sem2,fsem2);
      mttrsem2=calcular_mttr_mes(sem2,fsem2);
      disgsem2=(calcular_disgenerica_mes(mtbfsem2,mttrsem2)*100).toFixed(2)*1;
      dispsemanas.push(disgsem2);
      mtbfsemanas.push((mtbfsem2/60).toFixed(2)*1);
      mttrsemanas.push((mttrsem2/60).toFixed(2)*1);
  
  
      mtbfsem3=calcular_mtbf_mes(sem3,fsem3);
      mttrsem3=calcular_mttr_mes(sem3,fsem3);
      disgsem3=(calcular_disgenerica_mes(mtbfsem3,mttrsem3)*100).toFixed(2)*1;
      dispsemanas.push(disgsem3);
      mtbfsemanas.push((mtbfsem3/60).toFixed(2)*1);
      mttrsemanas.push((mttrsem3/60).toFixed(2)*1);
  
      mtbfsem4=calcular_mtbf_mes(sem4,fsem4);
      mttrsem4=calcular_mttr_mes(sem4,fsem4);
      disgsem4=(calcular_disgenerica_mes(mtbfsem4,mttrsem4)*100).toFixed(2)*1;
      dispsemanas.push(disgsem4);
      mtbfsemanas.push((mtbfsem4/60).toFixed(2)*1);
      mttrsemanas.push((mttrsem4/60).toFixed(2)*1);
  
      mtbfsem5=calcular_mtbf_mes(sem5,fsem5);
      mttrsem5=calcular_mttr_mes(sem5,fsem5);
      disgsem5=(calcular_disgenerica_mes(mtbfsem5,mttrsem5)*100).toFixed(2)*1;
      dispsemanas.push(disgsem5);
      mtbfsemanas.push((mtbfsem5/60).toFixed(2)*1);
      mttrsemanas.push((mttrsem5/60).toFixed(2)*1);
      
      console.log(dispmeses);
      disum=((disgsem1+disgsem2+disgsem3+disgsem4+disgsem5)/5).toFixed(2);
    
      console.log(dispsemanas);
      console.log(mtbfsemanas);
      console.log(mttrsemanas);
      disMes.push(disum);    
      console.log(disMes);
      console.log(mtbfsemanas);
      console.log(mttrsemanas);
  
      
      for(value of mtbfsemanas){
        mtbfsum+=value;
      }
      for(value of mttrsemanas){
        mttrsum+=value;
      }
      
      mtbfmes.push((mtbfsum/5).toFixed(2));
      mttrmes.push((mttrsum/5).toFixed(2));
  
      chart.updateSeries([
        {
          name: 'Disponibilidad',
          data: dispsemanas
        }
      ]);
  
      chart_2.updateSeries([
        {
          name: 'Disponibilidad',
          data: disMes
        }
      ]);
  
      chart_3.updateSeries([
        {
          name: 'MTBF',
          data: mtbfmes
        },
        {
          name: 'MTTR',
          data: mttrmes
        }
      ]);
  
      chart_4.updateSeries([
        {
          name: 'MTBF',
          data: mtbfsemanas
        },
        {
          name: 'MTTR',
          data: mttrsemanas
        }
      ]);
      return;
  });
  
  //fin
  
  
  }  
}

$('#cbo06_Contenidos').change(function() {

  var $option = $(this).find('option:selected');
  var value = $option.val(); 


  let datos = {
    TipoQuery : 'sqlGroupClassByGroup',
    data:value
  };                

  console.log(value)
 appAjaxQuery(datos,rutaSQL).done(function(resp){     
    $("#cbo06_Equipos option[value!='-1']").remove();    
      resp.data.forEach((item)=>{
        $('#cbo06_Equipos').append($("<option>", { 
          value: item.id,
          text : item.description 
      }));
      })
     
  }); 
  
})


$('#cbo07_Contenidos').change(function() {

  var $option = $(this).find('option:selected');
  var value = $option.val(); 


  let datos = {
    TipoQuery : 'sqlGroupClassByGroup',
    data:value
  };                

  console.log(value)
 appAjaxQuery(datos,rutaSQL).done(function(resp){     
    $("#cbo07_Equipos option[value!='-1']").remove();    
      resp.data.forEach((item)=>{
        $('#cbo07_Equipos').append($("<option>", { 
          value: item.id,
          text : item.description 
      }));
      })
     
  }); 
  
})
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

function  searchInput(type){
    switch(type){      
        case "searchVehiculoSolicitudMantenimiento":
          searchFillInput(
            "txt_search_vehiculo_solicitud_mantenimiento",
            "sql_search_vechiculo",
            "txt_vehiculo_solicitud_mantenimiento",
            "txt_vehiculo_solicitud_mantenimiento_activo",
            "txt_vehiculo_solicitud_mantenimiento_descripcion"
          )
        break;
        case "www":
            searchFillInput(
              "txt_search_vehiculo_solicitud_mantenimiento",
              "sql_search_vechiculo",
              "txt_vehiculo_solicitud_mantenimiento",
              "txt_vehiculo_solicitud_mantenimiento_activo",
              "txt_vehiculo_solicitud_mantenimiento_descripcion"
            )
          break;
    }
  }
  function add_solicitudMantenimiento(){
    let datos = {
      TipoQuery : 'sql_get_last_requerimiento_mantenimiento'      
    };                
   appAjaxQuery(datos,rutaSQL).done(function(dat){   
    let id=Number(dat.tabla.id)+1;
    let Maindata=[    
      {title:"id",element:"",type:"text",status:0,value:"RQ-CM-M-2022-"+id},
      {title:"vehiculo",element:"txt_vehiculo_solicitud_mantenimiento",type:"text",status:1,value:"val"},
      {title:"asignado",element:"txt_solicitud_mantenimiento_dpt_asignado",type:"text",status:0,value:2},
      {title:"prioridad",element:"txt_solicitud_mantenimiento_prioridad",type:"select",status:1,value:"select"},
      {title:"tipo",element:"txt_solicitud_mantenimiento_tipo",type:"select",status:1,value:"selectVal"},
      {title:"fecha",element:"txt_solicitud_mantenimiento_fecha",type:"text",status:1,value:"val"},
      {title:"descripcion",element:"txt_solicitud_mantenimiento_descripcion",type:"text",status:1,value:"val"},
  
      {title:"comentario",element:"txt_solicitud_mantenimiento_comentario",type:"text",child:"ComentarioHijoSolicitudMantenimiento",content:"ComentarioParentSolicitudMantenimiento",status:0,value:"manyinputs"},
  
      {title:"",element:"txt_search_vehiculo_solicitud_mantenimiento",type:"text",status:0,value:"none"},
      {title:"",element:"txt_vehiculo_solicitud_mantenimiento_activo",type:"text",status:0,value:"none"},
      {title:"",element:"txt_vehiculo_solicitud_mantenimiento_descripcion",type:"text",status:0,value:"none"}
    ]
    if(validate(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{
    
          let datos = {
            TipoQuery : '03_save_add_solicitud_mantenimiento',
            data:generateInsertData(Maindata)
          };        
          console.log(datos)
         appAjaxQuery(datos,rutaSQL).done(function(resp){   
                             
              ResetAndUpdateGrid(Maindata,updateGrid,"gridOperacionSolicitudMantenimiento");
  
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
      console.log(sData)
    let dd=sData.toString()
    let contentOpe="";

    contentOpe+=ope.print.state?'<button class="fa fa-print bg-emerald-500 py-2 px-2 text-white"'+
                                'onclick='+ope.print.funct+'("'+dd+'"); type="button"></button>':''
    contentOpe+=ope.view.state?'<button class="fa fa-eye bg-cyan-500 py-2 px-2 text-white"'+
                                'onclick='+ope.view.funct+'("'+dd+'"); type="button"></button>':''
    contentOpe+=ope.edit.state?'<button class="fa fa-pencil bg-cyan-500 py-2 px-2 text-white"'+
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
  function generateGrid(querySQL,IdgridTable,ope,Enabledcolumns,IdparentSearch,searchColumns,params=null){
    let datos={
      TipoQuery : querySQL,
      value : params,
    }
    var table;
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      //console.log(resp)
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
          order: []
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
  function insert_modal_orden_compra(){
    let datos = {
      TipoQuery : 'sql_get_last_orden_trabajo_mantenimiento'      
    };                
   appAjaxQuery(datos,rutaSQL).done(function(dat){  

    let id=Number(dat.tabla.id)+1;
    let Maindata=[      
      {title:"n_orden_trabajo",element:"",type:"text",status:0,value:"OT-CM-M-2022-"+id},
      {title:"id_solicitud_mantenimiento",element:"txt_modal_solicitud_orden_trabajo_id",type:"text",status:1,value:"val"},
      {title:"estado",element:"txt_modal_solicitud_orden_trabajo_estado",type:"select",status:1,value:"selectVal"},
      {title:"motivo",element:"txt_modal_solicitud_orden_trabajo_motivo",type:"text",status:$("#txt_modal_solicitud_orden_trabajo_estado").val()==17?1:0,value:"val"},
     // {title:"fecha",element:"fecha_orden_compra",type:"text",status:0,value:"none"},

      //{title:"estado",element:"estado",type:"text",status:0,value:"none"},      
    ]
    if(validate(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{
          //let test=generateInsertData(Maindata)
         // console.log(test);
          let datos = {
            TipoQuery : 'sql_RequerimientosOrdenCompra_Add',
            data:generateInsertData(Maindata)
          };                
         appAjaxQuery(datos,rutaSQL).done(function(resp){   
              $('#ModalOpenSolicitudOrdenTrabajo').modal('hide');
              ResetAndUpdateGrid(Maindata,updateGrid,"gridOperacionSolicitudMantenimiento");
              updateGrid("grd01OrdenTrabajoHTML");
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
  function OpenModalRequerimientoMantenimiento(id){
    //console.log(id)
    let datos = {
      TipoQuery : 'sql_get_solicitudMantenimiento_by_id',
      data:id
    };  
    var table;   
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp)       
      $('#txt_modal_solicitud_orden_trabajo_id').val(resp.data.id)
      $('#txt_modal_solicitud_orden_trabajo_prioridad').val(resp.data.prioridad)
      $('#txt_modal_solicitud_orden_trabajo_fecha').val(resp.data.fecha)
      $('#txt_modal_solicitud_orden_trabajo_area').val(resp.data.area)

      $('#txt_modal_solicitud_orden_trabajo_descripcion').val(resp.data.descripcion)
      $('#txt_modal_solicitud_orden_trabajo_activo').val(resp.data.active)
    
      $('#txt_modal_solicitud_orden_trabajo_tipo').val(resp.data.tipo)

      $('#txt_modal_solicitud_orden_trabajo_estado').val(resp.data.estado)

      $('#txt_modal_solicitud_orden_trabajo_estado').prop('disabled', resp.data.estado==11?false:true)
      $('#txt_modal_solicitud_orden_trabajo_motivo').prop('disabled', resp.data.estado==11?false:true)

      $('#txt_modal_solicitud_orden_trabajo_motivo').val(resp.data.motivo)
      
      if(resp.data.estado==17){
        $("#boxElementMovito_OT_solicitudMantenimiento").show();        
      }else{
        $("#boxElementMovito_OT_solicitudMantenimiento").hide();        
      }
      if(resp.data.estado==17 || resp.data.estado==12){        
        $("#buttonModalOT_solicitudMantenimiento").hide();
      }else{        
        $("#buttonModalOT_solicitudMantenimiento").show();
      }

      $("#modalOpenDetailsSolicitudMantenimiento_comentarios_table > tbody").empty()

      resp.dataComent.forEach((it,index)=>{
        $("#modalOpenDetailsSolicitudMantenimiento_comentarios_table > tbody").append("<tr>"+
        "<td>"+(Number(index)+1)+"</td>"+   
        "<td>"+it.descripcion+"</td>"+
        "</tr>")
      })
      
   
      $('#ModalOpenSolicitudOrdenTrabajo').modal('show');   

    } );   
  }
  $('#txt_n_orden_trabajo_estado_modal').change(function() {
    var $option = $(this).find('option:selected');
    var value = $option.val();  
    if(value!=11){      
      $("#details_oc_to_orden_compra").show();
      if(value==14 || value==15){
      
        $("#box_orden_trabajo_fecha_asignacion").show();
        $("#txt_n_orden_trabajo_fecha_asignacion_modal").prop('disabled', false)
      }else{

        if(value==18){
          $("#box_orden_trabajo_hora_asignacion").show();         
        }
        else{
          $("#box_orden_trabajo_hora_asignacion").hide();
        }
        $("#txt_n_orden_trabajo_fecha_asignacion_modal").prop('disabled', true)
      //  $("#box_orden_trabajo_fecha_asignacion").hide();
  
      }  
    }else{
      $("#box_orden_trabajo_hora_asignacion").hide();
      $("#details_oc_to_orden_compra").hide();      
      $("#box_orden_trabajo_fecha_asignacion").hide();
     // console.log("ddddddddddddddddddddddddddd")
      //$("#modalOpenDetailsOrdenMantenimiento_comentarios_table").hide();
    }  

  })

  function msToTime(s) {

    // Pad to 2 or 3 digits, default is 2
    function pad(n, z) {
      z = z || 2;
      return ('00' + n).slice(-z);
    }
  
    var ms = s % 1000;
    s = (s - ms) / 1000;
    var secs = s % 60;
    s = (s - secs) / 60;
    var mins = s % 60;
    var hrs = (s - mins) / 60;
  
    return pad(hrs) + ':' + pad(mins) + ':' + pad(secs) + '.' + pad(ms, 3);
  }
  function OpenModalOrdenTrabajo(id){
    //console.log(id)
    let datos = {
      TipoQuery : 'sql_get_orden_trabajo_by_id',
      data:id
    };  
    var table;   
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp)       
      $('#txt_n_orden_trabajo_id_modal').val(resp.data.id)
      $('#txt_n_orden_trabajo_fecha_modal').val(resp.data.fecha_creacion)
      $('#txt_n_orden_trabajo_descripcion_modal').val(resp.data.descripcion)
      $('#txt_n_orden_trabajo_activo_modal').val(resp.data.active)

      $('#txt_n_orden_trabajo_area_modal').val(resp.data.area)
      $('#txt_n_orden_trabajo_tipo_modal').val(resp.data.tipo)

      $('#txt_n_orden_trabajo_hora_ini_asignacion_modal').val(resp.data.hora_ini)
      $('#txt_n_orden_trabajo_hora_fin_asignacion_modal').val(resp.data.hora_fin)
    
      $('#txt_n_orden_trabajo_estado_modal').val(resp.data.estado)
      
      $('#txt_n_orden_trabajo_estado_modal').prop('disabled', resp.data.estado==18?true:false)

      $('#txt_n_orden_trabajo_hora_ini_asignacion_modal').prop('disabled', resp.data.estado==18?true:false)
      $('#txt_n_orden_trabajo_hora_fin_asignacion_modal').prop('disabled', resp.data.estado==18?true:false)

      $("#txt_n_orden_trabajo_fecha_asignacion_modal").prop('disabled', resp.data.estado==18|| resp.data.estado==16 || resp.data.estado==14?true:false)

      $("#txt_n_orden_trabajo_fecha_asignacion_modal").val(resp.data.fecha_asignacion)

      $("#griditemsOrdenCompraWithVehicle2 > tbody").empty();

      $("#txt_ordentrabajo_withvehicle_search").val("");
      $("#txt_ordentrabajo_withvehicle_id").val("");

      if(resp.data.estado==18){
        $("#button_guardar_ot_modal").hide();
        $("#box_orden_trabajo_hora_asignacion").show();

      }else{
        $("#box_orden_trabajo_hora_asignacion").hide();
        $("#button_guardar_ot_modal").show();
      }

      if(resp.data.estado==14||resp.data.estado==15||resp.data.estado==18||resp.data.estado==16){
        $("#box_orden_trabajo_fecha_asignacion").show();
      }else{
        $("#box_orden_trabajo_fecha_asignacion").hide();
      }

      $("#modalOpenDetailsOrdenMantenimiento_comentarios_table > tbody").empty();

      resp.dataComent.forEach((it,index)=>{
        $("#modalOpenDetailsOrdenMantenimiento_comentarios_table > tbody").append("<tr>"+
        "<td>"+(Number(index)+1)+"</td>"+   
        "<td>"+it.descripcion+"</td>"+
        "</tr>")
      })
      




      $('#ModalOpenOrdenTrabajo').modal('show');   

    } );   
  }

  function insert_modal_orden_trabajo(){
    let id=(new Date()).getTime();
    let idxC=(new Date()).getTime()-1;

 

    //let state=$("#txt_n_orden_trabajo_estado_modal").val();
    let Maindata=[      
      {title:"id",element:"txt_n_orden_trabajo_id_modal",type:"text",status:1,value:"val"},
      {title:"fecha_cambio",element:"txt_n_orden_trabajo_fecha_asignacion_modal",type:"text",status:0,value:"val"},
      {title:"hora_ini",element:"txt_n_orden_trabajo_hora_ini_asignacion_modal",type:"text",status:0,value:"val"},
      {title:"hora_fin",element:"txt_n_orden_trabajo_hora_fin_asignacion_modal",type:"text",status:0,value:"val"},
      {title:"fecha_actualizacion",element:"",type:"text",status:0,value:new Date().toISOString().slice(0, 10)},
      {title:"estado",element:"txt_n_orden_trabajo_estado_modal",type:"select",status:1,value:"selectVal"},
  
     
          

      {title:"",element:"txt_ordentrabajo_withvehicle_search",type:"text",status:0,value:"val"},    
      {title:"",element:"txt_ordentrabajo_withvehicle_id",type:"text",status:0,value:"val"},

  


     // {title:"items",element:"griditemsOrdenCompraWithVehicle2",type:"group",status:0,value:"checkbox",name:'orcom'}        
    ]
    if(validate(Maindata)){
      swal("Completa todos los campos", {
        icon: "error",
      });
    }else{
          var data = Array();
          var dataContent = Array();
          $("#griditemsOrdenCompraWithVehicle2 > tbody > tr").each(function(i, v){
              data[i] = Array();
              $(this).children('td').each(function(ii, vv){
                  data[i][ii] = ($(this).text())?$(this).text():$(this).find("input").is(':checked');
              }); 
          })
         
          data.forEach((it)=>{        
            if(it[7]){
              dataContent.push(it[0])
            }
         
          })
          
          let datos = {
            TipoQuery : 'sql_RequerimientosAndItemsOrdenTrabajo',
            data:generateInsertData(Maindata),
            items:dataContent
          };            
          console.log(generateInsertData(Maindata))    
         appAjaxQuery(datos,rutaSQL).done(function(resp){   
                             
              ResetAndUpdateGrid(Maindata,updateGrid,"grd01OrdenTrabajoHTML");
              updateGrid("grd01OperacionMantenimientoPreventivoHTML");

              $('#ModalOpenOrdenTrabajo').modal('hide');
              swal("Insertado correctamente", {
                icon: "success",
              });   
                             
          });
    }
  }

  function searchFuncionForNameAndSurnameOrdenTrabajo(inputsearch,sql,inputtext,tableId,nameInput){
    var msn=$('#'+inputsearch).val();
    
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
        
        swal("Has seleccionado a: "+resp.tabla.active+" "+resp.tabla.fecha_adquisicion+"", {
          icon: "success",
        });

        $("#"+inputtext[0]).val(resp.tabla.id);           
        
        //$('#'+tableId+' > tbody').empty();

          console.log(resp)
        let tr="";
     
            tr+="<tr>"        
            tr+="<td>"+resp.tabla.id+"</td>"
            tr+="<td>"+resp.tabla.active+"</td>"
            tr+="<td>"+resp.tabla.condicion+"</td>"
            tr+="<td>"+resp.tabla.fecha_adquisicion+"</td>"  
            tr+="<td>"+resp.tabla.garantia+"</td>"  
            tr+="<td>"+resp.tabla.grupo+"</td>" 
            tr+="<td>"+resp.tabla.clase+"</td>" 
            tr+="<td><input type='checkbox' name='"+nameInput+"' id='"+resp.tabla.id+"'/></td>"           
            tr+="</tr>"
               
        $('#'+tableId+' > tbody').append(tr)
      }
    });
  }
  function addObservacionespersonas(){
    $('#table_observaciones_personas > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='class_add_observaciones_personas'><td><input type='text' class='form-control observaciones_personas'/>"+
    "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500  py-2 px-2 text-white' onclick='removeChildFormPasajeros("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
  }
function insert_registro_personas(){
  let datos = {
    TipoQuery : 'sql_get_last_requerimiento_personal'      
  };                
 appAjaxQuery(datos,rutaSQL).done(function(dat){   

//  console.log(dat.tabla.id)
 // let id=(new Date()).getTime();
  let id=Number(dat.tabla.id)+1;
  let Maindata=[    
    {title:"id",element:"",type:"text",status:0,value:"RQ-CM-P-2022-"+id},
    {title:"id_personal",element:"idsolicitanteHidden",type:"text",status:1,value:"val"},
    {title:"cargo",element:"txt_cargo_personas",type:"text",status:1,value:"val"},
    {title:"n_vacantes",element:"txt_n_vacantes_personas",type:"text",status:1,value:"val"},
    {title:"area",element:"personas_select_area",type:"text",status:0,value:"2"},
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


  function updateGrid(grid){
    switch (grid) {
    
      case "gridOperacionSolicitudMantenimiento":
        generateGrid(
          "01_gridSolicitudMantenimiento",
          "grd01OperacionSolicitudMantenimiento",
          {
            print:{state:0,funct:""},
            view:{state:1,funct:"OpenModalRequerimientoMantenimiento"},
            edit:{state:0,funct:""},
            delet:{state:0,funct:""},
          },
          [                                           
                ],"search01OperacionSolicitudMantenimiento",[
                  "RQ Mantenimiento",
                  "Tipo de Mantenimiento",
                  "Codigo",
                  "Estado"
                ],1           
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
          [
            "Nº Requerimiento",
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
          ],null,1,0
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
          "ID",         
          "Area",
          "Cargo",
          "Estado"
        ],"1",0
      );
    break; 
      case "gridOperacionGarantiasHTML":
        generateGrid(
          "01_gridGarantias",
          "grd01OperacionGarantias",
          {
            print:{state:0,funct:""},
            view:{state:0,funct:""},
            edit:{state:0,funct:""},
            delet:{state:0,funct:""},
          },
          [                                           
                ],"search01OperacionGarantias",[
                  "Activo",
                  "Grupo",
                  "Inicio Garantia",
                  "Fin Garantia"
                ],1           
        );
      break;
      case "grd01OrdenTrabajoHTML":
        generateGrid(
          "01_gridOrdenTrabajo",
          "grd01OordenTrabajoMantenimiento",
          {
            print:{state:0,funct:""},
            view:{state:1,funct:"OpenModalOrdenTrabajo"},
            edit:{state:0,funct:""},
            delet:{state:0,funct:""},
          },
          [                                           
                ],"search01OordenTrabajoMantenimiento",[
                  "OT",
                  "Codigo",
                  "Tipo de Mantenimiento",
                  "Estado"                  
                ],1           
        );
      break;
      case "grd01OperacionMantenimientoPreventivoHTML":
        generateGrid(
          "01_gridSolicitudMantenimientoPreventivo",
          "grd01OperacionMantenimientoPreventivo",
          {
            print:{state:0,funct:""},
            view:{state:0,funct:""},
            edit:{state:0,funct:""},
            delet:{state:0,funct:""},
          },
          [                                         
                ],"search01OperacionMantenimientoPreventivo",[
                  "Vehiculo",
                  "Prioridad",
                  "Tipo",
                  "Estado"
                ],1           
        );
      break;
       /* case "gridConductor":
          generateGrid(
            "02_grid",
            "grd01Conductores",
            {
              print:{state:0,funct:""},
              view:{state:0,funct:""},
              edit:{state:0,funct:""},
              delet:{state:0,funct:""},
            },
            [
  
            ],"search01FlotaConductor",[
              "Nombre",
              "Apellidos",
              "Estado",
              "Tipo Licencia"
            ]
          );
        break;   */
     
      default:
        break;
    }
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
  "<td><input type='text' class='obligatory-input form-control txt_prioridad_requerimiento' /></td>"+

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
      {title:"area",element:"",type:"text",status:0,value:"2"},
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
  function searchFillInput(inputsearch,sqlQuery,idinput,searchinputfirst,searchinputsecond){
    var msn=$('#'+inputsearch).val();
    let datos = {
      TipoQuery : sqlQuery,
      value:msn     
    };      
    appAjaxQuery(datos,rutaSQL).done(function(resp){   
      console.log(resp) 
      if(resp.error){
        swal("No se encontro incidencia", {
          icon: "warning",
        });
      }else{
        
        swal("Has seleccionado a: "+resp.tabla.first+" "+resp.tabla.second+"", {
          icon: "success",
        });
  
        $("#"+idinput).val(resp.tabla.id);
        $('#'+searchinputfirst).val(resp.tabla.first);      
        $('#'+searchinputsecond).val(resp.tabla.second);      
  
       
      }
    });
  }
  function calcular_mtbf(hrfall, numtotfall){

    var mtbf;
   if(hrfall!=0){
      mtbf=((30*24*60)-hrfall)/numtotfall;
      return mtbf;
   }else{
     return 30*24*60;
   }
  
  }
  
  function calcular_mttr(hrfall,numtotfall){
  
    var mttr;
    if(hrfall!=0){
      mttr=hrfall/numtotfall;
      return mttr;
    }else{
      return 0;
    }
  
  }
  function calcular_disgenerica(mtbf, mttr){
  
    if(mttr!=0){
      //return ((mtbf)/(mtbf+mttr)).toFixed(2);
      var num =(mtbf)/(mtbf+mttr);
      //var i= num.toFixed(2);
      //console.log("roud:"+i);
      return num;
    }else{
      return 1;
    }
    
  }
  
  function calcular_mtbf_mes(hrfall, numtotfall){
  
    var mtbf;
   if(hrfall!=0){
      mtbf=((7*24*60)-hrfall)/numtotfall;
      return mtbf;
   }else{
     return 7*24*60;
   }
  
  }
  
  function calcular_mttr_mes(hrfall,numtotfall){
  
    var mttr;
    if(hrfall!=0){
      mttr=hrfall/numtotfall;
      return mttr;
    }else{
      return 0;
    }
  
  }
  
  function calcular_disgenerica_mes(mtbf, mttr){
    
    if(mttr!=0){
      //return ((mtbf)/(mtbf+mttr)).toFixed(2);
      var num =(mtbf)/(mtbf+mttr);
      //var i= num.toFixed(2);
      //console.log("roud:"+i);
      return num;
    }else{
      return 1;
    }
    
  }
  function addComentario(element,classesParent,classesInput){
    $('#'+element+' > tbody').append( "<tr id='"+(new Date()).getTime()+"' class='"+classesParent+"'><td><input type='text' class='form-control "+classesInput+"'/>"+
    "</td><td><div style='display:flex;justify-content:center;gap:2rem;'><button type='button' class='fa fa-trash bg-rose-500 py-2 px-2 text-white' onclick='removeComentarios("+(new Date()).getTime()+")'></button>"+
   // "<i class='fa fa-pencil  btn btn-primary btn-xs'></i>"+
    "</div></td></tr>" )
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