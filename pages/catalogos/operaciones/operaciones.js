var rutaSQL = "pages/catalogos/operaciones/sql.php";

function appBotonReset(){

  dashboardGrafica01();
  dashboardGrafica02();
  dashboardGrafica03();
  dashboardGrafica04();
}


function app01Boton_save(){
  let datos = app01GetDatos_ToDatabase();
  if(datos!=""){
    datos.commandSQL = "INS";
    console.log(datos);
    appAjaxQuery(datos,rutaSQL).done(function(resp){
      console.log(resp);
      if(resp.error==0) {
        app01Boton_cancel();
        alert("El vehiculo fue creado exitosamente!");
      }
    });
  } else {
    alert("¡¡¡FALTAN LLENAR DATOS o LOS VALORES NO PUEDEN SER CERO!!!");
  }

}

function app01GridAll(){
  $("#datos03").hide();
  $("#datos02").show();
  $('#grd01DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : '01_grid'
  };
  let fila ="";
  var table;
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      console.log(resp.tabla);
     table= $('#grd03Datos').DataTable( {
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
                    $(nTd).html('<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(oData.id))+');" ><i class="fa fa-eye"></i></button>');
                }
              }
            },
            { data: "id"},
            { data: "nombre" },
            { data: "placa" },
            { data: "serie" },
            { data: "estado" },
            { data: "tipo" },
            { data: "grupo" },
            { data: "conductor_asignado" },
            { data: "odometro" },
            { data: "marca" },
            { data: "modelo" },
            { data: "anio" },
            { data: "propiedad" },
            { data: "arrendamiento_inicio" },
            { data: "arrendamiento_fin" },
            { data: "arrendamiento_total" }
        ]
    } );
   
      
      /* $.each(resp.tabla,function(key, valor){
          fila += '<tr>';
          fila += '<td>'+
          '<button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(valor.id))+');" ><i class="fa fa-eye"></i></button>';
 
          fila += '<td>'+(valor.id)+'</td>';
          fila += '<td>'+(valor.nombre)+'</td>';
          fila += '<td>'+(valor.placa)+'</td>';
          fila += '<td>'+(valor.serie)+'</td>';
          fila += '<td>'+(valor.estado)+'</td>';
          fila += '<td>'+(valor.tipo)+'</td>';
          
          fila += '<td>'+(valor.grupo)+'</td>';
          fila += '<td>'+(valor.odometro)+'</td>';
          fila += '<td>'+(valor.marca)+'</td>';
          fila += '<td>'+(valor.modelo)+'</td>';
          fila += '<td>'+(valor.anio)+'</td>';
          fila += '<td>'+(valor.propiedad)+'</td>';


          
          fila += '</tr>';
      });
          $('#grd01DatosBody').html(fila); */
      
    }else{
      $('#grd10DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

function app01VerVehiculo(id){
  
  $("#grid01").hide();
  $("#btn01_New").hide();
  $("#detalle01").show();
  $("#btn01_Cancel").show();

  let datos = {
    TipoQuery : "01_getbyId",
    id: id
  }
  console.log("id: "+id);
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    //$("#txt02_NroActivo").val($("#lbl_ActivoGrupo").html()+' - '+$("#lbl_ActivoNro").html());
    var vehiculo = resp.tabla[0];
    $("#vehi_titulo").text(" "+resp.tabla[0].nombre+" "+resp.tabla[0].placa);
    $("#vehi_placa").text(" "+resp.tabla[0].placa);
    $("#vehi_odometro").text(" "+resp.tabla[0].odometro);
    $("#vehi_estado").text(" "+resp.tabla[0].estado);
    $("#vehi_tipo").text(" "+resp.tabla[0].tipo);
    $("#vehi_ciudad").text(" "+resp.tabla[0].ciudad);

    $("#det_nombre").text(resp.tabla[0].nombre);
    $("#det_estado").text(resp.tabla[0].estado);
    $("#det_tipo").text(resp.tabla[0].tipo);
    $("#det_grupo").text("Arequipa");
    $("#det_propiedad").text(resp.tabla[0].propiedad);
    $("#det_serie").text(resp.tabla[0].serie);
    $("#det_anio").text(resp.tabla[0].anio);
    $("#det_marca").text(resp.tabla[0].marca);
    $("#det_modelo").text(resp.tabla[0].modelo);
    $("#det_version").text("-");
    $("#det_color").text("-");
    $("#det_cuerpo").text("-");

    let datos = {
      TipoQuery : "01_getSegurobyId",
      id: id
    }

    appAjaxQuery(datos,rutaSQL).done(function(resp){
      if(resp.tabla.length>0){
        $("#seg_proveedor").text(resp.tabla[0].proveedor);
        $("#seg_fechaIni").text(moment(resp.tabla[0].fecha_inicio).format("DD/MM/YYYY"));
        $("#seg_total").text(resp.tabla[0].subtotal);
        $("#seg_refe").text(resp.tabla[0].Referencia);
        $("#seg_fechaVen").text(moment(resp.tabla[0].fecha_vencimiento).format("DD/MM/YYYY"));
        $("#seg_docs").text("-");
        console.log("comb id: "+vehiculo.combustible)
        let datos = {
          TipoQuery : "01_getCombustiblebyId",
          id: vehiculo.combustible
        }
    
        appAjaxQuery(datos,rutaSQL).done(function(resp){
          if (resp.tabla.length>0){
            $("#com_tanque01").text(resp.tabla[0].rendimiento_a+" GaLones (US)");
            $("#com_rendimiento").text(resp.tabla[0].capacidad)+" km/G (US)";
            $("#com_tanque02").text(resp.tabla[0].rendimiento_b+" GaLones (US)");

            let datos = {
              TipoQuery : "01_getPropiedadbyId",
              id: vehiculo.propio
            }
        
            appAjaxQuery(datos,rutaSQL).done(function(resp){
              if(resp.tabla.length>0){
                $("#pro_proveedor").text(resp.tabla[0].proveedor);
                $("#pro_fecha_compra").text(moment(resp.tabla[0].fecha_compra).format("DD/MM/YYYY"));
                $("#pro_precio").text(resp.tabla[0].precio);
                $("#pro_fecha_garan").text(moment(resp.tabla[0].fecha_garantia).format("DD/MM/YYYY"));
                $("#pro_notas").text(resp.tabla[0].notas);
                $("#pro_documentos").text(resp.tabla[0].documentos);

                let datos = {
                  TipoQuery : "01_getOdometrobyId",
                  id: vehiculo.id
                }
                appAjaxQuery(datos,rutaSQL).done(function(resp){
                  if(resp.tabla.length>0){
                    table= $('#odometroTable').DataTable( {
                      "sPaginationType": "simple",
                      "lengthChange": false,
                      "bFilter": false,
                      "bInfo": false,
                      "pageLength": 5,
                      "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                      },
                      data: resp.tabla,
                      destroy: true,
                      columns: 
                      [
                          
                          { data: "odometro", title: "Odometro",
                          fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            if(oData.odometro) {
                                $(nTd).html('<i class="fa fa-tachometer"></i> &nbsp;'+oData.odometro+" km");
                            }
                          }
                          },
                          { data: "fecha", title:"Fecha" },
                          { data: "hora", title:"Hora" },
                          { 
                            data: "id", title:"Oper.",
                            targets: -1,
                            className: 'dt-body-right',
                            //className: "dt-head-right",
                            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                              if(oData.id) {
                                  $(nTd).html('<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(oData.id))+');" ><i class="fa fa-pencil"></i></button>&nbsp;&nbsp;<button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(oData.id))+');" ><i class="fa fa-trash"></i></button>');
                              }
                            }
                          }
                        
                      ]
                    } );
                  }

                  
                  
                });
              }
              

            });
          }
          

        })
      }
      
    });

  });
}

function app01Boton_cancel(){
  $("#grid01").show();
  $("#btn01_New").show();
  $("#detalle01").hide();
  $("#btn01_Cancel").hide();
}

function dashboardGrafica01(){
    
  var options = {
    series: [{
    name: 'Sales',
    data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 50, 7, 5]
  }],
    chart: {
    height: 350,
    type: 'line',
  },
  forecastDataPoints: {
    count: 7
  },
  stroke: {
    width: 5,
    curve: 'smooth'
  },
  xaxis: {
    type: 'datetime',
    categories: ['1/11/2000', '2/11/2000', '3/11/2000', '4/11/2000', '5/11/2000', '6/11/2000', '7/11/2000', '8/11/2000', '9/11/2000', '10/11/2000', '11/11/2000', '12/11/2000', '1/11/2001', '2/11/2001', '3/11/2001','4/11/2001' ,'5/11/2001' ,'6/11/2001'],
    tickAmount: 10,
    labels: {
      formatter: function(value, timestamp, opts) {
        return opts.dateFormatter(new Date(timestamp), 'dd MMM')
      }
    }
  },
  title: {
    text: 'Combustible',
    align: 'left',
    style: {
      fontSize: "16px",
      color: '#666'
    }
  },
  fill: {
    type: 'gradient',
    gradient: {
      shade: 'dark',
      gradientToColors: [ '#FDD835'],
      shadeIntensity: 1,
      type: 'horizontal',
      opacityFrom: 1,
      opacityTo: 1,
      stops: [0, 100, 100, 100]
    },
  },
  yaxis: {
    min: 0,
    max: 50
  }
  };

  var chart = new ApexCharts(document.querySelector("#dashboardChart01"), options);
  chart.render();

}

function dashboardGrafica02(){
  var options = {
    series: [{
      name: "Combustible",
      data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
    },
    {
      name: "Mantenimientos",
      data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
    },
    {
      name: 'Gastos',
      data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
    }
  ],
    chart: {
    height: 350,
    type: 'line',
    zoom: {
      enabled: false
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    width: [5, 7, 5],
    curve: 'straight',
    dashArray: [0, 8, 5]
  },
  title: {
    text: 'Costos Operativos',
    align: 'left'
  },
  legend: {
    tooltipHoverFormatter: function(val, opts) {
      return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
    }
  },
  markers: {
    size: 0,
    hover: {
      sizeOffset: 6
    }
  },
  xaxis: {
    categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
      '10 Jan', '11 Jan', '12 Jan'
    ],
  },
  tooltip: {
    y: [
      {
        title: {
          formatter: function (val) {
            return val + " (mins)"
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val + " per session"
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val;
          }
        }
      }
    ]
  },
  grid: {
    borderColor: '#f1f1f1',
  }
  };

  var chart = new ApexCharts(document.querySelector("#dashboardChart02"), options);
  chart.render();
}

function dashboardGrafica03(){
  var options = {
    series: [{
      name: "Preventivo",
      data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
    },
    {
      name: 'Correctivo',
      data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
    }
  ],
    chart: {
    height: 350,
    type: 'line',
    zoom: {
      enabled: false
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    width: [5, 7, 5],
    curve: 'straight',
    dashArray: [0, 8, 5]
  },
  title: {
    text: 'Costos Mantenimiento',
    align: 'left'
  },
  legend: {
    tooltipHoverFormatter: function(val, opts) {
      return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
    }
  },
  markers: {
    size: 0,
    hover: {
      sizeOffset: 6
    }
  },
  xaxis: {
    categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
      '10 Jan', '11 Jan', '12 Jan'
    ],
  },
  tooltip: {
    y: [
      {
        title: {
          formatter: function (val) {
            return val
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val;
          }
        }
      }
    ]
  },
  grid: {
    borderColor: '#f1f1f1',
  }
  };

  var chart = new ApexCharts(document.querySelector("#dashboardChart03"), options);
  chart.render();
}

function dashboardGrafica04(){
  var options = {
    series: [{
      name: "Combustible",
      data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
    },
    {
      name: "Mantenimientos",
      data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
    },
    {
      name: 'Gastos',
      data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
    }
  ],
    chart: {
    height: 350,
    type: 'line',
    zoom: {
      enabled: false
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    width: [5, 7, 5],
    curve: 'straight',
    dashArray: [0, 8, 5]
  },
  title: {
    text: 'Costos Operativos',
    align: 'left'
  },
  legend: {
    tooltipHoverFormatter: function(val, opts) {
      return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
    }
  },
  markers: {
    size: 0,
    hover: {
      sizeOffset: 6
    }
  },
  xaxis: {
    categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
      '10 Jan', '11 Jan', '12 Jan'
    ],
  },
  tooltip: {
    y: [
      {
        title: {
          formatter: function (val) {
            return val + " (mins)"
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val + " per session"
          }
        }
      },
      {
        title: {
          formatter: function (val) {
            return val;
          }
        }
      }
    ]
  },
  grid: {
    borderColor: '#f1f1f1',
  }
  };

  var chart = new ApexCharts(document.querySelector("#dashboardChart04"), options);
  chart.render();
}

function app03GridAll(){
  $("#datos02").hide();
  $("#datos03").show();
  $('#grd01DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : '02_grid'
  };
  var table;
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      console.log(resp.tabla);
     table= $('#gridConductores').DataTable( {
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
                    $(nTd).html('<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(oData.id))+');" ><i class="fa fa-pencil"></i></button>');
                }
              }
            },
            { data: "id", title:"ID"},
            { data: "nombre", title:"Nombre" },
            { data: "apellidos", title:"Apellidos" },
            { data: "fecha_ingreso", title:"Fecha ingreso" },
            { data: "estado_conductor", title:"Estado conductor" },
            { data: "empleado", title:"Empleado" },
            { data: "ciudad", title:"Ciudad" },
            { data: "fecha_nacimiento", title:"Fecha Nacimiento" },
            { data: "telepeaje", title:"Telepeaje" },
            { data: "Etiqueta", title:"Etiqueta" },
            { data: "tipo_licencia", title:"Tipo Licencia" },
            { data: "num_licencia", title:"# Licencia" },
            { data: "fecha_vencimiento", title:"Fecha Vencimiento" },
            { data: "grupo", title:"Grupo"}
        ]
    } );
   
      
      /* $.each(resp.tabla,function(key, valor){
          fila += '<tr>';
          fila += '<td>'+
          '<button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(valor.id))+');" ><i class="fa fa-eye"></i></button>';
 
          fila += '<td>'+(valor.id)+'</td>';
          fila += '<td>'+(valor.nombre)+'</td>';
          fila += '<td>'+(valor.placa)+'</td>';
          fila += '<td>'+(valor.serie)+'</td>';
          fila += '<td>'+(valor.estado)+'</td>';
          fila += '<td>'+(valor.tipo)+'</td>';
          
          fila += '<td>'+(valor.grupo)+'</td>';
          fila += '<td>'+(valor.odometro)+'</td>';
          fila += '<td>'+(valor.marca)+'</td>';
          fila += '<td>'+(valor.modelo)+'</td>';
          fila += '<td>'+(valor.anio)+'</td>';
          fila += '<td>'+(valor.propiedad)+'</td>';


          
          fila += '</tr>';
      });
          $('#grd01DatosBody').html(fila); */
      
    }else{
      $('#grd10DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}

function app04GridAll(){
  $("#datos02").hide();
  $("#datos03").show();
  $('#grd01DatosBody').html('<tr><td colspan="2" style="text-align:center;"><br><div class="progress progress-sm active" style=""><div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width:100%"></div></div><br>Un momento, por favor...</td></tr>');
  let txtBuscar = $("#txtBuscar").val();
  let datos = {
    TipoQuery : '04_grid'
  };
  var table;
  appAjaxQuery(datos,rutaSQL).done(function(resp){
    if(resp.tabla.length>0){
      console.log(resp.tabla);
     table= $('#opetareasVencidas').DataTable( {
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
                    $(nTd).html('<button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(oData.id))+');" ><i class="fa fa-pencil"></i></button>');
                }
              }
            },
            { data: "id", title:"ID"},
            { data: "nombre", title:"Nombre" },
            { data: "tipo", title:"Tipo" },
            { data: "fecha_limite", title:"Fecha Limite" },
            { data: "prioridad", title:"Prioridad" },
            { data: "vehiculo", title:"Vehiculo" },
            { data: "Responsable", title:"Conductor" },
            { data: "Conductor", title:"Conductor" },
            { data: "Proveedor", title:"Proveedor" }
           
        ]
    } );
   
      
      /* $.each(resp.tabla,function(key, valor){
          fila += '<tr>';
          fila += '<td>'+
          '<button id="#" type="button" class="btn btn-success btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(valor.id))+');" ><i class="fa fa-eye"></i></button>';
 
          fila += '<td>'+(valor.id)+'</td>';
          fila += '<td>'+(valor.nombre)+'</td>';
          fila += '<td>'+(valor.placa)+'</td>';
          fila += '<td>'+(valor.serie)+'</td>';
          fila += '<td>'+(valor.estado)+'</td>';
          fila += '<td>'+(valor.tipo)+'</td>';
          
          fila += '<td>'+(valor.grupo)+'</td>';
          fila += '<td>'+(valor.odometro)+'</td>';
          fila += '<td>'+(valor.marca)+'</td>';
          fila += '<td>'+(valor.modelo)+'</td>';
          fila += '<td>'+(valor.anio)+'</td>';
          fila += '<td>'+(valor.propiedad)+'</td>';


          
          fila += '</tr>';
      });
          $('#grd01DatosBody').html(fila); */
      
    }else{
      $('#grd10DatosBody').html('<tr><td colspan="2" style="text-align:center;color:red;">Sin Resultados '+((txtBuscar=="")?(""):("para "+txtBuscar))+'</td></tr>');
    }
    //$('#grdDatosCount').html(resp.tabla.length+"/"+resp.cuenta);
  });
}